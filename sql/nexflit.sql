-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2021 at 12:57 PM
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
-- Database: `nexflit`
--

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `mid` int(10) NOT NULL,
  `name` varchar(30) CHARACTER SET latin1 NOT NULL,
  `genre` varchar(20) CHARACTER SET latin1 NOT NULL,
  `rdate` varchar(5) CHARACTER SET latin1 NOT NULL,
  `viewers` int(10) DEFAULT 1,
  `imgpath` varchar(50) CHARACTER SET latin1 NOT NULL,
  `videopath` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`mid`, `name`, `genre`, `rdate`, `viewers`, `imgpath`, `videopath`) VALUES
(19, 'star wars', 'action', '2019', 7, 'starwars.jpg', 'videoplayback.mp4'),
(20, 'eternals', 'action', '2021', 63, 'eternals.jpg', 'eternals trailer.mp4'),
(21, 'zombieland', 'horror', '2019', 13, 'zombieland.jpg', 'zombieland trailer.mp4'),
(22, 'joker', 'drama', '2019', 13, 'joker.jpg', 'joker trailer.mp4'),
(24, 'john wick: parabellum', 'action', '2019', 15, 'johnwick3.jpg', 'john wick 3 trailer.mp4'),
(25, 'jumanji', 'action', '2017', 14, 'jumanji.jpg', 'jumanji trailer.mp4'),
(28, 'the avengers', 'action', '2012', 22, 'The Avengers.jpg', 'the avengers trailer.mp4'),
(30, 'the conjuring', 'horror', '2013', 2, 'conjuring.jpg', 'The Conjuring - Official Main Trailer [HD].mp4'),
(33, 'The Medium', 'Horror', '2021', 2, 'medium.jpg', 'medium trailer.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`) VALUES
(1, 'Muhammad Dicky Athalla', 'dicky', 'dicky@gamil.com', '$2y$10$Hm3IXJJTuwxGPRFN/EhYpuxjb5cLgv62sXj4CfiMDFGzlDJ7iLmum'),
(2, 'rudi', 'rudi27', 'rudi@gamil.com', '$2y$10$Hm3IXJJTuwxGPRFN/EhYpuxjb5cLgv62sXj4CfiMDFGzlDJ7iLmum'),
(3, 'robert jordan', 'rjordan', 'rjordan@gamil.com', '$2y$10$Hm3IXJJTuwxGPRFN/EhYpuxjb5cLgv62sXj4CfiMDFGzlDJ7iLmum'),
(9, 'yoel', 'yoelsianak', 'yoel@gamil.com', '$2y$10$fpXcF9Mnl2OWNzgdsKmaZekTW.xtXdYuV2q.REuvlFWqu0yguoAD.'),
(10, 'rudiii', 'rudi278', 'rudii@gamil.com', '$2y$10$Vi7JTCjZBMBamrE5Deu3.OjVPoED2.ySJDab6IK5.VFHfCyKNOZKW'),
(11, 'budi', 'budi27', 'budi@gamil.com', '$2y$10$MYLCXZGwcU.ZK.AzLpRSW.9DDdh9reG8Wlb9S4qIQdL5DWueVDodK'),
(12, 'admin', 'admin01', 'admin@gamil.com', '$2y$10$AvUEwY8lzVwAoh7pXsMyqesSpxqKK5I/v/BYo7r04HjH0fhFOrAJ2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `mid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
