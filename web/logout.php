<?php 
	$_SESSION = array();
	session_destroy();
	header("location: /");
?>
