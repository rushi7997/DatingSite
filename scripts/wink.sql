-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2020 at 06:49 PM
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
-- Table structure for table `wink`
--

CREATE TABLE `wink` (
  `id` int(11) NOT NULL,
  `to_user` varchar(80) NOT NULL,
  `from_user` varchar(80) NOT NULL,
  `seen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wink`
--

INSERT INTO `wink` (`id`, `to_user`, `from_user`, `seen`) VALUES
(1, 'ethanwood@gmail.com', 'ellawilson@gmail.com', 1),
(2, 'liamsmith@gmail.com', 'ellawilson@gmail.com', 0),
(3, 'liamsmith@gmail.com', 'ellawilson@gmail.com', 0),
(4, 'ethanwood@gmail.com', 'ellawilson@gmail.com', 1),
(5, 'Henryross@gmail.com', 'ellawilson@gmail.com', 0),
(6, 'benjaminmiller@gmail.com', 'ellawilson@gmail.com', 0),
(7, 'ethanwood@gmail.com', 'ellawilson@gmail.com', 1),
(8, 'Henryross@gmail.com', 'ellawilson@gmail.com', 0),
(9, 'jameshall@gmail.com', 'ellawilson@gmail.com', 0),
(10, 'oliverbrown@gmail.com', 'ellawilson@gmail.com', 0),
(11, 'Williamjones@gmail.com', 'ellawilson@gmail.com', 0),
(12, 'jameshall@gmail.com', 'ellawilson@gmail.com', 0),
(13, 'benjaminmiller@gmail.com', 'ellawilson@gmail.com', 0),
(14, 'ethanwood@gmail.com', 'ellawilson@gmail.com', 1),
(15, 'jameshall@gmail.com', 'ellawilson@gmail.com', 0),
(16, 'liamsmith@gmail.com', 'ellawilson@gmail.com', 0),
(17, 'lucasrogers@gmail.com', 'ellawilson@gmail.com', 0),
(18, 'mesommorris@gmail.com', 'ellawilson@gmail.com', 0),
(19, 'noahjohnson@gmail.com', 'ellawilson@gmail.com', 0),
(20, 'oliviajohnson@gmail.com', 'ethanwood@gmail.com', 0),
(21, 'ellawilson@gmail.com', 'ethanwood@gmail.com', 1),
(22, 'emilymorgan@gmail.com', 'ethanwood@gmail.com', 1),
(23, 'ethanwood@gmail.com', 'emilymorgan@gmail.com', 1),
(24, 'ethanwood@gmail.com', 'emmaSmith@gmail.com', 1),
(25, 'emmaSmith@gmail.com', 'ethanwood@gmail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wink`
--
ALTER TABLE `wink`
  ADD PRIMARY KEY (`id`),
  ADD KEY `to_user` (`to_user`),
  ADD KEY `from_user` (`from_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wink`
--
ALTER TABLE `wink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `wink`
--
ALTER TABLE `wink`
  ADD CONSTRAINT `wink_ibfk_1` FOREIGN KEY (`to_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `wink_ibfk_2` FOREIGN KEY (`from_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
