-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2023 at 11:37 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ict_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `property_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `person_in_charge` varchar(255) NOT NULL,
  `date_borrowed` date NOT NULL,
  `date_returned` date DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `name`, `position`, `contact_number`, `address`, `property_name`, `quantity`, `person_in_charge`, `date_borrowed`, `date_returned`, `status`, `created_at`, `updated_at`) VALUES
(2, 'James Brian Flores', 'QA-Head', '09061958437', 'Sogod Southern Leyte', 'LED TV - LG (40 inches)', 1, 'Rolly Acaso', '2023-08-17', '2023-08-18', 0, '2023-08-17 05:06:42', NULL),
(3, 'James Brian Flores', 'QA-Head', '09061958437', 'Sogod Southern Leyte', 'Office Table', 2, 'Rolly Acaso', '2023-08-15', '2023-08-17', 0, '2023-08-17 06:26:20', NULL);

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
-- Table structure for table `instructors`
--

CREATE TABLE `instructors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructors`
--

INSERT INTO `instructors` (`id`, `name`, `position`, `contact_number`, `address`, `created_at`, `updated_at`) VALUES
(4, 'CZARINA ANCELLA GABI', 'Assistant Professor II', '09661195690', 'Bontoc Southern Leyte', '2023-08-17 02:28:47', NULL),
(5, 'GILBERT SIEGA', 'Instructor I', '09661195690', 'Bontoc Southern Leyte', '2023-08-17 03:18:26', NULL),
(6, 'RENEE CLINT GORTIFACION', 'Instructor I', '09661195690', 'Bontoc Southern Leyte', '2023-08-17 09:40:20', NULL),
(7, 'RENE RADAZA', 'Instructor I', '09661195690', 'Sogod Southern Leyte', '2023-08-17 22:19:37', NULL),
(8, 'KEANO NIKKO SY', 'Instructor I', '09062958437', 'Bontoc Southen Leyte', '2023-08-18 05:40:41', NULL);

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `roomid` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `date_reported` varchar(255) DEFAULT NULL,
  `date_fixed` varchar(255) DEFAULT NULL,
  `admin_read` int(11) NOT NULL,
  `user_read` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `userid`, `roomid`, `description`, `status`, `date_reported`, `date_fixed`, `admin_read`, `user_read`, `created_at`, `updated_at`) VALUES
(7, 5, 11, 'LAN Cable of Computer is defective', 0, '2023-08-18 09:23', '2023-08-18 10:23', 0, 0, '2023-08-18 01:23:22', NULL),
(8, 7, 10, 'No Internet', 0, '2023-08-18 10:37', '2023-08-18 10:39', 0, 0, '2023-08-18 02:37:33', NULL),
(9, 7, 12, 'Computer Defect again', 0, '2023-08-18 11:24', '2023-08-18 11:24', 0, 0, '2023-08-18 03:18:32', NULL),
(10, 8, 8, 'Computer not working sir Rolz', 0, '2023-08-18 13:42', '2023-08-18 13:43', 0, 0, '2023-08-18 05:42:55', NULL),
(11, 4, 6, 'No Internet Connection', 0, '2023-08-18 16:37', '2023-08-18 16:43', 0, 0, '2023-08-18 08:37:40', NULL),
(12, 8, 7, 'Computer Defect', 0, '2023-08-18 16:45', '2023-08-18 16:45', 0, 0, '2023-08-18 08:44:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ICT-1', 1, '2023-08-17 03:38:11', NULL),
(2, 'ICT-2', 0, '2023-08-17 03:45:02', NULL),
(3, 'ICT-3', 1, '2023-08-17 03:46:40', NULL),
(4, 'ICT-4', 1, '2023-08-17 03:46:45', NULL),
(5, 'ICT-5', 1, '2023-08-17 03:46:49', NULL),
(6, 'ICT-6', 1, '2023-08-17 03:46:58', NULL),
(7, 'LAB-1', 1, '2023-08-17 03:47:03', NULL),
(8, 'LAB-2', 0, '2023-08-17 03:47:07', NULL),
(10, 'LAB-MAC', 1, '2023-08-17 03:47:22', NULL),
(11, 'LAB-GIS', 1, '2023-08-17 03:49:04', NULL),
(12, 'LAB-3', 0, '2023-08-17 04:19:06', NULL),
(13, 'CISCO Lab', 1, '2023-08-17 04:23:40', NULL),
(14, 'Deans Office', 1, '2023-08-17 04:24:21', NULL),
(15, 'Faculty Office', 1, '2023-08-17 04:24:28', NULL),
(16, 'ICT-7', 1, '2023-08-17 07:12:23', NULL),
(17, 'ICT-8', 1, '2023-08-18 09:20:47', NULL),
(19, 'Audio Visual Room', 1, '2023-08-18 09:21:40', NULL),
(20, 'LAB-4', 1, '2023-08-18 09:21:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` bigint(20) NOT NULL,
  `userid` int(11) NOT NULL,
  `roomid` int(11) NOT NULL,
  `date_from` varchar(255) NOT NULL,
  `date_to` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `userid`, `roomid`, `date_from`, `date_to`, `status`, `created_at`, `updated_at`) VALUES
