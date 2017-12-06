-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2017 at 07:51 PM
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
  `filedir` varchar(300) NOT NULL,
  `ownerid` varchar(40) NOT NULL,
  `download` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `filelib`
--

INSERT INTO `filelib` (`fileid`, `filename`, `filedir`, `ownerid`, `download`) VALUES
(1, 'Optimalisasi Mesin Produksi.pdf', 'user/filelib/dokumen_penelitian/', 'ranggi', 0),
(2, 'Penerapan Metode Pada Mesin CNC.pdf', 'user/filelib/dokumen_penelitian/', 'ranggi', 0),
(3, 'Penggunaan Data Sebelum Produksi Untuk Produk Kecil.pdf', 'user/filelib/dokumen_penelitian/', 'ranggi', 0),
(4, 'Perbandingan Efektifitas Mesin Industri Terhadap Kinerja.pdf', 'user/filelib/dokumen_penelitian/', 'ranggi', 0),
(5, 'Rekayasa Pengolahan Bahan Logam.pdf', 'user/filelib/dokumen_penelitian/', 'ranggi', 0),
(6, 'Hasil Produksi.pdf', 'user/filelib/dokumentasi_kerja/', 'ranggi', 0),
(7, 'Hasil Studi Kasus.pdf', 'user/filelib/dokumentasi_kerja/', 'ranggi', 0),
(8, 'Perbandingan Efektifitas Mesin Industri Terhadap Kinerja.pdf', 'user/filelib/dokumentasi_kerja/', 'ranggi', 0),
(9, 'Perbandingan Produksi.pdf', 'user/filelib/dokumentasi_kerja/', 'ranggi', 0),
(10, 'Rekayasa Pengolahan Bahan Logam.pdf', 'user/filelib/dokumentasi_kerja/', 'ranggi', 0),
(11, 'Cara Memperbaiki Mesin Yang Rusak.pdf', 'user/filelib/panduan_kerja/', 'ranggi', 0),
(12, 'Menggunakan Mesin Produksi Yang Baik.pdf', 'user/filelib/panduan_kerja/', 'ranggi', 0),
(13, 'Penggunaan Alat Keselamatan.pdf', 'user/filelib/panduan_kerja/', 'ranggi', 0),
(14, 'Perbaikan Ruang Udara.pdf', 'user/filelib/panduan_kerja/', 'ranggi', 0),
(15, 'Kondisi Ruang Produksi.pdf', 'user/filelib/praktik_kerja/', 'ranggi', 0),
(16, 'Pratinjau Lapangan.pdf', 'user/filelib/praktik_kerja/', 'ranggi', 0),
(17, 'Produksi Produkti Obs.pdf', 'user/filelib/praktik_kerja/', 'ranggi', 0),
(19, 'Rekayasa Produk.pdf', 'user/filelib/praktik_kerja/', 'ranggi', 0),
(20, 'Studi Lapangan Industri Pangan.pdf', 'user/filelib/praktik_kerja/', 'ranggi', 0),
(21, 'emile-perron-190221.jpg', '', 'ranggi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `forumid` int(11) NOT NULL,
  `owner` varchar(40) NOT NULL,
  `forumtitle` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `forumcontent` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`forumid`, `owner`, `forumtitle`, `category`, `forumcontent`) VALUES
