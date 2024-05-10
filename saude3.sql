-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 10/05/2024 às 18:22
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
-- Estrutura para tabela `acompanhantes`
--

DROP TABLE IF EXISTS `acompanhantes`;
CREATE TABLE IF NOT EXISTS `acompanhantes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_acompanhante` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rg` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `embarque` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `referencia` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `acompanhantes` (`id`, `nome_acompanhante`, `rg`, `cpf`, `endereco`, `numero`, `bairro`, `cidade`, `cep`, `embarque`, `referencia`, `id_situacao`, `celular`, `created`, `modified`) VALUES
(1, 'Nikola Tesla Frauches Filho', '12345678910', '25461146970', 'Oscar', '', 'Conjunto Uberaba', 'Belo Horizonte', '28605-030', 'Rodoviaria10', 'Padaria Pop Pão1', 1, '', '2024-05-10 10:21:44', '2024-05-10 10:21:44');

-- --------------------------------------------------------

--
-- Estrutura para tabela `carros`
--

DROP TABLE IF EXISTS `carros`;
CREATE TABLE IF NOT EXISTS `carros` (
  `id` int NOT NULL AUTO_INCREMENT,
  `modelo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placa` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `renavam` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ano` year NOT NULL,
  `cor` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `combustivel` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vagas` int NOT NULL,
  `tipo_carro` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data_vencimento` date DEFAULT NULL,
  `id_seguradora` int NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_seguradora` (`id_seguradora`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `carros`
--

INSERT INTO `carros` (`id`, `modelo`, `placa`, `renavam`, `ano`, `cor`, `combustivel`, `vagas`, `tipo_carro`, `marca`, `data_vencimento`, `id_seguradora`, `created`, `modified`) VALUES
(21, 'virtus', 'KNY-4328', '0001112234', '2011', 'Prata', 'Flex', 4, 'Hacth', 'Fiat', '0000-00-00', 6, '0000-00-00 00:00:00', '2024-05-08 21:41:18'),
(22, 'Gol', 'KNY-4328', '0001112234', '2011', 'Preto', 'Flex', 4, 'Hacth', 'Volk', '2024-05-30', 4, '0000-00-00 00:00:00', '2024-05-08 21:41:04'),
(23, 'Uno way', 'KNY-4328', '0001112234', '2003', 'Prata', 'Flex', 4, 'Hacth', 'Fiat', '2024-05-30', 6, '0000-00-00 00:00:00', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `especialidades`
--

DROP TABLE IF EXISTS `especialidades`;
CREATE TABLE IF NOT EXISTS `especialidades` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `especialidades`
--

INSERT INTO `especialidades` (`id`, `nome`, `created`, `modified`) VALUES
(2, 'Cardiologia', '2016-08-09 15:36:51', NULL),
(4, 'Pediatra', '2024-05-09 17:12:12', '2024-05-09 17:12:12');

-- --------------------------------------------------------

--
-- Estrutura para tabela `hospitais`
--

DROP TABLE IF EXISTS `hospitais`;
CREATE TABLE IF NOT EXISTS `hospitais` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_hospital` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` int NOT NULL,
  `bairro` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(220) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_especialidade` int NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_especialidade` (`id_especialidade`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `hospitais`
--

INSERT INTO `hospitais` (`id`, `nome_hospital`, `endereco`, `numero`, `bairro`, `cep`, `cidade`, `telefone`, `id_especialidade`, `created`, `modified`) VALUES
(1, 'Pio XII', 'Rua Olindina Ferreira da Cunha Silva', 153, 'Centro', '28605-030', 'Nova Friburgo', '22 2555-4192', 4, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `motoristas`
--

DROP TABLE IF EXISTS `motoristas`;
CREATE TABLE IF NOT EXISTS `motoristas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_motorista` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `motoristas`
--

INSERT INTO `motoristas` (`id`, `nome_motorista`, `telefone`, `created`, `modified`) VALUES
(1, 'Roberto Carlos Almeida', '22 2555-4192', '2024-05-10 08:19:18', '2024-05-10 10:25:00');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
CREATE TABLE IF NOT EXISTS `pacientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_paciente` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rg` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cns` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bairro` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cidade` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `cep` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `embarque` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `referencia` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_situacao` int NOT NULL,
  `id_unidade_usf` int NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_situacao` (`id_situacao`),
  KEY `id_unidade_usf` (`id_unidade_usf`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `pacientes`
--

INSERT INTO `pacientes` (`id`, `nome_paciente`, `rg`, `cpf`, `cns`, `celular`, `endereco`, `numero`, `bairro`, `cidade`, `cep`, `embarque`, `referencia`, `id_situacao`, `id_unidade_usf`, `created`, `modified`) VALUES
(1, 'Ana Maria Almeida', '117914666', '12345678910', '994257171030001', '123456789', 'Oscar', '153', 'Centro', 'Nova Friburgo', '12345678', 'Rodoviaria Progressoa', 'Padaria', 1, 15, '2024-05-10 10:20:57', '2024-05-10 10:20:57');

-- --------------------------------------------------------

--
-- Estrutura para tabela `seguradoras`
--

DROP TABLE IF EXISTS `seguradoras`;
CREATE TABLE IF NOT EXISTS `seguradoras` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` int NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `seguradoras`
--

