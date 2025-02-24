-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 23, 2025 at 02:08 PM
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
(10, 'こ', 'ko');

-- --------------------------------------------------------

--
-- Table structure for table `katakana`
--

CREATE TABLE `katakana` (
  `katakana_id` int NOT NULL,
  `katakana_kana` varchar(50) NOT NULL,
  `dakuten` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hiragana`
--
ALTER TABLE `hiragana`
  MODIFY `hiragana_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `katakana`
--
ALTER TABLE `katakana`
  MODIFY `katakana_id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
