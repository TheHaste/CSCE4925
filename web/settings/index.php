
<html>

<head>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/Navigation-with-Search1.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Login-Center.css">
    <link rel="stylesheet" href="assets/css/styles.css">
	<script src="assets/js/jquery.min"></script>
	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header"><a class="navbar-brand" href="#"> </a><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
            <div
                class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right"></ul>
        </div>
        </div>
    </nav>
    <div>
	<!--Nav bar settings-->
        <nav class="navbar navbar-default navigation-clean" style="background-color:rgb(72,143,174);min-width:0px;max-width:100%;margin-right:0px;margin-top:-51px;">
            <div class="container">
              <div class="navbar-header"><a class="navbar-brand" href="/home">Meridian Solutions</a><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
			  </div>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav navbar-right" style="margin-top:0px;margin-right:-20px;">
					   
                        <?php if($_SESSION["userType"] == 'admin') { ?><li role="presentation"><a href="/edit_table" style="color:rgb(51,51,51);">Edit Table</a></li> <?php } ?>  <!-- if an admin, show settings button -->
						<?php if($_SESSION["userType"] == 'admin') { ?><li role="presentation"><a href="/settings" style="color:rgb(51,51,51);">Settings </a></li> <?php } ?> <!-- if an admin, show settings button -->
						<li role="presentation"><a href="/reports" style="color:rgb(51,51,51);">Reports </a></li>
                        <li role="presentation"><a href="/logout.php" style="color:rgb(51,51,51);">Logout </a></li>							
                    </ul>
				</div>
			</div>
		</nav>
    </div>

<div class="container">
	<div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Meridian Inventory</h3>
                  </div>
                </div>
              </div>










