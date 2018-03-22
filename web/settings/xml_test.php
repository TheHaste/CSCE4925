<?php

//INSERT SYNTAX
	if(isset($_POST[])){
		//create XML object
		$xml = new DomDocument('1.0', "UTF-8");
		$xml->load('settings_config.xml');
		
		/* STORE VARIABLES HERE FOR SETTINGS */
		
		//get the root tag
		$rootTag = $xml->getElementByTagName("settings")->$item(0);
		
		//create child objects
		$notification=$xml->createElement("notification");
			$type=$xml->createElement("type", /*TYPE OF ASSET*/);
			$threshold=$xml->createElement("threshold", /*THRESHOLD PERCENTAGE*/);
			
		//append attributes
		$notification->appendChild($type);
		$notification->appendChild($threshold);
		
		//append child object to root
		$rootTag->appendChild($notification);
		
		$xml->formatoutput = true;
		
		$xml->save("settings_config.xml");	
	}
	
	
//DELETE SYNTAX

	if(isset($_POST[])){
		//create XML object
		$xml = new DomDocument('1.0', "UTF-8");
		$xml->load('settings_config.xml');
		
		/* STORE VARIABLES HERE FOR SETTINGS */

		$xpath = new DOMXPATH($xml);
		
		foreach($xpath->query("/settings/notification[type = *TYPE OF ASSET*]") as $node){ //remove nodes necessary
			$node->parentNode->removeChild($node);
		}
		
		$xml->formatoutput = true;
		
		$xml->save("settings_config.xml");	
	}
	
	
//PARSE XML DATA SYNTAX
//link: https://www.youtube.com/watch?v=EN0I3DbvUYw

	if(file_exists('settings_config.xml')){
		$xml = simplexml_load_file('settings_config.xml');
		
		//access a variable
		$type = $xml->notification[0]->type;
		$threshold = $xml->notification[0]->threshold;
	}
	else{
		echo "Error: Missing Settings Configuration file";
	}

?>