-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 16 Mai 2017 à 08:31
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mydb`
--

-- --------------------------------------------------------

--
-- Structure de la table `donnee`
--

CREATE TABLE `donnee` (
  `id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `valeur` float DEFAULT NULL,
  `id_capteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `donnee`
--

INSERT INTO `donnee` (`id`, `date`, `valeur`, `id_capteur`) VALUES
(1, '2017-05-15 10:00:00', 15, 1),
(2, '2017-05-15 10:00:00', 20, 2),
(3, '2017-05-15 10:00:00', 1, 3),
(4, '2017-05-15 10:00:00', 0, 4),
(5, '2017-05-15 10:00:00', 80, 5),
(6, '2017-05-15 10:00:00', 70, 6),
(7, '2017-05-15 10:00:00', 1, 7),
(8, '2017-05-15 10:00:00', 0, 9),
(9, '2017-05-15 10:00:00', 0, 10),
(10, '2017-05-15 10:00:00', 58, 12),
(11, '2017-05-15 10:00:00', 77, 13),
(12, '2017-05-15 10:00:00', 48, 14),
(17, '2017-05-15 10:00:00', 77, 8),
(18, '2017-05-15 10:00:00', 48, 11);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `donnee`
--
ALTER TABLE `donnee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Donnée_Capteur1_idx` (`id_capteur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `donnee`
--
ALTER TABLE `donnee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `donnee`
--
ALTER TABLE `donnee`
  ADD CONSTRAINT `fk_Donnée_Capteur1` FOREIGN KEY (`id_capteur`) REFERENCES `capteur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
