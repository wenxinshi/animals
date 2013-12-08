    <div id="SearchResult">
      <?php
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
              echo " <div class='mainresult'>
            <span class='inner'><a href='Animal.php?Id=$Id'><img class='float' src='$ImageLink' width=294 height=294></a>
            </span>
            <span class='maintitle'><a href='Animal.php?Id=$Id'><span><h3>$commonName</h3></span></a></span>
          </div>
          ";	
	   	  }
      ?>
    </div>