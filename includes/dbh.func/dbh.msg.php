<?php

//Includes the connection to the database
include_once 'dbh.inc.php';

//Includes user functions related to the db
include_once 'dbh.usr.php';


// Will later be used when the user sends a message
function sendMsg($Content, $Datum, $userID) {
    global $conn;

    // creates a call to the database in a safe way so that sql injections should not be able to take place
    $stmt = $conn->prepare("INSERT INTO msg (Content, dt, userID) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $Content, $Datum, $userID);

    $stmt->execute();
    //Felhantering behövs (om det inte gick att skapa)
}

//  getMsgs()
//  This function searches through the database and gets all the messages available
//  It returns an array with all msg columns and their data,
//  except the userID that is being changed to the username, so that the function can directly be used to
//  access the name of the user that sent the message
//  Doesn't take any arguments yet
function getMsgs(){
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM msg;");
    $stmt->execute();
    $result = $stmt->get_result();
    
    $result = $result->fetch_all();

    $realResult = $result;

        //  Byter ut id:t på usern till usernamet
    for ($i = 0; $i <= sizeof($result)-1; $i++) {
        $realResult[$i][2] = getUsernameFromId($result[$i][2]);
    }

        //  Returnerar en array med alla rader där man kan nå datan genom att ta $realResult[i]
    return $realResult;
}

?>