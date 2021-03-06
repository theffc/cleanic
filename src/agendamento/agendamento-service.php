<?php
require_once '../../config/defaults.php';
require_once 'agendamento.php';
require_once 'agendamentoModificado.php';
require_once 'horarios-disponiveis.php';
require_once '../../src/customer/customer-service.php';

#return the appointments with Medics only, contains Medic name, speciality, pacient name and phone number
function ListaAgendamento() {
   $conn = connectToDatabase();
   if (!$conn) {
      return NULL;
   }

   $query = "SELECT	M.nomeFunc , M.especialidadeFunc , P.nomePac , P.telPac, A.dataAgendamento, A.horaAgendamento
            FROM Agenda AS A , Paciente AS P , Funcionario AS M
            WHERE A.codPaciente = P.codigoPac AND A.codFuncionario = M.idFunc AND M.cargoFunc = 'MEDICO'";
   $result = $conn->query($query);

   $agendamentosMod = array();
   while ($assoc = $result->fetch_assoc()) {
   	array_push($agendamentosMod, new AgendamentoModificado($assoc));
   }
   return $agendamentosMod;
}

function addAgendamento(RequestNewAgendamento $requestAgendamento) {
   $db = connectToDatabase();
   if (!$db) {
      return NULL;
   }

   try {
      $db->begin_transaction();

      $paciente = getPaciente($requestAgendamento->nomePac, $requestAgendamento->telPac, $db);
      if (!$paciente) {
         $paciente = addNewPaciente($requestAgendamento->nomePac, $requestAgendamento->telPac, $db);
         if (!$paciente) {
            throw new Exception("ERROR");
         }
      }

      $query = "INSERT INTO Agenda(codAgendamento, dataAgendamento, horaAgendamento, codFuncionario, codPaciente) VALUES (0, '$requestAgendamento->dataAgendamento', '$requestAgendamento->horaAgendamento', '$requestAgendamento->codFuncionario', '$paciente->codigoPac')";
      $result = $db->query($query);
      if (!$result) {
         throw new Exception("ERROR");
      }

      $codAgendamento = $db->insert_id;
      $query = "SELECT * FROM Agenda WHERE codAgendamento = '$codAgendamento'";
      $result = $db->query($query);
      $assoc = $result->fetch_assoc();
      $agendamento = new Agendamento($assoc);

      $db->commit();
      return $agendamento;
   }
   catch(Exception $e) {
      $db->rollback();
      return NULL;
   }
}

class RequestNewAgendamento
{
	public $dataAgendamento;
	public $horaAgendamento;
	public $codFuncionario;
   public $nomePac;
   public $telPac;

   public function __construct(array $assoc)
   {
      $this->dataAgendamento = $assoc['dataAgendamento'];
      $this->horaAgendamento = $assoc['horaAgendamento'];
      $this->codFuncionario = $assoc['codFuncionario'];
      $this->nomePac = $assoc['nomePac'];
      $this->telPac = $assoc['telPac'];
   }
}

function ListaHorariosDisponiveis($idMedico, $dataAgendamento){

   $query = "SELECT horaAgendamento FROM Agenda AS A, Funcionario as M WHERE A.codFuncionario = '$idMedico' AND A.dataAgendamento = '$dataAgendamento' AND M.idFunc = '$idMedico' AND M.cargoFunc = 'MEDICO'";
   $db = connectToDatabase();
   $result = $db->query($query);
   if ($result == NULL) {
      return NULL;
   }
   else{

      $disponibilidades = array();
      for ($i = 0; $i < 10; $i++){
         $disponibilidades[$i] = true;
      }

      while ($assoc = $result->fetch_assoc()) {
         if ($assoc['horaAgendamento'] == "08:00:00"){
            $disponibilidades[0] = false;
         }
         else if ($assoc['horaAgendamento'] == "09:00:00"){
            $disponibilidades[1] = false;
         }
         else if ($assoc['horaAgendamento'] == "10:00:00"){
            $disponibilidades[2] = false;
         }
         else if ($assoc['horaAgendamento'] == "11:00:00"){
            $disponibilidades[3] = false;
         }
         else if ($assoc['horaAgendamento'] == "12:00:00"){
            $disponibilidades[4] = false;
         }
         else if ($assoc['horaAgendamento'] == "13:00:00"){
            $disponibilidades[5] = false;
         }
         else if ($assoc['horaAgendamento'] == "14:00:00"){
            $disponibilidades[6] = false;
         }
         else if ($assoc['horaAgendamento'] == "15:00:00"){
            $disponibilidades[7] = false;
         }
         else if ($assoc['horaAgendamento'] == "16:00:00"){
            $disponibilidades[8] = false;
         }
         else if ($assoc['horaAgendamento'] == "17:00:00"){
            $disponibilidades[9] = false;
         }
      }
      $horariosDisponiveis = new HorariosDisponiveis($disponibilidades);
      return $horariosDisponiveis;
   }
}

function testAddAgendamento() {
   $request = new RequestNewAgendamento(array('dataAgendamento' => '2017-06-26', 'horaAgendamento' => '12:00:00', 'codFuncionario' => 2, 'nomePac' => 'TestandoAgendamento', 'telPac' => '99994933'));
   $agendamento = addAgendamento($request);
   print_r($agendamento);
   echo json_encode($agendamento);
}
?>
