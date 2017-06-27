<?php
require_once '../../config/defaults.php';
require_once 'AgendamentoModificado.php';

#return the appointments with Medics only, contains Medic name, speciality, pacient name and phone number
function ListaAgendamento(){

	$query = "
	SELECT	M.nomeFunc
		  , M.especialidadeFunc
	      , P.nomePac
	      , P.telPac
	      
	FROM    Agenda AS A
		  , Paciente AS P
	      , Funcionario AS M 
	      
	WHERE A.codPaciente = P.codigoPac AND A.codFuncionario = M.idFunc AND M.cargoFunc = 'MEDICO'";

	$conn = connectToDatabase();
	$result = $conn->query($query);

    $agendamentosMod = array();
    while ($assoc = $result->fetch_assoc()) {
    	array_push($agendamentosMod, new AgendamentoModificado($assoc));
    }

	print_r($agendamentosMod);
    return json_encode($agendamentosMod);
}


function ListaHorariosDisponiveis($idMedico){

	$query = "SELECT horaAgendamento FROM Funcionario WHERE idFunc = '$idMedico'";


}
?>