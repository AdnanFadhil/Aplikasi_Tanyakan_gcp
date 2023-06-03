-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2020 at 04:10 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tanyakan`
--

-- --------------------------------------------------------

--
-- Table structure for table `jawaban`
--

CREATE TABLE `jawaban` (
  `id` int(5) NOT NULL,
  `id_tanya` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `isi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jawaban`
--

INSERT INTO `jawaban` (`id`, `id_tanya`, `id_user`, `isi`) VALUES
(25, 27, 1, 'Seharusnya iya, karena kamu sudah menyelesaikan tugas,kuiz dan projek :)'),
(26, 25, 1, 'Mungkin diIndonesia masih banyak digunakan, namun secara global PHP sudah banyak tergantikan'),
(27, 23, 1, 'Saya kira tidak, sudah terlalu banyak teori konspirasi');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(5) NOT NULL,
  `jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `jenis`) VALUES
(1, 'Kesehatan'),
(2, 'Olahraga'),
(3, 'Teknologi'),
(4, 'Hiburan'),
(5, 'Pendidikan'),
(6, 'Lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `pertayaan`
--

CREATE TABLE `pertayaan` (
  `id` int(5) NOT NULL,
  `id_kategori` int(4) NOT NULL,
  `judul` varchar(150) DEFAULT NULL,
  `isi` varchar(300) DEFAULT NULL,
  `id_user` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertayaan`
--

INSERT INTO `pertayaan` (`id`, `id_kategori`, `judul`, `isi`, `id_user`) VALUES
(19, 5, 'Saran untuk mahasiswa Informatika', 'Saya merupakan maba Informatika, apakah ada saran untuk saya dari pengalaman\" Anda ?', 1),
(20, 3, 'Mengapa Konami tidak ingin membuat game lagi?', 'Beberapa tahun ini mengapa pengembang game Konami seperti tidak merilis game lagi ?', 1),
(21, 3, 'Apa enaknya menggunakan Linux?', 'Apa enaknya sih menggunakan Linux dalam penngunaan sehari-hari', 3),
(22, 4, 'Mengapa banyak orang menganggap Cyberpunk 2077 gagal', 'Saat game ini dirilis mengapa banyak orang yang beranggapan bahwa game ini gagal', 2),
(23, 1, 'Covid itu konspirasi', 'Apakah virus covid itu konspirasi untuk mengurangi jumlah populasi', 2),
(24, 4, 'Film sedih', 'Apakah film tersedih yang pernah kamu tonton', 1),
(25, 3, 'PHP masih eksis', 'Apakah bahasa pemrograman PHP masih akan banyak digunakan', 3),
(26, 4, 'Naruto mati ?', 'manga boruto besok tanggal 20, apakah naruto akan mati atau selamat', 1),
(27, 5, 'Apakah nilai saya akan bagus', 'Akapah nilai praktikum saya akan bagus dan mendapat nilai A', 2),
(28, 2, 'kecepatan motor motogp', 'Berapakah kira-kira kecepatan motogp saat ditrek lurus tanpa hambatan', 1),
(29, 1, 'Apakah virus dapat dibunuh', 'Apakah sebenarnya virus dapat dibunuh,karena saat sma aku pernah dengar bahwa virus itu makhluk peralihan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(5) NOT NULL,
  `username` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`) VALUES
(1, 'fajr23', 'feri@gmail.com', '123'),
(2, 'rafa', 'rafa@gmail.com', '321'),
(3, 'saya', 'saya', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_users` (`id_user`),
  ADD KEY `id_tanya` (`id_tanya`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pertayaan`
--
ALTER TABLE `pertayaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jawaban`
--
ALTER TABLE `jawaban`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pertayaan`
--
ALTER TABLE `pertayaan`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jawaban`
--
ALTER TABLE `jawaban`
  ADD CONSTRAINT `id_tanya` FOREIGN KEY (`id_tanya`) REFERENCES `pertayaan` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `id_users` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);

--
-- Constraints for table `pertayaan`
--
ALTER TABLE `pertayaan`
  ADD CONSTRAINT `id_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`),
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
