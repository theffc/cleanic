<?php
require_once '../../config/defaults.php';
require_once 'customer.php';


function addNewPaciente($nome, $telefone) {
   $query = "INSERT INTO Paciente(codigoPac, nomePac, telPac) VALUES(0, '$nome', '$telefone')";
   $db = connectToDatabase();
   $result = $db->query($query);

   if ($result == FALSE) {
      return NULL;
   }

   $codigoPac = $db->insert_id;
   $paciente = getPaciente($codigoPac);
   return $paciente;
}


function getPaciente($codigoPac) {
   $query = "SELECT * FROM Paciente WHERE codigoPac = '$codigoPac'";
   $db = connectToDatabase();
   $result = $db->query($query);
   $assoc = $result->fetch_assoc();
   $paciente = new Paciente($assoc);
   return $paciente;
}


function testGetPaciente() {
   $codigoPac = 3;
   $paciente = getPaciente($codigoPac);
   print_r($paciente);

   header("Content-Type: application/json");
   echo json_encode($paciente);
}

function testAddNewPaciente() {
   $nome = "Super Mega Teste";
   $telefone = "9966666";
   $paciente = addNewPaciente($nome, $telefone);
   print_r($paciente);

   header("Content-Type: application/json");
   echo json_encode($paciente);
}

?>
