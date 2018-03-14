<?php 
	
	require('/app/web/connect.php');
	session_start(); //start user session to send data between pages

?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meridian Inventory</title>
	
	<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
	
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
	
	<!-- DataTable Extensions -->
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
	} );
	

</script>
	
</head>

<body>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
					<table id="assets" class="display" cellspacing="0" width="100%">
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
    </div>
    <div>
        <div class="container">
            <div class="col-md-12">
                <p class="help-block">Choose your report type and select fields to filter your report. When filtering one field with multiple criteria, separate with a comma.</p>
            </div>
            <div class="col-md-12"><button class="btn btn-default" type="button">Run Report</button></div>
            <div class="row">
                <div class="col-md-6">
                    <div class="checkbox"><label style="font-size:22px;"><input type="checkbox"><strong>Inventory Report</strong></label></div>
                </div>
                <div class="col-md-6">
                    <div class="checkbox"><label style="font-size:22px;"><input type="checkbox"><strong>System Log Report</strong></label></div>
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
                                <div class="checkbox"><label><input type="checkbox">Serial Number</label></div><input type="text">
                                <div class="checkbox"><label><input type="checkbox">Brand</label></div><input type="text">
                                <div class="checkbox"><label><input type="checkbox">Model</label></div><input type="text">
                                <div class="checkbox"><label><input type="checkbox">Assigned User</label></div><input type="text">
                                <div class="checkbox"><label><input type="checkbox">Location</label></div><input type="text">
                                <div class="checkbox"><label><input type="checkbox">Cost</label></div><input type="text">
                                <div class="checkbox"><label><input type="checkbox">Date Deployed</label></div><input type="date">
                                <div class="checkbox"><label><input type="checkbox">Date Surplused</label></div><input type="date">
                                <div class="checkbox"><label><input type="checkbox">Last Updated</label></div><input type="date"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <header></header>
                            <div>
                                <div class="checkbox"><label><input type="checkbox">Username</label></div><input type="text">
                                <div class="checkbox"><label><input type="checkbox">Action</label></div><input type="text">
                                <div class="checkbox"><label><input type="checkbox">Date</label></div><input type="date"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="height:50px;"></div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>