<?php
//Inventory Report Index

	require('/app/web/connect.php');

	session_start(); //start user session to send data between pages
	
	//find out which are null
	if(empty($_SESSION['data'][0])){ 
		$one_nill = true;
	}
	else{
		$one_nill = false;
	}
	
	if(empty($_SESSION['data'][1])){
		$two_nill = true;
		echo "HELLO I AM EMPTY"; echo '</br>';
	}
	else{
		$two_nill = false;
	}
	
	if(empty($_SESSION['data'][2])){
		$three_nill = true;
	}
	else{
		$three_nill = false;
	}
	
	if(empty($_SESSION['data'][3])){
		$four_nill = true;
	}
	else{
		$four_nill = false;
	}
	
	if(empty($_SESSION['data'][4])){
		$five_nill = true;
	}
	else{
		$five_nill = false;
	}
	
	if(empty($_SESSION['data'][5])){
		$six_nill = true;
	}
	else{
		$six_nill = false;
	}
	
	if(empty($_SESSION['data'][6])){
		$seven_nill = true;
	}
	else{
		$seven_nill = false;
	}
	
	if(empty($_SESSION['data'][7])){
		$eight_nill = true;
	}
	else{
		$eight_nill = false;
	}
	
	if(empty($_SESSION['data'][8])){
		$nine_nill = true;
	}
	else{
		$nine_nill = false;
	}

	echo $one_nill; echo '<br/>';
	echo $two_nill; echo '<br/>';
	echo $three_nill; echo '<br/>';
	echo $four_nill; echo '<br/>';
	echo $five_nill; echo '<br/>';
	echo $six_nill; echo '<br/>';
	echo $seven_nill; echo '<br/>';
	echo $eight_nill; echo '<br/>';
	echo $nine_nill; echo '<br/>';
	
	/******************************************************************************************
	*	buildString() - Returns a formatted string for SQL queries for Inventory Reporting
	*******************************************************************************************/
	function buildString($SQL_where){
		return checkOne($SQL_where);
	}
	
	/******************************************************************************************
	*	checkOne() - Runs a check on column 1 to see if data is to be added to the SQL string.
	*				 This is a recursive function that runs checks for columns 2 through 9 if
	*				 there is more data present past column 1.
	*******************************************************************************************/
	function checkOne($SQL_where){
		if((bool)$one_nill == false){ //1 not null
			if(($two_nill === false) || ($three_nill === false) || ($four_nill === false) || ($five_nill === false) || ($six_nill === false) || ($seven_nill === false) || ($eight_nill === false) || ($nine_nill === false)){ //atleast another column has data
				$SQL_where .= "serial number = {$_SESSION['data'][0]}, "; //append with comma and move to next column
				return checkTwo($SQL_where);
			}
			else{ //no other data for query
				$SQL_where .= "serial number = {$_SESSION['data'][0]}"; //end of where
				return $SQL_where;
			}
		}
		else{ //1 is null, check other columns
			return checkTwo($SQL_where);
		}
	}
	
	/******************************************************************************************
	*	checkTwo() - Runs a check on column 2 to see if data is to be added to the SQL string.
	*				 This is a recursive function that runs checks for columns 3 through 9 if
	*				 there is more data present past column 2.
	*******************************************************************************************/
	function checkTwo($SQL_where){
		if($two_nill == false){ //2 not null
			echo "HELLO I HAVE A VALUE"; echo '<br/>';
			if(($three_nill === false) || ($four_nill === false) || ($five_nill === false) || ($six_nill === false) || ($seven_nill === false) || ($eight_nill === false) || ($nine_nill === false)){ //atleast another column has data
				$SQL_where .= "brand = {$_SESSION['data'][1]}, "; //append with comma and move to next column
				return checkThree($SQL_where);
			}
			else{ //no other data for query
				$SQL_where .= "brand = {$_SESSION['data'][1]}"; //end of where
				return $SQL_where;
			}
		}
		else{ //2 is null, check other columns
			return checkThree($SQL_where);
		}
	}
	
	/******************************************************************************************
	*	checkThree() - Runs a check on column 3 to see if data is to be added to the SQL string.
	*				 This is a recursive function that runs checks for columns 4 through 9 if
	*				 there is more data present past column 3.
	*******************************************************************************************/
	function checkThree($SQL_where){
		if($three_nill === false){ //3 not null
			if(($four_nill === false) || ($five_nill === false) || ($six_nill === false) || ($seven_nill === false) || ($eight_nill === false) || ($nine_nill === false)){ //atleast another column has data
				$SQL_where .= "model = {$_SESSION['data'][2]}, "; //append with comma and move to next column
				return checkFour($SQL_where);
			}
			else{ //no other data for query
				$SQL_where .= "model = {$_SESSION['data'][2]}"; //end of where
				return $SQL_where;
			}
		}
		else{ //3 is null, check other columns
			return checkFour($SQL_where);
		}
	}
	
	/******************************************************************************************
	*	checkFour() - Runs a check on column 4 to see if data is to be added to the SQL string.
	*				 This is a recursive function that runs checks for columns 5 through 9 if
	*				 there is more data present past column 4.
	*******************************************************************************************/
	function checkFour($SQL_where){
		if($four_nill === false){ //4 not null
			if(($five_nill === false) || ($six_nill === false) || ($seven_nill === false) || ($eight_nill === false) || ($nine_nill === false)){ //atleast another column has data
				$SQL_where .= "assigned user = {$_SESSION['data'][3]}, "; //append with comma and move to next column
				return checkFive($SQL_where);
			}
			else{ //no other data for query
				$SQL_where .= "assigned user = {$_SESSION['data'][3]}"; //end of where
				return $SQL_where;
			}
		}
		else{ //4 is null, check other columns
			return checkFive($SQL_where);
		}
	}
	
	/******************************************************************************************
	*	checkFive() - Runs a check on column 5 to see if data is to be added to the SQL string.
	*				 This is a recursive function that runs checks for columns 6 through 9 if
	*				 there is more data present past column 5.
	*******************************************************************************************/
	function checkFive($SQL_where){
		if($five_nill === false){ //5 not null
			if(($six_nill === false) || ($seven_nill === false) || ($eight_nill === false) || ($nine_nill === false)){ //atleast another column has data
				$SQL_where .= "location = {$_SESSION['data'][4]}, "; //append with comma and move to next column
				return checkSix($SQL_where);
			}
			else{ //no other data for query
				$SQL_where .= "location = {$_SESSION['data'][4]}"; //end of where
				return $SQL_where;
			}
		}
		else{ //5 is null, check other columns
			return checkSix($SQL_where);
		}
	}
	
	/******************************************************************************************
	*	checkSix() - Runs a check on column 6 to see if data is to be added to the SQL string.
	*				 This is a recursive function that runs checks for columns 7 through 9 if
	*				 there is more data present past column 6.
	*******************************************************************************************/
	function checkSix($SQL_where){
		if($six_nill === false){ //6 not null
			if(($seven_nill === false) || ($eight_nill === false) || ($nine_nill === false)){ //atleast another column has data
				$SQL_where .= "cost = {$_SESSION['data'][5]}, "; //append with comma and move to next column
				return checkSeven($SQL_where);
			}
			else{ //no other data for query
				$SQL_where .= "cost = {$_SESSION['data'][5]}"; //end of where
				return $SQL_where;
			}
		}
		else{ //6 is null, check other columns
			return checkSeven($SQL_where);
		}
	}
	
	/******************************************************************************************
	*	checkSeven() - Runs a check on column 7 to see if data is to be added to the SQL string.
	*				 This is a recursive function that runs checks for columns 7 through 9 if
	*				 there is more data present past column 7.
	*******************************************************************************************/
	function checkSeven($SQL_where){
		if($seven_nill === false){ //7 not null
			if(($eight_nill === false) || ($nine_nill === false)){ //atleast another column has data
				$SQL_where .= "date deployed = {$_SESSION['data'][6]}, "; //append with comma and move to next column
				return checkEight($SQL_where);
			}
			else{ //no other data for query
				$SQL_where .= "date deployed = {$_SESSION['data'][6]}"; //end of where
				return $SQL_where;
			}
		}
		else{ //7 is null, check other columns
			return checkEight($SQL_where);
		}
	}
	
	/******************************************************************************************
	*	checkEight() - Runs a check on column 8 to see if data is to be added to the SQL string.
	*				 This is a recursive function that runs checks for columns 8 through 9 if
	*				 there is more data present past column 8.
	*******************************************************************************************/
	function checkEight($SQL_where){
		if(($eight_nill === false)){ //8 not null
			if(($nine_nill === false)){ //atleast another column has data
				$SQL_where .= "date surplussed = {$_SESSION['data'][7]}, "; //append with comma and move to next column
				return checkNine($SQL_where);
			}
			else{ //no other data for query
				$SQL_where .= "date surplussed = {$_SESSION['data'][7]}"; //end of where
				return $SQL_where;
			}
		}
		else{ //8 is null, check other columns
			return checkNine($SQL_where);
		}
	}
	
	/******************************************************************************************
	*	checkNine() - Runs a check on column 9 to see if data is to be added to the SQL string
	*******************************************************************************************/
	function checkNine($SQL_where){
		if($nine_nill === false){ //last column has data
			$SQL_where .= "last updated = {$_SESSION['data'][8]}"; //append with comma and move to next column
		}
		
		return $SQL_where;
	}

	
	//build string
	$SQL_where = "";
	$SQL_FINAL = buildString($SQL_where);
	
	echo "The SQL query looks like this: SELECT * FROM assets WHERE {$SQL_FINAL};"; echo '<br />';
	
	
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
	
		$('#report').submit(function() {
			if(document.getElementById('inventoryReport').checked){
				
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
				var logdate = document.getElementById('logdate').value
				
				$.post('/reports/scripts/run_report.php', {type: 'logs',
					logusername: logusername,
					logaction: logaction,
					logdate: logdate}, function(){
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
						$query = "SELECT * FROM assets WHERE {$SQL_FINAL};";
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
                                <div class="checkbox"><label>  <input type="checkbox">Serial Number</label></div><input type="text" id="serialnumber" name="serialnumber">
                                <div class="checkbox"><label>  <input type="checkbox">Brand</label></div><input type="text" id="brand" name="brand">
                                <div class="checkbox"><label>  <input type="checkbox">Model</label></div><input type="text" id="model" name="model">
                                <div class="checkbox"><label>  <input type="checkbox">Assigned User</label></div><input type="text" id="assigneduser" name="assigneduser">
                                <div class="checkbox"><label>  <input type="checkbox">Location</label></div><input type="text" id="location" name="location">
                                <div class="checkbox"><label>  <input type="checkbox">Cost</label></div><input type="text" id="cost" name="cost">
                                <div class="checkbox"><label>  <input type="checkbox">Date Deployed</label></div><input type="date" id="datedeployed" name="datedeployed">
                                <div class="checkbox"><label>  <input type="checkbox">Date Surplused</label></div><input type="date" id="datesurplused" name="datesurplused">
                                <div class="checkbox"><label>  <input type="checkbox">Last Updated</label></div><input type="date" id="lastupdated" name="lastupdated">
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
                                <div class="checkbox"><label>  <input type="checkbox">Username</label></div><input type="text" id="logusername" name="logusername">
                                <div class="checkbox"><label>  <input type="checkbox">Action</label></div><input type="text" id="logaction" name="logaction">
                                <div class="checkbox"><label>  <input type="checkbox">Date</label></div><input type="date" id="logdate" name="logdate">
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
