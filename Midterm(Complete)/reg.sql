-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2021 at 07:34 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `username`, `activity`, `time`) VALUES
(56, 'erka', 'Logged in', '2021-04-26 01:44:03.692311'),
(57, 'erka', 'Logged out', '2021-04-26 01:44:11.585407'),
(58, 'erika', 'Logged in', '2021-04-26 04:55:20.042597'),
(59, 'erika', 'Logged out', '2021-04-26 04:55:29.484198'),
(60, 'erika', 'Change Password', '2021-04-26 04:56:12.780209'),
(61, 'erika', 'Logged in', '2021-04-26 04:56:20.099207'),
(62, 'erika', 'Logged out', '2021-04-26 04:56:30.444520'),
(63, 'erika', 'Change Password', '2021-04-26 05:08:15.738079'),
(64, 'erika', 'Logged in', '2021-04-26 05:08:28.307065'),
(65, 'erika', 'Logged out', '2021-04-26 05:08:59.098691'),
(69, 'pons', 'Logged in', '2021-04-26 05:21:35.443572'),
(70, 'pons', 'Logged out', '2021-04-26 05:22:02.746741'),
(71, 'pons', 'Change Password', '2021-04-26 05:25:18.678408'),
(72, 'pons', 'Logged in', '2021-04-26 05:25:59.723815'),
(73, 'pons', 'Logged out', '2021-04-26 05:26:23.359187'),
(74, 'erika', 'Logged in', '2021-04-26 05:27:16.655553'),
(75, 'erika', 'Logged out', '2021-04-26 05:27:27.449516');

-- --------------------------------------------------------

--
-- Table structure for table `regtable`
--

CREATE TABLE `regtable` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regtable`
--

INSERT INTO `regtable` (`id`, `fullname`, `username`, `password`) VALUES
(1, 'erika45@gmail.com', 'erika', 'Erika12345'),
(29, 'erka@gmail.com', 'erka', 'Erikamae1'),
(31, 'pons@gmail.com', 'pons', 'Ponsi12345');

-- --------------------------------------------------------

--
-- Table structure for table `verify`
--

CREATE TABLE `verify` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `created` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `verify`
--

INSERT INTO `verify` (`id`, `user_id`, `user`, `code`, `created`) VALUES
(1, 27, 'erika', '430461', '2021-04-26 00:48:20.801244'),
(108, 1, 'erika', '670755', '2021-04-26 00:55:28.516723'),
(109, 1, 'erika', '725055', '2021-04-26 00:59:23.164208'),
(110, 1, 'erika', '788148', '2021-04-26 01:02:49.955802'),
(111, 1, 'erika', '944086', '2021-04-26 01:36:43.383898'),
(112, 29, 'erka', '857942', '2021-04-26 01:39:03.760255'),
(113, 29, 'erka', '315745', '2021-04-26 01:44:08.983665'),
(114, 1, 'erika', '962548', '2021-04-26 04:55:27.307399'),
(115, 1, 'erika', '822429', '2021-04-26 04:56:28.612626'),
(116, 1, 'erika', '201195', '2021-04-26 05:08:51.248676'),
(118, 31, 'pons', '754845', '2021-04-26 05:21:54.446552'),
(119, 31, 'pons', '560553', '2021-04-26 05:26:21.452063'),
(120, 1, 'erika', '151102', '2021-04-26 05:27:25.510573');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `regtable`
--
ALTER TABLE `regtable`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD UNIQUE KEY `username_3` (`username`);

--
-- Indexes for table `verify`
--
ALTER TABLE `verify`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `regtable`
--
ALTER TABLE `regtable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `verify`
--
ALTER TABLE `verify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
