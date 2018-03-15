<?php
//Reporting Script
	session_start(); //start user session to send data between pages

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

	}
	else if($_POST['type'] == 'logs'){
		$logusername = $_POST['logusername'];
		$logaction = $_POST['logaction'];
		$logdate = $_POST['logdate'];
		
		$column_array = array($logusername, $logaction, $logdate);
		$_SESSION['logs'] = $column_array;
		
	}

?>