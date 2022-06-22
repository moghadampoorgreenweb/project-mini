-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2022 at 06:31 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pro`
--

-- --------------------------------------------------------

--
-- Table structure for table `todoes`
--

CREATE TABLE `todoes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `job_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `todoes`
--

INSERT INTO `todoes` (`id`, `user_id`, `title`, `description`, `status`, `job_date`, `created_at`, `updated_at`, `deleted_at`) VALUES
(38, 20, 'kjkjk', 'jkjkjkjkj', 3, '2022-02-10 13:02:00', '2022-02-08 15:42:52', NULL, '2022-02-09 10:54:56'),
(39, 20, 'kjkjk', 'jkjkjkjkj', 3, '2022-02-10 13:02:00', '2022-02-08 15:43:02', NULL, '2022-02-09 10:55:23'),
(40, 20, 'aaaaaaaaaa', 'gggggggggggggggg', 3, '2022-02-17 12:02:00', '2022-02-08 15:46:59', '2022-02-09 10:41:48', NULL),
(41, 20, 'oooooooooooooo', 'ppppppppppppppppppp', 1, '2000-02-13 17:00:00', '2022-02-08 15:48:15', '2022-02-10 08:46:06', '2022-02-10 08:46:58'),
(42, 20, 'fdfg', 'sdfsfd', 3, '0333-03-04 03:03:00', '2022-02-08 15:59:34', NULL, NULL),
(43, 20, 'dsfsdfsdf', 'gfhfghfghfghgfhfgh', 2, '2004-03-03 15:05:00', '2022-02-09 07:59:31', NULL, '2022-02-09 11:14:41'),
(44, 20, 'kjkjk', 'jkjkjkjkj', 3, '2022-02-10 13:02:00', '2022-02-09 10:53:57', NULL, '2022-02-09 11:14:38'),
(45, 20, 'aaaaaaaaaa', 'gggggggggggggggg', 3, '2022-02-17 12:02:00', '2022-02-09 11:14:05', NULL, '2022-02-09 11:14:36'),
(46, 20, 'سسسسسس', 'hjkjh', 3, '2022-02-16 15:04:00', '2022-02-09 12:19:48', '2022-02-10 08:30:22', NULL),
(47, 20, 'fdhfhdfh', 'hjkjh', 2, '2022-02-16 15:04:00', '2022-02-09 12:20:58', NULL, '2022-02-09 13:20:08'),
(48, 20, 'fdhfhdfh', 'hjkjh', 2, '2022-02-16 15:04:00', '2022-02-09 12:25:05', NULL, '2022-02-09 13:19:48'),
(49, 20, 'amirre', 'fdgggggggg', 4, '5444-04-05 04:05:00', '2022-02-09 13:22:12', NULL, NULL),
(50, 20, 'fdhfhdfh', 'hjkjh', 3, '2022-02-16 15:04:00', '2022-02-09 13:25:52', NULL, NULL),
(51, 20, 'ghghjjjjjjjjjjjjjjjjjjjjj', 'tgfffffffffffffffff', 1, '2003-02-12 05:56:00', '2022-02-10 08:05:04', '2022-02-10 08:05:25', '2022-02-10 08:05:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(60) COLLATE utf8_persian_ci NOT NULL,
  `lastName` varchar(60) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(70) COLLATE utf8_persian_ci NOT NULL,
  `phoneNumber` char(15) COLLATE utf8_persian_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `phoneNumber`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(20, 'amir', 'reza', 'a@gmail.com', '202cb962ac59075b964b07152d234b70', '123', 2, '2022-02-08 11:54:52', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todoes`
--
ALTER TABLE `todoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todoes`
--
ALTER TABLE `todoes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `todoes`
--
ALTER TABLE `todoes`
  ADD CONSTRAINT `FK_user_id45` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
