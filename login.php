<?php
require_once 'database.php';

$json = file_get_contents('php://input');
$login = json_decode($json) #json_decode('{ "username": "absdbs", "password": "fred" }');

$query = "SELECT username, password FROM Usuario WHERE username = '$login->username' AND password = '$login->password'";

$conn = connectToDatabase();

$result = $conn->query($query);
if ($result->num_rows == 0 || $result == FALSE) {
  echo "{ 'isAccepted': false }";
} else {
  echo "{ 'isAccepted': true }";
}

?>
