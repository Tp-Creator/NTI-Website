<?php

    require_once('includes/dbh.func/general/dbh.general.php');
    require_once('includes/HTMLElements/general.elements.php');


    // session_start();    //start the PHP_session function

    $usr = getUserFromId($_SESSION['userID']);
    $usrName = $usr->Username;
    $usrMail = $usr->Email;
    console_log($usr);
    console_log($usrMail);

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- random style links -->
    <link rel="stylesheet" href="/public/style/mainStyle.css">
    <link rel="stylesheet" href="/public/style/commonStyle.css">

    <title><?php echo $usrName; ?>'s account</title>
</head>
<body>
    
    <!-- Navigationbar  -->
    <nav>
        <?php echo drawNavbar() ?>
    </nav>

    <img src="data/pfp/<?php echo $usrMail; ?>.png" alt="">
    <img src="/data/pfp/joel.jagerskogh@elev.ga.ntig.se.png" alt="">
    <img src="/pages/account/a.png" alt="">
    <!-- joel.jagerskogh@elev.ga.ntig.se.png -->


</body>
</html>