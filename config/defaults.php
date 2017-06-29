<?php

$dbServer = "fdb16.awardspace.net";
$dbUser = "2374655_cleanic";
$dbPassword = "cleanicbfb15";
$dbName = "2374655_cleanic";

function connectToDatabase() {
  global $dbServer, $dbUser, $dbPassword, $dbName;

  $conn = new mysqli($dbServer, $dbUser, $dbPassword, $dbName);
  $conn->set_charset("utf8");
  return $conn;
}

?>
