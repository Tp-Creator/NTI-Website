<?php

require_once('/includes/dbh.func/dbh.foodmenu.php');




getFoodDay();


function foodCards(){

    $allFood = getFoodDay();
    
    $cards = "";

    
    for($i = 0; $i < sizeof($allFood); $i++){

        $cards .=  "<p class='title'>Monday</p>
        
                        <div class='foodCard'>
                            <div class='fcSection'>
                                <img class='fcIcon' src='' alt=''>
                                <p class='fcTitle'>Normal mat</p>
                            </div>
                            <div class='fcSection'>
                                <img class='fcIcon' src='' alt=''>
                                <p class='fcTitle'>Veg mat</p>
                            </div>
                        </div>";

    }






}



?>