<?php

require_once('includes\dbh.func\googleLogin\google.config.php');

console_log($client);


  // now you can use this profile info to create account in your website and make user logged in.
  echo "<a href='" . $client->createAuthUrl() . "'>Google Login</a>";

?>