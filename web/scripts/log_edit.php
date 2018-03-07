<?php 
	session_start();
	include('/app/web/connect.php');
	
	$username = $_SESSION["username"]; 
	$action = "Edited an asset";
	$log_time = date('M-d-Y H:i:s A'); 
	
	$query = "INSERT INTO logging VALUES ('{$username}', '{$action}', '{$log_time}');"; $results = pg_query($conn, $query);
	
	pg_close($conn);
?>