-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2020 at 07:59 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mangab`
--

-- --------------------------------------------------------

--
-- Table structure for table `absen`
--

CREATE TABLE `absen` (
  `ID_ABSEN` int(11) NOT NULL,
  `ID_MATKUL` int(11) DEFAULT NULL,
  `TOPIK` varchar(30) NOT NULL,
  `RUANGAN_ABSEN` varchar(5) DEFAULT NULL,
  `DATE_ABSEN` date DEFAULT NULL,
  `TIME_ABSEN` varchar(10) DEFAULT NULL,
  `TS_ABSEN` datetime DEFAULT NULL,
  `NOTE` varchar(255) DEFAULT NULL,
  `STATUS_ABSEN` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `absen`
--

INSERT INTO `absen` (`ID_ABSEN`, `ID_MATKUL`, `TOPIK`, `RUANGAN_ABSEN`, `DATE_ABSEN`, `TIME_ABSEN`, `TS_ABSEN`, `NOTE`, `STATUS_ABSEN`) VALUES
(1, 6, 'Reproduksi', 'A11', '2019-12-16', '20:59', '2019-12-16 20:59:18', 'oalah tempek', 2),
(2, 2, 'Aaaa', 'A3', '2019-12-16', '21:08', '2019-12-16 21:08:59', NULL, 0),
(3, 6, 'Afwde', 'A2', '2019-12-16', '21:11', '2019-12-16 21:11:51', NULL, 0),
(4, 6, 'Fnskf', 'A4', '2019-12-16', '21:13', '2019-12-16 21:13:12', NULL, 0),
(5, 6, 'Aaaa', 'A43', '2019-12-16', '21:17', '2019-12-16 21:17:18', NULL, 0),
(6, 6, 'bfid', 'A34', '2019-12-16', '21:18', '2019-12-16 21:18:02', NULL, 0),
(7, 3, 'Mamakbiyak', 'A22', '2019-12-16', '21:53', '2019-12-16 21:53:16', '', 2),
(8, 2, 'K&2', 'VIP', '2019-12-16', '22:03', '2019-12-16 22:03:12', 'woii', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ambilmk`
--

