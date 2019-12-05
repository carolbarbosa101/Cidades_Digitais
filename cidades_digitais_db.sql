-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05-Dez-2019 às 21:20
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `cidades_digitais_db`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `assunto`
--

CREATE TABLE `assunto` (
  `cod_assunto` int(11) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `assunto`
--

INSERT INTO `assunto` (`cod_assunto`, `descricao`) VALUES
(3, 'O mal sucumbira ante a minha presenca'),
(4, 'Todo aquele que venera o mal ha de penar'),
(5, 'Quando o poder do Lanterna Verde enfrentar!'),
(6, '-----'),
(7, 'Meu alegre coracao palpita'),
(8, 'Por um universo de esperanca'),
(9, 'Me de a mao a magia nos espera'),
(10, 'Vou te amar por toda minha vida'),
(11, 'Vem comigo por este caminho'),
(12, 'Me de a mao pra fugir'),
(18, 'Malz, apaguei o errado...\'XD');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `cod_categoria` int(11) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`cod_categoria`, `descricao`) VALUES
(1, 'PEAS'),
(2, 'PAP'),
(3, 'PAG'),
(4, 'PCG'),
(5, 'PER'),
(6, 'APG'),
(7, 'CCA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cd`
--

CREATE TABLE `cd` (
  `cod_ibge` int(7) NOT NULL,
  `cod_lote` int(11) NOT NULL,
  `os_pe` varchar(10) DEFAULT NULL,
  `data_pe` date DEFAULT NULL,
  `os_imp` varchar(10) DEFAULT NULL,
  `data_imp` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cd`
--

INSERT INTO `cd` (`cod_ibge`, `cod_lote`, `os_pe`, `data_pe`, `os_imp`, `data_imp`) VALUES
(1100015, 5, 'Ordem1', '2019-11-27', 'Ordem1', '2019-11-13'),
(2100600, 3, 'ORDEM1', '2019-12-19', 'ORDEM2', '2019-12-26'),
(3129509, 4, 'asdasdssd', '0000-00-00', 'sdfghsfd', '0000-00-00'),
(5458566, 3, 'ORDEM2', '2019-11-12', 'ORDEM2', '2019-11-14'),
(8474555, 1, 'ORDEM3', '2019-11-13', 'ORDEM4', '2020-11-13');

--
-- Acionadores `cd`
--
DELIMITER $$
CREATE TRIGGER `insere_cd_itens` AFTER INSERT ON `cd` FOR EACH ROW BEGIN
insert into cd_itens (cod_ibge, cod_item, cod_tipo_item) (select cd.cod_ibge, itens.cod_item, itens.cod_tipo_item from cd, itens
where cd.cod_ibge = (select last_insert_id(new.cod_ibge)));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cd_itens`
--

CREATE TABLE `cd_itens` (
  `cod_ibge` int(7) NOT NULL,
  `cod_item` int(11) NOT NULL,
  `cod_tipo_item` int(11) NOT NULL,
  `quantidade_previsto` int(11) DEFAULT NULL,
  `quantidade_projeto_executivo` int(11) DEFAULT NULL,
  `quantidade_termo_instalacao` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cd_itens`
--

INSERT INTO `cd_itens` (`cod_ibge`, `cod_item`, `cod_tipo_item`, `quantidade_previsto`, `quantidade_projeto_executivo`, `quantidade_termo_instalacao`) VALUES
(1100015, 1, 1, 2147483647, 2147483647, 2147483647),
(1100015, 1, 2, NULL, NULL, NULL),
(1100015, 1, 3, NULL, NULL, NULL),
(1100015, 1, 4, NULL, NULL, NULL),
(1100015, 1, 5, NULL, NULL, NULL),
(1100015, 1, 6, NULL, NULL, NULL),
(1100015, 1, 7, NULL, NULL, NULL),
(1100015, 1, 8, NULL, NULL, NULL),
(1100015, 1, 9, NULL, NULL, NULL),
(1100015, 1, 10, NULL, NULL, NULL),
(1100015, 1, 11, NULL, NULL, NULL),
(1100015, 1, 12, NULL, NULL, NULL),
(1100015, 1, 13, NULL, NULL, NULL),
(1100015, 2, 1, NULL, NULL, NULL),
(1100015, 2, 2, NULL, NULL, NULL),
(1100015, 2, 3, NULL, NULL, NULL),
(1100015, 2, 4, NULL, NULL, NULL),
(1100015, 2, 5, NULL, NULL, NULL),
(1100015, 2, 6, NULL, NULL, NULL),
(1100015, 2, 7, NULL, NULL, NULL),
(1100015, 2, 8, NULL, NULL, NULL),
(1100015, 2, 9, NULL, NULL, NULL),
(1100015, 2, 10, NULL, NULL, NULL),
(1100015, 2, 11, NULL, NULL, NULL),
(1100015, 3, 1, NULL, NULL, NULL),
(1100015, 3, 2, NULL, NULL, NULL),
(1100015, 3, 3, NULL, NULL, NULL),
(1100015, 3, 4, NULL, NULL, NULL),
(1100015, 3, 5, NULL, NULL, NULL),
(1100015, 3, 8, NULL, NULL, NULL),
(1100015, 3, 9, NULL, NULL, NULL),
(1100015, 3, 10, NULL, NULL, NULL),
(1100015, 4, 1, NULL, NULL, NULL),
(1100015, 4, 2, NULL, NULL, NULL),
(1100015, 4, 3, NULL, NULL, NULL),
(1100015, 4, 4, NULL, NULL, NULL),
(1100015, 4, 5, NULL, NULL, NULL),
(1100015, 4, 8, NULL, NULL, NULL),
(1100015, 4, 9, NULL, NULL, NULL),
(1100015, 4, 10, NULL, NULL, NULL),
(1100015, 5, 1, NULL, NULL, NULL),
(1100015, 5, 2, NULL, NULL, NULL),
(1100015, 5, 3, NULL, NULL, NULL),
(1100015, 5, 4, NULL, NULL, NULL),
(1100015, 5, 5, NULL, NULL, NULL),
(1100015, 5, 8, NULL, NULL, NULL),
(1100015, 5, 9, NULL, NULL, NULL),
(1100015, 5, 10, NULL, NULL, NULL),
(1100015, 6, 1, NULL, NULL, NULL),
(1100015, 6, 2, NULL, NULL, NULL),
(1100015, 6, 3, NULL, NULL, NULL),
(1100015, 6, 4, NULL, NULL, NULL),
(1100015, 6, 5, NULL, NULL, NULL),
(1100015, 7, 1, NULL, NULL, NULL),
(1100015, 7, 2, NULL, NULL, NULL),
(1100015, 7, 3, NULL, NULL, NULL),
(1100015, 7, 4, NULL, NULL, NULL),
(1100015, 7, 5, NULL, NULL, NULL),
(1100015, 8, 1, NULL, NULL, NULL),
(1100015, 8, 3, NULL, NULL, NULL),
(1100015, 9, 1, NULL, NULL, NULL),
(1100015, 9, 3, NULL, NULL, NULL),
(1100015, 10, 1, NULL, NULL, NULL),
(1100015, 10, 3, NULL, NULL, NULL),
(1100015, 11, 1, NULL, NULL, NULL),
(1100015, 11, 3, NULL, NULL, NULL),
(1100015, 12, 1, NULL, NULL, NULL),
(1100015, 12, 3, NULL, NULL, NULL),
(1100015, 13, 1, NULL, NULL, NULL),
(1100015, 13, 3, NULL, NULL, NULL),
(1100015, 14, 1, NULL, NULL, NULL),
(1100015, 15, 1, NULL, NULL, NULL),
(1100015, 16, 1, NULL, NULL, NULL),
(1100015, 17, 1, NULL, NULL, NULL),
(2100600, 1, 1, NULL, NULL, NULL),
(2100600, 1, 2, NULL, NULL, NULL),
(2100600, 1, 3, NULL, NULL, NULL),
(2100600, 1, 4, NULL, NULL, NULL),
(2100600, 1, 5, NULL, NULL, NULL),
(2100600, 1, 6, NULL, NULL, NULL),
(2100600, 1, 7, NULL, NULL, NULL),
(2100600, 1, 8, NULL, NULL, NULL),
(2100600, 1, 9, NULL, NULL, NULL),
(2100600, 1, 10, NULL, NULL, NULL),
(2100600, 1, 11, NULL, NULL, NULL),
(2100600, 1, 12, NULL, NULL, NULL),
(2100600, 1, 13, NULL, NULL, NULL),
(2100600, 2, 1, NULL, NULL, NULL),
(2100600, 2, 2, NULL, NULL, NULL),
(2100600, 2, 3, NULL, NULL, NULL),
(2100600, 2, 4, NULL, NULL, NULL),
(2100600, 2, 5, NULL, NULL, NULL),
(2100600, 2, 6, NULL, NULL, NULL),
(2100600, 2, 7, NULL, NULL, NULL),
(2100600, 2, 8, NULL, NULL, NULL),
(2100600, 2, 9, NULL, NULL, NULL),
(2100600, 2, 10, NULL, NULL, NULL),
(2100600, 2, 11, NULL, NULL, NULL),
(2100600, 3, 1, NULL, NULL, NULL),
(2100600, 3, 2, NULL, NULL, NULL),
(2100600, 3, 3, NULL, NULL, NULL),
(2100600, 3, 4, NULL, NULL, NULL),
(2100600, 3, 5, NULL, NULL, NULL),
(2100600, 3, 8, NULL, NULL, NULL),
(2100600, 3, 9, NULL, NULL, NULL),
(2100600, 3, 10, NULL, NULL, NULL),
(2100600, 4, 1, NULL, NULL, NULL),
(2100600, 4, 2, NULL, NULL, NULL),
(2100600, 4, 3, NULL, NULL, NULL),
(2100600, 4, 4, NULL, NULL, NULL),
(2100600, 4, 5, NULL, NULL, NULL),
(2100600, 4, 8, NULL, NULL, NULL),
(2100600, 4, 9, NULL, NULL, NULL),
(2100600, 4, 10, NULL, NULL, NULL),
(2100600, 5, 1, NULL, NULL, NULL),
(2100600, 5, 2, NULL, NULL, NULL),
(2100600, 5, 3, NULL, NULL, NULL),
(2100600, 5, 4, NULL, NULL, NULL),
(2100600, 5, 5, NULL, NULL, NULL),
(2100600, 5, 8, NULL, NULL, NULL),
(2100600, 5, 9, NULL, NULL, NULL),
(2100600, 5, 10, NULL, NULL, NULL),
(2100600, 6, 1, NULL, NULL, NULL),
(2100600, 6, 2, NULL, NULL, NULL),
(2100600, 6, 3, NULL, NULL, NULL),
(2100600, 6, 4, NULL, NULL, NULL),
(2100600, 6, 5, NULL, NULL, NULL),
(2100600, 7, 1, NULL, NULL, NULL),
(2100600, 7, 2, NULL, NULL, NULL),
(2100600, 7, 3, NULL, NULL, NULL),
(2100600, 7, 4, NULL, NULL, NULL),
(2100600, 7, 5, NULL, NULL, NULL),
(2100600, 8, 1, NULL, NULL, NULL),
(2100600, 8, 3, NULL, NULL, NULL),
(2100600, 9, 1, NULL, NULL, NULL),
(2100600, 9, 3, NULL, NULL, NULL),
(2100600, 10, 1, NULL, NULL, NULL),
(2100600, 10, 3, NULL, NULL, NULL),
(2100600, 11, 1, NULL, NULL, NULL),
(2100600, 11, 3, NULL, NULL, NULL),
(2100600, 12, 1, NULL, NULL, NULL),
(2100600, 12, 3, NULL, NULL, NULL),
(2100600, 13, 1, NULL, NULL, NULL),
(2100600, 13, 3, NULL, NULL, NULL),
(2100600, 14, 1, NULL, NULL, NULL),
(2100600, 15, 1, NULL, NULL, NULL),
(2100600, 16, 1, NULL, NULL, NULL),
(2100600, 17, 1, NULL, NULL, NULL),
(3129509, 1, 1, NULL, NULL, NULL),
(3129509, 1, 2, NULL, NULL, NULL),
(3129509, 1, 3, NULL, NULL, NULL),
(3129509, 1, 4, NULL, NULL, NULL),
(3129509, 1, 5, NULL, NULL, NULL),
(3129509, 1, 6, NULL, NULL, NULL),
(3129509, 1, 7, NULL, NULL, NULL),
(3129509, 1, 8, NULL, NULL, NULL),
(3129509, 1, 9, NULL, NULL, NULL),
(3129509, 1, 10, NULL, NULL, NULL),
(3129509, 1, 11, NULL, NULL, NULL),
(3129509, 1, 12, NULL, NULL, NULL),
(3129509, 1, 13, NULL, NULL, NULL),
(3129509, 2, 1, NULL, NULL, NULL),
(3129509, 2, 2, NULL, NULL, NULL),
(3129509, 2, 3, NULL, NULL, NULL),
(3129509, 2, 4, NULL, NULL, NULL),
(3129509, 2, 5, NULL, NULL, NULL),
(3129509, 2, 6, NULL, NULL, NULL),
(3129509, 2, 7, NULL, NULL, NULL),
(3129509, 2, 8, NULL, NULL, NULL),
(3129509, 2, 9, NULL, NULL, NULL),
(3129509, 2, 10, NULL, NULL, NULL),
(3129509, 2, 11, NULL, NULL, NULL),
(3129509, 3, 1, NULL, NULL, NULL),
(3129509, 3, 2, NULL, NULL, NULL),
(3129509, 3, 3, NULL, NULL, NULL),
(3129509, 3, 4, NULL, NULL, NULL),
(3129509, 3, 5, NULL, NULL, NULL),
(3129509, 3, 8, NULL, NULL, NULL),
(3129509, 3, 9, NULL, NULL, NULL),
(3129509, 3, 10, NULL, NULL, NULL),
(3129509, 4, 1, NULL, NULL, NULL),
(3129509, 4, 2, NULL, NULL, NULL),
(3129509, 4, 3, NULL, NULL, NULL),
(3129509, 4, 4, NULL, NULL, NULL),
(3129509, 4, 5, NULL, NULL, NULL),
(3129509, 4, 8, NULL, NULL, NULL),
(3129509, 4, 9, NULL, NULL, NULL),
(3129509, 4, 10, NULL, NULL, NULL),
(3129509, 5, 1, NULL, NULL, NULL),
(3129509, 5, 2, NULL, NULL, NULL),
(3129509, 5, 3, NULL, NULL, NULL),
(3129509, 5, 4, NULL, NULL, NULL),
(3129509, 5, 5, NULL, NULL, NULL),
(3129509, 5, 8, NULL, NULL, NULL),
(3129509, 5, 9, NULL, NULL, NULL),
(3129509, 5, 10, NULL, NULL, NULL),
(3129509, 6, 1, NULL, NULL, NULL),
(3129509, 6, 2, NULL, NULL, NULL),
(3129509, 6, 3, NULL, NULL, NULL),
(3129509, 6, 4, NULL, NULL, NULL),
(3129509, 6, 5, NULL, NULL, NULL),
(3129509, 7, 1, NULL, NULL, NULL),
(3129509, 7, 2, NULL, NULL, NULL),
(3129509, 7, 3, NULL, NULL, NULL),
(3129509, 7, 4, NULL, NULL, NULL),
(3129509, 7, 5, NULL, NULL, NULL),
(3129509, 8, 1, NULL, NULL, NULL),
(3129509, 8, 3, NULL, NULL, NULL),
(3129509, 9, 1, NULL, NULL, NULL),
(3129509, 9, 3, NULL, NULL, NULL),
(3129509, 10, 1, NULL, NULL, NULL),
(3129509, 10, 3, NULL, NULL, NULL),
(3129509, 11, 1, NULL, NULL, NULL),
(3129509, 11, 3, NULL, NULL, NULL),
(3129509, 12, 1, NULL, NULL, NULL),
(3129509, 12, 3, NULL, NULL, NULL),
(3129509, 13, 1, NULL, NULL, NULL),
(3129509, 13, 3, NULL, NULL, NULL),
(3129509, 14, 1, NULL, NULL, NULL),
(3129509, 15, 1, NULL, NULL, NULL),
(3129509, 16, 1, NULL, NULL, NULL),
(3129509, 17, 1, NULL, NULL, NULL),
(5458566, 1, 1, NULL, NULL, NULL),
(5458566, 1, 2, NULL, NULL, NULL),
(5458566, 1, 3, NULL, NULL, NULL),
(5458566, 1, 4, NULL, NULL, NULL),
(5458566, 1, 5, NULL, NULL, NULL),
(5458566, 1, 6, NULL, NULL, NULL),
(5458566, 1, 7, NULL, NULL, NULL),
(5458566, 1, 8, NULL, NULL, NULL),
(5458566, 1, 9, NULL, NULL, NULL),
(5458566, 1, 10, NULL, NULL, NULL),
(5458566, 1, 11, NULL, NULL, NULL),
(5458566, 1, 12, NULL, NULL, NULL),
(5458566, 1, 13, NULL, NULL, NULL),
(5458566, 2, 1, NULL, NULL, NULL),
(5458566, 2, 2, NULL, NULL, NULL),
(5458566, 2, 3, NULL, NULL, NULL),
(5458566, 2, 4, NULL, NULL, NULL),
(5458566, 2, 5, NULL, NULL, NULL),
(5458566, 2, 6, NULL, NULL, NULL),
(5458566, 2, 7, NULL, NULL, NULL),
(5458566, 2, 8, NULL, NULL, NULL),
(5458566, 2, 9, NULL, NULL, NULL),
(5458566, 2, 10, NULL, NULL, NULL),
(5458566, 2, 11, NULL, NULL, NULL),
(5458566, 3, 1, NULL, NULL, NULL),
(5458566, 3, 2, NULL, NULL, NULL),
(5458566, 3, 3, NULL, NULL, NULL),
(5458566, 3, 4, NULL, NULL, NULL),
(5458566, 3, 5, NULL, NULL, NULL),
(5458566, 3, 8, NULL, NULL, NULL),
(5458566, 3, 9, NULL, NULL, NULL),
(5458566, 3, 10, NULL, NULL, NULL),
(5458566, 4, 1, NULL, NULL, NULL),
(5458566, 4, 2, NULL, NULL, NULL),
(5458566, 4, 3, NULL, NULL, NULL),
(5458566, 4, 4, NULL, NULL, NULL),
(5458566, 4, 5, NULL, NULL, NULL),
(5458566, 4, 8, NULL, NULL, NULL),
(5458566, 4, 9, NULL, NULL, NULL),
(5458566, 4, 10, NULL, NULL, NULL),
(5458566, 5, 1, NULL, NULL, NULL),
(5458566, 5, 2, NULL, NULL, NULL),
(5458566, 5, 3, NULL, NULL, NULL),
(5458566, 5, 4, NULL, NULL, NULL),
(5458566, 5, 5, NULL, NULL, NULL),
(5458566, 5, 8, NULL, NULL, NULL),
(5458566, 5, 9, NULL, NULL, NULL),
(5458566, 5, 10, NULL, NULL, NULL),
(5458566, 6, 1, NULL, NULL, NULL),
(5458566, 6, 2, NULL, NULL, NULL),
(5458566, 6, 3, NULL, NULL, NULL),
(5458566, 6, 4, NULL, NULL, NULL),
(5458566, 6, 5, NULL, NULL, NULL),
(5458566, 7, 1, NULL, NULL, NULL),
(5458566, 7, 2, NULL, NULL, NULL),
(5458566, 7, 3, NULL, NULL, NULL),
(5458566, 7, 4, NULL, NULL, NULL),
(5458566, 7, 5, NULL, NULL, NULL),
(5458566, 8, 1, NULL, NULL, NULL),
(5458566, 8, 3, NULL, NULL, NULL),
(5458566, 9, 1, NULL, NULL, NULL),
(5458566, 9, 3, NULL, NULL, NULL),
(5458566, 10, 1, NULL, NULL, NULL),
(5458566, 10, 3, NULL, NULL, NULL),
(5458566, 11, 1, NULL, NULL, NULL),
(5458566, 11, 3, NULL, NULL, NULL),
(5458566, 12, 1, NULL, NULL, NULL),
(5458566, 12, 3, NULL, NULL, NULL),
(5458566, 13, 1, NULL, NULL, NULL),
(5458566, 13, 3, NULL, NULL, NULL),
(5458566, 14, 1, NULL, NULL, NULL),
(5458566, 15, 1, NULL, NULL, NULL),
(5458566, 16, 1, NULL, NULL, NULL),
(5458566, 17, 1, NULL, NULL, NULL),
(8474555, 1, 1, NULL, NULL, NULL),
(8474555, 1, 2, NULL, NULL, NULL),
(8474555, 1, 3, NULL, NULL, NULL),
(8474555, 1, 4, NULL, NULL, NULL),
(8474555, 1, 5, NULL, NULL, NULL),
(8474555, 1, 6, NULL, NULL, NULL),
(8474555, 1, 7, NULL, NULL, NULL),
(8474555, 1, 8, NULL, NULL, NULL),
(8474555, 1, 9, NULL, NULL, NULL),
(8474555, 1, 10, NULL, NULL, NULL),
(8474555, 1, 11, NULL, NULL, NULL),
(8474555, 1, 12, NULL, NULL, NULL),
(8474555, 1, 13, NULL, NULL, NULL),
(8474555, 2, 1, NULL, NULL, NULL),
(8474555, 2, 2, NULL, NULL, NULL),
(8474555, 2, 3, NULL, NULL, NULL),
(8474555, 2, 4, NULL, NULL, NULL),
(8474555, 2, 5, NULL, NULL, NULL),
(8474555, 2, 6, NULL, NULL, NULL),
(8474555, 2, 7, NULL, NULL, NULL),
(8474555, 2, 8, NULL, NULL, NULL),
(8474555, 2, 9, NULL, NULL, NULL),
(8474555, 2, 10, NULL, NULL, NULL),
(8474555, 2, 11, NULL, NULL, NULL),
(8474555, 3, 1, NULL, NULL, NULL),
(8474555, 3, 2, NULL, NULL, NULL),
(8474555, 3, 3, NULL, NULL, NULL),
(8474555, 3, 4, NULL, NULL, NULL),
(8474555, 3, 5, NULL, NULL, NULL),
(8474555, 3, 8, NULL, NULL, NULL),
(8474555, 3, 9, NULL, NULL, NULL),
(8474555, 3, 10, NULL, NULL, NULL),
(8474555, 4, 1, NULL, NULL, NULL),
(8474555, 4, 2, NULL, NULL, NULL),
(8474555, 4, 3, NULL, NULL, NULL),
(8474555, 4, 4, NULL, NULL, NULL),
(8474555, 4, 5, NULL, NULL, NULL),
(8474555, 4, 8, NULL, NULL, NULL),
(8474555, 4, 9, NULL, NULL, NULL),
(8474555, 4, 10, NULL, NULL, NULL),
(8474555, 5, 1, NULL, NULL, NULL),
(8474555, 5, 2, NULL, NULL, NULL),
(8474555, 5, 3, NULL, NULL, NULL),
(8474555, 5, 4, NULL, NULL, NULL),
(8474555, 5, 5, NULL, NULL, NULL),
(8474555, 5, 8, NULL, NULL, NULL),
(8474555, 5, 9, NULL, NULL, NULL),
(8474555, 5, 10, NULL, NULL, NULL),
(8474555, 6, 1, NULL, NULL, NULL),
(8474555, 6, 2, NULL, NULL, NULL),
(8474555, 6, 3, NULL, NULL, NULL),
(8474555, 6, 4, NULL, NULL, NULL),
(8474555, 6, 5, NULL, NULL, NULL),
(8474555, 7, 1, NULL, NULL, NULL),
(8474555, 7, 2, NULL, NULL, NULL),
(8474555, 7, 3, NULL, NULL, NULL),
(8474555, 7, 4, NULL, NULL, NULL),
(8474555, 7, 5, NULL, NULL, NULL),
(8474555, 8, 1, NULL, NULL, NULL),
(8474555, 8, 3, NULL, NULL, NULL),
(8474555, 9, 1, NULL, NULL, NULL),
(8474555, 9, 3, NULL, NULL, NULL),
(8474555, 10, 1, NULL, NULL, NULL),
(8474555, 10, 3, NULL, NULL, NULL),
(8474555, 11, 1, NULL, NULL, NULL),
(8474555, 11, 3, NULL, NULL, NULL),
(8474555, 12, 1, NULL, NULL, NULL),
(8474555, 12, 3, NULL, NULL, NULL),
(8474555, 13, 1, NULL, NULL, NULL),
(8474555, 13, 3, NULL, NULL, NULL),
(8474555, 14, 1, NULL, NULL, NULL),
(8474555, 15, 1, NULL, NULL, NULL),
(8474555, 16, 1, NULL, NULL, NULL),
(8474555, 17, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `classe_empenho`
--

CREATE TABLE `classe_empenho` (
  `cod_classe_empenho` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `classe_empenho`
--

INSERT INTO `classe_empenho` (`cod_classe_empenho`, `descricao`) VALUES
(6, 'APARELHOS E EQUIPAMENTOS DE COMUNICAÇAO'),
(16, 'MANUTENÇÃO E CONSERVAÇÃO DE BENS'),
(17, 'MANUTENÇÃO E CONSERVAÇÃO DE MÁQUINAS'),
(27, 'SUPORTE DE INFRAESTRUTURA DE TI'),
(30, 'MAQUINAS E EQUIPAMENTOS ENERGETICOS'),
(35, 'EQUIPAMENTOS DE PROCESSAMENTO DE DADOS'),
(48, 'SERVIÇOS DE SELEÇÃO E TREINAMENTO'),
(57, 'SERVIÇOS TECNICOS PROFISSIONAIS'),
(58, 'SERVIÇOS TÉCNICOS PROFISSIONAIS'),
(59, 'SERVIÇOS TÉCNICOS PROFISSIONAIS'),
(87, 'MATERIAL DE CONSUMO DE USO DURÁVEL'),
(91, 'OBRAS EM ANDAMENTO'),
(92, 'OBRAS EM ANDAMENTO'),
(93, 'AQUISIÇÃO DE SOFTWARE'),
(95, 'MANUT. CONS. EQUIP. DE PROCESSAMENTO DE DADOS');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `cod_contato` int(11) NOT NULL,
  `cnpj` varchar(14) DEFAULT NULL,
  `cod_ibge` int(7) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `funcao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`cod_contato`, `cnpj`, `cod_ibge`, `nome`, `email`, `funcao`) VALUES
(1, NULL, NULL, 'JULINHA', 'JULINHA@GMAIL.COM', 'ESTAGIARIA'),
(2, '74144867000157', NULL, 'JOAO', 'JOAO@GMAIL.COM', 'ESTAGIARIO'),
(3, NULL, 5458566, 'MARIAZINHA', 'MARIA@GMAIL.COM', 'ESTAGIARIO'),
(4, '44488493000139', 8474555, 'DONALD TRUMP', 'DONALD@GMAIL.COM', 'PRESIDENTE EUA'),
(5, '99979314000100', 1100015, 'BOLSONARO', 'BOLSONARO@GMAIL.COM', 'PRESIDENTE BR'),
(7, '64479314000100', 5458566, 'LULA MOLUSCO', 'LULA@GMAIL.COM', 'LADRAO'),
(8, '12379314000100', 5458566, 'Gerisvaldinho', 'gerisvaldoprapresidente@hil.com', 'Imperador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empenho`
--

CREATE TABLE `empenho` (
  `cod_empenho` varchar(13) NOT NULL,
  `cod_previsao_empenho` int(11) NOT NULL,
  `data` datetime DEFAULT NULL,
  `contador` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `empenho`
--

INSERT INTO `empenho` (`cod_empenho`, `cod_previsao_empenho`, `data`, `contador`) VALUES
('14752', 2, '2019-12-12 08:08:00', NULL),
('TESTE', 2, '2019-12-05 19:17:40', NULL);

--
-- Acionadores `empenho`
--
DELIMITER $$
CREATE TRIGGER `insere_itens_empenho` AFTER INSERT ON `empenho` FOR EACH ROW BEGIN
insert into itens_empenho (cod_empenho, cod_item, cod_tipo_item, cod_previsao_empenho, valor) 
(select empenho.cod_empenho, itens_previsao_empenho.cod_item, itens_previsao_empenho.cod_tipo_item, empenho.cod_previsao_empenho, itens_previsao_empenho.valor
from empenho
inner join previsao_empenho on (empenho.cod_previsao_empenho = previsao_empenho.cod_previsao_empenho)
inner join itens_previsao_empenho on (previsao_empenho.cod_previsao_empenho = itens_previsao_empenho.cod_previsao_empenho)
where empenho.cod_empenho = (select last_insert_id(new.cod_empenho)));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `entidade`
--

CREATE TABLE `entidade` (
  `cnpj` char(14) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `nome_municipio` varchar(50) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `observacao` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `entidade`
--

INSERT INTO `entidade` (`cnpj`, `nome`, `endereco`, `numero`, `bairro`, `cep`, `nome_municipio`, `uf`, `observacao`) VALUES
('12379314000100', 'Entidade5', 'qne 12, lote 11', NULL, '', '', '', 'SC', 'NENHUMA'),
('44488493000139', 'Entidade 7', NULL, NULL, NULL, NULL, NULL, 'SP', 'NENHUMA'),
('60288493000139', 'Entidade 3', 'QNE', NULL, '', '', '', 'TO', 'NENHUMA'),
('64479314000100', 'Entidade 1', 'RUA', '14', NULL, NULL, NULL, 'DF', 'NENHUMA'),
('74144867000157', 'Entidade 2', NULL, NULL, NULL, NULL, NULL, 'MG', 'NENHUMA'),
('88879314000100', 'Entidade 6', NULL, NULL, NULL, NULL, NULL, 'RJ', 'NENHUMA'),
('99979314000100', 'Entidade 4', NULL, NULL, NULL, NULL, NULL, 'RG', 'NENHUMA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `etapa`
--

CREATE TABLE `etapa` (
  `cod_etapa` int(11) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  `duracao` int(11) DEFAULT NULL,
  `depende` int(11) DEFAULT NULL,
  `delay` int(11) DEFAULT NULL,
  `setor_resp` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `etapas_cd`
--

CREATE TABLE `etapas_cd` (
  `cod_ibge` int(7) NOT NULL,
  `cod_etapa` int(11) NOT NULL,
  `dt_inicio` datetime DEFAULT NULL,
  `dt_fim` datetime DEFAULT NULL,
  `responsavel` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `fatura`
--

CREATE TABLE `fatura` (
  `num_nf` int(11) NOT NULL,
  `cod_ibge` int(7) NOT NULL,
  `dt_nf` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fatura`
--

INSERT INTO `fatura` (`num_nf`, `cod_ibge`, `dt_nf`) VALUES
(147852, 1100015, '2019-11-12');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fatura_otb`
--

CREATE TABLE `fatura_otb` (
  `cod_otb` int(11) NOT NULL,
  `num_nf` int(11) NOT NULL,
  `cod_ibge` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Acionadores `fatura_otb`
--
DELIMITER $$
CREATE TRIGGER `insere_itens_otb` AFTER INSERT ON `fatura_otb` FOR EACH ROW BEGIN
	insert into itens_otb (cod_otb, num_nf, cod_empenho, cod_item, cod_tipo_item,  valor, quantidade) 
    (select fatura_otb.cod_otb, fatura_otb.num_nf, itens_fatura.cod_empenho, itens_fatura.cod_item, itens_fatura.cod_tipo_item, itens_fatura.valor, itens_fatura.quantidade
    from fatura_otb
    inner join itens_fatura on (fatura_otb.num_nf = itens_fatura.num_nf)
    where itens_fatura.num_nf = (select last_insert_id(new.num_nf)) and fatura_otb.cod_otb = (select last_insert_id(new.cod_otb)));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens`
--

CREATE TABLE `itens` (
  `cod_item` int(11) NOT NULL,
  `cod_tipo_item` int(11) NOT NULL,
  `cod_natureza_despesa` int(11) NOT NULL,
  `cod_classe_empenho` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `unidade` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `itens`
--

INSERT INTO `itens` (`cod_item`, `cod_tipo_item`, `cod_natureza_despesa`, `cod_classe_empenho`, `descricao`, `unidade`) VALUES
(1, 1, 449052, 35, 'Bastidor 19 com 42U de altura ', 'unidade '),
(1, 2, 449052, 35, 'Switch Metro L 2 com SFP ', 'Unidade '),
(1, 3, 449052, 35, 'Bastidor 19 com 12U de parede ', 'Unidade '),
(1, 4, 449052, 35, 'ONU - Optical Network Unit ', 'Unidade '),
(1, 5, 449052, 6, 'Wi-Fi Outdoor ', 'Unidade '),
(1, 6, 449052, 30, 'Poste de concreto (SINAPI - 5055 ) ', 'Unidade '),
(1, 7, 449052, 87, 'Cabo de Fibra Optica aerea - 48 fibras ', 'Metro '),
(1, 8, 449052, 30, 'Cabo de Fibra Optica enterrada - 48 fibras ', 'Metro '),
(1, 9, 449052, 30, 'Cabo de Fibra Optica enterrada - 48 fibras ', 'Metro '),
(1, 10, 449052, 30, 'Cabo de Fibra Optica enterrada - 48 fibras ', 'Metro '),
(1, 11, 449052, 87, 'Cabo de Fibra Optica - cabo DROP ', 'Metro '),
(1, 12, 339039, 48, 'Operacao Assistida (mensal) ', 'Unidade '),
(1, 13, 339039, 48, 'Transferencia de Tecnologia ', 'Unidade '),
(2, 1, 449052, 35, 'BEO/DIO 19 48 fibras ', 'Unidade '),
(2, 2, 449052, 35, 'Hardwares de Gerencia - DNS ', 'Unidade '),
(2, 3, 449052, 35, ' BEO/DIO 48 fibras ', 'Unidade '),
(2, 4, 449052, 35, 'Switch LAN ', 'Unidade '),
(2, 5, 449052, 6, 'ONU - Optical Network Unit - Bridge ', 'Unidade '),
(2, 6, 449039, 57, 'Instalacao ( SINAPI - 73783/009) ', 'Instalação '),
(2, 7, 449039, 57, 'Instalaca do cabo entre postes ', 'Instalação/metro '),
(2, 8, 449051, 91, 'Perfuraca de vala ', 'Perfuração/metro '),
(2, 9, 449051, 91, 'Perfuraca de vala ', 'Perfuração/metro '),
(2, 10, 449051, 91, 'Perfuraca de vala ', 'Perfuração/metro '),
(2, 11, 449039, 87, 'Perfuraca do cabo drop ', 'Instalação/metro '),
(3, 1, 449052, 35, 'Patch Panel 24 Portas ', 'Unidade '),
(3, 2, 449039, 93, 'Software de Gerencia ', 'Unidade '),
(3, 3, 449052, 35, 'OLT - Optical Line Terminal ', 'Unidade '),
(3, 4, 339039, 17, 'Instalacao de ONU ', 'Instalação '),
(3, 5, 339039, 57, 'Configuracao de equipamentos ', 'Instalação '),
(3, 8, 449052, 87, 'Tubulacoes de protecao ', 'Metro '),
(3, 9, 449052, 87, 'Tubulacoes de protecao', 'Metro '),
(3, 10, 449052, 87, 'Tubulacoes de protecao', 'Metro '),
(4, 1, 449052, 35, 'Roteador de Borda ', 'Unidade '),
(4, 2, 339039, 95, 'Instalacao do Switch Metro L2 ', 'Instalação '),
(4, 3, 449052, 17, 'CPE ', 'Unidade '),
(4, 4, 339039, 17, 'Instalacao de Switch LAN ', 'Instalação '),
(4, 5, 339039, 17, 'Instalacao do Wifi outdoor ', 'Instalação '),
(4, 8, 449051, 91, 'Instalacao de tubulacoes', 'Instalação/metro '),
(4, 9, 449051, 91, 'Instalacao de tubulacoes', 'Instalação/metro '),
(4, 10, 449051, 91, 'Instalacao de tubulacoes', 'Instalação/metro '),
(5, 1, 449052, 35, 'OLT - Optical Line Terminal ', 'Unidade '),
(5, 2, 339039, 95, 'Instalacao de Gerencias - DNS (Hardware/Software) ', 'Instalação '),
(5, 3, 449052, 35, 'Switch LAN ', 'Unidade '),
(5, 4, 339039, 16, 'Instalacao de cabeamento ', 'Instalação '),
(5, 5, 339039, 17, 'Instalacao de ONU ', 'Instalação '),
(5, 8, 449039, 57, 'Instalacao de cabos', 'Instalação/metro '),
(5, 9, 449039, 57, 'Instalacao de cabos', 'Instalação/metro '),
(5, 10, 449039, 57, 'Instalacao de cabos', 'Instalação/metro '),
(6, 1, 449052, 17, 'CPE ', 'Unidade '),
(6, 2, 339039, 16, 'Instalacao de cabeamento ', 'Instalação '),
(6, 3, 449052, 30, 'No-Break 1,0 KVA ', 'Unidade '),
(6, 4, 339039, 16, 'Instalacao fibra externa ', 'Instalação '),
(6, 5, 339039, 16, 'Instalacao de cabeamento ', 'Instalação '),
(7, 1, 449052, 35, 'Switch LAN ', 'Unidade '),
(7, 2, 339039, 16, 'Instalacao de energia (Homem-Hora) ', 'Instalação '),
(7, 3, 339039, 17, 'Instalacao do Bastidor - BEO/DIO ', 'Instalação '),
(7, 4, 339039, 16, 'Instalacao de energia ', 'Instalação '),
(7, 5, 339039, 16, 'Instalacao de Energia ', 'Instalação '),
(8, 1, 449052, 30, 'No-Break 6KVA ', 'Unidade '),
(8, 3, 339039, 17, 'Instalacao de OLT - CPE ', 'Instalação '),
(9, 1, 339039, 17, 'Instalacao do Bastidor - BEO/DIO - Patch Panel ', 'Instalação '),
(9, 3, 339039, 17, 'Instalacao de Switch LAN ', 'Instalação '),
(10, 1, 339039, 17, 'Instalacao do Roteador de Borda ', 'Instalação '),
(10, 3, 339039, 17, 'Instalacao de No-Break ', 'Instalação '),
(11, 1, 339039, 17, 'Instalacao de Switch LAN ', 'Instalação '),
(11, 3, 339039, 16, 'Instalacao de cabeamento ', 'Instalação '),
(12, 1, 339039, 17, 'Instalacao de OLT - CPE ', 'Instalação '),
(12, 3, 339039, 16, 'Instalacao fibra externa ', 'Instalação '),
(13, 1, 339039, 17, 'Instalacao de No-Break ', 'Instalação '),
(13, 3, 339039, 16, 'Instalacao de energia ', 'Instalação '),
(14, 1, 339039, 16, 'Instalacao de cabeamento ', 'Instalação '),
(15, 1, 339039, 16, 'Instalacao fibra externa ao equipamento central ', 'Instalação '),
(16, 1, 339039, 57, 'Instalacao da conexao - link internet/Roteador ', 'Instalação '),
(17, 1, 339039, 16, 'Instalacao de energia ', 'Instalação ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_empenho`
--

CREATE TABLE `itens_empenho` (
  `cod_empenho` varchar(13) NOT NULL,
  `cod_item` int(11) NOT NULL,
  `cod_tipo_item` int(11) NOT NULL,
  `cod_previsao_empenho` int(11) NOT NULL,
  `valor` decimal(12,0) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `itens_empenho`
--

INSERT INTO `itens_empenho` (`cod_empenho`, `cod_item`, `cod_tipo_item`, `cod_previsao_empenho`, `valor`, `quantidade`) VALUES
('14752', 2, 6, 2, NULL, NULL),
('14752', 2, 7, 2, NULL, NULL),
('14752', 2, 11, 2, NULL, NULL),
('14752', 3, 2, 2, '545', 1),
('14752', 5, 8, 2, NULL, NULL),
('14752', 5, 9, 2, NULL, NULL),
('14752', 5, 10, 2, NULL, NULL),
('TESTE', 2, 6, 2, NULL, NULL),
('TESTE', 2, 7, 2, NULL, NULL),
('TESTE', 2, 11, 2, NULL, NULL),
('TESTE', 3, 2, 2, NULL, NULL),
('TESTE', 5, 8, 2, NULL, NULL),
('TESTE', 5, 9, 2, NULL, NULL),
('TESTE', 5, 10, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_fatura`
--

CREATE TABLE `itens_fatura` (
  `num_nf` int(11) NOT NULL,
  `cod_ibge` int(7) NOT NULL,
  `cod_empenho` varchar(13) NOT NULL,
  `cod_item` int(11) NOT NULL,
  `cod_tipo_item` int(11) NOT NULL,
  `valor` decimal(12,0) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_otb`
--

CREATE TABLE `itens_otb` (
  `cod_otb` int(11) NOT NULL,
  `num_nf` int(11) NOT NULL,
  `cod_ibge` int(7) NOT NULL,
  `cod_empenho` varchar(13) NOT NULL,
  `cod_item` int(11) NOT NULL,
  `cod_tipo_item` int(11) NOT NULL,
  `valor` decimal(12,0) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `itens_previsao_empenho`
--

CREATE TABLE `itens_previsao_empenho` (
  `cod_previsao_empenho` int(11) NOT NULL,
  `cod_item` int(11) NOT NULL,
  `cod_tipo_item` int(11) NOT NULL,
  `cod_lote` int(11) NOT NULL,
  `valor` decimal(12,0) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `itens_previsao_empenho`
--

INSERT INTO `itens_previsao_empenho` (`cod_previsao_empenho`, `cod_item`, `cod_tipo_item`, `cod_lote`, `valor`, `quantidade`) VALUES
(2, 2, 6, 2, NULL, NULL),
(2, 2, 7, 2, NULL, NULL),
(2, 2, 11, 2, NULL, NULL),
(2, 3, 2, 2, NULL, NULL),
(2, 5, 8, 2, NULL, NULL),
(2, 5, 9, 2, NULL, NULL),
(2, 5, 10, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `log`
--

CREATE TABLE `log` (
  `cod_log` int(11) NOT NULL,
  `cod_usuario` int(11) NOT NULL,
  `data` datetime NOT NULL DEFAULT current_timestamp(),
  `nome_tabela` varchar(45) NOT NULL,
  `operacao` char(1) NOT NULL,
  `espelho` longtext DEFAULT NULL,
  `cod_int_1` int(11) DEFAULT NULL,
  `cod_int_2` int(11) DEFAULT NULL,
  `cod_int_3` int(11) DEFAULT NULL,
  `cod_int_4` int(11) DEFAULT NULL,
  `cod_int_5` int(11) DEFAULT NULL,
  `cod_data` datetime DEFAULT NULL,
  `cod_processo` char(17) DEFAULT NULL,
  `cod_cnpj` char(14) DEFAULT NULL,
  `cod_empenho` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lote`
--

CREATE TABLE `lote` (
  `cod_lote` int(11) NOT NULL,
  `cnpj` varchar(14) NOT NULL,
  `contrato` varchar(10) DEFAULT NULL,
  `dt_inicio_vig` date DEFAULT NULL,
  `dt_final_vig` date DEFAULT NULL,
  `dt_reajuste` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `lote`
--

INSERT INTO `lote` (`cod_lote`, `cnpj`, `contrato`, `dt_inicio_vig`, `dt_final_vig`, `dt_reajuste`) VALUES
(1, '64479314000100', 'A', '2017-01-01', '2020-01-01', NULL),
(2, '74144867000157', 'B', '2017-02-02', '2020-02-02', NULL),
(3, '60288493000139', 'C', '2017-02-02', '2020-02-02', NULL),
(4, '74144867000157', 'D', '2016-02-02', '2021-02-02', NULL),
(5, '64479314000100', 'EF', '2018-02-02', '2025-02-02', '0000-01-01'),
(6, '44488493000139', 'contrato88', '2019-11-01', '2049-11-09', '0000-11-17'),
(7, '99979314000100', 'teste', '2019-11-01', '2019-11-21', '0000-10-09'),
(8, '60288493000139', '363454', '2019-11-13', '2019-11-28', '0000-09-08'),
(99, '44488493000139', 'kjabhklsdf', '0099-09-09', '0088-09-09', '1970-01-01');

--
-- Acionadores `lote`
--
DELIMITER $$
CREATE TRIGGER `insere_lote_itens` AFTER INSERT ON `lote` FOR EACH ROW BEGIN
insert into lote_itens(cod_lote, cod_item, cod_tipo_item) (select lote.cod_lote, itens.cod_item, itens.cod_tipo_item from lote, itens 
where lote.cod_lote = (select last_insert_id(new.cod_lote)));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lote_itens`
--

CREATE TABLE `lote_itens` (
  `cod_lote` int(11) NOT NULL,
  `cod_item` int(11) NOT NULL,
  `cod_tipo_item` int(11) NOT NULL,
  `preco` decimal(12,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `lote_itens`
--

INSERT INTO `lote_itens` (`cod_lote`, `cod_item`, `cod_tipo_item`, `preco`) VALUES
(1, 1, 1, NULL),
(1, 1, 2, NULL),
(1, 1, 3, NULL),
(1, 1, 4, NULL),
(1, 1, 5, NULL),
(1, 1, 6, NULL),
(1, 1, 7, NULL),
(1, 1, 8, NULL),
(1, 1, 9, NULL),
(1, 1, 10, NULL),
(1, 1, 11, NULL),
(1, 1, 12, NULL),
(1, 1, 13, NULL),
(1, 2, 1, NULL),
(1, 2, 2, NULL),
(1, 2, 3, NULL),
(1, 2, 4, NULL),
(1, 2, 5, NULL),
(1, 2, 6, NULL),
(1, 2, 7, NULL),
(1, 2, 8, NULL),
(1, 2, 9, NULL),
(1, 2, 10, NULL),
(1, 2, 11, NULL),
(1, 3, 1, NULL),
(1, 3, 2, NULL),
(1, 3, 3, NULL),
(1, 3, 4, NULL),
(1, 3, 5, NULL),
(1, 3, 8, NULL),
(1, 3, 9, NULL),
(1, 3, 10, NULL),
(1, 4, 1, NULL),
(1, 4, 2, NULL),
(1, 4, 3, NULL),
(1, 4, 4, NULL),
(1, 4, 5, NULL),
(1, 4, 8, NULL),
(1, 4, 9, NULL),
(1, 4, 10, NULL),
(1, 5, 1, NULL),
(1, 5, 2, NULL),
(1, 5, 3, NULL),
(1, 5, 4, NULL),
(1, 5, 5, NULL),
(1, 5, 8, NULL),
(1, 5, 9, NULL),
(1, 5, 10, NULL),
(1, 6, 1, NULL),
(1, 6, 2, NULL),
(1, 6, 3, NULL),
(1, 6, 4, NULL),
(1, 6, 5, NULL),
(1, 7, 1, NULL),
(1, 7, 2, NULL),
(1, 7, 3, NULL),
(1, 7, 4, NULL),
(1, 7, 5, NULL),
(1, 8, 1, NULL),
(1, 8, 3, NULL),
(1, 9, 1, NULL),
(1, 9, 3, NULL),
(1, 10, 1, NULL),
(1, 10, 3, NULL),
(1, 11, 1, NULL),
(1, 11, 3, NULL),
(1, 12, 1, NULL),
(1, 12, 3, NULL),
(1, 13, 1, NULL),
(1, 13, 3, NULL),
(1, 14, 1, NULL),
(1, 15, 1, NULL),
(1, 16, 1, NULL),
(1, 17, 1, NULL),
(2, 1, 1, NULL),
(2, 1, 2, NULL),
(2, 1, 3, NULL),
(2, 1, 4, NULL),
(2, 1, 5, NULL),
(2, 1, 6, NULL),
(2, 1, 7, NULL),
(2, 1, 8, NULL),
(2, 1, 9, NULL),
(2, 1, 10, NULL),
(2, 1, 11, NULL),
(2, 1, 12, NULL),
(2, 1, 13, NULL),
(2, 2, 1, NULL),
(2, 2, 2, NULL),
(2, 2, 3, NULL),
(2, 2, 4, NULL),
(2, 2, 5, NULL),
(2, 2, 6, NULL),
(2, 2, 7, NULL),
(2, 2, 8, NULL),
(2, 2, 9, NULL),
(2, 2, 10, NULL),
(2, 2, 11, NULL),
(2, 3, 1, NULL),
(2, 3, 2, NULL),
(2, 3, 3, NULL),
(2, 3, 4, NULL),
(2, 3, 5, NULL),
(2, 3, 8, NULL),
(2, 3, 9, NULL),
(2, 3, 10, NULL),
(2, 4, 1, NULL),
(2, 4, 2, NULL),
(2, 4, 3, NULL),
(2, 4, 4, NULL),
(2, 4, 5, NULL),
(2, 4, 8, NULL),
(2, 4, 9, NULL),
(2, 4, 10, NULL),
(2, 5, 1, NULL),
(2, 5, 2, NULL),
(2, 5, 3, NULL),
(2, 5, 4, NULL),
(2, 5, 5, NULL),
(2, 5, 8, NULL),
(2, 5, 9, NULL),
(2, 5, 10, NULL),
(2, 6, 1, NULL),
(2, 6, 2, NULL),
(2, 6, 3, NULL),
(2, 6, 4, NULL),
(2, 6, 5, NULL),
(2, 7, 1, NULL),
(2, 7, 2, NULL),
(2, 7, 3, NULL),
(2, 7, 4, NULL),
(2, 7, 5, NULL),
(2, 8, 1, NULL),
(2, 8, 3, NULL),
(2, 9, 1, NULL),
(2, 9, 3, NULL),
(2, 10, 1, NULL),
(2, 10, 3, NULL),
(2, 11, 1, NULL),
(2, 11, 3, NULL),
(2, 12, 1, NULL),
(2, 12, 3, NULL),
(2, 13, 1, NULL),
(2, 13, 3, NULL),
(2, 14, 1, NULL),
(2, 15, 1, NULL),
(2, 16, 1, NULL),
(2, 17, 1, NULL),
(3, 1, 1, NULL),
(3, 1, 2, NULL),
(3, 1, 3, NULL),
(3, 1, 4, NULL),
(3, 1, 5, NULL),
(3, 1, 6, NULL),
(3, 1, 7, NULL),
(3, 1, 8, NULL),
(3, 1, 9, NULL),
(3, 1, 10, NULL),
(3, 1, 11, NULL),
(3, 1, 12, NULL),
(3, 1, 13, NULL),
(3, 2, 1, NULL),
(3, 2, 2, NULL),
(3, 2, 3, NULL),
(3, 2, 4, NULL),
(3, 2, 5, NULL),
(3, 2, 6, NULL),
(3, 2, 7, NULL),
(3, 2, 8, NULL),
(3, 2, 9, NULL),
(3, 2, 10, NULL),
(3, 2, 11, NULL),
(3, 3, 1, NULL),
(3, 3, 2, NULL),
(3, 3, 3, NULL),
(3, 3, 4, NULL),
(3, 3, 5, NULL),
(3, 3, 8, NULL),
(3, 3, 9, NULL),
(3, 3, 10, NULL),
(3, 4, 1, NULL),
(3, 4, 2, NULL),
(3, 4, 3, NULL),
(3, 4, 4, NULL),
(3, 4, 5, NULL),
(3, 4, 8, NULL),
(3, 4, 9, NULL),
(3, 4, 10, NULL),
(3, 5, 1, NULL),
(3, 5, 2, NULL),
(3, 5, 3, NULL),
(3, 5, 4, NULL),
(3, 5, 5, NULL),
(3, 5, 8, NULL),
(3, 5, 9, NULL),
(3, 5, 10, NULL),
(3, 6, 1, NULL),
(3, 6, 2, NULL),
(3, 6, 3, NULL),
(3, 6, 4, NULL),
(3, 6, 5, NULL),
(3, 7, 1, NULL),
(3, 7, 2, NULL),
(3, 7, 3, NULL),
(3, 7, 4, NULL),
(3, 7, 5, NULL),
(3, 8, 1, NULL),
(3, 8, 3, NULL),
(3, 9, 1, NULL),
(3, 9, 3, NULL),
(3, 10, 1, NULL),
(3, 10, 3, NULL),
(3, 11, 1, NULL),
(3, 11, 3, NULL),
(3, 12, 1, NULL),
(3, 12, 3, NULL),
(3, 13, 1, NULL),
(3, 13, 3, NULL),
(3, 14, 1, NULL),
(3, 15, 1, NULL),
(3, 16, 1, NULL),
(3, 17, 1, NULL),
(4, 1, 1, NULL),
(4, 1, 2, NULL),
(4, 1, 3, NULL),
(4, 1, 4, NULL),
(4, 1, 5, NULL),
(4, 1, 6, NULL),
(4, 1, 7, NULL),
(4, 1, 8, NULL),
(4, 1, 9, NULL),
(4, 1, 10, NULL),
(4, 1, 11, NULL),
(4, 1, 12, NULL),
(4, 1, 13, NULL),
(4, 2, 1, NULL),
(4, 2, 2, NULL),
(4, 2, 3, NULL),
(4, 2, 4, NULL),
(4, 2, 5, NULL),
(4, 2, 6, NULL),
(4, 2, 7, NULL),
(4, 2, 8, NULL),
(4, 2, 9, NULL),
(4, 2, 10, NULL),
(4, 2, 11, NULL),
(4, 3, 1, NULL),
(4, 3, 2, NULL),
(4, 3, 3, NULL),
(4, 3, 4, NULL),
(4, 3, 5, NULL),
(4, 3, 8, NULL),
(4, 3, 9, NULL),
(4, 3, 10, NULL),
(4, 4, 1, NULL),
(4, 4, 2, NULL),
(4, 4, 3, NULL),
(4, 4, 4, NULL),
(4, 4, 5, NULL),
(4, 4, 8, NULL),
(4, 4, 9, NULL),
(4, 4, 10, NULL),
(4, 5, 1, NULL),
(4, 5, 2, NULL),
(4, 5, 3, NULL),
(4, 5, 4, NULL),
(4, 5, 5, NULL),
(4, 5, 8, NULL),
(4, 5, 9, NULL),
(4, 5, 10, NULL),
(4, 6, 1, NULL),
(4, 6, 2, NULL),
(4, 6, 3, NULL),
(4, 6, 4, NULL),
(4, 6, 5, NULL),
(4, 7, 1, NULL),
(4, 7, 2, NULL),
(4, 7, 3, NULL),
(4, 7, 4, NULL),
(4, 7, 5, NULL),
(4, 8, 1, NULL),
(4, 8, 3, NULL),
(4, 9, 1, NULL),
(4, 9, 3, NULL),
(4, 10, 1, NULL),
(4, 10, 3, NULL),
(4, 11, 1, NULL),
(4, 11, 3, NULL),
(4, 12, 1, NULL),
(4, 12, 3, NULL),
(4, 13, 1, NULL),
(4, 13, 3, NULL),
(4, 14, 1, NULL),
(4, 15, 1, NULL),
(4, 16, 1, NULL),
(4, 17, 1, NULL),
(5, 1, 1, NULL),
(5, 1, 2, NULL),
(5, 1, 3, NULL),
(5, 1, 4, NULL),
(5, 1, 5, NULL),
(5, 1, 6, NULL),
(5, 1, 7, NULL),
(5, 1, 8, NULL),
(5, 1, 9, NULL),
(5, 1, 10, NULL),
(5, 1, 11, NULL),
(5, 1, 12, NULL),
(5, 1, 13, NULL),
(5, 2, 1, NULL),
(5, 2, 2, NULL),
(5, 2, 3, NULL),
(5, 2, 4, NULL),
(5, 2, 5, NULL),
(5, 2, 6, NULL),
(5, 2, 7, NULL),
(5, 2, 8, NULL),
(5, 2, 9, NULL),
(5, 2, 10, NULL),
(5, 2, 11, NULL),
(5, 3, 1, NULL),
(5, 3, 2, NULL),
(5, 3, 3, NULL),
(5, 3, 4, NULL),
(5, 3, 5, NULL),
(5, 3, 8, NULL),
(5, 3, 9, NULL),
(5, 3, 10, NULL),
(5, 4, 1, NULL),
(5, 4, 2, NULL),
(5, 4, 3, NULL),
(5, 4, 4, NULL),
(5, 4, 5, NULL),
(5, 4, 8, NULL),
(5, 4, 9, NULL),
(5, 4, 10, NULL),
(5, 5, 1, NULL),
(5, 5, 2, NULL),
(5, 5, 3, NULL),
(5, 5, 4, NULL),
(5, 5, 5, NULL),
(5, 5, 8, NULL),
(5, 5, 9, NULL),
(5, 5, 10, NULL),
(5, 6, 1, NULL),
(5, 6, 2, NULL),
(5, 6, 3, NULL),
(5, 6, 4, NULL),
(5, 6, 5, NULL),
(5, 7, 1, NULL),
(5, 7, 2, NULL),
(5, 7, 3, NULL),
(5, 7, 4, NULL),
(5, 7, 5, NULL),
(5, 8, 1, NULL),
(5, 8, 3, NULL),
(5, 9, 1, NULL),
(5, 9, 3, NULL),
(5, 10, 1, NULL),
(5, 10, 3, NULL),
(5, 11, 1, NULL),
(5, 11, 3, NULL),
(5, 12, 1, NULL),
(5, 12, 3, NULL),
(5, 13, 1, NULL),
(5, 13, 3, NULL),
(5, 14, 1, NULL),
(5, 15, 1, NULL),
(5, 16, 1, NULL),
(5, 17, 1, NULL),
(6, 1, 1, NULL),
(6, 1, 2, NULL),
(6, 1, 3, NULL),
(6, 1, 4, NULL),
(6, 1, 5, NULL),
(6, 1, 6, NULL),
(6, 1, 7, NULL),
(6, 1, 8, NULL),
(6, 1, 9, NULL),
(6, 1, 10, NULL),
(6, 1, 11, NULL),
(6, 1, 12, NULL),
(6, 1, 13, NULL),
(6, 2, 1, NULL),
(6, 2, 2, NULL),
(6, 2, 3, NULL),
(6, 2, 4, NULL),
(6, 2, 5, NULL),
(6, 2, 6, NULL),
(6, 2, 7, NULL),
(6, 2, 8, NULL),
(6, 2, 9, NULL),
(6, 2, 10, NULL),
(6, 2, 11, NULL),
(6, 3, 1, NULL),
(6, 3, 2, NULL),
(6, 3, 3, NULL),
(6, 3, 4, NULL),
(6, 3, 5, NULL),
(6, 3, 8, NULL),
(6, 3, 9, NULL),
(6, 3, 10, NULL),
(6, 4, 1, NULL),
(6, 4, 2, NULL),
(6, 4, 3, NULL),
(6, 4, 4, NULL),
(6, 4, 5, NULL),
(6, 4, 8, NULL),
(6, 4, 9, NULL),
(6, 4, 10, NULL),
(6, 5, 1, NULL),
(6, 5, 2, NULL),
(6, 5, 3, NULL),
(6, 5, 4, NULL),
(6, 5, 5, NULL),
(6, 5, 8, NULL),
(6, 5, 9, NULL),
(6, 5, 10, NULL),
(6, 6, 1, NULL),
(6, 6, 2, NULL),
(6, 6, 3, NULL),
(6, 6, 4, NULL),
(6, 6, 5, NULL),
(6, 7, 1, NULL),
(6, 7, 2, NULL),
(6, 7, 3, NULL),
(6, 7, 4, NULL),
(6, 7, 5, NULL),
(6, 8, 1, NULL),
(6, 8, 3, NULL),
(6, 9, 1, NULL),
(6, 9, 3, NULL),
(6, 10, 1, NULL),
(6, 10, 3, NULL),
(6, 11, 1, NULL),
(6, 11, 3, NULL),
(6, 12, 1, NULL),
(6, 12, 3, NULL),
(6, 13, 1, NULL),
(6, 13, 3, NULL),
(6, 14, 1, NULL),
(6, 15, 1, NULL),
(6, 16, 1, NULL),
(6, 17, 1, NULL),
(7, 1, 1, NULL),
(7, 1, 2, NULL),
(7, 1, 3, NULL),
(7, 1, 4, NULL),
(7, 1, 5, NULL),
(7, 1, 6, NULL),
(7, 1, 7, NULL),
(7, 1, 8, NULL),
(7, 1, 9, NULL),
(7, 1, 10, NULL),
(7, 1, 11, NULL),
(7, 1, 12, NULL),
(7, 1, 13, NULL),
(7, 2, 1, NULL),
(7, 2, 2, NULL),
(7, 2, 3, NULL),
(7, 2, 4, NULL),
(7, 2, 5, NULL),
(7, 2, 6, NULL),
(7, 2, 7, NULL),
(7, 2, 8, NULL),
(7, 2, 9, NULL),
(7, 2, 10, NULL),
(7, 2, 11, NULL),
(7, 3, 1, NULL),
(7, 3, 2, NULL),
(7, 3, 3, NULL),
(7, 3, 4, NULL),
(7, 3, 5, NULL),
(7, 3, 8, NULL),
(7, 3, 9, NULL),
(7, 3, 10, NULL),
(7, 4, 1, NULL),
(7, 4, 2, NULL),
(7, 4, 3, NULL),
(7, 4, 4, NULL),
(7, 4, 5, NULL),
(7, 4, 8, NULL),
(7, 4, 9, NULL),
(7, 4, 10, NULL),
(7, 5, 1, NULL),
(7, 5, 2, NULL),
(7, 5, 3, NULL),
(7, 5, 4, NULL),
(7, 5, 5, NULL),
(7, 5, 8, NULL),
(7, 5, 9, NULL),
(7, 5, 10, NULL),
(7, 6, 1, NULL),
(7, 6, 2, NULL),
(7, 6, 3, NULL),
(7, 6, 4, NULL),
(7, 6, 5, NULL),
(7, 7, 1, NULL),
(7, 7, 2, NULL),
(7, 7, 3, NULL),
(7, 7, 4, NULL),
(7, 7, 5, NULL),
(7, 8, 1, NULL),
(7, 8, 3, NULL),
(7, 9, 1, NULL),
(7, 9, 3, NULL),
(7, 10, 1, NULL),
(7, 10, 3, NULL),
(7, 11, 1, NULL),
(7, 11, 3, NULL),
(7, 12, 1, NULL),
(7, 12, 3, NULL),
(7, 13, 1, NULL),
(7, 13, 3, NULL),
(7, 14, 1, NULL),
(7, 15, 1, NULL),
(7, 16, 1, NULL),
(7, 17, 1, NULL),
(8, 1, 1, NULL),
(8, 1, 2, NULL),
(8, 1, 3, NULL),
(8, 1, 4, NULL),
(8, 1, 5, NULL),
(8, 1, 6, NULL),
(8, 1, 7, NULL),
(8, 1, 8, NULL),
(8, 1, 9, NULL),
(8, 1, 10, NULL),
(8, 1, 11, NULL),
(8, 1, 12, NULL),
(8, 1, 13, NULL),
(8, 2, 1, NULL),
(8, 2, 2, NULL),
(8, 2, 3, NULL),
(8, 2, 4, NULL),
(8, 2, 5, NULL),
(8, 2, 6, NULL),
(8, 2, 7, NULL),
(8, 2, 8, NULL),
(8, 2, 9, NULL),
(8, 2, 10, NULL),
(8, 2, 11, NULL),
(8, 3, 1, NULL),
(8, 3, 2, NULL),
(8, 3, 3, NULL),
(8, 3, 4, NULL),
(8, 3, 5, NULL),
(8, 3, 8, NULL),
(8, 3, 9, NULL),
(8, 3, 10, NULL),
(8, 4, 1, NULL),
(8, 4, 2, NULL),
(8, 4, 3, NULL),
(8, 4, 4, NULL),
(8, 4, 5, NULL),
(8, 4, 8, NULL),
(8, 4, 9, NULL),
(8, 4, 10, NULL),
(8, 5, 1, NULL),
(8, 5, 2, NULL),
(8, 5, 3, NULL),
(8, 5, 4, NULL),
(8, 5, 5, NULL),
(8, 5, 8, NULL),
(8, 5, 9, NULL),
(8, 5, 10, NULL),
(8, 6, 1, NULL),
(8, 6, 2, NULL),
(8, 6, 3, NULL),
(8, 6, 4, NULL),
(8, 6, 5, NULL),
(8, 7, 1, NULL),
(8, 7, 2, NULL),
(8, 7, 3, NULL),
(8, 7, 4, NULL),
(8, 7, 5, NULL),
(8, 8, 1, NULL),
(8, 8, 3, NULL),
(8, 9, 1, NULL),
(8, 9, 3, NULL),
(8, 10, 1, NULL),
(8, 10, 3, NULL),
(8, 11, 1, NULL),
(8, 11, 3, NULL),
(8, 12, 1, NULL),
(8, 12, 3, NULL),
(8, 13, 1, NULL),
(8, 13, 3, NULL),
(8, 14, 1, NULL),
(8, 15, 1, NULL),
(8, 16, 1, NULL),
(8, 17, 1, NULL),
(99, 1, 1, NULL),
(99, 1, 2, NULL),
(99, 1, 3, NULL),
(99, 1, 4, NULL),
(99, 1, 5, NULL),
(99, 1, 6, NULL),
(99, 1, 7, NULL),
(99, 1, 8, NULL),
(99, 1, 9, NULL),
(99, 1, 10, NULL),
(99, 1, 11, NULL),
(99, 1, 12, NULL),
(99, 1, 13, NULL),
(99, 2, 1, NULL),
(99, 2, 2, NULL),
(99, 2, 3, NULL),
(99, 2, 4, NULL),
(99, 2, 5, NULL),
(99, 2, 6, NULL),
(99, 2, 7, NULL),
(99, 2, 8, NULL),
(99, 2, 9, NULL),
(99, 2, 10, NULL),
(99, 2, 11, NULL),
(99, 3, 1, NULL),
(99, 3, 2, NULL),
(99, 3, 3, NULL),
(99, 3, 4, NULL),
(99, 3, 5, NULL),
(99, 3, 8, NULL),
(99, 3, 9, NULL),
(99, 3, 10, NULL),
(99, 4, 1, NULL),
(99, 4, 2, NULL),
(99, 4, 3, NULL),
(99, 4, 4, NULL),
(99, 4, 5, NULL),
(99, 4, 8, NULL),
(99, 4, 9, NULL),
(99, 4, 10, NULL),
(99, 5, 1, NULL),
(99, 5, 2, NULL),
(99, 5, 3, NULL),
(99, 5, 4, NULL),
(99, 5, 5, NULL),
(99, 5, 8, NULL),
(99, 5, 9, NULL),
(99, 5, 10, NULL),
(99, 6, 1, NULL),
(99, 6, 2, NULL),
(99, 6, 3, NULL),
(99, 6, 4, NULL),
(99, 6, 5, NULL),
(99, 7, 1, NULL),
(99, 7, 2, NULL),
(99, 7, 3, NULL),
(99, 7, 4, NULL),
(99, 7, 5, NULL),
(99, 8, 1, NULL),
(99, 8, 3, NULL),
(99, 9, 1, NULL),
(99, 9, 3, NULL),
(99, 10, 1, NULL),
(99, 10, 3, NULL),
(99, 11, 1, NULL),
(99, 11, 3, NULL),
(99, 12, 1, NULL),
(99, 12, 3, NULL),
(99, 13, 1, NULL),
(99, 13, 3, NULL),
(99, 14, 1, NULL),
(99, 15, 1, NULL),
(99, 16, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `modulo`
--

CREATE TABLE `modulo` (
  `cod_modulo` int(11) NOT NULL,
  `categoria_1` varchar(45) DEFAULT NULL,
  `categoria_2` varchar(45) DEFAULT NULL,
  `categoria_3` varchar(45) DEFAULT NULL,
  `descricao` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `municipio`
--

CREATE TABLE `municipio` (
  `cod_ibge` int(7) NOT NULL,
  `nome_municipio` varchar(50) DEFAULT NULL,
  `populacao` int(11) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `regiao` varchar(15) DEFAULT NULL,
  `cnpj` varchar(14) DEFAULT NULL,
  `dist_capital` int(11) DEFAULT NULL,
  `endereco` varchar(45) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(250) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `idhm` float DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(10,8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `municipio`
--

INSERT INTO `municipio` (`cod_ibge`, `nome_municipio`, `populacao`, `uf`, `regiao`, `cnpj`, `dist_capital`, `endereco`, `numero`, `complemento`, `bairro`, `idhm`, `latitude`, `longitude`) VALUES
(7767, 'ty87ju', NULL, 'hy', 'tgrfd4d3', '23462568yyhu', 6420, '6h8htftd', '5677765444', '5rt6yhg67jgth6hg', '4rfv4tr4fdf', 3445, '99.99999999', '56.90000000'),
(1100015, 'Alta Floresta dOeste', 25578, 'RO', 'NORTE', '15834732000154', 17, NULL, NULL, '', NULL, 0.641, '-11.92830000', '-61.99530000'),
(1702208, 'Araguatins', 34392, 'TO', 'CENTRO-OESTE', '01237403000111', 687, NULL, NULL, NULL, NULL, 0.631, '-5.64659000', '-48.12320000'),
(2100600, 'Amarante do Maranhao', 40378, 'MA', 'NORDESTE', '06157846000116', 66, NULL, NULL, NULL, NULL, 0.555, '-5.56913000', '-46.74730000'),
(3129509, 'Ibia', 24784, 'MG', 'SUDESTE', '18584961000156', 47, NULL, NULL, NULL, NULL, 0.718, '-19.47490000', '-46.54740000'),
(5458566, 'Palmas', 217056, 'TO', 'NORTE', '06157846000116', 45, NULL, NULL, NULL, NULL, 0.547, '-8.64659000', '-99.92830000'),
(8474555, 'Urucuia', 54897, 'MG', 'SUDESTE', '99834732000154', 74, NULL, NULL, NULL, NULL, 0.888, '-19.47490000', '-61.99530000'),
(2147483647, '', NULL, '', '', '', 0, '', '', '', '', 0, '10.98820000', '0.00000000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `natureza_despesa`
--

CREATE TABLE `natureza_despesa` (
  `cod_natureza_despesa` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `natureza_despesa`
--

INSERT INTO `natureza_despesa` (`cod_natureza_despesa`, `descricao`) VALUES
(339039, 'Serviços e Operação assistida e Capacitação'),
(449039, 'Software'),
(449051, 'Obras e Instalação'),
(449052, 'valor equip. sem instalação'),
(449852, 'VALOR OBRA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `otb`
--

CREATE TABLE `otb` (
  `cod_otb` int(11) NOT NULL,
  `dt_pgto` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pid`
--

CREATE TABLE `pid` (
  `cod_pid` int(11) NOT NULL,
  `cod_ibge` int(7) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `inep` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pid`
--

INSERT INTO `pid` (`cod_pid`, `cod_ibge`, `nome`, `inep`) VALUES
(1, 1100015, 'algo', 'ALTERei'),
(2, 5458566, 'PIDPALMAS1', 'INEPPALMAS1'),
(4, 5458566, 'ç.llçmj', 'gf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pid_tipologia`
--

CREATE TABLE `pid_tipologia` (
  `cod_pid` int(11) NOT NULL,
  `cod_tipologia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ponto`
--

CREATE TABLE `ponto` (
  `cod_ponto` int(11) NOT NULL,
  `cod_categoria` int(11) NOT NULL,
  `cod_ibge` int(7) NOT NULL,
  `cod_pid` int(11) NOT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `numero` varchar(45) DEFAULT NULL,
  `complemento` varchar(1000) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cep` char(8) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(10,8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ponto`
--

INSERT INTO `ponto` (`cod_ponto`, `cod_categoria`, `cod_ibge`, `cod_pid`, `endereco`, `numero`, `complemento`, `bairro`, `cep`, `latitude`, `longitude`) VALUES
(1, 1, 1100015, 1, 'QNE 12rtrt', '128787878', 'RUA BRASILIAgtrgrg', 'TAGUATINGuey', '72125177', '5.00000000', '5.00000000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ponto_has_usuario`
--

CREATE TABLE `ponto_has_usuario` (
  `ponto_cod_ponto` int(11) NOT NULL,
  `ponto_categoria_cod_categoria` int(11) NOT NULL,
  `usuario_cod_usuario` int(11) NOT NULL,
  `usuario_perfil_cod_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `prefeitos`
--

CREATE TABLE `prefeitos` (
  `cod_prefeito` int(11) NOT NULL,
  `cod_ibge` int(7) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `rg` varchar(20) DEFAULT NULL,
  `partido` varchar(45) DEFAULT NULL,
  `exercicio` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `previsao_empenho`
--

CREATE TABLE `previsao_empenho` (
  `cod_previsao_empenho` int(11) NOT NULL,
  `cod_lote` int(11) NOT NULL,
  `cod_natureza_despesa` int(11) NOT NULL,
  `data` date DEFAULT NULL,
  `tipo` char(1) DEFAULT NULL,
  `ano_referencia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `previsao_empenho`
--

INSERT INTO `previsao_empenho` (`cod_previsao_empenho`, `cod_lote`, `cod_natureza_despesa`, `data`, `tipo`, `ano_referencia`) VALUES
(2, 2, 449039, '2019-12-05', 'O', 2020);

--
-- Acionadores `previsao_empenho`
--
DELIMITER $$
CREATE TRIGGER `insere_itens_previsao_empenho` AFTER INSERT ON `previsao_empenho` FOR EACH ROW BEGIN
	insert into itens_previsao_empenho (cod_previsao_empenho, cod_item, cod_tipo_item, cod_lote)
	(select previsao_empenho.cod_previsao_empenho, lote_itens.cod_item, lote_itens.cod_tipo_item, lote_itens.cod_lote
    from previsao_empenho, lote_itens
    inner join itens on (lote_itens.cod_item = itens.cod_item and lote_itens.cod_tipo_item = itens.cod_tipo_item) 
    where previsao_empenho.cod_previsao_empenho = (select last_insert_id(new.cod_previsao_empenho)) and lote_itens.cod_lote = previsao_empenho.cod_lote and itens.cod_natureza_despesa = previsao_empenho.cod_natureza_despesa);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `processo`
--

CREATE TABLE `processo` (
  `cod_processo` char(17) NOT NULL,
  `cod_ibge` int(7) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `processo`
--

INSERT INTO `processo` (`cod_processo`, `cod_ibge`, `descricao`) VALUES
('111', 8474555, 'descricao desse Processo'),
('876', 5458566, 'OPALMAS'),
('999', 5458566, 'TESTANDO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `reajuste`
--

CREATE TABLE `reajuste` (
  `ano_ref` int(11) NOT NULL,
  `cod_lote` int(11) NOT NULL,
  `percentual` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `reajuste`
--

INSERT INTO `reajuste` (`ano_ref`, `cod_lote`, `percentual`) VALUES
(2019, 1, 18),
(2019, 2, 999);

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone`
--

CREATE TABLE `telefone` (
  `cod_telefone` int(11) NOT NULL,
  `cod_contato` int(11) NOT NULL,
  `telefone` varchar(11) DEFAULT NULL,
  `tipo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `telefone`
--

INSERT INTO `telefone` (`cod_telefone`, `cod_contato`, `telefone`, `tipo`) VALUES
(1, 5, '9658211452', 'PARTICULAR'),
(2, 4, '958214562', 'ESCRITORIO'),
(3, 7, '98765432', 'CADEIA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipologia`
--

CREATE TABLE `tipologia` (
  `cod_tipologia` int(11) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipologia`
--

INSERT INTO `tipologia` (`cod_tipologia`, `descricao`) VALUES
(1, 'ESCOLA'),
(2, 'TELECENTRO'),
(3, 'CRAS'),
(4, 'POSTO DE FRONTEIRA'),
(5, 'QUILOMBOLA'),
(6, 'ASSENTAMENTO'),
(7, 'TELECENTRO_BR'),
(8, 'BIBLIOTECA'),
(9, 'PESCADORES'),
(10, 'RESEX'),
(11, 'INDIGENA'),
(12, 'PESQUISA'),
(13, 'UND DE SAUDE'),
(14, 'PONTO DE CULTURA'),
(15, 'UNID DE SAUDE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_item`
--

CREATE TABLE `tipo_item` (
  `cod_tipo_item` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_item`
--

INSERT INTO `tipo_item` (`cod_tipo_item`, `descricao`) VALUES
(1, 'Ponto de Enlace e Acesso Social (PEAS)'),
(2, 'Solução de Gerenciamento de Infraestrutura (SGI)'),
(3, '	Ponto de Acesso de Governo (PAG)'),
(4, '	Ponto de Conexão de Governo (PCG)'),
(5, '	Ponto de Acesso Público (PAP)'),
(6, '	Postes'),
(7, '	Fibra Óptica Área Instalada por km (FOA)'),
(8, '	Fibra Óptica Enterrada por km – Solo não Pavimentado (FONPV)'),
(9, '	Fibra Óptica Enterrada por km – Solo Pavimento (FOPV)'),
(10, ' Fibra Óptica Enterrada por km – Paralelepípedo (FOPR)'),
(11, ' Fibra Óptica de Acesso/Drop por km – Pavimento (FDROP)'),
(12, ' Operação Assistida - AO'),
(13, ' Transferência de Tecnologia - TT');

-- --------------------------------------------------------

--
-- Estrutura da tabela `uacom`
--

CREATE TABLE `uacom` (
  `cod_ibge` int(7) NOT NULL,
  `data` datetime NOT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `relato` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `uacom_assunto`
--

CREATE TABLE `uacom_assunto` (
  `cod_ibge` int(7) NOT NULL,
  `data` datetime NOT NULL,
  `cod_assunto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `cod_usuario` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `login` varchar(45) DEFAULT NULL,
  `senha` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_modulo`
--

CREATE TABLE `usuario_modulo` (
  `cod_usuario` int(11) NOT NULL,
  `cod_modulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `assunto`
--
ALTER TABLE `assunto`
  ADD PRIMARY KEY (`cod_assunto`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`cod_categoria`);

--
-- Índices para tabela `cd`
--
ALTER TABLE `cd`
  ADD PRIMARY KEY (`cod_ibge`),
  ADD KEY `fk_cd_lote1_idx` (`cod_lote`);

--
-- Índices para tabela `cd_itens`
--
ALTER TABLE `cd_itens`
  ADD PRIMARY KEY (`cod_ibge`,`cod_item`,`cod_tipo_item`),
  ADD KEY `fk_itens_has_cd_cd1_idx` (`cod_ibge`),
  ADD KEY `fk_cd_itens_itens2_idx` (`cod_item`,`cod_tipo_item`);

--
-- Índices para tabela `classe_empenho`
--
ALTER TABLE `classe_empenho`
  ADD PRIMARY KEY (`cod_classe_empenho`);

--
-- Índices para tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`cod_contato`),
  ADD KEY `fk_contato_entidade1_idx` (`cnpj`),
  ADD KEY `fk_contato_cd1_idx` (`cod_ibge`);

--
-- Índices para tabela `empenho`
--
ALTER TABLE `empenho`
  ADD PRIMARY KEY (`cod_empenho`),
  ADD KEY `fk_empenho_previsao_empenho1_idx` (`cod_previsao_empenho`);

--
-- Índices para tabela `entidade`
--
ALTER TABLE `entidade`
  ADD PRIMARY KEY (`cnpj`);

--
-- Índices para tabela `etapa`
--
ALTER TABLE `etapa`
  ADD PRIMARY KEY (`cod_etapa`);

--
-- Índices para tabela `etapas_cd`
--
ALTER TABLE `etapas_cd`
  ADD PRIMARY KEY (`cod_ibge`,`cod_etapa`),
  ADD KEY `fk_etapas_cd_etapa1_idx` (`cod_etapa`);

--
-- Índices para tabela `fatura`
--
ALTER TABLE `fatura`
  ADD PRIMARY KEY (`num_nf`,`cod_ibge`),
  ADD KEY `fk_Fatura_cd1_idx` (`cod_ibge`);

--
-- Índices para tabela `fatura_otb`
--
ALTER TABLE `fatura_otb`
  ADD PRIMARY KEY (`cod_otb`,`num_nf`,`cod_ibge`),
  ADD KEY `fk_Fatura_has_otb_otb1_idx` (`cod_otb`),
  ADD KEY `fk_fatura_otb_fatura1_idx` (`num_nf`,`cod_ibge`);

--
-- Índices para tabela `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`cod_item`,`cod_tipo_item`),
  ADD KEY `fk_itens_classificacao_itens1_idx` (`cod_natureza_despesa`),
  ADD KEY `fk_itens_subitem1_idx` (`cod_classe_empenho`),
  ADD KEY `fk_itens_tipo_item1_idx` (`cod_tipo_item`);

--
-- Índices para tabela `itens_empenho`
--
ALTER TABLE `itens_empenho`
  ADD PRIMARY KEY (`cod_empenho`,`cod_item`,`cod_tipo_item`),
  ADD KEY `fk_itens_empenho_empenho1_idx` (`cod_empenho`),
  ADD KEY `fk_itens_empenho_itens_previsao_empenho1_idx` (`cod_previsao_empenho`,`cod_item`,`cod_tipo_item`);

--
-- Índices para tabela `itens_fatura`
--
ALTER TABLE `itens_fatura`
  ADD PRIMARY KEY (`num_nf`,`cod_ibge`,`cod_empenho`,`cod_item`,`cod_tipo_item`),
  ADD KEY `fk_itens_fatura_itens_empenho1_idx` (`cod_empenho`,`cod_item`,`cod_tipo_item`),
  ADD KEY `fk_itens_fatura_fatura1_idx` (`num_nf`,`cod_ibge`);

--
-- Índices para tabela `itens_otb`
--
ALTER TABLE `itens_otb`
  ADD PRIMARY KEY (`cod_otb`,`num_nf`,`cod_ibge`,`cod_empenho`,`cod_item`,`cod_tipo_item`),
  ADD KEY `fk_itens_fatura_has_otb_otb1_idx` (`cod_otb`),
  ADD KEY `fk_itens_otb_itens_fatura1_idx` (`num_nf`,`cod_ibge`,`cod_empenho`,`cod_item`,`cod_tipo_item`);

--
-- Índices para tabela `itens_previsao_empenho`
--
ALTER TABLE `itens_previsao_empenho`
  ADD PRIMARY KEY (`cod_previsao_empenho`,`cod_item`,`cod_tipo_item`),
  ADD KEY `fk_itens_previsao_empenho_previsao_empenho1_idx` (`cod_previsao_empenho`),
  ADD KEY `fk_itens_previsao_empenho_lote_itens1_idx` (`cod_lote`,`cod_item`,`cod_tipo_item`);

--
-- Índices para tabela `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`cod_log`,`cod_usuario`),
  ADD KEY `fk_log_usuario1_idx` (`cod_usuario`);

--
-- Índices para tabela `lote`
--
ALTER TABLE `lote`
  ADD PRIMARY KEY (`cod_lote`),
  ADD KEY `fk_lote_entidade1_idx` (`cnpj`);

--
-- Índices para tabela `lote_itens`
--
ALTER TABLE `lote_itens`
  ADD PRIMARY KEY (`cod_lote`,`cod_item`,`cod_tipo_item`),
  ADD KEY `fk_lote_has_itens_lote1_idx` (`cod_lote`),
  ADD KEY `fk_lote_itens_itens1_idx` (`cod_item`,`cod_tipo_item`);

--
-- Índices para tabela `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`cod_modulo`);

--
-- Índices para tabela `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`cod_ibge`);

--
-- Índices para tabela `natureza_despesa`
--
ALTER TABLE `natureza_despesa`
  ADD PRIMARY KEY (`cod_natureza_despesa`);

--
-- Índices para tabela `otb`
--
ALTER TABLE `otb`
  ADD PRIMARY KEY (`cod_otb`);

--
-- Índices para tabela `pid`
--
ALTER TABLE `pid`
  ADD PRIMARY KEY (`cod_pid`),
  ADD KEY `fk_pid_municipio1_idx` (`cod_ibge`);

--
-- Índices para tabela `pid_tipologia`
--
ALTER TABLE `pid_tipologia`
  ADD PRIMARY KEY (`cod_pid`,`cod_tipologia`),
  ADD KEY `fk_ponto_has_tipologia_tipologia1_idx` (`cod_tipologia`),
  ADD KEY `fk_ponto_tipologia_pid1_idx` (`cod_pid`);

--
-- Índices para tabela `ponto`
--
ALTER TABLE `ponto`
  ADD PRIMARY KEY (`cod_ponto`,`cod_categoria`,`cod_ibge`),
  ADD KEY `fk_ponto_categoria1_idx` (`cod_categoria`),
  ADD KEY `fk_ponto_cd1_idx` (`cod_ibge`),
  ADD KEY `fk_ponto_pid1_idx` (`cod_pid`);

--
-- Índices para tabela `ponto_has_usuario`
--
ALTER TABLE `ponto_has_usuario`
  ADD PRIMARY KEY (`ponto_cod_ponto`,`ponto_categoria_cod_categoria`,`usuario_cod_usuario`,`usuario_perfil_cod_perfil`),
  ADD KEY `fk_ponto_has_usuario_usuario1_idx` (`usuario_cod_usuario`,`usuario_perfil_cod_perfil`);

--
-- Índices para tabela `prefeitos`
--
ALTER TABLE `prefeitos`
  ADD PRIMARY KEY (`cod_prefeito`),
  ADD KEY `fk_prefeitos_municipio1_idx` (`cod_ibge`);

--
-- Índices para tabela `previsao_empenho`
--
ALTER TABLE `previsao_empenho`
  ADD PRIMARY KEY (`cod_previsao_empenho`),
  ADD KEY `fk_empenho_lote1_idx` (`cod_lote`),
  ADD KEY `fk_previsao_empenho_natureza_despesa1_idx` (`cod_natureza_despesa`);

--
-- Índices para tabela `processo`
--
ALTER TABLE `processo`
  ADD PRIMARY KEY (`cod_processo`,`cod_ibge`),
  ADD KEY `fk_processo_cd1_idx` (`cod_ibge`);

--
-- Índices para tabela `reajuste`
--
ALTER TABLE `reajuste`
  ADD PRIMARY KEY (`ano_ref`,`cod_lote`),
  ADD KEY `fk_reajuste_lote1_idx` (`cod_lote`);

--
-- Índices para tabela `telefone`
--
ALTER TABLE `telefone`
  ADD PRIMARY KEY (`cod_telefone`),
  ADD KEY `fk_telefone_contato1_idx` (`cod_contato`);

--
-- Índices para tabela `tipologia`
--
ALTER TABLE `tipologia`
  ADD PRIMARY KEY (`cod_tipologia`);

--
-- Índices para tabela `tipo_item`
--
ALTER TABLE `tipo_item`
  ADD PRIMARY KEY (`cod_tipo_item`);

--
-- Índices para tabela `uacom`
--
ALTER TABLE `uacom`
  ADD PRIMARY KEY (`cod_ibge`,`data`),
  ADD KEY `fk_uacom_cd1_idx` (`cod_ibge`);

--
-- Índices para tabela `uacom_assunto`
--
ALTER TABLE `uacom_assunto`
  ADD PRIMARY KEY (`cod_ibge`,`data`,`cod_assunto`),
  ADD KEY `fk_uacom_has_assunto_assunto1_idx` (`cod_assunto`),
  ADD KEY `fk_uacom_has_assunto_uacom1_idx` (`cod_ibge`,`data`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_usuario`);

--
-- Índices para tabela `usuario_modulo`
--
ALTER TABLE `usuario_modulo`
  ADD PRIMARY KEY (`cod_usuario`,`cod_modulo`),
  ADD KEY `fk_usuario_has_modulo_modulo1_idx` (`cod_modulo`),
  ADD KEY `fk_usuario_has_modulo_usuario1_idx` (`cod_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `assunto`
--
ALTER TABLE `assunto`
  MODIFY `cod_assunto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `cod_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `cod_contato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `etapa`
--
ALTER TABLE `etapa`
  MODIFY `cod_etapa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `log`
--
ALTER TABLE `log`
  MODIFY `cod_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pid`
--
ALTER TABLE `pid`
  MODIFY `cod_pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `prefeitos`
--
ALTER TABLE `prefeitos`
  MODIFY `cod_prefeito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `previsao_empenho`
--
ALTER TABLE `previsao_empenho`
  MODIFY `cod_previsao_empenho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `telefone`
--
ALTER TABLE `telefone`
  MODIFY `cod_telefone` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tipologia`
--
ALTER TABLE `tipologia`
  MODIFY `cod_tipologia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cd`
--
ALTER TABLE `cd`
  ADD CONSTRAINT `fk_cd_lote1` FOREIGN KEY (`cod_lote`) REFERENCES `lote` (`cod_lote`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cd_municipio1` FOREIGN KEY (`cod_ibge`) REFERENCES `municipio` (`cod_ibge`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cd_itens`
--
ALTER TABLE `cd_itens`
  ADD CONSTRAINT `fk_cd_itens_itens2` FOREIGN KEY (`cod_item`,`cod_tipo_item`) REFERENCES `itens` (`cod_item`, `cod_tipo_item`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_itens_has_cd_cd1` FOREIGN KEY (`cod_ibge`) REFERENCES `cd` (`cod_ibge`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `contato`
--
ALTER TABLE `contato`
  ADD CONSTRAINT `fk_contato_cd1` FOREIGN KEY (`cod_ibge`) REFERENCES `cd` (`cod_ibge`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contato_entidade1` FOREIGN KEY (`cnpj`) REFERENCES `entidade` (`cnpj`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `empenho`
--
ALTER TABLE `empenho`
  ADD CONSTRAINT `fk_empenho_previsao_empenho1` FOREIGN KEY (`cod_previsao_empenho`) REFERENCES `previsao_empenho` (`cod_previsao_empenho`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `etapas_cd`
--
ALTER TABLE `etapas_cd`
  ADD CONSTRAINT `fk_etapas_cd1` FOREIGN KEY (`cod_ibge`) REFERENCES `cd` (`cod_ibge`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_etapas_cd_etapa1` FOREIGN KEY (`cod_etapa`) REFERENCES `etapa` (`cod_etapa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `fatura`
--
ALTER TABLE `fatura`
  ADD CONSTRAINT `fk_Fatura_cd1` FOREIGN KEY (`cod_ibge`) REFERENCES `cd` (`cod_ibge`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `fatura_otb`
--
ALTER TABLE `fatura_otb`
  ADD CONSTRAINT `fk_Fatura_has_otb_otb1` FOREIGN KEY (`cod_otb`) REFERENCES `otb` (`cod_otb`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_fatura_otb_fatura1` FOREIGN KEY (`num_nf`,`cod_ibge`) REFERENCES `fatura` (`num_nf`, `cod_ibge`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `itens`
--
ALTER TABLE `itens`
  ADD CONSTRAINT `fk_itens_classificacao_itens1` FOREIGN KEY (`cod_natureza_despesa`) REFERENCES `natureza_despesa` (`cod_natureza_despesa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_itens_subitem1` FOREIGN KEY (`cod_classe_empenho`) REFERENCES `classe_empenho` (`cod_classe_empenho`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_itens_tipo_item1` FOREIGN KEY (`cod_tipo_item`) REFERENCES `tipo_item` (`cod_tipo_item`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `itens_empenho`
--
ALTER TABLE `itens_empenho`
  ADD CONSTRAINT `fk_itens_empenho_empenho1` FOREIGN KEY (`cod_empenho`) REFERENCES `empenho` (`cod_empenho`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_itens_empenho_itens_previsao_empenho1` FOREIGN KEY (`cod_previsao_empenho`,`cod_item`,`cod_tipo_item`) REFERENCES `itens_previsao_empenho` (`cod_previsao_empenho`, `cod_item`, `cod_tipo_item`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `itens_fatura`
--
ALTER TABLE `itens_fatura`
  ADD CONSTRAINT `fk_itens_fatura_fatura1` FOREIGN KEY (`num_nf`,`cod_ibge`) REFERENCES `fatura` (`num_nf`, `cod_ibge`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_itens_fatura_itens_empenho1` FOREIGN KEY (`cod_empenho`,`cod_item`,`cod_tipo_item`) REFERENCES `itens_empenho` (`cod_empenho`, `cod_item`, `cod_tipo_item`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `itens_otb`
--
ALTER TABLE `itens_otb`
  ADD CONSTRAINT `fk_itens_fatura_has_otb_otb1` FOREIGN KEY (`cod_otb`) REFERENCES `otb` (`cod_otb`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_itens_otb_itens_fatura1` FOREIGN KEY (`num_nf`,`cod_ibge`,`cod_empenho`,`cod_item`,`cod_tipo_item`) REFERENCES `itens_fatura` (`num_nf`, `cod_ibge`, `cod_empenho`, `cod_item`, `cod_tipo_item`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `itens_previsao_empenho`
--
ALTER TABLE `itens_previsao_empenho`
  ADD CONSTRAINT `fk_itens_previsao_empenho_lote_itens1` FOREIGN KEY (`cod_lote`,`cod_item`,`cod_tipo_item`) REFERENCES `lote_itens` (`cod_lote`, `cod_item`, `cod_tipo_item`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_itens_previsao_empenho_previsao_empenho1` FOREIGN KEY (`cod_previsao_empenho`) REFERENCES `previsao_empenho` (`cod_previsao_empenho`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `fk_log_usuario1` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `lote`
--
ALTER TABLE `lote`
  ADD CONSTRAINT `fk_lote_entidade1` FOREIGN KEY (`cnpj`) REFERENCES `entidade` (`cnpj`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `lote_itens`
--
ALTER TABLE `lote_itens`
  ADD CONSTRAINT `fk_lote_has_itens_lote1` FOREIGN KEY (`cod_lote`) REFERENCES `lote` (`cod_lote`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_lote_itens_itens1` FOREIGN KEY (`cod_item`,`cod_tipo_item`) REFERENCES `itens` (`cod_item`, `cod_tipo_item`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pid`
--
ALTER TABLE `pid`
  ADD CONSTRAINT `fk_pid_municipio1` FOREIGN KEY (`cod_ibge`) REFERENCES `municipio` (`cod_ibge`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pid_tipologia`
--
ALTER TABLE `pid_tipologia`
  ADD CONSTRAINT `fk_ponto_has_tipologia_tipologia1` FOREIGN KEY (`cod_tipologia`) REFERENCES `tipologia` (`cod_tipologia`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ponto_tipologia_pid1` FOREIGN KEY (`cod_pid`) REFERENCES `pid` (`cod_pid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ponto`
--
ALTER TABLE `ponto`
  ADD CONSTRAINT `fk_ponto_categoria1` FOREIGN KEY (`cod_categoria`) REFERENCES `categoria` (`cod_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ponto_cd1` FOREIGN KEY (`cod_ibge`) REFERENCES `cd` (`cod_ibge`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ponto_pid1` FOREIGN KEY (`cod_pid`) REFERENCES `pid` (`cod_pid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `ponto_has_usuario`
--
ALTER TABLE `ponto_has_usuario`
  ADD CONSTRAINT `fk_ponto_has_usuario_usuario1` FOREIGN KEY (`usuario_cod_usuario`) REFERENCES `usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `prefeitos`
--
ALTER TABLE `prefeitos`
  ADD CONSTRAINT `fk_prefeitos_municipio1` FOREIGN KEY (`cod_ibge`) REFERENCES `municipio` (`cod_ibge`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `previsao_empenho`
--
ALTER TABLE `previsao_empenho`
  ADD CONSTRAINT `fk_empenho_lote10` FOREIGN KEY (`cod_lote`) REFERENCES `lote` (`cod_lote`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_previsao_empenho_natureza_despesa1` FOREIGN KEY (`cod_natureza_despesa`) REFERENCES `natureza_despesa` (`cod_natureza_despesa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `processo`
--
ALTER TABLE `processo`
  ADD CONSTRAINT `fk_processo_cd1` FOREIGN KEY (`cod_ibge`) REFERENCES `cd` (`cod_ibge`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `reajuste`
--
ALTER TABLE `reajuste`
  ADD CONSTRAINT `fk_reajuste_lote1` FOREIGN KEY (`cod_lote`) REFERENCES `lote` (`cod_lote`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `telefone`
--
ALTER TABLE `telefone`
  ADD CONSTRAINT `fk_telefone_contato1` FOREIGN KEY (`cod_contato`) REFERENCES `contato` (`cod_contato`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `uacom`
--
ALTER TABLE `uacom`
  ADD CONSTRAINT `fk_uacom_cd1` FOREIGN KEY (`cod_ibge`) REFERENCES `cd` (`cod_ibge`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `uacom_assunto`
--
ALTER TABLE `uacom_assunto`
  ADD CONSTRAINT `fk_uacom_has_assunto_assunto1` FOREIGN KEY (`cod_assunto`) REFERENCES `assunto` (`cod_assunto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_uacom_has_assunto_uacom1` FOREIGN KEY (`cod_ibge`,`data`) REFERENCES `uacom` (`cod_ibge`, `data`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario_modulo`
--
ALTER TABLE `usuario_modulo`
  ADD CONSTRAINT `fk_usuario_has_modulo_modulo1` FOREIGN KEY (`cod_modulo`) REFERENCES `modulo` (`cod_modulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_has_modulo_usuario1` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario` (`cod_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
