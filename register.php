<?php
	define("TITLE", "Review Login");

		//connect to a DB in PHPmyadmin
	$con = mysqli_connect("localhost", "root", "root", "social");

	if(mysqli_connect_errno()){
		echo "Failed to connect: " . mysqli_connect_errno();
	}

	//Declaring variables to prevent errors
	$fname = ""; //First Name
	$lname = ""; // Last Name
	$email = ""; //Email
	$email2 = ""; //Email 2
	$password = ""; //Password
	$password2 = ""; //Password2
	$date = ""; //Sign up Date
	$error_array = ""; //Holds error message

	if(isset($_POST['register_button'])){

		//Registration form values
		$fname = strip_tags($_POST['reg_fname']); //remove HTML tags
		$fname = str_replace(' ', '', $fname); //remove spaces if user enteres in space
		$fname = ucfirst(strtolower($fname)); //keeps all letters lowercase and first letter uppercase;

		$lname = strip_tags($_POST['reg_lname']); //remove HTML tags
		$lname = str_replace(' ', '', $lname); //remove spaces if user enteres in space
		$lname = ucfirst(strtolower($lname)); //keeps all letters lowercase and first letter uppercase;

		$email = strip_tags($_POST['reg_email']); //remove HTML tags
		$email = str_replace(' ', '', $email); //remove spaces if user enteres in space
		$email = ucfirst(strtolower($email)); //keeps all letters lowercase and first letter uppercase;

		$email2 = strip_tags($_POST['reg_email2']); //remove HTML tags
		$email2 = str_replace(' ', '', $email2); //remove spaces if user enteres in space
		$email2 = ucfirst(strtolower($email2)); //keeps all letters lowercase and first letter uppercase;

		$password = strip_tags($_POST['reg_password']); //remove HTML tags
		$password2 = strip_tags($_POST['reg_password2']); //remove HTML tags

		$date = date("d-m-Y"); //gets current date

		//check if email matches
		if($email == $email2){

			if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

				$em = filter_var($email, FILTER_VALIDATE_EMAIL);

				//check if email exists
				$e_check = mysqli_query($con, "SELECT email FROM users WHERE email = '$email'");
				
				//count number of rows returned
				$num_rows = mysqli_num_rows($e_check);

				if($num_rows > 0) {
					echo "Email already exists";
				}	

			}else {

				echo "Invalid format";
			}

		}else {

			echo "Emails or passwords do not match";
		}

		if(strlen($fname) > 25 || strlen($fname) < 2) {
			echo "Your first name must be between 2 and 25 characters";
		}

		if(strlen($lname) > 25 || strlen($lname) < 2) {
			echo "Your last name must be between 2 and 25 characters";
		}

		if($password != $password2){
			echo "Your passwords do not match";
		}
		else 
		{
			if(preg_match('/[^A-Za-z0-9]/', $password)){
				echo "Your passwords can only contain english characteres or numbers";
			}
		}

		if (strlen($password) > 30 || strlen($password) < 5){
			echo "Password too short";
		}
	}


?>

<!DOCTYPE html>
<html>
<head>
	<title><?php TiTLE ?></title>
</head>
<body>

	<form action="register.php" method="POST">
		<input type="text" name="reg_fname" placeholder="First Name..." required="">
		<br/>
		<input type="text" name="reg_lname" placeholder="Last Name..." required="">
		<br/>
		<input type="text" name="reg_email" placeholder="Email" required="">
		<br/>
		<input type="text" name="reg_email2" placeholder="Confirm Email" required="">
		<br/>
		<input type="text" name="reg_password" placeholder="Enter Password" required="">
		<br/>
		<input type="text" name="reg_password2" placeholder="Confirm Password" required="">
		<br/>
		<input type="submit" name="register_button" value="Register">


	</form>

</body>
</html>