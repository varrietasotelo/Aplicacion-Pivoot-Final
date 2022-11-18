-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 15-11-2022 a las 05:00:59
-- Versión del servidor: 5.7.36
-- Versión de PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pivoot`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `nombres` varchar(36) COLLATE utf16_spanish_ci NOT NULL,
  `apellidos` varchar(36) COLLATE utf16_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf16_spanish_ci NOT NULL,
  `contrasena` varchar(15) COLLATE utf16_spanish_ci NOT NULL,
  `celular` varchar(10) COLLATE utf16_spanish_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf16_spanish_ci DEFAULT NULL,
  `rol` int(1) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombres`, `apellidos`, `email`, `contrasena`, `celular`, `telefono`, `rol`) VALUES
('Mark', 'Moreno', 'n@gmail.com', '321', '321', '3118398461', 1),
('Nicolas', 'Moreno', 'n@ut.edu.co', '123', '123', '123', 1),
('Nicolas', 'Moreno', 'n@ut.edu.co1', '123', '123', '123', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
