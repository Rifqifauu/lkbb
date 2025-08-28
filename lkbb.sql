-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Waktu pembuatan: 28 Agu 2025 pada 07.23
-- Versi server: 8.0.40
-- Versi PHP: 8.3.14

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
-- Struktur dari tabel `aspek_danton`
--

CREATE TABLE `aspek_danton` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_penilaian` varchar(255) NOT NULL,
  `kurang_1` int NOT NULL,
  `kurang_2` int NOT NULL,
  `kurang_3` int NOT NULL,
  `cukup_1` int NOT NULL,
  `cukup_2` int NOT NULL,
  `cukup_3` int NOT NULL,
  `baik_1` int NOT NULL,
  `baik_2` int NOT NULL,
  `baik_3` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `aspek_danton`
--

INSERT INTO `aspek_danton` (`id`, `nama_penilaian`, `kurang_1`, `kurang_2`, `kurang_3`, `cukup_1`, `cukup_2`, `cukup_3`, `baik_1`, `baik_2`, `baik_3`, `created_at`, `updated_at`) VALUES
(1, 'Kelantangan Suara', 40, 45, 50, 60, 65, 70, 75, 80, 85, '2025-08-26 01:59:17', '2025-08-26 01:59:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aspek_pbb`
--

CREATE TABLE `aspek_pbb` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_penilaian` varchar(255) NOT NULL,
  `kurang_1` int NOT NULL,
  `kurang_2` int NOT NULL,
  `kurang_3` int NOT NULL,
  `cukup_1` int NOT NULL,
  `cukup_2` int NOT NULL,
  `cukup_3` int NOT NULL,
  `baik_1` int NOT NULL,
  `baik_2` int NOT NULL,
  `baik_3` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `aspek_pbb`
--

INSERT INTO `aspek_pbb` (`id`, `nama_penilaian`, `kurang_1`, `kurang_2`, `kurang_3`, `cukup_1`, `cukup_2`, `cukup_3`, `baik_1`, `baik_2`, `baik_3`, `created_at`, `updated_at`) VALUES
(1, 'Kepaduan Gerakan', 40, 45, 50, 60, 65, 70, 75, 80, 85, '2025-08-27 09:39:40', '2025-08-27 09:39:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aspek_pengurangan_nilai`
--

CREATE TABLE `aspek_pengurangan_nilai` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_penilaian` varchar(255) NOT NULL,
  `pengurangan` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `aspek_pengurangan_nilai`
--

INSERT INTO `aspek_pengurangan_nilai` (`id`, `nama_penilaian`, `pengurangan`, `created_at`, `updated_at`) VALUES
(1, 'Telat Datang', 20, '2025-08-27 09:11:25', '2025-08-27 09:11:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aspek_seragam`
--

CREATE TABLE `aspek_seragam` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_penilaian` varchar(255) NOT NULL,
  `kurang_1` int NOT NULL,
  `kurang_2` int NOT NULL,
  `kurang_3` int NOT NULL,
  `cukup_1` int NOT NULL,
  `cukup_2` int NOT NULL,
  `cukup_3` int NOT NULL,
  `baik_1` int NOT NULL,
  `baik_2` int NOT NULL,
  `baik_3` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `aspek_seragam`
--

INSERT INTO `aspek_seragam` (`id`, `nama_penilaian`, `kurang_1`, `kurang_2`, `kurang_3`, `cukup_1`, `cukup_2`, `cukup_3`, `baik_1`, `baik_2`, `baik_3`, `created_at`, `updated_at`) VALUES
(1, 'Keunikan', 40, 45, 50, 60, 65, 70, 75, 80, 85, '2025-08-27 09:42:23', '2025-08-27 09:42:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aspek_tata_rias`
--

CREATE TABLE `aspek_tata_rias` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_penilaian` varchar(255) NOT NULL,
  `kurang_1` int NOT NULL,
  `kurang_2` int NOT NULL,
  `kurang_3` int NOT NULL,
  `cukup_1` int NOT NULL,
  `cukup_2` int NOT NULL,
  `cukup_3` int NOT NULL,
  `baik_1` int NOT NULL,
  `baik_2` int NOT NULL,
  `baik_3` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `aspek_tata_rias`
--

INSERT INTO `aspek_tata_rias` (`id`, `nama_penilaian`, `kurang_1`, `kurang_2`, `kurang_3`, `cukup_1`, `cukup_2`, `cukup_3`, `baik_1`, `baik_2`, `baik_3`, `created_at`, `updated_at`) VALUES
(1, 'Kerapihan Seragam', 40, 45, 50, 55, 65, 70, 75, 80, 85, '2025-08-27 09:43:01', '2025-08-27 09:43:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aspek_variasi_formasi`
--