CREATE TABLE `ambilmk` (
  `ID_AMBILMK` int(11) NOT NULL,
  `NRP_MHS` int(11) NOT NULL,
  `ID_MATKUL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `ambilmk`
--

INSERT INTO `ambilmk` (`ID_AMBILMK`, `NRP_MHS`, `ID_MATKUL`) VALUES
(1, 171111079, 1),
(3, 171111079, 3),
(4, 171111079, 4),
(5, 171111079, 5),
(6, 171111079, 6),
(7, 171111109, 1),
(8, 171111109, 2),
(9, 171111109, 3),
(10, 171111109, 4),
(11, 171111109, 5),
(12, 171111109, 6),
(13, 123456789, 1),
(14, 123456789, 2),
(15, 123456789, 3),
(16, 123456789, 4),
(17, 123456789, 5),
(18, 123456789, 6),
(19, 171111001, 1),
(20, 171111001, 2),
(21, 171111001, 3),
(22, 171111001, 4),
(23, 171111001, 5),
(24, 171111001, 6),
(25, 171111067, 1),
(26, 171111067, 2),
(27, 171111067, 3),
(28, 171111067, 4),
(29, 171111067, 5),
(30, 171111067, 6),
(31, 171111045, 1),
(32, 171111045, 2),
(33, 171111045, 3),
(34, 171111045, 4),
(35, 171111045, 5),
(36, 171111045, 6),
(37, 171111038, 1),
(38, 171111038, 2),
(39, 171111038, 3),
(40, 171111038, 4),
(41, 171111038, 5),
(42, 171111038, 6),
(43, 171111034, 1),
(44, 171111034, 2),
(45, 171111034, 3),
(46, 171111034, 4),
(47, 171111034, 5),
(48, 171111034, 6),
(49, 171111027, 1),
(50, 171111027, 2),
(51, 171111027, 3),
(52, 171111027, 4),
(53, 171111027, 5),
(54, 171111027, 6),
(55, 171111020, 1),
(56, 171111020, 2),
(57, 171111020, 3),
(58, 171111020, 4),
(59, 171111020, 5),
(60, 171111020, 6);

-- --------------------------------------------------------

--
-- Table structure for table `detail_absen`
--

CREATE TABLE `detail_absen` (
  `ID_DETABSEN` int(11) NOT NULL,
  `ID_ABSEN` int(11) NOT NULL,
  `NRP_MHS` int(11) NOT NULL,
  `STATUS_DETABSEN` varchar(1) DEFAULT NULL,
  `TS_DETABSEN` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `detail_absen`
--

INSERT INTO `detail_absen` (`ID_DETABSEN`, `ID_ABSEN`, `NRP_MHS`, `STATUS_DETABSEN`, `TS_DETABSEN`) VALUES
(1, 1, 171111079, '1', '2019-12-16 07:03:08'),
(2, 1, 171111109, '1', '2019-12-16 06:59:48'),
(3, 1, 123456789, '1', '2019-12-16 06:59:24'),
(4, 1, 171111001, '0', '2019-12-16 13:59:18'),
(5, 1, 171111067, '0', '2019-12-16 13:59:18'),
(6, 1, 171111045, '0', '2019-12-16 13:59:18'),
(7, 1, 171111038, '0', '2019-12-16 13:59:18'),
(8, 1, 171111034, '0', '2019-12-16 13:59:18'),
(9, 1, 171111027, '3', '2019-12-16 07:04:35'),
(10, 1, 171111020, '2', '2019-12-16 07:04:29'),
(11, 2, 171111079, '0', '2019-12-16 14:08:59'),
(12, 2, 171111109, '0', '2019-12-16 14:08:59'),
(13, 2, 123456789, '0', '2019-12-16 14:08:59'),
(14, 2, 171111001, '0', '2019-12-16 14:08:59'),
(15, 2, 171111067, '0', '2019-12-16 14:08:59'),
(16, 2, 171111045, '0', '2019-12-16 14:08:59'),
(17, 2, 171111038, '0', '2019-12-16 14:08:59'),
(18, 2, 171111034, '0', '2019-12-16 14:08:59'),
(19, 2, 171111027, '0', '2019-12-16 14:08:59'),
(20, 2, 171111020, '0', '2019-12-16 14:08:59'),
(21, 3, 171111079, '1', '2019-12-16 07:11:55'),
(22, 3, 171111109, '0', '2019-12-16 14:11:51'),
(23, 3, 123456789, '0', '2019-12-16 14:11:51'),
(24, 3, 171111001, '0', '2019-12-16 14:11:51'),
(25, 3, 171111067, '0', '2019-12-16 14:11:51'),
(26, 3, 171111045, '0', '2019-12-16 14:11:51'),
(27, 3, 171111038, '0', '2019-12-16 14:11:51'),
(28, 3, 171111034, '0', '2019-12-16 14:11:51'),
(29, 3, 171111027, '0', '2019-12-16 14:11:51'),
(30, 3, 171111020, '0', '2019-12-16 14:11:51'),
(31, 4, 171111079, '0', '2019-12-16 14:13:12'),
(32, 4, 171111109, '0', '2019-12-16 14:13:12'),
(33, 4, 123456789, '0', '2019-12-16 14:13:12'),
(34, 4, 171111001, '0', '2019-12-16 14:13:12'),
(35, 4, 171111067, '0', '2019-12-16 14:13:12'),
(36, 4, 171111045, '0', '2019-12-16 14:13:12'),
(37, 4, 171111038, '0', '2019-12-16 14:13:12'),
(38, 4, 171111034, '0', '2019-12-16 14:13:12'),
(39, 4, 171111027, '0', '2019-12-16 14:13:12'),
(40, 4, 171111020, '0', '2019-12-16 14:13:12'),
(41, 5, 171111079, '0', '2019-12-16 14:17:18'),
(42, 5, 171111109, '0', '2019-12-16 14:17:18'),
(43, 5, 123456789, '0', '2019-12-16 14:17:18'),
(44, 5, 171111001, '0', '2019-12-16 14:17:18'),
(45, 5, 171111067, '0', '2019-12-16 14:17:18'),
(46, 5, 171111045, '0', '2019-12-16 14:17:18'),
(47, 5, 171111038, '0', '2019-12-16 14:17:18'),
(48, 5, 171111034, '0', '2019-12-16 14:17:18'),
(49, 5, 171111027, '0', '2019-12-16 14:17:18'),
(50, 5, 171111020, '0', '2019-12-16 14:17:18'),
(51, 6, 171111079, '1', '2019-12-16 07:18:18'),
(52, 6, 171111109, '0', '2019-12-16 14:18:02'),
(53, 6, 123456789, '0', '2019-12-16 14:18:02'),
(54, 6, 171111001, '0', '2019-12-16 14:18:02'),
(55, 6, 171111067, '0', '2019-12-16 14:18:02'),
(56, 6, 171111045, '0', '2019-12-16 14:18:02'),
(57, 6, 171111038, '0', '2019-12-16 14:18:02'),
(58, 6, 171111034, '0', '2019-12-16 14:18:02'),
(59, 6, 171111027, '0', '2019-12-16 14:18:02'),
(60, 6, 171111020, '0', '2019-12-16 14:18:02'),
(61, 7, 171111079, '1', '2019-12-16 07:54:01'),
(62, 7, 171111109, '1', '2019-12-16 07:53:38'),
(63, 7, 123456789, '1', '2019-12-16 07:53:32'),
(64, 7, 171111001, '3', '2019-12-16 07:54:55'),
(65, 7, 171111067, '0', '2019-12-16 14:53:16'),
(66, 7, 171111045, '0', '2019-12-16 14:53:16'),
(67, 7, 171111038, '0', '2019-12-16 14:53:16'),
(68, 7, 171111034, '0', '2019-12-16 14:53:16'),
(69, 7, 171111027, '0', '2019-12-16 14:53:16'),
(70, 7, 171111020, '2', '2019-12-16 07:55:04'),
(71, 8, 171111109, '1', '2019-12-16 15:04:21'),
(72, 8, 123456789, '1', '2019-12-16 15:04:02'),
(73, 8, 171111001, '0', '2019-12-16 15:03:12'),
(74, 8, 171111067, '0', '2019-12-16 15:03:12'),
(75, 8, 171111045, '0', '2019-12-16 15:03:12'),
(76, 8, 171111038, '0', '2019-12-16 15:03:12'),
(77, 8, 171111034, '0', '2019-12-16 15:03:12'),
(78, 8, 171111027, '0', '2019-12-16 15:03:12'),
(79, 8, 171111020, '0', '2019-12-16 15:03:12');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `NIP_DOSEN` int(11) NOT NULL,
  `PASS_DOSEN` varchar(25) DEFAULT NULL,
  `NAMA_DOSEN` varchar(50) DEFAULT NULL,
  `EMAIL_DOSEN` varchar(50) DEFAULT NULL,
  `STATUS_LOGIN` int(11) DEFAULT NULL,
  `STATUS_PASS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`NIP_DOSEN`, `PASS_DOSEN`, `NAMA_DOSEN`, `EMAIL_DOSEN`, `STATUS_LOGIN`, `STATUS_PASS`) VALUES