(1, 'ranggi', 'Lorem Ipsum', 'Teknologi Informasi', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC.'),
(2, 'ranggi', 'Test Post', 'Teknologi Informasi', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.\r\nPellentesque vitae quam vitae magna euismod facilisis.\r\nNam quis eros viverra arcu elementum blandit.\r\nEtiam ac nulla non diam vehicula consequat in sed magna.\r\nMaecenas et odio vitae dui laoreet scelerisque a id massa.\r\nAenean in justo maximus, convallis odio ut, placerat odio.\r\nNullam non tellus pharetra, vehicula ex et, dapibus ligula.\r\nProin in dui ac urna viverra malesuada sed at lorem.\r\nMaecenas vitae eros non massa fermentum finibus auctor quis leo.\r\nIn nec leo vel augue cursus sodales.\r\nInteger eu nisi a nisi efficitur molestie at dignissim nisi.\r\nNam eu diam euismod, feugiat velit ac, pretium dui.\r\nCras pulvinar nisi ut consectetur sollicitudin.'),
(3, 'ranggi', 'Read This !', 'Sistem Informasi', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you '),
(4, 'ranggi', 'Mesin', 'Teknik Mesin', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words,'),
(5, 'ranggi', 'Pembukuan, Pemberkasan', 'Administrasi', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don''t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn''t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words,');

-- --------------------------------------------------------

--
-- Table structure for table `forum_response`
--

CREATE TABLE `forum_response` (
  `forumresid` int(11) NOT NULL,
  `forumid` int(11) NOT NULL,
  `resusername` varchar(40) NOT NULL,
  `resnama` varchar(40) NOT NULL,
  `comment` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `forum_response`
--

INSERT INTO `forum_response` (`forumresid`, `forumid`, `resusername`, `resnama`, `comment`) VALUES
(1, 1, 'ranggi', 'Ranggi Rahman', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.'),
(2, 1, 'mela', 'Mela Dewi', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `learn`
--

CREATE TABLE `learn` (
  `learnid` int(11) NOT NULL,
  `learntitle` varchar(100) NOT NULL,
  `ownerid` varchar(40) NOT NULL,
  `learndir` varchar(300) NOT NULL,
  `description` longtext NOT NULL,
  `watch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `learn`
--

INSERT INTO `learn` (`learnid`, `learntitle`, `ownerid`, `learndir`, `description`, `watch`) VALUES
(1, 'Google Glass How to Getting Started', 'ranggi', 'user/learn/panduan_kerja/', '', 232),
(2, 'Introducing Glowforge - The 3D Laser Printer', 'ranggi', 'user/learn/praktik_kerja/', '', 1),
(3, 'Volvo Trucks - The Epic Split feat. Van Damme', 'ranggi', 'user/learn/panduan_kerja/', '', 10),
(5, 'Social Media Platforms Are All Copycats', 'ranggi', 'user/learn/dokumen_penelitian/', '', 7),
(6, 'Dolby Digital - HD Surround Sound Test', 'ranggi', 'user/learn/dokumentasi_kerja/', '', 0),
(7, 'GALAXY S4 Official TVC - Group Play (Share Music)', 'ranggi', 'user/learn/panduan_kerja/', '', 61);

-- --------------------------------------------------------

--
-- Table structure for table `learn_response`
--

CREATE TABLE `learn_response` (
  `learnresid` int(11) NOT NULL,
  `learnid` int(11) NOT NULL,
  `resusername` varchar(40) NOT NULL,
  `resnama` varchar(40) NOT NULL,
  `comment` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `learn_response`
--

INSERT INTO `learn_response` (`learnresid`, `learnid`, `resusername`, `resnama`, `comment`) VALUES
(1, 1, 'ranggi', 'Ranggi Rahman', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.'),
(2, 1, 'lingga', 'Lingga Setyagusti', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English.'),
(18, 1, 'ranggi', 'Ranggi Rahman', 'Test Comment '),
(19, 5, 'ranggi', 'Ranggi Rahman', 'Test'),
(20, 7, 'mela', 'Mela Dewi', 'Hallo'),
(21, 7, 'ranggi', 'Ranggi Rahman', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.'),
(22, 1, 'ranggi', 'Ranggi Rahman', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC.'),
(23, 1, 'ranggi', 'Ranggi Rahman', 'Test');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE `photo` (
  `photoid` int(11) NOT NULL,
  `photoname` varchar(100) NOT NULL,
  `photodir` varchar(300) NOT NULL,
  `ownerid` varchar(40) NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photo`
--

INSERT INTO `photo` (`photoid`, `photoname`, `photodir`, `ownerid`, `view`) VALUES
(1, 'Panduan Tataletak.jpg', '', 'ranggi', 0),
(3, 'Coding.jpg', '', 'ranggi', 0);

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
('lingga', 2, 'lingga', 'Sistem Informasi', 'Lingga Setyagusti', 0),
('mela', 2, 'mela', 'Tata Usaha', 'Mela Dewi', 100),
('ranggi', 2, 'ranggi', 'Teknologi Informasi', 'Ranggi Rahman', 10094);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `filelib`
--
ALTER TABLE `filelib`
  ADD PRIMARY KEY (`fileid`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`forumid`);

--
-- Indexes for table `forum_response`
--
ALTER TABLE `forum_response`
  ADD PRIMARY KEY (`forumresid`);

--
-- Indexes for table `learn`
--
ALTER TABLE `learn`
  ADD PRIMARY KEY (`learnid`);

--
-- Indexes for table `learn_response`
--
ALTER TABLE `learn_response`
  ADD PRIMARY KEY (`learnresid`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`photoid`);

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
  MODIFY `fileid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `forumid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `forum_response`
--
ALTER TABLE `forum_response`
  MODIFY `forumresid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `learn`
--
ALTER TABLE `learn`
  MODIFY `learnid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `learn_response`
--
ALTER TABLE `learn_response`
  MODIFY `learnresid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `photoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
