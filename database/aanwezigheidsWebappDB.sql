-- --------------------------------------------------------
-- Host:                         145.92.203.240
-- Server versie:                5.5.32 - Source distribution
-- Server OS:                    Linux
-- HeidiSQL Versie:              8.0.0.4396
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Databasestructuur van zhuraibz001 wordt geschreven
CREATE DATABASE IF NOT EXISTS `zhuraibz001` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `zhuraibz001`;


-- Structuur van  tabel zhuraibz001.coursecategories wordt geschreven
CREATE TABLE IF NOT EXISTS `coursecategories` (
  `categoryId` int(10) NOT NULL AUTO_INCREMENT,
  `courseYear` int(10) DEFAULT NULL,
  PRIMARY KEY (`categoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumpen data van tabel zhuraibz001.coursecategories: ~4 rows (ongeveer)
/*!40000 ALTER TABLE `coursecategories` DISABLE KEYS */;
INSERT INTO `coursecategories` (`categoryId`, `courseYear`) VALUES
	(1, 1),
	(2, 2),
	(3, 3),
	(4, 4);
/*!40000 ALTER TABLE `coursecategories` ENABLE KEYS */;


-- Structuur van  tabel zhuraibz001.courses wordt geschreven
CREATE TABLE IF NOT EXISTS `courses` (
  `course_id` int(10) NOT NULL AUTO_INCREMENT,
  `categoryId` int(10) NOT NULL DEFAULT '0',
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`course_id`),
  KEY `categoryId` (`categoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

-- Dumpen data van tabel zhuraibz001.courses: ~15 rows (ongeveer)
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` (`course_id`, `categoryId`, `name`) VALUES
	(3, 2, 'databazez'),
	(4, 3, 'Unix Network Programming'),
	(5, 4, 'Datavisualisatie'),
	(16, 2, 'Nederlandz'),
	(17, 1, 'WiskundeLOL'),
	(21, 2, 'databazez'),
	(22, 2, 'databazez'),
	(24, 2, 'Nederlands'),
	(25, 2, 'Nederlandsr'),
	(26, 1, 'nederlands'),
	(27, 0, ''),
	(29, 2, 'fddf'),
	(30, 1, '323'),
	(31, 2, 'test');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;


-- Structuur van  tabel zhuraibz001.lessons wordt geschreven
CREATE TABLE IF NOT EXISTS `lessons` (
  `lessonId` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `course_id` int(10) DEFAULT NULL,
  `startTime` datetime DEFAULT NULL,
  `endTime` datetime DEFAULT NULL,
  `lescode` varchar(50) NOT NULL,
  PRIMARY KEY (`lessonId`),
  KEY `user_id` (`user_id`),
  KEY `course_id` (`course_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Dumpen data van tabel zhuraibz001.lessons: ~10 rows (ongeveer)
/*!40000 ALTER TABLE `lessons` DISABLE KEYS */;
INSERT INTO `lessons` (`lessonId`, `user_id`, `course_id`, `startTime`, `endTime`, `lescode`) VALUES
	(1, 2, 18, '2014-03-24 00:55:02', '2014-04-24 02:55:07', '1234'),
	(2, 6, 18, '2014-12-30 23:15:00', '2014-12-30 23:20:00', '0'),
	(3, 6, 18, '2014-12-30 23:15:00', '2014-12-30 23:20:00', '0'),
	(4, 2, 18, '2014-06-30 23:12:00', '2014-06-30 23:13:00', '0'),
	(5, 2, 18, '2014-10-10 23:15:00', '2014-10-10 23:16:00', '0'),
	(6, 6, 18, '2014-10-10 23:15:00', '2014-12-30 23:20:00', '0'),
	(7, 2, 18, '2014-12-30 23:15:00', '2014-06-30 23:13:00', 'WErslVd8'),
	(8, 6, 18, '2014-10-10 23:15:00', '2014-10-10 23:20:00', 'HDASIOti'),
	(9, 6, 26, '2014-04-25 10:00:00', '2014-04-25 11:00:00', 'rtcSUVZ7'),
	(10, 6, 26, '2014-04-25 10:00:00', '2014-04-25 11:00:00', 'rtcSUVZ7'),
	(11, 2, 5, '2014-10-10 23:15:00', '2014-10-10 23:16:00', '535aUxz4');
/*!40000 ALTER TABLE `lessons` ENABLE KEYS */;


-- Structuur van  tabel zhuraibz001.reglesson wordt geschreven
CREATE TABLE IF NOT EXISTS `reglesson` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `lescode` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumpen data van tabel zhuraibz001.reglesson: ~5 rows (ongeveer)
/*!40000 ALTER TABLE `reglesson` DISABLE KEYS */;
INSERT INTO `reglesson` (`id`, `first_name`, `last_name`, `lescode`) VALUES
	(2, 'student', 'student', 'rtcSUVZ7'),
	(3, 'student', 'student', 'WErslVd8'),
	(4, 'student', 'student', '1234'),
	(6, 'asd', 'asd', 'rtcSUVZ7'),
	(7, 'test', 'test', 'rtcSUVZ7');
/*!40000 ALTER TABLE `reglesson` ENABLE KEYS */;


-- Structuur van  tabel zhuraibz001.users wordt geschreven
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(1024) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- Dumpen data van tabel zhuraibz001.users: ~7 rows (ongeveer)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `email`, `active`, `type`) VALUES
	(1, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', 1, 0),
	(2, 'qwe', '76d80224611fc919a5d54f0ff9fba446', 'qwe', 'qwe', 'qwe', 1, 1),
	(5, 'nickedname', '701f33b8d1366cde9cb3822256a62c01', 'arnold', 'huybens', 'arnold.huybens@hotmail.nl', 1, 0),
	(6, 'christiaan', '5f4dcc3b5aa765d61d8327deb882cf99', 'christiaan', 'obbink', 'zegikniet', 1, 1),
	(7, 'asd', '7815696ecbf1c96e6894b779456d330e', 'asd', 'asd', 'asd', 1, 0),
	(8, 'student', 'cd73502828457d15655bbd7a63fb0bc8', 'student', 'student', 'student@student.nl', 1, 0),
	(9, 'test', 'test', 'test', 'test', '', 0, 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
