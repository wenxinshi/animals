    <div id="SearchResult">
      <?php
        $KeyWord=$_REQUEST['search'];
        $option=$_GET['kind'];


        if($option=='name'){
            $sql="SELECT picture, scientificName, ID,commonName FROM species WHERE commonName LIKE '%".$KeyWord."%'";
    	    	$result = mysqli_query($con,$sql);
        
            if (!$result) {
              printf("Error: %s\n", mysqli_error($con));
              //echo"Cannot find this animal...";
              exit();
            }
            $row_cnt = mysqli_num_rows($result);
            if ($row_cnt <1) {
              echo"<h3>Sorry, we cannot find this animal...You can try other animals<h3>";
              echo"<p>Below is the most animals that viewed by our customers, maybe you will like them!</p>";
                $result= mysqli_query($con,"SELECT Species.ID,Species.picture, Species.scientificName, Species.commonName, COUNT(visited.speciesID) AS C FROM Species, visited
                  WHERE visited.speciesID=species.ID GROUP BY visited.speciesID ORDER BY C DESC LIMIT 6");

                if($result === FALSE) {
                die(mysqli_error($con)); 
                }
                while($row=mysqli_fetch_array($result)){
                $suggestID=$row['ID'];
                $ImageLink=$row['picture'];
                $commonName=$row['commonName'];
                  //$Id=$result['ID'];
                  echo " <div class='oneresult'>
                <span class='inner'><a href='Animal.php?Id=$suggestID'><img class='float' src='$ImageLink' width=150 height=150></a>
                </span>
                <span class='title'><a href='Animal.php?Id=$suggestID'><span>$commonName</span></a></span>
              </div>
              ";
                  }  

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
        }
        if ($option=='tag') {
          echo"tag";
          
        }
        if ($option=='habitat') {
          echo"habitat";
        }
        if ($option=='diet') {
          
        }
        if ($option=='endangered') {
          
        }
        if ($option=='geographics') {
          
        }
      ?>
    </div>