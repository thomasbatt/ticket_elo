-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 29, 2016 at 06:02 PM
-- Server version: 5.5.46-0ubuntu0.14.04.2
-- PHP Version: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thomasbazshare`
--

-- --------------------------------------------------------

--
-- Table structure for table `ticket_tickets`
--

CREATE TABLE IF NOT EXISTS `ticket_tickets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `statut` varchar(15) NOT NULL,
  `date_update` datetime NOT NULL,
  `img` varchar(255) NOT NULL,
  `treatment_id` int(11) NOT NULL,
  `dead_line` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_users`
--

CREATE TABLE IF NOT EXISTS `ticket_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(31) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `last_name` varchar(63) NOT NULL,
  `first_name` varchar(63) NOT NULL,
  `password` varchar(511) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(15) NOT NULL,
  `statut` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `ticket_users`
--

INSERT INTO `ticket_users` (`id`, `login`, `email`, `phone`, `avatar`, `last_name`, `first_name`, `password`, `created`, `role`, `statut`) VALUES
(1, 'thomas', '', '', '', '', '', '$2y$12$S6dt6ZzwD3ZqxIKUGFr58.SGOAwT4Z7IWcRfGoIsWixFu7PkDqB22', '2016-02-29 16:30:32', '', ''),
(2, 'greg', '', '', '', '', '', '$2y$12$I7Ai/YZxnyUdxa0cxCdK5ecO7Jwjni1PG.zRT9QmY8F8qS9qHVJ8G', '2016-02-29 16:39:35', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
