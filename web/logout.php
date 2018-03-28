<?php 
	session_start();
	date_default_timezone_set('America/Chicago'); //set timezone to CST
	
	$username = $_SESSION['username'];
	
	//create log
	include('/app/web/connect.php');
	
		//populate settings
	$monitoring_settings = [];
		
	//retrieve monitoring_settings
	$query = "SELECT * FROM monitoring_settings WHERE name='logs';";
	$item = array(); //array for assets
	$rs = pg_query($conn, $query); //run query

	while ($item = pg_fetch_assoc($rs)){ //fetch and fill array
		$monitoring_setting = $item['status'];
	}

	if($monitoring_setting == "ON"){
		$action = "Logout";
		$log_time = date('M-d-Y H:i:s A');
						
		$query = "INSERT INTO logging VALUES ('{$username}', '{$action}', '{$log_time}');";
					
		$results = pg_query($conn, $query);
	}
	
	$_SESSION = array();
	session_destroy();
	pg_close($conn);
	header("location: /");
?>
