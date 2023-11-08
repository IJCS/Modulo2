-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2023 a las 18:56:09
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `grupotea`
--
CREATE DATABASE IF NOT EXISTS `grupotea` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `grupotea`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicos`
--
-- Creación: 07-11-2023 a las 08:43:39
-- Última actualización: 08-11-2023 a las 08:19:10
--

CREATE TABLE `medicos` (
  `ID` int(11) NOT NULL,
  `User_ID` int(11) DEFAULT NULL,
  `Descripción` varchar(350) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `medicos`
--

INSERT INTO `medicos` (`ID`, `User_ID`, `Descripción`) VALUES
(1, 1, 'El Dr. Alejandro Morales es un oftalmólogo altamente experimentado con un enfoque especial en cirugía de cataratas. Con más de dos décadas de experiencia, es conocido por su empatía y capacidad para tratar a pacientes de todas las edades. Fuera del consultorio, disfruta de su pasión por la fotografía, capturando paisajes y retratos impresionantes.'),
(2, 3, 'La Dra. Ana Rodríguez es una oftalmóloga joven y enérgica que se ha unido Tea. Su especialización radica en el tratamiento de enfermedades de la retina, y se destaca por su entusiasmo por la tecnología médica y su constante búsqueda de avances en oftalmología. Cuando no está trabajando, la Dra. Rodríguez practica yoga y se dedica a la jardinería.'),
(3, 5, 'El Dr. Luis Sánchez es un destacado oftalmólogo con un enfoque en cirugía refractiva, incluyendo procedimientos como el LASIK. Con experiencia en cirugía ocular láser en diversos países, es reconocido por su paciencia y su capacidad para explicar los procedimientos de manera comprensible para los pacientes.'),
(4, 6, 'La Dra. María González es una oftalmóloga pediátrica apasionada por el cuidado de la vista de los niños. Con un don para conectar con los jóvenes pacientes y sus padres, ha participado activamente en campañas de salud ocular en comunidades desfavorecidas, proporcionando atención oftalmológica a quienes más lo necesitan.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--
-- Creación: 07-11-2023 a las 08:43:39
--

CREATE TABLE `tipo` (
  `Tipo` varchar(5) NOT NULL,
  `Descripción` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`Tipo`, `Descripción`) VALUES
('Admin', 'Administrador'),
('Medic', 'Médico'),
('User', 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--
-- Creación: 08-11-2023 a las 08:49:20
-- Última actualización: 08-11-2023 a las 17:08:19
--

CREATE TABLE `turnos` (
  `ID` int(11) NOT NULL,
  `User` int(11) DEFAULT NULL,
  `Medic` int(11) DEFAULT NULL,
  `Día` date DEFAULT NULL,
  `Hora` time DEFAULT NULL,
  `Cobro` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`ID`, `User`, `Medic`, `Día`, `Hora`, `Cobro`) VALUES
(1, 3, 1, '2020-11-23', '09:00:00', 'Obra Social'),
(2, 3, 4, '2022-11-20', '09:00:00', 'Tarjeta'),
(3, 8, 3, '2022-11-22', '11:00:00', 'Tarjeta'),
(4, 2, 1, '2023-11-22', '13:00:00', 'Obra Social'),
(5, 8, 1, '2023-11-22', '09:00:00', 'Efectivo'),
(6, 8, 3, '2023-11-22', '15:00:00', 'Tarjeta'),
(7, 9, 1, '1999-01-01', '00:00:00', 'Test Restapi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--
-- Creación: 07-11-2023 a las 08:43:39
-- Última actualización: 08-11-2023 a las 17:46:19
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Apellido` varchar(100) DEFAULT NULL,
  `Mail` varchar(100) DEFAULT NULL,
  `Pass` varchar(100) DEFAULT NULL,
  `Tipo` varchar(5) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nombre`, `Apellido`, `Mail`, `Pass`, `Tipo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(0, 'Admin', 'Admin', 'Admin@Admin', '$2y$10$Jf2fx8YOuQJ.CafSRyIpg.XxBpxfzQP6dQUOIve58Lm6MkbYjS6nq', 'Admin', '2023-11-07 08:36:58', '2023-11-07 08:36:58', NULL),
