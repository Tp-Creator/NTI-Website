<?php

require_once('includes/dbh.func/dbh.foodmenu.php');




getFoodDay();


function foodCards(){

    $allFood = getFoodDay();
    
    $cards = "";

    
    for($i = 0; $i < sizeof($allFood); $i++){
        $dt = $allFood[$i]->dt;
        $day = date("D", $dt);
        $food = $allFood[$i]->food;
        $vegFood = $allFood[$i]->vegFood;

        $cards .=  "<p class='title'>$day</p>
        
                        <div class='foodCard'>
                            <div class='fcSection'>
                                <img class='fcIcon' src='' alt=''>
                                <p class='fcTitle'>Normal mat: $food</p>
                            </div>
                            <div class='fcSection'>
                                <img class='fcIcon' src='' alt=''>
                                <p class='fcTitle'>Veg mat: $vegFood</p>
                            </div>
                        </div>";

    }

    return $cards;

}



?>