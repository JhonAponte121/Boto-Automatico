-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 30-11-2020 a las 05:38:31
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_final`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `candidatos`
--

CREATE TABLE `candidatos` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Apellido` varchar(100) DEFAULT NULL,
  `Partido` varchar(200) DEFAULT NULL,
  `Puesto` varchar(200) DEFAULT NULL,
  `Foto` varchar(500) NOT NULL,
  `Estado` bit(1) DEFAULT NULL,
  `voto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudadanos`
--

CREATE TABLE `ciudadanos` (
  `Identidad` varchar(15) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Apellido` varchar(100) DEFAULT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `Estado` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ciudadanos`
--

INSERT INTO `ciudadanos` (`Identidad`, `Nombre`, `Apellido`, `Email`, `Estado`) VALUES
('1', 'lucas', 'muji', 'asdf@asdf.asdf', b'1'),
('40209488671', 'Ismael Francisco', 'Santana Borgess', 'ismael@gmail.com', b'1'),
('40209488672', 'Maria', 'Lopez', 'maria@gmail.com', b'1'),
('40209488673', 'Lucas', 'Borges', 'bor@gmail.com', b'0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partido`
--

CREATE TABLE `partido` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(150) DEFAULT NULL,
  `Descripcion` varchar(400) DEFAULT NULL,
  `Logo_Partido` varchar(500) NOT NULL,
  `Estado` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `partido`
--

INSERT INTO `partido` (`Id`, `Nombre`, `Descripcion`, `Logo_Partido`, `Estado`) VALUES
(1, 'asdf', 'fdsa', '1.', b'1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto_electivo`
--

CREATE TABLE `puesto_electivo` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(400) DEFAULT NULL,
  `Estado` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votos`
--

CREATE TABLE `votos` (
  `id` int(11) NOT NULL,
  `voto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `candidatos`
--
ALTER TABLE `candidatos`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `ciudadanos`
--
ALTER TABLE `ciudadanos`
  ADD PRIMARY KEY (`Identidad`);

--
-- Indices de la tabla `partido`
--
ALTER TABLE `partido`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `puesto_electivo`
--
ALTER TABLE `puesto_electivo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `votos`
--
ALTER TABLE `votos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `candidatos`
--
ALTER TABLE `candidatos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `partido`
--
ALTER TABLE `partido`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `puesto_electivo`
--
ALTER TABLE `puesto_electivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `votos`
--
ALTER TABLE `votos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
