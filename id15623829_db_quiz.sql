-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 10, 2020 at 12:38 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id15623829_db_quiz`
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qz_admin`
--

INSERT INTO `qz_admin` (`idAdmin`, `namaAdmin`, `username`, `password`, `fotoAdmin`) VALUES
(1, 'Yudas', 'admin', '$2y$10$QefmrcEuV5NJ8Myu/9wgpejyxk3xMAhMbvR8kiHQXAou6ZZlOq4cy', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `qz_rank`
--

CREATE TABLE `qz_rank` (
  `idRank` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `skor_tertinggi` int(11) NOT NULL,
  `skor_akhir` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qz_rank`
--

INSERT INTO `qz_rank` (`idRank`, `idUser`, `skor_tertinggi`, `skor_akhir`, `updated_at`) VALUES
(1, 5, 3738, 3738, '2020-12-09 15:25:39'),
(2, 4, 2820, 2820, '2020-12-09 09:51:07'),
(3, 6, 2084, 1984, '2020-12-09 04:56:10'),
(4, 3, 1435, 1435, '2020-12-09 04:06:55'),
(5, 7, 2654, 2654, '2020-12-09 11:26:14'),
(6, 8, 1438, 1438, '2020-12-09 05:23:45'),
(7, 9, 1349, 1103, '2020-12-09 08:16:48'),
(8, 10, 1378, 1378, '2020-12-09 10:25:22'),
(9, 12, 1307, 1307, '2020-12-09 14:10:48'),
(10, 13, 1069, 1069, '2020-12-09 15:58:17'),
(11, 15, 930, 930, '2020-12-09 16:12:10'),
(12, 15, 930, 930, '2020-12-09 16:12:10'),
(13, 16, 1314, 1314, '2020-12-09 16:26:36');

-- --------------------------------------------------------

--
-- Table structure for table `qz_soal`
--

CREATE TABLE `qz_soal` (
  `idSoal` int(11) NOT NULL,
  `isiSoal` varchar(1000) NOT NULL,
  `opsi_a` varchar(225) NOT NULL,
  `opsi_b` varchar(225) NOT NULL,
  `opsi_c` varchar(225) NOT NULL,
  `opsi_d` varchar(225) NOT NULL,
  `kunci_jwb` char(1) NOT NULL,
  `fotoSoal` varchar(255) DEFAULT NULL,
  `nilaiSoal` int(11) NOT NULL,
  `statusSoal` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qz_soal`
--

INSERT INTO `qz_soal` (`idSoal`, `isiSoal`, `opsi_a`, `opsi_b`, `opsi_c`, `opsi_d`, `kunci_jwb`, `fotoSoal`, `nilaiSoal`, `statusSoal`, `created_at`) VALUES
(1, 'Lembaga negara di Indonesia memiliki ... lapisan.', '2', '3', '4', '5', 'B', NULL, 200, 1, '2020-12-08 12:33:02'),
(2, 'Filsafat diambil dari bahasa Yunani yaitu filosofien yang berarti...', 'Mencintai kebijaksanaan', 'Mencintai kedamaian', 'Buah pikiran', 'Sistem kehidupan', 'A', NULL, 300, 1, '2020-12-08 10:05:55'),
(3, 'Gambar berikut merupakan sosok yang dikenal sebagai arsitek UUD 1945, beliau adalah...', 'Ir Soekarno', 'Mr. Moh. Yamin', 'Dr. Soepomo', 'Mr. Achmad Soebardjo', 'C', '1607421778unnamed.jpg', 500, 1, '2020-12-08 10:02:58'),
(4, 'Potongan gambar berikut adalah foto dari...', 'Mr. Achmad Soebardjo', 'Abdurrahman Wahid', 'Mohammad Hatta', 'B J Habibie', 'D', '1607422740potongan BJ-Habibie.jpg', 500, 1, '2020-12-08 10:19:00'),
(5, 'Dibawah ini merupakan tokoh yang bernama', 'Moh.Yamin', 'Mr.Soepomo', 'Ir.Soekarno', 'Moh.Hatta', 'C', '1607412977Presiden_Sukarno.jpg', 513, 1, '2020-12-08 10:07:04'),
(6, 'Berikut tokoh-tokoh yang merumuskan Dasar Negara, kecuali...', 'Ir. Soekarno', 'Mr. Moh. Yamin', 'Dr. Soepomo', 'Mr. Achmad Soebardjo', 'D', NULL, 200, 1, '2020-12-08 10:09:22'),
(7, 'Pancasila sila kedua dilambangkan oleh?', 'Kepala banteng', 'Pohon beringin', 'Rantai emas', 'Padi dan kapas', 'C', NULL, 250, 1, '2020-12-08 14:13:15'),
(8, 'Perubahan resmi yang dilakukan pada dokumen resmi atau catatan tertentu terutama untuk menyempurnakan, disebut dengan....', 'Konstitusi', 'Filsafat', 'Amandemen', 'Ideologi', 'C', NULL, 200, 1, '2020-12-08 14:14:14'),
(9, 'Lembaga tinggi yang memiliki tugas dan wewenang mengubah dan menetapkan UUD 1945 adalah....', 'MPR', 'DPR', 'Presiden', 'MK', 'A', NULL, 200, 1, '2020-12-08 14:15:28'),
(10, 'Pancasila disahkan pada tanggal', '17 Agustus 1945', '18 Agustus 1945', '19 Agustus 1945', '20 Agustus 1945', 'B', NULL, 200, 1, '2020-12-08 14:15:49'),
(11, 'Ideologi yang mengutamakan kepemilikan bersama, tidak ada yang namanya kepemilikan individu adalah ideologi....', 'Kapitalisme', 'Anarkisme', 'Sosialisme', 'Nasionalisme', 'C', NULL, 250, 1, '2020-12-08 14:16:42'),
(12, 'Lambang garuda merupakan hasil karya...', 'Sultan Hamid Al Gadri II', 'Mpu Tantular', 'Ir. Soekarno', 'Sultan Hamengkubuwono', 'A', NULL, 300, 1, '2020-12-08 14:19:23'),
(13, 'berikut ini yang bukan termasuk ciri khusus HAM adalah...', 'Hakiki', 'Universal', 'Tidak bisa dicabut', 'Sementara', 'D', NULL, 200, 1, '2020-12-08 14:22:51'),
(14, 'Pada tanggal berapakah Ir.Soekarno menyampaikan rumusan dasar negara....', '1 Juni 1945', '1 Juni 1954', '29 Mei 1945', '31 Mei 1945', 'A', NULL, 200, 1, '2020-12-08 14:23:42'),
(15, 'Salah satu ciri khusus dari HAM adalah hakiki, yang berarti....', 'Berlaku untuk semua orang', 'Sudah ada sejak lahir', 'Tidak bisa diberikan kepada orang lain', 'Berlaku sejak tumbuh dewasa', 'B', NULL, 230, 1, '2020-12-08 14:28:09'),
(16, 'Segala perbuatan yang tidak menghormati hak orang lain akan menyebabkan…', 'Kesejahteraan masyarakat tidak terwujud', 'Kebutuhan masyarakat tidak terpenuhi', 'Kedamaian masyarakat terganggu', 'Kebutuhan masyarakat tidak menentu', 'C', NULL, 200, 1, '2020-12-08 14:29:37'),
(17, 'berikut adalah pembagian kekuasaan berdasarkan trias politika, kecuali', 'Yudikatif', 'Eksekutif', 'Legislatif', 'Federatif', 'D', NULL, 200, 1, '2020-12-08 14:30:37'),
(18, 'Suatu sikap yang menonjolkan hak sendiri, tanpa memperhatikan hak orang lain merupakan bentuk…', 'Pelanggaran terhadap hak orang lain', 'Demokrasi pribadi', 'Penciptaan individual manusia', 'Manusia mempunyai hak asasi', 'A', NULL, 200, 1, '2020-12-08 14:31:35'),
(19, 'Jaminan bagi warga Negara sesuai dengan Pasal 27 ayat 1 UUD 1945 yaitu dalam bidang…', 'Hukum dan kebudayaan', 'Hukum dan pemerintahan', 'Hukum dan peradilan', 'Hukum dan perundang undangan', 'B', NULL, 200, 1, '2020-12-08 14:36:35'),
(20, 'Fungsi komnas HAM dalam penyebarluasan wawasan tentang hak asasi manusia (HAM) kepada masyarakat Indonesia merupakan fungsi Komnas HAM sebagai…', 'Mediasi', 'Penyuluhan', 'Pengkajian', 'Pemantauan', 'B', NULL, 200, 1, '2020-12-08 14:37:39'),
(21, 'Pengadilan HAM diatur dalam Undang Undang Nomor…', '26 tahun 2003', '26 tahun 2001', '26 tahun 2000', '26 tahun 2002', 'C', NULL, 200, 1, '2020-12-08 14:39:52'),
(22, 'Berikut ini adalah contoh hak asasi di bidang politik, kecuali', 'Hak ikut serta dalam pemerintahan', 'Hak dipilih dalam pemilu', 'Hak memiliki sesuatu', 'Hak memilih dalam pemilu', 'C', NULL, 200, 1, '2020-12-08 15:09:14'),
(23, 'Di bawah ini contoh dari hukum privat/perdata yang benar adalah', 'Hukum Acara', 'Hukum Pidana', 'Hukum Administrasi Negara', 'Hukum Waris', 'D', NULL, 300, 1, '2020-12-08 15:11:46'),
(24, 'Di dalam sistem pemerintahan presidensial, kedudukan presiden adalah sebagai?', 'Penanggung jawab kehidupan berbangsa dan bernegara', 'Kepala pemerintahan sekaligus kepala negara', 'Panglima tinggi AL, AD, dan AU', 'Dapat membubarkan parlemen', 'B', NULL, 500, 1, '2020-12-08 15:13:46'),
(25, 'Pancasila tercantum pada Undang-Undang Dasar 1945 alenia ke?', 'Ke-4 (pembukaan)', 'Ke-4 (penutupan)', 'Ke-3 (pembukaan)', 'Ke-2 (penutupan)', 'A', NULL, 500, 1, '2020-12-08 15:16:03'),
(26, 'Pada tanggal berapa rumusan dasar negara yang diajukan oleh Muh.Yamin?', '1 Juni 1945', '31 Mei 1945', '29 Maret 1945', '29 Mei 1945', 'D', NULL, 600, 1, '2020-12-08 15:17:58'),
(27, 'Istilah ideologi berasal dari kata ”idea” dan ”logos”, Idea berarti', 'cita-cita', 'gagasan, konsep, perilaku', 'pemikiran, konsep, gagasan', 'pengertian dasar, tujuan, kemauan', 'C', NULL, 200, 1, '2020-12-08 17:11:44'),
(28, 'Yang melatar belakangi Pancasila sebagai ideologi bangsa Indonesia adalah', 'dalam rangka memahami dan mengingat sejauh mana cita-cita bangsa Indonesia', 'melestarikan nilai yang bersumber pada kepribadian bangsa Indonesia', 'untuk menjawab tantangan zaman yang semakin maju dan modern', 'untuk menjamin terwujudnya segala kebutuhan warga negara', 'A', NULL, 200, 1, '2020-12-08 17:13:30'),
(29, 'Pancasila sebagai pandangan hidup bangsa merupakan', 'norma dasar yang menjadi pedoman hidup manusia Indo­nesia', 'penjabaran dari pola perilaku hidup manusia Indonesia', 'cara pandang bangsa Indo­nesia dalam menghadapi ke­merdekaan', 'kristalisasi nilai-nilai yang hidup dalam masyarakat In­donesia', 'A', NULL, 200, 1, '2020-12-08 17:15:13'),
(30, 'Ideologi secara fungsional diartikan', 'seperangkat gagasan tentang kebaikan bersama', 'berfungsinya kebenaran yang dimiliki negara', 'sistem kebijakan yang diambil oleh setiap pemerintah', 'sejumlah gagasan yang menjadikan sarana dan prasarana suprastruktur politik dan infrastruktur politik menjadi berfungsi', 'D', NULL, 200, 1, '2020-12-08 17:17:24'),
(31, 'Pancasila sebagai ideologi tidak diciptakan oleh negara, melainkan', 'dibuat oleh rakyat Indonesia untuk pedoman hidup yang langgeng', 'ditemukan dalam hidup sanu­bari rakyat Indonesia', 'digali dari harta kekayaan ro­hani, moral dan budaya masyarakat Indonesia sendiri', 'nilai-nilainya mengandung arti yang sangat dalam bagi per­juangan bangsa Indonesia', 'D', NULL, 200, 1, '2020-12-08 17:20:11'),
(32, 'Pada tanggal berapa piagam jakarta disahkan ?', '22 Juli 1945', '22 Juni 1945', '16 Juni 1945', '16 Juli 1945', 'B', NULL, 200, 1, '2020-12-09 00:25:57'),
(33, 'Pada tanggal berapa pembentukan Panitia Sembilan', '1 Agustus 1945', '1 Juli 1945', '1 Juni 1945', '1 Mei 1945', 'C', NULL, 200, 1, '2020-12-09 00:28:03'),
(34, 'kumpulan asas yang didasarkan pada kekuatan pemerintah, hak-hak yang diperintah, serta hubungan-hubungan antara keduanya yang diatur adalah pengertian dari konstitusi menurut pakar.. ?', 'E.C Wade', 'KC. Wheare', 'Herman Heller', 'CF. Strong', 'D', NULL, 200, 1, '2020-12-09 00:45:19'),
(35, 'Dalam bahasa Jerman, Norma Fundamental Negara adalah ?', 'Staatsfundamentalnorm', 'Statsfundamentalnorm', 'straafundamentalnorm', 'Sysfundamentalnorm', 'A', NULL, 200, 1, '2020-12-09 00:51:06'),
(36, 'Terdapat 3 Aspek Kajian Filsafat, yakni ?', 'Ontologi, Epistemologi, Aksiologi', 'Teologi, Epistemologi, Aksiologi', 'Ontologi, Epistemologi, Eksiologi', 'semua jawaban salah', 'A', NULL, 200, 1, '2020-12-09 01:11:10');

-- --------------------------------------------------------

--
-- Table structure for table `qz_user`
--

CREATE TABLE `qz_user` (
  `idUser` int(11) NOT NULL,
  `namaUser` varchar(255) NOT NULL,
  `hpUser` varchar(15) NOT NULL,
  `emailUser` varchar(255) NOT NULL,
  `passUser` varchar(255) NOT NULL,
  `fotoUser` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_login` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_active` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qz_user`
--

INSERT INTO `qz_user` (`idUser`, `namaUser`, `hpUser`, `emailUser`, `passUser`, `fotoUser`, `created_at`, `updated_at`, `last_login`, `is_active`) VALUES
(2, 'Dadang', '0934537', 'dadang@gmail.com', '$2y$10$ZjA5RXWM2R867U0p1F.8IeZFT3wsACvu2fa3YeIueSii8yDfzS9yS', 'avatar2.png', '2020-12-08 16:38:05', '2020-12-06 10:48:11', '2020-12-06 16:48:11', 1),
(3, 'Test User', '0234238', 'testuser@gmail.com', '$2y$10$uLWYbUiadUe9VHwldpC49edy1cp7w6.05XSU9fgD.mWWWlllKKiPi', 'avatar1.png', '2020-12-09 04:07:12', '2020-12-16 16:33:06', '2020-12-17 16:33:06', 1),
(4, 'Bagaskara', '0934537', 'bagas@gmail.com', '$2y$10$CckBmYf5IsmUICY6CLHHleCfQ1X4H5KRf.ZFuIPe5.ldESpd2NdWu', 'avatar2.png', '2020-12-09 06:31:07', '2020-12-06 23:49:17', '2020-12-07 05:49:17', 1),
(5, 'Yudas Malabi', '082257181297', 'yudasmalabi@gmail.com', '$2y$10$uLWYbUiadUe9VHwldpC49edy1cp7w6.05XSU9fgD.mWWWlllKKiPi', 'avatar8.png', '2020-12-09 12:19:11', '2020-12-07 22:34:00', '2020-12-08 04:34:00', 1),
(6, 'Shine', '082331552132', 'shinedevi02@gmail.com', '$2y$10$aGMnGj4CAqdyGOYe6d0HcOQEwVdBkXzV2.5l5P2NbK93oc2DV/sEW', 'avatar2.png', '2020-12-09 01:17:47', '2020-12-09 01:17:47', '2020-12-09 01:17:47', 1),
(7, 'Raraa', '082255149667', 'raradeninda12@gmail.com', '$2y$10$8C0AWp5kAXSLOg7B5QaQmOwIUQGPyUgbSp5dHP3QHD9aVTg1v9pyq', 'avatar8.png', '2020-12-09 05:22:54', '2020-12-09 05:15:35', '2020-12-09 05:15:35', 1),
(8, 'Silvia', '085706377366', 'silviaprada0904@gmail.com', '$2y$10$yOHxGy2rV0nAcaTflb1FqO6w6IT9YtD4iFAivogUGmsa40drI24ga', 'avatar5.png', '2020-12-09 11:17:03', '2020-12-09 05:20:35', '2020-12-09 05:20:35', 1),
(9, 'annisa', '081230119264', 'aanadhila225@gmail.com', '$2y$10$9KnJqwHlYJTnRC5j0tmCDeURn.JN4dVXx4aj.hs0tTWoRKf1RjrlW', 'avatar7.png', '2020-12-09 05:46:13', '2020-12-09 05:46:13', '2020-12-09 05:46:13', 1),
(10, 'nitnutnitnut', '087856430415', 'gilangsetyawan3432@gmail.com', '$2y$10$bd4qtlsvhn7.Qrx005YgwewL/uk0.2f5S6wtwDAdKWY7HWL3tl4sm', 'avatar6.png', '2020-12-09 10:23:53', '2020-12-09 10:23:53', '2020-12-09 10:23:53', 1),
(11, 'Mila', '082332564745', 'millayunita07@gmail.com', '$2y$10$JRYj6jF02mXV1Xndrey89uWHlG9Hx3HVN1FfFKSCX4gpVIw9h3fVa', 'avatar1.png', '2020-12-09 14:06:11', '2020-12-09 14:06:11', '2020-12-09 14:06:11', 1),
(12, 'Yulia Eka', '0895367299205', 'yuliaekaardha@gmail.com', '$2y$10$a0JO5RWopeGIPc82L5Hfwe80hPJOmLmanv.X6nGz4hhyVmMrSre4S', 'avatar8.png', '2020-12-09 14:07:48', '2020-12-09 14:07:48', '2020-12-09 14:07:48', 1),
(13, 'Welson Mario', '081393456340', 'wlsn160501@gmail.com', '$2y$10$izMSEV5mAQtNdOTLy1TtBuJB4G7nQ2YCuU631tYH5S2ya1D8MGfZq', 'avatar1.png', '2020-12-09 15:55:19', '2020-12-09 15:55:19', '2020-12-09 15:55:19', 1),
(14, 'ade', '08123849796', 'alfnade60@gmail.com', '$2y$10$V175Fj6ZR4LygkuWrFBjO.Lo/mU4dNjdJKlkFIu00nJITEyrLGro.', 'avatar5.png', '2020-12-09 16:04:45', '2020-12-09 16:04:45', '2020-12-09 16:04:45', 1),
(15, 'polo', '0846816481', 'polomarco40@gmail.com', '$2y$10$WG2tLmjlafyVliU0lGGTyunaXTbNC0BYGlp2aSAM5xHnCeSctyvFm', 'avatar6.png', '2020-12-09 16:11:25', '2020-12-09 16:11:25', '2020-12-09 16:11:25', 1),
(16, 'Qalbii Azzahra Putra', '085155395886', 'jawamana27@gmail.com', '$2y$10$5d1nnzqTs5Knn4ALPYqqI.YUKE4eeEvOzdVrtgJy2jpxaCV//zW.u', 'avatar3.png', '2020-12-09 16:22:21', '2020-12-09 16:22:21', '2020-12-09 16:22:21', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `qz_admin`
--
ALTER TABLE `qz_admin`
  ADD PRIMARY KEY (`idAdmin`);

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
-- AUTO_INCREMENT for table `qz_rank`
--
ALTER TABLE `qz_rank`
  MODIFY `idRank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `qz_soal`
--
ALTER TABLE `qz_soal`
  MODIFY `idSoal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `qz_user`
--
ALTER TABLE `qz_user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
