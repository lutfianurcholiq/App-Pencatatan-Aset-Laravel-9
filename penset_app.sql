-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2022 at 06:15 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penset_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `asets`
--

CREATE TABLE `asets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sekolah_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_aset` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_aset` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_beli` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_aset` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `asets`
--

INSERT INTO `asets` (`id`, `sekolah_id`, `jenis_aset`, `nama_aset`, `tahun`, `harga_beli`, `foto_aset`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'aset tetap', 'GEDUNG AULA', '2020', '120000000', 'testing', 'belum disusutkan', '2022-10-13 21:12:55', '2022-10-13 21:12:55'),
(2, 2, 'aset tetap', 'GEDUNG BASKET', '2020', '120000000', 'testing', 'belum disusutkan', '2022-10-13 21:12:55', '2022-10-13 21:12:55'),
(3, 3, 'aset tetap', 'LAPANGAN TENIS', '2020', '120000000', 'testing', 'belum disusutkan', '2022-10-13 21:12:55', '2022-10-13 21:12:55'),
(4, 1, 'aset tetap', 'GEDUNG LAB KOMPUTER', '2020', '190000000', 'testing', 'belum disusutkan', '2022-10-13 21:12:55', '2022-10-13 21:12:55'),
(5, 2, 'aset tetap', 'LAPANGAN', '2010', '180000000', 'testing', 'belum disusutkan', '2022-10-13 21:12:55', '2022-10-13 21:12:55'),
(6, 1, 'aset tetap', 'GEDUNG 20 LANTAI', '2008', '150000000', 'testing', 'belum disusutkan', '2022-10-13 21:12:55', '2022-10-13 21:12:55'),
(7, 3, 'aset tetap', 'GEDUNG DIATAS LANGIT', '2020', '110000000', 'testing', 'belum disusutkan', '2022-10-13 21:12:55', '2022-10-13 21:12:55');

-- --------------------------------------------------------

--
-- Table structure for table `aset_penyusutan`
--

CREATE TABLE `aset_penyusutan` (
  `penyusutan_id` bigint(20) UNSIGNED NOT NULL,
  `aset_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coas`
--

CREATE TABLE `coas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_coa` int(11) NOT NULL,
  `nama_coa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_coa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saldo_awal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coas`
--

INSERT INTO `coas` (`id`, `no_coa`, `nama_coa`, `jenis_coa`, `saldo_awal`, `created_at`, `updated_at`) VALUES
(1, 114, 'Akumulasi Penyusutan Gedung', '1', '0', '2022-10-13 21:12:56', '2022-10-13 21:12:56'),
(2, 601, 'Beban Akumulasi Penyusutan Gedung', '5', '0', '2022-10-13 21:12:57', '2022-10-13 21:12:57');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jurnals`
--

CREATE TABLE `jurnals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coa_id` bigint(20) UNSIGNED NOT NULL,
  `penyusutan_id` bigint(20) UNSIGNED NOT NULL,
  `tgl_jurnal` date NOT NULL,
  `posisi_dr_cr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kecamatans`
--

CREATE TABLE `kecamatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kota_id` bigint(20) UNSIGNED NOT NULL,
  `nama_kecamatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kecamatans`
--

