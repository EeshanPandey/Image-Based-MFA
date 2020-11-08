-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2020 at 08:37 PM
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
-- Database: `nis`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(5) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `secq` varchar(255) DEFAULT NULL,
  `secans` varchar(255) DEFAULT NULL,
  `imgnum` int(1) DEFAULT NULL,
  `imgx` int(5) DEFAULT NULL,
  `imgy` int(5) DEFAULT NULL,
  `accid` varchar(255) NOT NULL,
  `amount` varchar(255) DEFAULT '25000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `secq`, `secans`, `imgnum`, `imgx`, `imgy`, `accid`, `amount`) VALUES
(1, 'user', 'user', 'user', 'user', 2, 317, 176, 'USR1', '25000'),
(2, 'testuser1', '$2y$10$2/Lv85GodAH2UBIyjJ7M1u91NCTltjCXUjGBIztJSI/zGgydM5kn.', 'Who is your favourite actor', 'Keanu Reeves', 2, 233, 17, 'TSTUSR1', '25000'),
(3, 'testuser2', '$2y$10$wEby58NB3qRa6gZ357D6UOEus/jLpYFY.Tv3.SFqhGYlqneWs.h06', 'abc', 'abc', 1, 328, 17, 'TSTUSR2', '25000'),
(4, 'testuser3', '$2y$10$MR31gtdq5n2Ewz8bIpfSbORnCz78hD/8naqc/640MFhsKwtNf.nQS', 'test', 'test', 2, 232, 14, '', '25000'),
(5, 'testuser4', '$2y$10$DzWRnbYscKXT4nGJTOm96O8RYZwOq2GDoAGP10Ql1C7qCVFWmiIbW', 'asdf', 'asdf', 3, 189, 306, '', '25000'),
(6, 'testuser5', '$2y$10$RNiTBfDjKD9fYJFEVpnss.bDItWM3920iX3FHyI0X/95F.RjphZUu', 'name?', 'test', 2, 254, 372, 'TSTUSR5', '25000'),
(8, 'asdf', '$2y$10$i96T8E5IwUtXKw8xE7yftefSSjQD5jYbJGqRWIYSAivmIpuyUmFru', 'asdf', 'asdf', NULL, NULL, NULL, '', '25000'),
(9, 'asdfsadf', '$2y$10$Mu7vO.opP/HhZwotLQ.38.LhFeyYwUKLumgq5u916bCjZfXGv7JmC', 'asdf', 'asdf', NULL, NULL, NULL, '', '25000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
