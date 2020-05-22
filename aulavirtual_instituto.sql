-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 22-05-2020 a las 09:38:53
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aulavirtual_instituto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `Id_Alumno` int(3) NOT NULL,
  `Nombre` varchar(150) NOT NULL,
  `Apellido1` varchar(150) NOT NULL,
  `Apellido2` varchar(150) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Nom_Usu` varchar(150) NOT NULL,
  `Contraseña` varchar(150) NOT NULL,
  `Rol` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `Id_Asignatura` int(3) NOT NULL,
  `Nombre_Asignatura` varchar(150) NOT NULL,
  `Horas_Semanales` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`Id_Asignatura`, `Nombre_Asignatura`, `Horas_Semanales`) VALUES
(1, 'D.W.E.S', 6),
(2, 'D.I.W', 6),
(3, 'D.W.E.C', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faltas`
--

CREATE TABLE `faltas` (
  `Id_Falta` int(3) NOT NULL,
  `Id_Alumno` int(3) NOT NULL,
  `Id_Asignatura` int(3) NOT NULL,
  `Fecha_Hora` datetime NOT NULL,
  `Año_Academico` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impartir`
--

CREATE TABLE `impartir` (
  `Id` int(3) NOT NULL,
  `Año_Academico` varchar(150) NOT NULL,
  `Id_Profesor` int(3) NOT NULL,
  `Id_Asignatura` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `Id_Matricula` int(3) NOT NULL,
  `Año_Academico` varchar(150) DEFAULT NULL,
  `Id_Alumno` int(3) NOT NULL,
  `Id_Asignatura` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `Id_Nota` int(3) NOT NULL,
  `Id_Alumno` int(3) NOT NULL,
  `Id_Asignatura` int(3) NOT NULL,
  `Numero` int(2) NOT NULL,
  `Año_Academico` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `Id_Profesor` int(3) NOT NULL,
  `Nombre` varchar(150) NOT NULL,
  `Apellido1` varchar(150) NOT NULL,
  `Apellido2` varchar(150) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Nom_Usu` varchar(150) NOT NULL,
  `Contraseña` varchar(150) NOT NULL,
  `Rol` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `retrasos`
--

CREATE TABLE `retrasos` (
  `Id_Retraso` int(3) NOT NULL,
  `Id_Alumno` int(3) NOT NULL,
  `Id_Asignatura` int(3) NOT NULL,
  `Fecha_Hora` datetime NOT NULL,
  `Año_Academico` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`Id_Alumno`);

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`Id_Asignatura`);

--
-- Indices de la tabla `faltas`
--
ALTER TABLE `faltas`
  ADD PRIMARY KEY (`Id_Falta`),
  ADD KEY `Id_Alumno` (`Id_Alumno`),
  ADD KEY `Id_Asignatura` (`Id_Asignatura`);

--
-- Indices de la tabla `impartir`
--
ALTER TABLE `impartir`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_Asignatura` (`Id_Asignatura`),
  ADD KEY `Id_Profesor` (`Id_Profesor`) USING BTREE;

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`Id_Matricula`),
  ADD KEY `matricular_alumno` (`Id_Alumno`),
  ADD KEY `matricula_asignatura` (`Id_Asignatura`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`Id_Nota`),
  ADD KEY `Id_Alumno` (`Id_Alumno`),
  ADD KEY `Id_Asignatura` (`Id_Asignatura`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`Id_Profesor`);

--
-- Indices de la tabla `retrasos`
--
ALTER TABLE `retrasos`
  ADD PRIMARY KEY (`Id_Retraso`),
  ADD KEY `Id_Alumno` (`Id_Alumno`),
  ADD KEY `Id_Asignatura` (`Id_Asignatura`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `Id_Alumno` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  MODIFY `Id_Asignatura` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `faltas`
--
ALTER TABLE `faltas`
  MODIFY `Id_Falta` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `impartir`
--
ALTER TABLE `impartir`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `Id_Matricula` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `Id_Nota` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `Id_Profesor` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `retrasos`
--
ALTER TABLE `retrasos`
  MODIFY `Id_Retraso` int(3) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `faltas`
--
ALTER TABLE `faltas`
  ADD CONSTRAINT `faltas_ibfk_1` FOREIGN KEY (`Id_Alumno`) REFERENCES `alumnos` (`Id_Alumno`),
  ADD CONSTRAINT `faltas_ibfk_2` FOREIGN KEY (`Id_Asignatura`) REFERENCES `asignaturas` (`Id_Asignatura`);

--
-- Filtros para la tabla `impartir`
--
ALTER TABLE `impartir`
  ADD CONSTRAINT `imaprtir_asignatura` FOREIGN KEY (`Id_Asignatura`) REFERENCES `asignaturas` (`Id_Asignatura`),
  ADD CONSTRAINT `impartir_profesor` FOREIGN KEY (`Id_Profesor`) REFERENCES `profesores` (`Id_Profesor`);

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`Id_Alumno`) REFERENCES `alumnos` (`Id_Alumno`),
  ADD CONSTRAINT `matricula_ibfk_2` FOREIGN KEY (`Id_Asignatura`) REFERENCES `asignaturas` (`Id_Asignatura`);

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`Id_Alumno`) REFERENCES `alumnos` (`Id_Alumno`),
  ADD CONSTRAINT `notas_ibfk_2` FOREIGN KEY (`Id_Asignatura`) REFERENCES `asignaturas` (`Id_Asignatura`);

--
-- Filtros para la tabla `retrasos`
--
ALTER TABLE `retrasos`
  ADD CONSTRAINT `retrasos_ibfk_1` FOREIGN KEY (`Id_Alumno`) REFERENCES `alumnos` (`Id_Alumno`),
  ADD CONSTRAINT `retrasos_ibfk_2` FOREIGN KEY (`Id_Asignatura`) REFERENCES `asignaturas` (`Id_Asignatura`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
