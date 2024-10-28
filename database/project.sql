-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2024 at 08:02 AM
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
(608, 8, 34, 12500, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(609, 8, 35, 10000, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(610, 8, 36, 9000, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(611, 8, 37, 6500, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(612, 8, 38, 9000, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(613, 8, 39, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(614, 8, 40, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(615, 8, 41, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(616, 8, 42, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(617, 8, 43, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(618, 8, 44, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(619, 8, 45, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(620, 8, 46, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(621, 8, 47, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(622, 8, 48, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(623, 8, 49, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(624, 8, 50, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(625, 8, 51, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(626, 8, 52, 28000, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(627, 8, 53, 40000, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(628, 8, 54, 100000, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(629, 8, 55, 33000, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(630, 8, 56, 32000, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(631, 8, 57, 60000, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(632, 11, 34, 10000, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(633, 11, 35, 9000, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(634, 11, 36, 8000, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(635, 11, 37, 6000, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(636, 11, 38, 10000, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(637, 11, 39, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(638, 11, 40, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(639, 11, 41, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(640, 11, 42, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(641, 11, 43, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(642, 11, 44, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(643, 11, 45, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(644, 11, 46, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(645, 11, 47, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(646, 11, 48, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(647, 11, 49, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(648, 11, 50, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(649, 11, 51, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(650, 11, 52, 27000, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(651, 11, 53, 35000, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(652, 11, 54, 100000, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(653, 11, 55, 32000, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(654, 11, 56, 32000, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(655, 11, 57, 55000, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(656, 12, 34, 11000, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(657, 12, 35, 9500, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(658, 12, 36, 8000, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(659, 12, 37, 6000, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(660, 12, 38, 10000, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(661, 12, 39, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(662, 12, 40, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(663, 12, 41, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(664, 12, 42, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(665, 12, 43, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(666, 12, 44, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(667, 12, 45, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(668, 12, 46, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(669, 12, 47, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(670, 12, 48, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(671, 12, 49, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(672, 12, 50, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(673, 12, 51, 0, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(674, 12, 52, 25000, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(675, 12, 53, 35000, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(676, 12, 54, 100000, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(677, 12, 55, 28000, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(678, 12, 56, 30000, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(679, 12, 57, 50000, 0, 'Kg', 'Kg', '2024-08-29', '2024-09-07', 'pengecer', NULL, NULL),
(680, 8, 34, 11500, 0, 'Kg', 'Kg', '2024-09-02', '2024-09-07', 'pengecer', NULL, NULL),
(681, 8, 35, 9500, 0, 'Kg', 'Kg', '2024-09-02', '2024-09-07', 'pengecer', NULL, NULL),
(682, 8, 36, 8000, 0, 'Kg', 'Kg', '2024-09-02', '2024-09-07', 'pengecer', NULL, NULL),
(683, 8, 37, 7000, 0, 'Kg', 'Kg', '2024-09-02', '2024-09-07', 'pengecer', NULL, NULL),
(684, 8, 38, 8000, 0, 'Kg', 'Kg', '2024-09-02', '2024-09-07', 'pengecer', NULL, NULL),
(685, 8, 39, 0, 0, 'Kg', 'Kg', '2024-09-02', '2024-09-07', 'pengecer', NULL, NULL),
(686, 8, 40, 0, 0, 'Kg', 'Kg', '2024-09-02', '2024-09-07', 'pengecer', NULL, NULL),
(687, 8, 41, 0, 0, 'Kg', 'Kg', '2024-09-02', '2024-09-07', 'pengecer', NULL, NULL),
(688, 8, 42, 0, 0, 'Kg', 'Kg', '2024-09-02', '2024-09-07', 'pengecer', NULL, NULL),
(689, 8, 43, 0, 0, 'Kg', 'Kg', '2024-09-02', '2024-09-07', 'pengecer', NULL, NULL),
(690, 8, 44, 0, 0, 'Kg', 'Kg', '2024-09-02', '2024-09-07', 'pengecer', NULL, NULL),
(691, 8, 45, 0, 0, 'Kg', 'Kg', '2024-09-02', '2024-09-07', 'pengecer', NULL, NULL),
(692, 8, 46, 0, 0, 'Kg', 'Kg', '2024-09-02', '2024-09-07', 'pengecer', NULL, NULL),
(693, 8, 47, 0, 0, 'Kg', 'Kg', '2024-09-02', '2024-09-07', 'pengecer', NULL, NULL),
(694, 8, 48, 0, 0, 'Kg', 'Kg', '2024-09-02', '2024-09-07', 'pengecer', NULL, NULL),
(695, 8, 49, 0, 0, 'Kg', 'Kg', '2024-09-02', '2024-09-07', 'pengecer', NULL, NULL),
(696, 8, 50, 0, 0, 'Kg', 'Kg', '2024-09-02', '2024-09-07', 'pengecer', NULL, NULL),
(697, 8, 51, 0, 0, 'Kg', 'Kg', '2024-09-02', '2024-09-07', 'pengecer', NULL, NULL),
(698, 8, 52, 25000, 0, 'Kg', 'Kg', '2024-09-02', '2024-09-07', 'pengecer', NULL, NULL),
(699, 8, 53, 34000, 0, 'Kg', 'Kg', '2024-09-02', '2024-09-07', 'pengecer', NULL, NULL),
(700, 8, 54, 110000, 0, 'Kg', 'Kg', '2024-09-02', '2024-09-07', 'pengecer', NULL, NULL),
(701, 8, 55, 28000, 0, 'Kg', 'Kg', '2024-09-02', '2024-09-07', 'pengecer', NULL, NULL),
(702, 8, 56, 30000, 0, 'Kg', 'Kg', '2024-09-02', '2024-09-07', 'pengecer', NULL, NULL),
(703, 8, 57, 55000, 0, 'Kg', 'Kg', '2024-09-02', '2024-09-07', 'pengecer', NULL, NULL),
(704, 11, 34, 10000, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(705, 11, 35, 9000, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(706, 11, 36, 8500, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(707, 11, 37, 5000, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(708, 11, 38, 9000, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(709, 11, 39, 0, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(710, 11, 40, 0, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(711, 11, 41, 0, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(712, 11, 42, 0, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(713, 11, 43, 0, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(714, 11, 44, 0, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(715, 11, 45, 0, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(716, 11, 46, 0, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(717, 11, 47, 0, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(718, 11, 48, 0, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(719, 11, 49, 0, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(720, 11, 50, 0, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(721, 11, 51, 0, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(722, 11, 52, 27000, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(723, 11, 53, 36000, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(724, 11, 54, 100000, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(725, 11, 55, 30000, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(726, 11, 56, 30000, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(727, 11, 57, 55000, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(728, 12, 34, 10000, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(729, 12, 35, 9500, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(730, 12, 36, 8500, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(731, 12, 37, 7000, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(732, 12, 38, 8000, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(733, 12, 39, 0, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(734, 12, 40, 0, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(735, 12, 41, 0, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(736, 12, 42, 0, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(737, 12, 43, 0, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(738, 12, 44, 0, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(739, 12, 45, 0, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(740, 12, 46, 0, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(741, 12, 47, 0, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(742, 12, 48, 0, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(743, 12, 49, 0, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(744, 12, 50, 0, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(745, 12, 51, 0, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(746, 12, 52, 25000, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(747, 12, 53, 33000, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(748, 12, 54, 100000, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(749, 12, 55, 30000, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(750, 12, 56, 33000, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(751, 12, 57, 60000, 0, 'Kg', 'Kg', '2024-09-07', '2024-09-07', 'pengecer', NULL, NULL),
(752, 8, 34, 11500, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(753, 8, 35, 9500, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(754, 8, 36, 8500, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(755, 8, 37, 6000, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(756, 8, 38, 7000, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(757, 8, 39, 0, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(758, 8, 40, 0, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(759, 8, 41, 0, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(760, 8, 42, 0, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(761, 8, 43, 0, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(762, 8, 44, 0, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(763, 8, 45, 0, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(764, 8, 46, 0, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(765, 8, 47, 0, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(766, 8, 48, 0, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(767, 8, 49, 0, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(768, 8, 50, 0, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(769, 8, 51, 0, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(770, 8, 52, 24000, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(771, 8, 53, 36000, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(772, 8, 54, 110000, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(773, 8, 55, 30000, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(774, 8, 56, 33000, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(775, 8, 57, 55000, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(776, 12, 34, 11000, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(777, 12, 35, 9500, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(778, 12, 36, 8000, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(779, 12, 37, 7000, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(780, 12, 38, 10000, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(781, 12, 39, 0, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(782, 12, 40, 0, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(783, 12, 41, 0, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(784, 12, 42, 0, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(785, 12, 43, 0, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(786, 12, 44, 0, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(787, 12, 45, 0, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(788, 12, 46, 0, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(789, 12, 47, 0, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(790, 12, 48, 0, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(791, 12, 49, 0, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(792, 12, 50, 0, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(793, 12, 51, 0, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(794, 12, 52, 24000, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(795, 12, 53, 40000, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(796, 12, 54, 100000, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(797, 12, 55, 28000, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(798, 12, 56, 30000, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(799, 12, 57, 48000, 0, 'Kg', 'Kg', '2024-09-05', '2024-09-07', 'pengecer', NULL, NULL),
(800, 13, 30, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(801, 13, 31, 5100, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(802, 13, 32, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(803, 13, 33, 8600, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(804, 13, 34, 7600, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(805, 13, 35, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(806, 13, 36, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(807, 13, 38, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(808, 13, 39, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(809, 13, 40, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(810, 13, 41, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(811, 13, 42, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(812, 13, 43, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(813, 13, 46, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(814, 13, 47, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(815, 13, 48, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(816, 13, 55, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(817, 13, 56, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(818, 13, 57, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(819, 8, 30, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(820, 8, 31, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(821, 8, 32, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(822, 8, 33, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(823, 8, 34, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(824, 8, 35, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(825, 8, 36, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(826, 8, 38, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(827, 8, 39, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(828, 8, 40, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(829, 8, 41, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(830, 8, 42, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(831, 8, 43, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(832, 8, 46, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(833, 8, 47, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(834, 8, 48, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(835, 8, 55, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(836, 8, 56, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(837, 8, 57, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'produsen', NULL, NULL),
(838, 8, 34, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'grosir', NULL, NULL),
(839, 8, 35, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'grosir', NULL, NULL),
(840, 8, 36, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'grosir', NULL, NULL),
(841, 8, 37, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'grosir', NULL, NULL),
(842, 8, 38, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'grosir', NULL, NULL),
(843, 8, 39, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'grosir', NULL, NULL),
(844, 8, 40, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'grosir', NULL, NULL),
(845, 8, 41, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'grosir', NULL, NULL),
(846, 8, 42, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'grosir', NULL, NULL),
(847, 8, 43, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'grosir', NULL, NULL),
(848, 8, 44, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'grosir', NULL, NULL),
(849, 8, 45, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'grosir', NULL, NULL),
(850, 8, 46, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'grosir', NULL, NULL),
(851, 8, 47, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'grosir', NULL, NULL),
(852, 8, 48, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'grosir', NULL, NULL),
(853, 8, 49, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'grosir', NULL, NULL),
(854, 8, 50, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'grosir', NULL, NULL),
(855, 8, 51, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'grosir', NULL, NULL),
(856, 8, 52, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'grosir', NULL, NULL),
(857, 8, 53, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'grosir', NULL, NULL),
(858, 8, 54, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'grosir', NULL, NULL),
(859, 8, 55, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'grosir', NULL, NULL),
(860, 8, 56, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'grosir', NULL, NULL),
(861, 8, 57, 0, 0, 'Kg', 'Kg', '2024-09-09', '2024-09-09', 'grosir', NULL, NULL);

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
(30, 'Gabah Kering Panen (GKP)', 'produk-img/N60HEdYMq1uRM7qnYgUJmH5JiNydZw7P80XI9LXu.jpg', 'Produsen', NULL, '2024-08-30 20:37:01'),
(31, 'Gabah Kering Giling (GKG)', 'produk-img/i2R96klKBHRqETdqfk76dB5TZRtXA0xrbnKlUxN8.png', 'Produsen', NULL, '2024-08-30 20:08:57'),
(32, 'Jagung Pipilan Basah', 'produk-img/QOiuJ1ZFC4Mjid3shQsBfnJTqNNYtFRS7H2N2NvD.jpg', 'Produsen', NULL, '2024-08-30 20:10:57'),
(33, 'Jagung Pipilan Kering', 'produk-img/gJptzER0UMrvYK2rSBEa52pNno2TkXTqyCs6lwZK.jpg', 'Produsen', NULL, '2024-08-30 20:11:31'),
(34, 'Beras Premium', 'produk-img/KjwQMX4RXjbovGvyt4JOqowjTzydFJV3s07IyEUu.jpg', 'Keduanya', '2024-07-29 12:19:35', '2024-08-30 20:35:58'),
(35, 'Beras Medium', 'produk-img/Sdgogge6yIWJIHT4vGysSUAzsY4Xwh3cjpMNv5bC.jpg', 'Keduanya', '2024-07-20 08:04:37', '2024-08-30 20:12:26'),
(36, 'Beras Termurah', 'produk-img/LA0keTHWlTxTBSwXKXetqQnNbVJXzfpWEzyTDF5X.jpg', 'Keduanya', '2024-07-20 08:04:44', '2024-08-30 20:13:10'),
(37, 'Jagung Pipilan', 'produk-img/YKGpnRh1prvxfCJjSrVVdyEYFojSWasAYY0xTBF1.jpg', 'Pedagang', '2024-07-20 08:04:51', '2024-08-30 20:13:55'),
(38, 'Kedelai', 'produk-img/ZEJtBj08kqoS0cxk7X8VEnPySA2QBQ1PDF9QNO5B.jpg', 'Keduanya', '2024-07-20 08:04:58', '2024-08-30 20:15:23'),
(39, 'Kacang Hijau', 'produk-img/q6sdVPOl3EnL4ZlSi6Q5pLl7W9poPRoFnm9xCQ7X.jpg', 'Keduanya', '2024-07-20 08:05:10', '2024-08-30 20:15:34'),
(40, 'Kacang Tanah', 'produk-img/Cx60vvnGKI1qzTlvNmle4huuU47TkM2SIcN1mvNm.jpg', 'Keduanya', '2024-07-20 08:05:23', '2024-08-30 20:16:14'),
(41, 'Ubi Kayu', 'produk-img/CpQ8LNNVLUKU8IYb38elKtCHHB4SiUGczFfCjzjv.jpg', 'Keduanya', '2024-07-20 08:05:33', '2024-08-30 20:17:06'),
(42, 'Ubi Jalar', 'produk-img/SnUC0iRJBNvC2RW431weazXVXZsXABzOEK428uWG.jpg', 'Keduanya', '2024-07-20 08:05:42', '2024-08-30 20:18:07'),
(43, 'Bawang Merah', 'produk-img/dMLVL05DVGu71Jbcs7v13VOpHuZuf2amRbp8mqNo.jpg', 'Keduanya', '2024-07-20 08:05:50', '2024-08-30 20:19:49'),
(44, 'Bawang Putih (Bonggol)', 'produk-img/uszabCel8mK1Q4VL1s2kKECt0X9mU5uWqa6AAQ6q.jpg', 'Pedagang', '2024-07-20 08:06:00', '2024-08-30 20:20:04'),
(45, 'Bawang Putih (Kating)', 'produk-img/DepelZ4JGbzIFa9jjZDgFt2zTk8G94LNDYVsmHmH.jpg', 'Pedagang', '2024-07-20 08:06:15', '2024-08-30 20:20:18'),
(46, 'Cabai Merah Besar', 'produk-img/0ccxVJmKsJozJPTINYHj4DzO1gaT1hLS6WysgTew.jpg', 'Keduanya', '2024-07-20 08:06:28', '2024-08-30 20:23:17'),
(47, 'Cabai Keriting', 'produk-img/iZF3OffaZcrBpdtGjnH9v9sIRhMDJvjlpZNya6MH.jpg', 'Keduanya', '2024-07-20 08:06:41', '2024-08-30 20:23:30'),
(48, 'Cabai Rawit Merah', 'produk-img/fQqzpbBl0XFjhfU4adhySLAVuy9xCY5GCyMWg1MK.jpg', 'Keduanya', '2024-07-20 08:06:51', '2024-08-30 20:23:42'),
(49, 'Gula Pasir', 'produk-img/8jbw8Lx6dJjLerfnZlYfpwZeeX9tuayOacejP6Qf.jpg', 'Pedagang', '2024-07-20 08:07:21', '2024-08-30 20:23:54'),
(50, 'Minyak Goreng Curah', 'produk-img/ovUMKiTGJQupziRcOW7tLkZ9fEAzoNf4G0EAFXMX.jpg', 'Pedagang', '2024-07-20 08:07:39', '2024-08-30 20:30:53'),
(51, 'Tepung Terigu Curah', 'produk-img/4Si0zXiGDaFdD6vU5RfIT7dXsfLO6MvaBa6KF4Q0.jpg', 'Pedagang', '2024-07-20 08:07:50', '2024-08-30 20:31:07'),
(52, 'Telur Ayam', 'produk-img/34tAP2v34Sw58GQFkMEOkaj11gx4o30dJ5aFNpqt.jpg', 'Pedagang', '2024-07-20 08:08:10', '2024-08-30 20:31:21'),
(53, 'Daging Ayam', 'produk-img/hhc5JgNW4uIW6SPQVe71SjoXW4Zd5Um9sd98tx5U.jpg', 'Pedagang', '2024-07-20 08:08:18', '2024-08-30 20:31:36'),
(54, 'Daging Sapi', 'produk-img/N6c2jJfzMAU7zQmhJ1o9Q9Nh3GCQYPHoeQ8Jr7LX.jpg', 'Pedagang', '2024-07-20 08:08:35', '2024-08-30 20:33:26'),
(55, 'Ikan Bandeng', 'produk-img/v3a55zEQv5E7f8XFvZl7Pi31k4V9j8tYex8Nhb3U.jpg', 'Keduanya', '2024-07-20 08:08:50', '2024-08-30 20:33:39'),
(56, 'Ikan Mujair', 'produk-img/iOnOKVlNeUkQthUjOKaXVAh0jqXI0i2TRlJVFgYp.jpg', 'Keduanya', '2024-07-20 08:09:04', '2024-08-30 20:33:53'),
(57, 'Udang', 'produk-img/51eydL7mHOJYH6IN91kIWvrfmEMWfqc1DcEdcDxR.jpg', 'Keduanya', '2024-07-20 08:09:13', '2024-08-30 20:34:03');

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
(7, 'Admin Psr Sendangrejo', 'sendangrejo@gmail.com', NULL, '$2y$12$M2iqL5VilUupW3HOsQXAhu/zr98n5issJ0KS.7xM0bluWDzQohiTi', 'pedagang', 'profil-img/fgswqqhaT300J5WHTsnazkBchMt7pWuC0fE0CCvU.png', 1, 6, NULL, '2024-07-18 22:40:34', '2024-08-27 04:24:04', NULL, '088', 'laki-laki', '2000-05-20'),
(8, 'Admin Kec. Tikung', 'tikung@gmail.com', NULL, '$2y$12$ahGzrHIjBnCYAG2AECWD1e4JNj7nZSTjBlKoR0PzzIHbNXkDuoxx.', 'produsen', 'profil-img/zU8GbLE8ETIjVxxhupewJbBKHM1tyolpirfpAJEn.png', 1, 1, NULL, '2024-07-18 22:40:34', '2024-08-05 19:18:57', NULL, NULL, 'laki-laki', NULL),
(9, 'Admin Psr Ikan', 'Ikan@gmail.com', NULL, '$2y$12$N1xhl9o32ci/AuCmN0OaX.6VKmogwrxnkI1c9lDBqzuBZYJC8k.nO', 'pedagang', 'profil-img/dr8etaQEn5vziwD6HwxBVXFulvnj9lD9trZcdcfa.png', 1, 2, NULL, '2024-07-20 06:50:19', '2024-08-05 17:43:44', NULL, NULL, 'laki-laki', NULL),
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
  MODIFY `id_harga` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=862;

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
