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
    <!-- random style links -->
    <link rel="stylesheet" href="/public/style/mainStyle.css">
    <link rel="stylesheet" href="/public/style/commonStyle.css">
    <link rel="stylesheet" href="/public/style/indexStyle.css">

    <title>We're GradeLess</title>
</head>
<body>

    <!-- Navigationbar  -->
    <nav>
        <?php echo drawNavbar() ?>
    </nav>

    <div class="infoSection">
        <img class="infoImg" src="../public/style/includes/img/Img_placeholder.svg" alt="">
        <div class="infoSectionHeader">
            <p class="infoTitle">Lounge</p>
            <p class="infoDes">description</p>
        </div>
    </div>

    <div class="infoSection sectionReverse">
        <div class="infoSectionHeader">
            <p class="infoTitle">Forum</p>
            <p class="infoDes">Description</p>
        </div>
        <img class="infoImg" src="../public/style/includes/img/Img_placeholder.svg" alt="">
    </div>

    <div class="infoSection">
        <img class="infoImg" src="../public/style/includes/img/Img_placeholder.svg" alt="">
        <div class="infoSectionHeader">
            <p class="infoTitle">Schedule</p>
            <p class="infoDes">description</p>
        </div>
    </div>

    <div class="infoSection sectionReverse">
        <div class="infoSectionHeader">
            <p class="infoTitle">Games</p>
            <p class="infoDes">Description</p>
        </div>
        <img class="infoImg" src="../public/style/includes/img/Img_placeholder.svg" alt="">
    </div>

    <footer>
        <div class="footerSection">
            <p class="footerTitle">Title</p>

            <a class="footerContent" href="">Content</a>
            <p class="footerContent">Content</p>
        </div>

        <div class="footerSection">
            <p class="footerTitle">Title</p>

            <a class="" href="">Content</a>
            <p class="footerContent">Content</p>
        </div>
    </footer>

</body>
</html>