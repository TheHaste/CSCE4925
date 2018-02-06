<?php
//require('/app/web/index-html/test.php'); <----> Do NOT Delete

session_start(); //start user session to send data between pages

if(isset($_POST['Admin Button'])){ //if admin button is pressed
	$_SESSION["userType"] = 'admin';
	header('location: /app/web/home/home.php');
}

if(isset($_POST['User Button'])){ //if user button is pressed
	$_SESSION["userType"] = 'user';
	header('location: /app/web/home/home.php');
}

?>



<html>




<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Login-Center.css">
    <link rel="stylesheet" href="/styles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css"/>
	 <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	 <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row row-login" style="margin-left:-25px;">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <h1 class="text-center">Giganto Asset Management</h1>
                <div class="well">
                    <form method= "post">
                     <!--   <div class="form-group"><label class="control-label">Username </label><input class="form-control" type="text"></div>
                        <div class="form-group"><label class="control-label">Password </label><input class="form-control" type="password"></div>
					-->	<button class="btn btn-success btn-block" type="submit" name="Admin Button" value='admin' style="margin-bottom:21px;margin-top:19px;">Admin Login</button>
						<div style="height:15px"></div>
					    <button class="btn btn-success btn-block" type="submit" name="User Button" value='user' style="margin-bottom:21px;margin-top:19px;">User Login</button>
					<!-- <a class="btn btn-link center-block" role="button" href="#">Forget Password?</a> -->
					</form>
                </div>
            </div>
        </div>
    </div>
    <script src="/js/jquery-1.12.4.min.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <script id="bs-live-reload" data-sseport="50697" data-lastchange="1516477633766" src="/js/livereload.js"></script>
</body>

</html>
