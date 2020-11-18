-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Temps de generació: 18-11-2020 a les 09:22:43
-- Versió del servidor: 10.4.14-MariaDB
-- Versió de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `bd_consultorio_echo`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `consultas`
--

CREATE TABLE `consultas` (
  `id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tema` varchar(250) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `hecho` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `consultas`
--

INSERT INTO `consultas` (`id`, `name`, `tema`, `fecha`, `hecho`) VALUES
('27', 'Malena', 'Array', '2020-11-05 14:27:48', 1),
('28', 'Vanessa', 'Usa Linux', '2020-11-17 10:19:34', 1),
('5fb3c724e866c', 'Quim', 'Tenim problemes', '2020-11-17 12:50:44', 0),
('5fb3c79db4e75', 'Pepe', 'Tiene hambre', '2020-11-17 12:52:45', 0),
('5fb3c902df15f', 'Rosa', 'Tiene cosquillas', '2020-11-17 12:58:42', 0),
('5fb3cc15690df', 'Laura', 'Ya ha comido', '2020-11-17 13:11:49', 0),
('5fb4d99f5fb9d', 'Indiana Jones', 'Tenia frio', '2020-11-18 08:21:51', 0);

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
