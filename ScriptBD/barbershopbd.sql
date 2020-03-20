-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Tempo de geração: 20-Mar-2020 às 19:31
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
  `idProprietario` int(11) NOT NULL,
  `dataAgendamento` date NOT NULL,
  `horário` time NOT NULL,
  `procedimento` varchar(45) NOT NULL,
  `funcionario` varchar(45) NOT NULL,
  `idFuncionario` int(11) NOT NULL,
  `idServicos` int(11) NOT NULL,
  PRIMARY KEY (`idAgendamento`),
  KEY `idProprietarioFK` (`idProprietario`),
  KEY `idFuncionarioFK` (`idFuncionario`) USING BTREE,
  KEY `idServicosFK` (`idServicos`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `telefone` int(11) NOT NULL,
  `email_cliente` varchar(255) NOT NULL,
  `senha_cliente` varchar(32) NOT NULL,
  PRIMARY KEY (`idCliente`),
  KEY `idProprietarioFK` (`idProprietario`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO `tb_cliente` (`idCliente`, `idProprietario`, `nome`, `telefone`, `email_cliente`, `senha_cliente`) VALUES
(40, 3, 'Erick Rodrigues', 2147483647, 'erick@gmail.com', '202cb962ac59075b964b07152d234b70');

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
  `idFinancas` int(11) NOT NULL AUTO_INCREMENT,
  `salarios` double NOT NULL,
  `lucros` double NOT NULL,
  `gastos` double NOT NULL,
  `idGastos` int(11) NOT NULL,
  `idAgendamento` int(11) NOT NULL,
  `idProprietario` int(11) NOT NULL,
  PRIMARY KEY (`idFinancas`),
  KEY `idAgendamentoFK` (`idAgendamento`),
  KEY `idProprietarioFK` (`idProprietario`),
  KEY `idGastosFK` (`idGastos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_funcionario`
--

DROP TABLE IF EXISTS `tb_funcionario`;
CREATE TABLE IF NOT EXISTS `tb_funcionario` (
  `idFuncionario` int(11) NOT NULL AUTO_INCREMENT,
  `idProprietario` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `rg` varchar(9) NOT NULL,
  `cpf` int(11) NOT NULL,
  `dataNascimento` date NOT NULL,
  `telefone` int(11) NOT NULL,
  `salario` double NOT NULL,
  `email_funcionario` varchar(255) NOT NULL,
  `senha_funcionario` varchar(20) NOT NULL,
  PRIMARY KEY (`idFuncionario`),
  KEY `idProprietarioFK` (`idProprietario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_funcionario`
--

INSERT INTO `tb_funcionario` (`idFuncionario`, `idProprietario`, `nome`, `rg`, `cpf`, `dataNascimento`, `telefone`, `salario`, `email_funcionario`, `senha_funcionario`) VALUES
(8, 3, 'Erick', '052098478', 123, '1999-02-20', 2147483647, 0, 'erick@gmail.com', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_gastos`
--

DROP TABLE IF EXISTS `tb_gastos`;
CREATE TABLE IF NOT EXISTS `tb_gastos` (
  `idGastos` int(11) NOT NULL AUTO_INCREMENT,
  `idFuncionario` int(11) NOT NULL,
  `gastosVariaveis` double NOT NULL,
  `gastosFixos` double NOT NULL,
  `idProprietario` int(11) NOT NULL,
  PRIMARY KEY (`idGastos`),
  KEY `idProprietarioFK` (`idProprietario`) USING BTREE,
  KEY `idFuncionarioFK` (`idFuncionario`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_agendamento`
--
ALTER TABLE `tb_agendamento`
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
-- Limitadores para a tabela `tb_financas`
--
ALTER TABLE `tb_financas`
  ADD CONSTRAINT `idAgendamentoFkFinancas` FOREIGN KEY (`idAgendamento`) REFERENCES `tb_agendamento` (`idAgendamento`),
  ADD CONSTRAINT `idGastosFkFinancas` FOREIGN KEY (`idGastos`) REFERENCES `tb_gastos` (`idGastos`),
  ADD CONSTRAINT `idProprietarioFkFinancas` FOREIGN KEY (`idProprietario`) REFERENCES `tb_proprietario` (`idProprietario`);

--
-- Limitadores para a tabela `tb_funcionario`
--
ALTER TABLE `tb_funcionario`
  ADD CONSTRAINT `idProprietarioFkFuncionario` FOREIGN KEY (`idProprietario`) REFERENCES `tb_proprietario` (`idProprietario`);

--
-- Limitadores para a tabela `tb_gastos`
--
ALTER TABLE `tb_gastos`
  ADD CONSTRAINT `idFuncionarioFkGastos` FOREIGN KEY (`idFuncionario`) REFERENCES `tb_funcionario` (`idFuncionario`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `idProprietarioFkGastos` FOREIGN KEY (`idProprietario`) REFERENCES `tb_proprietario` (`idProprietario`);

--
-- Limitadores para a tabela `tb_servicos`
--
ALTER TABLE `tb_servicos`
  ADD CONSTRAINT `idProprietarioFkServicos` FOREIGN KEY (`idProprietario`) REFERENCES `tb_proprietario` (`idProprietario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
