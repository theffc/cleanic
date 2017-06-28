<?php  
require_once 'api-response.php';
require_once '../../src/user/user-service.php';

$json = file_get_contents('php://input');
$assoc = json_decode($json, true) #json_decode('{ "username": "absdbs", "password": "fred" }');

$user = new User($assoc);

if (!$user) {
	$response = new ApiResponse(false, "Request data whith invalid format", NULL);
   echo json_encode($response);
   return;
}

$result = login($user);

if (!$result) {
   echo json_encode(new ApiResponse(false, "Could not login"));
   return;
}

echo json_encode(new ApiResponse(true, "Successful login", NULL));

?>