(9, 5, 10, '2023-08-17 17:00', '2023-08-17 18:30', 0, '2023-08-17 09:11:51', NULL),
(11, 4, 5, '2023-08-17 17:30', '2023-08-17 19:00', 0, '2023-08-17 09:38:55', NULL),
(15, 5, 11, '2023-08-18 08:30', '2023-08-18 10:00', 0, '2023-08-17 22:10:41', NULL),
(16, 4, 13, '2023-08-18 07:00', '2023-08-18 08:00', 0, '2023-08-17 22:12:20', NULL),
(17, 7, 1, '2023-08-18 07:30', '2023-08-18 09:00', 0, '2023-08-17 22:27:54', NULL),
(18, 4, 2, '2023-08-18 09:00', '2023-08-18 10:00', 0, '2023-08-18 00:51:36', NULL),
(27, 4, 12, '2023-08-18 10:00', '2023-08-18 11:30', 0, '2023-08-18 02:57:32', NULL),
(31, 6, 10, '2023-08-18 10:00', '2023-08-18 11:30', 0, '2023-08-18 03:06:34', NULL),
(32, 5, 13, '2023-08-18 10:00', '2023-08-18 11:10', 0, '2023-08-18 03:07:12', NULL),
(33, 7, 5, '2023-08-18 11:30', '2023-08-18 13:00', 0, '2023-08-18 03:14:42', NULL),
(34, 6, 1, '2023-08-18 12:00', '2023-08-18 13:00', 0, '2023-08-18 04:01:11', NULL),
(35, 7, 1, '2023-08-18 13:00', '2023-08-18 14:00', 0, '2023-08-18 05:11:18', NULL),
(36, 6, 8, '2023-08-18 13:00', '2023-08-18 14:00', 0, '2023-08-18 05:21:38', NULL),
(37, 5, 2, '2023-08-18 13:00', '2023-08-18 14:00', 0, '2023-08-18 05:26:45', NULL),
(38, 4, 13, '2023-08-18 14:00', '2023-08-18 15:00', 0, '2023-08-18 05:31:53', NULL),
(39, 8, 3, '2023-08-18 14:00', '2023-08-18 15:00', 0, '2023-08-18 05:41:32', NULL),
(40, 4, 6, '2023-08-18 16:00', '2023-08-18 17:00', 0, '2023-08-18 07:56:03', NULL),
(41, 8, 8, '2023-08-18 17:00', '2023-08-18 18:30', 1, '2023-08-18 08:45:04', NULL),
(42, 6, 12, '2023-08-18 17:00', '2023-08-18 19:00', 1, '2023-08-18 09:08:53', NULL),
(43, 7, 2, '2023-08-18 17:30', '2023-08-18 18:30', 1, '2023-08-18 09:30:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `about_me` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userid`, `name`, `email`, `password`, `phone`, `location`, `about_me`, `remember_token`, `type`, `created_at`, `updated_at`) VALUES
(1, 0, 'ROLLY ACASO', 'rolly@admin.com', '$2y$10$QiNT.cFYUb/0IDHhF95L3Op1t/KJ0e38UKY6Mb9oVoCtJuPQsbzuW', 9061958437, 'Sogod Southern Leyte', 'ICT MS - Administrator', NULL, 1, '2023-08-15 23:14:54', '2023-08-18 01:36:01'),
(4, 4, 'CZARINA ANCELLA GABI', 'czarina@gmail.com', '$2y$10$C6StdRtMRruG2F.Oy0COKuLC1WT1lMoDPuUCLoSsHKyxQdfEePoLK', 9661195690, 'Bontoc Southern Leyte', NULL, NULL, 2, '2023-08-16 18:28:47', '2023-08-18 00:00:38'),
(5, 5, 'GILBERT SIEGA', 'gelo@gmail.com', '$2y$10$FPMblYOl8MCDSatlLU/sQusdQFLmtU4.vdjBIpehGVCKi7Jx65qqi', NULL, NULL, NULL, NULL, 2, '2023-08-16 19:18:26', '2023-08-18 01:06:01'),
(6, 6, 'RENEE CLINT GORTIFACION', 'renee@gmail.com', '$2y$10$h8g2AMqgb/5cHCpAGXPL3.HJpR.NM0DzcGThfPnsE80j6/E5LzY2y', 9661195690, 'Bontoc Southern Leyte', NULL, NULL, 2, '2023-08-17 01:40:21', '2023-08-18 01:25:45'),
(7, 7, 'RENE RADAZA', 'rene@gmail.com', '$2y$10$DnUNZHv.iOBCne7DqxJKOOlT3T9l/KBBuQWXUdX12dnTtI/a4PtrW', NULL, NULL, NULL, NULL, 2, '2023-08-17 14:19:37', '2023-08-17 21:48:05'),
(8, 8, 'KEANO NIKKO SY', 'keano@gmail.com', '$2y$10$Bviw.jHhGtyGxSHG9ozD.OUPWpkTl6qeOV8i6D3SuxfHO/e.Mgn8O', NULL, NULL, NULL, NULL, 2, '2023-08-17 21:40:42', '2023-08-17 21:41:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `instructors`
--
ALTER TABLE `instructors`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
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
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructors`
--
ALTER TABLE `instructors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
