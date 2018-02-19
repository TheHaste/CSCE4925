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

//fill table
$query = "SELECT * FROM assets;";
$item = array(); //array for assets

$rs = pg_query($conn, $query); //run query

while ($line = pg_fetch_assoc($rs)) //fetch and fill array
{
	$item[] = $line;
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,900i&amp;subset=cyrillic,latin-ext">
    <link rel="stylesheet" href="assets/css/Article-Dual-Column.css">
    <link rel="stylesheet" href="assets/css/Data-Table.css">
    <link rel="stylesheet" href="assets/css/Data-Table2.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Text-Input.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/MUSA_panel-table.css">
    <link rel="stylesheet" href="assets/css/MUSA_panel-table1.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search1.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/thumbnails1.css">
	
	<!-- Data Tables -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-html5-1.5.1/cr-1.4.1/kt-2.3.2/r-2.2.1/sc-1.4.4/sl-1.2.5/datatables.min.css"/>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-html5-1.5.1/cr-1.4.1/kt-2.3.2/r-2.2.1/sc-1.4.4/sl-1.2.5/datatables.min.js">
	$(document).ready( function () {
    $('#table_id').DataTable();
} );</script>
	
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
                <table id="table_id" class="table table-striped table-bordered table-list">
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
					<tr>
                        <td><?php echo $item[0]['name_id'];?></td>
                        <td><?php echo $item[0]['serial_number'];?></td>
						<td><?php echo $item[0]['brand'];?></td>
                        <td><?php echo $item[0]['model'];?></td>
						<td><?php echo $item[0]['assigned'];?></td>
						<td><?php echo $item[0]['location'];?></td>
						<td><?php echo $item[0]['cost'];?></td>
						<td><?php echo $item[0]['date_deployed'];?></td>
						<td><?php echo $item[0]['date_surplused'];?></td>
						<td><?php echo $item[0]['last_updated'];?></td>	
					</tr>  
                   </tbody>
				  
                </table>
			  
			  </div>
			</div>
		
		$(document).ready( function () {
    $('#table_id').DataTable();
} );

	</div>
</div>
        <div style="height:10px;"></div>
    </div>
    <div></div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    
</body>

</html>


