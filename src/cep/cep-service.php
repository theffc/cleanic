<?php
require_once '../../config/defaults.php';
require_once 'cep.php';


// receives a CEP string, and returns the CEP model, that is a complete address (street, neighborhood, state, etc)
function getCompleteAddressForCep($cep) {
   $query = "SELECT * FROM CEP WHERE cep = '$cep'";
   $db = connectToDatabase();
   $result = $db->query($query);

   $assoc = $result->fetch_assoc();
   print_r($assoc);
   $address = new CEP($assoc);

   return $address;
}

function testCep() {
   $cep = '38400388';
   $address = getCompleteAddressForCep($cep);
   print_r($address);

   header('Content-Type: application/json');
   echo json_encode($address);
}


?>
