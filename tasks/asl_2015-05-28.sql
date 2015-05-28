# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.29)
# Database: asl
# Generation Time: 2015-05-28 19:05:19 +0000
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
  `message` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;

INSERT INTO `tasks` (`task_id`, `task_name`, `task_desc`, `task_dead`, `task_comp`, `task_owner`, `comp_user_id`, `message`)
VALUES
	(38,'Edit','Create Edit Functionality','2015-05-24','2015-05-23',1,2,NULL),
	(40,'Test','this was a test\r\n\r\nThis Task HAs been edited!','2015-06-30','2015-05-28',1,2,'this is a test'),
	(42,'Email Notification','When a task is completed by a user with a user type of team member, the task owner (the manager who created the task) should receive an email notification automatically.','2015-05-31','2015-05-23',1,1,NULL),
	(43,'Task Panel Size ','the longer the description the bigger the task panel, will this cause grid issues?','2015-05-24','2015-05-28',1,2,'Email Test'),
	(46,'This is an example','I made this task during my screen cast! Woohoo!!!','2015-05-24','2015-05-28',1,1,'Once this task is completed we can see how the grid has been fixed!'),
	(47,'Demonstration','This is the task we just created!!!!!!!','2015-05-24','2015-05-28',1,2,'Test #2'),
	(48,'Long description test','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su','2015-05-27',NULL,1,NULL,NULL),
	(49,'Lorem Ipsum','fasfsdfasdf','2015-05-27','2015-05-28',1,2,'Please enter your message.asdfasdfasdf'),
	(50,'This is it!','I hope it works!! :)','2015-05-28','2015-05-28',1,2,'It worked!'),
	(51,'The Email Worked','This is so that I can complete the task as Stan to test functionality. I have already succesfully sent a confirmation email as Wendy. Lets see what happens!!!','2015-05-28','2015-05-28',1,1,'I think it may have worked, lets find out!'),
	(52,'Email format test','Testing changes in the email formatting output by codeigniter','2015-05-28','2015-05-28',1,1,'I hope it worked. I think it will.'),
	(53,'The Email Worked','This is so that I can complete the task as Stan to test functionality. I have already succesfully sent a confirmation email as Wendy. Lets see what happens!!!','2015-05-28','2015-05-28',1,1,'I think it may have worked, lets find out!'),
	(56,'Long description test','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su','2015-05-27','2015-05-28',1,2,'The email thing totally works'),
	(57,'Lorem Ipsum','fasfsdfasdf','2015-05-27','2015-05-28',1,1,'This task has been completed!!'),
	(58,'Long description test','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su','2015-05-27',NULL,1,NULL,NULL),
	(59,'Long description test','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su','2015-05-27',NULL,1,NULL,NULL),
	(60,'Long description test','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su','2015-05-27','2015-05-28',1,2,'This task has been completed, it will be seen during the screen capture!!'),
	(61,'Final Submission ','Create a zip file containing all project files to be submitted via FSO and make a screen capture video to turn in as well','2015-05-28','2015-05-28',1,1,'Don\'t forget to submit your work on FSO!');

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
  `email` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `user_type_1` (`type_id`),
  CONSTRAINT `user_type_1` FOREIGN KEY (`type_id`) REFERENCES `userType` (`user_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `username`, `password`, `type_id`, `email`)
VALUES
	(1,'Stan','5f4dcc3b5aa765d61d8327deb882cf99',1,'pohsible@gmail.com'),
	(2,'Wendy','5f4dcc3b5aa765d61d8327deb882cf99',2,'pohsible@gmail.com');

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