(10134, 'bambang', 'Chaulina Alfianti Oktavia, S.Kom, M.T', 'chaulina@stiki.ac.id', 1, 1),
(10163, 'stikimalang', 'Bagus Kristomoyo Kristanto, S.Kom., M.MT', 'bagus.kristanto@stiki.ac.id', 0, 0),
(40016, 'stikimalang', 'Rakhmad Maulidi, S.Kom., M.Kom', 'maulidi@stiki.ac.id', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NRP_MHS` int(11) NOT NULL,
  `PASS_MHS` varchar(25) DEFAULT NULL,
  `NAMA_MHS` varchar(50) DEFAULT NULL,
  `EMAIL_MHS` varchar(25) DEFAULT NULL,
  `ID_DEVICE` varchar(25) DEFAULT NULL,
  `STATUS_LOGIN` int(11) DEFAULT NULL,
  `STATUS_PASS` int(11) DEFAULT NULL,
  `LAST_LOGOUT` bigint(15) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`NRP_MHS`, `PASS_MHS`, `NAMA_MHS`, `EMAIL_MHS`, `ID_DEVICE`, `STATUS_LOGIN`, `STATUS_PASS`, `LAST_LOGOUT`) VALUES
(123456789, 'irfan', 'Irfan Alfiansyah', '123456789@mhs.stiki.ac.id', '352691097007181', 1, 1, 1576505488074),
(171111001, 'stikimalang', 'Thomas Kristanto Wijaya', '171111001@mhs.stiki.ac.id', NULL, 0, 0, NULL),
(171111020, 'stikimalang', 'Ade Ramadhana Pratama', '171111020@mhs.stiki.ac.id', NULL, 0, 0, NULL),
(171111027, 'stikimalang', 'Mohammad Nur Ali Furqon', '171111027@mhs.stiki.ac.id', NULL, 0, 0, NULL),
(171111034, 'stikimalang', 'Rizky Galuh Dewantara', '171111034@mhs.stiki.ac.id', NULL, 0, 0, NULL),
(171111038, 'stikimalang', 'Aldino Wildhan Kurniawan', '171111038@mhs.stiki.ac.id', NULL, 0, 0, NULL),
(171111045, 'stikimalang', 'Tito Ainurrakhman', '171111045@mhs.stiki.ac.id', NULL, 0, 0, NULL),
(171111067, 'stikimalang', 'Anggoro Yudhistira Putra', '171111067@mhs.stiki.ac.id', NULL, 0, 0, NULL),
(171111079, 'muraf212', 'Muhammad Reyhan Firnas Adani', '171111079@mhs.stiki.ac.id', '863147043360549', 0, 1, 1576508799517),
(171111109, 's4ishoku', 'Nanda Bima Mahendra', '171111109@mhs.stiki.ac.id', '866589035673883', 1, 1, 1576504566217);

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `ID_MATKUL` int(11) NOT NULL,
  `NIP_DOSEN` int(11) DEFAULT NULL,
  `KODE_MATKUL` varchar(10) DEFAULT NULL,
  `NAMA_MATKUL` varchar(50) DEFAULT NULL,
  `KELAS_MATKUL` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`ID_MATKUL`, `NIP_DOSEN`, `KODE_MATKUL`, `NAMA_MATKUL`, `KELAS_MATKUL`) VALUES
(1, 10163, 'TI14KB65', 'KOMPUTASI AWAN', 'A'),
(2, 10134, 'TI14KB51', 'PEMROGRAMAN PERANGKAT BERGERAK', 'C'),
(3, 10134, 'TI14KB51', 'PEMROGRAMAN PERANGKAT BERGERAK', 'D'),
(4, 40016, 'TI14KB53', 'PEMROGRAMAN WEB LANJUT', 'A'),
(5, 40016, 'TI14KB53', 'PEMROGRAMAN WEB LANJUT', 'C'),
(6, 10134, 'TI14KB52', 'MATEMATIKA DISKRIT', 'C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`ID_ABSEN`) USING BTREE;

--
-- Indexes for table `ambilmk`
--
ALTER TABLE `ambilmk`
  ADD PRIMARY KEY (`ID_AMBILMK`) USING BTREE,
  ADD KEY `FK_RELATIONSHIP_3` (`NRP_MHS`) USING BTREE,
  ADD KEY `fk_foreign_key_idmk` (`ID_MATKUL`);

--
-- Indexes for table `detail_absen`
--
ALTER TABLE `detail_absen`
  ADD PRIMARY KEY (`ID_DETABSEN`) USING BTREE;

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`NIP_DOSEN`) USING BTREE;

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NRP_MHS`) USING BTREE;

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`ID_MATKUL`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `ID_ABSEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ambilmk`
--
ALTER TABLE `ambilmk`
  MODIFY `ID_AMBILMK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `detail_absen`
--
ALTER TABLE `detail_absen`
  MODIFY `ID_DETABSEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `matkul`
--
ALTER TABLE `matkul`
  MODIFY `ID_MATKUL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ambilmk`
--
ALTER TABLE `ambilmk`
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`NRP_MHS`) REFERENCES `mahasiswa` (`NRP_MHS`),
  ADD CONSTRAINT `fk_foreign_key_idmk` FOREIGN KEY (`ID_MATKUL`) REFERENCES `matkul` (`ID_MATKUL`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
