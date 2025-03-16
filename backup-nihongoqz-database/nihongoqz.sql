-- phpMyAdmin SQL Dump
-- version 5.2.1deb3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 16, 2025 at 12:46 PM
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
  `romaji` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hiragana`
--

INSERT INTO `hiragana` (`hiragana_id`, `hiragana_kana`, `romaji`) VALUES
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
(20, 'と', 'to'),
(21, 'な', 'na'),
(22, 'に', 'ni'),
(23, 'ぬ', 'nu'),
(24, 'ね', 'ne'),
(25, 'の', 'no'),
(26, 'は', 'ha'),
(27, 'ひ', 'hi'),
(28, 'ふ', 'fu'),
(29, 'へ', 'he'),
(30, 'ほ', 'ho'),
(31, 'ま', 'ma'),
(32, 'み', 'mi'),
(33, 'む', 'mu'),
(34, 'め', 'me'),
(35, 'も', 'mo'),
(36, 'や', 'ya'),
(37, 'ゆ', 'yu'),
(38, 'よ', 'yo'),
(39, 'ら', 'ra'),
(40, 'り', 'ri'),
(41, 'る', 'ru'),
(42, 'れ', 're'),
(43, 'ろ', 'ro'),
(44, 'わ', 'wa'),
(45, 'を', 'wo'),
(46, 'ん', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `katakana`
--

CREATE TABLE `katakana` (
  `katakana_id` int NOT NULL,
  `katakana_kana` varchar(50) NOT NULL,
  `romaji` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `katakana`
--

INSERT INTO `katakana` (`katakana_id`, `katakana_kana`, `romaji`) VALUES
(1, 'ア', 'a'),
(2, 'イ', 'i'),
(3, 'ウ', 'u'),
(4, 'エ', 'e'),
(5, 'オ', 'o'),
(6, 'カ', 'ka'),
(7, 'キ', 'ki'),
(8, 'ク', 'ku'),
(9, 'ケ', 'ke'),
(10, 'コ ', 'ko'),
(11, 'サ', 'sa'),
(12, 'シ', 'shi'),
(13, 'ス', 'su'),
(14, 'セ', 'se'),
(15, 'ソ', 'so'),
(16, 'タ', 'ta'),
(17, 'チ', 'chi'),
(18, 'ツ', 'tsu'),
(19, 'テ', 'te'),
(20, 'ト', 'to'),
(21, 'ナ', 'na'),
(22, 'ニ', 'ni'),
(23, 'ヌ', 'nu'),
(24, 'ネ', 'ne'),
(25, 'ノ', 'no'),
(26, 'ハ', 'ha'),
(27, 'ヒ', 'hi'),
(28, 'フ', 'fu'),
(29, 'ヘ', 'he'),
(30, 'ホ', 'ho'),
(31, 'マ', 'ma'),
(32, 'ミ', 'mi'),
(33, 'ム', 'mu'),
(34, 'メ', 'me'),
(35, 'モ', 'mo'),
(36, 'ヤ', 'ya'),
(37, 'ユ', 'yu'),
(38, 'ヨ', 'yo'),
(39, 'ラ', 'ra'),
(40, 'リ', 'ri'),
(41, 'ル', 'ru'),
(42, 'レ', 're'),
(43, 'ロ', 'ro'),
(44, 'ワ', 'wa'),
(45, 'ヲ', 'wo'),
(46, 'ン', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` int NOT NULL,
  `user_id` int NOT NULL,
  `char_type` enum('hiragana','katakana','kanji') NOT NULL,
  `kana_type` enum('main','dakuten','combination') DEFAULT NULL,
  `true_answer` varchar(250) NOT NULL,
  `false_answer` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `user_id`, `char_type`, `kana_type`, `true_answer`, `false_answer`) VALUES
(12, 5, 'hiragana', 'main', '[11,30,24,43,4,8,29,32,27,6,36,20,7,22,19,42,10,1,44,2,34,21,9,14,28,31,46,13,41,45,17,39,12,33,25,40,35,3,37,38,26,16,18,5,15]', '[23]'),
(14, 4, 'hiragana', 'main', '[46,43,16,35,22,24,3,31,25,44,13,17,18,8,28,14,29,40,42,19]', '[11,4,7,20,39,26,30,6,37,34,36,38,33,45,21,9,10,5,2,1,41,23,15,32,27,12]'),
(15, 5, 'hiragana', 'main', '[46,43,16,35,22,24,3,31,25,44,13,17,18,8,28,14,29,40,42,19]', '[11,4,7,20,39,26,30,6,37,34,36,38,33,45,21,9,10,5,2,1,41,23,15,32,27,12]'),
(17, 4, 'hiragana', 'main', '[4,31,34,28,9,30,20,29,38,1,27,42,41,6,37,36,24,7,40,46,43,25,32,13,22,15,33,14,5,2,12,21,11,16,44,35,26,39,10]', '[3,18,23,8,45,19,17]'),
(19, 12, 'hiragana', 'main', '[43,26,17,31,46,38,37,30,34,24,14,45,33,32,19,39,12,5,8,40,20,35,21,13,4,7,22,42,44,29,27,3,15,36,6,9,2,1,18,11,28,10,25,23,16,41]', '[]'),
(20, 4, 'hiragana', 'main', '[33,18,15,43,16,2,11,38,29,7,9,22,21,1,19,17,30,8,4,34,3,44]', '[35,13,23,39,37,20,10,27,45,41,36,31,5,28,32,46,6,12,24,26,42,25,14,40]');

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
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`);

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
  MODIFY `hiragana_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `katakana`
--
ALTER TABLE `katakana`
  MODIFY `katakana_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
