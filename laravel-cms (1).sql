-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2022 at 10:20 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel-cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `note_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `note_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Libero et dicta dolor vitae et rerum tempora. Et voluptatem molestiae quo similique et sit sed. Repudiandae quia fugit sit quam cumque.', 1, 1, '2022-06-16 13:39:59', '2022-06-16 13:39:59'),
(2, 'jk', 5, 1, '2022-06-16 13:41:09', '2022-06-16 13:41:09'),
(3, 'gj', 1, 3, '2022-06-16 13:42:22', '2022-06-16 13:42:22'),
(4, 'hjh', 1, 3, '2022-06-16 13:46:07', '2022-06-16 13:46:07');

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
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `layer` int(11) DEFAULT NULL COMMENT '1=main folder , 2 = sub folder',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `main_folder_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`id`, `name`, `layer`, `user_id`, `main_folder_id`, `created_at`, `updated_at`) VALUES
(1, 'Category 1', 1, 1, 0, '2022-06-16 13:39:59', '2022-06-16 13:39:59'),
(2, 'Category 2', 1, 1, 0, '2022-06-16 13:39:59', '2022-06-16 13:39:59'),
(3, 'Category 3', 1, 1, 0, '2022-06-16 13:39:59', '2022-06-16 13:39:59'),
(4, 'Sub Category 1', 2, 1, 1, '2022-06-16 13:39:59', '2022-06-16 13:39:59'),
(5, 'new', 1, 2, NULL, '2022-06-16 13:40:21', '2022-06-16 13:40:21'),
(6, 'fgf', 2, 2, 5, '2022-06-16 13:40:28', '2022-06-16 13:40:28');

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
(41, '2014_10_12_000000_create_users_table', 1),
(42, '2014_10_12_100000_create_password_resets_table', 1),
(43, '2019_08_19_000000_create_failed_jobs_table', 1),
(44, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(45, '2022_06_03_133013_create_notes_table', 1),
(46, '2022_06_03_135701_create_folders_table', 1),
(47, '2022_06_13_133926_create_comments_table', 1),
(48, '2022_06_15_120924_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `folder_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `note`, `title`, `folder_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '<p><br></p>', 'Alice, a.', 4, 1, '2022-06-16 13:39:59', '2022-06-18 23:06:51'),
(2, 'Quidem doloremque qui omnis earum commodi expedita. Modi eos libero unde nulla. Quas dignissimos debitis iste labore ipsum magnam. Maiores omnis amet cumque necessitatibus. Libero doloribus est vero ea sed placeat laboriosam. Eveniet id et consectetur velit. Veniam quia tenetur omnis suscipit minima quis iure. Consequatur blanditiis minima quis veniam explicabo.', 'They all.', 4, 1, '2022-06-16 13:39:59', '2022-06-16 13:39:59'),
(3, 'Tenetur molestiae qui laudantium voluptas vitae. Est repellat officiis at doloremque. Dolor est in est. Fuga doloribus incidunt error est vero. Vero sed nihil sed amet culpa fuga.', 'WOULD go.', 4, 1, '2022-06-16 13:39:59', '2022-06-16 13:39:59'),
(4, 'Vel delectus ea quod tempora enim. Nulla ratione soluta tempore id consequatur accusamus placeat. Voluptas dolore nesciunt placeat et. Incidunt eos voluptatum sunt saepe quidem fugit esse.', 'Even the.', 1, 1, '2022-06-16 13:39:59', '2022-06-16 13:39:59');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('2bf03f0d-a297-4876-85d0-5bf4995be90e', 'App\\Notifications\\CommentNotification', 'App\\Models\\User', 2, '{\"comment\":\"jk\",\"note_id\":\"5\",\"message\":[\"Admin  Commented on your note\"],\"note_name\":\"fgf fhfg\"}', '2022-06-16 13:41:14', '2022-06-16 13:41:09', '2022-06-16 13:41:14'),
('9b24c7ae-9d15-4650-8ee9-cf7a4698a1bb', 'App\\Notifications\\CommentNotification', 'App\\Models\\User', 1, '{\"comment\":\"hjh\",\"note_id\":\"1\",\"message\":[\"Sub User  Commented on your note\"],\"note_name\":\"Alice, a.\"}', '2022-06-16 13:46:17', '2022-06-16 13:46:07', '2022-06-16 13:46:17'),
('d712f52f-6da7-4c16-8324-347b0fe4c943', 'App\\Notifications\\CommentNotification', 'App\\Models\\User', 1, '{\"comment\":\"gj\",\"note_id\":\"1\",\"message\":[\"Sub User  Commented on your note\"],\"note_name\":\"Alice, a.\"}', '2022-06-18 22:11:34', '2022-06-16 13:42:22', '2022-06-18 22:11:34');

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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role` tinyint(1) DEFAULT NULL COMMENT '1=admin,2-main,3-sub',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@example.com', NULL, 1, '$2y$10$EkfXen9Oje1HSyROpb/ncelL4pP8cBgovVBDTZBDL0BnuSG5r2dsS', NULL, '2022-06-16 13:39:59', '2022-06-16 13:39:59'),
(2, 'Main User', 'main_user@example.com', NULL, 2, '$2y$10$oCYHv6ndMVeTUfTNmzR3yOSEAul5/Iph.jLhnRv8crd6nXXmQXRCe', NULL, '2022-06-16 13:39:59', '2022-06-16 13:39:59'),
(3, 'Sub User', 'sub_user@example.com', NULL, 3, '$2y$10$puwaH5ZP9JVXT4ZTWFVA4ufW2Bu/DZNaDdjmMqC58bZVhYLE4er4O', NULL, '2022-06-16 13:39:59', '2022-06-16 13:39:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `folders_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `folders`
--
ALTER TABLE `folders`
  ADD CONSTRAINT `folders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
