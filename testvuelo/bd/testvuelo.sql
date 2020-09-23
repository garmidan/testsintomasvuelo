-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-09-2020 a las 19:35:40
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `testvuelo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntastest`
--

CREATE TABLE `preguntastest` (
  `idtest` int(11) NOT NULL,
  `pregunta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `preguntastest`
--

INSERT INTO `preguntastest` (`idtest`, `pregunta`) VALUES
(1, '¿Malestar general y dolor muscular que te limite las actividades de la vida diaria?'),
(2, '¿Dificultad para respirar o sensación de falta de aire?'),
(3, '¿Fiebre mayor a 38°?'),
(4, '¿Dolor o presión en el pecho?'),
(5, '¿Tos seca?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodocumento`
--

CREATE TABLE `tipodocumento` (
  `iddocumento` int(11) NOT NULL,
  `tipodocumento` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipodocumento`
--

INSERT INTO `tipodocumento` (`iddocumento`, `tipodocumento`) VALUES
(1, 'C.C'),
(2, 'C.E'),
(3, 'P.E'),
(4, 'T.I');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nombres` varchar(80) NOT NULL,
  `apellidos` varchar(80) NOT NULL,
  `iddocumento` int(11) NOT NULL,
  `numerodocumento` varchar(20) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `fechaprueba` datetime DEFAULT NULL,
  `celular` varchar(20) NOT NULL,
  `codigoqr` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombres`, `apellidos`, `iddocumento`, `numerodocumento`, `correo`, `fechaprueba`, `celular`, `codigoqr`) VALUES
(14, 'Daniel', 'Miranda', 1, '1109422577', 'garmidan16@gmail.com', '2020-09-22 23:30:10', '3144097493', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `preguntastest`
--
ALTER TABLE `preguntastest`
  ADD PRIMARY KEY (`idtest`);

--
-- Indices de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  ADD PRIMARY KEY (`iddocumento`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `iddocumento` (`iddocumento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `preguntastest`
--
ALTER TABLE `preguntastest`
  MODIFY `idtest` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipodocumento`
--
ALTER TABLE `tipodocumento`
  MODIFY `iddocumento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`iddocumento`) REFERENCES `tipodocumento` (`iddocumento`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
