<?php
    // This file checks if the user is logged in by checking if the session
    // contains an userID. If not it directs the user to the login page.


session_start(); //start the PHP_session function 

if(!isset($_SESSION['userID']))
{
    http_response_code(404);
    //header("location:../../pages/account/login.php");
    //header("location:/pages/account/login/login.php");
}

?>