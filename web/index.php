<?php
session_start(); //start user session to send data between pages

if($_POST['admin'] == 'Admin Button'){ //if admin button is pressed
	$_SESSION["userType"] = 'admin';
	header('Location: /home/home.php');
}

if($_POST['user'] == 'User Button'){ //if user button is pressed
	$_SESSION["userType"] = 'user';
	header('Location: /home/home.php');
}

?>





<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gigano login page</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Login-Center.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="container">
        <div class="row row-login" style="margin-left:-25px;">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <h1 class="text-center">Meridian Solutions</h1>
                <div class="well">
                    <h3 class="text-danger" style="margin:20px;margin-right:20px;margin-bottom:20px;margin-left:20px;">Login </h3>
                    <form>
                        <div class="form-group"><label class="control-label">Username </label><input class="form-control" type="text"></div>
                        <div class="form-group"><label class="control-label">Password </label><input class="form-control" type="password"></div>
                        <div class="form-group">
                            <div class="checkbox"><label class="control-label"><input type="checkbox">Remember me</label></div>
                        </div><button class="btn btn-success btn-block" type="submit">LOGIN </button><a class="btn btn-link center-block" role="button" href="#">Forget Password?</a></form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
