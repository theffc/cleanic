<?php

class AgendamentoModificado
{
	public $nomeMedico;
	public $especialidadeMedico;
   public $nomePaciente;
   public $telPaciente;
   public $horaConsulta;
   public $dataConsulta;

	public function __construct(array $assoc)
   {
      $this->nomeMedico = htmlspecialchars_decode($assoc['nomeFunc']);
      $this->especialidadeMedico = htmlspecialchars_decode($assoc['especialidadeFunc']);
      $this->nomePaciente = htmlspecialchars_decode($assoc['nomePac']);
      $this->telPaciente = $assoc['telPac'];
      $this->horaConsulta = $assoc['horaAgendamento'];
      $this->dataConsulta = $assoc['dataAgendamento'];
   }
}
?>
