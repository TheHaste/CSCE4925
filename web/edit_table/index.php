<?php
require('/app/web/connect.php');
//include("../../php/DataTables.php" );
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
		     <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
	<script src="https://cdn.datatables.net/select/1.2.5/js/dataTables.select.min.js"></script>
	<script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script>
	
	<link rel= "stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"></link>
	<link rel= "stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css"></link>
<link rel= "stylesheet" href="https://cdn.datatables.net/select/1.2.5/css/select.dataTables.min.css"></link>
<link rel="stylesheet" href="https://editor.datatables.net/extensions/Editor/css/editor.dataTables.min.css"></link>

	<!-- DataTable Javascript Implementation -->
	<script type="text/javascript">
		var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    editor = new $.fn.dataTable.Editor( {
        ajax: "../php/staff.php",
        table: "#assets",
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
                label: "Assigned:",
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
            }
        ]
    } );
 
    $('#assests').DataTable( {
        dom: "Bfrtip",
        ajax: "../php/staff.php",
        columns: [
            { data: null, render: function ( data, type, row ) {
                // Combine the first and last names into a single table field
                return data.first_name+' '+data.last_name;
            } },
            { data: "name_id" },
            { data: "serial_number" },
            { data: "brand" },
            { data: "model" },
            { data: "assigned"},
	    { data: "location"},
	    { data: "cost"},
	    { data: "date_deployed"},
	    { data:"date_surplused"},
	    { data:"last_updated"},
        ],
        select: true,
        buttons: [
            { extend: "create", editor: editor },
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

</body>
	
	

</html>
