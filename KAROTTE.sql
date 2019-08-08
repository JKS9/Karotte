-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 08 Août 2019 à 14:15
-- Version du serveur :  5.6.37
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `KAROTTE`
--

-- --------------------------------------------------------

--
-- Structure de la table `Cards`
--

CREATE TABLE IF NOT EXISTS `Cards` (
  `Id` int(9) NOT NULL,
  `IdProduct` int(9) NOT NULL,
  `idFarmerProduct` int(9) NOT NULL,
  `Nb` int(9) NOT NULL,
  `Idusers` int(9) NOT NULL,
  `Status` int(1) NOT NULL DEFAULT '1',
  `creationDate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Cards`
--

INSERT INTO `Cards` (`Id`, `IdProduct`, `idFarmerProduct`, `Nb`, `Idusers`, `Status`, `creationDate`) VALUES
(3, 17, 1, 5, 4, 0, '2019-08-07'),
(4, 16, 1, 1, 4, 0, '2019-08-07');

-- --------------------------------------------------------

--
-- Structure de la table `Commande`
--

CREATE TABLE IF NOT EXISTS `Commande` (
  `Id` int(9) NOT NULL,
  `IdUser` int(9) NOT NULL,
  `idFarmer` int(9) NOT NULL,
  `Prix` varchar(255) NOT NULL,
  `CreationDate` date NOT NULL,
  `Status` int(1) NOT NULL,
  `IdDelivery` int(1) NOT NULL,
  `jwt` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Commande`
--

INSERT INTO `Commande` (`Id`, `IdUser`, `idFarmer`, `Prix`, `CreationDate`, `Status`, `IdDelivery`, `jwt`) VALUES
(1, 4, 2, '15', '2019-07-02', 2, 1, ''),
(2, 1, 1, '5.11', '2019-08-08', 0, 1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJwcm9kdWN0cyI6W3sicHJvZHVjdF9pZCI6IjE2IiwiZmFybWVyX2lkIjoiMSIsInF1YW50aXR5IjoiMSIsInByaWNlIjoyLjEwOTk5OTk5OTk5OTk5OTl9XSwiZGVsaXZlcnlQcmljZSI6MywiY2xpZW50X2lkIjoiMSIsImRlbGl2ZXJ5X2lkIjoiMSIsImV4dCI6MTU2NTI3MzQ5MX0.epU3QmRqJA9T_ooIMKBP7ThWUypkAkr1WeWhYt7Y_vga');

-- --------------------------------------------------------

--
-- Structure de la table `Conversation`
--

CREATE TABLE IF NOT EXISTS `Conversation` (
  `Id` int(9) NOT NULL,
  `Iduser` int(9) NOT NULL,
  `Actif` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Conversation`
--

INSERT INTO `Conversation` (`Id`, `Iduser`, `Actif`) VALUES
(1, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Delivery`
--

CREATE TABLE IF NOT EXISTS `Delivery` (
  `Id` int(9) NOT NULL,
  `IdUser` int(9) NOT NULL,
  `Road` varchar(255) NOT NULL,
  `RoadName` varchar(255) NOT NULL,
  `RoadNumber` varchar(255) NOT NULL,
  `PostalCode` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Region` varchar(255) NOT NULL,
  `County` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Actif` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Delivery`
--

INSERT INTO `Delivery` (`Id`, `IdUser`, `Road`, `RoadName`, `RoadNumber`, `PostalCode`, `City`, `Region`, `County`, `Phone`, `Actif`) VALUES
(1, 1, 'Rue', 'ernest renan', '26', '95240', 'eaubonne', '07', 'France', '0663571407', 1),
(3, 1, 'Rue', 'ernest renant', '56', '95600', 'Paris', '11', 'France', '0663571407', 1),
(4, 4, 'Rue', 'de la cale', '90', '95600', 'eaubonne', '08', 'France', '0663571407', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Departement`
--

CREATE TABLE IF NOT EXISTS `Departement` (
  `departement_id` int(11) NOT NULL,
  `departement_code` varchar(3) CHARACTER SET utf8 DEFAULT NULL,
  `departement_nom` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Departement`
--

INSERT INTO `Departement` (`departement_id`, `departement_code`, `departement_nom`) VALUES
(1, '01', 'Ain'),
(2, '02', 'Aisne'),
(3, '03', 'Allier'),
(5, '05', 'Hautes-Alpes'),
(4, '04', 'Alpes-de-Haute-Provence'),
(6, '06', 'Alpes-Maritimes'),
(7, '07', 'Ardèche'),
(8, '08', 'Ardennes'),
(9, '09', 'Ariège'),
(10, '10', 'Aube'),
(11, '11', 'Aude'),
(12, '12', 'Aveyron'),
(13, '13', 'Bouches-du-Rhône'),
(14, '14', 'Calvados'),
(15, '15', 'Cantal'),
(16, '16', 'Charente'),
(17, '17', 'Charente-Maritime'),
(18, '18', 'Cher'),
(19, '19', 'Corrèze'),
(20, '2a', 'Corse-du-sud'),
(21, '2b', 'Haute-corse'),
(22, '21', 'Côte-d''or'),
(23, '22', 'Côtes-d''armor'),
(24, '23', 'Creuse'),
(25, '24', 'Dordogne'),
(26, '25', 'Doubs'),
(27, '26', 'Drôme'),
(28, '27', 'Eure'),
(29, '28', 'Eure-et-Loir'),
(30, '29', 'Finistère'),
(31, '30', 'Gard'),
(32, '31', 'Haute-Garonne'),
(33, '32', 'Gers'),
(34, '33', 'Gironde'),
(35, '34', 'Hérault'),
(36, '35', 'Ile-et-Vilaine'),
(37, '36', 'Indre'),
(38, '37', 'Indre-et-Loire'),
(39, '38', 'Isère'),
(40, '39', 'Jura'),
(41, '40', 'Landes'),
(42, '41', 'Loir-et-Cher'),
(43, '42', 'Loire'),
(44, '43', 'Haute-Loire'),
(45, '44', 'Loire-Atlantique'),
(46, '45', 'Loiret'),
(47, '46', 'Lot'),
(48, '47', 'Lot-et-Garonne'),
(49, '48', 'Lozère'),
(50, '49', 'Maine-et-Loire'),
(51, '50', 'Manche'),
(52, '51', 'Marne'),
(53, '52', 'Haute-Marne'),
(54, '53', 'Mayenne'),
(55, '54', 'Meurthe-et-Moselle'),
(56, '55', 'Meuse'),
(57, '56', 'Morbihan'),
(58, '57', 'Moselle'),
(59, '58', 'Nièvre'),
(60, '59', 'Nord'),
(61, '60', 'Oise'),
(62, '61', 'Orne'),
(63, '62', 'Pas-de-Calais'),
(64, '63', 'Puy-de-Dôme'),
(65, '64', 'Pyrénées-Atlantiques'),
(66, '65', 'Hautes-Pyrénées'),
(67, '66', 'Pyrénées-Orientales'),
(68, '67', 'Bas-Rhin'),
(69, '68', 'Haut-Rhin'),
(70, '69', 'Rhône'),
(71, '70', 'Haute-Saône'),
(72, '71', 'Saône-et-Loire'),
(73, '72', 'Sarthe'),
(74, '73', 'Savoie'),
(75, '74', 'Haute-Savoie'),
(76, '75', 'Paris'),
(77, '76', 'Seine-Maritime'),
(78, '77', 'Seine-et-Marne'),
(79, '78', 'Yvelines'),
(80, '79', 'Deux-Sèvres'),
(81, '80', 'Somme'),
(82, '81', 'Tarn'),
(83, '82', 'Tarn-et-Garonne'),
(84, '83', 'Var'),
(85, '84', 'Vaucluse'),
(86, '85', 'Vendée'),
(87, '86', 'Vienne'),
(88, '87', 'Haute-Vienne'),
(89, '88', 'Vosges'),
(90, '89', 'Yonne'),
(91, '90', 'Territoire de Belfort'),
(92, '91', 'Essonne'),
(93, '92', 'Hauts-de-Seine'),
(94, '93', 'Seine-Saint-Denis'),
(95, '94', 'Val-de-Marne'),
(96, '95', 'Val-d''oise'),
(97, '976', 'Mayotte'),
(98, '971', 'Guadeloupe'),
(99, '973', 'Guyane'),
(100, '972', 'Martinique'),
(101, '974', 'Réunion');

-- --------------------------------------------------------

--
-- Structure de la table `FarmerProduits`
--

CREATE TABLE IF NOT EXISTS `FarmerProduits` (
  `Id` int(9) NOT NULL,
  `IdUser` int(9) NOT NULL,
  `IdFarmer` int(9) NOT NULL,
  `IdListeProduit` int(9) NOT NULL,
  `Region` int(9) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `FarmerProduits`
--

INSERT INTO `FarmerProduits` (`Id`, `IdUser`, `IdFarmer`, `IdListeProduit`, `Region`) VALUES
(4, 2, 1, 1, 29),
(5, 2, 1, 2, 29),
(6, 2, 1, 3, 29),
(7, 4, 2, 1, 55),
(8, 4, 2, 2, 55),
(9, 4, 2, 3, 55),
(10, 4, 2, 5, 55),
(11, 4, 2, 18, 14);

-- --------------------------------------------------------

--
-- Structure de la table `Farmers`
--

CREATE TABLE IF NOT EXISTS `Farmers` (
  `Id` int(9) NOT NULL,
  `IdUser` int(9) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Biography` text,
  `Road` varchar(255) NOT NULL,
  `RoadName` varchar(255) NOT NULL,
  `roadNumber` varchar(255) NOT NULL,
  `PostalCode` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Region` int(9) NOT NULL,
  `County` varchar(255) NOT NULL,
  `Phone` varchar(255) NOT NULL,
  `Bic` varchar(255) NOT NULL,
  `IBAN` varchar(255) NOT NULL,
  `creationDate` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Farmers`
--

INSERT INTO `Farmers` (`Id`, `IdUser`, `Type`, `Biography`, `Road`, `RoadName`, `roadNumber`, `PostalCode`, `City`, `Region`, `County`, `Phone`, `Bic`, `IBAN`, `creationDate`) VALUES
(1, 2, '1', 'jaime cultiver', 'street', 'ernest renant', '28', '95600', 'Eaubonne', 29, 'France', '0663571407', '', '', '2019-06-28'),
(2, 4, '2', 'bonjour', 'Rue', 'ernest renan', '29', '75001', 'Paris', 14, 'France', '663571408', '123256', '1223', '2019-06-28');

-- --------------------------------------------------------

--
-- Structure de la table `ListeProduit`
--

CREATE TABLE IF NOT EXISTS `ListeProduit` (
  `Id` int(9) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Actif` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ListeProduit`
--

INSERT INTO `ListeProduit` (`Id`, `Name`, `Actif`) VALUES
(1, 'Ail', 1),
(2, 'Artichaut', 1),
(3, 'Asperge', 1),
(4, 'Aubergine', 1),
(5, 'Avocat', 1),
(6, 'Azucki', 1),
(10, 'Betterave', 1),
(11, 'Blette', 1),
(12, 'Brocoli', 1),
(15, 'Céleri', 1),
(16, 'Champignon', 1),
(17, 'Champignon de Paris', 1),
(18, 'Chayote', 1),
(19, 'Choux', 1),
(20, 'Citrouille', 1),
(21, 'Concombre', 1),
(22, 'Cornichon', 1),
(24, 'Courgette', 1),
(25, 'Cresson', 1),
(27, 'Daikon', 1),
(28, 'Échalote', 1),
(29, 'Endive', 1),
(30, 'Épinard', 1),
(31, 'Fenouil', 1),
(32, 'Fève', 1),
(34, 'Gingembre', 1),
(35, 'Haricot', 1),
(36, 'Laitue', 1),
(37, 'Igname', 1),
(38, 'Jaque', 1),
(39, 'Jujube', 1),
(42, 'Lentille', 1),
(44, 'Mâche', 1),
(45, 'Maïs', 1),
(46, 'Manioc', 1),
(47, 'Navet', 1),
(48, 'Oignon', 1),
(50, 'Oseille', 1),
(51, 'Panais', 1),
(52, 'Patate', 1),
(53, 'Pâtisson', 1),
(54, 'Petit pois', 1),
(55, 'Poireau', 1),
(56, 'Poivron', 1),
(58, 'Potimarron', 1),
(59, 'Potiron', 1),
(60, 'Radis', 1),
(61, 'Rhubarbe', 1),
(62, 'Roquette', 1),
(63, 'Rutabaga', 1),
(65, 'Salsifi', 1),
(68, 'Tomate', 1);

-- --------------------------------------------------------

--
-- Structure de la table `Messages`
--

CREATE TABLE IF NOT EXISTS `Messages` (
  `id` int(9) NOT NULL,
  `idEnvoi` varchar(255) NOT NULL,
  `IdRecu` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Messages`
--

INSERT INTO `Messages` (`id`, `idEnvoi`, `IdRecu`, `date`, `message`) VALUES
(1, '4', 'Admin', '2019-08-06', 'salut'),
(2, 'Admin', '4', '2019-08-06', 'salut ! je peut vous aider ?'),
(3, '4', 'Admin', '2019-08-06', 'hello'),
(4, '1', 'Admin', '2019-08-06', 'hello'),
(5, '4', 'Admin', '2019-08-07', 'bastien nicolas'),
(6, '4', 'Admin', '2019-08-07', 'ok');

-- --------------------------------------------------------

--
-- Structure de la table `Produit`
--

CREATE TABLE IF NOT EXISTS `Produit` (
  `Id` int(9) NOT NULL,
  `IdListeProduit` int(9) NOT NULL,
  `Prix` varchar(255) NOT NULL,
  `Biographie` text NOT NULL,
  `Qualiter` text NOT NULL,
  `UnitWeight` varchar(9) NOT NULL,
  `NbStock` varchar(255) NOT NULL,
  `IdFarmers` int(9) NOT NULL,
  `Region` int(9) NOT NULL,
  `CreationDate` date DEFAULT NULL,
  `Actif` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Produit`
--

INSERT INTO `Produit` (`Id`, `IdListeProduit`, `Prix`, `Biographie`, `Qualiter`, `UnitWeight`, `NbStock`, `IdFarmers`, `Region`, `CreationDate`, `Actif`) VALUES
(16, 1, '2', 'ail jai mal', '1', '500g', '199', 1, 29, '2019-07-23', 1),
(17, 2, '2', 'artichaut chaud', '1', '500g', '200', 1, 29, '2019-07-23', 1),
(18, 3, '2', 'pise vert', '1', '500g', '200', 1, 29, '2019-07-23', 1),
(19, 1, '2', 'ail ouille', '2', '200g', '200', 2, 55, '2019-07-23', 1),
(20, 2, '2', 'j''aime les artichauts', '2', '200g', '200', 2, 55, '2019-07-23', 1),
(21, 3, '2', 'tu va spisser vert', '2', '200g', '200', 2, 55, '2019-07-23', 1),
(22, 5, '3', 'j''aime les avocats', '2', '200g', '200', 2, 55, '2019-07-25', 1),
(23, 18, '3', 'chayote', '2', '200g', '200', 2, 14, '2019-08-06', 0);

-- --------------------------------------------------------

--
-- Structure de la table `ProduitOrder`
--

CREATE TABLE IF NOT EXISTS `ProduitOrder` (
  `Id` int(9) NOT NULL,
  `IdCommande` int(9) NOT NULL,
  `IdProduit` int(9) NOT NULL,
  `NbProduits` int(9) NOT NULL,
  `idFarmerProduct` int(9) NOT NULL,
  `Status` int(1) NOT NULL,
  `creationDate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ProduitOrder`
--

INSERT INTO `ProduitOrder` (`Id`, `IdCommande`, `IdProduit`, `NbProduits`, `idFarmerProduct`, `Status`, `creationDate`) VALUES
(1, 1, 19, 2, 2, 2, '2019-07-05'),
(2, 1, 19, 3, 2, 2, '2019-07-02'),
(3, 2, 16, 1, 1, 0, '2019-08-08');

-- --------------------------------------------------------

--
-- Structure de la table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `Id` int(9) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `DateBirth` date DEFAULT NULL,
  `Type` int(1) NOT NULL,
  `Actif` int(1) NOT NULL DEFAULT '0',
  `Status` int(1) NOT NULL DEFAULT '1',
  `CreationDate` date NOT NULL,
  `CreationIp` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Users`
--

INSERT INTO `Users` (`Id`, `Name`, `LastName`, `Email`, `Password`, `DateBirth`, `Type`, `Actif`, `Status`, `CreationDate`, `CreationIp`) VALUES
(1, 'etiennes', 'juzans', 'juzans.etienne@gmail.com', 'totote123', '1980-06-03', 1, 0, 1, '2019-06-27', '127.0.0.1'),
(2, 'Charles', 'juzans', 'juzans@gmail.com', 'totote123', '1997-05-13', 2, 0, 1, '2019-06-28', '127.0.0.1'),
(3, 'bebe', 'juzans', 'etienne@gmail.com', 'totote123', '1997-12-05', 1, 0, 1, '2019-07-02', '127.0.0.1'),
(4, 'jule', 'juzan', 'lolololololol@gmail.com', 'totote123', '1995-05-13', 2, 0, 1, '2019-07-11', '127.0.0.1');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Cards`
--
ALTER TABLE `Cards`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Commande`
--
ALTER TABLE `Commande`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Conversation`
--
ALTER TABLE `Conversation`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Delivery`
--
ALTER TABLE `Delivery`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Departement`
--
ALTER TABLE `Departement`
  ADD PRIMARY KEY (`departement_id`),
  ADD KEY `departement_code` (`departement_code`);

--
-- Index pour la table `FarmerProduits`
--
ALTER TABLE `FarmerProduits`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Farmers`
--
ALTER TABLE `Farmers`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `ListeProduit`
--
ALTER TABLE `ListeProduit`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Messages`
--
ALTER TABLE `Messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `Produit`
--
ALTER TABLE `Produit`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `ProduitOrder`
--
ALTER TABLE `ProduitOrder`
  ADD PRIMARY KEY (`Id`);

--
-- Index pour la table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Cards`
--
ALTER TABLE `Cards`
  MODIFY `Id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `Commande`
--
ALTER TABLE `Commande`
  MODIFY `Id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `Delivery`
--
ALTER TABLE `Delivery`
  MODIFY `Id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `Departement`
--
ALTER TABLE `Departement`
  MODIFY `departement_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT pour la table `FarmerProduits`
--
ALTER TABLE `FarmerProduits`
  MODIFY `Id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `Farmers`
--
ALTER TABLE `Farmers`
  MODIFY `Id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `ListeProduit`
--
ALTER TABLE `ListeProduit`
  MODIFY `Id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT pour la table `Messages`
--
ALTER TABLE `Messages`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `Produit`
--
ALTER TABLE `Produit`
  MODIFY `Id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `ProduitOrder`
--
ALTER TABLE `ProduitOrder`
  MODIFY `Id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Users`
--
ALTER TABLE `Users`
  MODIFY `Id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
