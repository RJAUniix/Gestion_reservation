-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 29 jan. 2023 à 20:31
-- Version du serveur :  8.0.21
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_reservation`
--

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

DROP TABLE IF EXISTS `chambre`;
CREATE TABLE IF NOT EXISTS `chambre` (
  `numChambre` int NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`numChambre`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chambre`
--

INSERT INTO `chambre` (`numChambre`) VALUES
(1),
(2),
(3),
(4),
(5);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `idClient` int NOT NULL AUTO_INCREMENT,
  `nomClient` varchar(30) NOT NULL,
  `prenomClient` varchar(100) NOT NULL,
  `telClient` varchar(30) NOT NULL,
  `nationalite` varchar(30) NOT NULL,
  `CIN` int NOT NULL,
  PRIMARY KEY (`idClient`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `nomClient`, `prenomClient`, `telClient`, `nationalite`, `CIN`) VALUES
(36, 'RABESON', 'Jovial Ritchi', '0329075309', 'Malagasy', 321),
(35, 'RABESON', 'Johanne AndrÃ©as ', '0329075309', 'Malagasy', 0),
(46, 'RABESON ', 'Johis ', '033215566', 'malges', 4567),
(47, 'RANDRIANTSARA', 'Pricella', '0332565489', 'Malagasy', 154877788),
(48, 'RABESON', 'Johanne Andréas', '0329075309', 'Malagasy', 2147483647);

-- --------------------------------------------------------

--
-- Structure de la table `receptionniste`
--

DROP TABLE IF EXISTS `receptionniste`;
CREATE TABLE IF NOT EXISTS `receptionniste` (
  `idRecep` int NOT NULL,
  `nomRecep` varchar(30) NOT NULL,
  `prenomRecep` varchar(30) NOT NULL,
  `telReceptionniste` varchar(30) NOT NULL,
  `idUtilisateur` int NOT NULL,
  PRIMARY KEY (`idRecep`,`idUtilisateur`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `receptionniste`
--

INSERT INTO `receptionniste` (`idRecep`, `nomRecep`, `prenomRecep`, `telReceptionniste`, `idUtilisateur`) VALUES
(1, 'RABESON', 'Johanne Andréas', '032 90 753 09', 1),
(2, 'Elle', 'Pricella', '032030322', 2),
(0, 'RABESON', 'Johanne Andréas', '0329075309', 3),
(2, 'RABESON', 'Johanne Andréas', '0329075309', 4),
(2, 'RABESON', 'Johanne Andréas', '0329075309', 5),
(2, 'RABESON', 'Johanne Andréas', '0329075309', 6);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `idReservation` int NOT NULL AUTO_INCREMENT,
  `debutSejour` date NOT NULL,
  `finSejour` date NOT NULL,
  `dateReservation` date NOT NULL,
  `nbrPersonne` int NOT NULL DEFAULT '1',
  `libellee` text NOT NULL,
  `idStatut` int NOT NULL,
  `idType` int NOT NULL,
  `idUtilisateur` int NOT NULL,
  `idClient` int NOT NULL,
  `numChambre` int NOT NULL,
  `idTypeChambre` int NOT NULL,
  PRIMARY KEY (`idReservation`,`idStatut`,`idType`,`idUtilisateur`,`idClient`),
  KEY `numChambre` (`numChambre`),
  KEY `idTypeChambre` (`idTypeChambre`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`idReservation`, `debutSejour`, `finSejour`, `dateReservation`, `nbrPersonne`, `libellee`, `idStatut`, `idType`, `idUtilisateur`, `idClient`, `numChambre`, `idTypeChambre`) VALUES
(63, '2023-02-04', '2023-03-10', '2023-01-29', 2, 'no comment', 1, 1, 5, 47, 2, 3),
(64, '2023-02-04', '2023-02-05', '2023-01-29', 1, 'no comment', 2, 1, 5, 48, 4, 1),
(62, '2023-02-01', '2023-02-02', '2023-01-29', 54, 'anniversaire surprise', 3, 2, 5, 36, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

DROP TABLE IF EXISTS `statut`;
CREATE TABLE IF NOT EXISTS `statut` (
  `idStatut` int NOT NULL AUTO_INCREMENT,
  `statut_reservation` varchar(30) NOT NULL DEFAULT 'En attente',
  PRIMARY KEY (`idStatut`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`idStatut`, `statut_reservation`) VALUES
(1, 'VALIDEE'),
(2, 'ANNULEE'),
(3, 'EN ATTENTE');

-- --------------------------------------------------------

--
-- Structure de la table `type_chambre`
--

DROP TABLE IF EXISTS `type_chambre`;
CREATE TABLE IF NOT EXISTS `type_chambre` (
  `idTypeChambre` int NOT NULL AUTO_INCREMENT,
  `type_chambre` varchar(30) NOT NULL,
  PRIMARY KEY (`idTypeChambre`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_chambre`
--

INSERT INTO `type_chambre` (`idTypeChambre`, `type_chambre`) VALUES
(1, 'Standard'),
(2, 'Familiale'),
(3, 'VIP');

-- --------------------------------------------------------

--
-- Structure de la table `type_reservation`
--

DROP TABLE IF EXISTS `type_reservation`;
CREATE TABLE IF NOT EXISTS `type_reservation` (
  `idType` int NOT NULL AUTO_INCREMENT,
  `Type` varchar(30) NOT NULL,
  PRIMARY KEY (`idType`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_reservation`
--

INSERT INTO `type_reservation` (`idType`, `Type`) VALUES
(1, 'Chambres'),
(2, 'Grande salle');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `idUtilisateur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `mdp` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date` timestamp NOT NULL,
  PRIMARY KEY (`idUtilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idUtilisateur`, `nom`, `mdp`, `date`) VALUES
(5, 'johanne', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2023-01-28 23:00:00'),
(6, 'andreas', 'dc76e9f0c0006e8f919e0c515c66dbba3982f785', '2023-01-28 23:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
