<?php 

include_once '../dbh.forum.php';

session_start(); //start the PHP_session function 

    //  Omvandlar alla tecken som HTML kan tolka som kod till ngt annat
$courseID = htmlspecialchars($_POST['courseID'], ENT_QUOTES, 'UTF-8');
$userID = htmlspecialchars($_SESSION['userID'], ENT_QUOTES, 'UTF-8');
$title = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
$content = htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8');

postQuestion($courseID, $userID, $title, $content, date("Y-m-d H:i:s"));

// echo $_POST["content"];

?>