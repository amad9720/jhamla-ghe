-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 22 juin 2017 à 11:40
-- Version du serveur :  10.1.22-MariaDB
-- Version de PHP :  7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mydbc`
--

-- --------------------------------------------------------

--
-- Structure de la table `capteur`
--

CREATE TABLE `capteur` (
  `id` int(11) NOT NULL,
  `etat` tinyint(4) DEFAULT NULL,
  `id_piece` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `favoris` tinyint(1) NOT NULL DEFAULT '0',
  `id_client` int(11) DEFAULT NULL,
  `adress` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `capteur`
--

INSERT INTO `capteur` (`id`, `etat`, `id_piece`, `id_type`, `favoris`, `id_client`, `adress`) VALUES
(5, 1, 7, 4, 0, 2, '008E02'),
(8, 1, 6, 6, 1, 2, ''),
(9, 1, 6, 2, 1, 2, '008E01'),
(11, 1, 5, 3, 0, 10, ''),
(13, 1, 2, 6, 0, 2, ''),
(14, 1, 7, 5, 0, 10, ''),
(15, 1, 11, 2, 1, 10, '008E01'),
(16, 1, 11, 2, 0, 2, '008E01'),
(19, 1, 9, 4, 1, 10, '008E02'),
(20, 0, 9, 6, 0, 2, ''),
(23, 1, 2, 7, 1, 2, ''),
(24, 0, 5, 3, 0, 10, ''),
(25, 0, 5, 4, 1, 10, '008E02'),
(26, 0, 9, 8, 0, 2, ''),
(27, 0, 11, 7, 1, 10, ''),
(29, 1, 2, 8, 1, 2, ''),
(30, 1, 2, 4, 1, 2, '008E02');

-- --------------------------------------------------------

--
-- Structure de la table `donnee`
--

CREATE TABLE `donnee` (
  `id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `valeur` float DEFAULT NULL,
  `id_capteur` int(11) NOT NULL,
  `adress` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `donnee`
--

INSERT INTO `donnee` (`id`, `date`, `valeur`, `id_capteur`, `adress`) VALUES
(67, '2017-01-16 15:40:56', 0, 9, '008E01'),
(68, '2017-01-16 15:50:49', 0, 9, '008E01'),
(69, '2017-01-16 15:53:52', 3, 9, '008E01'),
(70, '2017-01-16 15:56:37', 3, 9, '008E01'),
(71, '2017-01-16 16:03:46', 3, 9, '008E01'),
(72, '2017-01-16 16:04:21', 3, 9, '008E01'),
(73, '2017-01-16 16:06:00', 3, 5, '008E02'),
(74, '2017-01-16 16:06:36', 3, 5, '008E02'),
(75, '2017-01-16 16:08:51', 3, 5, '008E02'),
(76, '2017-01-20 14:32:20', 0, 9, '008E01');

-- --------------------------------------------------------

--
-- Structure de la table `donnee_energetique`
--

