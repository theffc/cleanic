<?php
require_once '../../config/defaults.php';
require_once 'contact.php';


function addContact(Contato $contato) {
	$conn = connectToDatabase();
	if (!$conn) {
		return NULL;
	}

	$query = "INSERT INTO Contato(nomeCliente, emailCliente, motivoContato, mensagemContato) VALUES ('$contato->nomeCliente', '$contato->emailCliente', '$contato->motivoContato', '$contato->mensagemContato')";
	$result = $conn->query($query);

	$conn->close();

	if ($result) {
		return TRUE;
	} else {
		return FALSE;
	}
}

// returns an array of Contato, or null if it fails.
function listAllContacts() {
	$query = "SELECT * FROM Contato";

	$conn = connectToDatabase();
	if (!$conn) {
		return NULL;
	}

	$result = $conn->query($query);
	if ($result->num_rows == 0) {
		return NULL;
	}

	$contactsList = array();
	while ($assoc = $result->fetch_assoc()) {
		array_push($contactsList, new Contato($assoc));
	}

	$conn->close();

	return $contactsList;
}


function testContactInsert() {
	print_r(nl2br("\n"));
	if (session_id()) {
		print_r("INICIALIZADA");
	}
	print_r("Não inicializada");

	print_r(nl2br("\n"));
	$json = '{"nomeCliente":"Cliente Teste", "emailCliente":"teste@teste.com", "motivoContato":"ELOGIO", "mensagemContato":"hueeee"}';
	$newContact = new Contato(json_decode($json, true));

	
	print_r ($newContact);
	addContact($newContact);

	$contacts = listAllContacts();
	print_r(nl2br("\n"));
	print_r($contacts);
}

?>
