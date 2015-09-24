-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-09-2015 a las 03:08:28
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `parcialmvc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresario`
--

CREATE TABLE IF NOT EXISTS `empresario` (
  `idempresario` int(11) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `telefono` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresario`
--

INSERT INTO `empresario` (`idempresario`, `nombres`, `apellidos`, `direccion`, `ciudad`, `sexo`, `telefono`) VALUES
(1, 'Bonnie', 'Porter', 'Na Kae', 'San Salvador', 'F', '610-83-2556'),
(2, 'Samuel', 'Moore', 'Uberaba', 'Santa Ana', 'M', '670-75-5396'),
(3, 'Lois', 'Mason', 'Hujia', 'San Vicente', 'F', '298-42-2736'),
(4, 'Ryan', 'Patterson', 'Liushui', 'San Salvador', 'M', '112-28-8714'),
(5, 'Jessica', 'Reid', 'Jiuxian', 'Santa Ana', 'F', '193-61-0516'),
(6, 'Denise', 'Stone', 'Kafue', 'San Vicente', 'F', '574-65-6973'),
(7, 'Harry', 'Lee', 'Alicia', 'San Salvador', 'M', '302-95-7907'),
(8, 'Fred', 'Welch', 'Braknec', 'Santa Ana', 'M', '574-65-6974'),
(9, 'Todd', 'Castillo', 'Zbraslav', 'San Vicente', 'M', '168-05-6765'),
(10, 'Mary', 'Montgomery', 'Huiwan', 'San Salvador', 'F', '874-22-4709');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresario`
--
ALTER TABLE `empresario`
  ADD PRIMARY KEY (`idempresario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresario`
--
ALTER TABLE `empresario`
  MODIFY `idempresario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
