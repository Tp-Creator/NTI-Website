<?php
require_once('includes/dbh.func/general/dbh.inc.php');
require_once('includes/external/googleLogin/google.config.php');
require_once('includes/dbh.func/account/dbh.usr.php');

// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);
    

    // get profile info
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();

    $email =  $google_account_info->email;
    $first =  $google_account_info->givenName;
    $last =  $google_account_info->familyName;
    $url =  $google_account_info->picture;

  //   $name =  $google_account_info->name;

    echo "<pre>";
    print_r($google_account_info);

    // Image path
  $img = "public/img/pfp/$email.png";

  if(!file_exists($img)){
      // Save image 

    file_put_contents($img, file_get_contents($url));
  }

  $userID = validateGoogleUser($email, $first, $last);
  // console_log($userID);

  $_SESSION['userID'] = $userID;

  header('Location: /');

  die();


}

///////// https://www.oauth.com/oauth2-servers/signing-in-with-google/setting-up-the-environment/ //////////


// // This is Google's OpenID Connect token endpoint
// $tokenURL = 'https://www.googleapis.com/oauth2/v4/token';

// // When Google redirects the user back here, there will
// // be a "code" and "state" parameter in the query string
// if(isset($_GET['code'])) {
//   // Verify the state matches our stored state
//   // if(!isset($_GET['state']) || $_SESSION['state'] != $_GET['state']) {
//   //   header('Location: ' . $baseURL . '?error=invalid_state');
//   //   die();
//   // }
 
//   // Exchange the authorization code for an access token
//   $ch = curl_init($tokenURL);
//   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//   curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
//     'grant_type' => 'authorization_code',
//     'client_id' => $clientID,
//     'client_secret' => $clientSecret,
//     // 'redirect_uri' => $baseURL,
//     'code' => $_GET['code']
//   ]));
//   $data = json_decode(curl_exec($ch), true);
//   console_log($data);
  
//     // Split the JWT string into three parts
//   $jwt = explode('.', $data['id_token']);
 
//     // Extract the middle part, base64 decode, then json_decode it
//   $userinfo = json_decode(base64_decode($jwt[1]), true);
 
//   $_SESSION['user_id'] = $userinfo['sub'];
//   $_SESSION['email'] = $userinfo['email'];
 
//     // While we're at it, let's store the access token and id token
//     // so we can use them later
//   $_SESSION['access_token'] = $data['access_token'];
//   $_SESSION['id_token'] = $data['id_token'];

//   console_log($_SESSION);

// }

?>
