<?php

    require_once('includes/dbh.func/general/dbh.general.php');
    require_once('includes/HTMLElements/general.elements.php');


    // session_start();    //start the PHP_session function

    $usr = getUserFromId($_SESSION['userID']);

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- random style links -->
    <link rel="stylesheet" href="/public/style/mainStyle.css">
    <link rel="stylesheet" href="/public/style/commonStyle.css">
    <link rel="stylesheet" href="/public/style/pages/account.css">

    <title><?php echo $usr->Username; ?>'s account</title>
</head>
<body>
    <!-- Navigationbar  -->
    <div class="container mainNavCon">
        <nav>
            <?php echo drawNavbar() ?>
        </nav>
    </div>

    <div id="feed">
        <img src="public/img/pfp/<?php echo $usr->Email; ?>.png" alt="">


        <h1><?php echo $usr->FirstName . " ". $usr->LastName; ?></h1>

        <a id="logout" href="/logout">Logout</a>
    </div>
    <?php 
        echo drawFooter();
    ?>
</body>
</html>