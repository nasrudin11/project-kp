-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2024 at 03:06 AM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `harga_produk`
--

CREATE TABLE `harga_produk` (
  `id_harga` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `id_produk` int(10) UNSIGNED NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `pasokan` decimal(10,2) NOT NULL,
  `id_satuan_harga` int(11) UNSIGNED NOT NULL,
  `id_satuan_pasokan` int(11) UNSIGNED NOT NULL,
  `tgl_entry` date NOT NULL,
  `tgl_pelaporan` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tipe_harga` enum('grosir','pengecer','produsen') NOT NULL DEFAULT 'pengecer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(10) UNSIGNED NOT NULL,
  `nama_kecamatan` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`, `created_at`, `updated_at`) VALUES
(1, 'Tikung', NULL, NULL),
(2, 'Mantup', NULL, NULL),
(3, 'Ngimbang', NULL, NULL),
(4, 'Bluluk', NULL, NULL),
(5, 'Modo', NULL, NULL),
(6, 'Kedungpring', NULL, NULL),
(7, 'Brondong', NULL, NULL),
(8, 'Laren', NULL, NULL),
(9, 'Kalitengah', NULL, NULL),
(10, 'Sukodadi', NULL, NULL),
(11, 'Glagah', NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `laporan_grosir`
-- (See below for the actual view)
--
CREATE TABLE `laporan_grosir` (
`id_harga` bigint(20) unsigned
,`produk` varchar(30)
,`pasar` varchar(30)
,`harga` varchar(17)
,`pasokan` varchar(13)
,`pelapor` varchar(40)
,`tgl_lapor` date
,`hari` varchar(9)
,`tgl_entri` date
,`satuan_harga` varchar(10)
,`satuan_pasokan` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `laporan_harga_grosir`
-- (See below for the actual view)
--
CREATE TABLE `laporan_harga_grosir` (
`produk` varchar(30)
,`Psr_Sidoharjo` decimal(32,2)
,`Psr_Ikan` decimal(32,2)
,`Psr_Babat` decimal(32,2)
,`Psr_Blimbing` decimal(32,2)
,`Psr_Sumberdadi` decimal(32,2)
,`Psr_Sendangrejo` decimal(32,2)
,`Psr_Sekaran` decimal(32,2)
,`Psr_Lembung` decimal(32,2)
,`Psr_Sukodadi` decimal(32,2)
,`ratarata` decimal(39,0)
,`tanggal` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `laporan_harga_pengecer`
-- (See below for the actual view)
--
CREATE TABLE `laporan_harga_pengecer` (
`produk` varchar(30)
,`Psr_Sidoharjo` decimal(32,2)
,`Psr_Ikan` decimal(32,2)
,`Psr_Babat` decimal(32,2)
,`Psr_Blimbing` decimal(32,2)
,`Psr_Sumberdadi` decimal(32,2)
,`Psr_Sendangrejo` decimal(32,2)
,`Psr_Sekaran` decimal(32,2)
,`Psr_Lembung` decimal(32,2)
,`Psr_Sukodadi` decimal(32,2)
,`ratarata` decimal(39,0)
,`tanggal` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `laporan_pengecer`
-- (See below for the actual view)
--
CREATE TABLE `laporan_pengecer` (
`id_harga` bigint(20) unsigned
,`produk` varchar(30)
,`pasar` varchar(30)
,`harga` varchar(17)
,`pasokan` varchar(13)
,`pelapor` varchar(40)
,`tgl_lapor` date
,`hari` varchar(9)
,`tgl_entri` date
,`satuan_harga` varchar(10)
,`satuan_pasokan` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `laporan_produsen`
-- (See below for the actual view)
--
CREATE TABLE `laporan_produsen` (
`id_harga` bigint(20) unsigned
,`produk` varchar(30)
,`kecamatan` varchar(30)
,`harga` varchar(17)
,`pasokan` varchar(13)
,`pelapor` varchar(40)
,`tgl_lapor` date
,`hari` varchar(9)
,`tgl_entri` date
,`satuan_harga` varchar(10)
,`satuan_pasokan` varchar(10)
);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_07_16_033136_create_pasar_table', 1),
(6, '2024_07_16_033232_create_kecamatan_table', 1),
(7, '2024_07_16_033242_create_produk_table', 1),
(8, '2024_07_16_033259_create_satuan_table', 1),
(9, '2024_07_16_035010_create_harga_produk_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pasar`
--

CREATE TABLE `pasar` (
  `id_pasar` int(10) UNSIGNED NOT NULL,
  `nama_pasar` varchar(30) NOT NULL,
  `alamat_pasar` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pasar`
--

INSERT INTO `pasar` (`id_pasar`, `nama_pasar`, `alamat_pasar`, `created_at`, `updated_at`) VALUES
(1, 'Psr. Sidoarjp', 'Lamongan', NULL, NULL),
(2, 'Psr. Ikan', 'Lamongan', NULL, NULL),
(3, 'Psr. Babat', 'Babat', NULL, NULL),
(4, 'Psr. Blimbing', 'Paciran', NULL, NULL),
(5, 'Psr. Sumberdadi', 'Mantup', NULL, NULL),
(6, 'Psr. Sendangrejo', 'Ngimbang', NULL, NULL),
(7, 'Psr. Sekaran', 'Sekaran', NULL, NULL),
(8, 'Psr. Lembung', 'Kalitengah', NULL, NULL),
(9, 'Psr. Sukodadi', 'Sukodadi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(10) UNSIGNED NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `target` enum('Produsen','Pedagang','Keduanya') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `gambar`, `target`, `created_at`, `updated_at`) VALUES
(31, 'Gabah Kering Panen (GKP)', NULL, 'Produsen', NULL, NULL),
(32, 'Gabah Kering Giling (GKG)', NULL, 'Produsen', NULL, NULL),
(33, 'Jagung Pipilan Basah', NULL, 'Produsen', NULL, NULL),
(34, 'Jagung Pipilan Kering', NULL, 'Produsen', NULL, NULL),
(35, 'Beras Medium', NULL, 'Keduanya', '2024-07-20 08:04:37', '2024-07-20 08:10:27'),
(36, 'Beras Termurah', NULL, 'Keduanya', '2024-07-20 08:04:44', '2024-07-20 08:10:35'),
(37, 'Jagung Pipilan', NULL, 'Pedagang', '2024-07-20 08:04:51', '2024-07-20 08:04:51'),
(38, 'Kedelai', NULL, 'Keduanya', '2024-07-20 08:04:58', '2024-07-20 08:11:15'),
(39, 'Kacang Hijau', NULL, 'Keduanya', '2024-07-20 08:05:10', '2024-07-20 08:11:27'),
(40, 'Kacang Tanah', NULL, 'Keduanya', '2024-07-20 08:05:23', '2024-07-20 08:11:37'),
(41, 'Ubi Kayu', NULL, 'Keduanya', '2024-07-20 08:05:33', '2024-07-20 08:11:50'),
(42, 'Ubi Jalar', NULL, 'Keduanya', '2024-07-20 08:05:42', '2024-07-20 08:12:21'),
(43, 'Bawang Merah', NULL, 'Keduanya', '2024-07-20 08:05:50', '2024-07-20 08:12:33'),
(44, 'Bawang Putih (Bonggol)', NULL, 'Pedagang', '2024-07-20 08:06:00', '2024-07-20 08:06:00'),
(45, 'Bawang Putih (Kating)', NULL, 'Pedagang', '2024-07-20 08:06:15', '2024-07-20 08:06:15'),
(46, 'Cabai Merah Besar', NULL, 'Keduanya', '2024-07-20 08:06:28', '2024-07-20 08:13:24'),
(47, 'Cabai Keriting', NULL, 'Keduanya', '2024-07-20 08:06:41', '2024-07-20 08:13:37'),
(48, 'Cabai Rawit Merah', NULL, 'Keduanya', '2024-07-20 08:06:51', '2024-07-20 08:13:56'),
(49, 'Gula Pasir', NULL, 'Pedagang', '2024-07-20 08:07:21', '2024-07-20 08:07:21'),
(50, 'Minyak Goreng Curah', NULL, 'Pedagang', '2024-07-20 08:07:39', '2024-07-20 08:07:39'),
(51, 'Tepung Terigu Curah', NULL, 'Pedagang', '2024-07-20 08:07:50', '2024-07-20 08:07:50'),
(52, 'Telur Ayam', NULL, 'Pedagang', '2024-07-20 08:08:10', '2024-07-20 08:08:10'),
(53, 'Daging Ayam', NULL, 'Pedagang', '2024-07-20 08:08:18', '2024-07-20 08:08:18'),
(54, 'Daging Sapi', NULL, 'Pedagang', '2024-07-20 08:08:35', '2024-07-20 08:08:35'),
(55, 'Ikan Bandeng', NULL, 'Keduanya', '2024-07-20 08:08:50', '2024-07-20 08:14:29'),
(56, 'Ikan Mujair', NULL, 'Keduanya', '2024-07-20 08:09:04', '2024-07-20 08:14:44'),
(57, 'Udang', NULL, 'Keduanya', '2024-07-20 08:09:13', '2024-07-20 08:14:52'),
(65, 'Contoh', NULL, 'Produsen', '2024-07-20 09:31:19', '2024-07-20 09:31:19');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) UNSIGNED NOT NULL,
  `nama_satuan` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','pedagang','produsen') NOT NULL,
  `gambar_profil` varchar(255) NOT NULL,
  `id_kecamatan` int(10) UNSIGNED DEFAULT NULL,
  `id_pasar` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `gambar_profil`, `id_kecamatan`, `id_pasar`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Mas Admin', 'admin@gmail.com', NULL, '$2y$12$K.lWwMhuUZY59BYaGSrFuO9BrQV6Pdwzn0Ng6WdXZTtySvmnfPt.m', 'admin', '', NULL, NULL, NULL, '2024-07-18 22:40:34', '2024-07-18 22:40:34'),
(7, 'Mas Pedagang', 'pengecer@gmail.com', NULL, '$2y$12$A.i68ntY9OEZ21i0lSR/yui49vcVb6DbMmmQSMI8JrIn7Wj.QQYam', 'pedagang', '', NULL, NULL, NULL, '2024-07-18 22:40:34', '2024-07-18 22:40:34'),
(8, 'Mas Produsen', 'produsen@gmail.com', NULL, '$2y$12$Y5.KpPdkCtpD2BBQygroj.tsnRd5upumyScFAoSKG7U4I5GWo1G4S', 'produsen', '', NULL, NULL, NULL, '2024-07-18 22:40:34', '2024-07-18 22:40:34'),
(9, 'Ahmad Nasrudin Jamil', 'ahmad@gmail.com', NULL, '$2y$12$IkJ8GvXa7EVWOsEOH0C1WegHCftLwhB/LkLj8agv0fnQR/poIioca', 'produsen', 'profil-img/iKoeWJqY42ebcezMaQtpsMxBD0wh9q36RcklMiPS.jpg', NULL, NULL, NULL, '2024-07-20 06:50:19', '2024-07-20 06:50:19');

-- --------------------------------------------------------

--
-- Structure for view `laporan_grosir`
--
DROP TABLE IF EXISTS `laporan_grosir`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_grosir`  AS SELECT `hg`.`id_harga` AS `id_harga`, `p`.`nama_produk` AS `produk`, `ps`.`nama_pasar` AS `pasar`, concat('Rp. ',format(`hg`.`harga`,0)) AS `harga`, concat(format(`hg`.`pasokan`,0)) AS `pasokan`, `u`.`name` AS `pelapor`, `hg`.`tgl_pelaporan` AS `tgl_lapor`, dayname(`hg`.`tgl_pelaporan`) AS `hari`, `hg`.`tgl_entry` AS `tgl_entri`, `s1`.`nama_satuan` AS `satuan_harga`, `s2`.`nama_satuan` AS `satuan_pasokan` FROM (((((`harga_produk` `hg` join `produk` `p` on(`hg`.`id_produk` = `p`.`id_produk`)) join `users` `u` on(`hg`.`id_user` = `u`.`id`)) join `pasar` `ps` on(`u`.`id_pasar` = `ps`.`id_pasar`)) join `satuan` `s1` on(`hg`.`id_satuan_harga` = `s1`.`id_satuan`)) join `satuan` `s2` on(`hg`.`id_satuan_pasokan` = `s2`.`id_satuan`)) WHERE `hg`.`tipe_harga` = 'grosir' ;

-- --------------------------------------------------------

--
-- Structure for view `laporan_harga_grosir`
--
DROP TABLE IF EXISTS `laporan_harga_grosir`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_harga_grosir`  AS SELECT `p`.`nama_produk` AS `produk`, coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Sidoharjo' then `hp`.`harga` else 0 end),0) AS `Psr_Sidoharjo`, coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Ikan' then `hp`.`harga` else 0 end),0) AS `Psr_Ikan`, coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Babat' then `hp`.`harga` else 0 end),0) AS `Psr_Babat`, coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Blimbing' then `hp`.`harga` else 0 end),0) AS `Psr_Blimbing`, coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Sumberdadi' then `hp`.`harga` else 0 end),0) AS `Psr_Sumberdadi`, coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Sendangrejo' then `hp`.`harga` else 0 end),0) AS `Psr_Sendangrejo`, coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Sekaran' then `hp`.`harga` else 0 end),0) AS `Psr_Sekaran`, coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Lembung' then `hp`.`harga` else 0 end),0) AS `Psr_Lembung`, coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Sukodadi' then `hp`.`harga` else 0 end),0) AS `Psr_Sukodadi`, round((coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Sidoharjo' then `hp`.`harga` else 0 end),0) + coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Ikan' then `hp`.`harga` else 0 end),0) + coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Babat' then `hp`.`harga` else 0 end),0) + coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Blimbing' then `hp`.`harga` else 0 end),0) + coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Sumberdadi' then `hp`.`harga` else 0 end),0) + coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Sendangrejo' then `hp`.`harga` else 0 end),0) + coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Sekaran' then `hp`.`harga` else 0 end),0) + coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Lembung' then `hp`.`harga` else 0 end),0) + coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Sukodadi' then `hp`.`harga` else 0 end),0)) / 9,0) AS `ratarata`, `hp`.`tgl_pelaporan` AS `tanggal` FROM (((`harga_produk` `hp` join `produk` `p` on(`hp`.`id_produk` = `p`.`id_produk`)) join `users` `u` on(`hp`.`id_user` = `u`.`id`)) join `pasar` `ps` on(`u`.`id_pasar` = `ps`.`id_pasar`)) WHERE `hp`.`tipe_harga` = 'grosir' GROUP BY `p`.`nama_produk`, `hp`.`tgl_pelaporan` ;

-- --------------------------------------------------------

--
-- Structure for view `laporan_harga_pengecer`
--
DROP TABLE IF EXISTS `laporan_harga_pengecer`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_harga_pengecer`  AS SELECT `p`.`nama_produk` AS `produk`, coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Sidoharjo' then `hp`.`harga` else 0 end),0) AS `Psr_Sidoharjo`, coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Ikan' then `hp`.`harga` else 0 end),0) AS `Psr_Ikan`, coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Babat' then `hp`.`harga` else 0 end),0) AS `Psr_Babat`, coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Blimbing' then `hp`.`harga` else 0 end),0) AS `Psr_Blimbing`, coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Sumberdadi' then `hp`.`harga` else 0 end),0) AS `Psr_Sumberdadi`, coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Sendangrejo' then `hp`.`harga` else 0 end),0) AS `Psr_Sendangrejo`, coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Sekaran' then `hp`.`harga` else 0 end),0) AS `Psr_Sekaran`, coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Lembung' then `hp`.`harga` else 0 end),0) AS `Psr_Lembung`, coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Sukodadi' then `hp`.`harga` else 0 end),0) AS `Psr_Sukodadi`, round((coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Sidoharjo' then `hp`.`harga` else 0 end),0) + coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Ikan' then `hp`.`harga` else 0 end),0) + coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Babat' then `hp`.`harga` else 0 end),0) + coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Blimbing' then `hp`.`harga` else 0 end),0) + coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Sumberdadi' then `hp`.`harga` else 0 end),0) + coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Sendangrejo' then `hp`.`harga` else 0 end),0) + coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Sekaran' then `hp`.`harga` else 0 end),0) + coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Lembung' then `hp`.`harga` else 0 end),0) + coalesce(sum(case when `ps`.`nama_pasar` = 'Psr. Sukodadi' then `hp`.`harga` else 0 end),0)) / 9,0) AS `ratarata`, `hp`.`tgl_pelaporan` AS `tanggal` FROM (((`harga_produk` `hp` join `produk` `p` on(`hp`.`id_produk` = `p`.`id_produk`)) join `users` `u` on(`hp`.`id_user` = `u`.`id`)) join `pasar` `ps` on(`u`.`id_pasar` = `ps`.`id_pasar`)) WHERE `hp`.`tipe_harga` = 'pengecer' GROUP BY `p`.`nama_produk`, `hp`.`tgl_pelaporan` ;

