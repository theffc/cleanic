﻿
# Serviços - Integração API

**IMPORTANTE:** Lembrar que todas as respostas dos serviços seguirão o seguinte padrão:

```json
{
    "wasSuccessful": true,
    "message": "Some message",
    "data": { }
}
```

O campo "data" armazenará o objeto principal do serviço, mas, em alguns casos, poderá ser NULL.

## Tela de Agendamento
- POST api/agendamentos-disponiveis-medico.php
	+ in: {"idMedico": 2, "dataAgendamento": "2017-12-28"}
	+ out: {"OitoManha": true, "NoveManha": true, "DezManha": true, "OnzeManha": false, "MeioDia": false, "UmaTarde": true, "DuasTarde": true, "TresTarde": true, "QuatroTarde": true, "CincoTarde": true }
	+ info: fornece um médico, e recebe todos os horários disponíveis daquele médico
- POST agendamento-add.php
	+ in: {"dataAgendamento": "2017-06-26", "horaAgendamento": "12:00:00", "codFuncionario": 2, "nomePac": "TestandoAgendamento", "telPac": "99994933"}
	+ out: {"codAgendamento":"26","dataAgendamento":"2017-06-26","horaAgendamento":"08:00:00","codFuncionario":"2","codPaciente":"34"}
	+ info: fornece um formulário de agendamento, e consequentemente informações para cadastro de um novo cliente (paciente). Recebe o agendamento que acabou de ser criado.

- funcionario-service: recebe todas as possíveis especialidades médicas (as quais são obtidas de acordo com todos os médicos cadastrados)
- funcionario-service: fornece uma especialidade médica, e recebe os médicos daquela especialidade


## Tela de Contato
- GET api/contact-list.php
	+ out: [ {"nomeCliente": "Cleonice Souza Andrade", "emailCliente": "andrasouzc@hotimeiu.com", "motivoContato": "ELOGIO", "mensagemContato": "Clinica muito bonita.\r\n"} ]
	+ info: fornece um formulário simples para cadastrar um Contato

## Tela de Login
- POST login.php
	+ in: {"username": "fred@cleanic.com", "password": "fred"}
	+ out: NULL
	+ info: fornece um formulário simples para login de usuário, e recebe se foi possível ou não realizar o login

## Tela de Cadastro de Funcionários (Novo Funcionário)
- POST api/cep-search.php 
	+ in: { "cep": "213243" }
	+ out: {"cep":"31560380", "logradouro":"Rua Engenheiro Pedro Bax", "bairro":"Santa Am\u00e9lia", "cidade":"Belo Horizonte", "estado":"MG"}
	+ info: fornece um número de CEP, e recebe informações (logradouro, bairro, cidade) daquele CEP em específico
- POST funcionario-add.php
	+ WARNING: o campo "idFunc" do objeto de entrada sempre tem que ser 0. E esse mesmo campo no objeto de saída terá o real valor que foi inserido no banco de dados.
	+ in: {"idFunc":"0","nomeFunc":"Arlindo Teste","dataNascFunc":"1990-11-18","sexoFunc":"M","estadoCivilFunc":"SOLTEIRO","cargoFunc":"MEDICO","especialidadeFunc":"ginecologista","CPF":"38136132755","RG":"123456721","docsFunc":null}
	+ out: {"idFunc": 9, "nomeFunc": "Arlindo Teste", "dataNascFunc": "1990-11-18", "sexoFunc": "M", "estadoCivilFunc": "SOLTEIRO", "cargoFunc": "MEDICO", "especialidadeFunc": "ginecologista", "CPF": "38136132755", "RG": "123456721", "docsFunc": ""} 
	+ info: fornece um formulário com bastante informação para cadastro de um funcionário


## Tela de Listagem dos Funcionários
- GET api/funcionario-list.php
	+ out: [ {"idFunc": "1", "nomeFunc": "Leopoldo", "dataNascFunc": "1990-11-18", "sexoFunc": "M", "estadoCivilFunc": "SOLTEIRO", "cargoFunc": "MEDICO", "especialidadeFunc": "oftalmologista", "CPF": "34135841201", "RG": "123456789", "docsFunc": ""}, ]
	+ info: recebe todos os modelos de funcionários que estão no banco de dados

## Tela de Listagem dos Contatos
- GET api/contact-list.php
	+ out: [ {"nomeCliente": "Cleonice Souza Andrade", "emailCliente": "andrasouzc@hotimeiu.com", "motivoContato": "ELOGIO", "mensagemContato": "Clinica muito bonita.\r\n"}, ] 
	+ info: recebe todos os modelos de contatos que estão no banco de dados

## Tela de Listagem dos Agendamentos
- GET agendamento-list.php
	+ out: [ {"nomeMedico": "Leopoldo", "especialidadeMedico": "oftalmologista", "nomePaciente": "Braz", "telPaciente": "999998888", "horaConsulta": "13:00:00", "dataConsulta": "2017-06-23"}, ] 
	+ info: recebe um modelo modificado do agendamento, que deve conter o nome e especialidade do médico, e o nome e o telefone do paciente que agendou a consulta.


