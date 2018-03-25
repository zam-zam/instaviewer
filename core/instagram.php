<?php
$insta = new \InstagramAPI\Instagram();
$user = $settings["auth"]["user"];
$password = $settings["auth"]["password"];
$insta->login($user, $password);
?>