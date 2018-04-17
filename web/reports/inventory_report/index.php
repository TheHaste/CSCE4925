<?php
//Inventory Report Index

	require('/app/web/connect.php');

	session_start(); //start user session to send data between pages
	
	if(empty($_SESSION["userType"])){
		header('Location: /');
	}
	
	/******************************************************************************************
	*	buildString() - Returns a formatted string for SQL queries for Inventory Reporting
	*******************************************************************************************/
	function buildString($SQL_where){
		return checkType($SQL_where);
	}
	
	
	/***************************************************************************
	*	formatIN() - Returns a formatted string for SQL queries with IN clause *
	****************************************************************************/
	function formatIN($col, $index){
		
		$SQL_IN .= "{$col} IN ('";
		
		$len = strlen($_SESSION['data'][$index]);
		
		for($i=0; $i<=$len; $i++){
			$temp = substr($_SESSION['data'][$index], $i, 1);
			
			if($temp == ','){
				$SQL_IN .= "', '";
			}
			else if($temp == ' '){
				$SQL_IN .= $temp;
			}
			else{
				$SQL_IN .= $temp;
			}

		}
		
		$SQL_IN .= "') ";
		
		return $SQL_IN;
	}
	
	
	/*********************************************************************************************
	*	checkType() - Runs a check on the Asset Type field and formats to the SQL string if needed
	**********************************************************************************************/
	function checkType($SQL_where){
		if(!(empty($_SESSION['data'][0]))){ //1 not null
			if((!(empty($_SESSION['data'][1]))) || (!(empty($_SESSION['data'][2]))) || (!(empty($_SESSION['data'][3]))) || (!(empty($_SESSION['data'][4]))) || (!(empty($_SESSION['data'][5]))) || (!(empty($_SESSION['data'][6]))) || (!(empty($_SESSION['data'][7]))) || (!(empty($_SESSION['data'][8]))) || (!(empty($_SESSION['data'][9])))){ //atleast another column has data
				if (strpos($_SESSION['data'][0], ',') !== false) { //if more than one column and has a comma
					$SQL_where .= formatIN("asset_type", 0);
					$SQL_where .= "AND ";
					return checkSN($SQL_where);
				}
				else{ //if more than one column and NO comma
					$SQL_where .= "asset_type = '{$_SESSION['data'][0]}' AND "; //append with comma and move to next column
					return checkSN($SQL_where);
				}
			}
			else{ //no other data for query
				if (strpos($_SESSION['data'][0], ',') !== false) { //if just one column and has a comma
					$SQL_where .= formatIN("asset_type", 0);
					return SQL_where;
				}
				else{ //if just one column and NO comma
					$SQL_where .= "asset_type = '{$_SESSION['data'][0]}'"; //end of where
					return $SQL_where;
				}
			}
		}
		else{ //1 is null, check other columns
			return checkSN($SQL_where);
		}
	}
	
	/***********************************************************************************************
	*	checkSN() - Runs a check on the Serial Number field and formats to the SQL string if needed
	************************************************************************************************/
	function checkSN($SQL_where){
		if(!(empty($_SESSION['data'][1]))){ //1 not null
			if((!(empty($_SESSION['data'][2]))) || (!(empty($_SESSION['data'][3]))) || (!(empty($_SESSION['data'][4]))) || (!(empty($_SESSION['data'][5]))) || (!(empty($_SESSION['data'][6]))) || (!(empty($_SESSION['data'][7]))) || (!(empty($_SESSION['data'][8]))) || (!(empty($_SESSION['data'][9])))){ //atleast another column has data
				if (strpos($_SESSION['data'][1], ',') !== false) { //if more than one column and has a comma
					$SQL_where .= formatIN("serial_number", 1);
					$SQL_where .= "AND ";
					return checkBrand($SQL_where);
				}
				else{ //if more than one column and NO comma
					$SQL_where .= "serial_number = '{$_SESSION['data'][1]}' AND "; //append with comma and move to next column
					return checkBrand($SQL_where);
				}
			}
			else{ //no other data for query
				if (strpos($_SESSION['data'][1], ',') !== false) { //if just one column and has a comma
					$SQL_where .= formatIN("serial_number", 1);
					return SQL_where;
				}
				else{ //if just one column and NO comma
					$SQL_where .= "serial_number = '{$_SESSION['data'][1]}'"; //end of where
					return $SQL_where;
				}
			}
		}
		else{ //1 is null, check other columns
			return checkBrand($SQL_where);
		}
	}
	
	/******************************************************************************************
	*	checkBrand() - Runs a check on the Brand field and formats to the SQL string if needed
	*******************************************************************************************/
	function checkBrand($SQL_where){
		if(!(empty($_SESSION['data'][2]))){ //2 not null
			if((!(empty($_SESSION['data'][3]))) || (!(empty($_SESSION['data'][4]))) || (!(empty($_SESSION['data'][5]))) || (!(empty($_SESSION['data'][6]))) || (!(empty($_SESSION['data'][7]))) || (!(empty($_SESSION['data'][8]))) || (!(empty($_SESSION['data'][9])))){ //atleast another column has data
				if (strpos($_SESSION['data'][2], ',') !== false) { //if more than one column and has a comma
					$SQL_where .= formatIN("brand", 2);
					$SQL_where .= "AND ";
					return checkModel($SQL_where);
				}
				else{ 
					$SQL_where .= "brand = '{$_SESSION['data'][2]}' AND "; //append with comma and move to next column
					return checkModel($SQL_where);
				}
			}
			else{ //no other data for query
				if (strpos($_SESSION['data'][2], ',') !== false) { //if more than one column and has a comma
					$SQL_where .= formatIN("brand", 2);
					return $SQL_where;
				}
				else{ 
					$SQL_where .= "brand = '{$_SESSION['data'][2]}'"; //end of where
					return $SQL_where;
				}
			}
		}
		else{ //2 is null, check other columns
			return checkModel($SQL_where);
		}
	}
	
	/******************************************************************************************
	*	checkModel() - Runs a check on the Model field and formats to the SQL string if needed
	*******************************************************************************************/
	function checkModel($SQL_where){
		if((!(empty($_SESSION['data'][3])))){ //3 not null
			if((!(empty($_SESSION['data'][4]))) || (!(empty($_SESSION['data'][5]))) || (!(empty($_SESSION['data'][6]))) || (!(empty($_SESSION['data'][7]))) || (!(empty($_SESSION['data'][8]))) || (!(empty($_SESSION['data'][9])))){ //atleast another column has data
				if (strpos($_SESSION['data'][3], ',') !== false) { //if more than one column and has a comma
					$SQL_where .= formatIN("model", 3);
					$SQL_where .= "AND ";
					return checkAssignedUser($SQL_where);
				}
				else{ 
					$SQL_where .= "model = '{$_SESSION['data'][3]}' AND "; //append with comma and move to next column
					return checkAssignedUser($SQL_where);
				}
			}
			else{ //no other data for query
				if (strpos($_SESSION['data'][3], ',') !== false) { //if more than one column and has a comma
					$SQL_where .= formatIN("model", 3);
					return $SQL_where;
				}
				else{
					$SQL_where .= "model = '{$_SESSION['data'][3]}'"; //end of where
					return $SQL_where;
				}
			}
		}
		else{ //3 is null, check other columns
			return checkAssignedUser($SQL_where);
		}
	}
	
	/**********************************************************************************************************
	*	checkAssignedUser() - Runs a check on the Assigned User field and formats to the SQL string if needed
	***********************************************************************************************************/
	function checkAssignedUser($SQL_where){
		if((!(empty($_SESSION['data'][4])))){ //4 not null
			if((!(empty($_SESSION['data'][5]))) || (!(empty($_SESSION['data'][6]))) || (!(empty($_SESSION['data'][7]))) || (!(empty($_SESSION['data'][8]))) || (!(empty($_SESSION['data'][9])))){ //atleast another column has data
				if (strpos($_SESSION['data'][4], ',') !== false) { //if more than one column and has a comma
					$SQL_where .= formatIN("assigned", 4);
					$SQL_where .= "AND ";
					return checkLocation($SQL_where);
				}
				else{
					$SQL_where .= "assigned = '{$_SESSION['data'][4]}' AND "; //append with comma and move to next column
					return checkLocation($SQL_where);
				}
			}
			else{ //no other data for query
				if (strpos($_SESSION['data'][4], ',') !== false) { //if more than one column and has a comma
					$SQL_where .= formatIN("assigned", 4);
					return $SQL_where;
				}
				else{
					$SQL_where .= "assigned = '{$_SESSION['data'][4]}'"; //end of where
					return $SQL_where;
				}
			}
		}
		else{ //4 is null, check other columns
			return checkLocation($SQL_where);
		}
	}
	
	/************************************************************************************************
	*	checkLocation() - Runs a check on the Location field and formats to the SQL string if needed
	*************************************************************************************************/
	function checkLocation($SQL_where){
		if((!(empty($_SESSION['data'][5])))){ //5 not null
			if((!(empty($_SESSION['data'][6]))) || (!(empty($_SESSION['data'][7]))) || (!(empty($_SESSION['data'][8]))) || (!(empty($_SESSION['data'][9])))){ //atleast another column has data
				if (strpos($_SESSION['data'][5], ',') !== false) { //if more than one column and has a comma
					$SQL_where .= formatIN("location", 5);
					$SQL_where .= "AND ";
					return checkCost($SQL_where);
				}
				else{
					$SQL_where .= "location = '{$_SESSION['data'][5]}' AND "; //append with comma and move to next column
					return checkCost($SQL_where);
				}
			}
			else{ //no other data for query
				if (strpos($_SESSION['data'][5], ',') !== false) { //if more than one column and has a comma
					$SQL_where .= formatIN("location", 5);
					return $SQL_where;
				}
				else{
					$SQL_where .= "location = '{$_SESSION['data'][5]}'"; //end of where
					return $SQL_where;
				}
			}
		}
		else{ //5 is null, check other columns
			return checkCost($SQL_where);
		}
	}
	
	/************************************************************************************************
	*	checkCost() - Runs a check on the Cost field and formats to the SQL string if needed
	*************************************************************************************************/
	function checkCost($SQL_where){
		if((!(empty($_SESSION['data'][6])))){ //6 not null
			if((!(empty($_SESSION['data'][7]))) || (!(empty($_SESSION['data'][8]))) || (!(empty($_SESSION['data'][9])))){ //atleast another column has data
				if (strpos($_SESSION['data'][6], ',') !== false) { //if more than one column and has a comma
					$SQL_where .= formatIN("cost", 6);
					$SQL_where .= "AND ";
					return checkDateDeployed($SQL_where);
				}
				else{
					$SQL_where .= "cost = '{$_SESSION['data'][6]}' AND "; //append with comma and move to next column
					return checkDateDeployed($SQL_where);
				}	
			}
			else{ //no other data for query
				if (strpos($_SESSION['data'][6], ',') !== false) { //if more than one column and has a comma
					$SQL_where .= formatIN("cost", 6);
					return $SQL_where;
				}
				else{
					$SQL_where .= "cost = '{$_SESSION['data'][6]}'"; //end of where
					return $SQL_where;
				}
			}
		}
		else{ //6 is null, check other columns
			return checkDateDeployed($SQL_where);
		}
	}
	
	/********************************************************************************************************
	*	checkDateDeployed() - Runs a check on the Date Deployed field and formats to the SQL string if needed
	*********************************************************************************************************/
	function checkDateDeployed($SQL_where){
		if((!(empty($_SESSION['data'][7])))){ //7 not null
			if((!(empty($_SESSION['data'][8]))) || (!(empty($_SESSION['data'][9])))){ //atleast another column has data
				$old_time1 = $_SESSION['data'][7];
				$new_date1 = date('M-d-Y', strtotime($old_time1));
				$SQL_where .= "date_deployed = '{$new_date1}' AND "; //append with comma and move to next column
				return checkDateSurplussed($SQL_where);
			}
			else{ //no other data for query
				$old_time1 = $_SESSION['data'][7];
				$new_date1 = date('M-d-Y', strtotime($old_time1));
				$SQL_where .= "date_deployed = '{$new_date1}'"; //end of where
				return $SQL_where;
			}
		}
		else{ //7 is null, check other columns
			return checkDateSurplussed($SQL_where);
		}
	}
	
	/********************************************************************************************************
	*	checkDateSurplussed() - Runs a check on the Date Deployed field and formats to the SQL string if needed
	*********************************************************************************************************/
	function checkDateSurplussed($SQL_where){
		if((!(empty($_SESSION['data'][8])))){ //8 not null
			if((!(empty($_SESSION['data'][9])))){ //atleast another column has data
				$old_time2 = $_SESSION['data'][8];
				$new_date2 = date('M-d-Y', strtotime($old_time2));
				$SQL_where .= "date_surplused = '{$new_date2}' AND "; //append with comma and move to next column
				return checkLastUpdated($SQL_where);
			}
			else{ //no other data for query
				$old_time2 = $_SESSION['data'][8];
				$new_date2 = date('M-d-Y', strtotime($old_time2));
				$SQL_where .= "date_surplused = '{$new_date2}'"; //end of where
				return $SQL_where;
			}
		}
		else{ //8 is null, check other columns
			return checkLastUpdated($SQL_where);
		}
	}
	
	/********************************************************************************************************
	*	 checkLastUpdated() - Runs a check on the Last Updated field and formats to the SQL string if needed
	*********************************************************************************************************/
	function checkLastUpdated($SQL_where){
		if(!(empty($_SESSION['data'][9]))){ //last column has data
			$old_time3 = $_SESSION['data'][9];
			$new_date3 = date('M-d-Y', strtotime($old_time3));
			$SQL_where .= "last_updated = '{$new_date3}'"; //append with comma and move to next column
		}
		
		return $SQL_where;
	}

	
	//build string
	$SQL_where = "";
	
	if($_SESSION['none'] != "empty"){
		$SQL_FINAL = buildString($SQL_where);
	}
	echo "The SQL query looks like this: SELECT * FROM assets WHERE {$SQL_FINAL};"; echo '<br />';
	
	
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
		
		$('#inventoryReport').prop('checked', true);
		document.getElementById('inventory').style.display='block';
	
		$('#report').submit(function() {
			if(document.getElementById('inventoryReport').checked){
				
				var assettype = document.getElementById('assettype').value
				var serialnumber = document.getElementById('serialnumber').value
				var brand = document.getElementById('brand').value
				var model = document.getElementById('model').value
				var assigneduser = document.getElementById('assigneduser').value
				var location = document.getElementById('location').value
				var cost = document.getElementById('cost').value
				var datedeployed = document.getElementById('datedeployed').value
				var datesurplused = document.getElementById('datesurplused').value
				var lastupdated = document.getElementById('lastupdated').value
				
				$.post('/reports/scripts/run_report.php', {type: 'inventory',
					assettype: assettype,
					serialnumber: serialnumber,
					brand: brand,
					model: model,
					assigneduser: assigneduser,
					location: location,
					cost: cost,
					datedeployed: datedeployed,
					datesurplused: datesurplused,
					lastupdated: lastupdated}, function(){
						window.location.replace("/reports/inventory_report/");
				});
				
			}
			else if(document.getElementById('logReport').checked){
				var logusername = document.getElementById('logusername').value
				var logaction = document.getElementById('logaction').value
				var logdate1 = document.getElementById('logdate1').value
				var logdate2 = document.getElementById('logdate2').value
				
				$.post('/reports/scripts/run_report.php', {type: 'logs',
					logusername: logusername,
					logaction: logaction,
					logdate1: logdate1,
					logdate2: logdate2}, function(){
						window.location.replace("/reports/logs_report/");
				});
			}
			else {
				alert("You did not choose a report type! Please check the box next to the report you want to run.");
			}
		});
	
	});

