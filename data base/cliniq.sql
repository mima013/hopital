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
-- Base de données :  `cliniq`
--

-- --------------------------------------------------------

--
-- Structure de la table `consulte`
--

CREATE TABLE IF NOT EXISTS `consulte` (
  `id_malade` int(11) NOT NULL AUTO_INCREMENT,
  `id_medecins` int(11) NOT NULL,
  `obsevation_consult` text,
  `frais_consultation` int(11) DEFAULT NULL,
  `date_consultation` date DEFAULT NULL,
  PRIMARY KEY (`id_malade`,`id_medecins`),
  KEY `FK_consulte_id_medecins` (`id_medecins`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `consulte`
--

INSERT INTO `consulte` (`id_malade`, `id_medecins`, `obsevation_consult`, `frais_consultation`, `date_consultation`) VALUES
(5, 3, '              toux forte,rhume,maux de tete', 20, '2020-06-24'),
(7, 3, '             jugçloadjip     ', 0, '2020-08-14');

-- --------------------------------------------------------

--
-- Structure de la table `description`
--

CREATE TABLE IF NOT EXISTS `description` (
  `id_description` int(11) NOT NULL AUTO_INCREMENT,
  `id_hopital` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `metier` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_description`,`id_hopital`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `hopital`
--

CREATE TABLE IF NOT EXISTS `hopital` (
  `id_hopital` int(11) NOT NULL AUTO_INCREMENT,
  `adresse` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id_hopital`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `hopital`
--

INSERT INTO `hopital` (`id_hopital`, `adresse`, `mail`, `password`) VALUES
(6, 'Lubumbashi', 'yannickmagayaneyannick@gmail.com', 'yannickm'),
(7, 'Ruashi', 'yannickmagayaneyannick@gmail.com', 'Rose'),
(8, 'Karibu', 'yannick@gmail.com', 'moivre'),
(9, 'shamba', 'yannickmagayaneyannick@gmail.com', 'mariem'),
(10, 'Lor', 'yannickmagayaneyannick@gmail.com', 'kaka'),
(11, 'road', 'yannickmagayaneyannick@gmail.com', 'fafa'),
(12, 'lubumbashi', 'yannickmagayaneyannick@gmail.com', '2de514aec9f0782eeca71775aa0570e6');

-- --------------------------------------------------------

--
-- Structure de la table `laboratoire`
--

CREATE TABLE IF NOT EXISTS `laboratoire` (
  `id_labo` int(11) NOT NULL AUTO_INCREMENT,
  `type_examen` varchar(50) DEFAULT NULL,
  `observation_labo` text,
  `date_examen` date DEFAULT NULL,
  `frais_examen` int(11) DEFAULT NULL,
  `malade_id_malade` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_labo`),
  KEY `FK_LABORATOIRE_malade_id_malade` (`malade_id_malade`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `laboratoire`
--

INSERT INTO `laboratoire` (`id_labo`, `type_examen`, `observation_labo`, `date_examen`, `frais_examen`, `malade_id_malade`) VALUES
(3, 'corona', '                negatif  ', '2020-06-24', 28, 5),
(4, 'j bpj', '                bbobb   ', '2020-09-02', 0, 7);

-- --------------------------------------------------------

--
-- Structure de la table `malade`
--

CREATE TABLE IF NOT EXISTS `malade` (
  `id_malade` int(11) NOT NULL AUTO_INCREMENT,
  `nom_malade` varchar(50) DEFAULT NULL,
  `prenom_malade` varchar(50) DEFAULT NULL,
  `sexe_malade` varchar(2) DEFAULT NULL,
  `adr_malade` varchar(50) DEFAULT NULL,
  `temperature` varchar(15) DEFAULT NULL,
  `poids` float DEFAULT NULL,
  PRIMARY KEY (`id_malade`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `malade`
--

INSERT INTO `malade` (`id_malade`, `nom_malade`, `prenom_malade`, `sexe_malade`, `adr_malade`, `temperature`, `poids`) VALUES
(5, 'yannick', 'Magayane', 'M', 'goma', '67', NULL),
(6, 'yannick', 'Magayane', 'M', 'lubumbashi', '67', NULL),
(7, 'Roland', 'olive', 'M', 'ugàègpfze', '67', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `medecins`
--

CREATE TABLE IF NOT EXISTS `medecins` (
  `id_medecins` int(11) NOT NULL AUTO_INCREMENT,
  `nom_medecins` varchar(50) DEFAULT NULL,
  `prenom_medecins` varchar(50) DEFAULT NULL,
  `sexe_medecins` varchar(2) DEFAULT NULL,
  `adr_medecins` varchar(50) DEFAULT NULL,
  `tel_medecins` varchar(12) DEFAULT NULL,
  `fonction_medecins` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_medecins`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `medecins`
--

INSERT INTO `medecins` (`id_medecins`, `nom_medecins`, `prenom_medecins`, `sexe_medecins`, `adr_medecins`, `tel_medecins`, `fonction_medecins`) VALUES
(3, 'shangulume', 'laurent', 'M', 'luBUMBASHI', '098888888', 'chirurgien');

-- --------------------------------------------------------

--
-- Structure de la table `traitement`
--

CREATE TABLE IF NOT EXISTS `traitement` (
  `id_trai` int(11) NOT NULL AUTO_INCREMENT,
  `nom_maladie` text,
  `date_debut_trait` date DEFAULT NULL,
  `date_fin_trait` date DEFAULT NULL,
  `frais_trait` int(11) DEFAULT NULL,
  `etat_patient` varchar(50) DEFAULT NULL,
  `malade_id_malade` int(11) DEFAULT NULL,
  `medicament_prescrit` text NOT NULL,
  PRIMARY KEY (`id_trai`),
  KEY `FK_TRAITEMENT_malade_id_malade` (`malade_id_malade`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `traitement`
--

INSERT INTO `traitement` (`id_trai`, `nom_maladie`, `date_debut_trait`, `date_fin_trait`, `frais_trait`, `etat_patient`, `malade_id_malade`, `medicament_prescrit`) VALUES
(3, '                 corona ', '2020-06-24', '2020-07-01', 16, 'bon', 5, '              docteur cold    '),
(4, 'uoqug', '2020-08-16', '2020-08-15', 0, 'kaph', 7, '              bpuz    '),
(5, '                  npnpm', '2020-09-02', '2020-09-06', 0, 'p,n^,^*,ù', 7, '                 ^k,^n)n ');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `consulte`
--
ALTER TABLE `consulte`
  ADD CONSTRAINT `FK_consulte_id_malade` FOREIGN KEY (`id_malade`) REFERENCES `malade` (`id_malade`),
  ADD CONSTRAINT `FK_consulte_id_medecins` FOREIGN KEY (`id_medecins`) REFERENCES `medecins` (`id_medecins`);

--
-- Contraintes pour la table `laboratoire`
--
ALTER TABLE `laboratoire`
  ADD CONSTRAINT `FK_LABORATOIRE_malade_id_malade` FOREIGN KEY (`malade_id_malade`) REFERENCES `malade` (`id_malade`);

--
-- Contraintes pour la table `traitement`
--
ALTER TABLE `traitement`
  ADD CONSTRAINT `FK_TRAITEMENT_malade_id_malade` FOREIGN KEY (`malade_id_malade`) REFERENCES `malade` (`id_malade`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
