<?php

class AgendamentoModificado{

	public $nomeMedico;
	public $especialidadeMedico;
   public $nomePaciente;
   public $telPaciente;

	public function __construct(array $assoc)
   {

      $this->nomeMedico = $assoc['nomeFunc'];
      $this->especialidadeMedico = $assoc['especialidadeFunc'];
      $this->nomePaciente = $assoc['nomePac'];
      $this->telPaciente = $assoc['telPac'];  
   }
}
?>