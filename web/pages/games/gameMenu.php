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
    <link rel="stylesheet" href="/public/style/pages/gamesStyle.css">

    <title>Games</title>
</head>
<body>
    
    <!-- Navigationbar  -->
    <div class="container mainNavCon">
        <nav>
            <?php echo drawNavbar() ?>
        </nav>
    </div>

    <div id="contentFeed">
        <div class="gCard">
            <img class="gcIMG" src="/public/img/gamesThumbnail/2Tetris_Joel_J.png" alt="">
            <div class="gCardFooter">
                <p class="gcTitle">2Tetris</p>
                <p class="gcDesc">Joel J - TE21</p>

                <a class="gcBtn" href="/game?game=2Tetris">Play</a>
            </div>
        </div>

        <div class="gCard">
            <img class="gcIMG" src="/public/img/gamesThumbnail/tictactoe_Kirill_Y.png" alt="">
            <div class="gCardFooter">
                <p class="gcTitle">Tic Tac Toe</p>
                <p class="gcDesc">Kirill Y - TE21</p>

                <a class="gcBtn" href="/game?game=tictactoe">Play</a>
            </div>
        </div>

        <div class="gCard">
            <img class="gcIMG" src="/public/img/gamesThumbnail/defendarOfUkraine_Oleksandr_S.png" alt="">
            <div class="gCardFooter">
                <p class="gcTitle">Defender of Ukraine</p>
                <p class="gcDesc">Oleksandr S - TE21</p>

                <a class="gcBtn" href="/game?game=defenderOfUkraine">Play</a>
            </div>
        </div>
    </div>

    <?php 
        echo drawFooter();
    ?>

</body>
</html>