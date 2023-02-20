<?php

    include_once('includes\dbh.func\general\dbh.general.php');

    session_start();    //start the PHP_session function

    $usr = getUserFromId($_SESSION['userID']);
    $usrName = $usr->Username;

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $usrName; ?>s account</title>
</head>
<body>
    
hhhh

</body>
</html>