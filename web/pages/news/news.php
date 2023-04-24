<?php 
    //  Includes php elements
    include_once('includes/HTMLElements/general.elements.php');
    include_once('includes/HTMLElements/foodmenu.elements.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#101014">

    <link rel="stylesheet" href="/public/style/mainStyle.css">
    <link rel="stylesheet" href="/public/style/commonStyle.css">
    <link rel="stylesheet" href="/public/style/pages/newsStyle.css">

    <title>Lounge</title>
</head>
<body>
    
    <!-- Navigationbar  -->
    <div class="container mainNavCon">
        <nav>
            <?php echo drawNavbar() ?>
        </nav>
    </div>

    <!-- <div class="section">
        <p class="sectionTitle">Lunch</p>
        <p class="seactionMeta">Week 16</p>
    </div> -->

    <div id="contentFeed">

        <?php
        
            echo foodCards();

        ?>

        Everything under here is not automaticly written

        <p class="title">Monday</p>

        <div class="foodCard">
            <div class="fcSection">
                <img class="fcIcon" src="" alt="">
                <p class="fcTitle">Normal mat</p>
            </div>
            <div class="fcSection">
                <img class="fcIcon" src="" alt="">
                <p class="fcTitle">Veg mat</p>
            </div>
        </div>

        <p class="title">Tuesday</p>

        <div class="foodCard">
            <div class="fcSection">
                <img class="fcIcon" src="" alt="">
                <p class="fcTitle">Normal mat</p>
            </div>
            <div class="fcSection">
                <img class="fcIcon" src="" alt="">
                <p class="fcTitle">Veg mat</p>
            </div>
        </div>

        <p class="title">Wednesday</p>

        <div class="foodCard">
            <div class="fcSection">
                <img class="fcIcon" src="" alt="">
                <p class="fcTitle">Normal mat</p>
            </div>
            <div class="fcSection">
                <img class="fcIcon" src="" alt="">
                <p class="fcTitle">Veg mat</p>
            </div>
        </div>

        <p class="title">Thursday</p>

        <div class="foodCard">
            <div class="fcSection">
                <img class="fcIcon" src="" alt="">
                <p class="fcTitle">Normal mat</p>
            </div>
            <div class="fcSection">
                <img class="fcIcon" src="" alt="">
                <p class="fcTitle">Veg mat</p>
            </div>
        </div>

        <p class="title">Friday</p>

        <div class="foodCard">
            <div class="fcSection">
                <img class="fcIcon" src="" alt="">
                <p class="fcTitle">Normal mat</p>
            </div>
            <div class="fcSection">
                <img class="fcIcon" src="" alt="">
                <p class="fcTitle">Veg mat</p>
            </div>
        </div>
    </div>

    <?php 
        echo drawFooter();
    ?>

</body>
</html>