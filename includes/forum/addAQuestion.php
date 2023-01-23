<?php 

include_once '../dbh.func/dbh.all.php';

session_start(); //start the PHP_session function 

postQuestion($_POST["courseID"], $_SESSION['userID'], $_POST["title"], $_POST["content"], date("Y-m-d H:i:s"));

// echo $_POST["content"];

?>