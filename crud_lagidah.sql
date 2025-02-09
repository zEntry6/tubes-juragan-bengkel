-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Feb 2025 pada 17.53
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_lagidah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barangs`
--

CREATE TABLE `barangs` (
  `id_barangs` bigint(20) UNSIGNED NOT NULL,
  `id_bengkels` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `barangs`
--

INSERT INTO `barangs` (`id_barangs`, `id_bengkels`, `nama_barang`, `deskripsi`, `stok`, `harga`, `gambar`) VALUES
(2, 2, 'Coolant Motor', 'Menjaga suhu kerja mesin supaya tetap ideal dan menghindari over heating (kepanasan) pada mesin melalui sirkulasi dari cairan pendingin / Radiator Coolant', 678, 64500.00, 'barang_images/RNIPaqt9q4OtRMpUqP1kIJ5pU7gFPwIAJQTK76yQ.jpg'),
(3, 2, 'Shock Breaker Vario', 'Sebagai peredam kejut dimana meredam kejutan atau getaran akibat kondisi jalan yang tidak rata untuk memberikan kenyamanan bagi pengendara serta menjaga kestabilan agar roda selalu kontak dengan jalan, sehingga motor dapat dikendalikan dengan baik.', 345, 325000.00, 'barang_images/8upNhd8tsg5567aYRo97THJf7r4CU3Z0vRpbQc46.png'),
(4, 2, 'Filter Udara', 'Berfungsi menyaring udara bebas dari luar yang akan masuk ke ruang pembakaran agar selalu dalam keadaaan optimal.', 231, 54000.00, 'barang_images/muR8XhtHHpg8OGNSdgPtant1TVWJaNDQrYL3dKgN.jpg'),
(5, 2, 'Aki Motor', 'Menyimpan listrik yang dihasilkan oleh spul dan magnet di mesin. Juga sebagai penggerak/pemberi daya listrik bagi komponen yang membutuhkannya, seperti lampu, klakson, starter elektrik dan lain-lain. Selain itu berfungsi sebagai stabilisator tegangan kelistrikan motor Honda.', 323, 91000.00, 'barang_images/Hxog1NItg3sK7Crgx18xL0hIfkgkk6yFsVFd4HzN.jpg'),
(6, 2, 'Disc Clutch Vario', 'Disc Clutch adalah sebuah piringan yang menghubungkan mesin dengan transmisi untuk menjalankan serta menghentikan mesin.', 456, 89000.00, 'barang_images/9FwpO4qeRsqv0X9EwtMmvSNSaSsDU6XJWbMPzFl5.jpg'),
(7, 2, 'Van Belt Vario', 'Berfungsi untuk meneruskan tenaga mesin untuk menggerakkan roda belakang melalui pulley.', 345, 125000.00, 'barang_images/WQ6o6CAAmwGpiyk4CdNNhZ9VdufGl27i7aRSiCEk.jpg'),
(8, 2, 'Busi Motor', 'Spark Plug berfungsi untuk membakar campuran bahan bakar dan udara yang masuk ke dalam ruang pembakaran (Ignition) lalu menghantarkan energi panas tersebut keluar dari ruang pembakaran (Transfer). Spark plug juga berfungsi sebagai indikator pembakaran pada mesin.', 768, 35000.00, 'barang_images/DMcZxy4qS3ik8MAvHLt4xYGHUKaNxiDlQAtHVeVT.jpg'),
(9, 2, 'Kampas Rem Vario', 'Pengereman untuk memperlambat atau memberhentikan motor.', 678, 95000.00, 'barang_images/VdIfrCC5yLcC5Jvy0eyRa48lHaACT11GyYJyI94N.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bengkels`
--

