<?php
//Home Index

	require('/app/web/connect.php');

	session_start(); //start user session to send data between pages
	
	if(empty($_SESSION["userType"])){
		header('Location: /');
	}

	//retrieve monitoring_settings
	$query = "SELECT * FROM monitoring_settings WHERE name='notifications';";
	$item = array(); //array for assets
	$rs = pg_query($conn, $query); //run query

	while ($item = pg_fetch_assoc($rs)){ //fetch and fill array
		$monitoring_setting = $item['status'];
	}

	if($monitoring_setting == "ON"){
	
		$types = [];
		$thresholds = [];
		$alerts = [];

		//retrieve notification_settings
		$query = "SELECT * FROM notification_settings;";
		$item = array(); //array for assets
		$rs = pg_query($conn, $query); //run query

		while ($item = pg_fetch_assoc($rs)){ //fetch and fill array
			array_push($types, $item['type']);
			array_push($thresholds, $item['threshold']);
		}
		
		$num_of_notifications = sizeof($types);
		$index = 0;
		//check alerts/notifications
		for($i=0; $i<$num_of_notifications; $i++){
			//query for count of items with matching type
			$query = "SELECT * FROM assets WHERE asset_type='{$types[$index]}';";
			$rs = pg_query($conn, $query); //run query

			$type_total = floatval(pg_num_rows($rs)); //fetch result
		
			//query for count of items with matching type and assigned is empty
			$query = "SELECT * FROM assets WHERE asset_type='{$types[$index]}' AND assigned='';";
			$rs = pg_query($conn, $query); //run query

			$available_total = floatval(pg_num_rows($rs)); //fetch result
		
			//calculate if threshold is reached
			$calculation = 100 * floatval($available_total / $type_total);

			//if threshold reached
			if(floatval($calculation) <= floatval($thresholds[$index]) ){
				//append type to the alerts array
				array_push($alerts, $types[$index]);
			}
			$index++;
		}
	}
	
?>
<html>

<head>
    <title>Meridian Inventory</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/Navigation-with-Search1.css">
	<link rel="stylesheet" href="assets/css/table_width.css">
	
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
	
	<!-- Toastr Extensions -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"></link>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

	<!-- DataTable Javascript Implementation -->
	<script type="text/javascript">
	$(document).ready(function() {
		$('#assets').DataTable(
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

				var alerts = <?php echo json_encode($alerts, JSON_PRETTY_PRINT) ?>;
				var message = "Alert: Threshold reached for ";

                var total_alerts = alerts.length;
				for(i=0; i<total_alerts; i++){
					toastr.options.timeOut = 0;
					toastr.options.closeButton = true;
					toastr.error(message.concat(alerts[i]));
				}	
		
	});
	

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
			<table id="assets" class="display" cellspacing="0" style="width:100%;">
				<thead>
                    <tr>
                      	<th>Name</th>
			    		<th>Asset Type</th>
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
							<td>'.$item['asset_type'].'</td>
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

</body>
	
	

</html>
