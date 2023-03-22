<?php

require_once('vendor/autoload.php');

// init configuration
$clientID = '551005406674-h2gd6th757dennnuefhicgvgt0pvf8gl.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://194-22-31-74.customer.telia.com/gooIn';
// $redirectUri = 'http://localhost:8080/gooIn';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

?>