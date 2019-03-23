-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 23 mars 2019 à 18:14
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `jobportal`
--
CREATE DATABASE IF NOT EXISTS `jobportal` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `jobportal`;

-- --------------------------------------------------------

--
-- Structure de la table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fullname` varchar(40) NOT NULL,
  `pseudo` varchar(40) NOT NULL,
  `bio` varchar(160) DEFAULT NULL,
  `telephone` varchar(10) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(128) NOT NULL,
  `address` varchar(128) DEFAULT NULL,
  `nationality` varchar(2) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `birthplace` varchar(40) DEFAULT NULL,
  `location` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `index_pseudo` (`pseudo`),
  UNIQUE KEY `index_email` (`email`),
  UNIQUE KEY `index_telephone` (`telephone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `computer_knowledge`
--

DROP TABLE IF EXISTS `computer_knowledge`;
CREATE TABLE IF NOT EXISTS `computer_knowledge` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_cv` mediumint(8) UNSIGNED NOT NULL,
  `type` varchar(4) DEFAULT NULL,
  `knowledge` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `index_knowledge` (`knowledge`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `contract`
--

DROP TABLE IF EXISTS `contract`;
CREATE TABLE IF NOT EXISTS `contract` (
  `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cv`
--

DROP TABLE IF EXISTS `cv`;
CREATE TABLE IF NOT EXISTS `cv` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `id_account` mediumint(9) NOT NULL,
  `creation_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `employer`
--

DROP TABLE IF EXISTS `employer`;
CREATE TABLE IF NOT EXISTS `employer` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `id_account` mediumint(9) NOT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `index_employer_type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `experience`
--

DROP TABLE IF EXISTS `experience`;
CREATE TABLE IF NOT EXISTS `experience` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `society` varchar(60) NOT NULL,
  `type` varchar(60) NOT NULL,
  `description` varchar(60) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index_society` (`society`),
  KEY `index_description` (`description`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

DROP TABLE IF EXISTS `formation`;
CREATE TABLE IF NOT EXISTS `formation` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `institute` varchar(60) NOT NULL,
  `document` varchar(5) NOT NULL,
  `location` varchar(60) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `index_name` (`name`),
  KEY `index_institute` (`institute`),
  KEY `ind_location` (`location`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `hobby`
--

DROP TABLE IF EXISTS `hobby`;
CREATE TABLE IF NOT EXISTS `hobby` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_cv` mediumint(8) UNSIGNED NOT NULL,
  `description` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `index_hobby` (`description`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `job_application`
--

DROP TABLE IF EXISTS `job_application`;
CREATE TABLE IF NOT EXISTS `job_application` (
  `id` smallint(6) NOT NULL,
  `id_account` mediumint(8) UNSIGNED NOT NULL,
  `id_profession` mediumint(8) UNSIGNED NOT NULL,
  `type` varchar(3) NOT NULL,
  `description` varchar(255) NOT NULL,
  `duration` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `duration_unit` varchar(1) NOT NULL DEFAULT 'Y',
  `min_experience` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `max_experience` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `min_salary` mediumint(8) UNSIGNED NOT NULL,
  `location` varchar(60) NOT NULL,
  `application_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_update_datetime` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `index_description` (`description`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `job_offer`
--

DROP TABLE IF EXISTS `job_offer`;
CREATE TABLE IF NOT EXISTS `job_offer` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_society` mediumint(8) UNSIGNED DEFAULT NULL,
  `id_employer` mediumint(8) UNSIGNED DEFAULT NULL,
  `id_profession` mediumint(8) UNSIGNED NOT NULL,
  `description` varchar(160) NOT NULL,
  `genre` varchar(3) NOT NULL,
  `contract_type` varchar(3) NOT NULL,
  `min_experience` mediumint(8) UNSIGNED DEFAULT NULL,
  `salary` mediumint(8) UNSIGNED NOT NULL,
  `studies_level` varchar(10) NOT NULL,
  `location` varchar(60) NOT NULL,
  `post_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `duration` mediumint(8) UNSIGNED DEFAULT NULL,
  `duration_unit` varchar(1) DEFAULT 'Y',
  PRIMARY KEY (`id`),
  KEY `index_description` (`description`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `language`
--

DROP TABLE IF EXISTS `language`;
CREATE TABLE IF NOT EXISTS `language` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_cv` mediumint(8) UNSIGNED NOT NULL,
  `iso_code` varchar(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `index_language` (`iso_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `level`
--

DROP TABLE IF EXISTS `level`;
CREATE TABLE IF NOT EXISTS `level` (
  `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `diploma` varchar(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_diploma` (`diploma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `match`
--

DROP TABLE IF EXISTS `match`;
CREATE TABLE IF NOT EXISTS `match` (
  `id` mediumint(9) NOT NULL AUTO_INCREMENT,
  `id_offer` mediumint(9) NOT NULL,
  `id_job_application` mediumint(9) NOT NULL,
  `interview_datetime` datetime NOT NULL,
  `match_datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_offer_job_request` (`id_offer`,`id_job_application`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `profession`
--

DROP TABLE IF EXISTS `profession`;
CREATE TABLE IF NOT EXISTS `profession` (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_sector` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` varchar(160) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `index_name` (`name`),
  KEY `index_description` (`description`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sector`
--

DROP TABLE IF EXISTS `sector`;
CREATE TABLE IF NOT EXISTS `sector` (
  `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `description` varchar(160) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `index_name` (`name`),
  KEY `index_description` (`description`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `skill`
--

DROP TABLE IF EXISTS `skill`;
CREATE TABLE IF NOT EXISTS `skill` (
  `id` mediumint(9) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cv_id` mediumint(9) UNSIGNED NOT NULL,
  `description` varchar(60) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `index_description` (`description`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `society`
--

DROP TABLE IF EXISTS `society`;
CREATE TABLE IF NOT EXISTS `society` (
  `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_employer` mediumint(8) UNSIGNED NOT NULL,
  `id_sector` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` varchar(255) NOT NULL,
  `address` varchar(160) NOT NULL,
  `location` varchar(60) NOT NULL,
  `telephone` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `max_employees` mediumint(8) UNSIGNED NOT NULL,
  `employees` mediumint(8) UNSIGNED NOT NULL,
  `creation_date` date NOT NULL,
  `type` varchar(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `index_description` (`description`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
