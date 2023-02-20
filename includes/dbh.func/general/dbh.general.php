<?php

    include_once('includes/dbh.func/general/dbh.inc.php');

        //  getUsernameFromId($id)
        //  this function takes one argument: the Id of a user
        //  And returns the username of the specific user
    function getUserFromId($id) {
        global $conn;
        
        $stmt = $conn->prepare("SELECT * FROM users WHERE userID = ?;");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_object();
        // return $result;
    }



    // This function checks if the user is logged in by checking if the session
    // contains an userID. If not it directs the user to the login page.
    function loginCheck() {
            //  Måste startas direkt från den filen där den ska användas. Annars får man felmeddelande om att man startar session för sent.
        // session_start(); //start the PHP_session function 
    
        if(isset($_SESSION['userID']))
        {
            // http_response_code(401);
            // header("location:/pages/account/login/login.php");
            return True;
        }
        return False;
    }

?>