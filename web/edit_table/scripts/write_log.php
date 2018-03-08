<?php 
	session_start();
	include('/app/web/connect.php');
	
	$username = $_SESSION["username"]; 
	$action = $_POST['action'];
	
	if($action == 'create'){
		$action_string
	}
	else if($action == 'edit'){
		$action_string
	}
	else if($action == 'remove'){
		$action_string
	}
	else{
		$empty_action = true;
	}
	
	if($empty_action != true){
		
		$log_time = date('M-d-Y H:i:s A'); 
		
		$query = "INSERT INTO logging VALUES ('{$username}', '{$action}', '{$log_time}');"; $results = pg_query($conn, $query);

	}
?>