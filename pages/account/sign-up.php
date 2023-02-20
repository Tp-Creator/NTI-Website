<?php
    //  sign-up.php
    //  This file does exactly what you think:
    //  It shows a form where the user can type in username, email and password (and retype password)
    //  on submit the page will post the data to this page again and check if its valid (if all boxes are filled, the passwords are the same and the email is not already registered in the db)
    //  if so it updates the session with the user id to keep the user logged in.

    //Finns en bugg med skapandet: Första accountet man försöker skapa säger den att mailen redan används i ett account


    //Includes the connection to the database
    include_once 'includes\dbh.func\general\dbh.inc.php';
    include_once 'includes\dbh.func\account\dbh.usr.php';

    //  A variable for the fail message that can be needed to be displayed
    $error_message = "";

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

                    header("location:/");
                } else {
                    $error_message = "Email is already in use. Use another email";
                }

            } else {
                $error_message = "*Passwords are not matching";
            }

        } else {
            $error_message = "All fields should contain information";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- style links  -->
    <link rel="stylesheet" href="/public/style/mainStyle.css">
    <link rel="stylesheet" href="/public/style/pages/account/account.css">

    <title>Sign up</title>
</head>
<body>
    
    <script>

            //  Checks if the form has valid input and shows fail msg if neccesary
        function validateForm(form) {
                //  html path of the p tag element with id: "fail-msg"
            var failMsgElement = document.getElementById("fail-msg");

                //  All fields most contain info
            if(form['username'].value == "" || form['email'].value == "" || form['pwd'].value == "") {
                    //  Shows the hidden fail message
                failMsgElement.style.display = "block";
                    //  Changes the fail message to the relevant one
                failMsgElement.innerHTML = "All fields should contain information";
                    //  This does so that the form is not posted (the filled in data will not be erased)
                return false;
            }
            
                //  same thing as above but an other error
            if(form['pwd'].value != form['re-pwd'].value) {
                failMsgElement.style.display = "block";
                failMsgElement.innerHTML = "Passwords are not matching";
                return false;
            }
        }

    </script>

    <?php
        if ($error_message != "") {
            //  If posted data is wrong (when checked with the db)
            //  this will be shown
            echo "<p id='fail-msg'>$error_message</p>";
        }
        else{
            //  Otherwise this will be added to the html so that the JS can change and show a fail msg
            //  This will only happen for fails that can be cotrolled on the client by JS
            echo "<p id='fail-msg' style='display: none'></p>";    
        }
    ?>

    <form class="infoCard" name="sign-up" method="post" action="/sign-up">

        <h1>Create account</h1>

        <input placeholder="Username" type="text" name="username">

        <input placeholder="Email" type="text" type="email" name="email">

        <input placeholder="Password" type="password" name="pwd">

        <input placeholder="Retype Password" type="password" name="re-pwd">

        <button class="button" type="submit" id="submit" onclick="return validateForm(this.form)">Create your account</button>

        <p>Already have an account? <a href="/login">Return to log in</a></p>

    </form>

</body>
</html>