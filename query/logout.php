<?php
session_start();

//This function will destroy your session
session_destroy();
echo "You are now logged out! <a href=../index.php>Home</a>";

?> 