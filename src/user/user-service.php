<?php

require_once  '../../config/defaults.php';
require_once 'user.php';


function login(Usuario $user) {
   $query = "SELECT username, password FROM Usuario WHERE username = '$user->username' AND password = '$user->password'";

   $conn = connectToDatabase();
   $result = $conn->query($query);
   if ($result->num_rows == 0 || $result == FALSE) {
      return new LoginResponse(FALSE);
   } else {
     return new LoginResponse(TRUE);
   }
}


class LoginResponse
{
   public $isAccepted;

   public function __construct($isAccepted) {
      $this->isAccepted = $isAccepted;
   }
}

# just for tests
function testLogin() {
   $assoc = array('username' => 'fred@cleanic.com', 'password' => 'bla');

   $user = new Usuario($assoc);
   print_r($user);

   $result = login($user);

   header('Content-Type: application/json');
   echo json_encode($result);
}

?>
