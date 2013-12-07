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
        		
        		$result= mysqli_query($con,"SELECT familyID FROM family2genus, genus2species WHERE family2genus.genusID=genus2species.genusID AND genus2species.speciesID=$speciesID");
            $row=mysqli_fetch_array($result);
            $nowfamilyID=$row['familyID'];
       			$nowsuggestspeiesID = mysqli_query($con, "SELECT * FROM family2genus, genus2species,species WHERE family2genus.genusID=genus2species.genusID AND family2genus.familyID=$nowfamilyID limit 5");
            
           //  $row=mysqli_fetch_array($nowfamilyID);
           //  $content=$row['familyID'];
       		  // echo $content;
	       		while($row=mysqli_fetch_array($nowsuggestspeiesID)){
	       			$ImageLink=$row['picture'];
		   	    	$commonName=$row['commonName'];
		   	    	$Id=$row['ID'];
              echo '<div class="float">';
              echo '<a href="Animal.php?Id='.$Id.'"><img src="'.$ImageLink.'"></a>';
	          	echo "<span>$commonName</span>";
              echo '</div>';	
              }
        	} 
        	?>
    </div>
</div>