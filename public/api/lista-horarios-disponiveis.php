<?php  
require_once 'api-response.php';
require_once '../../src/agendamento/agendamento-service.php';

$json = file_get_contents('php://input');
$assoc = json_decode($json, true);

$result = ListaHorariosDisponiveis($assoc['idMedico'], $assoc['dataAgendamento']);

if (!$result) {
   echo json_encode(new ApiResponse(false, "Could not retrieve schedule", NULL));
   return;
}

echo json_encode(new ApiResponse(true, "Schedule Found", $result));
?>