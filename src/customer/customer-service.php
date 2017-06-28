<?php
require_once '../../config/defaults.php';
require_once 'customer.php';


function addNewPaciente($nome, $telefone, $db = NULL) {
   if (!$db) {
      $db = connectToDatabase();
      if (!$db) {
         return NULL;
      }
   }

   $query = "INSERT INTO Paciente(codigoPac, nomePac, telPac) VALUES(0, '$nome', '$telefone')";
   $result = $db->query($query);

   if ($result == FALSE) {
      return NULL;
   }

   $codigoPac = $db->insert_id;
   $assoc = array();
   $assoc['codigoPac'] = $codigoPac;
   $assoc['nomePac'] = $nome;
   $assoc['telPac'] = $telefone;
   $paciente = new Paciente($assoc);
   return $paciente;
}

function getPaciente($nome, $telefone, $db = NULL) {
   if (!$db) {
      $db = connectToDatabase();
      if (!$db) {
         return NULL;
      }
   }

   $query = "SELECT * FROM Paciente WHERE nomePac = '$nome' AND telPac = '$telefone'";
   $result = $db->query($query);
   $assoc = $result->fetch_assoc();
   if (!$assoc) {
      return NULL;
   }

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
