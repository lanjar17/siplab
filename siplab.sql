-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2023 at 12:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siplab`
--

-- --------------------------------------------------------

--
-- Table structure for table `ask`
--

CREATE TABLE `ask` (
  `id_ask` int(11) NOT NULL,
  `nama_asker` varchar(64) NOT NULL,
  `judul_ask` varchar(64) NOT NULL,
  `isi_ask` varchar(512) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ask`
--

INSERT INTO `ask` (`id_ask`, `nama_asker`, `judul_ask`, `isi_ask`) VALUES
(6, 'Marzuki', 'Tidak punya WhatsApp', 'setelah mengajukan peminjaman, sistem mengarahkan ke whatsapp, bagaimana user yang tidak punya whatsapp min?');

-- --------------------------------------------------------

--
-- Table structure for table `help`
--

CREATE TABLE `help` (
  `id_help` int(11) NOT NULL,
  `judul` varchar(64) NOT NULL,
  `isi` varchar(512) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `help`
--

INSERT INTO `help` (`id_help`, `judul`, `isi`) VALUES
(1, 'Bagaimana cara mendaftar?', 'Dengan mengklik tombol \'mendaftar\' pada halaman login, kemudian tunggu hingga status pengguna diterima oleh Administrator'),
(2, 'Mengapa sistem menampilkan pesan user belum aktif?', 'Setelah selesai mendaftar harap menunggu konfirmasi dari Administrator untuk menerima anda sebagai pengguna baru');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_peminjaman` int(3) NOT NULL,
  `status_jadwal` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_peminjaman`, `status_jadwal`) VALUES
(1, 1, 3),
(2, 3, 3),
(3, 4, 3),
(4, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(4) NOT NULL,
  `id_user` int(3) NOT NULL,
  `id_ruangan` int(3) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_berakhir` time NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` varchar(32) NOT NULL,
  `status_peminjaman` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_user`, `id_ruangan`, `jam_mulai`, `jam_berakhir`, `tanggal`, `keterangan`, `status_peminjaman`) VALUES
(5, 26, 2, '15:11:00', '15:30:00', '2023-12-19', 'OSIS', 1),
(3, 26, 2, '13:32:00', '15:32:00', '2023-12-17', 'Seminar', 1),
(4, 26, 3, '13:50:00', '15:47:00', '2023-12-17', 'Pelatihan/Workshop', 2);

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` int(1) NOT NULL,
  `kode_ruangan` varchar(10) NOT NULL,
  `nama_ruangan` varchar(25) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status_ruangan` enum('Dipakai','Nganggur') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `kode_ruangan`, `nama_ruangan`, `image`, `status_ruangan`) VALUES
(1, 'R1.LK', 'Ruangan Software Engineer', '5e1382570d24e.png', 'Nganggur'),
(2, 'R2.LK', 'Ruangan Multimedia Studio', '5e14771323e46.png', 'Nganggur'),
(3, 'R3.LK', 'Ruangan Computer Network ', '5e13825fac4bd.png', 'Nganggur');

-- --------------------------------------------------------

--
-- Table structure for table `ruangans`
--

CREATE TABLE `ruangans` (
  `id_ruangan` int(1) NOT NULL,
  `kode_ruangan` varchar(10) NOT NULL,
  `nama_ruangan` varchar(25) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status_ruangan` enum('Dipakai','Nganggur') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruangans`
--

INSERT INTO `ruangans` (`id_ruangan`, `kode_ruangan`, `nama_ruangan`, `image`, `status_ruangan`) VALUES
(1, 'R1.LK', 'Ruangan Software Engineer', 'monitor.png', 'Nganggur'),
(2, 'R2.LK', 'Ruangan Multimedia Studio', 'monitor.png', 'Nganggur'),
(3, 'R3.LK', 'Ruangan Computer Network ', 'monitor.png', 'Nganggur');

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `id_site` int(1) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `title` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`id_site`, `icon`, `logo`, `title`) VALUES
(1, '5e14758da49b31.png', '5e14758da49b3.png', 'SISTEM PEMINJAMAN LAB KOMPUTER ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(3) NOT NULL,
  `nama_lengkap` varchar(32) NOT NULL,
  `bio` varchar(500) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `level` enum('Admin','Peminjam') NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_lengkap`, `bio`, `username`, `password`, `nip`, `no_telp`, `level`, `image`, `status`) VALUES
