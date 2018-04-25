<?php 
	session_start(); //start user session to send data between pages
	
	if(empty($_SESSION["userType"])){
		header('Location: /');
	}
	
	$conn = pg_connect("host=ec2-54-227-243-210.compute-1.amazonaws.com dbname=d3f2mm484o32jn user=tdqtwhcckycshu password=5d86125f0d185bf2918a76dca2adcd104f4a452b71cbcefe831f1d2bd65e98ee"); 
	
	//populate settings SESSION
	$_SESSION['settings'] = [];
	$types = [];
	$thresholds = [];
	$monitoring_settings = [];
		
	//retrieve monitoring_settings
	$query = "SELECT * FROM monitoring_settings;";
	$item = array(); //array for assets
	$rs = pg_query($conn, $query); //run query

	while ($item = pg_fetch_assoc($rs)){ //fetch and fill array
		array_push($monitoring_settings, $item['status']);
	}
				
	//retrieve notification_settings
	$query = "SELECT * FROM notification_settings;";
	$item = array(); //array for assets
	$rs = pg_query($conn, $query); //run query

	while ($item = pg_fetch_assoc($rs)){ //fetch and fill array
		array_push($types, $item['type']);
		array_push($thresholds, $item['threshold']);
	}
				
	$settings = array($types, $thresholds, $monitoring_settings[0], $monitoring_settings[1]);

	$_SESSION['settings'] = $settings; //save array of data to session
	
	pg_close($conn);

?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/Navigation-with-Search1.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
	
	<script type="text/javascript">
	
//	$(document).ready(function() {
		$('#settings-form').submit(function() {
			var types = [];
			
			$('#notifications-block input').each(function () {
				types.push(this.value);
			});
			
			var thresholds = [];
			
			$('#notifications-block option:selected').each(function () {
				thresholds.push(this.value);
			});
			
			if(document.getElementById('logs').checked){
				var system_logging = "ON";
			}
			else{
				var system_logging = "OFF";
			}
			
			if(document.getElementById('notifications').checked){
				var notifications = "ON";
			}
			else{
				var notifications = "OFF";
			}
			
			$.post('/settings/scripts/save_settings.php', {types: types, thresholds: thresholds, system_logging: system_logging, notifications: notifications}, function(){
				window.location.href = window.location.href;
			});
			
			
			
		});
//	});
	
	</script>
	
	<script type="text/javascript">
	function addNotification(){
		var div = document.createElement('div');
				
		div.innerHTML = '<label>Type</label><input type="text" style="margin-left:10px;"> <select style="margin-left:5px; height:27px; width:55px; "> <option value="10">10%</option> <option value="20">20%</option> <option value="30">30%</option> <option value="40">40%</option> <option value="50">50%</option> <option value="60">60%</option> <option value="70">70%</option> <option value="80">80%</option> <option value="90">90%</option> </select> <button class="btn btn-danger" type="button" style="padding:0px; width:25px; vertical-align: middle; margin-left:15px;" onclick="deleteNotification(this)">x</button>';
		
		document.getElementById('notifications-block').appendChild(div);
	}

	</script>
	
	<script type="text/javascript"> 
	function deleteNotification(input){
		document.getElementById('notifications-block').removeChild(input.parentNode); 
	}

	</script>


</head>

