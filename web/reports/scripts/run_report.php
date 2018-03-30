<?php
//Reporting Script
	session_start(); //start user session to send data between pages

	$conn = pg_connect("host=ec2-54-227-243-210.compute-1.amazonaws.com dbname=d3f2mm484o32jn user=tdqtwhcckycshu password=5d86125f0d185bf2918a76dca2adcd104f4a452b71cbcefe831f1d2bd65e98ee");

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$_SESSION['data'] = [];
	
	$counter = 0;
	foreach($_POST as $data){
		if($data == ''){
			$counter++;
		}
	}
		
	if($counter == sizeof($_POST)){
		$column_array = array("empty");
		$_SESSION['data'] = $column_array;
	}
	else if($_POST['type'] == 'inventory'){ //store parameters
		
		foreach($_POST as $data){
			if(strpos($data, ';') !== false){
				return;
			}
		}
		
		$assettype = pg_escape_string($conn, $_POST['assettype']);
		$serialnumber = pg_escape_string($conn, $_POST['serialnumber']);
		$brand = pg_escape_string($conn, $_POST['brand']);
		$model = pg_escape_string($conn, $_POST['model']);
		$assigneduser = pg_escape_string($conn, $_POST['assigneduser']);
		$location = pg_escape_string($conn, $_POST['location']);
		$cost = pg_escape_string($conn, $_POST['cost']);
		$datedeployed = pg_escape_string($conn, $_POST['datedeployed']);
		$datesurplused = pg_escape_string($conn, $_POST['datesurplused']);
		$lastupdated = pg_escape_string($conn, $_POST['lastupdated']);
		
		$column_array = array($assettype, $serialnumber, $brand, $model, $assigneduser, $location, $cost, $datedeployed, $datesurplused, $lastupdated);
		$_SESSION['data'] = $column_array;

	}
	else if($_POST['type'] == 'logs'){ //store parameters
		
		foreach($_POST as $data){
			if(strpos($data, ';') !== false){
				return;
			}
		}
		
		$logusername = pg_escape_string($conn, $_POST['logusername']);
		$logaction = pg_escape_string($conn, $_POST['logaction']);
		$logdate1 = pg_escape_string($conn, $_POST['logdate1']);
		$logdate2 = pg_escape_string($conn, $_POST['logdate2']);
		
		$column_array = array($logusername, $logaction, $logdate1, $logdate2);
		$_SESSION['data'] = $column_array;
		
	}

	$_POST['type'] = "";
	
	pg_close($conn);
?>