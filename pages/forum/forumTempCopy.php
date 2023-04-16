<?php 
        //  Includes functions related to the db
    // include_once '../../../includes/loginCheck.php'; is not needed anymore
    // include_once 'includes/dbh.func/general/dbh.inc.php';
    // include_once 'includes/dbh.func/general/dbh.general.php';
    require_once('includes/dbh.func/forum/dbh.forum.php');

        //  Includes php elements
    require_once('includes/HTMLElements/general.elements.php');
    require_once('includes/HTMLElements/forum.elements.php');

    $courses = getCourses();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/public/js/forum/forum.js"></script>

    <!-- Basic style links -->
    <link rel="stylesheet" href="/public/style/mainStyle.css">
    <link rel="stylesheet" href="/public/style/commonStyle.css">
    <!-- Page style links -->
    <link rel="stylesheet" href="/public/style/pages/forumStyle.css">

    <title>Forum</title>
</head>

<body>

    <!-- Navigationbar  -->
    <div class="container mainNavCon">
        <nav>
            <?php echo drawNavbar() ?>
        </nav>
    </div>

    <header>

        <div>
            <button>Course 1</button>
            <button>Course 2</button>
            <button>Course 3</button>
            <button>Course 4</button>
            <button>Course 5</button>
            <button>Course 6</button>
            <button>Course 7</button>
            <button>Course 8</button>
            <button>Course 9</button>
            <button>Course 10</button>
            <button>Course 11</button>
            <button>Course 12</button>
            <button>Course 13</button>
            <button>Course 14</button>
            <button>Course 15</button>
        </div>

        <button>Ask a question</button>

    </header>

</body>
</html>