-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 15, 2014 at 05:28 PM
-- Server version: 5.5.34-0ubuntu0.13.10.1
-- PHP Version: 5.5.3-1ubuntu2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `wsr`
--

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE IF NOT EXISTS `driver` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `birth_date` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `avatar` varchar(50) NOT NULL DEFAULT 'avatar.png',
  `vehicle_id` int(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicle_id` (`vehicle_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`id`, `name`, `birth_date`, `email`, `phone`, `avatar`, `vehicle_id`) VALUES
(1, 'Иванов И.И.', '2014-05-15', 'ivanov@mail.ru', '9175465465', 'avatar.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `line`
--

CREATE TABLE IF NOT EXISTS `line` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `start_time_operation` time NOT NULL,
  `end_time_operation` time NOT NULL,
  `type` varchar(30) NOT NULL DEFAULT '',
  `map` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `line`
--

INSERT INTO `line` (`id`, `code`, `start_time_operation`, `end_time_operation`, `type`, `map`) VALUES
(1, 'Линия №47', '07:00:00', '20:00:00', 'Автобусы', 'map.png');

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

CREATE TABLE IF NOT EXISTS `station` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `position_station` varchar(15) NOT NULL DEFAULT '',
  `line_id` int(15) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `line_id` (`line_id`),
  KEY `line_id_2` (`line_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `station`
--

INSERT INTO `station` (`id`, `name`, `position_station`, `line_id`) VALUES
(1, 'Деревня универсиады', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `gender` char(2) NOT NULL,
  `birth_date` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `login` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `gender`, `birth_date`, `email`, `login`, `password`) VALUES
(1, 'Иванов И.И.', 'М', '1984-05-01', 'ivanov@mail.ru', 'admin', 'kazan');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE IF NOT EXISTS `vehicle` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `capacity` int(15) NOT NULL,
  `type` varchar(30) NOT NULL DEFAULT '',
  `line_id` int(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `line_id` (`line_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `name`, `capacity`, `type`, `line_id`) VALUES
(1, 'Форд спринтер', 17, 'Автобусы', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
