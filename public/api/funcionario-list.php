<?php  
require_once 'api-response.php';
require_once '../../src/funcionario/funcionario-service.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] != 'GET') {
   echo json_encode(new ApiResponse(false, "ERROR: wrong HTTP method", NULL));
   return;
}

$result = listAllFuncionarios();
if (!$result) {
   echo json_encode(new ApiResponse(false, "ERROR: Could not list funcionarios", NULL));
   return;
}

echo json_encode(new ApiResponse(true, "Successfully listed all funcionarios", $result));
?>