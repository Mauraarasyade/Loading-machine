-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2024 at 04:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data-barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(255) NOT NULL,
  `PROCESS` varchar(255) NOT NULL,
  `MACHINE` varchar(255) NOT NULL,
  `PART_NAME` varchar(255) NOT NULL,
  `MATERIAL` varchar(255) NOT NULL,
  `POS` varchar(255) NOT NULL,
  `ACTUAL_POS` varchar(255) NOT NULL,
  `QTY` varchar(255) NOT NULL,
  `NOP` varchar(255) NOT NULL,
  `EST` varchar(255) NOT NULL,
  `DATE` date NOT NULL,
  `START_TIME` varchar(50) NOT NULL DEFAULT '00:00:00',
  `END_TIME` varchar(50) NOT NULL DEFAULT '00:00:00',
  `DURATION` varchar(50) NOT NULL DEFAULT '00:00:00',
  `STATUS` varchar(255) NOT NULL,
  `REMARK` varchar(255) NOT NULL,
  `PRIORITAS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wip`
--

CREATE TABLE `wip` (
  `id` int(255) NOT NULL,
  `NO` int(255) NOT NULL,
  `DESCRIPTION` varchar(255) NOT NULL,
  `NOP` varchar(255) NOT NULL,
  `QTY` varchar(255) NOT NULL,
  `KET` varchar(255) NOT NULL,
  `PIC` varchar(255) NOT NULL,
  `CUST` varchar(255) NOT NULL,
  `START` varchar(255) NOT NULL,
  `DEL_PLAN` varchar(255) NOT NULL,
  `SCHEDULE_PERCEPATAN` varchar(255) NOT NULL,
  `REMARKS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wip`
--
ALTER TABLE `wip`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `wip`
--
ALTER TABLE `wip`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
