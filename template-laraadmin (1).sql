-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 30, 2018 at 04:26 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `template-laraadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `position` int(11) DEFAULT NULL,
  `menu_type` int(11) NOT NULL DEFAULT '1',
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `position`, `menu_type`, `icon`, `name`, `title`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, NULL, 0, NULL, 'User', 'User', NULL, NULL, NULL),
(2, NULL, 0, NULL, 'Role', 'Role', NULL, NULL, NULL),
(13, 0, 1, 'fa-list', 'Category', 'Category', NULL, '2018-07-07 18:53:24', '2018-07-07 18:53:24'),
(15, 0, 1, 'fa-calendar', 'Event', 'Event', NULL, '2018-07-07 18:58:48', '2018-07-07 18:58:48'),
(21, 0, 1, 'fa-database', 'Usermanual', 'Panduan Pengguna', NULL, '2018-07-22 04:50:08', '2018-07-22 04:50:08'),
(22, 0, 1, 'fa-database', 'Ustad', 'ustad', NULL, '2018-07-22 04:54:00', '2018-07-22 04:54:00'),
(23, 0, 1, 'fa-database', 'ThemeSetting', 'Theme Setting', NULL, '2018-07-23 03:58:45', '2018-07-23 03:58:45'),
(24, 0, 1, 'fa-database', 'Recording', 'Recording File', NULL, '2018-07-23 18:50:14', '2018-07-23 18:50:14'),
(25, 0, 1, 'fa-database', 'Coba', 'coba', NULL, '2018-07-28 23:58:18', '2018-07-28 23:58:18'),
(26, 0, 3, 'fa-file', 'Filemanager', 'File Manager', NULL, '2018-07-29 00:48:18', '2018-07-29 00:48:18');

-- --------------------------------------------------------

--
-- Table structure for table `menu_role`
--

CREATE TABLE `menu_role` (
  `menu_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_role`
--

INSERT INTO `menu_role` (`menu_id`, `role_id`) VALUES
(13, 1),
(13, 2),
(15, 1),
(15, 2),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(24, 1),
(24, 2),
(25, 1),
(26, 1);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2015_10_10_000000_create_menus_table', 1),
(4, '2015_10_10_000000_create_roles_table', 1),
(5, '2015_10_10_000000_update_users_table', 1),
(6, '2015_12_11_000000_create_users_logs_table', 1),
(7, '2016_03_14_000000_update_menus_table', 1),
(25, '2018_07_22_014653_create_category_table', 2),
(26, '2018_07_22_020655_create_event_table', 2),
(27, '2018_07_22_115008_create_usermanual_table', 3),
(29, '2018_07_23_105845_create_theme_setting_table', 5),
(31, '2018_07_22_115400_create_ustad_table', 7),
(32, '2018_07_24_015014_create_recording_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recording`
--

