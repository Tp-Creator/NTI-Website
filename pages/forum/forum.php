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


        <!-- <button id="testButton">Hej</button>
        <button id="stestButton">sHej</button> -->


        <header>
            <button id="askQuestion">Ask a question</button>

            <form id="addQuestionCard" style="display: none;">
                <input class="formInput formTitel" placeholder="Enter your question" name="title" id="title"></input>

                <!-- Input description -->
                <textarea class="formInput formDescription" placeholder="Enter a description" rows="5" name="content" id="content"></textarea>

                <div id="formFotter">
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
                </div>
            </form>
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
        
    <div class="container">
        <footer>
            <div class="footerSection">
                <p class="footerTitle">Gradeless</p>
                <a class="footerSubject" href="">Legacy</a>
                <a class="footerSubject" href="">About us</a>
            </div>
            <div class="footerSection">
                <p class="footerTitle">Support</p>
                <a class="footerSubject" href="">Contact admin</a>
                <a class="footerSubject" href="">Help Gradeless</a>
            </div>

            <p id="footerHero">2023・www.gradeless.se・V1</p>
        </footer>
    </div>
</body>
</html>