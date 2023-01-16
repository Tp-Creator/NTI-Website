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
    <link rel="stylesheet" href="../../style/main.css">
    <link rel="stylesheet" href="../../style/common.css">
    
    <link rel="stylesheet" href="../../style/pages/forum/forum.css">

    <title>temp: Forum</title>
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
        <button class="buttonType1">Back to forum</button>

        <!-- searchbar -->
        <form class="searchbar" action="">
            
            <!-- ( "Searchfield where user are able to type" ) -->
            <input class="searchfield" placeholder="Search . . ." type="text">

            <!-- ( "Search Button" ) -->
            <button class="searchButton">
                <img class="icon" src="" alt="">
            </button>
        </form>

    </header>


    <p class="FP6">Question</p>


    <!-- Question card -->
    <section class="contentFeed FP7">
        <?php 

        $question = getQuestionByID($_GET["question"]);

        
            //  Gets the course we are in
            $course = getCourseByID($question->CourseID);
            $user = getUserFromId($question->UserID);
        ?>


        <div class="forumCard">
            <!-- Corse pill -->
            <div class="pill QCP1">
                <p><?php echo $course[1] ?></p>
            </div>
            <!-- Vote -->
            <button class="pill QCP2">
                <?php echo $question->Upvote ?>
                <!-- <img class="icon" src="" alt=""> -->
            </button>
            <!-- Card information -->
            <div class="pill QCP3">
                <!-- Username -->
                <p><?php echo $user[1]; ?></p>
                <!-- Date -->
                <p><?php echo $question->dt; ?></p>
            </div>
            <!-- Card title/question -->
            <p class="RegularText QCP4"><?php echo $question->Title ?></p>
            <!-- Question description -->
            <p class="RegularText QCP5"><?php echo $question->Content ?></p>
        </div>
        
    </section>


    <p class="FP8">Answers</p>


    <!-- Answer question -->
    <div class="searchbar FP9">
        <!-- ( "Searchfield where user are able to type" ) -->
        <input class="searchfield" placeholder="Answer 'Username_12345' question . . ." type="text">

        <button class="buttonType1">post</button>
    </div>


    <!-- Content feed ("All the already posted answers") -->
    <section class="answerFeed FP10">

        <div class="forumCard FQP1">
            <!-- Card information -->
            <div class="pill QCP1">
                <!-- Username -->
                <p>Username_12345</p>
                <!-- Date -->
                <p>YY - MM - DD</p>
            </div>

            <!-- Reply button -->
            <button class="pill QCP6">Reply</button>
            
            <!-- Vote -->
            <button class="pill QCP7">
                12345
                <!-- <img class="icon" src="" alt=""> -->
            </button>

            <!-- Card title/answer -->
            <p class="RegularText QCP4">Answer</p>
        </div>

        <!-- Arrow icon  -->
        <img src="" alt="">

        <!-- Comment to answer above -->
        <div class="forumCard FQP3">
            <!-- Card information -->
            <div class="pill QCP1">
                <!-- Username -->
                <p>Username_12345</p>
                <!-- Date -->
                <p>YY - MM - DD</p>
            </div>

            <!-- Reply button -->
            <button class="pill QCP6">Reply</button>
            
            <!-- Vote -->
            <button class="pill QCP7">
                12345
                <!-- <img class="icon" src="" alt=""> -->
            </button>

            <!-- Card title/answer -->
            <p class="RegularText QCP4">Answer</p>
        </div>

    </section>
    

    <footer class="FP11"></footer>

</body>
</html>