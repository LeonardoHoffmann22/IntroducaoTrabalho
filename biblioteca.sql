-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 26, 2025 at 04:19 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `biblioteca`;
USE `biblioteca`;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteca`
--

-- --------------------------------------------------------

--
-- Table structure for table `favoritos`
--

CREATE TABLE `favoritos` (
  `idLivro` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idFavorito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favoritos`
--

INSERT INTO `favoritos` (`idLivro`, `idUsuario`, `idFavorito`) VALUES
(18, 5, 28),
(1, 4, 29),
(11, 4, 31),
(8, 4, 32);

-- --------------------------------------------------------

--
-- Table structure for table `livros`
--

CREATE TABLE `livros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `livros`
--

INSERT INTO `livros` (`id`, `titulo`, `img`) VALUES
(1, 'Dom Casmurro', 'DomCasmurro.jpg'),
(2, 'Grande Sertão: Veredas', 'GrandeSertaoVeredas.jpg'),
(3, 'O Alquimista', 'OAlquimista.jpg'),
(4, 'Capitães da Areia', 'CapitaesAreia.jpg'),
(5, 'Vidas Secas', 'VidasSecas.jpg'),
(6, 'O Auto da Compadecida', 'AutoCompadecida.jpg'),
(7, 'A Hora da Estrela', 'HoraEstrela.jpg'),
(8, 'Memórias Póstumas de Brás Cubas', 'MemoriasPostumas.jpg'),
(9, 'O Cortiço', 'Cortico.jpg'),
(10, 'Senhora ', 'Senhora.jpg'),
(11, 'Mar Morto', 'MarMorto.jpg'),
(12, 'Quarto de Despejo', 'QuartoDespejo.jpg'),
(13, 'Torto Arado', 'TortoArado.jpg'),
(14, 'A Vida Invisível de Eurídice Gusmão', 'VidaInvisivelEG.jpg'),
(15, 'O Quinze', 'Quinze.jpg'),
(16, 'A Máquina', 'Maquina.jpg'),
(17, 'A Moreninha', 'Moreninha.jpeg'),
(18, 'Meu Pé de Laranja Lima', 'LaranjaLima.jpg'),
(19, 'A Cabeça do Santo', 'CabeçaSanto.jpg'),
(20, 'Ensaio sobre a Cegueira', 'EnsaioCeguira.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `nome` varchar(255) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`nome`, `idUsuario`, `senha`, `email`) VALUES
('nicolas', 4, '$2y$10$Q2luUUBpT15ApIf2sVieyOldcwwwdPn8785la6RlZX87g/L86.LPC', 'nicolas@gmail.com'),
('Paulo Nunes', 5, '$2y$10$wjZnhgAkvbKNRwKNVrnSpeONfeIf20qE8WtJ4ITg4vsvw06j2XmN6', 'nunes@gmail.com'),
('Liseu', 6, '$2y$10$NTon5od32DvpQ.i.Tel0eutHMJyI.DFlOArNo/G959q/Iww/OEgO6', 'liseu@gmail.com'),
('Arthur', 10, '$2y$10$YeyphK1JmfSNn3wYkukYheHzd8bqM7AsQu6LYjq12luknfLDza9DW', 'arthur@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`idFavorito`),
  ADD KEY `idCliente` (`idUsuario`),
  ADD KEY `idLivro` (`idLivro`);

--
-- Indexes for table `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `idFavorito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `livros`
--
ALTER TABLE `livros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
