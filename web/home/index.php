<?php
require('/app/web/connect.php');

session_start(); //start user session to send data between pages

if($_SESSION["userType"] == 'admin'){ //if admin button is pressed
	echo "Hello I'm an admin!!!";
}
else if($_SESSION["userType"] == 'user'){
	echo "Hello I am a standard user!!";
}

?>