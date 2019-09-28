-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2019 at 12:54 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techathon`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$lryPi.SiqL/AVcpMF7a.1umqIHQuubv4lAR7aJh9VRIE0vStlUSBa', '2019-09-28 10:12:45');

-- --------------------------------------------------------

--
-- Table structure for table `available`
--

CREATE TABLE `available` (
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(50) NOT NULL,
  `venue` varchar(50) NOT NULL,
  `availablity` varchar(50) NOT NULL DEFAULT 'YES',
  `user` varchar(50) DEFAULT NULL,
  `event` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `available`
--

INSERT INTO `available` (`id`, `date`, `time`, `venue`, `availablity`, `user`, `event`) VALUES
(4, '2019-09-29', '8:00-9:00', 'purplehall', 'YES', NULL, NULL),
(5, '2019-09-29', '8:00-9:00', 'miniseminarhall', 'YES', NULL, NULL),
(6, '2019-09-29', '8:00-9:00', 'mainseminarhall', 'YES', NULL, NULL),
(7, '2019-09-29', '9:00-10:00', 'purplehall', 'YES', NULL, NULL),
(8, '2019-09-29', '9:00-10:00', 'miniseminarhall', 'YES', NULL, NULL),
(9, '2019-09-29', '9:00-10:00', 'mainseminarhall', 'YES', NULL, NULL),
(12, '2019-09-29', '10:00-11:00', 'purplehall', 'YES', NULL, NULL),
(13, '2019-09-29', '10:00-11:00', 'miniseminarhall', 'YES', NULL, NULL),
(14, '2019-09-29', '10:00-11:00', 'mainseminarhall', 'YES', NULL, NULL),
(15, '2019-09-29', '11:00-12:00', 'purplehall', 'YES', NULL, NULL),
(16, '2019-09-29', '11:00-12:00', 'miniseminarhall', 'YES', NULL, NULL),
(17, '2019-09-29', '11:00-12:00', 'mainseminarhall', 'YES', NULL, NULL),
(18, '2019-09-29', '12:00-13:00', 'purplehall', 'YES', NULL, NULL),
(19, '2019-09-29', '12:00-13:00', 'miniseminarhall', 'YES', NULL, NULL),
(21, '2019-09-29', '12:00-13:00', 'mainseminarhall', 'YES', NULL, NULL),
(22, '2019-09-29', '13:00-14:00', 'purplehall', 'YES', NULL, NULL),
(23, '2019-09-29', '13:00-14:00', 'miniseminarhall', 'YES', NULL, NULL),
(24, '2019-09-29', '13:00-14:00', 'mainseminarhall', 'YES', NULL, NULL),
(25, '2019-09-29', '14:00-15:00', 'purplehall', 'YES', NULL, NULL),
(26, '2019-09-29', '14:00-15:00', 'miniseminarhall', 'YES', NULL, NULL),
(27, '2019-09-29', '14:00-15:00', 'mainseminarhall', 'YES', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'rajalakshmi', '$2y$10$7/VN8EAYcVHWnv10gPs7XO4.4I99p05/B3JVGUP8EuhT8Vxoiuq/6', '2019-09-28 10:34:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `available`
--
ALTER TABLE `available`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `available`
--
ALTER TABLE `available`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
