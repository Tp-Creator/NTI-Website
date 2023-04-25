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

    
    <!-- <select name="class-select" id="class-select">
        <?php
        //    for($i = 0; $i < sizeof($classes); $i++){
        //        $id = $classes[$i]->className;
        //        echo "<option value='$id'>$id</option>";
        //    }
        ?>
    </select> -->
    
    <!-- <img id="schedule-img" src="/public/img/schedule/TE21.png" alt=""> -->




    <div id="feed">
        
        <div class="weekCard">
            <p class="title">Week 17</p>

            <div class="day">
                <p class="title">Mon 24</p>
                <div class="dayCard">
                    <p class="metaData">115</p>
                    <p class="metaData">08:30 - 09:55</p>
                    <p class="metaData">Fysik 1</p>
                </div>
                <div class="dayCard">
                    <p class="metaData">105</p>
                    <p class="metaData">10:05 - 11:10</p>
                    <p class="metaData">Tillämpad programmering</p>
                </div>
                <div class="dayCard">
                    <p class="metaData">105</p>
                    <p class="metaData">11:15 - 11:45</p>
                    <p class="metaData">Mentorstid</p>
                </div>
                <div class="dayCard">
                    <p class="metaData">105</p>
                    <p class="metaData">12:25 - 13:40</p>
                    <p class="metaData">Svenska 2</p>
                </div>
                <div class="dayCard">
                    <p class="metaData">105</p>
                    <p class="metaData">13:50 - 14:55</p>
                    <p class="metaData">Matematik 3c</p>
                </div>
            </div>

            <div class="day">
                <p class="title">Tue 25</p>
                <div class="dayCard">
                    <p class="metaData">105</p>
                    <p class="metaData">00:00 - 00:00</p>
                    <p class="metaData">Webbserverprogrammering</p>
                </div>
                <div class="dayCard">
                    <p class="metaData">105</p>
                    <p class="metaData">00:00 - 00:00</p>
                    <p class="metaData">programmering</p>
                </div>
                <div class="dayCard">
                    <p class="metaData">105</p>
                    <p class="metaData">00:00 - 00:00</p>
                    <p class="metaData">Webbserverprogrammering</p>
                </div>
                <div class="dayCard">
                    <p class="metaData">105</p>
                    <p class="metaData">00:00 - 00:00</p>
                    <p class="metaData">Webbserverprogrammering</p>
                </div>
                <div class="dayCard">
                    <p class="metaData">105</p>
                    <p class="metaData">00:00 - 00:00</p>
                    <p class="metaData">Webbserverprogrammering</p>
                </div>
            </div>

            <div class="day">
                <p class="title">Wed 26</p>
                <div class="dayCard">
                    <p class="metaData">105</p>
                    <p class="metaData">00:00 - 00:00</p>
                    <p class="metaData">Webbserverprogrammering</p>
                </div>
                <div class="dayCard">
                    <p class="metaData">105</p>
                    <p class="metaData">00:00 - 00:00</p>
                    <p class="metaData">programmering</p>
                </div>
                <div class="dayCard">
                    <p class="metaData">105</p>
                    <p class="metaData">00:00 - 00:00</p>
                    <p class="metaData">Webbserverprogrammering</p>
                </div>
                <div class="dayCard">
                    <p class="metaData">105</p>
                    <p class="metaData">00:00 - 00:00</p>
                    <p class="metaData">Webbserverprogrammering</p>
                </div>
                <div class="dayCard">
                    <p class="metaData">105</p>
                    <p class="metaData">00:00 - 00:00</p>
                    <p class="metaData">Webbserverprogrammering</p>
                </div>
            </div>

            <div class="day">
                <p class="title">Thu 27</p>
                <div class="dayCard">
                    <p class="metaData">105</p>
                    <p class="metaData">00:00 - 00:00</p>
                    <p class="metaData">Webbserverprogrammering</p>
                </div>
                <div class="dayCard">
                    <p class="metaData">105</p>
                    <p class="metaData">00:00 - 00:00</p>
                    <p class="metaData">programmering</p>
                </div>
                <div class="dayCard">
                    <p class="metaData">105</p>
                    <p class="metaData">00:00 - 00:00</p>
                    <p class="metaData">Webbserverprogrammering</p>
                </div>
                <div class="dayCard">
                    <p class="metaData">105</p>
                    <p class="metaData">00:00 - 00:00</p>
                    <p class="metaData">Webbserverprogrammering</p>
                </div>
                <div class="dayCard">
                    <p class="metaData">105</p>
                    <p class="metaData">00:00 - 00:00</p>
                    <p class="metaData">Webbserverprogrammering</p>
                </div>
            </div>

            <div class="day">
                <p class="title">Fri 28</p>
                <div class="dayCard">
                    <p class="metaData">105</p>
                    <p class="metaData">00:00 - 00:00</p>
                    <p class="metaData">Webbserverprogrammering</p>
                </div>
                <div class="dayCard">
                    <p class="metaData">105</p>
                    <p class="metaData">00:00 - 00:00</p>
                    <p class="metaData">programmering</p>
                </div>
                <div class="dayCard">
                    <p class="metaData">105</p>
                    <p class="metaData">00:00 - 00:00</p>
                    <p class="metaData">Webbserverprogrammering</p>
                </div>
                <div class="dayCard">
                    <p class="metaData">105</p>
                    <p class="metaData">00:00 - 00:00</p>
                    <p class="metaData">Webbserverprogrammering</p>
                </div>
                <div class="dayCard">
                    <p class="metaData">105</p>
                    <p class="metaData">00:00 - 00:00</p>
                    <p class="metaData">Webbserverprogrammering</p>
                </div>
            </div>
        </div>

    </div>




    <?php 
        echo drawFooter();
    ?>

</body>
</html>