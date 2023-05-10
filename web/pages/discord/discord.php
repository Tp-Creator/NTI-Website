<?php
require_once('includes/dbh.func/general/dbh.inc.php');
require_once('includes/dbh.func/account/dbh.usr.php');


console_log($_SERVER);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Discord</title>
</head>
<body>
    
    <h1>Enter this into your private chat with the bot:</h1>
    <h3>class login <?php echo $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?></h3>

</body>
</html>