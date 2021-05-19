-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Mar-2021 às 16:15
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crudoo`
--
CREATE DATABASE IF NOT EXISTS `crudoo` DEFAULT CHARACTER SET utf8 COLLATE utf8_swedish_ci;
USE `crudoo`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tab_usuarios`
--

CREATE TABLE `tab_usuarios` (
  `id_usuario` int(10) NOT NULL,
  `nome` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `fone` varchar(15) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `cpf` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tab_usuarios`
--

INSERT INTO `tab_usuarios` (`id_usuario`, `nome`, `email`, `fone`, `cpf`) VALUES
(3, 'Fabio', 'fabioc@sp.senac.br', '(11) 91234-5678', '11111111111'),
(4, 'Maria Aparecida', 'mariacida@gmail.com', '(11) 91111-1111', '04185597169'),
(5, 'Paulo', 'paulo@outlook.com', '(11) 92222-2222', '33333333333'),
(6, 'Simone', 'simone@uol.com.br', '(11) 93333-3333', '44444444444'),
(8, 'Alberto', 'beto@gmail.com', '(11) 95555-5555', '66666666666'),
(9, 'Katia', 'katia@uol.com.br', '(11) 96666-6666', '77777777777'),
(10, 'Pedro', 'pedro@hotmail.com', '(11) 97777-7777', '88888888888'),
(11, 'sdsaddsad', 'shefarol@hotmail.com', '(11) 91111-1111', '16226556480'),
(12, 'ghkuhkhjkhk', 'maria@gmail.com', '(11) 91111-1111', '23830756470'),
(13, 'nghfghgjghdjjhtr', 'paulo@outlook.com', '(11) 92222-2222', '22222222222'),
(14, 'egfdfggerg', 'paulo@outlook.com', '(11) 94444-4444', '22222222222'),
(15, 'Paulo', 'tereza@gmail.com', '(11) 93333-3333', '22222222222'),
(16, 'Alberto', 'beto@gmail.com', '(11) 92222-2222', '33333333333'),
(17, 'Simone', 'maria@gmail.com', '(11) 93333-3333', '22222222222');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tab_usuarios`
--
ALTER TABLE `tab_usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tab_usuarios`
--
ALTER TABLE `tab_usuarios`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
