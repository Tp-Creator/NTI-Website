<?php 

        //  Includes functions related to the db
    // include_once '../../../includes/loginCheck.php'; is not needed anymore
    include_once 'includes/dbh.func/general/dbh.inc.php';
    include_once 'includes/dbh.func/general/dbh.general.php';
    include_once 'includes/dbh.func/forum/dbh.forum.php';

        //  Includes php elements
    include_once 'includes\HTMLElements\general.elements.php';
    include_once 'includes\HTMLElements\forum.elements.php';


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
    <link rel="stylesheet" href="/public/style/pages/forum/forumStyle.css">
    <link rel="stylesheet" href="/public/style/elementPosition.css">

    <title>Schoolhub Forum</title>
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

        <div class="verticalCon header1">
            <!-- Filter -->
            <select class="filterPill" name="" id="">
                <option value="">Latest</option>
                <option value="">Popular</option>
                <option value="">My questions</option>
                <option value="">Saved questions</option>
            </select>

            <!-- Course -->
            <select class="filterPill" name="" id="">
                <?php 
                    $courses = getCourses();
                        //  Loops as many choices as there are courses in the db
                    for($i = 0; $i < sizeof($courses); $i++){
                ?>
                <!-- course $courses[$i][1] is the name of the course currently looped-->
                <option value="<?php echo $courses[$i][1] ?>"><?php echo $courses[$i][1] ?></option>
                <?php 
                    }
                ?>
            </select>

            <!-- Page status -->
            <p></p>
        </div>

        <div class="verticalCon header2">
            <!-- Searchbar -->
            <form class="searchbar" action="">
                <input class="searchfield" placeholder="Search" type="text">
                <button class="searchButton"><img class="icon" src="/public/style/includes/icons/searchIcon.svg" alt=""></button>
            </form>

            <!-- "Ask a question" button -->
            <button class="aaqButton" id="askQuestion">Ask a question</button>
        </div>
        
        <!-- Ask a question form -->
        <form class="askAQuestionForm" id="askNewQuestionCard" style="display: none;">
                <!-- card header  -->
                <div class="aaqHeader">
                    <!-- Input question -->
                    <input class="aaqQuestionInput" placeholder="Enter your question" name="title" id="title"></input>

                    <!-- Choose course -->
                    <select class="aaqSelect" name="courseID" id="courseID">  
                        <option value="">Choose course</option>

                        <?php 
                                //  Loops as many choices as there are courses in the db
                            for($i = 0; $i < sizeof($courses); $i++){
                        ?>
                            <!-- course $courses[$i][1] is the name of the course currently looped-->
                            <option value="<?php echo $courses[$i][0] ?>"><?php echo $courses[$i][1] ?></option>
                        <?php 
                            }
                        ?>

                    </select>

                    <button class="aaqPostButton" id="postNewQuestionButton" type="submit">Post</button>
                </div>

                <!-- Input description -->
                <input class="aaqInput" placeholder="Enter a description" name="content" id="content"></input>
            </form>
    </header>


    <!-- Content feed -->
    <section class="horizontalCon contentFeed" id="questionCardFeed">

        <?php 
            $questions = getQuestions();

                //  Amount of cards is the amount of cards that will be displayed
            for($current = sizeof($questions)-1; $current >= 0; $current--){
                echo questionCard($questions[$current]);

            }
        ?>

    </section>

    <footer></footer>
</body>
</html>