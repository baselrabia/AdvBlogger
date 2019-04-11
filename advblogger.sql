-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2019 at 06:12 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `advblogger`
--

-- --------------------------------------------------------

--
-- Table structure for table `activations`
--

CREATE TABLE `activations` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activations`
--

INSERT INTO `activations` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(1, 3, 'qpsPlBCpW8cAQ17yLq5eOJaaL1pFGBfZ', 1, '2019-03-12 21:35:30', '2019-03-12 21:35:30', '2019-03-12 21:35:30'),
(2, 4, 'HljHli3Bnwf37yGkDP3l94oVt1hC4TQ9', 1, '2019-03-13 15:51:13', '2019-03-13 15:51:13', '2019-03-13 15:51:13'),
(3, 5, 'm3PX0kGfdKBeuMxEqEo6Bju488hrh9ah', 1, '2019-03-13 15:54:16', '2019-03-13 15:54:16', '2019-03-13 15:54:16'),
(4, 6, 'Q7moa3Go6rHzwsvFqUeKok0Zp6scn7y3', 1, '2019-03-13 20:01:28', '2019-03-13 20:01:28', '2019-03-13 20:01:28'),
(5, 8, 'TkCNHPrY3wYRIeqFl0KhMsWaTR0pbECc', 1, '2019-03-13 23:49:45', '2019-03-13 22:59:48', '2019-03-13 23:49:45'),
(11, 14, 'HKDxA8xEe6RM14NhnsnGEw7mX6CJwbkW', 1, '2019-03-14 10:07:39', '2019-03-14 10:03:44', '2019-03-14 10:07:39'),
(19, 22, 'Tx4uZc8f2F9x4B0xYWMggnguh09xeoMW', 1, NULL, '2019-03-14 10:58:42', '2019-03-14 10:58:42'),
(21, 24, 'gNGXcpgsrplGB36Q0YIvTGWchMCA8872', 1, '2019-03-16 00:50:47', '2019-03-16 00:47:22', '2019-03-16 00:50:47'),
(22, 25, 'p1cnFED1fS4v7PQrnYj72KFxJyk9yLm1', 1, '2019-03-16 00:56:35', '2019-03-16 00:56:16', '2019-03-16 00:56:35'),
(24, 27, '78orHNNMsfh2J9Ronvq7EhpH9a1utGtu', 1, '2019-03-20 00:33:48', '2019-03-20 00:33:48', '2019-03-20 00:33:48'),
(25, 28, 'lk736zfND40ij6HuBgZcJK7thUEhAMLQ', 1, '2019-03-20 00:39:53', '2019-03-20 00:39:52', '2019-03-20 00:39:53'),
(26, 29, 'oMvudJVUPgriE9ryLRJBK6WNSHfmEs2k', 1, '2019-03-20 00:42:12', '2019-03-20 00:42:12', '2019-03-20 00:42:12'),
(27, 30, 'wRovhBxSBBbc6Qi3jf2tpXCsWMWNRcUx', 1, '2019-03-20 01:21:04', '2019-03-20 01:21:04', '2019-03-20 01:21:04'),
(28, 32, 'BoKAn73r8SFx1147qRWYsF4HzHDi8MXe', 1, NULL, '2019-03-30 17:00:46', '2019-03-30 17:00:46'),
(29, 34, 'xl6obaGQUgslkckwp6egwAIm0p27wq9r', 1, '2019-04-11 01:26:06', '2019-04-11 01:26:06', '2019-04-11 01:26:06'),
(30, 35, 'pgM0elon6DsykgjQ2KldT5Yn90AtD9Zv', 1, '2019-04-11 01:38:27', '2019-04-11 01:38:27', '2019-04-11 01:38:27'),
(31, 36, 'dqy6KirmXioeC1DUJEyj3F1MN3Xe7gbx', 1, '2019-04-11 02:03:36', '2019-04-11 02:03:36', '2019-04-11 02:03:36');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `body`, `post_id`, `created_at`, `updated_at`) VALUES
(7, 32, 'lovely cat', 1, '2019-04-06 01:55:34', '2019-04-06 10:41:54'),
(8, 32, 'pretty cat , Don’t touch it , please', 1, '2019-04-06 01:55:52', '2019-04-06 10:13:36'),
(10, 32, 'awesome and adorable dog', 8, '2019-04-06 10:45:22', '2019-04-06 10:45:22'),
(11, 32, 'hello cato.. sorry, i will edit it in next time', 8, '2019-04-08 23:25:57', '2019-04-08 23:27:27');

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
(1, '2014_07_02_230147_migration_cartalyst_sentinel', 1),
(5, '2019_03_31_203904_create_posts_table', 2),
(8, '2019_04_02_230916_create_tags_table', 3),
(10, '2019_04_06_002056_create_comments_table', 4),
(11, '2019_04_06_124747_create_replies_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `persistences`
--

CREATE TABLE `persistences` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `persistences`
--

INSERT INTO `persistences` (`id`, `user_id`, `code`, `created_at`, `updated_at`) VALUES
(39, 25, 'VHyXn0DnxI8A1wCFv31z9ChYMnyJYGhN', '2019-03-16 00:56:35', '2019-03-16 00:56:35'),
(79, 28, '5XdQd8k3Y1hMGHdgWKHED9awIpUp6ovC', '2019-03-20 00:40:02', '2019-03-20 00:40:02'),
(112, 36, 'GUWY4tWXKaTleOjLoNVV6utnHWJer9m9', '2019-04-11 02:03:36', '2019-04-11 02:03:36');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(11) NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagePath` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `edited_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `approved_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `admin_id`, `title`, `body`, `imagePath`, `edited_by`, `approved`, `approved_by`, `approved_at`, `created_at`, `updated_at`) VALUES
(1, 32, 'WolfCat', 'My lovely cats', '4eed446e052f0dea394778f65dcfef48f0c97f03.jpg', NULL, 1, 'CapAmerica', '2019-04-02 00:32:05', '2019-01-31 23:26:55', '2019-04-04 23:39:11'),
(5, 32, 'Lion', 'this is a nice lion', '625a28bbb65dbc7b0aa82f2838581a992ae62147.jpg', NULL, 1, 'CapAmerica', '2019-04-10 08:31:32', '2017-10-04 22:11:28', '2019-04-10 06:31:32'),
(6, 32, 'dog21', 'hokdsld sd sad', 'default.jpg', NULL, 0, NULL, NULL, '2018-12-04 23:49:01', '2019-04-04 23:49:01'),
(7, 32, 'dog21g', 'hokdsld sd sad', 'default.jpg', NULL, 0, NULL, NULL, '2019-02-04 23:49:28', '2019-04-04 23:49:28'),
(8, 32, 'dog', 'this is a nice golden dog', '2b2c832fd8c4a7174addcaf5d4d2f5b7a76f0e8c.jpg', NULL, 1, 'CapAmerica', '2018-08-02 00:32:05', '2018-07-31 23:26:55', '2018-09-05 23:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(1, 10, NULL, NULL),
(1, 20, NULL, NULL),
(2, 1, NULL, NULL),
(2, 2, NULL, NULL),
(5, 2, NULL, NULL),
(5, 4, NULL, NULL),
(8, 1, NULL, NULL),
(8, 21, NULL, NULL),
(8, 22, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `completed` tinyint(1) NOT NULL DEFAULT '0',
  `completed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reminders`
--

INSERT INTO `reminders` (`id`, `user_id`, `code`, `completed`, `completed_at`, `created_at`, `updated_at`) VALUES
(2, 22, 'XZVUiOAMn9gqavhchC237DVOVxrEkdM0', 1, '2019-03-16 00:11:09', '2019-03-15 22:11:52', '2019-03-16 00:11:09');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `comment_id` int(10) UNSIGNED NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `post_id`, `user_id`, `comment_id`, `body`, `created_at`, `updated_at`) VALUES
(3, 1, 32, 7, 'pretty cat , Don’t touch it , please', '2019-04-06 12:56:57', NULL),
(6, 1, 32, 7, 'hello catooo', '2019-04-06 13:03:51', '2019-04-06 13:05:00'),
(8, 8, 32, 11, 'it is a dog man', '2019-04-08 23:26:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `slug`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Adminstrator', '{\"admin.show\":true,\"admin.edit\":true,\"admin.delete\":true,\"admin.create\":true,\"admin.approve\":true}', '2019-03-13 15:40:57', '2019-03-13 15:40:57'),
(2, 'moderator', 'Moderator', '{\"moderator.show\":true,\"moderator.edit\":true,\"moderator.delete\":false,\"moderator.create\":true,\"moderator.approve\":false}', '2019-03-13 15:41:56', '2019-03-13 15:41:56'),
(3, 'user', 'Normal User', '{\"user.show\":true,\"user.edit\":false,\"user.delete\":false,\"user.create\":false,\"user.approve\":false}', '2019-03-13 15:42:56', '2019-03-13 15:42:56');

-- --------------------------------------------------------

--
-- Table structure for table `role_users`
--

CREATE TABLE `role_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_users`
--

INSERT INTO `role_users` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(5, 3, '2019-03-13 15:54:16', '2019-03-13 15:54:16'),
(6, 3, '2019-03-13 20:01:29', '2019-03-13 20:01:29'),
(8, 3, '2019-03-13 22:59:49', '2019-03-13 22:59:49'),
(14, 3, '2019-03-14 10:03:49', '2019-03-14 10:03:49'),
(15, 3, '2019-03-14 10:11:33', '2019-03-14 10:11:33'),
(16, 3, '2019-03-14 10:13:27', '2019-03-14 10:13:27'),
(17, 3, '2019-03-14 10:46:17', '2019-03-14 10:46:17'),
(18, 3, '2019-03-14 10:49:34', '2019-03-14 10:49:34'),
(19, 3, '2019-03-14 10:53:36', '2019-03-14 10:53:36'),
(20, 3, '2019-03-14 10:56:04', '2019-03-14 10:56:04'),
(21, 3, '2019-03-14 10:57:39', '2019-03-14 10:57:39'),
(22, 1, '2019-03-14 10:58:45', '2019-03-14 10:58:45'),
(23, 3, '2019-03-16 00:38:04', '2019-03-16 00:38:04'),
(24, 3, '2019-03-16 00:47:25', '2019-03-16 00:47:25'),
(25, 3, '2019-03-16 00:56:19', '2019-03-16 00:56:19'),
(26, 3, '2019-03-16 15:47:22', '2019-03-16 15:47:22'),
(27, 3, '2019-03-20 00:33:48', '2019-03-20 00:33:48'),
(28, 3, '2019-03-20 00:39:53', '2019-03-20 00:39:53'),
(29, 3, '2019-03-20 00:42:12', '2019-03-20 00:42:12'),
(30, 3, '2019-03-20 01:21:04', '2019-03-20 01:21:04'),
(32, 3, '2019-03-30 17:00:59', '2019-03-30 17:00:59'),
(34, 3, '2019-04-11 01:26:06', '2019-04-11 01:26:06'),
(35, 3, '2019-04-11 01:38:27', '2019-04-11 01:38:27'),
(36, 3, '2019-04-11 02:03:36', '2019-04-11 02:03:36');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `admin_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 32, 'laravel', NULL, NULL),
(2, 32, 'php', '2019-04-04 22:11:28', '2019-04-04 22:11:28'),
(3, 32, 'data', '2019-04-04 22:11:28', '2019-04-04 22:11:28'),
(4, 32, 'lion', '2019-04-04 22:11:28', '2019-04-04 22:11:28'),
(10, 32, 'top', '2019-04-04 22:59:35', '2019-04-04 22:59:35'),
(11, 32, 'oop', '2019-04-04 22:59:35', '2019-04-04 22:59:35'),
(12, 32, 'loop', '2019-04-04 23:34:19', '2019-04-04 23:34:19'),
(13, 32, 'laravl', '2019-04-04 23:49:01', '2019-04-04 23:49:01'),
(14, 32, 'pp', '2019-04-04 23:49:01', '2019-04-04 23:49:01'),
(15, 32, 'tp', '2019-04-04 23:49:01', '2019-04-04 23:49:01'),
(16, 32, 'laavl', '2019-04-04 23:49:27', '2019-04-04 23:49:27'),
(17, 32, 'poop', '2019-04-04 23:49:28', '2019-04-04 23:49:28'),
(18, 32, 'tuyp', '2019-04-04 23:49:28', '2019-04-04 23:49:28'),
(19, 32, 'lop', '2019-04-04 23:58:34', '2019-04-04 23:58:34'),
(20, 32, 'ajax', '2019-04-04 23:58:48', '2019-04-04 23:58:48'),
(21, 32, 'animal', '2019-04-10 06:09:04', '2019-04-10 06:09:04'),
(22, 32, 'dog', '2019-04-10 06:09:04', '2019-04-10 06:09:04'),
(23, 32, '', '2019-04-10 06:29:50', '2019-04-10 06:29:50');

-- --------------------------------------------------------

--
-- Table structure for table `throttle`
--

CREATE TABLE `throttle` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `throttle`
--

INSERT INTO `throttle` (`id`, `user_id`, `type`, `ip`, `created_at`, `updated_at`) VALUES
(1, NULL, 'global', NULL, '2019-03-12 21:35:53', '2019-03-12 21:35:53'),
(2, NULL, 'ip', '127.0.0.1', '2019-03-12 21:35:53', '2019-03-12 21:35:53'),
(3, NULL, 'global', NULL, '2019-03-12 21:37:52', '2019-03-12 21:37:52'),
(4, NULL, 'ip', '127.0.0.1', '2019-03-12 21:37:52', '2019-03-12 21:37:52'),
(5, NULL, 'global', NULL, '2019-03-12 22:02:26', '2019-03-12 22:02:26'),
(6, NULL, 'ip', '127.0.0.1', '2019-03-12 22:02:26', '2019-03-12 22:02:26'),
(7, NULL, 'global', NULL, '2019-03-12 22:54:53', '2019-03-12 22:54:53'),
(8, NULL, 'ip', '127.0.0.1', '2019-03-12 22:54:53', '2019-03-12 22:54:53'),
(9, NULL, 'global', NULL, '2019-03-12 22:56:49', '2019-03-12 22:56:49'),
(10, NULL, 'ip', '127.0.0.1', '2019-03-12 22:56:49', '2019-03-12 22:56:49'),
(11, NULL, 'global', NULL, '2019-03-12 22:57:01', '2019-03-12 22:57:01'),
(12, NULL, 'ip', '127.0.0.1', '2019-03-12 22:57:01', '2019-03-12 22:57:01'),
(13, NULL, 'global', NULL, '2019-03-12 23:01:19', '2019-03-12 23:01:19'),
(14, NULL, 'ip', '127.0.0.1', '2019-03-12 23:01:19', '2019-03-12 23:01:19'),
(15, NULL, 'global', NULL, '2019-03-12 23:01:24', '2019-03-12 23:01:24'),
(16, NULL, 'ip', '127.0.0.1', '2019-03-12 23:01:24', '2019-03-12 23:01:24'),
(17, NULL, 'global', NULL, '2019-03-12 23:01:29', '2019-03-12 23:01:29'),
(18, NULL, 'ip', '127.0.0.1', '2019-03-12 23:01:29', '2019-03-12 23:01:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permissions` text COLLATE utf8mb4_unicode_ci,
  `last_login` timestamp NULL DEFAULT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `secuirty_question` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secuirty_answer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_picture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `permissions`, `last_login`, `first_name`, `last_name`, `dob`, `secuirty_question`, `secuirty_answer`, `username`, `location`, `profile_picture`, `provider`, `provider_id`, `created_at`, `updated_at`) VALUES
