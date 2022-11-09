<?php

session_start(); //start the PHP_session function 

if(!isset($_SESSION['userID']))
{
    header("location:./login.php");
}

?>