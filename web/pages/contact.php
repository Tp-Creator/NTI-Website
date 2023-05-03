<?php

    //  Includes php elements
    include_once('includes/HTMLElements/general.elements.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/style/mainStyle.css">
    <link rel="stylesheet" href="/public/style/pages/contactStyle.css">
    <title>Contact us!</title>
</head>
<body>

    <!-- Navigationbar  -->
    <div class="container mainNavCon">
        <nav>
            <?php echo drawNavbar() ?>
        </nav>
    </div>
    
    <h1>Contact admin</h1>
    <p id="subtitle">We would love to hear your feedback!</p>

    <div class="area">
        <h3>Frontend Devlopers:</h3>
        
        <div class="person">
            <div>
                <img src="public/img/pfp/erikas.janusauskas@elev.ga.ntig.se.png" alt="">
                <p class="subtext">Erikas Janusauskas - TE21</p>
            </div>
            <a href="mailto:erikas.janusauskas@elev.ga.ntig.se">Email: Erikas.Janusauskas@elev.ga.ntig.se</a>
        </div>
    </div>

    <div class="area">
        <h3>Backend Devlopers:</h3>

        <div class="person">
            <div>
                <img src="public/img/pfp/joel.jagerskogh@elev.ga.ntig.se.png" alt="">
                <p class="subtext">Joel Jägerskogh - TE21</p>
            </div>
            <a href="mailto:joel.jagerskogh@elev.ga.ntig.se">Email: Joel.Jagerskogh@elev.ga.ntig.se</a>
        </div>
    </div>

    <div class="area">
        <h3>Be a part of our team</h3>

        <div class="person">
            <p class="subtext">text goeas here</p>
        </div>
    </div>


    <?php 
        echo drawFooter();
    ?>

</body>
</html>