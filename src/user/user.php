<?php

class Usuario
{
   public $username;
   public $password;

   public function __construct(array $assoc)
   {
      $this->username = $assoc['username'];
      $this->password = $assoc['password'];
   }
}

?>
