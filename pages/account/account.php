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

    <title><?php echo $usr->Username; ?>'s account</title>
</head>
<body>
    
    <!-- Navigationbar  -->
    <div class="container mainNavCon">
        <nav>
            <?php echo drawNavbar() ?>
        </nav>
    </div>

    <h1>Welcome <?php echo $usr->FirstName . " ". $usr->LastName; ?>!</h1>
    <p>This is your profile page. On this page you can see you profile image and sign out</p>

    <img src="public/img/pfp/<?php echo $usr->Email; ?>.png" alt="">

    <a href="/logout">Logout</a>


</body>
</html>