(1, 'Alejandro', 'Morales', 'Alejandro@Morales', '$2y$10$7BN5HUZfiO8ZDBU6znxsAeLRYhWiYvv68DpZ7vTN4uDueFIkJYl42', 'Medic', '2023-11-07 05:47:56', '2023-11-07 05:47:56', NULL),
(2, '123', '456', '123@456', '$2y$10$DkT9FVmbVMstWIP0wRIVKehreuvfQMraoI27OTgogVQsvVkBuaIei', 'User', '2023-11-07 07:05:10', '2023-11-07 07:05:10', NULL),
(3, 'Ana', 'Rodríguez', 'Ana@xn--rodrguez-f2a', '$2y$10$suE9KaNou6iCIeas2EaTr.g8Pxg8ecONlwnifchqSDHoYYazXF/zC', 'Medic', '2023-11-08 03:00:36', '2023-11-08 03:00:36', NULL),
(4, 'asd', 'fgh', 'asd@fgh', '$2y$10$nc3TgpuWJq1u3hTpJZMgher4geHLfgHxiHdrsZLDSpm2BOTXUn9zi', 'User', '2023-11-08 04:37:51', '2023-11-08 04:37:51', NULL),
(5, 'Luis', 'Sánchez', 'Luis@xn--snchez-pta', '$2y$10$K1RJEvnY.6z9cmBMKSayL.EVf18lxiUq8HlAnMwCJ.l7xrrZ8sti6', 'Medic', '2023-11-08 04:38:57', '2023-11-08 04:38:57', NULL),
(6, 'María', 'González', 'Doctora@4', '$2y$10$uqSVOnzgltZfgldbjNbX6.R64CDS7izoxPmmRwHr6gXTlVJ/oo5Uq', 'Medic', '2023-11-08 05:18:51', '2023-11-08 05:18:51', NULL),
(7, 'Prueba', '123', 'Test@gmail.com', '$2y$10$mfmXnz3q8bw83H/1cjxtcuxVA8GwFiA9TNvIqRFlKm99z9ES1myBG', 'User', '2023-11-08 06:07:05', '2023-11-08 06:15:33', NULL),
(8, 'Cosme', 'Fulanito', 'CosmeFulanito@gmail.com', '$2y$10$9iEpQL0gIu5qocdB1127x./Co.CRYoc2tfRYUi5/1ZSKTRj3DeUTC', 'User', '2023-11-08 12:22:16', '2023-11-08 12:22:16', NULL),
(9, 'Prueba', 'Rest', 'Prueba', 'Prueba', 'User', NULL, NULL, NULL),
(10, 'Ignacio', 'Nieves', 'Ignacio@gmail.com', '$2y$10$E0SDyWy4T5GqUvwJWun8f.Rz3X8arplUlbW5oQmRD4pKm9bupl13y', 'User', '2023-11-08 14:46:19', '2023-11-08 14:46:19', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `medicos_FK` (`User_ID`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`Tipo`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `turnos_FK` (`User`),
  ADD KEY `turnos_FK_1` (`Medic`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `usuarios_FK` (`Tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `medicos`
--
ALTER TABLE `medicos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `medicos`
--
ALTER TABLE `medicos`
  ADD CONSTRAINT `medicos_FK` FOREIGN KEY (`User_ID`) REFERENCES `usuarios` (`ID`);

--
-- Filtros para la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD CONSTRAINT `turnos_FK` FOREIGN KEY (`User`) REFERENCES `usuarios` (`ID`),
  ADD CONSTRAINT `turnos_FK_1` FOREIGN KEY (`Medic`) REFERENCES `medicos` (`ID`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_FK` FOREIGN KEY (`Tipo`) REFERENCES `tipo` (`Tipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
