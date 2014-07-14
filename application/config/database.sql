-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jul 14, 2014 at 10:59 PM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `salary_from` decimal(8,2) NOT NULL,
  `salary_to` decimal(8,2) NOT NULL,
  `salary_type_id` int(3) NOT NULL,
  `job_type_id` int(3) NOT NULL,
  `details` text NOT NULL,
  `expiry_date` date NOT NULL,
  `report_email` varchar(255) NOT NULL,
  `is_featured` int(1) NOT NULL DEFAULT '0',
  `is_active` int(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `recruiter_id`, `test_id`, `title`, `location`, `salary_from`, `salary_to`, `salary_type_id`, `job_type_id`, `details`, `expiry_date`, `report_email`, `is_featured`, `is_active`, `created_at`) VALUES
(5, 3, 2, 'Web Designer / Developer', 'Manchester', 20000.00, 30000.00, 1, 1, 'Brand new and exclusive role now available for a talented web designer based in Manchester. My client is based just west of Manchester in an easy to get to location. They are a specialist design agency with an interesting portfolio of clients. Whilst they are only a small company, they are well known, popular and a very friendly bunch.\r\nWe are open to designers at all levels, whether you are a recent graduate or if you have a good few years'' experience, salary will reflect this accordingly and is flexible dependant on experience. We are looking for someone that has recently studied or has experience in the following:\r\nHTML/HTML5\r\nCSS/CSS2/CSS3\r\nJQuery/JavaScript\r\nPhotoshop/Dreamweaver\r\nIf you have any .Net or PHP experience this will be an added bonus.\r\nIf you have the above skills and want to get stuck in to interesting design projects and interact with a range of clients please submit your CV. We are looking at graduate level upwards so keen to speak to anyone with the above skills from junior to mid/senior level. Salary is paying up to £30,000 dependant on experience. ', '2014-09-01', 'test@test.com', 0, 1, '2014-07-03 12:14:32'),
(6, 3, 1, 'PHP Developer', 'Manchester', 20000.00, 25000.00, 1, 1, 'An exciting opportunity has arisen for a PHP Developer based in South Manchester to join one of the most exciting and innovative software houses.\r\n\r\nThis company is developing unique, leading-edge mobile applications that are being deployed world-wide. It has seen extraordinary growth over the last eighteen months, and now requires a visionary web developer to turn creative concepts into reality.\r\n\r\nAs a PHP Developer your duties will include:\r\n\r\n• Communicating with design agency to collate graphical components to be included within sections of the website and portal.\r\n• Implementing new PHP security technologies on both platforms to ensure efficient security.\r\n• Performing monitored and controlled penetration testing on both platforms to report on performance.\r\n• Implementing new pages onto platforms as and when required.\r\n• Reporting to line manager on analytics and usage reports to provide feedback on how end user interaction can be improved.\r\n• Documenting and annotating off-line versions of both platforms to comply with due diligence.\r\n\r\nAn ideal PHP Developer will hold the following skills and experiences:\r\n\r\n• Experience of HTML and MySQL .\r\n• Provide evidence of previous projects / works completed single-handedly.\r\n• It is desirable that candidates have an understanding of basic server connectivity for management (Webmin or SSH etc) and FTP access.\r\n\r\nIn return you will receive a salary of £20,000 - £25,000 per annum plus many benefits.\r\n\r\nThis is an unrivalled opportunity to shape and influence the emergence of a world-class product in an agile, energetic environment. Learning on the job, fast career progression is guaranteed.\r\n\r\n\r\nThe first stage of the application process is to apply online.\r\n\r\nCandidate Source Ltd is an Advertising Agency working on behalf of an Employment Agency. By applying for this position you are giving us permission to pass your CV and covering letter to a third party in relation to this specific vacancy. A full copy of our privacy policy can be viewed on our website.', '2014-07-30', 'test@test.com', 0, 1, '2014-07-03 10:40:06'),
(7, 3, 5, 'Web Designer / Developer', 'Manchester', 20000.00, 30000.00, 1, 1, 'Web Designer/Developer – West Manchester – HTML, CSS, Photoshop, Dreamweaver, JQuery<br />\r\nBrand new and exclusive role now available for a talented web designer based in Manchester. My client is based just west of Manchester in an easy to get to location. They are a specialist design agency with an interesting portfolio of clients. Whilst they are only a small company, they are well known, popular and a very friendly bunch.<br />\r\nWe are open to designers at all levels, whether you are a recent graduate or if you have a good few years’ experience, salary will reflect this accordingly and is flexible dependant on experience. We are looking for someone that has recently studied or has experience in the following:<br />\r\nHTML/HTML5<br />\r\nCSS/CSS2/CSS3<br />\r\nJQuery/JavaScript<br />\r\nPhotoshop/Dreamweaver<br />\r\nIf you have any .Net or PHP experience this will be an added bonus.<br />\r\nIf you have the above skills and want to get stuck in to interesting design projects and interact with a range of clients please submit your CV. We are looking at graduate level upwards so keen to speak to anyone with the above skills from junior to mid/senior level. Salary is paying up to £30,000 dependant on experience.', '2014-07-30', 'test@test.com', 0, 1, '2014-07-03 14:38:20');

-- --------------------------------------------------------

--
-- Table structure for table `job_types`
--

CREATE TABLE `job_types` (
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

CREATE TABLE `language_categories` (
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

CREATE TABLE `plans` (
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
(1, 'Single', 39.00, 'once', 1, 30, 0, 0, 0, 1),
(2, 'Company', 159.00, 'once', 5, 30, 0, 0, 1, 1),
(3, 'Agency', 99.00, 'monthly', 99999, 60, 14, 0, 0, 1),
(4, 'Agency Plus', 149.00, 'monthly', 99999, 60, 14, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `plan_purchases`
--

CREATE TABLE `plan_purchases` (
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
(3, 3, 4, 149.00, 1403621020, 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `candidate_id` int(6) NOT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `address` text,
  `telephone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `bio` text,
  `skills` text,
  `qualifications` text,
  `work_history` text,
  `more_info` text,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `candidate_id`, `full_name`, `address`, `telephone`, `email`, `dob`, `gender`, `bio`, `skills`, `qualifications`, `work_history`, `more_info`, `created_at`, `updated_at`) VALUES
(4, 1, 'Neal Howarth', '142 Market Street<br />\nTottington<br />\nBury<br />\nBL8 3LS', '01204 123456', '', '0000-00-00', 'Male', 'Stuff about me', 'My list of skills<p><ul><li>First Skill<br></li><li>Second skill<br></li></ul></p>', 'Loads of qualifications<p><br></p><p>School</p><p>College</p>', 'Worked everywhere', 'like to <b>do stuff</b>', '2014-07-14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question_categories`
--

CREATE TABLE `question_categories` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `language_category_id` int(4) NOT NULL,
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

CREATE TABLE `salaries` (
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

CREATE TABLE `salary_types` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `per_name` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `salary_types`
--

INSERT INTO `salary_types` (`id`, `name`, `per_name`, `is_active`) VALUES
(1, 'Annually', 'per Year', 1),
(2, 'Daily', 'per Day', 1),
(3, 'Hourly', 'per Hour', 1);

-- --------------------------------------------------------

--
-- Table structure for table `skill_levels`
--

CREATE TABLE `skill_levels` (
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

CREATE TABLE `tests` (
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

CREATE TABLE `test_categories` (
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
