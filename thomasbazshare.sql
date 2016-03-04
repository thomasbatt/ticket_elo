-- phpMyAdmin SQL Dump
-- version 4.5.5
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Ven 04 Mars 2016 à 05:12
-- Version du serveur :  5.6.28-0ubuntu0.15.10.1
-- Version de PHP :  5.6.11-1ubuntu3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `thomasbazshare`
--

-- --------------------------------------------------------

--
-- Structure de la table `ticket_tickets`
--

CREATE TABLE `ticket_tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` int(10) UNSIGNED NOT NULL,
  `title` varchar(15) NOT NULL,
  `content` varchar(255) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `statut` varchar(15) NOT NULL,
  `editing` tinyint(1) NOT NULL DEFAULT '1',
  `img` varchar(255) NOT NULL,
  `treatment_id` int(11) UNSIGNED NOT NULL,
  `dead_line` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ticket_tickets`
--

INSERT INTO `ticket_tickets` (`id`, `position`, `title`, `content`, `user_id`, `date`, `statut`, `editing`, `img`, `treatment_id`, `dead_line`) VALUES
(6, 0, 'ticket 3', 'ùodhfigmo rmeogh remgju rheg', 1, '2016-03-04 00:47:37', 'editing', 0, '', 1, '0000-00-00 00:00:00'),
(8, 0, 'ticket 5', 'ùodhfigmo rmdtyjdt remgju rheg', 1, '2016-03-04 04:08:37', 'done', 0, '', 1, '0000-00-00 00:00:00'),
(9, 0, 'ticket 6', 'ùodhfigmdtyjdteogh remgju rheg', 1, '2016-03-04 00:47:25', 'done', 0, '', 1, '0000-00-00 00:00:00'),
(21, 0, '', 'tttttttttttttttttttttttttttttt', 4, '2016-03-04 00:47:09', 'done', 0, '', 1, '0000-00-00 00:00:00'),
(29, 0, '', 'dsqdqsdqdq', 2, '2016-03-04 00:46:54', 'done', 0, '', 1, '0000-00-00 00:00:00'),
(34, 0, 'dzgzdbvzdb', 'dzgzdg', 1, '2016-03-04 03:57:05', 'todo', 0, '', 1, '0000-00-00 00:00:00'),
(37, 0, 'zdrg<sg', 'zsgsdgvszd', 1, '2016-03-04 03:58:49', 'current', 0, '', 1, '0000-00-00 00:00:00'),
(38, 0, 'rwhwrhgrtwhg', 'rthsrhsrhrhrtyhr rydht', 1, '2016-03-04 04:08:00', 'todo', 0, '', 1, '0000-00-00 00:00:00'),
(40, 0, 'drhgsdg', 'dsrgdsgbdzffvbd', 1, '2016-03-04 04:07:39', 'current', 0, '', 1, '0000-00-00 00:00:00'),
(41, 0, 'drgsrg', 'sdvsdvsdv ', 1, '2016-03-04 03:59:33', 'todo', 0, '', 1, '0000-00-00 00:00:00'),
(42, 0, 'Mon titre', 'Mon contenu', 1, '2016-03-04 04:03:49', 'todo', 1, '', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `ticket_users`
--

CREATE TABLE `ticket_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(31) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `last_name` varchar(63) NOT NULL,
  `first_name` varchar(63) NOT NULL,
  `password` varchar(511) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(15) NOT NULL,
  `statut` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Index pour les tables exportées
--

--
-- Index pour la table `ticket_tickets`
--
ALTER TABLE `ticket_tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `treatment_id` (`treatment_id`);

--
-- Index pour la table `ticket_users`
--
ALTER TABLE `ticket_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `ticket_tickets`
--
ALTER TABLE `ticket_tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT pour la table `ticket_users`
--
ALTER TABLE `ticket_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `ticket_tickets`
--
ALTER TABLE `ticket_tickets`
  ADD CONSTRAINT `ticket_tickets_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `ticket_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ticket_tickets_ibfk_2` FOREIGN KEY (`treatment_id`) REFERENCES `ticket_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
