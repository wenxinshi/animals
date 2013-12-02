
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

        <div id="Login">
            <div class="title">
              <h2>User Login</h2>
            </div>

            <form class="loginForm" action="login.php" method="post">
                <input class="fillIn" name="username" type="text" value="User name" onfocus="if(this.value=='User name') this.value=''" onBlur="if(this.value=='') this.value='User name'" >
                <input class="fillIn" name="password" type="text" value="Password" onfocus="if(this.value=='Password') this.value=''" onBlur="if(this.value=='') this.value='Password'" >
                <input type="submit" value="Sign In">               
            </form>
              
            <div id="Register">
                <span>Not yet a Member? <a href=SignUp.html>Register Now</a></a></span>
            </div>
        </div>

        <div id="Search">
            <form action="SearchResult.php" method="get">
                <input class="searchContent"type="text" name="search">
                <input type="submit" value="Search">
            </form>
        </div>
    </div>

    <div id="SearchResult">
      <?php
        include 'Config.php';
        $KeyWord=$_REQUEST['search'];
         
        $sql="SELECT picture, scientificName, ID,commonName FROM species WHERE commonName LIKE '%".$KeyWord."%'";
	    	$result = mysqli_query($con,$sql);
    
        if (!$result) {
          printf("Error: %s\n", mysqli_error($con));
          exit();
        }
    
	   	  while($row=mysqli_fetch_array($result)){
	   		  $ImageLink=$row['picture'];
	   	    $commonName=$row['commonName'];
          $Id=$row['ID'];
	   		  echo "<a href='Animal.php?Id=$Id'><img src='$ImageLink'></a>";
          echo "<p>$commonName</p>";	

	   	  }
	   	  mysqli_close($con);
      ?>
    </div>
     
</body>
</html>