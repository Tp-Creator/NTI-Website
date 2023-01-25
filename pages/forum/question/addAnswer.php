<?php 

include_once '../dbh.func/dbh.all.php';

session_start(); //start the PHP_session function 

postAnswer($_POST["questionID"], $_SESSION['userID'], $_POST['newAnswerContent'], date("Y-m-d H:i:s"))

// echo $_POST["content"];

?>