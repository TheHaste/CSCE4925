<?php 
	session_start();
	
	$conn = pg_connect("host=ec2-54-227-243-210.compute-1.amazonaws.com dbname=d3f2mm484o32jn user=tdqtwhcckycshu password=5d86125f0d185bf2918a76dca2adcd104f4a452b71cbcefe831f1d2bd65e98ee");
	
	$_SESSION['settings'] = [];
	$types = [];
	$thresholds = [];
	
	//store settings values
	$types = $_POST['types'];
	$thresholds = $_POST['thresholds'];
	$logs_setting = $_POST['system_logging'];
	$notifications_setting = $_POST['notifications'];
	
	$db_types = []; //holds types from database
	$db_thresholds = []; //holds thresholds from database
	
	$types_to_delete = []; //types we need to delete
	$thresholds_to_delete = []; //thresholds we need to delete
	
	$types_to_save = []; //types we need to add
	$thresholds_to_save = []; //thresholds we need to add
	
	$settings = array($types, $thresholds, $logs_setting, $notifications_setting);
	
	$_SESSION['settings'] = $settings; //save array of data to session
	
	//retrieve monitoring_settings
	$query = "SELECT * FROM monitoring_settings;";
	$item = array(); //array for assets
	$rs = pg_query($conn, $query); //run query

	while ($item = pg_fetch_assoc($rs)){ //fetch and fill array
		$db_statuses = $item['status'];
	}
	
	//retrieve notification_settings
	$query = "SELECT * FROM notification_settings;";
	$item = array(); //array for assets
	$rs = pg_query($conn, $query); //run query

	while ($item = pg_fetch_assoc($rs)){ //fetch and fill array
		array_push($db_types, $item['type']);
		array_push($db_thresholds, $item['threshold']);
	}
	
	//check for notification changes
	$total_notifications = sizeof($types);
	$total_db_notifications = sizeof($db_types);
	
	$index1 = 0;
	$index2 = 0;
	
	//check for settings to add
	for($i=0; $i<$total_notifications; $i++){
		$add = true;
		if($types[$index1] != ""){
			for($j=0; $j<$total_db_notifications; $j++){
				if(($types[$index1] == $db_types[$index2]) && ($thresholds[$index1] == $db_thresholds[$index2])){
					$add = false;
					break;
				}
				$index2++;
			}
			//store setting to be added if needed
			if($add){
				array_push($types_to_save, $types[$index1]);
				array_push($thresholds_to_save, $thresholds[$index1]);
			}
		}
		$index1++;
	}
	
	$index1 = 0;
	$index2 = 0;
	//check for settings to delete
	for($i=0; $i<$total_db_notifications; $i++){
		$delete = true;
		for($j=0; $j<$total_notifications; $j++){
			if(($db_types[$index1] == $types[$index2]) && ($db_thresholds[$index1] == $thresholds[$index2])){
				$delete = false;
				break;
			}
			$index2++;
		}
		//store setting to be deleted if needed
		if($delete){
			array_push($types_to_delete, $db_types[$index1]);
			array_push($thresholds_to_delete, $db_thresholds[$index1]);
		}
		$index1++;
	}
	
	$index1=0;
	//delete settings from table
	for($i=0; $i<sizeof($types_to_delete); $i++){
		$deleteSQL = "DELETE FROM notification_settings WHERE type = '{$types_to_delete[$index1]}' AND threshold ='{$thresholds_to_delete[$index1]}';";
		$delete_query = pg_query($conn, $deleteSQL); //run query
		$index1++;
	}
	
	$index1=0;
	//insert new settings into table
	for($i=0; $i<sizeof($types_to_save); $i++){
		$addSQL = "INSERT INTO notification_settings (type, threshold) VALUES ('{$types_to_save[$index1]}','{$thresholds_to_save[$index1]}');";
		$add_query = pg_query($conn, $addSQL); //run query
		$index1++;
	}
	
	//check for monitoring changes	
	if($logs_setting != $db_statuses[0]){ //update table if necessary
		$updateLogsSetting = "UPDATE monitoring_settings SET status = '{$logs_setting}' WHERE name = 'logs';";
		$update_logs_setting_SQL = pg_query($conn, $updateLogsSetting); //run query
	}
	
	if($notifications_setting != $db_statuses[1]){ //update table if necessary
		$updateNotificationSetting = "UPDATE monitoring_settings SET status = '{$notifications_setting}' WHERE name = 'notifications';";
		$update_notifications_setting_SQL = pg_query($conn, $updateNotificationSetting); //run query
	}
	
	
	pg_close($conn);
?>