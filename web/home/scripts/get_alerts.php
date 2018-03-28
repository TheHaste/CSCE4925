<?php

require('/app/web/connect.php');

session_start(); //start user session to send data between pages

$types = [];
$thresholds = [];
$alerts = [];

//retrieve notification_settings
	$query = "SELECT * FROM notification_settings;";
	$item = array(); //array for assets
	$rs = pg_query($conn, $query); //run query

	while ($item = pg_fetch_assoc($rs)){ //fetch and fill array
		array_push($types, $item['type']);
		array_push($thresholds, $item['threshold']);
	}
	
	$num_of_notifications = sizeof($types);
	$index = 0;
	//check alerts/notifications
	for($i=0; i<$num_of_notifications; $i++){
		//query for count of items with matching type
		$query = "SELECT COUNT(*) FROM assets WHERE type='{$types[$index]}';";
		$rs = pg_query($conn, $query); //run query

		$type_total = floatval(pg_fetch_result($rs)); //fetch result
	
		//query for count of items with matching type and assigned is empty
		$query = "SELECT COUNT(*) FROM assets WHERE type='{$types[$index]}' AND assigned='';";
		$rs = pg_query($conn, $query); //run query

		$available_total = floatval(pg_fetch_result($rs)); //fetch result
	
		//calculate if threshold is reached
		$calculation = floatval($available_total / $available_total);
		
		//if threshold reached
		if(floatval($calculation) < floatval($thresholds[$index]) ){
			//append type to the alerts array
			array_push($alerts, $type[$index]);
		}
		$index++;
	}	
	
	echo json_encode($alerts);
?>