<?php 
	session_start();
	//include('/app/web/connect.php');
	
	$conn1 = pg_connect("host=ec2-54-227-243-210.compute-1.amazonaws.com dbname=d3f2mm484o32jn user=tdqtwhcckycshu password=5d86125f0d185bf2918a76dca2adcd104f4a452b71cbcefe831f1d2bd65e98ee");
	
	//populate settings SESSION
	$monitoring_settings = [];
		
	//retrieve monitoring_settings
	$query = "SELECT * FROM monitoring_settings;";
	$item = array(); //array for assets
	$rs = pg_query($conn, $query); //run query

	while ($item = pg_fetch_assoc($rs)){ //fetch and fill array
		array_push($monitoring_settings, $item['status']);
	}
	
	$_SESSION['settings'] = $settings; //save array of data to session
				
	//if logs are turned on, capture log
	if($monitoring_settings[0] == "ON"){
	
		$username = $_SESSION["username"]; 
		$action = $_POST['action'];
		
		if($action == 'create'){
			$action_string = "Created an asset";
		}
		else if($action == 'edit'){
			$action_string = "Edited an asset";
		}
		else if($action == 'remove'){
			$action_string = "Removed an asset";
		}
		else{
			$empty_action = true;
		}
		
		if($empty_action != true){
			
			$log_time = date('M-d-Y H:i:s A'); 
			
			$query = "INSERT INTO logging VALUES ('{$username}', '{$action_string}', '{$log_time}');"; 
			
			$results = pg_query($conn1, $query);
		}
	}
	pg_close($conn1);
?>