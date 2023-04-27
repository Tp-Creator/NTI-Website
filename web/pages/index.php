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
    <meta name="theme-color" content="#101014">
    <!-- basic style -->
    <link rel="stylesheet" href="/public/style/mainStyle.css">
    <!-- Special style for page  -->
    <link rel="stylesheet" href="/public/style/pages/indexStyle.css">
    <link rel="icon" href="/public/style/inc/icons/gradeless_logo.svg">
    <title>We're Gradeless</title>
</head>
<body>
    
    <header>
        <h1 id="mainHero">Gradeless</h1>
        <p id="heroSub">A place for students by students</p>
    </header>

    <!-- Navigationbar  -->
    <div class="container mainNavCon">
        <nav>
            <?php echo drawNavbar() ?>
        </nav>
    </div>

    <div class="infoSection">
        <h1 class="infoSectionTitle IST1">A little bit about us...</h1>
        <p class="infoSectionContent">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
            Cum possimus sequi id culpa inventore modi? Exercitationem 
            nihil blanditiis odio, ex porro nemo esse, natus beatae 
            veniam ad autem ipsum odit.</p>
    </div>

    <div id="contentFeed">
        <div class="infoCard">
            <h1 class="infoCardTitle">Lunch</h1>
            <img class="infoCardIcon" src="/public/style/inc/icons/custom/lunch_icon_custom.svg" alt="">
            <p class="infoCardContent">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Quis eaque ducimus repellat, cumque magnam doloribus ratione atque.</p>
        </div>
        <div class="infoCard">
            <h1 class="infoCardTitle">Schedule</h1>
            <img class="infoCardIcon" src="/public/style/inc/icons/custom/schedule_icon_custom.svg" alt="">
            <p class="infoCardContent">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Quis eaque ducimus repellat, cumque magnam doloribus ratione atque.</p>
        </div>
        <div class="infoCard">
            <h1 class="infoCardTitle">Forum</h1>
            <img class="infoCardIcon" src="/public/style/inc/icons/custom/forum_icon_custom.svg" alt="">
            <p class="infoCardContent">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Quis eaque ducimus repellat, cumque magnam doloribus ratione atque.</p>
        </div>
        <div class="infoCard">
            <h1 class="infoCardTitle">Games</h1>
            <img class="infoCardIcon" src="/public/style/inc/icons/custom/games_icon_custom.svg" alt="">
            <p class="infoCardContent">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                Quis eaque ducimus repellat, cumque magnam doloribus ratione atque.</p>
        </div>
    </div>

    <div class="infoSection">
        <h1 class="infoSectionTitle IST2">Be the designer of gradeless!!!</h1>
        <p class="infoSectionContent">Do not limit yourself to be just the user, when you also can be the designer!
            Help design gradeless by telling us about your user experience, thoughts,
            things you like and don't like or... you can just answer some questions we have for you, thanks :)</p>
        <a id="helpGradeless" href="">Google form・15 questions・8 min</a>
    </div>

    <?php 
        echo drawFooter();
    ?>
</body>
</html>