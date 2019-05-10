-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 11/05/2019 às 00:40
-- Versão do servidor: 10.1.37-MariaDB
-- Versão do PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `oa_db`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `ALUNO`
--

CREATE TABLE `ALUNO` (
  `matricula` char(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `curso` int(10) UNSIGNED NOT NULL,
  `semestre` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `ALUNO`
--

INSERT INTO `ALUNO` (`matricula`, `curso`, `semestre`) VALUES
('216115518', 112, 7);

-- --------------------------------------------------------

--
-- Estrutura para tabela `CURSO`
--

CREATE TABLE `CURSO` (
  `codigo` int(10) UNSIGNED NOT NULL,
  `nome` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duracao` int(10) UNSIGNED NOT NULL,
  `departamento` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `DEPARTAMENTO`
--

CREATE TABLE `DEPARTAMENTO` (
  `codigo` int(10) UNSIGNED NOT NULL,
  `nome` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `DISCIPLINA`
--

CREATE TABLE `DISCIPLINA` (
  `codigo` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `carga_horaria` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `OBRIGATORIA`
--

CREATE TABLE `OBRIGATORIA` (
  `curso` int(10) UNSIGNED NOT NULL,
  `discilinas` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sem_sugerido` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ORIENTACAO`
--

CREATE TABLE `ORIENTACAO` (
  `id` int(10) UNSIGNED NOT NULL,
  `data` date NOT NULL,
  `horario` time NOT NULL,
  `observacao` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `destinatario` char(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remetente` char(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lida` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ORIENTACAO_DISCIPLINA`
--

CREATE TABLE `ORIENTACAO_DISCIPLINA` (
  `disciplina` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orientacao` int(10) UNSIGNED NOT NULL,
  `aprovado` tinyint(1) NOT NULL,
  `cursando` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `PRE_REQUISITO`
--

CREATE TABLE `PRE_REQUISITO` (
  `trancador` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trancado` char(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `PROFESSOR`
--

CREATE TABLE `PROFESSOR` (
  `matricula` char(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departamento` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `USUARIO`
--

CREATE TABLE `USUARIO` (
  `matricula` char(9) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nome` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sobrenome` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` char(9) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `USUARIO`
--

INSERT INTO `USUARIO` (`matricula`, `nome`, `sobrenome`, `email`, `senha`) VALUES
('216115518', 'Larissa', 'Machado', 'larissalari10@hotmail.com', 'doremifa');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `ALUNO`
--
ALTER TABLE `ALUNO`
  ADD PRIMARY KEY (`matricula`);

--
-- Índices de tabela `CURSO`
--
ALTER TABLE `CURSO`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `DEPARTAMENTO`
--
ALTER TABLE `DEPARTAMENTO`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `DISCIPLINA`
--
ALTER TABLE `DISCIPLINA`
  ADD PRIMARY KEY (`codigo`);

--
-- Índices de tabela `ORIENTACAO`
--
ALTER TABLE `ORIENTACAO`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `ORIENTACAO_DISCIPLINA`
--
ALTER TABLE `ORIENTACAO_DISCIPLINA`
  ADD PRIMARY KEY (`disciplina`,`orientacao`);

--
-- Índices de tabela `PROFESSOR`
--
ALTER TABLE `PROFESSOR`
  ADD PRIMARY KEY (`matricula`);

--
-- Índices de tabela `USUARIO`
--
ALTER TABLE `USUARIO`
  ADD PRIMARY KEY (`matricula`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `ORIENTACAO`
--
ALTER TABLE `ORIENTACAO`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
