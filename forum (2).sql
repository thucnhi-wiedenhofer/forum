-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 17 jan. 2021 à 21:39
-- Version du serveur :  10.4.11-MariaDB
-- Version de PHP :  7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `forum`
--
CREATE DATABASE IF NOT EXISTS `forum` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `forum`;

-- --------------------------------------------------------

--
-- Structure de la table `connected`
--

DROP TABLE IF EXISTS `connected`;
CREATE TABLE `connected` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `str_connect` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `conversation`
--

DROP TABLE IF EXISTS `conversation`;
CREATE TABLE `conversation` (
  `id` int(11) NOT NULL,
  `titre` varchar(250) NOT NULL,
  `texte` text NOT NULL,
  `publication` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_topic` int(11) NOT NULL,
  `liked` int(11) DEFAULT NULL,
  `disliked` int(11) DEFAULT NULL,
  `ouvert` int(11) NOT NULL,
  `visible` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `conversation`
--

INSERT INTO `conversation` (`id`, `titre`, `texte`, `publication`, `id_utilisateur`, `id_topic`, `liked`, `disliked`, `ouvert`, `visible`) VALUES
(1, 'il fait pas beau', 'Pour ce que j&#39;en dis...', '2021-01-12 08:48:29', 5, 4, 0, 0, 1, 1),
(2, 'voici une conversation membre', 'Il ne fait toujours pas beau aujourd&#39;hui. Et chez vous?', '2021-01-14 08:51:15', 7, 5, 2, 0, 1, 1),
(3, 'membre, il est temps de se lever', 'encore un test', '2021-01-14 08:57:16', 3, 5, 0, 0, 1, 1),
(4, 'essai sur modification', 'tester les modifs /droits', '2021-01-15 07:56:51', 7, 5, 1, 0, 1, 1),
(5, 'essai time', 'essai sur time', '2021-01-15 08:43:09', 7, 5, 0, 0, 1, 1),
(6, 'ceci est une conversation d&#39;admin', 'pour tout le monde', '2021-01-15 09:13:47', 5, 9, 0, 0, 1, 1),
(7, 'test connect', 'test connect', '2021-01-15 10:37:03', 3, 5, 1, 0, 1, 1),
(8, 'le temps est relatif', 'enfin il me semble', '2021-01-17 11:41:33', 7, 4, NULL, NULL, 1, 1),
(9, 'ben je sais pas', 'oui enfin', '2021-01-17 17:34:01', 7, 1, NULL, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `likedconversation`
--

DROP TABLE IF EXISTS `likedconversation`;
CREATE TABLE `likedconversation` (
  `id` int(11) NOT NULL,
  `liked` int(11) DEFAULT NULL,
  `disliked` int(11) DEFAULT NULL,
  `id_conversation` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `likedconversation`
--

INSERT INTO `likedconversation` (`id`, `liked`, `disliked`, `id_conversation`, `id_utilisateur`) VALUES
(1, 1, NULL, 2, 7),
(2, 1, NULL, 2, 6),
(3, NULL, 1, 3, 6),
(4, 1, NULL, 4, 6),
(5, NULL, 1, 5, 6),
(6, 1, NULL, 5, 3),
(7, 1, NULL, 4, 3),
(8, 1, NULL, 3, 3),
(9, 1, NULL, 2, 3),
(10, 1, NULL, 1, 5),
(11, NULL, 1, 8, 7);

-- --------------------------------------------------------

--
-- Structure de la table `likedmessage`
--

DROP TABLE IF EXISTS `likedmessage`;
CREATE TABLE `likedmessage` (
  `id` int(11) NOT NULL,
  `liked` int(11) DEFAULT NULL,
  `disliked` int(11) DEFAULT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_message` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `likedmessage`
--

INSERT INTO `likedmessage` (`id`, `liked`, `disliked`, `id_utilisateur`, `id_message`) VALUES
(1, 1, NULL, 3, 4),
(2, NULL, 1, 3, 1),
(3, NULL, 1, 7, 5);

-- --------------------------------------------------------

--
-- Structure de la table `mail_intranet`
--

DROP TABLE IF EXISTS `mail_intranet`;
CREATE TABLE `mail_intranet` (
  `id_mail` int(11) NOT NULL,
  `objet` varchar(250) NOT NULL,
  `texte` text NOT NULL,
  `id_expediteur` int(11) NOT NULL,
  `id_destinataire` int(11) NOT NULL,
  `envoi` datetime NOT NULL,
  `signalement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `mail_intranet`
--

INSERT INTO `mail_intranet` (`id_mail`, `objet`, `texte`, `id_expediteur`, `id_destinataire`, `envoi`, `signalement`) VALUES
(11, 'vous disiez', 'je voulais vous dire', 3, 7, '2021-01-17 17:35:45', 1);

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `texte` text NOT NULL,
  `publication` datetime NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_conversation` int(11) NOT NULL,
  `liked` int(11) NOT NULL,
  `disliked` int(11) NOT NULL,
  `visible` int(11) NOT NULL,
  `signalement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `texte`, `publication`, `id_utilisateur`, `id_conversation`, `liked`, `disliked`, `visible`, `signalement`) VALUES
(1, 'je suis un membre du forum', '2021-01-14 17:49:03', 7, 2, 0, 0, 1, 0),
(2, 'test des modifications', '2021-01-15 07:57:28', 7, 4, 2, 0, 1, 0),
(3, 'bon et alors?', '2021-01-15 15:28:22', 7, 3, 0, 0, 1, 0),
(4, 'je ne suis pas sur qu&#39;il soit intéressant de publier cela', '2021-01-16 08:04:49', 5, 2, 0, 0, 1, 0),
(5, 'si vous le dites', '2021-01-17 11:43:47', 7, 8, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `topic`
--

DROP TABLE IF EXISTS `topic`;
CREATE TABLE `topic` (
  `id` int(11) NOT NULL,
  `titre` varchar(250) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `date_publication` datetime NOT NULL,
  `droits` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `topic`
--

INSERT INTO `topic` (`id`, `titre`, `id_utilisateur`, `date_publication`, `droits`) VALUES
(1, 'saga Blade Runner', 5, '2021-01-06 12:18:18', 'membre'),
(3, 'Comic Con', 5, '2021-01-09 16:07:29', 'administrateur'),
(4, 'ceci est un topic public', 5, '2021-01-08 10:04:50', 'visiteur'),
(5, 'cela est un topic membre', 5, '2021-01-08 10:05:11', 'membre'),
(8, 'ceci est un topic moderateur', 6, '2021-01-14 08:49:05', 'membre'),
(9, 'ceci est un topic d&#39;administration', 5, '2021-01-15 09:12:54', 'visiteur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE `utilisateurs` (
  `id` int(11) NOT NULL,
  `login` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `intranet` varchar(250) NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `naissance` date NOT NULL,
  `creation` date NOT NULL,
  `genre` varchar(250) NOT NULL,
  `role` varchar(250) NOT NULL,
  `blocage` int(11) DEFAULT NULL,
  `periode_blocage` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `password`, `email`, `intranet`, `avatar`, `naissance`, `creation`, `genre`, `role`, `blocage`, `periode_blocage`) VALUES
(3, 'dada', '$2y$10$MTFBw9IDdPogr7kJMiZOp.osEqunAynGk3gfU/0i3r/3TJ0Lwy8Pa', 'dada@mail.fr', 'dada@intranet', 'avatar9', '1965-08-10', '2021-01-02', 'masculin', 'membre', 1, '2021-01-31'),
(4, 'dodo', '$2y$10$j/UgSPrd9lsD2vXP436/MO8GwFbVWzG.R4M1HUYiTQoawn.tgI6cG', 'dodo@hot.com', 'dodo@intranet', 'avatar8', '1965-08-10', '2021-01-03', 'feminin', 'moderateur', 0, '0001-01-01'),
(5, 'admin', '$2y$10$qo.GuYvwh63DyVdJngGi5O26i4.wViOzsl/hcHs/0R17qEOp4ekfm', 'admin@gmail.com', 'admin@intranet', 'admin', '0000-00-00', '2021-01-06', '', 'admin', NULL, NULL),
(6, 'moderateur', '$2y$10$zx10/YmJESz8nwQfdP9fQOliNNxzgQiS9cX6wNIr.BR48Mu95aGtq', 'moderateur@mod.fr', 'moderateur@intranet', 'avatar9', '1970-10-10', '2021-01-14', 'feminin', 'moderateur', 0, '0000-00-00'),
(7, 'membre', '$2y$10$Tz0TKaf.ZuIoFeCMrPcTxemk.rpB920Hn5B9DkShbgvm7VsUjB/JW', 'membre@membre.fr', 'membre@intranet', 'avatar5', '1995-12-23', '2021-01-14', 'masculin', 'membre', 0, '0000-00-00'),
(8, 'moderateur2', '$2y$10$YHX0j6PCVtONrY/OE1MIg.7ME9m1J8sj9kkXDVTMAVPvGFLEugyru', 'mod@mod.fr', 'moderateur2@intranet', 'avatar2', '1985-08-14', '2021-01-14', 'masculin', 'moderateur', 0, '0000-00-00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `connected`
--
ALTER TABLE `connected`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `likedconversation`
--
ALTER TABLE `likedconversation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `likedmessage`
--
ALTER TABLE `likedmessage`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mail_intranet`
--
ALTER TABLE `mail_intranet`
  ADD PRIMARY KEY (`id_mail`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `connected`
--
ALTER TABLE `connected`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT pour la table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `likedconversation`
--
ALTER TABLE `likedconversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `likedmessage`
--
ALTER TABLE `likedmessage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `mail_intranet`
--
ALTER TABLE `mail_intranet`
  MODIFY `id_mail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
