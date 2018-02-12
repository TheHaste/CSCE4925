<?php
$servername = "ec2-54-235-244-185.compute-1.amazonaws.com";
$username = "wseudmwqkwlvhe";
$password = "68662358186783d87ddb7c2f1676eff1c5eb41678bb8cc8b9b16ea1e420abc2b";
$dbname = "d8u7tvrq18kkt";

// Create connection
$conn = pg_connect("host=ec2-54-235-244-185.compute-1.amazonaws.com dbname=d8u7tvrq18kkt user=wseudmwqkwlvhe password=68662358186783d87ddb7c2f1676eff1c5eb41678bb8cc8b9b16ea1e420abc2b");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//else{
		//echo "Database connection works!!!!";
	
	
//}

$query = "SELECT * FROM name_info;"; 

echo "conn = "; echo $conn;

$rs = pg_query($conn, $query); or die("Cannot execute query: $query\n");

$item = array();

while ($line = pg_fetch_assoc($rs))
	{
		$item[] = $line;
 	}

echo $item[0];
echo $item[0]['name_id'];

?>

























