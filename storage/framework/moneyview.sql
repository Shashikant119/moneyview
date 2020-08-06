-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2020 at 08:20 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moneyview`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `mobile`, `email`, `address`, `email_verified_at`, `password`, `user_type`, `remember_token`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `status`) VALUES
(1, 'Super Admin', 'admin', '9451018768', 'skv1220@gmail.com', 'Utter Pradesh', NULL, '$2y$10$t1X9KoFwebqY6fjxn36W6OVEQMuq93u75qmwi..Utshx5LgJg3LD2', 'Super Admin', 'RtnDyna2ZXSYfY0Rdhz7uEp8ETZUDzE2vmZDJqBIqUDy3kF3qt3apUktsKaA', '2020-06-09 00:24:33', NULL, '2020-07-12 09:57:18', '11', '2020-07-09 09:51:10', NULL, 'active'),
(2, 'Admin', 'admin', '9451018768', 'admin@gmail.com', 'Lucknow', NULL, '$2y$10$t1X9KoFwebqY6fjxn36W6OVEQMuq93u75qmwi..Utshx5LgJg3LD2', 'Admin', NULL, '2020-07-10 17:36:46', NULL, '2020-07-10 17:38:45', NULL, '2020-07-10 17:38:45', NULL, 'active'),
(3, 'Partner', 'partner', '9451018768', 'partner@gmail.com', 'Lucknow', NULL, '$2y$10$1334qfHKJ.99IY0aNT9n7.enV0BdgmTMSm79//kCnw7bHxmsDAj5a', 'admin', NULL, '2020-07-12 09:52:47', NULL, '2020-07-12 09:52:47', NULL, '2020-07-12 15:22:47', NULL, NULL),
(4, 'Employee', 'employee', '9451018768', 'employee@gmail.com', 'Utter Pradesh', NULL, '$2y$10$BYL/GgkjGgEiF7gLe4RasuFf.JMSw2nljFz4PQ2Z.LJ9Qd4kD7Ypm', 'admin', NULL, '2020-07-12 09:54:21', NULL, '2020-07-12 09:54:21', NULL, '2020-07-12 15:24:21', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_access`
--

