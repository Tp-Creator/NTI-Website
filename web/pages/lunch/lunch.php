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
    <!-- basic style -->
    <link rel="stylesheet" href="/public/style/mainStyle.css">
    <!-- Special style for page  -->
    <link rel="stylesheet" href="/public/style/pages/lunchStyle.css">
    <link rel="icon" href="/public/style/inc/icons/gradeless_logo.svg">
    <title>Lounge</title>
</head>
<body>
    
    <!-- Navigationbar  -->
    <div class="container mainNavCon">
        <nav>
            <?php echo drawNavbar() ?>
        </nav>
    </div>

    <div id="contentFeed">
        <?php
            echo foodCards();
        ?>
    </div>

    <?php 
        echo drawFooter();
    ?>

</body>
</html>