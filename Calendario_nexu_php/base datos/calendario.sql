-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.28-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.5.0.5349
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para nextu_examen
CREATE DATABASE IF NOT EXISTS `nextu_examen` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `nextu_examen`;

-- Volcando estructura para tabla nextu_examen.callendar
CREATE TABLE IF NOT EXISTS `callendar` (
  `codigo` bigint(20) NOT NULL AUTO_INCREMENT,
  `editable` varchar(50) NOT NULL DEFAULT 'true',
  `title` varchar(50) NOT NULL DEFAULT '',
  `start` varchar(50) NOT NULL DEFAULT '',
  `allDay` varchar(50) NOT NULL DEFAULT '',
  `end` varchar(50) NOT NULL DEFAULT '',
  `usuario` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='title: $(''#titulo'').val(),\r\n                start: $(''#start_date'').val()+" "+$(''#start_hour'').val(),\r\n                allDay: false,\r\n                end: $(''#end_date'').val()+" "+$(''#end_hour'').val()';

-- Volcando datos para la tabla nextu_examen.callendar: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `callendar` DISABLE KEYS */;
INSERT INTO `callendar` (`codigo`, `editable`, `title`, `start`, `allDay`, `end`, `usuario`) VALUES
	(2, 'true', 'hola', '2018-11-17', 'false', '2018-11-17', 1),
	(8, 'true', 'tengo que comrar algo', '2018-11-21', 'false', '2018-11-22', 1),
	(9, 'true', 'tengo que comprar la cena', '2018-11-05', 'false', '2018-11-05', 1),
	(10, 'true', 'ytty', '2018-12-01', 'false', '2018-12-26', 1),
	(11, 'true', 'ytty', '2018-12-01', 'false', '2018-12-08', 1),
	(12, 'true', 'comer', '2018-12-01', 'true', '', 1);
/*!40000 ALTER TABLE `callendar` ENABLE KEYS */;

-- Volcando estructura para tabla nextu_examen.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `codigo` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(350) DEFAULT NULL,
  `psw` varchar(350) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla nextu_examen.usuarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`codigo`, `email`, `psw`) VALUES
	(1, 'prueba', '789'),
	(2, 'prueba1', '123'),
	(3, 'prueba2', '1234');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
