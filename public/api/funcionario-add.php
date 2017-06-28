<?php  
require_once 'api-response.php';
require_once '../../src/funcionario/funcionario-service.php';
require_once '../../src/funcionario/funcionario.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
	echo json_encode(new ApiResponse(false, "ERROR: Wrong HTTP Method", NULL));
	return;
}

$json = file_get_contents('php://input');
$assoc = json_decode($json, true);

$funcionario = new Funcionario($assoc);
if (!$funcionario) {
   echo json_encode(new ApiResponse(false, "ERROR: requested data with invalid format", NULL));
   return;
}

// calling actual service
$r = addFuncionario($funcionario);

if (!$r) {
   echo json_encode(new ApiResponse(false, "ERROR: could not add funcionario", NULL));
   return;
}

echo json_encode(new ApiResponse(true, "Successfully added funcionario", $r));

?>