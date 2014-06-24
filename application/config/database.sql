-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 24, 2014 at 03:27 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `geektest`
--
CREATE DATABASE IF NOT EXISTS `geektest` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `geektest`;

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE IF NOT EXISTS `candidates` (
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

CREATE TABLE IF NOT EXISTS `jobs` (
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

CREATE TABLE IF NOT EXISTS `job_types` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `job_types`
--

INSERT INTO `job_types` (`id`, `name`, `is_active`) VALUES
(1, 'Permanent', 1),
(2, 'Contract', 1);

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE IF NOT EXISTS `plans` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `payment_period` varchar(20) NOT NULL,
  `credits` int(5) NOT NULL,
  `job_days` int(3) NOT NULL,
  `free_period` int(3) NOT NULL,
  `can_access_cv` int(1) NOT NULL DEFAULT '0',
  `is_featured` int(1) NOT NULL DEFAULT '0',
  `is_active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `plans`
--

INSERT INTO `plans` (`id`, `name`, `price`, `payment_period`, `credits`, `job_days`, `free_period`, `can_access_cv`, `is_featured`, `is_active`) VALUES
(1, 'Single', '39.00', 'once', 1, 30, 0, 0, 0, 1),
(2, 'Company', '159.00', 'once', 5, 30, 0, 0, 1, 1),
(3, 'Agency', '99.00', 'monthly', 99999, 60, 14, 0, 0, 1),
(4, 'Agency Plus', '149.00', 'monthly', 99999, 60, 14, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `plan_purchases`
--

CREATE TABLE IF NOT EXISTS `plan_purchases` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `recruiter_id` int(6) NOT NULL,
  `plan_id` int(3) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `payment_date` int(30) NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `plan_purchases`
--

INSERT INTO `plan_purchases` (`id`, `recruiter_id`, `plan_id`, `price`, `payment_date`, `payment_type`) VALUES
(3, 3, 4, '149.00', 1403621020, 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `recruiters`
--

CREATE TABLE IF NOT EXISTS `recruiters` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `plan_id` int(3) DEFAULT NULL,
  `credits` int(5) DEFAULT NULL,
  `confirm_code` varchar(255) DEFAULT NULL,
  `is_confirmed` int(1) DEFAULT NULL,
  `created_at` int(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `recruiters`
--

INSERT INTO `recruiters` (`id`, `email`, `password`, `plan_id`, `credits`, `confirm_code`, `is_confirmed`, `created_at`) VALUES
(3, 'test@test.com', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, 99999, 'a6ad00ac113a19d953efb91820d8788e2263b28a', 0, 1403546930);

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE IF NOT EXISTS `salaries` (
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

CREATE TABLE IF NOT EXISTS `salary_types` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
