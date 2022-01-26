-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 15-09-2020 a las 00:16:01
-- Versión del servidor: 8.0.21
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sensordb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivos`
--

DROP TABLE IF EXISTS `dispositivos`;
CREATE TABLE IF NOT EXISTS `dispositivos` (
  `Id_Medida` int NOT NULL AUTO_INCREMENT,
  `Id_Sensor` int NOT NULL,
  `Sensor` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Valor` float NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  UNIQUE KEY `Id_Medida` (`Id_Medida`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dispositivos`
--

INSERT INTO `dispositivos` (`Id_Medida`, `Id_Sensor`, `Sensor`, `Valor`, `Fecha`, `Hora`) VALUES
(1, 1, 'uno', 50, '2020-09-01', '00:00:00'),
(2, 1, 'uno', 50, '2020-09-01', '00:00:00'),
(3, 1, 'uno', 35, '2020-09-01', '09:34:57'),
(4, 1, 'uno', 36, '2020-09-01', '09:35:57'),
(5, 2, 'dos', 85, '2020-09-01', '09:36:57'),
(6, 2, 'dos', 85, '2020-09-01', '10:36:57'),
(7, 1, 'uno', 65, '2020-09-01', '10:36:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `Id_Usuario` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Apellido` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Nickname` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Id_Rol` int NOT NULL,
  PRIMARY KEY (`Id_Usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Id_Usuario`, `Nombre`, `Apellido`, `Nickname`, `Email`, `Password`, `Id_Rol`) VALUES
(1, 'Luis', 'Cepeda', 'LuisCepeda', 'luis.cepeda01@uptc.edu.co', 'telematica', 1),
(2, 'Hector', 'Rivera', 'HectorRivera', 'hector.rivera@uptc.edu.co', 'telematica', 1),
(3, 'Jesus', 'Agudelo', 'JesusAgudelo', 'jesus.agudelo@uptc.edu.co', 'telematica', 2),
(24, 'a', 'a', 'a', 'a@a', 'a', 2),
(7, 'Bello', 'Bello', 'EdwarBello', 'edwar.bello@uptc.edu.co', 'telematica', 2),
(25, 'f', 'f', 'f', 'f@f', 'a', 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
