<?php 

set_include_path($_SERVER['DOCUMENT_ROOT']);

include_once('includes/dbh.func/forum/dbh.forum.php');
include_once('includes/dbh.func/general/dbh.inc.php');
include_once('includes/HTMLElements/forum.elements.php');


session_start(); //start the PHP_session function 



function sendAnswer()
{
        //  Omvandlar alla tecken som HTML kan tolka som kod till ngt annat
    $questionID = htmlspecialchars($_POST["questionID"], ENT_QUOTES, 'UTF-8');
    $userID = htmlspecialchars($_SESSION['userID'], ENT_QUOTES, 'UTF-8');
    $content = htmlspecialchars($_POST['newAnswerContent'], ENT_QUOTES, 'UTF-8');

    postAnswer($questionID, $userID, $content, floor(microtime(true) * 1000));
}

function getNewAnswers()
{
    $clientTime = $_POST['lastAnswer'];
    
    $newAnswers = getAnswersFromTime($clientTime);

    
    if(sizeof($newAnswers) > 0){
        $html = "";

        for ($ans = 0; $ans < sizeof($newAnswers); $ans++){
            // console_log($newAnswers[$ans]);
            $html .= answerCard($newAnswers[$ans]);
        }

    } else{
        $html = false;
    }

    echo $html;

}



switch($_POST["function"]){
    case 1:
        sendAnswer();
    break;
    case 2:
        getNewAnswers();
    break;
}

?>