<?php
    //  sign-up.php
    //  This file does exactly what you think:
    //  It shows a form where the user can type in username, email and password (and retype password)
    //  on submit the page will post the data to this page again and check if its valid (if all boxes are filled, the passwords are the same and the email is not already registered in the db)
    //  if so it updates the session with the user id to keep the user logged in.

    //Finns en bugg med skapandet: Första accountet man försöker skapa säger den att mailen redan används i ett account


    //Includes the connection to the database
    include_once 'includes/dbh.inc.php';

    //Code to add a new user to the db
    //If the form is sent
    if($_POST) {

            //If all the input boxes contain information. (The if statement is simply split into multiple rows)
        if( $_POST['email'] != ""       AND
            $_POST['username'] != ""    AND 
            $_POST['pwd'] != ""         AND
            $_POST['re-pwd'] != ""      ) {
            
            if($_POST['pwd'] === $_POST['re-pwd']) {
                    //  Tries to create new user from function in dbh.inc.php
                $id = addUser($_POST['username'], $_POST['email'], $_POST['pwd']);

                    //  $id = -1 if the email is already in use in the db
                if($id != -1) {
                    session_start(); // start the PHP_session function 
                    $_SESSION['userID'] = $id;

                    header("location:./");
                } else {
                    echo "<p id='fail-msg'>Email already in use. Use another email</p>";
                }

            } else {
                echo "<p id='fail-msg'>The passwords are not matching</p>";
            }

        } else {
            echo "<p id='fail-msg'>All fields most contain information</p>";
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
    <title>Sign up</title>
</head>
<body>
    
<h1>Skapa ett konto här</h1>

<fieldset>
    <form name="sign-up" method="post" action="./sign-up.php">

        Username: <br/>
        <input class="normal" name="username"> <br/>

        Email: <br/> 
        <input class="normal" type="email" name="email"> <br/>

        Password: <br/> 
        <input class="normal" type="password" name="pwd"> <br/>

        Retype password: <br/> 
        <input class="normal" type="password" name="re-pwd"> <br/>

        <input type="submit" id="submit">

</form>
</fieldset>

</body>
</html>