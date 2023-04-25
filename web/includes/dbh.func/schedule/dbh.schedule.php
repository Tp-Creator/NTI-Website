<?php 

    //Includes user functions related to the db
    require_once('includes/dbh.func/general/dbh.inc.php');


    function getLessons($class){
        global $conn;

        $stmt = $conn->prepare("SELECT * FROM lesson WHERE classID = ? ORDER BY WEEKDAY(start);");
        $stmt->bind_param("i", $class);
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


        //  Grouping all the lessons for each day
        $dayResult = [];
        $currDay = Null;
        for($i = 0; $i < sizeof($result); $i++){
            $dt = $result[$i]->start;
            $dayNum = date("N", strtotime($dt));
            $dayName = date("l", strtotime($dt));
            
            if($currDay != $dayNum){
                //  pushing new array with current day
                $currDay = $dayNum;
                array_push($dayResult, [$dayName]);
            }

                //  Pushing the day into the correct array, the latest one
            array_push($dayResult[sizeof($dayResult)-1], $result[$i]);

        }

        //  return an array with all rows where you can reach the data by taking $result[i]
        // return $result;
        return $dayResult;
    }



    function getClassById($id){
        global $conn;
    
        $stmt = $conn->prepare("SELECT * FROM class WHERE id = ?;");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $stmt = $stmt->get_result();
       
            //  Fetches each answer individually and then adds them to an array that is then returned.
        $result = $stmt->fetch_object();

            //  Loops over the data and makes sure javascript injections can not be done
        foreach ($result as $key => &$value) {
            $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }
        
            //  return an array with all rows where you can reach the data by taking $result[i]
        return $result;
    }


    function getClasses(){
        global $conn;

        $stmt = $conn->prepare("SELECT * FROM class;");
        // $stmt->bind_param("i", $class);
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


    function getRoomById($id){
        global $conn;
    
        $stmt = $conn->prepare("SELECT * FROM room WHERE id = ?;");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $stmt = $stmt->get_result();
        
            //  Fetches each answer individually and then adds them to an array that is then returned.
        $result = $stmt->fetch_object();

            //  Loops over the data and makes sure javascript injections can not be done
        foreach ($result as $key => &$value) {
            $value = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }

            //  return an array with all rows where you can reach the data by taking $result[i]
        return $result;
    }

?>