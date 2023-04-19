<?php 

    //Includes user functions related to the db
    require_once('includes/dbh.func/general/dbh.inc.php');


    function getLessons($class){
        global $conn;

        $stmt = $conn->prepare("SELECT * FROM lesson WHERE classID = ? ORDER BY start;");
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

        //  return an array with all rows where you can reach the data by taking $result[i]
        return $result;
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