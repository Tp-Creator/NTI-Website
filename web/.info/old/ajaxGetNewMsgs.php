<?php

    //Includes the connection to the database
    include_once 'includes/dbh.inc.php';

    $allMessagesData = getMsgs()

    $allMessageIds = array()

    for($i = 0; $i < sizeof($allMessagesData)-1; $i++){
        $allMessageIds[$i] = $allMessagesData[$i][0]
    }

    console_log($allMessageIds)

    foreach



?>