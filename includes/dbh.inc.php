<?php
    // dbh.inc.php
    // This file creates a connection to the database that can be used to make
    // database calls.

    // The file for now also contains a few functions that can write and or read
    // the database.

    //The code doesn't display anything for the user to see.



// Incluces database grejer

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "nti_db";

//Creates connection to the MySQL database
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);


// Will later be used when creating a new user
function addUser($name, $mail, $pwd) {
    global $conn;
    
    // creates a call to the database in a safe way so that sql injections should not be able to take place
    // First rows builds the call from the arguments and the last executes the call to the database
    $stmt = $conn->prepare("INSERT INTO users (Email, FirstName, pwd) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $mail, $pwd);

    $stmt->execute();
    //Felhantering behövs (om det inte gick att skapa)
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


// Checks if the username and password sent to the function is in the db,
// returns either the ID of the user, or -1 for invalid username or password
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