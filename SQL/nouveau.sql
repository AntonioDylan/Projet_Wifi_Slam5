-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 04 Avril 2017 à 18:05
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `wifi`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse_mac`
--

CREATE TABLE `adresse_mac` (
  `id` int(11) NOT NULL,
  `idMel` varchar(255) NOT NULL,
  `libelle` char(32) NOT NULL,
  `addr` char(12) NOT NULL,
  `etat` int(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `adresse_mac`
--

INSERT INTO `adresse_mac` (`id`, `idMel`, `libelle`, `addr`, `etat`, `date`) VALUES
(5, 'cascales.arthur@gmail.com', 'PC-acer', '112233445566', 0, '2017-04-04 15:41:58'),
(6, 'cascales.arthur@gmail.com', 'Honor 5x', '665544332211', 0, '2017-04-04 15:42:03');

-- --------------------------------------------------------

--
-- Structure de la table `port_etudiant`
--

CREATE TABLE `port_etudiant` (
  `num` int(11) NOT NULL,
  `numGroupe` int(11) DEFAULT NULL,
  `nom` char(32) NOT NULL,
  `prenom` char(32) NOT NULL,
  `mel` char(64) NOT NULL,
  `mdp` char(32) NOT NULL,
  `numexam` char(16) DEFAULT NULL,
  `valide` char(1) NOT NULL DEFAULT 'O',
  `admin` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `port_etudiant`
--

INSERT INTO `port_etudiant` (`num`, `numGroupe`, `nom`, `prenom`, `mel`, `mdp`, `numexam`, `valide`, `admin`) VALUES
(1, NULL, 'cascales', 'arthur', 'cascales.arthur@gmail.com', 'aaa', NULL, 'O', 1);

-- --------------------------------------------------------

--
-- Structure de la table `port_professeur`
--

CREATE TABLE `port_professeur` (
  `num` int(11) NOT NULL,
  `nom` char(32) NOT NULL,
  `prenom` char(32) NOT NULL,
  `mel` char(64) NOT NULL,
  `mdp` char(32) NOT NULL,
  `niveau` int(11) NOT NULL,
  `valide` char(1) DEFAULT 'O',
  `admin` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adresse_mac`
--
ALTER TABLE `adresse_mac`
  ADD PRIMARY KEY (`id`),
  ADD KEY `numEtudiant` (`idMel`);

--
-- Index pour la table `port_etudiant`
--
ALTER TABLE `port_etudiant`
  ADD PRIMARY KEY (`num`),
  ADD KEY `ietudgrou` (`numGroupe`);

--
-- Index pour la table `port_professeur`
--
ALTER TABLE `port_professeur`
  ADD PRIMARY KEY (`num`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `adresse_mac`
--
ALTER TABLE `adresse_mac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `port_etudiant`
--
ALTER TABLE `port_etudiant`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `port_professeur`
--
ALTER TABLE `port_professeur`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
