<?php

$sites = array("php.net", "lists.php.net");

list($none, $site, $token, $sender) = explode("/", $_SERVER["PATH_INFO"]);

if ($sender == "" || strlen($token) < 32 || !isset($sites[$site])) {
  echo "Sorry, the URL is incomplete. Please verify that you used the complete URL even if it spans multiple lines.";
  exit;
}

mail("confirm@".$sites[$site], "confirm", "[confirm: $token $sender]", "From: $sender");

echo "Thanks for confirming your email address. No further action is required on your part.";
