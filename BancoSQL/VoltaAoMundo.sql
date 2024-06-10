-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 08/06/2024 às 00:38
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `VoltaAoMundo`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) DEFAULT NULL,
  `mensagem` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `data_criacao` datetime DEFAULT NULL,
  `aprovado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `comentarios`
--

INSERT INTO `comentarios` (`id`, `nome`, `mensagem`, `email`, `data_criacao`, `aprovado`) VALUES
(1, 'joao', 'muito bom ', 'jao@gmail.com', '2024-06-02 00:00:00', NULL),
(2, 'joao', 'muito bom ', 'jao@gmail.com', '2024-06-02 00:00:00', NULL),
(3, 'Ronaldo', 'A cara, esse design ta muito padrão né, todo site tem uma design igual, voce não é nada original', 'brilhamuitonocurintia@gmail.com', '2024-06-02 00:00:00', NULL),
(4, 'joao paulo', 'vai dar 18 horas doido', 'briante@gmail.com', '2024-06-02 00:00:00', NULL),
(5, 'joao paulo', 'vai dar 18 horas doido', 'briante@gmail.com', '2024-06-02 22:46:18', NULL),
(6, 'juninho', '10 pras 6 manow', 'goncalves@gmail.com', '2024-06-02 22:51:38', NULL),
(7, 'juninho', '10 pras 6 manow', 'goncalves@gmail.com', '2024-06-02 22:52:27', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `senha` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `senha`) VALUES
(1, 'joao', '123456');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
