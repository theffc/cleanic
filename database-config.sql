-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: fdb16.awardspace.net
-- Generation Time: Jun 18, 2017 at 07:26 PM
-- Server version: 5.7.18-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `2374655_cleanic`
--
CREATE DATABASE IF NOT EXISTS `2374655_cleanic` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `2374655_cleanic`;

-- --------------------------------------------------------

--
-- Table structure for table `Agenda`
--

CREATE TABLE `Agenda` (
  `codAgendamento` int(11) NOT NULL,
  `dataAgendamento` date NOT NULL,
  `horaAgendamento` time NOT NULL,
  `codFuncionario` int(11) NOT NULL,
  `codPaciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Agenda`
--

INSERT INTO `Agenda` (`codAgendamento`, `dataAgendamento`, `horaAgendamento`, `codFuncionario`, `codPaciente`) VALUES
(1, '2017-06-21', '11:00:00', 2, 6),
(2, '2017-06-22', '08:00:00', 3, 1),
(3, '2017-06-23', '13:00:00', 1, 2),
(4, '2017-06-26', '17:00:00', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `CEP`
--

CREATE TABLE `CEP` (
  `CEP` varchar(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logradouro` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(2) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `CEP`
--

INSERT INTO `CEP` (`CEP`, `logradouro`, `bairro`, `cidade`, `estado`) VALUES
('11660015', 'Praça Esperanto', 'Centro', 'Caraguatatuba', 'SP'),
('31560380', 'Rua Engenheiro Pedro Bax', 'Santa Amélia', 'Belo Horizonte', 'MG'),
('38400388', 'Avenida Joao Pessoa', 'Martins', 'Uberlandia', ''),
('38408311', 'Avenida Joao Naves de Avila', 'Segismundo Pereira', 'Uberlandia', ''),
('69921290', 'Travessa 3 de Julho', 'Alto Alegre', 'Rio Branco', 'AC');

-- --------------------------------------------------------

--
-- Table structure for table `Contato`
--

CREATE TABLE `Contato` (
  `nomeCliente` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailCliente` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motivoContato` enum('RECLAMACAO','SUGESTAO','ELOGIO','DUVIDA') COLLATE utf8mb4_unicode_ci NOT NULL,
  `mensagemContato` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Contato`
--

INSERT INTO `Contato` (`nomeCliente`, `emailCliente`, `motivoContato`, `mensagemContato`) VALUES
('Cleonice Souza Andrade', 'andrasouzc@hotimeiu.com', 'ELOGIO', 'Clinica muito bonita.\r\n'),
('Matilda Oliveira Fagundes', 'matildaoliiv@iarru.com.br', 'DUVIDA', 'Gostaria de saber a localização da clinica');

-- --------------------------------------------------------

--
-- Table structure for table `EnderecoFuncionario`
--

CREATE TABLE `EnderecoFuncionario` (
  `idFuncionario` int(11) NOT NULL,
  `CEP` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logradouroEndFunc` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numeroEndFunc` int(11) NOT NULL,
  `complementoEndFunc` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipoLogradouroEndFunc` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairroEndFunc` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidadeEndFunc` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estadoEndFunc` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `EnderecoFuncionario`
--

INSERT INTO `EnderecoFuncionario` (`idFuncionario`, `CEP`, `logradouroEndFunc`, `numeroEndFunc`, `complementoEndFunc`, `tipoLogradouroEndFunc`, `bairroEndFunc`, `cidadeEndFunc`, `estadoEndFunc`) VALUES
(1, '38408008', 'Teste 1', 123, 'Ap 808', 'Rua', 'Santa Monica', 'Uberlandia', 'MG'),
(2, '38408265', 'Teste 2', 345, '', 'Avenida', 'Santa Maria', 'Uberlandia', 'MG');

-- --------------------------------------------------------

--
-- Table structure for table `Funcionario`
--

CREATE TABLE `Funcionario` (
  `idFunc` int(11) NOT NULL,
  `nomeFunc` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dataNascFunc` date NOT NULL,
  `sexoFunc` enum('M','F') COLLATE utf8mb4_unicode_ci NOT NULL,
  `estadoCivilFunc` enum('SOLTEIRO','CASADO','DIVORCIADO','VIUVO') COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargoFunc` enum('MEDICO','ENFERMEIRO','SECRETARIO','OUTRO') COLLATE utf8mb4_unicode_ci NOT NULL,
  `especialidadeFunc` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `CPF` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `RG` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `docsFunc` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Funcionario`
--

INSERT INTO `Funcionario` (`idFunc`, `nomeFunc`, `dataNascFunc`, `sexoFunc`, `estadoCivilFunc`, `cargoFunc`, `especialidadeFunc`, `CPF`, `RG`, `docsFunc`) VALUES
(1, 'Leopoldo', '1990-11-18', 'M', 'SOLTEIRO', 'MEDICO', 'oftalmologista', '34135841201', '123456789', NULL),
(2, 'Carlos Rodrigues', '1982-02-25', 'M', 'DIVORCIADO', 'MEDICO', 'otorrinolaringologista', '67453906717', '14892897', NULL),
(3, 'Luiza', '1988-06-06', 'F', 'CASADO', 'MEDICO', 'pediatra', '03511175046', '5464624', NULL),
(4, 'Ana Laura', '1974-08-10', 'F', 'SOLTEIRO', 'SECRETARIO', NULL, '77666030800', '1124152', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Paciente`
--

CREATE TABLE `Paciente` (
  `codigoPac` int(11) NOT NULL,
  `nomePac` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telPac` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Paciente`
--

INSERT INTO `Paciente` (`codigoPac`, `nomePac`, `telPac`) VALUES
(1, 'Frederico', '999998888'),
(2, 'Braz', '999998888'),
(3, 'Borges', '999998888'),
(4, 'João da Silva Sauro', '34999999999'),
(5, 'Joaquina da Silva Sauro', '34989898989'),
(6, 'Jhon Doe', '55777777888'),
(7, 'Jane Doe', '55777898989'),
(8, 'Arnoldo Suasineguer', '3598653265');

-- --------------------------------------------------------

--
-- Table structure for table `Usuario`
--

CREATE TABLE `Usuario` (
  `username` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Usuario`
--

INSERT INTO `Usuario` (`username`, `password`) VALUES
('borges@cleanic.com', 'borges'),
('Borgezito', 'borgezito'),
('braz@cleanic.com', 'braz'),
('fred@cleanic.com', 'fred');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Agenda`
--
ALTER TABLE `Agenda`
  ADD PRIMARY KEY (`codAgendamento`),
  ADD UNIQUE KEY `dataAgendamento` (`dataAgendamento`,`horaAgendamento`,`codFuncionario`),
  ADD KEY `codPacienteFK` (`codPaciente`) USING BTREE,
  ADD KEY `idFuncFK` (`codFuncionario`);

--
-- Indexes for table `CEP`
--
ALTER TABLE `CEP`
  ADD PRIMARY KEY (`CEP`);

--
-- Indexes for table `Contato`
--
ALTER TABLE `Contato`
  ADD PRIMARY KEY (`nomeCliente`);

--
-- Indexes for table `EnderecoFuncionario`
--
ALTER TABLE `EnderecoFuncionario`
  ADD PRIMARY KEY (`idFuncionario`);

--
-- Indexes for table `Funcionario`
--
ALTER TABLE `Funcionario`
  ADD PRIMARY KEY (`idFunc`);

--
-- Indexes for table `Paciente`
--
ALTER TABLE `Paciente`
  ADD PRIMARY KEY (`codigoPac`);

--
-- Indexes for table `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Agenda`
--
ALTER TABLE `Agenda`
  MODIFY `codAgendamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Funcionario`
--
ALTER TABLE `Funcionario`
  MODIFY `idFunc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `Paciente`
--
ALTER TABLE `Paciente`
  MODIFY `codigoPac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Agenda`
--
ALTER TABLE `Agenda`
  ADD CONSTRAINT `idFuncFK` FOREIGN KEY (`codFuncionario`) REFERENCES `Funcionario` (`idFunc`),
  ADD CONSTRAINT `idPacienteFK` FOREIGN KEY (`codPaciente`) REFERENCES `Paciente` (`codigoPac`);

--
-- Constraints for table `EnderecoFuncionario`
--
ALTER TABLE `EnderecoFuncionario`
  ADD CONSTRAINT `codFuncionarioEndFK` FOREIGN KEY (`idFuncionario`) REFERENCES `Funcionario` (`idFunc`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
