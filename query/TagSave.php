<?php
session_start();
include 'query/Config.php';
$userID=$_SESSION['userID'];
$speciesID=$_GET['Id'];
$tag=$_GET['tag'];
$sql="INSERT INTO tags (VID, tag) VALUES ((SELECT VID FROM visited where userID =".$userID." AND speciesID =".$speciesID." ORDER BY time DESC LIMIT 1), ‘".$tag."’)";
$result=mysqli_query($con,$sql);
echo $tag;
?> 