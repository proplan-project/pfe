-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 13 mai 2019 à 01:11
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `proplanc_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `chef_a_equipe`
--

DROP TABLE IF EXISTS `chef_a_equipe`;
CREATE TABLE IF NOT EXISTS `chef_a_equipe` (
  `id_chef` int(11) NOT NULL,
  `id_equipe` int(11) NOT NULL,
  KEY `id_equipe` (`id_equipe`),
  KEY `id_chef` (`id_chef`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `chef_projet`
--

DROP TABLE IF EXISTS `chef_projet`;
CREATE TABLE IF NOT EXISTS `chef_projet` (
  `id_chef` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `type` varchar(150) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` text,
  `adresse` text NOT NULL,
  `tel` int(20) NOT NULL,
  `genre` enum('homme','femme') DEFAULT NULL,
  `verification_key` varchar(250) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_email_verified` enum('non','oui') NOT NULL,
  PRIMARY KEY (`id_chef`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `chef_projet`
--

INSERT INTO `chef_projet` (`id_chef`, `nom`, `prenom`, `type`, `email`, `password`, `image`, `adresse`, `tel`, `genre`, `verification_key`, `date_creation`, `is_email_verified`) VALUES
(2, 'fati', 'el Alami', NULL, 'elalamifatimazahra3@gmail.com', '123456', NULL, 'BLOC A1 N 17 RUE MEGHRAOUA AOUINATE HAJJAJ FES', 5446464, NULL, '', '2019-05-12 14:11:05', 'non'),
(3, 'Alami', 'Alami', NULL, 'alami.fati11091998@gmail.com', 'ca2394ba497afe60f3e1dbcd23beb9b3a7a18109982632e8d9', NULL, 'Alami', 0, NULL, 'a62cb843aa819ab4551501068650135c', '2019-05-12 14:31:05', 'non'),
(4, 'Alami', 'Alami', NULL, 'alami.fati11091998@gmail.com', 'feccc90c333b54513ad1d38f13730a4f2da7ef56edc9434e33', NULL, 'Alami', 0, NULL, 'df0160c11920adf78328f95d32767ef1', '2019-05-12 14:31:10', 'non'),
(5, 'Alami', 'Alami', NULL, 'alami.fati11091998@gmail.com', '355fa86dcb4a08850b8cb9ffe422e5e591d0463162bcc2187e', NULL, 'Alami', 0, NULL, '95fb6d7bc97b5446aaeb09525f119744', '2019-05-12 14:31:16', 'non'),
(6, 'Alami', 'Alami', NULL, 'alami.fati11091998@gmail.com', '37059a5d16f4a4cffbaee24e80bb4da2223e98765a5bb09358', NULL, 'Alami', 0, NULL, 'd3d3319d607c94773bfe454c0c37779d', '2019-05-12 14:31:21', 'non'),
(7, 'Alami', 'Alami', NULL, 'alami.fati11091998@gmail.com', '9d56425913f89947339a5d13ddd39e68af0b6b3dbbf6cbde46', NULL, 'Alami', 0, NULL, '6087c6ebf5da8be645009953e2826178', '2019-05-12 14:31:26', 'non'),
(8, 'mouad', 'mouad', NULL, 'mouad@gmail.com', '63062ecd3eb5fb152533514948de7932149bae5cf13848d44a', NULL, 'mouad', 0, NULL, '220ffa751e912e93bbb129d101c44f78', '2019-05-12 14:35:01', 'non'),
(9, 'malak', 'malak', NULL, 'malak@gmail.com', 'cc1ecf26060cd9aabc97339ed53d589311409d4b1bda96d75a', NULL, 'malak', 0, NULL, '9b04ab5b80526d247abd37531a5e42bd', '2019-05-12 23:51:29', 'non');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `nom_entreprise` varchar(150) DEFAULT NULL,
  `adresse` text,
  `ville` varchar(50) DEFAULT NULL,
  `code_postal` varchar(50) DEFAULT NULL,
  `pays` varchar(50) DEFAULT NULL,
  `telephone` varchar(20) NOT NULL,
  `site` varchar(150) DEFAULT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_client`),
  KEY `id_utilisateur` (`id_utilisateur`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `nom_entreprise`, `adresse`, `ville`, `code_postal`, `pays`, `telephone`, `site`, `id_utilisateur`) VALUES
(1, 'Benjelloun', 'Mohamed ', 'Benjelloun Groupe', 'adresse', 'Tanger', '90000', 'Maroc', '06378023333', 'www.BenjellounGroupe.com', 1),
(2, 'El kharroubi', 'Farouk', 'Smart Idea', 'adresse', 'Tétouan', '93000', 'Maroc', '0637802333', 'www.smartidea.com', 1);

-- --------------------------------------------------------

--
-- Structure de la table `codeigniter_register`
--

