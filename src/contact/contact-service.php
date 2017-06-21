<?php

require_once  '../../config/defaults.php';
require_once 'contact.php';


function registerContact(Contato $contato){
	$query = "INSERT INTO Contato(nomeCliente, emailCliente, motivoContato, mensagemContato) VALUES ('$contato->nomeCliente','$contato->emailCliente','$contato->motivoContato','$contato->mensagemContato')";

	$conn = connectToDatabase();
    $result = $conn->query($query);

    return $result;
}

function listAllContacts(){
	$query = "SELECT * FROM Contato";

	$conn = connectToDatabase();
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
      
    $contactsList = array();
    while ($contactAux = $result->fetch_assoc()) {
    	print_r($contactAux);
    	array_push($contactsList, $contactAux);
    }
  	return json_encode($contactsList, TRUE);

   }else {
    	return FALSE;
   }
}


function testContactInsert(){

	/*$json = '{"nomeCliente":"Cliente Teste","emailCliente":"teste@teste.com","motivoContato":"ELOGIO","mensagemContato":"hueeee"}';
	$newContact = new Contato(json_decode($json, true));

	print_r ($newContact);
	registerContact($newContact);
	*/

	listAllContacts();

}

?>