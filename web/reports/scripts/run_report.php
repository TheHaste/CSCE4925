<?php
//Reporting Script
	session_start(); //start user session to send data between pages

	
	$_SESSION['data'] = [];
	
	
	//store parameters
	if($_POST['type'] == 'inventory'){
		
		foreach($_POST as $data){
			if(strpos($data, ';') !== false){
				return;
			}
		}
		
		$serialnumber = mysqli_real_escape_string($_POST['serialnumber']);
		$brand = mysqli_real_escape_string($_POST['brand']);
		$model = mysqli_real_escape_string($_POST['model']);
		$assigneduser = mysqli_real_escape_string($_POST['assigneduser']);
		$location = mysqli_real_escape_string($_POST['location']);
		$cost = mysqli_real_escape_string($_POST['cost']);
		$datedeployed = mysqli_real_escape_string($_POST['datedeployed']);
		$datesurplused = mysqli_real_escape_string($_POST['datesurplused']);
		$lastupdated = mysqli_real_escape_string($_POST['lastupdated']);
		
		$column_array = array($serialnumber, $brand, $model, $assigneduser, $location, $cost, $datedeployed, $datesurplused, $lastupdated);
		$_SESSION['data'] = $column_array;

	}
	else if($_POST['type'] == 'logs'){
		
		foreach($_POST as $data){
			if(strpos($data, ';') !== false){
				return;
			}
		}
		
		$logusername = mysqli_real_escape_string($_POST['logusername']);
		$logaction = mysqli_real_escape_string($_POST['logaction']);
		$logdate1 = mysqli_real_escape_string($_POST['logdate1']);
		$logdate2 = mysqli_real_escape_string($_POST['logdate2']);
		
		$column_array = array($logusername, $logaction, $logdate1, $logdate2);
		$_SESSION['data'] = $column_array;
		
	}

	$_POST['type'] = "";
?>