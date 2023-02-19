<?php 
        //  Includes functions related to the db
    include_once '../../../includes/loginCheck.php';
    include_once '../../../includes/dbh.inc.php';
    include_once '../../../includes/dbh.general.php';
    include_once '../dbh.forum.php';
        //  Includes php elements
    include_once '../../../HTMLElements/navbar.php';
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
    <link rel="stylesheet" href="/style/mainStyle.css">
    <link rel="stylesheet" href="/style/commonStyle.css">
    <!-- Page style links -->
    <link rel="stylesheet" href="../forumStyle.css">
    <link rel="stylesheet" href="../forumElementPosition.css">

    <title>Schoolhub Forum</title>
</head>

<body>
    <header class="FP1">
        <!-- Navigation bar -->
        <div id="navCon">
            <a id="logoButton" href="../../index.html">Schoolhub</a>
            <nav>
                <?php drawNavbar() ?>
            </nav>
        </div>

        <div class="header1">
            <!-- Filter -->
            <select class="filterPill" name="" id="">
                <option value="">Latest</option>
                <option value="">Popular</option>
                <option value="">My questions</option>
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

        <div class="header2">
            <!-- Searchbar -->
            <form class="searchbar" action="">>
                <input class="searchfield" placeholder="Search" type="text">
                <button class="searchButton"><img class="icon" src="/style/includes/icons/searchIcon.svg" alt=""></button>
            </form>

            <!-- "Ask a question" button -->
            <button class="" id="askQuestion">Ask a question</button>
        </div>
    </header>


    <!-- Content feed -->
    <section class="contentFeed">
        
        <!-- Ask a question form -->
        <form class="askAQuestionForm" id="askNewQuestionCard">

            <!-- card header  -->
            <div class="aaqHeader">
                <p id="aaqTitle">Ask a question</p>

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

            <div class="aaqBody">
                <!-- Input question -->
                <input class="aaqInput" placeholder="Enter a title" name="title" id="title"></input>

                <div class="lineHorizontal"></div>

                <!-- Input description -->
                <input class="aaqInput" placeholder="Enter a description" name="content" id="content"></input>
            </div>
        </form>


        <?php 
            $questions = getQuestions();

            //  Amount of cards is the amount of cards that will be displayed
            for($current = 0; $current < sizeof($questions); $current++){
        
            //  Gets the course we are in
            $course = getCourseByID($questions[$current][1]);
            $user = getUserFromId($questions[$current][2]);
        ?>


        <!-- hämtar id:t på frågan och lägger till den i url:en -->
        <a href="../question/forumQuestion.php?question=<?php echo $questions[$current][0] ?>">
            <div class="forumCard">
                <!-- Username -->
                <p class="usernameText"><?php echo $user[1]; ?></p>

                <!-- Meta -->
                <div class="meta <?php echo $course[2] ?>"><p><?php echo $course[1] ?></p></div>

                <!-- Date & Time -->
                <p class="infoText"><?php echo $questions[$current][5]; ?></p>
            
                <!-- Card title aka question -->
                <p class="titleText"><?php echo $questions[$current][3] ?></p>
            </div>
        </a>


        <?php
            }
        ?>
    </section>
</body>
</html>