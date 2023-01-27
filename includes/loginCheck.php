<?php
    // This file checks if the user is logged in by checking if the session
    // contains an userID. If not it directs the user to the login page.


session_start(); //start the PHP_session function 

include_once '../../../includes/dbh.inc.php';

if(!isset($_SESSION['userID']))
{
    console_log("hej");
    // http_response_code(401);
    // header("location:/pages/account/login/login.php");
}

?>