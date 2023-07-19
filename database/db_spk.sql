-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 19, 2023 at 03:32 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk`
--

-- --------------------------------------------------------

--
-- Table structure for table `pm_alternatif`
--

CREATE TABLE `pm_alternatif` (
  `id_alternatif` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pm_alternatif`
--

INSERT INTO `pm_alternatif` (`id_alternatif`, `nama`) VALUES
(8, 'Taqiudin Zarkasi, M.Pd'),
(9, 'Salman Al Farisi, S.Hi'),
(10, 'H. Safarwadi Akbar, S.S'),
(11, 'Muhammad Azmi, S.kom., M.Kom'),
(12, 'Ahmad Zakaria, S.Pd');

-- --------------------------------------------------------

--
-- Table structure for table `pm_aspek`
--

CREATE TABLE `pm_aspek` (
  `id_aspek` int(11) NOT NULL,
  `aspek` varchar(100) NOT NULL,
  `presentase` float NOT NULL,
  `bobot_core` float NOT NULL,
  `bobot_secondary` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pm_aspek`
--

INSERT INTO `pm_aspek` (`id_aspek`, `aspek`, `presentase`, `bobot_core`, `bobot_secondary`) VALUES
(1, 'Disiplin', 60, 80, 20),
(2, 'Kerjasama', 40, 80, 20);

-- --------------------------------------------------------

--
-- Table structure for table `pm_bobot`
--

CREATE TABLE `pm_bobot` (
  `selisih` int(11) NOT NULL,
  `bobot` float NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pm_bobot`
--

INSERT INTO `pm_bobot` (`selisih`, `bobot`, `keterangan`) VALUES
(-5, 0, 'Kurang Lima Tingkat'),
(-4, 1, 'Kurang Empat Tingkat'),
(-3, 2, 'Kurang Tiga Tingkat'),
(-2, 3, 'Kuarang Dua Tingkat'),
(-1, 4, 'Kurang Satu Tingkat'),
(0, 5, 'Tidak Ada Selisih '),
(1, 4.5, 'Lebih Satu Tingkat'),
(2, 3.5, 'Lebih Dua Tingkat'),
(3, 2.5, 'Lebih Tiga Tingkat'),
(4, 1.5, 'Lebih Empat Tingkat'),
(5, 0.5, 'Lebih Lima Tingkat');

-- --------------------------------------------------------

--
-- Table structure for table `pm_faktor`
--

CREATE TABLE `pm_faktor` (
  `id_faktor` int(11) NOT NULL,
  `id_aspek` int(11) NOT NULL,
  `faktor` varchar(30) NOT NULL,
  `target` int(11) NOT NULL,
  `type` set('core','secondary') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pm_faktor`
--

INSERT INTO `pm_faktor` (`id_faktor`, `id_aspek`, `faktor`, `target`, `type`) VALUES
(1, 1, 'D1 - Hadir Tepat Waktu', 5, 'core'),
(2, 1, 'D2 - Tanggung Jawab', 4, 'core'),
(3, 1, 'D3 - Berpakaian Rapi Dan Sopan', 3, 'core'),
(4, 2, 'K1 - Berpartisipasi Dan Berkon', 5, 'core'),
(5, 1, 'K2 - Aktif Dan Produktif', 4, 'core'),
(6, 1, 'K3 - Membantu Rekan Guru', 3, 'core');

-- --------------------------------------------------------

--
-- Table structure for table `pm_ranking`
--

CREATE TABLE `pm_ranking` (
  `id_alternatif` int(11) NOT NULL,
  `nilai_akhir` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pm_ranking`
--

INSERT INTO `pm_ranking` (`id_alternatif`, `nilai_akhir`) VALUES
(8, 4.5),
(9, 4.7),
(10, 4.34),
(11, 4.42),
(12, 4.54);

-- --------------------------------------------------------

--
-- Table structure for table `pm_sample`
--

CREATE TABLE `pm_sample` (
  `id_sample` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_faktor` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pm_sample`
--

INSERT INTO `pm_sample` (`id_sample`, `id_alternatif`, `id_faktor`, `value`) VALUES
(30, 8, 1, 5),
(31, 8, 2, 5),
(32, 8, 3, 5),
(33, 8, 4, 4),
(34, 8, 5, 4),
(35, 8, 6, 4),
(36, 9, 1, 5),
(37, 9, 2, 5),
(38, 9, 3, 4),
(39, 9, 4, 5),
(40, 9, 5, 4),
(41, 9, 6, 5),
(42, 10, 1, 5),
(43, 10, 2, 5),
(44, 10, 3, 5),
(45, 10, 4, 3),
(46, 10, 5, 4),
(47, 10, 6, 4),
(48, 11, 1, 5),
(49, 11, 2, 5),
(50, 11, 3, 5),
(51, 11, 4, 4),
(52, 11, 5, 5),
(53, 11, 6, 4),
(54, 12, 1, 5),
(55, 12, 2, 5),
(56, 12, 3, 4),
(57, 12, 4, 4),
(58, 12, 5, 5),
(59, 12, 6, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pm_alternatif`
--
ALTER TABLE `pm_alternatif`
  ADD PRIMARY KEY (`id_alternatif`);

--
-- Indexes for table `pm_aspek`
--
ALTER TABLE `pm_aspek`
  ADD PRIMARY KEY (`id_aspek`);

--
-- Indexes for table `pm_bobot`
--
ALTER TABLE `pm_bobot`
  ADD PRIMARY KEY (`selisih`);

--
-- Indexes for table `pm_faktor`
--
ALTER TABLE `pm_faktor`
  ADD PRIMARY KEY (`id_faktor`),
  ADD KEY `id_aspek` (`id_aspek`);

--
-- Indexes for table `pm_sample`
--
ALTER TABLE `pm_sample`
  ADD PRIMARY KEY (`id_sample`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pm_alternatif`
--
ALTER TABLE `pm_alternatif`
  MODIFY `id_alternatif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pm_aspek`
--
ALTER TABLE `pm_aspek`
  MODIFY `id_aspek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pm_faktor`
--
ALTER TABLE `pm_faktor`
  MODIFY `id_faktor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pm_sample`
--
ALTER TABLE `pm_sample`
  MODIFY `id_sample` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pm_faktor`
--
ALTER TABLE `pm_faktor`
  ADD CONSTRAINT `pm_faktor_ibfk_1` FOREIGN KEY (`id_aspek`) REFERENCES `pm_aspek` (`id_aspek`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
