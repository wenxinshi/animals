<div id="Recommand">

    <div class="content">

        
        	<?php 
        	if(isset($_SESSION['username'])) {
        		echo" <h3> Hello, $username, Maybe you are interested in the following animals: </h3>";
        		$speciesID=$_GET['Id'];
        		$result= mysqli_query($con,"SELECT Species.ID,Species.picture, Species.scientificName, Species.commonName FROM Species,family2genus AS f0, genus2species AS g0, 
        			(SELECT f.familyID, COUNT(f.familyID) as c from visited, genus2species AS g, family2genus AS f 
        				where visited.userID = $userID and visited.speciesID = g.speciesID and f.genusID = g.genusID GROUP BY f.familyID ORDER BY c DESC) AS j 
        				WHERE f0.familyID = j.familyID and f0.genusID = g0.genusID and g0.speciesID=Species.ID and g0.speciesID NOT IN (SELECT speciesID FROM visited where userID = 2) ORDER BY j.c DESC LIMIT 6");
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
        	else{
        		echo "<h3> Hello, Guest, We suggest the realtaed animals for you! If you want us remember your search and recommand more
        		precisely, <a href=query/SignUp.php>Register</a> Soon! </h3>" ;
        		$speciesID=$_GET['Id'];
        		//get the animal species ID;
        		

        		$result= mysqli_query($con,"SELECT familyID FROM family2genus, genus2species WHERE
       				family2genus.genusID=genus2species.genusID AND genus2species.speciesID=$speciesID");
        		 $row=mysqli_fetch_array($result);
            	 $nowfamilyID=$row['familyID'];
       			 $nowsuggestspeiesID = mysqli_query($con, "SELECT Species.ID,Species.picture, Species.scientificName, Species.commonName FROM family2genus, genus2species, species WHERE
       			 	family2genus.genusID=genus2species.genusID AND Species.ID=genus2species.speciesID AND family2genus.familyID=$nowfamilyID LIMIT 6" );
       			 
        		if($nowsuggestspeiesID === FALSE) {
    			die(mysqli_error($con)); 
				}
	       		while($row=mysqli_fetch_array($nowsuggestspeiesID)){
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

        	?>
        	
       
        

    </div>
</div>