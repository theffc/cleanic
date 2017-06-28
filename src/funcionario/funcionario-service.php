<?php
require_once '../../config/defaults.php';
require_once 'funcionario.php';


function listAllFuncionarios() {
   $query = "SELECT * FROM Funcionario";

   $conn = connectToDatabase();
   $result = $conn->query($query);

   $funcionarios = array();
   while ($assoc = $result->fetch_assoc()) {
      array_push($funcionarios, new Funcionario($assoc));
   }
   return $funcionarios;
}

// returns TRUE if successful, and FALSE on failure.
function addFuncionario(Funcionario $funcionario) {
   $query = "INSERT INTO Funcionario (idFunc, nomeFunc, dataNascFunc, sexoFunc, estadoCivilFunc, cargoFunc, especialidadeFunc, CPF, RG, docsFunc) VALUES ('$funcionario->idFunc', '$funcionario->nomeFunc', '$funcionario->dataNascFunc', '$funcionario->sexoFunc', '$funcionario->estadoCivilFunc', '$funcionario->cargoFunc', '$funcionario->especialidadeFunc', '$funcionario->CPF', '$funcionario->RG', '$funcionario->docsFunc')";

   $db = connectToDatabase();
   $result = $db->query($query);
   return($result); # bool
}

# returns all funcionarios that have the "cargoFunc" property equals to "MEDICO"
function listAllDoctors() {
   $query = "SELECT * FROM Funcionario WHERE cargoFunc = 'MEDICO'";
   $db = connectToDatabase();
   $result = $db->query($query);

   $doctors = array();
   while ($assoc = $result->fetch_assoc()) {
      array_push($doctors, new Funcionario($assoc));
   }
   return $doctors;
}

# returns all funcionarios that are doctors, and that have the "especialidadeFunc" provided
function listDoctorsOfSpeciality($speciality) {
   $query = "SELECT * FROM Funcionario WHERE cargoFunc = 'MEDICO' AND especialidadeFunc = '$speciality'";
   $db = connectToDatabase();
   $result = $db->query($query);

   $doctors = array();
   while ($assoc = $result->fetch_assoc()) {
      array_push($doctors, new Funcionario($assoc));
   }
   return $doctors;
}

function listEspecialidades(){

   $query = "SELECT especialidadeFunc from Funcionario where cargoFunc = 'MEDICO' GROUP BY especialidadeFunc";

   $db = connectToDatabase();
   $result = $db->query($query);

   $especialidades = array();
   while ($assoc = $result->fetch_assoc()) {
      array_push($especialidades, $assoc['especialidadeFunc']);
   }
   return $especialidades;
}
# TESTS

function testAddFuncionario() {
   $funcionario = new Funcionario(array("idFunc" => 0, "nomeFunc" => "Ricardo Teste", "dataNascFunc" => "12-12-1992", "sexoFunc" => "MASCULINO", "estadoCivilFunc" => "SOLTEIRO", "cargoFunc" => "MEDICO", "especialidadeFunc" => "Ginecologista", "CPF" => "38136132755", "RG" => "1212123", "docsFunc" => "bla"));
   $json = '{"idFunc":"0","nomeFunc":"Arlindo Teste","dataNascFunc":"1990-11-18","sexoFunc":"M","estadoCivilFunc":"SOLTEIRO","cargoFunc":"MEDICO","especialidadeFunc":"ginecologista","CPF":"38136132755","RG":"123456721","docsFunc":null}';
   $funcionario2 = new Funcionario(json_decode($json, true));

   print_r(addFuncionario($funcionario));
   print_r(addFuncionario($funcionario2));
}

function testListAllFuncionarios() {
   $funcionarios = listAllFuncionarios();
   print_r($funcionarios);
}

?>
