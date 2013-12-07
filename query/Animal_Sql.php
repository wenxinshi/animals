<?php 
     $Id=$_GET['Id'];
     $sql="select * from species where ID='$Id'";
     $result=mysqli_query($con,$sql);
     $row=mysqli_fetch_array($result);

     
     $picture=$row['picture'];
     $commandName=$row['commonName'];
     $scientificName=$row['scientificName'];
     $weight=$row['weight'];
     $height=$row['height'];
     $HBLength=$row['HBLength'];
     $identification=$row['identification'];
     $habitat=$row['habitat'];
     $diet=$row['diet'];
     $reproduction=$row['reproduction'];
     $socialStructure=$row['socialStructure'];
     $behavior=$row['behavior'];
     $status=$row['status'];
     $interestingFacts=$row['interestingFacts'];
     $geographics=$row['geographics'];
     

     $descriptionStr="<table>";
     if(!is_null($picture))
          $descriptionStr.='<tr>
                    <td><h3>Details</h3>:</td>
                    <td><img src="'.$picture.'"></td>
                </tr>';     
     if(!is_null($commandName))
          $descriptionStr.="<tr>
                    <td><strong>Command Name</strong>:</td>
                    <td>".$commandName."</td>
                </tr>";
     if(!is_null($scientificName))
          $descriptionStr.="<tr>
                    <td><strong>Scientific Name</strong>:</td>
                    <td>".$scientificName."</td>
                </tr>";     
     if(!is_null($weight))
          $descriptionStr.="<tr>
                    <td><strong>Weight</strong>:</td>
                    <td>".$weight."</td>
                </tr>";
     if(!is_null($height))
          $descriptionStr.="<tr>
                    <td><strong>Height</strong>:</td>
                    <td>".$height."</td>
                </tr>";
     if(!is_null($HBLength))
          $descriptionStr.="<tr>
                    <td><strong>HBLength</strong>:</td>
                    <td>".$HBLength."</td>
                </tr>";
     if(!is_null($identification))
          $descriptionStr.="<tr>
                    <td><strong>Identification</strong>:</td>
                    <td>".$identification."</td>
                </tr>";     
     if(!is_null($habitat))
          $descriptionStr.="<tr>
                    <td><strong>Habitat</strong>:</td>
                    <td>".$habitat."</td>
                </tr>";
     if(!is_null($diet))
          $descriptionStr.="<tr>
                    <td><strong>Diet</strong>:</td>
                    <td>".$diet."</td>
                </tr>";
     if(!is_null($reproduction))
          $descriptionStr.="<tr>
                    <td><strong>Reproduction</strong>:</td>
                    <td>".$reproduction."</td>
                </tr>";
     if(!is_null($socialStructure))
          $descriptionStr.="<tr>
                    <td><strong>Social Sturture</strong>:</td>
                    <td>".$socialStructure."</td>
                </tr>";     
     if(!is_null($behavior))
          $descriptionStr.="<tr>
                    <td><strong>Behavior</strong>:</td>
                    <td>".$behavior."</td>
                </tr>";
     if(!is_null($status))
          $descriptionStr.="<tr>
                    <td><strong>Status</strong>:</td>
                    <td>".$status."</td>
                </tr>";
     if(!is_null($interestingFacts))
          $descriptionStr.="<tr>
                    <td><strong>Intersting Facts</strong>:</td>
                    <td>".$interestingFacts."</td>
                </tr>";
     if(!is_null($geographics))
          $descriptionStr.="<tr>
                    <td><strong>Geographics</strong>:</td>
                    <td>".$geographics."</td>
                </tr>";
     $descriptionStr.="</table>";


     $leftStr="<table>";

     function getID($ID,$searchName,$resultName,$ID2IDTable){
          include 'Config.php';
          $sql='SELECT '.$resultName.' FROM '.$ID2IDTable.' WHERE '.$searchName.'='.$ID.'';
          $result=mysqli_query($con,$sql);
          $row=mysqli_fetch_array($result);
          return $row[$resultName];
     }

     $genusID=getID($Id,"speciesID","genusID","genus2species");
     $familyID=getID($genusID,"genusID","familyID","family2genus");
     $orderID=getID($familyID,"familyID","ordersID","orders2family");
     $classID=getID($orderID,"ordersID","classID","class2orders");
     $phylumID=getID($classID,"classID","phylumID","phylum2class");

     function getName($ID,$tableName){
          include 'Config.php';
          $sql="SELECT name FROM $tableName WHERE ID=$ID";
          $result=mysqli_query($con,$sql);
          $row=mysqli_fetch_array($result);
          return $row["name"];
     }

     $genusName=getName($genusID,"genus");
     $familyName=getName($familyID,"family");
     $orderName=getName($orderID,"orders");
     $className=getName($classID,"class");
     $phylumName=getName($phylumID,"phylum");

     $leftStr.="<tr>
                    <td><strong>Phylum</strong>:</td>
                    <td>".$phylumName."</td>
                </tr>";
     $leftStr.="<tr>
                    <td><strong>Class</strong>:</td>
                    <td>".$className."</td>
                </tr>";     
     $leftStr.="<tr>
                    <td><strong>Order</strong>:</td>
                    <td>".$orderName."</td>
                </tr>";
     $leftStr.="<tr>
                    <td><strong>Family</strong>:</td>
                    <td>".$familyName."</td>
                </tr>";
     $leftStr.="<tr>
                    <td><strong>Genus</strong>:</td>
                    <td>".$genusName."</td>
                </tr>";
      $leftStr.="</table>";
?>