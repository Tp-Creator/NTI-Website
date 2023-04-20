<?php 

    //Includes user functions related to the db
    require_once('includes/dbh.func/general/dbh.inc.php');


    function getFoodDay(){
        global $conn;

        $stmt = $conn->prepare("SELECT * FROM foodMenu;");
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

        //  return an array with all rows where you can reach the data by taking $result[i]
        return $result;
    }

?>