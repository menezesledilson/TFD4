-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 04/05/2024 às 16:31
-- Versão do servidor: 8.3.0
-- Versão do PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `saude3`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `acompanhantes`
--

DROP TABLE IF EXISTS `acompanhantes`;
CREATE TABLE IF NOT EXISTS `acompanhantes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rg` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `embarque` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referencia` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_situacao` int NOT NULL,
  `celular` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_situacao` (`id_situacao`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `acompanhantes`
--

INSERT INTO `acompanhantes` (`id`, `nome`, `rg`, `cpf`, `endereco`, `numero`, `bairro`, `cidade`, `cep`, `embarque`, `referencia`, `id_situacao`, `celular`, `created`, `modified`) VALUES
(1, 'Jones Silva Frauches', '22334455667', '', '', '', '', '', '', 'Rodoviaria10', 'Padaria', 1, '', '2024-05-04 10:57:31', '2024-05-04 10:57:39'),
(2, 'Jones', '', '', '', '', '', '', '', 'Rodoviaria', 'Padaria Pop Pão', 1, '', '2024-05-04 11:03:23', '2024-05-04 11:03:23'),
(3, 'Jones Silva Frauches', '', '', '', '', '', '', '', 'Rodoviaria Progressoa', 'Padaria Pop Pão', 2, '', '2024-05-04 12:54:32', '2024-05-04 12:54:45');

-- --------------------------------------------------------

--
-- Estrutura para tabela `diarias`
--

DROP TABLE IF EXISTS `diarias`;
CREATE TABLE IF NOT EXISTS `diarias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `diaria` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `diarias`
--

INSERT INTO `diarias` (`id`, `diaria`, `created`, `modified`) VALUES
(1, 'Diaria de alimenta', '2016-08-09 16:32:21', '2016-08-09 16:32:41'),
(6, 'Diaria de alimenta', '0000-00-00 00:00:00', NULL),
(7, 'Diaria de alimenta', '0000-00-00 00:00:00', NULL),
(9, 'Diaria de alimenta', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `hospitais`
--

DROP TABLE IF EXISTS `hospitais`;
CREATE TABLE IF NOT EXISTS `hospitais` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` int NOT NULL,
  `bairro` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `hospitais`
--

INSERT INTO `hospitais` (`id`, `nome`, `endereco`, `numero`, `bairro`, `cep`, `cidade`, `telefone`, `created`, `modified`) VALUES
(1, 'Hospital de Cantagalo', 'Praça Miguel Santos', 1, 'Centro', '28.500-000', '', '', '0000-00-00 00:00:00', NULL),
(4, 'Hospital de Cordeiro', 'Rua Olindina Ferreira da Cunha Silva', 25, 'Baixada', '28605-030', 'Paran', '32123456789', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `motoristas`
--

DROP TABLE IF EXISTS `motoristas`;
CREATE TABLE IF NOT EXISTS `motoristas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `motoristas`
--

INSERT INTO `motoristas` (`id`, `nome`, `telefone`, `created`, `modified`) VALUES
(1, 'Schmoo', '22 98140-8025 ', '2016-08-02 16:55:00', NULL),
(2, 'Jones', '22 98140-8025', '0000-00-00 00:00:00', NULL),
(7, 'Jones', '32123456789', '0000-00-00 00:00:00', NULL),
(9, 'Jones Silva', '32123456789', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
CREATE TABLE IF NOT EXISTS `pacientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rg` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cns` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `embarque` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referencia` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_situacao` int NOT NULL,
  `id_unidade_usf` int NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_situacao` (`id_situacao`),
  KEY `id_unidade_usf` (`id_unidade_usf`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `pacientes`
--

INSERT INTO `pacientes` (`id`, `nome`, `rg`, `cpf`, `cns`, `celular`, `endereco`, `numero`, `bairro`, `cidade`, `cep`, `embarque`, `referencia`, `id_situacao`, `id_unidade_usf`, `created`, `modified`) VALUES
(1, 'Ana Maria Almeida', '117914666', '12345678910', '994257171030001', '123456789', 'Rua Olindina Ferreira da Cunha Silva', '153', 'Centro', 'Nova Friburgo', '28605-03', '', NULL, 1, 15, '0000-00-00 00:00:00', NULL),
(2, 'Ledilson Menezes', '123456', '1234567', '994257171030001', '123456789', 'Oscar', '12', 'Centro', 'Pirape', '12345678', '', NULL, 1, 15, '0000-00-00 00:00:00', NULL),
(3, 'Jones Silva Frauches', '', '', '', '', '', '', '', '', '', '', NULL, 1, 15, '0000-00-00 00:00:00', NULL),
(4, 'Jones Silva Frauches', '', '', '', '', '', '', '', '', '', 'Rodoviaria', 'Padaria Pop Pão', 1, 5, '2024-05-04 13:20:05', '2024-05-04 13:30:55');

-- --------------------------------------------------------

--
-- Estrutura para tabela `situacoes`
--

DROP TABLE IF EXISTS `situacoes`;
CREATE TABLE IF NOT EXISTS `situacoes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_situacao` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `situacoes`
--

INSERT INTO `situacoes` (`id`, `nome_situacao`, `created`, `modified`) VALUES
(1, 'Ativo', '2024-04-12 12:20:10', NULL),
(2, 'Inativo', '2024-04-12 13:56:45', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `unidades`
--

DROP TABLE IF EXISTS `unidades`;
CREATE TABLE IF NOT EXISTS `unidades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_usf` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `unidades`
--

INSERT INTO `unidades` (`id`, `nome_usf`, `created`, `modified`) VALUES
(5, 'Unidade Guaraní', '0000-00-00 00:00:00', NULL),
(9, 'Unidade Bradesco Saúde', '2024-04-21 13:18:30', NULL),
(11, 'Unidade Saude Colombia', '2024-04-21 16:02:24', NULL),
(14, 'Unidade Unimed Brasil 2', '2024-04-30 13:59:56', NULL),
(15, 'Unidade Unimed Filial Campinas2', '2024-04-30 14:00:30', NULL);

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `acompanhantes`
--
ALTER TABLE `acompanhantes`
  ADD CONSTRAINT `acompanhantes_ibfk_1` FOREIGN KEY (`id_situacao`) REFERENCES `situacoes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`id_situacao`) REFERENCES `situacoes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pacientes_ibfk_2` FOREIGN KEY (`id_unidade_usf`) REFERENCES `unidades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
