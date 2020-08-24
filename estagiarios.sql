-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 24/08/2020 às 02:37
-- Versão do servidor: 10.3.22-MariaDB
-- Versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `estagiarios`
--
CREATE DATABASE IF NOT EXISTS `estagiarios` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `estagiarios`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `APONTAMENTOS`
--

DROP TABLE IF EXISTS `APONTAMENTOS`;
CREATE TABLE `APONTAMENTOS` (
  `id` int(10) UNSIGNED NOT NULL,
  `idPessoa` int(10) UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `horaChegadaEmpresa` time DEFAULT NULL,
  `horaSaidaEmpresa` time DEFAULT NULL,
  `horaSaidaAlmoco` time DEFAULT NULL,
  `horaRetornoAlmoco` time DEFAULT NULL,
  `dataHoraInsercao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `APONTAMENTOS`
--

INSERT INTO `APONTAMENTOS` (`id`, `idPessoa`, `data`, `horaChegadaEmpresa`, `horaSaidaEmpresa`, `horaSaidaAlmoco`, `horaRetornoAlmoco`, `dataHoraInsercao`) VALUES
(3, 2, '2020-08-23', '08:00:00', '17:30:00', '11:00:00', '12:30:00', '2020-08-23 15:32:23'),
(4, 1, '2020-08-23', '11:11:00', '11:11:00', '11:11:00', '11:11:00', '2020-08-23 15:55:57'),
(5, 1, '2020-08-25', '11:11:00', '11:11:00', '11:11:00', '11:11:00', '2020-08-23 15:55:57'),
(6, 9, '2020-08-31', '08:00:00', '17:30:00', '11:00:00', '12:30:00', '2020-08-23 23:17:46'),
(7, 9, '2020-08-23', '11:11:00', '11:11:00', '11:11:00', '11:11:00', '2020-08-23 23:28:26');

-- --------------------------------------------------------

--
-- Estrutura para tabela `PESSOAS`
--

DROP TABLE IF EXISTS `PESSOAS`;
CREATE TABLE `PESSOAS` (
  `idPessoa` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `senha` char(40) DEFAULT NULL,
  `ultimo_acesso` datetime DEFAULT NULL,
  `sessao` char(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `PESSOAS`
--

INSERT INTO `PESSOAS` (`idPessoa`, `nome`, `usuario`, `senha`, `ultimo_acesso`, `sessao`) VALUES
(1, 'Thais Sandim ', 'thais', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2020-08-23 20:55:33', '678b72fb3e46e91cad460de4f4a9d84a7e2b646c'),
(2, 'Thais Sandim', 'thais2', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2020-08-23 15:49:40', 'ec60a6f82980082837a94ffc94487c71fa14aadc'),
(8, 'Thais Sandim', 'thais3', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', NULL, NULL),
(9, 'admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '2020-08-23 23:33:12', '991ca08f7f6500bf1b0180b333c5c91f6129346e');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `APONTAMENTOS`
--
ALTER TABLE `APONTAMENTOS`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `PESSOAS`
--
ALTER TABLE `PESSOAS`
  ADD PRIMARY KEY (`idPessoa`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `APONTAMENTOS`
--
ALTER TABLE `APONTAMENTOS`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `PESSOAS`
--
ALTER TABLE `PESSOAS`
  MODIFY `idPessoa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
