-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jan 14, 2024 at 02:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umpwr_softskill`
--

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
-- Table structure for table `fasilitators`
--

CREATE TABLE `fasilitators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `NIDN` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fasilitators`
--

INSERT INTO `fasilitators` (`id`, `NIDN`, `nama`, `prodi`, `created_at`, `updated_at`) VALUES
(51, 123456789, 'Dr. Gagad, M.Si', 'Pendidikan Ekonomi', '2024-01-02 08:30:27', '2024-01-02 08:41:47'),
(52, 234567891, 'Tika, M.Si', 'Manajemen', '2024-01-02 08:30:57', '2024-01-02 08:41:58'),
(53, 456789011, 'Dr. Yusuf Kurnianto, S.Kom., M.T.', 'Teknologi informatika', '2024-01-02 08:32:24', '2024-01-02 08:40:49'),
(54, 567890123, 'Dr. Meita Pangesti, S.Si., M.Kom.', 'Ilmu Komputer', '2024-01-02 08:32:55', '2024-01-02 08:41:11'),
(55, 456789014, 'Prof. Dr. Tri Puji Lestari, M.Ag.', 'Ilmu Agama Islam', '2024-01-02 08:33:37', '2024-01-02 08:41:28'),
(56, 122222, 'Arif mulyo', 'Manajemen', '2024-01-02 08:34:13', '2024-01-13 01:05:52'),
(57, 890123459, 'Prof. Dr. Damar, M.Psi.', 'Psikologi', '2024-01-02 08:35:12', '2024-01-02 08:42:42');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_12_25_060301_create_roles_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilai_peserta`
--

CREATE TABLE `nilai_peserta` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nim` varchar(255) NOT NULL,
  `nama_peserta` varchar(255) NOT NULL,
  `nama_fasilitator` varchar(255) NOT NULL,
  `nilai_akhir` double(8,2) NOT NULL,
  `presensi` int(11) NOT NULL,
  `total_nilai` double(8,2) NOT NULL,
  `tahun` year(4) NOT NULL,
  `level` char(1) NOT NULL,
  `konversi_nilai` char(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai_peserta`
--

INSERT INTO `nilai_peserta` (`id`, `nim`, `nama_peserta`, `nama_fasilitator`, `nilai_akhir`, `presensi`, `total_nilai`, `tahun`, `level`, `konversi_nilai`, `created_at`, `updated_at`) VALUES
(12, '432', 'yuni', 'artisan', 30.00, 40, 35.00, '2022', 'A', 'D', '2024-01-01 11:45:19', '2024-01-01 19:54:29'),
(14, '2323', 'yuli', 'damar', 80.00, 99, 99.00, '2022', 'A', 'A', '2024-01-13 01:37:16', '2024-01-13 01:37:16'),
(15, '2323', 'Lanang Damarjati', 'Damar', 99.00, 75, 99.00, '2022', 'A', 'A', '2024-01-13 01:41:07', '2024-01-13 01:41:07'),
(16, '212520012', 'Lanang Damarjati', 'Yuli', 80.00, 80, 80.00, '2023', 'C', 'B', '2024-01-13 01:45:37', '2024-01-13 01:45:37'),
(17, '321', 'panggah', 'Damar', 50.00, 30, 60.00, '2022', 'A', 'C', '2024-01-13 02:05:04', '2024-01-13 02:05:05');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id` int(11) NOT NULL,
  `nim` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `prodi` varchar(255) NOT NULL,
  `level` enum('Level 1','Level 2') NOT NULL,
  `tahun` enum('2021','2022','2023') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id`, `nim`, `nama_lengkap`, `prodi`, `level`, `tahun`) VALUES
(2004, 21252009, 'Meita Pangesti', 'Teknologi Informasi', 'Level 1', '2021'),
(2021, 1234, 'Tri Puji Lestari', 'Teknologi Informasi', 'Level 2', '2021'),
(2022, 11101, 'Indah Dwi', 'Teknologi Informasi', 'Level 1', '2021'),
(2024, 11167, 'Eka desi nur', 'Manajemen', 'Level 1', '2023'),
(2029, 2323, 'adinda', 'Teknologi Informasi', 'Level 1', '2021'),
(2030, 23239, 'putri amelia', 'Teknologi Informasi', 'Level 2', '2022');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'fasilitator', '2023-12-24 23:10:25', '2023-12-24 23:10:25'),
(2, 'peserta', '2023-12-24 23:10:25', '2023-12-24 23:10:25'),
(3, 'superadmin', '2023-12-24 23:10:25', '2023-12-24 23:10:25');

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
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'peserta', 'peserta.softskill.umpwr@gmail.com', '2023-12-24 23:10:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, 'Xws6EDbOdsShOZvQSoTRkCEqUNSAr1Apcd3wBydfWf0OX5b21EMzq5vTALa7', '2023-12-24 23:10:25', '2023-12-24 23:10:25'),
(2, 'superadmin', 'superadmin.softskill.umpwr@gmail.com', '2023-12-24 23:10:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 3, 'KP095UeNTcGSYYtN2Tej20NstBER41nRu6ZpILlP2lMYke1cgJ0B19Hxokub', '2023-12-24 23:10:25', '2023-12-24 23:10:25'),
(4, 'fasilitator', 'fasilitator.softskill.umpwr@gmail.com', '2023-12-24 23:10:25', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, '1dLi25L3vw8CYr2uU8dQiNbMZcq23r4WqAN7G8RDHPv3iPtGmwBATo63AGCO', '2023-12-24 23:10:25', '2023-12-24 23:10:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fasilitators`
--
ALTER TABLE `fasilitators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai_peserta`
--
ALTER TABLE `nilai_peserta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD UNIQUE KEY `peserta_id_unique` (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_role_name_unique` (`role_name`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fasilitators`
--
ALTER TABLE `fasilitators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `nilai_peserta`
--
ALTER TABLE `nilai_peserta`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2031;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
