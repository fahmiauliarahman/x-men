-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2020 pada 07.45
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `heroes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `heroes`
--

CREATE TABLE `heroes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kel` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `heroes`
--

INSERT INTO `heroes` (`id`, `nama`, `jenis_kel`, `created_at`, `updated_at`) VALUES
(8, 'Archangel', 'Perempuan', '2020-07-03 18:36:07', '2020-07-03 18:45:52'),
(9, 'Storm', 'Perempuan', '2020-07-03 18:36:21', '2020-07-03 18:56:13'),
(10, 'Wolverine', 'Laki - Laki', '2020-07-03 18:36:38', '2020-07-03 18:36:38'),
(11, 'Jubilee', 'Perempuan', '2020-07-03 18:36:59', '2020-07-03 18:36:59'),
(12, 'Psylocke', 'Perempuan', '2020-07-03 18:37:12', '2020-07-03 18:37:12'),
(13, 'Professor X', 'Laki - Laki', '2020-07-03 18:40:27', '2020-07-03 18:40:27'),
(14, 'Cyclops', 'Laki - Laki', '2020-07-03 18:40:32', '2020-07-03 18:40:32'),
(15, 'Iceman', 'Laki - Laki', '2020-07-03 18:40:37', '2020-07-03 18:40:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `heroes_skills`
--

CREATE TABLE `heroes_skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `heroes_id` int(10) UNSIGNED NOT NULL,
  `nama_skill` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `heroes_skills`
--

INSERT INTO `heroes_skills` (`id`, `heroes_id`, `nama_skill`, `created_at`, `updated_at`) VALUES
(3, 8, 'Makan Sambil Duduk', '2020-07-03 18:52:19', '2020-07-03 18:52:19'),
(4, 8, 'Terbang', '2020-07-03 18:52:26', '2020-07-03 18:52:26'),
(5, 14, 'Laser', '2020-07-03 18:54:55', '2020-07-03 18:54:55'),
(6, 9, 'Mengatur Cuaca', '2020-07-03 18:56:55', '2020-07-03 18:56:55'),
(8, 15, 'Merubah Benda Menjadi Es', '2020-07-03 19:00:03', '2020-07-03 19:00:03'),
(9, 15, 'Mendinginkan Ruangan', '2020-07-03 19:00:11', '2020-07-03 19:00:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_07_03_100103_create_heroes_table', 1),
(4, '2020_07_03_100221_create_heroes_skills_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `heroes`
--
ALTER TABLE `heroes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `heroes_skills`
--
ALTER TABLE `heroes_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `heroes`
--
ALTER TABLE `heroes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `heroes_skills`
--
ALTER TABLE `heroes_skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
