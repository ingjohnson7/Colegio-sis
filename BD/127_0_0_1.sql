-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-04-2017 a las 03:26:11
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 7.0.8

--
-- Created by Fabian Johnson
--
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `colegio`
--
CREATE DATABASE IF NOT EXISTS `colegio` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `colegio`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `buzon_maestro`
--

CREATE TABLE `buzon_maestro` (
  `IdMensaje` int(11) NOT NULL,
  `IdEstudiante` varchar(20) NOT NULL,
  `IdClase` varchar(20) NOT NULL,
  `Asunto` varchar(150) NOT NULL,
  `Cuerpo` text NOT NULL,
  `Fecha` date NOT NULL,
  `Visto` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `buzon_maestro`
--

INSERT INTO `buzon_maestro` (`IdMensaje`, `IdEstudiante`, `IdClase`, `Asunto`, `Cuerpo`, `Fecha`, `Visto`) VALUES
(1, '0', '0', 'EXAMEN 3', 'Le escribo para saber q que hora sera el examen', '2017-02-27', 0),
(2, '12', '0', 'EXAMEN 4', 'Quisiera saber para cuando es la entrega final.', '2017-02-27', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `IdEstudiante` varchar(30) NOT NULL,
  `IdClase` varchar(60) NOT NULL,
  `Nota1` int(11) NOT NULL,
  `Nota2` int(11) NOT NULL,
  `Asistencia` int(11) NOT NULL,
  `NotaFinal` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calificacion`
--

INSERT INTO `calificacion` (`IdEstudiante`, `IdClase`, `Nota1`, `Nota2`, `Asistencia`, `NotaFinal`) VALUES
('12', '8', 90, 0, 0, 0),
('9', '8', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase`
--

CREATE TABLE `clase` (
  `ID` int(11) NOT NULL,
  `Maestro` varchar(40) NOT NULL,
  `Materia` varchar(60) NOT NULL,
  `Horario` varchar(45) NOT NULL,
  `Estudiantes` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clase`
--

INSERT INTO `clase` (`ID`, `Maestro`, `Materia`, `Horario`, `Estudiantes`) VALUES
(2, 'Marcos Mantinez', 'Lengua I', 'L8:40,MA9:00', 1),
(3, 'Mateo Cortez', 'Ciencia I', 'L8:00,MI8:00', 1),
(4, 'Jordan Martinez', 'Historia I', 'MA8:00,J8:00', 2),
(5, 'Fernando Jerez', 'Matematica I', 'L10:00,M10:00', 1),
(6, 'Martha Baez', 'Naturales I', 'MA9:00,J9:00', 1),
(7, 'Marcos Mantinez', 'Lengua II', 'MA8:00,J8:00', 0),
(8, 'Chris Bryan', 'Ciencia I', 'L8:00,M8;00', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `Nombre` varchar(30) NOT NULL,
  `Capasidad` varchar(20) NOT NULL,
  `Piso` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(30) NOT NULL,
  `Sexo` varchar(10) NOT NULL,
  `Puesto` varchar(30) NOT NULL,
  `Cedula` varchar(20) NOT NULL,
  `Direccion` varchar(60) NOT NULL,
  `FechaNacimiento` varchar(40) NOT NULL,
  `Sueldo` int(10) NOT NULL,
  `Nacionalidad` varchar(20) NOT NULL,
  `Telefono` varchar(11) NOT NULL,
  `Celular` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`ID`, `Nombre`, `Apellido`, `Sexo`, `Puesto`, `Cedula`, `Direccion`, `FechaNacimiento`, `Sueldo`, `Nacionalidad`, `Telefono`, `Celular`) VALUES
(1, 'ssss', 'ooooo', '', 'aaaa', '01010101001', 'jkkhjk', 'sssss', 11000, 'hhh', '800808', '48048084');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(25) NOT NULL,
  `Apellido` varchar(25) NOT NULL,
  `Sexo` varchar(10) NOT NULL,
  `Curso` varchar(10) NOT NULL,
  `Padre` varchar(35) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Celular` varchar(15) NOT NULL,
  `Direccion` varchar(75) NOT NULL,
  `Nacionalidad` varchar(30) NOT NULL,
  `FechaNacimiento` varchar(60) NOT NULL,
  `Correo` varchar(60) NOT NULL,
  `Codigo` varchar(15) NOT NULL,
  `Clave` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`ID`, `Nombre`, `Apellido`, `Sexo`, `Curso`, `Padre`, `Telefono`, `Celular`, `Direccion`, `Nacionalidad`, `FechaNacimiento`, `Correo`, `Codigo`, `Clave`) VALUES
(9, 'Juan', 'Perez', 'Masculino', '1ro', 'Maria Juana', '8092213242', '8097763245', 'Villa Juana', 'DOM', '02-03-1998', 'juanperez@gmail.com', '', ''),
(11, 'Bernardo', 'Mendez', 'Masculino', '2do', 'Bernardo Mendez', '8093277698', '8099807787', 'Av. Las americas #112', 'DOM', '21-09-1995', 'bernarmendez@gmail.com', '', ''),
(12, 'Juan', 'Lagares', 'Masculino', '4t0', 'Ninguno', '8090001111', '8093214422', 'Jamasa', 'DOM', '14-05-1989', 'juanlagares@gmail.com', 'EST007', 'e10adc3949ba59abbe56e057f20f883e'),
(13, 'Mercedes', 'Jerez', 'Masculino', '2do', 'Maria', '8092311322', '8099807787', 'Los guaricanos #111', 'DOM', '02-03-1998', 'suplidoresperez@gmail.com', 'EST008', 'e10adc3949ba59abbe56e057f20f883e'),
(14, 'Marcianito', 'Mercino', 'Masculino', '1ro', 'Merciana', '222222222', '111111111', 'La luna de pluton', 'Extraterrestre', '2007-01-10', 'marcianito@ggmm.com', 'EST020', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `ID` int(11) NOT NULL,
  `IdClase` int(11) NOT NULL,
  `IdEstudiante` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`ID`, `IdClase`, `IdEstudiante`) VALUES
(15, 6, 1),
(13, 4, 1),
(14, 5, 1),
(11, 3, 1),
(10, 2, 1),
(16, 8, 12),
(17, 8, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestro`
--

CREATE TABLE `maestro` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(30) NOT NULL,
  `Sexo` varchar(10) NOT NULL,
  `Cedula` varchar(11) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Celular` varchar(15) NOT NULL,
  `Direccion` varchar(75) NOT NULL,
  `Nacionalidad` varchar(50) NOT NULL,
  `FechaNacimiento` varchar(60) NOT NULL,
  `Correo` varchar(60) NOT NULL,
  `Codigo` varchar(15) NOT NULL,
  `Clave` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `maestro`
--

INSERT INTO `maestro` (`ID`, `Nombre`, `Apellido`, `Sexo`, `Cedula`, `Telefono`, `Celular`, `Direccion`, `Nacionalidad`, `FechaNacimiento`, `Correo`, `Codigo`, `Clave`) VALUES
(7, 'Chris', 'Bryan', 'Masculino', '00111132234', '8092213242', '8293324508', 'Los guaricanos #111', 'DOM', '12-4-1991', 'ian2134@gmail.com', 'MAE023', 'e10adc3949ba59abbe56e057f20f883e'),
(8, 'AAAAAAAa', 'DDDDDDddd', 'Masculino', '10109876541', '8092213242', '8293324508', 'Los alcarrizos', 'DOM', '12-4-1991', 'ian2134@gmail.com', 'MAE144', 'e10adc3949ba59abbe56e057f20f883e'),
(1, 'Marcos', 'Mantinez', 'M', '10109876541', '8092213242', '8097763245', 'Los alcarrizos', 'DOM', '12-4-1991', 'suplidoresperez@gmail.com', 'MAE212', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'Jordan', 'Martinez', 'Masculino', '00133244229', '8092213412', '8293144415', 'C/ los proceres #41', 'DOM', '13-12-1989', 'martinezjordan1@gmail.com', 'MAE213', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'Fernando', 'Jerez', 'Masculino', '10109876541', '8092311322', '8097763245', 'Los guaricanos #111', 'DOM', '12-4-1991', 'suplidoresperez@gmail.com', 'MAE222', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'Martha', 'Baez', 'Femenino', '00111132234', '8093425545', '8098898764', 'Los alcarrizos', 'DOM', '01-01-1990', 'marthabaez@gmail.com', 'MAE224', 'e10adc3949ba59abbe56e057f20f883e'),
(5, 'Rosa', 'Rios', 'Femenino', '02398799876', '8093425545', '8099807787', 'Villa Juana', 'DOM', '04-01-1992', 'rosarios@gmail.com', 'MAE227', 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'Mateo', 'Cortez', 'Masculino', '02345633441', '8098245546', '8098876655', 'Villas agricolas', 'DOM', '03-09-1985', 'mateocortez@gmail.com', 'MAE229', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `Nombre` varchar(30) NOT NULL,
  `Codigo` varchar(20) NOT NULL,
  `Curso` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`Nombre`, `Codigo`, `Curso`) VALUES
('Ciencia I', 'CIE001', '1ro'),
('Ciencia II', 'CIE002', '2do'),
('Lengua I', 'ESP001', '1ro'),
('Lengua II', 'ESP002', '2do'),
('Historia I', 'HIS001', '1r0'),
('Historia II', 'HIS002', '2do'),
('Matematica I', 'MAT001', '1ro'),
('Matematica II', 'MAT002', '2do'),
('Naturales I', 'NAT001', '1ro'),
('Naturales II', 'NAT002', '2do');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `Codigo` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `PrecioCompra` float NOT NULL,
  `PrecioVenta` int(11) NOT NULL,
  `Cantidad` varchar(20) NOT NULL,
  `Descripcion` varchar(400) NOT NULL,
  `Suplidor` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`Codigo`, `Nombre`, `PrecioCompra`, `PrecioVenta`, `Cantidad`, `Descripcion`, `Suplidor`) VALUES
(1, 'Hoja de papel', 0.5, 0, '2000', 'Hojas de papel blanco', 'Suplidores Perez SRL.'),
(2, 'Borrador de tiza', 45, 0, '60', 'Borrador para pizarra de tiza.', 'Copiadora Felix');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prueba`
--

CREATE TABLE `prueba` (
  `ID_prueba` int(11) NOT NULL,
  `ID_clase` int(11) NOT NULL,
  `Titulo` varchar(150) NOT NULL,
  `P1` varchar(200) DEFAULT NULL,
  `R1` varchar(20) DEFAULT NULL,
  `P2` varchar(200) DEFAULT NULL,
  `R2` varchar(20) DEFAULT NULL,
  `P3` varchar(200) DEFAULT NULL,
  `R3` varchar(20) DEFAULT NULL,
  `P4` varchar(200) DEFAULT NULL,
  `R4` varchar(20) DEFAULT NULL,
  `P5` varchar(200) DEFAULT NULL,
  `R5` varchar(20) DEFAULT NULL,
  `P6` varchar(200) DEFAULT NULL,
  `R6` varchar(20) DEFAULT NULL,
  `P7` varchar(200) DEFAULT NULL,
  `R7` varchar(20) DEFAULT NULL,
  `P8` varchar(200) DEFAULT NULL,
  `R8` varchar(20) DEFAULT NULL,
  `P9` varchar(200) DEFAULT NULL,
  `R9` varchar(20) DEFAULT NULL,
  `P10` varchar(200) DEFAULT NULL,
  `R10` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados_prueba`
--

CREATE TABLE `resultados_prueba` (
  `ID_prueba` int(11) NOT NULL,
  `ID_estudiante` int(11) NOT NULL,
  `R1` int(11) NOT NULL,
  `R2` int(11) NOT NULL,
  `R3` int(11) NOT NULL,
  `R4` int(11) NOT NULL,
  `R5` int(11) NOT NULL,
  `R6` int(11) NOT NULL,
  `R7` int(11) NOT NULL,
  `R8` int(11) NOT NULL,
  `R9` int(11) NOT NULL,
  `R10` int(11) NOT NULL,
  `Nota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `resultados_prueba`
--

INSERT INTO `resultados_prueba` (`ID_prueba`, `ID_estudiante`, `R1`, `R2`, `R3`, `R4`, `R5`, `R6`, `R7`, `R8`, `R9`, `R10`, `Nota`) VALUES
(3, 12, 10, 10, 10, 10, 10, 10, 10, 10, 10, 0, 90);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suplidor`
--

CREATE TABLE `suplidor` (
  `Codigo` int(11) NOT NULL,
  `Nombre` varchar(70) NOT NULL,
  `RNC` varchar(11) NOT NULL,
  `Telefono` varchar(11) NOT NULL,
  `Correo` varchar(60) NOT NULL,
  `Direccion` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `suplidor`
--

INSERT INTO `suplidor` (`Codigo`, `Nombre`, `RNC`, `Telefono`, `Correo`, `Direccion`) VALUES
(1, 'Materiales gastables perez SRL.', '101324555', '8094075423', 'suplidoresperez@gmail.com', 'los fralies 2do'),
(2, 'Copiadora Felix', '123321123', '8097861232', 'copiadorafelix@gmail.com', 'Av. Duarte #53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `webmaster`
--

CREATE TABLE `webmaster` (
  `ID` int(11) NOT NULL,
  `Codigo` varchar(15) NOT NULL,
  `Clave` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `webmaster`
--

INSERT INTO `webmaster` (`ID`, `Codigo`, `Clave`) VALUES
(1, 'saitama', '3bccba45b8189496b768338ccce44e37');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `buzon_maestro`
--
ALTER TABLE `buzon_maestro`
  ADD PRIMARY KEY (`IdMensaje`);

--
-- Indices de la tabla `clase`
--
ALTER TABLE `clase`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `maestro`
--
ALTER TABLE `maestro`
  ADD PRIMARY KEY (`Codigo`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `prueba`
--
ALTER TABLE `prueba`
  ADD PRIMARY KEY (`ID_prueba`);

--
-- Indices de la tabla `resultados_prueba`
--
ALTER TABLE `resultados_prueba`
  ADD PRIMARY KEY (`ID_estudiante`);

--
-- Indices de la tabla `suplidor`
--
ALTER TABLE `suplidor`
  ADD PRIMARY KEY (`Codigo`);

--
-- Indices de la tabla `webmaster`
--
ALTER TABLE `webmaster`
  ADD PRIMARY KEY (`Codigo`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `buzon_maestro`
--
ALTER TABLE `buzon_maestro`
  MODIFY `IdMensaje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `clase`
--
ALTER TABLE `clase`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `maestro`
--
ALTER TABLE `maestro`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `prueba`
--
ALTER TABLE `prueba`
  MODIFY `ID_prueba` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `suplidor`
--
ALTER TABLE `suplidor`
  MODIFY `Codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `webmaster`
--
ALTER TABLE `webmaster`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
