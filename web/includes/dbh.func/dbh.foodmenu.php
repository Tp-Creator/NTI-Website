<?php 

    //Includes user functions related to the db
    require_once('includes/dbh.func/general/dbh.inc.php');


    function getFoodDay(){
        global $conn;

            //  Fetches all rows that are in the current week or later
            //  And sorts them by date, early first
        $stmt = $conn->prepare(
            "SELECT * FROM food_menu
             WHERE DATE(dt) >= DATE(NOW()) - INTERVAL WEEKDAY(NOW())
             DAY ORDER BY dt ASC;"
             );
        $stmt->execute();

        $stmt = $stmt->get_result();
        $result = [];

            //  Fetches each answer individually and then adds them to an array that is then returned.
        while ($finfo = $stmt->fetch_object()) {

                //  Loops over the data and makes sure javascript injections can not be done
            foreach ($finfo as $key => &$value) {
                $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
            }
                //  Pushes the secured object to an array
            array_push($result, $finfo);
        }

        
        //  Sorting all the days on the week
        $weekResult = [];
        $currWeek = Null;
        for($i = 0; $i < sizeof($result); $i++){
            $dt = $result[$i]->dt;
            $weekNum = date("W", strtotime($dt));
            
            if($currWeek != $weekNum){
                //  pushing new array with current week
                $currWeek = $weekNum;
                array_push($weekResult, [$weekNum]);
            }

                //  Pushing the day into the correct array, the latest one
            array_push($weekResult[sizeof($weekResult)-1], $result[$i]);

        }
        
        return $weekResult;
    }


    function addFoodToMenu($date, $food, $vegfood, $co2=null, $vegco2=null){
        global $conn;

        // Prepares query
        $stmt = $conn->prepare("INSERT INTO food_menu (dt, food, vegFood, CO2, vegCO2) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssii", $date, $food, $vegfood, $co2, $vegco2);

        // Executes the query and inserts the food data into the db
        $stmt->execute();

    }


    function deleteFoodItem($id){
        global $conn;

        // Prepares query
        $stmt = $conn->prepare("DELETE FROM food_menu WHERE id=?");
        $stmt->bind_param("i", $id);

        // Executes the query and inserts the food data into the db
        $stmt->execute();


    }

?>