CREATE TABLE `donnee_energetique` (
  `id` int(11) NOT NULL,
  `valeur` float DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `pdf` varchar(45) DEFAULT NULL,
  `id_client` int(11) NOT NULL,
  `id_offre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `facture`
--

INSERT INTO `facture` (`id`, `date`, `pdf`, `id_client`, `id_offre`) VALUES
(1, '2017-05-01 00:00:00', NULL, 2, 3),
(2, '2017-06-19 11:32:56', '06it.pdf', 2, 3),
(3, '2017-06-19 11:34:29', '5.1.2.8 Lab - Viewing Network Device MAC Addr', 10, 3),
(4, '2017-06-19 11:43:57', 'ABR.pdf', 10, 3);

-- --------------------------------------------------------

--
-- Structure de la table `mission`
--

CREATE TABLE `mission` (
  `id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `etat` tinyint(4) DEFAULT NULL,
  `motif` varchar(45) DEFAULT NULL,
  `id_technicien` int(11) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `mission`
--

INSERT INTO `mission` (`id`, `date`, `etat`, `motif`, `id_technicien`, `id_client`) VALUES
(1, '2017-05-04 10:00:00', 1, 'Panne capteur température', 1, 2),
(2, '2017-05-12 16:00:00', 0, 'Panne passerelle EggHome', 1, 2),
(8, '2017-05-09 00:00:00', 0, 'Panne camera 2', 1, 1),
(9, '2017-05-18 00:00:00', 0, 'Panne capteur luminosite', 1, 1),
(12, '2017-06-13 00:00:00', 1, 'Panne eau', 12, 2),
(13, '2017-06-14 00:00:00', 0, 'Probleme Capteur', 12, 1),
(14, '2017-06-21 00:00:00', 1, 'Panne eau', 13, 1),
(15, '2017-06-14 00:00:00', 1, 'Panne camera 2', 13, 2),
(16, '2017-06-21 00:00:00', 1, 'panne', 1, 10);

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `contenu` varchar(200) DEFAULT NULL,
  `titre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `notification`
--

INSERT INTO `notification` (`id`, `id_client`, `contenu`, `titre`) VALUES
(1, 10, 'Notre technicien a réparé votre capteur', 'Capteur fini');

-- --------------------------------------------------------

--
-- Structure de la table `nouveaute`
--

CREATE TABLE `nouveaute` (
  `id` int(11) NOT NULL,
  `image` tinytext,
  `titre` varchar(45) DEFAULT NULL,
  `description` text,
  `date` datetime DEFAULT NULL,
  `slider_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `offre`
--

CREATE TABLE `offre` (
  `id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `detail` varchar(1000) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL,
  `titre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `offre`
--

INSERT INTO `offre` (`id`, `date`, `detail`, `prix`, `titre`) VALUES
(1, '2017-05-01 08:00:00', 'Ce pack comprend : une passerelle EggHome, un détecteur d\'ouverture de porte et fenêtre, un détecteur de mouvement, une caméra de surveillance sans fil.', 10, 'Pack EggHo standard'),
(2, '2017-05-15 08:00:00', 'Ce pack comprend en plus du contenu du pack EggHome standard : une capteur d\'humidité et e température, un détecteur de fumée / gaz.', 20, 'Pack EggHome +'),
(3, '2017-05-15 08:00:00', 'Ce pack comprend en plus du contenu du pack EggHome standard : deux capteurs d\'humidité et ed température, un détecteur de fumée / gaz, deux capteurs de luminosité.', 30, 'Pack EggHome ++'),
(4, '2017-05-15 08:00:00', 'service client', 30, 'SO');

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `nom` text NOT NULL,
  `titre` text,
  `contenu` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `page`
--

INSERT INTO `page` (`id`, `nom`, `titre`, `contenu`) VALUES
(5, 'Informations de contact', 'Informations sur Egghome\r\n', '01 57 43 90 87'),
(6, 'Informations de contact', 'Mail', 'contact.electronique@egghome.fr'),
(7, 'Informations de contact', 'Un capteur en panne ?', '01 57 43 90 87'),
(8, 'Informations de contact', 'Mail ', 'contact.telecom@egghome.fr'),
(9, 'automate_icone', '', '&lt;p&gt;avec egghome nous vous proposons d automatiser enti&amp;egrave;rement votre domicile&lt;/p&gt;');

-- --------------------------------------------------------

--
-- Structure de la table `panne`
--

CREATE TABLE `panne` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `contenu` varchar(100) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `panne`
--

INSERT INTO `panne` (`id`, `titre`, `contenu`, `id_client`) VALUES
(1, 'Panne 1', 'cocntenu panne 1', 2);

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

CREATE TABLE `piece` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `piece`
--

INSERT INTO `piece` (`id`, `nom`, `id_client`) VALUES
(2, 'Chambre Johana', 10),
(5, 'Salle de bain', 10),
(9, 'Chambre de Azenor', 2),
(11, 'Chambre de Amadou', 10);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'Client'),
(2, 'Service Client'),
(3, 'Administrateur'),
(4, 'Moderateur');

-- --------------------------------------------------------

--
-- Structure de la table `technicien`
--

CREATE TABLE `technicien` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `localisation` varchar(45) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `technicien`
--

INSERT INTO `technicien` (`id`, `nom`, `prenom`, `localisation`, `telephone`, `id_utilisateur`) VALUES
(1, 'Lombard', 'Théo', 'Nice', '678953545', 1),
(12, 'Sow', 'Ousmane', 'Guinee', '06 78 95 35 45', 0),
(13, 'Ly', 'Azenor', 'Paris', '06 78 95 35 45', 0);

-- --------------------------------------------------------

--
-- Structure de la table `type_capteurs`
--

CREATE TABLE `type_capteurs` (
  `id` int(11) NOT NULL,
  `type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `type_capteurs`
--

INSERT INTO `type_capteurs` (`id`, `type`) VALUES
(0, 'Capteur de temperature'),
(2, 'Détecteur de présence'),
(3, 'Détecteur de fumée'),
(4, 'Capteur de luminosité'),
(5, 'Ouverture portes et fenêtres'),
(6, 'Caméra de surveillance'),
(7, 'Capteur d\'humidité'),
(8, 'Détecteur de gaz');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `adresse` varchar(45) DEFAULT NULL,
  `nom_utilisateur` varchar(45) DEFAULT NULL,
  `mdp` varchar(200) DEFAULT NULL,
  `photo` varchar(45) DEFAULT NULL,
  `ville` varchar(45) DEFAULT NULL,
  `pays` varchar(45) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `id_offre` int(11) DEFAULT NULL,
  `statut` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `adresse`, `nom_utilisateur`, `mdp`, `photo`, `ville`, `pays`, `id_role`, `email`, `id_offre`, `statut`) VALUES
(1, 'Prevost', 'Clarisse', '7 rue du château', 'clarisse_prevost', '$2y$10$iusesomecrazystrings2utH/tgQ8kzR5Aw6O30Z3ONmzBdL5l8bi', NULL, 'Nice', 'France', 1, 'clarisse.prevost@gmail.com', NULL, NULL),
(2, 'Perez', 'Pauline', '24 chemin Spagnon', 'pauline_perez', '$2y$10$iusesomecrazystrings2utH/tgQ8kzR5Aw6O30Z3ONmzBdL5l8bi', NULL, 'Antibes', 'France', 1, 'pauline.perez@gmail.com', 3, 1),
(10, 'Ly', 'Oumar', '2 cour pere damien Boulogne', 'oumar454', '$2y$10$iusesomecrazystrings2utH/tgQ8kzR5Aw6O30Z3ONmzBdL5l8bi', 'white-tiger-white-tiger-cat-predator.jpg', 'Bussy-Saint-Georges', 'France', 1, 'oumarly@gmail.com', 3, 1),
(11, 'Le Quinio', 'Az&eacute;nor', '2 rues des ameriques', 'azenor', '$2y$10$iusesomecrazystrings2utH/tgQ8kzR5Aw6O30Z3ONmzBdL5l8bi', 'Mindset.pdf', 'Paris', 'France', 2, 'azenor@gmail.com', 3, 0),
(12, 'test', 'test', '8 rue de Egghome', 'test', '$2y$10$iusesomecrazystrings2u1PeW8BVBLZi/2iYIaaJx6ZBLUyaICqK', 'galile.jpg', 'Paris', 'France', 1, 'test@gmail.com', 2, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `capteur`
--
ALTER TABLE `capteur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Capteur_Pièce1_idx` (`id_piece`),
  ADD KEY `fk_Capteur_Type_capteurs1_idx` (`id_type`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `donnee`
--
ALTER TABLE `donnee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Donnée_Capteur1_idx` (`id_capteur`);

--
-- Index pour la table `donnee_energetique`
--
ALTER TABLE `donnee_energetique`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Données énergétiques_Client1_idx` (`id_client`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Facture_Client1_idx` (`id_client`),
  ADD KEY `fk_facture_offre1_idx` (`id_offre`);

--
-- Index pour la table `mission`
--
ALTER TABLE `mission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Mission_Technicien1_idx` (`id_technicien`),
  ADD KEY `fk_Mission_Client1_idx` (`id_client`);

--
-- Index pour la table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Noctification_Utilisateur1_idx` (`id_client`);

--
-- Index pour la table `nouveaute`
--
ALTER TABLE `nouveaute`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `offre`
--
ALTER TABLE `offre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `panne`
--
ALTER TABLE `panne`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Pièce_Client1_idx` (`id_client`);

--
-- Index pour la table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `technicien`
--
ALTER TABLE `technicien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Technicien_Utilisateur1_idx` (`id_utilisateur`);

--
-- Index pour la table `type_capteurs`
--
ALTER TABLE `type_capteurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Utilisateur_role1_idx` (`id_role`),
  ADD KEY `fk_utilisateur_offre1_idx` (`id_offre`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `capteur`
--
ALTER TABLE `capteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT pour la table `donnee`
--
ALTER TABLE `donnee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT pour la table `donnee_energetique`
--
ALTER TABLE `donnee_energetique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `mission`
--
ALTER TABLE `mission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `nouveaute`
--
ALTER TABLE `nouveaute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `offre`
--
ALTER TABLE `offre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `panne`
--
ALTER TABLE `panne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `piece`
--
ALTER TABLE `piece`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `technicien`
--
ALTER TABLE `technicien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `capteur`
--
ALTER TABLE `capteur`
  ADD CONSTRAINT `capteur_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `piece` (`id_client`),
  ADD CONSTRAINT `fk_Capteur_Type_capteurs1` FOREIGN KEY (`id_type`) REFERENCES `type_capteurs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `donnee_energetique`
--
ALTER TABLE `donnee_energetique`
  ADD CONSTRAINT `fk_Données énergétiques_Client1` FOREIGN KEY (`id_client`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `fk_Facture_Client1` FOREIGN KEY (`id_client`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_facture_offre1` FOREIGN KEY (`id_offre`) REFERENCES `offre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `fk_Noctification_Utilisateur1` FOREIGN KEY (`id_client`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `panne`
--
ALTER TABLE `panne`
  ADD CONSTRAINT `panne_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `piece`
--
ALTER TABLE `piece`
  ADD CONSTRAINT `fk_Pièce_Client1` FOREIGN KEY (`id_client`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_Utilisateur_role1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_utilisateur_offre1` FOREIGN KEY (`id_offre`) REFERENCES `offre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
