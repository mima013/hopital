-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 05 Février 2021 à 09:00
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `gest`
--

-- --------------------------------------------------------

--
-- Structure de la table `nve`
--

CREATE TABLE IF NOT EXISTS `nve` (
  `Id_nouveau` int(11) NOT NULL AUTO_INCREMENT,
  `nom_mere` varchar(250) NOT NULL,
  `postnom_mere` varchar(250) NOT NULL,
  `prenom_mere` varchar(250) NOT NULL,
  `dat_mere` date NOT NULL,
  `adresse` varchar(250) NOT NULL,
  `numero` varchar(13) NOT NULL,
  `lieu` varchar(250) NOT NULL,
  `nom_lieu` varchar(250) NOT NULL,
  `nom_enfant` varchar(250) NOT NULL,
  `postnom_enfant` varchar(250) NOT NULL,
  `prenom_enfant` varchar(250) NOT NULL,
  `dat_enfant` date NOT NULL,
  `heure` varchar(6) NOT NULL,
  `poids` varchar(250) NOT NULL,
  PRIMARY KEY (`Id_nouveau`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `nve`
--

INSERT INTO `nve` (`Id_nouveau`, `nom_mere`, `postnom_mere`, `prenom_mere`, `dat_mere`, `adresse`, `numero`, `lieu`, `nom_lieu`, `nom_enfant`, `postnom_enfant`, `prenom_enfant`, `dat_enfant`, `heure`, `poids`) VALUES
(2, 'Oliv', 'mali', 'som', '0000-00-00', 'lubumbashi', '099987787', 'Lubumbashi', 'les mels', 'laure', 'mali', 'lembo', '0000-00-00', '10h30', '3kg'),
(3, 'Rosette', 'Muliwa', 'mula', '0000-00-00', 'goma', '09888989', 'rwanda', 'mitonge hopital', 'ndaeshimiye', 'Muliwa', 'francine', '0000-00-00', '00h30', '1.5kg'),
(4, 'Louise', 'maliyasasa', 'Mimi', '1998-05-29', 'uganda', '098889767', 'bukavu', 'sky born', 'mushayuma', 'maliyasasa', 'roland', '2020-05-21', '7h9', '2kg'),
(5, 'Mamy', 'Lulu', 'Tondo', '1998-02-04', 'uganda', '097778156', 'Kinshasa', 'Hopital du cinquante', 'Yola', 'Lulu', 'La belle', '2020-05-07', '17h20', '3.5kg'),
(6, 'olive', 'mat', 'chiba', '2009-01-22', 'lubumbashi', '243978068311', 'lubumbashi', 'sendwe', 'Magayane Yannick', 'mat', 'luis', '2017-02-22', '11h30', '2kg'),
(7, 'uupijpiÃ¹', 'jga!up!!', 'jmugapufgupm', '2020-06-04', 'bgfapuguÃ¹', '89808767', 'Lubumbashi', 'mitonge hopital', 'laure', 'jga!up!!', 'francine', '2020-06-18', '7h9', '2kg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
