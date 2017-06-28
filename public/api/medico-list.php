<?php  
require_once 'api-response.php';
require_once '../../src/funcionario/funcionario-service.php';
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
   echo json_encode(new ApiResponse(false, "ERROR: wrong HTTP method", NULL));
   return;
}

$json = file_get_contents('php://input');
$assoc = json_decode($json, true);

$result = listEspecialidades();

if (!$result) {
   echo json_encode(new ApiResponse(false, "Could not retrieve medical specialties", NULL));
   return;
}

echo json_encode(new ApiResponse(true, "Medical specialities retrieved", $result));
?>