CREATE TABLE `aspek_variasi_formasi` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_penilaian` varchar(255) NOT NULL,
  `kurang_1` int NOT NULL,
  `kurang_2` int NOT NULL,
  `kurang_3` int NOT NULL,
  `cukup_1` int NOT NULL,
  `cukup_2` int NOT NULL,
  `cukup_3` int NOT NULL,
  `baik_1` int NOT NULL,
  `baik_2` int NOT NULL,
  `baik_3` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `aspek_variasi_formasi`
--

INSERT INTO `aspek_variasi_formasi` (`id`, `nama_penilaian`, `kurang_1`, `kurang_2`, `kurang_3`, `cukup_1`, `cukup_2`, `cukup_3`, `baik_1`, `baik_2`, `baik_3`, `created_at`, `updated_at`) VALUES
(1, 'Inovasi', 40, 45, 50, 55, 60, 65, 70, 75, 80, '2025-08-27 09:44:52', '2025-08-27 09:44:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3', 'i:1;', 1756362220),
('livewire-rate-limiter:a17961fa74e9275d529f489537f179c05d50c2f3:timer', 'i:1756362220;', 1756362220),
('spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:360:{i:0;a:4:{s:1:\"a\";i:361;s:1:\"b\";s:20:\"view-any AspekDanton\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:4:{s:1:\"a\";i:362;s:1:\"b\";s:20:\"view-any AspekDanton\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:4:{s:1:\"a\";i:363;s:1:\"b\";s:16:\"view AspekDanton\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:364;s:1:\"b\";s:16:\"view AspekDanton\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:365;s:1:\"b\";s:18:\"create AspekDanton\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:366;s:1:\"b\";s:18:\"create AspekDanton\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:367;s:1:\"b\";s:18:\"update AspekDanton\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:368;s:1:\"b\";s:18:\"update AspekDanton\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:4:{s:1:\"a\";i:369;s:1:\"b\";s:18:\"delete AspekDanton\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:370;s:1:\"b\";s:18:\"delete AspekDanton\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:4:{s:1:\"a\";i:371;s:1:\"b\";s:22:\"delete-any AspekDanton\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:372;s:1:\"b\";s:22:\"delete-any AspekDanton\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:4:{s:1:\"a\";i:373;s:1:\"b\";s:21:\"replicate AspekDanton\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:4:{s:1:\"a\";i:374;s:1:\"b\";s:21:\"replicate AspekDanton\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:4:{s:1:\"a\";i:375;s:1:\"b\";s:19:\"restore AspekDanton\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:4:{s:1:\"a\";i:376;s:1:\"b\";s:19:\"restore AspekDanton\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:4:{s:1:\"a\";i:377;s:1:\"b\";s:23:\"restore-any AspekDanton\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:378;s:1:\"b\";s:23:\"restore-any AspekDanton\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:4:{s:1:\"a\";i:379;s:1:\"b\";s:19:\"reorder AspekDanton\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:4:{s:1:\"a\";i:380;s:1:\"b\";s:19:\"reorder AspekDanton\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:4:{s:1:\"a\";i:381;s:1:\"b\";s:24:\"force-delete AspekDanton\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:4:{s:1:\"a\";i:382;s:1:\"b\";s:24:\"force-delete AspekDanton\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:4:{s:1:\"a\";i:383;s:1:\"b\";s:28:\"force-delete-any AspekDanton\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:23;a:4:{s:1:\"a\";i:384;s:1:\"b\";s:28:\"force-delete-any AspekDanton\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:24;a:4:{s:1:\"a\";i:385;s:1:\"b\";s:17:\"view-any AspekPBB\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:25;a:4:{s:1:\"a\";i:386;s:1:\"b\";s:17:\"view-any AspekPBB\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:26;a:4:{s:1:\"a\";i:387;s:1:\"b\";s:13:\"view AspekPBB\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:27;a:4:{s:1:\"a\";i:388;s:1:\"b\";s:13:\"view AspekPBB\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:28;a:4:{s:1:\"a\";i:389;s:1:\"b\";s:15:\"create AspekPBB\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:29;a:4:{s:1:\"a\";i:390;s:1:\"b\";s:15:\"create AspekPBB\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:30;a:4:{s:1:\"a\";i:391;s:1:\"b\";s:15:\"update AspekPBB\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:31;a:4:{s:1:\"a\";i:392;s:1:\"b\";s:15:\"update AspekPBB\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:32;a:4:{s:1:\"a\";i:393;s:1:\"b\";s:15:\"delete AspekPBB\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:33;a:4:{s:1:\"a\";i:394;s:1:\"b\";s:15:\"delete AspekPBB\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:34;a:4:{s:1:\"a\";i:395;s:1:\"b\";s:19:\"delete-any AspekPBB\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:35;a:4:{s:1:\"a\";i:396;s:1:\"b\";s:19:\"delete-any AspekPBB\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:36;a:4:{s:1:\"a\";i:397;s:1:\"b\";s:18:\"replicate AspekPBB\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:37;a:4:{s:1:\"a\";i:398;s:1:\"b\";s:18:\"replicate AspekPBB\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:38;a:4:{s:1:\"a\";i:399;s:1:\"b\";s:16:\"restore AspekPBB\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:39;a:4:{s:1:\"a\";i:400;s:1:\"b\";s:16:\"restore AspekPBB\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:40;a:4:{s:1:\"a\";i:401;s:1:\"b\";s:20:\"restore-any AspekPBB\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:41;a:4:{s:1:\"a\";i:402;s:1:\"b\";s:20:\"restore-any AspekPBB\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:42;a:4:{s:1:\"a\";i:403;s:1:\"b\";s:16:\"reorder AspekPBB\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:43;a:4:{s:1:\"a\";i:404;s:1:\"b\";s:16:\"reorder AspekPBB\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:44;a:4:{s:1:\"a\";i:405;s:1:\"b\";s:21:\"force-delete AspekPBB\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:45;a:4:{s:1:\"a\";i:406;s:1:\"b\";s:21:\"force-delete AspekPBB\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:46;a:4:{s:1:\"a\";i:407;s:1:\"b\";s:25:\"force-delete-any AspekPBB\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:47;a:4:{s:1:\"a\";i:408;s:1:\"b\";s:25:\"force-delete-any AspekPBB\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:48;a:4:{s:1:\"a\";i:409;s:1:\"b\";s:30:\"view-any AspekPenguranganNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:49;a:4:{s:1:\"a\";i:410;s:1:\"b\";s:30:\"view-any AspekPenguranganNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:50;a:4:{s:1:\"a\";i:411;s:1:\"b\";s:26:\"view AspekPenguranganNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:51;a:4:{s:1:\"a\";i:412;s:1:\"b\";s:26:\"view AspekPenguranganNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:52;a:4:{s:1:\"a\";i:413;s:1:\"b\";s:28:\"create AspekPenguranganNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:53;a:4:{s:1:\"a\";i:414;s:1:\"b\";s:28:\"create AspekPenguranganNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:54;a:4:{s:1:\"a\";i:415;s:1:\"b\";s:28:\"update AspekPenguranganNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:55;a:4:{s:1:\"a\";i:416;s:1:\"b\";s:28:\"update AspekPenguranganNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:56;a:4:{s:1:\"a\";i:417;s:1:\"b\";s:28:\"delete AspekPenguranganNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:57;a:4:{s:1:\"a\";i:418;s:1:\"b\";s:28:\"delete AspekPenguranganNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:58;a:4:{s:1:\"a\";i:419;s:1:\"b\";s:32:\"delete-any AspekPenguranganNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:59;a:4:{s:1:\"a\";i:420;s:1:\"b\";s:32:\"delete-any AspekPenguranganNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:60;a:4:{s:1:\"a\";i:421;s:1:\"b\";s:31:\"replicate AspekPenguranganNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:61;a:4:{s:1:\"a\";i:422;s:1:\"b\";s:31:\"replicate AspekPenguranganNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:62;a:4:{s:1:\"a\";i:423;s:1:\"b\";s:29:\"restore AspekPenguranganNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:63;a:4:{s:1:\"a\";i:424;s:1:\"b\";s:29:\"restore AspekPenguranganNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:64;a:4:{s:1:\"a\";i:425;s:1:\"b\";s:33:\"restore-any AspekPenguranganNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:65;a:4:{s:1:\"a\";i:426;s:1:\"b\";s:33:\"restore-any AspekPenguranganNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:66;a:4:{s:1:\"a\";i:427;s:1:\"b\";s:29:\"reorder AspekPenguranganNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:67;a:4:{s:1:\"a\";i:428;s:1:\"b\";s:29:\"reorder AspekPenguranganNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:68;a:4:{s:1:\"a\";i:429;s:1:\"b\";s:34:\"force-delete AspekPenguranganNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:69;a:4:{s:1:\"a\";i:430;s:1:\"b\";s:34:\"force-delete AspekPenguranganNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:70;a:4:{s:1:\"a\";i:431;s:1:\"b\";s:38:\"force-delete-any AspekPenguranganNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:71;a:4:{s:1:\"a\";i:432;s:1:\"b\";s:38:\"force-delete-any AspekPenguranganNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:72;a:4:{s:1:\"a\";i:433;s:1:\"b\";s:21:\"view-any AspekSeragam\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:73;a:4:{s:1:\"a\";i:434;s:1:\"b\";s:21:\"view-any AspekSeragam\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:74;a:4:{s:1:\"a\";i:435;s:1:\"b\";s:17:\"view AspekSeragam\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:75;a:4:{s:1:\"a\";i:436;s:1:\"b\";s:17:\"view AspekSeragam\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:76;a:4:{s:1:\"a\";i:437;s:1:\"b\";s:19:\"create AspekSeragam\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:77;a:4:{s:1:\"a\";i:438;s:1:\"b\";s:19:\"create AspekSeragam\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:78;a:4:{s:1:\"a\";i:439;s:1:\"b\";s:19:\"update AspekSeragam\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:79;a:4:{s:1:\"a\";i:440;s:1:\"b\";s:19:\"update AspekSeragam\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:80;a:4:{s:1:\"a\";i:441;s:1:\"b\";s:19:\"delete AspekSeragam\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:81;a:4:{s:1:\"a\";i:442;s:1:\"b\";s:19:\"delete AspekSeragam\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:82;a:4:{s:1:\"a\";i:443;s:1:\"b\";s:23:\"delete-any AspekSeragam\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:83;a:4:{s:1:\"a\";i:444;s:1:\"b\";s:23:\"delete-any AspekSeragam\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:84;a:4:{s:1:\"a\";i:445;s:1:\"b\";s:22:\"replicate AspekSeragam\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:85;a:4:{s:1:\"a\";i:446;s:1:\"b\";s:22:\"replicate AspekSeragam\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:86;a:4:{s:1:\"a\";i:447;s:1:\"b\";s:20:\"restore AspekSeragam\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:87;a:4:{s:1:\"a\";i:448;s:1:\"b\";s:20:\"restore AspekSeragam\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:88;a:4:{s:1:\"a\";i:449;s:1:\"b\";s:24:\"restore-any AspekSeragam\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:89;a:4:{s:1:\"a\";i:450;s:1:\"b\";s:24:\"restore-any AspekSeragam\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:90;a:4:{s:1:\"a\";i:451;s:1:\"b\";s:20:\"reorder AspekSeragam\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:91;a:4:{s:1:\"a\";i:452;s:1:\"b\";s:20:\"reorder AspekSeragam\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:92;a:4:{s:1:\"a\";i:453;s:1:\"b\";s:25:\"force-delete AspekSeragam\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:93;a:4:{s:1:\"a\";i:454;s:1:\"b\";s:25:\"force-delete AspekSeragam\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:94;a:4:{s:1:\"a\";i:455;s:1:\"b\";s:29:\"force-delete-any AspekSeragam\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:95;a:4:{s:1:\"a\";i:456;s:1:\"b\";s:29:\"force-delete-any AspekSeragam\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:96;a:4:{s:1:\"a\";i:457;s:1:\"b\";s:22:\"view-any AspekTataRias\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:97;a:4:{s:1:\"a\";i:458;s:1:\"b\";s:22:\"view-any AspekTataRias\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:98;a:4:{s:1:\"a\";i:459;s:1:\"b\";s:18:\"view AspekTataRias\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:99;a:4:{s:1:\"a\";i:460;s:1:\"b\";s:18:\"view AspekTataRias\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:100;a:4:{s:1:\"a\";i:461;s:1:\"b\";s:20:\"create AspekTataRias\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:101;a:4:{s:1:\"a\";i:462;s:1:\"b\";s:20:\"create AspekTataRias\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:102;a:4:{s:1:\"a\";i:463;s:1:\"b\";s:20:\"update AspekTataRias\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:103;a:4:{s:1:\"a\";i:464;s:1:\"b\";s:20:\"update AspekTataRias\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:104;a:4:{s:1:\"a\";i:465;s:1:\"b\";s:20:\"delete AspekTataRias\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:105;a:4:{s:1:\"a\";i:466;s:1:\"b\";s:20:\"delete AspekTataRias\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:106;a:4:{s:1:\"a\";i:467;s:1:\"b\";s:24:\"delete-any AspekTataRias\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:107;a:4:{s:1:\"a\";i:468;s:1:\"b\";s:24:\"delete-any AspekTataRias\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:108;a:4:{s:1:\"a\";i:469;s:1:\"b\";s:23:\"replicate AspekTataRias\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:109;a:4:{s:1:\"a\";i:470;s:1:\"b\";s:23:\"replicate AspekTataRias\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:110;a:4:{s:1:\"a\";i:471;s:1:\"b\";s:21:\"restore AspekTataRias\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:111;a:4:{s:1:\"a\";i:472;s:1:\"b\";s:21:\"restore AspekTataRias\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:112;a:4:{s:1:\"a\";i:473;s:1:\"b\";s:25:\"restore-any AspekTataRias\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:113;a:4:{s:1:\"a\";i:474;s:1:\"b\";s:25:\"restore-any AspekTataRias\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:114;a:4:{s:1:\"a\";i:475;s:1:\"b\";s:21:\"reorder AspekTataRias\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:115;a:4:{s:1:\"a\";i:476;s:1:\"b\";s:21:\"reorder AspekTataRias\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:116;a:4:{s:1:\"a\";i:477;s:1:\"b\";s:26:\"force-delete AspekTataRias\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:117;a:4:{s:1:\"a\";i:478;s:1:\"b\";s:26:\"force-delete AspekTataRias\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:118;a:4:{s:1:\"a\";i:479;s:1:\"b\";s:30:\"force-delete-any AspekTataRias\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:119;a:4:{s:1:\"a\";i:480;s:1:\"b\";s:30:\"force-delete-any AspekTataRias\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:120;a:4:{s:1:\"a\";i:481;s:1:\"b\";s:28:\"view-any AspekVariasiFormasi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:121;a:4:{s:1:\"a\";i:482;s:1:\"b\";s:28:\"view-any AspekVariasiFormasi\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:122;a:4:{s:1:\"a\";i:483;s:1:\"b\";s:24:\"view AspekVariasiFormasi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:123;a:4:{s:1:\"a\";i:484;s:1:\"b\";s:24:\"view AspekVariasiFormasi\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:124;a:4:{s:1:\"a\";i:485;s:1:\"b\";s:26:\"create AspekVariasiFormasi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:125;a:4:{s:1:\"a\";i:486;s:1:\"b\";s:26:\"create AspekVariasiFormasi\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:126;a:4:{s:1:\"a\";i:487;s:1:\"b\";s:26:\"update AspekVariasiFormasi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:127;a:4:{s:1:\"a\";i:488;s:1:\"b\";s:26:\"update AspekVariasiFormasi\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:128;a:4:{s:1:\"a\";i:489;s:1:\"b\";s:26:\"delete AspekVariasiFormasi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:129;a:4:{s:1:\"a\";i:490;s:1:\"b\";s:26:\"delete AspekVariasiFormasi\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:130;a:4:{s:1:\"a\";i:491;s:1:\"b\";s:30:\"delete-any AspekVariasiFormasi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:131;a:4:{s:1:\"a\";i:492;s:1:\"b\";s:30:\"delete-any AspekVariasiFormasi\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:132;a:4:{s:1:\"a\";i:493;s:1:\"b\";s:29:\"replicate AspekVariasiFormasi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:133;a:4:{s:1:\"a\";i:494;s:1:\"b\";s:29:\"replicate AspekVariasiFormasi\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:134;a:4:{s:1:\"a\";i:495;s:1:\"b\";s:27:\"restore AspekVariasiFormasi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:135;a:4:{s:1:\"a\";i:496;s:1:\"b\";s:27:\"restore AspekVariasiFormasi\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:136;a:4:{s:1:\"a\";i:497;s:1:\"b\";s:31:\"restore-any AspekVariasiFormasi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:137;a:4:{s:1:\"a\";i:498;s:1:\"b\";s:31:\"restore-any AspekVariasiFormasi\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:138;a:4:{s:1:\"a\";i:499;s:1:\"b\";s:27:\"reorder AspekVariasiFormasi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:139;a:4:{s:1:\"a\";i:500;s:1:\"b\";s:27:\"reorder AspekVariasiFormasi\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:140;a:4:{s:1:\"a\";i:501;s:1:\"b\";s:32:\"force-delete AspekVariasiFormasi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:141;a:4:{s:1:\"a\";i:502;s:1:\"b\";s:32:\"force-delete AspekVariasiFormasi\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:142;a:4:{s:1:\"a\";i:503;s:1:\"b\";s:36:\"force-delete-any AspekVariasiFormasi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:143;a:4:{s:1:\"a\";i:504;s:1:\"b\";s:36:\"force-delete-any AspekVariasiFormasi\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:144;a:4:{s:1:\"a\";i:505;s:1:\"b\";s:25:\"view-any PenguranganNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:145;a:4:{s:1:\"a\";i:506;s:1:\"b\";s:25:\"view-any PenguranganNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:146;a:4:{s:1:\"a\";i:507;s:1:\"b\";s:21:\"view PenguranganNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:147;a:4:{s:1:\"a\";i:508;s:1:\"b\";s:21:\"view PenguranganNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:148;a:4:{s:1:\"a\";i:509;s:1:\"b\";s:23:\"create PenguranganNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:149;a:4:{s:1:\"a\";i:510;s:1:\"b\";s:23:\"create PenguranganNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:150;a:4:{s:1:\"a\";i:511;s:1:\"b\";s:23:\"update PenguranganNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:151;a:4:{s:1:\"a\";i:512;s:1:\"b\";s:23:\"update PenguranganNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:152;a:4:{s:1:\"a\";i:513;s:1:\"b\";s:23:\"delete PenguranganNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:153;a:4:{s:1:\"a\";i:514;s:1:\"b\";s:23:\"delete PenguranganNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:154;a:4:{s:1:\"a\";i:515;s:1:\"b\";s:27:\"delete-any PenguranganNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:155;a:4:{s:1:\"a\";i:516;s:1:\"b\";s:27:\"delete-any PenguranganNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:156;a:4:{s:1:\"a\";i:517;s:1:\"b\";s:26:\"replicate PenguranganNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:157;a:4:{s:1:\"a\";i:518;s:1:\"b\";s:26:\"replicate PenguranganNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:158;a:4:{s:1:\"a\";i:519;s:1:\"b\";s:24:\"restore PenguranganNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:159;a:4:{s:1:\"a\";i:520;s:1:\"b\";s:24:\"restore PenguranganNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:160;a:4:{s:1:\"a\";i:521;s:1:\"b\";s:28:\"restore-any PenguranganNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:161;a:4:{s:1:\"a\";i:522;s:1:\"b\";s:28:\"restore-any PenguranganNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:162;a:4:{s:1:\"a\";i:523;s:1:\"b\";s:24:\"reorder PenguranganNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:163;a:4:{s:1:\"a\";i:524;s:1:\"b\";s:24:\"reorder PenguranganNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:164;a:4:{s:1:\"a\";i:525;s:1:\"b\";s:29:\"force-delete PenguranganNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:165;a:4:{s:1:\"a\";i:526;s:1:\"b\";s:29:\"force-delete PenguranganNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:166;a:4:{s:1:\"a\";i:527;s:1:\"b\";s:33:\"force-delete-any PenguranganNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:167;a:4:{s:1:\"a\";i:528;s:1:\"b\";s:33:\"force-delete-any PenguranganNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:168;a:4:{s:1:\"a\";i:529;s:1:\"b\";s:24:\"view-any PenilaianDanton\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:169;a:4:{s:1:\"a\";i:530;s:1:\"b\";s:24:\"view-any PenilaianDanton\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:170;a:4:{s:1:\"a\";i:531;s:1:\"b\";s:20:\"view PenilaianDanton\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:171;a:4:{s:1:\"a\";i:532;s:1:\"b\";s:20:\"view PenilaianDanton\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:172;a:4:{s:1:\"a\";i:533;s:1:\"b\";s:22:\"create PenilaianDanton\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:173;a:4:{s:1:\"a\";i:534;s:1:\"b\";s:22:\"create PenilaianDanton\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:174;a:4:{s:1:\"a\";i:535;s:1:\"b\";s:22:\"update PenilaianDanton\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:175;a:4:{s:1:\"a\";i:536;s:1:\"b\";s:22:\"update PenilaianDanton\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:176;a:4:{s:1:\"a\";i:537;s:1:\"b\";s:22:\"delete PenilaianDanton\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:177;a:4:{s:1:\"a\";i:538;s:1:\"b\";s:22:\"delete PenilaianDanton\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:178;a:4:{s:1:\"a\";i:539;s:1:\"b\";s:26:\"delete-any PenilaianDanton\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:179;a:4:{s:1:\"a\";i:540;s:1:\"b\";s:26:\"delete-any PenilaianDanton\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:180;a:4:{s:1:\"a\";i:541;s:1:\"b\";s:25:\"replicate PenilaianDanton\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:181;a:4:{s:1:\"a\";i:542;s:1:\"b\";s:25:\"replicate PenilaianDanton\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:182;a:4:{s:1:\"a\";i:543;s:1:\"b\";s:23:\"restore PenilaianDanton\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:183;a:4:{s:1:\"a\";i:544;s:1:\"b\";s:23:\"restore PenilaianDanton\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:184;a:4:{s:1:\"a\";i:545;s:1:\"b\";s:27:\"restore-any PenilaianDanton\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:185;a:4:{s:1:\"a\";i:546;s:1:\"b\";s:27:\"restore-any PenilaianDanton\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:186;a:4:{s:1:\"a\";i:547;s:1:\"b\";s:23:\"reorder PenilaianDanton\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:187;a:4:{s:1:\"a\";i:548;s:1:\"b\";s:23:\"reorder PenilaianDanton\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:188;a:4:{s:1:\"a\";i:549;s:1:\"b\";s:28:\"force-delete PenilaianDanton\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:189;a:4:{s:1:\"a\";i:550;s:1:\"b\";s:28:\"force-delete PenilaianDanton\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:190;a:4:{s:1:\"a\";i:551;s:1:\"b\";s:32:\"force-delete-any PenilaianDanton\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:191;a:4:{s:1:\"a\";i:552;s:1:\"b\";s:32:\"force-delete-any PenilaianDanton\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:192;a:4:{s:1:\"a\";i:553;s:1:\"b\";s:21:\"view-any PenilaianPBB\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:193;a:4:{s:1:\"a\";i:554;s:1:\"b\";s:21:\"view-any PenilaianPBB\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:194;a:4:{s:1:\"a\";i:555;s:1:\"b\";s:17:\"view PenilaianPBB\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:195;a:4:{s:1:\"a\";i:556;s:1:\"b\";s:17:\"view PenilaianPBB\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:196;a:4:{s:1:\"a\";i:557;s:1:\"b\";s:19:\"create PenilaianPBB\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:197;a:4:{s:1:\"a\";i:558;s:1:\"b\";s:19:\"create PenilaianPBB\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:198;a:4:{s:1:\"a\";i:559;s:1:\"b\";s:19:\"update PenilaianPBB\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:199;a:4:{s:1:\"a\";i:560;s:1:\"b\";s:19:\"update PenilaianPBB\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:200;a:4:{s:1:\"a\";i:561;s:1:\"b\";s:19:\"delete PenilaianPBB\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:201;a:4:{s:1:\"a\";i:562;s:1:\"b\";s:19:\"delete PenilaianPBB\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:202;a:4:{s:1:\"a\";i:563;s:1:\"b\";s:23:\"delete-any PenilaianPBB\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:203;a:4:{s:1:\"a\";i:564;s:1:\"b\";s:23:\"delete-any PenilaianPBB\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:204;a:4:{s:1:\"a\";i:565;s:1:\"b\";s:22:\"replicate PenilaianPBB\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:205;a:4:{s:1:\"a\";i:566;s:1:\"b\";s:22:\"replicate PenilaianPBB\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:206;a:4:{s:1:\"a\";i:567;s:1:\"b\";s:20:\"restore PenilaianPBB\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:207;a:4:{s:1:\"a\";i:568;s:1:\"b\";s:20:\"restore PenilaianPBB\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:208;a:4:{s:1:\"a\";i:569;s:1:\"b\";s:24:\"restore-any PenilaianPBB\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:209;a:4:{s:1:\"a\";i:570;s:1:\"b\";s:24:\"restore-any PenilaianPBB\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:210;a:4:{s:1:\"a\";i:571;s:1:\"b\";s:20:\"reorder PenilaianPBB\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:211;a:4:{s:1:\"a\";i:572;s:1:\"b\";s:20:\"reorder PenilaianPBB\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:212;a:4:{s:1:\"a\";i:573;s:1:\"b\";s:25:\"force-delete PenilaianPBB\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:213;a:4:{s:1:\"a\";i:574;s:1:\"b\";s:25:\"force-delete PenilaianPBB\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:214;a:4:{s:1:\"a\";i:575;s:1:\"b\";s:29:\"force-delete-any PenilaianPBB\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:215;a:4:{s:1:\"a\";i:576;s:1:\"b\";s:29:\"force-delete-any PenilaianPBB\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:216;a:4:{s:1:\"a\";i:577;s:1:\"b\";s:25:\"view-any PenilaianSeragam\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:217;a:4:{s:1:\"a\";i:578;s:1:\"b\";s:25:\"view-any PenilaianSeragam\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:218;a:4:{s:1:\"a\";i:579;s:1:\"b\";s:21:\"view PenilaianSeragam\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:219;a:4:{s:1:\"a\";i:580;s:1:\"b\";s:21:\"view PenilaianSeragam\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:220;a:4:{s:1:\"a\";i:581;s:1:\"b\";s:23:\"create PenilaianSeragam\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:221;a:4:{s:1:\"a\";i:582;s:1:\"b\";s:23:\"create PenilaianSeragam\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:222;a:4:{s:1:\"a\";i:583;s:1:\"b\";s:23:\"update PenilaianSeragam\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:223;a:4:{s:1:\"a\";i:584;s:1:\"b\";s:23:\"update PenilaianSeragam\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:224;a:4:{s:1:\"a\";i:585;s:1:\"b\";s:23:\"delete PenilaianSeragam\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:225;a:4:{s:1:\"a\";i:586;s:1:\"b\";s:23:\"delete PenilaianSeragam\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:226;a:4:{s:1:\"a\";i:587;s:1:\"b\";s:27:\"delete-any PenilaianSeragam\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:227;a:4:{s:1:\"a\";i:588;s:1:\"b\";s:27:\"delete-any PenilaianSeragam\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:228;a:4:{s:1:\"a\";i:589;s:1:\"b\";s:26:\"replicate PenilaianSeragam\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:229;a:4:{s:1:\"a\";i:590;s:1:\"b\";s:26:\"replicate PenilaianSeragam\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:230;a:4:{s:1:\"a\";i:591;s:1:\"b\";s:24:\"restore PenilaianSeragam\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:231;a:4:{s:1:\"a\";i:592;s:1:\"b\";s:24:\"restore PenilaianSeragam\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:232;a:4:{s:1:\"a\";i:593;s:1:\"b\";s:28:\"restore-any PenilaianSeragam\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:233;a:4:{s:1:\"a\";i:594;s:1:\"b\";s:28:\"restore-any PenilaianSeragam\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:234;a:4:{s:1:\"a\";i:595;s:1:\"b\";s:24:\"reorder PenilaianSeragam\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:235;a:4:{s:1:\"a\";i:596;s:1:\"b\";s:24:\"reorder PenilaianSeragam\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:236;a:4:{s:1:\"a\";i:597;s:1:\"b\";s:29:\"force-delete PenilaianSeragam\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:237;a:4:{s:1:\"a\";i:598;s:1:\"b\";s:29:\"force-delete PenilaianSeragam\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:238;a:4:{s:1:\"a\";i:599;s:1:\"b\";s:33:\"force-delete-any PenilaianSeragam\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:239;a:4:{s:1:\"a\";i:600;s:1:\"b\";s:33:\"force-delete-any PenilaianSeragam\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:240;a:4:{s:1:\"a\";i:601;s:1:\"b\";s:26:\"view-any PenilaianTataRias\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:241;a:4:{s:1:\"a\";i:602;s:1:\"b\";s:26:\"view-any PenilaianTataRias\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:242;a:4:{s:1:\"a\";i:603;s:1:\"b\";s:22:\"view PenilaianTataRias\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:243;a:4:{s:1:\"a\";i:604;s:1:\"b\";s:22:\"view PenilaianTataRias\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:244;a:4:{s:1:\"a\";i:605;s:1:\"b\";s:24:\"create PenilaianTataRias\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:245;a:4:{s:1:\"a\";i:606;s:1:\"b\";s:24:\"create PenilaianTataRias\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:246;a:4:{s:1:\"a\";i:607;s:1:\"b\";s:24:\"update PenilaianTataRias\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:247;a:4:{s:1:\"a\";i:608;s:1:\"b\";s:24:\"update PenilaianTataRias\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:248;a:4:{s:1:\"a\";i:609;s:1:\"b\";s:24:\"delete PenilaianTataRias\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:249;a:4:{s:1:\"a\";i:610;s:1:\"b\";s:24:\"delete PenilaianTataRias\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:250;a:4:{s:1:\"a\";i:611;s:1:\"b\";s:28:\"delete-any PenilaianTataRias\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:251;a:4:{s:1:\"a\";i:612;s:1:\"b\";s:28:\"delete-any PenilaianTataRias\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:252;a:4:{s:1:\"a\";i:613;s:1:\"b\";s:27:\"replicate PenilaianTataRias\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:253;a:4:{s:1:\"a\";i:614;s:1:\"b\";s:27:\"replicate PenilaianTataRias\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:254;a:4:{s:1:\"a\";i:615;s:1:\"b\";s:25:\"restore PenilaianTataRias\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:255;a:4:{s:1:\"a\";i:616;s:1:\"b\";s:25:\"restore PenilaianTataRias\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:256;a:4:{s:1:\"a\";i:617;s:1:\"b\";s:29:\"restore-any PenilaianTataRias\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:257;a:4:{s:1:\"a\";i:618;s:1:\"b\";s:29:\"restore-any PenilaianTataRias\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:258;a:4:{s:1:\"a\";i:619;s:1:\"b\";s:25:\"reorder PenilaianTataRias\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:259;a:4:{s:1:\"a\";i:620;s:1:\"b\";s:25:\"reorder PenilaianTataRias\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:260;a:4:{s:1:\"a\";i:621;s:1:\"b\";s:30:\"force-delete PenilaianTataRias\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:261;a:4:{s:1:\"a\";i:622;s:1:\"b\";s:30:\"force-delete PenilaianTataRias\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:262;a:4:{s:1:\"a\";i:623;s:1:\"b\";s:34:\"force-delete-any PenilaianTataRias\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:263;a:4:{s:1:\"a\";i:624;s:1:\"b\";s:34:\"force-delete-any PenilaianTataRias\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:264;a:4:{s:1:\"a\";i:625;s:1:\"b\";s:32:\"view-any PenilaianVariasiFormasi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:265;a:4:{s:1:\"a\";i:626;s:1:\"b\";s:32:\"view-any PenilaianVariasiFormasi\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:266;a:4:{s:1:\"a\";i:627;s:1:\"b\";s:28:\"view PenilaianVariasiFormasi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:267;a:4:{s:1:\"a\";i:628;s:1:\"b\";s:28:\"view PenilaianVariasiFormasi\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:268;a:4:{s:1:\"a\";i:629;s:1:\"b\";s:30:\"create PenilaianVariasiFormasi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:269;a:4:{s:1:\"a\";i:630;s:1:\"b\";s:30:\"create PenilaianVariasiFormasi\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:270;a:4:{s:1:\"a\";i:631;s:1:\"b\";s:30:\"update PenilaianVariasiFormasi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:271;a:4:{s:1:\"a\";i:632;s:1:\"b\";s:30:\"update PenilaianVariasiFormasi\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:272;a:4:{s:1:\"a\";i:633;s:1:\"b\";s:30:\"delete PenilaianVariasiFormasi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:273;a:4:{s:1:\"a\";i:634;s:1:\"b\";s:30:\"delete PenilaianVariasiFormasi\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:274;a:4:{s:1:\"a\";i:635;s:1:\"b\";s:34:\"delete-any PenilaianVariasiFormasi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:275;a:4:{s:1:\"a\";i:636;s:1:\"b\";s:34:\"delete-any PenilaianVariasiFormasi\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:276;a:4:{s:1:\"a\";i:637;s:1:\"b\";s:33:\"replicate PenilaianVariasiFormasi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:277;a:4:{s:1:\"a\";i:638;s:1:\"b\";s:33:\"replicate PenilaianVariasiFormasi\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:278;a:4:{s:1:\"a\";i:639;s:1:\"b\";s:31:\"restore PenilaianVariasiFormasi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:279;a:4:{s:1:\"a\";i:640;s:1:\"b\";s:31:\"restore PenilaianVariasiFormasi\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:280;a:4:{s:1:\"a\";i:641;s:1:\"b\";s:35:\"restore-any PenilaianVariasiFormasi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:281;a:4:{s:1:\"a\";i:642;s:1:\"b\";s:35:\"restore-any PenilaianVariasiFormasi\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:282;a:4:{s:1:\"a\";i:643;s:1:\"b\";s:31:\"reorder PenilaianVariasiFormasi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:283;a:4:{s:1:\"a\";i:644;s:1:\"b\";s:31:\"reorder PenilaianVariasiFormasi\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:284;a:4:{s:1:\"a\";i:645;s:1:\"b\";s:36:\"force-delete PenilaianVariasiFormasi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:285;a:4:{s:1:\"a\";i:646;s:1:\"b\";s:36:\"force-delete PenilaianVariasiFormasi\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:286;a:4:{s:1:\"a\";i:647;s:1:\"b\";s:40:\"force-delete-any PenilaianVariasiFormasi\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:287;a:4:{s:1:\"a\";i:648;s:1:\"b\";s:40:\"force-delete-any PenilaianVariasiFormasi\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:288;a:4:{s:1:\"a\";i:649;s:1:\"b\";s:16:\"view-any Peserta\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:289;a:4:{s:1:\"a\";i:650;s:1:\"b\";s:16:\"view-any Peserta\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:290;a:4:{s:1:\"a\";i:651;s:1:\"b\";s:12:\"view Peserta\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:291;a:4:{s:1:\"a\";i:652;s:1:\"b\";s:12:\"view Peserta\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:292;a:4:{s:1:\"a\";i:653;s:1:\"b\";s:14:\"create Peserta\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:293;a:4:{s:1:\"a\";i:654;s:1:\"b\";s:14:\"create Peserta\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:294;a:4:{s:1:\"a\";i:655;s:1:\"b\";s:14:\"update Peserta\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:295;a:4:{s:1:\"a\";i:656;s:1:\"b\";s:14:\"update Peserta\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:296;a:4:{s:1:\"a\";i:657;s:1:\"b\";s:14:\"delete Peserta\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:297;a:4:{s:1:\"a\";i:658;s:1:\"b\";s:14:\"delete Peserta\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:298;a:4:{s:1:\"a\";i:659;s:1:\"b\";s:18:\"delete-any Peserta\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:299;a:4:{s:1:\"a\";i:660;s:1:\"b\";s:18:\"delete-any Peserta\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:300;a:4:{s:1:\"a\";i:661;s:1:\"b\";s:17:\"replicate Peserta\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:301;a:4:{s:1:\"a\";i:662;s:1:\"b\";s:17:\"replicate Peserta\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:302;a:4:{s:1:\"a\";i:663;s:1:\"b\";s:15:\"restore Peserta\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:303;a:4:{s:1:\"a\";i:664;s:1:\"b\";s:15:\"restore Peserta\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:304;a:4:{s:1:\"a\";i:665;s:1:\"b\";s:19:\"restore-any Peserta\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:305;a:4:{s:1:\"a\";i:666;s:1:\"b\";s:19:\"restore-any Peserta\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:306;a:4:{s:1:\"a\";i:667;s:1:\"b\";s:15:\"reorder Peserta\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:307;a:4:{s:1:\"a\";i:668;s:1:\"b\";s:15:\"reorder Peserta\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:308;a:4:{s:1:\"a\";i:669;s:1:\"b\";s:20:\"force-delete Peserta\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:309;a:4:{s:1:\"a\";i:670;s:1:\"b\";s:20:\"force-delete Peserta\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:310;a:4:{s:1:\"a\";i:671;s:1:\"b\";s:24:\"force-delete-any Peserta\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:311;a:4:{s:1:\"a\";i:672;s:1:\"b\";s:24:\"force-delete-any Peserta\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:312;a:4:{s:1:\"a\";i:673;s:1:\"b\";s:19:\"view-any RekapNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:313;a:4:{s:1:\"a\";i:674;s:1:\"b\";s:19:\"view-any RekapNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:314;a:4:{s:1:\"a\";i:675;s:1:\"b\";s:15:\"view RekapNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:315;a:4:{s:1:\"a\";i:676;s:1:\"b\";s:15:\"view RekapNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:316;a:4:{s:1:\"a\";i:677;s:1:\"b\";s:17:\"create RekapNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:317;a:4:{s:1:\"a\";i:678;s:1:\"b\";s:17:\"create RekapNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:318;a:4:{s:1:\"a\";i:679;s:1:\"b\";s:17:\"update RekapNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:319;a:4:{s:1:\"a\";i:680;s:1:\"b\";s:17:\"update RekapNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:320;a:4:{s:1:\"a\";i:681;s:1:\"b\";s:17:\"delete RekapNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:321;a:4:{s:1:\"a\";i:682;s:1:\"b\";s:17:\"delete RekapNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:322;a:4:{s:1:\"a\";i:683;s:1:\"b\";s:21:\"delete-any RekapNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:323;a:4:{s:1:\"a\";i:684;s:1:\"b\";s:21:\"delete-any RekapNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:324;a:4:{s:1:\"a\";i:685;s:1:\"b\";s:20:\"replicate RekapNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:325;a:4:{s:1:\"a\";i:686;s:1:\"b\";s:20:\"replicate RekapNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:326;a:4:{s:1:\"a\";i:687;s:1:\"b\";s:18:\"restore RekapNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:327;a:4:{s:1:\"a\";i:688;s:1:\"b\";s:18:\"restore RekapNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:328;a:4:{s:1:\"a\";i:689;s:1:\"b\";s:22:\"restore-any RekapNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:329;a:4:{s:1:\"a\";i:690;s:1:\"b\";s:22:\"restore-any RekapNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:330;a:4:{s:1:\"a\";i:691;s:1:\"b\";s:18:\"reorder RekapNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:331;a:4:{s:1:\"a\";i:692;s:1:\"b\";s:18:\"reorder RekapNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:332;a:4:{s:1:\"a\";i:693;s:1:\"b\";s:23:\"force-delete RekapNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:333;a:4:{s:1:\"a\";i:694;s:1:\"b\";s:23:\"force-delete RekapNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:334;a:4:{s:1:\"a\";i:695;s:1:\"b\";s:27:\"force-delete-any RekapNilai\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:335;a:4:{s:1:\"a\";i:696;s:1:\"b\";s:27:\"force-delete-any RekapNilai\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:336;a:4:{s:1:\"a\";i:697;s:1:\"b\";s:13:\"view-any User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:337;a:4:{s:1:\"a\";i:698;s:1:\"b\";s:13:\"view-any User\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:338;a:4:{s:1:\"a\";i:699;s:1:\"b\";s:9:\"view User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:339;a:4:{s:1:\"a\";i:700;s:1:\"b\";s:9:\"view User\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:340;a:4:{s:1:\"a\";i:701;s:1:\"b\";s:11:\"create User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:341;a:4:{s:1:\"a\";i:702;s:1:\"b\";s:11:\"create User\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:342;a:4:{s:1:\"a\";i:703;s:1:\"b\";s:11:\"update User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:343;a:4:{s:1:\"a\";i:704;s:1:\"b\";s:11:\"update User\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:344;a:4:{s:1:\"a\";i:705;s:1:\"b\";s:11:\"delete User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:345;a:4:{s:1:\"a\";i:706;s:1:\"b\";s:11:\"delete User\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:346;a:4:{s:1:\"a\";i:707;s:1:\"b\";s:15:\"delete-any User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:347;a:4:{s:1:\"a\";i:708;s:1:\"b\";s:15:\"delete-any User\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:348;a:4:{s:1:\"a\";i:709;s:1:\"b\";s:14:\"replicate User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:349;a:4:{s:1:\"a\";i:710;s:1:\"b\";s:14:\"replicate User\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:350;a:4:{s:1:\"a\";i:711;s:1:\"b\";s:12:\"restore User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:351;a:4:{s:1:\"a\";i:712;s:1:\"b\";s:12:\"restore User\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:352;a:4:{s:1:\"a\";i:713;s:1:\"b\";s:16:\"restore-any User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:353;a:4:{s:1:\"a\";i:714;s:1:\"b\";s:16:\"restore-any User\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:354;a:4:{s:1:\"a\";i:715;s:1:\"b\";s:12:\"reorder User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:355;a:4:{s:1:\"a\";i:716;s:1:\"b\";s:12:\"reorder User\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:356;a:4:{s:1:\"a\";i:717;s:1:\"b\";s:17:\"force-delete User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:357;a:4:{s:1:\"a\";i:718;s:1:\"b\";s:17:\"force-delete User\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}i:358;a:4:{s:1:\"a\";i:719;s:1:\"b\";s:21:\"force-delete-any User\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:359;a:4:{s:1:\"a\";i:720;s:1:\"b\";s:21:\"force-delete-any User\";s:1:\"c\";s:3:\"api\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:1:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:5:\"Admin\";s:1:\"c\";s:3:\"web\";}}}', 1756449376);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `jobs`
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
-- Struktur dari tabel `job_batches`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `migrations`
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
(15, '2025_08_11_104050_create_rekap_nilais_table', 1),
(16, '2025_08_11_140055_create_aspek_pengurangan_nilais_table', 2),
(17, '2025_08_28_055318_create_permission_tables', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengurangan_nilai`
--

