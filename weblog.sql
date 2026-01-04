-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 04, 2026 at 03:02 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `weblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `body` text CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `status` enum('draft','published','archived','') CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL DEFAULT 'draft',
  `image` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `body`, `status`, `image`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(4, 'بالشتک باحال', 'لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان وب و گرافیک است…', 'published', 'blog-post7.jpg', 2, 13, '2026-01-04 18:04:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `created_at`, `updated_at`) VALUES
(5, 'مشاوره', '2026-01-04 17:53:59', '0000-00-00 00:00:00'),
(10, 'ورزشی', '2026-01-04 17:54:10', '0000-00-00 00:00:00'),
(11, 'تغذیه', '2026-01-04 17:54:19', '0000-00-00 00:00:00'),
(12, 'پزشکی', '2026-01-04 17:54:33', '0000-00-00 00:00:00'),
(13, 'علمی', '2026-01-04 17:55:30', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(125) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci DEFAULT NULL,
  `email` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `password` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_persian_ci NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_persian_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `created_at`, `updated_at`) VALUES
(2, 'عطیه', 'atieh@gmail.com', '$2y$10$GbKgM5SglL58RDN3C7zva.XVfRFJeODuBUPE5RDBnMaXd9YdrtYXG', 'logo.png', '2025-12-27 12:39:20', NULL),
(3, 'ahmad', 'ahmadi@gmail.com', '$2y$10$gxth05mPDcnYNzXKnhd6WuBtUiO6fno3G.XkI7k3ZLDmmsAciUQLG', 'no-pic.jpg', '2025-12-09 12:09:21', NULL),
(4, 'sama', 'sama@gmail.com', '$2y$10$pa8uj.mHA8HWu.59bqNRVul/b49F1.XW2sl0zrRX7aB2jLsmUQktm', 'no-pic.jpg', '2025-12-17 11:42:13', NULL),
(5, 'hassan', 'hassan@gmail.com', '$2y$10$vBUn5TgLwpVmIdFetnaE2OPdWx8VlwFtxl9ZUSZO5ieaTAIqSkoI.', 'no-pic.jpg', '2025-12-17 12:01:46', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
