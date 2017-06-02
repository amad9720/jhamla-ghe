-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889

-- Généré le :  Mer 31 Mai 2017 à 09:46

-- Généré le :  Ven 02 Juin 2017 à 09:11

-- Version du serveur :  5.6.35
-- Version de PHP :  7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `mydbC`
--

-- --------------------------------------------------------

--
-- Structure de la table `capteur`
--

CREATE TABLE `capteur` (
  `id` int(11) NOT NULL,
  `etat` tinyint(4) DEFAULT NULL,
  `id_piece` int(11) NOT NULL,
  `id_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `capteur`
--

INSERT INTO `capteur` (`id`, `etat`, `id_piece`, `id_type`) VALUES
(1, 1, 5, 1),
(5, 1, 3, 4),
(8, 1, 5, 6),
(9, 1, 6, 2),
(10, 1, 3, 1),
(11, 1, 5, 3),
(13, 0, 2, 6),
(14, 1, 0, 5),
(15, 0, 2, 2);

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
(5, '2017-05-15 10:00:00', 80, 5),
(8, '2017-05-15 10:00:00', 9, 9),
(13, '2017-05-15 10:00:00', 77, 8),
(14, '2017-05-18 15:15:58', 10, 10),
(15, '2017-05-18 15:17:29', 12, 11),
(17, '2017-05-18 23:27:02', 5, 13),
(18, '2017-05-18 23:28:11', 0, 14),
(19, '2017-05-18 23:28:30', 9, 15);

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
-- Contenu de la table `facture`
--

INSERT INTO `facture` (`id`, `date`, `pdf`, `id_client`, `id_offre`) VALUES
(1, '2017-05-01 00:00:00', NULL, 2, 3);

-- --------------------------------------------------------

--
-- Structure de la table `mission`
--

CREATE TABLE `mission` (
  `id` int(11) NOT NULL,
  `date_debut` datetime DEFAULT NULL,
  `date_fin` datetime DEFAULT NULL,
  `etat` tinyint(4) DEFAULT NULL,
  `motif` varchar(45) DEFAULT NULL,
  `id_technicien` int(11) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `mission`
--

INSERT INTO `mission` (`id`, `date_debut`, `date_fin`, `etat`, `motif`, `id_technicien`, `id_client`) VALUES
(1, '2017-05-04 10:00:00', '2017-05-05 16:00:00', 0, 'Panne capteur température', 1, 2);

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
-- Contenu de la table `notification`
--

INSERT INTO `notification` (`id`, `id_client`, `contenu`, `titre`) VALUES
(1, 2, 'Notre technicien a réparé votre capteur', 'Réparation capteur');

-- --------------------------------------------------------

--
-- Structure de la table `nouveaute`
--

CREATE TABLE `nouveaute` (
  `id` int(11) NOT NULL,
  `image` varchar(45) DEFAULT NULL,
  `titre` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT NULL
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
-- Contenu de la table `offre`
--

INSERT INTO `offre` (`id`, `date`, `detail`, `prix`, `titre`) VALUES
(1, '2017-05-01 08:00:00', 'Ce pack comprend : une passerelle EggHome, un détecteur d\'ouverture de porte et fenêtre, un détecteur de mouvement, une caméra de surveillance sans fil.', 10, 'Pack EggHo standard'),
(2, '2017-05-15 08:00:00', 'Ce pack comprend en plus du contenu du pack EggHome standard : une capteur d\'humidité et e température, un détecteur de fumée / gaz.', 20, 'Pack EggHome +'),
(3, '2017-05-15 08:00:00', 'Ce pack comprend en plus du contenu du pack EggHome standard : deux capteurs d\'humidité et ed température, un détecteur de fumée / gaz, deux capteurs de luminosité.', 30, 'Pack EggHome ++');

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `titre` varchar(45) DEFAULT NULL,
  `contenu` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `panne`
--

CREATE TABLE `panne` (
  `id` int(11) NOT NULL,
  `titre` varchar(50) NOT NULL,
  `contenu` varchar(1000) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `panne`
--

INSERT INTO `panne` (`id`, `titre`, `contenu`, `id_client`) VALUES
(1, 'Panne capteur de température', 'Mon capteur de température est en panne, il ne s\'allume plus', 2),
(2, 'Panne CeMAC', 'Mon CeMAC surchauffe', 4);

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
-- Contenu de la table `piece`
--

INSERT INTO `piece` (`id`, `nom`, `id_client`) VALUES
(2, 'Chambre Johana', 2),
(3, 'Chambre Marc', 2),
(5, 'Salle de bain', 2);

-- --------------------------------------------------------

--
-- Structure de la table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'Client'),
(2, 'Service Client'),
(3, 'Administrateur');

-- --------------------------------------------------------

--
-- Structure de la table `technicien`
--

CREATE TABLE `technicien` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `localisation` varchar(45) DEFAULT NULL,
  `telephone` int(11) DEFAULT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `technicien`
--

INSERT INTO `technicien` (`id`, `nom`, `prenom`, `localisation`, `telephone`, `id_utilisateur`) VALUES
(1, 'Lombard', 'Théo', 'Nice', 678953545, 1);

-- --------------------------------------------------------

--
-- Structure de la table `type_capteurs`
--

CREATE TABLE `type_capteurs` (
  `id` int(11) NOT NULL,
  `type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `type_capteurs`
--

INSERT INTO `type_capteurs` (`id`, `type`) VALUES
(1, 'Capteur de température'),
(2, 'Détecteur de présence'),
(3, 'Détecteur de fumée'),
(4, 'Capteur de luminosité'),
(5, 'Détecteur ouverture portes et fenêtres'),
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
  `statut` tinyint(1) DEFAULT NULL,
  `adresse` varchar(45) DEFAULT NULL,
  `nom_utilisateur` varchar(45) DEFAULT NULL,
  `mdp` varchar(45) DEFAULT NULL,
  `photo` varchar(45) DEFAULT NULL,
  `ville` varchar(45) DEFAULT NULL,
  `pays` varchar(45) DEFAULT NULL,
  `id_role` int(11) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `id_offre` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `statut`, `adresse`, `nom_utilisateur`, `mdp`, `photo`, `ville`, `pays`, `id_role`, `email`, `id_offre`) VALUES
