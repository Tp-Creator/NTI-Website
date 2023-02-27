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

    <link rel="stylesheet" href="/public/style/commonStyle.css">
    <link rel="stylesheet" href="/public/style/mainStyle.css">
    <link rel="stylesheet" href="/public/style/pages/news/newsStyle.css">

    <title>Schoolhub News</title>
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
                <option value="">Popular</option>
                <option value="">Bookmarked</option>
                <option value="">Your questions</option>

            </select>

            <div class="devider"></div>

            <select class="optionsCon" name="" id="">

                <option value="">Courses</option>
                <option value="">Fysik</option>
                <option value="">Matte</option>
                <option value="">Svenska</option>
                <option value="">Engelska</option>
                <option value="">Programering</option>
                <option value="">Webbutveckling</option>

            </select>

            <div class="devider"></div>

            <p class="infoText">There are "amount" new articles today!</p>

        </div>

    </header>

</body>
</html>