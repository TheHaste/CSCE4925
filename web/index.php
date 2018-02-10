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
    <title>login page</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Login-Center.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="container">
        <div class="row row-login" style="padding-bottom:-2px;padding-left:-5px;padding-top:100px;">
            <div class="col-10 col-sm-6 col-md-4 offset-1 offset-sm-3 offset-md-4 offset-lg-5">
                <h1 class="text-center">Meridian Solutions</h1>
                <div class="card">
                    <div class="card-body">
                        <h3 class="text-danger">Login </h3>
                        <form>
                            <div class="form-group"><label>Username </label><input class="form-control" type="text"></div>
                            <div class="form-group"><label>Password </label><input class="form-control" type="password"></div><button class="btn btn-success btn-block" type="submit">LOGIN </button></form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
