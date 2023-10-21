<?php
// dbh.inc.php
// This file creates a connection to the database that can be used to make
// database calls.

// The file for now also contains a few functions that can write and or read
// the database.

//The code doesn't display anything for the user to see.



// Incluces database account, names and pwd:s
$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "APL-UPPGIFTER3";
$dbName = "nti_db";

//Creates connection to the MySQL database
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);


//  console_log($output)
//  Is a function copied from https://stackify.com/how-to-log-to-console-in-php/
//  It takes on input: $output (the message or variale that should be logged to the js console)
//  Does not return anything
function console_log($output) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
    $js_code = '<script>' . $js_code . '</script>';
    
    echo $js_code;
}

?>