-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-09-2022 a las 05:06:02
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
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `Usuario` varchar(30) NOT NULL,
  `Contraseña` bigint(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`Usuario`, `Contraseña`) VALUES
('192837465', 1234);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inicio_sesión`
--

CREATE TABLE `inicio_sesión` (
  `Número_Documento` int(10) NOT NULL,
  `Contraseña` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inicio_sesión`
--

INSERT INTO `inicio_sesión` (`Número_Documento`, `Contraseña`) VALUES
(1092337120, '221826'),
(122111, 'A0221826');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta_sondeo`
--

CREATE TABLE `pregunta_sondeo` (
  `ID` int(11) NOT NULL,
  `ID_SONDEO` int(11) NOT NULL,
  `Pregunta` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pregunta_sondeo`
--

INSERT INTO `pregunta_sondeo` (`ID`, `ID_SONDEO`, `Pregunta`) VALUES
(1, 1, '¿Te gusta cómo está quedando?'),
(2, 1, '¿Qué te pareció el evento?'),
(3, 1, 'Azul o Rojo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas_preguntas_sondeo`
--

CREATE TABLE `respuestas_preguntas_sondeo` (
  `ID` int(11) NOT NULL,
  `ID_Pregunta` int(11) NOT NULL,
  `Respuesta` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `respuestas_preguntas_sondeo`
--

INSERT INTO `respuestas_preguntas_sondeo` (`ID`, `ID_Pregunta`, `Respuesta`) VALUES
(1, 1, 'Si'),
(2, 1, 'No'),
(3, 1, 'Tal vez'),
(4, 3, 'Azul'),
(5, 3, 'Rojo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas_usuario`
--

CREATE TABLE `respuestas_usuario` (
  `ID` int(11) NOT NULL,
  `ID_SONDEO` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `ID_Pregunta` int(11) NOT NULL,
  `Respuesta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `respuestas_usuario`
--

INSERT INTO `respuestas_usuario` (`ID`, `ID_SONDEO`, `ID_USUARIO`, `ID_Pregunta`, `Respuesta`) VALUES
(8, 1, 1092337120, 1, 'Tal vez'),
(9, 1, 1092337120, 2, 'Pastel'),
(10, 1, 1092337120, 3, 'Rojo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Tipo_Documento` varchar(32) NOT NULL,
  `Número de Documento` int(10) NOT NULL,
  `Nombres Completos` varchar(50) NOT NULL,
  `Apellidos` varchar(50) NOT NULL,
  `Sexo` varchar(20) NOT NULL,
  `Teléfono_Celular` bigint(12) NOT NULL,
  `Teléfono_Fijo` bigint(8) NOT NULL,
  `Correo_Electrónico` varchar(50) NOT NULL,
  `Municipio` varchar(30) NOT NULL,
  `Dirección` varchar(30) NOT NULL,
  `Barrio-Vereda` varchar(20) NOT NULL,
  `Fecha_Nacimiento` date NOT NULL,
  `Etnia` varchar(20) NOT NULL,
  `Condición_Discapacidad` varchar(30) NOT NULL,
  `Estrato_Residencia` tinyint(4) NOT NULL,
  `U_Nivel_Educativo` varchar(30) NOT NULL,
  `Acceso_Dispositivos_E` char(2) NOT NULL,
  `Dispositivos_Tecnológicos` int(11) NOT NULL,
  `Conectividad_Internet` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Tipo_Documento`, `Número de Documento`, `Nombres Completos`, `Apellidos`, `Sexo`, `Teléfono_Celular`, `Teléfono_Fijo`, `Correo_Electrónico`, `Municipio`, `Dirección`, `Barrio-Vereda`, `Fecha_Nacimiento`, `Etnia`, `Condición_Discapacidad`, `Estrato_Residencia`, `U_Nivel_Educativo`, `Acceso_Dispositivos_E`, `Dispositivos_Tecnológicos`, `Conectividad_Internet`) VALUES
('Cédula de ciudadanía', 122111, 'Daniel', 'C', 'Hombre', 3214456148, 5708490, 'jdjacome02@gmail.com', 'Norte', 'Calle 4 # 15-62', 'Turbay', '2004-03-25', 's', 's', 1, 'Bachillerato', 'no', 0, 'si'),
('Cédula de ciudadanía', 1092337120, 'Josep', 'Jacome', 'Hombre', 3214456148, 5708490, 'jdjacome02@gmail.com', 'Norte', 'Calle 4 # 15-62', 'Turbay', '2004-04-25', 'NO', 'NO', 1, 'Bachillerato', 'no', 0, 'si');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`Usuario`);

--
-- Indices de la tabla `creación_sondeo`
--
ALTER TABLE `creación_sondeo`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `inicio_sesión`
--
ALTER TABLE `inicio_sesión`
  ADD KEY `usuario_inicio` (`Número_Documento`);

--
-- Indices de la tabla `pregunta_sondeo`
--
ALTER TABLE `pregunta_sondeo`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `pregunta` (`ID_SONDEO`);

--
-- Indices de la tabla `respuestas_preguntas_sondeo`
--
ALTER TABLE `respuestas_preguntas_sondeo`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Pregunta` (`ID_Pregunta`);

--
-- Indices de la tabla `respuestas_usuario`
--
ALTER TABLE `respuestas_usuario`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `ID_Pregunta` (`ID_Pregunta`),
  ADD KEY `ID_SONDEO` (`ID_SONDEO`),
  ADD KEY `ID_USUARIO` (`ID_USUARIO`),
  ADD KEY `ID_Pregunta_2` (`ID_Pregunta`),
  ADD KEY `ID_SONDEO_2` (`ID_SONDEO`),
  ADD KEY `ID_USUARIO_2` (`ID_USUARIO`),
  ADD KEY `ID_Pregunta_3` (`ID_Pregunta`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Número de Documento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `creación_sondeo`
--
ALTER TABLE `creación_sondeo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pregunta_sondeo`
--
ALTER TABLE `pregunta_sondeo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `respuestas_preguntas_sondeo`
--
ALTER TABLE `respuestas_preguntas_sondeo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `respuestas_usuario`
--
ALTER TABLE `respuestas_usuario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inicio_sesión`
--
ALTER TABLE `inicio_sesión`
  ADD CONSTRAINT `usuario_inicio` FOREIGN KEY (`Número_Documento`) REFERENCES `usuario` (`Número de Documento`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pregunta_sondeo`
--
ALTER TABLE `pregunta_sondeo`
  ADD CONSTRAINT `pregunta` FOREIGN KEY (`ID_SONDEO`) REFERENCES `creación_sondeo` (`ID`);

--
-- Filtros para la tabla `respuestas_preguntas_sondeo`
--
ALTER TABLE `respuestas_preguntas_sondeo`
  ADD CONSTRAINT `respuesta` FOREIGN KEY (`ID_Pregunta`) REFERENCES `pregunta_sondeo` (`ID`);

--
-- Filtros para la tabla `respuestas_usuario`
--
ALTER TABLE `respuestas_usuario`
  ADD CONSTRAINT `sondeo` FOREIGN KEY (`ID_SONDEO`) REFERENCES `creación_sondeo` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `usuario` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`Número de Documento`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
