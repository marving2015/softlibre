-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-09-2015 a las 03:08:28
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8




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

CREATE TABLE empresario(
	  idempresario int(11) AUTO_INCREMENT PRIMARY KEY,
    nombres varchar(100) not null,
    apellidos varchar(100) not null,
    direccion varchar(100) not null,
    ciudad varchar(100) not null,
    sexo varchar(1) not null,
    telefono varchar(11) not null
);
--
-- Volcado de datos para la tabla `empresario`
--



--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresario`
--


--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empresario`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
