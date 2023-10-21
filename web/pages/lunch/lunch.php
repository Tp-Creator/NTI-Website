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
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- basic style -->
    <link rel="stylesheet" href="/public/style/mainStyle.css">
    <!-- Special style for page  -->
    <link rel="stylesheet" href="/public/style/pages/lunchStyle.css">
    <link rel="icon" href="/public/style/inc/icons/gl_logo.svg">
    <title>Lunch</title>
</head>
<body>

    <h1>Gradeless</h1>

    
    <p class="lazyMessage">hi, no content right now :/</p>


    <div id="">
        <?php 
            // Lunchadmin
            if(getUserRank() == 4){
                echo '<a href="/lunchadmin">Add to menu (lunchadmin)</a>';
            }
            
            // The Menu
            echo foodCards();
        ?>
    </div>


    <nav>
        <?php echo drawNavbar() ?>
    </nav>

</body>
</html>