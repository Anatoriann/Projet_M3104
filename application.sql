-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  sam. 08 déc. 2018 à 16:45
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
(1234, 'Test', 'Un', 'uneUrl', '2018-12-05', 1.8, 80, 0, 1, 'c_est un test');

-- --------------------------------------------------------

--
-- Structure de la table `matchs`
--

CREATE TABLE `matchs` (
  `idMatch` int(11) NOT NULL,
  `dateM` date NOT NULL,
  `nomAdversaire` varchar(50) NOT NULL,
  `lieuDeRencontre` tinyint(2) NOT NULL,
  `resAdv` tinyint(4) DEFAULT NULL,
  `resLocal` tinyint(4) DEFAULT NULL,
  `statut` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `participerremplacant`
--

CREATE TABLE `participerremplacant` (
  `numLicence` int(11) NOT NULL,
  `idMatch` int(11) NOT NULL,
  `posteOccupe` tinyint(4) NOT NULL,
  `notation` tinyint(4) NOT NULL,
  `commentaire` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `participertitulaire`
--

CREATE TABLE `participertitulaire` (
  `numLicence` int(11) NOT NULL,
  `idMatch` int(11) NOT NULL,
  `posteOccupe` tinyint(4) NOT NULL,
  `notation` tinyint(4) NOT NULL,
  `commentaire` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `matchs`
--
ALTER TABLE `matchs`
  MODIFY `idMatch` int(11) NOT NULL AUTO_INCREMENT;

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