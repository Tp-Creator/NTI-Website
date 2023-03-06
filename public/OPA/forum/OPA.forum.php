<?php 

// include_once 'includes/dbh.func/forum/dbh.forum.php';
// include_once 'includes/HTMLElements/forum/forum.elements.php';

set_include_path($_SERVER['DOCUMENT_ROOT']);

require_once('includes/dbh.func/forum/dbh.forum.php');
require_once('includes/HTMLElements/forum.elements.php');
// include_once($_SERVER['DOCUMENT_ROOT'] . '/includes/dbh.func/forum/dbh.forum.php');

// console_log("hej");

function sendQuestion()
{
    session_start(); //start the PHP_session function 

        //  Omvandlar alla tecken som HTML kan tolka som kod till ngt annat
    $courseID = htmlspecialchars($_POST['courseID'], ENT_QUOTES, 'UTF-8');
    $userID = htmlspecialchars($_SESSION['userID'], ENT_QUOTES, 'UTF-8');
    $title = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
    $content = htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8');

                                                        //  Gör om till string för att spara i db
    postQuestion($courseID, $userID, $title, $content, floor(microtime(true) * 1000));
}


function getNewQuestions()
{
    $clientTime = $_POST['lastQuestion'];
    
    $newQuestions = getQuestionsFromTime($clientTime);

    
    if(sizeof($newQuestions) > 0){
        $html = "";

        for ($question = 0; $question < sizeof($newQuestions); $question++){
            $html .= questionCard($newQuestions[$question]);
        }

    } else{
        $html = false;
    }

    echo $html;

}



switch($_POST["function"]){
    case 1:
        sendQuestion();
    break;
    case 2:
        getNewQuestions();
    break;
}

?>