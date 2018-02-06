<?php
//require('/app/web/index-html/test.php'); <----> Do NOT Delete

session_start(); //start user session to send data between pages

if($_SESSION["userType"] == 'Admin'){ //if admin button is pressed
	echo "Hello I'm an admin!!!";
}
else if($_SESSION["userType"] == 'User'){
	echo "Hello I am a standard user!!";
}

?>