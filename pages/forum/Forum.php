<?php 

    //Includes functions related to the db
    include_once '../../includes/dbh.func/dbh.all.php';
    include_once '../../includes/loginCheck.php';

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

        <!-- searchbar -->
        <form class="searchbar" action="">
            
            <!-- ( "Searchfield where user are able to type" ) -->
            <input class="searchfield" placeholder="Search . . ." type="text">

            <!-- ( "Search Button" ) -->
            <button class="searchButton">
                <img class="icon" src="" alt="">
            </button>
        </form>

        <!-- "ask a question" button -->
        <button class="buttonType1">ask a question</button>

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
            <p><?php echo $courses[$i][1] ?></p> 

            <!-- Course color -->
            <div class="courseMark"></div>
        </button>


        <?php 
        
            }
        
        ?>
    </div>


    <!-- Content feed -->
    <section class="contentFeed FP2">
        
        <!-- Create question card -->
        <div class="forumCard">
            <!-- choose course -->
            <select class="AQCP1" name="" id="">
                <!-- course -->
                <option value="">Course 1</option>
                <!-- course -->
                <option value="">Course 2</option>
                <!-- course -->
                <option value="">Course 3</option>
            </select>
            <!-- Input question -->
            <textarea class="AQCP2" placeholder="Question . . ." name="" rows="1"></textarea>
            <!-- Input description -->
            <textarea class="AQCP3" placeholder="Description . . ." name="" rows="10"></textarea>
        </div>


        <?php 
        $questions = getQuestions();

        //  Amount of cards is the amount of cards that will be displayed
        for($current = 0; $current < sizeof($questions); $current++){
        
            //  Gets the course we are in
            $course = getCourseByID($questions[$current][1]);
            $user = getUserFromId($questions[$current][2]);
        ?>


        <!-- hämtar id:t på frågan och lägger till den i url:en -->
        <a href="forumQuestion.php?question=<?php echo $questions[$current][0] ?>">
            <div class="forumCard">
                <!-- Corse pill -->
                <div class="pill QCP1">
                    <p><?php echo $course[1] ?></p>
                </div>

                <!-- Vote -->
                <button class="pill QCP2">
                    <?php echo $questions[$current][6] ?>
                    <!-- <img class="icon" src="" alt=""> -->
                </button>

                <!-- Card information -->
                <div class="pill QCP3">
                    <!-- Username -->
                    <p><?php echo $user[1]; ?></p>

                    <!-- Date -->
                    <p><?php echo $questions[$current][5]; ?></p>
                </div>

                <!-- Card title/question -->
                <p class="RegularText QCP4"><?php echo $questions[$current][3] ?></p>
            </div>
        </a>


        <?php
            }

            // postQuestion(1, 1, "fråga", "dfvbskjvbsjbv", "2023-01-13 03:04:11", 0);
        ?>


    </section>
    

    <footer class="FP4"></footer>

</body>
</html>