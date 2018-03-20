<?php
//Reporting Script
	session_start(); //start user session to send data between pages

	$conn = pg_connect("host=ec2-54-227-243-210.compute-1.amazonaws.com dbname=d3f2mm484o32jn user=tdqtwhcckycshu password=5d86125f0d185bf2918a76dca2adcd104f4a452b71cbcefe831f1d2bd65e98ee");

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 
	
	$_SESSION['data'] = [];
	
	
	//store parameters
	if($_POST['type'] == 'inventory'){
		
		foreach($_POST as $data){
			if(strpos($data, ';') !== false){
				return;
			}
		}
		
		$serialnumber = mysqli_real_escape_string($conn, $_POST['serialnumber']);
		$brand = mysqli_real_escape_string($conn, $_POST['brand']);
		$model = mysqli_real_escape_string($conn, $_POST['model']);
		$assigneduser = mysqli_real_escape_string($conn, $_POST['assigneduser']);
		$location = mysqli_real_escape_string($conn, $_POST['location']);
		$cost = mysqli_real_escape_string($conn, $_POST['cost']);
		$datedeployed = mysqli_real_escape_string($conn, $_POST['datedeployed']);
		$datesurplused = mysqli_real_escape_string($conn, $_POST['datesurplused']);
		$lastupdated = mysqli_real_escape_string($conn, $_POST['lastupdated']);
		
		$column_array = array($serialnumber, $brand, $model, $assigneduser, $location, $cost, $datedeployed, $datesurplused, $lastupdated);
		$_SESSION['data'] = $column_array;

	}
	else if($_POST['type'] == 'logs'){
		
		foreach($_POST as $data){
			if(strpos($data, ';') !== false){
				return;
			}
		}
		
		$logusername = mysqli_real_escape_string($conn, $_POST['logusername']);
		$logaction = mysqli_real_escape_string($conn, $_POST['logaction']);
		$logdate1 = mysqli_real_escape_string($conn, $_POST['logdate1']);
		$logdate2 = mysqli_real_escape_string($conn, $_POST['logdate2']);
		
		$column_array = array($logusername, $logaction, $logdate1, $logdate2);
		$_SESSION['data'] = $column_array;
		
	}

	$_POST['type'] = "";
	
	pg_close($conn);
?>