DROP TABLE IF EXISTS `codeigniter_register`;
CREATE TABLE IF NOT EXISTS `codeigniter_register` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` text NOT NULL,
  `verification_key` varchar(250) NOT NULL,
  `is_email_verified` enum('no','yes') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `codeigniter_register`
--

INSERT INTO `codeigniter_register` (`id`, `name`, `email`, `password`, `verification_key`, `is_email_verified`) VALUES
(48, 'Alami', 'elalamifatimazahra3@gmail.com', 'e8f8191770ad6f47a31fef813482530c3e4c26a7a8764cd2a6ab83151ad863236624b901b5190748b60b4ad05a27db7543f2bd195463e3e86ac893b72eee5795NHFLD+v0ScEK0zD/ojAPL7fkiYHG4laf3AbCuObldLU=', '05efbc3a4a8b0b71ed218aa138c9dd61', 'no');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_commentaire` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `date_creation` datetime NOT NULL,
  `id_projet` int(11) NOT NULL,
  `id_createur` int(11) NOT NULL,
  PRIMARY KEY (`id_commentaire`),
  KEY `id_projet` (`id_projet`),
  KEY `id_createur` (`id_createur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

DROP TABLE IF EXISTS `equipe`;
CREATE TABLE IF NOT EXISTS `equipe` (
  `id_equipe` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `titre_emploi` varchar(100) NOT NULL,
  `id_createur` int(11) NOT NULL,
  PRIMARY KEY (`id_equipe`),
  KEY `id_createur` (`id_createur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `equipe_a_projet`
--

DROP TABLE IF EXISTS `equipe_a_projet`;
CREATE TABLE IF NOT EXISTS `equipe_a_projet` (
  `id_projet` int(11) NOT NULL,
  `id_equipe` int(11) NOT NULL,
  KEY `id_projet` (`id_projet`),
  KEY `id_equipe` (`id_equipe`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `id_facture` int(11) NOT NULL AUTO_INCREMENT,
  `date_facture` datetime NOT NULL,
  `date_echeance` date NOT NULL,
  `montant` float NOT NULL,
  `paiement_recu` int(11) NOT NULL,
  `status` enum('brouillon','impayé','payé','') NOT NULL,
  `id_projet` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  PRIMARY KEY (`id_facture`),
  KEY `id_projet` (`id_projet`),
  KEY `id_client` (`id_client`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fichier`
--

DROP TABLE IF EXISTS `fichier`;
CREATE TABLE IF NOT EXISTS `fichier` (
  `id_fichier` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `size` double NOT NULL,
  `date_creation` datetime NOT NULL,
  `id_projet` int(11) NOT NULL,
  `telecharge_par` int(11) NOT NULL,
  PRIMARY KEY (`id_fichier`),
  KEY `id_projet` (`id_projet`),
  KEY `telecharge_par` (`telecharge_par`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `id_note` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `date_creation` datetime NOT NULL,
  `id_projet` int(11) NOT NULL,
  `id_createur` int(11) NOT NULL,
  PRIMARY KEY (`id_note`),
  KEY `id_projet` (`id_projet`),
  KEY `id_createur` (`id_createur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

DROP TABLE IF EXISTS `projet`;
CREATE TABLE IF NOT EXISTS `projet` (
  `id_projet` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `date_debut` date NOT NULL,
  `date_limite` date NOT NULL,
  `date_creation` datetime NOT NULL,
  `status` enum('ouvert','terminé','tenir','annulé') NOT NULL,
  `prix` float NOT NULL,
  `id_client` int(11) NOT NULL,
  PRIMARY KEY (`id_projet`),
  KEY `id_client` (`id_client`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

DROP TABLE IF EXISTS `tache`;
CREATE TABLE IF NOT EXISTS `tache` (
  `id_tache` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `date_debut` date NOT NULL,
  `date_limite` date NOT NULL,
  `status` enum('à faire','en cours','terminé','') NOT NULL,
  `id_projet` int(11) NOT NULL,
  `assigne_a` int(11) NOT NULL,
  PRIMARY KEY (`id_tache`),
  KEY `id_projet` (`id_projet`),
  KEY `assigne_a` (`assigne_a`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `type` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `adresse` text NOT NULL,
  `tel` int(20) NOT NULL,
  `genre` enum('homme','femme') NOT NULL,
  `date_creation` date NOT NULL,
  `id_createur` int(11) NOT NULL,
  PRIMARY KEY (`id_utilisateur`),
  KEY `id_createur` (`id_createur`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_a_equipe`
--

DROP TABLE IF EXISTS `utilisateur_a_equipe`;
CREATE TABLE IF NOT EXISTS `utilisateur_a_equipe` (
  `id_utilisateur` int(11) NOT NULL,
  `id_equipe` int(11) NOT NULL,
  KEY `id_utilisateur` (`id_utilisateur`),
  KEY `id_equipe` (`id_equipe`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
