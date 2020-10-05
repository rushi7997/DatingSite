-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2020 at 06:47 PM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(80) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `about` text NOT NULL,
  `profilePicUrl` varchar(120) NOT NULL,
  `isPremium` tinyint(1) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `password` varchar(50) NOT NULL
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
