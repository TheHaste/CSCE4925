<!DOCTYPE html>

<?php
	
	require('/app/web/connect.php');
	
	session_start();
	
	
	if(isset($_POST))
	{
			$item = $_POST['Item Name'];
			$serial = $_POST['Serial #'];
			$location = $_POST['Location'];
			$model = $_POST['Model'];
			$brand = $_POST['Brand'];
			$status = $_POST['Status'];
			$cost = $_POST['Cost'];
			
	//		$query = "INSERT INTO assets VALUES ('$_POST['Item Name']', '$_POST['Serial #']', '$_POST['Location']', '$_POST['Model']', '$_POST['Brand']', '$_POST['Status']', '$_POST['Cost']')";
			
	//		$result = pg_query($query);
			echo $item;

	}
	else
	{
			echo "Error adding data to database";
	}
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add_item</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,400italic">-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700&amp;subset=cyrillic,latin-ext">
    <link rel="stylesheet" href="assets/css/Article-Dual-Column.css">
    <link rel="stylesheet" href="assets/css/Features-Boxed.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Text-Input.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Search1.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/thumbnails1.css">
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
                <div class="navbar-header"><a class="navbar-brand" href="#">Meridian Business Centers</a><button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
                <div
                    class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav navbar-right" style="margin-top:0px;margin-right:-20px;">
					   <li role="presentation"><a href="#" style="color:rgb(51,51,51);">Add Item</a></li>
                        <li role="presentation"><a href="#" style="color:rgb(51,51,51);">Search Item</a></li>
						<li role="presentation"><a href="#" style="color:rgb(51,51,51);">Settings </a></li>
						<li role="presentation"><a href="#" style="color:rgb(51,51,51);">Reports </a></li>
                        <li role="presentation"><a href="#" style="color:rgb(51,51,51);">Logout </a></li>
                        <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#"> </a>
                            <ul class="dropdown-menu" role="menu">
                                <li role="presentation"><a href="#">First Item</a></li>
                                <li role="presentation"><a href="#">Second Item</a></li>
                                <li role="presentation"><a href="#">Third Item</a></li>
							    <li role="presentation"><a href="#">Fourth Item</a></li>

                            </ul>
                        </li>
                    </ul>
            </div>
    </div>
    </nav>
    </div>
<div class="row">
        <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
            <div class="container body">
      <div class="main_container">
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                   
                    <span class="input-group-btn">
                      
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                
                 <!--required notice in top left-->
				<p class="help-block"style="color:rgb(247,1,1);">' * '= required</p>
                    <!--Creates forms to fill out-->
                    <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left">
						<!--Create Item Name entry--> 
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  style="color:rgb(51,51,51);" name="Item Name"> Item Name <span class="required">*</span>
                        </label> 					
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Item Name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
						<!--Create Serial # entry-->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color:rgb(51,51,51);" name="Serial #">Serial # <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Serial #" name="Serial #" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
						<!--Creates Location entry-->
                      <div class="form-group">
                        <label for="Location" class="control-label col-md-3 col-sm-3 col-xs-12"style="color:rgb(51,51,51);" name="Location">Location <span class="required">*</span>
						</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="Location" class="form-control col-md-7 col-xs-12" type="text" name="Location">
                        </div>
                      </div>
					  <!--Creates Model entry-->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color:rgb(51,51,51);" name="Model"> Model
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Model" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <!--Creates Brand entry-->
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color:rgb(51,51,51);" name="Brand"> Brand
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Brand" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
					  <!--Creates Status entry-->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color:rgb(51,51,51);" name="Status">Assigned <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Status" name="Status" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      
                        	
						<!--Creates Cost entry-->
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" style="color:rgb(51,51,51);" name="Cost"> Cost
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="Cost" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        
						<!--Creates Save button-->
                        <button class="btn btn-default" type="submit" id="Save" style="margin-left:550px;margin-top:30px;">Save</button>
					  </div>
					 </form>
    <!-- /Starrr -->
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
</body>

</html>

