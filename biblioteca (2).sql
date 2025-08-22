-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/08/2025 às 22:48
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblioteca`
--

CREATE DATABASE IF NOT EXISTS `biblioteca` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `biblioteca`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `favoritos`
--

CREATE TABLE `favoritos` (
  `idLivros` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idFavorito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `livros`
--

CREATE TABLE `livros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livros`
--

INSERT INTO `livros` (`id`, `titulo`, `img`) VALUES
(1, 'Dom Casmurro', '/resource/DomCasmurro'),
(2, 'Grande Sertão: Veredas', '/resource/GrandeSertaoVeredas'),
(3, 'O Alquimista', '/resource/OAlquimista'),
(4, 'Capitães da Areia', '/resource/CapitaesAreia'),
(5, 'Vidas Secas', '/resource/VidasSecas'),
(6, 'O Auto da Compadecida', '/resource/AutoCompadecida'),
(7, 'A Hora da Estrela', '/resource/HoraEstrela'),
(8, 'Memórias Póstumas de Brás Cubas', '/resource/MemoriasPostumas'),
(9, 'O Cortiço', '/resource/Cortico'),
(10, 'Senhora ', '/resource/Senhora'),
(11, 'Mar Morto', '/resource/MarMorto'),
(12, 'Quarto de Despejo', '/resource/QuartoDespejo'),
(13, 'Torto Arado', '/resource/TortoArado'),
(14, 'A Vida Invisível de Eurídice Gusmão', '/resource/VidaInvisivelEG'),
(15, 'O Quinze', '/resource/Quinze'),
(16, 'A Máquina', '/resource/Maquina'),
(17, 'A Moreninha', '/resource/Moreninha'),
(18, 'Meu Pé de Laranja Lima', '/resource/LaranjaLima'),
(19, 'A Cabeça do Santo', '/resource/CabeçaSanto'),
(20, 'Ensaio sobre a Cegueira', '/resource/EnsaioCeguira');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `nome` varchar(20) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`nome`, `idUsuario`, `senha`, `email`) VALUES
('nicolas', 4, '$2y$10$Q2luUUBpT15ApIf2sVieyOldcwwwdPn8785la6RlZX87g/L86.LPC', 'nicolas@gmail.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`idFavorito`),
  ADD KEY `idCliente` (`idUsuario`),
  ADD KEY `idLivro` (`idLivros`);

--
-- Índices de tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
