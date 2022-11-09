<?php
//Incluces database grejer

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "testt";

//Creates connection to the MySQL database
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);


function addUser($name, $mail, $pwd) {
    // prepare and bind och gör så att SQL injections inte kan ske.
    $stmt = $conn->prepare("INSERT INTO users (Email, FirstName, pwd) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $mail, $pwd);

    $stmt->execute();
    //Felhantering behövs (om det inte gick att skapa)
}

function addMsg($Content, $Datum, $userID) {
    // prepare and bind och gör så att SQL injections inte kan ske.
    $stmt = $conn->prepare("INSERT INTO msg (Content, Datum, userID) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $Content, $Datum, $userID);

    $stmt->execute();
    //Felhantering behövs (om det inte gick att skapa)
}



?>