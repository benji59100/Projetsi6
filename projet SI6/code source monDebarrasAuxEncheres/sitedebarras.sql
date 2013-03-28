-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Ven 22 Mars 2013 à 13:52
-- Version du serveur: 5.5.16
-- Version de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `sitedebarras`
--

-- --------------------------------------------------------

--
-- Structure de la table `enchere`
--

CREATE TABLE IF NOT EXISTS `enchere` (
  `id` int(11) NOT NULL COMMENT 'Correspond a l''ID Enchere',
  `nomEnchere` varchar(25) NOT NULL COMMENT 'Correspond au nom de l''enchere',
  `description` varchar(140) NOT NULL COMMENT 'Description de l''enchere',
  `idUser` int(11) NOT NULL COMMENT 'Correspond a l''ID de l''utilisateur',
  `prix` int(11) NOT NULL COMMENT 'Prix de l''enchere',
  `duree` int(11) NOT NULL COMMENT 'Durée de mise en vente',
  `DateHeureMiseEnVente` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idUser` (`idUser`),
  UNIQUE KEY `idUser_2` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `intitule` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `profil`
--

INSERT INTO `profil` (`id`, `intitule`) VALUES
(1, 'admin'),
(2, 'débarrasseur');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL COMMENT 'Concerne l''ID Utilisateur',
  `login` varchar(25) NOT NULL COMMENT 'Concerne le Login Utilisateur',
  `password` varchar(25) NOT NULL COMMENT 'Mot de Passe User',
  `adresseMail` varchar(50) NOT NULL COMMENT 'Adresse Mail',
  `idProfil` int(11) NOT NULL COMMENT 'id Profil admin ou debarasseur',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idProfil` (`idProfil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `enchere`
--
ALTER TABLE `enchere`
  ADD CONSTRAINT `enchere_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `utilisateur_ibfk_1` FOREIGN KEY (`idProfil`) REFERENCES `profil` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
