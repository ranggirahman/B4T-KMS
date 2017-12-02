-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2017 at 03:48 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kms`
--

-- --------------------------------------------------------

--
-- Table structure for table `filelib`
--

CREATE TABLE `filelib` (
  `fileid` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `ownerid` varchar(40) NOT NULL,
  `download` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filelib`
--

INSERT INTO `filelib` (`fileid`, `filename`, `ownerid`, `download`) VALUES
(1, 'Optimalisasi Mesin Produksi.pdf', 'ranggi', 0),
(2, 'Penerapan Metode Pada Mesin CNC.pdf', 'ranggi', 0),
(3, 'Penggunaan Data Sebelum Produksi Untuk Produk Kecil.pdf', 'ranggi', 0),
(4, 'Perbandingan Efektifitas Mesin Industri Terhadap Kinerja.pdf', 'ranggi', 0),
(5, 'Rekayasa Pengolahan Bahan Logam.pdf', 'ranggi', 0),
(6, 'Hasil Produksi.pdf', 'ranggi', 0),
(7, 'Hasil Studi Kasus.pdf', 'ranggi', 0),
(8, 'Perbandingan Efektifitas Mesin Industri Terhadap Kinerja.pdf', 'ranggi', 0),
(9, 'Perbandingan Produksi.pdf', 'ranggi', 0),
(10, 'Rekayasa Pengolahan Bahan Logam.pdf', 'ranggi', 0),
(11, 'Cara Memperbaiki Mesin Yang Rusak.pdf', 'ranggi', 0),
(12, 'Menggunakan Mesin Produksi Yang Baik.pdf', 'ranggi', 0),
(13, 'Penggunaan Alat Keselamatan.pdf', 'ranggi', 0),
(14, 'Perbaikan Ruang Udara.pdf', 'ranggi', 0),
(15, 'Kondisi Ruang Produksi.pdf', 'ranggi', 0),
(16, 'Pratinjau Lapangan.pdf', 'ranggi', 0),
(17, 'Produksi Produkti Obs.pdf', 'ranggi', 0),
(19, 'Rekayasa Produk.pdf', 'ranggi', 0),
(20, 'Studi Lapangan Industri Pangan.pdf', 'ranggi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `learn`
--

CREATE TABLE `learn` (
  `learnid` int(11) NOT NULL,
  `learntitle` varchar(100) NOT NULL,
  `ownerid` varchar(40) NOT NULL,
  `watch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `learn`
--

INSERT INTO `learn` (`learnid`, `learntitle`, `ownerid`, `watch`) VALUES
(1, 'Google Glass How to Getting Started', 'ranggi', 5),
(2, 'Introducing Glowforge - The 3D Laser Printer', 'ranggi', 0),
(3, 'Volvo Trucks - The Epic Split feat. Van Damme', 'ranggi', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(40) NOT NULL,
  `usertype` int(11) NOT NULL,
  `password` varchar(10) NOT NULL,
  `division` varchar(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `reward` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `usertype`, `password`, `division`, `nama`, `reward`) VALUES
('dewi', 2, 'dewi', 'Tata Usaha', 'Dewi', 0),
('lingga', 2, 'lingga', 'IS', 'Lingga Setyagusti', 0),
('ranggi', 2, 'ranggi', 'IT', 'Ranggi Rahman', 5555),
('test', 2, 'test', 'Tata Usaha', 'Ibu Dewi', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filelib`
--
ALTER TABLE `filelib`
  ADD PRIMARY KEY (`fileid`);

--
-- Indexes for table `learn`
--
ALTER TABLE `learn`
  ADD PRIMARY KEY (`learnid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `filelib`
--
ALTER TABLE `filelib`
  MODIFY `fileid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `learn`
--
ALTER TABLE `learn`
  MODIFY `learnid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
