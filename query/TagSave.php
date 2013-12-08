<?php
session_start();
include 'Config.php';
$userID=$_SESSION['userID'];
$speciesID=$_GET['Id'];
$tag=$_GET['tag'];

$sql="INSERT INTO tags (VID, tag) VALUES ((SELECT VID FROM visited where userID =".$userID." AND speciesID =".$speciesID." ORDER BY time DESC LIMIT 1), '".$tag."')";

mysqli_query($con,$sql);
echo $sql;
// $row=mysqli_fetch_array($result);
// $TagContent=$row['tag'];
// echo $TagContent;

?> 