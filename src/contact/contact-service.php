<?php
require_once  '../../config/defaults.php';
require_once 'contact.php';


function registerContact(Contato $contato) {
	$query = "INSERT INTO Contato(nomeCliente, emailCliente, motivoContato, mensagemContato) VALUES ('$contato->nomeCliente', '$contato->emailCliente', '$contato->motivoContato', '$contato->mensagemContato')";

	$conn = connectToDatabase();
	$result = $conn->query($query);

	return $result;
}

// returns an array of Contato, or null if it fails.
function listAllContacts() {
	$query = "SELECT * FROM Contato";
	$conn = connectToDatabase();
	$result = $conn->query($query);

	print_r($result);

	if ($result->num_rows == 0) {
		return NULL;
	}

	$contactsList = array();
	while ($assoc = $result->fetch_assoc()) {
		array_push($contactsList, new Contato($assoc));
	}
	return $contactsList;
}


function testContactInsert() {
	$json = '{"nomeCliente":"Cliente Teste", "emailCliente":"teste@teste.com", "motivoContato":"ELOGIO", "mensagemContato":"hueeee"}';
	$newContact = new Contato(json_decode($json, true));
	
	print_r ($newContact);
	registerContact($newContact);

	$contacts = listAllContacts();
	print_r(nl2br("\n"));
	print_r($contacts);
}

?>
