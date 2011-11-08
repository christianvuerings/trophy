-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Machine: localhost
-- Genereertijd: 08 Nov 2011 om 22:27
-- Serverversie: 5.5.8
-- PHP-Versie: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `trophy`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `province_id` int(11) NOT NULL,
  `zipcode` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Gegevens worden uitgevoerd voor tabel `city`
--


-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Gegevens worden uitgevoerd voor tabel `country`
--


-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(30) NOT NULL,
  PRIMARY KEY (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Gegevens worden uitgevoerd voor tabel `language`
--


-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `occupation`
--

CREATE TABLE IF NOT EXISTS `occupation` (
  `occupation_id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(30) NOT NULL,
  PRIMARY KEY (`occupation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Gegevens worden uitgevoerd voor tabel `occupation`
--


-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `amount` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_method_id` int(11) NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Gegevens worden uitgevoerd voor tabel `payment`
--


-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `payment_method`
--

CREATE TABLE IF NOT EXISTS `payment_method` (
  `payment_method_id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL,
  PRIMARY KEY (`payment_method_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Gegevens worden uitgevoerd voor tabel `payment_method`
--


-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `practice`
--

CREATE TABLE IF NOT EXISTS `practice` (
  `practice_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address_street` varchar(255) NOT NULL,
  `address_number` varchar(8) NOT NULL,
  `address_bus` varchar(8) NOT NULL,
  `city_id` int(11) NOT NULL,
  `telephone` varchar(30) DEFAULT NULL,
  `fax` varchar(30) DEFAULT NULL,
  `gsm` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`practice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden uitgevoerd voor tabel `practice`
--


-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `province`
--

CREATE TABLE IF NOT EXISTS `province` (
  `province_id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`province_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Gegevens worden uitgevoerd voor tabel `province`
--


-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `speciality`
--

CREATE TABLE IF NOT EXISTS `speciality` (
  `speciality_id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(30) NOT NULL,
  PRIMARY KEY (`speciality_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Gegevens worden uitgevoerd voor tabel `speciality`
--


-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `last_login` date NOT NULL,
  `member_since` date NOT NULL,
  `language_id` int(11) NOT NULL,
  `twitter_id` varchar(20) DEFAULT NULL,
  `facebook_id` varchar(20) DEFAULT NULL,
  `blog_rss` varchar(255) DEFAULT NULL,
  `address_street` varchar(255) NOT NULL COMMENT 'invoice data',
  `address_number` varchar(45) NOT NULL COMMENT 'invoice data',
  `address_bus` varchar(45) DEFAULT NULL COMMENT 'invoice data',
  `city_id` int(11) NOT NULL COMMENT 'invoice data',
  `telephone` varchar(30) DEFAULT NULL,
  `fax` varchar(30) DEFAULT NULL,
  `gsm` varchar(30) DEFAULT NULL,
  `vat_number` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Gegevens worden uitgevoerd voor tabel `user`
--


-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user_occupation`
--

CREATE TABLE IF NOT EXISTS `user_occupation` (
  `user_id` int(11) NOT NULL,
  `occupation_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`occupation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden uitgevoerd voor tabel `user_occupation`
--


-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `user_speciality`
--

CREATE TABLE IF NOT EXISTS `user_speciality` (
  `user_id` int(11) NOT NULL,
  `speciality_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`speciality_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden uitgevoerd voor tabel `user_speciality`
--

