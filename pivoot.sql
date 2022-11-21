-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 21-11-2022 a las 05:26:06
-- Versión del servidor: 8.0.27
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
-- Estructura de tabla para la tabla `cargo`
--

DROP TABLE IF EXISTS `cargo`;
CREATE TABLE IF NOT EXISTS `cargo` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) COLLATE utf16_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `descripcion`) VALUES
(1, 'Docente'),
(2, 'Estudiante'),
(3, 'Administrador ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `nombres` varchar(36) COLLATE utf16_spanish_ci NOT NULL,
  `apellidos` varchar(36) COLLATE utf16_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf16_spanish_ci NOT NULL,
  `contrasena` varchar(60) COLLATE utf16_spanish_ci NOT NULL,
  `celular` varchar(10) COLLATE utf16_spanish_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf16_spanish_ci NOT NULL,
  `avatar` varchar(250) COLLATE utf16_spanish_ci NOT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `activacion` int NOT NULL,
  `hash_` varchar(205) COLLATE utf16_spanish_ci NOT NULL,
  `id_cargo` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cargo` (`id_cargo`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombres`, `apellidos`, `email`, `contrasena`, `celular`, `telefono`, `avatar`, `id`, `activacion`, `hash_`, `id_cargo`) VALUES
('Nicolas', 'Moreno', 'traplinboss@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '123', '123', '', 5, 1, 'a733fa9b25f33689e2adbe72199f0e62', 3),
('Nicolas', 'Moreno', 'nicolasmorenofranco9@gmail.com', 'aad4979baf6fded18dea447aab5f3f298887dd95', '123', '123', '', 4, 1, 'f2217062e9a397a1dca429e7d70bc6ca', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
