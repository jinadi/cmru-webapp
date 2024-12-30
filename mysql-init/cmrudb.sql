-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 30, 2024 at 01:21 AM
-- Server version: 11.2.2-MariaDB
-- PHP Version: 8.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmrudb`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

DROP TABLE IF EXISTS `assignments`;
CREATE TABLE IF NOT EXISTS `assignments` (
  `assignid` bigint(255) NOT NULL AUTO_INCREMENT,
  `assignitemno` bigint(255) NOT NULL,
  `assignempno` bigint(255) NOT NULL,
  `assignconfig` varchar(1000) NOT NULL,
  `assignuser` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`assignid`),
  KEY `assignments_assignitemno_foreign` (`assignitemno`),
  KEY `assignments_assignempno_foreign` (`assignempno`),
  KEY `assignments_assignuser_foreign` (`assignuser`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assignid`, `assignitemno`, `assignempno`, `assignconfig`, `assignuser`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 10008, 'AA', 'admin', '2024-12-29 09:56:02', '2024-12-29 09:59:47', '2024-12-29 09:59:47'),
(2, 1, 10008, 'BB', 'admin', '2024-12-29 09:59:19', '2024-12-29 10:32:14', '2024-12-29 10:32:14'),
(3, 2, 10008, 'CC', 'admin', '2024-12-29 10:00:00', '2024-12-29 10:00:00', NULL),
(4, 1, 10008, 'TT', 'admin', '2024-12-29 10:32:39', '2024-12-29 12:35:54', '2024-12-29 12:35:54'),
(5, 1, 10008, 'A', 'admin', '2024-12-29 13:54:14', '2024-12-29 13:54:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

DROP TABLE IF EXISTS `items`;
CREATE TABLE IF NOT EXISTS `items` (
  `itemno` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT,
  `iteminventoryno` varchar(100) NOT NULL,
  `itemname` varchar(200) NOT NULL,
  `itemtype` int(11) NOT NULL,
  `itembrand` varchar(200) NOT NULL,
  `itemmodel` varchar(100) NOT NULL,
  `itempurchased` date NOT NULL,
  `itemwarranty` int(11) NOT NULL,
  `itemremarks` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`itemno`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`itemno`, `iteminventoryno`, `itemname`, `itemtype`, `itembrand`, `itemmodel`, `itempurchased`, `itemwarranty`, `itemremarks`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'INT100001', 'HP Desktop Computer', 1, 'HP', 'Prodesk 4000', '2024-12-23', 3, 'Intel Core5', '2024-12-29 08:01:19', '2024-12-29 10:12:05', NULL),
(2, 'INT100002', 'Asus expert', 2, 'Asus', 'Expert Book', '2024-12-01', 1, 'Core 5', '2024-12-29 08:34:56', '2024-12-29 10:12:54', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(25, '2024-12-29-033548', 'App\\Database\\Migrations\\Officer', 'default', 'App', 1735479020, 1),
(26, '2024-12-29-034728', 'App\\Database\\Migrations\\Items', 'default', 'App', 1735479020, 1),
(27, '2024-12-29-034747', 'App\\Database\\Migrations\\Assignments', 'default', 'App', 1735479020, 1),
(28, '2024-12-29-041316', 'App\\Database\\Migrations\\Users', 'default', 'App', 1735479020, 1);

-- --------------------------------------------------------

--
-- Table structure for table `officer`
--

DROP TABLE IF EXISTS `officer`;
CREATE TABLE IF NOT EXISTS `officer` (
  `empno` bigint(255) UNSIGNED NOT NULL AUTO_INCREMENT,
  `empName` varchar(50) NOT NULL,
  `workingLocation` int(11) NOT NULL,
  `designation` int(11) NOT NULL,
  `contactNo` varchar(10) NOT NULL,
  `email` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`empno`)
) ENGINE=MyISAM AUTO_INCREMENT=10009 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `officer`
--

INSERT INTO `officer` (`empno`, `empName`, `workingLocation`, `designation`, `contactNo`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10008, 'Jinadi K Dahanayaka', 4, 5, '0716496139', 'jinadikd@gmail.com', '2024-12-29 08:00:59', '2024-12-29 10:16:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `created_at`, `updated_at`, `deleted_at`) VALUES
('admin', '202cb962ac59075b964b07152d234b70', '2024-12-28 20:00:20', '2024-12-28 20:00:20', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
