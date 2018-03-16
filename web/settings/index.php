<?php
//Reporting Index
require('/app/web/connect.php');
//require('Connecttodb_Users1.php');

session_start(); //start user session to send data between pages

/*$query = "SELECT * FROM assets;
$item = array(); //array for assets
$rs = pg_query($conn, $query); //run query
$count = pg_num_rows($rs); //counts the number of rows
while ($line = pg_fetch_assoc($rs)) //fetch and fill array
{
	$item[] = $line;
	
	
}*/

if(isset($_POST['Save_Settings']))
{
	$selected_val = $_POST['help'];
	
	//echo "You selected:" .$selected_val;
	
	
 if(isset($_POST['Save_Settings']))

	$selected_val2 = $_POST['hello'];
		//echo "You selected:" .$selected_val2;
		
		
}








?>
<html>

<head>
    <title>Meridian Inventory</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/Navigation-with-Search1.css">
	
	<!-- DataTable Extensions -->
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"></link> 
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></link>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- DataTable Buttons Extensions -->
	<link rel="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css"></link>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.bootstrap.min.js"></script>	
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

	<!-- DataTable Javascript Implementation -->
	<script type="text/javascript">
	$(document).ready(function() {
		$('#name_info').DataTable(
		 {
			dom: 'Bfrtip',
			lengthMenu: [
				[ 10, 25, 50, -1 ],
				[ '10 rows', '25 rows', '50 rows', 'Show all' ]
			],
			buttons: [
				'pageLength',
				{extend: 'pdf',
					text: 'Export to PDF',
					filename: 'Meridian Inventory',
					exportOptions: {
						modifier: {
							page: 'current'
						}
					}
				},
				{extend: 'excel',
					text: 'Export to Excel',
					filename: 'Meridian Inventory',
					exportOptions: {
						modifier: {
							page: 'current'
						}
					}
				}
			]
		});	
	
		$('#report').submit(function() {
			if(document.getElementById('Notification').checked){
				
				var Laptops= document.getElementById('Laptops').value
				
				
				/*$.post('/reports/scripts/run_report.php', {type: 'inventory',
					Laptops: Laptops,
					}, function(){
						window.location.replace("/reports/inventory_report/");
				});*/
				
			}
			else if(document.getElementById('logReport').checked){
				var logusername = document.getElementById('logusername').value
				var logaction = document.getElementById('logaction').value
				var logdate = document.getElementById('logdate').value
				
				/*$.post('/reports/scripts/run_report.php', {type: 'logs',
					logusername: logusername,
					logaction: logaction,
					logdate: logdate}, function(){
						window.location.replace("/reports/logs_report/");
				});*/
			}
			else {
				alert("You did not choose a report type! Please check the box next to the report you want to run.");
			}
		});
	
	});
	
</script>

<script type="text/javascript">
	function showHideNotificationInfo(){
		if(document.getElementById('Notification').checked){
			document.getElementById('inventory').style.display='block';
			document.getElementById('logs').style.display='none';
			$('#Threshold').prop('checked', false);
		}
		else{
			document.getElementById('inventory').style.display='none';
		}
	}
</script>

<script type="text/javascript">
	function showHideThresholdInfo(){
		if(document.getElementById('Threshold').checked){
			document.getElementById('logs').style.display='block';
			document.getElementById('inventory').style.display='none'
			$('#Notification').prop('checked', false);
		}
		else{
			document.getElementById('logs').style.display='none';
		}
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

<div class="container">
	<div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Meridian Inventory</h3>
                  </div>
                </div>
              </div>
			  <div class="panel-body">
			<table id="name_info" class="display" cellspacing="0" width="100%">
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
							//$item[] = $line;
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
  <div>
        <div class="container">
            <div class="col-md-12" style="height:40px;">
                <p class="help-block">Choose your report type and select fields to filter your report. When filtering one field with multiple criteria, separate with a comma.</p>
			</div>
		<form action="index.php" method="post" id="report">
            <div class="col-md-12" style="height:40px;">
				<button class="btn btn-default" type="submit" name="Save_Settings">Save Settings</button>
				<button class="btn btn-default" type="submit" name="Logs_Off" >Logs Off</button>
				<!--<input onclick="change()" type="button" value="Logs Off" id="myButton1">-->

			</div>
            <div class="row">
                <div class="col-md-6">
                    <div class="checkbox"><label style="font-size:22px;"><input type="checkbox" id="Notification" name="Notification" value="yes" onclick="showHideNotificationInfo()"><strong>Notification</strong></label></div>
                </div>
                <div class="col-md-6">
                    <div class="checkbox"><label style="font-size:22px;"><input type="checkbox" id="Threshold" name="Threshold" value="yes" onclick="showHideThresholdInfo()"><strong>Threshold</strong></label></div>
                </div>
            </div>
        </div>
    </div>
	<div>
        <div class="container">
            <div class="row">
			  
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <header>
                                <div></div>
                            </header>
                            <div>
							 <fieldset id="inventory"  style="display: none">
                                <div class="checkbox"><label>  <input type="checkbox" name="help" value="Laptops">Laptops</label></div>
							 </fieldset>
							</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <header></header>
                            <div>
							  <fieldset id="logs" style="display: none">
                                <div class="checkbox"><label>  <input type="checkbox" name= "hello" value="10">10%</label></div>
                                
							  </fieldset>
							</div>
                        </div>
                    </div>
                </div>
			  </form>
            </div>
        </div>
        <div style="height:50px;"></div>
    </div>
	

</body>
	
	

</html>
