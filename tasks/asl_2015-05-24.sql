# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.29)
# Database: asl
# Generation Time: 2015-05-24 23:40:58 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table tasks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tasks`;

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `task_name` varchar(255) NOT NULL DEFAULT '',
  `task_desc` varchar(255) NOT NULL DEFAULT '',
  `task_dead` date NOT NULL,
  `task_comp` date DEFAULT NULL,
  `task_owner` int(255) NOT NULL,
  `comp_user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;

INSERT INTO `tasks` (`task_id`, `task_name`, `task_desc`, `task_dead`, `task_comp`, `task_owner`, `comp_user_id`)
VALUES
	(38,'Edit','Create Edit Functionality','2015-05-24','2015-05-23',1,2),
	(40,'Test','this was a test','2015-05-31',NULL,1,NULL),
	(42,'Email Notification','When a task is completed by a user with a user type of team member, the task owner (the manager who created the task) should receive an email notification automatically.','2015-05-31','2015-05-23',1,1),
	(43,'Task Panel Size ','the longer the description the bigger the task panel, will this cause grid issues?','2015-05-24',NULL,1,NULL),
	(46,'This is an example','I made this task during my screen cast! Woohoo!!!','2015-05-24',NULL,1,NULL),
	(47,'Demonstration','This is the task we just created!!!!!!!','2015-05-24',NULL,1,NULL);

/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_type_1` (`type_id`),
  CONSTRAINT `user_type_1` FOREIGN KEY (`type_id`) REFERENCES `userType` (`user_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `password`, `type_id`)
VALUES
	(1,'Stan','5f4dcc3b5aa765d61d8327deb882cf99',1),
	(2,'Wendy','5f4dcc3b5aa765d61d8327deb882cf99',2);

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table userType
# ------------------------------------------------------------

DROP TABLE IF EXISTS `userType`;

CREATE TABLE `userType` (
  `user_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `userType` WRITE;
/*!40000 ALTER TABLE `userType` DISABLE KEYS */;

INSERT INTO `userType` (`user_type_id`, `user_type`)
VALUES
	(1,'Manager'),
	(2,'Team Member');

/*!40000 ALTER TABLE `userType` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
