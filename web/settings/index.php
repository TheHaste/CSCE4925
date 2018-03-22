<?php 
	session_start(); //start user session to send data between pages
	
	
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/Navigation-with-Search1.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
	
	<script type="text/javascript">
	
	$(document).ready(function() {
		
	});
	
	</script>
	
	<script type="text/javascript">
	function addNotification(){
		$("#notifications-block").append('<div><label>Type</label><input type="text" style="margin-left:10px;"> <select style="margin-left:5px; height:27px; width:55px; " name="percent"> <option value="10">10%</option> <option value="20">20%</option> option value="30">30%</option> <option value="40">40%</option> <option value="50">50%</option> <option value="60">60%</option> <option value="70">70%</option> <option value="80">80%</option> <option value="90">90%</option> </select> <button class="btn btn-danger" type="button" style="height:20px; vertical-align: middle; margin-left:50px;">X</button> </div>');
	}

	</script>
	
	<script type="text/javascript"> 
	function deleteNotification(){
		
	}

</script>


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
                        <?php if($_SESSION["userType"] == 'admin') { ?><li role="presentation"><a href="/edit_table" style="color:rgb(51,51,51);">Edit Table</a></li> <?php } ?>  <!-- if an admin, show settings button -->
						<?php if($_SESSION["userType"] == 'admin') { ?><li role="presentation"><a href="/settings" style="color:rgb(51,51,51);">Settings </a></li> <?php } ?> <!-- if an admin, show settings button -->
						<li role="presentation"><a href="/reports" style="color:rgb(51,51,51);">Reports </a></li>
                        <li role="presentation"><a href="/logout.php" style="color:rgb(51,51,51);">Logout </a></li>							
                    </ul>
				</div>
			</div>
		</nav>
    </div>
    <div style="height:25px;"></div>
    <div style="width:150px;margin:0 auto;"><h1 style="font-size:42px; ">Settings</h1></div>
	 <div style="height:15px;"></div>
    <div>
	  <form>
		<div class="container">
			<div class="row">
				<div class="col-md-6" style="border-right:double; border-color:black;">
						<h1 style="font-size:25px;">Notifications</h1>
						<p style="color:rgba(61,67,74,0.89);font-size:14px;">When creating Notifications, enter your asset type and select a threshold. Once the threshold is met, you will receive a notification.</p>
						<div id="notifications-block">
							<!--<div><label>Type</label><input type="text" style="margin-left:10px;">
								<select style="margin-left:5px; height:27px; width:55px; " name="percent">
									<option value="10">10%</option>
									<option value="20">20%</option>
									<option value="30">30%</option>
									<option value="40">40%</option>
									<option value="50">50%</option>
									<option value="60">60%</option>
									<option value="70">70%</option>
									<option value="80">80%</option>
									<option value="90">90%</option>
								</select>
								<button class="btn btn-danger" type="button" style="flat:right; margin-left:50px;">Delete</button>
							</div> -->
						</div>
						<button class="btn btn-primary" type="button" style="background-color:rgb(30,61,88);margin-bottom:0px;margin-top:16px;" onclick="addNotification()" name="Add">+ Add</button>
						<div
							style="height:10px;">
						</div>
				</div>
				<div class="col-md-6" style="">
					<h1 style="font-size:25px;">Monitoring</h1>
					<p style="color:rgba(61,67,74,0.89);font-size:14px;">Turn monitoring of Logs and Notifications on or off.</p>
					<div></div>
					<div class="form-check"><input class="form-check-input" type="checkbox" id="logs"><label class="form-check-label" > System Logging</label></div>
					<div class="form-check"><input class="form-check-input" type="checkbox" id="notifications"><label class="form-check-label" > Notifications</label></div>
					<div style="margin-top:14px;"></div>
				</div>
			</div>
		</div>
	  </form>
    </div>
    <div style="margin-top:20px; width:100px; margin:0 auto;"><button class="btn btn-success" type="submit" style="width:100px;" name="Save">Save</button></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>