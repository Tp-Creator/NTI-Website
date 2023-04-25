<?php

require_once('includes/dbh.func/dbh.foodmenu.php');




getFoodDay();


function foodCards(){

    $allFood = getFoodDay();
    
    $cards = "";

    
    for($w = 0; $w < sizeof($allFood); $w++){
        $week = $allFood[$w];
        $weekNum = $week[0];        //   Första index är veckonumret

        $cards .= "
                    <div class='weekLunchCard'>
                        <p id='lcTitle'>Week $weekNum</p>

                        <!--Placeholder för medellande om det behös.-->
                        <p id='lcMsg'>Note! The information is provided by the organization delivering the food. Changes may occur.</p>
                    ";

    
            // Vi börjar på andra index:et - Ett kort per dag
        for($d = 1; $d < sizeof($week); $d++){
            $day = $week[$d];

            // $dt = $day->dt;
            // $dayName = date("l", strtotime($day->dt));
            $dayName = date("D j", strtotime($day->dt));
            $food = $day->food;
            $vegFood = $day->vegFood;

            $cards .=  "
                        <div class='lcCon'>
                            <div class='lcLongLine'></div>
                            <p class='lcDay'>$dayName</p>
                            <div class='lcShortLine'></div>
                        </div>
                        <div class='lcCon'>
                            <img class='lcIcon' src='/public/style/includes/icons/foodIcon.svg'>
                            <p class='lcContent'>$food</p>
                        </div>
                        <div class='lcCon lcVeg'>
                            <img class='lcIcon' src='public/style/includes/icons/foodVegIcon.svg'>
                            <p class='lcContent'>$vegFood</p>
                        </div>
                        ";
        }

        // Me are very sorry for this one...
        $cards .=  "
                    </div>
                    ";

    }

    return $cards;

}



?>