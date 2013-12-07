<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <title>Animal Kingdom</title>
    <script type="text/javascript" src="Js.js"></script>
</head>

<body>
    <div id="Top">
        <div id="TopMenu">
             <ul class="list">
             <li><a href="index.html"><span>Home</span></a></li>
             <li class="blank"></li>
             <li><a href="#"><span>About Us</span></a></li>
             <li class="blank"></li>   
            <li><a href="#"><span>Contack Us</span></a></li>         
             </ul>
        </div>

        <div id="Logo">
            <div class="title">
                <h1>Animal Kindom</h1>
            </div>
        </div>
       

        <?php include 'LoginCheck.php';?>

        <div id="Search">
            <form action="Search.php" method="get">
                <input class="searchContent"type="text" name="search">
                <input type="submit" value="Search">
            </form>
        </div>
    </div>
<<<<<<< HEAD
    <div id="userlogin">
        <?php

        //This will start a session
        session_start();

        $username = $_SESSION['username'];

        echo"$uername";
        //Check do we have username and password
        if(!$username ){
        echo "Welcome Guest! <br> <a href=login.php>Login</a> | <a href=register.php>Register</a>";}
        else{
        echo "Welcome ".$username." (<a href=logout.php>Logout</a>)";
        }


        ?> 
    </div>
=======
>>>>>>> fe1d5eea245abb112afeb10385a9b7fb5a5ec169

</body>

</html>

