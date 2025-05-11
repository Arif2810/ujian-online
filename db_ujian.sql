-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2025 at 01:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ujian`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai`
--

CREATE TABLE `tbl_nilai` (
  `id` int(11) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `benar` varchar(20) NOT NULL,
  `salah` varchar(20) NOT NULL,
  `kosong` varchar(20) NOT NULL,
  `nilai` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_nilai`
--

INSERT INTO `tbl_nilai` (`id`, `id_user`, `benar`, `salah`, `kosong`, `nilai`, `tanggal`, `status`) VALUES
(1, 'NIS0007', '7', '2', '1', '70.0', '2025-04-25', 'LULUS'),
(2, 'NIS0009', '5', '3', '2', '50.0', '2025-04-25', 'GAGAL'),
(3, 'NIS0010', '7', '2', '1', '70.0', '2025-04-28', 'LULUS'),
(4, 'NIS0001', '5', '3', '2', '50.0', '2025-04-28', 'GAGAL');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengaturan`
--

CREATE TABLE `tbl_pengaturan` (
  `id` int(11) NOT NULL,
  `nama_ujian` varchar(100) NOT NULL,
  `waktu` int(11) NOT NULL,
  `nilai_minimal` int(11) NOT NULL,
  `peraturan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_pengaturan`
--

INSERT INTO `tbl_pengaturan` (`id`, `nama_ujian`, `waktu`, `nilai_minimal`, `peraturan`) VALUES
(1, 'Ujian Online', 5, 60, '&lt;ol&gt;&lt;li&gt;Bacalah dengan teliti&lt;/li&gt;&lt;li&gt;Pengerjaan soal ujian akan diberikan batasan waktu&lt;/li&gt;&lt;/ol&gt;');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_soal`
--

CREATE TABLE `tbl_soal` (
  `id` int(11) NOT NULL,
  `pertanyaan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `a` varchar(100) NOT NULL,
  `b` varchar(100) NOT NULL,
  `c` varchar(100) NOT NULL,
  `d` varchar(100) NOT NULL,
  `kunci_jawaban` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_soal`
--

INSERT INTO `tbl_soal` (`id`, `pertanyaan`, `gambar`, `a`, `b`, `c`, `d`, `kunci_jawaban`) VALUES
(3, '&lt;p&gt;Apakah nama hardware yang ditunjukkan gambar ini?&lt;/p&gt;', '1744702156-images (2).jpg', 'Harddisk', 'Mause', 'RAM', 'Mainboard', 'C'),
(4, '&lt;p&gt;Di bawah ini adalah framework PHP, kecuali...&lt;/p&gt;', '', 'Laravel', 'Code Igniter', 'Symphony', 'React', 'D'),
(5, '&lt;p&gt;Budi berbelanja di sebuah minimarket sebesar Rp 70.000 lalu dia mendapatkan diskon sebesar 3%. Berapakah Budi harus membayar?&lt;/p&gt;', '', 'Rp 67.900', 'Rp 49.000', 'Rp 58.000', 'Rp 63.000', 'A'),
(6, '&lt;p&gt;Deni berangkat ke sekolah dengan mengendarai sepeda motor. jarak dari rumah ke sekolah adalah 5 km. Apabila Deni membutuhkan waktu 10 menit untuk tiba di sekolah, berapakah kecepatan rata-rata Deni mengendarai sepeda motor?&lt;/p&gt;', '', '5 km/jam', '30 km/jam', '15 km/jam', '3 km/jam', 'B'),
(7, '&lt;p&gt;Ekstensi berkas apa yang &lt;strong&gt;wajib&lt;/strong&gt; digunakan untuk membuat sebuah dokumen html yang valid?&lt;/p&gt;', '', '.xml', '.html', '.exe', '.txt', 'B'),
(8, '&lt;p&gt;Perhatikan data-data berikut:&lt;/p&gt;&lt;ol&gt;&lt;li&gt;2x + 7 = 11&lt;/li&gt;&lt;li&gt;12 + 3x = 18&lt;/li&gt;&lt;li&gt;21 - 5x = 11&lt;/li&gt;&lt;/ol&gt;&lt;p&gt;Dari data di atas, berapakah x?&lt;/p&gt;', '', '45', '5', '2', '21', 'C'),
(9, '&lt;p&gt;Dua suku berikutnya dari pola bilangan 3, 4, 6, 9, ... adalah...&lt;/p&gt;', '', '12, 15', '12, 16', '13, 18', '13, 17', 'C'),
(10, '&lt;p&gt;Text yang menmpilkan konten dalam entuk paragraf, sebaiknya disimpan pada element?&lt;/p&gt;', '', '&lt;h1&gt;', '&lt;h2&gt;', '&lt;p&gt;', '&lt;body&gt;', 'C'),
(11, '&lt;p&gt;Gambar berikut adalah salah satu hardware sebuah PC, yaitu?&lt;/p&gt;', '1745568579-hd (3).jpg', 'RAM', 'Mainboard', 'Mouse', 'Hard disk', 'D'),
(12, '&lt;p&gt;&lt;span style=&quot;background-color:rgb(255,255,255);color:rgb(33,37,41);&quot;&gt;Dua suku berikutnya dari pola bilangan 3, 4, 6, 9, ... adalah...&lt;/span&gt;&lt;/p&gt;', '', '12, 15', '12, 16', '13, 18', '13, 17', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` int(11) NOT NULL COMMENT '1 = administrator, 2 = siswa'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `user_id`, `fullname`, `username`, `password`, `email`, `role`) VALUES
(1, '199034345000', 'Administrator', 'admin', '$2y$10$wHUmGyWm93xozhg1kPQxNeKTwkYb/xSt4knA37LzfvvsvKK8C2tU.', 'admin@mail.com', 1),
(2, 'NIS0001', 'Budi Santoso', 'budi', '$2y$10$75lE1lmaktdh354KvcWZ7uubxdaQT/ykuqItD552ggPqJXF839NRG', 'budi@contoh.com', 2),
(3, 'NIS0003', 'Alfin', 'alfin', '$2y$10$SjRn4WWsqv.7TeivwWnUYuj/PcNU9KHNRaA972fGKxmVfHGd28fQG', 'alfin@mail.com', 2),
(4, 'NIS0007', 'Aang Junaidi', 'aang', '$2y$10$FGbw.IF3bFiXUJPcNdesUue/Bm.W3OPi.F5K6XRsOYqBVCcXRPsD.', 'aang@mail.com', 2),
(5, 'NIS0009', 'Juli Supriadi', 'juli', '$2y$10$I8qkK5NrU.o7JK2zQ8oz8ekfH6jSnB80bnfHlEvNjdmUiDvkfCqpy', 'juli@mail.com', 2),
(6, 'NIS0010', 'Apul Simanjunjak', 'apul', '$2y$10$6rLYoTYgSum7MBqiS6/VUuELDfdHF8ZYnLR5eSV69E2yAv5MBEWnG', 'apul@mail.com', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pengaturan`
--
ALTER TABLE `tbl_pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_soal`
--
ALTER TABLE `tbl_soal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_nilai`
--
ALTER TABLE `tbl_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_pengaturan`
--
ALTER TABLE `tbl_pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_soal`
--
ALTER TABLE `tbl_soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
