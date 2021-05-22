-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2021 at 06:52 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taxitour`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` tinyint(4) NOT NULL DEFAULT 1,
  `block` tinyint(1) NOT NULL DEFAULT 0,
  `status` enum('a','b','c') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `mobile`, `address`, `image`, `role_id`, `block`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin User', 'Admin', 'admin@gmail.com', NULL, '$2y$10$xVSRN32XUWseVtIiGER5auYNjZPwIufIP2Uy40rzP5vdQSRRpuLs2', '1234567890', 'Sylhet', 'Logo.png', 1, 0, 'a', 'IdBTE4XukOqQ7O5BXxodElkn7KsScD86UbX6NAWbdkjXjljCjGJUio6n5UmO', NULL, '2021-01-05 00:48:56'),
(2, 'New Admin', 'new admin', 'new@admin.com', NULL, '$2y$10$XhGYM92ax2ynnTVYxI5Dr.JMbLoV6nr2/An2/jJybwqS/a0tWWLB.', '1234567890', NULL, NULL, 1, 0, 'a', NULL, '2021-02-27 23:50:35', '2021-02-27 23:50:35');

-- --------------------------------------------------------

--
-- Table structure for table `dominions`
--

CREATE TABLE `dominions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dominions`
--

INSERT INTO `dominions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2020-06-01 09:00:24', '2020-06-01 09:00:24'),
(2, 'Role', '2020-06-01 09:01:49', '2020-06-01 09:01:49'),
(14, 'Permission', '2020-06-01 11:53:39', '2020-06-01 11:53:39'),
(16, 'Dominion', '2020-06-04 03:03:54', '2020-06-04 03:03:54'),
(17, 'Process', '2020-06-04 03:04:11', '2020-06-04 03:04:11'),
(19, 'Menu', '2020-06-05 02:11:40', '2020-06-19 02:35:47');

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
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `dominion_id` int(11) DEFAULT NULL,
  `process_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `params` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guard` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin',
  `position` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `parent_id`, `dominion_id`, `process_id`, `name`, `params`, `icon`, `route_name`, `guard`, `position`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 'System Settingss', NULL, '<i class=\"fa fa-cogs\"></i>', NULL, 'admin', 50, '2020-06-05 14:20:28', '2021-01-03 03:04:11'),
(2, 1, 2, 8, 'Role', NULL, '<i class=\"fa fa-circle-o\"></i>', 'role.index', 'admin', 1, '2020-06-05 14:24:46', '2020-06-05 14:24:46'),
(3, 1, 16, 38, 'Dominion', NULL, '<i class=\"fa fa-circle-o\"></i>', 'dominion.index', 'admin', 2, '2020-06-05 14:25:21', '2020-06-05 14:25:21'),
(4, 1, 17, 45, 'Process', NULL, '<i class=\"fa fa-circle-o\"></i>', 'process.index', 'admin', 3, '2020-06-07 10:58:49', '2020-06-07 10:58:49'),
(5, 1, 14, 30, 'Permission', NULL, '<i class=\"fa fa-circle-o\"></i>', 'permission.index', 'admin', 4, '2020-06-07 11:00:46', '2020-06-07 11:00:46'),
(6, 1, 19, 52, 'Authorized Menu', NULL, '<i class=\"fa fa-circle-o\"></i>', 'menu.index', 'admin', 5, '2020-06-07 11:01:28', '2020-06-07 11:01:28'),
(7, NULL, 1, 1, 'Admins', NULL, '<i class=\"fa fa-users\"></i>', 'admin.index', 'admin', 49, '2020-06-07 11:02:26', '2020-06-29 07:51:03'),
(11, NULL, NULL, NULL, 'Master Setup', NULL, '<i class=\"fa fa-asterisk\" aria-hidden=\"true\"></i>', NULL, 'admin', 1, '2020-06-19 07:54:59', '2020-06-29 07:51:53');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_05_31_144317_create_admins_table', 1),
(6, '2020_06_01_142131_create_dominions_table', 1),
(7, '2020_06_01_142319_create_processes_table', 1),
(8, '2020_06_01_174452_create_permissions_table', 1),
(9, '2020_06_05_080001_create_menus_table', 1),
(57, '2020_06_01_072036_create_roles_table', 17),
(58, '2014_10_12_000000_create_users_table', 18);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permissions` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `role_id`, `permissions`, `created_at`, `updated_at`) VALUES
(9, 1, '[\"{\\\"id\\\":1,\\\"dominion_id\\\":1,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Index\\\",\\\"route_name\\\":\\\"admin.index\\\",\\\"created_at\\\":\\\"2020-06-01T15:00:24.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-03T16:01:42.000000Z\\\"}\",\"{\\\"id\\\":2,\\\"dominion_id\\\":1,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Create\\\",\\\"route_name\\\":\\\"admin.create\\\",\\\"created_at\\\":\\\"2020-06-01T15:00:24.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-01T15:00:24.000000Z\\\"}\",\"{\\\"id\\\":3,\\\"dominion_id\\\":1,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Store\\\",\\\"route_name\\\":\\\"admin.store\\\",\\\"created_at\\\":\\\"2020-06-01T15:00:24.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-01T15:00:24.000000Z\\\"}\",\"{\\\"id\\\":4,\\\"dominion_id\\\":1,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Show\\\",\\\"route_name\\\":\\\"admin.show\\\",\\\"created_at\\\":\\\"2020-06-01T15:00:24.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-01T15:00:24.000000Z\\\"}\",\"{\\\"id\\\":5,\\\"dominion_id\\\":1,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Edit\\\",\\\"route_name\\\":\\\"admin.edit\\\",\\\"created_at\\\":\\\"2020-06-01T15:00:24.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-01T15:00:24.000000Z\\\"}\",\"{\\\"id\\\":6,\\\"dominion_id\\\":1,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Update\\\",\\\"route_name\\\":\\\"admin.update\\\",\\\"created_at\\\":\\\"2020-06-01T15:00:24.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-01T15:00:24.000000Z\\\"}\",\"{\\\"id\\\":7,\\\"dominion_id\\\":1,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Destroy\\\",\\\"route_name\\\":\\\"admin.destroy\\\",\\\"created_at\\\":\\\"2020-06-01T15:00:24.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-01T15:00:24.000000Z\\\"}\",\"{\\\"id\\\":37,\\\"dominion_id\\\":1,\\\"guard\\\":null,\\\"name\\\":\\\"profile\\\",\\\"route_name\\\":\\\"admin.profile\\\",\\\"created_at\\\":\\\"2020-06-03T15:45:31.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-03T15:45:31.000000Z\\\"}\",\"{\\\"id\\\":66,\\\"dominion_id\\\":1,\\\"guard\\\":null,\\\"name\\\":\\\"updateProfile\\\",\\\"route_name\\\":\\\"admin.updateprofile\\\",\\\"created_at\\\":\\\"2020-06-05T09:35:42.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-05T09:35:42.000000Z\\\"}\",\"{\\\"id\\\":82,\\\"dominion_id\\\":1,\\\"guard\\\":null,\\\"name\\\":\\\"changePassword\\\",\\\"route_name\\\":\\\"admin.changepassword\\\",\\\"created_at\\\":\\\"2020-06-19T13:46:30.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-19T13:46:30.000000Z\\\"}\",\"{\\\"id\\\":8,\\\"dominion_id\\\":2,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Index\\\",\\\"route_name\\\":\\\"role.index\\\",\\\"created_at\\\":\\\"2020-06-01T15:01:49.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-01T15:01:49.000000Z\\\"}\",\"{\\\"id\\\":9,\\\"dominion_id\\\":2,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Create\\\",\\\"route_name\\\":\\\"role.create\\\",\\\"created_at\\\":\\\"2020-06-01T15:01:49.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-01T15:01:49.000000Z\\\"}\",\"{\\\"id\\\":10,\\\"dominion_id\\\":2,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Store\\\",\\\"route_name\\\":\\\"role.store\\\",\\\"created_at\\\":\\\"2020-06-01T15:01:49.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-01T15:01:49.000000Z\\\"}\",\"{\\\"id\\\":11,\\\"dominion_id\\\":2,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Show\\\",\\\"route_name\\\":\\\"role.show\\\",\\\"created_at\\\":\\\"2020-06-01T15:01:49.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-01T15:01:49.000000Z\\\"}\",\"{\\\"id\\\":12,\\\"dominion_id\\\":2,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Edit\\\",\\\"route_name\\\":\\\"role.edit\\\",\\\"created_at\\\":\\\"2020-06-01T15:01:49.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-01T15:01:49.000000Z\\\"}\",\"{\\\"id\\\":13,\\\"dominion_id\\\":2,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Update\\\",\\\"route_name\\\":\\\"role.update\\\",\\\"created_at\\\":\\\"2020-06-01T15:01:49.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-01T15:01:49.000000Z\\\"}\",\"{\\\"id\\\":14,\\\"dominion_id\\\":2,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Destroy\\\",\\\"route_name\\\":\\\"role.destroy\\\",\\\"created_at\\\":\\\"2020-06-01T15:01:49.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-01T15:01:49.000000Z\\\"}\",\"{\\\"id\\\":30,\\\"dominion_id\\\":14,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Index\\\",\\\"route_name\\\":\\\"permission.index\\\",\\\"created_at\\\":\\\"2020-06-01T17:53:39.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-01T17:53:39.000000Z\\\"}\",\"{\\\"id\\\":31,\\\"dominion_id\\\":14,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Create\\\",\\\"route_name\\\":\\\"permission.create\\\",\\\"created_at\\\":\\\"2020-06-01T17:53:40.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-01T17:53:40.000000Z\\\"}\",\"{\\\"id\\\":32,\\\"dominion_id\\\":14,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Store\\\",\\\"route_name\\\":\\\"permission.store\\\",\\\"created_at\\\":\\\"2020-06-01T17:53:40.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-01T17:53:40.000000Z\\\"}\",\"{\\\"id\\\":33,\\\"dominion_id\\\":14,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Show\\\",\\\"route_name\\\":\\\"permission.show\\\",\\\"created_at\\\":\\\"2020-06-01T17:53:40.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-01T17:53:40.000000Z\\\"}\",\"{\\\"id\\\":34,\\\"dominion_id\\\":14,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Edit\\\",\\\"route_name\\\":\\\"permission.edit\\\",\\\"created_at\\\":\\\"2020-06-01T17:53:40.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-01T17:53:40.000000Z\\\"}\",\"{\\\"id\\\":35,\\\"dominion_id\\\":14,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Update\\\",\\\"route_name\\\":\\\"permission.update\\\",\\\"created_at\\\":\\\"2020-06-01T17:53:40.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-01T17:53:40.000000Z\\\"}\",\"{\\\"id\\\":36,\\\"dominion_id\\\":14,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Destroy\\\",\\\"route_name\\\":\\\"permission.destroy\\\",\\\"created_at\\\":\\\"2020-06-01T17:53:40.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-01T17:53:40.000000Z\\\"}\",\"{\\\"id\\\":38,\\\"dominion_id\\\":16,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Index\\\",\\\"route_name\\\":\\\"dominion.index\\\",\\\"created_at\\\":\\\"2020-06-04T09:03:54.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-04T09:03:54.000000Z\\\"}\",\"{\\\"id\\\":39,\\\"dominion_id\\\":16,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Create\\\",\\\"route_name\\\":\\\"dominion.create\\\",\\\"created_at\\\":\\\"2020-06-04T09:03:54.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-04T09:03:54.000000Z\\\"}\",\"{\\\"id\\\":40,\\\"dominion_id\\\":16,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Store\\\",\\\"route_name\\\":\\\"dominion.store\\\",\\\"created_at\\\":\\\"2020-06-04T09:03:54.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-04T09:03:54.000000Z\\\"}\",\"{\\\"id\\\":41,\\\"dominion_id\\\":16,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Show\\\",\\\"route_name\\\":\\\"dominion.show\\\",\\\"created_at\\\":\\\"2020-06-04T09:03:54.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-04T09:03:54.000000Z\\\"}\",\"{\\\"id\\\":42,\\\"dominion_id\\\":16,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Edit\\\",\\\"route_name\\\":\\\"dominion.edit\\\",\\\"created_at\\\":\\\"2020-06-04T09:03:54.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-04T09:03:54.000000Z\\\"}\",\"{\\\"id\\\":43,\\\"dominion_id\\\":16,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Update\\\",\\\"route_name\\\":\\\"dominion.update\\\",\\\"created_at\\\":\\\"2020-06-04T09:03:54.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-04T09:03:54.000000Z\\\"}\",\"{\\\"id\\\":44,\\\"dominion_id\\\":16,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Destroy\\\",\\\"route_name\\\":\\\"dominion.destroy\\\",\\\"created_at\\\":\\\"2020-06-04T09:03:54.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-04T09:03:54.000000Z\\\"}\",\"{\\\"id\\\":45,\\\"dominion_id\\\":17,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Index\\\",\\\"route_name\\\":\\\"process.index\\\",\\\"created_at\\\":\\\"2020-06-04T09:04:11.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-04T09:04:11.000000Z\\\"}\",\"{\\\"id\\\":46,\\\"dominion_id\\\":17,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Create\\\",\\\"route_name\\\":\\\"process.create\\\",\\\"created_at\\\":\\\"2020-06-04T09:04:11.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-04T09:04:11.000000Z\\\"}\",\"{\\\"id\\\":47,\\\"dominion_id\\\":17,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Store\\\",\\\"route_name\\\":\\\"process.store\\\",\\\"created_at\\\":\\\"2020-06-04T09:04:11.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-04T09:04:11.000000Z\\\"}\",\"{\\\"id\\\":48,\\\"dominion_id\\\":17,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Show\\\",\\\"route_name\\\":\\\"process.show\\\",\\\"created_at\\\":\\\"2020-06-04T09:04:11.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-04T09:04:11.000000Z\\\"}\",\"{\\\"id\\\":49,\\\"dominion_id\\\":17,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Edit\\\",\\\"route_name\\\":\\\"process.edit\\\",\\\"created_at\\\":\\\"2020-06-04T09:04:11.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-04T09:04:11.000000Z\\\"}\",\"{\\\"id\\\":50,\\\"dominion_id\\\":17,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Update\\\",\\\"route_name\\\":\\\"process.update\\\",\\\"created_at\\\":\\\"2020-06-04T09:04:11.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-04T09:04:11.000000Z\\\"}\",\"{\\\"id\\\":51,\\\"dominion_id\\\":17,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Destroy\\\",\\\"route_name\\\":\\\"process.destroy\\\",\\\"created_at\\\":\\\"2020-06-04T09:04:11.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-04T09:04:11.000000Z\\\"}\",\"{\\\"id\\\":52,\\\"dominion_id\\\":19,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Index\\\",\\\"route_name\\\":\\\"menu.index\\\",\\\"created_at\\\":\\\"2020-06-05T08:11:40.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-19T08:35:47.000000Z\\\"}\",\"{\\\"id\\\":53,\\\"dominion_id\\\":19,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Create\\\",\\\"route_name\\\":\\\"menu.create\\\",\\\"created_at\\\":\\\"2020-06-05T08:11:40.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-19T08:35:47.000000Z\\\"}\",\"{\\\"id\\\":54,\\\"dominion_id\\\":19,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Store\\\",\\\"route_name\\\":\\\"menu.store\\\",\\\"created_at\\\":\\\"2020-06-05T08:11:40.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-19T08:35:47.000000Z\\\"}\",\"{\\\"id\\\":55,\\\"dominion_id\\\":19,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Show\\\",\\\"route_name\\\":\\\"menu.show\\\",\\\"created_at\\\":\\\"2020-06-05T08:11:40.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-19T08:35:47.000000Z\\\"}\",\"{\\\"id\\\":56,\\\"dominion_id\\\":19,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Edit\\\",\\\"route_name\\\":\\\"menu.edit\\\",\\\"created_at\\\":\\\"2020-06-05T08:11:40.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-19T08:35:47.000000Z\\\"}\",\"{\\\"id\\\":57,\\\"dominion_id\\\":19,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Update\\\",\\\"route_name\\\":\\\"menu.update\\\",\\\"created_at\\\":\\\"2020-06-05T08:11:40.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-19T08:35:47.000000Z\\\"}\",\"{\\\"id\\\":58,\\\"dominion_id\\\":19,\\\"guard\\\":\\\"admin\\\",\\\"name\\\":\\\"Destroy\\\",\\\"route_name\\\":\\\"menu.destroy\\\",\\\"created_at\\\":\\\"2020-06-05T08:11:40.000000Z\\\",\\\"updated_at\\\":\\\"2020-06-19T08:35:47.000000Z\\\"}\"]', NULL, '2021-01-03 03:03:37');

