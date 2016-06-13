-- phpMyAdmin SQL Dump
-- version 3.5.8
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-06-2013 a las 15:52:34
-- Versión del servidor: 5.5.31
-- Versión de PHP: 5.4.16

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `542777db2`
--
CREATE DATABASE `542777db2` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `542777db2`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `name` varchar(50) NOT NULL,
  `cod` varchar(50) NOT NULL,
  `description` varchar(240) DEFAULT NULL,
  PRIMARY KEY (`cod`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`name`, `cod`, `description`) VALUES
('GENERAL', '1', 'Para todo lo que creas que sirve para todos'),
('VARIOS', '2', 'Para lo que no encuentras categoria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `city`
--

INSERT INTO `city` (`name`) VALUES
('BOGOTA'),
('CALI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `city_service`
--

DROP TABLE IF EXISTS `city_service`;
CREATE TABLE IF NOT EXISTS `city_service` (
  `service` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  PRIMARY KEY (`service`,`city`),
  KEY `city` (`city`),
  KEY `service` (`service`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `name` varchar(50) NOT NULL,
  `usercod` varchar(30) NOT NULL,
  `cod` varchar(50) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `category` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `webpage` varchar(100) DEFAULT NULL,
  `availability` bigint(20) DEFAULT NULL,
  `num_rating` bigint(20) DEFAULT NULL,
  `rating_acum` bigint(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `admin_state` varchar(2) NOT NULL,
  PRIMARY KEY (`cod`),
  KEY `category` (`category`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `service`
--

INSERT INTO `service` (`name`, `usercod`, `cod`, `address`, `description`, `telephone`, `category`, `city`, `date_start`, `date_end`, `webpage`, `availability`, `num_rating`, `rating_acum`, `email`, `admin_state`) VALUES
('servicio1', '111111', '11', 'calle', 'decript', '4545656', 'GENERAL', 'CALI', '2013-06-20 03:12:13', '2013-06-21 04:13:20', 'www.meeet.com', 1, 12, 120, 'nisss@uuu.com', '1'),
('servicio2', '', '12', 'calle', 'decript', '4545656', 'GENERAL', 'CALI', '2013-06-20 03:12:13', '2013-06-21 04:13:20', 'www.meeet2.com', 1, 12, 120, 'nisss@uuu.com', '1'),
('servicio40', '111111', '13', 'calle', 'decript', '45456564', 'GENERAL', 'CALI', '2013-06-20 03:12:13', '2013-06-21 04:13:20', 'www.mee4et.com', 1, 12, 120, 'nisss@uuu8.com', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `document` bigint(20) NOT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `num_rating` bigint(20) DEFAULT NULL,
  `rating_acum` bigint(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `profesion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`name`, `lastname`, `password`, `user`, `document`, `telephone`, `address`, `num_rating`, `rating_acum`, `email`, `profesion`) VALUES
('name1', 'lastname1', 'password1', 'user1', 0, 'tel1', 'address1', NULL, NULL, 'email1', 'profession1'),
('name2', 'lastname2', '', 'uno', 0, 'tel2', 'address2', NULL, NULL, 'email@jum.com2', 'negro2'),
('name3', 'lastname23', '5888', 'uno3', 0, 'tel23', 'address23', NULL, NULL, 'email@jum.com23', 'negro23'),
('12', '2323', '1234', '12', 51545, '3434', '3434', NULL, NULL, '434343', '43434'),
('urlich', 'lars', '123', 'urlich', 111111, '55555', 'direccion paque?', 0, 0, 'larsooo', 'mmmm'),
('gggg', 'ggg', '1234567', 'gggg', 1515, 'ggg', 'ggggg', NULL, NULL, 'gg', 'ggg'),
('4535', '5435', '77777', '4535', 0, '353', '5555555', NULL, NULL, '3454', '5555'),
('hola', 'hola', 'hola', 'hola', 0, 'hola', 'hola', NULL, NULL, 'hola', 'hola'),
('24', '43', '11', '24', 0, '434', '343', NULL, NULL, '434', '4343'),
('holaaaaaaaaaaaaa', 'apellidooooooo', '12345678', 'holaaaaaaaaaaaaa', 0, '44444444', 'direeeeeee', NULL, NULL, 'nigdgdgd@gjfgjf.com', 'professssooooooooo'),
('john', 'gonzalez', '123456', 'john', 0, '3114406602', '1', NULL, NULL, 'john.f.@gmail.com', 'estudiante'),
('dsf', 'fdfdsdf', '1234', 'dsf', 0, 'sdfsdff', 'fdsfdf', NULL, NULL, 'fsdfsd@vfvds.com', 'sfdfsfd'),
('david', 'gallego', '12123434', 'david', 0, '311111', 'direccion', NULL, NULL, 'dat@uuu.com', 'ingeniero'),
('rtyu', 'fghj', '1234', 'rty', 45678, '456789', 'ghjk', NULL, NULL, 'fghj2@ghjj.com', 'fghj');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_service_get`
--

DROP TABLE IF EXISTS `user_service_get`;
CREATE TABLE IF NOT EXISTS `user_service_get` (
  `service` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_end` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`service`,`user`),
  KEY `service` (`service`),
  KEY `user` (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_service_offer`
--

DROP TABLE IF EXISTS `user_service_offer`;
CREATE TABLE IF NOT EXISTS `user_service_offer` (
  `service` varchar(50) NOT NULL,
  `user` varchar(50) NOT NULL,
  PRIMARY KEY (`service`,`user`),
  KEY `service` (`service`),
  KEY `user` (`user`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `codigo` varchar(30) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
