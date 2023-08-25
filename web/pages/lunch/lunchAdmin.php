
<?php
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lunch Admin</title>
</head>
<body>
    
    <h1>Insert to menu:</h1>
    <form id="form" action="">
        <label for="date">Date of food:</label>
        <input type="date" id="date" name="date">
        <label for="food">Food:</label>
        <input type="text" id="food" name="food">
        <label for="vegfood">VegFood:</label>
        <input type="text" id="vegfood" name="vegfood">
        <input type="submit" value="">
    </form>

    <h1>The menu (reload to refresh)</h1>
    <?php 
        $menu = getFoodDay();
        console_log($menu);
        for ($week = 0; $week < sizeof($menu); $week++){
            $weekNum = $menu[$week][0];
            echo "<h2>Week $weekNum</h2>";

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

                echo "<div id='div$id'>
                          <button class='menuitem' id='$id'>delete (id $id)</button><h4>$dt</h4>
                          <p>$food</p>
                          <p>$vegfood</p>
                          <p>$co2</p>
                          <p>$vegco2</p>
                      </div>";
            }
        }
    ?>

    <div>
        <h4>$id</h4>
        <h4>$dt</h4>
        <p>$food</p>
        <p>$vegfood</p>
        <p>$co2</p>
        <p>$vegco2</p>
    </div>

</body>
</html>