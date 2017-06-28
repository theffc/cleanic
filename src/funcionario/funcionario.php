<?php

class Funcionario
{
   public $idFunc;
   public $nomeFunc;
   public $dataNascFunc;
   public $sexoFunc;
   public $estadoCivilFunc;
   public $cargoFunc;
   public $especialidadeFunc;
   public $CPF;
   public $RG;
   public $docsFunc;

   function __construct(array $assoc) {
      $this->idFunc = $assoc["idFunc"];
      $this->nomeFunc = htmlspecialchars_decode($assoc["nomeFunc"]);
      $this->dataNascFunc = $assoc["dataNascFunc"];
      $this->sexoFunc = $assoc["sexoFunc"];
      $this->estadoCivilFunc = $assoc["estadoCivilFunc"];
      $this->cargoFunc = $assoc["cargoFunc"];
      $this->especialidadeFunc = htmlspecialchars_decode($assoc["especialidadeFunc"]);
      $this->CPF = $assoc["CPF"];
      $this->RG = $assoc["RG"];
      $this->docsFunc = htmlspecialchars_decode($assoc["docsFunc"]);
   }
}
?>
