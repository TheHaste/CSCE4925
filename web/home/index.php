<?php
//Home Page Index

require('/app/web/connect.php');

session_start(); //start user session to send data between pages

if($_SESSION["userType"] == 'admin'){ //if admin button is pressed
	$edit = true;
	$delete = true;
	$save = true;
}
else if($_SESSION["userType"] == 'user'){
	$edit = false;
	$delete = false;
	$save = false;
}



?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	
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
        <nav class="navbar navbar-default navigation-clean" style="background-color:rgb(72,143,174);min-width:0px;max-width:10001px;margin-right:0px;margin-top:-51px;">
            <div class="container">
              <div class="navbar-header"><a class="navbar-brand" href="/home">Meridian Solutions</a><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
			  </div>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav navbar-right" style="margin-top:0px;margin-right:-20px;">
					   <?php if($_SESSION["userType"] == 'admin') { ?><li role="presentation"><a href="/add_item" style="color:rgb(51,51,51);">Add Item</a></li><?php } ?> <!-- if an admin, show add item button -->
                        <li role="presentation"><a href="/search_item" style="color:rgb(51,51,51);">Search Item</a></li>
						<?php if($_SESSION["userType"] == 'admin') { ?><li role="presentation"><a href="/settings" style="color:rgb(51,51,51);">Settings </a></li><?php } ?> <!-- if an admin, show settings button -->
						<li role="presentation"><a href="/reports" style="color:rgb(51,51,51);">Reports </a></li>
                        <li role="presentation"><a href="/logout.php" style="color:rgb(51,51,51);">Logout </a></li>							
                    </ul>
				</div>
			</div>
		</nav>
    </div>
    <div class="col-md-10 col-md-offset-1" style="width:900px;margin-bottom:0px;margin-top:58px;padding-right:21px;padding-left:-0px;padding-top:-33px;"><link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

<div class="container">
    <div class="row">
   
    
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Meridian Inventory</h3>
                  </div>
                </div>
              </div>
			  
              <div class="panel-body">
                <table id="assets" class="table table-striped table-bordered table-hovered">
                  <thead>
                    <tr>
                        <th>Name</th>
                        <th>Serial Number</th>
						<th>Brand </th>
						<th>Model </th>
						<th>Assigned</th>
						<th>Location</th>
						<th>Cost</th>
						<th>Date Deployed</th>
						<th>Date Surplused</th>
						<th>Last Updated</th>
					</tr> 
				  </thead>

                   <tbody>
					
					<?php
						//fill table
						$query = "SELECT * FROM assets;";
						$item = array(); //array for assets

						$rs = pg_query($conn, $query); //run query

						while ($item = pg_fetch_assoc($rs)) //fetch and fill array
						{
							echo '
							<tr>
							<td>'.$item['name_id'].'</td>
							<td>'.$item['serial_number'].'</td>
							<td>'.$item['brand'].'</td>
							<td>'.$item['model'].'</td>
							<td>'.$item['assigned'].'</td>
							<td>'.$item['location'].'</td>
							<td>'.$item['cost'].'</td>
							<td>'.$item['date_deployed'].'</td>
							<td>'.$item['date_surplused'].'</td>
							<td>'.$item['last_updated'].'</td>
							</tr> 
							'; 
						}
					?>
					 
                   </tbody>
				  
                </table>
			  
			  </div>
			</div>	  
		</div>
	</div>
        <div style="height:10px;"></div>
</div>

	<script type="text/javascript"> $(document).ready(function(){
    $('#assets').DataTable();
});
		</script>
	
	
    
</body>

</html>
