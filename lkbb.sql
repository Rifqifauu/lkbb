-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 13, 2025 at 12:27 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lkbb`
--

-- --------------------------------------------------------

--
-- Table structure for table `aspek_danton`
--

CREATE TABLE `aspek_danton` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_penilaian` varchar(255) NOT NULL,
  `kurang_1` int NOT NULL,
  `kurang_2` int NOT NULL,
  `cukup_1` int NOT NULL,
  `cukup_2` int NOT NULL,
  `baik_1` int NOT NULL,
  `baik_2` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aspek_danton`
--

INSERT INTO `aspek_danton` (`id`, `nama_penilaian`, `kurang_1`, `kurang_2`, `cukup_1`, `cukup_2`, `baik_1`, `baik_2`, `created_at`, `updated_at`) VALUES
(1, 'Kelantangan Suara', 45, 50, 60, 65, 70, 75, '2025-08-11 06:31:56', '2025-08-11 06:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `aspek_pbb`
--

CREATE TABLE `aspek_pbb` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_penilaian` varchar(255) NOT NULL,
  `kurang_1` int NOT NULL,
  `kurang_2` int NOT NULL,
  `cukup_1` int NOT NULL,
  `cukup_2` int NOT NULL,
  `baik_1` int NOT NULL,
  `baik_2` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aspek_pbb`
--

INSERT INTO `aspek_pbb` (`id`, `nama_penilaian`, `kurang_1`, `kurang_2`, `cukup_1`, `cukup_2`, `baik_1`, `baik_2`, `created_at`, `updated_at`) VALUES
(1, 'Sikap PBB', 40, 45, 55, 60, 65, 70, '2025-08-11 06:36:25', '2025-08-11 06:36:25');

-- --------------------------------------------------------

--
-- Table structure for table `aspek_pengurangan_nilai`
--

CREATE TABLE `aspek_pengurangan_nilai` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_penilaian` varchar(255) NOT NULL,
  `pengurangan` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aspek_pengurangan_nilai`
--

INSERT INTO `aspek_pengurangan_nilai` (`id`, `nama_penilaian`, `pengurangan`, `created_at`, `updated_at`) VALUES
(1, 'Terlambat Daftar Ulang', 50, '2025-08-11 07:20:36', '2025-08-11 07:20:36');

-- --------------------------------------------------------

--
-- Table structure for table `aspek_seragam`
--

CREATE TABLE `aspek_seragam` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_penilaian` varchar(255) NOT NULL,
  `kurang_1` int NOT NULL,
  `kurang_2` int NOT NULL,
  `cukup_1` int NOT NULL,
  `cukup_2` int NOT NULL,
  `baik_1` int NOT NULL,
  `baik_2` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aspek_tata_rias`
--

CREATE TABLE `aspek_tata_rias` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_penilaian` varchar(255) NOT NULL,
  `kurang_1` int NOT NULL,
  `kurang_2` int NOT NULL,
  `cukup_1` int NOT NULL,
  `cukup_2` int NOT NULL,
  `baik_1` int NOT NULL,
  `baik_2` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `aspek_variasi_formasi`
--

CREATE TABLE `aspek_variasi_formasi` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_penilaian` varchar(255) NOT NULL,
  `kurang_1` int NOT NULL,
  `kurang_2` int NOT NULL,
  `cukup_1` int NOT NULL,
  `cukup_2` int NOT NULL,
  `baik_1` int NOT NULL,
  `baik_2` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `aspek_variasi_formasi`
--

INSERT INTO `aspek_variasi_formasi` (`id`, `nama_penilaian`, `kurang_1`, `kurang_2`, `cukup_1`, `cukup_2`, `baik_1`, `baik_2`, `created_at`, `updated_at`) VALUES
(1, 'Kepaduan Gerakan', 45, 55, 65, 75, 80, 85, '2025-08-11 02:45:13', '2025-08-11 02:45:13');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3', 'i:3;', 1754905528),
('livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1754905528;', 1754905528);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_08_09_033923_create_teams_table', 1),
(5, '2025_08_09_043839_create_aspek_p_b_b_s_table', 1),
(6, '2025_08_09_043944_create_aspek_dantons_table', 1),
(7, '2025_08_09_063305_create_aspek_seragams_table', 1),
(8, '2025_08_09_063421_create_aspek_tata_rias_table', 1),
(9, '2025_08_09_063428_create_aspek_variasi_formasis_table', 1),
(10, '2025_08_09_063514_create_penilaian_p_b_b_s_table', 1),
(11, '2025_08_09_063522_create_penilaian_variasi_formasis_table', 1),
(12, '2025_08_09_063531_create_penilaian_tata_rias_table', 1),
(13, '2025_08_09_063542_create_penilaian_dantons_table', 1),
(14, '2025_08_10_141801_penilaian_seragam', 1),
(15, '2025_08_11_104050_create_rekap_nilais_table', 2),
(16, '2025_08_11_140055_create_aspek_pengurangan_nilais_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengurangan_nilai`
--

