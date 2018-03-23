<?php 
	session_start();
	
	$_SESSION['settings'] = [];
	
	//store settings values
	$types = $_POST['types'];
	$thresholds = $_POST['thresholds'];
	$logs_setting = $_POST['system_logging'];
	$notifications_setting = $_POST['notifications'];
	
	$settings_array = array($types, $thresholds, $logs_setting, $notifications_setting);
	
	$_SESSION['settings'] = $settings_array; //save array of data to session_cache_expire
	
	//update tables
	
	
?>