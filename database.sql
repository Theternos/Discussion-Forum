-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 18, 2022 at 05:07 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-summit`
--
CREATE DATABASE `e-summit`;
use `e-summit`;
-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sector` varchar(45) NOT NULL,
  `comment` mediumtext NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `likes` int(11) UNSIGNED DEFAULT '0',
  PRIMARY KEY (`id`)
);
--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `sector`, `comment`, `created_at`, `likes`) VALUES
(10, 'Pari', 'Auto_ancilliary', 'hello', '2022-09-01 11:41:42', 0),
(11, 'Pari', 'Auto_ancilliary', 'hello', '2022-09-01 11:41:42', 0),
(12, 'Pari', 'Auto_ancilliary', 'hello', '2022-09-01 11:41:42', 0),
(13, 'Pari', 'Auto_ancilliary', 'hello', '2022-09-01 11:41:42', 0),
(14, 'Pari', 'Auto_ancilliary', 'hi', '2022-09-01 11:41:42', 0),
(15, 'Pari', 'Auto_ancilliary', 'hi', '2022-09-01 11:41:42', 0),
(16, 'Pari', 'Auto_ancilliary', 'hi', '2022-09-01 11:41:42', 0),
(17, 'Pari', 'Auto_ancilliary', 'hi', '2022-09-01 11:41:42', 0),
(18, 'Pari', 'Auto_ancilliary', 'hi', '2022-09-01 11:41:42', 1),
(19, 'Pari', 'Auto_ancilliary', 'pari', '2022-09-01 11:41:42', 0),
(20, 'Pari', 'Auto_ancilliary', 'pari', '2022-09-01 11:41:42', 0),
(21, 'Pari', 'Auto_ancilliary', 'pari', '2022-09-01 11:41:42', 0),
(22, 'Pari', 'Auto_ancilliary', 'pari', '2022-09-01 11:41:42', 0),
(23, 'ternos', 'Auto_ancilliary', 'hey pari', '2022-09-01 11:41:42', 4),
(24, 'ternos', 'Textiles', 'I am Kavin', '2022-09-01 11:41:42', 1),
(25, 'ternos', 'Agriculture_based', 'Hi. I Have an idea for a startup in agri sector', '2022-09-01 11:41:42', 0),
(26, 'ternos', 'Financial_banking', 'how about you?', '2022-09-01 11:41:42', 0),
(27, 'monish', 'Auto_ancilliary', 'hii all', '2022-09-01 11:41:42', 84),
(28, 'ternos', 'Auto_ancilliary', 'hello', '2022-09-01 16:01:10', 351),
(29, 'ternos', 'Health_care', 'hello...', '2022-09-02 20:50:34', 1),
(30, 'ternos', 'Auto_ancilliary', 'hello', '2022-09-05 20:55:32', 0),
(31, 'ternos', 'Auto_ancilliary', 'dei', '2022-09-05 21:50:32', 2),
(32, 'ternos', 'Textiles', 'harry', '2022-09-05 21:52:52', 0),
(33, 'ternos', 'Textiles', 'harry', '2022-09-05 22:50:50', 2),
(34, 'ternos', 'Auto_ancilliary', 'holaaaa', '2022-09-05 23:11:57', 17),
(35, 'ternos', 'Auto_ancilliary', 'comos thas', '2022-09-05 23:19:45', 12),
(36, 'ternos', 'Auto_ancilliary', '44', '2022-09-07 17:15:52', 1),
(37, 'ternos', 'Auto_ancilliary', '55', '2022-09-08 09:50:00', 10),
(38, 'monish', 'Power', 'The U.S. Department of Educationâ€™s Individuals with Disabilities Education Act website brings together department and grantee IDEA information and resources.', '2022-09-09 10:43:26', 5);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
CREATE TABLE IF NOT EXISTS `likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ;
--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `parent_id`, `name`, `likes`) VALUES
(1, 38, 'monish', 1);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Fromuser` varchar(45) NOT NULL,
  `Touser` varchar(45) NOT NULL,
  `Message` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `Fromuser`, `Touser`, `Message`, `created_at`) VALUES
