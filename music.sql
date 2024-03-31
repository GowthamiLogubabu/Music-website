-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2024 at 03:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `username`, `password`) VALUES
(1, 'Gowthamil', 'logesh7777');

-- --------------------------------------------------------

--
-- Table structure for table `sign`
--

CREATE TABLE `sign` (
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sign`
--

INSERT INTO `sign` (`name`, `email`, `password`, `id`) VALUES
('logesh', 'logesh@gmail.com', 'logesh5555', 1),
('Usha L', 'usha@gmail.com', 'ushababu', 2),
('logeshwaran', 'logesh55@gmail.com', 'gowthami7777', 3),
('mop', 'mop@gmail.com', 'mop', 4),
('gowth', 'gowth@gmail.com', 'gowth', 5),
('jeni', 'jeni@gmail.com', 'jeni', 6);

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `artist` varchar(100) DEFAULT NULL,
  `album` varchar(100) DEFAULT NULL,
  `genre` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `audio` varchar(255) DEFAULT NULL,
  `language` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`id`, `title`, `artist`, `album`, `genre`, `image`, `audio`, `language`) VALUES
(1, 'oru kal oru kannadi', 'yuvan shankar raja', 'sms', 'love', 'https://lyricsraag.com/wp-content/uploads/2024/01/Oru-Kal-Oru-Kannadi-lyrics-english.jpg', 'audio/song13.mp3', 'Tamil'),
(3, 'Anbil Avan', 'A.R.Rahman', 'vtv', 'love', 'https://i.ytimg.com/vi/5wtnf7V_-GM/maxresdefault.jpg', 'audio/song.mp3', 'Tamil'),
(4, 'Thendral Vandhu', 'Illayaraja', 'Avatharam', 'love', 'https://i.ytimg.com/vi/Ue5GbzWXZpY/maxresdefault.jpg', 'audio/song12.mp3', 'Tamil'),
(6, 'Kannana Kanne', 'Anirudh', 'Nanum Rowdy Thaan', 'love', 'https://i.pinimg.com/originals/5c/30/4d/5c304da171e40aee4351be6982475404.jpg', 'audio/song6.mp3', 'Tamil'),
(5, 'Unakaka Poranthenae', ' Justin Prabhakaran', 'Pannaiyarum Padminiyum', 'love', 'https://static.moviecrow.com/gallery/20140410/21211-1902720_602843016471140_2096228975_n.jpg', 'audio/song5.mp3', 'Tamil'),
(7, 'Midnight Rain', ' Taylor Swift', 'album', 'love', 'https://i.ytimg.com/vi/DqaLvegnrLU/maxresdefault.jpg', 'audio/song7.mp3', 'English'),
(8, 'Daylight', ' Taylor Swift', 'album', 'love', 'https://i.ytimg.com/vi/YKZsP9BP_5Y/maxresdefault.jpg', 'audio/song8.mp3', 'English'),
(9, 'Malarey', ' Rajesh', 'Premam', 'love', 'https://timesofindia.indiatimes.com/photo/65349274/size-157170/65349274.jpg', 'audio/song9.mp3', 'Malayalam'),
(10, 'Tere Vaaste', ' Sachin-Jigar', 'Zara Hatke Zara Bachke', 'love', 'https://tse2.mm.bing.net/th?id=OIP.bsbNiCqveuc_MZjsBgXy-AHaEK&pid=Api&P=0&h=180', 'audio/song10.mp3', 'hindi'),
(11, 'Oo Antava Oo Oo Antava', 'Devi Sri Prasad', 'Pushpa', 'love', 'https://i.ytimg.com/vi/95r_NBLonpY/maxresdefault.jpg', 'audio/song11.mp3', 'Telugu');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `blocked` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `blocked`) VALUES
(3, 'gowth', 'gowth@gmail.com', 'gowth', 0),
(4, 'jeni', 'jeni@gmail.com', 'jeni', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`),
  ADD KEY `password` (`password`);

--
-- Indexes for table `sign`
--
ALTER TABLE `sign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sign`
--
ALTER TABLE `sign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
