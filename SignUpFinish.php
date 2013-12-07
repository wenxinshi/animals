<?php include 'layer/Hearder.php';?>
<?php include 'layer/Top.php';?>
    <?php
    
	   include 'Config.php';

		$Email=$_REQUEST['Email'];
		$Username=$_REQUEST['UserName'];
		$Password=$_REQUEST['Password'];
        $Password_conf=$_REQUEST['Password_conf'];
		
        if(empty($Username)){
        die("Please enter your username!<br>");
        }

        if(empty($Password)){
        die("Please enter your password!<br>");
        }

        if(empty($Password_conf)){
        die("Please confirm your password!<br>");
        }

        if($Password != $Password_conf){
        die("Passwords don't match!");
        }

        if(empty($Email)){
        die("Please enter your email!");
        }


        $user_check="SELECT username FROM users WHERE username='".$Username."'" or die (mysqli_error());
		$user_result = mysqli_query($con,$user_check);
        $user_count = mysqli_num_rows($user_result);

        $email_check = mysqli_query($con,"SELECT email FROM users WHERE email='$Email'");
        $email_count = mysqli_num_rows($email_check);
 
        if($user_count>0){
            echo "<h1>User already Exists, please try other username!</h1>";      
        }
        if($email_count>0){
            echo "<h1>Email already Exists, please try other email!</h1>";      
        }

        $pos = strrpos($Email, "@");
        if ($pos === false) { 
            echo "<h1>Please enter a valid email!</h1>";     
        }

		else{
            $sql="INSERT INTO users (username,password,email) VALUES 
            ('$Username','$Password','$Email')";
            $insert=mysqli_query($con,$sql) or die(mysqli_error());
            if(!$insert){ 
			    echo "<h1>Failed to sign up</h1>";
            }
            else{
                echo "<h1> $Username, Congradulations! Sucessful Sign Up! Please log in</h1>";
            }	
		}
		mysqli_close($con);
    ?>
     
<?php include 'layer/Footer.php';?>
