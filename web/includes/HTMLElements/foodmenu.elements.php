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
                    <div class='menu'>
                        <div class='week'>
                            <p>Lunch v.$weekNum</p>
                        </div>
                    ";

    
            // Vi börjar på andra index:et - Ett kort per dag
        for($d = 1; $d < sizeof($week); $d++){
            $day = $week[$d];

            $dayName = date("l", strtotime($day->dt));
            $date = date("j F Y", strtotime($day->dt));
            
            $food = $day->food;
            $vegFood = $day->vegFood;

            $cards .=  "
                        <div class='day'>
                            <div class='date'>               
                        ";

            if ($day->dt == date("Y-m-d")){
                $cards .=   "
                                    <p class='active'>$dayName</p>
                                    <p class='active'>$date</p>
                                </div>

                                <p class='content'>$food</p>
                                <p class='content'>$vegFood</p>
                            </div>
                            ";
            }
            else {
                $cards .=   "
                                    <p>$dayName</p>
                                    <p>$date</p>
                                </div>

                                <p class='content'>$food</p>
                                <p class='content'>$vegFood</p>
                            </div>
                            ";
            }

        }

        // Me are very sorry for this one...
        $cards .=  "
                    </div>
                    ";

    }

    return $cards;

}



?>