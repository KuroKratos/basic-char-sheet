-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 14 Novembre 2016 à 15:24
-- Version du serveur :  5.7.16-0ubuntu0.16.04.1
-- Version de PHP :  7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jd20r`
--

-- --------------------------------------------------------

--
-- Structure de la table `character`
--

CREATE TABLE `character` (
  `char_id` int(11) NOT NULL,
  `char_name` varchar(128) NOT NULL,
  `char_sex` int(11) NOT NULL,
  `char_race` int(11) NOT NULL,
  `char_class` int(11) NOT NULL,
  `char_level` int(11) NOT NULL,
  `char_current_exp` int(11) NOT NULL,
  `char_max_exp` int(11) NOT NULL,
  `char_current_hp` int(11) NOT NULL,
  `char_max_hp` int(11) NOT NULL,
  `char_current_mp` int(11) NOT NULL,
  `char_max_mp` int(11) NOT NULL,
  `char_gold` int(11) NOT NULL,
  `char_str_mod` int(11) NOT NULL,
  `char_psy_mod` int(11) NOT NULL,
  `char_luk_mod` int(11) NOT NULL,
  `char_def_mod` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `character`
--

INSERT INTO `character` (`char_id`, `char_name`, `char_sex`, `char_race`, `char_class`, `char_level`, `char_current_exp`, `char_max_exp`, `char_current_hp`, `char_max_hp`, `char_current_mp`, `char_max_mp`, `char_gold`, `char_str_mod`, `char_psy_mod`, `char_luk_mod`, `char_def_mod`) VALUES
(1, 'Kratos', 0, 1, 3, 1, 0, 200, 6, 6, 4, 5, 10, 0, 0, 0, 0),
(2, 'Risa', 1, 3, 8, 4, 120, 400, 8, 9, 5, 5, 13, 2, -1, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `class_name_m` varchar(128) NOT NULL,
  `class_name_f` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `class`
--

INSERT INTO `class` (`class_id`, `class_name_m`, `class_name_f`) VALUES
(1, 'Barbare', 'Barbare'),
(2, 'Barde', 'Barde'),
(3, 'Druide', 'Druidesse'),
(4, 'Ensorceleur', 'Ensorceleuse'),
(5, 'Guerrier', 'Guerrière'),
(6, 'Magicien', 'Magicienne'),
(7, 'Moine', 'Moniale'),
(8, 'Paladin', 'Paladin'),
(9, 'Prêtre', 'Prêtresse'),
(10, 'Rôdeur', 'Rôdeuse'),
(11, 'Roublard', 'Roublarde'),
(12, 'Voleur', 'Voleuse');

-- --------------------------------------------------------

--
-- Structure de la table `race`
--

CREATE TABLE `race` (
  `race_id` int(11) NOT NULL,
  `race_name_m` varchar(128) NOT NULL,
  `race_name_f` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `race`
--

INSERT INTO `race` (`race_id`, `race_name_m`, `race_name_f`) VALUES
(1, 'Elfe', 'Elfe'),
(2, 'Demi-Elfe', 'Demi-Elfe'),
(3, 'Orque', 'Orque'),
(4, 'Demi-Orque', 'Demi-Orque'),
(5, 'Gnome', 'Gnome'),
(6, 'Gobelin', 'Gobeline'),
(7, 'Halfelin', 'Halfeline'),
(8, 'Humain', 'Humaine'),
(9, 'Nain', 'Naine'),
(10, 'Drow', 'Drow');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `character`
--
ALTER TABLE `character`
  ADD PRIMARY KEY (`char_id`);

--
-- Index pour la table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Index pour la table `race`
--
ALTER TABLE `race`
  ADD PRIMARY KEY (`race_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `character`
--
ALTER TABLE `character`
  MODIFY `char_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `race`
--
ALTER TABLE `race`
  MODIFY `race_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
