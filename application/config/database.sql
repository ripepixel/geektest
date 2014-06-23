-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 23, 2014 at 09:08 PM
-- Server version: 5.5.25
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `geektest`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_code` varchar(255) DEFAULT NULL,
  `is_confirmed` int(1) DEFAULT NULL,
  `created_at` int(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `email`, `password`, `confirm_code`, `is_confirmed`, `created_at`) VALUES
(1, 'test@test.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'a6ad00ac113a19d953efb91820d8788e2263b28a', 0, 1403527375);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `recruiter_id` int(6) NOT NULL,
  `test_id` int(6) NOT NULL,
  `title` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `salary_id` int(3) NOT NULL,
  `salary_type_id` int(3) NOT NULL,
  `job_type_id` int(3) NOT NULL,
  `details` text NOT NULL,
  `expiry_date` int(30) NOT NULL,
  `is_featured` int(1) NOT NULL DEFAULT '0',
  `is_active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `recruiters`
--

CREATE TABLE `recruiters` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `confirm_code` varchar(255) DEFAULT NULL,
  `is_confirmed` int(1) DEFAULT NULL,
  `created_at` int(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `recruiters`
--

INSERT INTO `recruiters` (`id`, `email`, `password`, `confirm_code`, `is_confirmed`, `created_at`) VALUES
(3, 'test@test.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'a6ad00ac113a19d953efb91820d8788e2263b28a', 0, 1403546930);

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `from` decimal(8,2) NOT NULL,
  `to` decimal(8,2) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `salary_types`
--

CREATE TABLE `salary_types` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
