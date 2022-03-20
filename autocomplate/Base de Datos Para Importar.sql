-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-04-2020 a las 11:48:21
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba_ajax`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(120) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(120) COLLATE utf8_bin NOT NULL,
  `telefono` varchar(120) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `nombre`, `apellido`, `telefono`) VALUES
(1, 'Administrador Dostin', 'Hurtado', '111222333'),
(2, 'Administrador Sandy', 'Olivera', '951357852456'),
(3, 'Administrador Oscar', 'Hurtado', '321654987'),
(4, 'Administrador Sandy', 'Olivera', '951357852456'),
(5, 'Administrador Luis', 'Ramirez', '7893121456'),
(6, 'Administrador Dostin', 'Hurtado', '111222333'),
(7, 'Administrador Oscar', 'Hurtado', '321654987'),
(8, 'Administrador Sandy', 'Olivera', '951357852456'),
(9, 'Administrador Luis', 'Ramirez', '7893121456'),
(10, 'Administrador Pablo', 'Serna', '987654258');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(120) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(120) COLLATE utf8_bin NOT NULL,
  `telefono` varchar(120) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `apellido`, `telefono`) VALUES
(1, 'Dostin', 'Hurtado', '111222333'),
(2, 'Sandy', 'Olivera', '951357852456'),
(3, 'Oscar', 'Hurtado', '321654987'),
(4, 'Sandy', 'Olivera', '951357852456'),
(5, 'Luis', 'Ramirez', '7893121456'),
(6, 'Dostin', 'Hurtado', '111222333'),
(7, 'Oscar', 'Hurtado', '321654987'),
(8, 'Sandy', 'Olivera', '951357852456'),
(9, 'Luis', 'Ramirez', '7893121456'),
(10, 'Pablo', 'Serna', '987654258');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio1`
--

CREATE TABLE `ejercicio1` (
  `id` int(11) NOT NULL,
  `nombre` varchar(120) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(120) COLLATE utf8_bin NOT NULL,
  `telefono` varchar(120) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `ejercicio1`
--

INSERT INTO `ejercicio1` (`id`, `nombre`, `apellido`, `telefono`) VALUES
(1, 'Dostin', 'Hurtado', '111222333'),
(3, 'Oscar', 'Hurtado', '321654987'),
(4, 'Sandy', 'Olivera', '951357852456'),
(5, 'Luis', 'Ramirez', '7893121456'),
(6, 'Pablo', 'Serna', '987654258');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(120) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(120) COLLATE utf8_bin NOT NULL,
  `telefono` varchar(120) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `nombre`, `apellido`, `telefono`) VALUES
(1, 'Empleado Dostin', 'Hurtado', '111222333'),
(2, 'Empleado Sandy', 'Olivera', '951357852456'),
(3, 'Empleado Oscar', 'Hurtado', '321654987'),
(4, 'Empleado Sandy', 'Olivera', '951357852456'),
(5, 'Empleado Luis', 'Ramirez', '7893121456'),
(6, 'Empleado Dostin', 'Hurtado', '111222333'),
(7, 'Empleado Oscar', 'Hurtado', '321654987'),
(8, 'Empleado Sandy', 'Olivera', '951357852456'),
(9, 'Empleado Luis', 'Ramirez', '7893121456'),
(10, 'Empleado Pablo', 'Serna', '987654258');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ejercicio1`
--
ALTER TABLE `ejercicio1`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `ejercicio1`
--
ALTER TABLE `ejercicio1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
