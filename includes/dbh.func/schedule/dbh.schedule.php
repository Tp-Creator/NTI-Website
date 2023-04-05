<?php 

    //Includes user functions related to the db
    require_once('includes/dbh.func/general/dbh.inc.php');


    function getLessons(){
        global $conn;
    
        $stmt = $conn->prepare("SELECT * FROM lesson;");
        $stmt->execute();

        $stmt = $stmt->get_result();
        $result = [];

            //  Fetches each answer individually and then adds them to an array that is then returned.
        while ($finfo = $stmt->fetch_object()) {

                //  Loops over the data and makes sure javascript injections can not be done
            foreach ($finfo as $key => &$value) {
                if ($key == "ends" || $key == "starts"){
                        //  Comnverts millis to string, hour, minutes and day in num 1-7
                    $value = date("H:i, N", $value/1000);
                }
                $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
            }
                //  Pushes the secured object to an array
            array_push($result, $finfo);
        }

            //  return an array with all rows where you can reach the data by taking $result[i]
        return $result;


    }

    function getClassById($id){
        global $conn;
    
        $stmt = $conn->prepare("SELECT * FROM class WHERE id = ?;");
        $stmt->bind_param("i", $id);
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