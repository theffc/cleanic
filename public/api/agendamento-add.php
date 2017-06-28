<?php  
require_once 'api-response.php';
require_once '../../src/agendamento/agendamento-service.php';

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	echo json_encode(new ApiResponse(false, "ERROR: Wrong HTTP Method", NULL));
	return;
}

$json = file_get_contents('php://input');
$assoc = json_decode($json, true);

$agendamento = new RequestNewAgendamento($assoc);
if (!$agendamento) {
   echo json_encode(new ApiResponse(false, "ERROR: requested data with invalid format", NULL));
   return;
}

// calling actual service
$r = addAgendamento($agendamento);
if (!$r) {
   echo json_encode(new ApiResponse(false, "ERROR: could not add agendamento", NULL));
   return;
}

echo json_encode(new ApiResponse(true, "Successfully added agendamento", $r));
?>