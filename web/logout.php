<?php 
	$_SESSION = array();
	session_destroy();
	pg_close($conn);
	header("location: /");
?>
