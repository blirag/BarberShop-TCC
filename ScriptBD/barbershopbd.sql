-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Tempo de geração: 04-Maio-2020 às 23:17
-- Versão do servidor: 8.0.18
-- versão do PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `barbershopbd`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_agendamento`
--

DROP TABLE IF EXISTS `tb_agendamento`;
CREATE TABLE IF NOT EXISTS `tb_agendamento` (
  `idAgendamento` int(11) NOT NULL AUTO_INCREMENT,
  `idProprietario` int(11) DEFAULT NULL,
  `dataAgendamento` date NOT NULL,
  `horaInicio` time NOT NULL,
  `procedimento` varchar(45) NOT NULL,
  `funcionario` varchar(45) NOT NULL,
  `idFuncionario` int(11) DEFAULT NULL,
  `idServicos` int(11) DEFAULT NULL,
  `horaFim` time NOT NULL,
  `valor` double NOT NULL,
  `idCliente` int(11) NOT NULL,
  `situacao` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idAgendamento`),
  KEY `idProprietarioFK` (`idProprietario`),
  KEY `idFuncionarioFK` (`idFuncionario`) USING BTREE,
  KEY `idServicosFK` (`idServicos`) USING BTREE,
  KEY `idClienteFK` (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_agendamento`
--

INSERT INTO `tb_agendamento` (`idAgendamento`, `idProprietario`, `dataAgendamento`, `horaInicio`, `procedimento`, `funcionario`, `idFuncionario`, `idServicos`, `horaFim`, `valor`, `idCliente`, `situacao`) VALUES
(13, 3, '2020-04-29', '10:30:00', 'BARBA COMPLETA', 'Marcos', NULL, NULL, '11:15:00', 0, 40, NULL),
(14, 3, '2020-04-30', '10:30:00', 'CABELO SIMPLES', 'Beatriz Lira', NULL, NULL, '11:05:00', 32, 40, NULL),
(15, 3, '2020-04-30', '17:00:00', 'CABELO E BARBA COMPLETO', 'Beatriz Lira', NULL, NULL, '18:15:00', 70, 40, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_certificacoes`
--

DROP TABLE IF EXISTS `tb_certificacoes`;
CREATE TABLE IF NOT EXISTS `tb_certificacoes` (
  `idCertificacoes` int(11) NOT NULL AUTO_INCREMENT,
  `cursos` varchar(100) NOT NULL,
  PRIMARY KEY (`idCertificacoes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

DROP TABLE IF EXISTS `tb_cliente`;
CREATE TABLE IF NOT EXISTS `tb_cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `idProprietario` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `telefone` bigint(11) NOT NULL,
  `email_cliente` varchar(255) NOT NULL,
  `senha_cliente` varchar(32) NOT NULL,
  PRIMARY KEY (`idCliente`),
  KEY `idProprietarioFK` (`idProprietario`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO `tb_cliente` (`idCliente`, `idProprietario`, `nome`, `telefone`, `email_cliente`, `senha_cliente`) VALUES
(40, 3, 'Erick Rodrigues', 2147483647, 'erick@gmail.com', '202cb962ac59075b964b07152d234b70'),
(41, 3, 'Beatriz Lira ', 11988141970, 'beatrizliragonzaga@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_endereco`
--

DROP TABLE IF EXISTS `tb_endereco`;
CREATE TABLE IF NOT EXISTS `tb_endereco` (
  `idEndereco` int(11) NOT NULL AUTO_INCREMENT,
  `idFuncionario` int(11) NOT NULL,
  `cep` int(11) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` varchar(255) NOT NULL,
  PRIMARY KEY (`idEndereco`),
  KEY `idFuncionarioFK` (`idFuncionario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_financas`
--

DROP TABLE IF EXISTS `tb_financas`;
CREATE TABLE IF NOT EXISTS `tb_financas` (
  `idFinancas` double NOT NULL AUTO_INCREMENT,
  `salarios` double NOT NULL,
  `gastosfixos` double NOT NULL,
  `gastosvariaveis` double NOT NULL,
  `lucroservicos` double NOT NULL,
  `lucrototal` double NOT NULL,
  `mes` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idFinancas`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_financas`
--

INSERT INTO `tb_financas` (`idFinancas`, `salarios`, `gastosfixos`, `gastosvariaveis`, `lucroservicos`, `lucrototal`, `mes`) VALUES
(5, 3500.98, 2290, 114.99, 102, 5803.97, '4'),
(7, 3500.98, 2290, 114.99, 102, -5803.97, '5');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_funcionario`
--

DROP TABLE IF EXISTS `tb_funcionario`;
CREATE TABLE IF NOT EXISTS `tb_funcionario` (
  `idFuncionario` int(11) NOT NULL AUTO_INCREMENT,
  `idProprietario` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `rg` varchar(10) NOT NULL,
  `cpf` bigint(11) NOT NULL,
  `dataNascimento` date NOT NULL,
  `telefone` bigint(11) NOT NULL,
  `salario` double NOT NULL,
  `email_funcionario` varchar(255) NOT NULL,
  `senha_funcionario` varchar(32) NOT NULL,
  PRIMARY KEY (`idFuncionario`),
  KEY `idProprietarioFK` (`idProprietario`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_funcionario`
--

INSERT INTO `tb_funcionario` (`idFuncionario`, `idProprietario`, `nome`, `rg`, `cpf`, `dataNascimento`, `telefone`, `salario`, `email_funcionario`, `senha_funcionario`) VALUES
(10, 3, 'Beatriz Lira ', '541528853', 48806709879, '1998-01-18', 11988141970, 2000.99, 'beatriz@gmail.com', '202cb962ac59075b964b07152d234b70'),
(11, 3, 'Marcos', '152435593', 42206715989, '1980-03-20', 11963087264, 1499.99, 'marcos@gmail.com', '74be16979710d4c4e7c6647856088456');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_gastosfixos`
--

DROP TABLE IF EXISTS `tb_gastosfixos`;
CREATE TABLE IF NOT EXISTS `tb_gastosfixos` (
  `idGastosFixos` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `valor` double NOT NULL,
  PRIMARY KEY (`idGastosFixos`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_gastosfixos`
--

INSERT INTO `tb_gastosfixos` (`idGastosFixos`, `tipo`, `valor`) VALUES
(1, 'Aluguel', 1500),
(2, 'Água', 300),
(3, 'Luz', 300),
(4, 'Internet', 190);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_gastosvariaveis`
--

DROP TABLE IF EXISTS `tb_gastosvariaveis`;
CREATE TABLE IF NOT EXISTS `tb_gastosvariaveis` (
  `idGastosVariaveis` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `valor` double NOT NULL,
  PRIMARY KEY (`idGastosVariaveis`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_gastosvariaveis`
--

INSERT INTO `tb_gastosvariaveis` (`idGastosVariaveis`, `tipo`, `valor`) VALUES
(1, 'Kit Tesoura', 114.99);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_lucros`
--

DROP TABLE IF EXISTS `tb_lucros`;
CREATE TABLE IF NOT EXISTS `tb_lucros` (
  `idLucros` int(11) NOT NULL AUTO_INCREMENT,
  `valor` double NOT NULL,
  PRIMARY KEY (`idLucros`)
) ENGINE=MyISAM AUTO_INCREMENT=148 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `tb_lucros`
--

INSERT INTO `tb_lucros` (`idLucros`, `valor`) VALUES
(6, 70),
(5, 32),
(7, 0),
(8, 0),
(9, 0),
(10, 0),
(11, 0),
(12, 0),
(13, 0),
(14, 0),
(15, 0),
(16, 0),
(17, 0),
(18, 0),
(19, 0),
(20, 0),
(21, 0),
(22, 0),
(23, 0),
(24, 0),
(25, 0),
(26, 0),
(27, 0),
(28, 0),
(29, 0),
(30, 0),
(31, 0),
(32, 0),
(33, 0),
(34, 0),
(35, 0),
(36, 0),
(37, 0),
(38, 0),
(39, 0),
(40, 0),
(41, 0),
(42, 32),
(43, 0),
(44, 0),
(45, 0),
(46, 0),
(47, 0),
(48, 0),
(49, 0),
(50, 0),
(51, 0),
(52, 0),
(53, 0),
(54, 0),
(55, 0),
(56, 0),
(57, 0),
(58, 0),
(59, 0),
(60, 0),
(61, 0),
(62, 0),
(63, 0),
(64, 0),
(65, 0),
(66, 0),
(67, 0),
(68, 0),
(69, 0),
(70, 0),
(71, 0),
(72, 0),
(73, 0),
(74, 0),
(75, 0),
(76, 0),
(77, 0),
(78, 0),
(79, 0),
(80, 0),
(81, 0),
(82, 0),
(83, 0),
(84, 0),
(85, 0),
(86, 0),
(87, 0),
(88, 0),
(89, 0),
(90, 0),
(91, 0),
(92, 0),
(93, 0),
(94, 0),
(95, 0),
(96, 0),
(97, 0),
(98, 0),
(99, 0),
(100, 0),
(101, 0),
(102, 0),
(103, 0),
(104, 0),
(105, 0),
(106, 0),
(107, 0),
(108, 0),
(109, 0),
(110, 0),
(111, 0),
(112, 0),
(113, 0),
(114, 0),
(115, 0),
(116, 0),
(117, 0),
(118, 0),
(119, 0),
(120, 0),
(121, 0),
(122, 0),
(123, 0),
(124, 0),
(125, 0),
(126, 0),
(127, 0),
(128, 0),
(129, 0),
(130, 0),
(131, 0),
(132, 0),
(133, 0),
(134, 0),
(135, 0),
(136, 0),
(137, 0),
(138, 0),
(139, 0),
(140, 0),
(141, 0),
(142, 0),
(143, 0),
(144, 0),
(145, 0),
(146, 0),
(147, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_proprietario`
--

DROP TABLE IF EXISTS `tb_proprietario`;
CREATE TABLE IF NOT EXISTS `tb_proprietario` (
  `idProprietario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `email_proprietario` varchar(255) NOT NULL,
  `senha_proprietario` varchar(32) NOT NULL,
  PRIMARY KEY (`idProprietario`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_proprietario`
--

INSERT INTO `tb_proprietario` (`idProprietario`, `nome`, `email_proprietario`, `senha_proprietario`) VALUES
(3, 'Junior', 'juniorlima@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_servicos`
--

DROP TABLE IF EXISTS `tb_servicos`;
CREATE TABLE IF NOT EXISTS `tb_servicos` (
  `idServicos` int(11) NOT NULL AUTO_INCREMENT,
  `idProprietario` int(11) NOT NULL,
  `tempo` time NOT NULL,
  `valor` double NOT NULL,
  `procedimento` varchar(45) NOT NULL,
  PRIMARY KEY (`idServicos`),
  KEY `idProprietarioFK` (`idProprietario`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_servicos`
--

INSERT INTO `tb_servicos` (`idServicos`, `idProprietario`, `tempo`, `valor`, `procedimento`) VALUES
(7, 3, '00:20:00', 32, 'CABELO SIMPLES'),
(8, 3, '00:20:00', 22, 'BARBA SIMPLES'),
(9, 3, '00:30:00', 45, 'CABELO COMPLETO'),
(10, 3, '00:30:00', 35, 'BARBA COMPLETA'),
(11, 3, '00:40:00', 47, 'CABELO E BARBA SIMPLES'),
(12, 3, '01:00:00', 70, 'CABELO E BARBA COMPLETO');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_agendamento`
--
ALTER TABLE `tb_agendamento`
  ADD CONSTRAINT `idClienteFKAgendamento` FOREIGN KEY (`idCliente`) REFERENCES `tb_cliente` (`idCliente`),
  ADD CONSTRAINT `idFuncionarioFkAgendamento` FOREIGN KEY (`idFuncionario`) REFERENCES `tb_funcionario` (`idFuncionario`),
  ADD CONSTRAINT `idProprietarioFkAgendamento` FOREIGN KEY (`idProprietario`) REFERENCES `tb_proprietario` (`idProprietario`),
  ADD CONSTRAINT `idServicosFkAgendamento` FOREIGN KEY (`idServicos`) REFERENCES `tb_servicos` (`idServicos`);

--
-- Limitadores para a tabela `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD CONSTRAINT `idProprietarioFkCliente` FOREIGN KEY (`idProprietario`) REFERENCES `tb_proprietario` (`idProprietario`);

--
-- Limitadores para a tabela `tb_endereco`
--
ALTER TABLE `tb_endereco`
  ADD CONSTRAINT `idFuncionarioFkEnderecco` FOREIGN KEY (`idFuncionario`) REFERENCES `tb_funcionario` (`idFuncionario`);

--
-- Limitadores para a tabela `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  ADD CONSTRAINT `idProprietarioFkFuncionario` FOREIGN KEY (`idProprietario`) REFERENCES `tb_proprietario` (`idProprietario`);

--
-- Limitadores para a tabela `tb_servicos`
--
ALTER TABLE `tb_servicos`
  ADD CONSTRAINT `idProprietarioFkServicos` FOREIGN KEY (`idProprietario`) REFERENCES `tb_proprietario` (`idProprietario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
