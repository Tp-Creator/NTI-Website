<?php 
        //  Includes functions related to the db
    // include_once '../../../includes/loginCheck.php'; is not needed anymore
    // include_once 'includes/dbh.func/general/dbh.inc.php';
    // include_once 'includes/dbh.func/general/dbh.general.php';
    require_once('includes/dbh.func/forum/dbh.forum.php');

        //  Includes php elements
    require_once('includes/HTMLElements/general.elements.php');
    require_once('includes/HTMLElements/forum.elements.php');

    $courses = getCourses();
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

    <!-- Basic style links -->
    <link rel="stylesheet" href="/public/style/mainStyle.css">
    <link rel="stylesheet" href="/public/style/commonStyle.css">
    <!-- Page style links -->
    <link rel="stylesheet" href="/public/style/pages/forumStyle.css">

    <title>Forum</title>
</head>

<body>

    <!-- Navigationbar  -->
    <div class="container mainNavCon">
        <nav>
            <?php echo drawNavbar() ?>
        </nav>
    </div>


    <div id="body">

        <!-- <div id="filterCon">
            <p>Sort by course</p>

            <button class="filterBut">Programmering</button>
        </div> -->


        <header>
            <div id="header">
                <div id="filterCon">
                    <button class="filterBut">All courses</button>
                    <?php echo filterMenu(); ?>
                </div>

                <?php
                    //  Removes the ask a question button if your not signed in
                    if(getUserRank() > 0){
                        echo '<button id="askQuestion">Ask a question</button>';
                    } 
                ?>
                <!-- <button id="askQuestion">Ask a question</button> -->
            </div>

            <?php
                //  Removes the ask a question menu if not signed in
                if(getUserRank() > 0){
            ?>
                    <form id="addQuestionCard" style="display: none;">
                        <input class="formInput formTitel" placeholder="Enter your question" name="title" id="title"></input>

                        <!-- Input description -->
                        <!-- <textarea class="formInput formDescription" placeholder="Enter a description" rows="5" name="content" id="content"></textarea> -->
                        <div class="formInput formDescription" role="textbox" contenteditable style="min-height: 120px;" name="content" id="content"></div>

                        <select class="optionsCon formOptionsCon" name="courseID" id="courseID">  
                            <option class="" value="">Choose a "Course"</option>

                            <?php 
                                    //  Loops as many choices as there are courses in the db
                                for($i = 0; $i < sizeof($courses); $i++){
                            ?>
                                <option class="" value="<?php echo $courses[$i]->CourseID ?>"><?php echo $courses[$i]->CourseName ?></option>
                            <?php 
                                }
                            ?>
                        </select>

                        <div class="devider"></div>

                        <button id="postQuestionButton" type="submit">Post</button>
                    </form>
            <?php
                }
            ?>
        <header>

        <!-- Content feed -->
        <section id="questionCardFeed">
            <?php 
                $questions = getQuestions();
                        
                //  Amount of cards is the amount of cards that will be displayed
                for($current = sizeof($questions)-1; $current >= 0; $current--){
                    echo questionCard($questions[$current]);

                }
            ?>
        </section>

    </div>
        
    <?php 
        echo drawFooter();
    ?>
    
</body>
</html>