-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2014 at 09:34 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `chronos`
--

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` int(11) NOT NULL,
  `presetID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `date`, `presetID`) VALUES
(1, 20140915, 1),
(2, 20140916, 2),
(3, 20140917, 2);

-- --------------------------------------------------------

--
-- Table structure for table `schedulepreset`
--

CREATE TABLE IF NOT EXISTS `schedulepreset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `schedulepreset`
--

INSERT INTO `schedulepreset` (`id`, `name`) VALUES
(1, 'A DAY'),
(2, 'B DAY');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

CREATE TABLE IF NOT EXISTS `schedule_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `presetID` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `start_time` varchar(50) NOT NULL,
  `end_time` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `presetID`, `order`, `start_time`, `end_time`, `name`) VALUES
(1, 1, 1, '07:50:00', '08:40:00', 'Period 1'),
(2, 1, 2, '08:40:00', '09:27:00', 'Period 2'),
(3, 1, 3, '09:27:00', '09:35:00', 'Homeroom'),
(4, 1, 4, '09:35:00', '10:22:00', 'Period 3'),
(5, 1, 5, '10:22:00', '11:09:00', 'Period 4'),
(6, 1, 6, '11:09:00', '11:56:00', 'Period 5'),
(7, 1, 7, '11:56:00', '12:43:00', 'Period 6'),
(8, 1, 8, '12:43:00', '13:30:00', 'Period 7'),
(9, 1, 9, '13:30:00', '14:27:00', 'Period 8'),
(10, 1, 10, '14:27:00', '15:04:00', 'Period 9'),
(11, 2, 1, '07:50:00', '08:40:00', 'Period 1'),
(12, 2, 2, '08:40:00', '09:28:00', 'Period 2'),
(13, 2, 3, '09:28:00', '10:16:00', 'Period 3'),
(14, 2, 4, '10:16:00', '11:04:00', 'Period 4'),
(15, 2, 5, '11:04:00', '11:52:00', 'Period 5'),
(16, 2, 6, '11:52:00', '12:40:00', 'Period 6'),
(17, 2, 7, '12:40:00', '13:28:00', 'Period 7'),
(18, 2, 8, '13:28:00', '14:16:00', 'Period 8'),
(19, 2, 8, '14:16:00', '15:04:00', 'Period 9');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
