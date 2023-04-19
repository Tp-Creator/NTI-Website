<?php 
        //  Includes functions related to the db
    require_once('includes/dbh.func/forum/dbh.forum.php');
    require_once('includes/dbh.func/schedule/dbh.schedule.php');

        //  Includes php elements
    require_once('includes/HTMLElements/general.elements.php');
    require_once('includes/HTMLElements/schedule.elements.php');

    $courses = getCourses();

    $lessons = getLessons(1);
    // $class = getClassById(1);
    $classes = getClasses();
    console_log($classes);

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
    <script src="/public/js/schedule/schedule.js"></script>
    <!-- <script src="/public/js/forum/forum.js"></script> -->

    <!-- Basic style links -->
    <link rel="stylesheet" href="/public/style/mainStyle.css">
    <link rel="stylesheet" href="/public/style/commonStyle.css">
    <link rel="stylesheet" href="/public/style/pages/scheduleStyle.css">
    <!-- Page style links -->

    <title>Schedule</title>
</head>

<body>

    <!-- Navigationbar  -->
    <div class="container mainNavCon">
        <nav>
            <?php echo drawNavbar() ?>
        </nav>
    </div>

    
    <select name="class-select" id="class-select">
        <option value="">Select your class</option>
        <?php
            for($i = 0; $i < sizeof($classes); $i++){
                $id = $classes[$i]->className;
                echo "<option value='$id'>$id</option>";
            }
        ?>
    </select>


    <img id="schedule-img" src="/public/img/schedule/te_21.png" alt="">

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