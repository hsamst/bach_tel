-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 11-02-2023 a las 02:05:59
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
-- Base de datos: `telefonia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cambios`
--

DROP TABLE IF EXISTS `cambios`;
CREATE TABLE IF NOT EXISTS `cambios` (
  `id_cambio` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_cambio`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diadema`
--

DROP TABLE IF EXISTS `diadema`;
CREATE TABLE IF NOT EXISTS `diadema` (
  `id_diadema` varchar(50) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_diadema`),
  KEY `fk_marca2` (`id_marca`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

DROP TABLE IF EXISTS `marca`;
CREATE TABLE IF NOT EXISTS `marca` (
  `id_marca` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_marca` varchar(20) DEFAULT NULL,
  `id_modelo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_marca`),
  KEY `fk_modelo` (`id_modelo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelo`
--

DROP TABLE IF EXISTS `modelo`;
CREATE TABLE IF NOT EXISTS `modelo` (
  `id_modelo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_modelo` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_modelo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_datos`
--

DROP TABLE IF EXISTS `plan_datos`;
CREATE TABLE IF NOT EXISTS `plan_datos` (
  `id_plan` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_plan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puestos`
--

DROP TABLE IF EXISTS `puestos`;
CREATE TABLE IF NOT EXISTS `puestos` (
  `id_puesto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_puesto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE IF NOT EXISTS `rol` (
  `id_rol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sim`
--

DROP TABLE IF EXISTS `sim`;
CREATE TABLE IF NOT EXISTS `sim` (
  `iccid` varchar(30) NOT NULL,
  `region` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`iccid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonos`
--

DROP TABLE IF EXISTS `telefonos`;
CREATE TABLE IF NOT EXISTS `telefonos` (
  `imei` varchar(50) NOT NULL,
  `linea` varchar(50) DEFAULT NULL,
  `accesosrios` varchar(100) DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `iccid` varchar(30) DEFAULT NULL,
  `id_plan` int(11) DEFAULT NULL,
  PRIMARY KEY (`imei`),
  KEY `fk_marca1` (`id_marca`),
  KEY `fk_iccid` (`iccid`),
  KEY `fk_plan` (`id_plan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket_cel`
--

DROP TABLE IF EXISTS `ticket_cel`;
CREATE TABLE IF NOT EXISTS `ticket_cel` (
  `id_ticket_cel` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_entrega` date DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `no_empleado` int(11) DEFAULT NULL,
  `imei` varchar(50) DEFAULT NULL,
  `id_cambio` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_ticket_cel`),
  KEY `fk_cambio` (`id_cambio`),
  KEY `fk_empleado` (`no_empleado`),
  KEY `fk_imei` (`imei`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket_daidema`
--

DROP TABLE IF EXISTS `ticket_daidema`;
CREATE TABLE IF NOT EXISTS `ticket_daidema` (
  `id_ticket_diadema` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_entrega` date DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `no_empleado` int(11) DEFAULT NULL,
  `id_cambio` int(11) DEFAULT NULL,
  `id_diadema` varchar(50) NOT NULL,
  PRIMARY KEY (`id_ticket_diadema`),
  KEY `fk_cambio1` (`id_cambio`),
  KEY `fk_empleado2` (`no_empleado`),
  KEY `fk_dia` (`id_diadema`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `un`
--

DROP TABLE IF EXISTS `un`;
CREATE TABLE IF NOT EXISTS `un` (
  `id_un` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_un`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `no_empleado` int(11) NOT NULL,
  `nombre_completo` varchar(100) DEFAULT NULL,
  `id_puesto` int(11) DEFAULT NULL,
  `id_un` int(11) DEFAULT NULL,
  PRIMARY KEY (`no_empleado`),
  KEY `fk_puesto` (`id_puesto`),
  KEY `fk_un` (`id_un`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariobach`
--

DROP TABLE IF EXISTS `usuariobach`;
CREATE TABLE IF NOT EXISTS `usuariobach` (
  `id_usuario_bach` int(11) NOT NULL AUTO_INCREMENT,
  `corrreo` varchar(100) DEFAULT NULL,
  `contrasena` varchar(32) DEFAULT NULL,
  `tocken` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id_usuario_bach`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usubach_rol`
--

DROP TABLE IF EXISTS `usubach_rol`;
CREATE TABLE IF NOT EXISTS `usubach_rol` (
  `id_rol` int(11) NOT NULL,
  `id_usuario_bach` int(11) NOT NULL,
  PRIMARY KEY (`id_rol`,`id_usuario_bach`),
  KEY `fk_usua_bach` (`id_usuario_bach`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `diadema`
--
ALTER TABLE `diadema`
  ADD CONSTRAINT `fk_marca2` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`);

--
-- Filtros para la tabla `marca`
--
ALTER TABLE `marca`
  ADD CONSTRAINT `fk_modelo` FOREIGN KEY (`id_modelo`) REFERENCES `modelo` (`id_modelo`);

--
-- Filtros para la tabla `telefonos`
--
ALTER TABLE `telefonos`
  ADD CONSTRAINT `fk_iccid` FOREIGN KEY (`iccid`) REFERENCES `sim` (`iccid`),
  ADD CONSTRAINT `fk_marca1` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`),
  ADD CONSTRAINT `fk_plan` FOREIGN KEY (`id_plan`) REFERENCES `plan_datos` (`id_plan`);

--
-- Filtros para la tabla `ticket_cel`
--
ALTER TABLE `ticket_cel`
  ADD CONSTRAINT `fk_cambio` FOREIGN KEY (`id_cambio`) REFERENCES `cambios` (`id_cambio`),
  ADD CONSTRAINT `fk_empleado` FOREIGN KEY (`no_empleado`) REFERENCES `usuario` (`no_empleado`),
  ADD CONSTRAINT `fk_imei` FOREIGN KEY (`imei`) REFERENCES `telefonos` (`imei`);

--
-- Filtros para la tabla `ticket_daidema`
--
ALTER TABLE `ticket_daidema`
  ADD CONSTRAINT `fk_cambio1` FOREIGN KEY (`id_cambio`) REFERENCES `cambios` (`id_cambio`),
  ADD CONSTRAINT `fk_dia` FOREIGN KEY (`id_diadema`) REFERENCES `diadema` (`id_diadema`),
  ADD CONSTRAINT `fk_empleado2` FOREIGN KEY (`no_empleado`) REFERENCES `usuario` (`no_empleado`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_puesto` FOREIGN KEY (`id_puesto`) REFERENCES `puestos` (`id_puesto`),
  ADD CONSTRAINT `fk_un` FOREIGN KEY (`id_un`) REFERENCES `un` (`id_un`);

--
-- Filtros para la tabla `usubach_rol`
--
ALTER TABLE `usubach_rol`
  ADD CONSTRAINT `fk_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`),
  ADD CONSTRAINT `fk_usua_bach` FOREIGN KEY (`id_usuario_bach`) REFERENCES `usuariobach` (`id_usuario_bach`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
