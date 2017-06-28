<?php  
require_once 'api-response.php';
require_once '../../src/agendamento/agendamento-service.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] != 'GET') {
   echo json_encode(new ApiResponse(false, "ERROR: wrong HTTP method", NULL));
   return;
}

$result = ListaAgendamento();
if (!$result) {
   echo json_encode(new ApiResponse(false, "ERROR: could not retrieve appointments", NULL));
   return;
}

echo json_encode(new ApiResponse(true, "Appointments Listed", $result));
?>