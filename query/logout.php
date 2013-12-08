<?php
session_start();
session_destroy();
?> 
<div class="title">
    <h2>User Login</h2>
 </div>   
 <form class="loginForm" id="SignInForm" method="post">
     <input class="fillIn" name="username" type="text" value="User name" onfocus="if(this.value=='User name') this.value=''" onBlur="if(this.value=='') this.value='User name'" >
     <input class="fillIn" name="password" type="text" value="Password" onfocus="if(this.value=='Password') this.value=''" onBlur="if(this.value=='') this.value='Password'" >
     <input type="button" value="Sign In" onclick="Login()"> 
 </form>
      
 <div id="Register">
    <span>Not yet a Member? <a href=SignUp.php>Register Now</a></a></span>
</div>
