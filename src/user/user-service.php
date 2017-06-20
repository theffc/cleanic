<?php

require_once 'database.php';
require_once 'user.php';

public function login(User $user)
{
   $query = "SELECT username, password FROM Usuario WHERE username = '$user->username' AND password = '$user->password'";

   $conn = connectToDatabase();

   header('Content-Type: application/json');
   $result = $conn->query($query);
   if ($result->num_rows == 0 || $result == FALSE) {
     echo json_encode(LoginResponse(FALSE));
   } else {
     echo json_encode(LoginResponse(TRUE));
   }
}


class LoginResponse
{
   public isAccepted;

   public function __construct($isAccepted)
   {
      $this->isAccepted = $isAccepted;
   }
}

?>