<body>
	<div style="height:50px"></div>
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
	  <form method="post" id="settings-form">
		<div class="container">
			<div class="row">
				<div class="col-md-6" style="border-right:double; border-color:black;">
						<h1 style="font-size:25px;">Notifications</h1>
						<p style="color:rgba(61,67,74,0.89);font-size:14px;">When creating Notifications, enter your asset type and select a threshold. Once the threshold is met, you will receive a notification.</p>
						<div id="notifications-block">
							<!-- Filled with PHP or via + Add button -->
							<?php 
								$index=0;
								for($i=0; $i<sizeof($_SESSION['settings'][0]); $i++){
									if(isset($_SESSION['settings'][0])){
										if($_SESSION['settings'][1][$index] == '10'){
											echo '<div><label>Type</label><input type="text" value="'.$_SESSION['settings'][0][$index].'" style="margin-left:10px;"> <select style="margin-left:5px; height:27px; width:55px; "> <option selected value="10">10%</option> <option value="20">20%</option> <option value="30">30%</option> <option value="40">40%</option> <option value="50">50%</option> <option value="60">60%</option> <option value="70">70%</option> <option value="80">80%</option> <option value="90">90%</option> </select> <button class="btn btn-danger" type="button" style="padding:0px; width:25px; vertical-align: middle; margin-left:15px;" onclick="deleteNotification(this)">x</button></div>';
										}
										else if($_SESSION['settings'][1][$index] == '20'){
											echo '<div><label>Type</label><input type="text" value="'.$_SESSION['settings'][0][$index].'" style="margin-left:10px;"> <select style="margin-left:5px; height:27px; width:55px; "> <option value="10">10%</option> <option selected value="20">20%</option> <option value="30">30%</option> <option value="40">40%</option> <option value="50">50%</option> <option value="60">60%</option> <option value="70">70%</option> <option value="80">80%</option> <option value="90">90%</option> </select> <button class="btn btn-danger" type="button" style="padding:0px; width:25px; vertical-align: middle; margin-left:15px;" onclick="deleteNotification(this)">x</button></div>';
										}
										else if($_SESSION['settings'][1][$index] == '30'){
											echo '<div><label>Type</label><input type="text" value="'.$_SESSION['settings'][0][$index].'"style="margin-left:10px;"> <select style="margin-left:5px; height:27px; width:55px; "> <option value="10">10%</option> <option value="20">20%</option> <option selected value="30">30%</option> <option value="40">40%</option> <option value="50">50%</option> <option value="60">60%</option> <option value="70">70%</option> <option value="80">80%</option> <option value="90">90%</option> </select> <button class="btn btn-danger" type="button" style="padding:0px; width:25px; vertical-align: middle; margin-left:15px;" onclick="deleteNotification(this)">x</button></div>';
										}
										else if($_SESSION['settings'][1][$index] == '40'){
											echo '<div><label>Type</label><input type="text" value="'.$_SESSION['settings'][0][$index].'"style="margin-left:10px;"> <select style="margin-left:5px; height:27px; width:55px; "> <option  value="10">10%</option> <option value="20">20%</option> <option value="30">30%</option> <option selected value="40">40%</option> <option value="50">50%</option> <option value="60">60%</option> <option value="70">70%</option> <option value="80">80%</option> <option value="90">90%</option> </select> <button class="btn btn-danger" type="button" style="padding:0px; width:25px; vertical-align: middle; margin-left:15px;" onclick="deleteNotification(this)">x</button></div>';
										}
										else if($_SESSION['settings'][1][$index] == '50'){
											echo '<div><label>Type</label><input type="text" value="'.$_SESSION['settings'][0][$index].'"style="margin-left:10px;"> <select style="margin-left:5px; height:27px; width:55px; "> <option value="10">10%</option> <option value="20">20%</option> <option value="30">30%</option> <option value="40">40%</option> <option selected value="50">50%</option> <option value="60">60%</option> <option value="70">70%</option> <option value="80">80%</option> <option value="90">90%</option> </select> <button class="btn btn-danger" type="button" style="padding:0px; width:25px; vertical-align: middle; margin-left:15px;" onclick="deleteNotification(this)">x</button></div>';
										}
										else if($_SESSION['settings'][1][$index] == '60'){
											echo '<div><label>Type</label><input type="text" value="'.$_SESSION['settings'][0][$index].'"style="margin-left:10px;"> <select style="margin-left:5px; height:27px; width:55px; "> <option value="10">10%</option> <option value="20">20%</option> <option value="30">30%</option> <option value="40">40%</option> <option value="50">50%</option> <option selected value="60">60%</option> <option value="70">70%</option> <option value="80">80%</option> <option value="90">90%</option> </select> <button class="btn btn-danger" type="button" style="padding:0px; width:25px; vertical-align: middle; margin-left:15px;" onclick="deleteNotification(this)">x</button></div>';
										}
										else if($_SESSION['settings'][1][$index] == '70'){
											echo '<div><label>Type</label><input type="text" value="'.$_SESSION['settings'][0][$index].'"style="margin-left:10px;"> <select style="margin-left:5px; height:27px; width:55px; "> <option value="10">10%</option> <option value="20">20%</option> <option value="30">30%</option> <option value="40">40%</option> <option value="50">50%</option> <option value="60">60%</option> <option selected value="70">70%</option> <option value="80">80%</option> <option value="90">90%</option> </select> <button class="btn btn-danger" type="button" style="padding:0px; width:25px; vertical-align: middle; margin-left:15px;" onclick="deleteNotification(this)">x</button></div>';
										}
										else if($_SESSION['settings'][1][$index] == '80'){
											echo '<div><label>Type</label><input type="text" value="'.$_SESSION['settings'][0][$index].'"style="margin-left:10px;"> <select style="margin-left:5px; height:27px; width:55px; "> <option value="10">10%</option> <option value="20">20%</option> <option value="30">30%</option> <option value="40">40%</option> <option value="50">50%</option> <option value="60">60%</option> <option value="70">70%</option> <option selected value="80">80%</option> <option value="90">90%</option> </select> <button class="btn btn-danger" type="button" style="padding:0px; width:25px; vertical-align: middle; margin-left:15px;" onclick="deleteNotification(this)">x</button></div>';
										}
										else if($_SESSION['settings'][1][$index] == '90'){
											echo '<div><label>Type</label><input type="text" value="'.$_SESSION['settings'][0][$index].'"style="margin-left:10px;"> <select style="margin-left:5px; height:27px; width:55px; "> <option value="10">10%</option> <option value="20">20%</option> <option value="30">30%</option> <option value="40">40%</option> <option value="50">50%</option> <option value="60">60%</option> <option value="70">70%</option> <option value="80">80%</option> <option selected value="90">90%</option> </select> <button class="btn btn-danger" type="button" style="padding:0px; width:25px; vertical-align: middle; margin-left:15px;" onclick="deleteNotification(this)">x</button></div>';
										}
									}
									$index++;
								}
							?>
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
					<?php if($_SESSION['settings'][2] == "ON"){ echo '<div class="form-check"><input class="form-check-input" checked="checked" type="checkbox" id="logs"><label class="form-check-label"> System Logging</label></div>';}else{ echo '<div class="form-check"><input class="form-check-input" type="checkbox" id="logs"><label class="form-check-label"> System Logging</label></div>'; }?>
					<?php if($_SESSION['settings'][3] == "ON"){ echo '<div class="form-check"><input class="form-check-input" checked="checked" type="checkbox" id="notifications"><label class="form-check-label"> Notifications</label></div>';}else{ echo '<div class="form-check"><input class="form-check-input" type="checkbox" id="notifications"><label class="form-check-label"> Notifications</label></div>'; }?>
					<div style="margin-top:14px;"></div>
				</div>
			</div>
		</div>
    </div>
	<div style="height:25px;"></div>
    <div style="margin-top:20px; width:100px; margin:0 auto;"><button class="btn btn-success" type="submit" style="width:100px;" name="Save">Save</button></div>
	</form>
</body>

</html>