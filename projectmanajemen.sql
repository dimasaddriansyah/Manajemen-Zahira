-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Agu 2020 pada 10.18
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
-- Database: `projectmanajemen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
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
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dimas Addriansyah', 'dimas@gmail.com', NULL, '$2y$10$TajeHeoF.UMw5T/0OtOOJej7JWDsqGGeu6KA.h6XH91vON.H4f1yy', NULL, '2020-07-22 03:06:49', '2020-07-22 03:06:49'),
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$10$7QBlBPP12ef7a8H5fPTcvuLC1.T1FW/94tRC/D6dtNh4sYNwT/JQi', NULL, '2020-07-22 03:06:50', '2020-07-22 03:06:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `tgl_masuk` datetime NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `supplier_id`, `nama_barang`, `kategori_id`, `harga_beli`, `harga_jual`, `stok`, `jumlah_masuk`, `tgl_masuk`, `status`, `created_at`, `updated_at`) VALUES
(5, 3, 'Wajan', 1, 75000, 100000, 50, 50, '2020-07-31 00:18:06', 3, '2020-07-30 17:18:06', '2020-07-30 18:02:30'),
(6, 1, 'Rice Cooker', 1, 250000, 325000, 1, 3, '2020-07-31 00:24:42', 2, '2020-07-30 17:24:42', '2020-07-31 15:41:42'),
(7, 1, 'Piring', 1, 5000, 10000, 45, 50, '2020-07-31 00:28:31', 3, '2020-07-30 17:28:31', '2020-07-31 15:41:42'),
(8, 3, 'Kukusan', 1, 200000, 250000, 2, 2, '2020-07-31 22:37:48', 2, '2020-07-31 15:37:48', '2020-07-31 15:38:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Alat Masak', '2020-07-26 12:57:27', '2020-07-26 12:57:27');

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
(1, '2020_04_21_194446_create_pegawai_table', 1),
(2, '2020_04_21_194553_create_admin_table', 1),
(3, '2020_04_22_190838_create_supplier_table', 1),
(4, '2020_04_25_164037_create_kategori_table', 1),
(5, '2020_04_26_164449_create_barang_table', 1),
(6, '2020_04_26_165043_create_barang_masuk_table', 1),
(7, '2020_05_12_173810_create_transaksi_table', 1),
(8, '2020_05_13_143909_create_transaksi_detail_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `name`, `email`, `email_verified_at`, `password`, `alamat`, `no_hp`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Pegawai', 'pegawai@gmail.com', NULL, '$2y$10$KW3fyPbAi2wH73ZOuURZa.X9LCMy0dHsvfYRfrl5xjOXZMTnHLTNC', 'Indramayu', '08899331122', NULL, '2020-07-22 03:06:50', '2020-07-30 16:17:18'),
(2, 'Azizah', 'azizah@gmail.com', NULL, '$2y$10$U/73OfMnVxC60J5nJh0S8uVUeohH5NuJgVMTUeKa/DKaQ8W8w62mG', 'Indramayu', '08899331124', NULL, '2020-07-22 03:06:50', '2020-07-22 03:06:50'),
(3, 'Pranata', 'pranata@gmail.com', NULL, '$2y$10$ujgwves1b1Sp64zvYY3btujyMJ2ta.Y28YLH3IZAE8VNe46LGKjoK', 'Cirebon', '08899331152', NULL, '2020-07-22 03:06:50', '2020-07-22 03:06:50');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `name`, `alamat`, `no_hp`, `created_at`, `updated_at`) VALUES
(1, 'CV Gudang Rabat', 'Pasar Baru Indramayu', '08923341122', '2020-07-26 12:56:51', '2020-07-26 12:56:51'),
(3, 'Toko Makmur', 'Pasar Mambo Indramayu', '089432343222', '2020-07-30 16:19:55', '2020-07-30 16:19:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `nama_pembeli` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_harga` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uang_bayar` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `pegawai_id`, `nama_pembeli`, `jumlah_harga`, `status`, `uang_bayar`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 2, 'Dimas Addriansyah Pamungkas', 60000, '1', 60000, '2020-07-26', '2020-07-26 13:02:05', '2020-07-26 13:02:47'),
(2, 2, 'Zulfa Khoerul Marah', 130000, '1', 130000, '2020-07-26', '2020-07-26 13:12:29', '2020-07-26 13:12:47'),
(3, 2, 'Dimas Addriansyah Pamungkas', 230000, '1', 240000, '2020-07-31', '2020-07-30 17:32:51', '2020-07-30 17:34:41'),
(4, 3, 'Amirudin', 500000, '1', 505000, '2020-07-31', '2020-07-30 17:59:23', '2020-07-30 17:59:54'),
(5, 2, 'Samsudin', 670000, '1', 700000, '2020-07-31', '2020-07-31 15:40:16', '2020-07-31 15:41:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaksi_id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah_beli` int(11) NOT NULL,
  `jumlah_harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id`, `transaksi_id`, `barang_id`, `jumlah_beli`, `jumlah_harga`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 60000, '2020-07-26 13:02:05', '2020-07-26 13:02:05'),
(2, 2, 1, 2, 60000, '2020-07-26 13:12:29', '2020-07-26 13:12:29'),
(3, 2, 2, 2, 70000, '2020-07-26 13:12:36', '2020-07-26 13:12:36'),
(4, 3, 7, 3, 30000, '2020-07-30 17:32:51', '2020-07-30 17:32:51'),
(5, 3, 5, 2, 200000, '2020-07-30 17:32:59', '2020-07-30 17:32:59'),
(6, 4, 5, 5, 500000, '2020-07-30 17:59:24', '2020-07-30 17:59:24'),
(7, 5, 7, 2, 20000, '2020-07-31 15:40:16', '2020-07-31 15:40:16'),
(8, 5, 6, 2, 650000, '2020-07-31 15:41:07', '2020-07-31 15:41:07');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barang_masuk_supplier_id_foreign` (`supplier_id`),
  ADD KEY `barang_masuk_kategori_id_foreign` (`kategori_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pegawai_email_unique` (`email`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_pegawai_id_foreign` (`pegawai_id`);

--
-- Indeks untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_detail_transaksi_id_foreign` (`transaksi_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_masuk_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`),
  ADD CONSTRAINT `barang_masuk_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`);

--
-- Ketidakleluasaan untuk tabel `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `transaksi_detail_transaksi_id_foreign` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