(5, 'jonedon9@gmail.com', '$2y$10$RdSH22JVF8wLD3HTgZbftu/f.uXaPsMmt0u7pHD8Ut86V/DrDuOPS', '{\"admin.show\":true,\"admin.create\":true}', '2019-03-13 19:55:32', 'Jone', 'Doe', '1986-01-01', 'where_are_you_from', 'egypt', 'JoneDon', 'united', 'default.png', '', '', '2019-03-13 15:54:15', '2019-03-30 18:17:08'),
(6, 'captain12@gmail.com', '$2y$10$ynPDF8jaKAoYgn6D/rR0/OJwud4iVnLv7ZDZIiHsb0AD9XaL2Hx3i', '{\"admin.create\":true}', '2019-03-13 22:21:47', 'Capt', 'ain', '1987-02-02', 'where_are_you_from', 'egypt', 'CapTain', 'london', 'default.png', '', '', '2019-03-13 20:01:28', '2019-03-30 18:16:28'),
(8, 'moonstar@gmail.com', '$2y$10$MNv34VeVWOagUf3MvjBdduPlQvjXgh0vXYQWSVw0ykVe13kc9Qa6.', '{\"admin.show\":true,\"admin.create\":false}', '2019-03-13 23:49:45', 'moon', 'star', '1988-04-03', 'where_are_you_from', 'egypt', 'moonstar', 'france', 'default.png', '', '', '2019-03-13 22:59:48', '2019-03-30 18:22:47'),
(14, 'nibeta@mail4.online', '$2y$10$Q.XbamacVv/P75FrjwwsveHiQ/ke1bze1s9S3Gap8GVFTxaKaQ7BS', NULL, '2019-03-14 10:07:39', 'sara', 'omar', '1999-01-01', 'where_are_you_from', 'egypt', 'saraomar', 'egypt', 'default.png', '', '', '2019-03-14 10:03:44', '2019-03-14 10:07:39'),
(15, 'xecegivizo@nextemail.net', '$2y$10$MKsGhrd.cqSM8iPRZTNtRu1DtJYpPYNyCn0Vqtvci/ZBTRxK06QEe', NULL, NULL, 'ahmed', 'gamal', '1985-02-04', 'where_are_you_from', 'egypt', 'ahmedgamal', 'egypt', 'default.png', '', '', '2019-03-14 10:11:30', '2019-03-14 10:11:30'),
(17, 'nuyecizade@nextemail.net', '$2y$10$aG4T2heaJc0TNgJ7gdfKeOMYIRYAZKowzVqhIIYqIxEMCiktxhiJK', NULL, NULL, 'ahmed', 'moh', '1982-02-02', 'where_are_you_from', 'egypt', 'ahmedmohamed', 'egypt', 'default.png', '', '', '2019-03-14 10:46:13', '2019-03-14 10:46:13'),
(18, 'jokebuz@virtual-email.com', '$2y$10$ZiYB5xUdbfs.p8c0awTRgew6opL23/Se8FNjUCD6BBSjr7c4y4spO', NULL, NULL, 'moj', 'ahmed', '1980-02-02', 'where_are_you_from', 'egypt', 'ahmedmohh', 'egypt', 'default.png', '', '', '2019-03-14 10:49:30', '2019-03-14 10:49:30'),
(19, 'ciyewafes@mail-pro.info', '$2y$10$IPB9yJX6BDRj.x0Xcdi2CeUc0fSsvwv20Svbj6JYWhyOFnGdopkdq', NULL, NULL, 'ahmood', 'ahooo', '1995-02-03', 'where_are_you_from', 'egypt', 'ahmedahoo', 'egypt', 'default.png', '', '', '2019-03-14 10:53:34', '2019-03-14 10:53:34'),
(20, 'yonidixu@easyemail.info', '$2y$10$p9bmwPNVPpjjA.kI9vE.JeWNTZa9sarIrvZwmO1.JpHvuPFr/r7Ji', NULL, NULL, 'anayas', 'maina', '1964-02-06', 'where_are_you_from', 'egypt', 'yassminano', 'egypt', 'default.png', '', '', '2019-03-14 10:56:01', '2019-03-14 10:56:01'),
(21, 'dirifecox@webtempmail.online', '$2y$10$baLVI9pj.IdZEbCh3okea.WXOiWAnvquytbzf.tMWehcW.Mxe7kFO', NULL, NULL, 'divid', 'max', '2000-02-03', 'where_are_you_from', 'egypt', 'dividmax', 'paris', 'default.png', '', '', '2019-03-14 10:57:34', '2019-03-14 10:57:34'),
(22, 'baselrabia2008@gmail.com', '$2y$10$cnqtUTsxQWW31vaBiqLH0.BSb0Z1W.7/iDdlaGED3v5IkcI6f4evy', NULL, '2019-03-20 01:31:26', 'basel', 'rabia', '1996-02-03', 'where_are_you_from', 'egypt', 'baselrabia', 'egypt', 'default.png', '', '', '2019-03-14 10:58:42', '2019-03-20 01:31:26'),
(23, 'bas4564fh@gmail.com', '$2y$10$3vV7lUiYugMsCyKzgr64AeOukOveTUvZ1dT2IkReIkqtqPCWY6g1S', NULL, NULL, 'basel', 'rabia', '1997-03-04', 'where_are_you_from', 'egypt', 'cappoma', 'german', 'default.png', '', '', '2019-03-16 00:37:47', '2019-03-16 00:37:47'),
(24, 'woneji@globaleuro.net', '$2y$10$o4q6y0VJ6/h3aJhXvTkinu1ueUb2HlX2veGXjERHAT2u.7CPNnOd6', NULL, '2019-03-19 21:19:32', 'wael', 'raaof', '2004-03-04', 'where_are_you_from', 'egypt', 'waelraoof', 'swidey', 'default.png', '', '', '2019-03-16 00:47:22', '2019-03-19 21:19:32'),
(25, 'kixem@click-mail.net', '$2y$10$DAUNIVGZB3wU36siSnpecOLhDgU/HFCDZ3lJ1XP6bWEmlcP8Nz/xW', '{\"moderator.show\":true,\"moderator.create\":true,\"admin.show\":false,\"admin.create\":false}', '2019-03-16 00:56:35', 'mohsen', 'waled', '1994-03-03', 'where_are_you_from', 'egypt', 'mohsenwaled', 'america', 'default.png', '', '', '2019-03-16 00:56:16', '2019-03-30 18:34:12'),
(28, 'xirazub@quick-mail.online', '$2y$10$xRGJ9dCI72GglGvHukK0OOD9CzZrpvuGOLBATFbZ7klxf2I0Xi9Wy', NULL, '2019-03-16 15:47:37', 'otot', 'toto', '1998-03-04', 'what_is_your_hobby', 'read', 'username', 'egypt', 'default.png', '', '', '2019-03-16 15:47:11', '2019-03-16 15:47:37'),
(30, 'baselsaadeg@gmail.com', '$2y$10$OpSJ3.vDM3/VAtMWfJjzBO4mVnludgIYq4SvX4SEXMYLb04qktX6q', '{\"user.show\":true,\"moderator.create\":false,\"admin.edit\":true}', '2019-03-20 01:21:54', 'Basel', 'Saad', NULL, NULL, NULL, 'Basel Saad', NULL, 'default.png', 'google', '103950633515706820505', '2019-03-20 01:21:04', '2019-03-30 18:18:23'),
(32, 'cap123@gmail.com', '$2y$10$hQG2ydJ.5/sOgBs3KqNQieA3LGdlBbmbQ9Sq2rXSQOS4yX6wFWtZa', NULL, '2019-04-11 01:23:21', 'Cap', 'America', '1995-01-01', 'where_are_you_from', 'egy', 'CapAmerica', 'united state', '3isxrFjA7oSybtXHYykBLbaxMBEuYsaM7ePtRyZc1554577219.jpg', NULL, NULL, '2019-03-30 17:00:46', '2019-04-11 01:23:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activations`
--
ALTER TABLE `activations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `persistences`
--
ALTER TABLE `persistences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `persistences_code_unique` (`code`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_title_unique` (`title`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`post_id`,`tag_id`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `replies_post_id_foreign` (`post_id`),
  ADD KEY `replies_user_id_foreign` (`user_id`),
  ADD KEY `replies_comment_id_foreign` (`comment_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_users`
--
ALTER TABLE `role_users`
  ADD PRIMARY KEY (`user_id`,`role_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_name_unique` (`name`);

--
-- Indexes for table `throttle`
--
ALTER TABLE `throttle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `throttle_user_id_index` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activations`
--
ALTER TABLE `activations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `persistences`
--
ALTER TABLE `persistences`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `throttle`
--
ALTER TABLE `throttle`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_comment_id_foreign` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `replies_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `replies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
