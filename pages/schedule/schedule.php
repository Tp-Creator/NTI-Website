<?php 

    //  Includes php elements
    include_once('includes/HTMLElements/general.elements.php');
    include_once('includes/HTMLElements/forum.elements.php');

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
    
    <!-- Navigationbar  -->
    <nav>
        <?php echo drawNavbar() ?>
    </nav>
    
    <?php
        $url = 'https://skolfood.foodservo.com/view?menus';
        $html = file_get_contents($url);
        
        $start = strpos($html, '<section class="section_standard_max">');
        $end = strpos($html, "</section>");
        $length = $end - $start - 3;

        echo substr($html, $start + 3, $length);    
    ?>


    <section class="contentFeed"></section>

</body>
</html>
