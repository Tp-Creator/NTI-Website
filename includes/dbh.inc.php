<?php
    // dbh.inc.php
    // This file creates a connection to the database that can be used to make
    // database calls.

    // The file for now also contains a few functions that can write and or read
    // the database.

    //The code doesn't display anything for the user to see.



// Incluces database account, names and pwd:s
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "nti_db";

//Creates connection to the MySQL database
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);



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
            return -1;
        }
}


// Will later be used when the user sends a message
function addMsg($Content, $Datum, $userID) {
    global $conn;

    // creates a call to the database in a safe way so that sql injections should not be able to take place
    $stmt = $conn->prepare("INSERT INTO msg (Content, Datum, userID) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $Content, $Datum, $userID);

    $stmt->execute();
    //Felhantering behövs (om det inte gick att skapa)
}

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