-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 24, 2020 at 01:06 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `restoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `enteghad`
--

CREATE TABLE IF NOT EXISTS `enteghad` (
  `enn` varchar(10000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `enteghad`
--


-- --------------------------------------------------------

--
-- Table structure for table `ghaza`
--

CREATE TABLE IF NOT EXISTS `ghaza` (
  `ffff` int(11) NOT NULL AUTO_INCREMENT,
  `kabab` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `morgh` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gosht` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mahi` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghorme` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gheyme` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salad` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `noshabe` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ffff`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ghaza`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `passs` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `passs`, `id`) VALUES
('admin', '1234', 1);