CREATE TABLE `recording` (
  `id` int(10) UNSIGNED NOT NULL,
  `ustad_id` int(10) UNSIGNED DEFAULT NULL,
  `id_recording` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `record` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', '2018-07-07 10:28:02', '2018-07-07 10:28:02'),
(2, 'User', '2018-07-07 10:28:02', '2018-07-07 10:28:02');

-- --------------------------------------------------------

--
-- Table structure for table `themesetting`
--

CREATE TABLE `themesetting` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `navbarbg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `headerbg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menucaption` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bgpattern` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activeitemtheme` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `frametype` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `layout_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `layout_width` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_effect_desktop` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_effect_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_icon_style` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `DropDownIconStyle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FixedNavbarPosition` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `FixedHeaderPosition` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `VerticalSubMenuItemIconStyle` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `defaultVerticalMenu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `onToggleVerticalMenu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usermanual`
--

CREATE TABLE `usermanual` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_panduan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `image`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'administrator', 'admin@demo.com', '', '$2y$10$yDRzhdUl6bqK2SIAdXj0Q.g.KqZwrhCPNzown.AgNrfdmXUmRwS4.', 'eM90bAFNO9PY2Rbzegw2fj8wa4zOFUZoqJcy5AAik3j6BAvXHyi7nJWNVlp9', '2018-07-07 10:28:24', '2018-07-07 10:28:24'),
(2, 2, 'user', 'user@demo.com', '', '$2y$10$wRv1C6bZHDBRvGd1YQ5hjuxToiBeU1ZAxR7xOEcm.nJafBmqkR/VC', 'a672PVXnxTt02oCpXu0VXwrXpsdTsK5xrQlcqi9SeQo9Sch1zbNuMf3SdSAV', '2018-07-07 10:51:03', '2018-07-07 10:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `users_logs`
--

CREATE TABLE `users_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action_model` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `action_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_logs`
--

INSERT INTO `users_logs` (`id`, `user_id`, `action`, `action_model`, `action_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'created', 'event', 1, '2018-07-07 10:36:01', '2018-07-07 10:36:01'),
(2, 1, 'created', 'users', 2, '2018-07-07 10:51:03', '2018-07-07 10:51:03'),
(3, 1, 'updated', 'users', 1, '2018-07-07 10:57:00', '2018-07-07 10:57:00'),
(4, 2, 'updated', 'users', 2, '2018-07-07 18:03:35', '2018-07-07 18:03:35'),
(5, 1, 'created', 'category', 1, '2018-07-07 18:53:47', '2018-07-07 18:53:47'),
(6, 1, 'updated', 'users', 1, '2018-07-07 18:56:04', '2018-07-07 18:56:04'),
(7, 1, 'created', 'ustad', 1, '2018-07-07 18:56:38', '2018-07-07 18:56:38'),
(8, 1, 'created', 'event', 1, '2018-07-07 18:59:30', '2018-07-07 18:59:30'),
(9, 1, 'created', 'category', 1, '2018-07-21 20:53:07', '2018-07-21 20:53:07'),
(10, 1, 'updated', 'users', 1, '2018-07-22 17:05:11', '2018-07-22 17:05:11'),
(11, 1, 'created', 'users', 3, '2018-07-22 20:19:18', '2018-07-22 20:19:18'),
(12, 1, 'deleted', 'users', 3, '2018-07-23 03:02:59', '2018-07-23 03:02:59'),
(13, 1, 'updated', 'users', 1, '2018-07-29 00:15:19', '2018-07-29 00:15:19');

-- --------------------------------------------------------

--
-- Table structure for table `ustad`
--

CREATE TABLE `ustad` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_ustad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ustad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `password_ustad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_category_id_foreign` (`category_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_role`
--
ALTER TABLE `menu_role`
  ADD UNIQUE KEY `menu_role_menu_id_role_id_unique` (`menu_id`,`role_id`),
  ADD KEY `menu_role_menu_id_index` (`menu_id`),
  ADD KEY `menu_role_role_id_index` (`role_id`);

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
-- Indexes for table `recording`
--
ALTER TABLE `recording`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recording_ustad_id_foreign` (`ustad_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `themesetting`
--
ALTER TABLE `themesetting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usermanual`
--
ALTER TABLE `usermanual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_logs`
--
ALTER TABLE `users_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ustad`
--
ALTER TABLE `ustad`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ustad_category_id_foreign` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `recording`
--
ALTER TABLE `recording`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `themesetting`
--
ALTER TABLE `themesetting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usermanual`
--
ALTER TABLE `usermanual`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_logs`
--
ALTER TABLE `users_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ustad`
--
ALTER TABLE `ustad`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `menu_role`
--
ALTER TABLE `menu_role`
  ADD CONSTRAINT `menu_role_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `menu_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `recording`
--
ALTER TABLE `recording`
  ADD CONSTRAINT `recording_ustad_id_foreign` FOREIGN KEY (`ustad_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `ustad`
--
ALTER TABLE `ustad`
  ADD CONSTRAINT `ustad_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