(1, 'ternos', 'monish', 'hey monish', '2022-09-10 09:13:10'),
(2, 'monish', 'ternos', 'sollu da\r\n', '2022-09-10 09:14:47'),
(3, 'ternos', 'monish', 'chumma tha da', '2022-09-10 10:07:37'),
(4, 'monish', 'ternos', 'ok ok da\r\n', '2022-09-10 10:07:47'),
(5, 'monish', 'ternos', 'eppo room varuva', '2022-09-10 10:07:53'),
(6, 'ternos', 'monish', 'night airum da', '2022-09-10 10:08:12'),
(7, 'ternos', 'monish', 'nee?', '2022-09-10 10:08:16'),
(8, 'monish', 'rithik', 'hi da venna', '2022-09-10 11:52:56'),
(9, 'rithik', 'monish', 'soldra naiyae', '2022-09-10 11:53:13'),
(10, 'monish', 'rithik', 'chumma thanda', '2022-09-10 11:53:44'),
(11, 'ternos', 'monish', 'dei', '2022-09-11 05:39:15'),
(12, 'ternos', 'monish', 'irukia', '2022-09-11 05:39:24'),
(13, 'ternos', 'monish', '?\r\n', '2022-09-11 05:39:30'),
(14, 'ternos', 'monish', 'soldra venna', '2022-09-11 05:39:41'),
(15, 'ternos', 'monish', 'kya bhai', '2022-09-11 05:39:49'),
(16, 'ternos', 'monish', 'dei', '2022-09-11 06:47:49'),
(17, 'ternos', 'monish', 'ok', '2022-09-11 06:48:14'),
(18, 'gd03champ', 'ternos', 'Dei venna\r\n', '2022-09-11 17:18:24'),
(19, 'ternos', 'gd03champ', 'solra', '2022-09-11 17:19:27'),
(20, 'monish', 'ternos', 'heyyy', '2022-09-12 03:41:49'),
(21, 'ternos', 'monish', 'enna da pandra\r\n', '2022-09-12 03:42:02'),
(22, 'ternos', 'monish', 'dei thambi', '2022-09-12 08:09:17'),
(23, 'monish', 'ternos', 'solluda', '2022-09-12 08:09:25'),
(24, 'ternos', 'sanju', 'dei mapla', '2022-09-16 13:15:32'),
(25, 'sanju', 'ternos', 'sollu da', '2022-09-16 13:15:41'),
(26, 'ternos', 'sanju', 'chumma tha mapla\r\n', '2022-09-16 13:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

DROP TABLE IF EXISTS `reply`;
CREATE TABLE IF NOT EXISTS `reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `sector` varchar(45) DEFAULT NULL,
  `comment` mediumtext NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ;
--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`id`, `parent_id`, `name`, `sector`, `comment`, `created_at`) VALUES
(1, '10', 'ternos', 'Textiles', 'doooooood', '2022-09-01 11:41:42'),
(2, '36', 'ternos', 'Auto_ancilliary', 'dhondhiiiii', '2022-09-05 23:27:32'),
(3, '35', 'ternos', 'Auto_ancilliary', 'holaaaa', '2022-09-05 23:38:45'),
(4, '35', 'ternos', 'Auto_ancilliary', 'holaaaa', '2022-09-05 23:39:28'),
(5, '35', 'ternos', 'Auto_ancilliary', 'holaaaa', '2022-09-05 23:39:58'),
(6, '35', 'ternos', 'Auto_ancilliary', 'holaaaa', '2022-09-05 23:41:03'),
(7, '35', 'ternos', 'Auto_ancilliary', 'holaaaa', '2022-09-05 23:41:31'),
(8, '35', 'ternos', 'Auto_ancilliary', 'holaaaa', '2022-09-05 23:41:40'),
(9, '35', 'ternos', 'Auto_ancilliary', 'how are you', '2022-09-06 09:44:54'),
(10, '31', 'ternos', 'Auto_ancilliary', 'heyy', '2022-09-06 15:15:41'),
(11, '31', 'ternos', 'Auto_ancilliary', 'heyy', '2022-09-06 15:17:31'),
(12, '27', 'ternos', 'Auto_ancilliary', 'heyyyyyyyyyy', '2022-09-06 15:17:46'),
(13, '27', 'ternos', 'Auto_ancilliary', 'heyyyyyyyyyy', '2022-09-06 15:17:50'),
(14, '27', 'ternos', 'Auto_ancilliary', 'heyyyyyyyyyy', '2022-09-06 15:18:19'),
(15, '31', 'ternos', 'Auto_ancilliary', 'sollu da', '2022-09-06 15:27:13'),
(16, '31', 'ternos', 'Auto_ancilliary', 'sollu da', '2022-09-06 15:27:17'),
(17, '35', 'ternos', 'Auto_ancilliary', 'deiiiiiiiiiiiiiiiiiiiiiiiiii', '2022-09-06 18:07:07'),
(18, '35', 'ternos', 'Auto_ancilliary', 'deiiiiiiiiiiiiiiiiiiiiiiiiii', '2022-09-06 18:07:11'),
(19, '35', 'ternos', 'Auto_ancilliary', 'monidh', '2022-09-06 23:21:38'),
(20, '35', 'ternos', 'Auto_ancilliary', 'hi monish', '2022-09-06 23:34:08'),
(21, '33', 'ternos', 'Textiles', 'hey harry', '2022-09-07 09:50:13'),
(22, '25', 'ternos', 'Agriculture_based', 'ok let us talk about this, dm me in private', '2022-09-07 09:51:43'),
(23, '38', 'ternos', 'Power', 'Ok DM me in private we will discuss about this, if needed let me help me out.', '2022-09-10 09:33:16'),
(24, '27', 'rithik', 'Auto_ancilliary', 'lol\r\n', '2022-09-11 22:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `user`) VALUES
(1, 'mba', '$2y$10$sMk9OPPr9xJa7xqHUW7asunmbFRlz8A0J/IFeto0Zby1LedsRJnei', '2022-08-26 13:55:33', NULL),
(2, 'ternos', '$2y$10$KQRDN1X6mKe50.L3L5u.NeSR/ox2JebmAYyOBESkUqjjhXC0EosuW', '2022-08-26 21:13:09', NULL),
(3, 'Pari', '$2y$10$o5M5pwcpgJKTzbVYu78nCuFe6FxYCPq8owELzKG4nX/dqaj.9tsLS', '2022-08-27 21:42:27', NULL),
(4, 'monish', '$2y$10$2YIKt5FbX2OkKI63kQueIewZjFtQ4IY5P8dhv4KzRCIvat1llL.Qq', '2022-09-01 09:02:00', NULL),
(5, 'gd03champ', '$2y$10$zf2pN1b452zKmnD8urnQLuwsKXNKdhHl1IDtGdTXYkHW7qqMXDQAS', '2022-09-02 19:09:20', NULL),
(6, 'rithik', '$2y$10$O.S0NbVR8QcnnLU6qrqrmujqFcIl0hPFdyrNqAaH4.Zi9ofFbueIy', '2022-09-10 17:22:15', NULL),
(7, 'sanju', '$2y$10$aqWlafKN2N8eimDx6DDmee3mzLUJNghGCKtWM/mAK4AmTGd7XgR9a', '2022-09-16 18:43:38', NULL),
(8, 'sfdghjkl', '$2y$10$ceONkRBomJ8W.GTknBVEfOQBIW3mbCJ/Rs3TjFacT3LH43VgYnZla', '2022-09-18 10:34:01', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
