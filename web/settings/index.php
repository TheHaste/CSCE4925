<?php 
	
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
	<link rel="stylesheet" href="assets/css/Navigation-with-Search1.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
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
              <div class="navbar-header"><a class="navbar-brand" href="/home"><img src="/assets/img/big_logo_tiny.png"></a><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
			  </div>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav navbar-right" style="margin-top:0px;margin-right:-20px;">
                        <?php if($_SESSION["userType"] == 'admin') { ?><li role="presentation"><a href="/edit_table" style="color:rgb(51,51,51);">Edit Table</a></li> <?php } ?> <!-- if an admin, show button -->
						<?php if($_SESSION["userType"] == 'admin') { ?><li role="presentation"><a href="/settings" style="color:rgb(51,51,51);">Settings </a></li><?php } ?> <!-- if an admin, show button -->
						<li role="presentation"><a href="/reports" style="color:rgb(51,51,51);">Reports </a></li>
                        <li role="presentation"><a href="/logout.php" style="color:rgb(51,51,51);">Logout </a></li>							
                    </ul>
				</div>
			</div>
		</nav>
    </div>
    <div style="height:25px;"></div>
    <h1 style="margin-right:0px;margin-left:20px;font-size:42px;">Settings</h1>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 style="font-size:25px;">Notifications</h1>
                    <p style="color:rgba(61,67,74,0.89);font-size:14px;">When creating Notifications, enter your asset type and select a threshold. Once the threshold is met, you will receive a notification.</p>
                    <div><label>Type</label><input type="text" style="margin-left:10px;"><button class="btn btn-danger" type="button" style="margin-right:0px;margin-left:15px;">Delete</button></div><button class="btn btn-primary" type="button" style="background-color:rgb(30,61,88);margin-bottom:0px;margin-top:16px;">+ Add</button>
                    <div
                        style="height:10px;"></div>
            </div>
            <div class="col">
                <h1 style="font-size:25px;">Monitoring;</h1>
                <p style="color:rgba(61,67,74,0.89);font-size:14px;">Turn monitoring of Logs and Notifications on and off.</p>
                <div></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1"><label class="form-check-label" for="formCheck-1">System Logging</label></div>
                <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-2"><label class="form-check-label" for="formCheck-2">Notifications</label></div>
                <div style="margin-top:14px;"></div>
            </div>
        </div>
    </div>
    </div>
    <div style="margin-top:10px; width:100px; margin:0 auto;"><button class="btn btn-success" type="submit" style="width:100px;">Save</button></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>