CREATE TABLE `pengurangan_nilai` (
  `id` bigint UNSIGNED NOT NULL,
  `id_aspek` bigint UNSIGNED NOT NULL,
  `id_peserta` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengurangan_nilai`
--

INSERT INTO `pengurangan_nilai` (`id`, `id_aspek`, `id_peserta`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2025-08-11 07:46:23', '2025-08-11 07:46:23');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_danton`
--

CREATE TABLE `penilaian_danton` (
  `id` bigint UNSIGNED NOT NULL,
  `id_aspek` bigint UNSIGNED NOT NULL,
  `id_peserta` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `nilai` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `penilaian_danton`
--

INSERT INTO `penilaian_danton` (`id`, `id_aspek`, `id_peserta`, `id_user`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 70, '2025-08-11 06:32:17', '2025-08-11 06:32:17'),
(2, 1, 2, 1, 75, '2025-08-11 06:41:49', '2025-08-11 06:41:49');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_pbb`
--

CREATE TABLE `penilaian_pbb` (
  `id` bigint UNSIGNED NOT NULL,
  `id_aspek` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `id_peserta` bigint UNSIGNED NOT NULL,
  `nilai` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `penilaian_pbb`
--

INSERT INTO `penilaian_pbb` (`id`, `id_aspek`, `id_user`, `id_peserta`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 60, '2025-08-11 06:36:39', '2025-08-11 06:36:39'),
(2, 1, 1, 2, 70, '2025-08-11 06:42:08', '2025-08-11 06:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_seragam`
--

CREATE TABLE `penilaian_seragam` (
  `id` bigint UNSIGNED NOT NULL,
  `id_aspek` bigint UNSIGNED NOT NULL,
  `id_peserta` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `nilai` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_tata_rias`
--

CREATE TABLE `penilaian_tata_rias` (
  `id` bigint UNSIGNED NOT NULL,
  `id_aspek` bigint UNSIGNED NOT NULL,
  `id_peserta` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `nilai` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_variasi_formasi`
--

CREATE TABLE `penilaian_variasi_formasi` (
  `id` bigint UNSIGNED NOT NULL,
  `id_aspek` bigint UNSIGNED NOT NULL,
  `id_peserta` bigint UNSIGNED NOT NULL,
  `id_user` bigint UNSIGNED NOT NULL,
  `nilai` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_tampil` int NOT NULL,
  `tingkat` enum('sltp','slta') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id`, `nama`, `no_tampil`, `tingkat`, `created_at`, `updated_at`) VALUES
(1, 'SMAN 1 Kebumen', 1, 'slta', '2025-08-11 04:14:34', '2025-08-11 04:14:34'),
(2, 'SMAN 1 Kutowinangun', 2, 'slta', '2025-08-11 06:41:06', '2025-08-11 06:41:06');

-- --------------------------------------------------------

--
-- Table structure for table `rekap_nilai`
--

CREATE TABLE `rekap_nilai` (
  `id` bigint UNSIGNED NOT NULL,
  `id_peserta` bigint UNSIGNED NOT NULL,
  `nilai_pbb` int DEFAULT NULL,
  `nilai_danton` int DEFAULT NULL,
  `nilai_kostum` int DEFAULT NULL,
  `nilai_tata_rias` int DEFAULT NULL,
  `nilai_variasi_formasi` int DEFAULT NULL,
  `nilai_pengurangan` int DEFAULT NULL,
  `waktu` varchar(2) DEFAULT NULL,
  `total_utama` int DEFAULT NULL,
  `total_umum` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rekap_nilai`
--

INSERT INTO `rekap_nilai` (`id`, `id_peserta`, `nilai_pbb`, `nilai_danton`, `nilai_kostum`, `nilai_tata_rias`, `nilai_variasi_formasi`, `nilai_pengurangan`, `waktu`, `total_utama`, `total_umum`, `created_at`, `updated_at`) VALUES
(3, 2, 70, 75, NULL, NULL, NULL, NULL, '90', 145, 145, '2025-08-11 06:41:31', '2025-08-11 08:24:16'),
(4, 1, 60, 70, NULL, NULL, NULL, 50, '60', 80, 130, '2025-08-11 08:17:01', '2025-08-11 08:24:16');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text,
  `payload` longtext NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('gtUauZCgLP36G22VztdXQM7Bejdm3qyMdIjwyEXE', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiNUhRVktlZnNQQklLNUMyQVJxU2l2RWM4dWF2ODg2c05aRllwMzdSWiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQxOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYWRtaW4vcGVtZXJpbmdrYXRhbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiREY0Z1c2FYbE5WVk1hc0lNV3p4RncudFYvY0hwR1pXLjU0NjN0TDFMNDBYQ0hkZDNtWVByaSI7czo4OiJmaWxhbWVudCI7YTowOnt9fQ==', 1754925859);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin2', 'admin2@example.com', '2025-08-11 02:44:13', '$2y$12$DcFusaXlNVVMasIMWzxFw.tV/cHpGZW.5463tL1L40XCHdd3mYPri', '7HoDdkAcbu', '2025-08-11 02:44:13', '2025-08-11 02:44:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aspek_danton`
--
ALTER TABLE `aspek_danton`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aspek_pbb`
--
ALTER TABLE `aspek_pbb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aspek_pengurangan_nilai`
--
ALTER TABLE `aspek_pengurangan_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aspek_seragam`
--
ALTER TABLE `aspek_seragam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aspek_tata_rias`
--
ALTER TABLE `aspek_tata_rias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aspek_variasi_formasi`
--
ALTER TABLE `aspek_variasi_formasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pengurangan_nilai`
--
ALTER TABLE `pengurangan_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penilaian_danton`
--
ALTER TABLE `penilaian_danton`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaian_danton_id_aspek_foreign` (`id_aspek`),
  ADD KEY `penilaian_danton_id_peserta_foreign` (`id_peserta`),
  ADD KEY `penilaian_danton_id_user_foreign` (`id_user`);

--
-- Indexes for table `penilaian_pbb`
--
ALTER TABLE `penilaian_pbb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaian_pbb_id_aspek_foreign` (`id_aspek`),
  ADD KEY `penilaian_pbb_id_user_foreign` (`id_user`),
  ADD KEY `penilaian_pbb_id_peserta_foreign` (`id_peserta`);

--
-- Indexes for table `penilaian_seragam`
--
ALTER TABLE `penilaian_seragam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaian_seragam_id_aspek_foreign` (`id_aspek`),
  ADD KEY `penilaian_seragam_id_peserta_foreign` (`id_peserta`),
  ADD KEY `penilaian_seragam_id_user_foreign` (`id_user`);

--
-- Indexes for table `penilaian_tata_rias`
--
ALTER TABLE `penilaian_tata_rias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaian_tata_rias_id_aspek_foreign` (`id_aspek`),
  ADD KEY `penilaian_tata_rias_id_peserta_foreign` (`id_peserta`),
  ADD KEY `penilaian_tata_rias_id_user_foreign` (`id_user`);

--
-- Indexes for table `penilaian_variasi_formasi`
--
ALTER TABLE `penilaian_variasi_formasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaian_variasi_formasi_id_aspek_foreign` (`id_aspek`),
  ADD KEY `penilaian_variasi_formasi_id_peserta_foreign` (`id_peserta`),
  ADD KEY `penilaian_variasi_formasi_id_user_foreign` (`id_user`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rekap_nilai`
--
ALTER TABLE `rekap_nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rekap_nilai_id_peserta_foreign` (`id_peserta`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aspek_danton`
--
ALTER TABLE `aspek_danton`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aspek_pbb`
--
ALTER TABLE `aspek_pbb`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aspek_pengurangan_nilai`
--
ALTER TABLE `aspek_pengurangan_nilai`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aspek_seragam`
--
ALTER TABLE `aspek_seragam`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aspek_tata_rias`
--
ALTER TABLE `aspek_tata_rias`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `aspek_variasi_formasi`
--
ALTER TABLE `aspek_variasi_formasi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pengurangan_nilai`
--
ALTER TABLE `pengurangan_nilai`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penilaian_danton`
--
ALTER TABLE `penilaian_danton`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penilaian_pbb`
--
ALTER TABLE `penilaian_pbb`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `penilaian_seragam`
--
ALTER TABLE `penilaian_seragam`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penilaian_tata_rias`
--
ALTER TABLE `penilaian_tata_rias`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penilaian_variasi_formasi`
--
ALTER TABLE `penilaian_variasi_formasi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rekap_nilai`
--
ALTER TABLE `rekap_nilai`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penilaian_danton`
--
ALTER TABLE `penilaian_danton`
  ADD CONSTRAINT `penilaian_danton_id_aspek_foreign` FOREIGN KEY (`id_aspek`) REFERENCES `aspek_danton` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_danton_id_peserta_foreign` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_danton_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penilaian_pbb`
--
ALTER TABLE `penilaian_pbb`
  ADD CONSTRAINT `penilaian_pbb_id_aspek_foreign` FOREIGN KEY (`id_aspek`) REFERENCES `aspek_pbb` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_pbb_id_peserta_foreign` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_pbb_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penilaian_seragam`
--
ALTER TABLE `penilaian_seragam`
  ADD CONSTRAINT `penilaian_seragam_id_aspek_foreign` FOREIGN KEY (`id_aspek`) REFERENCES `aspek_seragam` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_seragam_id_peserta_foreign` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_seragam_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penilaian_tata_rias`
--
ALTER TABLE `penilaian_tata_rias`
  ADD CONSTRAINT `penilaian_tata_rias_id_aspek_foreign` FOREIGN KEY (`id_aspek`) REFERENCES `aspek_tata_rias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_tata_rias_id_peserta_foreign` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_tata_rias_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `penilaian_variasi_formasi`
--
ALTER TABLE `penilaian_variasi_formasi`
  ADD CONSTRAINT `penilaian_variasi_formasi_id_aspek_foreign` FOREIGN KEY (`id_aspek`) REFERENCES `aspek_variasi_formasi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_variasi_formasi_id_peserta_foreign` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_variasi_formasi_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rekap_nilai`
--
ALTER TABLE `rekap_nilai`
  ADD CONSTRAINT `rekap_nilai_id_peserta_foreign` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
