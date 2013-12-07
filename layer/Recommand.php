<div id="Recommand">

    <div class="content">
        
        	<?php 
        	if(isset($_SESSION['username'])) {
        		echo" <h3> Hello, $username, Maybe you are interested in the following animals: </h3>";
        		
        	}
        	else{
        		echo "<h3> Hello, Guest, We suggest the most viewed animals for you! If you want us recommand
        		animals that you like, <a href=query/SignUp.php>Register</a> Soon! </h3>" ;
        		$speciesID=$_GET['Id'];
        		//get the animal species ID;
        		
        		$nowfamilyID= mysqli_query($con,"SELECT familyID FROM family2genus, genus2species WHERE
       				family2genus.genusID=genus2species.genusID AND genus2species.speciesID=$speciesID");
       			// $nowsuggestspeiesID = mysqli_query($con, "SELECT speciesID FROM family2genus, genus2species WHERE
       			// 	family2genus.genusID=genus2species.genusID AND family2genus.familyID=$nowfamilyID ");

       		echo"$nowfamilyID";
	       		// while($row=mysqli_fetch_array($nowsuggestspeiesID)){
	       		// 	$ImageLink=$row['picture'];
		   	    // 	$commonName=$row['commonName'];
		   	    // 	$Id=$row['ID'];
		   		  	// echo "<a href='Animal.php?Id=$Id'><img src='$ImageLink'></a>";
	         //  		echo "<p>$commonName</p>";	
        	} 
        	?>
        	
       

        
       <img class="float" src="images/Pig.jpg">
       <img class="float" src="images/Pig.jpg">
       <img class="float" src="images/Pig.jpg"> 
       <img class="float" src="images/Pig.jpg">
    </div>
</div>