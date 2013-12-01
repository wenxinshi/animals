<?php 
     include 'Config.php';
     $Id=$_GET['Id'];
     $sql="select * from species where ID='$Id'";
     $result=mysqli_query($con,$sql);
     $row=mysqli_fetch_array($result);

     $commandName=$row['commonName'];
     $scientificName=$row['scientificName'];
     $HBLength=$row['HBLength'];
     $weight=$row['weight'];
     $height=$row['height'];
     $identification=$row['identification'];
     $habitat=$row['habitat'];
     $diet=$row['diet'];
     $reproduction=$row['reproduction'];
     $socialStructure=$row['socialStructure'];
     $behavior=$row['behavior'];
     $status=$row['status'];
     $interestingFacts=$row['interestingFacts'];
     $geographics=$row['geographics'];
     $picture=$row['picture'];

     // $str="";
     // if(!is_null($picture))
     //      $str.='<img src="'.$picture.'">';
     // $str.="<h3>Detials</h3>";
     

?>