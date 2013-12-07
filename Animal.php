<?php include 'layer/Header.php';?>
<?php include 'layer/Top.php';?>
<?php include_once 'query/Animal_Sql.php';?>
<?php 
    
    
    if(isset($_SESSION['userID'])){
    $userID=$_SESSION['userID'];
    $username=$_SESSION['username'];
    $speicesID=$_GET['Id'];
    
    $sql="INSERT INTO visited (userID,speciesID) VALUES
    ('$userID','$speicesID')";
    $insert=mysqli_query($con,$sql) or die (mysqli_error());};
  
?>   
<?php include 'layer/MainContent.php';?>
<?php include 'layer/Recommand.php';?>
<?php include 'layer/Footer.php';?>