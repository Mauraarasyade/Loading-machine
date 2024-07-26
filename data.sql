-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2024 at 10:44 AM
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
  `QTY` varchar(255) NOT NULL,
  `NOP` varchar(255) NOT NULL,
  `EST` varchar(255) NOT NULL,
  `START_TIME` datetime NOT NULL,
  `END_TIME` datetime NOT NULL,
  `DURATION` varchar(50) NOT NULL,
  `STATUS` varchar(255) NOT NULL,
  `REMARK` varchar(255) NOT NULL,
  `PRIORITAS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `PROCESS`, `MACHINE`, `PART_NAME`, `MATERIAL`, `POS`, `QTY`, `NOP`, `EST`, `START_TIME`, `END_TIME`, `DURATION`, `STATUS`, `REMARK`, `PRIORITAS`) VALUES
(1, 'WIRECUT', 'GMC 12', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '10 jam, 11 menit', '2024-07-10 09:45:00', '2024-07-19 21:53:00', '420 jam, 8 menit', 'WAKTU LEBIH <br> 409 jam, 57 menit', '-', '-'),
(2, 'MANUAL', 'GMC 16', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '112 jam, 18 menit', '2024-07-04 09:46:00', '2024-07-20 01:58:00', '376 jam, 12 menit', '', '-', '-'),
(3, 'WIRECUT', 'GMC 16', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '78 jam, 13 menit', '2024-07-20 09:20:00', '2024-08-21 09:54:00', '768 jam, 34 menit', '', '-', '-'),
(4, 'BUBUT', 'GMC 10', '3', '2', 'w', 's', 'sq', '15 jam, 19 menit', '2024-06-30 10:02:00', '2024-07-02 10:06:00', '48 jam, 4 menit', 'WAKTU LEBIH 32 jam, 45 menit', '-', 'PRIORITAS'),
(5, 'BUBUT', 'GEC 2', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'W', '93 jam, 57 menit', '2024-07-19 10:22:00', '2024-07-18 03:37:00', '17 jam, 15 menit', '76 jam, 42 menit', '-', 'PRIORITAS'),
(6, 'EDM', 'GMC 14', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'W', '15 jam, 17 menit', '2024-07-17 11:34:00', '2024-07-20 11:36:00', '72 jam, 2 menit', '', '-', 'PRIORITAS'),
(7, 'CNC', 'GDC 2', 'e', 'd', 's', 'a', 's', '2 jam, 4 menit', '2024-07-19 15:09:00', '2024-07-25 12:00:00', '140 jam, 51 menit', '', '-', 'PRIORITAS'),
(8, 'CNC', 'GMC 12', '3', '2', 'w', 's', 'sq', '55 jam, 12 menit', '2024-07-15 16:08:00', '2024-07-23 16:16:00', '312 jam, 8 menit', 'WAKTU CUKUP <br> NaN jam, NaN menit', '-', '-'),
(9, 'EDM', 'GMC 2', '3', '2', 'w', 's', 'sq', '103 jam, 15 menit', '2024-07-17 16:11:00', '2024-07-18 16:11:00', '72 jam, 0 menit', 'WAKTU CUKUP <br> NaN jam, NaN menit', '-', '-'),
(10, 'MANUAL', 'GMC 12', '3', '2', 'w', 's', 'sq', '198 jam, 56 menit', '2024-07-15 16:17:00', '2024-07-18 16:21:00', '72 jam, 4 menit', '', '-', 'PRIORITAS'),
(11, 'WIRECUT', 'GMC 16', '3', '2', 'w', 's', 'sq', '87 jam, 55 menit', '2024-07-11 15:00:00', '2024-07-25 16:00:00', '337 jam, 0 menit', '', '-', 'PRIORITAS'),
(12, '', 'GMC 16', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '14 jam, 12 menit', '2024-07-03 08:32:00', '2024-07-24 08:33:00', '504 jam, 1 menit', 'WAKTU LEBIH 489 jam, 49 menit', '-', '-'),
(13, '', '', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '102 jam, 17 menit', '2024-07-24 08:58:00', '2024-07-30 05:03:00', '68 jam, 5 menit', 'WAKTU CUKUP <br> NaN jam, NaN menit', '-', '-'),
(14, '', 'GMC 17', 'aq', 'q', 'POS 1', '3', 'G-2403-0044-3', '18 jam, 17 menit', '2024-07-01 09:22:00', '2024-07-09 09:22:00', '192 jam, 0 menit', 'WAKTU LEBIH 173 jam, 43 menit', '-', '-'),
(15, '', '', 'aq', 'q', 'POS 1', '3', 'G-2403-0044-3', '12 jam, 7 menit', '2024-07-11 10:04:00', '2024-08-01 10:04:00', '504 jam, 0 menit', 'WAKTU LEBIH 491 jam, 53 menit', '-', '-'),
(16, '', '', 'aq', 'q', 'POS 1', '3', 'G-2403-0044-3', '14 jam, 17 menit', '2024-07-24 10:45:00', '2024-07-10 10:45:00', '336 jam, 0 menit', 'WAKTU LEBIH 321 jam, 43 menit', '-', '-'),
(17, '', '', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '0 jam, 15 menit', '2024-07-30 13:52:00', '2024-07-31 14:09:00', '480 jam, 17 menit', 'WAKTU LEBIH 480 jam, 2 menit', '-', '-'),
(18, 'CNC', 'GMC 16', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '1 jam, 10 menit', '2024-07-01 14:13:00', '2024-07-03 14:32:00', '48 jam, 19 menit', 'WAKTU LEBIH 47 jam, 9 menit', '-', '-'),
(19, '', 'GMC 12', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '210 jam, 12 menit', '2024-07-10 09:47:00', '2024-07-18 11:20:00', '193 jam, 33 menit', 'WAKTU CUKUP 16 jam, 39 menit', '-', '-'),
(20, '', '', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '60 jam, 19 menit', '2024-07-03 11:09:00', '2024-07-03 11:20:00', '0 jam, 11 menit', 'WAKTU CUKUP 60 jam, 8 menit', '-', 'PRIORITAS'),
(21, '', '', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '14 jam, 20 menit', '2024-07-01 11:36:00', '2024-07-02 11:30:00', '23 jam, 54 menit', 'WAKTU CUKUP 453 jam, 26 menit', '-', '-'),
(22, '', 'GEC 5', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '15 jam, 0 menit', '2024-07-25 15:40:00', '2024-07-27 16:19:00', '48 jam, 39 menit', 'WAKTU LEBIH 33 jam, 39 menit', '-', '-'),
(23, '', 'GMC 17', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '1 jam, 0 menit', '2024-07-01 16:07:00', '2024-07-04 16:46:00', '72 jam, 39 menit', 'WAKTU LEBIH 71 jam, 39 menit', '-', '-'),
(24, 'WIRECUT', 'GMC 14', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '1 jam, 0 menit', '2024-07-25 16:32:00', '2024-07-26 16:46:00', '24 jam, 14 menit', 'WAKTU LEBIH 23 jam, 14 menit', '-', '-'),
(25, 'EDM', 'GMC 16', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '12 jam, 0 menit', '2024-07-25 16:57:00', '2024-07-27 17:12:00', '48 jam, 15 menit', 'WAKTU LEBIH 36 jam, 15 menit', '-', 'PRIORITAS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
