-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-03-2026 a las 00:10:37
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `optica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `est_id` int(11) NOT NULL,
  `est_nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`est_id`, `est_nombre`) VALUES
(1, 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estrato`
--

CREATE TABLE `estrato` (
  `estr_id` int(11) NOT NULL,
  `estr_nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estrato`
--

INSERT INTO `estrato` (`estr_id`, `estr_nombre`) VALUES
(1, 'estrato 1'),
(2, 'estrato 2'),
(3, 'estrato 3'),
(4, 'estrato 4'),
(5, 'estrato 5'),
(6, 'estrato 6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `gen_id` int(11) NOT NULL,
  `gen_nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`gen_id`, `gen_nombre`) VALUES
(1, 'Masculino'),
(2, 'Femenino'),
(3, 'otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historias`
--

CREATE TABLE `historias` (
  `hist_id` int(11) NOT NULL,
  `hist_motv` text NOT NULL,
  `hist_esfod` varchar(50) DEFAULT NULL,
  `hist_cilod` varchar(50) DEFAULT NULL,
  `hist_ejeod` varchar(50) NOT NULL,
  `hist_diaod` varchar(50) DEFAULT NULL,
  `hist_diaoi` varchar(50) DEFAULT NULL,
  `hist_recom` text NOT NULL,
  `pac_id` int(11) DEFAULT NULL,
  `hist_esfoi` varchar(50) NOT NULL,
  `hist_ciloi` varchar(50) NOT NULL,
  `hist_ejeoi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historias`
--

INSERT INTO `historias` (`hist_id`, `hist_motv`, `hist_esfod`, `hist_cilod`, `hist_ejeod`, `hist_diaod`, `hist_diaoi`, `hist_recom`, `pac_id`, `hist_esfoi`, `hist_ciloi`, `hist_ejeoi`) VALUES
(2, 'irritacion de ojos', '-5.00', '-0.50', '180', 'asigmastismo leve', 'sin patologia', 'usar gafas y gotas de ojos', 2, '-4.00', '-0.25', '180'),
(4, 'irritacion', '-5.00', '-0.50', '180', 'asigmastismo leve', 'sin patologia', 'usar gafas', 4, '-4.00', '-0.25', '180');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hobbies`
--

CREATE TABLE `hobbies` (
  `hob_id` int(11) NOT NULL,
  `hob_nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `hobbies`
--

INSERT INTO `hobbies` (`hob_id`, `hob_nombre`) VALUES
(1, 'ir al cine'),
(2, 'playa'),
(3, 'comida');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `pac_id` int(11) NOT NULL,
  `pac_documento` varchar(20) NOT NULL,
  `pac_nombre` varchar(50) DEFAULT NULL,
  `pac_apellido` varchar(50) DEFAULT NULL,
  `pac_direccion` varchar(70) DEFAULT NULL,
  `pac_telefono` bigint(20) DEFAULT NULL,
  `pac_correo` varchar(100) NOT NULL,
  `gen_id` int(11) NOT NULL,
  `estr_id` int(11) DEFAULT NULL,
  `estado` enum('Activo','Inactivo') DEFAULT 'Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`pac_id`, `pac_documento`, `pac_nombre`, `pac_apellido`, `pac_direccion`, `pac_telefono`, `pac_correo`, `gen_id`, `estr_id`, `estado`) VALUES
(2, '10000000001', 'daniel', 'torres', 'carrera 72', 31253784950, 'daniel@correo.com', 1, 2, 'Inactivo'),
(4, '1000000002', 'bianca', 'troches', 'carrera 74', 3145627398, 'bianca@correo.com', 2, 3, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes hobbies`
--

CREATE TABLE `pacientes hobbies` (
  `pac_hob_id` int(11) NOT NULL,
  `pac_id` int(11) DEFAULT NULL,
  `hod_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `rol_id` int(11) NOT NULL,
  `rol_nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`rol_id`, `rol_nombre`) VALUES
(1, 'Administrador'),
(2, 'optometra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usu_id` int(11) NOT NULL,
  `usu_docum` int(11) NOT NULL,
  `usu_password` varchar(20) NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_docum`, `usu_password`, `rol_id`) VALUES
(1, 1059238177, '1234', 1),
(2, 1000000007, '4321', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`est_id`);

--
-- Indices de la tabla `estrato`
--
ALTER TABLE `estrato`
  ADD PRIMARY KEY (`estr_id`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`gen_id`);

--
-- Indices de la tabla `historias`
--
ALTER TABLE `historias`
  ADD PRIMARY KEY (`hist_id`),
  ADD UNIQUE KEY `hist_recom` (`hist_recom`) USING HASH,
  ADD KEY `hist_recom_5` (`hist_recom`(768)),
  ADD KEY `fk_hist_pacientes` (`pac_id`);

--
-- Indices de la tabla `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`hob_id`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`pac_id`),
  ADD UNIQUE KEY `pac_documento` (`pac_documento`),
  ADD UNIQUE KEY `pac_documento_2` (`pac_documento`),
  ADD KEY `gen_id` (`gen_id`),
  ADD KEY `estr_id` (`estr_id`);

--
-- Indices de la tabla `pacientes hobbies`
--
ALTER TABLE `pacientes hobbies`
  ADD PRIMARY KEY (`pac_hob_id`),
  ADD KEY `pac_id` (`pac_id`),
  ADD KEY `hod_id` (`hod_id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usu_id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `est_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `historias`
--
ALTER TABLE `historias`
  MODIFY `hist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `pac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historias`
--
ALTER TABLE `historias`
  ADD CONSTRAINT `fk_hist_pacientes` FOREIGN KEY (`pac_id`) REFERENCES `pacientes` (`pac_id`);

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `fk_estr_id` FOREIGN KEY (`estr_id`) REFERENCES `estrato` (`estr_id`),
  ADD CONSTRAINT `fk_gen_id` FOREIGN KEY (`gen_id`) REFERENCES `genero` (`gen_id`),
  ADD CONSTRAINT `fk_pacientes_genero` FOREIGN KEY (`gen_id`) REFERENCES `genero` (`gen_id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`rol_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
