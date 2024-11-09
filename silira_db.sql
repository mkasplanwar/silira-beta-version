-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2024 at 08:45 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `silira_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
`id` int(11) NOT NULL,
  `kategori_laporan` varchar(50) NOT NULL,
  `nama_pelapor` varchar(100) NOT NULL,
  `nim_nip` varchar(50) NOT NULL,
  `jurusan_instansi` varchar(100) NOT NULL,
  `no_wa` varchar(15) NOT NULL,
  `judul_laporan` varchar(255) NOT NULL,
  `isi_laporan` text NOT NULL,
  `waktu_laporan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `kategori_laporan`, `nama_pelapor`, `nim_nip`, `jurusan_instansi`, `no_wa`, `judul_laporan`, `isi_laporan`, `waktu_laporan`) VALUES
(1, 'Aspirasi', 'q', 'a', 'a', 'a', 'a', 'ad', '2024-09-27 02:56:40'),
(2, 'Aspirasi', 's', 'sd', 'sd', 'sf', 'sf', 'sf', '2024-09-27 03:00:34'),
(3, 'Aspirasi', '1', '1', '1', '1', '11', '1', '2024-09-30 06:22:28'),
(4, 'Aspirasi', '2', '2', '2', '2', '2', '2', '2024-09-30 06:32:46'),
(5, 'Aspirasi', '2', '2', '2', '2', '2', '2', '2024-09-30 06:33:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
