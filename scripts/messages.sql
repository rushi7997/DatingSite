-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2020 at 06:48 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rushi_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `to_user` varchar(80) NOT NULL,
  `from_user` varchar(80) NOT NULL,
  `message` text NOT NULL,
  `seen` tinyint(1) NOT NULL,
  `sent_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `to_user`, `from_user`, `message`, `seen`, `sent_time`) VALUES
(2, 'emilymorgan@gmail.com', 'ethanwood@gmail.com', 'hello emily', 0, '2020-10-05 12:43:22'),
(3, 'emmaSmith@gmail.com', 'ethanwood@gmail.com', 'lol', 0, '2020-10-05 12:43:51'),
(4, 'ethanwood@gmail.com', 'ellawilson@gmail.com', 'hello ethan', 0, '2020-10-05 13:19:20'),
(6, 'ellawilson@gmail.com', 'ethanwood@gmail.com', 'hello ella', 0, '2020-10-05 13:28:26'),
(13, 'ethanwood@gmail.com', 'ellawilson@gmail.com', 'How are you?', 0, '2020-10-05 13:50:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