</script>

<script type="text/javascript">
	function showHideInventoryInfo(){
		if(document.getElementById('inventoryReport').checked){
			document.getElementById('inventory').style.display='block';
			document.getElementById('logs').style.display='none';
			$('#logReport').prop('checked', false);
		}
		else{
			document.getElementById('inventory').style.display='none';
		}
	}

</script>

<script type="text/javascript">
	function showHideLogInfo(){
		if(document.getElementById('logReport').checked){
			document.getElementById('logs').style.display='block';
			document.getElementById('inventory').style.display='none'
			$('#inventoryReport').prop('checked', false);
		}
		else{
			document.getElementById('logs').style.display='none';
		}
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
						if($_SESSION['none'] != "empty"){
							$query = "SELECT * FROM assets WHERE {$SQL_FINAL};";
						}
						else{
							$query = "SELECT * FROM assets;";
						}
						$item = array(); //array for assets

						$rs = pg_query($conn, $query); //run query

						while ($item = pg_fetch_assoc($rs)) //fetch and fill array
						{
							//$item[] = $line;
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
  <div>
        <div class="container">
            <div class="col-md-12" style="height:60px;">
                <p class="help-block">Choose your report type and select fields to filter your report. When filtering one field with multiple criteria, separate with a comma.</br>For Example: John Smith,Bob,Jane Doe</p>
			</div>
		<form method="post" id="report">
            <div class="col-md-12" style="height:40px;">
				<button class="btn btn-default" type="submit" name="runReport">Run Report</button>
			</div>
            <div class="row">
                <div class="col-md-6">
                    <div class="checkbox"><label style="font-size:22px;"><input type="checkbox" id="inventoryReport" name="inventoryReport" value="yes" onclick="showHideInventoryInfo()"><strong>Inventory Report</strong></label></div>
                </div>
                <div class="col-md-6">
                    <div class="checkbox"><label style="font-size:22px;"><input type="checkbox" id="logReport" name="logReport" value="yes" onclick="showHideLogInfo()"><strong>System Log Report</strong></label></div>
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
                                <div><label>Serial Number</label></div><input type="text" id="serialnumber" name="serialnumber" value="<?php if(!(empty($_SESSION['data'][1]))){ echo $_SESSION['data'][1]; } ?>">
								<div><label>Asset Type</label></div><input type="text" id="assettype" name="assettype" value="<?php if(!(empty($_SESSION['data'][0]))){ echo $_SESSION['data'][0]; } ?>">
                                <div><label>Brand</label></div><input type="text" id="brand" name="brand" value="<?php if(!(empty($_SESSION['data'][2]))){ echo $_SESSION['data'][2]; } ?>">
                                <div><label>Model</label></div><input type="text" id="model" name="model" value="<?php if(!(empty($_SESSION['data'][3]))){ echo $_SESSION['data'][3]; } ?>">
                                <div><label>Assigned User</label></div><input type="text" id="assigneduser" name="assigneduser" value="<?php if(!(empty($_SESSION['data'][4]))){ echo $_SESSION['data'][4]; } ?>">
                                <div><label>Location</label></div><input type="text" id="location" name="location" value="<?php if(!(empty($_SESSION['data'][5]))){ echo $_SESSION['data'][5]; } ?>">
                                <div><label>Cost</label></div><input type="text" id="cost" name="cost" value="<?php if(!(empty($_SESSION['data'][6]))){ echo $_SESSION['data'][6]; } ?>">
                                <div><label>Date Deployed</label></div><input type="date" id="datedeployed" name="datedeployed" value="<?php if(!(empty($_SESSION['data'][7]))){ echo $_SESSION['data'][7]; } ?>">
                                <div><label>Date Surplused</label></div><input type="date" id="datesurplused" name="datesurplused" value="<?php if(!(empty($_SESSION['data'][8]))){ echo $_SESSION['data'][8]; } ?>">
                                <div><label>Last Updated</label></div><input type="date" id="lastupdated" name="lastupdated" value="<?php if(!(empty($_SESSION['data'][9]))){ echo $_SESSION['data'][9]; } ?>">
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
                                <div><label>Username</label></div><input type="text" id="logusername" name="logusername">
                                <div><label>Action</label></div><input type="text" id="logaction" name="logaction">
                                <div><label>Start Date</label></div><input type="date" id="logdate1" name="logdate1">
								<div><label>End Date</label></div><input type="date" id="logdate2" name="logdate2">
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
