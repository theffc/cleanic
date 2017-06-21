<?php

class Agendamento{

	public $codAgendamento;
	public $dataAgendamento;
	public $horaAgendamento;
	public $codFuncionario;
   public $codPaciente;

	public function __construct(array $assoc)
   {

      $this->codAgendamento = $assoc['codAgendamento'];
      $this->dataAgendamento = $assoc['dataAgendamento'];
      $this->horaAgendamento = $assoc['horaAgendamento'];
      $this->codFuncionario = $assoc['codFuncionario'];
      $this->codPaciente = $assoc['codPaciente';]
   
   }
}

?>