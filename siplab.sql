-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2023 at 04:57 PM
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
(4, 5, 3),
(5, 16, 3),
(6, 18, 3),
(7, 21, 3),
(8, 26, 3),
(9, 26, 3),
(10, 26, 3),
(11, 26, 3),
(12, 26, 3),
(13, 26, 3),
(14, 26, 3),
(15, 26, 3),
(17, 28, 3),
(18, 27, 3),
(19, 31, 2),
(20, 33, 2),
(21, 34, 2);

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
(26, 42, 3, '21:23:00', '22:23:00', '2023-12-27', '', 2),
(28, 42, 2, '21:47:00', '22:47:00', '2023-12-27', '', 2),
(31, 53, 1, '13:31:00', '17:31:00', '2023-12-31', '', 1),
(33, 53, 1, '22:44:00', '23:44:00', '2023-12-28', '', 1),
(34, 53, 2, '22:46:00', '23:46:00', '2023-12-28', '', 1),
(35, 28, 3, '08:25:00', '12:25:00', '2023-12-30', '', 0),
(36, 47, 2, '15:25:00', '19:00:00', '2024-01-01', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ruangans`
--

CREATE TABLE `ruangans` (
  `id_ruangan` int(1) NOT NULL,
  `kode_ruangan` varchar(10) NOT NULL,
  `nama_ruangan` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status_ruangan` enum('Dipakai','Nganggur') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ruangans`
--

INSERT INTO `ruangans` (`id_ruangan`, `kode_ruangan`, `nama_ruangan`, `image`, `status_ruangan`) VALUES
(1, 'R1.LK', 'Ruangan Software Engineer', 'monitor.png', 'Nganggur'),
(2, 'R2.LK', 'Ruangan Multimedia Studio', 'monitor.png', 'Nganggur'),
(3, 'R3.LK', 'Ruangan Computer Network', 'monitor.png', 'Nganggur');

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
(1, 'Admin', 'Ini bio admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '11753101951', '82286062083', 'Admin', 'default.jpg', 'UNS', 1, '2023-12-16 00:04:43', '2023-12-16 00:04:43'),
(54, 'Adhi Dharmawan', '', 'adhi1', 'a4ec68c9cfa19030c0f1e97dfdfaa26e', 'K3520044', '869', 'Peminjam', 'default.png', 'UNS', 1, '2023-12-28 14:35:51', '2023-12-28 14:36:10'),
(52, 'Muhammad', '', 'muhammad', 'ecdfacbc0d41d495a7f7d479888bc9c7', 'K675765', '7858', 'Peminjam', 'TRANSPORT_LANJAR 01.jpg', 'UNS', 1, '2023-12-27 05:23:14', '2023-12-27 17:39:39'),
(55, 'Paijo', '', 'paijo', '7fcc5e2bfa8f70ad6bc96fcf8020dcfd', 'K32532', '432423', 'Peminjam', '1694620354-gibran.jpeg', 'Non-UNS', 0, '2023-12-28 21:41:25', '2023-12-28 21:41:25'),
(53, 'Lanjar Dwi', '', 'lanjar17', '0e88cb4912b12b0fe99d6b8dc4838ed4', 'K3520038', '232324', 'Peminjam', '1703748818_743fbac1bfccda82d922.jpg', 'UNS', 1, '2023-12-27 19:58:51', '2023-12-28 14:33:38'),
(47, 'Lanjar Dwi Saputro', '', 'farhan', '1ac5012170b65fb99f171ad799d045ac', 'K3520048', '53535', 'Peminjam', 'default.png', 'UNS', 1, '2023-12-25 17:47:27', '2023-12-26 13:46:27'),
(46, 'dwi', '', 'dwi', '7aa2602c588c05a93baf10128861aeb9', '44', '44', 'Admin', 'default.jpg', 'UNS', 1, '2023-12-25 18:24:26', '2023-12-25 18:24:26'),
(28, 'Dhani', '', 'dhani', '1ce7557b2f3f12fbaedfa6bcb809d662', '', '788698', 'Peminjam', 'no bg_5.png', 'Non-UNS', 1, '2023-12-16 00:04:43', '2023-12-16 17:11:44'),
(43, 'Saputro', '', 'saputro', '2d3528d2057949334881a9be343423f7', 'K5858', '5877', 'Peminjam', 'default.png', 'UNS', 1, '2023-12-16 18:07:01', '2023-12-16 18:13:35'),
(42, 'Danis', '', 'danis', '766957c4deefde9b08b0b2c9ced8f21c', 'K387487', '83487', 'Peminjam', 'default.jpg', 'Non-UNS', 1, '2023-12-16 17:24:36', '2023-12-16 18:13:39'),
(45, 'Budi Budiman', '', 'budiman123', '67a88979fd1561c1e22262ecb1357645', 'K2423', '358439537', 'Peminjam', 'no bg_8.png', 'Non-UNS', 1, '2023-12-18 08:58:12', '2023-12-18 08:59:19');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `visitor_id` int(10) UNSIGNED NOT NULL,
  `no_of_visits` int(10) UNSIGNED NOT NULL,
  `ip_address` varchar(20) NOT NULL,
  `requested_url` tinytext NOT NULL,
  `referer_page` tinytext NOT NULL,
  `page_name` tinytext NOT NULL,
  `query_string` tinytext NOT NULL,
  `user_agent` tinytext NOT NULL,
  `is_unique` tinyint(4) NOT NULL DEFAULT 0,
  `access_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`visitor_id`, `no_of_visits`, `ip_address`, `requested_url`, `referer_page`, `page_name`, `query_string`, `user_agent`, `is_unique`, `access_date`) VALUES