(1, 'Admin', 'Ini bio admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '11753101951', '82286062083', 'Admin', '5e139bcf64e1e.jpg', 1),
(3, 'Marzuki', '', 'marzuki', 'c93c7b3466148a7418835555700f7fb9b38e58bb', '11751019201', '', 'Peminjam', '', 1),
(21, 'Fahri Susaini', '', 'fahri', '5b18bb6641ef208740515238db03e90c0b68a521', '1175301941', '', 'Peminjam', '', 1),
(25, 'Nur Yulia Yeti', '', 'yulia', '4c0860f68178047c8bc26678dc37953bd57220f4', '11753101952', '', 'Peminjam', '', 1),
(23, 'Yosie Juniarti', '', 'yosie', 'ffdd66ef02126a5f7eaf0455eddaeb1fcc9f1d2a', '1182429372198421', '', 'Peminjam', '', 1),
(24, 'Darwin', '', 'darwin', '34dc8e1804c0a14aeb717e91af443219be617042', '11753101953', '', 'Peminjam', '', 1),
(26, 'Lanjar Dwi Saputro', '', 'lanjar17', 'd001778197e793a36cdcfec49c19d69b0d4780be', '213131313', '', 'Peminjam', '', 1),
(27, 'Lanjar Dwi Saputro', '', 'lanjar17', 'd001778197e793a36cdcfec49c19d69b0d4780be', '213131313', '', 'Peminjam', '', 1),
(28, '', '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', '', '', 'Peminjam', '', 1),
(29, 'Guntur', '', 'guntur', 'c4f555d04f12b4fc2abff01ed17c316a8b0a3b76', '8585', '', 'Peminjam', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(3) NOT NULL,
  `nama_lengkap` varchar(32) NOT NULL,
  `bio` varchar(500) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `level` enum('Admin','Peminjam') NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `instansi` enum('UNS','Non-UNS') NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_lengkap`, `bio`, `username`, `password`, `nip`, `telepon`, `level`, `avatar`, `instansi`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'Ini bio admin', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '11753101951', '82286062083', 'Admin', 'default.jpg', 'UNS', 1, '2023-12-16 00:04:43', '2023-12-16 00:04:43'),
(26, 'Dwi', 'pp', 'dwi', '7aa2602c588c05a93baf10128861aeb9', '233', '21331', 'Admin', 'default.jpg', 'UNS', 1, '2023-12-16 00:04:43', '2023-12-16 00:04:43'),
(27, 'Lanjar Dwi Saputro', '', 'lanjar17', 'd43aea9952f5a1ca76b088067745af8d', '', '986969', 'Peminjam', 'no bg_4.png', 'UNS', 1, '2023-12-16 00:04:43', '2023-12-16 00:04:43'),
(28, 'Dhani', '', 'dhani', '1ce7557b2f3f12fbaedfa6bcb809d662', '', '788698', 'Peminjam', 'no bg_5.png', 'Non-UNS', 1, '2023-12-16 00:04:43', '2023-12-16 17:11:44'),
(43, 'Saputro', '', 'saputro', '2d3528d2057949334881a9be343423f7', 'K5858', '5877', 'Peminjam', 'default.png', 'UNS', 1, '2023-12-16 18:07:01', '2023-12-16 18:13:35'),
(42, 'Danis', '', 'danis', '766957c4deefde9b08b0b2c9ced8f21c', 'K387487', '83487', 'Peminjam', 'default.png', 'Non-UNS', 1, '2023-12-16 17:24:36', '2023-12-16 18:13:39'),
(45, 'Budi Budiman', '', 'budiman123', '67a88979fd1561c1e22262ecb1357645', 'K2423', '358439537', 'Peminjam', 'no bg_8.png', 'Non-UNS', 1, '2023-12-18 08:58:12', '2023-12-18 08:59:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ask`
--
ALTER TABLE `ask`
  ADD PRIMARY KEY (`id_ask`);

--
-- Indexes for table `help`
--
ALTER TABLE `help`
  ADD PRIMARY KEY (`id_help`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `ruangans`
--
ALTER TABLE `ruangans`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id_site`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ask`
--
ALTER TABLE `ask`
  MODIFY `id_ask` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `help`
--
ALTER TABLE `help`
  MODIFY `id_help` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `id_site` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
