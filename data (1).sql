-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2024 at 08:31 AM
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
  `START_TIME` varchar(50) NOT NULL,
  `END_TIME` varchar(50) NOT NULL,
  `DURATION` varchar(50) NOT NULL,
  `STATUS` varchar(255) NOT NULL,
  `REMARK` varchar(255) NOT NULL,
  `PRIORITAS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `PROCESS`, `MACHINE`, `PART_NAME`, `MATERIAL`, `POS`, `QTY`, `NOP`, `EST`, `DATE`, `START_TIME`, `END_TIME`, `DURATION`, `STATUS`, `REMARK`, `PRIORITAS`) VALUES
(1, 'WIRECUT', 'GMC 13', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '10 jam, 11 menit', '0000-00-00', '09:45:00', '21:53:00', '420 jam, 8 menit', 'WAKTU LEBIH <br> 409 jam, 57 menit', '-', '-'),
(2, 'MANUAL', 'GEC 7', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '112 jam, 18 menit', '0000-00-00', '09:46:00', '01:58:00', '376 jam, 12 menit', '', '-', '-'),
(3, 'WIRECUT', 'GMC 16', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '78 jam, 13 menit', '0000-00-00', '11:22:45', '09:54:00', '768 jam, 34 menit', '', '-', '-'),
(4, 'BUBUT', 'GDC 1', '3', '2', 'w', 's', 'sq', '15 jam, 19 menit', '0000-00-00', '10:02:00', '10:35:00', '72 jam, 33 menit', 'WAKTU LEBIH 57 jam, 14 menit', '-', '-'),
(5, 'BUBUT', 'GEC 4', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'W', '93 jam, 57 menit', '0000-00-00', '10:22:00', '15:55:00', '293 jam, 33 menit', 'WAKTU LEBIH 199 jam, 36 menit', '-', '-'),
(6, 'EDM', 'GMC 15', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'W', '15 jam, 17 menit', '0000-00-00', '11:34:00', '10:40:00', '191 jam, 6 menit', 'WAKTU LEBIH 175 jam, 49 menit', '-', '-'),
(7, 'CNC', 'GDC 3', 'e', 'd', 's', 'a', 's', '2 jam, 4 menit', '0000-00-00', '15:09:00', '10:40:00', '19 jam, 31 menit', 'WAKTU LEBIH 17 jam, 27 menit', '-', '-'),
(8, 'CNC', 'GMC 2', '3', '2', 'w', 's', 'sq', '55 jam, 12 menit', '2024-08-06', '16:08:00', '16:16:00', '312 jam, 8 menit', 'WAKTU CUKUP <br> NaN jam, NaN menit', '-', '-'),
(9, 'EDM', 'GMC 2', '3', '2', 'w', 's', 'sq', '22:00:00', '2024-08-06', '16:11:00', '16:11:00', '72 jam, 0 menit', 'WAKTU CUKUP <br> NaN jam, NaN menit', '-', '-'),
(10, 'MANUAL', 'GEC 2', '3', '2', 'w', 's', 'sq', '198 jam, 56 menit', '2024-08-06', '16:17:00', '10:38:00', '90 jam, 21 menit', 'WAKTU CUKUP 108 jam, 35 menit', '-', '-'),
(11, 'WIRECUT', 'GDC 4', '3', '2', 'w', 's', 'sq', '34:55:00', '2024-08-14', '11:42:59', '11:44:02', '00:01:03', 'WAKTU LEBIH 57 jam, 5 menit', '-', 'PRIORITAS'),
(12, '', 'GMC 8', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '14 jam, 12 menit', '0000-00-00', '11:22:43', '08:33:00', '72 jam, 1 menit', 'WAKTU LEBIH 57 jam, 49 menit', '-', '-'),
(13, '', 'GEC 1', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '102 jam, 17 menit', '2024-08-20', '08:58:00', '05:03:00', '68 jam, 5 menit', 'WAKTU CUKUP <br> NaN jam, NaN menit', '-', '-'),
(14, '', 'GEC 1', 'aq', 'q', 'POS 1', '3', 'G-2403-0044-3', '18 jam, 17 menit', '0000-00-00', '11:39:06', '11:42:25', '00:03:19', 'WAKTU LEBIH 173 jam, 43 menit', '-', '-'),
(15, '', '', 'aq', 'q', 'POS 1', '3', 'G-2403-0044-3', '12 jam, 7 menit', '0000-00-00', '10:04:00', '10:04:00', '504 jam, 0 menit', 'WAKTU LEBIH 491 jam, 53 menit', '-', '-'),
(16, '', '', 'aq', 'q', 'POS 1', '3', 'G-2403-0044-3', '14 jam, 17 menit', '0000-00-00', '10:45:00', '10:45:00', '336 jam, 0 menit', 'WAKTU LEBIH 321 jam, 43 menit', '-', '-'),
(17, '', 'GDC 2', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '0 jam, 15 menit', '0000-00-00', '13:52:00', '14:09:00', '480 jam, 17 menit', 'WAKTU LEBIH 480 jam, 2 menit', '-', '-'),
(18, 'CNC', 'GMC 2', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '15:00:00', '2024-08-28', '14:13:00', '14:32:00', '48 jam, 19 menit', 'WAKTU LEBIH 47 jam, 9 menit', '-', '-'),
(19, '', 'GMC 18', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '210 jam, 12 menit', '0000-00-00', '09:47:00', '11:20:00', '193 jam, 33 menit', 'WAKTU CUKUP 16 jam, 39 menit', '-', '-'),
(20, '', 'GEC 5', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '60 jam, 19 menit', '0000-00-00', '11:09:00', '10:33:00', '335 jam, 24 menit', 'WAKTU LEBIH 275 jam, 5 menit', '-', '-'),
(21, '', 'GMC 17', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '14 jam, 20 menit', '0000-00-00', '11:36:00', '11:30:00', '23 jam, 54 menit', 'WAKTU CUKUP 453 jam, 26 menit', '-', '-'),
(22, '', 'GEC 5', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '15 jam, 0 menit', '0000-00-00', '15:40:00', '16:19:00', '48 jam, 39 menit', 'WAKTU LEBIH 33 jam, 39 menit', '-', '-'),
(23, '', 'GMC 13', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '1 jam, 0 menit', '0000-00-00', '16:07:00', '16:46:00', '72 jam, 39 menit', 'WAKTU LEBIH 71 jam, 39 menit', '-', '-'),
(24, 'WIRECUT', 'GMC 14', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '1 jam, 0 menit', '2024-08-06', '16:32:00', '16:46:00', '120 jam, 14 menit', 'WAKTU LEBIH 119 jam, 14 menit', '-', '-'),
(26, 'MANUAL', 'GEC 5', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '10:00:00', '2024-08-15', '14:30:23', '14:30:33', '50 jam, 57 menit', 'WAKTU LEBIH 40 jam, 47 menit', '-', '-'),
(27, '', 'GMC 19', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '14 jam, 8 menit', '0000-00-00', '14:27:00', '15:43:00', '97 jam, 16 menit', 'WAKTU LEBIH 83 jam, 8 menit', '-', '-'),
(28, '', 'GEC 2', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '08:00:00', '2024-08-06', '11:20:42', '11:20:48', '00:00:06', 'WAKTU LEBIH 17 jam, 28 menit', '-', 'PRIORITAS'),
(29, '', 'GEC 1', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '44 jam, 0 menit', '0000-00-00', '15:13:00', '15:43:00', '192 jam, 30 menit', 'WAKTU LEBIH 148 jam, 30 menit', '-', '-'),
(30, '', '', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '17 jam, 0 menit', '0000-00-00', '10:29:00', '10:47:00', '48 jam, 18 menit', 'WAKTU LEBIH 31 jam, 18 menit', '-', '-'),
(31, '', '', 'Maura', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '891 jam, 0 menit', '0000-00-00', '11:20:00', '11:54:00', '48 jam, 34 menit', 'WAKTU CUKUP 842 jam, 26 menit', '-', '-'),
(32, '', 'GEC 1', 'RASYADE', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '0 jam, 0 menit', '0000-00-00', '11:39:09', '11:42:30', '00:03:21', 'LEBIH 48 jam, 0 menit', '-', '-'),
(33, '', 'GMC 9', 'AQLAILA', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '139 jam, 0 menit', '0000-00-00', '11:35:00', '10:40:00', '71 jam, 5 menit', 'WAKTU CUKUP 67 jam, 55 menit', '-', '-'),
(34, '', 'GMC 10', 'LAPTOP', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '271 jam, 0 menit', '2024-08-05', '11:44:55', '11:44:59', '00:00:04', 'WAKTU CUKUP 247 jam, 42 menit', '-', '-'),
(35, '', 'GDC 2', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '98:11:16', '2024-08-05', '16:17:12', '16:17:17', '00:00:05', 'WAKTU KURANG <br> 0 jam, 59 menit,<br> 55 detik', '-', 'PRIORITAS'),
(36, '', 'GMC 10', 'Layout c2 Insert cavity C2F CTM middle D11K', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '31 jam, 0 menit', '2024-08-06', '11:01:00', '14:23:53', '', '', '-', '-'),
(37, '', '', 'NOTE', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '58:55:13', '2024-08-05', '10:02:29', '10:07:15', '00:04:46', '', '-', 'PRIORITAS'),
(38, '', '', 'COBA', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '36:03:57', '2024-08-06', '11:43:11', '11:43:37', '00:00:26', '', '-', 'PRIORITAS'),
(39, '', '', 'MEJA', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '00:01:00', '2024-08-05', '14:51:37', '14:52:37', '00:01:00', '', '-', 'PRIORITAS'),
(40, '', '', 'YELLOW', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '13:00:00', '2024-08-05', '10:02:28', '10:07:14', '00:04:46', '', '-', 'PRIORITAS'),
(41, '', '', 'RED', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '09:00:00', '2024-08-05', '16:15:42', '16:17:24', '00:01:42', 'WAKTU KURANG <br> 8 jam, 58 menit,<br> 18 detik', '-', 'PRIORITAS'),
(42, '', '', 'GREEN', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '02:13:00', '2024-08-04', '10:44:39', '10:55:39', '00:11:00', 'WAKTU KURANG <br> 2 jam, 11 menit,<br> 24 detik', '-', 'PRIORITAS'),
(43, '', '', 'BLUE', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '01:00:00', '2024-08-01', '11:35:30', '11:35:35', '00:00:00', 'WAKTU KURANG <br> 0 jam, 59 menit,<br> 51 detik', '-', 'PRIORITAS'),
(44, '', '', 'BLACK', 'SKD61', 'POS 1', '3', 'G-2403-0044-3', '00:02:00', '2024-08-01', '11:38:44', '11:38:47', '00:00:04', 'WAKTU KURANG <br> 0 jam, 1 menit,<br> 47 detik', '-', 'PRIORITAS'),
(45, '', '', 'WHITE', 'M', 'POS 1', '3', 'G-2403-0044-3', '00:01:30', '2024-07-31', '13:26:14', '13:30:20', '00:04:06', 'WAKTU KURANG <br> 0 jam, 1 menit,<br> 3 detik', '-', 'PRIORITAS');

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
