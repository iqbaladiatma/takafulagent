-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 13 Jan 2026 pada 00.53
-- Versi server: 8.0.30
-- Versi PHP: 8.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `takafulagent`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agens`
--

CREATE TABLE `agens` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode_agen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `wa_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'gradient',
  `background_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'blue-green',
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Agen Takaful',
  `pencapaian` text COLLATE utf8mb4_unicode_ci,
  `tahun_pengalaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '5+',
  `klien_terlayani` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '100+',
  `layanan_unggulan` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `agens`
--

INSERT INTO `agens` (`id`, `nama`, `kode_agen`, `telepon`, `wa_link`, `instagram_username`, `facebook_username`, `linkedin_username`, `foto`, `background_image`, `background_type`, `background_value`, `deskripsi`, `role`, `pencapaian`, `tahun_pengalaman`, `klien_terlayani`, `layanan_unggulan`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Ahmad Fauzi', 'TKF001', '081234567890', NULL, 'ahmad.fauzi.agent', 'ahmad.fauzi.takaful', 'ahmad-fauzi-takaful', NULL, NULL, 'gradient', 'blue-green', 'Berpengalaman lebih dari 5 tahun dalam industri asuransi syariah. Siap membantu Anda menemukan solusi proteksi terbaik sesuai prinsip syariah.', 'Senior Agen Takaful', 'Top Performer 2023, Melayani lebih dari 200 nasabah, Sertifikasi AAJI', '5+', '100+', NULL, '2025-12-08 23:00:01', '2025-12-14 15:26:41', NULL),
(2, 'Siti Nurhaliza', 'TKF002', '082345678901', 'https://wa.me/6282345678901', 'siti.nurhaliza.agent', 'siti.nurhaliza.takaful', NULL, NULL, NULL, 'gradient', 'blue-green', 'Spesialis asuransi keluarga dan pendidikan. Membantu keluarga Indonesia merencanakan masa depan yang lebih baik dengan prinsip syariah.', 'Agen Takaful', 'Best Newcomer 2024, Fokus pada produk pendidikan', '5+', '100+', '[\"Konsultasi Asuransi Syariah Gratis\", \"Proses Klaim Cepat & Mudah\", \"Pelayanan 24/7 via WhatsApp\"]', '2025-12-08 23:00:01', '2025-12-14 15:55:10', NULL),
(3, 'Demo Agent', 'DEMO001', '08123456789', 'https://wa.me/628123456789', 'demo_agent', 'demo.agent', 'demo-agent', NULL, NULL, 'gradient', 'green-teal', 'Agen demo untuk testing sistem.', 'Agen Takaful Demo', NULL, '8+', '250+', '[\"Konsultasi Asuransi Syariah Gratis\", \"Proses Klaim Cepat & Mudah\", \"Pelayanan 24/7 via WhatsApp\", \"Analisis Kebutuhan Personal\", \"Follow Up Berkala\"]', '2025-12-09 23:35:48', '2025-12-14 15:27:09', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `agen_product`
--

CREATE TABLE `agen_product` (
  `id` bigint UNSIGNED NOT NULL,
  `agen_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `custom_wa_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_description` text COLLATE utf8mb4_unicode_ci,
  `urutan` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `agen_product`
--

INSERT INTO `agen_product` (`id`, `agen_id`, `product_id`, `custom_wa_link`, `custom_description`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, 1, '2025-12-14 15:58:45', '2025-12-14 15:58:45'),
(2, 1, 2, NULL, NULL, 2, '2025-12-14 15:58:45', '2025-12-14 15:58:45'),
(3, 2, 3, NULL, NULL, 3, '2025-12-14 15:58:45', '2025-12-14 15:58:45'),
(4, 2, 4, NULL, NULL, 4, '2025-12-14 15:58:45', '2025-12-14 15:58:45'),
(5, 1, 3, NULL, NULL, 0, '2025-12-14 16:02:37', '2025-12-14 16:02:37'),
(6, 2, 1, NULL, NULL, 0, '2025-12-14 16:06:23', '2025-12-14 16:06:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('takaful-cache-agen@takaful.com|127.0.0.1', 'i:2;', 1765507272),
('takaful-cache-agen@takaful.com|127.0.0.1:timer', 'i:1765507272;', 1765507272);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `change_requests`
--

CREATE TABLE `change_requests` (
  `id` bigint UNSIGNED NOT NULL,
  `agen_id` bigint UNSIGNED NOT NULL,
  `type` enum('profile','product_add','product_edit','product_delete') COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `requested_data` json DEFAULT NULL,
  `product_id` bigint UNSIGNED DEFAULT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `admin_notes` text COLLATE utf8mb4_unicode_ci,
  `approved_at` timestamp NULL DEFAULT NULL,
  `approved_by` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `change_requests`
--

INSERT INTO `change_requests` (`id`, `agen_id`, `type`, `title`, `description`, `requested_data`, `product_id`, `status`, `admin_notes`, `approved_at`, `approved_by`, `created_at`, `updated_at`) VALUES
(1, 3, 'product_add', 'Produk Ajam', 'ajam adaalah produk kamji', NULL, NULL, 'approved', NULL, '2025-12-10 07:07:21', 1, '2025-12-10 06:32:49', '2025-12-10 07:07:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_12_04_000001_create_agens_table', 1),
(5, '2025_12_04_025610_add_role_to_users_table', 1),
(6, '2025_12_07_020922_add_background_to_agens_table', 1),
(7, '2025_12_07_025748_create_products_table', 1),
(8, '2025_12_10_062723_add_user_id_to_agens_table', 2),
(9, '2025_12_10_070958_create_profile_visits_table', 3),
(10, '2025_12_10_072328_make_agen_id_nullable_in_products_table', 4),
(11, '2025_12_10_131447_create_change_requests_table', 5),
(12, '2025_12_10_140000_add_stats_and_services_to_agens_table', 6),
(13, '2025_12_10_140253_add_stats_and_services_to_agens_table', 6),
(14, '2025_12_14_220016_add_social_media_to_agens_table', 7),
(15, '2025_12_14_222252_change_social_media_to_username_in_agens_table', 8),
(16, '2025_12_14_225625_create_agen_product_pivot_table', 9),
(17, '2025_12_14_225707_remove_agen_id_from_products_table', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `urutan` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `judul`, `gambar`, `deskripsi`, `urutan`, `created_at`, `updated_at`) VALUES
(1, 'Takaful Jiwa Individual', NULL, 'Perlindungan jiwa syariah dengan manfaat optimal untuk individu dan keluarga. Memberikan ketenangan pikiran dengan prinsip tolong-menolong.', 1, '2025-12-10 00:24:07', '2025-12-14 15:53:18'),
(2, 'Takaful Kesehatan Keluarga', NULL, 'Perlindungan kesehatan komprehensif untuk seluruh anggota keluarga dengan sistem gotong royong sesuai syariah.', 2, '2025-12-10 00:24:07', '2025-12-14 15:53:18'),
(3, 'Takaful Pendidikan', NULL, 'Investasi pendidikan anak dengan perlindungan jiwa orang tua. Masa depan cerah untuk buah hati tercinta.', 3, '2025-12-10 00:24:07', '2025-12-14 15:55:10'),
(4, 'Takaful Haji & Umrah', NULL, 'Tabungan ibadah haji dan umrah dengan perlindungan syariah. Wujudkan impian beribadah ke tanah suci.', 4, '2025-12-10 00:24:07', '2025-12-14 15:55:10'),
(5, 'Takaful Kendaraan', NULL, 'Perlindungan kendaraan bermotor dengan prinsip syariah. Berkendara dengan tenang dan berkah.', 5, '2025-12-10 00:24:07', '2025-12-10 00:24:07'),
(6, 'Takaful Mikro', NULL, 'Perlindungan terjangkau untuk masyarakat menengah ke bawah. Akses mudah, manfaat maksimal.', 6, '2025-12-10 00:24:07', '2025-12-10 00:24:07'),
(7, 'Takaful Investasi Syariah', NULL, 'Investasi halal dengan potensi keuntungan menarik. Kembangkan harta dengan cara yang berkah.', 7, '2025-12-10 00:24:07', '2025-12-10 00:24:07'),
(8, 'Takaful Kecelakaan Diri', NULL, 'Perlindungan dari risiko kecelakaan dengan santunan yang memadai. Hidup lebih tenang dan terlindungi.', 8, '2025-12-10 00:24:07', '2025-12-10 00:24:07'),
(9, 'Takaful Rumah & Properti', NULL, 'Perlindungan rumah dan properti dari berbagai risiko. Aset berharga terjaga dengan prinsip syariah.', 9, '2025-12-10 00:24:07', '2025-12-10 00:24:07'),
(10, 'Takaful Bisnis & Usaha', NULL, 'Perlindungan komprehensif untuk bisnis dan usaha. Kembangkan usaha dengan perlindungan syariah.', 10, '2025-12-10 00:24:07', '2025-12-10 00:24:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile_visits`
--

CREATE TABLE `profile_visits` (
  `id` bigint UNSIGNED NOT NULL,
  `agen_id` bigint UNSIGNED NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_agent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visited_at` timestamp NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `profile_visits`
--

INSERT INTO `profile_visits` (`id`, `agen_id`, `ip_address`, `user_agent`, `referer`, `country`, `city`, `visited_at`, `created_at`, `updated_at`) VALUES
(1, 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'http://takafulagent.test/admin/agens', NULL, NULL, '2025-12-10 00:17:20', '2025-12-10 00:17:20', '2025-12-10 00:17:20'),
(2, 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'http://takafulagent.test/agent/profile', NULL, NULL, '2025-12-10 06:27:05', '2025-12-10 06:27:05', '2025-12-10 06:27:05'),
(3, 3, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Mobile Safari/537.36', 'http://takafulagent.test/', NULL, NULL, '2025-12-10 07:27:32', '2025-12-10 07:27:32', '2025-12-10 07:27:32'),
(4, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'http://takafulagent.test/', NULL, NULL, '2025-12-10 18:21:47', '2025-12-10 18:21:47', '2025-12-10 18:21:47'),
(5, 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'http://takafulagent.test/agen', NULL, NULL, '2025-12-10 19:49:16', '2025-12-10 19:49:16', '2025-12-10 19:49:16'),
(6, 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'http://takafulagent.test/agent/profile', NULL, NULL, '2025-12-12 19:48:34', '2025-12-12 19:48:34', '2025-12-12 19:48:34'),
(7, 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'http://takafulagent.test/agen', NULL, NULL, '2025-12-12 23:08:18', '2025-12-12 23:08:18', '2025-12-12 23:08:18'),
(8, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'http://takafulagent.test/', NULL, NULL, '2025-12-12 23:08:29', '2025-12-12 23:08:29', '2025-12-12 23:08:29'),
(9, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'http://takafulagent.test/agen', NULL, NULL, '2025-12-14 14:55:39', '2025-12-14 14:55:39', '2025-12-14 14:55:39'),
(10, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'http://takafulagent.test/agen', NULL, NULL, '2025-12-14 16:11:11', '2025-12-14 16:11:11', '2025-12-14 16:11:11'),
(11, 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'http://takafulagent.test/agen', NULL, NULL, '2025-12-14 16:11:37', '2025-12-14 16:11:37', '2025-12-14 16:11:37'),
(12, 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'http://takafulagent.test/agen', NULL, NULL, '2025-12-14 16:12:07', '2025-12-14 16:12:07', '2025-12-14 16:12:07'),
(13, 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'http://takafulagent.test/agen', NULL, NULL, '2025-12-14 18:55:56', '2025-12-14 18:55:56', '2025-12-14 18:55:56'),
(14, 3, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Mobile Safari/537.36', 'http://takafulagent.test/', NULL, NULL, '2025-12-14 18:56:21', '2025-12-14 18:56:21', '2025-12-14 18:56:21'),
(15, 1, '127.0.0.1', 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Mobile Safari/537.36', 'http://takafulagent.test/', NULL, NULL, '2025-12-14 19:12:02', '2025-12-14 19:12:02', '2025-12-14 19:12:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Je7YthyaSy2JT2WWCALQnDGbjCKeAW30oqEXzdzA', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZWN4blR6c0hNc0VzTng0TUwySFpDMHIycTloWUlJa0tGR1lDd25TUSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly90YWthZnVsYWdlbnQudGVzdCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766534743),
('yJtSa0sj5SJenxNRjccr3EtFmcNtwKzZ3sjrgxSp', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaXAxN2Y4czdOaHNEVEpTU3hhTTFOOXUwejlyUUU5blNwV0I5YjNWVSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly90YWthZnVsYWdlbnQudGVzdCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1766389301),
('YpsoaXb1EcQzqz8lmPcHcRmrUwEu8tnltfXLqgHH', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiOFRCVEp1VzREMDRHVzVhek82bmpLVk05a3FBNk5rQkg1NkttZm93dSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly90YWthZnVsYWdlbnQudGVzdCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEyJGFwVUJkMVdnMWFqM0RzaXMvSTRNSU9LT2Z3ekhRVFQ2NG1VZkt6YjJxTWRlMkZGeURCYm8yIjtzOjg6ImZpbGFtZW50IjthOjA6e319', 1765765085);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Takaful', 'admin@takaful.com', 'admin', NULL, '$2y$12$apUBd1Wg1aj3Dsis/I4MIOKOfwzHQTT64mUfKzb2qMde2FFyDBbo2', NULL, '2025-12-08 23:00:00', '2025-12-08 23:00:00'),
(2, 'User Takaful', 'user@takaful.com', 'user', NULL, '$2y$12$T2P9I.NbYaf3KionJOgzbO4wzTkFdVfjakLYDUk2jfbdeZQrj3TuC', NULL, '2025-12-08 23:00:01', '2025-12-08 23:00:01'),
(3, 'Demo Agent', 'agent@takaful.com', 'agent', NULL, '$2y$12$fsb.selHUPRQCeD6oHoRS.XQvq/GkD2vgfFrpcs6EwiAjsPbP5Lt6', NULL, '2025-12-09 23:35:48', '2025-12-09 23:35:48');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agens`
--
ALTER TABLE `agens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `agens_kode_agen_unique` (`kode_agen`),
  ADD KEY `agens_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `agen_product`
--
ALTER TABLE `agen_product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `agen_product_agen_id_product_id_unique` (`agen_id`,`product_id`),
  ADD KEY `agen_product_product_id_foreign` (`product_id`);

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
-- Indeks untuk tabel `change_requests`
--
ALTER TABLE `change_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `change_requests_product_id_foreign` (`product_id`),
  ADD KEY `change_requests_approved_by_foreign` (`approved_by`),
  ADD KEY `change_requests_agen_id_status_index` (`agen_id`,`status`),
  ADD KEY `change_requests_status_created_at_index` (`status`,`created_at`);

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
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profile_visits`
--
ALTER TABLE `profile_visits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_visits_agen_id_visited_at_index` (`agen_id`,`visited_at`),
  ADD KEY `profile_visits_ip_address_agen_id_index` (`ip_address`,`agen_id`);

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
-- AUTO_INCREMENT untuk tabel `agens`
--
ALTER TABLE `agens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `agen_product`
--
ALTER TABLE `agen_product`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `change_requests`
--
ALTER TABLE `change_requests`
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
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `profile_visits`
--
ALTER TABLE `profile_visits`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `agens`
--
ALTER TABLE `agens`
  ADD CONSTRAINT `agens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `agen_product`
--
ALTER TABLE `agen_product`
  ADD CONSTRAINT `agen_product_agen_id_foreign` FOREIGN KEY (`agen_id`) REFERENCES `agens` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `agen_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `change_requests`
--
ALTER TABLE `change_requests`
  ADD CONSTRAINT `change_requests_agen_id_foreign` FOREIGN KEY (`agen_id`) REFERENCES `agens` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `change_requests_approved_by_foreign` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `change_requests_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `profile_visits`
--
ALTER TABLE `profile_visits`
  ADD CONSTRAINT `profile_visits_agen_id_foreign` FOREIGN KEY (`agen_id`) REFERENCES `agens` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
