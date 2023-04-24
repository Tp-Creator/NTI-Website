<?php

require_once('includes/dbh.func/dbh.foodmenu.php');




getFoodDay();


function foodCards(){

    $allFood = getFoodDay();
    
    $cards = "";

    
    for($w = 0; $w < sizeof($allFood); $w++){
        $week = $allFood[$w];
        $weekNum = $week[0];        //   Första index är veckonumret

        // Visar vilken vecka det är
        $cards .= " <div class='section'>
                        <p class='sectionTitle'>Lunch</p>
                        <p class='seactionMeta'>Week $weekNum</p>
                    </div>";

            // Vi börjar på andra index:et - Ett kort per dag
        for($d = 1; $d < sizeof($week); $d++){
            $day = $week[$d];

            // $dt = $day->dt;
            $dayName = date("l", strtotime($day->dt));
            $food = $day->food;
            $vegFood = $day->vegFood;
    
            $cards .=  "<p class='title'>$dayName</p>
            
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

    }

    return $cards;

}



?>