CREATE TABLE `pengurangan_nilai` (
  `id` bigint UNSIGNED NOT NULL,
  `id_aspek` bigint UNSIGNED NOT NULL,
  `id_peserta` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `pengurangan_nilai`
--

INSERT INTO `pengurangan_nilai` (`id`, `id_aspek`, `id_peserta`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '2025-08-27 09:13:18', '2025-08-27 09:13:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian_danton`
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
-- Dumping data untuk tabel `penilaian_danton`
--

INSERT INTO `penilaian_danton` (`id`, `id_aspek`, `id_peserta`, `id_user`, `nilai`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 1, 85, '2025-08-27 09:28:42', '2025-08-27 09:28:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian_pbb`
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
-- Dumping data untuk tabel `penilaian_pbb`
--

INSERT INTO `penilaian_pbb` (`id`, `id_aspek`, `id_user`, `id_peserta`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 85, '2025-08-27 09:48:14', '2025-08-27 09:48:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian_seragam`
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
-- Struktur dari tabel `penilaian_tata_rias`
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
-- Struktur dari tabel `penilaian_variasi_formasi`
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
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(361, 'view-any AspekDanton', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(362, 'view-any AspekDanton', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(363, 'view AspekDanton', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(364, 'view AspekDanton', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(365, 'create AspekDanton', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(366, 'create AspekDanton', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(367, 'update AspekDanton', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(368, 'update AspekDanton', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(369, 'delete AspekDanton', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(370, 'delete AspekDanton', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(371, 'delete-any AspekDanton', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(372, 'delete-any AspekDanton', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(373, 'replicate AspekDanton', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(374, 'replicate AspekDanton', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(375, 'restore AspekDanton', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(376, 'restore AspekDanton', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(377, 'restore-any AspekDanton', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(378, 'restore-any AspekDanton', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(379, 'reorder AspekDanton', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(380, 'reorder AspekDanton', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(381, 'force-delete AspekDanton', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(382, 'force-delete AspekDanton', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(383, 'force-delete-any AspekDanton', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(384, 'force-delete-any AspekDanton', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(385, 'view-any AspekPBB', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(386, 'view-any AspekPBB', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(387, 'view AspekPBB', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(388, 'view AspekPBB', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(389, 'create AspekPBB', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(390, 'create AspekPBB', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(391, 'update AspekPBB', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(392, 'update AspekPBB', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(393, 'delete AspekPBB', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(394, 'delete AspekPBB', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(395, 'delete-any AspekPBB', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(396, 'delete-any AspekPBB', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(397, 'replicate AspekPBB', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(398, 'replicate AspekPBB', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(399, 'restore AspekPBB', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(400, 'restore AspekPBB', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(401, 'restore-any AspekPBB', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(402, 'restore-any AspekPBB', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(403, 'reorder AspekPBB', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(404, 'reorder AspekPBB', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(405, 'force-delete AspekPBB', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(406, 'force-delete AspekPBB', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(407, 'force-delete-any AspekPBB', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(408, 'force-delete-any AspekPBB', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(409, 'view-any AspekPenguranganNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(410, 'view-any AspekPenguranganNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(411, 'view AspekPenguranganNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(412, 'view AspekPenguranganNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(413, 'create AspekPenguranganNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(414, 'create AspekPenguranganNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(415, 'update AspekPenguranganNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(416, 'update AspekPenguranganNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(417, 'delete AspekPenguranganNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(418, 'delete AspekPenguranganNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(419, 'delete-any AspekPenguranganNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(420, 'delete-any AspekPenguranganNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(421, 'replicate AspekPenguranganNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(422, 'replicate AspekPenguranganNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(423, 'restore AspekPenguranganNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(424, 'restore AspekPenguranganNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(425, 'restore-any AspekPenguranganNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(426, 'restore-any AspekPenguranganNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(427, 'reorder AspekPenguranganNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(428, 'reorder AspekPenguranganNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(429, 'force-delete AspekPenguranganNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(430, 'force-delete AspekPenguranganNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(431, 'force-delete-any AspekPenguranganNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(432, 'force-delete-any AspekPenguranganNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(433, 'view-any AspekSeragam', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(434, 'view-any AspekSeragam', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(435, 'view AspekSeragam', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(436, 'view AspekSeragam', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(437, 'create AspekSeragam', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(438, 'create AspekSeragam', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(439, 'update AspekSeragam', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(440, 'update AspekSeragam', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(441, 'delete AspekSeragam', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(442, 'delete AspekSeragam', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(443, 'delete-any AspekSeragam', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(444, 'delete-any AspekSeragam', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(445, 'replicate AspekSeragam', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(446, 'replicate AspekSeragam', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(447, 'restore AspekSeragam', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(448, 'restore AspekSeragam', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(449, 'restore-any AspekSeragam', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(450, 'restore-any AspekSeragam', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(451, 'reorder AspekSeragam', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(452, 'reorder AspekSeragam', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(453, 'force-delete AspekSeragam', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(454, 'force-delete AspekSeragam', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(455, 'force-delete-any AspekSeragam', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(456, 'force-delete-any AspekSeragam', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(457, 'view-any AspekTataRias', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(458, 'view-any AspekTataRias', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(459, 'view AspekTataRias', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(460, 'view AspekTataRias', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(461, 'create AspekTataRias', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(462, 'create AspekTataRias', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(463, 'update AspekTataRias', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(464, 'update AspekTataRias', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(465, 'delete AspekTataRias', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(466, 'delete AspekTataRias', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(467, 'delete-any AspekTataRias', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(468, 'delete-any AspekTataRias', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(469, 'replicate AspekTataRias', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(470, 'replicate AspekTataRias', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(471, 'restore AspekTataRias', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(472, 'restore AspekTataRias', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(473, 'restore-any AspekTataRias', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(474, 'restore-any AspekTataRias', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(475, 'reorder AspekTataRias', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(476, 'reorder AspekTataRias', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(477, 'force-delete AspekTataRias', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(478, 'force-delete AspekTataRias', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(479, 'force-delete-any AspekTataRias', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(480, 'force-delete-any AspekTataRias', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(481, 'view-any AspekVariasiFormasi', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(482, 'view-any AspekVariasiFormasi', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(483, 'view AspekVariasiFormasi', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(484, 'view AspekVariasiFormasi', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(485, 'create AspekVariasiFormasi', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(486, 'create AspekVariasiFormasi', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(487, 'update AspekVariasiFormasi', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(488, 'update AspekVariasiFormasi', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(489, 'delete AspekVariasiFormasi', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(490, 'delete AspekVariasiFormasi', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(491, 'delete-any AspekVariasiFormasi', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(492, 'delete-any AspekVariasiFormasi', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(493, 'replicate AspekVariasiFormasi', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(494, 'replicate AspekVariasiFormasi', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(495, 'restore AspekVariasiFormasi', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(496, 'restore AspekVariasiFormasi', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(497, 'restore-any AspekVariasiFormasi', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(498, 'restore-any AspekVariasiFormasi', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(499, 'reorder AspekVariasiFormasi', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(500, 'reorder AspekVariasiFormasi', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(501, 'force-delete AspekVariasiFormasi', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(502, 'force-delete AspekVariasiFormasi', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(503, 'force-delete-any AspekVariasiFormasi', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(504, 'force-delete-any AspekVariasiFormasi', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(505, 'view-any PenguranganNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(506, 'view-any PenguranganNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(507, 'view PenguranganNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(508, 'view PenguranganNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(509, 'create PenguranganNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(510, 'create PenguranganNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(511, 'update PenguranganNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(512, 'update PenguranganNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(513, 'delete PenguranganNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(514, 'delete PenguranganNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(515, 'delete-any PenguranganNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(516, 'delete-any PenguranganNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(517, 'replicate PenguranganNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(518, 'replicate PenguranganNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(519, 'restore PenguranganNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(520, 'restore PenguranganNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(521, 'restore-any PenguranganNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(522, 'restore-any PenguranganNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(523, 'reorder PenguranganNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(524, 'reorder PenguranganNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(525, 'force-delete PenguranganNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(526, 'force-delete PenguranganNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(527, 'force-delete-any PenguranganNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(528, 'force-delete-any PenguranganNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(529, 'view-any PenilaianDanton', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(530, 'view-any PenilaianDanton', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(531, 'view PenilaianDanton', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(532, 'view PenilaianDanton', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(533, 'create PenilaianDanton', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(534, 'create PenilaianDanton', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(535, 'update PenilaianDanton', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(536, 'update PenilaianDanton', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(537, 'delete PenilaianDanton', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(538, 'delete PenilaianDanton', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(539, 'delete-any PenilaianDanton', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(540, 'delete-any PenilaianDanton', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(541, 'replicate PenilaianDanton', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(542, 'replicate PenilaianDanton', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(543, 'restore PenilaianDanton', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(544, 'restore PenilaianDanton', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(545, 'restore-any PenilaianDanton', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(546, 'restore-any PenilaianDanton', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(547, 'reorder PenilaianDanton', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(548, 'reorder PenilaianDanton', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(549, 'force-delete PenilaianDanton', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(550, 'force-delete PenilaianDanton', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(551, 'force-delete-any PenilaianDanton', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(552, 'force-delete-any PenilaianDanton', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(553, 'view-any PenilaianPBB', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(554, 'view-any PenilaianPBB', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(555, 'view PenilaianPBB', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(556, 'view PenilaianPBB', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(557, 'create PenilaianPBB', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(558, 'create PenilaianPBB', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(559, 'update PenilaianPBB', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(560, 'update PenilaianPBB', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(561, 'delete PenilaianPBB', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(562, 'delete PenilaianPBB', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(563, 'delete-any PenilaianPBB', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(564, 'delete-any PenilaianPBB', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(565, 'replicate PenilaianPBB', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(566, 'replicate PenilaianPBB', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(567, 'restore PenilaianPBB', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(568, 'restore PenilaianPBB', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(569, 'restore-any PenilaianPBB', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(570, 'restore-any PenilaianPBB', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(571, 'reorder PenilaianPBB', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(572, 'reorder PenilaianPBB', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(573, 'force-delete PenilaianPBB', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(574, 'force-delete PenilaianPBB', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(575, 'force-delete-any PenilaianPBB', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(576, 'force-delete-any PenilaianPBB', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(577, 'view-any PenilaianSeragam', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(578, 'view-any PenilaianSeragam', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(579, 'view PenilaianSeragam', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(580, 'view PenilaianSeragam', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(581, 'create PenilaianSeragam', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(582, 'create PenilaianSeragam', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(583, 'update PenilaianSeragam', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(584, 'update PenilaianSeragam', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(585, 'delete PenilaianSeragam', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(586, 'delete PenilaianSeragam', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(587, 'delete-any PenilaianSeragam', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(588, 'delete-any PenilaianSeragam', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(589, 'replicate PenilaianSeragam', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(590, 'replicate PenilaianSeragam', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(591, 'restore PenilaianSeragam', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(592, 'restore PenilaianSeragam', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(593, 'restore-any PenilaianSeragam', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(594, 'restore-any PenilaianSeragam', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(595, 'reorder PenilaianSeragam', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(596, 'reorder PenilaianSeragam', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(597, 'force-delete PenilaianSeragam', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(598, 'force-delete PenilaianSeragam', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(599, 'force-delete-any PenilaianSeragam', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(600, 'force-delete-any PenilaianSeragam', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(601, 'view-any PenilaianTataRias', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(602, 'view-any PenilaianTataRias', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(603, 'view PenilaianTataRias', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(604, 'view PenilaianTataRias', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(605, 'create PenilaianTataRias', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(606, 'create PenilaianTataRias', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(607, 'update PenilaianTataRias', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(608, 'update PenilaianTataRias', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(609, 'delete PenilaianTataRias', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(610, 'delete PenilaianTataRias', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(611, 'delete-any PenilaianTataRias', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(612, 'delete-any PenilaianTataRias', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(613, 'replicate PenilaianTataRias', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(614, 'replicate PenilaianTataRias', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(615, 'restore PenilaianTataRias', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(616, 'restore PenilaianTataRias', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(617, 'restore-any PenilaianTataRias', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(618, 'restore-any PenilaianTataRias', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(619, 'reorder PenilaianTataRias', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(620, 'reorder PenilaianTataRias', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(621, 'force-delete PenilaianTataRias', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(622, 'force-delete PenilaianTataRias', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(623, 'force-delete-any PenilaianTataRias', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(624, 'force-delete-any PenilaianTataRias', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(625, 'view-any PenilaianVariasiFormasi', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(626, 'view-any PenilaianVariasiFormasi', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(627, 'view PenilaianVariasiFormasi', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(628, 'view PenilaianVariasiFormasi', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(629, 'create PenilaianVariasiFormasi', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(630, 'create PenilaianVariasiFormasi', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(631, 'update PenilaianVariasiFormasi', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(632, 'update PenilaianVariasiFormasi', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(633, 'delete PenilaianVariasiFormasi', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(634, 'delete PenilaianVariasiFormasi', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(635, 'delete-any PenilaianVariasiFormasi', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(636, 'delete-any PenilaianVariasiFormasi', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(637, 'replicate PenilaianVariasiFormasi', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(638, 'replicate PenilaianVariasiFormasi', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(639, 'restore PenilaianVariasiFormasi', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(640, 'restore PenilaianVariasiFormasi', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(641, 'restore-any PenilaianVariasiFormasi', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(642, 'restore-any PenilaianVariasiFormasi', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(643, 'reorder PenilaianVariasiFormasi', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(644, 'reorder PenilaianVariasiFormasi', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(645, 'force-delete PenilaianVariasiFormasi', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(646, 'force-delete PenilaianVariasiFormasi', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(647, 'force-delete-any PenilaianVariasiFormasi', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(648, 'force-delete-any PenilaianVariasiFormasi', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(649, 'view-any Peserta', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(650, 'view-any Peserta', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(651, 'view Peserta', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(652, 'view Peserta', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(653, 'create Peserta', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(654, 'create Peserta', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(655, 'update Peserta', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(656, 'update Peserta', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(657, 'delete Peserta', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(658, 'delete Peserta', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(659, 'delete-any Peserta', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(660, 'delete-any Peserta', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(661, 'replicate Peserta', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(662, 'replicate Peserta', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(663, 'restore Peserta', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(664, 'restore Peserta', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(665, 'restore-any Peserta', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(666, 'restore-any Peserta', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(667, 'reorder Peserta', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(668, 'reorder Peserta', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(669, 'force-delete Peserta', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(670, 'force-delete Peserta', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(671, 'force-delete-any Peserta', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(672, 'force-delete-any Peserta', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(673, 'view-any RekapNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(674, 'view-any RekapNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(675, 'view RekapNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(676, 'view RekapNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(677, 'create RekapNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(678, 'create RekapNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(679, 'update RekapNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(680, 'update RekapNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(681, 'delete RekapNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(682, 'delete RekapNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(683, 'delete-any RekapNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(684, 'delete-any RekapNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(685, 'replicate RekapNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(686, 'replicate RekapNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(687, 'restore RekapNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(688, 'restore RekapNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(689, 'restore-any RekapNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(690, 'restore-any RekapNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(691, 'reorder RekapNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(692, 'reorder RekapNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(693, 'force-delete RekapNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(694, 'force-delete RekapNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(695, 'force-delete-any RekapNilai', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(696, 'force-delete-any RekapNilai', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(697, 'view-any User', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(698, 'view-any User', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(699, 'view User', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(700, 'view User', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(701, 'create User', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(702, 'create User', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(703, 'update User', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(704, 'update User', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(705, 'delete User', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(706, 'delete User', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(707, 'delete-any User', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(708, 'delete-any User', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(709, 'replicate User', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(710, 'replicate User', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(711, 'restore User', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(712, 'restore User', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(713, 'restore-any User', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(714, 'restore-any User', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(715, 'reorder User', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(716, 'reorder User', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(717, 'force-delete User', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(718, 'force-delete User', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(719, 'force-delete-any User', 'web', '2025-08-27 23:27:55', '2025-08-27 23:27:55'),
(720, 'force-delete-any User', 'api', '2025-08-27 23:27:55', '2025-08-27 23:27:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
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
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id`, `nama`, `no_tampil`, `tingkat`, `created_at`, `updated_at`) VALUES
(1, 'SMAN 1 Lorem Ipsum', 1, 'slta', '2025-08-27 09:12:05', '2025-08-27 09:12:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap_nilai`
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
  `waktu` varchar(255) NOT NULL,
  `total_utama` int DEFAULT NULL,
  `total_umum` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `rekap_nilai`
--

INSERT INTO `rekap_nilai` (`id`, `id_peserta`, `nilai_pbb`, `nilai_danton`, `nilai_kostum`, `nilai_tata_rias`, `nilai_variasi_formasi`, `nilai_pengurangan`, `waktu`, `total_utama`, `total_umum`, `created_at`, `updated_at`) VALUES
(1, 1, 85, 85, NULL, NULL, NULL, 20, '20', 150, 170, '2025-08-27 09:13:43', '2025-08-28 00:20:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2025-08-27 23:04:34', '2025-08-27 23:04:34');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(361, 1),
(362, 1),
(363, 1),
(364, 1),
(365, 1),
(366, 1),
(367, 1),
(368, 1),
(369, 1),
(370, 1),
(371, 1),
(372, 1),
(373, 1),
(374, 1),
(375, 1),
(376, 1),
(377, 1),
(378, 1),
(379, 1),
(380, 1),
(381, 1),
(382, 1),
(383, 1),
(384, 1),
(385, 1),
(386, 1),
(387, 1),
(388, 1),
(389, 1),
(390, 1),
(391, 1),
(392, 1),
(393, 1),
(394, 1),
(395, 1),
(396, 1),
(397, 1),
(398, 1),
(399, 1),
(400, 1),
(401, 1),
(402, 1),
(403, 1),
(404, 1),
(405, 1),
(406, 1),
(407, 1),
(408, 1),
(409, 1),
(410, 1),
(411, 1),
(412, 1),
(413, 1),
(414, 1),
(415, 1),
(416, 1),
(417, 1),
(418, 1),
(419, 1),
(420, 1),
(421, 1),
(422, 1),
(423, 1),
(424, 1),
(425, 1),
(426, 1),
(427, 1),
(428, 1),
(429, 1),
(430, 1),
(431, 1),
(432, 1),
(433, 1),
(434, 1),
(435, 1),
(436, 1),
(437, 1),
(438, 1),
(439, 1),
(440, 1),
(441, 1),
(442, 1),
(443, 1),
(444, 1),
(445, 1),
(446, 1),
(447, 1),
(448, 1),
(449, 1),
(450, 1),
(451, 1),
(452, 1),
(453, 1),
(454, 1),
(455, 1),
(456, 1),
(457, 1),
(458, 1),
(459, 1),
(460, 1),
(461, 1),
(462, 1),
(463, 1),
(464, 1),
(465, 1),
(466, 1),
(467, 1),
(468, 1),
(469, 1),
(470, 1),
(471, 1),
(472, 1),
(473, 1),
(474, 1),
(475, 1),
(476, 1),
(477, 1),
(478, 1),
(479, 1),
(480, 1),
(481, 1),
(482, 1),
(483, 1),
(484, 1),
(485, 1),
(486, 1),
(487, 1),
(488, 1),
(489, 1),
(490, 1),
(491, 1),
(492, 1),
(493, 1),
(494, 1),
(495, 1),
(496, 1),
(497, 1),
(498, 1),
(499, 1),
(500, 1),
(501, 1),
(502, 1),
(503, 1),
(504, 1),
(505, 1),
(506, 1),
(507, 1),
(508, 1),
(509, 1),
(510, 1),
(511, 1),
(512, 1),
(513, 1),
(514, 1),
(515, 1),
(516, 1),
(517, 1),
(518, 1),
(519, 1),
(520, 1),
(521, 1),
(522, 1),
(523, 1),
(524, 1),
(525, 1),
(526, 1),
(527, 1),
(528, 1),
(529, 1),
(530, 1),
(531, 1),
(532, 1),
(533, 1),
(534, 1),
(535, 1),
(536, 1),
(537, 1),
(538, 1),
(539, 1),
(540, 1),
(541, 1),
(542, 1),
(543, 1),
(544, 1),
(545, 1),
(546, 1),
(547, 1),
(548, 1),
(549, 1),
(550, 1),
(551, 1),
(552, 1),
(553, 1),
(554, 1),
(555, 1),
(556, 1),
(557, 1),
(558, 1),
(559, 1),
(560, 1),
(561, 1),
(562, 1),
(563, 1),
(564, 1),
(565, 1),
(566, 1),
(567, 1),
(568, 1),
(569, 1),
(570, 1),
(571, 1),
(572, 1),
(573, 1),
(574, 1),
(575, 1),
(576, 1),
(577, 1),
(578, 1),
(579, 1),
(580, 1),
(581, 1),
(582, 1),
(583, 1),
(584, 1),
(585, 1),
(586, 1),
(587, 1),
(588, 1),
(589, 1),
(590, 1),
(591, 1),
(592, 1),
(593, 1),
(594, 1),
(595, 1),
(596, 1),
(597, 1),
(598, 1),
(599, 1),
(600, 1),
(601, 1),
(602, 1),
(603, 1),
(604, 1),
(605, 1),
(606, 1),
(607, 1),
(608, 1),
(609, 1),
(610, 1),
(611, 1),
(612, 1),
(613, 1),
(614, 1),
(615, 1),
(616, 1),
(617, 1),
(618, 1),
(619, 1),
(620, 1),
(621, 1),
(622, 1),
(623, 1),
(624, 1),
(625, 1),
(626, 1),
(627, 1),
(628, 1),
(629, 1),
(630, 1),
(631, 1),
(632, 1),
(633, 1),
(634, 1),
(635, 1),
(636, 1),
(637, 1),
(638, 1),
(639, 1),
(640, 1),
(641, 1),
(642, 1),
(643, 1),
(644, 1),
(645, 1),
(646, 1),
(647, 1),
(648, 1),
(649, 1),
(650, 1),
(651, 1),
(652, 1),
(653, 1),
(654, 1),
(655, 1),
(656, 1),
(657, 1),
(658, 1),
(659, 1),
(660, 1),
(661, 1),
(662, 1),
(663, 1),
(664, 1),
(665, 1),
(666, 1),
(667, 1),
(668, 1),
(669, 1),
(670, 1),
(671, 1),
(672, 1),
(673, 1),
(674, 1),
(675, 1),
(676, 1),
(677, 1),
(678, 1),
(679, 1),
(680, 1),
(681, 1),
(682, 1),
(683, 1),
(684, 1),
(685, 1),
(686, 1),
(687, 1),
(688, 1),
(689, 1),
(690, 1),
(691, 1),
(692, 1),
(693, 1),
(694, 1),
(695, 1),
(696, 1),
(697, 1),
(698, 1),
(699, 1),
(700, 1),
(701, 1),
(702, 1),
(703, 1),
(704, 1),
(705, 1),
(706, 1),
(707, 1),
(708, 1),
(709, 1),
(710, 1),
(711, 1),
(712, 1),
(713, 1),
(714, 1),
(715, 1),
(716, 1),
(717, 1),
(718, 1),
(719, 1),
(720, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
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
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('GGU20SvmRAEVirJ3orP2fiQg3NvGDYJ7C7dAyv4S', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiRG1YWVp5QWZ1YkRnYkREMkZxSDNlSUZycnJaZmNqWEdndnRZYVF3NSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hZG1pbi9yZWthcC1uaWxhaXMiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjYwOiIkMnkkMTIkWGVtekZtenlQWXlqQUFWVkxFWDFjZVNrRTk5bThYaGgxSk81WUQ4d2pYVDlySlJNRG15dGkiO3M6ODoiZmlsYW1lbnQiO2E6MDp7fX0=', 1756365602);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@example.com', '2025-08-24 19:03:49', '$2y$12$XemzFmzyPYyjAAVVLEX1ceSkE99m8Xhh1JO5YD8wjXT9rJRMDmyti', 'ENr5FaoIWFq8ptWRK1ofSyZJG0mllraIIvuWIno0aNnP7xP9qExX6XQVWPEs', '2025-08-24 19:03:49', '2025-08-24 19:03:49');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aspek_danton`
--
ALTER TABLE `aspek_danton`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aspek_pbb`
--
ALTER TABLE `aspek_pbb`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aspek_pengurangan_nilai`
--
ALTER TABLE `aspek_pengurangan_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aspek_seragam`
--
ALTER TABLE `aspek_seragam`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aspek_tata_rias`
--
ALTER TABLE `aspek_tata_rias`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `aspek_variasi_formasi`
--
ALTER TABLE `aspek_variasi_formasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pengurangan_nilai`
--
ALTER TABLE `pengurangan_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penilaian_danton`
--
ALTER TABLE `penilaian_danton`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaian_danton_id_aspek_foreign` (`id_aspek`),
  ADD KEY `penilaian_danton_id_peserta_foreign` (`id_peserta`),
  ADD KEY `penilaian_danton_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `penilaian_pbb`
--
ALTER TABLE `penilaian_pbb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaian_pbb_id_aspek_foreign` (`id_aspek`),
  ADD KEY `penilaian_pbb_id_user_foreign` (`id_user`),
  ADD KEY `penilaian_pbb_id_peserta_foreign` (`id_peserta`);

--
-- Indeks untuk tabel `penilaian_seragam`
--
ALTER TABLE `penilaian_seragam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaian_seragam_id_aspek_foreign` (`id_aspek`),
  ADD KEY `penilaian_seragam_id_peserta_foreign` (`id_peserta`),
  ADD KEY `penilaian_seragam_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `penilaian_tata_rias`
--
ALTER TABLE `penilaian_tata_rias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaian_tata_rias_id_aspek_foreign` (`id_aspek`),
  ADD KEY `penilaian_tata_rias_id_peserta_foreign` (`id_peserta`),
  ADD KEY `penilaian_tata_rias_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `penilaian_variasi_formasi`
--
ALTER TABLE `penilaian_variasi_formasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaian_variasi_formasi_id_aspek_foreign` (`id_aspek`),
  ADD KEY `penilaian_variasi_formasi_id_peserta_foreign` (`id_peserta`),
  ADD KEY `penilaian_variasi_formasi_id_user_foreign` (`id_user`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rekap_nilai`
--
ALTER TABLE `rekap_nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rekap_nilai_id_peserta_foreign` (`id_peserta`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aspek_danton`
--
ALTER TABLE `aspek_danton`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `aspek_pbb`
--
ALTER TABLE `aspek_pbb`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `aspek_pengurangan_nilai`
--
ALTER TABLE `aspek_pengurangan_nilai`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `aspek_seragam`
--
ALTER TABLE `aspek_seragam`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `aspek_tata_rias`
--
ALTER TABLE `aspek_tata_rias`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `aspek_variasi_formasi`
--
ALTER TABLE `aspek_variasi_formasi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `pengurangan_nilai`
--
ALTER TABLE `pengurangan_nilai`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penilaian_danton`
--
ALTER TABLE `penilaian_danton`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penilaian_pbb`
--
ALTER TABLE `penilaian_pbb`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penilaian_seragam`
--
ALTER TABLE `penilaian_seragam`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penilaian_tata_rias`
--
ALTER TABLE `penilaian_tata_rias`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penilaian_variasi_formasi`
--
ALTER TABLE `penilaian_variasi_formasi`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=721;

--
-- AUTO_INCREMENT untuk tabel `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rekap_nilai`
--
ALTER TABLE `rekap_nilai`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilaian_danton`
--
ALTER TABLE `penilaian_danton`
  ADD CONSTRAINT `penilaian_danton_id_aspek_foreign` FOREIGN KEY (`id_aspek`) REFERENCES `aspek_danton` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_danton_id_peserta_foreign` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_danton_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilaian_pbb`
--
ALTER TABLE `penilaian_pbb`
  ADD CONSTRAINT `penilaian_pbb_id_aspek_foreign` FOREIGN KEY (`id_aspek`) REFERENCES `aspek_pbb` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_pbb_id_peserta_foreign` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_pbb_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilaian_seragam`
--
ALTER TABLE `penilaian_seragam`
  ADD CONSTRAINT `penilaian_seragam_id_aspek_foreign` FOREIGN KEY (`id_aspek`) REFERENCES `aspek_seragam` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_seragam_id_peserta_foreign` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_seragam_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilaian_tata_rias`
--
ALTER TABLE `penilaian_tata_rias`
  ADD CONSTRAINT `penilaian_tata_rias_id_aspek_foreign` FOREIGN KEY (`id_aspek`) REFERENCES `aspek_tata_rias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_tata_rias_id_peserta_foreign` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_tata_rias_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilaian_variasi_formasi`
--
ALTER TABLE `penilaian_variasi_formasi`
  ADD CONSTRAINT `penilaian_variasi_formasi_id_aspek_foreign` FOREIGN KEY (`id_aspek`) REFERENCES `aspek_variasi_formasi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_variasi_formasi_id_peserta_foreign` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaian_variasi_formasi_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rekap_nilai`
--
ALTER TABLE `rekap_nilai`
  ADD CONSTRAINT `rekap_nilai_id_peserta_foreign` FOREIGN KEY (`id_peserta`) REFERENCES `peserta` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
