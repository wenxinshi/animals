<?php
    $hostname = "localhost";
    $username = "root";
    $dbname = "cs316";
    $password = "";

    $con=mysqli_connect("$hostname","$username","$password","$dbname");
    if(mysqli_connect_errno()) {
        die("Database connection failed: " . 
             mysqli_connect_error() . 
            " (" . mysqli_connect_errno() . ")"
    );
  }

?>