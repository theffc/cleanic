<?php

class CEP
{
	public $cep;
	public $logradouro;
	public $bairro;
	public $cidade;
   public $estado;

	public function __construct(array $assoc)
   {
      $this->cep = $assoc['CEP'];
      $this->logradouro = htmlspecialchars_decode($assoc['logradouro']);
      $this->bairro = htmlspecialchars_decode($assoc['bairro']);
      $this->cidade = htmlspecialchars_decode($assoc['cidade']);
      $this->estado = htmlspecialchars_decode($assoc['estado']);
   }
}

?>
