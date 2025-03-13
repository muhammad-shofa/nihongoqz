-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 13, 2025 at 12:26 PM
-- Server version: 8.0.41-0ubuntu0.24.04.1
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nihongoqz`
--

-- --------------------------------------------------------

--
-- Table structure for table `hiragana`
--

CREATE TABLE `hiragana` (
  `hiragana_id` int NOT NULL,
  `hiragana_kana` varchar(50) NOT NULL,
  `dakuten` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hiragana`
--

INSERT INTO `hiragana` (`hiragana_id`, `hiragana_kana`, `dakuten`) VALUES
(1, 'あ', 'a'),
(2, 'い', 'i'),
(3, 'う', 'u'),
(4, 'え', 'e'),
(5, 'お', 'o'),
(6, 'か', 'ka'),
(7, 'き', 'ki'),
(8, 'く', 'ku'),
(9, 'け', 'ke'),
(10, 'こ', 'ko'),
(11, 'さ', 'sa'),
(12, 'し', 'shi'),
(13, 'す', 'su'),
(14, 'せ', 'se'),
(15, 'そ', 'so'),
(16, 'た', 'ta'),
(17, 'ち', 'chi'),
(18, 'つ', 'tsu'),
(19, 'て', 'te'),
(20, 'と', 'to');

-- --------------------------------------------------------

--
-- Table structure for table `katakana`
--

CREATE TABLE `katakana` (
  `katakana_id` int NOT NULL,
  `katakana_kana` varchar(50) NOT NULL,
  `dakuten` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `username` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `gender` enum('M','W') NOT NULL,
  `role` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `password`, `email`, `gender`, `role`) VALUES
(4, 'wyxli', 'wyxli', '$2y$10$YNy4wcTYyIQtgvBdealTkuHdsXSslGPjRT.YjeJo6Q4yGX5oh3Tzu', 'wyxli@gmail.com', 'M', 'user'),
(5, 'admin', 'admin', '$2y$10$JZgTVwO5Z0pS9r.3dlpAnuF6kVDAnCvSKWDBUuZjj0c5Az30FhHSG', 'admin@gmail.com', 'M', 'user'),
(12, 'yuzuriha', 'yuzuriha', '$2y$10$yl2tr89zqgyAKbgsfFAh3eiOepmUqJkwNMqqFLhnksE6hXZLKMs.y', 'yuzuriha@gmail.com', 'W', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hiragana`
--
ALTER TABLE `hiragana`
  ADD PRIMARY KEY (`hiragana_id`);

--
-- Indexes for table `katakana`
--
ALTER TABLE `katakana`
  ADD PRIMARY KEY (`katakana_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hiragana`
--
ALTER TABLE `hiragana`
  MODIFY `hiragana_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `katakana`
--
ALTER TABLE `katakana`
  MODIFY `katakana_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
