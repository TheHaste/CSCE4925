<?php
require('/app/web/connect.php');

include("Editor-PHP-1.7.2/php/DataTables/DataTables.php" );

session_start(); //start user session to send data between pages

//var editor;		 
			   

//search page
?>
<html>

<head>
    <title>Edit Table</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/Navigation-with-Search1.css">
	
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"></link> 
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script> 
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"></link>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<!-- DataTable Editor Extensions -->
	<link rel="stylesheet" type="text/css" href="Editor-PHP-1.7.2/css/editor.dataTables.css">
	<link rel="stylesheet" type="text/css" href="Editor-PHP-1.7.2/css/select.bootstrap.min.css">
	<script type="text/javascript" src="Editor-PHP-1.7.2/js/dataTables.editor.js"></script>
	<script type="text/javascript" src="Editor-PHP-1.7.2/js/dataTables.select.min.js"></script>
	
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
		var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    var editor = new $.fn.dataTable.Editor( {
        ajax: 'web/edit_table/Editor-PHP-1.7.2/php/assets.php',
        table: '#assets',
        fields: [ {
                label: "Name:",
                name: "name_id"
            }, {
                label: "Serial Number:",
                name: "serial_number"
            }, {
                label: "Brand:",
                name: "brand"
            }, {
                label: "Model:",
                name: "model"
            }, {
                label: "Assigned User:",
                name: "assigned"
            }, {
                label: "Location:",
                name: "location",
            }, {
                label: "Cost:",
                name: "cost"
			}, {
                label: "Date Deployed:",
                name: "date_deployed"
			}, {
                label: "Date Surplused:",
                name: "date_surplused"
            }, {
                label: "Last Updated:",
                name: "last_updated"
            },
        ]
    } );
 
    $('#assets').DataTable( {
        dom: "Bfrtip",
        columns: [
			{ data: "id" },
            { data: "name_id" },
            { data: "serial_number" },
            { data: "brand" },
            { data: "model" },
            { data: "assigned"},
			{ data: "location"},
			{ data: "cost"},
			{ data: "date_deployed"},
			{ data:"date_surplused"},
			{ data:"last_updated"}
        ],
        select: true,
        buttons: [
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
        ]
    } );
} );
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
              <div class="navbar-header"><a class="navbar-brand" href="/home">Meridian Solutions</a><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
			  </div>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav navbar-right" style="margin-top:0px;margin-right:-20px;">
					   <?php if($_SESSION["userType"] == 'admin') { ?><li role="presentation"><a href="/add_item" style="color:rgb(51,51,51);">Add Item</a></li><?php } ?> <!-- if an admin, show add item button -->
                        <li role="presentation"><a href="/edit_table" style="color:rgb(51,51,51);">Edit Table</a></li>
						<?php if($_SESSION["userType"] == 'admin') { ?><li role="presentation"><a href="/settings" style="color:rgb(51,51,51);">Settings </a></li><?php } ?> <!-- if an admin, show settings button -->
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
			<table id="assets" class="display" cellspacing="0" width="100%">
				<thead>
                    <tr>
						<th>Index</th>
                        <th>Name</th>
                        <th>Serial Number</th>
						<th>Brand </th>
						<th>Model </th>
						<th>Assigned</th>
						<th>Location</th>
						<th>Cost</th>
						<th>Date Deployed</th>
						<th>Date Surplussed</th>
						<th>Last Updated</th>
					</tr> 
				  </thead>

                   <tbody>
					
					<?php
					/*	//fill table
						$query = "SELECT * FROM assets;";
						$item = array(); //array for assets
						$rs = pg_query($conn, $query); //run query
						while ($item = pg_fetch_assoc($rs)) //fetch and fill array
						{
							//$item[] = $line;
							echo '
							<tr>
							<td>'.$item['id'].'</td>
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
					*/
					
					?>
					 
                   </tbody>
			</table>
			</div>
			</div>
  </div>

</body>
	
	

</html>
