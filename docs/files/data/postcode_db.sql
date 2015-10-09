-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2013 at 02:51 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `postcode_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `postcodes`
--

DROP TABLE IF EXISTS `postcodes`;
CREATE TABLE IF NOT EXISTS `postcodes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postcode` int(4) unsigned NOT NULL,
  `suburb` varchar(45) NOT NULL,
  `state` varchar(4) NOT NULL,
  `lat` double NOT NULL DEFAULT '0',
  `lng` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_postcode_suburb` (`postcode`,`suburb`),
  KEY `idx_lng` (`lng`),
  KEY `idx_lat` (`lat`),
  KEY `idx_postcode` (`postcode`),
  KEY `idx_suburb` (`suburb`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `postcodes`
--

INSERT INTO `postcodes` VALUES
(1, 200, 'AUSTRALIAN NATIONAL UNIVERSITY', 'ACT', -35.277272, 149.117136),
(2, 221, 'BARTON', 'ACT', -35.201372, 149.095065);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