-- --------------------------------------------------------

--
-- Table structure for table `processes`
--

CREATE TABLE `processes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dominion_id` bigint(20) UNSIGNED NOT NULL,
  `guard` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `processes`
--

INSERT INTO `processes` (`id`, `dominion_id`, `guard`, `name`, `route_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', 'Index', 'admin.index', '2020-06-01 09:00:24', '2020-06-03 10:01:42'),
(2, 1, 'admin', 'Create', 'admin.create', '2020-06-01 09:00:24', '2020-06-01 09:00:24'),
(3, 1, 'admin', 'Store', 'admin.store', '2020-06-01 09:00:24', '2020-06-01 09:00:24'),
(4, 1, 'admin', 'Show', 'admin.show', '2020-06-01 09:00:24', '2020-06-01 09:00:24'),
(5, 1, 'admin', 'Edit', 'admin.edit', '2020-06-01 09:00:24', '2020-06-01 09:00:24'),
(6, 1, 'admin', 'Update', 'admin.update', '2020-06-01 09:00:24', '2020-06-01 09:00:24'),
(7, 1, 'admin', 'Destroy', 'admin.destroy', '2020-06-01 09:00:24', '2020-06-01 09:00:24'),
(8, 2, 'admin', 'Index', 'role.index', '2020-06-01 09:01:49', '2020-06-01 09:01:49'),
(9, 2, 'admin', 'Create', 'role.create', '2020-06-01 09:01:49', '2020-06-01 09:01:49'),
(10, 2, 'admin', 'Store', 'role.store', '2020-06-01 09:01:49', '2020-06-01 09:01:49'),
(11, 2, 'admin', 'Show', 'role.show', '2020-06-01 09:01:49', '2020-06-01 09:01:49'),
(12, 2, 'admin', 'Edit', 'role.edit', '2020-06-01 09:01:49', '2020-06-01 09:01:49'),
(13, 2, 'admin', 'Update', 'role.update', '2020-06-01 09:01:49', '2020-06-01 09:01:49'),
(14, 2, 'admin', 'Destroy', 'role.destroy', '2020-06-01 09:01:49', '2020-06-01 09:01:49'),
(30, 14, 'admin', 'Index', 'permission.index', '2020-06-01 11:53:39', '2020-06-01 11:53:39'),
(31, 14, 'admin', 'Create', 'permission.create', '2020-06-01 11:53:40', '2020-06-01 11:53:40'),
(32, 14, 'admin', 'Store', 'permission.store', '2020-06-01 11:53:40', '2020-06-01 11:53:40'),
(33, 14, 'admin', 'Show', 'permission.show', '2020-06-01 11:53:40', '2020-06-01 11:53:40'),
(34, 14, 'admin', 'Edit', 'permission.edit', '2020-06-01 11:53:40', '2020-06-01 11:53:40'),
(35, 14, 'admin', 'Update', 'permission.update', '2020-06-01 11:53:40', '2020-06-01 11:53:40'),
(36, 14, 'admin', 'Destroy', 'permission.destroy', '2020-06-01 11:53:40', '2020-06-01 11:53:40'),
(37, 1, NULL, 'profile', 'admin.profile', '2020-06-03 09:45:31', '2020-06-03 09:45:31'),
(38, 16, 'admin', 'Index', 'dominion.index', '2020-06-04 03:03:54', '2020-06-04 03:03:54'),
(39, 16, 'admin', 'Create', 'dominion.create', '2020-06-04 03:03:54', '2020-06-04 03:03:54'),
(40, 16, 'admin', 'Store', 'dominion.store', '2020-06-04 03:03:54', '2020-06-04 03:03:54'),
(41, 16, 'admin', 'Show', 'dominion.show', '2020-06-04 03:03:54', '2020-06-04 03:03:54'),
(42, 16, 'admin', 'Edit', 'dominion.edit', '2020-06-04 03:03:54', '2020-06-04 03:03:54'),
(43, 16, 'admin', 'Update', 'dominion.update', '2020-06-04 03:03:54', '2020-06-04 03:03:54'),
(44, 16, 'admin', 'Destroy', 'dominion.destroy', '2020-06-04 03:03:54', '2020-06-04 03:03:54'),
(45, 17, 'admin', 'Index', 'process.index', '2020-06-04 03:04:11', '2020-06-04 03:04:11'),
(46, 17, 'admin', 'Create', 'process.create', '2020-06-04 03:04:11', '2020-06-04 03:04:11'),
(47, 17, 'admin', 'Store', 'process.store', '2020-06-04 03:04:11', '2020-06-04 03:04:11'),
(48, 17, 'admin', 'Show', 'process.show', '2020-06-04 03:04:11', '2020-06-04 03:04:11'),
(49, 17, 'admin', 'Edit', 'process.edit', '2020-06-04 03:04:11', '2020-06-04 03:04:11'),
(50, 17, 'admin', 'Update', 'process.update', '2020-06-04 03:04:11', '2020-06-04 03:04:11'),
(51, 17, 'admin', 'Destroy', 'process.destroy', '2020-06-04 03:04:11', '2020-06-04 03:04:11'),
(52, 19, 'admin', 'Index', 'menu.index', '2020-06-05 02:11:40', '2020-06-19 02:35:47'),
(53, 19, 'admin', 'Create', 'menu.create', '2020-06-05 02:11:40', '2020-06-19 02:35:47'),
(54, 19, 'admin', 'Store', 'menu.store', '2020-06-05 02:11:40', '2020-06-19 02:35:47'),
(55, 19, 'admin', 'Show', 'menu.show', '2020-06-05 02:11:40', '2020-06-19 02:35:47'),
(56, 19, 'admin', 'Edit', 'menu.edit', '2020-06-05 02:11:40', '2020-06-19 02:35:47'),
(57, 19, 'admin', 'Update', 'menu.update', '2020-06-05 02:11:40', '2020-06-19 02:35:47'),
(58, 19, 'admin', 'Destroy', 'menu.destroy', '2020-06-05 02:11:40', '2020-06-19 02:35:47'),
(66, 1, NULL, 'updateProfile', 'admin.updateprofile', '2020-06-05 03:35:42', '2020-06-05 03:35:42'),
(82, 1, NULL, 'changePassword', 'admin.changepassword', '2020-06-19 07:46:30', '2020-06-19 07:46:30');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin', NULL, NULL),
(2, 'Admin', 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `dominions`
--
ALTER TABLE `dominions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `processes`
--
ALTER TABLE `processes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `processes_dominion_id_foreign` (`dominion_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dominions`
--
ALTER TABLE `dominions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `processes`
--
ALTER TABLE `processes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=330;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `processes`
--
ALTER TABLE `processes`
  ADD CONSTRAINT `processes_dominion_id_foreign` FOREIGN KEY (`dominion_id`) REFERENCES `dominions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
