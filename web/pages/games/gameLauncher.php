<?php 
    //  Includes php elements
    include_once('includes/HTMLElements/general.elements.php');


    if(isset($_GET["game"])){
        $game = $_GET["game"];
        
        if(!file_exists("public/js/games/$game.js")){
            header("location:/games");
        }
    }
    else{
        header("location:/games");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="#101014">

    <link rel="stylesheet" href="/public/style/mainStyle.css">
    <link rel="stylesheet" href="/public/style/commonStyle.css">   <!--Erikas Kolla vilken css som behövs och ta bort den andra-->
    
    <script src="https://koda.nu/simple.js"></script>

    <title><?php echo ucwords($game); ?></title>
    
</head>
<body>
    
    <!-- Navigationbar  -->
    <div class="container mainNavCon">
        <nav>
            <?php echo drawNavbar() ?>
        </nav>
    </div>


    <script src='/public/js/games/<?php echo $game; ?>.js'></script>

    

</body>
</html>