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
            <form id="LoginForm" action="login.php">
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
          <a href="./Home.html" >Home</a>
          <b>|</b>
          <a href="about.html" >About</a>
        </ul>
      
    </div>
    <div id="LoginFeedBack">
<?php


//echo "Welcome back, ".$username." please enjoy!";
// session_start();


//This function will find and checks if your data is correct
// if (!sset($_REQUEST['submit'])) {
// 	exit('not allow to access!');
// }

include 'Config.php';
//Collect your info from login form
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];


echo "Welcome back, $username please enjoy!";


//Find if entered data is correct

$result = mysqli_query($con,"SELECT * FROM users WHERE username='$username' AND password='$password'");
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$id = $row['ID'];

$select_user = mysqli_query($con,"SELECT * FROM users WHERE id='$id'");
$row2 = mysqli_fetch_array($select_user,MYSQLI_ASSOC);
$user = $row2['username'];

if($username != $user){
die("Username is wrong!");
}


$pass_check = mysqli_query($con,"SELECT * FROM users WHERE username='$username' AND id='$id'");
$row3 = mysqli_fetch_array($pass_check,MYSQLI_ASSOC);
$email = $row3['email'];
$select_pass = mysqli_query($con,"SELECT * FROM users WHERE username='$username' AND id='$id' AND email='$email'");
$row4 = mysqli_fetch_array($select_pass,MYSQLI_ASSOC);
$real_password = $row4['password'];

if($password != $real_password){
die("Your password is wrong!");
}



//Now if everything is correct let's finish his/her/its login

// session_register("username", $username);
// session_register("password", $password);

echo "Welcome back, ".$username." please enjoy!";

mysqli_close($con);


<<<<<<< HEAD
case "login";
login();
break;

}
?> 

<!-- saaas dda -->
=======
?> 
    </div>
     
</body>
</html>
>>>>>>> wenxinshi
