-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-01-2018 a las 17:52:04
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mycontacts`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_bin NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_bin NOT NULL,
  `correo` varchar(75) COLLATE utf8_bin NOT NULL,
  `direccion` varchar(100) COLLATE utf8_bin NOT NULL,
  `telf_prim` int(30) NOT NULL,
  `telf_sec` int(30) DEFAULT NULL,
  `ubicacion_prim_lat` double NOT NULL,
  `ubicacion_prim_lon` double NOT NULL,
  `ubicacion_sec_lat` double DEFAULT NULL,
  `ubicacion_sec_lon` double DEFAULT NULL,
  `img` varchar(50) COLLATE utf8_bin NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `nombre`, `apellidos`, `correo`, `direccion`, `telf_prim`, `telf_sec`, `ubicacion_prim_lat`, `ubicacion_prim_lon`, `ubicacion_sec_lat`, `ubicacion_sec_lon`, `img`, `id_usuario`) VALUES
(29, 'nepe', 'andante', 'nepeandane@fje.edu', 'calle falsa', 123123123, 0, 41.32732632036622, 2.098388671875, 0, 0, '', 12),
(34, 'Nicolas Manuel', 'Tapia Segovia', 'nicolinho@gmail.com', 'LH', 976254726, 987436287, 41.74672584176937, 2.4993896484375, NULL, 0, '116446.jpg', 11),
(35, 'David', 'Marin', 'davidmarin@gmail.com', 'LH', 982364823, 927654726, 41.72213058512578, 1.8402099609375, NULL, NULL, 'tonto.jfif', 11),
(36, 'Fernando', 'Costillita', 'costillita@gmail.com', 'nolose', 976921361, 917391863, 41.054501963290505, -0.1318359375, NULL, NULL, '828541448750246-ilusiones-opticas.jpg', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_bin NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_bin NOT NULL,
  `img` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `correo` varchar(75) COLLATE utf8_bin NOT NULL,
  `pass` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellidos`, `img`, `correo`, `pass`) VALUES
(11, 'Carlos', 'Cardenas Reixats', 'mierda3.PNG', '10000734.joan23@fje.edu', '200820e3227815ed1756a6b531e7e0d2'),
(12, 'Marc', 'Calatayud Benaiges', '828541448750246-ilusiones-opticas.jpg', '93458.joan23@fje.edu', '200820e3227815ed1756a6b531e7e0d2');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
