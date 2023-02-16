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
  //   $email =  $google_account_info->email;
  //   $name =  $google_account_info->name;
  
      echo "<pre>";
      print_r($google_account_info);
}

?>
