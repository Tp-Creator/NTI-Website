
<?php
    include_once('includes/HTMLElements/general.elements.php');
    include_once('includes/dbh.func/general/dbh.inc.php');
    include_once('includes/dbh.func/dbh.foodmenu.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/public/js/lunch/lunchadmin.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/public/style/mainStyle.css">
    <link rel="stylesheet" href="/public/style/pages/lunchAdmin.css">
    <link rel="icon" href="/public/style/inc/icons/gl_logo.svg">
    <title>Lunch Admin</title>
</head>
<body>
    
    <h1>Gradeless <span>Admin</span></h1>


    <form id="form" action="">
        <label for="date">Date</label>
        <input type="date" id="date" name="date">

        <label for="food">Regular</label>
        <input type="text" id="food" name="food">

        <label for="vegfood">Veg</label>
        <input type="text" id="vegfood" name="vegfood">

        <div class="formFotter">
            <button class="addBtn" type="submit" value="">Add</button>
            <p class="lazyMessage">Reload to <span>Refresh</span></p>
        </div>
    </form>


    <?php 
        $menu = getFoodDay();
        console_log($menu);
        for ($week = 0; $week < sizeof($menu); $week++){
            $weekNum = $menu[$week][0];
            echo "<h2 class='week'>Week $weekNum</h2>";

            for ($day = 1; $day < sizeof($menu[$week]); $day++){
                console_log($menu[$week][$day]);
                $dayMenu = $menu[$week][$day];
                $id = $dayMenu->id;
                $dt = date("D j", strtotime($dayMenu->dt));
                $food = $dayMenu->food;
                $vegfood = $dayMenu->vegFood;
                $co2 = $dayMenu->CO2;
                $vegco2 = $dayMenu->vegCO2;

                console_log($dt);

                echo    "
                        <div class='day' id='div$id'>
                            <div class='date'>
                                <p>$dt</p>
                                <button class='menuitem' id='$id'>Delete id:$id</button>
                            </div>
                        
                            <p class='content'>$food</p>
                            <p class='content'>$vegfood</p>
                            <p>$co2</p>
                            <p>$vegco2</p>
                        </div>
                        ";
            }
        }
    ?>

    <!-- <div>
        <h4>$id</h4>
        <h4>$dt</h4>
        <p>$food</p>
        <p>$vegfood</p>
        <p>$co2</p>
        <p>$vegco2</p>
    </div> -->

    <nav>
        <?php echo drawNavbar() ?>
    </nav>

</body>
</html>