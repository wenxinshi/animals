<div id="Login">
<?php
if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
    echo '<div class="title"><h2>Welcome '.$username.'(<a href=query/logout.php>Logout</a>)</h2></div> ';
    echo "</div>";
    return;
}
else{
       echo '<div class="title"><h2>Welcome Guest!</h2></div>';
    }
?>

   <div class="title">
       <h2>User Login</h2>
    </div>   
    <form class="loginForm" action="login.php" method="post">
        <input class="fillIn" name="username" type="text" value="User name" onfocus="if(this.value=='User name') this.value=''" onBlur="if(this.value=='') this.value='User name'" >
        <input class="fillIn" name="password" type="text" value="Password" onfocus="if(this.value=='Password') this.value=''" onBlur="if(this.value=='') this.value='Password'" >
        <input type="submit" value="Sign In">               
    </form>
         
    <div id="Register">
       <span>Not yet a Member? <a href=SignUp.php>Register Now</a></a></span>
   </div>
</div>  