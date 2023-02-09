<?php

    include_once('dbh.inc.php');

        //  getUsernameFromId($id)
        //  this function takes one argument: the Id of a user
        //  And returns the username of the specific user
    function getUserFromId($id) {
        global $conn;
        
        $stmt = $conn->prepare("SELECT * FROM users WHERE userID = ?;");
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all()[0];
        // return $result;
    }



    // This function checks if the user is logged in by checking if the session
    // contains an userID. If not it directs the user to the login page.
    function loginCheck() {
        session_start(); //start the PHP_session function 
    
        if(isset($_SESSION['userID']))
        {
            // http_response_code(401);
            // header("location:/pages/account/login/login.php");
            return True;
        }
        return False;
    }

?>