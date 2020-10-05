-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2020 at 08:00 PM
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
CREATE DATABASE IF NOT EXISTS `rushi_project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `rushi_project`;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_user` varchar(80) NOT NULL,
  `from_user` varchar(80) NOT NULL,
  `message` text NOT NULL,
  `seen` tinyint(1) NOT NULL,
  `sent_time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `to_user`, `from_user`, `message`, `seen`, `sent_time`) VALUES
(2, 'emilymorgan@gmail.com', 'ethanwood@gmail.com', 'hello emily', 0, '2020-10-05 12:43:22'),
(3, 'emmaSmith@gmail.com', 'ethanwood@gmail.com', 'lol', 0, '2020-10-05 12:43:51'),
(4, 'ethanwood@gmail.com', 'ellawilson@gmail.com', 'hello ethan', 1, '2020-10-05 13:19:20'),
(6, 'ellawilson@gmail.com', 'ethanwood@gmail.com', 'hello ella', 1, '2020-10-05 13:28:26'),
(13, 'ethanwood@gmail.com', 'ellawilson@gmail.com', 'How are you?', 1, '2020-10-05 13:50:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` varchar(80) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `about` text NOT NULL,
  `profilePicUrl` varchar(120) NOT NULL,
  `isPremium` tinyint(1) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `about`, `profilePicUrl`, `isPremium`, `age`, `gender`, `password`) VALUES
('avawilliams@gmail.com', 'ava', 'williams', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate', '../UserImages/ava-williams-23.jpg', 0, 23, 0, 'password'),
('benjaminmiller@gmail.com', 'benjamin', 'miller', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate', '../UserImages/benjamin-miller-26.jpg', 0, 26, 1, 'password'),
('ellawilson@gmail.com', 'ella', 'wilson', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate', '../UserImages/ella-wilson-26.jpg', 0, 26, 0, 'password'),
('emilymorgan@gmail.com', 'emily', 'morgan', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate', '../UserImages/emily-morgan-27.jpg', 0, 27, 0, 'password'),
('emmaSmith@gmail.com', 'Emma', 'smith', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate', '../UserImages/Emma-smith-21.jpg', 0, 21, 0, 'password'),
('ethanwood@gmail.com', 'ethan', 'wood', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate', '../UserImages/ethan-wood-29.jpg', 0, 29, 1, 'password'),
('harperjones@gmail.com', 'harper', 'jones', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate', '../UserImages/harper-jones-25.jpg', 0, 25, 0, 'password'),
('Henryross@gmail.com', 'Henry', 'ross', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate', '../UserImages/Henry-ross-30.jpg', 0, 30, 1, 'password'),
('jameshall@gmail.com', 'james', 'hall', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate', '../UserImages/james-hall-24.jpg', 0, 24, 1, 'password'),
('liamsmith@gmail.com', 'Liam', 'Smith', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate.', '../UserImages/Liam-Smith-21.jpg', 0, 21, 1, 'password'),
('lucasrogers@gmail.com', 'lucas', 'rogers', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate', '../UserImages/lucas-rogers-27.jpg', 0, 27, 1, 'password'),
('lunagreen@gmail.com', 'luna', 'green', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate', '../UserImages/luna-green-30.jpg', 0, 30, 0, 'password'),
('mesommorris@gmail.com', 'meson', 'morris', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate', '../UserImages/meson-morris-28.jpg', 0, 28, 1, 'password'),
('miaallen@gmail.com', 'mia', 'allen', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate', '../UserImages/mia-allen-24.jpg', 0, 24, 0, 'password'),
('milarogers@gmail.com', 'mila', 'rogers', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate', '../UserImages/mila-rogers-28.jpg', 0, 28, 0, 'password'),
('noahjohnson@gmail.com', 'Noah', 'Johnson', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate.', '../UserImages/Noah-Johnson-22.jpg', 0, 22, 1, 'password'),
('oliverbrown@gmail.com', 'oliver', 'brown', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate', '../UserImages/oliver-brown-25.jpg', 0, 25, 1, 'password'),
('oliviajohnson@gmail.com', 'olivia', 'johnson', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate', '../UserImages/olivia-johnson-22.jpg', 0, 22, 0, 'password'),
('sofiaross@gmail.com', 'sofia', 'ross', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate', '../UserImages/sofia-ross-29.jpg', 0, 29, 0, 'password'),
('Williamjones@gmail.com', 'William', 'jones', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi non quis exercitationem culpa nesciunt nihil aut nostrum explicabo reprehenderit optio amet ab temporibus asperiores quasi cupiditate', '../UserImages/William-jones-23.jpg', 0, 23, 1, 'password');

-- --------------------------------------------------------

--
-- Table structure for table `wink`
--

DROP TABLE IF EXISTS `wink`;
CREATE TABLE IF NOT EXISTS `wink` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_user` varchar(80) NOT NULL,
  `from_user` varchar(80) NOT NULL,
  `seen` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `to_user` (`to_user`),
  KEY `from_user` (`from_user`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

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
