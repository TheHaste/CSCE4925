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
		
		//build string
		$SQL = "SELECT * FROM logs WHERE ";
		
		echo $serialnumber; echo <br>;
		echo $brand; echo <br>;
		echo $model; echo <br>;
		echo $assigneduser; echo <br>;
		echo $location; echo <br>;
		echo $cost; echo <br>;
		echo $datedeployed; echo <br>;
		echo $datesurplused; echo <br>;
		echo $lastupdated; echo <br>;
		
		//redirect
		
	}
	else if($_POST['type'] == 'logs'){
		$logusername = $_POST['logusername'];
		$logaction = $_POST['logaction'];
		$logdate = $_POST['logdate'];
		
		//build string
		$SQL = "SELECT * FROM logs WHERE ";
		
		echo $logusername; echo <br>;
		echo $logaction; echo <br>;
		echo $logdate; echo <br>;
		
		//redirect
	}
	
?>