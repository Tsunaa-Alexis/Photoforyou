-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3308
-- Généré le :  mer. 29 avr. 2020 à 16:38
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `photoforyou`
--

-- --------------------------------------------------------

--
-- Structure de la table `achatcredit`
--

DROP TABLE IF EXISTS `achatcredit`;
CREATE TABLE IF NOT EXISTS `achatcredit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prix` float NOT NULL,
  `credit` int(11) NOT NULL,
  `formule` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `achatcredit`
--

INSERT INTO `achatcredit` (`id`, `nom`, `prix`, `credit`, `formule`) VALUES
(1, 'Tiers 1', 5, 1, 0),
(2, 'Tiers 2', 25, 5, 0),
(3, 'Tiers 3', 50, 10, 0),
(4, 'Tiers 4', 125, 25, 0),
(5, 'Tiers 5', 249.99, 50, 0),
(6, 'Tiers 6', 489.99, 100, 0);

-- --------------------------------------------------------

--
-- Structure de la table `photobuy`
--

DROP TABLE IF EXISTS `photobuy`;
CREATE TABLE IF NOT EXISTS `photobuy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_photo` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `photobuy`
--

INSERT INTO `photobuy` (`id`, `id_photo`, `id_user`, `date`) VALUES
(1, 9, 10, 0);

-- --------------------------------------------------------

--
-- Structure de la table `photos`
--

DROP TABLE IF EXISTS `photos`;
CREATE TABLE IF NOT EXISTS `photos` (
  `id_photo` int(11) NOT NULL,
  `nom_photo` varchar(45) NOT NULL,
  `taille_pixels_x` int(11) NOT NULL,
  `taille_pixels_y` int(11) NOT NULL,
  `poids` int(11) NOT NULL,
  `URL_photo` varchar(45) NOT NULL,
  `id_user` int(11) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `prix` int(11) NOT NULL,
  `vendu` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_photo`),
  KEY `id_user_idx` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `photos`
--

INSERT INTO `photos` (`id_photo`, `nom_photo`, `taille_pixels_x`, `taille_pixels_y`, `poids`, `URL_photo`, `id_user`, `description`, `prix`, `vendu`) VALUES
(0, '133', 0, 133, 4222, 'photos/0Q84GafqyS7.png', 11, 'efsfs', 0, 0),
(1, 'photo_superbe', 2356, 1571, 3700, 'photo/3.jpg', 11, 'hnurgnsgrnhsnuhgrnhvsgrhnvsgrnhvgsrhuvghuvgrunvsehusvghuvsghhvhnuvhnuvehnuiv', 0, 0),
(2, 'fbkfrbkj', 152, 152, 151, 'photo/1.jpg', 11, NULL, 0, 0),
(3, 'hukdfjn', 5422, 151, 151, 'photo/2.jpg', 11, NULL, 0, 0),
(9, 'test', 1200, 900, 898, 'photo/11.png', 11, NULL, 0, 10),
(10, 'dcbhbkh', 151, 1512, 8645, 'photo/4.jpg', 11, NULL, 0, 0),
(5555, '133', 0, 133, 4222, 'photos/0pABFVUnW81.png', 11, 'qzdqzdsdezqds', 0, 0),
(45128, 'fdcwf', 133, 133, 41506, 'photos/45128.png', 11, 'wsdfdf', 0, 0),
(84562, 'asqd', 133, 133, 45134, 'photos/0qDXUXRRMq7.png', 11, 'dzqdqd', 0, 0),
(41932046, 'NOUVEAUUUUU', 200, 133, 51034, 'photos/0041932046.png', 11, 'glhzqhktrh,ksrje,tbzrevtjhnyudhtrbuy', 0, 0),
(58591779, 'dsfsrhdytjrt', 200, 200, 42767, 'photos/0058591779.png', 11, 'shdgjfuykjh', 0, 0),
(327768430, 'zeese', 133, 133, 40523, 'photos/0327768430.png', 11, 'sezeze', 0, 0),
(432442573, 'zeese', 133, 133, 40523, 'photos/0432442573.png', 11, 'sezeze', 0, 0),
(474746822, 'qsrbfrblisgrbistbig', 200, 133, 51034, 'photos/0474746822.png', 11, 'vnrgiqgrnibpgr', 0, 0),
(545394204, 'sasas', 200, 133, 41506, 'photos/0545394204.png', 11, 'ssddsqdzd', 0, 0),
(610705284, 'qsrbfrblisgrbistbig', 200, 133, 51034, 'photos/0610705284.png', 11, 'vnrgiqgrnibpgr', 0, 0),
(690223494, 'TEST', 200, 133, 45134, 'photos/0690223494.png', 11, 'sqfdqzd', 152, 0),
(844473033, 'afghjgfd', 133, 133, 51034, 'photos/0844473033.png', 11, 'efdsfsef', 0, 0),
(2147483647, 'fdcwf', 133, 133, 41506, 'photos/054106202266370641473.png', 11, 'wsdfdf', 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `statistique`
--

DROP TABLE IF EXISTS `statistique`;
CREATE TABLE IF NOT EXISTS `statistique` (
  `date` datetime DEFAULT NULL,
  `valeurs` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `statistique`
--

INSERT INTO `statistique` (`date`, `valeurs`) VALUES
('2019-09-24 14:49:33', 337),
('2019-09-24 14:49:35', 337);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `credit` int(11) DEFAULT NULL,
  `numtel` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail_UNIQUE` (`mail`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `prenom`, `nom`, `type`, `mail`, `mdp`, `credit`, `numtel`) VALUES
(10, 'Alexis', 'Ottavi', 'Client', 'alexisottavi@gmail.com', 'azerty', 15263, '0642268987'),
(11, 'Ana', 'Medinilla', 'Photographe', 'jumedinilla@hotmail.fr', 'azerty', 8459, '0645872596');

-- --------------------------------------------------------

--
-- Structure de la table `vente`
--

DROP TABLE IF EXISTS `vente`;
CREATE TABLE IF NOT EXISTS `vente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_photo` int(11) NOT NULL,
  `id_acheteur` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
