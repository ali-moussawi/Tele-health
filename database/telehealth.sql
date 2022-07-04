-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 06, 2022 at 09:01 PM
-- Server version: 8.0.27
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telehealth`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `admin_id` int NOT NULL,
  `days_of_work` json NOT NULL,
  `start_date` date NOT NULL,
  PRIMARY KEY (`admin_id`),
  KEY `admin_id` (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `p_user_id` int NOT NULL,
  `d_user_id` int NOT NULL,
  `app_date` date NOT NULL,
  `app_time` time NOT NULL,
  `end_time` time NOT NULL,
  `app_link` varchar(128) NOT NULL,
  PRIMARY KEY (`p_user_id`,`d_user_id`,`app_date`),
  KEY `p_user_id` (`p_user_id`),
  KEY `d_user_id` (`d_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointment_requests`
--

DROP TABLE IF EXISTS `appointment_requests`;
CREATE TABLE IF NOT EXISTS `appointment_requests` (
  `d_user_id` int NOT NULL,
  `p_user_id` int NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`d_user_id`,`p_user_id`),
  KEY `d_user_id` (`d_user_id`),
  KEY `p_user_id` (`p_user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daysofwork`
--

DROP TABLE IF EXISTS `daysofwork`;
CREATE TABLE IF NOT EXISTS `daysofwork` (
  `user_id` int NOT NULL,
  `day_of_week` varchar(64) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  PRIMARY KEY (`user_id`,`day_of_week`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

DROP TABLE IF EXISTS `diseases`;
CREATE TABLE IF NOT EXISTS `diseases` (
  `disease_name` varchar(128) NOT NULL,
  PRIMARY KEY (`disease_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`disease_name`) VALUES
('Cancer'),
('Cardiomyopathy'),
('Chronic kidney disease'),
('Chronic liver disease'),
('Chronic obstructive pulmonary disease'),
('Congenital heart disease'),
('Coronary artery disease'),
('Cystic fibrosis'),
('Dementia'),
('Heart failure'),
('HIV/AIDS'),
('Lung cancer'),
('Moderate to severe asthma'),
('Pulmonary embolism'),
('Pulmonary fibrosis'),
('Pulmonary hypertension'),
('Sickle cell anemia'),
('Stroke'),
('Thalassemia'),
('Type 1 diabetes'),
('Type 2 diabetes');

-- --------------------------------------------------------

--
-- Stand-in structure for view `display_doctors`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `display_doctors`;
CREATE TABLE IF NOT EXISTS `display_doctors` (
`email` varchar(64)
,`fname` varchar(64)
,`gender` varchar(8)
,`id` int
,`lname` varchar(64)
,`mname` varchar(64)
,`password` varchar(64)
,`speciality` varchar(64)
,`type` varchar(64)
,`user_id` int
);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `user_id` int NOT NULL,
  `speciality` varchar(64) NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `health_condition`
--

DROP TABLE IF EXISTS `health_condition`;
CREATE TABLE IF NOT EXISTS `health_condition` (
  `p_user_id` int NOT NULL,
  `disease` varchar(128) NOT NULL,
  PRIMARY KEY (`p_user_id`,`disease`),
  KEY `p_user_id` (`p_user_id`),
  KEY `disease` (`disease`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

DROP TABLE IF EXISTS `mail`;
CREATE TABLE IF NOT EXISTS `mail` (
  `mail_id` int NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `replied` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int NOT NULL,
  PRIMARY KEY (`mail_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `user_id` int NOT NULL,
  `birthdate` date NOT NULL,
  PRIMARY KEY (`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `email` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `fname` varchar(64) NOT NULL,
  `mname` varchar(64) NOT NULL,
  `lname` varchar(64) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `type` varchar(64) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `telehealth_user_email_index` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure for view `display_doctors`
--
DROP TABLE IF EXISTS `display_doctors`;

DROP VIEW IF EXISTS `display_doctors`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `display_doctors`  AS SELECT `d`.`user_id` AS `user_id`, `d`.`speciality` AS `speciality`, `u`.`id` AS `id`, `u`.`email` AS `email`, `u`.`password` AS `password`, `u`.`fname` AS `fname`, `u`.`mname` AS `mname`, `u`.`lname` AS `lname`, `u`.`gender` AS `gender`, `u`.`type` AS `type` FROM (`doctors` `d` join `users` `u`) WHERE (`d`.`user_id` = `u`.`id`) ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admins`
--
ALTER TABLE `admins`
  ADD CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT;

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`p_user_id`) REFERENCES `patients` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`d_user_id`) REFERENCES `doctors` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `appointment_requests`
--
ALTER TABLE `appointment_requests`
  ADD CONSTRAINT `appointment_requests_ibfk_1` FOREIGN KEY (`d_user_id`) REFERENCES `doctors` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_requests_ibfk_2` FOREIGN KEY (`p_user_id`) REFERENCES `patients` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `daysofwork`
--
ALTER TABLE `daysofwork`
  ADD CONSTRAINT `daysofwork_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `doctors` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `health_condition`
--
ALTER TABLE `health_condition`
  ADD CONSTRAINT `health_condition_ibfk_1` FOREIGN KEY (`p_user_id`) REFERENCES `patients` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `health_condition_ibfk_2` FOREIGN KEY (`disease`) REFERENCES `diseases` (`disease_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mail`
--
ALTER TABLE `mail`
  ADD CONSTRAINT `mail_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
