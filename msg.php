
<?php
    //  This page is a page where all of the messages in the database are displayed in a row
    //  Users will later be able to send messages as well on this page


    //Includes the connection to the database
    include_once 'includes/dbh.inc.php';

    //Checks if the user is logged in and sends them to the login side
    include_once 'includes/loginCheck.php';

    if(isset($_POST['new-msg'])) {
        
        $content = $_POST['new-msg'];
        $nowDate = date("Y-m-d H:i:s");
        $userID = $_SESSION['userID'];

        sendMsg($content, $nowDate, $userID);

    }
    



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Forum</title>
</head>
<body>
    
<!-- navbar -->

    <div id="navbar">
        <a href="./index.php">Home</a>
    </div>


    <?php 
            //  Writes out all messages in the db in order
        $allMsgs = getMsgs();

        for ($i = 0; $i <= sizeof($allMsgs)-1; $i++) {
            echo "<p class='message'>" . $allMsgs[$i][2] . " - - - - ". $allMsgs[$i][3] . " - - - - " .  $allMsgs[$i][1] . "</p>";
        }
    ?>

    <form name="new-message" method="post" action="./msg.php"> 

        <textarea name="new-msg" id="new-msg" cols="30" rows="10"></textarea>

        <input type="submit" id="send-new-msg">

    </form>


</body>
</html>
