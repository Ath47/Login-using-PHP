<?php
session_start();
	include("connection.php"); 
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST") {
        //When user posts something
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];
        
        if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) { 
            $user_id = random_num(20);
            $query = "insert into users (user_id, user_name, password) values ('$user_id', '$user_name', '$password')";  //ID and Date will be inserted by default, so only pass 3 params
            mysqli_query($con, $query);
            header("Location: login.php"); //Redirect user to login page after signing up
            die;

        } else {
            echo "Please enter some valid information";
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>

<body>
    <style type = "text/css">
        body {
            font-size:20px;
            text-align:center;
            margin: 100px;
            background-color: #20B2AA;
        }

        #text {
            height:25px;
            border-radius: 5px;
            padding: 4px;
            border: solid thin #aaa;
            width: 100%;
        }
        #button {
            padding: 10px;
            width: 100px;
            color: white;
            background-color: lightblue;
            border: none;
            border-radius: 5px;
        }
        #container {
            background-color: black;
            margin: auto;
            width: 300px;
            padding: 20px;
            border-radius: 5px;
        }
        #button:hover{
            cursor: pointer;
            background-color: blue;
        }
        a{
            color:white;
        }
        a:hover {
            color:orange;
        }
        
    </style>
    
    <div id="container">
        <form method="post">
            <div style= "font-size: 20px; margin: 10px; color: white">Signup</div>
            <input id="text" type="text" name = "user_name" placeholder="Create a username"><br><br>
            <input id="text" type="password" name = "password" placeholder="Create a password"><br><br>
            <input id="button" type="submit" value = "Signup"><br><br>
            <a href="login.php">Login</a><br><br>
        </form>
    </div>
    
</body>
</html>