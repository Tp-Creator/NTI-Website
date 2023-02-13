<?php 

        //  Includes functions related to the db
    // include_once '../../../includes/loginCheck.php'; is not needed anymore
    include_once 'includes/dbh.inc.php';
    include_once 'includes/dbh.general.php';
    include_once 'pages/forum/dbh.forum.php';


        //  Includes php elements
    include_once 'HTMLElements/navbar.php';
    include_once 'pages/forum/main/.elements.php';

    session_start(); //start the PHP_session function

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="forum.js"></script>

    <!-- Basic style links -->
    <link rel="stylesheet" href="/style/main1.css">
    <link rel="stylesheet" href="/style/common1.css">
    <!-- Page style links -->
    <link rel="stylesheet" href="pages/forum/forum.css">

    <title>Forum</title>
</head>
<body>

<header class="FP1">
        <!-- funktion to draw the navbar -->
        <nav>
            <?php echo drawNavbar() ?>
        </nav>

    <!-- searchbar -->
    <form class="searchbar" action="">
        
        <!-- ( "Searchfield where user are able to type" ) -->
        <input class="searchfield" placeholder="Search . . ." type="text">

        <!-- ( "Search Button" ) -->
        <button class="searchButton">
            <img class="icon" src="/style/includes/icons/searchIcon.svg" alt="">
        </button>
    </form>

    <!-- "ask a question" button -->
    <button class="buttonType1" id="askQuestion">Ask a question</button>

</header>


    <!-- corses -->
    <div class="corses FP3">
        <p>Courses</p>

        <?php 
        
            $courses = getCourses();

            for($i = 0; $i < sizeof($courses); $i++){

        ?>


        <!-- Course Button -->
        <button class="buttonType2">

            <!-- Course name -->
            <p class="buttonText"><?php echo $courses[$i][1] ?></p> 

            <!-- Course color -->
            <div class="courseMark <?php echo $courses[$i][2] ?>"></div>
        </button>


        <?php 
        
            }
        
        ?>
    </div>


    <!-- Content feed -->
    <section class="contentFeed FP2">
        
        <!-- Ask a question card -->
        <form class="forumCard" id="askNewQuestionCard" style="display: none;">
            <!-- choose course -->
            <select class="AQCP1 pill" name="courseID" id="courseID">
                
                <option value="">Choose a course</option>

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

            <!-- Input question -->
            <textarea class="AQCP2 titleText" placeholder="How to do a for loop in Javascript?" name="title" id="title" rows="1"></textarea>

            <!-- Input description -->
            <textarea class="AQCP3" placeholder="I am trying to make loop that can solve . . ." name="content" id="content" rows="5"></textarea>

            <button class="buttonType1 AAQP1" id="postNewQuestionButton" type="submit">Post</button>
        </form>


        <div id="questionCardFeed">
            <?php 
                $questions = getQuestions();

                    //  Amount of cards is the amount of cards that will be displayed
                for($current = sizeof($questions)-1; $current >= 0; $current--){

                    echo questionCard($questions[$current]);

                }
                
            ?>
        </div>


        


    </section>
    
    
    <footer class="FP4"></footer>

</body>
</html>