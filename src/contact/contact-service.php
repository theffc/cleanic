<?php

require_once  '../../config/defaults.php';
require_once 'contact.php';


function registerContact(contact contato){
	$query = "INSERT INTO `Contato`(`nomeCliente`, `emailCliente`, `motivoContato`, `mensagemContato`) VALUES (['$contato->nomeCliente]','$contato->emailCliente','$contato->motivoContato','$contato->mensagemContato')";

	$conn = connectToDatabase();
    $result = $conn->query($query);

    return $result;

}

function listAllContacts(){
	$query = "SELECT * FROM 'Contato'";

	$conn = connectToDatabase();
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
      
   } else {
     return FALSE;
   }
}

?>