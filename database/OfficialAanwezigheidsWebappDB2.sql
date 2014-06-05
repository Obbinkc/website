-- --------------------------------------------------------
-- Host:                         145.92.203.240
-- Server versie:                5.5.37 - Source distribution
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
  `courseType` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`course_id`),
  KEY `categoryId` (`categoryId`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

-- Dumpen data van tabel zhuraibz001.courses: ~8 rows (ongeveer)
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` (`course_id`, `categoryId`, `name`, `courseType`) VALUES
	(4, 2, 'Unix Network Programming', 'parttime'),
	(5, 4, 'Datavisualisatie', 'dualtime'),
	(17, 3, 'Wiskunde', 'dualtime'),
	(26, 1, 'Nederlands', 'fulltime'),
	(39, 1, 'Engels', 'dualtime'),
	(47, 2, 'Scheikunde', 'parttime'),
	(48, 2, 'C++', 'fulltime'),
	(49, 4, 'Wiskunde', 'fulltime');
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
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

-- Dumpen data van tabel zhuraibz001.lessons: ~14 rows (ongeveer)
/*!40000 ALTER TABLE `lessons` DISABLE KEYS */;
INSERT INTO `lessons` (`lessonId`, `user_id`, `course_id`, `startTime`, `endTime`, `lescode`) VALUES
	(1, 2, 18, '2014-03-24 00:55:02', '2014-04-24 02:55:07', '1234'),
	(2, 6, 18, '2014-12-30 23:15:00', '2014-12-30 23:20:00', '0'),
	(4, 2, 18, '2014-06-30 23:12:00', '2014-06-30 23:13:00', '0'),
	(5, 2, 18, '2014-10-10 23:15:00', '2014-10-10 23:16:00', '0'),
	(7, 2, 18, '2014-12-30 23:15:00', '2014-06-30 23:13:00', 'WErslVd8'),
	(10, 6, 26, '2014-04-25 10:00:00', '2014-04-25 11:00:00', 'pen'),
	(11, 2, 5, '2014-10-10 23:15:00', '2014-10-10 23:16:00', '535aUxz4'),
	(12, 6, 4, '2014-05-07 10:00:00', '2014-05-07 12:00:00', 'PaC40P6T'),
	(14, 2, 3, '2014-12-30 23:15:00', '2014-12-30 23:23:00', '8EKbH8qU'),
	(33, 2, 17, '2014-06-01 00:30:00', '2014-06-01 00:50:00', 'StwtOB27'),
	(48, 2, 26, '2014-05-30 23:15:00', '2014-06-10 23:15:00', 'sdf'),
	(49, 6, 47, '2014-06-01 23:15:00', '2014-06-15 23:15:00', 'gvb'),
	(55, 2, 47, '2014-06-01 23:15:00', '2014-06-10 23:15:00', 'gvb'),
	(57, 6, 47, '2014-06-16 23:15:00', '2014-06-18 23:15:00', 'T29RUWI4'),
	(59, 19, 26, '2014-05-30 23:15:00', '2014-06-10 23:15:00', 'klok');
/*!40000 ALTER TABLE `lessons` ENABLE KEYS */;


-- Structuur van  tabel zhuraibz001.reglesson wordt geschreven
CREATE TABLE IF NOT EXISTS `reglesson` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `lescode` varchar(50) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- Dumpen data van tabel zhuraibz001.reglesson: ~23 rows (ongeveer)
/*!40000 ALTER TABLE `reglesson` DISABLE KEYS */;
INSERT INTO `reglesson` (`id`, `first_name`, `last_name`, `lescode`, `user_id`) VALUES
	(3, 'student', 'student', 'WErslVd8', NULL),
	(7, 'test', 'test', 'rtcSUVZ7', NULL),
	(8, 'student', 'student', '1234', NULL),
	(10, 'arnold', 'huybens', 'rtcSUVZ7', NULL),
	(11, 'student', 'student', 'PaC40P6T', NULL),
	(12, 'Jan', 'Janus', 'rtcSUVZ7', NULL),
	(19, 'Jan', 'Janus', 'qwe', NULL),
	(20, 'Jan', 'Janus', '535aUxz4', NULL),
	(21, 'student', 'student', 'StwtOB27', NULL),
	(28, 'student', 'student', 'sdf', 8),
	(29, 'Jan', 'Janus', 'sdf', 15);
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Dumpen data van tabel zhuraibz001.users: ~7 rows (ongeveer)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `email`, `active`, `type`) VALUES
	(2, 'qwe', '76d80224611fc919a5d54f0ff9fba446', 'qwe', 'qwe', 'qwe', 1, 1),
	(5, 'nickedname', 'd5fbe9f887c1e1a8d24f5239ad83da94', 'arnold', 'huybens', 'arnold.huybens@hotmail.nl', 1, 0),
	(6, 'christiaan', '5f4dcc3b5aa765d61d8327deb882cf99', 'christiaan', 'obbink', 'zegikniet', 1, 1),
	(8, 'student', 'cd73502828457d15655bbd7a63fb0bc8', 'student', 'student', 'student@student.nl', 1, 0),
	(13, 'zaky', '3765f2bfa73b3c55f980d3779b8d9961', 'zaky', 'huraibi', 'zaky@huraibi.nl', 1, 0),
	(15, 'jan', '3957832c9cc9e0586d8b07eebe349caa', 'Jan', 'Janus', 'jan@janus.nl', 1, 0),
	(16, 'Marco', '7102ce7834b18e4cd2f361b5e4daf9d2', 'marco', 'marcellis', 'marco@marcellis.nl', 1, 0),
	(19, 'asd', 'a152e841783914146e4bcd4f39100686', 'asd', 'asd', 'asd', 1, 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
