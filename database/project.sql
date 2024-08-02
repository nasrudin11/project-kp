-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2024 at 09:14 AM
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
  `harga` decimal(10,0) NOT NULL DEFAULT 0,
  `pasokan` decimal(10,0) NOT NULL DEFAULT 0,
  `satuan_harga` varchar(3) NOT NULL DEFAULT 'Kg',
  `satuan_pasokan` varchar(3) NOT NULL DEFAULT 'Kg',
  `tgl_entry` date NOT NULL,
  `tgl_pelaporan` date NOT NULL,
  `tipe_harga` enum('grosir','pengecer','produsen') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `harga_produk`
--

INSERT INTO `harga_produk` (`id_harga`, `id_user`, `id_produk`, `harga`, `pasokan`, `satuan_harga`, `satuan_pasokan`, `tgl_entry`, `tgl_pelaporan`, `tipe_harga`, `created_at`, `updated_at`) VALUES
(162, 7, 34, 12550, 100, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'pengecer', NULL, NULL),
(163, 7, 35, 10000, 100, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'pengecer', NULL, NULL),
(164, 7, 36, 9000, 100, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'pengecer', NULL, NULL),
(165, 7, 37, 6500, 40, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'pengecer', NULL, NULL),
(166, 7, 38, 9000, 35, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'pengecer', NULL, NULL),
(167, 7, 39, 22000, 35, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'pengecer', NULL, NULL),
(168, 7, 40, 25000, 40, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'pengecer', NULL, NULL),
(169, 7, 41, 5000, 50, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'pengecer', NULL, NULL),
(170, 7, 42, 6000, 30, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'pengecer', NULL, NULL),
(171, 7, 43, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'pengecer', NULL, NULL),
(172, 7, 44, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'pengecer', NULL, NULL),
(173, 7, 45, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'pengecer', NULL, NULL),
(174, 7, 46, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'pengecer', NULL, NULL),
(175, 7, 47, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'pengecer', NULL, NULL),
(176, 7, 48, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'pengecer', NULL, NULL),
(177, 7, 49, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'pengecer', NULL, NULL),
(178, 7, 50, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'pengecer', NULL, NULL),
(179, 7, 51, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'pengecer', NULL, NULL),
(180, 7, 52, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'pengecer', NULL, NULL),
(181, 7, 53, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'pengecer', NULL, NULL),
(182, 7, 54, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'pengecer', NULL, NULL),
(183, 7, 55, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'pengecer', NULL, NULL),
(184, 7, 56, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'pengecer', NULL, NULL),
(185, 7, 57, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'pengecer', NULL, NULL),
(186, 7, 34, 11500, 800, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'grosir', NULL, NULL),
(187, 7, 35, 9000, 800, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'grosir', NULL, NULL),
(188, 7, 36, 8000, 800, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'grosir', NULL, NULL),
(189, 7, 37, 8500, 100, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'grosir', NULL, NULL),
(190, 7, 38, 5500, 70, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'grosir', NULL, NULL),
(191, 7, 39, 8000, 70, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'grosir', NULL, NULL),
(192, 7, 40, 20000, 100, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'grosir', NULL, NULL),
(193, 7, 41, 23000, 70, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'grosir', NULL, NULL),
(194, 7, 42, 4000, 100, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'grosir', NULL, NULL),
(195, 7, 43, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'grosir', NULL, NULL),
(196, 7, 44, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'grosir', NULL, NULL),
(197, 7, 45, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'grosir', NULL, NULL),
(198, 7, 46, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'grosir', NULL, NULL),
(199, 7, 47, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'grosir', NULL, NULL),
(200, 7, 48, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'grosir', NULL, NULL),
(201, 7, 49, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'grosir', NULL, NULL),
(202, 7, 50, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'grosir', NULL, NULL),
(203, 7, 51, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'grosir', NULL, NULL),
(204, 7, 52, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'grosir', NULL, NULL),
(205, 7, 53, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'grosir', NULL, NULL),
(206, 7, 54, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'grosir', NULL, NULL),
(207, 7, 55, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'grosir', NULL, NULL),
(208, 7, 56, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'grosir', NULL, NULL),
(209, 7, 57, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-29', 'grosir', NULL, NULL),
(210, 8, 30, 5000, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-30', 'produsen', NULL, NULL),
(211, 8, 31, 5557, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-30', 'produsen', NULL, NULL),
(212, 8, 32, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-30', 'produsen', NULL, NULL),
(213, 8, 33, 4000, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-30', 'produsen', NULL, NULL),
(214, 8, 34, 9500, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-30', 'produsen', NULL, NULL),
(215, 8, 35, 8600, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-30', 'produsen', NULL, NULL),
(216, 8, 36, 7450, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-30', 'produsen', NULL, NULL),
(217, 8, 38, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-30', 'produsen', NULL, NULL),
(218, 8, 39, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-30', 'produsen', NULL, NULL),
(219, 8, 40, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-30', 'produsen', NULL, NULL),
(220, 8, 41, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-30', 'produsen', NULL, NULL),
(221, 8, 42, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-30', 'produsen', NULL, NULL),
(222, 8, 43, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-30', 'produsen', NULL, NULL),
(223, 8, 46, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-30', 'produsen', NULL, NULL),
(224, 8, 47, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-30', 'produsen', NULL, NULL),
(225, 8, 48, 30000, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-30', 'produsen', NULL, NULL),
(226, 8, 55, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-30', 'produsen', NULL, NULL),
(227, 8, 56, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-30', 'produsen', NULL, NULL),
(228, 8, 57, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-30', 'produsen', NULL, NULL),
(229, 7, 34, 12000, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(230, 7, 35, 10000, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(231, 7, 36, 8000, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(232, 7, 37, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(233, 7, 38, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(234, 7, 39, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(235, 7, 40, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(236, 7, 41, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(237, 7, 42, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(238, 7, 43, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(239, 7, 44, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(240, 7, 45, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(241, 7, 46, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(242, 7, 47, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(243, 7, 48, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(244, 7, 49, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(245, 7, 50, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(246, 7, 51, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(247, 7, 52, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(248, 7, 53, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(249, 7, 54, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(250, 7, 55, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(251, 7, 56, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(252, 7, 57, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(253, 9, 34, 11000, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'pengecer', NULL, NULL),
(254, 9, 35, 9000, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'pengecer', NULL, NULL),
(255, 9, 36, 8500, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'pengecer', NULL, NULL),
(256, 9, 37, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'pengecer', NULL, NULL),
(257, 9, 38, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'pengecer', NULL, NULL),
(258, 9, 39, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'pengecer', NULL, NULL),
(259, 9, 40, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'pengecer', NULL, NULL),
(260, 9, 41, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'pengecer', NULL, NULL),
(261, 9, 42, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'pengecer', NULL, NULL),
(262, 9, 43, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'pengecer', NULL, NULL),
(263, 9, 44, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'pengecer', NULL, NULL),
(264, 9, 45, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'pengecer', NULL, NULL),
(265, 9, 46, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'pengecer', NULL, NULL),
(266, 9, 47, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'pengecer', NULL, NULL),
(267, 9, 48, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'pengecer', NULL, NULL),
(268, 9, 49, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'pengecer', NULL, NULL),
(269, 9, 50, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'pengecer', NULL, NULL),
(270, 9, 51, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'pengecer', NULL, NULL),
(271, 9, 52, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'pengecer', NULL, NULL),
(272, 9, 53, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'pengecer', NULL, NULL),
(273, 9, 54, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'pengecer', NULL, NULL),
(274, 9, 55, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'pengecer', NULL, NULL),
(275, 9, 56, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'pengecer', NULL, NULL),
(276, 9, 57, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'pengecer', NULL, NULL),
(277, 9, 34, 12000, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'grosir', NULL, NULL),
(278, 9, 35, 11000, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'grosir', NULL, NULL),
(279, 9, 36, 9000, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'grosir', NULL, NULL),
(280, 9, 37, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'grosir', NULL, NULL),
(281, 9, 38, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'grosir', NULL, NULL),
(282, 9, 39, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'grosir', NULL, NULL),
(283, 9, 40, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'grosir', NULL, NULL),
(284, 9, 41, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'grosir', NULL, NULL),
(285, 9, 42, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'grosir', NULL, NULL),
(286, 9, 43, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'grosir', NULL, NULL),
(287, 9, 44, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'grosir', NULL, NULL),
(288, 9, 45, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'grosir', NULL, NULL),
(289, 9, 46, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'grosir', NULL, NULL),
(290, 9, 47, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'grosir', NULL, NULL),
(291, 9, 48, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'grosir', NULL, NULL),
(292, 9, 49, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'grosir', NULL, NULL),
(293, 9, 50, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'grosir', NULL, NULL),
(294, 9, 51, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'grosir', NULL, NULL),
(295, 9, 52, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'grosir', NULL, NULL),
(296, 9, 53, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'grosir', NULL, NULL),
(297, 9, 54, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'grosir', NULL, NULL),
(298, 9, 55, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'grosir', NULL, NULL),
(299, 9, 56, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'grosir', NULL, NULL),
(300, 9, 57, 0, 0, 'Kg', 'Kg', '2024-07-29', '2024-07-31', 'grosir', NULL, NULL),
(301, 9, 34, 11000, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(302, 9, 35, 10500, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(303, 9, 36, 8500, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(304, 9, 37, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(305, 9, 38, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(306, 9, 39, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(307, 9, 40, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(308, 9, 41, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(309, 9, 42, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(310, 9, 43, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(311, 9, 44, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(312, 9, 45, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(313, 9, 46, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(314, 9, 47, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(315, 9, 48, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(316, 9, 49, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(317, 9, 50, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(318, 9, 51, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(319, 9, 52, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(320, 9, 53, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(321, 9, 54, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(322, 9, 55, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(323, 9, 56, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL),
(324, 9, 57, 0, 0, 'Kg', 'Kg', '2024-08-01', '2024-07-31', 'pengecer', NULL, NULL);

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
(1, 'Psr. Sidoharjo', 'Lamongan', NULL, '2024-07-25 23:23:42'),
(2, 'Psr. Ikan', 'Lamongan', NULL, '2024-07-21 23:55:53'),
(3, 'Psr. Babat', 'Babat', NULL, NULL),
(4, 'Psr. Blimbing', 'Paciran', NULL, NULL),
(5, 'Psr. Sumberdadi', 'Mantup', NULL, NULL),
(6, 'Psr. Sendangrejo', 'Ngimbang', NULL, NULL),
(7, 'Psr. Sekaran', 'Sekaran', NULL, NULL),
(8, 'Psr. Lembung', 'Kalitengah', NULL, NULL),
(9, 'Psr. Sukodadi', 'Sukodadi', NULL, '2024-07-25 23:39:51');

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
(30, 'Gabah Kering Panen (GKP)', 'produk-img/gdgO0n6eZWAYAeiIc9jjSs8XTcLggrwk3x1AILRF.jpg', 'Produsen', NULL, '2024-07-23 18:40:27'),
(31, 'Gabah Kering Giling (GKG)', NULL, 'Produsen', NULL, NULL),
(32, 'Jagung Pipilan Basah', NULL, 'Produsen', NULL, NULL),
(33, 'Jagung Pipilan Kering', NULL, 'Produsen', NULL, NULL),
(34, 'Beras Premium', NULL, 'Keduanya', '2024-07-29 12:19:35', NULL),
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
(57, 'Udang', NULL, 'Keduanya', '2024-07-20 08:09:13', '2024-07-20 08:14:52');

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
  `gambar_profil` varchar(255) DEFAULT NULL,
  `id_kecamatan` int(10) UNSIGNED DEFAULT NULL,
  `id_pasar` int(10) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `alamat` varchar(20) DEFAULT NULL,
  `no_tlp` varchar(14) DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `gambar_profil`, `id_kecamatan`, `id_pasar`, `remember_token`, `created_at`, `updated_at`, `alamat`, `no_tlp`, `jenis_kelamin`, `tanggal_lahir`) VALUES
(6, 'Mas Admin', 'admin@mail.com', NULL, '$2y$12$mHVNcGZJVNDYo6VMLr3nl.zG6tBGbqrRXI6SvLtQtqHXk8Fi2rYeq', 'admin', 'profil-img/y7Ph052We9reytZ3xIcvnPfrZ8HnKiUDyZuarCej.png', NULL, NULL, NULL, '2024-07-18 22:40:34', '2024-07-25 05:52:59', 'Lamongan', '081', 'laki-laki', '2002-01-08'),
(7, 'Admin Psr Sendangrejo', 'sendangrejo@gmail.com', NULL, '$2y$12$M2iqL5VilUupW3HOsQXAhu/zr98n5issJ0KS.7xM0bluWDzQohiTi', 'pedagang', 'profil-img/AzH66cLoGdU8WTPgbViFd2CYyjBWdgIwP3R0fcrY.png', 1, 6, NULL, '2024-07-18 22:40:34', '2024-07-30 22:57:09', 'Turi AI', '088', 'laki-laki', '2000-05-20'),
(8, 'Admin Kec. Tikung', 'tikung@gmail.com', NULL, '$2y$12$ahGzrHIjBnCYAG2AECWD1e4JNj7nZSTjBlKoR0PzzIHbNXkDuoxx.', 'produsen', 'profil-img/x79zLbK84NgmBJJwEnNwJQ0t8RqAq2v58cAgm98B.png', 1, 1, NULL, '2024-07-18 22:40:34', '2024-07-30 22:57:26', NULL, NULL, 'laki-laki', NULL),
(9, 'Admin Psr Ikan', 'Ikan@gmail.com', NULL, '$2y$12$N1xhl9o32ci/AuCmN0OaX.6VKmogwrxnkI1c9lDBqzuBZYJC8k.nO', 'pedagang', 'profil-img/iKoeWJqY42ebcezMaQtpsMxBD0wh9q36RcklMiPS.jpg', 1, 2, NULL, '2024-07-20 06:50:19', '2024-07-30 22:55:56', NULL, NULL, 'laki-laki', NULL),
(11, 'Admin Psr Babat', 'babat@gmail.com', NULL, '$2y$12$tg7oMvPzUyaSDwF5Llkx4ePaAFpgjoOTMClT95yORpt4VnSw/KLI2', 'pedagang', NULL, 1, 3, NULL, '2024-07-22 23:49:44', '2024-07-30 22:56:50', NULL, NULL, 'laki-laki', NULL),
(12, 'Admin Psr Blimbing', 'blimbing@gmail.com', NULL, '$2y$12$tJHI2c2IjmDqUnhXS9plKuyYPKq3nckgdOHfX0eH8D2mb8yJiyW8O', 'pedagang', NULL, 1, 4, NULL, '2024-07-25 18:33:32', '2024-07-30 22:59:05', 'Lamongan', '334', 'laki-laki', NULL),
(13, 'Admin Kec Mantup', 'mantup@gmail.com', NULL, '$2y$12$qdAHccwJge3u4q79Lbeaq.qdKbfum/i8MUz8zV03YtbX7mUr92xPO', 'produsen', NULL, 2, 1, NULL, '2024-07-25 18:36:26', '2024-07-30 22:59:55', NULL, NULL, 'laki-laki', NULL);

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
  ADD KEY `id_user` (`id_user`),
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
  ADD PRIMARY KEY (`id_pasar`),
  ADD UNIQUE KEY `nama_pasar` (`nama_pasar`);

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
  MODIFY `id_harga` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=325;

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
  MODIFY `id_pasar` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `harga_produk`
--
ALTER TABLE `harga_produk`
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
