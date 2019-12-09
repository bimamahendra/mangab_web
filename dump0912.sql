-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 09 Des 2019 pada 10.06
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

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
-- Struktur dari tabel `absen`
--

CREATE TABLE `absen` (
  `ID_ABSEN` int(11) NOT NULL,
  `ID_MATKUL` int(11) DEFAULT NULL,
  `TOPIK` varchar(30) NOT NULL,
  `RUANGAN_ABSEN` varchar(5) DEFAULT NULL,
  `DATE_ABSEN` date DEFAULT NULL,
  `TIME_ABSEN` varchar(10) DEFAULT NULL,
  `TS_ABSEN` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ambilmk`
--

CREATE TABLE `ambilmk` (
  `ID_AMBILMK` int(11) NOT NULL,
  `NRP_MHS` int(11) NOT NULL,
  `ID_MATKUL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `ambilmk`
--

INSERT INTO `ambilmk` (`ID_AMBILMK`, `NRP_MHS`, `ID_MATKUL`) VALUES
(1, 171111079, 1),
(2, 171111079, 2),
(3, 171111079, 4),
(4, 171111109, 1),
(5, 171111109, 3),
(6, 171111109, 4),
(7, 191116027, 1),
(8, 191116027, 4),
(9, 191116027, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_absen`
--

CREATE TABLE `detail_absen` (
  `ID_DETABSEN` int(11) NOT NULL,
  `ID_ABSEN` int(11) NOT NULL,
  `NRP_MHS` int(11) NOT NULL,
  `STATUS_DETABSEN` varchar(1) DEFAULT NULL,
  `TS_DETABSEN` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `NIP_DOSEN` int(11) NOT NULL,
  `PASS_DOSEN` varchar(25) DEFAULT NULL,
  `NAMA_DOSEN` varchar(50) DEFAULT NULL,
  `EMAIL_DOSEN` varchar(25) DEFAULT NULL,
  `STATUS_LOGIN` int(11) DEFAULT NULL,
  `STATUS_PASS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`NIP_DOSEN`, `PASS_DOSEN`, `NAMA_DOSEN`, `EMAIL_DOSEN`, `STATUS_LOGIN`, `STATUS_PASS`) VALUES
(10134, 'stikimalang', 'Chaulina Alfianti Oktavia, S.Kom, M.T', 'chaulina@stiki.ac.id', 0, 0),
(10163, 'stikimalang', 'Bagus Kristomoyo Kristanto, S.Kom., M.MT', 'bagus.kristanto@stiki.ac.', 0, 0),
(40016, 'stikimalang', 'Rakhmad Maulidi, S.Kom., M.Kom', 'maulidi@stiki.ac.id', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `NRP_MHS` int(11) NOT NULL,
  `PASS_MHS` varchar(25) DEFAULT NULL,
  `NAMA_MHS` varchar(50) DEFAULT NULL,
  `EMAIL_MHS` varchar(25) DEFAULT NULL,
  `ID_DEVICE` varchar(25) DEFAULT NULL,
  `STATUS_LOGIN` int(11) DEFAULT NULL,
  `STATUS_PASS` int(11) DEFAULT NULL,
  `LAST_LOGOUT` bigint(15) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`NRP_MHS`, `PASS_MHS`, `NAMA_MHS`, `EMAIL_MHS`, `ID_DEVICE`, `STATUS_LOGIN`, `STATUS_PASS`, `LAST_LOGOUT`) VALUES
(171111079, 'stikimalang', 'Muhammad Reyhan Firnas Adani', '171111079@mhs.stiki.ac.id', NULL, 0, 0, 0),
(171111109, 'stikimalang', 'Nanda Bima Mahendra', '171111109@mhs.stiki.ac.id', NULL, 0, 0, 0),
(191116027, 'stikimalang', 'M Irfan Alfiansyah', '191116027@mhs.stiki.ac.id', NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkul`
--

CREATE TABLE `matkul` (
  `ID_MATKUL` int(11) NOT NULL,
  `NIP_DOSEN` int(11) DEFAULT NULL,
  `KODE_MATKUL` varchar(10) DEFAULT NULL,
  `NAMA_MATKUL` varchar(50) DEFAULT NULL,
  `KELAS_MATKUL` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `matkul`
--

INSERT INTO `matkul` (`ID_MATKUL`, `NIP_DOSEN`, `KODE_MATKUL`, `NAMA_MATKUL`, `KELAS_MATKUL`) VALUES
(1, 10163, 'TI14KB65', 'KOMPUTASI AWAN', 'A'),
(2, 10134, '	TI14KB51', 'PEMROGRAMAN PERANGKAT BERGERAK', 'C'),
(3, 10134, 'TI14KB51', 'PEMROGRAMAN PERANGKAT BERGERAK', 'D'),
(4, 40016, 'TI14KB53', 'PEMROGRAMAN WEB LANJUT', 'A'),
(5, 40016, 'TI14KB53', 'PEMROGRAMAN WEB LANJUT', 'C');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`ID_ABSEN`) USING BTREE;

--
-- Indeks untuk tabel `ambilmk`
--
ALTER TABLE `ambilmk`
  ADD PRIMARY KEY (`ID_AMBILMK`) USING BTREE,
  ADD KEY `FK_RELATIONSHIP_3` (`NRP_MHS`) USING BTREE;

--
-- Indeks untuk tabel `detail_absen`
--
ALTER TABLE `detail_absen`
  ADD PRIMARY KEY (`ID_DETABSEN`) USING BTREE;

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`NIP_DOSEN`) USING BTREE;

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`NRP_MHS`) USING BTREE;

--
-- Indeks untuk tabel `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`ID_MATKUL`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `absen`
--
ALTER TABLE `absen`
  MODIFY `ID_ABSEN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ambilmk`
--
ALTER TABLE `ambilmk`
  MODIFY `ID_AMBILMK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `detail_absen`
--
ALTER TABLE `detail_absen`
  MODIFY `ID_DETABSEN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `matkul`
--
ALTER TABLE `matkul`
  MODIFY `ID_MATKUL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `ambilmk`
--
ALTER TABLE `ambilmk`
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`NRP_MHS`) REFERENCES `mahasiswa` (`NRP_MHS`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
