<?php 

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

?>