(1, 'Prevost', 'Clarisse', NULL, '7 rue du château', 'clarisse_prevost', 'nany', NULL, 'Nice', 'France', 2, 'clarisse.prevost@gmail.com', NULL),
(2, 'Perez', 'Pauline', 1, '24 chemin Spagnon', 'pauline_perez', 'popol', '', 'Antibes', 'France', 1, 'pauline.perez@gmail.com', 3),
(4, 'Huyng', 'Benjamin', 1, '14 rue louis lumière', 'Benjamin_Huynh', 'phucuong', '', 'Toulouse', 'France', 1, 'phuphu@gmail.com', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `capteur`
--
ALTER TABLE `capteur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Capteur_Pièce1_idx` (`id_piece`),
  ADD KEY `fk_Capteur_Type_capteurs1_idx` (`id_type`);

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
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `capteur`
--
ALTER TABLE `capteur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `donnee`
--
ALTER TABLE `donnee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT pour la table `donnee_energetique`
--
ALTER TABLE `donnee_energetique`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `mission`
--
ALTER TABLE `mission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `panne`
--
ALTER TABLE `panne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `piece`
--
ALTER TABLE `piece`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `technicien`
--
ALTER TABLE `technicien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `capteur`
--
ALTER TABLE `capteur`
  ADD CONSTRAINT `fk_Capteur_Type_capteurs1` FOREIGN KEY (`id_type`) REFERENCES `type_capteurs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `donnee`
--
ALTER TABLE `donnee`
  ADD CONSTRAINT `fk_Donnée_Capteur1` FOREIGN KEY (`id_capteur`) REFERENCES `capteur` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `donnee_energetique`
--
ALTER TABLE `donnee_energetique`
  ADD CONSTRAINT `fk_Données énergétiques_Client1` FOREIGN KEY (`id_client`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `fk_Facture_Client1` FOREIGN KEY (`id_client`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_facture_offre1` FOREIGN KEY (`id_offre`) REFERENCES `offre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `mission`
--
ALTER TABLE `mission`
  ADD CONSTRAINT `fk_Mission_Client1` FOREIGN KEY (`id_client`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Mission_Technicien1` FOREIGN KEY (`id_technicien`) REFERENCES `technicien` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `fk_Notification_Utilisateur1` FOREIGN KEY (`id_client`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Contraintes pour la table `technicien`
--
ALTER TABLE `technicien`
  ADD CONSTRAINT `fk_Technicien_Utilisateur1` FOREIGN KEY (`id_utilisateur`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
<<<<<<< HEAD
  ADD CONSTRAINT `fk_Utilisateur_role1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_utilisateur_offre1` FOREIGN KEY (`id_offre`) REFERENCES `offre` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
=======
ADD CONSTRAINT `fk_Utilisateur_role1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_utilisateur_offre1` FOREIGN KEY (`id_offre`) REFERENCES `offre` (`id`) ON DELETE CASCADE ON UPDATE NO ACTIO	N;

