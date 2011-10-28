-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 28, 2011 at 11:54 AM
-- Server version: 5.5.9
-- PHP Version: 5.2.17

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
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `member_since` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `twitter_id` varchar(20) DEFAULT NULL,
  `facebook_id` varchar(20) DEFAULT NULL,
  `blog_rss` varchar(255) DEFAULT NULL,
  `address_street` varchar(255) NOT NULL,
  `address_number` varchar(45) NOT NULL,
  `address_bus` varchar(45) DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  `telephone` varchar(30) DEFAULT NULL,
  `fax` varchar(30) DEFAULT NULL,
  `gsm` varchar(30) DEFAULT NULL,
  `language_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
