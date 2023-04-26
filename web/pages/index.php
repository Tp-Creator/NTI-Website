<?php 

    //  Includes php elements
    include_once('includes/HTMLElements/general.elements.php');
    include_once('includes/HTMLElements/forum.elements.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#101014">
    <!-- random style links -->
    <link rel="stylesheet" href="/public/style/mainStyle.css">
    <link rel="stylesheet" href="/public/style/commonStyle.css">
    <link rel="stylesheet" href="/public/style/pages/indexStyle.css">

    <title>We're GradeLess</title>
</head>
<body>

    <!-- Navigationbar  -->
    <div class="container mainNavCon">
        <nav>
            <?php echo drawNavbar() ?>
        </nav>
    </div>




    <header>
        <h1 id="mainTitle">Gradeless</h1>
        <p id="mainP">A place for students by students.</p>

        <a id="loginBut" href="/google">
            <img id="loginIcon" src="/public/style/includes/icons/google-icon.svg" alt="">
            <p id="login">Login</p>
        </a>
    </header>
    



    <div class="infoSection">
        <img class="infoImg" src="/public/style/includes/icons/foodIcon.svg" alt="">
        <div class="infoSectionHeader">
            <p class="infoTitle">Lunch</p>
            <p class="infoDes">See what food will be served for lunch today and the coming weeks.</p>
        </div>
    </div>

    <div class="infoSection sectionReverse">
        <div class="infoSectionHeader">
            <p class="infoTitle">Forum</p>
            <p class="infoDes">The forum is a place where you can ask and answer questions on varying subjects.</p>
        </div>
        <img class="infoImg" src="/public/style/includes/icons/nav/question_icon.svg" alt="">
    </div>

    <div class="infoSection">
        <img class="infoImg" src="/public/style/includes/icons/nav/event_icon.svg" alt="">
        <div class="infoSectionHeader">
            <p class="infoTitle">Schedule</p>
            <p class="infoDes">Schedules for all the classes.</p>
        </div>
    </div>

    <div class="infoSection sectionReverse">
        <div class="infoSectionHeader">
            <p class="infoTitle">Games</p>
            <p class="infoDes">Play games that were created and uploaded by students or even make your own.</p>
        </div>
        <img class="infoImg" src="/public/style/includes/icons/nav/gamepad_icon.svg" alt="">
    </div>





    <?php 
        echo drawFooter();
    ?>

</body>
</html>