<?php

//echo "Welcome back, ".$username." please enjoy!";
//Collect your info from login form
session_start();
include 'Config.php';
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

if(empty($username)){
        die("Please enter your username!<br>");
        }

if(empty($password)){
        die("Please enter your password!<br>");
        }

//echo "Welcome back, $username, please enjoy!";


//Find if entered data is correct

$result = mysqli_query($con,"SELECT * FROM users WHERE username='$username'");
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$id = $row['ID'];

$select_user = mysqli_query($con,"SELECT * FROM users WHERE id='$id'");
$row2 = mysqli_fetch_array($select_user,MYSQLI_ASSOC);
$user = $row2['username'];

if($username != $user){
die("Cannot find your username!");
}



$select_pass = mysqli_query($con,"SELECT * FROM users WHERE username='$username' AND id='$id' ");
$row3 = mysqli_fetch_array($select_pass,MYSQLI_ASSOC);
$real_password = $row3['password'];

if($password != $real_password){
die("Your password is wrong!");
}


//echo "Welcome back, ".$username." please enjoy!";
$_SESSION['userID']=$id;
$_SESSION['username']=$username ;

include '../layer/LoginCheck.php';

?> 