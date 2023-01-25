<?php
    // This file checks if the user is logged in by checking if the session
    // contains an userID. If not it directs the user to the login page.


session_start(); //start the PHP_session function 

if(!isset($_SESSION['userID']))
{
    header("location:/pages/account/login/login.php");
}

?>