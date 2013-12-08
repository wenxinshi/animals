<div id="Recommand">

    <div class="content">
        
        	<?php 
        	if(isset($_SESSION['username'])) {
        		echo" <h3> Hello, $username, Maybe you are interested in the following animals: </h3>";
        		$speciesID=$_GET['Id'];
        		$result= mysqli_query($con,"SELECT g.genusID, COUNT(g.genusID) as c from visited, genus2species AS g 
        		where visited.userID = $userID and visited.speciesID = g.speciesID GROUP BY g.genusID ORDER BY c DESC");
        		 $row=mysqli_fetch_array($result);
        		 //echo $row['genusID'] ;     		
        		 echo $row['c'];
        		
        	}
        	else{
        		echo "<h3> Hello, Guest, We suggest the realtaed animals for you! If you want us recommand more
        		precisely, <a href=query/SignUp.php>Register</a> Soon! </h3>" ;
        		$speciesID=$_GET['Id'];
        		//get the animal species ID;
        		
        		$result= mysqli_query($con,"SELECT familyID FROM family2genus, genus2species WHERE
       				family2genus.genusID=genus2species.genusID AND genus2species.speciesID=$speciesID");
        		 $row=mysqli_fetch_array($result);
            	 $nowfamilyID=$row['familyID'];
       			 $nowsuggestspeiesID = mysqli_query($con, "SELECT Species.ID,Species.picture, Species.scientificName, Species.commonName FROM family2genus, genus2species, species WHERE
       			 	family2genus.genusID=genus2species.genusID AND Species.ID=genus2species.speciesID AND family2genus.familyID=$nowfamilyID LIMIT 6" );
       			 

	       		while($row=mysqli_fetch_array($nowsuggestspeiesID)){
	       			
	       			$ImageLink=$row['picture'];
		   	    	$commonName=$row['commonName'];
		   	    	//$Id=$result['ID'];
		   		  	echo "<a href='Animal.php?Id=$Id'><img class='float' src='$ImageLink' width=150 height=150></a> ";
	          		//echo "<p>$commonName</p>";
	          		}
	          	?>
	          	<?php	
	          	while($row1=mysqli_fetch_array($nowsuggestspeiesID)){
	       			
	       			$ImageLink=$row1['picture'];
		   	    	$commonName=$row1['commonName'];
		   	    	//$Id=$result['ID'];
		   		  	//echo "<a href='Animal.php?Id=$Id'><img class='float' src='$ImageLink' width=150 height=150></a> ";
	          		echo "<p>$commonName</p>";
	          		}
        	} 
        	?>
        	
       

        
<!--        <img class="float" src="images/Pig.jpg">
       <img class="float" src="images/Pig.jpg">
       <img class="float" src="images/Pig.jpg"> 
       <img class="float" src="images/Pig.jpg"> -->
    </div>
</div>