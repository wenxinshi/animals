<?php
session_start();
include 'Config.php';
$userID=$_SESSION['userID'];
$speciesID=$_GET['Id'];

$sql="select tag from tags where VID in (select VID from visited where userID = ".$userID." and speciesID = ". $speciesID.")";
$result=mysqli_query($con,$sql);
 
$row=mysqli_fetch_array($result);
$TagContent=$row['tag'];
echo $TagContent;
?> 