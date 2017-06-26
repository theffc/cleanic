<?php

class Paciente
{
   public $codigoPac;
   public $nomePac;
   public $telPac;

   public function __construct(array $assoc) {
      $this->codigoPac = $assoc['codigoPac'];
      $this->nomePac = $assoc['nomePac'];
      $this->telPac = $assoc['telPac'];
   }
}

 ?>
