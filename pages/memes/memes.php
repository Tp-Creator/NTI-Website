<?php 

        //  Includes php elements
    include_once 'includes\HTMLElements\general.elements.php';
    include_once 'includes\HTMLElements\forum.elements.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/public/style/mainStyle.css">
    <link rel="stylesheet" href="/public/style/commonStyle.css">
    <link rel="stylesheet" href="/public/style/pages/memes/memesStyle.css">

    <title>Schoolhub Memes</title>
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

        <div class="header1">
            <!-- Filter -->
            <select class="filterPill" name="" id="">
                <option value="">Latest</option>
                <option value="">Popular</option>
                <option value="">My memes</option>
                <option value="">Saved memes</option>
            </select>
        </div>

        <div class="header2">
            <!-- Searchbar -->
            <form class="searchbar" action="">
                <input class="searchfield" placeholder="Search" type="text">
                <button class="searchButton"><img class="icon" src="/public/style/includes/icons/searchIcon.svg" alt=""></button>
            </form>

            <!-- "Ask a question" button -->
            <button class="pAM" id="askQuestion">Post a meme</button>
        </div>
    </header>

    <section class="contentFeed">
        <div class="memeCard">
            <div class="imgCon">
                <img class="cardImg" src="/public/style/includes/img/meme.jpeg" alt="">
            </div>
            <div class="cardBody">
                <p>Username_12345</p>
                <button class="likeButton">
                    <p>12345</p>
                    <img src="" alt="">
                </button>
            </div>
        </div>

        <div class="memeCard">
            <div class="imgCon">
                <img class="cardImg" src="/public/style/includes/img/meme.jpeg" alt="">
            </div>
            <div class="cardBody">
                <p>Username_12345</p>
                <button class="likeButton">
                    <p>12345</p>
                    <img src="" alt="">
                </button>
            </div>
        </div>

        <div class="memeCard">
            <div class="imgCon">
                <img class="cardImg" src="/public/style/includes/img/meme.jpeg" alt="">
            </div>
            <div class="cardBody">
                <p>Username_12345</p>
                <button class="likeButton">
                    <p>12345</p>
                    <img src="" alt="">
                </button>
            </div>
        </div>
    </section>

</body>
</html>