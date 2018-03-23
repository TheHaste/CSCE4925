<?php 
	session_start();
	
	$_SESSION['settings'] = [];
	
	$types = $_POST['types'];
	$thresholds = $_POST['thresholds'];
	
	$settings_array = array($types, $thresholds);
	
	$_SESSION['settings'] = $settings_array;
	
	//delete old XML
	unlink('../settings/settings_config.xml');
	
	//build new XML
	$xml = new DomDocument('1.0', "UTF-8");
	$xml->load('settings_config.xml');
	
	$rootTag=$xml->createElement("settings");
	$rootTag->appendChild($rootTag);
	
	for($i=0; $i<count($types); $i++){
		if($types[$i] == ""){ //empty asset type
		}
		else{
			//store values for objects
			$notification=$xml->createElement("notification");
			$type=$xml->createElement("type", $types[$i]);
			$threshold=$xml->createElement("threshold", $thresholds[$i]);
			
			//append attributes
			$notification->appendChild($type);
			$notification->appendChild($threshold);
			
			//append child object to root
			$rootTag->appendChild($notification);
			
		}
	}
		
	//save new XML
	$xml->formatoutput = true;
		
	$xml->save("settings_config.xml");
	
?>