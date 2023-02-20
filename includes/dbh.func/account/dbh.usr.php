<?php

//Includes the connection to the database
//include_once 'dbh.inc.php';


//  checkIfUserExists($mail)
//  This function simply takes on argument (an email)
//  and checks if the email exists in the database among the users
//  Returns: true if the user exists, and false if it doesn't ( called in addUser() )
function checkIfUserExists($mail) {
    global $conn;
    
    $stmt = $conn->prepare("SELECT * FROM users WHERE Email = ?;");
    $stmt->bind_param("s", $mail);

    $stmt->execute();
    $result = $stmt->get_result();
    
    //If there are data in the result variable send the ID of the user otherwise send -1
    if (mysqli_num_rows($result) > 0) {
        return true;
    } else {
        return false;
    }

}


//  addUser($name, $mail, $pwd)
//  This function creates a new user account and login the user to the website
//  Arguments: username (can be what ever), mail (most be unique to the user) and password sent to the function
//  It also checks if the email is in use with the checkIfUserExists() function.
//  Returns: The userID of the new user or -1 if the email already exists in the db
function addUser($name, $mail, $pwd) {
    global $conn;
    
    // creates a call to the database in a safe way so that sql injections should not be able to take place
    // First rows builds the call from the arguments and the last executes the call to the database
    $stmt = $conn->prepare("INSERT INTO users (Username, Email, pwd) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $mail, $pwd);

        if(checkIfUserExists($mail) == false) {
            ?> <script>console.log("doesn't exists")</script><?php
            $stmt->execute();
            return loginValidation($mail, $pwd);
        } else {
            console_log("User already exists");
            return -1;
        }
}




//  getUsernameFromId($id)
//  this function takes one argument: the Id of a user
//  And returns the username of the specific user
// function getUserFromId($id) {
//     global $conn;
    
//     $stmt = $conn->prepare("SELECT * FROM users WHERE userID = ?;");
//     $stmt->bind_param("s", $id);
//     $stmt->execute();
//     $result = $stmt->get_result();
//     return $result->fetch_all()[0];
//     // return $result;
// }


//  loginValidation($email, $pwd)
//  This is a function that login a user to the website using the email and password input 
//  Checks if the username and password sent to the function is in the db,
//  returns either the ID of the user, or -1 for invalid username or password
function loginValidation($email, $pwd) {

    global $conn;
    
    $stmt = $conn->prepare("SELECT * FROM users WHERE pwd = ? AND Email = ?;");
    $stmt->bind_param("ss", $pwd, $email);

    $stmt->execute();
    $result = $stmt->get_result();
    
    //If there are data in the result variable send the ID of the user otherwise send -1
    if (mysqli_num_rows($result)!=0) {
        return $result->fetch_column(0);
    } else {
        return -1;
    }
}

?>