-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2015 at 12:28 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `veda`
----
-- Table structure for table `About`
--

CREATE TABLE IF NOT EXISTS `about` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `about` varchar(255) NOT NULL COMMENT 'event name',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='About of Event' AUTO_INCREMENT=64 ;

/* Written by Bhargavaprasad */

-- -------------------------------------------------------

--
-- Table structure for table `Event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `event_name` varchar(255) NOT NULL COMMENT 'event name',
  `event_overview` varchar(1050) NOT NULL COMMENT 'event overview',
  `event_rules` varchar(1050) NOT NULL COMMENT 'event rules',
   `event_dates` TIMESTAMP(6) NOT NULL COMMENT 'event dates',
  `event_selection` varchar(1050) NOT NULL COMMENT 'event selection',
   `event_fname` varchar(255) NOT NULL COMMENT 'event Faculty name',
    `event_fno` varchar(10) NOT NULL COMMENT 'event Faculty Mobile',
    `event_femail` varchar(255) NOT NULL COMMENT 'event Student Email',
    `event_sname` varchar(255) NOT NULL COMMENT 'event Student name',
    `event_sno` varchar(10) NOT NULL COMMENT 'event Student Mobile',
    `event_semail` varchar(255) NOT NULL COMMENT 'event Faculty Email',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='datatable demo table' AUTO_INCREMENT=64 ;

/* Written by Bhargavaprasad */

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `trn_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

/* Table for Co-ordinates */
--
-- Table structure for table `Co-ordinate`
--

CREATE TABLE IF NOT EXISTS `co` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
  `cname` varchar(255) NOT NULL COMMENT 'event Co-ordinate name',
    `cno` varchar(10) NOT NULL COMMENT 'event Co-ordinate Mobile',
    `cemail` varchar(255) NOT NULL COMMENT 'event Co-ordinate Email',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='About of Co-ordinate' AUTO_INCREMENT=64 ;

/* Written by Bhargavaprasad */



CREATE TABLE IF NOT EXISTS `ordinator` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'primary key',
   `fname` varchar(255) NOT NULL COMMENT 'event Co-ordinate name',
    `fno` varchar(10) NOT NULL COMMENT 'event Co-ordinate Mobile',
    `femail` varchar(255) NOT NULL COMMENT 'event Co-ordinate Email',
    `ftype` varchar(255) NOT NULL COMMENT 'event Co-ordinate Type',
    `submittedby` varchar(255) NOT NULL COMMENT 'username',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='datatable demo ordinator' AUTO_INCREMENT=64 ;


/* Written by Bhargavaprasad */
