<?php
	//define the title of the website
	define("TITLE", "Social Media");

	//connect to a DB in PHPmyadmin
	$con = mysqli_connect("localhost", "root", "root", "social");

	if(mysqli_connect_errno()){
		echo "Failed to connect: " . mysqli_connect_errno();
	}

	$query = mysqli_query($con, "INSERT INTO test VALUES ('1', 'Ram')");
?>
<!doctype html>
<html>
	<head>
		<title><?php echo TITLE ?></title>
	</head>
	<body>
		
	</body>
</html>