-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 26/04/2024 às 17:21
-- Versão do servidor: 8.2.0
-- Versão do PHP: 8.2.13

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
-- Estrutura para tabela `carros`
--

DROP TABLE IF EXISTS `carros`;
CREATE TABLE IF NOT EXISTS `carros` (
  `id` int NOT NULL AUTO_INCREMENT,
  `modelo` varchar(50) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `renavam` varchar(15) NOT NULL,
  `ano` year NOT NULL,
  `cor` varchar(10) NOT NULL,
  `combustivel` varchar(15) NOT NULL,
  `vagas` int NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `carros`
--

INSERT INTO `carros` (`id`, `modelo`, `placa`, `renavam`, `ano`, `cor`, `combustivel`, `vagas`, `created`, `modified`) VALUES
(2, 'CLASSIC', 'LRP 1075', '10203040', '2015', 'PRETA', 'GASOLINA', 4, '2016-08-11 11:24:46', NULL),
(3, 'Cronos', 'LRP 0010', '10203040', '2023', 'Prata', 'FLEX', 4, '0000-00-00 00:00:00', NULL),
(4, 'Onix Sedan', 'HZN 0011', '10203040', '2022', 'Prata', 'FLEX', 4, '0000-00-00 00:00:00', NULL),
(5, 'Virtus', 'HXN 0012', '10203040', '2021', 'Branco', 'Gasolina', 4, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `hospitais`
--

DROP TABLE IF EXISTS `hospitais`;
CREATE TABLE IF NOT EXISTS `hospitais` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `numero` int NOT NULL,
  `bairro` varchar(60) NOT NULL,
  `cep` varchar(10) NOT NULL,
  `cidade` varchar(220) NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `hospitais`
--

INSERT INTO `hospitais` (`id`, `nome`, `endereco`, `numero`, `bairro`, `cep`, `cidade`, `telefone`, `created`) VALUES
(1, 'Hospital de Cantagalo', 'PraÃ§a Miguel Santos', 1, 'Centro', '28.500-000', '', '', '0000-00-00 00:00:00'),
(2, 'Hospital de Cordeiro', 'Rua Antonio Castro', 10, 'Centro', '28.540-000', '', '', '0000-00-00 00:00:00'),
(3, 'Hospital Nova Friburgo', 'Rua Olindina Ferreira da Cunha Silva', 130, 'Conjunto Uberaba', '28605-030', '(22)99814-1030', 'Belo Horizont', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `motoristas`
--

DROP TABLE IF EXISTS `motoristas`;
CREATE TABLE IF NOT EXISTS `motoristas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `motoristas`
--

INSERT INTO `motoristas` (`id`, `nome`, `telefone`, `created`, `modified`) VALUES
(1, 'Schmoo', '22 98140-8025 ', '2016-08-02 16:55:00', NULL),
(2, 'Jones', '22 98140-8025', '0000-00-00 00:00:00', NULL),
(3, 'João', '22 98140-8025', '0000-00-00 00:00:00', NULL),
(4, 'André', '22 98140-8025', '0000-00-00 00:00:00', NULL),
(6, 'Walace1', '22 2555-4192', '0000-00-00 00:00:00', NULL);

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
  `id_situacao` int NOT NULL,
  `id_unidade_usf` int NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_situacao` (`id_situacao`),
  KEY `id_unidade_usf` (`id_unidade_usf`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `pacientes`
--

INSERT INTO `pacientes` (`id`, `nome`, `rg`, `cpf`, `cns`, `celular`, `endereco`, `numero`, `bairro`, `cidade`, `cep`, `id_situacao`, `id_unidade_usf`, `created`) VALUES
(60, 'Ana Maria Almeida', '117914666', '25461146970', '994257171030001', '343848262', 'Rua Olindina Ferreira da Cunha Silva', '153', 'Centro', 'Belo Horizonte', '28605-03', 2, 12, '0000-00-00 00:00:00'),
(61, 'Ana Maria Almeida', '117914666', '25461146970', '994257171030001', '343848262', 'Rua Olindina Ferreira da Cunha Silva', '12', 'Conjunto Uberaba', 'Rio de Janeiro', '38073153', 1, 11, '0000-00-00 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `unidades`
--

INSERT INTO `unidades` (`id`, `nome_usf`, `created`, `modified`) VALUES
(5, 'Unidade Guaraní', '0000-00-00 00:00:00', NULL),
(9, 'Unidade Bradesco Saúde', '2024-04-21 13:18:30', NULL),
(11, 'Unidade Saude Colombia', '2024-04-21 16:02:24', NULL),
(12, 'Unidade Brasilia', '2024-04-23 21:25:10', NULL),
(13, 'Unidade São Cristovao', '2024-04-25 18:32:56', NULL);

--
-- Restrições para tabelas despejadas
--

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
