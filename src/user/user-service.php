<?php

require_once  '../../config/defaults.php';
require_once 'user.php';

function login(Usuario $user) {
   $conn = connectToDatabase();
   if (!$conn) {
      return NULL;
   }

   $query = "SELECT username, password FROM Usuario WHERE username = '$user->username' AND password = '$user->password'";
   $result = $conn->query($query);

   $conn->close();

   if ($result->num_rows == 0 || $result == FALSE) {
      return FALSE;
   }
   else {
      session_start();
      $_SESSION['user'] = $user;
      return TRUE;
   }
}

# just for tests
function testLogin() {
   $assoc = array('username' => 'fred@cleanic.com', 'password' => 'fred');

   $user = new Usuario($assoc);
   print_r($user);

   $result = login($user);

   echo json_encode($result);
}

?>
