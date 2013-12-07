
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
