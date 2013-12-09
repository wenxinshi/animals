<?php
session_start();
include 'Config.php';
$userID=$_SESSION['userID'];
$speciesID=$_GET['Id'];
$tag=$_GET['tag'];

$sql="DELETE FROM tags WHERE VID IN (SELECT VID FROM visited WHERE userID =".$userID."  AND speciesID = ".$speciesID.") AND tag = '".$tag."'";
mysqli_query($con,$sql);
echo $sql;
?> 