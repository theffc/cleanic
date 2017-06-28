<?php  
require_once 'api-response.php';
require_once '../../src/user/user-service.php';
require_once '../../src/user/user.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
   echo json_encode(new ApiResponse(false, "ERROR: wrong HTTP method", NULL));
   return;
}

$json = file_get_contents('php://input');
$assoc = json_decode($json, true);

$user = new Usuario($assoc);
if (!$user) {
   echo json_encode(new ApiResponse(false, "ERROR: request data with invalid format", NULL));
   return;
}

// calling actual service
$result = login($user);
if (!$result) {
   echo json_encode(new ApiResponse(false, "ERROR: could not login", NULL));
   return;
}

echo json_encode(new ApiResponse(true, "Successful login", NULL));

?>