-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 01 Mars 2016 à 16:51
-- Version du serveur: 5.5.46-0ubuntu0.14.04.2
-- Version de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données: `thomasbazshare`
--

-- --------------------------------------------------------

--
-- Structure de la table `ticket_tickets`
--

CREATE TABLE IF NOT EXISTS `ticket_tickets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(15) NOT NULL,
  `content` varchar(255) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `statut` varchar(15) NOT NULL,
  `img` varchar(255) NOT NULL,
  `treatment_id` int(11) unsigned NOT NULL,
  `dead_line` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `treatment_id` (`treatment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Contenu de la table `ticket_tickets`
--

INSERT INTO `ticket_tickets` (`id`, `title`, `content`, `user_id`, `date`, `statut`, `img`, `treatment_id`, `dead_line`) VALUES
(5, 'ticket 1', '', 1, '2016-03-01 15:34:17', 'todo', '', 1, '0000-00-00 00:00:00'),
(6, 'ticket 3', 'ùodhfigmo rmeogh remgju rheg', 1, '2016-03-01 15:34:17', 'current', '', 1, '0000-00-00 00:00:00'),
(7, 'ticket 4', 'ùodhfigmo rmeogh remgju rheg', 1, '2016-03-01 15:34:17', 'todo', '', 1, '0000-00-00 00:00:00'),
(8, 'ticket 5', 'ùodhfigmo rmdtyjdt remgju rheg', 1, '2016-03-01 15:34:17', 'current', '', 1, '0000-00-00 00:00:00'),
(9, 'ticket 6', 'ùodhfigmdtyjdteogh remgju rheg', 1, '2016-03-01 15:34:17', 'todo', '', 1, '0000-00-00 00:00:00'),
(10, 'ticket 7', 'ùodhfigmdtyjdteogh remgju rheg', 1, '2016-03-01 15:34:17', 'todo', '', 1, '0000-00-00 00:00:00'),
(11, 'ticket 8', 'ùodhfigdtyjrmeogh remgju rheg', 1, '2016-03-01 15:34:17', 'current', '', 1, '0000-00-00 00:00:00'),
(12, 'ticket 9', 'ùodhfigmo rmdtyjdt remgju rheg', 1, '2016-03-01 09:50:33', 'done', '', 1, '0000-00-00 00:00:00'),
(13, 'ticket 10', 'ùodhfigdtyjdtogh remgju rheg', 1, '2016-03-01 09:50:33', 'done', '', 1, '0000-00-00 00:00:00'),
(19, '', 'kkkkkkkkkkkkk', 4, '2016-03-01 15:34:17', 'todo', '', 1, '0000-00-00 00:00:00'),
(20, '', 'btgbntygh', 4, '2016-03-01 15:34:17', 'current', '', 1, '0000-00-00 00:00:00'),
(21, '', 'tttttttttttttttttttttttttttttt', 4, '2016-03-01 15:34:17', 'done', '', 1, '0000-00-00 00:00:00'),
(22, '', 'dddddddddddddddddddddd', 4, '2016-03-01 15:34:17', 'todo', '', 1, '0000-00-00 00:00:00'),
(23, '', 'kihyihihi', 4, '2016-03-01 15:34:17', 'done', '', 1, '0000-00-00 00:00:00'),
(24, '', 'kihyihihi', 4, '2016-03-01 15:34:17', 'done', '', 1, '0000-00-00 00:00:00'),
(25, '', 'hhththt', 4, '2016-03-01 15:34:17', 'todo', '', 1, '0000-00-00 00:00:00'),
(26, '', 'hello !!', 4, '2016-03-01 15:34:17', 'current', '', 1, '0000-00-00 00:00:00'),
(27, '', 'Hello ! Voyons si Ã§a fonctionne ! :D', 4, '2016-03-01 15:34:17', 'todo', '', 1, '0000-00-00 00:00:00'),
(28, '', 'Hello ! Voyons si Ã§a fonctionne ! :D', 4, '2016-03-01 15:34:17', 'done', '', 1, '0000-00-00 00:00:00'),
(29, '', 'dsqdqsdqdq', 2, '2016-03-01 15:34:17', 'current', '', 1, '0000-00-00 00:00:00'),
(30, '', 'dddddddddddddddddddddd', 4, '2016-03-01 15:34:17', 'current', '', 1, '0000-00-00 00:00:00'),
(31, '', 'cccccccccccccccccc', 4, '2016-03-01 15:34:17', 'todo', '', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `ticket_users`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `ticket_users`
--

INSERT INTO `ticket_users` (`id`, `login`, `email`, `phone`, `avatar`, `last_name`, `first_name`, `password`, `created`, `role`, `statut`) VALUES
(1, 'thomas', '', '', '', '', '', '$2y$12$S6dt6ZzwD3ZqxIKUGFr58.SGOAwT4Z7IWcRfGoIsWixFu7PkDqB22', '2016-02-29 16:30:32', '', ''),
(2, 'greg', '', '', '', '', '', '$2y$12$I7Ai/YZxnyUdxa0cxCdK5ecO7Jwjni1PG.zRT9QmY8F8qS9qHVJ8G', '2016-02-29 16:39:35', '', ''),
(3, 'Webst', 'info@visual-photographies.fr', '0685447113', '020b9c4bfa138530ee309cb2898486ab.jpg', 'WEBER', 'Jean Olivier', '$2y$12$VwUdHxf1Eno9qfiAqeyVFOQk/AsHYtOWUkh..kR6WwHiibtuoWeGi', '2016-03-01 08:42:14', '', ''),
(4, 'titi', 'titi.grominet@gmail.com', '0205048851', 'images.jpg', 'Grominet', 'Titi', '$2y$12$jpLFWVQS.YcCCO1gJtygWOPI0qmEmOpzW2RgFoaSeB1nZxt7/XXaO', '2016-03-01 11:27:54', '', ''),
(5, 'toto', 'toto@toto.com', '0123456789', '1', 'toto', 'toto', '$2y$12$Hgs6yVliSvqNbzNiN2p/J.htE66k.Vpuu2pw4VMeVSdYG4R00HvNi', '2016-03-01 15:03:09', '', '');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `ticket_tickets`
--
ALTER TABLE `ticket_tickets`
  ADD CONSTRAINT `ticket_tickets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `ticket_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_tickets_ibfk_2` FOREIGN KEY (`treatment_id`) REFERENCES `ticket_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