(665, 1, '::1', 'http://localhost:8080/Admin', 'http://localhost:8080/jadwal', '\\App\\Controllers\\AdminController/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:11:53'),
(666, 1, '::1', 'http://localhost:8080/newuser', 'http://localhost:8080/Admin', '\\App\\Controllers\\AdminController/newuser', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:30:19'),
(667, 1, '::1', 'http://localhost:8080/newuserdata/', 'http://localhost:8080/newuser', '\\App\\Controllers\\AdminController/getDatanewuser', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:30:20'),
(668, 1, '::1', 'http://localhost:8080/ruangan', 'http://localhost:8080/newuser', '\\App\\Controllers\\AdminController/ruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:30:24'),
(669, 1, '::1', 'http://localhost:8080/Admin', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:31:23'),
(670, 1, '::1', 'http://localhost:8080/keluar', 'http://localhost:8080/Peminjam', '\\App\\Controllers\\Otentikasi/logout', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:39:13'),
(671, 1, '::1', 'http://localhost:8080/', 'http://localhost:8080/Peminjam', '\\App\\Controllers\\Guest\\Guest/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:39:13'),
(672, 1, '::1', 'http://localhost:8080/ruangan', 'http://localhost:8080/Admin', '\\App\\Controllers\\AdminController/ruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:39:30'),
(673, 1, '::1', 'http://localhost:8080/otentikasi', 'http://localhost:8080/', '\\App\\Controllers\\Otentikasi/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:40:13'),
(674, 1, '::1', 'http://localhost:8080/signup', 'http://localhost:8080/otentikasi', '\\App\\Controllers\\Otentikasi/signup', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:40:15'),
(675, 1, '::1', 'http://localhost:8080/daftar', 'http://localhost:8080/otentikasi', '\\App\\Controllers\\Otentikasi/daftar', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:40:49'),
(676, 1, '::1', 'http://localhost:8080/otentikasi', 'http://localhost:8080/otentikasi', '\\App\\Controllers\\Otentikasi/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:40:49'),
(677, 1, '::1', 'http://localhost:8080/signup', 'http://localhost:8080/otentikasi', '\\App\\Controllers\\Otentikasi/signup', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:40:52'),
(678, 1, '::1', 'http://localhost:8080/daftar', 'http://localhost:8080/otentikasi', '\\App\\Controllers\\Otentikasi/daftar', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:41:25'),
(679, 1, '::1', 'http://localhost:8080/otentikasi', 'http://localhost:8080/otentikasi', '\\App\\Controllers\\Otentikasi/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:41:25'),
(680, 1, '::1', 'http://localhost:8080/Admin', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:41:33'),
(681, 1, '::1', 'http://localhost:8080/peminjaman', 'http://localhost:8080/Admin', '\\App\\Controllers\\AdminController/request', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:41:47'),
(682, 1, '::1', 'http://localhost:8080/requestdata/', 'http://localhost:8080/peminjaman', '\\App\\Controllers\\AdminController/getDatarequest', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:41:48'),
(683, 1, '::1', 'http://localhost:8080/newuser', 'http://localhost:8080/peminjaman', '\\App\\Controllers\\AdminController/newuser', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:41:52'),
(684, 1, '::1', 'http://localhost:8080/newuserdata/', 'http://localhost:8080/newuser', '\\App\\Controllers\\AdminController/getDatanewuser', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:41:52'),
(685, 1, '::1', 'http://localhost:8080/Admin', 'http://localhost:8080/newuser', '\\App\\Controllers\\AdminController/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:42:36'),
(686, 1, '::1', 'http://localhost:8080/masuk', 'http://localhost:8080/otentikasi', '\\App\\Controllers\\Otentikasi/login', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:43:46'),
(687, 1, '::1', 'http://localhost:8080/otentikasi', 'http://localhost:8080/otentikasi', '\\App\\Controllers\\Otentikasi/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:43:47'),
(688, 1, '::1', 'http://localhost:8080/masuk', 'http://localhost:8080/otentikasi', '\\App\\Controllers\\Otentikasi/login', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:43:52'),
(689, 1, '::1', 'http://localhost:8080/otentikasi', 'http://localhost:8080/otentikasi', '\\App\\Controllers\\Otentikasi/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:43:52'),
(690, 1, '::1', 'http://localhost:8080/masuk', 'http://localhost:8080/otentikasi', '\\App\\Controllers\\Otentikasi/login', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:43:59'),
(691, 1, '::1', 'http://localhost:8080/Peminjam', 'http://localhost:8080/otentikasi', '\\App\\Controllers\\MemberController/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:43:59'),
(692, 1, '::1', 'http://localhost:8080/formpinjam/1', 'http://localhost:8080/Peminjam', '\\App\\Controllers\\MemberController/formpinjam', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:44:02'),
(693, 1, '::1', 'http://localhost:8080/pinjam', 'http://localhost:8080/Peminjam', '\\App\\Controllers\\MemberController/pinjam', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:44:03'),
(694, 1, '::1', 'http://localhost:8080/Peminjam', 'http://localhost:8080/Peminjam', '\\App\\Controllers\\MemberController/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:44:03'),
(695, 1, '::1', 'http://localhost:8080/formpinjam/2', 'http://localhost:8080/Peminjam', '\\App\\Controllers\\MemberController/formpinjam', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:46:01'),
(696, 1, '::1', 'http://localhost:8080/pinjam', 'http://localhost:8080/Peminjam', '\\App\\Controllers\\MemberController/pinjam', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:46:02'),
(697, 1, '::1', 'http://localhost:8080/Peminjam', 'http://localhost:8080/Peminjam', '\\App\\Controllers\\MemberController/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:46:02'),
(698, 1, '::1', 'http://localhost:8080/ruangan', 'http://localhost:8080/Admin', '\\App\\Controllers\\AdminController/ruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:46:42'),
(699, 1, '::1', 'http://localhost:8080/ubahruangan/1', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/ubahruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:46:46'),
(700, 1, '::1', 'http://localhost:8080/formpinjam/1', 'http://localhost:8080/Peminjam', '\\App\\Controllers\\MemberController/formpinjam', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:57:52'),
(701, 1, '::1', 'http://localhost:8080/ruangan', 'http://localhost:8080/Admin', '\\App\\Controllers\\AdminController/ruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:58:02'),
(702, 1, '::1', 'http://localhost:8080/ubahruangan/1', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/ubahruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 14:58:04'),
(703, 1, '::1', 'http://localhost:8080/ruangan', 'http://localhost:8080/Admin', '\\App\\Controllers\\AdminController/ruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:00:22'),
(704, 1, '::1', 'http://localhost:8080/ubahruangan/1', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/ubahruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:00:25'),
(705, 1, '::1', 'http://localhost:8080/ruangan', 'http://localhost:8080/Admin', '\\App\\Controllers\\AdminController/ruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:02:52'),
(706, 1, '::1', 'http://localhost:8080/profilpeminjam', 'http://localhost:8080/Peminjam', '\\App\\Controllers\\MemberController/profil', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:02:58'),
(707, 1, '::1', 'http://localhost:8080/profiluser/53', 'http://localhost:8080/profilpeminjam', '\\App\\Controllers\\MemberController/profilUser', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:02:59'),
(708, 1, '::1', 'http://localhost:8080/editprofil/53', 'http://localhost:8080/profiluser/53', '\\App\\Controllers\\MemberController/editprofil', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:03:01'),
(709, 1, '::1', 'http://localhost:8080/ubahruangan/1', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/ubahruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:06:01'),
(710, 1, '::1', 'http://localhost:8080/ruangan', 'http://localhost:8080/Admin', '\\App\\Controllers\\AdminController/ruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:06:15'),
(711, 1, '::1', 'http://localhost:8080/ubahruangan/1', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/ubahruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:06:53'),
(712, 1, '::1', 'http://localhost:8080/ruangan', 'http://localhost:8080/Admin', '\\App\\Controllers\\AdminController/ruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:06:59'),
(713, 1, '::1', 'http://localhost:8080/ubahruangan/1', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/ubahruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:07:26'),
(714, 1, '::1', 'http://localhost:8080/ruangan', 'http://localhost:8080/Admin', '\\App\\Controllers\\AdminController/ruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:07:32'),
(715, 1, '::1', 'http://localhost:8080/ubahruangan/2', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/ubahruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:07:47'),
(716, 1, '::1', 'http://localhost:8080/ruangan', 'http://localhost:8080/Admin', '\\App\\Controllers\\AdminController/ruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:09:29'),
(717, 1, '::1', 'http://localhost:8080/ubahruangan/1', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/ubahruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:09:31'),
(718, 1, '::1', 'http://localhost:8080/updateruangan/1', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/updateRuangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:09:32'),
(719, 1, '::1', 'http://localhost:8080/ruangan', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/ruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:09:32'),
(720, 1, '::1', 'http://localhost:8080/ubahruangan/1', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/ubahruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:09:36'),
(721, 1, '::1', 'http://localhost:8080/updateruangan/1', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/updateRuangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:09:40'),
(722, 1, '::1', 'http://localhost:8080/ruangan', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/ruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:09:40'),
(723, 1, '::1', 'http://localhost:8080/ubahruangan/1', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/ubahruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:10:38'),
(724, 1, '::1', 'http://localhost:8080/updateruangan/1', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/updateRuangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:10:42'),
(725, 1, '::1', 'http://localhost:8080/ruangan', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/ruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:10:42'),
(726, 1, '::1', 'http://localhost:8080/ubahruangan/1', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/ubahruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:11:20'),
(727, 1, '::1', 'http://localhost:8080/updateruangan/1', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/updateRuangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:11:24'),
(728, 1, '::1', 'http://localhost:8080/ruangan', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/ruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:11:24'),
(729, 1, '::1', 'http://localhost:8080/ubahruangan/2', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/ubahruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:11:59'),
(730, 1, '::1', 'http://localhost:8080/updateruangan/2', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/updateRuangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:12:00'),
(731, 1, '::1', 'http://localhost:8080/ruangan', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/ruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:12:00'),
(732, 1, '::1', 'http://localhost:8080/ubahruangan/1', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/ubahruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:12:28'),
(733, 1, '::1', 'http://localhost:8080/updateruangan/1', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/updateRuangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:12:31'),
(734, 1, '::1', 'http://localhost:8080/ruangan', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/ruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:12:31'),
(735, 1, '::1', 'http://localhost:8080/ubahruangan/3', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/ubahruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:18:08'),
(736, 1, '::1', 'http://localhost:8080/updateruangan/3', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/updateRuangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:18:16'),
(737, 1, '::1', 'http://localhost:8080/ruangan', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/ruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:18:16'),
(738, 1, '::1', 'http://localhost:8080/ubahruangan/3', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/ubahruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:18:28'),
(739, 1, '::1', 'http://localhost:8080/updateruangan/3', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/updateRuangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:18:31'),
(740, 1, '::1', 'http://localhost:8080/ruangan', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/ruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:18:32'),
(741, 1, '::1', 'http://localhost:8080/ubahruangan/1', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/ubahruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:18:38'),
(742, 1, '::1', 'http://localhost:8080/updateruangan/1', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/updateRuangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:18:42'),
(743, 1, '::1', 'http://localhost:8080/ruangan', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/ruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:18:42'),
(744, 1, '::1', 'http://localhost:8080/ubahruangan/1', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/ubahruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:19:02'),
(745, 1, '::1', 'http://localhost:8080/updateruangan/1', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/updateRuangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:19:05'),
(746, 1, '::1', 'http://localhost:8080/ruangan', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/ruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:19:05'),
(747, 1, '::1', 'http://localhost:8080/ubahruangan/1', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/ubahruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:19:12'),
(748, 1, '::1', 'http://localhost:8080/updateruangan/1', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/updateRuangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:19:15'),
(749, 1, '::1', 'http://localhost:8080/ruangan', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/ruangan', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:19:15'),
(750, 1, '::1', 'http://localhost:8080/newuser', 'http://localhost:8080/ruangan', '\\App\\Controllers\\AdminController/newuser', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:19:19'),
(751, 1, '::1', 'http://localhost:8080/newuserdata/', 'http://localhost:8080/newuser', '\\App\\Controllers\\AdminController/getDatanewuser', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:19:20'),
(752, 1, '::1', 'http://localhost:8080/Admin', 'http://localhost:8080/newuser', '\\App\\Controllers\\AdminController/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:19:21'),
(753, 1, '::1', 'http://localhost:8080/newuser', 'http://localhost:8080/Admin', '\\App\\Controllers\\AdminController/newuser', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:19:50'),
(754, 1, '::1', 'http://localhost:8080/newuserdata/', 'http://localhost:8080/newuser', '\\App\\Controllers\\AdminController/getDatanewuser', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:19:51'),
(755, 1, '::1', 'http://localhost:8080/Admin', 'http://localhost:8080/newuser', '\\App\\Controllers\\AdminController/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:19:52'),
(756, 1, '::1', 'http://localhost:8080/keluar', 'http://localhost:8080/Admin', '\\App\\Controllers\\Otentikasi/logout', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:24:31'),
(757, 1, '::1', 'http://localhost:8080/', 'http://localhost:8080/Admin', '\\App\\Controllers\\Guest\\Guest/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:24:31'),
(758, 1, '::1', 'http://localhost:8080/otentikasi', 'http://localhost:8080/', '\\App\\Controllers\\Otentikasi/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:24:34'),
(759, 1, '::1', 'http://localhost:8080/masuk', 'http://localhost:8080/otentikasi', '\\App\\Controllers\\Otentikasi/login', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:25:00'),
(760, 1, '::1', 'http://localhost:8080/Peminjam', 'http://localhost:8080/otentikasi', '\\App\\Controllers\\MemberController/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:25:00'),
(761, 1, '::1', 'http://localhost:8080/formpinjam/3', 'http://localhost:8080/Peminjam', '\\App\\Controllers\\MemberController/formpinjam', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:25:03'),
(762, 1, '::1', 'http://localhost:8080/pinjam', 'http://localhost:8080/Peminjam', '\\App\\Controllers\\MemberController/pinjam', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:25:19'),
(763, 1, '::1', 'http://localhost:8080/Peminjam', 'http://localhost:8080/Peminjam', '\\App\\Controllers\\MemberController/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:25:19'),
(764, 1, '::1', 'http://localhost:8080/keluar', 'http://localhost:8080/Peminjam', '\\App\\Controllers\\Otentikasi/logout', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:25:24'),
(765, 1, '::1', 'http://localhost:8080/', 'http://localhost:8080/Peminjam', '\\App\\Controllers\\Guest\\Guest/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:25:24'),
(766, 1, '::1', 'http://localhost:8080/otentikasi', 'http://localhost:8080/', '\\App\\Controllers\\Otentikasi/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:25:43'),
(767, 1, '::1', 'http://localhost:8080/masuk', 'http://localhost:8080/otentikasi', '\\App\\Controllers\\Otentikasi/login', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:25:49'),
(768, 1, '::1', 'http://localhost:8080/Peminjam', 'http://localhost:8080/otentikasi', '\\App\\Controllers\\MemberController/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:25:49'),
(769, 1, '::1', 'http://localhost:8080/formpinjam/2', 'http://localhost:8080/Peminjam', '\\App\\Controllers\\MemberController/formpinjam', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:25:51'),
(770, 1, '::1', 'http://localhost:8080/pinjam', 'http://localhost:8080/Peminjam', '\\App\\Controllers\\MemberController/pinjam', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:26:11'),
(771, 1, '::1', 'http://localhost:8080/Peminjam', 'http://localhost:8080/Peminjam', '\\App\\Controllers\\MemberController/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:26:11'),
(772, 1, '::1', 'http://localhost:8080/keluar', 'http://localhost:8080/Peminjam', '\\App\\Controllers\\Otentikasi/logout', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:27:53'),
(773, 1, '::1', 'http://localhost:8080/', 'http://localhost:8080/Peminjam', '\\App\\Controllers\\Guest\\Guest/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:27:53'),
(774, 1, '::1', 'http://localhost:8080/otentikasi', 'http://localhost:8080/newuser', '\\App\\Controllers\\Otentikasi/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:31:34'),
(775, 1, '::1', 'http://localhost:8080/masuk', 'http://localhost:8080/otentikasi', '\\App\\Controllers\\Otentikasi/login', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:31:38'),
(776, 1, '::1', 'http://localhost:8080/Admin', 'http://localhost:8080/otentikasi', '\\App\\Controllers\\AdminController/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:31:39'),
(777, 1, '::1', 'http://localhost:8080/peminjaman', 'http://localhost:8080/Admin', '\\App\\Controllers\\AdminController/request', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:31:46'),
(778, 1, '::1', 'http://localhost:8080/requestdata/', 'http://localhost:8080/peminjaman', '\\App\\Controllers\\AdminController/getDatarequest', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:31:47'),
(779, 1, '::1', 'http://localhost:8080/keluar', 'http://localhost:8080/peminjaman', '\\App\\Controllers\\Otentikasi/logout', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:33:31'),
(780, 1, '::1', 'http://localhost:8080/', 'http://localhost:8080/peminjaman', '\\App\\Controllers\\Guest\\Guest/index', '', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36', 0, '2023-12-28 15:33:31');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `ruangans`
--
ALTER TABLE `ruangans`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`visitor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `visitor_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=781;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
