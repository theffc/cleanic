<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Introdução ao PHP</title>
</head>
<body>

	<h1>Múltiplos trechos PHP</h1>

	<?php
	for ($i = 0; $i < 5; $i++)
		echo "<h5>Subtitulo gerado com PHP</h5>\n";
	?>

	<h1>Múltiplos trechos PHP</h1>

	<?php
	for ($i = 0; $i < 5; $i++)
		echo "<h5>Outro subtitulo gerado com PHP</h5>\n";
	?>

	<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$nomeBD = "2374655_cleanic";
// Inicia uma nova conex�o com o servidor MySQL
// Em caso de sucesso na conex�o, a vari�vel $conn ser�
// ser utilizada posteriormente para manipula��o do banco
// de dados atrav�s dessa conex�o
	$conn = new mysqli($servidor, $usuario, $senha, $nomeBD);
// Verifica se ocorreu alguma falha durante a conex�o
	if ($conn->connect_error)
		die("Falha na conex�o com o MySQL: " . $conn->connect_error);
	else
		echo "Conectado ao MySQL";

	$sql = "SELECT * FROM `Usuario` WHERE loginUser = 'braz@cleanic.com'";

	$resultado = $conn->query($sql);
	if ($resultado)
		echo "Operacao realizada com sucesso!";
	else
		echo "Erro ao executar: " . $conn->error;

	while ($row = $resultado->fetch_assoc()) {
		echo $row["loginUser"];
		echo $row["passUser"];
	}

	?>

</body>
</html>
