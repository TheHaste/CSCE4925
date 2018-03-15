<?php
//Reporting Script
	session_start(); //start user session to send data between pages
	
	$conn1 = pg_connect("host=ec2-54-227-243-210.compute-1.amazonaws.com dbname=d3f2mm484o32jn user=tdqtwhcckycshu password=5d86125f0d185bf2918a76dca2adcd104f4a452b71cbcefe831f1d2bd65e98ee");

	//store parameters
	if($_POST['type'] == 'inventory'){
		$serialnumber = $_POST['serialnumber'];
		$brand = $_POST['brand'];
		$model = $_POST['model'];
		$assigneduser = $_POST['assigneduser'];
		$location = $_POST['location'];
		$cost = $_POST['cost'];
		$datedeployed = $_POST['datedeployed'];
		$datesurplused = $_POST['datesurplused'];
		$lastupdated = $_POST['lastupdated'];
		
		$column_array = array($serialnumber, $brand, $model, $assigneduser, $location, $cost, $datedeployed, $datesurplused, $lastupdated);
		$_SESSION['inventory'] = $column_array;
		
		pg_close($conn1);
		
		//redirect
		header('Location: ../reports/inventory_report/');
	}
	else if($_POST['type'] == 'logs'){
		$logusername = $_POST['logusername'];
		$logaction = $_POST['logaction'];
		$logdate = $_POST['logdate'];
		
		$column_array = array($logusername, $logaction, $logdate);
		$_SESSION['logs'] = $column_array;
		
		pg_close($conn1);
		
		//redirect
		header('Location: http://giganto-inventory-dev.herokuapp.com/reports/logs_report/');
	}
	
?>