-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 06 Septembre 2019 à 15:27
-- Version du serveur :  5.7.27-0ubuntu0.18.04.1
-- Version de PHP :  7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

CREATE TABLE `Contenu` (
  `id` int(11) UNSIGNED NOT NULL,
  `idUserMaj` int(10) UNSIGNED DEFAULT NULL,
  `dateMaj` datetime NOT NULL,
  `dateMajPrevious` datetime DEFAULT NULL,
  `idContenuCategories` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext NOT NULL,
  `ciblePage` varchar(50) NOT NULL,
  `cibleDiv` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `Contenu`
--

INSERT INTO `Contenu` (`id`, `idUserMaj`, `dateMaj`, `dateMajPrevious`, `idContenuCategories`, `title`, `content`, `ciblePage`, `cibleDiv`) VALUES
(1, NULL, '2019-09-06 00:00:00', NULL, 1, 'Titre de l\'article 1', 'Alios autem dicere aiunt multo etiam inhumanius (quem locum breviter paulo ante perstrinxi) praesidii adiumentique causa, non benevolentiae neque caritatis, amicitias esse expetendas; itaque, ut quisque minimum firmitatis haberet minimumque virium, ita amicitias appetere maxime; ex eo fieri ut mulierculae magis amicitiarum praesidia quaerant quam viri et inopes quam opulenti et calamitosi quam ii qui putentur beati.\r\n\r\nHarum trium sententiarum nulli prorsus assentior. Nec enim illa prima vera est, ut, quem ad modum in se quisque sit, sic in amicum sit animatus. Quam multa enim, quae nostra causa numquam faceremus, facimus causa amicorum! precari ab indigno, supplicare,', 'accueil', 'article'),
(2, NULL, '2019-09-06 00:00:00', NULL, 1, NULL, 'Postremo ad id indignitatis est ventum, ut cum peregrini ob formidatam haut ita dudum alimentorum inopiam pellerentur ab urbe praecipites, sectatoribus disciplinarum liberalium inpendio paucis sine respiratione ulla extrusis, tenerentur minimarum adseclae veri, quique id simularunt ad tempus, et tria milia saltatricum ne interpellata quidem cum choris totidemque remanerent magistris.', 'accueil', 'article'),
(3, NULL, '2019-09-06 00:00:00', NULL, 1, 'Titre de l\'article 3', 'Accedebant enim eius asperitati, ubi inminuta vel laesa amplitudo imperii dicebatur, et iracundae suspicionum quantitati proximorum cruentae blanditiae exaggerantium incidentia et dolere inpendio simulantium, si principis periclitetur vita, a cuius salute velut filo pendere statum orbis terrarum fictis vocibus exclamabant.\r\n\r\nDum haec in oriente aguntur, Arelate hiemem agens Constantius post theatralis ludos atque circenses ambitioso editos apparatu diem sextum idus Octobres, qui imperii eius annum tricensimum terminabat, insolentiae pondera gravius librans, siquid dubium deferebatur aut falsum, pro liquido accipiens et conperto, inter alia excarnificatum Gerontium Magnentianae comitem partis exulari maerore multavit.', 'accueil', 'article'),
(4, NULL, '2019-09-06 00:00:00', NULL, 1, 'Titre de l\'article 4', 'Alios autem dicere aiunt multo etiam inhumanius (quem locum breviter paulo ante perstrinxi) praesidii adiumentique causa, non benevolentiae neque caritatis, amicitias esse expetendas; itaque, ut quisque minimum firmitatis haberet minimumque virium, ita amicitias appetere maxime; ex eo fieri ut mulierculae magis amicitiarum praesidia quaerant quam viri et inopes quam opulenti et calamitosi quam ii qui putentur beati.\r\n\r\nHarum trium sententiarum nulli prorsus assentior. Nec enim illa prima vera est, ut, quem ad modum in se quisque sit, sic in amicum sit animatus. Quam multa enim, quae nostra causa numquam faceremus, facimus causa amicorum! precari ab indigno, supplicare,', 'accueil', 'article'),
(5, NULL, '2019-09-06 00:00:00', NULL, 1, NULL, 'Postremo ad id indignitatis est ventum, ut cum peregrini ob formidatam haut ita dudum alimentorum inopiam pellerentur ab urbe praecipites, sectatoribus disciplinarum liberalium inpendio paucis sine respiratione ulla extrusis, tenerentur minimarum adseclae veri, quique id simularunt ad tempus, et tria milia saltatricum ne interpellata quidem cum choris totidemque remanerent magistris.', 'accueil', 'article'),
(6, NULL, '2019-09-06 00:00:00', NULL, 1, 'Titre de l\'article 6', 'Accedebant enim eius asperitati, ubi inminuta vel laesa amplitudo imperii dicebatur, et iracundae suspicionum quantitati proximorum cruentae blanditiae exaggerantium incidentia et dolere inpendio simulantium, si principis periclitetur vita, a cuius salute velut filo pendere statum orbis terrarum fictis vocibus exclamabant.\r\n\r\nDum haec in oriente aguntur, Arelate hiemem agens Constantius post theatralis ludos atque circenses ambitioso editos apparatu diem sextum idus Octobres, qui imperii eius annum tricensimum terminabat, insolentiae pondera gravius librans, siquid dubium deferebatur aut falsum, pro liquido accipiens et conperto, inter alia excarnificatum Gerontium Magnentianae comitem partis exulari maerore multavit.', 'accueil', 'article');

-- --------------------------------------------------------

--
-- Structure de la table `ContenuCategories`
--

CREATE TABLE `ContenuCategories` (
  `id` int(11) UNSIGNED NOT NULL,
  `idUserMaj` int(10) UNSIGNED NOT NULL,
  `dateMaj` datetime NOT NULL,
  `dateMajPrevious` datetime DEFAULT NULL,
  `libelle` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `ContenuCategories`
--

INSERT INTO `ContenuCategories` (`id`, `idUserMaj`, `dateMaj`, `dateMajPrevious`, `libelle`) VALUES
(1, 1, '2019-09-06 00:00:00', NULL, 'articles');

-- --------------------------------------------------------

--
-- Structure de la table `Departements`
--

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

CREATE TABLE `Roles` (
  `id` int(11) UNSIGNED NOT NULL,
  `idUserMaj` int(10) UNSIGNED DEFAULT NULL,
  `dateMaj` datetime NOT NULL,
  `dateMajPrevious` datetime DEFAULT NULL,
  `libelle` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `Roles`
--

INSERT INTO `Roles` (`id`, `idUserMaj`, `dateMaj`, `dateMajPrevious`, `libelle`) VALUES
(1, NULL, '2019-09-06 00:00:00', NULL, 'administrateur'),
(2, NULL, '2019-09-06 00:00:00', NULL, 'utilisateur');

-- --------------------------------------------------------

--
-- Structure de la table `TypesVoie`
--

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

CREATE TABLE `Users` (
  `id` int(10) UNSIGNED NOT NULL,
  `idUserMaj` int(10) UNSIGNED DEFAULT NULL,
  `dateMaj` datetime NOT NULL,
  `dateMajPrevious` datetime DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `idRoles` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Contenu de la table `Users`
--

INSERT INTO `Users` (`id`, `idUserMaj`, `dateMaj`, `dateMajPrevious`, `email`, `nom`, `prenom`, `password`, `idRoles`) VALUES
(1, NULL, '2019-09-06 00:00:00', NULL, 'admin@gmail.com', 'admin', 'admin', 'adminadmin', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Contacts`
--
ALTER TABLE `Contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Contacts_ibfk_1` (`idUserMaj`),
  ADD KEY `Contacts_ibfk_2` (`idUser`),
  ADD KEY `Contacts_ibfk_3` (`adrIdTypesVoie`),
  ADD KEY `Contacts_ibfk_4` (`adrIdLocalites`),
  ADD KEY `Contacts_ibfk_5` (`idContactsCategories`),
  ADD KEY `Contacts_ibfk_6` (`idContactsFonctions`);

--
-- Index pour la table `ContactsCategories`
--
ALTER TABLE `ContactsCategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ContactsCategories_ibfk_1` (`idUserMaj`);

--
-- Index pour la table `ContactsFonctions`
--
ALTER TABLE `ContactsFonctions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ContactsFonctions_ibfk_1` (`idUserMaj`);

--
-- Index pour la table `Contenu`
--
ALTER TABLE `Contenu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Contenu_ibfk_1` (`idUserMaj`),
  ADD KEY `Contenu_ibfk_2` (`idContenuCategories`);

--
-- Index pour la table `ContenuCategories`
--
ALTER TABLE `ContenuCategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ContenuCategories_ibfk_1` (`idUserMaj`);

--
-- Index pour la table `Departements`
--
ALTER TABLE `Departements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Departements_ibfk_1` (`idUserMaj`);

--
-- Index pour la table `Localites`
--
ALTER TABLE `Localites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Localites_ibfk_1` (`idUserMaj`),
  ADD KEY `Localites_ibfk_2` (`idDepartements`);

--
-- Index pour la table `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Roles_ibfk_1` (`idUserMaj`);

--
-- Index pour la table `TypesVoie`
--
ALTER TABLE `TypesVoie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `TypesVoie_ibfk_1` (`idUserMaj`);

--
-- Index pour la table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Users_ibfk_1` (`idUserMaj`),
  ADD KEY `Users_ibfk_2` (`idRoles`);

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `ContenuCategories`
--
ALTER TABLE `ContenuCategories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `TypesVoie`
--
ALTER TABLE `TypesVoie`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