CREATE TABLE `user_access` (
  `id` int(11) NOT NULL,
  `user_type` int(10) NOT NULL DEFAULT 0,
  `access_type` int(10) NOT NULL DEFAULT 0,
  `fn_add` varchar(1) DEFAULT 'Y',
  `fn_view` varchar(1) NOT NULL DEFAULT 'Y',
  `fn_delete` varchar(1) NOT NULL DEFAULT 'N',
  `fn_update` varchar(1) NOT NULL DEFAULT 'Y',
  `fn_excel` varchar(1) NOT NULL DEFAULT 'N',
  `fn_print` varchar(1) NOT NULL DEFAULT 'N',
  `fn_android` varchar(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access`
--

INSERT INTO `user_access` (`id`, `user_type`, `access_type`, `fn_add`, `fn_view`, `fn_delete`, `fn_update`, `fn_excel`, `fn_print`, `fn_android`) VALUES
(1, 1, 1, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'N'),
(2, 1, 2, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'N'),
(3, 1, 3, 'Y', 'N', 'Y', 'Y', 'Y', 'Y', 'N'),
(4, 2, 1, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'N'),
(5, 2, 2, 'N', 'Y', 'N', 'Y', 'N', 'N', 'N'),
(6, 2, 3, 'N', 'N', 'N', 'N', 'N', 'N', 'N'),
(7, 1, 4, 'Y', 'Y', 'Y', 'Y', 'Y', 'Y', 'N'),
(8, 2, 4, 'Y', 'Y', 'N', 'N', 'N', 'N', 'N'),
(9, 1, 5, 'Y', 'Y', 'N', 'Y', 'Y', 'Y', 'N'),
(10, 1, 6, 'Y', 'Y', 'N', 'Y', 'N', 'N', 'N'),
(11, 1, 7, 'Y', 'N', 'N', 'N', 'N', 'N', 'N'),
(12, 1, 8, 'Y', 'N', 'N', 'Y', 'N', 'N', 'N'),
(13, 1, 9, 'Y', 'N', 'N', 'Y', 'N', 'N', 'N'),
(14, 1, 10, 'Y', 'N', 'N', 'Y', 'N', 'N', 'N'),
(15, 1, 11, 'Y', 'N', 'N', 'Y', 'N', 'N', 'N'),
(16, 1, 12, 'Y', 'N', 'N', 'Y', 'N', 'N', 'N'),
(17, 1, 13, 'Y', 'Y', 'N', 'Y', 'N', 'N', 'N'),
(18, 2, 5, 'Y', 'Y', 'N', 'N', 'Y', 'Y', 'N'),
(19, 2, 6, 'Y', 'Y', 'N', 'Y', 'N', 'N', 'N'),
(20, 2, 7, 'Y', 'Y', 'N', 'Y', 'N', 'N', 'N'),
(21, 2, 8, 'Y', 'Y', 'N', 'Y', 'N', 'N', 'N'),
(22, 2, 9, 'Y', 'Y', 'N', 'Y', 'N', 'N', 'N'),
(23, 2, 10, 'Y', 'Y', 'N', 'Y', 'N', 'N', 'N'),
(24, 2, 11, 'Y', 'Y', 'N', 'Y', 'N', 'N', 'N'),
(25, 2, 12, 'Y', 'Y', 'N', 'Y', 'N', 'N', 'N'),
(26, 2, 13, 'Y', 'Y', 'N', 'Y', 'N', 'N', 'N'),
(27, 10, 2, 'N', 'Y', 'N', 'Y', 'N', 'N', 'N'),
(28, 10, 3, 'N', 'N', 'N', 'Y', 'N', 'N', 'N'),
(29, 10, 4, 'N', 'Y', 'N', 'Y', 'N', 'N', 'N'),
(30, 10, 5, 'Y', 'Y', 'N', 'Y', 'N', 'N', 'N'),
(31, 11, 2, 'N', 'Y', 'N', 'N', 'N', 'N', 'N'),
(32, 11, 3, 'Y', 'N', 'N', 'Y', 'Y', 'N', 'N'),
(33, 11, 4, 'Y', 'N', 'N', 'Y', 'N', 'N', 'N'),
(34, 11, 5, 'Y', 'Y', 'N', 'Y', 'N', 'N', 'N'),
(35, 4, 2, 'N', 'N', 'N', 'N', 'N', 'N', 'N'),
(36, 4, 3, 'N', 'N', 'N', 'Y', 'N', 'N', 'N'),
(37, 4, 4, 'N', 'N', 'N', 'Y', 'N', 'N', 'N'),
(38, 4, 5, 'N', 'N', 'N', 'Y', 'N', 'N', 'N'),
(39, 3, 2, 'N', 'N', 'N', 'N', 'N', 'N', 'N'),
(40, 3, 3, 'N', 'N', 'N', 'N', 'N', 'N', 'N'),
(41, 3, 4, 'N', 'N', 'N', 'N', 'N', 'N', 'N'),
(42, 3, 5, 'N', 'N', 'N', 'N', 'N', 'N', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `user_access_type`
--

CREATE TABLE `user_access_type` (
  `id` int(11) NOT NULL,
  `menu_name` varchar(100) DEFAULT NULL,
  `menu_type` enum('Main','Sub') DEFAULT NULL,
  `sub_menu` varchar(1000) DEFAULT '__blank',
  `icon` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fa fa-home',
  `url_name` varchar(100) DEFAULT NULL,
  `priority` int(10) DEFAULT NULL,
  `main_type` enum('User','Admin') DEFAULT NULL,
  `target` varchar(225) NOT NULL DEFAULT '_SELF'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_type`
--

INSERT INTO `user_access_type` (`id`, `menu_name`, `menu_type`, `sub_menu`, `icon`, `url_name`, `priority`, `main_type`, `target`) VALUES
(2, 'Users', 'Main', '', 'fa fa-users', 'Users', 1003, 'User', '_SELF'),
(3, 'Register', 'Main', '', 'fa fa-user', 'Register', 1002, 'User', '_SELF'),
(4, 'Role Management', 'Main', '', 'fa fa-user', 'Control-Panel', 1001, 'User', '_SELF'),
(5, 'Web User', 'Main', '', 'fa fa-user', 'Web-Users', 2001, 'User', '_SELF');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_type`
--
ALTER TABLE `user_access_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_access`
--
ALTER TABLE `user_access`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `user_access_type`
--
ALTER TABLE `user_access_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