CREATE TABLE `bengkels` (
  `id_bengkels` bigint(20) UNSIGNED NOT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `nama_bengkel` varchar(255) NOT NULL,
  `lokasi_bengkel` varchar(255) NOT NULL,
  `latitude` decimal(10,7) DEFAULT NULL,
  `longitude` decimal(10,7) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bengkels`
--

INSERT INTO `bengkels` (`id_bengkels`, `id_users`, `nama_bengkel`, `lokasi_bengkel`, `latitude`, `longitude`, `created_at`, `updated_at`) VALUES
(1, 2, 'asep bengkel jaya', 'sebelah masjid', -6.8868824, 107.6189804, NULL, NULL),
(2, 3, 'Astra Motor Husein', 'Dekat Husein Sastranegara', -6.9073407, 107.5759363, NULL, NULL),
(3, 4, 'Nuri Jaya Abadi', 'Dekat Masjid', -7.0054711, 107.6614559, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking_servis`
--

CREATE TABLE `booking_servis` (
  `id_servis` bigint(20) UNSIGNED NOT NULL,
  `id_bengkels` bigint(20) UNSIGNED NOT NULL,
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `jenis_servis` enum('perbaikan','servis rutin') NOT NULL,
  `plat_kendaraan` varchar(255) NOT NULL,
  `jenis_kendaraan` enum('mobil','motor') NOT NULL,
  `tanggal_servis` date NOT NULL,
  `jam_servis` time NOT NULL,
  `status_servis` enum('belum','sudah') NOT NULL DEFAULT 'belum',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `booking_servis`
--

INSERT INTO `booking_servis` (`id_servis`, `id_bengkels`, `id_users`, `jenis_servis`, `plat_kendaraan`, `jenis_kendaraan`, `tanggal_servis`, `jam_servis`, `status_servis`, `created_at`, `updated_at`) VALUES
(1, 2, 5, 'perbaikan', 'D 5467 TY', 'motor', '2025-02-12', '16:30:00', 'belum', '2025-02-09 09:27:47', '2025-02-09 09:27:47');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('Pemilik Bengkel','Pelanggan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'cecep', 'cecep@gmail.com', NULL, '$2y$10$7sqAgzC2zt5/BWjtbowv/.DPfuWhwpIkcdCdhk8b0R5QlnjHz6BoS', NULL, NULL, NULL, 'Pelanggan'),
(2, 'asep', 'asep@gmail.com', NULL, '$2y$10$QBTUxHu91imq1D3YRrPhLu/hOu/p1Xnttk/m.DN7HF.nE3wbauCsm', NULL, NULL, NULL, 'Pemilik Bengkel'),
(3, 'Astra Motor', 'astra@gmail.com', NULL, '$2y$10$thTDW/RSf.0He.RHXBqayuzL7VS3dGurPiKqdoV592mcXXnEzttYy', NULL, NULL, NULL, 'Pemilik Bengkel'),
(4, 'Nuri', 'nurihanang7@gmail.com', NULL, '$2y$10$Df3tnLGNJNSXCeXGFzoyp..jnWfWQFVK5qofdlt6I5wb.aI58ooAC', NULL, NULL, NULL, 'Pemilik Bengkel'),
(5, 'Noval', 'nopal123@gmail.com', NULL, '$2y$10$BtxzsVhSadSegKJpWguabO83aGoS/kk719kipS.Rea54UQrTQ4oDy', NULL, NULL, NULL, 'Pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id_barangs`),
  ADD KEY `barangs_id_bengkels_foreign` (`id_bengkels`);

--
-- Indeks untuk tabel `bengkels`
--
ALTER TABLE `bengkels`
  ADD PRIMARY KEY (`id_bengkels`),
  ADD KEY `bengkels_id_users_foreign` (`id_users`);

--
-- Indeks untuk tabel `booking_servis`
--
ALTER TABLE `booking_servis`
  ADD PRIMARY KEY (`id_servis`),
  ADD KEY `booking_servis_id_bengkels_foreign` (`id_bengkels`),
  ADD KEY `booking_servis_id_users_foreign` (`id_users`);

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
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id_barangs` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `bengkels`
--
ALTER TABLE `bengkels`
  MODIFY `id_bengkels` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `booking_servis`
--
ALTER TABLE `booking_servis`
  MODIFY `id_servis` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barangs`
--
ALTER TABLE `barangs`
  ADD CONSTRAINT `barangs_id_bengkels_foreign` FOREIGN KEY (`id_bengkels`) REFERENCES `bengkels` (`id_bengkels`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `bengkels`
--
ALTER TABLE `bengkels`
  ADD CONSTRAINT `bengkels_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `booking_servis`
--
ALTER TABLE `booking_servis`
  ADD CONSTRAINT `booking_servis_id_bengkels_foreign` FOREIGN KEY (`id_bengkels`) REFERENCES `bengkels` (`id_bengkels`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_servis_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id_users`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
