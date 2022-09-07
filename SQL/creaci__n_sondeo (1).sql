-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-09-2022 a las 04:48:27
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `encuesta social`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `creación_sondeo`
--

CREATE TABLE `creación_sondeo` (
  `ID` int(11) NOT NULL,
  `Creación_Sondeo` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_inicio` datetime NOT NULL,
  `fecha_final` datetime NOT NULL,
  `Restricción` varchar(30) NOT NULL,
  `Tema` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `creación_sondeo`
--

INSERT INTO `creación_sondeo` (`ID`, `Creación_Sondeo`, `fecha_inicio`, `fecha_final`, `Restricción`, `Tema`) VALUES
(1, '2022-09-07 21:28:03', '2022-09-07 16:24:09', '2022-09-10 16:24:09', 'No', 'Prueba');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `creación_sondeo`
--
ALTER TABLE `creación_sondeo`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `creación_sondeo`
--
ALTER TABLE `creación_sondeo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
