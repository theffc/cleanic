<?php  
require_once 'api-response.php';
require_once '../../src/contact/contact-service.php';
require_once '../../src/contact/contact.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] != 'GET') {
	echo json_encode(new ApiResponse(false, "ERROR: wrong HTTP method", NULL));
	return;
}

// calling actual service
$result = listAllContacts();

if (!$result) {
   echo json_encode(new ApiResponse(false, "ERROR: Could not list contacts", NULL));
   return;
}

echo json_encode(new ApiResponse(true, "Successfully listed contacts", $result));

?>