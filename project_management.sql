-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 21, 2023 at 12:52 PM
-- Server version: 8.0.32-0ubuntu0.20.04.2
-- PHP Version: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `assign_user_to_projects`
--

CREATE TABLE `assign_user_to_projects` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `project_id` bigint UNSIGNED NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_user_to_projects`
--

INSERT INTO `assign_user_to_projects` (`id`, `user_id`, `project_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(69, 1, 5, '4', NULL, NULL, NULL),
(70, 1, 6, '4', NULL, NULL, NULL),
(71, 9, 6, '4', NULL, NULL, NULL),
(75, 1, 7, '4', '4', NULL, '2023-04-07 07:10:31'),
(76, 9, 7, '4', '4', NULL, '2023-04-07 07:10:31');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 2),
(6, '2023_03_24_104657_create_project_table', 2),
(7, '2023_03_24_124223_create_projects_table', 3),
(8, '2023_03_25_052148_create_projects_table', 4),
(9, '2023_03_25_053634_create_assign_user_to_projects_table', 5),
(10, '2023_03_25_054257_create_assign_user_to_projects_table', 6),
(11, '2023_03_30_063806_create_projects_table', 7);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 4, 'API TOKEN', '8cd083895a713b8bedf240ed810252cd77c0716012dc5eafae6640f7f349b984', '[\"*\"]', NULL, NULL, '2023-04-10 04:30:25', '2023-04-10 04:30:25'),
(2, 'App\\Models\\User', 4, 'API TOKEN', '7d95eef08bc4e5e1995045317df6e381defba664cb9198133aab2cbd0a665c6c', '[\"*\"]', NULL, NULL, '2023-04-10 04:32:40', '2023-04-10 04:32:40'),
(3, 'App\\Models\\User', 4, 'API TOKEN', '67ec63217b3abad2226ae6bf9f97a4f6a0a82c314be641e4651b28b784208ec7', '[\"*\"]', NULL, NULL, '2023-04-10 04:32:55', '2023-04-10 04:32:55');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint UNSIGNED NOT NULL,
  `manager_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `manager_id`, `title`, `description`, `start_date`, `end_date`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 6, 'Project 1', 'Demo', '2023-04-01', '2023-04-04', 0, '4', NULL, '2023-04-05 01:50:27', '2023-04-05 01:50:27', NULL),
(6, 12, 'Project 2', 'Test', '2023-04-02', '2023-04-05', 1, '4', NULL, '2023-04-05 01:51:17', '2023-04-05 01:51:17', NULL),
(7, 12, 'Project 3', 'Test Demo', '2023-04-03', '2023-04-06', 1, '4', '4', '2023-04-05 01:52:09', '2023-04-07 01:40:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` bigint UNSIGNED NOT NULL,
  `employee_id` bigint UNSIGNED NOT NULL,
  `planning_hours` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actual_hours` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `project_id`, `employee_id`, `planning_hours`, `actual_hours`, `start_date`, `end_date`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Task 1', 'Test', 6, 1, '20', '25.5', '2023-04-05', '2023-04-08', 0, '4', '4', '2023-04-05 01:53:14', '2023-04-05 07:20:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `roles` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `contact`, `dob`, `gender`, `address`, `active`, `roles`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tejas', 'tejas123@gmail.com', NULL, '$2y$10$uJyQfCRDEfC0zo93witmq.hCpMAFIZFb4lJGM/zBNUI74Cof5kouO', '8401431323', '2000-01-02', 'male', 'Dholka', 1, '3', NULL, NULL, '2023-03-27 00:47:34'),
(4, 'Admin', 'admin123@gmail.com', NULL, '$2y$10$Ngo14D.XUQa9HmFdfzXUi.kCj.vrQKgEBQmZZzxHth0wTxuNB1bX2', '9898857496', '1998-05-12', 'female', 'Ahmedabad', 1, '0', NULL, '2023-03-24 01:50:06', '2023-03-24 01:50:06'),
(5, 'Hr', 'hr123@gmail.com', NULL, '$2y$10$IhwLc.smeqUfCEsyQfJmReTytQOeABDUdbCzRq4gTnmgC2OW4DIue', '9898748587', '2001-02-01', 'male', 'Ahmedabad', 1, '1', NULL, '2023-03-24 01:51:21', '2023-03-25 03:57:52'),
(6, 'Project Manager', 'project123@gmail.com', NULL, '$2y$10$sBEBJ3U9/Ap1komkncHmbOnqzayKs2dh6AiO6iaAtZ1whAV9UuWsi', '9898859674', '1999-02-01', 'male', 'Mumbai', 1, '2', NULL, '2023-03-24 01:53:09', '2023-03-25 01:32:09'),
(9, 'Employeee', 'employee123@gmail.com', NULL, '$2y$10$.EATSAzL2H9eIKUjCfA8OusGRbd8aM1okJYhcTXufe36MJhVuCI1C', '8401425364', '1998-01-02', 'male', 'Baroda', 1, '3', NULL, '2023-03-24 04:48:20', '2023-03-29 07:25:27'),
(12, 'Test Demo', 'test123@gmail.com', NULL, '$2y$10$3msRMi0NDbovtmYhHi0CAOqX30fW9aXd1FwmU9g0h1KfZaP0LzhFy', '8401431333', '1999-01-02', 'male', 'Surat', 1, '2', NULL, '2023-03-29 23:22:56', '2023-03-29 23:22:56'),
(22, 'hsfhsdf', 'demo123@gmail.com', NULL, '$2y$10$6ikH6Y6226NUKkFE.Ibt0eIJDbRujo0Ab18iplQvqSXfRmzsE89Tm', '9898748596', '02/01/2000', 'male', 'dholka', 0, '2', NULL, '2023-04-06 07:15:03', '2023-04-07 05:52:16'),
(24, 'Tejas', 'tejasprajapati567@gmail.com', NULL, '$2y$10$omYv6tlJqsOn1MkzxrIQpODX/RT1JgNbxfldAgqv2BtPvf6O/WdtG', '8401431323', '02/01/2000', 'male', 'Bopal', 1, '2', NULL, '2023-04-13 02:05:14', '2023-04-13 02:05:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_user_to_projects`
--
ALTER TABLE `assign_user_to_projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assign_user_to_projects_user_id_foreign` (`user_id`),
  ADD KEY `assign_user_to_projects_project_id_foreign` (`project_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_manager_id_foreign` (`manager_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `employee_id` (`employee_id`);

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
-- AUTO_INCREMENT for table `assign_user_to_projects`
--
ALTER TABLE `assign_user_to_projects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign_user_to_projects`
--
ALTER TABLE `assign_user_to_projects`
  ADD CONSTRAINT `assign_user_to_projects_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assign_user_to_projects_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_manager_id_foreign` FOREIGN KEY (`manager_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
