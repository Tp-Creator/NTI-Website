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
    // console_log($classes);

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
    
    <div id="feed">
        
        <div class="weekCard">
            <!-- <p class="title">TE21</p> -->

            <select name="class-select" id="class-select">
                <?php
                   for($i = 0; $i < sizeof($classes); $i++){
                       $id = $classes[$i]->id;
                       $name = $classes[$i]->className;
                       echo "<option value='$id'>$name</option>";
                   }
                ?>
            </select>
        
            <div id="lesson-feed">
                <?php echo schedule(1) ?>
            </div>
        
        </div>


        <!-- <div class="dCard">
            <p class="dayTitle">Mon 24</p>
                   
            <div class="row1">
                <p class="cell g1">Room</p>
                <p class="cell g1">Time</p>
                <p class="cell g2">Course</p>
            </div>

            <div class="gRow">
                <p class="cell g1">105</p>
                <p class="cell g1">00:00 - 00:00</p>
                <p class="cell g2">Webbserverprogrammering</p>
            </div>

            <div class="gRow">
                <p class="cell g1">105</p>
                <p class="cell g1">00:00 - 00:00</p>
                <p class="cell g2">Webbserverprogrammering</p>
            </div>

            <div class="gRow">
                <p class="cell g1">105</p>
                <p class="cell g1">00:00 - 00:00</p>
                <p class="cell g2">Webbserverprogrammering</p>
            </div>

            <div class="gRow">
                <p class="cell g1">105</p>
                <p class="cell g1">00:00 - 00:00</p>
                <p class="cell g2">Webbserverprogrammering</p>
            </div>

            <div class="gRow">
                <p class="cell g1">105</p>
                <p class="cell g1">00:00 - 00:00</p>
                <p class="cell g2">Webbserverprogrammering</p>
            </div>

        </div> -->


        <div class="dCard">

            <p class="row1 g1">Room</p>
            <p class="row2 g1">Time</p>
            <p class="row3 g2">Course</p>

            <p class="row1 g1">105</p>
            <p class="row2 g1">08:30 - 09:05</p>
            <p class="row3 g2">Fysik</p>

            <p class="row1 g1">115</p>
            <p class="row2 g1">09:15 - 11:00</p>
            <p class="row3 g2">Mentorstid</p>

            <p class="row1 g1">122</p>
            <p class="row2 g1">17:20 - 20:00</p>
            <p class="row3 g2">Webbserverprogrammering</p>
            
        </div>

    </div>

    <?php 
        echo drawFooter();
    ?>

</body>
</html>