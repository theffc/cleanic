<?php

class CEP{

	public $cep;
	public $logradouro;
	public $bairro;
	public $cidade;
   public $estado;

	public function __construct(array $assoc)
   {

      $this->cep = $assoc['cep'];
      $this->logradouro = $assoc['logradouro '];
      $this->bairro = $assoc['bairro'];
      $this->cidade = $assoc['cidade'];
      $this->estado = $assoc['estado'];
   
   }
}

?>