INSERT INTO `kecamatans` (`id`, `kota_id`, `nama_kecamatan`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kec.Babakan', '2022-10-13 21:12:53', '2022-10-13 21:12:53'),
(2, 1, 'Kec.DayeuhKolot', '2022-10-13 21:12:53', '2022-10-13 21:12:53'),
(3, 1, 'Kec.Antapani', '2022-10-13 21:12:53', '2022-10-13 21:12:53'),
(4, 1, 'Kec.Kopo', '2022-10-13 21:12:53', '2022-10-13 21:12:53');

-- --------------------------------------------------------

--
-- Table structure for table `kotas`
--

CREATE TABLE `kotas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kotas`
--

INSERT INTO `kotas` (`id`, `nama_kota`, `created_at`, `updated_at`) VALUES
(1, 'Bandung', '2022-10-13 21:12:53', '2022-10-13 21:12:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_07_27_072230_create_asets_table', 1),
(6, '2022_07_29_122844_create_kotas_table', 1),
(7, '2022_07_29_122919_create_kecamatans_table', 1),
(8, '2022_08_16_001207_create_sekolahs_table', 1),
(9, '2022_08_22_140658_create_penyusutans_table', 1),
(10, '2022_08_23_145146_create_coas_table', 1),
(11, '2022_08_26_035142_aset_penyusutan', 1),
(12, '2022_09_15_114412_create_jurnals_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penyusutans`
--

CREATE TABLE `penyusutans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sekolah_id` bigint(20) UNSIGNED NOT NULL,
  `masa_manfaat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_penyusutan_per_tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_penyusutan_per_bulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estimasi_nilai_sisa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `akumulasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_sisa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `sekolahs`
--

CREATE TABLE `sekolahs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kota_id` bigint(20) UNSIGNED NOT NULL,
  `kecamatan_id` bigint(20) UNSIGNED NOT NULL,
  `nama_sekolah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_siswa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sekolahs`
--

INSERT INTO `sekolahs` (`id`, `kota_id`, `kecamatan_id`, `nama_sekolah`, `kategori`, `tahun`, `jumlah_siswa`, `alamat`, `lokasi`, `foto`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'SMA 1 Bojongsoang', 'Swasta', '2012', '1000', 'Dayeuhkolot', '-6.968589262292169,107.63414962442548', 'testing', 'testing', '2022-10-13 21:12:54', '2022-10-13 21:12:54'),
(2, 1, 2, 'SMA 2 Bojongsoang', 'Swasta', '2000', '1000', 'Dayeuhkolot', '-6.968589262292169,107.63414962442548', 'testing', 'testing', '2022-10-13 21:12:54', '2022-10-13 21:12:54'),
(3, 1, 2, 'SMA 3 Bojongsoang', 'Swasta', '1990', '1000', 'Dayeuhkolot', '-6.972132064698354,107.64026751396528', 'testing', 'testing', '2022-10-13 21:12:54', '2022-10-13 21:12:54'),
(4, 1, 2, 'SMA 4 Bojongsoang', 'Swasta', '1990', '200', 'Dayeuhkolot', '-6.972132064698354,107.64026751396528', 'testing', 'testing', '2022-10-13 21:12:54', '2022-10-13 21:12:54'),
(5, 1, 2, 'SMA 5 Bojongsoang', 'Swasta', '1990', '150', 'Dayeuhkolot', '-6.972132064698354,107.64026751396528', 'testing', 'testing', '2022-10-13 21:12:54', '2022-10-13 21:12:54'),
(6, 1, 1, 'SMA 6 Bojongsoang', 'Swasta', '2000', '250', 'Dayeuhkolot', '-6.972132064698354,107.64026751396528', 'testing', 'testing', '2022-10-13 21:12:54', '2022-10-13 21:12:54'),
(7, 1, 1, 'SMA 7 Bojongsoang', 'Swasta', '2001', '1500', 'Dayeuhkolot', '-6.972132064698354,107.64026751396528', 'testing', 'testing', '2022-10-13 21:12:54', '2022-10-13 21:12:54'),
(8, 1, 3, 'SMA 8 Bojongsoang', 'Swasta', '2005', '900', 'Dayeuhkolot', '-6.972132064698354,107.64026751396528', 'testing', 'testing', '2022-10-13 21:12:54', '2022-10-13 21:12:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `is_active`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Fitriani Adela', 'fitri@gmail.com', 'admin', 'aktif', '$2y$10$DhYE0tCPuDXyO.5SMXX6s..lDBNMg1JRKKmMmASURrZGLe4Judrjq', '2022-10-13 21:12:52', '2022-10-13 21:12:52'),
(2, 'Lutfian', 'upil@gmail.com', 'staff', 'nonaktif', '$2y$10$lYIgV3ijFTF5/S90pQ2qiO904Y73mFblNIyueL0InPEdne7Cob0F.', '2022-10-13 21:12:52', '2022-10-13 21:12:52'),
(3, 'udilan', 'udilan@gmail.com', 'manager', 'aktif', '$2y$10$SBTlfTZMq0Y2ZQJRLbGLXuF1DFrOmc0q72U/WNNgKShWnL04YcDKm', '2022-10-13 21:12:52', '2022-10-13 21:12:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asets`
--
ALTER TABLE `asets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aset_penyusutan`
--
ALTER TABLE `aset_penyusutan`
  ADD PRIMARY KEY (`penyusutan_id`,`aset_id`);

--
-- Indexes for table `coas`
--
ALTER TABLE `coas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jurnals`
--
ALTER TABLE `jurnals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kecamatans`
--
ALTER TABLE `kecamatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kotas`
--
ALTER TABLE `kotas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `penyusutans`
--
ALTER TABLE `penyusutans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sekolahs`
--
ALTER TABLE `sekolahs`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `asets`
--
ALTER TABLE `asets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coas`
--
ALTER TABLE `coas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurnals`
--
ALTER TABLE `jurnals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kecamatans`
--
ALTER TABLE `kecamatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kotas`
--
ALTER TABLE `kotas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penyusutans`
--
ALTER TABLE `penyusutans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sekolahs`
--
ALTER TABLE `sekolahs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
