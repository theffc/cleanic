<?php  
require_once 'api-response.php';
require_once '../../src/contact/contact-service.php';

$json = file_get_contents('php://input');
$assoc = json_decode($json, true);

$result = ListAllContacts();

if (!$result) {
   echo json_encode(new ApiResponse(false, "Could not retrieve contacts", NULL));
   return;
}

echo json_encode(new ApiResponse(true, "Contacts Found", $result));
?>