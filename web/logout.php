<?php 
	session_start();
	date_default_timezone_set('America/Chicago'); //set timezone to CST
	
	$username = $_SESSION['username'];
	
	//create log
	include('/app/web/connect.php');
				
	$action = "Logout";
	$log_time = date('M-d-Y H:i:s A');
					
	$query = "INSERT INTO logging VALUES ('{$username}', '{$action}', '{$log_time}');";
				
	$results = pg_query($conn, $query);

	$_SESSION = array();
	session_destroy();
	pg_close($conn);
	header("location: /");
?>
