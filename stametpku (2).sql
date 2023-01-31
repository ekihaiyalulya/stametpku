-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2022 at 04:31 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stametpku`
--

-- --------------------------------------------------------

--
-- Table structure for table `beritas`
--

CREATE TABLE `beritas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `isi` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `kahutlas`
--

CREATE TABLE `kahutlas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) NOT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kahutlas`
--

INSERT INTO `kahutlas` (`id`, `foto`, `detail`, `created_at`, `updated_at`) VALUES
(2, '32QC4aprYNL69FfnHBnLyKUEhKavTzHIdnqPGO0v.jpg', 's1QMPUhPFKe9djHs3Ehfy8rPxUgL2iUGjBjpWQUM.jpg', '2022-12-11 20:07:51', '2022-12-11 20:29:28');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(108, '2014_10_12_000000_create_users_table', 1),
(109, '2014_10_12_100000_create_password_resets_table', 1),
(110, '2019_08_19_000000_create_failed_jobs_table', 1),
(111, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(112, '2022_09_21_020429_create_beritas_table', 1),
(113, '2022_09_26_040104_create_pegawais_table', 1),
(114, '2022_09_29_021237_create_strukturs_table', 1),
(115, '2022_12_07_014545_create_kahutlas_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawais`
--

CREATE TABLE `pegawais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `ttl` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawais`
--

INSERT INTO `pegawais` (`id`, `nama`, `ttl`, `jabatan`, `foto`, `created_at`, `updated_at`) VALUES
(196605091990031001, 'Sarman Sembiring', 'Rumah Sumbul, 09 May 1966', 'PMG Penyelia', 'q4c3Vw1Qn7klz5n90J6SZ111QFBXzKmjGZNLhtcc.jpg', '2022-12-07 21:12:40', '2022-12-07 21:12:40'),
(196701171990031001, 'Rasidin', 'Tanjung Pura, 17 January 1967', 'PMG Penyelia', 'iT20U43J6TLCYSP3wWwZIeYClk91B5wvDhwdMhIe.jpg', '2022-12-07 21:11:35', '2022-12-07 21:11:35'),
(196905131991021001, 'Marzuki', 'Indragiri Hilir, 13 May 1969', 'PMG Muda - Koordinator Bidang Data & Informasi', 'Ln8SfU6JMJnnLvnEmYU0vgq9wSiJ2iAkfWxBZQT6.jpg', '2022-12-07 21:00:53', '2022-12-07 21:00:53'),
(197201041997032001, 'Warih Budi Lestari, S.Si', 'Pekanbaru, 04 January 1972', 'Kasubag Tata Usaha', 'xmj44NjcR7ZgaCwkbDhHINQcKCjkuYqckZcYRqu2.jpg', '2022-12-07 20:59:23', '2022-12-07 20:59:23'),
(197404101995031001, 'Ramlan, S.Si, M.Si', 'Medan, 10 April 1974', 'Kepala Stasiun', 'xc3IBmvJ3x7A83YjffcoYX2vcpy1MhWzZ4gKsd9X.jpg', '2022-12-07 20:58:14', '2022-12-07 20:58:14'),
(198204202008121001, 'Yotta Autika, S.Kom, M.Si', 'Pekanbaru, 20 April 1982', 'PMG Muda -Koordinator Bidang Observasi', 'suPvwwmhlfQyRvhzbPZ208xOboIJT9btEO63jnzk.jpg', '2022-12-07 21:01:12', '2022-12-07 21:01:12');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `strukturs`
--

CREATE TABLE `strukturs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) NOT NULL,
  `tanggal_update` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Eki', 'eki.admin@gmail.com', NULL, '$2y$10$LKTLD0poQuaJoDte9SiPq.37222FkLfULFp3LykpAT3dEKjZGM2G6', 1, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beritas`
--
ALTER TABLE `beritas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kahutlas`
--
ALTER TABLE `kahutlas`
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
-- Indexes for table `pegawais`
--
ALTER TABLE `pegawais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `strukturs`
--
ALTER TABLE `strukturs`
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
-- AUTO_INCREMENT for table `beritas`
--
ALTER TABLE `beritas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kahutlas`
--
ALTER TABLE `kahutlas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `pegawais`
--
ALTER TABLE `pegawais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198204202008121002;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `strukturs`
--
ALTER TABLE `strukturs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
