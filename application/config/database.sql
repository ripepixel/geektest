-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 01, 2014 at 03:04 PM
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
  `salary_from` decimal(8,2) NOT NULL,
  `salary_to` decimal(8,2) NOT NULL,
  `salary_type_id` int(3) NOT NULL,
  `job_type_id` int(3) NOT NULL,
  `details` text NOT NULL,
  `expiry_date` int(30) NOT NULL,
  `report_email` varchar(255) NOT NULL,
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
-- Table structure for table `language_categories`
--

CREATE TABLE IF NOT EXISTS `language_categories` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '0',
  `coming_soon` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `language_categories`
--

INSERT INTO `language_categories` (`id`, `name`, `is_active`, `coming_soon`) VALUES
(1, 'PHP', 1, 0),
(2, 'MySQL', 1, 0),
(3, 'HTML', 1, 0),
(4, 'CSS', 1, 0),
(5, 'Javascript', 1, 0),
(6, 'jQuery', 1, 0);

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
-- Table structure for table `question_categories`
--

CREATE TABLE IF NOT EXISTS `question_categories` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `language_category_id` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `salary_from` decimal(8,2) NOT NULL,
  `salary_to` decimal(8,2) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `salary_types`
--

INSERT INTO `salary_types` (`id`, `name`, `is_active`) VALUES
(1, 'Annual', 1),
(2, 'Daily', 1),
(3, 'Hourly', 1);

-- --------------------------------------------------------

--
-- Table structure for table `skill_levels`
--

CREATE TABLE IF NOT EXISTS `skill_levels` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `skill_levels`
--

INSERT INTO `skill_levels` (`id`, `name`) VALUES
(1, 'Junior'),
(2, 'Mid'),
(3, 'Senior');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE IF NOT EXISTS `tests` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `questions_qty` int(4) NOT NULL,
  `time_limit` int(3) NOT NULL,
  `skill_level_id` int(3) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `name`, `group_name`, `questions_qty`, `time_limit`, `skill_level_id`, `is_active`) VALUES
(1, 'PHP', 'PHP', 20, 40, 2, 1),
(2, 'PHP & MySQL', 'PHP', 40, 80, 2, 1),
(3, 'HTML', 'HTML', 20, 40, 2, 1),
(4, 'HTML & CSS', 'HTML', 40, 80, 2, 1),
(5, 'HTML, CSS & Javascript', 'HTML', 60, 120, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `test_categories`
--

CREATE TABLE IF NOT EXISTS `test_categories` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `test_id` int(6) NOT NULL,
  `language_category_id` int(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `test_categories`
--

INSERT INTO `test_categories` (`id`, `test_id`, `language_category_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 2, 2),
(4, 3, 3),
(5, 4, 3),
(6, 4, 4),
(7, 5, 3),
(8, 5, 4),
(9, 5, 5);
