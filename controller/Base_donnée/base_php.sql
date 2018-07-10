-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 10 juil. 2018 à 07:14
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `base_php`
--

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) DEFAULT NULL,
  `Adresse` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`Id`, `Nom`, `Adresse`) VALUES
(1, 'DELL', '1 Rond-Point Benjamin Franklin, 34000 Montpellier'),
(2, 'APPLE', '7 Place d\'Iéna, 75116 Paris'),
(3, 'VOLTCRAFT', ', Lieu dit rue du Hem \r\nTSA 72001 SEQUEDIN, 59458 LOMME CEDEX, France');

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

DROP TABLE IF EXISTS `materiel`;
CREATE TABLE IF NOT EXISTS `materiel` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `CodeBarre` varchar(255) DEFAULT NULL,
  `Nom` varchar(512) DEFAULT NULL,
  `Description` varchar(512) DEFAULT NULL,
  `DateAchat` date DEFAULT NULL,
  `PrixAchat` float DEFAULT NULL,
  `Deleted` tinyint(4) DEFAULT '0',
  `Fournisseur_Id` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `fk_Materiel_Fournisseur1_idx` (`Fournisseur_Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `materiel`
--

INSERT INTO `materiel` (`Id`, `CodeBarre`, `Nom`, `Description`, `DateAchat`, `PrixAchat`, `Deleted`, `Fournisseur_Id`) VALUES
(1, '123456789', 'Oscilloscope numérique VOLTCRAFT DSO-1062D\r\n', 'Un modèle pratique pour découvrir le monde des oscilloscopes. L\'appareil dispose de deux canaux avec une bande passante de 60 MHz. La fréquence d\'échantillonnage est de 1 Géch/s en temps réel, la mémoire de 512 kpts. Un grand écran couleur 17,7 cm (7\") a été intégré. Il offre une résolution de 800 x 480 pixels ', '2018-07-01', 399.99, 0, 3),
(2, '1231111', 'Apple MacBook Pro 13.3\" 128 Go SSD 8 Go RAM Intel Core i5 bicœur à 2,3 GHz Gris sidéral ', 'Apple MacBook Pro 13.3\" 128 Go SSD 8 Go RAM Intel Core i5 bicœur à 2,3 GHz Gris sidéral ', '2018-06-03', 1500, NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `pret`
--

DROP TABLE IF EXISTS `pret`;
CREATE TABLE IF NOT EXISTS `pret` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `DateDebut` date DEFAULT NULL,
  `DateFinPrevu` date DEFAULT NULL,
  `DateRendu` date DEFAULT NULL,
  `Utilisateur_Id` int(11) NOT NULL,
  `Materiel_id` int(11) NOT NULL,
  PRIMARY KEY (`Id`,`Utilisateur_Id`,`Materiel_id`),
  KEY `fk_Pret_Utilisateur_idx` (`Utilisateur_Id`),
  KEY `fk_Pret_Materiel1_idx` (`Materiel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pret`
--

INSERT INTO `pret` (`Id`, `DateDebut`, `DateFinPrevu`, `DateRendu`, `Utilisateur_Id`, `Materiel_id`) VALUES
(1, '2018-07-10', '2018-07-12', NULL, 2, 2),
(2, '2018-07-10', '2018-07-13', '2018-07-12', 2, 2),
(3, '2018-07-06', '2018-07-10', '2018-07-11', 2, 2),
(4, '2018-07-06', '2018-07-08', '2018-07-08', 2, 2);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Mail` varchar(255) DEFAULT NULL,
  `Login` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Responsable` tinyint(4) DEFAULT '0',
  `Deleted` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Mail_UNIQUE` (`Mail`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`Id`, `Nom`, `Prenom`, `Mail`, `Login`, `Password`, `Responsable`, `Deleted`) VALUES
(1, 'test', 'test', 'test@gmail.com', 'test', 'test', 1, 0),
(2, 'Arnaud', 'Fouillard', 'arnaud.fouillard@inventor.com', 'arnaudF', 'password', 1, 0),
(3, 'Benjamin', 'Trotin', 'benjamin.trotin@inventor.com', 'benjaminT', 'password', 1, 0),
(4, 'Elouen', 'Dumas-Pilhou', 'elouen.dumas@inventor.com', 'elouenD', 'password', 1, 0),
(5, 'Nam', 'Nguyen', 'nam.nguyen@inventor.com', 'namN', 'password', 1, 0),
(6, 'Eleve1', 'Dupond', 'eleve1.dupond@inventor.com', 'eleve1', 'password', 0, 0),
(7, 'Eleve2', 'Pierre', 'eleve2.pierre@inventor.com', 'eleve2', 'password', 0, 0),
(8, 'Eleve3', 'Patou', 'eleve3.patou@inventor.com', 'eleve3', 'password', 0, 0),
(9, 'Eleve4', 'Cule', 'eleve4.cule@inventor.com', 'eleve4', 'password', 0, 0),
(10, 'Eleve5', 'Jean', 'eleve5.jean@inventor.com', 'eleve5', 'password', 0, 0);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD CONSTRAINT `FK_FOURNISSEUR` FOREIGN KEY (`Fournisseur_Id`) REFERENCES `fournisseur` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `pret`
--
ALTER TABLE `pret`
  ADD CONSTRAINT `fk_Pret_Materiel1` FOREIGN KEY (`Materiel_id`) REFERENCES `materiel` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pret_Utilisateur` FOREIGN KEY (`Utilisateur_Id`) REFERENCES `utilisateur` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
