<?php 

        //  Includes functions related to the db
    // include_once 'includes/loginCheck.php';
    // include_once 'includes/dbh.func/general/dbh.inc.php';
    // include_once 'includes/dbh.func/general/dbh.general.php';
    include_once('includes/dbh.func/forum/dbh.forum.php');


        //  Includes php elements
    include_once('includes/HTMLElements/general.elements.php');
    include_once('includes/HTMLElements/forum.elements.php');


    //  Here we put some of the logic so that we don't have to put it down there...
        //  Gets the specific question by ID
    $question = getQuestionByID($_GET["question"]);
        // Gets all the answers
    $answers = fetchAnswersWithQuestionID($_GET["question"]);
        //  Gets the course from the question
    $course = getCourseByID($question->CourseID);
        //  Gets the user that asked the question
    $user = getUserFromId($question->UserID);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/public/js/forum/forumQuestion.js"></script>

    <link rel="stylesheet" href="/public/style/mainStyle.css">    
    <link rel="stylesheet" href="/public/style/pages/forumStyle.css">
    <link rel="stylesheet" href="/public/style/pages/question.css">

    <title><?php echo $question->Title ?></title>
</head>
<body>

    <h1>Gradeless</h1>


    <a class="returnBtn" href="/forum">Return</a>

    
    <header>
        <div class='cardHeader'>
            <img class='publisherPfp' src='public/img/pfp/$usrMail.png' alt=''>
    
            <div class='publisherMeta'>
                <p class='publisher'><?php echo $user->Username; ?></p>
                <p class='publishDate'><?php echo timestampToRead($question->dt); ?></p>
            </div>
        </div>

        <h4 class="title"><?php echo $question->Title ?></h4>
        <p class="description"><?php echo $question->Content ?></p>
    </header>


    <?php
        //  Only show the answer box if signed in
        if(getUserRank() > 0){
    ?>
        <form id="answerQuestionCard" name="answerQuestionCard">
            <div class="formSection">
                <div class="sectionHeaderBtnCon">
                    <div>
                        <h4 class="formSectionTitle">Answer <?php echo $user->Username; ?> question</h4>
                        <p class="formSectionDescription">Remember to be kind!</p>
                    </div>

                    <button class="readyToPublishBtn" id="postQuestionButton" type="submit">Publish</button>
                </div>

                <textarea placeholder="The answer to your question..." id="newAnswerContent" name="newAnswerContent"></textarea>
            </div>
        </form>
    <?php 
        }
    ?>

    
    <div class="answerFeed">     
        <?php 
            for($ans = 0; $ans < sizeof($answers); $ans++){
                // if($answers[$ans]->CommentID == NULL){
                    echo answerCard($answers[$ans]);
                // }
            }
        ?>
    </div>
    
    
    <nav>
        <?php echo drawNavbar() ?>
    </nav>

</body>
</html>