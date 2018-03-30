<?php
//Logging Report Index

	require('/app/web/connect.php');

	session_start(); //start user session to send data between pages
	date_default_timezone_set('America/Chicago'); //set timezone to CST

	
	/******************************************************************************************
	*	buildString() - Returns a formatted string for SQL queries for Inventory Reporting
	*******************************************************************************************/
	function buildString($SQL_where){
		return checkUsername($SQL_where);
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
			}
			else{
				$SQL_IN .= $temp;
			}
		}
		
		$SQL_IN .= "') ";
		
		return $SQL_IN;
	}
	
	/***************************************************************************************************
	*	checkUsername() - Runs a check on the Username field and formats to the SQL string if needed
	****************************************************************************************************/
	function checkUsername($SQL_where){
		if(!(empty($_SESSION['data'][0]))){ //1 not null
			if((!(empty($_SESSION['data'][1]))) || (!(empty($_SESSION['data'][2]))) || (!(empty($_SESSION['data'][3]))) || (!(empty($_SESSION['data'][4]))) || (!(empty($_SESSION['data'][5]))) || (!(empty($_SESSION['data'][6]))) || (!(empty($_SESSION['data'][7]))) || (!(empty($_SESSION['data'][8])))){ //atleast another column has data
				if (strpos($_SESSION['data'][0], ',') !== false) { //if more than one column and has a comma
					$SQL_where .= formatIN("log_user", 0);
					$SQL_where .= "AND ";
					return checkAction($SQL_where);
				}
				else{ //if more than one column and NO comma
					$SQL_where .= "log_user = '{$_SESSION['data'][0]}' AND "; //append with comma and move to next column
					return checkAction($SQL_where);
				}
			}
			else{ //no other data for query
				if (strpos($_SESSION['data'][0], ',') !== false) { //if more than one column and has a comma
					$SQL_where .= formatIN("log_user", 0);
					return $SQL_where;
				}
				else{ //if more than one column and NO comma
					$SQL_where .= "log_user = '{$_SESSION['data'][0]}'"; //end of where
					return $SQL_where;
				}
			}
		}
		else{ //1 is null, check other columns
			return checkAction($SQL_where);
		}
	}
	
	/***************************************************************************************************
	*	checkAction() - Runs a check on the Action field and formats to the SQL string if needed
	****************************************************************************************************/
	function checkAction($SQL_where){
		if(!(empty($_SESSION['data'][1]))){ //2 not null
			if((!(empty($_SESSION['data'][2]))) || (!(empty($_SESSION['data'][3]))) || (!(empty($_SESSION['data'][4])))){ //atleast another column has data
				if (strpos($_SESSION['data'][1], ',') !== false) { //if more than one column and has a comma
					$SQL_where .= formatIN("action", 1);
					$SQL_where .= "AND ";
					return checkStartDate($SQL_where);
				}
				else{ //if more than one column and NO comma
					$SQL_where .= "action = '{$_SESSION['data'][1]}' AND "; //append with comma and move to next column
					return checkStartDate($SQL_where);
				}
			}
			else{ //no other data for query
				if (strpos($_SESSION['data'][1], ',') !== false) { //if more than one column and has a comma
					$SQL_where .= formatIN("action", 1);
					return checkStartDate($SQL_where);
				}
				else{ //if more than one column and NO comma
					$SQL_where .= "action = '{$_SESSION['data'][1]}'"; //end of where
					return $SQL_where;
				}
			}
		}
		else{ //2 is null, check other columns
			return checkStartDate($SQL_where);
		}
	}
	
	/***************************************************************************************************
	*	checkStartDate() - Runs a check on the Start Date field and formats to the SQL string if needed.
	****************************************************************************************************/
	function checkStartDate($SQL_where){
		if((!(empty($_SESSION['data'][2])))){ //3 not null
			if((!(empty($_SESSION['data'][3]))) || (!(empty($_SESSION['data'][4])))){ //atleast another column has data
				$old_time1 = $_SESSION['data'][2];
				$new_date1 = date('M-d-Y', strtotime($old_time1));
				$SQL_where .= "log_time >= '%{$new_date1}%' AND "; //append with comma and move to next column 
				return checkEndDate($SQL_where);
			}
			else{ //no other data for query
			$old_time1 = $_SESSION['data'][2];
				$new_date1 = date('M-d-Y', strtotime($old_time1));
				$SQL_where .= "log_time LIKE '%{$new_date1}%'"; //end of where
				return $SQL_where;
			}
		}
		else{ //3 is null, check other columns
			return checkEndDate($SQL_where);
		}
	}
	
	/*************************************************************************************************
	*	checkEndDate() - Runs a check on the End date field and formats to the SQL string if needed 
	**************************************************************************************************/
	function checkEndDate($SQL_where){
		if((!(empty($_SESSION['data'][3])))){ //last column has data
			$old_time2 = $_SESSION['data'][3];
			$new_date2 = date('M-d-Y', strtotime($old_time2));
			$SQL_where .= "log_time <= '%{$new_date2}%'"; //append with comma and move to next column
		}
		
		return $SQL_where;
	}

	
	//build string
	$SQL_where = "";
	if($_SESSION['data'][0] != "empty"){
		$SQL_FINAL = buildString($SQL_where);
	}
	//echo "The SQL query looks like this: SELECT * FROM logging WHERE {$SQL_FINAL} ORDER BY log_time DESC;"; echo '<br />';
	
	
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
					filename: 'Meridian Inventory Logs',
					exportOptions: {
						modifier: {
							page: 'current'
						}
					}
				},
				{extend: 'excel',
					text: 'Export to Excel',
					filename: 'Meridian Inventory Logs',
					exportOptions: {
						modifier: {
							page: 'current'
						}
					}
				}
			]
		});	
	
		$('#logReport').prop('checked', true);
		document.getElementById('logs').style.display='block';
	
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
                        <th>User</th>
                        <th>Action</th>
						<th>Log Time</th>
					</tr> 
				  </thead>

                   <tbody>
					
					<?php
						//fill table
						if($_SESSION['data'][0] != "empty"){
							$query = "SELECT * FROM logging WHERE {$SQL_FINAL} ORDER BY log_time DESC;";
						}
						else{
							$query = "SELECT * FROM logging;";
						}
						
						$item = array(); //array for assets

						$rs = pg_query($conn, $query); //run query

						while ($item = pg_fetch_assoc($rs)) //fetch and fill array
						{
							//$item[] = $line;
							echo '
							<tr>
							<td>'.$item['log_user'].'</td>
							<td>'.$item['action'].'</td>
							<td>'.$item['log_time'].'</td>
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
                <p class="help-block">Choose your report type and enter data in desired fields to filter your report. When filtering one field with multiple criteria, separate with a comma.</p>
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
                                <div><label>Serial Number</label></div><input type="text" id="serialnumber" name="serialnumber">
								<div><label>Asset Type</label></div><input type="text" id="assettype" name="assettype">
                                <div><label>Brand</label></div><input type="text" id="brand" name="brand">
                                <div><label>Model</label></div><input type="text" id="model" name="model">
                                <div><label>Assigned User</label></div><input type="text" id="assigneduser" name="assigneduser">
                                <div><label>Location</label></div><input type="text" id="location" name="location">
                                <div><label>Cost</label></div><input type="text" id="cost" name="cost">
                                <div><label>Date Deployed</label></div><input type="date" id="datedeployed" name="datedeployed">
                                <div><label>Date Surplused</label></div><input type="date" id="datesurplused" name="datesurplused">
                                <div><label>Last Updated</label></div><input type="date" id="lastupdated" name="lastupdated">
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
                                <div><label>Username</label></div><input type="text" id="logusername" name="logusername" value="<?php if(!(empty($_SESSION['data'][0]))){ echo $_SESSION['data'][0]; } ?>">
                                <div><label>Action</label></div><input type="text" id="logaction" name="logaction" value="<?php if(!(empty($_SESSION['data'][1]))){ echo $_SESSION['data'][1]; } ?>">
                                <div><label>Start Date</label></div><input type="date" id="logdate1" name="logdate1" value="<?php if(!(empty($_SESSION['data'][2]))){ echo $_SESSION['data'][2]; } ?>">
								<div><label>End Date</label></div><input type="date" id="logdate2" name="logdate2"value="<?php if(!(empty($_SESSION['data'][3]))){ echo $_SESSION['data'][3]; } ?>">
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
