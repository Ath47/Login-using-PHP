<?php
session_start();
include("connection.php"); 
include("functions.php");

if($_SERVER['REQUEST_METHOD'] == "POST") {
    //When user posts something
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];
    
    if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) { 
        //Read from Database
        $query = "select * from users where user_name = '$user_name' limit 1";
        $result = mysqli_query($con, $query);

        if($result) {
            if($result && mysqli_num_rows($result) > 0) {

                $user_data = mysqli_fetch_assoc($result); // Get user data, assoc means associative array
                if($user_data['password'] === $password) {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }
        }

        echo "Invalid username or password";
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
    <title>Login</title>
</head>

<body>
    <style>
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

    </style>
    
    <div id="container">
        <form method="post">
            <div style= "font-size: 20px; margin: 10px; color: white">Login</div>
            <input id="text" type="text" name = "user_name" placeholder="Enter your name"><br><br>
            <input id="text" type="password" name = "password" placeholder="Enter your password"><br><br>
            <input id="button" type="submit" value = "Login"><br><br>
            <a href="signup.php">Signup</a><br><br>
        </form>
    </div>
    
</body>
</html>