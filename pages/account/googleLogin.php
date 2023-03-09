<?php

require_once('includes/external/googleLogin/google.config.php');

require_once('includes/dbh.func/account/dbh.usr.php');
require_once('includes/dbh.func/forum/dbh.forum.php');

// console_log($client);


  // now you can use this profile info to create account in your website and make user logged in.
  // echo "<a href='" . $client->createAuthUrl() . "'>Google Login</a>";

  header("Location:" . $client->createAuthUrl());


  // postQuestion(1, 3, "title", "content", 213456789876543);
  // console_log(validateGoogleUser('joel.dkasldpas@dasds.se', 'Joel', 'Hejson'));

?>