-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 27, 2024 at 03:55 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login_details`
--

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

DROP TABLE IF EXISTS `participant`;
CREATE TABLE IF NOT EXISTS `participant` (
  `Qr_code` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `participant_new`
--

DROP TABLE IF EXISTS `participant_new`;
CREATE TABLE IF NOT EXISTS `participant_new` (
  `participant_id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `Qr_code` varchar(255) NOT NULL,
  `session_register` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`participant_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `participant_new`
--

INSERT INTO `participant_new` (`participant_id`, `full_name`, `email`, `Qr_code`, `session_register`) VALUES
(27, 'dinusha', 'dinusha@gmail.com', '', 'on'),
(26, 'dinusha', 'dinusha@gmail.com', '', 'on'),
(25, 'dinusha', 'dinusha@gmail.com', '', 'on'),
(24, 'dinusha', 'dinusha@gmail.com', '', 'on'),
(22, 'amula', 'anula@gmail.com', '', 'opening remarks'),
(23, 'kusum', 'kusum@gmail.com', '', 'on'),
(21, 'chiranjali', 'akila@gmail.com', '', 'opening remarks'),
(10, 'dasuni', 'dasunu@gmail.com', '', 'AI and Machine Learning'),
(11, 'dasuni', 'dasunu@gmail.com', '', 'AI and Machine Learning'),
(12, 'dasuni', 'dasunu@gmail.com', '', 'AI and Machine Learning'),
(13, 'pasindu', 'pasindu@gmail.com', '', 'Cyber Security'),
(14, 'amali', 'amali@gmail.com', '', 'on'),
(15, 'amali', 'amali@gmail.com', '', 'on'),
(16, 'chiranjali', 'akila@gmail.com', '', 'opening remarks'),
(17, 'chiranjali', 'akila@gmail.com', '', 'opening remarks'),
(18, 'chiranjali', 'akila@gmail.com', '', 'opening remarks'),
(19, 'chiranjali', 'akila@gmail.com', '', 'opening remarks'),
(20, 'chiranjali', 'akila@gmail.com', '', 'opening remarks'),
(28, 'dinusha', 'dinusha@gmail.com', '', 'on'),
(29, 'chiranjali', 'akila@gmail.com', '', 'opening remarks');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `session_id` int NOT NULL,
  `track_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `speaker` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `venue` varchar(255) NOT NULL,
  `capacity` int NOT NULL,
  `registed_count` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`session_id`, `track_id`, `title`, `speaker`, `datetime`, `venue`, `capacity`, `registed_count`) VALUES
(1, 2, 'Artifical Inteligent', 'Dr. Samila Fernando', '2024-12-30 08:13:08', 'advantage of AI', 0, 0),
(2, 101, 'AI and machine learning', 'Dr. Samila Fernando', '2024-12-25 02:51:22', 'aftafxgshvxhxv', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `signup_details`
--

DROP TABLE IF EXISTS `signup_details`;
CREATE TABLE IF NOT EXISTS `signup_details` (
  `Praticipation_Id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(70) NOT NULL,
  `short_name` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(40) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'Participation',
  `session_registed` varchar(255) NOT NULL,
  `Qr_code` varchar(255) NOT NULL,
  PRIMARY KEY (`Praticipation_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `signup_details`
--

INSERT INTO `signup_details` (`Praticipation_Id`, `full_name`, `short_name`, `email`, `password`, `role`, `session_registed`, `Qr_code`) VALUES
(60, 'anusha', '', 'anusha1@gmail.com', '$2y$10$NIyj2fYrouBPfwXroBrAVeNSQPD2YyIdE', 'participant', 'session_101', ''),
(59, 'Dayani De Silva', '', 'mkdkdesilva@gmail.com', '$2y$10$szOp4DOpyDsVGhR8AbNsR.0tJ5Mb.ewNT', 'participant', 'session_101', ''),
(57, 'himasha', '', 'himasha1@gmail.com', '$2y$10$1opBvJPMsSjPGK8rG6QSt.mV87O4Sp227', 'participant', 'session_101', ''),
(58, 'kodithuwakku', '', 'kodithuwakku@gmail.com', '$2y$10$ALhfQonS/0Jgi0IEl7BKiO8kNJGLAGDVx', 'participant', 'session_101', ''),
(55, 'viruli', '', 'viruli@gmail.com', '$2y$10$NppyPG.SBrmv62/1JLwqZOcq4JlCK.L69', 'participant', 'session_101', ''),
(54, 'amula', '', 'amula@gmail.com', '$2y$10$HvGYzLe3FQRJsi6fd7.NGOdfj1eKHVUop', 'participant', 'session_101', '');

-- --------------------------------------------------------

--
-- Table structure for table `speakers`
--

DROP TABLE IF EXISTS `speakers`;
CREATE TABLE IF NOT EXISTS `speakers` (
  `speaker_Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `Topic` varchar(255) NOT NULL,
  `Time` datetime NOT NULL,
  `venue` varchar(255) NOT NULL,
  PRIMARY KEY (`speaker_Id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `track`
--

DROP TABLE IF EXISTS `track`;
CREATE TABLE IF NOT EXISTS `track` (
  `tract_Id` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `discription` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `track`
--

INSERT INTO `track` (`tract_Id`, `title`, `discription`) VALUES
('101', 'AI  and machine learning', 'important of AI and machine learning'),
('102', 'cyber security', 'important of cyber security');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
