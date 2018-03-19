<?php
//Reporting Script
	session_start(); //start user session to send data between pages

	
	$_SESSION['data'] = [];
	
	
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
		$_SESSION['data'] = $column_array;

	}
	else if($_POST['type'] == 'logs'){
		$logusername = $_POST['logusername'];
		$logaction = $_POST['logaction'];
		$logdate1 = $_POST['logdate1'];
		$logdate2 = $_POST['logdate2'];
		
		$column_array = array($logusername, $logaction, $logdate1, $logdate2);
		$_SESSION['data'] = $column_array;
		
	}

	$_POST['type'] = "";
?>