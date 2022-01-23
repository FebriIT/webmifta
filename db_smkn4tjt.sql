-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jan 2022 pada 14.44
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_smkn4tjt`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `forum`
--

CREATE TABLE `forum` (
  `id` int(12) NOT NULL,
  `konten` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `forum`
--

INSERT INTO `forum` (`id`, `konten`, `user_id`, `created_at`, `updated_at`) VALUES
(12, 'ddbdbbdbd\\', 14, '2022-01-21 04:55:45', '2022-01-21'),
(13, 'nndndnndnd', 15, '2022-01-21 04:57:22', '2022-01-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `user_id` int(15) NOT NULL,
  `mapel` varchar(200) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tanggal_lahir` varchar(20) NOT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id`, `nip`, `nama`, `user_id`, `mapel`, `jenis_kelamin`, `no_hp`, `tanggal_lahir`, `avatar`, `created_at`, `updated_at`) VALUES
(3, '198004062010012011', 'Ani', 14, 'Multimedia', 'Perempuan', '081366519680', '1980-04-06', 'IMG_20210513_094144_168-removebg.png', '2022-01-19 05:13:25', '2022-01-21 12:04:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru_siswa`
--

CREATE TABLE `guru_siswa` (
  `id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(15) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `id_tahun` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `nama`, `id_tahun`, `created_at`, `updated_at`) VALUES
(1, 'X', '8', '2022-01-19 05:06:34', '2022-01-19 12:06:34'),
(2, 'XI', '8', '2022-01-19 05:06:39', '2022-01-19 12:06:39'),
(3, 'XII', '8', '2022-01-19 05:06:45', '2022-01-19 12:06:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_mapel`
--

CREATE TABLE `kelas_mapel` (
  `id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas_mapel`
--

INSERT INTO `kelas_mapel` (`id`, `kelas_id`, `mapel_id`, `created_at`) VALUES
(28, 58, 4, '2021-07-23 23:27:01'),
(29, 59, 4, '2021-07-23 23:27:01'),
(30, 60, 4, '2021-07-23 23:27:01'),
(31, 58, 5, '2021-07-23 23:27:46'),
(32, 59, 5, '2021-07-23 23:27:46'),
(33, 60, 5, '2021-07-23 23:27:46'),
(34, 61, 6, '2021-07-23 23:29:01'),
(35, 62, 6, '2021-07-23 23:29:01'),
(36, 58, 7, '2021-07-23 23:31:03'),
(37, 59, 7, '2021-07-23 23:31:03'),
(38, 58, 8, '2021-07-23 23:31:18'),
(39, 59, 8, '2021-07-23 23:31:18'),
(40, 60, 8, '2021-07-23 23:31:18'),
(41, 67, 9, '2022-01-19 05:09:20'),
(42, 68, 9, '2022-01-19 05:09:20'),
(43, 69, 9, '2022-01-19 05:09:20'),
(44, 1, 10, '2022-01-19 05:10:59'),
(45, 2, 10, '2022-01-19 05:10:59'),
(46, 3, 10, '2022-01-19 05:10:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas_tugas`
--

CREATE TABLE `kelas_tugas` (
  `id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `tugas_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas_tugas`
--

INSERT INTO `kelas_tugas` (`id`, `kelas_id`, `tugas_id`, `created_at`) VALUES
(21, 58, 1, '2021-07-23 23:39:05'),
(22, 59, 1, '2021-07-23 23:39:05'),
(23, 60, 1, '2021-07-23 23:39:05'),
(26, 2, 4, '2022-01-19 06:56:53'),
(27, 1, 5, '2022-01-20 04:12:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `konten` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `forum_id` int(11) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel`
--

CREATE TABLE `mapel` (
  `id` int(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mapel`
--

INSERT INTO `mapel` (`id`, `nama`, `id_tahun`, `created_at`, `updated_at`) VALUES
(10, 'Multimedia', 8, '2022-01-19 05:10:59', '2022-01-19 12:10:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mapel_siswa`
--

CREATE TABLE `mapel_siswa` (
  `id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id` int(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` varchar(200) DEFAULT NULL,
  `mapel_id` int(25) NOT NULL,
  `link` varchar(200) DEFAULT NULL,
  `kelas_id` int(25) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `file_materi` varchar(200) DEFAULT NULL,
  `author` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id`, `nama`, `deskripsi`, `mapel_id`, `link`, `kelas_id`, `id_tahun`, `file_materi`, `author`, `created_at`, `updated_at`) VALUES
(1, 'Materi1', NULL, 4, 'https://www.youtube.com/', 58, 6, NULL, 'admin', '2021-07-23 23:32:23', '2021-07-24 06:32:23'),
(4, 'kwjlwktjlw', NULL, 4, NULL, 58, 6, '8020170047.docx', 'admin', '2021-11-08 12:22:31', '2021-11-08 19:22:31'),
(5, 'ANIMASI 2 DIMENSI', NULL, 10, NULL, 1, 8, '10015-Article Text-879-1-10-20190131.p3.pdf', 'Ani Mulyani', '2022-01-19 06:21:52', '2022-01-19 13:21:52'),
(6, 'Software', NULL, 10, NULL, 1, 8, NULL, 'Ani', '2022-01-20 14:48:41', '2022-01-20 21:48:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_08_31_043912_create_siswa_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `tugas1` int(50) DEFAULT NULL,
  `tugas2` int(50) DEFAULT NULL,
  `tugas3` int(50) DEFAULT NULL,
  `tugas4` int(50) DEFAULT NULL,
  `tugas5` int(50) DEFAULT NULL,
  `tugas6` int(50) DEFAULT NULL,
  `uts` int(50) DEFAULT NULL,
  `uas` int(50) DEFAULT NULL,
  `mapel_id` int(50) NOT NULL,
  `siswa_id` int(12) NOT NULL,
  `author` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `nisn` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(15) NOT NULL,
  `kelas_id` int(25) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `nisn`, `nama`, `user_id`, `kelas_id`, `id_tahun`, `agama`, `jenis_kelamin`, `avatar`, `tempat_lahir`, `tanggal_lahir`, `created_at`, `updated_at`) VALUES
(5, '1507091409050001', 'A. Maulana', 15, 1, 8, 'Islam', 'Laki-Laki', NULL, 'Simpang Tuan', '2006-09-14', '2022-01-19 06:02:42', '2022-01-19 06:02:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa_tugas`
--

CREATE TABLE `siswa_tugas` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `tugas_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa_tugas`
--

INSERT INTO `siswa_tugas` (`id`, `siswa_id`, `tugas_id`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '2021-07-23 23:44:12', '2021-07-24 06:44:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal`
--

CREATE TABLE `soal` (
  `id` int(11) NOT NULL,
  `tugas_id` int(11) NOT NULL,
  `soal` text NOT NULL,
  `a` varchar(50) NOT NULL,
  `b` varchar(50) NOT NULL,
  `c` varchar(50) NOT NULL,
  `d` varchar(50) NOT NULL,
  `kunci` varchar(50) NOT NULL,
  `score` varchar(25) NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `soal`
--

INSERT INTO `soal` (`id`, `tugas_id`, `soal`, `a`, `b`, `c`, `d`, `kunci`, `score`, `gambar`, `created_at`, `updated_at`) VALUES
(3, 1, 'wadaw', 'dawdaw', 'adwawd', 'awdawdaw', 'dawdaw', 'C', '22', NULL, '2021-07-23 23:39:18', '2021-07-24 06:39:18'),
(4, 4, 'Dibawah ini yang termasuk aplikasi untuk mengedit foto adalah ?', 'Winamp', 'Cyberlink Youcam', 'Draw io', 'Photoshop', 'A', '10', NULL, '2022-01-19 06:59:37', '2022-01-19 13:59:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soalessay`
--

CREATE TABLE `soalessay` (
  `id` int(11) NOT NULL,
  `tugas_id` int(11) NOT NULL,
  `pertanyaan` varchar(100) NOT NULL,
  `score` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `soalessay`
--

INSERT INTO `soalessay` (`id`, `tugas_id`, `pertanyaan`, `score`, `created_at`, `updated_at`) VALUES
(3, 1, 'awdaw', '22', '2021-07-23 23:39:24', '2021-07-24 06:39:24'),
(4, 4, 'Sebutkan 3 aplikasi untuk mengedit foto', '10', '2022-01-19 07:00:25', '2022-01-19 14:00:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soalessay_jawaban`
--

CREATE TABLE `soalessay_jawaban` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `tugas_id` int(11) NOT NULL,
  `jawaban` varchar(200) NOT NULL,
  `score` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `soalessay_jawaban`
--

INSERT INTO `soalessay_jawaban` (`id`, `siswa_id`, `tugas_id`, `jawaban`, `score`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'dwadaw', NULL, '2021-07-23 23:44:12', '2021-07-24 06:44:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `soal_jawaban`
--

CREATE TABLE `soal_jawaban` (
  `id` int(11) NOT NULL,
  `tugas_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `mapel_id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `soal_id` int(11) NOT NULL,
  `jawaban` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `score` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `soal_jawaban`
--

INSERT INTO `soal_jawaban` (`id`, `tugas_id`, `kelas_id`, `mapel_id`, `siswa_id`, `soal_id`, `jawaban`, `status`, `score`, `created_at`, `updated_at`) VALUES
(2, 1, 58, 4, 1, 3, 'B', 'salah', '0', '2021-07-23 23:44:12', '2021-07-24 06:44:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahunakademik`
--

CREATE TABLE `tahunakademik` (
  `id` int(11) NOT NULL,
  `tahun` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tahunakademik`
--

INSERT INTO `tahunakademik` (`id`, `tahun`, `created_at`, `updated_at`) VALUES
(8, '2021', '2022-01-19 05:04:59', '2022-01-19 12:04:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id` int(25) NOT NULL,
  `pembuat` varchar(200) NOT NULL,
  `mapel_id` int(25) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `waktu` datetime DEFAULT NULL,
  `jenis_tugas` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id`, `pembuat`, `mapel_id`, `id_tahun`, `waktu`, `jenis_tugas`, `created_at`, `updated_at`) VALUES
(1, 'gurus', 4, 6, '0000-00-00 00:00:00', 'Latihan', '2021-07-24 06:39:05', '2021-07-24 06:39:05'),
(4, 'Ani Mulyani', 10, 8, '0000-00-00 00:00:00', 'Quis', '2022-01-19 13:56:53', '2022-01-19 13:56:53'),
(5, 'Ani', 10, 8, '0000-00-00 00:00:00', 'Latihan', '2022-01-20 11:12:21', '2022-01-20 11:12:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin', 'admin@admin.com', '$2y$10$SM/ph52kyOC4yzTm3HRJzuXE288FKT2Q4NeX38n8KzB478hc7Xovi', 'QTtwiCqEu175KjjciTUZFmnPZBGu2kvbx0UDHdQQJenW4e8vLaW7d4B8JX9R', '2020-10-19 05:11:51', '2020-10-19 05:11:51'),
(14, 'guru', 'Ani', 'animulyani060480@gmail.com', '$2y$10$KRK7N/EV6nTVl6z6UKE6kuiKBqHr/INk3D3eWuoFo9GaIor9PCU4.', '039rd4wXGLNM3MIzyhbK0O7s6WvGCzIlzlV7rtV5WdaGuCfOmDVJx2CgCkSg', '2022-01-19 05:13:25', '2022-01-21 05:04:54'),
(15, 'siswa', 'A. Maulana', 'maulanaa1409@gmail.com', '$2y$10$WTivW1n/gByU88IL.BpOiurONIqG6DsCwDdFREDMwns93XLhx0NN.', 'qVGki2VvJoKJUIpaCrdSeRNdZA5IFxML2yttG8enPp04oJvrcKTZ6r7eUw8h', '2022-01-19 06:02:42', '2022-01-19 06:02:42');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `guru_siswa`
--
ALTER TABLE `guru_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas_mapel`
--
ALTER TABLE `kelas_mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kelas_tugas`
--
ALTER TABLE `kelas_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mapel_siswa`
--
ALTER TABLE `mapel_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa_tugas`
--
ALTER TABLE `siswa_tugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `soalessay`
--
ALTER TABLE `soalessay`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `soalessay_jawaban`
--
ALTER TABLE `soalessay_jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `soal_jawaban`
--
ALTER TABLE `soal_jawaban`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tahunakademik`
--
ALTER TABLE `tahunakademik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
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
-- AUTO_INCREMENT untuk tabel `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `guru_siswa`
--
ALTER TABLE `guru_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT untuk tabel `kelas_mapel`
--
ALTER TABLE `kelas_mapel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `kelas_tugas`
--
ALTER TABLE `kelas_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `mapel_siswa`
--
ALTER TABLE `mapel_siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `siswa_tugas`
--
ALTER TABLE `siswa_tugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `soal`
--
ALTER TABLE `soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `soalessay`
--
ALTER TABLE `soalessay`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `soalessay_jawaban`
--
ALTER TABLE `soalessay_jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `soal_jawaban`
--
ALTER TABLE `soal_jawaban`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tahunakademik`
--
ALTER TABLE `tahunakademik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
