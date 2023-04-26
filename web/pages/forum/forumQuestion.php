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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#101014">

        <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/public/js/forum/forumQuestion.js"></script>

    <!-- style links -->
    <link rel="stylesheet" href="/public/style/mainStyle.css">
    <link rel="stylesheet" href="/public/style/commonStyle.css">
    
    <link rel="stylesheet" href="/public/style/pages/forumStyle.css">

    <title><?php echo $question->Title ?></title>
</head>
<body>
    
    <!-- Navigationbar  -->
    <div class="container mainNavCon">
        <nav>
            <?php echo drawNavbar() ?>
        </nav>
    </div>

    <header>
            <!-- "Aks a question" button  -->
        <a class="callToAction" href="/forum">
            Back to forum
            <!-- <img src="" alt=""> -->
        </a>
    </header>

    <!-- Question card -->
    <section class="horizontalCon contentFeed">






        <div class="sectionHeader">
            <!-- Section title -->
            <p class="sectiontitle">Question</p>

            <div class="devider"></div>

            <!-- Corse pill -->
            <p class="fcMeta"><?php echo $course->CourseName ?></p>
        </div>




        
        <!-- Question card  -->
        <div class="fcCon">
            <div class="verticalWrap">
                <!-- Username -->
                <p class="fcUserName"><?php echo $user->Username; ?></p>
                <!-- Date -->
                <p class="fcContentDatetime"><?php echo timestampToRead($question->dt); ?></p>
            </div>

            <!-- Card title/question -->
            <p class="fcContentTitle"><?php echo $question->Title ?></p>

            <!-- Question description -->
            <p class="fcDes"><?php echo $question->Content ?></p>
        </div>




        <?php
            //  Only show the answer box if signed in
            if(getUserRank() > 0){
        ?>
                <form id="answerQuestionCard" name="answerQuestionCard">
                    <!-- ( "Searchfield where user are able to type" )  The name of the user that asked the question -->
                    <textarea id="answerInput" placeholder="Answer <?php echo $user->Username; ?>'s question" rows="1" type="text" name="newAnswerContent" id="newAnswerContent"></textarea>
            
                    <button id="postQuestionButton" type="submit">Post</button>
                    <!-- <button class="buttonType1 AQP2">Post</button> -->
                </form>
        <?php 
            }
        ?>



        <!-- Section title -->
        <p class="sectionHeader sectiontitle">Answers</p>




        <?php 
            for($ans = 0; $ans < sizeof($answers); $ans++){
                // if($answers[$ans]->CommentID == NULL){
                    echo answerCard($answers[$ans]);
                // }
            }
        ?>

    </section>
    
    <?php 
        echo drawFooter();
    ?>

</body>
</html>