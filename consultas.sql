-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Temps de generació: 28-10-2020 a les 12:23:05
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

DROP TABLE IF EXISTS `consultas`;

CREATE TABLE `consultas` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tema` varchar(250) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Bolcament de dades per a la taula `consultas`
--

INSERT INTO `consultas` (`id`, `name`, `tema`, `fecha`) VALUES
(0, 'Carmen', 'Mi vida es un problema.', '2020-10-28 09:03:45'),
(3, 'Vanessa', 'MySQL, mi ordenador es muy complicado.', '2020-10-28 09:10:04'),
(4, 'Quim', 'Tengo frio...', '2020-10-28 09:12:29'),
(5, 'Laura', 'No entiendo a Sergi.', '2020-10-28 09:12:29'),
(6, 'Isma', 'Estas confundido.', '2020-10-28 09:14:10'),
(23, 'R.', 'Molesta mucho', '2020-10-28 11:20:43');

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
