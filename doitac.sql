-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 23, 2017 at 08:03 AM
-- Server version: 5.6.29
-- PHP Version: 5.5.38

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lehuyauto_mydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `doitac`
--

CREATE TABLE IF NOT EXISTS `doitac` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `image` varchar(500) CHARACTER SET utf8 NOT NULL,
  `link` varchar(500) CHARACTER SET utf8 NOT NULL,
  `orders` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `created_date` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `doitac`
--

INSERT INTO `doitac` (`id`, `name`, `image`, `link`, `orders`, `state`, `created_date`, `created_by`) VALUES
(1, 'rj', 'suprema.jpg', '<div style=', 0, 1, 1503391957, 1),
(3, 'bs', 'baisheng.jpg', '<div style=', 0, 1, 1508297444, 1),
(4, 'kjtech', 'kjtech.jpg', '<div style=', 0, 1, 1508297578, 1),
(5, 'Cerator', 'hk.jpg', '<div style=', 0, 1, 1508297261, 1),
(6, 'shining', 'shining.jpg', '', 0, 1, 1503391979, 1),
(7, 'rj', 'Logo-Ronald-Jack.jpg', '<div style=', 0, 1, 1503392333, 1),
(8, 'soyal', 'soyal.png', '<div style=', 0, 1, 1508297653, 1),
(9, 'sony', 'sony.jpg', '', 0, 1, 1503392417, 1),
(10, 'granding', 'granding-logo.png', '', 0, 1, 1508376779, 1),
(11, 'virdi', 'vidri.png', '', 0, 1, 1508376803, 1),
(12, 'zkteco', 'zkteco.png', '', 0, 1, 1508376849, 1),
(13, 'panasonic', 'panasonic.jpg', '', 0, 1, 1508376895, 1),
(14, 'nitgen', 'nitgen.png', '', 0, 1, 1508377010, 1),
(15, 'SECURITY KING', 'logo.gif', '', 0, 1, 1512376092, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
