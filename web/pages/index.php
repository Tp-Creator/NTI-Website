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
        <h2 class="infoSectionTitle IST1">A little bit about us...</h2>
        <p class="infoSectionContent">
        Gradeless is a not so innovative educational project led by a team of four students. 
        Our platform enables students to share their knowledge and work seamlessly, 
        while also providing access to essential information.
        </p>
    </div>

    <div id="contentFeed">
        <div class="infoCard">
            <h2 class="infoCardTitle">Lunch</h2>
            <img class="infoCardIcon" src="/public/style/inc/icons/custom/lunch_icon_custom.svg" alt="">
            <p class="infoCardContent">Here, you'll find a weekly lunch menu. Information is provided by the delivery company.</p>
        </div>
        <div class="infoCard">
            <h2 class="infoCardTitle">Schedule</h2>
            <img class="infoCardIcon" src="/public/style/inc/icons/custom/schedule_icon_custom.svg" alt="">
            <p class="infoCardContent">
                Weekly schedule page provides you with a clear overview of your weekly schedule.
            </p>
        </div>
        <div class="infoCard">
            <h2 class="infoCardTitle">Forum</h2>
            <img class="infoCardIcon" src="/public/style/inc/icons/custom/forum_icon_custom.svg" alt="">
            <p class="infoCardContent">
            Ask and answer questions related to your studies, 
            connect with other students, and share your knowledge.
            </p>
        </div>
        <div class="infoCard">
            <h2 class="infoCardTitle">Games</h2>
            <img class="infoCardIcon" src="/public/style/inc/icons/custom/games_icon_custom.svg" alt="">
            <p class="infoCardContent">
            Showcase the games you have created and explore games made by your fellow students.
            </p>
        </div>
    </div>

    <div class="infoSection">
        <h1 class="infoSectionTitle IST2">Be the designer of gradeless!!!</h1>
        <p class="infoSectionContent">
            Do not limit yourself to be just the user, when you also can be the designer!
            Help design gradeless by telling us about your user experience, thoughts,
            things you like and don't like or... you can just answer some questions we have for you, thanks :)
        </p>
        <a id="helpGradeless" href="https://docs.google.com/forms/d/e/1FAIpQLSdqJ4KhR1785fesUoEO9veC98mggTP_vEsrqRanFgXtFRTIDQ/viewform?usp=sf_link">Google form・13 questions・8 min</a>
    </div>

    <?php 
        echo drawFooter();
    ?>
</body>
</html>