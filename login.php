<?php
    //  login.php
    //  If the user is not logged in, he/she will be redirected to this page.
    //  The page will show a login form and post the data back to this file
    //  If we get posted data, we check if the user exists and if so updates
    //  the session with the user id to keep the user logged in.

    //Includes the connection to the database
    include_once 'includes/dbh.inc.php';

    //check if this is a login request
    if(isset($_POST['email']) AND isset($_POST['pwd'])) {
        // If so, check if the user exists in the database and returns ID
        $id = loginValidation($_POST['email'], $_POST['pwd']);

        // If the user didn't exist the function will return -1
        if($id != -1) {
            // if the user exists, we have now successfully logged in.
            // We store the id in the session, to let the user contiune to be logged in
            session_start(); // start the PHP_session function 
            $_SESSION['userID'] = $id;

            header("location:./");
        } else {
            echo "<p id='fail-msg'>Invalid username or password, try again</p>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    

<h1>Hej! DU måste logga in!</h1>

<fieldset>
    <form name="login" method="post" action="./login.php">

        Email: <br/> 
        <input class="normal" name="email"> <br/>

        Password: <br/> 
        <input class="normal" type="password" name="pwd"> <br/>

        <input type="submit" id="submit">

    </form>
    <a href="./sign-up.php">Skapa konto</a>
</fieldset>


</body>
</html>
