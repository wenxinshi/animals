<?php
session_start();
include 'Config.php';
$userID=$_SESSION['userID'];
$speciesID=$_GET['Id'];
$tag=$_GET['tag'];

$sql="        ";
mysqli_query($con,$sql);
?> 