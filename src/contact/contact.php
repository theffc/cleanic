<?php

class Contato
{
	public $nomeCliente;
	public $emailCliente;
	public $motivoContato;
	public $mensagemContato;

	public function __construct(array $assoc)
   {
      $this->nomeCliente = htmlspecialchars_decode($assoc['nomeCliente']);
      $this->emailCliente = $assoc['emailCliente'];
      $this->motivoContato = $assoc['motivoContato'];
      $this->mensagemContato = htmlspecialchars_decode($assoc['mensagemContato']);
   }
}

?>
