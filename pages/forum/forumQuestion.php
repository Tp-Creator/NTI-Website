<?php 

    //Includes functions related to the db
    include_once '../../includes/dbh.func/dbh.all.php';
    include_once '../../includes/loginCheck.php';

    //check if this is a login request
    if($_POST) {



        if($_POST["questionAnswer"] != ""){
            postAnswer($_GET["question"], $_SESSION['userID'], $_POST["questionAnswer"], date("Y-m-d H:i:s"));
            
                //  This redirects us to the same page again witch will give the result that we can not reload the page and repost the answer!
            $q = $_GET['question'];
            header("Location: ./forumQuestion.php?question=$q");
            exit();
            
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- style links -->
    <link rel="stylesheet" href="../../style/main1.css">
    <link rel="stylesheet" href="../../style/common1.css">
    
    <link rel="stylesheet" href="../../style/pages/forum/forum.css">

    <title>Forum</title>
</head>
<body>

    <header class="FP1">
        <!-- Navigation bar -->
        <nav>
            <!-- Navbar button -->
            <a href="">
                <button class="navButton">Home</button>
            </a>
            <!-- Navbar button -->
            <a href="">
                <button class="navButton">News</button>
            </a>
            <!-- Navbar button -->
            <a href="forum.php">
                <button class="navButton">Forum</button>
            </a>
            <!-- Navbar button -->
            <a href="">
                <button class="navButton">Schedule</button>
            </a>
            <!-- Navbar button -->
            <a href="">
                <button class="navButton">Memes</button>
            </a>
            <!-- Navbar button -->
            <a href="">
                <button class="navButton">Games</button>
            </a>
            <!-- Navbar button -->
            <a href="">
                <button class="navButton">Account</button>
            </a>
        </nav>

        <!-- "ask a question" button -->
        <a href="./Forum.php">
            <button class="buttonType1">Back to forum</button>
        </a>
        <!-- searchbar -->
        <form class="searchbar" action="">
            
            <!-- ( "Searchfield where user are able to type" ) -->
            <input class="searchfield" placeholder="Search . . ." type="text">

            <!-- ( "Search Button" ) -->
            <button class="searchButton">
                <img class="icon" src="../../style/includes/icons/searchIcon.svg" alt="">
            </button>
        </form>

    </header>


    <p class="titleText FP6">Question</p>


    <!-- Question card -->
    <section class="contentFeed FP7">
        <?php 

        $question = getQuestionByID($_GET["question"]);
        
            // Gets all the answers
        $answers = fetchAnswersWithQuestionID($_GET["question"]);
            //  Gets the course from the question
        $course = getCourseByID($question->CourseID);
            //  Gets the user that asked the question
        $user = getUserFromId($question->UserID);

        ?>


        <!-- Question card  -->
        <div class="forumCard">
            <!-- Corse pill -->
            <div class="pill QCP1">
                <p class="infoText"><?php echo $course[1] ?></p>
            </div>
            <!-- Vote -->
            <button class="pill QCP2">
                <p class="infoText"><?php echo $question->Upvote ?></p>
                <!-- <img class="icon" src="" alt=""> -->
            </button>
            <!-- Card information -->
            <div class="pill QCP3">
                <!-- Username -->
                <p class="infoText"><?php echo $user[1]; ?></p>
                <!-- Date -->
                <p class="infoText"><?php echo $question->dt; ?></p>
            </div>
            <!-- Card title/question -->
            <p class="titleText QCP4"><?php echo $question->Title ?></p>
            <!-- Question description -->
            <p class="regularText QCP5"><?php echo $question->Content ?></p>
        </div>
        
    </section>


    <p class="titleText FP8">Answers</p>


    <!-- Answer question -->
        <form class="forumCard FP9" name="postAnswer" method="post" action="./forumQuestion.php?question=<?php echo $_GET["question"]?>">
            <!-- ( "Searchfield where user are able to type" )  The name of the user that asked the question -->
            <input class="searchfield AQP1" placeholder="Answer <?php echo $user[1]; ?>'s question . . ." type="text" name="questionAnswer">
    
            <button class="buttonType1 AQP2" type="submit">Post</button>
            <!-- <button class="buttonType1 AQP2">Post</button> -->
        </form>
    </div>


    <!-- Content feed ("All the already posted answers") -->
    <section class="answerFeed FP10">

        <?php 
        
            for($ans = 0; $ans < sizeof($answers); $ans++){

                if($answers[$ans]->CommentID != NULL){
                    continue;
                }

                $ansUser = getUserFromId($answers[$ans]->UserID);
                $comments = getCommentsByAnswerID($answers[$ans]->AnswerID);
        ?>

            <div class="forumCard FQP1">
                <!-- Card information -->
                <div class="pill QCP1">
                    <!-- Username -->
                    <p class="infoText"><?php echo $ansUser[1] ?></p>
                    <!-- Date -->
                    <p class="infoText"><?php echo $answers[$ans]->dt ?></p>
                </div>

                <!-- Reply button -->
                <button class="pill QCP6">Reply</button>
                
                <!-- Vote -->
                <button class="pill QCP7">
                    <p class="infoText"><?php echo $answers[$ans]->Upvote ?></p>
                    <!-- <img class="icon" src="" alt=""> -->
                </button>

                <!-- Card title/answer -->
                <p class="regularText QCP4"><?php echo $answers[$ans]->Content ?></p>
            </div>
        

            <?php
            
                for($com = 0; $com < sizeof($comments); $com++){
                    $comUser = getUserFromId($comments[$com]->UserID);

            ?>
        

            <!-- Arrow icon  -->
            <img src="" alt="">

            <!-- Comment to answer above -->
            <div class="forumCard FQP3">
                <!-- Card information -->
                <div class="pill QCP1">
                    <!-- Username -->
                    <p class="infoText"><?php echo $comUser[1] ?></p>
                    <!-- Date -->
                    <p class="infoText"><?php echo $comments[$com]->dt ?></p>
                </div>

                <!-- Reply button -->
                <button class="pill QCP6">Reply</button>
                
                <!-- Vote -->
                <button class="pill QCP7">
                    <p class="infoText"><?php echo $comments[$com]->Upvote ?></p>
                    <!-- <img class="icon" src="" alt=""> -->
                </button>

                <!-- Card title/answer -->
                <p class="regularText QCP4"><?php echo $comments[$com]->Content ?></p>
            </div>

        <?php

                }
            }

        ?>

    </section>
    

    <footer class="FP11"></footer>

</body>
</html>