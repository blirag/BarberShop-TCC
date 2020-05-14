-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Tempo de geração: 12-Maio-2020 às 22:26
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
