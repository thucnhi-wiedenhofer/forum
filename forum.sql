-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mer. 20 jan. 2021 à 08:22
-- Version du serveur :  5.5.68-MariaDB
-- Version de PHP :  7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `thuc-nhi-wiedenhofer_forum`
--
CREATE DATABASE IF NOT EXISTS `thuc-nhi-wiedenhofer_forum` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `thuc-nhi-wiedenhofer_forum`;

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
(10, 'Une communautÃ© trÃ©s animÃ©e', 'Rejoignez notre communautÃ© de fans de science fiction dans un cadre convivial et modÃ©rÃ© par nos soins.', '2021-01-18 14:51:35', 5, 11, NULL, NULL, 1, 1),
(11, 'INTRANET', 'Pour contacter dans le forum un membre ou un modÃ©rateur, regardez son profil et cliquez sur intranet.\r\nUne fois inscrits, bien entendu...', '2021-01-18 14:53:10', 5, 11, NULL, NULL, 1, 1),
(12, 'Intranet n&#39;est pas entiÃ©rement privÃ©e.', 'Je vous rappelle que les membres ont la possibilitÃ© de signaler un mail intranet si son contenu n&#39;est pas appropriÃ©. L&#39;administrateur a accÃ©s Ã  vos messages pour vÃ©rifier. Restez discrets...', '2021-01-18 14:57:31', 6, 12, NULL, NULL, 1, 1),
(13, 'Blade Runner 2049', 'Avez vous  regardÃ© le dernier blade runner et l&#39;avez vous apprÃ©ciÃ© ?\r\nPour ma part, la suite n&#39;arrive pas Ã  la cheville du film culte de Ridley Scott.\r\nBien que les dÃ©cors et les prises de vues soient  bien, le film est long et ennuyeux .', '2021-01-18 14:57:59', 9, 10, NULL, NULL, 1, 1),
(14, 'Peux t&#39;on signaler un membre?', 'Si le propos est inapropriÃ©, peux t&#39;on signaler un membre? Style, un troll?', '2021-01-18 16:25:51', 11, 12, NULL, NULL, 1, 1),
(15, 'Chewbacca est mort', 'Qui joue le rÃ´le de Chewbacca?', '2021-01-18 16:28:18', 6, 13, NULL, NULL, 1, 1),
(16, 'Votre avis sur les bugs', 'Les heureux possesseurs ont pu terminer en moins de 35 heures le jeu. Pour les possesseurs de console, les bugs ont presque entiÃ©rement bloquÃ© le jeu. Et vous', '2021-01-18 16:34:55', 5, 14, NULL, NULL, 1, 1),
(17, 'Opus netflix 2021', 'l&#39;Ã©quipe de black mirror a rÃ©alisÃ© un petit opus Ã  voir sur netflix, l&#39;annÃ©e 2020 comme il se doit. Son titre Death to 2020', '2021-01-20 08:53:54', 6, 15, NULL, NULL, 1, 1);

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
(12, 1, NULL, 17, 6);

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
(4, NULL, 1, 10, 6),
(5, 1, NULL, 6, 6),
(6, 1, NULL, 5, 9),
(7, 1, NULL, 10, 14),
(8, 1, NULL, 6, 15);

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
(12, 'test de votre intranet', 'Nous devons confirmer votre intranet avec ce test', 5, 9, '2021-01-18 15:32:28', 0),
(13, 'Un site pour le regarder?', 'Je cherche un site pour stream bladerunner, si vous connaissez, merci', 10, 9, '2021-01-18 16:43:35', 0),
(14, 'blade runner en streaming', 'bonjour Denis,\r\nEssaie le site ooviv. un site super...', 9, 10, '2021-01-18 16:46:50', 0);

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
(6, 'Super! je suis super contente de rejoindre votre forum. Je suis fan de films de science fiction', '2021-01-18 15:01:09', 9, 10, 0, 0, 1, 0),
(7, 'Par contre en voyant le thumb down, je trouve que les trolls sur ce forum sont nombreux', '2021-01-18 15:02:57', 10, 10, 0, 0, 1, 0),
(8, 'Oui cela fait partie du charme des forums. Ne nourrissez pas les trolls. Ignorez les simplement.', '2021-01-18 15:04:30', 6, 10, 0, 0, 1, 0),
(9, 'C&#39;est une drÃ´le de question, venant d&#39;un troll. Oui nous pouvons bloquer un utilisateur, ou le contenu de ses messages', '2021-01-18 16:27:56', 5, 14, 0, 0, 1, 0),
(10, 'Voila une question qui va rÃ©veiller les trolls...', '2021-01-18 16:29:00', 5, 15, 0, 0, 1, 0),
(11, 'Je suis lÃ : j&#39;ai voulu le remplacer mais je n&#39;Ã©tais pas assez poilu...', '2021-01-18 16:31:06', 11, 15, 0, 0, 1, 1),
(12, 'trÃ¨s drÃ´le! tu peux peut Ãªtre jouer le rÃ´le de Java alors...', '2021-01-18 16:34:27', 9, 15, 0, 0, 1, 0),
(13, 'Je prÃ©fÃ©re quand mÃªme la premiÃ©re version.', '2021-01-18 16:41:31', 10, 13, 0, 0, 1, 0),
(14, 'Je me suis rÃ©galÃ©, bouclÃ© en 40 h, maintenant je fais les missions secondaires, en attendant les DLC.', '2021-01-18 16:45:37', 10, 16, 0, 0, 1, 0),
(15, 'Je viens de le regarder, c&#39;est dÃ©sopilant.', '2021-01-20 08:55:23', 6, 17, 0, 0, 1, 0);

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
(10, 'Blade Runner', 5, '2021-01-18 14:48:10', 'membre'),
(11, 'Rejoignez-nous en vous inscrivant!', 5, '2021-01-18 14:50:33', 'visiteur'),
(12, 'Usage de l&#39;intranet', 6, '2021-01-18 14:54:44', 'membre'),
(13, 'Saga Star Wars', 6, '2021-01-18 16:23:51', 'membre'),
(14, 'Cyberpunk 2077', 5, '2021-01-18 16:33:38', 'visiteur'),
(15, 'Black Mirror', 6, '2021-01-20 08:52:38', 'visiteur');

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
(5, 'admin', '$2y$10$qo.GuYvwh63DyVdJngGi5O26i4.wViOzsl/hcHs/0R17qEOp4ekfm', 'admin@gmail.com', 'admin@intranet', 'admin', '0000-00-00', '2021-01-06', '', 'admin', NULL, NULL),
(6, 'moderateur', '$2y$10$zx10/YmJESz8nwQfdP9fQOliNNxzgQiS9cX6wNIr.BR48Mu95aGtq', 'moderateur@mod.fr', 'moderateur@intranet', 'avatar9', '1970-10-10', '2021-01-14', 'feminin', 'moderateur', 0, '0000-00-00'),
(7, 'membre', '$2y$10$Tz0TKaf.ZuIoFeCMrPcTxemk.rpB920Hn5B9DkShbgvm7VsUjB/JW', 'membre@membre.fr', 'membre@intranet', 'avatar5', '1995-12-23', '2021-01-14', 'masculin', 'membre', 0, '0000-00-00'),
(9, 'noÃ©mie', '$2y$10$6DE2sINl862XfsUlHjE7ge2lmhFqlOUxi0w0DKGBP/NYtYD2UnuZ6', 'mims@gmail.com', 'noÃ©mie@intranet', 'avatar8', '1992-12-06', '2021-01-18', 'feminin', 'membre', 0, '0001-01-01'),
(10, 'denis', '$2y$10$el2HtnQ.GNdlA732WB3L2.DpTTwEMNFNeH5Pcu0hWfxEWYQ.YTe9i', 'denis@yahoo.fr', 'denis@intranet', 'avatar2', '1965-08-10', '2021-01-18', 'masculin', 'membre', 0, '0001-01-01'),
(11, 'Troll', '$2y$10$IqX4HKPycUO5WiD0Sq/5PeCLm1f0OB3IPGgTva42lIzBrYtevESzq', 'Troll@troll.fr', 'Troll@intranet', 'avatar6', '2010-10-10', '2021-01-18', 'masculin', 'membre', 1, '2021-01-31');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT pour la table `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `likedconversation`
--
ALTER TABLE `likedconversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `likedmessage`
--
ALTER TABLE `likedmessage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `mail_intranet`
--
ALTER TABLE `mail_intranet`
  MODIFY `id_mail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
