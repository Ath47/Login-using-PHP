<?php 
session_start();
	//To check if user is logged in, if not then redirect user to login page
	include("connection.php"); //Include all files needed
	include("functions.php");
	
	$user_data = check_login($con); //check_login is the function we created to collect data, $con -> connection

?>

<!DOCTYPE html>
<html>
<head>
	<title>My website</title>
</head>
	<style>
		body {
			text-align: center;
			font-size:20px;
			background: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRlex_jITFviT5vbr5ZqLhn4pUIUD-jKgGnDg&usqp=CAU');
			background-repeat: no-repeat;
			background-color: #20B2AA;
		}		
		.container {
			background-color: black;
			color: white;
            margin: auto;
            width: 300px;
            padding: 20px;
            border-radius: 5px;
		}
		a {
			color: white;
		}
		a:hover {
			color:orange;
		}

	</style>
<body>

	<h1>This is the index page</h1>

	<br>
	<div class="container">
		Hello, <?php echo $user_data['user_name']; ?><br><br>
		<a href="logout.php">Logout</a>
	</div>
	
</body>
</html>