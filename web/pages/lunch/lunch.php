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
    <link rel="stylesheet" href="/public/style/mainStyle.css">
    <link rel="stylesheet" href="/public/style/pages/lunchStyle.css">
    <link rel="icon" href="/public/style/inc/icons/gl_logo.svg">
    <title>Lunch</title>
</head>
<body>

    <h1>Gradeless</h1>


    <div class="feed">
        <?php 
            // Lunchadmin
            if(getUserRank() == 4){
                echo '<a class="adminBtn" href="/lunchadmin">Admin</a>';
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