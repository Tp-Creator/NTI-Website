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
    <meta name="theme-color" content="#101014">

    <link rel="stylesheet" href="/public/style/mainStyle.css">
    <link rel="stylesheet" href="/public/style/commonStyle.css">
    <link rel="stylesheet" href="/public/style/pages/newsStyle.css">

    <title>News</title>
</head>
<body>
    
    <!-- Navigationbar  -->
    <div class="container mainNavCon">
        <nav>
            <?php echo drawNavbar() ?>
        </nav>
    </div>
    
    <header>
            <!-- Searchbar  -->
        <form id="searchbar" action="">

            <input id="searchfield" placeholder="Search" type="text">

            <button id="searchButton">
                <img src="/public/style/includes/icons/search_Icon_v3.svg" alt="">
            </button>

        </form>

        <div class="verticalCon">
            <a class="hotlinkBut" href="">News</a>

            <a class="hotlinkBut" href="">Dev log</a>
        </div>
    </header>




    <div class="contentFeed">

        <div>
            <h3>Food</h3>
            <p>Description</p>
        </div>

        <h3>Week 11</h3>
        
        <!-- Food card  -->
        <div>
            <div>
                <p>Mon 23-03-13</p>
                <p>Food name</p>
                <p>Veg: Food name</p>
            </div>

            <!-- google search of the food  -->
            <a href="">
                <img src="" alt="">
            </a>
        </div>

        <h3>News</h3>
        
        <div class="card">
            <div class="verticalWrap">
                <p class="cardUsername">Username_12345</p>

                <p class="cardInfoText">2023 - 03 - 02 16:15</p>
            </div>

            <p class="cardTitleText">Titel</p>

            <p class="cardContentText">Description</p>

        </div>

        <h3>Dev log</h3>

    </div>

</body>
</html>