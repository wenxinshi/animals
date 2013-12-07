    <div id="SearchResult">
      <?php
        include 'query/Config.php';
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