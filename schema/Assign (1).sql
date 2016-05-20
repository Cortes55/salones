-- phpMyAdmin SQL Dump
-- version 4.6.0
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 15-05-2016 a las 08:25:04
-- Versión del servidor: 5.7.11
-- Versión de PHP: 5.5.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Assign`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Asignadas`
--

CREATE TABLE `Asignadas` (
  `AId` int(11) NOT NULL,
  `Day` varchar(20) NOT NULL,
  `Class` int(11) NOT NULL,
  `Teacher` int(11) NOT NULL,
  `Block` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Asignadas`
--

INSERT INTO `Asignadas` (`AId`, `Day`, `Class`, `Teacher`, `Block`) VALUES
(1, 'Lunes', 1, 1, 1),
(2, 'Martes', 1, 2, 1),
(3, 'Lunes', 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Datos`
--

CREATE TABLE `Datos` (
  `teacherId` int(11) NOT NULL,
  `teacher` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Datos`
--

INSERT INTO `Datos` (`teacherId`, `teacher`, `class`) VALUES
(1, 'Miguel Guirao', 'Paradigmas'),
(2, 'Jorge Rivera', 'Moviles'),
(3, 'Ricardo Terrazo', 'Sistemas Operativos'),
(4, 'Ricardo Terrazo', 'Diseño de Videojuegos'),
(5, 'Patricia Ortegon', 'Software'),
(6, 'Luciano Dominguez', 'Matematicas Superiores'),
(7, 'Lunes', '1'),
(8, 'Martes', '1'),
(9, 'Martes', '1'),
(10, 'Martes', '1'),
(11, 'Martes', '1'),
(12, 'Lunes', '1'),
(13, 'Lunes', '1'),
(14, 'Lunes', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Horario`
--

CREATE TABLE `Horario` (
  `Block` int(11) NOT NULL,
  `Start` time NOT NULL,
  `End` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Horario`
--

INSERT INTO `Horario` (`Block`, `Start`, `End`) VALUES
(1, '07:00:00', '08:30:00'),
(2, '09:00:00', '10:30:00'),
(3, '10:45:00', '12:15:00'),
(4, '12:30:00', '02:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Salon`
--

CREATE TABLE `Salon` (
  `id` int(11) NOT NULL,
  `classNumber` int(11) NOT NULL,
  `building` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Salon`
--

INSERT INTO `Salon` (`id`, `classNumber`, `building`) VALUES
(1, 6010, '6'),
(2, 5020, '5'),
(3, 3010, '3');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Asignadas`
--
ALTER TABLE `Asignadas`
  ADD PRIMARY KEY (`AId`);

--
-- Indices de la tabla `Datos`
--
ALTER TABLE `Datos`
  ADD PRIMARY KEY (`teacherId`);

--
-- Indices de la tabla `Horario`
--
ALTER TABLE `Horario`
  ADD PRIMARY KEY (`Block`);

--
-- Indices de la tabla `Salon`
--
ALTER TABLE `Salon`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Asignadas`
--
ALTER TABLE `Asignadas`
  MODIFY `AId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `Datos`
--
ALTER TABLE `Datos`
  MODIFY `teacherId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `Salon`
--
ALTER TABLE `Salon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
