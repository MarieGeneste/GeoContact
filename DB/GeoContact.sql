-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 06 Septembre 2019 à 10:37
-- Version du serveur :  5.7.27-0ubuntu0.18.04.1
-- Version de PHP :  7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `geoContact`
--

-- --------------------------------------------------------

--
-- Structure de la table `Contacts`
--

DROP TABLE IF EXISTS `Contacts`;
CREATE TABLE `Contacts` (
  `id` int(11) UNSIGNED NOT NULL,
  `idUserMaj` int(11) UNSIGNED NOT NULL,
  `dateMaj` datetime NOT NULL,
  `dateMajPrevious` datetime DEFAULT NULL,
  `idUser` int(11) UNSIGNED NOT NULL,
  `organismeNom` varchar(50) NOT NULL,
  `contactNom` varchar(50) NOT NULL,
  `contactPrenom` varchar(50) NOT NULL,
  `adrNum` smallint(5) UNSIGNED DEFAULT NULL,
  `adrBis` varchar(10) DEFAULT NULL,
  `adrIdTypesVoie` int(10) UNSIGNED NOT NULL,
  `adrVoie` varchar(100) DEFAULT NULL,
  `adrIdLocalites` int(10) UNSIGNED NOT NULL,
  `adrComplement` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` char(14) DEFAULT NULL,
  `siteWeb` varchar(50) DEFAULT NULL,
  `note` varchar(250) DEFAULT NULL,
  `idContactsCategories` int(10) UNSIGNED DEFAULT NULL,
  `idContactsFonctions` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `ContactsCategories`
--

DROP TABLE IF EXISTS `ContactsCategories`;
CREATE TABLE `ContactsCategories` (
  `id` int(11) UNSIGNED NOT NULL,
  `idUserMaj` int(10) UNSIGNED NOT NULL,
  `dateMaj` datetime NOT NULL,
  `dateMajPrevious` datetime DEFAULT NULL,
  `libelle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `ContactsFonctions`
--

DROP TABLE IF EXISTS `ContactsFonctions`;
CREATE TABLE `ContactsFonctions` (
  `id` int(11) UNSIGNED NOT NULL,
  `idUserMaj` int(11) UNSIGNED NOT NULL,
  `dateMaj` datetime NOT NULL,
  `dateMajPrevious` datetime DEFAULT NULL,
  `libelle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `Contenu`
--

DROP TABLE IF EXISTS `Contenu`;
CREATE TABLE `Contenu` (
  `id` int(11) UNSIGNED NOT NULL,
  `idUserMaj` int(10) UNSIGNED NOT NULL,
  `dateMaj` datetime NOT NULL,
  `dateMajPrevious` datetime DEFAULT NULL,
  `idContenuCategories` int(10) UNSIGNED NOT NULL,
  `content` varchar(500) NOT NULL,
  `ciblePage` varchar(50) NOT NULL,
  `cibleDiv` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `ContenuCategories`
--

DROP TABLE IF EXISTS `ContenuCategories`;
CREATE TABLE `ContenuCategories` (
  `id` int(11) UNSIGNED NOT NULL,
  `idUserMaj` int(10) UNSIGNED NOT NULL,
  `dateMaj` datetime NOT NULL,
  `dateMajPrevious` datetime DEFAULT NULL,
  `libelle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `Departements`
--

DROP TABLE IF EXISTS `Departements`;
CREATE TABLE `Departements` (
  `id` int(11) UNSIGNED NOT NULL,
  `idUserMaj` int(10) UNSIGNED NOT NULL,
  `dateMaj` datetime NOT NULL,
  `dateMajPrevious` datetime DEFAULT NULL,
  `code` char(3) NOT NULL,
  `libelle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `Localites`
--

DROP TABLE IF EXISTS `Localites`;
CREATE TABLE `Localites` (
  `id` int(10) UNSIGNED NOT NULL,
  `idUserMaj` int(10) UNSIGNED NOT NULL,
  `dateMaj` datetime NOT NULL,
  `dateMajPrevious` datetime DEFAULT NULL,
  `codeInsee` char(5) DEFAULT NULL,
  `codePostal` char(5) NOT NULL,
  `libelle` varchar(100) NOT NULL,
  `idDepartements` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `Roles`
--

DROP TABLE IF EXISTS `Roles`;
CREATE TABLE `Roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `idUserMaj` int(10) UNSIGNED NOT NULL,
  `dateMaj` datetime NOT NULL,
  `dateMajPrevious` datetime DEFAULT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `TypesVoie`
--

DROP TABLE IF EXISTS `TypesVoie`;
CREATE TABLE `TypesVoie` (
  `id` int(11) UNSIGNED NOT NULL,
  `idUserMaj` int(10) UNSIGNED NOT NULL,
  `dateMaj` datetime NOT NULL,
  `dateMajPrevious` datetime DEFAULT NULL,
  `libelle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users` (
  `id` int(10) UNSIGNED NOT NULL,
  `idUserMaj` int(10) UNSIGNED NOT NULL,
  `dateMaj` datetime NOT NULL,
  `dateMajPrevious` datetime DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `idRoles` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Contacts`
--
ALTER TABLE `Contacts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ContactsCategories`
--
ALTER TABLE `ContactsCategories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ContactsFonctions`
--
ALTER TABLE `ContactsFonctions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Contenu`
--
ALTER TABLE `Contenu`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ContenuCategories`
--
ALTER TABLE `ContenuCategories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Departements`
--
ALTER TABLE `Departements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Localites`
--
ALTER TABLE `Localites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `TypesVoie`
--
ALTER TABLE `TypesVoie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Contacts`
--
ALTER TABLE `Contacts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ContactsCategories`
--
ALTER TABLE `ContactsCategories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ContactsFonctions`
--
ALTER TABLE `ContactsFonctions`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Contenu`
--
ALTER TABLE `Contenu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `ContenuCategories`
--
ALTER TABLE `ContenuCategories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Departements`
--
ALTER TABLE `Departements`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Localites`
--
ALTER TABLE `Localites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Roles`
--
ALTER TABLE `Roles`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `TypesVoie`
--
ALTER TABLE `TypesVoie`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Contacts`
--
ALTER TABLE `Contacts`
  ADD CONSTRAINT `Contacts_ibfk_1` FOREIGN KEY (`idUserMaj`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Contacts_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Contacts_ibfk_3` FOREIGN KEY (`adrIdTypesVoie`) REFERENCES `TypesVoie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Contacts_ibfk_4` FOREIGN KEY (`adrIdLocalites`) REFERENCES `Localites` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Contacts_ibfk_5` FOREIGN KEY (`idContactsCategories`) REFERENCES `ContactsCategories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Contacts_ibfk_6` FOREIGN KEY (`idContactsFonctions`) REFERENCES `ContactsFonctions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ContactsCategories`
--
ALTER TABLE `ContactsCategories`
  ADD CONSTRAINT `ContactsCategories_ibfk_1` FOREIGN KEY (`idUserMaj`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ContactsFonctions`
--
ALTER TABLE `ContactsFonctions`
  ADD CONSTRAINT `ContactsFonctions_ibfk_1` FOREIGN KEY (`idUserMaj`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Contenu`
--
ALTER TABLE `Contenu`
  ADD CONSTRAINT `Contenu_ibfk_1` FOREIGN KEY (`idUserMaj`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Contenu_ibfk_2` FOREIGN KEY (`idContenuCategories`) REFERENCES `ContenuCategories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ContenuCategories`
--
ALTER TABLE `ContenuCategories`
  ADD CONSTRAINT `ContenuCategories_ibfk_1` FOREIGN KEY (`idUserMaj`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Departements`
--
ALTER TABLE `Departements`
  ADD CONSTRAINT `Departements_ibfk_1` FOREIGN KEY (`idUserMaj`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Localites`
--
ALTER TABLE `Localites`
  ADD CONSTRAINT `Localites_ibfk_1` FOREIGN KEY (`idUserMaj`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Localites_ibfk_2` FOREIGN KEY (`idDepartements`) REFERENCES `Departements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Roles`
--
ALTER TABLE `Roles`
  ADD CONSTRAINT `Roles_ibfk_1` FOREIGN KEY (`idUserMaj`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `TypesVoie`
--
ALTER TABLE `TypesVoie`
  ADD CONSTRAINT `TypesVoie_ibfk_1` FOREIGN KEY (`idUserMaj`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `Users_ibfk_1` FOREIGN KEY (`idUserMaj`) REFERENCES `Users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Users_ibfk_2` FOREIGN KEY (`idRoles`) REFERENCES `Roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;