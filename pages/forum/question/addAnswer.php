<?php 

include_once '../dbh.forum.php';

session_start(); //start the PHP_session function 

    //  Omvandlar alla tecken som HTML kan tolka som kod till ngt annat
$questionID = htmlspecialchars($_POST["questionID"], ENT_QUOTES, 'UTF-8');
$userID = htmlspecialchars($_SESSION['userID'], ENT_QUOTES, 'UTF-8');
$content = htmlspecialchars($_POST['newAnswerContent'], ENT_QUOTES, 'UTF-8');

postAnswer($questionID, $userID, $content, floor(microtime(true) * 1000));

?>