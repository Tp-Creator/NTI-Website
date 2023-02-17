<?php 
// return;
// echo "hej";
set_include_path($_SERVER['DOCUMENT_ROOT']);

include_once 'includes/dbh.func/forum/dbh.forum.php';

// console_log("hej");

session_start(); //start the PHP_session function 

    //  Omvandlar alla tecken som HTML kan tolka som kod till ngt annat
$questionID = htmlspecialchars($_POST["questionID"], ENT_QUOTES, 'UTF-8');
$userID = htmlspecialchars($_SESSION['userID'], ENT_QUOTES, 'UTF-8');
$content = htmlspecialchars($_POST['newAnswerContent'], ENT_QUOTES, 'UTF-8');

postAnswer($questionID, $userID, $content, floor(microtime(true) * 1000));

?>