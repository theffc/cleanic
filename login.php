<?php

$json = file_get_contents('php://input');
$login = json_decode($json) # json_decode('{ "username": "fred@cleanic.com", "password": "fred" }');

echo nl2br($login->username . "\n");
echo nl2br($login->password . "\n");

$query = "SELECT username, password FROM Usuario WHERE username = '$login->username' AND password = '$login->password'";

echo nl2br($query . "\n");

$servidor = "localhost";
$usuario = "root";
$senha = "";
$nomeBD = "2374655_cleanic";

$conn = new mysqli($servidor, $usuario, $senha, $nomeBD);
if ($conn->connect_error)
  die("Falha na conex�o com o MySQL: " . $conn->connect_error . "\n");
else
  print nl2br("Conectado ao MySQL\n");

$result = $conn->query($query);
if ($result == FALSE) {
  print nl2br("Usuário não encontrado\n");
} else {
  print nl2br("Login efetuado com sucesso\n");
}


 ?>
