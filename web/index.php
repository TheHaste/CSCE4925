<?php
	/************************************
				ADMIN
		username: inventoryadmin
		password: 3asUSWefup67deSA
		
				USER
		username: inventoryuser 
		password: qeMay8qef2KEp7Pe
	**************************************/
	
	
	session_start(); //start user session to send data between pages
	
	if(isset($_POST) & !empty($_POST)){
		
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		//curl request
		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_PORT => "30443",
		  CURLOPT_URL => "https://198.61.58.38:30443/v1/authenticate",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "username={$username}&password={$password}&secret=%26d%3D_XG%26bngE*-7!*%5EY6r%252W%3DknCy5C_XPfFya_%25gH%408sr5cmQs3%3Dy5jxS39a%5Ebhq%5E7xr*GX6rqR5t9rVRha7WwZNXg3nCvaawYQvk%25%5EKtJtHzmdSZSw_Wptrc!VtJ*F8S9%23nCsFUKD%5EYuyQZabKd%2BRDxeh%3Dt_AJ3%5EAD%26kD59nM-%23MMBCXsvN6SwRVG%23P%23LHsF7Dzq%2BY6fcxpkcMtu%3DQ-P%3FC%3FFWDQZb!9Byy6dW4fuLNXFFzP%3Fg%23y%23J9P4Wv9vR3EK7ES2kq%3FtP%24%24X%2BuF9%2B9%259Fp5PRf787Fjbz9ZX%3DS%242g63Wad%23HhW%26F46ZXPA*C98w%26T%5EnR5w_baXmbVu-%3F7g7vx%2B%5ESutztL4G*bm_RfSkRTK%3F%40HmZ6*YJ4He!-cWE3%3FT48ZrPkCS%40M9Vd_nt%2B%25%26%40G4Mgsu88RJe9F5TfC*XYU%3Fy5dU%24%40CCGFLdgA*yX5FujE%25q6CGZYZ*qu4!6%25EdjaH4f%3DrMp7%25tt_g%2BJabSs%24vAppNgH9kkw5M%5E_WNs%25JN%25GKw3C%2BjNh*_7QP5%2Bf*WVZmNymjk63p%25%23%25UW%23pt2ACuMa8DNF4C%3D6x%23vc%5EVRzY2x%5EEeE!j69QMJ%3F4dU%23%23P%5E%23-kaWUh2Cb6pJ2E7bD_tx%25t%5E%40%5ECdCAastFCYjFSzLZ%258U5%3DNW39ua5k%2Bw9gRw_Pgm96v%23AQq5Ax*ZeR%3F4e3AsB5n%242eKN%26MnjrM%2B%2BwVWUAsx%24yqC6Z4dkNeZc!Bsq%24%25%25%40%5E-E_Tpc8CWuJKdWcv8mP!r%23nLs%24nb%3F7*qf%2B6dZjfL!UtNM2ZPVzVTt%5EpRgxzh%3D9%25%263uyg4kVB%3D69uN_WG*2ZUmx%3FEHh%3Df%26%2BRxt2_HV%5EP7r9wQCXhQUZN6gQzNhPG*7M9%2Buctb9d%40He9J%25VyZpkhAP*%24Z5QqbGNR6V66j%23%3F%2B-XfUzBZDZd%3FuG%40g%3DtSwG%3DatsJjYWJcRZHt%24pK%40fAvcrp56EsjAmkcvS-VH!Q%2BAgMbDvsXMH2qGDSRq%2B2v4Ya7EWCcrn8%24!x%24Kz*t%24xq4H%3DrB-q4%40!%25Z5bC%40K-BCjvK7AwX%26H_Gc7gV",
		  CURLOPT_SSL_VERIFYHOST => FALSE,
		  CURLOPT_SSL_VERIFYPEER => FALSE,
		  CURLOPT_RETURNTRANSFER, TRUE,
		  CURLOPT_HTTPHEADER => array(
			"cache-control: no-cache",
			"content-type: application/x-www-form-urlencoded"
		  ),
		));
	
		$response = curl_exec($curl); //response from curl
		//echo $response;
		
		//check if response was received
		if($response == '{: unauthorized}'){
			$error = true;
			$err = "Login Failed: Invalid username or password"; //empty or no response was received 
		}
		
		$err = curl_error($curl); //if error occurs
		curl_close($curl); //close curl
		if ($err) {
			echo "cURL Error #:" . $err;
		} 
		else {	
			$contents = json_decode($response, true);
			echo $contents;
			
			//check if user is in group
			foreach($contents['memberOf'] as $group){
				if($group == "inventory_admin_group"){ 
					$memberOf = $group;
					break;
				}
				else if($group == "inventory_user_group"){
					$memberOf = $group;
					break;
				}
			}
			
					
			//check for errors before signing in
			if($memberOf != '' || !isset($err)){	
				//set $_SESSION variables
				if($memberOf == "inventory_admin_group"){
					$_SESSION["userType"] = 'admin';
				}
				
				if($memberOf == "inventory_user_group"){
					$_SESSION["userType"] = 'user';
				}
				
				$_SESSION["username"] = $username;
			
				header('Location: /home/'); //redirect to home page
			}
		}
		
	}
	
	
?>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Login-Center.css">
    <link rel="stylesheet" href="assets/css/styles.css">
	<script src="assets/js/jquery.min"></script>
	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
	<div style="height:10px"></div>
	<?php if(isset($err)){ ?><div style="text-center;height:50px;" class="alert alert-danger" role="alert"> <?php echo $err; ?> </div><?php } ?>
			<div class="row row-login">
				<div class="col-10 col-sm-6 col-md-4 offset-1 offset-sm-3 offset-md-4">
				<div style="text-center;"><img src="/assets/img/meridian_logo_large.png"> </div>
					<div style="height:40px"></div>
					<div class="card">
						<div class="card-body">
							<form method= 'POST'>
								<label>Username</label> <input class="form-control" type="text" name="username" value="<?php if(isset($username) & !empty($username)){echo $username;} ?>">
								<div style="height:10px"></div>
								<label>Password </label> <input class="form-control" type="password" name="password" value="<?php if(isset($password) & !empty($password)){echo $password;} ?>">
								<div style="height:20px"></div>
								<button class="btn btn-success btn-block" type="submit" name="login_button">LOGIN</button>
								</form>
						</div>
					</div> 
				</div> 
			</div> 
	</div> 
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