-- --------------------------------------------------------

--
-- Structure for view `laporan_pengecer`
--
DROP TABLE IF EXISTS `laporan_pengecer`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_pengecer`  AS SELECT `hp`.`id_harga` AS `id_harga`, `p`.`nama_produk` AS `produk`, `ps`.`nama_pasar` AS `pasar`, concat('Rp. ',format(`hp`.`harga`,0)) AS `harga`, concat(format(`hp`.`pasokan`,0)) AS `pasokan`, `u`.`name` AS `pelapor`, `hp`.`tgl_pelaporan` AS `tgl_lapor`, dayname(`hp`.`tgl_pelaporan`) AS `hari`, `hp`.`tgl_entry` AS `tgl_entri`, `s1`.`nama_satuan` AS `satuan_harga`, `s2`.`nama_satuan` AS `satuan_pasokan` FROM (((((`harga_produk` `hp` join `produk` `p` on(`hp`.`id_produk` = `p`.`id_produk`)) join `users` `u` on(`hp`.`id_user` = `u`.`id`)) join `pasar` `ps` on(`u`.`id_pasar` = `ps`.`id_pasar`)) join `satuan` `s1` on(`hp`.`id_satuan_harga` = `s1`.`id_satuan`)) join `satuan` `s2` on(`hp`.`id_satuan_pasokan` = `s2`.`id_satuan`)) WHERE `hp`.`tipe_harga` = 'pengecer' ;

-- --------------------------------------------------------

--
-- Structure for view `laporan_produsen`
--
DROP TABLE IF EXISTS `laporan_produsen`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `laporan_produsen`  AS SELECT `hp`.`id_harga` AS `id_harga`, `p`.`nama_produk` AS `produk`, `kc`.`nama_kecamatan` AS `kecamatan`, concat('Rp. ',format(`hp`.`harga`,0)) AS `harga`, concat(format(`hp`.`pasokan`,0)) AS `pasokan`, `u`.`name` AS `pelapor`, `hp`.`tgl_pelaporan` AS `tgl_lapor`, dayname(`hp`.`tgl_pelaporan`) AS `hari`, `hp`.`tgl_entry` AS `tgl_entri`, `s1`.`nama_satuan` AS `satuan_harga`, `s2`.`nama_satuan` AS `satuan_pasokan` FROM (((((`harga_produk` `hp` join `produk` `p` on(`hp`.`id_produk` = `p`.`id_produk`)) join `users` `u` on(`hp`.`id_user` = `u`.`id`)) join `kecamatan` `kc` on(`u`.`id_kecamatan` = `kc`.`id_kecamatan`)) join `satuan` `s1` on(`hp`.`id_satuan_harga` = `s1`.`id_satuan`)) join `satuan` `s2` on(`hp`.`id_satuan_pasokan` = `s2`.`id_satuan`)) WHERE `hp`.`tipe_harga` = 'produsen' ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `harga_produk`
--
ALTER TABLE `harga_produk`
  ADD PRIMARY KEY (`id_harga`),
  ADD KEY `id_user` (`id_user`,`id_satuan_harga`,`id_satuan_pasokan`),
  ADD KEY `id_satuan_harga` (`id_satuan_harga`),
  ADD KEY `id_satuan_pasokan` (`id_satuan_pasokan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`),
  ADD UNIQUE KEY `kecamatan_nama_kecamatan_unique` (`nama_kecamatan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasar`
--
ALTER TABLE `pasar`
  ADD PRIMARY KEY (`id_pasar`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `produk_nama_produk_unique` (`nama_produk`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`),
  ADD UNIQUE KEY `satuan_nama_satuan_unique` (`nama_satuan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id_kecamatan` (`id_kecamatan`,`id_pasar`),
  ADD KEY `id_pasar` (`id_pasar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `harga_produk`
--
ALTER TABLE `harga_produk`
  MODIFY `id_harga` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pasar`
--
ALTER TABLE `pasar`
  MODIFY `id_pasar` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `harga_produk`
--
ALTER TABLE `harga_produk`
  ADD CONSTRAINT `harga_produk_ibfk_1` FOREIGN KEY (`id_satuan_harga`) REFERENCES `satuan` (`id_satuan`),
  ADD CONSTRAINT `harga_produk_ibfk_2` FOREIGN KEY (`id_satuan_pasokan`) REFERENCES `satuan` (`id_satuan`),
  ADD CONSTRAINT `harga_produk_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `harga_produk_ibfk_4` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`),
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`id_pasar`) REFERENCES `pasar` (`id_pasar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
