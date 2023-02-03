-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 03, 2023 at 05:23 PM
-- Server version: 5.7.24
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_buku`
--

CREATE TABLE `tabel_buku` (
  `ID_Buku` varchar(6) NOT NULL,
  `Kategori` varchar(25) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Harga` int(11) NOT NULL,
  `Stok` int(9) NOT NULL,
  `Penerbit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_buku`
--

INSERT INTO `tabel_buku` (`ID_Buku`, `Kategori`, `Nama`, `Harga`, `Stok`, `Penerbit`) VALUES
('B1001', 'Bisnis', 'Bisnis Online', 75000, 9, 'Penerbit Informatika'),
('B1002', 'Bisnis', 'Etika Bisnis dan Tanggung Jawab Sosial', 67500, 20, 'Penerbit Informatika'),
('K1001', 'Keilmuan', 'Analisis & Perancangan Sistem Informasi', 50000, 60, 'Penerbit Informatika'),
('K1002', 'Keilmuan', 'Artifical Intelligence', 45000, 60, 'Penerbit Informatika'),
('K2003', 'Keilmuan', 'Autocad 3 Dimensi', 40000, 25, 'Penerbit Informatika'),
('K3004', 'Keilmuan', 'Cloud Computing Technology', 85000, 15, 'Penerbit Informatika'),
('N1001', 'Novel', 'Cahaya Di Penjuru Hati', 68000, 10, 'Andi Offset'),
('N1002', 'Novel', 'Aku Ingin Cerita', 48000, 12, 'Danendra');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_penerbit`
--

CREATE TABLE `tabel_penerbit` (
  `ID_Penerbit` varchar(6) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Alamat` text NOT NULL,
  `Kota` varchar(30) NOT NULL,
  `Telepon` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_penerbit`
--

INSERT INTO `tabel_penerbit` (`ID_Penerbit`, `Nama`, `Alamat`, `Kota`, `Telepon`) VALUES
('SP01', 'Penerbit Informatika', 'Jl. Buah Batu No. 121', 'Bandung', '081322201946'),
('SP02', 'Andi Offset', 'Jl. Suryalaya IX No.3', 'Bandung', '087839030688'),
('SP03', 'Danendra', 'Jl Moch. Toha 44', 'Bandung', '0225201215');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_buku`
--
ALTER TABLE `tabel_buku`
  ADD PRIMARY KEY (`ID_Buku`);

--
-- Indexes for table `tabel_penerbit`
--
ALTER TABLE `tabel_penerbit`
  ADD PRIMARY KEY (`ID_Penerbit`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
