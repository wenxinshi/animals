<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <title>Animal Kingdom</title>
    <script type="text/javascript" src="Js.js"></script>
</head>

<body>
    <div id="Header">
        <div class="Title">
            <h1>
                <span class="BlueText">Animal Kingdom</span>
            </h1>

            <div id="Search">
                <input type="text" name="search">
                <input type="submit" value="Search">
            </div>
        </div>
        
        <div id="LoginBlock">


            <form id="LoginForm" action="login.php" method ="post">

          	    <label for="userName">Username:</label>
                <input type="text" name="username">
                <label for="password">Password:</label>
                <input type="text" name="password">
                <input type="submit" value="Log In" >
                <input type="button" value="Sign Up" formaction="SignUp.html">  
            </form>     
        </div>

    </div>

    <div id="Directory">
        <ul>
          <a href="index.php" >Home</a>
          <b>|</b>
          <a href="about.html" >About</a>
        </ul>
      
    </div>
    <div id="LoginFeedBack">
<?php


//echo "Welcome back, ".$username." please enjoy!";
session_start();



include 'Config.php';
//Collect your info from login form
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

echo "Welcome back, ".$username.", please enjoy!";

mysqli_close($con);

?> 

    </div>
     
</body>
</html>

