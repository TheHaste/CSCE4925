<?php 
	session_start();
	include('/app/web/connect.php');
	
	$username = $_SESSION["username"]; 
	$action = $_POST['action'];
	
	if($action == 'create'){
		$action_string = "Created an asset";
	}
	else if($action == 'edit'){
		$action_string = "Edited an asset";
	}
	else if($action == 'remove'){
		$action_string = "Removed an asset";
	}
	else{
		$empty_action = true;
	}
	
	if($empty_action != true){
		
		$log_time = date('M-d-Y H:i:s A'); 
		
		$query = "INSERT INTO logging VALUES ('{$username}', '{$action}', '{$log_time}');"; $results = pg_query($conn, $query);
		
		pg_close($conn);
	}
	else
		echo "NO LOG WRITTEN";
?>