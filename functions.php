<?php

function check_login($con) {

	if(isset($_SESSION['user_id'])) {//Check if user_id is presesnt in session to make sure connection is established.

		$id = $_SESSION['user_id'];
		$query = "select * from users where user_id = '$id' limit 1";
		
		$result = mysqli_query($con, $query);
		if($result && mysqli_num_rows($result) > 0) {

			$user_data = mysqli_fetch_assoc($result); // Get user data, assoc means associative array
			return $user_data;
		}
	} 

	header("Location: login.php");  // If above conditions not satisfied, redirect user back to login page
	die;

}

function random_num($length) {
	$text = "";
	if($length < 5) {
		$length = 5; //$length should always be greater since its second parameter in below line.
	}
	$len = rand(4, $length);  //Generate number between 4 and $length

	for($i = 0; $i < $len; $i++) {
		$text .= rand(0, 9);
	}
	return $text;
}

?>