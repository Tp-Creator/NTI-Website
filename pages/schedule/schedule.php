<?php 
        //  Includes functions related to the db
    require_once('includes/dbh.func/forum/dbh.forum.php');
    require_once('includes/dbh.func/schedule/dbh.schedule.php');

        //  Includes php elements
    require_once('includes/HTMLElements/general.elements.php');

    $courses = getCourses();

    $lessons = getLessons();
    $classes = getClassById(1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
    <nav>
        <?php echo drawNavbar() ?>
    </nav>

    <p><?php console_log($lessons); ?></p>
    <p><?php console_log($classes); ?></p>

        
    <footer></footer>
</body>
</html>