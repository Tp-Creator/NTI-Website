<?php 
        //  Includes functions related to the db
    require_once('includes/dbh.func/forum/dbh.forum.php');
    require_once('includes/dbh.func/schedule/dbh.schedule.php');

        //  Includes php elements
    require_once('includes/HTMLElements/general.elements.php');
    require_once('includes/HTMLElements/schedule.elements.php');

    $courses = getCourses();

    $lessons = getLessons(1);
    $classes = getClassById(1);

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
    <!-- <script src="/public/js/forum/forum.js"></script> -->

    <!-- Basic style links -->
    <link rel="stylesheet" href="/public/style/mainStyle.css">
    <link rel="stylesheet" href="/public/style/commonStyle.css">
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

    <?php echo schedule(1) ?>
    

    <?php console_log($lessons); ?>
    <?php console_log($classes); ?>

    <div class="mainContainer">
        <div class="ingridContainer">

        </div>
        <div class="scheduleMain">
            <div class="mainTopContainer">
                <div class="day day1">
                    <div class="subject subject1">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                        <p class="room"></p>            <!-- Är bra att ha -->
                    </div>
                    <div class="subject subject2">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject3">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject4">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject5">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                </div>
                <div class="day day2">
                    <div class="subject subject1">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject2">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject3">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject4">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject5">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                </div>
                <div class="day day3">
                    <div class="subject subject1">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject2">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject3">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject4">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject5">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                </div>
                <div class="day day4">
                    <div class="subject subject1">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject2">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject3">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject4">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject5">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                </div>
                <div class="day day5">
                    <div class="subject subject1">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject2">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject3">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject4">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject5">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                </div>
            </div>
            <div class="mainBottomContainer">
                <div class="day day1">
                    <div class="subject subject1">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject2">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject3">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject4">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject5">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                </div>
                <div class="day day2">
                    <div class="subject subject1">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject2">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject3">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject4">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject5">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                </div>
                <div class="day day3">
                    <div class="subject subject1">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject2">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject3">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject4">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject5">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                </div>
                <div class="day day4">
                    <div class="subject subject1">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject2">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject3">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject4">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject5">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                </div>
                <div class="day day5">
                    <div class="subject subject1">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject2">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject3">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject4">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                    <div class="subject subject5">
                        <p class="name"></p>
                        <p class="start"></p>
                        <p class="end"></p>
                        <p class="class"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="scheduleMini">
            <div class="miniTopContainer">
                <div class="miniDay miniDay1">
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                </div>
                <div class="miniDay miniDay2">
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                </div>
                <div class="miniDay miniDay3">
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                </div>
                <div class="miniDay miniDay4">
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                </div>
                <div class="miniDay miniDay5">
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                </div>
            </div>
            <div class="miniBottomContainer">
                <div class="miniDay miniDay1">
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                </div>
                <div class="miniDay miniDay2">
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                </div>
                <div class="miniDay miniDay3">
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                </div>
                <div class="miniDay miniDay4">
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                </div>
                <div class="miniDay miniDay5">
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                    <p class="miniContent"></p>
                </div>
            </div>
        </div>
    </div>
        
    <?php 
        echo drawFooter();
    ?>
</body>
</html>