<?php

class Contact{

	public $nomeCliente;
	public $emailCliente;
	public $motivoContato;
	public $mensagemContato;

	public function __construct(array $assoc)
   {

      $this->nomeCliente = $assoc['nomeCliente'];
      $this->emailCliente = $assoc['emailCliente'];
      $this->motivoContato = $assoc['motivoContato'];
      $this->mensagemContato = $assoc['mensagemContato'];
   
   }
}

?>