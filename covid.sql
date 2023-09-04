-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Sep 2023 pada 08.46
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_pasien`
--

CREATE TABLE `m_pasien` (
  `id` int(11) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `no_rm` varchar(11) DEFAULT NULL,
  `nama` varchar(110) DEFAULT NULL,
  `telp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jk` int(11) DEFAULT NULL COMMENT '1 : Laki\r\n2 : Perempuan',
  `usia` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_pasien`
--

INSERT INTO `m_pasien` (`id`, `nik`, `no_rm`, `nama`, `telp`, `alamat`, `jk`, `usia`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(1, '1', '12', 'Fathur', '09238328342', 'Jln. Kmana mana', 1, 20, 0, 1, '2022-06-27 13:50:21', 1, '2022-06-27 18:50:21'),
(2, 'RS-09991', 'RM-90', 'Haji Mahmud', '089777666555', 'Jl. Handko', 1, 34, 0, 1, '2022-06-27 22:13:44', 1, '2022-06-27 22:17:30'),
(3, '82984724284724', '123', 'Guhon', '0109198726262', 'Jl. Sumber suko', 1, 70, 2, 1, '2022-06-28 11:42:20', 1, '2022-06-28 11:42:20'),
(4, '92039204324', '890', 'fauzi', '1301312313', 'adasdasdas', 1, 14, 1, 1, '2022-06-29 05:08:33', 1, '2022-06-29 05:08:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_pertanyaan`
--

CREATE TABLE `m_pertanyaan` (
  `id` int(11) NOT NULL,
  `nomor` int(11) NOT NULL DEFAULT 0,
  `tipe` int(11) NOT NULL DEFAULT 0 COMMENT '1 : Pilihan\r\n2 : Essai\r\n3 : Multi',
  `pertanyaan` text DEFAULT NULL,
  `jawaban` text DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_pertanyaan`
--

INSERT INTO `m_pertanyaan` (`id`, `nomor`, `tipe`, `pertanyaan`, `jawaban`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(2, 1, 3, 'Apakah anda Pusing?', '[\"Ya\",\"Tidak\"]', 1, '2022-06-26 12:30:28', 1, '2022-06-26 16:51:39'),
(3, 2, 1, 'Apakah anda Sakit Perut?', '[\"Ya\",\"Tidak\"]', 1, '2022-06-26 12:32:18', 1, '2022-06-26 16:19:54'),
(6, 3, 2, 'Apakah sudah lebih lama dari hari?', '[]', 1, '2022-06-28 11:44:32', 1, '2022-06-28 11:44:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_pengaduan`
--

CREATE TABLE `r_pengaduan` (
  `id` int(11) NOT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `nama_pasien` varchar(200) DEFAULT NULL,
  `telp` varchar(13) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `pengaduan` text NOT NULL,
  `jadwal` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `ip_address` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `r_pengaduan`
--

INSERT INTO `r_pengaduan` (`id`, `nik`, `nama_pasien`, `telp`, `alamat`, `pengaduan`, `jadwal`, `created_by`, `created_at`, `updated_by`, `updated_at`, `ip_address`) VALUES
(2, '82984724284724', 'Guhon', '0109198726262', 'Jl. Sumber suko', '[{\"nomor\":\"1\",\"pertanyaan\":\"Apakah anda Pusing?\",\"jawaban\":\"[\\\"Tidak\\\"]\"},{\"nomor\":\"2\",\"pertanyaan\":\"Apakah anda Sakit Perut?\",\"jawaban\":\"[\\\"Tidak\\\"]\"}]', '2022-06-30 00:00:00', 0, '2022-06-28 11:11:22', 0, '2022-06-28 11:11:22', '192.168.1.71'),
(3, '82984724284724', 'Fauzan', '081223112311', 'asasd', '[{\"nomor\":\"1\",\"pertanyaan\":\"Apakah anda Pusing?\",\"jawaban\":\"[\\\"Tidak\\\"]\"},{\"nomor\":\"2\",\"pertanyaan\":\"Apakah anda Sakit Perut?\",\"jawaban\":\"[\\\"Tidak\\\"]\"}]', '2022-06-30 00:00:00', 0, '2022-06-28 11:13:41', 0, '2022-06-28 11:13:41', '127.0.0.1'),
(5, NULL, 'Fauzan', '081223112311', 'aasdasd', '[{\"nomor\":\"1\",\"pertanyaan\":\"Apakah anda Pusing?\",\"jawaban\":\"[\\\"Tidak\\\"]\"},{\"nomor\":\"2\",\"pertanyaan\":\"Apakah anda Sakit Perut?\",\"jawaban\":\"[\\\"Tidak\\\"]\"},{\"nomor\":\"3\",\"pertanyaan\":\"Apakah sudah lebih lama dari hari?\",\"jawaban\":\"[\\\"adsasdsad\\\"]\"}]', '2022-06-30 00:00:00', 0, '2022-06-28 11:49:35', 0, '2022-06-28 11:49:35', '127.0.0.1'),
(6, '92039204324', 'fauzi', '1301312313', 'adasdasdas', '[{\"nomor\":\"1\",\"pertanyaan\":\"Apakah anda Pusing?\",\"jawaban\":\"[\\\"Ya\\\",\\\"Tidak\\\"]\"},{\"nomor\":\"2\",\"pertanyaan\":\"Apakah anda Sakit Perut?\",\"jawaban\":\"[\\\"Ya\\\"]\"},{\"nomor\":\"3\",\"pertanyaan\":\"Apakah sudah lebih lama dari hari?\",\"jawaban\":\"[\\\"iya sudah\\\"]\"}]', '2022-06-30 00:00:00', 0, '2022-06-28 22:01:34', 0, '2022-06-28 22:01:34', '127.0.0.1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `r_pengunjung`
--

CREATE TABLE `r_pengunjung` (
  `id` int(11) NOT NULL,
  `ip` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `r_pengunjung`
--

INSERT INTO `r_pengunjung` (`id`, `ip`) VALUES
(1, '127.0.0.1'),
(2, '192.168.1.71');

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `kode` varchar(100) DEFAULT NULL,
  `value` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `kode`, `value`) VALUES
(1, 'call_darurat', '+6281803319222');

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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', NULL, '$2y$10$oWMzauNsgsFfdQzZ9kqrVetEcLG0kH9CAbbRWod.LoNPpPEjdrP6e', NULL, '2022-06-24 10:04:23', '2022-06-24 10:04:23');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_pasien`
--
ALTER TABLE `m_pasien`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `m_pertanyaan`
--
ALTER TABLE `m_pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `r_pengaduan`
--
ALTER TABLE `r_pengaduan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `r_pengunjung`
--
ALTER TABLE `r_pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
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
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `m_pasien`
--
ALTER TABLE `m_pasien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `m_pertanyaan`
--
ALTER TABLE `m_pertanyaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `r_pengaduan`
--
ALTER TABLE `r_pengaduan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `r_pengunjung`
--
ALTER TABLE `r_pengunjung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
