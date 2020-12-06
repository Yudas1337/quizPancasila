-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 06, 2020 at 04:16 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `qz_admin`
--

CREATE TABLE `qz_admin` (
  `idAdmin` int(11) NOT NULL,
  `namaAdmin` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fotoAdmin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qz_admin`
--

INSERT INTO `qz_admin` (`idAdmin`, `namaAdmin`, `username`, `password`, `fotoAdmin`) VALUES
(1, 'Yudas', 'admin', '$2y$10$QefmrcEuV5NJ8Myu/9wgpejyxk3xMAhMbvR8kiHQXAou6ZZlOq4cy', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `qz_jawaban`
--

CREATE TABLE `qz_jawaban` (
  `idJawaban` int(11) NOT NULL,
  `idSoal` int(11) DEFAULT NULL,
  `uraian` varchar(1000) NOT NULL,
  `abjad` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qz_jawaban`
--

INSERT INTO `qz_jawaban` (`idJawaban`, `idSoal`, `uraian`, `abjad`) VALUES
(1, 1, 'PHP', 'A'),
(2, 1, 'HTML', 'B'),
(3, 1, 'CSS', 'C'),
(4, 1, 'Semua Jawaban Benar', 'D'),
(5, 2, 'Kotlin', 'A'),
(6, 2, 'PHP', 'B'),
(7, 2, 'Mysql', 'C'),
(8, 2, 'Ruby', 'D'),
(9, 3, 'PHP', 'A'),
(10, 3, 'Mysql', 'B'),
(11, 3, 'HTML', 'C'),
(12, 3, 'JAVA', 'D'),
(13, 4, '2', 'A'),
(14, 4, '4', 'B'),
(15, 4, '22', 'C'),
(16, 4, 'Semua Jawaban Benar', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `qz_rank`
--

CREATE TABLE `qz_rank` (
  `idRank` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `qz_soal`
--

CREATE TABLE `qz_soal` (
  `idSoal` int(11) NOT NULL,
  `isiSoal` varchar(1000) NOT NULL,
  `kunci_jwb` char(1) NOT NULL,
  `fotoSoal` varchar(255) DEFAULT NULL,
  `nilaiSoal` int(11) NOT NULL,
  `statusSoal` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qz_soal`
--

INSERT INTO `qz_soal` (`idSoal`, `isiSoal`, `kunci_jwb`, `fotoSoal`, `nilaiSoal`, `statusSoal`, `created_at`) VALUES
(1, 'dibawah ini yang termasuk bahasa pemrograman adalah ??', 'A', NULL, 200, 1, '2020-12-05 21:14:23'),
(2, 'Bahasa Pemrograman Mobile di bawah ini yang benar adalah???', 'A', NULL, 500, 1, '2020-12-05 12:46:29'),
(3, 'Dibawah ini berfungsi sebagai database adalah ??', 'B', 'test123.jpg', 500, 1, '2020-12-05 19:17:31'),
(4, '2+2 = ?', 'D', '1607224568Screenshot from 2020-12-06 09-19-14.png', 500, 1, '2020-12-05 21:16:08');

-- --------------------------------------------------------

--
-- Table structure for table `qz_user`
--

CREATE TABLE `qz_user` (
  `idUser` int(11) NOT NULL,
  `namaUser` varchar(255) NOT NULL,
  `emailUser` varchar(255) NOT NULL,
  `hpUser` varchar(15) NOT NULL,
  `fotoUser` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_login` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `qz_admin`
--
ALTER TABLE `qz_admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `qz_jawaban`
--
ALTER TABLE `qz_jawaban`
  ADD PRIMARY KEY (`idJawaban`);

--
-- Indexes for table `qz_rank`
--
ALTER TABLE `qz_rank`
  ADD PRIMARY KEY (`idRank`);

--
-- Indexes for table `qz_soal`
--
ALTER TABLE `qz_soal`
  ADD PRIMARY KEY (`idSoal`);

--
-- Indexes for table `qz_user`
--
ALTER TABLE `qz_user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `qz_admin`
--
ALTER TABLE `qz_admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `qz_jawaban`
--
ALTER TABLE `qz_jawaban`
  MODIFY `idJawaban` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `qz_rank`
--
ALTER TABLE `qz_rank`
  MODIFY `idRank` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qz_soal`
--
ALTER TABLE `qz_soal`
  MODIFY `idSoal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `qz_user`
--
ALTER TABLE `qz_user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