INSERT INTO `seguradoras` (`id`, `nome`, `telefone`, `created`, `modified`) VALUES
(1, 'Porto Seguro Cia', 2147483647, '2024-05-02 15:23:24', NULL),
(2, 'Gente Seguradora', 2147483647, '2024-05-02 15:23:24', NULL),
(3, 'Porto Seguro', 2147483647, '0000-00-00 00:00:00', NULL),
(4, 'Porto Seguro Azul', 2147483647, '0000-00-00 00:00:00', NULL),
(6, 'Tokio ', 98389378, '0000-00-00 00:00:00', NULL);

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

-- --------------------------------------------------------

--
-- Estrutura para tabela `viagens`
--

DROP TABLE IF EXISTS `viagens`;
CREATE TABLE IF NOT EXISTS `viagens` (
  `id` int NOT NULL AUTO_INCREMENT,
  `local_viagem` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `destino` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hora_saida` time NOT NULL,
  `data_viagem` date NOT NULL,
  `id_carro` int NOT NULL,
  `id_motorista` int NOT NULL,
  `id_paciente` int NOT NULL,
  `id_acompanhante` int NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_acompanhante` (`id_acompanhante`),
  KEY `id_carro` (`id_carro`),
  KEY `id_motorista` (`id_motorista`),
  KEY `id_paciente` (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `viagens`
--

INSERT INTO `viagens` (`id`, `local_viagem`, `destino`, `hora_saida`, `data_viagem`, `id_carro`, `id_motorista`, `id_paciente`, `id_acompanhante`, `created`) VALUES
(1, 'Rio de janeiro', ' Inst. cerebro 08:horas', '03:20:13', '2024-04-01', 22, 1, 1, 1, '2024-05-09 14:23:33');

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `acompanhantes`
--
ALTER TABLE `acompanhantes`
  ADD CONSTRAINT `acompanhantes_ibfk_1` FOREIGN KEY (`id_situacao`) REFERENCES `situacoes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `carros`
--
ALTER TABLE `carros`
  ADD CONSTRAINT `carros_ibfk_1` FOREIGN KEY (`id_seguradora`) REFERENCES `seguradoras` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `hospitais`
--
ALTER TABLE `hospitais`
  ADD CONSTRAINT `hospitais_ibfk_1` FOREIGN KEY (`id_especialidade`) REFERENCES `especialidades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`id_situacao`) REFERENCES `situacoes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pacientes_ibfk_2` FOREIGN KEY (`id_unidade_usf`) REFERENCES `unidades` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `viagens`
--
ALTER TABLE `viagens`
  ADD CONSTRAINT `viagens_ibfk_1` FOREIGN KEY (`id_acompanhante`) REFERENCES `acompanhantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `viagens_ibfk_2` FOREIGN KEY (`id_carro`) REFERENCES `carros` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `viagens_ibfk_3` FOREIGN KEY (`id_motorista`) REFERENCES `motoristas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `viagens_ibfk_4` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
