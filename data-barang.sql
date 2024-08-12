-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2024 at 11:40 AM
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
  `DATE` date NOT NULL,
  `START_TIME` varchar(50) NOT NULL DEFAULT '00:00:00',
  `END_TIME` varchar(50) NOT NULL DEFAULT '00:00:00',
  `DURATION` varchar(50) NOT NULL DEFAULT '00:00:00',
  `STATUS` varchar(255) NOT NULL,
  `REMARK` varchar(255) NOT NULL,
  `PRIORITAS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `PROCESS`, `MACHINE`, `PART_NAME`, `MATERIAL`, `POS`, `QTY`, `NOP`, `EST`, `DATE`, `START_TIME`, `END_TIME`, `DURATION`, `STATUS`, `REMARK`, `PRIORITAS`) VALUES
(1, 'WIRECUT', 'GMC 13', 'COBA 11', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '10:00:00', '2024-08-12', '15:32:36', '15:34:50', '00:02:13', 'WAKTU KURANG <br> 9 jam, 57 menit, <br> 47 detik', '-', '-'),
(2, 'MANUAL', 'GEC 7', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '112 jam, 18 menit', '0000-00-00', '09:46:00', '13:21:17', '01:00:00', 'WAKTU CUKUP', '-', '-'),
(3, 'WIRECUT', 'GMC 16', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '78 jam, 13 menit', '0000-00-00', '11:22:45', '13:20:59', '23:32:44', 'WAKTU LEBIH <br> 22 jam, 32 menit, <br> 44 detik', '-', '-'),
(4, 'BUBUT', 'GDC 1', '3', '2', 'w', 's', 'sq', '15 jam, 19 menit', '0000-00-00', '10:02:00', '13:21:12', '01:00:00', 'WAKTU CUKUP', '-', '-'),
(5, 'BUBUT', 'GEC 4', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'W', '93 jam, 57 menit', '0000-00-00', '10:22:00', '13:21:10', '01:00:00', 'WAKTU CUKUP', '-', '-'),
(6, 'EDM', 'GMC 15', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'W', '15 jam, 17 menit', '2024-08-12', '15:18:23', '15:18:27', '00:00:03', 'WAKTU KURANG <br> 0 jam, 59 menit, <br> 57 detik', '-', '-'),
(7, 'CNC', 'GDC 3', 'e', 'd', 's', 'a', 's', '2 jam, 4 menit', '0000-00-00', '15:09:00', '13:20:42', '01:00:00', 'WAKTU CUKUP', '-', '-'),
(8, 'CNC', 'GMC 2', '3', '2', 'w', 's', 'sq', '55 jam, 12 menit', '2024-08-06', '16:08:00', '13:20:35', '01:00:00', 'WAKTU CUKUP', '-', '-'),
(9, 'EDM', 'GMC 2', '3', '2', 'w', 's', 'sq', '22:00:00', '2024-08-06', '16:11:00', '13:20:33', '01:00:00', 'WAKTU KURANG <br> 21 jam, 0 menit, <br> 0 detik', '-', '-'),
(10, 'MANUAL', 'GEC 2', '3', '2', 'w', 's', 'sq', '198 jam, 56 menit', '2024-08-06', '16:17:00', '13:20:31', '01:00:00', 'WAKTU CUKUP', '-', '-'),
(11, 'WIRECUT', 'GDC 4', '3', '2', 'w', 's', 'sq', '34:55:00', '2024-08-14', '14:57:55', '14:58:02', '00:00:07', 'WAKTU KURANG <br> 0 jam, 59 menit, <br> 53 detik', '-', '-'),
(12, '', 'GMC 8', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '14 jam, 12 menit', '0000-00-00', '11:22:43', '13:21:00', '23:32:45', 'WAKTU LEBIH <br> 22 jam, 32 menit, <br> 45 detik', '-', '-'),
(13, '', 'GEC 1', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '102 jam, 17 menit', '2024-08-20', '08:58:00', '05:03:00', '68 jam, 5 menit', 'WAKTU CUKUP <br> NaN jam, NaN menit', '-', '-'),
(14, '', 'GEC 1', 'aq', 'q', 'POS 1', '3', 'G-2403-0044-3', '18 jam, 17 menit', '0000-00-00', '11:39:06', '13:20:53', '23:32:38', 'WAKTU LEBIH <br> 22 jam, 32 menit, <br> 38 detik', '-', '-'),
(15, '', '', 'aq', 'q', 'POS 1', '3', 'G-2403-0044-3', '12 jam, 7 menit', '0000-00-00', '10:04:00', '13:21:10', '01:00:00', 'WAKTU CUKUP', '-', '-'),
(16, '', '', 'aq', 'q', 'POS 1', '3', 'G-2403-0044-3', '14 jam, 17 menit', '0000-00-00', '10:45:00', '13:21:07', '01:00:00', 'WAKTU CUKUP', '-', '-'),
(17, '', 'GDC 2', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '0 jam, 15 menit', '0000-00-00', '13:52:00', '13:20:45', '01:00:00', 'WAKTU CUKUP', '-', '-'),
(18, 'CNC', 'GMC 2', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '15:00:00', '2024-08-28', '14:13:00', '14:32:00', '48 jam, 19 menit', 'WAKTU LEBIH 47 jam, 9 menit', '-', '-'),
(19, '', 'GMC 18', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '210 jam, 12 menit', '0000-00-00', '09:47:00', '13:21:13', '01:00:00', 'WAKTU CUKUP', '-', '-'),
(20, '', 'GEC 5', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '60 jam, 19 menit', '0000-00-00', '11:09:00', '13:21:06', '01:00:00', 'WAKTU CUKUP', '-', '-'),
(21, '', 'GMC 17', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '14 jam, 20 menit', '0000-00-00', '11:36:00', '13:20:56', '01:00:00', 'WAKTU CUKUP', '-', '-'),
(22, '', 'GEC 5', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '15 jam, 0 menit', '0000-00-00', '15:40:00', '13:20:40', '01:00:00', 'WAKTU CUKUP', '-', '-'),
(23, '', 'GMC 13', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '1 jam, 0 menit', '0000-00-00', '16:07:00', '13:20:40', '01:00:00', 'WAKTU CUKUP', '-', '-'),
(24, 'WIRECUT', 'GMC 14', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '1 jam, 0 menit', '2024-08-06', '16:32:00', '16:46:00', '120 jam, 14 menit', 'WAKTU LEBIH 119 jam, 14 menit', '-', '-'),
(26, 'MANUAL', 'GEC 5', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '10:00:00', '2024-08-15', '14:30:23', '14:30:33', '50 jam, 57 menit', 'WAKTU LEBIH 40 jam, 47 menit', '-', '-'),
(27, '', 'GMC 19', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '14 jam, 8 menit', '0000-00-00', '14:27:00', '13:20:43', '01:00:00', 'WAKTU CUKUP', '-', '-'),
(28, '', 'GEC 2', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '08:00:00', '2024-08-06', '14:56:32', '14:58:12', '00:12:44', 'WAKTU KURANG <br> 7 jam, 47 menit, <br> 16 detik', '-', '-'),
(29, '', 'GEC 1', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '44 jam, 0 menit', '0000-00-00', '15:13:00', '13:20:42', '01:00:00', 'WAKTU CUKUP', '-', '-'),
(30, '', '', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '17 jam, 0 menit', '0000-00-00', '10:29:00', '13:21:08', '01:00:00', 'WAKTU CUKUP', '-', '-'),
(31, '', '', 'Maura', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '00:00:00', '0000-00-00', '16:31:54', '00:00:00', '00:01:20', 'WAKTU LEBIH <br> 0 jam, 1 menit, <br> 20 detik', '-', '-'),
(32, '', 'GEC 1', 'RASYADE', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '0 jam, 0 menit', '0000-00-00', '11:39:09', '13:20:52', '23:32:36', 'WAKTU LEBIH <br> 22 jam, 32 menit, <br> 36 detik', '-', '-'),
(33, '', 'GMC 9', 'AQLAILA', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '139 jam, 0 menit', '0000-00-00', '11:35:00', '13:20:57', '01:00:00', 'WAKTU CUKUP', '-', '-'),
(34, '', 'GMC 10', 'LAPTOP', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '271 jam, 0 menit', '2024-08-05', '11:44:55', '13:20:37', '23:32:22', 'WAKTU LEBIH <br> 22 jam, 32 menit, <br> 22 detik', '-', '-'),
(35, '', 'GDC 2', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '98:11:16', '2024-08-05', '14:56:29', '14:58:14', '00:03:30', 'WAKTU KURANG <br> 0 jam, 56 menit, <br> 30 detik', '-', '-'),
(36, '', 'GMC 10', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '31 jam, 0 menit', '2024-08-06', '11:01:00', '13:20:36', '01:00:00', 'WAKTU CUKUP', '-', '-'),
(37, '', 'GMC 17', 'NOTE', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '58:55:13', '2024-08-05', '14:56:24', '00:00:00', '00:00:07', 'WAKTU KURANG <br> 0 jam, 59 menit, <br> 53 detik', '-', '-'),
(38, '', '', 'COBA', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '36:03:57', '2024-08-06', '14:57:53', '14:58:04', '00:00:10', 'WAKTU KURANG <br> 0 jam, 59 menit, <br> 50 detik', '-', '-'),
(39, '', 'GMC 1', 'MEJA', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '00:01:00', '2024-08-05', '14:56:30', '14:58:13', '01:32:08', 'WAKTU LEBIH <br> 1 jam, 31 menit, <br> 8 detik', '-', '-'),
(40, '', 'GDC 2', 'YELLOW', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '13:00:00', '2024-08-05', '14:56:22', '00:00:00', '00:00:07', 'WAKTU KURANG <br> 12 jam, 59 menit, <br> 53 detik', '-', 'PRIORITAS'),
(41, '', '', 'RED', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '09:00:00', '2024-08-05', '15:32:15', '15:32:22', '00:00:05', 'WAKTU KURANG <br> 8 jam, 59 menit, <br> 55 detik', '-', '-'),
(42, '', 'GEC 1', 'GREEN', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '02:13:00', '2024-08-04', '15:55:13', '00:00:00', '00:06:02', 'WAKTU KURANG <br> 2 jam, 6 menit, <br> 58 detik', '-', 'PRIORITAS'),
(43, 'BUBUT', 'GMC 9', 'BLUE', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '01:00:00', '2024-08-01', '06:11:31', '13:20:39', '00:09:08', 'WAKTU KURANG <br> 0 jam, 50 menit, <br> 52 detik', '-', '-'),
(44, 'BUBUT', 'GMC 2', 'BLACK', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '00:02:00', '2024-08-01', '15:11:40', '15:11:41', '00:00:01', 'WAKTU KURANG <br> 0 jam, 1 menit, <br> 57 detik', '-', '-'),
(46, 'BUBUT', 'GMC 1', 'COBA 1', 'M', 'POS 1', '3', 'G-2403-0044-3', '00:00:00', '2024-08-08', '14:57:54', '14:58:03', '00:00:09', 'WAKTU LEBIH <br> 0 jam, 0 menit, <br> 9 detik', '-', '-'),
(47, '', '', 'COBA 2', 'M', 'POS 1', '3', 'G-2403-0044-3', '10:10:10', '0000-00-00', '10:31:00', '13:21:08', '00:04:01', 'WAKTU KURANG <br> 10 jam, 6 menit, <br> 9 detik', '-', '-'),
(49, 'CNC', '', 'COBA 4', 'M', 'POS 1', '3', 'G-2403-0044-3', '00:02:00', '2024-08-01', '07:23:36', '07:23:37', '00:00:01', 'WAKTU KURANG <br> 0 jam, 1 menit, <br> 59 detik', '-', ''),
(50, '', '', 'COBA 5', 'M', 'POS 1', '3', 'G-2403-0044-3', '00:02:00', '2024-08-12', '15:18:40', '15:18:43', '00:00:02', 'WAKTU KURANG <br> 0 jam, 1 menit, <br> 58 detik', '-', '-'),
(51, '', '', 'COBA 6', 'M', 'POS 1', '3', 'G-2403-0044-3', '00:02:00', '2024-08-01', '07:23:51', '07:23:53', '00:00:01', 'WAKTU KURANG <br> 0 jam, 1 menit, <br> 59 detik', '-', ''),
(52, 'CNC', 'GMC 1', 'COBA 7', 'M', 'POS 1', '3', 'G-2403-0044-3', '00:02:00', '2024-08-01', '14:38:16', '14:38:44', '00:04:45', 'WAKTU LEBIH <br> 0 jam, 2 menit, <br> 45 detik', '-', '-'),
(54, '', '', 'COBA 9', 'M', 'POS 1', '3', 'G-2403-0044-3', '00:02:00', '0000-00-00', '15:16:01', '00:00:00', '00:04:18', 'WAKTU LEBIH <br> 0 jam, 2 menit, <br> 18 detik', '-', 'PRIORITAS'),
(55, '', '', 'COBA 10', 'M', 'POS 1', '3', 'G-2403-0044-3', '01:00:00', '2024-08-12', '14:56:27', '15:07:23', '00:10:56', 'WAKTU KURANG <br> 0 jam, 49 menit, <br> 4 detik', '-', '-');

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
-- Dumping data for table `wip`
--

INSERT INTO `wip` (`id`, `NO`, `DESCRIPTION`, `NOP`, `QTY`, `KET`, `PIC`, `CUST`, `START`, `DEL_PLAN`, `SCHEDULE_PERCEPATAN`, `REMARKS`) VALUES
(2, 3, 'BLACK', 'WHITE', 'BROWN', 'RED', 'PINK', 'BLUE', 'GREEN', 'PURPLE', 'YELLOW', 'ORANGE');

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `wip`
--
ALTER TABLE `wip`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
