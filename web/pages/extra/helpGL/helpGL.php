<?php 
        //  Includes php elements
    require_once('includes/HTMLElements/general.elements.php');
    require_once('includes/HTMLElements/schedule.elements.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Basic style links -->
    <link rel="stylesheet" href="/public/style/mainStyle.css">
    <link rel="stylesheet" href="/public/style/commonStyle.css">

    <link rel="stylesheet" href="/public/style/pages/extra/helpGL.css">

    <title>Gradeless</title>
</head>
<body>
    
    <!-- Navigationbar  -->
    <div class="container mainNavCon">
        <nav>
            <?php echo drawNavbar() ?>
        </nav>
    </div>


    <p id="title">Help Gradeless</p>

    <!-- <p class="title">Frontend</p> -->

    <a class="googleFormCard fe" href="">
        <p class="gfcTitle fe">Google-forms: Frontend</p>
        <p class="gfcDes fe">Description</p>
    </a>

    <!-- <p class="title">Backend</p> -->

    <a class="googleFormCard be" href="">
        <p class="gfcTitle be">Google-forms: Backend</p>
        <p class="gfcDes be">Description</p>
    </a>

    <!-- <p class="title">Other</p> -->

    <a class="googleFormCard oth" href="">
        <p class="gfcTitle oth">Google-forms: Other</p>
        <p class="gfcDes oth">Description</p>
    </a>
    


    <div>
        <title></title>
    </div>




    <?php 
        echo drawFooter();
    ?>

</body>
</html>