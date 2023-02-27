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
    <link rel="stylesheet" href="/public/style/pages/games/gamesStyle.css">

    <title>Schoolhub Games</title>
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

    <header>
        <div class="header2">
            <!-- Searchbar -->
            <form class="searchbar" action="">
                <input class="searchfield" placeholder="Search" type="text">
                <button class="searchButton"><img class="icon" src="/public/style/includes/icons/searchIcon.svg" alt=""></button>
            </form>

            <!-- "Ask a question" button -->
            <button class="rU" id="askQuestion">Request upload</button>
        </div>

        <div class="header1">
            <!-- Filter -->
            <select class="filterPill" name="" id="">
                <option value="">Latest</option>
                <option value="">Popular</option>
                <option value="">My games</option>
                <option value="">Saved games</option>
            </select>
        </div>
    </header>

</body>
</html>