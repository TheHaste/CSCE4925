<?php


require('/app/web/connect.php');


session_start(); //start user session to send data between pages

//queries all laptops in database search for the word LP
//$countLP holds total number of laptops

if(isset($_POST['save']))
{
	if(isset($_POST['Laptops']['10%']));
	{
	$LPquery = "SELECT * FROM assets WHERE name_id LIKE '%LT%'"; 
	$Laptops = array(); //array for assets
	$rs = pg_query($conn, $LPquery); //run query
	$countLP = pg_num_rows($rs); //counts the number of rows
	while ($line = pg_fetch_assoc($rs)) //fetch and fill array
{
	$Laptops[] = $line;
	
	
}



	//Get null values in assigned column 
	//Unassignedquery holds total number of unassigned Laptops in the database
	
	
	$UnassignedQuery = "SELECT* FROM assets WHERE assigned IS NULL";
	//echo $query1;
	$UnassignedLP = array(); //array for assets
	$rs = pg_query($conn, $UnassignedQuery); //run query
	$countUnassigned = pg_num_rows($rs); //counts the number of rows
		while ($line = pg_fetch_assoc($rs)) //fetch and fill array
{
	$UnassignedLP[] = $line;
	
	
}


	$countLP = $countLP * .1;
	//echo " the number is " .$countLP; 

	if($countUnassigned < $countLP)
	{
		$message = "LAPTOPS ARE LESS 10% OF INVENTORY!";
		
		pg_close($conn);
				
				//header('Location: /home/'); //redirect to home page

	}
	
}
}

?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meridian Inventory</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Article-Dual-Column.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Text-Input.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search1.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/thumbnails1.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<!--Nav bar settings-->
<body style="padding-left:-1px;">
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
	<?php if(isset($message)){ ?><div style="text-center;height:50px; padding-left:525px" class="alert alert-danger" role="alert"> <?php echo "WARNING: {$message}"; ?> </div><?php } ?>
			<div class="row row-login">
    <div style="height:15px;"></div>
    <div style="max-width:-7px;min-width:3px;">
        <div class="container">
            <div class="row" style+"width:983px;">
                <div class="col-md-6" style="width:240px;height:380px;padding-left:535px;"><img src="/assets/img/login_logo.png" style="margin-bottom:0px;margin-top:91px;margin-left:-165px;margin-right:0px;width:492px;"></div>
                <div class="col-md-12" style="width:10px;">
                    <div></div>
                </div>
                <div class="col-md-6" style="width:750px;">
                    <div class="row" style="padding:77px;padding-right:83px;padding-left:163px;width:917px;">
                        <div class="col-md-12" style="width:910px;">
                            <div></div>
                        </div>
                        <div class="col-md-4" style="width:250px;height:250px;">
                            <div style="height:11px;"></div><form class="form-inline">
							
  <div class="form-group">
    
     <select class="form-control" >
	  
	     <form action = "index.php" method = "POST">
		
		<option selected hidden value="Notifications">Notify</option>
        <option value = "Laptops"> Laptops </option>
		
      </select>
	  
  </div>
</form></div>


<div class="col-md-4" style="width:250px;height:250px;margin-left:715px;margin-top:-249px;margin-right:55px;">
<div style="height:11px;"></div><form class="form-inline"><div class="form-group">


	
     <select class="form-control">
	     <form action = "index11.php" method = "post">
	 	<option selected hidden>Threshold</option>
        <option value = "10%">10%</option>
		
		
      </select>
  </div>
</form></div>

                        <div class="col-md-4" style="width:473px;height:239px;margin-right:-6px;padding-right:8px;margin-top:5px;">
							 <div style="height:-30px;"></div><button class="btn btn-default" type="button" style="width:150px;margin-left:326px;margin-top:-50px;margin-right:0px;">LogsOff</button>
							
							<form action = "index.php" method = "post" id = "save"
							
                            <div style="height:11px;"></div><button class="btn btn-default" type="submit" name = "save" style="width:150px;margin-left:340px;margin-top:-3px;margin-right:0px;">Save</button>
							<!--<button class="btn btn-default" type="button" style="width:150px;margin-left:621px;margin-top:-496px;margin-right:5px;">Notifications</button></div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
	</form>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>