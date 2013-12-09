    <div id="SearchResult">
      <?php

        function showresult ($con,$result,$KeyWord){
            if (!$result) {
              printf("Error: %s\n", mysqli_error($con));
              //echo"Cannot find this animal...";
              exit();
            }
            $row_cnt = mysqli_num_rows($result);
            if ($row_cnt <1) {
              echo"<h3>Sorry, we cannot find this animal...You can try other animals<h3>";
              echo"<p>Below is the most animals that viewed by our customers, maybe you will like them!</p>";
                $result1= mysqli_query($con,"SELECT species.ID,species.picture, species.scientificName, species.commonName, COUNT(visited.speciesID) AS C FROM species, visited
                  WHERE visited.speciesID=species.ID GROUP BY visited.speciesID ORDER BY C DESC LIMIT 6");

                if($result1 === FALSE) {
                die(mysqli_error($con)); 
                }
                while($row=mysqli_fetch_array($result1)){
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

        } // END OF FUNCTION

        $KeyWord=$_REQUEST['search'];
        $option=$_GET['kind'];


        if($option=='name'){
            echo"<h3>Thank you for using our Name search!</h3>";
            $sql="SELECT picture, scientificName, ID,commonName FROM species WHERE commonName LIKE '%".$KeyWord."%'";
    	    	$result = mysqli_query($con,$sql);
          
            showresult($con,$result,$KeyWord);

        }
        if ($option=='tag') {
            echo"<h3>Thank you for using our TAG search!</h3>";
            $sql="SELECT s.picture, s.scientificName, s.ID, s.commonName from tags, visited, species as s 
            where tags.vid = visited.vid and tags.tag LIKE '%".$KeyWord."%' and visited.speciesID = s.ID";
            $result = mysqli_query($con,$sql);
            showresult($con,$result,$KeyWord);
          
        }
        if ($option=='habitat') {
            echo"<h3>You are searching for the animals' habitat with <h1>$KeyWord</h1></h3>";
            $sql="SELECT picture, scientificName, ID, commonName from  species  
            where habitat LIKE '%".$KeyWord."%' ";
            $result = mysqli_query($con,$sql);
            showresult($con,$result,$KeyWord);
        }
        if ($option=='diet') {
            echo"<h3>You are searching for the animals whose diet is <h1>$KeyWord</h1></h3>";
            $sql="SELECT picture, scientificName, ID, commonName from  species  
            where diet LIKE '%".$KeyWord."%' ";
            $result = mysqli_query($con,$sql);
            showresult($con,$result,$KeyWord);        
        }
        if ($option=='endangered') {
            echo"<h3>You are searching for the Endangered animals with Level <h1>$KeyWord</h1></h3>";
            if ($KeyWord=='1') {
              echo "<h3>The most endangered animals are:</h3>";
              $sql="SELECT picture, scientificName, ID,commonName FROM species WHERE status LIKE '%Threatened%'";
              $result = mysqli_query($con,$sql);
              showresult($con,$result,$KeyWord); 
            }
            else if ($KeyWord=='2') {
              echo "<h3>The second most endangered animals are:</h3>";
              $sql="SELECT picture, scientificName, ID,commonName FROM species WHERE status LIKE '%Endangered%'";
              $result = mysqli_query($con,$sql);
              showresult($con,$result,$KeyWord); 
            }
            else if ($KeyWord=='3') {
              echo "<h3>The less endangered animals are:</h3>";
              $sql="SELECT picture, scientificName, ID,commonName FROM species WHERE status LIKE '%vulnerable%'";
              $result = mysqli_query($con,$sql);
              showresult($con,$result,$KeyWord); 
            }
            else if ($KeyWord=='4') {
              echo "<h3>The lower risk animals are:</h3>";
              $sql="SELECT picture, scientificName, ID,commonName FROM species WHERE status LIKE '%lower%'";
              $result = mysqli_query($con,$sql);
              showresult($con,$result,$KeyWord); 
            }
            else{
              echo"<h3>Cannot understand your request... Please follow us searching standard :<br>
                   please enter the endangered level : 1  means most endangered, 4 means lower risk~</h3>";
            $sql="SELECT picture, scientificName, ID,commonName FROM species WHERE status LIKE '%Threatened%'";
            $result = mysqli_query($con,$sql);
            showresult($con,$result,$KeyWord);
            }          
        }
        if ($option=='geographics') {
            echo"<h3>You are searching for the animals in <h1>$KeyWord</h1></h3>";
            $sql="SELECT picture, scientificName, ID, commonName from  species  
            where geographics LIKE '%".$KeyWord."%' ";
            $result = mysqli_query($con,$sql);
            showresult($con,$result,$KeyWord);        
        }
      ?>
    </div>