<?php
require_once('includes\dbh.func\googleLogin\google.config.php');
require_once('includes\dbh.func\general\dbh.inc.php');

// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    // $client->setAccessToken($token['access_token']);             //  Borde nog inte kommenteras bort, men fungerar när jag gör det
    
    // get profile info
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();

    $email =  $google_account_info->email;
    $url =  $google_account_info->picture;

  //   $name =  $google_account_info->name;

    echo "<pre>";
    print_r($google_account_info);

    // Remote image URL
// $url = "http://www.example.com/$email.png";

  // Image path
$img = "data/pfp/$email.png";

if(!file_exists($img)){
    // Save image 
  file_put_contents($img, file_get_contents($url));
}
}

?>
