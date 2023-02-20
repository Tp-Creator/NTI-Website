<?php 

        //  Includes functions related to the db
    // include_once 'includes/loginCheck.php';
    include_once 'includes\dbh.func\general\dbh.inc.php';
    include_once 'includes\dbh.func\general\dbh.general.php';
    include_once 'includes\dbh.func\forum\dbh.forum.php';


        //  Includes php elements
    include_once 'includes\HTMLElements\general.elements.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/public/js/forum/forum.js"></script>

    <!-- style links -->
    <link rel="stylesheet" href="/public/style/mainStyle.css">
    <link rel="stylesheet" href="/public/style/commonStyle.css">
    
    <link rel="stylesheet" href="/public/style/pages/forum/forumStyle.css">
    <link rel="stylesheet" href="/public/style/pages/forum/forumElementPosition.css">

    <title>Forum</title>
</head>
<body>

    <header>
        <!-- Navigation bar -->
        <div id="navCon">
            <a id="logoButton" href="/">Schoolhub</a>
            <nav>
                <?php echo drawNavbar() ?>
            </nav>
        </div>

        <div class="header2">
            <!-- "Ask a question" button -->
            <a class="aaqButton" href="/forum">Back to forum</a>

            <!-- Searchbar -->
            <form class="searchbar" action="">
                <input class="searchfield" placeholder="Search" type="text">
                <button class="searchButton"><img class="icon" src="/public/style/includes/icons/searchIcon.svg" alt=""></button>
            </form>
        </div>
    </header>

    <!-- Question card -->
    <section class="contentFeed">
        <?php 
            $question = getQuestionByID($_GET["question"]);
            
                // Gets all the answers
            $answers = fetchAnswersWithQuestionID($_GET["question"]);
                //  Gets the course from the question
            $course = getCourseByID($question->CourseID);
                //  Gets the user that asked the question
            $user = getUserFromId($question->UserID);
        ?>

        <div class="sectionHeader">
            <!-- Section title -->
            <p class="title">Question</p>

            <!-- Corse pill -->
            <p class="meta"><?php echo $course[1] ?></p>
        </div>

        <!-- Question card  -->
        <div class="forumCard">
            <div class="fcHeader">
                <!-- Username -->
                <p class="fcUsername"><?php echo $user->Username; ?></p>
                <!-- Date -->
                <p class="fcInfoText"><?php echo $question->dt; ?></p>
            </div>

            <!-- Card title/question -->
            <p class="fcTitleText"><?php echo $question->Title ?></p>

            <!-- Question description -->
            <p class="titleText"><?php echo $question->Content ?></p>
        </div>

        <form class="forumCard2" name="postNewAnswer" id="postNewAnswer">
            <!-- ( "Searchfield where user are able to type" )  The name of the user that asked the question -->
            <input class="aaqQuestionInput" placeholder="Answer <?php echo $user->Username; ?>'s question" type="text" name="newAnswerContent" id="newAnswerContent">
    
            <button class="aaqPostButton" type="submit">Post</button>
            <!-- <button class="buttonType1 AQP2">Post</button> -->
        </form>

        <!-- Section title -->
        <p class="sectionHeader">Answers</p>

        <?php 
            for($ans = 0; $ans < sizeof($answers); $ans++){

                if($answers[$ans]->CommentID != NULL){
                    continue;
                }

                $ansUser = getUserFromId($answers[$ans]->UserID);
                $comments = getCommentsByAnswerID($answers[$ans]->AnswerID);
        ?>

        <div class="forumCard">
            <!-- Card information -->
            <div class="fcHeader">
                <!-- Username -->
                <p class="fcUsername"><?php echo $ansUser->Username ?></p>
                <!-- Reply button -->
                <button class="meta replyButton">Reply</button>
                <!-- Date & Time -->
                <p class="fcInfoText"><?php echo $answers[$ans]->dt ?></p>
            </div>

            <!-- Card title/answer -->
            <p class="titleText"><?php echo $answers[$ans]->Content ?></p>
        </div>

        <?php
            for($com = 0; $com < sizeof($comments); $com++){
                $comUser = getUserFromId($comments[$com]->UserID);
        ?>

        <!-- Comment to answer -->
        <!-- <div class="forumCard"> -->
            <!-- Card information -->
            <!-- <div class="pill QCP1"> -->
                <!-- Username -->
                <!-- <p class="infoText"><?php //echo $comUser->Username ?></p> -->
                <!-- Date -->
                <!-- <p class="infoText"><?php //echo $comments[$com]->dt ?></p> -->
            <!-- </div> -->
            <!-- Reply button -->
            <!-- <button class="pill">Reply</button> -->
            <!-- Card title/answer -->
            <!-- <p class="regularText QCP4"><?php //echo $comments[$com]->Content ?></p> -->
        <!-- </div> -->

        <?php
                }
            }
        ?>
    </section>
    
    <footer></footer>

</body>
</html>