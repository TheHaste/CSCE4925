<?php
$servername = "ec2-54-235-244-185.compute-1.amazonaws.com";
$username = "wseudmwqkwlvhe";
$password = "68662358186783d87ddb7c2f1676eff1c5eb41678bb8cc8b9b16ea1e420abc2b";
$dbname = "d8u7tvrq18kkt";

// Create connection
$conn = pg_connect("host=ec2-54-227-243-210.compute-1.amazonaws.com dbname=d3f2mm484o32jn user=tdqtwhcckycshu password=5d86125f0d185bf2918a76dca2adcd104f4a452b71cbcefe831f1d2bd65e98ee");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//else{
		//echo "Database connection works!!!!";
	
	
//}

?>

























