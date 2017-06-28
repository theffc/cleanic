<?php

require_once  '../../config/defaults.php';
require_once 'user.php';

function login(Usuario $user) {
   $conn = connectToDatabase();
   if (!$conn) {
      return NULL;
   }

   
   $stmt = $conn->prepare("SELECT * FROM Usuario WHERE username = ? AND password = ?");
   $stmt->bind_param("ss", $user->username, $user->password);
   $stmt->execute();
   $stmt->bind_result($username, $password);
   //$query = "SELECT username, password FROM Usuario WHERE username = '$user->username' AND password = '$user->password'";
   //$result = $conn->query($query);
   while ($stmt->fetch()) {
        echo $username, $password;
    }
   $stmt->close();

   if ($username == FALSE) {
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
