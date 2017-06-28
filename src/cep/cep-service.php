<?php
require_once '../../config/defaults.php';
require_once 'cep.php';


// receives a CEP string, and returns the CEP model, that is a complete address (street, neighborhood, state, etc)
function getCompleteAddressForCep($cep) {
   $db = connectToDatabase();
   if (!$db) {
      return NULL;
   }

   $query = "SELECT * FROM CEP WHERE cep = '$cep'";
   $result = $db->query($query);
   if ($result->num_rows == 0) {
      return NULL;
   }

   $assoc = $result->fetch_assoc();
   $address = new CEP($assoc);

   $db->close();

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
