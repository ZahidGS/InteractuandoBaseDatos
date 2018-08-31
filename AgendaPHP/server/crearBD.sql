-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-07-2018 a las 06:38:36
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agenda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(10) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `fechaInicio` date NOT NULL,
  `horaInicio` varchar(8) DEFAULT NULL,
  `fechaFin` date DEFAULT NULL,
  `horaFin` varchar(8) DEFAULT NULL,
  `diaCompleto` tinyint(1) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_evento`, `titulo`, `fechaInicio`, `horaInicio`, `fechaFin`, `horaFin`, `diaCompleto`, `id_usuario`) VALUES
(1, 'inicio vacaciones', '2018-07-13', '', '0000-00-00', '', 0, 1),
(2, 'viaje a la playa', '2018-07-09', '', '0000-00-00', '', 0, 1),
(3, 'regreso a casa', '2018-07-16', '', '0000-00-00', '', 0, 1),
(6, 'comienza trabajo', '2018-07-19', '', '0000-00-00', '', 0, 1),
(7, 'comienza trabajo', '2018-07-19', '07:00', '2018-07-20', '17:00', 0, 3),
(8, 'comienza trabajo', '2018-07-18', '07:00', '2018-07-19', '16:00', 0, 3),
(9, 'pago nomina', '2018-07-30', '', '0000-00-00', '', 0, 3),
(10, 'cumple MAMA', '2018-07-22', '', '0000-00-00', '', 0, 2),
(11, 'conferencias', '2018-07-26', '07:00', '2018-07-27', '17:00', 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nombreCompleto` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fechaNacimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `email`, `nombreCompleto`, `password`, `fechaNacimiento`) VALUES
(1, 'roxy@hotmail.com', 'Roxana YaÃ±ez', '$2y$10$u6zinIuLbiI5ZYL.zpkSm..UuttEvleiUUW3lN1rrTq7I1ki1wJv6', '2000-05-13'),
(2, 'yady@gmail.com', 'Yadira Perez', '$2y$10$HT2ChlNUumZwA90UCaaYxeVf2qdihmINq8JH6JEQ1ZOjhhJZKDWfG', '1960-09-06'),
(3, 'naty@hotmail.com', 'Natalia Reyes', '$2y$10$Rc7ZUbJmX54Ajk8k63ocp.72vsLwnTqQGPHoUpWd2vCKsxqU6NVtq', '2002-02-21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
