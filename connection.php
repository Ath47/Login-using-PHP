<?php 

	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "login_sample_db";

	if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)) {
		die("Failed to Connect"); //Gives error if connection not valid
	}

?>
