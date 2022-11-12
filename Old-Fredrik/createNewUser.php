<?php
//Includes the connection to the database
include_once 'includes/dbh.inc.php';

//SQL anrop för att lägga till en ny användare
$sql = "INSERT INTO users (nickname, email, pass, role, about_me) VALUES ('" . $_POST['nickname'] . "','" . $_POST['email'] . "','" . $_POST['pwd'] . "', 'user', '" . $_POST['bio'] . "')";

//Skickar data till databasen
mysqli_query($conn, $sql);

//Stänger connection till databasen
//mysqli_close()

header("location:./");

?>