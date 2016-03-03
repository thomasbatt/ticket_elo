-- Adminer 4.2.2 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `bistrot_commands`;
CREATE TABLE `bistrot_commands` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `plat_id` int(10) unsigned NOT NULL,
  `statut` varchar(15) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `plat_id` (`plat_id`),
  CONSTRAINT `bistrot_commands_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `bistrot_users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `bistrot_commands_ibfk_3` FOREIGN KEY (`plat_id`) REFERENCES `bistrot_plats` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `bistrot_comments`;
CREATE TABLE `bistrot_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `command_id` int(11) unsigned NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `command_id` (`command_id`),
  CONSTRAINT `bistrot_comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `bistrot_users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `bistrot_comments_ibfk_2` FOREIGN KEY (`command_id`) REFERENCES `bistrot_commands` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `bistrot_plats`;
CREATE TABLE `bistrot_plats` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `price` int(3) NOT NULL DEFAULT '5',
  `day` int(2) NOT NULL,
  `week` int(2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `bistrot_users`;
CREATE TABLE `bistrot_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(31) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(511) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `first_name` varchar(63) DEFAULT NULL,
  `last_name` varchar(63) DEFAULT NULL,
  `role` varchar(15) NOT NULL DEFAULT 'user',
  `statut` varchar(15) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- 2016-02-23 14:26:08
