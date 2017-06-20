<?php

class Userario
{
   public $username;
   public $password;

   public function __construct(string $username, string $password)
   {
      $this->username = $username;
      $this->password = $password;
   }

   public function __construct(array $assoc)
   {
      $this->username = $assoc['username'];
      $this->password = $assoc['password'];
   }
}

?>
