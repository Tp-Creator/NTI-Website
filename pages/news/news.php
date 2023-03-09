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
    <link rel="stylesheet" href="/public/style/commonStyle.css">
    <link rel="stylesheet" href="/public/style/pages/news/newsStyle.css">

    <title>Schoolhub News</title>
</head>
<body>
    
    <!-- Navigationbar  -->
    <nav>
        <?php echo drawNavbar() ?>
    </nav>

    <header>

            <!-- Searchbar  -->
        <form id="searchbar" action="">

            <input id="searchfield" placeholder="Search" type="text">

            <button id="searchButton">
                <img src="/public/style/includes/icons/search_Icon_v3.svg" alt="">
            </button>

        </form>

            <!-- Page options & information -->
        <div class="verticalWrap">

            <select class="optionsCon" name="" id="">

                <option value="">Latest</option>
                <option value="">Bookmarked</option>

            </select>

            <div class="devider"></div>

            <p class="infoText">There are "amount" new articles today!</p>

        </div>

    </header>




    <div class="contentFeed">
        
        <div class="card">
            <div class="verticalWrap">
                <p class="cardUsername">Username_12345</p>

                <p class="cardInfoText">2023 - 03 - 02 16:15</p>
            </div>

            <p class="cardTitleText">Titel</p>

            <p class="cardContentText">Description</p>

        </div>

    </div>

</body>
</html>