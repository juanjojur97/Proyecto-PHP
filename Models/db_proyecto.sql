-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-01-2024 a las 19:44:51
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_proyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `idCita` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `fecha_cita` date NOT NULL,
  `motivo_cita` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`idCita`, `idUser`, `fecha_cita`, `motivo_cita`) VALUES
(8, 114, '2024-01-31', 'Idk\r\n'),
(9, 132, '2024-02-10', 'Algo'),
(10, 133, '2024-02-09', 'Mmotivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `idNoticia` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `texto` text NOT NULL,
  `fecha` date NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`idNoticia`, `titulo`, `imagen`, `texto`, `fecha`, `idUser`) VALUES
(1, 'Tchouaméni se rebela', 'noticia1.jpg', '\"No quiero que se dude de mi mentalidad\". Aurélien Tchouaméni alzó la voz tras el partido en el estadio de Gran Canaria. Señalado por algunos tras el gol de Griezmann en el derbi de Copa, el pivote se reivindicó en Las Palmas haciendo el tanto que daba tres puntos muy trabajados al Madrid. De nuevo de cabeza tras un saque de esquina de Kroos, como en Girona, cuando la temporada marchaba viento en popa para el ex del Mónaco.', '2024-01-29', 114),
(2, 'Un premio para Arda Güler', 'noticia2.jpg', 'Sale a la luz unas imágenes de Modric jugando al fútbol sala en el torneo \'caja de cerillas\'\r\nLa remontada del Real Madrid frente al Almería en el Santiago Bernabeú se cimentó en el banquillo. La mala imagen mostrada en la primera parte, donde el conjunto blanco se derrumbaba en un marcador que reflejaba un 0-2, obligó a Carlo Ancelotti a tomar medidas drásticas para tratar de revertir la situación. Nacho, Mendy y Rodrygo se quedaron en la caseta para dar entrada a Brahim, Joselu y Fran García. Una frescura de piernas que acabó siendo clave para firmar los tres puntos en el minuto 99 tras un partido de locura en el VAR.', '2024-01-29', 114);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_data`
--

CREATE TABLE `users_data` (
  `idUser` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefono` int(11) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` text DEFAULT NULL,
  `sexo` enum('Masculino','Femenino') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users_data`
--

INSERT INTO `users_data` (`idUser`, `nombre`, `apellidos`, `email`, `telefono`, `fecha_nacimiento`, `direccion`, `sexo`) VALUES
(110, 'Carlos', 'Perez Navas', 'c@gmail.com', 658789123, '1998-12-14', 'marmolejo', 'Masculino'),
(114, 'Juanjo', 'jur', 'the131297@gmail.com', 666666666, '2024-01-24', 'marmolejo', 'Masculino'),
(126, 'JULIAN', '', 'julianjurado@hotmail.com', 0, '0000-00-00', NULL, NULL),
(127, 'rebe', 'navas', 'cc@cc.cc', 666666666, '2024-01-24', 'marmolejo', 'Masculino'),
(130, 'aa', 'aa', 'aa@aa.aaa', 666666666, '2024-01-30', 'marmolejo', 'Masculino'),
(131, 'Alejandro', 'Jurado Magdaleno', 'qw@qw.qw', 666666666, '2024-01-18', 'marmolejo', 'Masculino'),
(132, 'Julian', 'Jurado Ollero', 'julianjuado@hotmail.es', 679138598, '1970-11-22', 'C/ MºZambrano 6', 'Masculino'),
(133, 'gg', 'gg', 'gg@gg.gg', 666666666, '2024-01-10', 'marmolejo', 'Masculino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_login`
--

CREATE TABLE `users_login` (
  `idLogin` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `usuario` text NOT NULL,
  `password` text NOT NULL,
  `rol` enum('admin','user') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users_login`
--

INSERT INTO `users_login` (`idLogin`, `idUser`, `usuario`, `password`, `rol`) VALUES
(21, 110, 'carlos', '$2y$10$9r9I6ynvQYYR1azE3kHTw.UGPNFXHnIyTu58nAY9R6OOpCdKRpQj2', 'admin'),
(25, 114, 'jj', '$2y$10$XK3US6joolUvYVyS.nEeEeZHHE/7WUBMfi2m03qQw0o.Gf2YZXwGO', 'user'),
(32, 127, 'rebe', '$2y$10$uTm2cRmaUJCp2l30kzX/vOzoJ5QtcXWTWww9U7lkNWr08vF3rPLFi', 'user'),
(35, 130, 'aa', '$2y$10$KkFGgtQEwFeg6OWJiyOC1enaWHHAgVIBdxNRAW/GTnIWUGfTPYl26', 'user'),
(36, 131, 'qw', '$2y$10$p6REJWRD5dF5T1QEbq7NI.PDvv1G9wNddiggKm4jv5hTPN5cnVPNm', 'user'),
(37, 132, 'juli', '$2y$10$nX/w.VzdtPmtlargk6ZMFekPv3iHiJWxm7egMldR/Wn.VM7l.5cgS', 'user'),
(38, 133, 'gg', '$2y$10$4FIxs8Cie76cRhQJuZHt4ODy.y6RwVDQt6f7/5N.LYxBCZ1Ry0fua', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`idCita`),
  ADD KEY `idUser` (`idUser`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`idNoticia`),
  ADD UNIQUE KEY `titulo` (`titulo`),
  ADD KEY `idUser` (`idUser`);

--
-- Indices de la tabla `users_data`
--
ALTER TABLE `users_data`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indices de la tabla `users_login`
--
ALTER TABLE `users_login`
  ADD PRIMARY KEY (`idLogin`),
  ADD UNIQUE KEY `idUser` (`idUser`),
  ADD UNIQUE KEY `usuario` (`usuario`) USING HASH;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `idCita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `idNoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users_data`
--
ALTER TABLE `users_data`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT de la tabla `users_login`
--
ALTER TABLE `users_login`
  MODIFY `idLogin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users_data` (`idUser`);

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users_data` (`idUser`);

--
-- Filtros para la tabla `users_login`
--
ALTER TABLE `users_login`
  ADD CONSTRAINT `users_login_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users_data` (`idUser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
