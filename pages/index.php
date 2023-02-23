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
    <title>Document</title>
    <!-- random style links -->
    <link rel="stylesheet" href="/public/style/mainStyle.css">
    <link rel="stylesheet" href="/public/style/commonStyle.css">
    <link rel="stylesheet" href="/public/style/indexStyle.css">
</head>
<body>
    
    <header>
        <!-- Navigation bar -->
        <div id="navCon">
            <a id="logoButton" href="/">Schoolhub</a>
            <nav>
                <?php echo drawNavbar() ?>
            </nav>
        </div>
    </header>

    <div id="mainCon">
        <!-- Welcome text  -->
        <div id="verCon">
            <p class="normalText">Welcome to</p>
            <p class="logoText">Schoolhub</p>
        </div>

        <?php

        require_once('includes/external/googleLogin/google.config.php');

        console_log($client);


          // now you can use this profile info to create account in your website and make user logged in.
        //   echo "<a href='" . $client->createAuthUrl() . "'>Google Login</a>";


        echo "
            <a id='logInButton' href=". $client->createAuthUrl() .">
                <img class='icon' src='/public/style/includes/icons/google-icon.svg'>
                <p class='butText'>LOG IN</p>
            </a>
        "

        ?>

        <!-- Google log in button  -->
        <!-- <a id="logInButton" href="">
            <img class="icon" src="/public/style/includes/icons/google-icon.svg" alt="">
            <p class="butText">LOG IN</p>
        </a> -->

    </div>

</body>
</html>