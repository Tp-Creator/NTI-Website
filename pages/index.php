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
    <!-- Navigationbar  -->
    <nav>
        <a id='navLeft' href='/pages/index.php'>
            <p class='navText navTextLogo'>Schoolhub</p>
            <img class='navIcon' src='' alt=''>
        </a>

        <div id='navButCon'>
            <?php echo drawNavbar() ?>
        </div>

        <a id='navRight' href=''>
            <img id='navPfp' src='' alt=''>
        </a>
    </nav>
    
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