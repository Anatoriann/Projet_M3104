-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mer. 02 jan. 2019 à 17:47
-- Version du serveur :  10.3.10-MariaDB-log
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `application`
--

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

CREATE TABLE `joueur` (
  `numLicence` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `photo` varchar(255) NOT NULL COMMENT 'Chemin de la photo',
  `dateNaissance` date NOT NULL,
  `taille` double DEFAULT NULL,
  `poids` double DEFAULT NULL,
  `postePrefere` tinyint(4) NOT NULL,
  `statut` tinyint(4) NOT NULL,
  `commentaire` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`numLicence`, `nom`, `prenom`, `photo`, `dateNaissance`, `taille`, `poids`, `postePrefere`, `statut`, `commentaire`) VALUES
(123, 'Decap', 'Cyril', '', '1997-08-25', 1.68, 95, 1, 1, 'InsÃ©rer un commentaire'),
(22222, 'Daubert', 'Laura', '', '1999-09-22', 1.63, 50, 2, 1, ''),
(23456, 'Scamper', 'Jugement', '', '1995-09-01', 1.75, 75, 2, 3, 'Notre petite patate rose <3'),
(123456, 'Fabre', 'Maxime', '', '1999-02-22', 1.7, 35, 5, 1, ''),
(130456, 'Louahadj', 'Ines', '', '1999-12-25', 1.65, 35, 4, 1, 'Il me faut des joueurs'),
(164845, 'Farceur', 'Alexis', '', '1995-05-16', 1.93, 79.99, 2, 1, ''),
(744156, 'Decap', 'JM', '', '1972-02-09', 1.72, 70, 3, 1, ''),
(1456154, 'Salvagnac', 'Maxime', '', '1998-02-25', 1.75, 65, 3, 1, ''),
(1546124, 'Travert', 'JÃ©rÃ´me', '', '1948-06-09', 1.75, 95, 3, 1, 'Il est trop vieux pour Ãªtre titulaire'),
(2508199, 'Decap', 'Julien', '', '1945-12-12', 1.65, 50, 1, 1, ''),
(5445456, 'Corratger', 'Lucas', '', '1962-01-10', 1.01, 10, 5, 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `matchs`
--

CREATE TABLE `matchs` (
  `idMatch` int(11) NOT NULL,
  `dateM` date NOT NULL,
  `heureM` time NOT NULL,
  `nomAdversaire` varchar(50) NOT NULL,
  `lieuDeRencontre` tinyint(2) NOT NULL,
  `resAdv` tinyint(4) DEFAULT NULL,
  `resLocal` tinyint(4) DEFAULT NULL,
  `statut` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `matchs`
--

INSERT INTO `matchs` (`idMatch`, `dateM`, `heureM`, `nomAdversaire`, `lieuDeRencontre`, `resAdv`, `resLocal`, `statut`) VALUES
(9, '2018-12-18', '22:22:00', 'T1', 1, NULL, NULL, 0),
(10, '1997-08-25', '12:00:00', 'Les idiot', 1, 3, 2, 2),
(11, '1997-08-25', '03:00:00', 'Bijour', 2, 5, 0, 2),
(12, '1997-08-25', '12:00:00', 'Bonjour', 1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `participerremplacant`
--

CREATE TABLE `participerremplacant` (
  `numLicence` int(11) NOT NULL,
  `idMatch` int(11) NOT NULL,
  `notation` tinyint(4) DEFAULT NULL,
  `commentaire` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `participerremplacant`
--

INSERT INTO `participerremplacant` (`numLicence`, `idMatch`, `notation`, `commentaire`) VALUES
(123, 9, NULL, NULL),
(744156, 9, NULL, NULL),
(1456154, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `participertitulaire`
--

CREATE TABLE `participertitulaire` (
  `numLicence` int(11) NOT NULL,
  `idMatch` int(11) NOT NULL,
  `posteOccupe` tinyint(4) NOT NULL,
  `notation` tinyint(4) DEFAULT NULL,
  `commentaire` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `mdp`) VALUES
(1, 'coach', '$2y$10$bFfRhLj.CPFQRl1V6MiWTe8bo1nsQQ8JkYeOfZAhssCKtvzyhyd46');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `joueur`
--
ALTER TABLE `joueur`
  ADD PRIMARY KEY (`numLicence`);

--
-- Index pour la table `matchs`
--
ALTER TABLE `matchs`
  ADD PRIMARY KEY (`idMatch`);

--
-- Index pour la table `participerremplacant`
--
ALTER TABLE `participerremplacant`
  ADD PRIMARY KEY (`numLicence`,`idMatch`),
  ADD KEY `fk_remplacant_idMatch` (`idMatch`);

--
-- Index pour la table `participertitulaire`
--
ALTER TABLE `participertitulaire`
  ADD PRIMARY KEY (`numLicence`,`idMatch`),
  ADD KEY `fk_titulaire_idMatch` (`idMatch`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `matchs`
--
ALTER TABLE `matchs`
  MODIFY `idMatch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `participerremplacant`
--
ALTER TABLE `participerremplacant`
  ADD CONSTRAINT `fk_remplacant_idMatch` FOREIGN KEY (`idMatch`) REFERENCES `matchs` (`idMatch`),
  ADD CONSTRAINT `fk_remplacant_numLicence` FOREIGN KEY (`numLicence`) REFERENCES `joueur` (`numLicence`);

--
-- Contraintes pour la table `participertitulaire`
--
ALTER TABLE `participertitulaire`
  ADD CONSTRAINT `fk_titulaire_idMatch` FOREIGN KEY (`idMatch`) REFERENCES `matchs` (`idMatch`),
  ADD CONSTRAINT `fk_titulaire_numLicence` FOREIGN KEY (`numLicence`) REFERENCES `joueur` (`numLicence`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
