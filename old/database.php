<?php

$dbServer = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "2374655_cleanic";

function connectToDatabase()
{
  global $dbServer, $dbUser, $dbPassword, $dbName;

  $conn = new mysqli($dbServer, $dbUser, $dbPassword, $dbName);
  return $conn;
}

?>
