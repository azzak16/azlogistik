-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 03, 2023 at 09:27 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `azlogistik`
--

-- --------------------------------------------------------

--
-- Table structure for table `golongans`
--

CREATE TABLE `golongans` (
  `id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gaji_pokok` double NOT NULL,
  `uang_kehadiran` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uang_lembur` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `golongans`
--

INSERT INTO `golongans` (`id`, `type`, `gaji_pokok`, `uang_kehadiran`, `created_at`, `updated_at`, `uang_lembur`) VALUES
(1, 'A', 4800000, 50000, '2023-07-02 21:45:03', '2023-07-02 21:45:03', 25000),
(2, 'B', 5550000, 100000, '2023-07-02 21:45:34', '2023-07-02 21:45:34', 29000),
(3, 'C', 6400000, 150000, '2023-07-02 21:45:58', '2023-07-02 21:45:58', 34000);

-- --------------------------------------------------------

--
-- Table structure for table `karyawans`
--

CREATE TABLE `karyawans` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `golongan_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nik` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `karyawans`
--

INSERT INTO `karyawans` (`id`, `name`, `golongan_id`, `created_at`, `updated_at`, `nik`) VALUES
(1, 'Meilysa', 1, '2023-07-02 21:57:09', '2023-07-02 21:57:09', '21321321321'),
(2, 'Trindy', 2, '2023-07-02 23:10:37', '2023-07-02 23:10:37', '321323213'),
(3, 'Nola', 3, '2023-07-02 23:10:49', '2023-07-02 23:10:49', '756765765765'),
(4, 'Angga Zakaria', 1, '2023-07-03 01:52:16', '2023-07-03 01:52:16', '21212212121');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_07_03_032727_create_golongans_table', 1),
(3, '2023_07_03_032728_create_karyawans_table', 1),
(4, '2023_07_03_050715_create_transaksis_table', 2),
(5, '2023_07_03_054309_add_column_to_table_golongan', 3),
(6, '2023_07_03_065155_add_column_to_table_transaksi', 4),
(7, '2023_07_03_085000_add_column_to_table_karyawan', 5);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint UNSIGNED NOT NULL,
  `karyawan_id` bigint UNSIGNED NOT NULL,
  `jumlah_kehadiran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_cuti` int NOT NULL DEFAULT '0',
  `jumlah_lembur` int NOT NULL DEFAULT '0',
  `gaji_total` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `total_potongan` double NOT NULL,
  `gaji_pokok_baru` double NOT NULL,
  `uang_kehadiran_baru` double NOT NULL,
  `uang_lembur_baru` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksis`
--

INSERT INTO `transaksis` (`id`, `karyawan_id`, `jumlah_kehadiran`, `jumlah_cuti`, `jumlah_lembur`, `gaji_total`, `created_at`, `updated_at`, `total_potongan`, `gaji_pokok_baru`, `uang_kehadiran_baru`, `uang_lembur_baru`) VALUES
(1, 1, '22', 3, 2, 5950000, '2023-07-02 23:55:59', '2023-07-02 23:55:59', 0, 4800000, 1100000, 50000),
(2, 4, '20', 2, 4, 5900000, '2023-07-03 01:52:34', '2023-07-03 01:52:34', 0, 4800000, 1000000, 100000),
(3, 1, '20', 1, 1, 5646000, '2023-07-03 02:09:26', '2023-07-03 02:09:26', 228000, 4571000, 1050000, 25000),
(4, 3, '17', 0, 21, 9288000, '2023-07-03 02:23:04', '2023-07-03 02:23:04', 376000, 6024000, 2550000, 714000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `golongans`
--
ALTER TABLE `golongans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawans`
--
ALTER TABLE `karyawans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `karyawans_golongan_id_foreign` (`golongan_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksis_karyawan_id_foreign` (`karyawan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `golongans`
--
ALTER TABLE `golongans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `karyawans`
--
ALTER TABLE `karyawans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `karyawans`
--
ALTER TABLE `karyawans`
  ADD CONSTRAINT `karyawans_golongan_id_foreign` FOREIGN KEY (`golongan_id`) REFERENCES `golongans` (`id`);

--
-- Constraints for table `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_karyawan_id_foreign` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawans` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
