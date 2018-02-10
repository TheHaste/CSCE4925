<?php
require('/app/web/connect.php');

session_start(); //start user session to send data between pages

if($_SESSION["userType"] == 'admin'){ //if admin button is pressed
	echo "Hello I'm an admin!!!";
}
else if($_SESSION["userType"] == 'user'){
	echo "Hello I am a standard user!!";
}

?>






<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="CSCE4925/ALL_BOOTSTRAP FILES/assets/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,400italic">
    <link rel="stylesheet" href="assets/css/user.css">
    <link rel="stylesheet" href="CSCE4925/ALL_BOOTSTRAP FILES/assets/assets/css/Data-Table.css">
    <link rel="stylesheet" href="CSCE4925/ALL_BOOTSTRAP FILES/assets/assets/css/Data-Table1.css">
    <link rel="stylesheet" href="CSCE4925/ALL_BOOTSTRAP FILES/assets/assets/https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean1.css">
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
	
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
                <div class="navbar-header"><a class="navbar-brand" href="#">Meridian Solutions</a><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav navbar-right" style="margin-top:0px;margin-right:-20px;">
					   <li role="presentation"><a href="#" style="color:rgb(51,51,51);">Add Item</a></li>
                        <li role="presentation"><a href="#" style="color:rgb(51,51,51);">Search Item</a></li>
						<li role="presentation"><a href="#" style="color:rgb(51,51,51);">Settings </a></li>
                        <li role="presentation"><a href="#" style="color:rgb(51,51,51);">Logout </a></li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"> </a>
                            <ul class="dropdown-menu" role="menu">
                                <li role="presentation"><a href="#">First Item</a></li>
                                <li role="presentation"><a href="#">Second Item</a></li>
                                <li role="presentation"><a href="#">Third Item</a></li>
                            </ul>
                        </li>
                    </ul>
            </div>
    </div>
    </nav>
    </div>

    <section class="testimonials"></section>
	<!--Settings for table-->
    <footer class="site-footer" style="margin-right:2px;margin-top:0px;margin-bottom:1px;max-width:-20px;min-width:0px;max-height:0px;min-height:0px;padding:30px;">
        <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
		<div>
		<button class="btn btn-default" type="button" style="margin-left:-550px;margin-right:0px; margin-top:-50px;">Delete</button>
		<button class="btn btn-default" type="button" style="margin-left:100px;margin-top:-50px;">Edit</button>
		
		<!--Moves all of the buttons(margin-right does this)-->
		<button class="btn btn-default" type="button" style="margin-left:-400px;margin-right:-450px; margin-top:-50px;">Save</button>
		</div>
            <tr>
			<th>
				<!--Creates Checkbox-->
				<input type="checkbox" id="example" />
				</th>
				<!--Table headers-->
                <th>Name</th>
                <th>Serial #</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Status</th>
                <th>Location</th>
				<th>Cost</th>
				<th>Date Deployed</th>
				<th>Date Surplused</th>
            </tr>
        </thead>
        <tbody>
            <tr>
			
			<th>
				<!--Creates Checkbox-->
				<input type="checkbox" />
				</th>
				
                <td><?php echo $item[0]['Name'];?></td>
                <td><?php echo $item[0]['Serial #'];?></td>
                <td><?php echo $item[0]['Brand'];?></td>
                <td><?php echo $item[0]['Model'];?></td>
                <td><?php echo $item[0]['Assigned'];?></td>
                <td><?php echo $item[0]['Location'];?></td>
                <td><?php echo $item[0]['Cost'];?></td>
                <td><?php echo $item[0]['Date Deployed'];?></td>
                <td><?php echo $item[0]['Date Surplused'];?></td>
				
            </tr>
			
			 <tr>
			 
			 <th>
				<!--Creates Checkbox-->
				<input type="checkbox" />
				</th>
				
                 <td><?php echo $item[1]['Name'];?></td>
                <td><?php echo $item[1]['Serial #'];?></td>
                <td><?php echo $item[1]['Brand'];?></td>
                <td><?php echo $item[1]['Model'];?></td>
                <td><?php echo $item[1]['Assigned'];?></td>
                <td><?php echo $item[1]['Location'];?></td>
                <td><?php echo $item[1]['Cost'];?></td>
                <td><?php echo $item[1]['Date Deployed'];?></td>
                <td><?php echo $item[1]['Date Surplused'];?></td>
				
				
            </tr>
			
			 <tr>
			 
			 <th>
				<!--Creates Checkbox-->
				<input type="checkbox"  />
				</th>
				
                 <td><?php echo $item[2]['Name'];?></td>
                <td><?php echo $item[2]['Serial #'];?></td>
                <td><?php echo $item[2]['Brand'];?></td>
                <td><?php echo $item[2]['Model'];?></td>
                <td><?php echo $item[2]['Assigned'];?></td>
                <td><?php echo $item[2]['Location'];?></td>
                <td><?php echo $item[2]['Cost'];?></td>
                <td><?php echo $item[2]['Date Deployed'];?></td>
                <td><?php echo $item[2]['Date Surplused'];?></td>
				
				
            </tr>
			
			 <tr>
				
				<th>
				<!--Creates Checkbox-->
				<input type="checkbox"  />
				</th>
				 <td><?php echo $item[3]['Name'];?></td>
                <td><?php echo $item[3]['Serial #'];?></td>
                <td><?php echo $item[3]['Brand'];?></td>
                <td><?php echo $item[3]['Model'];?></td>
                <td><?php echo $item[3]['Assigned'];?></td>
                <td><?php echo $item[3]['Location'];?></td>
                <td><?php echo $item[3]['Cost'];?></td>
                <td><?php echo $item[3]['Date Deployed'];?></td>
                <td><?php echo $item[3]['Date Surplused'];?></td>
				
				
            </tr>
			 <tr>
			 
			 <th>
				<!--Creates Checkbox-->
				<input type="checkbox"  />
				</th>
				 <td><?php echo $item[4]['Name'];?></td>
                <td><?php echo $item[4]['Serial #'];?></td>
                <td><?php echo $item[4]['Brand'];?></td>
                <td><?php echo $item[4]['Model'];?></td>
                <td><?php echo $item[4]['Assigned'];?></td>
                <td><?php echo $item[4]['Location'];?></td>
                <td><?php echo $item[4]['Cost'];?></td>
                <td><?php echo $item[4]['Date Deployed'];?></td>
                <td><?php echo $item[4]['Date Surplused'];?></td>
				
				
            </tr>
			 <tr>
			 
			 <th>
				<!--Creates Checkbox-->
				<input type="checkbox"  />
				</th>
				
                <td><?php echo $item[5]['Name'];?></td>
                <td><?php echo $item[5]['Serial #'];?></td>
                <td><?php echo $item[5]['Brand'];?></td>
                <td><?php echo $item[5]['Model'];?></td>
                <td><?php echo $item[5]['Assigned'];?></td>
                <td><?php echo $item[5]['Location'];?></td>
                <td><?php echo $item[5]['Cost'];?></td>
                <td><?php echo $item[5]['Date Deployed'];?></td>
                <td><?php echo $item[5]['Date Surplused'];?></td>
				
				
            </tr>
			 <tr>
			 
			 <th>
				<!--Creates Checkbox-->
				<input type="checkbox"  />
				
				</th>
				
                <td><?php echo $item[6]['Name'];?></td>
                <td><?php echo $item[6]['Serial #'];?></td>
                <td><?php echo $item[6]['Brand'];?></td>
                <td><?php echo $item[6]['Model'];?></td>
                <td><?php echo $item[6]['Assigned'];?></td>
                <td><?php echo $item[6]['Location'];?></td>
                <td><?php echo $item[6]['Cost'];?></td>
                <td><?php echo $item[6]['Date Deployed'];?></td>
                <td><?php echo $item[6]['Date Surplused'];?></td>
				
				
            </tr>
			 <tr>
			 
			 <th>
				<!--Creates Checkbox-->
				<input type="checkbox"  />
				</th>
					
                <td><?php echo $item[7]['Name'];?></td>
                <td><?php echo $item[7]['Serial #'];?></td>
                <td><?php echo $item[7]['Brand'];?></td>
                <td><?php echo $item[7]['Model'];?></td>
                <td><?php echo $item[7]['Assigned'];?></td>
                <td><?php echo $item[7]['Location'];?></td>
                <td><?php echo $item[7]['Cost'];?></td>
                <td><?php echo $item[7]['Date Deployed'];?></td>
                <td><?php echo $item[7]['Date Surplused'];?></td>
				
            </tr>
			
			 <tr>
			 <th>
				<!--Creates Checkbox-->
				<input type="checkbox"  />
				</th>
				
                 <td><?php echo $item[8]['Name'];?></td>
                <td><?php echo $item[8]['Serial #'];?></td>
                <td><?php echo $item[8]['Brand'];?></td>
                <td><?php echo $item[8]['Model'];?></td>
                <td><?php echo $item[8]['Assigned'];?></td>
                <td><?php echo $item[8]['Location'];?></td>
                <td><?php echo $item[8]['Cost'];?></td>
                <td><?php echo $item[8]['Date Deployed'];?></td>
                <td><?php echo $item[8]['Date Surplused'];?></td>
				
				
            </tr>
			 <tr>
			 
			 <th>
				<!--Creates Checkbox-->
				<input type="checkbox" />
				</th>
				
                 <td><?php echo $item[9]['Name'];?></td>
                <td><?php echo $item[9]['Serial #'];?></td>
                <td><?php echo $item[9]['Brand'];?></td>
                <td><?php echo $item[9]['Model'];?></td>
                <td><?php echo $item[9]['Assigned'];?></td>
                <td><?php echo $item[9]['Location'];?></td>
                <td><?php echo $item[9]['Cost'];?></td>
                <td><?php echo $item[9]['Date Deployed'];?></td>
                <td><?php echo $item[9]['Date Surplused'];?></td>
				
				
            </tr>
			
           
        </tbody>
    </table>
    </footer>
	
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
	
</body>

</html>
