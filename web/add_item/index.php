<?php

require_once('/var/www/html/connect.php');	

if(isset($_POST)){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$businessname = $_POST['business_name'];
	$type = $_POST['type'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$accounttype = $_POST['AccountType'];
	$repeatpassword = md5($_POST['repeatpassword']);

	if($password == $repeatpassword){ //check if passwords match
		
		//check if email exists	
		$emailchecksql = "SELECT * FROM `Customer`  WHERE email='$email'";
		$emailcheckresults = mysqli_query($connection, $emailchecksql);
		$count = mysqli_num_rows($emailcheckresults);
		
		if($count == 1){ //email is in database already
			$failmsg = "Email already exists! Please enter a different email address.";
		}
		else{ //email is not in database yet
			$sql = "INSERT INTO `Customer` (type, First_name, Last_name, email, password, business_name) VALUES ('$type', '$accounttype', '$firstname', '$lastname', '$email', '$password', '$businessname')";
			$result = mysqli_query($connection, $sql);
			if($result){
				$successmsg = "User Registered Successfully";
				mysqli_close($connection);
			}
			else{
				$failmsg = "Registration Failed";
			}
		}
	}
	else{ //error message for password mismatch
		$failmsg =  "Passwords Must Match!!";
	}
}
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Profile</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Pretty-Registration-Form.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <?php if(isset($successmsg)){ ?><div class="alert alert-success" role="alert"> <?php echo $successmsg; ?> </div><?php } ?>
    <?php if(isset($failmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $failmsg; ?> </div><?php } ?>
    <div class="row register-form">
        <div class="col-md-8 col-md-offset-2">
            <form class="form-horizontal custom-form" id="CreateAccountForm" method="POST">
                <h1>Create Account</h1>
                <div class="form-group" id="FirstName">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="name-input-field">First Name </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" name="firstname" value="<?php if(isset($firstname) & !empty($firstname)){echo $firstname;} ?>" required>
                    </div>
                </div>
                <div class="form-group" id="LastName">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="name-input-field">Last Name </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" name="lastname" value="<?php if(isset($lastname) & !empty($lastname)){echo $lastname;} ?>" required>
                    </div>
                </div>
                <div class="form-group" id="BusinessName">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="name-input-field">Business Name </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="text" name="business_name" value="<?php if(isset($businessname) & !empty($businessname)){echo $businessname;} ?>">
                    </div>
                </div>
                <div class="form-group" id="Email">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="email-input-field">Email </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="email" name="email" value="<?php if(isset($email) & !empty($email)){echo $email;} ?>" required>
                    </div>
                </div>
                <div class="form-group" id="Password">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="pawssword-input-field">Password </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="password" name="password" value="<?php if(isset($password) & !empty($password)){echo $password;} ?>" required>
                    </div>
                </div>
                <div class="form-group" id="RepeatPassword">
                    <div class="col-sm-4 label-column">
                        <label class="control-label" for="repeat-pawssword-input-field">Repeat Password </label>
                    </div>
                    <div class="col-sm-6 input-column">
                        <input class="form-control" type="password" name="repeatpassword" value="<?php if(isset($repeatpassword) & !empty($repeatpassword)){echo $repeatpassword;} ?>" required>
                    </div>
                </div>
                <div class="form-group" id="AccountType">
                <div class="col-sm-4 label-column">
                        <label class="control-label" for="dropdown-input-field">Account Type</label>
                    </div>
                    <div class="col-sm-4 input-column">
          	          <select class="form-control" name="type">
			    <option>Personal</option>
			    <option>Business</option>
			  </select>
		    
                   </div>
		</div>
                <div class="checkbox">
                    
                        <input type="checkbox" required>I've read and accept the terms and conditions </input>
                </div>
                <button class="btn btn-default submit-button" type="submit" id="buttonSubmit"  style="background-color:rgb(73,70,116);">Register </button>
		<a class="btn btn-default submit-button" style= "background-color:rgb(73, 70, 116);" href="/Login/login.php">Login</a>
            </form>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
