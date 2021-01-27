-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2021 at 10:00 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clotheshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `type`, `mobile`, `email`, `password`, `email_verified_at`, `image`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ehsan dastars', 'admin', '09177186944', 'a@a.com', '$2y$10$lBIC5d75MTyAyv0EcfpFYephpYmgKb0xSSWMnjzJu7ckgANiQJBlW', NULL, '353317.jpg', 1, NULL, NULL, '2021-01-13 17:26:57'),
(2, 'smart', 'subadmin', '09000000000', 'b@b.com', '$2y$10$E4mpgoe78L82JiAfwgaqnOKUJY.7kiC04cdAcupp/tLS4VM0SyIxG', NULL, '', 1, NULL, NULL, NULL),
(3, 'david', 'admin', '09000000000', 'c@c.com', '$2y$10$E4mpgoe78L82JiAfwgaqnOKUJY.7kiC04cdAcupp/tLS4VM0SyIxG', NULL, '', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(10) UNSIGNED NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `product_id`, `size`, `price`, `sku`, `stock`, `status`, `created_at`, `updated_at`) VALUES
(4, 2, 'small', 460.00, 'P003-s', 10, 1, '2021-01-16 16:48:13', '2021-01-16 16:48:13'),
(6, 1, 'small', 250.00, 'B900-s', 250, 1, '2021-01-17 20:01:08', '2021-01-17 20:01:08'),
(7, 1, 'medium', 300.00, 'B900-m', 20, 1, '2021-01-17 20:01:08', '2021-01-17 20:01:08'),
(8, 1, 'large', 350.00, 'B900-l', 10, 0, '2021-01-17 20:01:08', '2021-01-17 20:01:08'),
(9, 3, 'medium', 25.00, 'md', 10, 1, '2021-01-24 03:41:29', '2021-01-24 03:41:29'),
(10, 7, 'small', 56.00, 'B1000-s', 5, 1, '2021-01-24 16:43:51', '2021-01-24 16:43:51'),
(11, 7, 'medium', 57.00, 'B1000-m', 10, 1, '2021-01-24 16:43:51', '2021-01-24 16:43:51'),
(12, 7, 'large', 60.00, 'B1000-l', 11, 1, '2021-01-24 16:43:51', '2021-01-24 16:43:51'),
(13, 7, 'Xlarge', 65.00, 'B1000-xl', 6, 1, '2021-01-24 16:43:51', '2021-01-24 16:43:51'),
(14, 8, 'small', 76.00, 'B2000-s', 10, 1, '2021-01-24 16:59:33', '2021-01-24 16:59:33'),
(15, 8, 'medium', 70.00, 'B2000-m', 6, 1, '2021-01-24 16:59:33', '2021-01-24 16:59:33'),
(16, 8, 'large', 56.00, 'B2000-l', 55, 1, '2021-01-24 16:59:33', '2021-01-24 16:59:33'),
(17, 8, 'xlarge', 68.00, 'B2000-xl', 20, 1, '2021-01-24 16:59:33', '2021-01-24 16:59:33'),
(18, 9, 'small', 45.00, 'B3000-s', 6, 1, '2021-01-24 17:05:28', '2021-01-24 17:05:28'),
(19, 9, 'medium', 46.00, 'B3000-m', 8, 1, '2021-01-24 17:05:28', '2021-01-24 17:05:28'),
(20, 9, 'large', 50.00, 'B3000-l', 15, 1, '2021-01-24 17:05:28', '2021-01-24 17:05:28'),
(21, 9, 'xlarge', 55.00, 'B3000-xl', 2, 1, '2021-01-24 17:05:28', '2021-01-24 17:05:28'),
(22, 10, 'small', 20.00, 'B4000-S', 6, 1, '2021-01-24 17:11:27', '2021-01-24 17:11:27'),
(23, 10, 'medium', 25.00, 'B4000-M', 23, 1, '2021-01-24 17:11:27', '2021-01-24 17:11:27'),
(24, 11, 'small', 25.00, 'B5000-s', 20, 1, '2021-01-24 17:19:02', '2021-01-24 17:19:02'),
(25, 11, 'medium', 29.00, 'B5000-m', 30, 1, '2021-01-24 17:19:02', '2021-01-24 17:19:02'),
(26, 11, 'large', 35.00, 'B5000-l', 10, 1, '2021-01-24 17:19:02', '2021-01-24 17:19:02'),
(27, 11, 'xlarge', 45.00, 'B5000-xl', 5, 1, '2021-01-24 17:19:02', '2021-01-24 17:19:02'),
(28, 12, 'small', 56.00, 'B7000-s', 10, 1, '2021-01-24 17:53:36', '2021-01-24 17:53:36'),
(29, 12, 'medium', 58.00, 'B7000-m', 10, 1, '2021-01-24 17:53:36', '2021-01-24 17:53:36'),
(30, 13, 'small', 80.00, 'B8000-s', 30, 1, '2021-01-24 18:02:01', '2021-01-24 18:02:01'),
(31, 13, 'medium', 90.00, 'B8000-m', 50, 1, '2021-01-24 18:02:01', '2021-01-24 18:02:01'),
(32, 13, 'xlarge', 100.00, 'B8000-xl', 10, 1, '2021-01-24 18:02:01', '2021-01-24 18:02:01'),
(33, 14, 'small', 100.00, 'B9000-s', 10, 1, '2021-01-24 18:08:30', '2021-01-24 18:08:30'),
(34, 14, 'medium', 200.00, 'B9000-m', 10, 1, '2021-01-24 18:08:30', '2021-01-24 18:08:30'),
(35, 15, 'small', 30.00, 'B901-s', 6, 1, '2021-01-24 18:26:44', '2021-01-24 18:26:44'),
(36, 15, 'medium', 35.00, 'B901-m', 10, 1, '2021-01-24 18:26:44', '2021-01-24 18:26:44'),
(37, 16, 'medium', 20.00, 'B9002-m', 60, 1, '2021-01-24 18:30:20', '2021-01-24 18:30:20'),
(38, 16, 'large', 25.00, 'B9002-l', 50, 1, '2021-01-24 18:30:20', '2021-01-24 18:30:20'),
(39, 17, 'small', 30.00, 'B9003-s', 50, 1, '2021-01-24 18:33:39', '2021-01-24 18:33:39'),
(40, 17, 'large', 50.00, 'B9003-l', 6, 1, '2021-01-24 18:33:39', '2021-01-24 18:33:39'),
(41, 18, 'small', 36.00, 'B90005-s', 5, 1, '2021-01-24 18:36:38', '2021-01-24 18:36:38'),
(42, 18, 'medium', 40.00, 'B90005-m', 10, 1, '2021-01-24 18:36:38', '2021-01-24 18:36:38'),
(43, 18, 'xlarge', 60.00, 'B90005-xl', 15, 1, '2021-01-24 18:36:38', '2021-01-24 18:36:38'),
(44, 19, '4', 40.00, 'B8001-2-4', 63, 1, '2021-01-24 18:48:42', '2021-01-24 18:48:42'),
(45, 19, '6', 45.00, 'B8001-6', 25, 1, '2021-01-24 18:48:42', '2021-01-24 18:48:42'),
(46, 19, '8', 50.00, 'B8001-8', 90, 1, '2021-01-24 18:48:42', '2021-01-24 18:48:42'),
(47, 20, '2', 49.00, 'B90018-2', 10, 1, '2021-01-24 18:52:40', '2021-01-24 18:52:40'),
(48, 20, '3', 53.00, 'B90018-3', 6, 1, '2021-01-24 18:52:40', '2021-01-24 18:52:40'),
(49, 20, '4', 60.00, 'B90018-4', 6, 1, '2021-01-24 18:52:40', '2021-01-24 18:52:40'),
(50, 22, '11', 64.00, 'B8003-11', 10, 1, '2021-01-24 19:00:03', '2021-01-24 19:00:03'),
(51, 22, '12', 65.00, 'B8003-12', 10, 1, '2021-01-24 19:00:03', '2021-01-24 19:00:03'),
(52, 22, '13', 67.00, 'B8003-13', 10, 1, '2021-01-24 19:00:03', '2021-01-24 19:00:03'),
(53, 21, '14', 60.00, 'B90023-14', 10, 1, '2021-01-24 19:00:45', '2021-01-24 19:00:45'),
(54, 21, '18', 80.00, 'B90023-18', 20, 1, '2021-01-24 19:00:45', '2021-01-24 19:00:45');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alert` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `link`, `title`, `alert`, `status`, `created_at`, `updated_at`) VALUES
(1, 'slide-img1.jpg', '/shop', 'Be Summer Ready', 'banner', 1, NULL, '2021-01-25 00:55:26'),
(2, 'slide-img2.jpg', '/shop', 'New Fashion', 'banner', 1, NULL, '2021-01-25 00:55:28'),
(3, 'slide-img3.jpg', '/shop', 'Amazing Chance!', 'banner', 1, NULL, '2021-01-25 00:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Zara', '4905.png', 1, NULL, '2021-01-25 02:53:00'),
(2, 'Defacto', '2032.png', 1, NULL, '2021-01-25 02:53:16'),
(3, 'clvin klein', '2812.png', 1, NULL, '2021-01-25 02:52:36'),
(4, 'OldNavy', '4902.png', 1, NULL, '2021-01-25 02:53:33'),
(6, 'KOTON', '4520.png', 1, '2021-01-17 03:25:40', '2021-01-25 02:54:03'),
(7, 'LOREM', '3003.png', 1, '2021-01-25 02:54:20', '2021-01-25 02:54:20');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_discount` double(8,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `section_id`, `category_name`, `category_image`, `parent_discount`, `description`, `url`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(13, 0, 2, 'winter', '500912.jpg', 0.00, 'Winter Women  Collection', 'winter-woman', 'winter-woman', 'winter-woman', 'winter-woman', 1, '2021-01-17 16:17:41', '2021-01-25 05:38:42'),
(14, 0, 2, 'summer', '419929.jpg', 0.00, 'New Collection \r\nOf Summer For Women', 'summer-woman', 'summer-woman', 'summer-woman', 'summer-woman', 1, '2021-01-17 16:18:32', '2021-01-25 05:36:45'),
(15, 14, 2, 'Dresses', '810990.jpg', 0.00, 'Dresses Woman  Collection', 'summer-woman-dresses', 'summer-woman', 'summer-woman', 'summer-woman', 1, '2021-01-17 16:19:12', '2021-01-25 05:45:24'),
(16, 14, 2, 'jens', '130682.jpg', 0.00, 'Jeans Women Collection', 'summer-woman-jeans', 'summer-woman-jeans', 'summer-woman-jeans', 'summer-woman-jeans', 1, '2021-01-17 16:20:23', '2021-01-25 05:49:36'),
(18, 0, 2, 'spring', '78118.jpg', 0.00, 'Spring  Women Collection', 'woman-shirt', 'spring', 'spring', 'spring', 1, '2021-01-17 16:35:43', '2021-01-25 05:40:14'),
(21, 0, 1, 'winter', '710949.jpg', 0.00, 'Winter Men Collection', 'man-category', 'man', 'man', 'man', 1, '2021-01-17 21:31:45', '2021-01-25 05:43:57'),
(22, 13, 2, 'Sweaters', '155404.jpg', 0.00, 'Sweaters   Collection', 'winter-woman-sweaters', 'Sweaters', 'Sweaters', 'Sweaters', 1, '2021-01-24 16:49:03', '2021-01-25 05:53:02'),
(23, 13, 2, 'Coat & Jackets', '714345.png', 0.00, 'Coat & Jackets  Collection', 'winter-woman-coat', 'Coat & Jackets', 'Coat & Jackets', 'Coat & Jackets', 1, '2021-01-24 17:27:24', '2021-01-25 05:48:15'),
(24, 18, 2, 'T-shirt', '268653.jpg', 0.00, 'T-shirt Collection', 'spring-woman-shirt', 'T-shirt', 'T-shirt', 'T-shirt', 1, '2021-01-24 20:35:33', '2021-01-25 05:52:01'),
(25, 18, 2, 'Skirts', '', 0.00, 'Skirts', 'spring-woman-Skirts', 'Skirts', 'Skirts', 'Skirts', 1, '2021-01-24 20:36:55', '2021-01-24 20:36:55'),
(26, 0, 2, 'Autumn', '112174.jpg', 0.00, 'Autumn  Collection', 'autumn-woman', 'Autumn', 'Autumn', 'Autumn', 1, '2021-01-24 20:38:12', '2021-01-25 05:42:21'),
(27, 26, 2, 'Leggings', '', 0.00, 'Leggings', 'autumn-woman-Leggings', 'Leggings', 'Leggings', 'Leggings', 1, '2021-01-24 20:39:52', '2021-01-24 20:39:52'),
(28, 26, 2, 'Shoes', '', 0.00, 'SHOES', 'autumn-woman-Shoes', 'SHOES', 'SHOES', 'SHOES', 1, '2021-01-24 20:41:03', '2021-01-24 20:41:03');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `quality` int(11) DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `product_id`, `price`, `value`, `quality`, `comment`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 4, 2, 5, 'it is very amazing for having it,I really tend to buy it for me and my sister.im soo happy', '2021-01-12 08:07:49', NULL),
(2, 2, 1, 1, 2, 3, NULL, '2021-01-23 18:58:17', '2021-01-23 18:58:17'),
(3, 2, 1, 2, 2, 2, 'it is very amazing for having it,I really tend to buy it for me and my sister.im soo happy.\r\nit is very amazing for having it,I really tend to buy it for me and my sister.im soo happy.', '2021-01-23 19:00:05', '2021-01-23 19:00:05'),
(4, 2, 1, 4, 5, 3, 'pefect', '2021-01-23 19:03:44', '2021-01-23 19:03:44'),
(5, 2, 2, 5, 5, 5, 'wow it\'s perfect', '2021-01-23 23:02:24', '2021-01-23 23:02:24'),
(6, 3, 4, 4, 4, 5, 'asdnasdnasdnaskdasd', '2021-01-24 03:36:48', '2021-01-24 03:36:48');

-- --------------------------------------------------------

--
-- Table structure for table `compares`
--

CREATE TABLE `compares` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `compares`
--

INSERT INTO `compares` (`id`, `user_id`, `session_id`, `product_id`, `created_at`, `updated_at`) VALUES
(3, 0, 'BBc9TH7DHmdoViUzr3ykkh2Cwd1EJSjyjq5YJE52', 1, '2021-01-22 16:19:05', '2021-01-22 16:19:05'),
(4, 2, '0', 1, '2021-01-22 20:50:09', '2021-01-22 20:50:09'),
(6, 2, '0', 3, '2021-01-22 20:56:47', '2021-01-22 20:56:47'),
(7, 2, '0', 2, '2021-01-22 21:11:16', '2021-01-22 21:11:16'),
(11, 0, 'Z1jn49Sl62JXvoLzeIIR9EPl3arLMTEDCRpVbdOm', 4, '2021-01-24 14:30:03', '2021-01-24 14:30:03'),
(12, 0, 'Z1jn49Sl62JXvoLzeIIR9EPl3arLMTEDCRpVbdOm', 2, '2021-01-24 14:30:16', '2021-01-24 14:30:16'),
(13, 3, '0', 4, '2021-01-24 20:48:13', '2021-01-24 20:48:13'),
(14, 4, '0', 22, '2021-01-24 21:06:12', '2021-01-24 21:06:12'),
(15, 4, '0', 12, '2021-01-24 21:44:42', '2021-01-24 21:44:42'),
(18, 4, '0', 3, '2021-01-24 22:37:26', '2021-01-24 22:37:26'),
(24, 4, '0', 8, '2021-01-24 22:48:17', '2021-01-24 22:48:17'),
(25, 4, '0', 19, '2021-01-24 23:08:08', '2021-01-24 23:08:08'),
(26, 4, '0', 18, '2021-01-24 23:43:44', '2021-01-24 23:43:44'),
(27, 4, '0', 4, '2021-01-25 03:55:06', '2021-01-25 03:55:06'),
(28, 0, 'JRPf84YpV9k6ot4x7PlQxOJ2J9wSonmb9jjYvFBA', 9, '2021-01-26 05:17:38', '2021-01-26 05:17:38'),
(29, 0, 'ZxCDIgKidUG3qK5KzwwXWNXWSFCpjQVrhWdFPFoh', 5, '2021-01-26 14:06:43', '2021-01-26 14:06:43');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `status`) VALUES
(1, 'AF', 'Afghanistan', 1),
(2, 'AL', 'Albania', 1),
(3, 'DZ', 'Algeria', 1),
(4, 'DS', 'American Samoa', 1),
(5, 'AD', 'Andorra', 1),
(6, 'AO', 'Angola', 1),
(7, 'AI', 'Anguilla', 1),
(8, 'AQ', 'Antarctica', 1),
(9, 'AG', 'Antigua and Barbuda', 1),
(10, 'AR', 'Argentina', 1),
(11, 'AM', 'Armenia', 1),
(12, 'AW', 'Aruba', 1),
(13, 'AU', 'Australia', 1),
(14, 'AT', 'Austria', 1),
(15, 'AZ', 'Azerbaijan', 1),
(16, 'BS', 'Bahamas', 1),
(17, 'BH', 'Bahrain', 1),
(18, 'BD', 'Bangladesh', 1),
(19, 'BB', 'Barbados', 1),
(20, 'BY', 'Belarus', 1),
(21, 'BE', 'Belgium', 1),
(22, 'BZ', 'Belize', 1),
(23, 'BJ', 'Benin', 1),
(24, 'BM', 'Bermuda', 1),
(25, 'BT', 'Bhutan', 1),
(26, 'BO', 'Bolivia', 1),
(27, 'BA', 'Bosnia and Herzegovina', 1),
(28, 'BW', 'Botswana', 1),
(29, 'BV', 'Bouvet Island', 1),
(30, 'BR', 'Brazil', 1),
(31, 'IO', 'British Indian Ocean Territory', 1),
(32, 'BN', 'Brunei Darussalam', 1),
(33, 'BG', 'Bulgaria', 1),
(34, 'BF', 'Burkina Faso', 1),
(35, 'BI', 'Burundi', 1),
(36, 'KH', 'Cambodia', 1),
(37, 'CM', 'Cameroon', 1),
(38, 'CA', 'Canada', 1),
(39, 'CV', 'Cape Verde', 1),
(40, 'KY', 'Cayman Islands', 1),
(41, 'CF', 'Central African Republic', 1),
(42, 'TD', 'Chad', 1),
(43, 'CL', 'Chile', 1),
(44, 'CN', 'China', 1),
(45, 'CX', 'Christmas Island', 1),
(46, 'CC', 'Cocos (Keeling) Islands', 1),
(47, 'CO', 'Colombia', 1),
(48, 'KM', 'Comoros', 1),
(49, 'CD', 'Democratic Republic of the Congo', 1),
(50, 'CG', 'Republic of Congo', 1),
(51, 'CK', 'Cook Islands', 1),
(52, 'CR', 'Costa Rica', 1),
(53, 'HR', 'Croatia (Hrvatska)', 1),
(54, 'CU', 'Cuba', 1),
(55, 'CY', 'Cyprus', 1),
(56, 'CZ', 'Czech Republic', 1),
(57, 'DK', 'Denmark', 1),
(58, 'DJ', 'Djibouti', 1),
(59, 'DM', 'Dominica', 1),
(60, 'DO', 'Dominican Republic', 1),
(61, 'TP', 'East Timor', 1),
(62, 'EC', 'Ecuador', 1),
(63, 'EG', 'Egypt', 1),
(64, 'SV', 'El Salvador', 1),
(65, 'GQ', 'Equatorial Guinea', 1),
(66, 'ER', 'Eritrea', 1),
(67, 'EE', 'Estonia', 1),
(68, 'ET', 'Ethiopia', 1),
(69, 'FK', 'Falkland Islands (Malvinas)', 1),
(70, 'FO', 'Faroe Islands', 1),
(71, 'FJ', 'Fiji', 1),
(72, 'FI', 'Finland', 1),
(73, 'FR', 'France', 1),
(74, 'FX', 'France, Metropolitan', 1),
(75, 'GF', 'French Guiana', 1),
(76, 'PF', 'French Polynesia', 1),
(77, 'TF', 'French Southern Territories', 1),
(78, 'GA', 'Gabon', 1),
(79, 'GM', 'Gambia', 1),
(80, 'GE', 'Georgia', 1),
(81, 'DE', 'Germany', 1),
(82, 'GH', 'Ghana', 1),
(83, 'GI', 'Gibraltar', 1),
(84, 'GK', 'Guernsey', 1),
(85, 'GR', 'Greece', 1),
(86, 'GL', 'Greenland', 1),
(87, 'GD', 'Grenada', 1),
(88, 'GP', 'Guadeloupe', 1),
(89, 'GU', 'Guam', 1),
(90, 'GT', 'Guatemala', 1),
(91, 'GN', 'Guinea', 1),
(92, 'GW', 'Guinea-Bissau', 1),
(93, 'GY', 'Guyana', 1),
(94, 'HT', 'Haiti', 1),
(95, 'HM', 'Heard and Mc Donald Islands', 1),
(96, 'HN', 'Honduras', 1),
(97, 'HK', 'Hong Kong', 1),
(98, 'HU', 'Hungary', 1),
(99, 'IS', 'Iceland', 1),
(100, 'IN', 'India', 1),
(101, 'IM', 'Isle of Man', 1),
(102, 'ID', 'Indonesia', 1),
(103, 'IR', 'Iran (Islamic Republic of)', 1),
(104, 'IQ', 'Iraq', 1),
(105, 'IE', 'Ireland', 1),
(106, 'IL', 'Israel', 1),
(107, 'IT', 'Italy', 1),
(108, 'CI', 'Ivory Coast', 1),
(109, 'JE', 'Jersey', 1),
(110, 'JM', 'Jamaica', 1),
(111, 'JP', 'Japan', 1),
(112, 'JO', 'Jordan', 1),
(113, 'KZ', 'Kazakhstan', 1),
(114, 'KE', 'Kenya', 1),
(115, 'KI', 'Kiribati', 1),
(116, 'KP', 'Korea, Democratic People\'s Republic of', 1),
(117, 'KR', 'Korea, Republic of', 1),
(118, 'XK', 'Kosovo', 1),
(119, 'KW', 'Kuwait', 1),
(120, 'KG', 'Kyrgyzstan', 1),
(121, 'LA', 'Lao People\'s Democratic Republic', 1),
(122, 'LV', 'Latvia', 1),
(123, 'LB', 'Lebanon', 1),
(124, 'LS', 'Lesotho', 1),
(125, 'LR', 'Liberia', 1),
(126, 'LY', 'Libyan Arab Jamahiriya', 1),
(127, 'LI', 'Liechtenstein', 1),
(128, 'LT', 'Lithuania', 1),
(129, 'LU', 'Luxembourg', 1),
(130, 'MO', 'Macau', 1),
(131, 'MK', 'North Macedonia', 1),
(132, 'MG', 'Madagascar', 1),
(133, 'MW', 'Malawi', 1),
(134, 'MY', 'Malaysia', 1),
(135, 'MV', 'Maldives', 1),
(136, 'ML', 'Mali', 1),
(137, 'MT', 'Malta', 1),
(138, 'MH', 'Marshall Islands', 1),
(139, 'MQ', 'Martinique', 1),
(140, 'MR', 'Mauritania', 1),
(141, 'MU', 'Mauritius', 1),
(142, 'TY', 'Mayotte', 1),
(143, 'MX', 'Mexico', 1),
(144, 'FM', 'Micronesia, Federated States of', 1),
(145, 'MD', 'Moldova, Republic of', 1),
(146, 'MC', 'Monaco', 1),
(147, 'MN', 'Mongolia', 1),
(148, 'ME', 'Montenegro', 1),
(149, 'MS', 'Montserrat', 1),
(150, 'MA', 'Morocco', 1),
(151, 'MZ', 'Mozambique', 1),
(152, 'MM', 'Myanmar', 1),
(153, 'NA', 'Namibia', 1),
(154, 'NR', 'Nauru', 1),
(155, 'NP', 'Nepal', 1),
(156, 'NL', 'Netherlands', 1),
(157, 'AN', 'Netherlands Antilles', 1),
(158, 'NC', 'New Caledonia', 1),
(159, 'NZ', 'New Zealand', 1),
(160, 'NI', 'Nicaragua', 1),
(161, 'NE', 'Niger', 1),
(162, 'NG', 'Nigeria', 1),
(163, 'NU', 'Niue', 1),
(164, 'NF', 'Norfolk Island', 1),
(165, 'MP', 'Northern Mariana Islands', 1),
(166, 'NO', 'Norway', 1),
(167, 'OM', 'Oman', 1),
(168, 'PK', 'Pakistan', 1),
(169, 'PW', 'Palau', 1),
(170, 'PS', 'Palestine', 1),
(171, 'PA', 'Panama', 1),
(172, 'PG', 'Papua New Guinea', 1),
(173, 'PY', 'Paraguay', 1),
(174, 'PE', 'Peru', 1),
(175, 'PH', 'Philippines', 1),
(176, 'PN', 'Pitcairn', 1),
(177, 'PL', 'Poland', 1),
(178, 'PT', 'Portugal', 1),
(179, 'PR', 'Puerto Rico', 1),
(180, 'QA', 'Qatar', 1),
(181, 'RE', 'Reunion', 1),
(182, 'RO', 'Romania', 1),
(183, 'RU', 'Russian Federation', 1),
(184, 'RW', 'Rwanda', 1),
(185, 'KN', 'Saint Kitts and Nevis', 1),
(186, 'LC', 'Saint Lucia', 1),
(187, 'VC', 'Saint Vincent and the Grenadines', 1),
(188, 'WS', 'Samoa', 1),
(189, 'SM', 'San Marino', 1),
(190, 'ST', 'Sao Tome and Principe', 1),
(191, 'SA', 'Saudi Arabia', 1),
(192, 'SN', 'Senegal', 1),
(193, 'RS', 'Serbia', 1),
(194, 'SC', 'Seychelles', 1),
(195, 'SL', 'Sierra Leone', 1),
(196, 'SG', 'Singapore', 1),
(197, 'SK', 'Slovakia', 1),
(198, 'SI', 'Slovenia', 1),
(199, 'SB', 'Solomon Islands', 1),
(200, 'SO', 'Somalia', 1),
(201, 'ZA', 'South Africa', 1),
(202, 'GS', 'South Georgia South Sandwich Islands', 1),
(203, 'SS', 'South Sudan', 1),
(204, 'ES', 'Spain', 1),
(205, 'LK', 'Sri Lanka', 1),
(206, 'SH', 'St. Helena', 1),
(207, 'PM', 'St. Pierre and Miquelon', 1),
(208, 'SD', 'Sudan', 1),
(209, 'SR', 'Suriname', 1),
(210, 'SJ', 'Svalbard and Jan Mayen Islands', 1),
(211, 'SZ', 'Swaziland', 1),
(212, 'SE', 'Sweden', 1),
(213, 'CH', 'Switzerland', 1),
(214, 'SY', 'Syrian Arab Republic', 1),
(215, 'TW', 'Taiwan', 1),
(216, 'TJ', 'Tajikistan', 1),
(217, 'TZ', 'Tanzania, United Republic of', 1),
(218, 'TH', 'Thailand', 1),
(219, 'TG', 'Togo', 1),
(220, 'TK', 'Tokelau', 1),
(221, 'TO', 'Tonga', 1),
(222, 'TT', 'Trinidad and Tobago', 1),
(223, 'TN', 'Tunisia', 1),
(224, 'TR', 'Turkey', 1),
(225, 'TM', 'Turkmenistan', 1),
(226, 'TC', 'Turks and Caicos Islands', 1),
(227, 'TV', 'Tuvalu', 1),
(228, 'UG', 'Uganda', 1),
(229, 'UA', 'Ukraine', 1),
(230, 'AE', 'United Arab Emirates', 1),
(231, 'GB', 'United Kingdom', 1),
(232, 'US', 'United States', 1),
(233, 'UM', 'United States minor outlying islands', 1),
(234, 'UY', 'Uruguay', 1),
(235, 'UZ', 'Uzbekistan', 1),
(236, 'VU', 'Vanuatu', 1),
(237, 'VA', 'Vatican City State', 1),
(238, 'VE', 'Venezuela', 1),
(239, 'VN', 'Vietnam', 1),
(240, 'VG', 'Virgin Islands (British)', 1),
(241, 'VI', 'Virgin Islands (U.S.)', 1),
(242, 'WF', 'Wallis and Futuna Islands', 1),
(243, 'EH', 'Western Sahara', 1),
(244, 'YE', 'Yemen', 1),
(245, 'ZM', 'Zambia', 1),
(246, 'ZW', 'Zimbabwe', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_option` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categories` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `users` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `expiry_date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_option`, `coupon_code`, `categories`, `users`, `coupon_type`, `amount_type`, `amount`, `expiry_date`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Manual', 'test1', '1,2', 'ehsan1372d@gmail.com', 'single', 'Percentage', 20.00, '2021-03-02', 1, NULL, '2021-01-25 14:00:09'),
(6, 'Automatic', 'n5Sn6UoP', '13,22,23', 'ehsan1372d@gmail.com,a@a.com', 'Single times', 'Fixed', 60.00, '2020-02-02', 1, '2021-01-25 16:32:36', '2021-01-25 16:32:36'),
(7, 'Manual', 'shiraz', '13', 'ehsan1372d@gmail.com', 'Multiple times', 'Percentage', 40.00, '2021-05-05', 1, '2021-01-25 16:33:47', '2021-01-25 17:19:16');

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
(4, '2021_01_12_132959_create_admins_table', 1),
(5, '2021_01_13_114044_create_sections_table', 2),
(6, '2021_01_13_164613_create_categories_table', 3),
(7, '2021_01_15_063226_create_products_table', 4),
(8, '2021_01_15_193700_create_attributes_table', 5),
(9, '2021_01_16_120527_create_product_images_table', 6),
(10, '2021_01_16_174201_create_brands_table', 7),
(11, '2021_01_16_195857_add_column_to_products', 8),
(12, '2021_01_19_194625_create_carts_table', 9),
(13, '2021_01_21_082630_add_columns_to_users_table', 10),
(14, '2021_01_21_204453_create_coupons_table', 11),
(15, '2021_01_22_065116_create_compares_table', 12),
(16, '2021_01_22_131727_create_wishlists_table', 13),
(17, '2021_01_22_163806_create_settings_table', 14),
(18, '2021_01_23_075308_create_comments_table', 15),
(19, '2021_01_24_160236_create_banners_table', 16);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` float NOT NULL,
  `product_discount` float NOT NULL,
  `product_weight` float NOT NULL,
  `product_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `wash_care` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fabric` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pattern` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sleeve` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occasion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_featured` enum('No','Yes') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `section_id`, `brand_id`, `product_name`, `product_code`, `product_color`, `product_price`, `product_discount`, `product_weight`, `product_video`, `main_image`, `description`, `wash_care`, `fabric`, `pattern`, `sleeve`, `fit`, `occasion`, `meta_title`, `meta_description`, `meta_keywords`, `is_featured`, `status`, `created_at`, `updated_at`) VALUES
(3, 13, 2, 2, 'Oversized Garment-Dyed Mock-Neck Sweatshirt for Women', 'B9002', 'orange', 350, 20, 3, 'fo.mp4-7207.mp4', '1607.jpg', 'Rib-knit mock-neck collar.\r\nLong drop-shoulder sleeves.\r\nVented sides at hem.\r\nCozy, soft-washed fleece.\r\nThis sweatshirt is individually garment-dyed for a vintage, one-of-a-kind look.\r\nCenter seam at back.\r\n#630707', 'Don\'t wash with hot water', 'Polyester', 'Checked', 'Full Sleeve', 'Regular', 'Casual', 'Oversized', 'Oversized', 'Oversized', 'Yes', 1, '2021-01-17 21:18:26', '2021-01-17 21:18:26'),
(4, 13, 2, 1, 'Go-Warm Cropped Micro Performance Fleece Funnel-Neck Sweatshirt for Women', 'B800', 'blue', 690, 10, 2, 'fo.mp4-9556.mp4', '1322.jpg', 'Standing funnel-neck collar, with adjustable drawstring.\r\nLong raglan sleeves, with banded cuffs.\r\nCropped, banded hem.\r\nCozy, soft Micro Performance Fleece.\r\nGo-Warm fabric technology retains heat to help keep you warm.\r\nEasy pullover style.\r\n#627461', 'Sweatshirt', 'Cotton', 'Checked', 'Full Sleeve', 'Regular', 'Casual', 'Sweatshirt', 'Sweatshirt', 'Sweatshirt', 'Yes', 1, '2021-01-17 21:23:26', '2021-01-17 21:23:26'),
(5, 13, 2, 1, 'Oversized Half-Zip French Terry Funnel-Neck Sweatshirt for Women', 'B90015', 'black', 255, 0, 3, '', '837.jpg', 'Standing funnel-neck collar, with rib-knit gusset at center front. Gusset can be pulled over your face for extra warmth and coverage.\r\nLong drop-shoulder sleeves, with rib-knit cuffs.\r\nHalf-length zipper from chest to chin.\r\nHorizontal center seam at chest and back.\r\nOn-seam slash pockets at front.\r\nRib-knit hem.\r\nCozy, soft-brushed french terry.\r\n#648296', 'Oversized', 'Cotton', 'Checked', 'Full Sleeve', 'Regular', 'Casual', 'Oversized', 'Oversized', 'Oversized', 'Yes', 1, '2021-01-17 21:26:52', '2021-01-17 21:26:52'),
(6, 21, 1, 1, 'Cozy Marled-Knit Quarter-Zip Sweatshirt for Men', 'B700', 'gray', 350, 15, 5, '', '5488.jpg', 'Standing mock-neck collar.\r\nLong sleeves, with banded cuffs.\r\nQuarter-length zipper from hem to chin.\r\nKangaroo pocket.\r\nCozy, soft-brushed marled-knit cotton blend.\r\n#646162', 'dont wash', 'Cotton', 'Checked', 'Full Sleeve', 'Regular', 'Casual', 'yes', 'yes', 'yes', 'Yes', 1, '2020-01-17 21:33:18', '2021-01-17 21:33:18'),
(7, 22, 2, 4, 'Long Duster Open-Front Cardigan Sweater for Women', 'B1000', 'Cream', 54.99, 0, 3, '', '9723.jpg', 'Imported\r\nRegular fit, long sleeve,solid,and bottom hemline\r\nSmooth texture, super soft, stretchy and breathable fabric. Easy to fit any body shape\r\nChic turtle neck, close and slim design will show your perfect curves\r\nGood for daily wear in autumn and winter.Works great under sweaters and jackets in cold days\r\nUltra feminine design,suitable for any different occasion, leisure, holiday, casual, office and etc', 'Machine wash cold, gentle cycle, lay flat to dry.\r\nImported.', 'Cotton', 'Checked', 'Full Sleeve', 'Regular', 'Casual', 'Long Duster Open-Front Cardigan Sweater for Women', 'Long Duster Open-Front Cardigan Sweater for Women', 'Long, Duster ,Open-Front Cardigan Sweater for Women', 'No', 1, '2021-01-24 16:41:09', '2021-01-24 16:49:30'),
(8, 22, 2, 4, 'Long Duster Cardigan Sweater for Women', 'B2000', 'Light Gray Heather', 55.95, 26, 3, '', '3553.jpg', '65% Polyester, 30% Cotton, 5% Spandex\r\nImported\r\nRegular fit, long sleeve,solid,and bottom hemline\r\nSmooth texture, super soft, stretchy and breathable fabric. Easy to fit any body shape\r\nChic turtle neck, close and slim design will show your perfect curves\r\nGood for daily wear in autumn and winter.Works great under sweaters and jackets in cold days\r\nUltra feminine design,suitable for any different occasion, leisure, holiday, casual, office and etc\r\n65% Polyester, 30% Cotton, 5% Spandex\r\nImported\r\nRegular fit, long sleeve,solid,and bottom hemline\r\nSmooth texture, super soft, stretchy and breathable fabric. Easy to fit any body shape\r\nChic turtle neck, close and slim design will show your perfect curves\r\nGood for daily wear in autumn and winter.Works great under sweaters and jackets in cold days\r\nUltra feminine design,suitable for any different occasion, leisure, holiday, casual, office and etc', 'Machine wash cold, gentle cycle, lay flat to dry.\r\nImported.', 'Cotton', 'Solid', 'Full Sleeve', 'Regular', 'Casual', 'Long Duster Cardigan Sweater for Women', 'Long Duster Cardigan Sweater for Women', 'Long Duster Cardigan Sweater for Women', 'Yes', 1, '2021-01-24 16:57:33', '2021-01-24 16:57:33'),
(9, 22, 2, 4, 'Cozy Textured Pullover Sweater Hoodie for Women', 'B3000', 'Gray', 44.99, 9, 5, '', '8277.jpg', '65% Polyester, 30% Cotton, 5% Spandex\r\nImported\r\nRegular fit, long sleeve,solid,and bottom hemline\r\nSmooth texture, super soft, stretchy and breathable fabric. Easy to fit any body shape\r\nChic turtle neck, close and slim design will show your perfect curves\r\nGood for daily wear in autumn and winter.Works great under sweaters and jackets in cold days\r\nUltra feminine design,suitable for any different occasion, leisure, holiday, casual, office and etc', 'Machine wash cold, gentle cycle, lay flat to dry.\r\nImported.', 'Wool', 'Solid', 'Full Sleeve', 'Regular', 'Casual', 'Cozy Textured Pullover Sweater Hoodie for Women', 'Cozy Textured Pullover Sweater Hoodie for Women', 'Cozy Textured Pullover Sweater Hoodie for Women', 'Yes', 1, '2021-01-24 17:03:18', '2021-01-24 17:03:18'),
(10, 22, 2, 4, 'Short Shawl-Collar Open-Front Sweater for Women', 'B4000', 'Black', 20, 0, 3, '', '2247.jpg', '65% Polyester, 30% Cotton, 5% Spandex\r\nImported\r\nRegular fit, long sleeve,solid,and bottom hemline\r\nSmooth texture, super soft, stretchy and breathable fabric. Easy to fit any body shape\r\nChic turtle neck, close and slim design will show your perfect curves\r\nGood for daily wear in autumn and winter.Works great under sweaters and jackets in cold days\r\nUltra feminine design,suitable for any different occasion, leisure, holiday, casual, office and etc', 'Machine wash cold, gentle cycle, lay flat to dry.\r\nImported.', 'Cotton', 'Checked', 'Full Sleeve', 'Regular', 'Casual', 'Short Shawl-Collar Open-Front Sweater for Women', 'Short Shawl-Collar Open-Front Sweater for Women', 'Short Shawl-Collar Open-Front Sweater for Women', 'No', 1, '2021-01-24 17:10:23', '2021-01-24 17:10:23'),
(11, 22, 2, 1, 'V-Neck Cardi for Women', 'B5000', 'Gray', 25, 15, 3, '', '9326.jpg', 'Thermal_Jackets: 65% Polyester 34% Premium Cotton\r\nSolid_Jackets: 95% Cotton 5% Spandex\r\nZip-up hooded sweater jacket with high-stitch density for longer product life\r\nSplit kangaroo pocket and paneled hood and drawcords allowing light warmth and coverage\r\nFull front zipper closure for easy styling', 'Machine wash cold, gentle cycle, lay flat to dry.\r\nImported.', 'Wool', 'Checked', 'Full Sleeve', 'Regular', 'Casual', 'Thermal_Jackets: 65% Polyester 34% Premium Cotton\r\nSolid_Jackets: 95% Cotton 5% Spandex\r\nZip-up hooded sweater jacket with high-stitch density for longer product life\r\nSplit kangaroo pocket and paneled hood and drawcords allowing light warmth and coverage', 'Thermal_Jackets: 65% Polyester 34% Premium Cotton\r\nSolid_Jackets: 95% Cotton 5% Spandex\r\nZip-up hooded sweater jacket with high-stitch density for longer product life\r\nSplit kangaroo pocket and paneled hood and drawcords allowing light warmth and coverage', 'Thermal_Jackets: 65% Polyester 34% Premium Cotton\r\nSolid_Jackets: 95% Cotton 5% Spandex\r\nZip-up hooded sweater jacket with high-stitch density for longer product life\r\nSplit kangaroo pocket and paneled hood and drawcords allowing light warmth and coverage', 'Yes', 1, '2021-01-24 17:17:30', '2021-01-24 17:17:30'),
(12, 23, 2, 4, 'Water-Resistant Hooded Utility Jacket', 'B7000', 'Ancient Forest', 56, 20, 2, '', '6946.jpg', 'Thermal_Jackets: 65% Polyester 34% Premium Cotton\r\nSolid_Jackets: 95% Cotton 5% Spandex\r\nZip-up hooded sweater jacket with high-stitch density for longer product life\r\nSplit kangaroo pocket and paneled hood and drawcords allowing light warmth and coverage\r\nFull front zipper closure for easy styling', 'Machine wash cold, tumble dry low.\r\nImported.', 'Polyester', 'Checked', 'Full Sleeve', 'Regular', 'Casual', 'Go-H20 Water-Resistant Hooded Utility Jacket for Women', 'Go-H20 Water-Resistant Hooded Utility Jacket for Women', 'Go-H20 Water-Resistant Hooded Utility Jacket for Women', 'Yes', 1, '2021-01-24 17:31:19', '2021-01-24 17:31:19'),
(13, 23, 2, 4, 'Lightweight Diamond Quilted Chambray Puffer Jacket', 'B8000', 'Medium Wash', 80, 0, 3, '', '5110.jpg', 'Thermal_Jackets: 65% Polyester 34% Premium Cotton\r\nSolid_Jackets: 95% Cotton 5% Spandex\r\nZip-up hooded sweater jacket with high-stitch density for longer product life\r\nSplit kangaroo pocket and paneled hood and drawcords allowing light warmth and coverage\r\nFull front zipper closure for easy styling', 'Machine wash cold, tumble dry low.\r\nImported.', 'Polyester', 'Plain', 'Full Sleeve', 'Regular', 'Casual', 'Thermal_Jackets: 65% Polyester 34% Premium Cotton\r\nSolid_Jackets: 95% Cotton 5% Spandex\r\nZip-up hooded sweater jacket with high-stitch density for longer product life\r\nSplit kangaroo pocket and paneled hood and drawcords allowing light warmth and coverage', 'Thermal_Jackets: 65% Polyester 34% Premium Cotton\r\nSolid_Jackets: 95% Cotton 5% Spandex\r\nZip-up hooded sweater jacket with high-stitch density for longer product life\r\nSplit kangaroo pocket and paneled hood and drawcords allowing light warmth and coverage', 'Thermal_Jackets: 65% Polyester 34% Premium Cotton\r\nSolid_Jackets: 95% Cotton 5% Spandex\r\nZip-up hooded sweater jacket with high-stitch density for longer product life\r\nSplit kangaroo pocket and paneled hood and drawcords allowing light warmth and coverage', 'No', 1, '2021-01-24 18:00:47', '2021-01-24 18:00:47'),
(14, 23, 2, 1, 'Cozy Teddy Sherpa Zip Lounge Jacket for Women', 'B9000', 'GRay', 100, 50, 0, '', '2097.jpg', 'Imported\r\nZipper closure\r\nMaterial: 91% Polyester+9% Spandex, this women\'s casual zip up hoodie is skin-friendly, cozy and breathable\r\nSize Guide: Model wearing a size S, Bust 33.1 inches, Waist 23.6 inches, Hip 34.6 inches. Please check Our Size Chart on the Left Picture or Product Description before you purchase\r\nUnique Design: Full zip-up hoodie, long sleeves sweatshirts, classic solid color jacket, adjustable drawstring hooded outwear, casual and soft tops, elastic cuffs and hem, two side pockets on the front\r\nOccasion: This hooded loose sweatshirt is suit for leisure, work, school, sports,street wear and more occasion, tunic length perfect to pair with jeans, shorts, leggings or jogpants for a casual style in spring autumn and winter\r\nGarment care: Hand wash or machine wash with cold water, do not bleach to avoid fading. If you have queations about the product or dissatisfied, please contact us at any time, we offer you the best solution. YOUR SATISFACTION IS OUR MAIN CONCERN', 'Machine wash cold, tumble dry low.\r\nImported.', 'Pure_Cotton', 'Checked', 'Full Sleeve', 'Slim', 'Casual', 'Cozy Teddy Sherpa Zip Lounge Jacket for Women', 'Cozy Teddy Sherpa Zip Lounge Jacket for Women', 'Cozy Teddy Sherpa Zip Lounge Jacket for Women', 'Yes', 1, '2021-01-24 18:07:00', '2021-01-24 18:07:00'),
(15, 15, 2, 1, 'Fitted Tie-Dye T-Shirt Dress for Women', 'B901', 'Pink Tie-Dye', 30, 2, 2, '', '9116.jpg', 'Rib-knit crew neck.\r\nShort sleeves.\r\nSoft-washed 100% cotton jersey for the ultimate soft t-shirt dress. We put it through the wringer so you don\'t have to.\r\nYou\'ve got a one-of-a-kind tie-dyed t-shirt dress here. Variations are to be expected & celebrated.\r\nClassically comfortable in a contoured silhouette, the t-shirt dress fits you to a well, you know...😉\r\n#647010', 'Machine wash cold, tumble dry low.\r\nImported.', 'Polyester', 'Self', 'Half Sleeve', 'Regular', 'Casual', 'Fitted Tie-Dye T-Shirt Dress for Women', 'Fitted Tie-Dye T-Shirt Dress for Women', 'Fitted Tie-Dye T-Shirt Dress for Women', 'Yes', 1, '2021-01-24 18:25:27', '2021-01-24 18:25:27'),
(16, 15, 2, 4, 'Specially Dyed Sleeveless Maxi Shift Dress for Women', 'B9002', 'Cool Blue Tie-Dye', 20, 0, 3, '', '6214.jpg', 'Adjustable spaghetti straps cross in back.\r\nV-neck.\r\nSuper-soft, medium-weight woven rayon.\r\nYou\'ve got a specially dyed, one-of-a-kind sundress here. Variations are to be expected & celebrated.\r\nFor those go-with-the-flow moments, take it to the maxi. A long, ankle-grazing silhouette with maximum impact.\r\n#646995', 'Machine wash cold, tumble dry low.\r\nImported.', 'Cotton', 'Self', 'Half Sleeve', 'Regular', 'Casual', 'Specially Dyed Sleeveless Maxi Shift Dress for Women', 'Specially Dyed Sleeveless Maxi Shift Dress for Women', 'Specially Dyed Sleeveless Maxi Shift Dress for Women', 'No', 1, '2021-01-24 18:29:05', '2021-01-24 18:29:05'),
(17, 15, 2, 4, 'Dip-Dyed French Terry Sweatshirt Shift Dress for Women', 'B9003', 'Cool Tie Dye', 30, 5, 3, '', '7790.jpg', 'Rib-knit crew neck, with v-shaped notch at center front yoke.\r\nLong drop-shoulder blouson sleeves, with rib-knit cuffs.\r\nRib-knit hem.\r\nCozy, soft-brushed french terry.\r\nYou\'ve got a one-of-a-kind, specially dip-dyed sweatshirt dress here. Variations are to be expected & celebrated.\r\nStraight & simple in a relaxed fit. The shift dress effortlessly \"shifts\" from desk to dinner. (See what we did there?)\r\n#647164', 'Machine wash cold, tumble dry low.\r\nImported.', 'Cotton', 'Checked', 'Sleeveless', 'Regular', 'Casual', 'Dip-Dyed French Terry Sweatshirt Shift Dress for Women', 'Dip-Dyed French Terry Sweatshirt Shift Dress for Women', 'Dip-Dyed French Terry Sweatshirt Shift Dress for Women', 'Yes', 1, '2021-01-24 18:32:18', '2021-01-24 18:32:18'),
(18, 15, 2, 4, 'Plaid Flannel Western Shirt Dress for Women', 'B90005', 'Navy Plaid', 36, 0, 2, '', '7445.jpg', 'Spread collar.\r\nWestern-style seams at front and back yoke.\r\nLong sleeves, with double pearlized snap-button cuffs.\r\nen pearlized snap-buttons at placket.\r\nWestern-style snap-flap patch pockets at chest.\r\nSoft-brushed, 100% cotton flannel, with all-over plaid pattern.\r\nStyled like a shirt, looks like a dress. Total knockout. That was easy.\r\n#647172', 'Machine wash cold, tumble dry low.\r\nImported.', 'Cotton', 'Checked', 'Sleeveless', 'Regular', 'Casual', 'Plaid Flannel Western Shirt Dress for Women', 'Plaid Flannel Western Shirt Dress for Women', 'Plaid Flannel Western Shirt Dress for Women', 'No', 1, '2021-01-24 18:35:24', '2021-01-24 18:35:24'),
(19, 16, 2, 6, 'Straight Mineral-Dye Jeans for Women', 'B8001', 'Merzouga', 39.99, 2, 3, '', '8733.jpg', 'The straight dope on our O.G. Straight Jeans? Think \'90s nostalgia meets new-normal comfort, served straight up. Accept no substitutes.\r\nContoured high-rise waistband, with button closure and built-in belt loops.\r\nZip fly.\r\nRiveted scoop pockets and coin pocket at front; patch pockets at back.\r\nClever Secret-Slim front pockets hold you in for a slimming effect---instant confidence boost.\r\nSoft, durable pop-color wash cotton denim, with comfortable stretch to flatter all shapes.\r\nThe non-petroleum mineral dyes used for these jeans were pulled from the soil. Derived from nature with no chemicals used. A color palette only nature could create.\r\nUses less water & energy than standard dyes.\r\nNever-Quit Shape Retention holds its shape and hugs in all the right places, wear after wear.\r\nUniversally flattering on all shapes, including straight and curvy.\r\nTag-free label inside back waist for added comfort.\r\n#673547', 'Machine wash cold, gentle cycle, hang dry.\r\nImported.', 'Cotton', 'Checked', 'Full Sleeve', 'Regular', 'Casual', 'High-Waisted O.G. Straight Mineral-Dye Jeans for Women', 'High-Waisted O.G. Straight Mineral-Dye Jeans for Women', 'High-Waisted O.G. Straight Mineral-Dye Jeans for Women', 'Yes', 1, '2021-01-24 18:47:29', '2021-01-24 18:47:29'),
(20, 16, 2, 2, 'Straight Ripped Ankle Jeans for Women', 'B90018', 'Blue', 49, 30, 2, '', '4887.jpg', 'The straight dope on our O.G. Straight Jeans? Think \'90s nostalgia meets new-normal comfort, served straight up. Accept no substitutes.\r\nContoured high-rise waistband, with button closure and zip fly.\r\nZip fly.\r\nRiveted scoop pockets and coin pocket at front; patch pockets at back.\r\nClever Secret-Slim front pockets hold you in for a slimming effect---instant confidence boost.\r\nRipped knees, abrasions, sandblasting and whiskering create a distressed, lived-in look.\r\nSoft, durable dark-wash cotton denim, with comfortable stretch to flatter all shapes.\r\nNever-Quit Shape Retention holds its shape and hugs in all the right places, wear after wear.\r\nUniversally flattering on all shapes, including straight and curvy.\r\nTag-free label inside back waist for added comfort.\r\n#611018', 'Machine wash cold, gentle cycle, hang dry.\r\nImported.', 'Cotton', 'Checked', 'Full Sleeve', 'Regular', 'Casual', 'Straight Ripped Ankle Jeans for Women', 'Straight Ripped Ankle Jeans for Women', 'Straight Ripped Ankle Jeans for Women', 'Yes', 1, '2021-01-24 18:51:36', '2021-01-24 18:54:02'),
(21, 16, 2, 6, 'Straight Ankle Jeans for Women', 'B90023', 'Stephanie', 60, 0, 2, '', '4795.jpg', 'The straight dope on our O.G. Straight Jeans? Think \'90s nostalgia meets new-normal comfort, served straight up. Accept no substitutes.\r\nContoured high-rise waistband, with button closure and zip fly.\r\nZip fly.\r\nRiveted scoop pockets and coin pocket at front; patch pockets at back.\r\nClever Secret-Slim front pockets hold you in for a slimming effect---instant confidence boost.\r\nSoft, durable light-wash cotton denim, with comfortable stretch to flatter all shapes.\r\nFading and bleaching create a vintage, lived-in look.\r\nNever-Quit Shape Retention holds its shape and hugs in all the right places, wear after wear.\r\nUniversally flattering on all shapes, including straight and curvy.\r\nTag-free label inside back waist for added comfort.\r\n#610935', 'Machine wash cold, gentle cycle, hang dry.\r\nImported.', 'Cotton', 'Checked', 'Full Sleeve', 'Regular', 'Casual', 'Stephanie', 'Stephanie', 'Stephanie', 'No', 1, '2021-01-24 18:56:07', '2021-01-24 18:58:22'),
(22, 16, 2, 4, 'Mineral-Dye Jeans for Women', 'B8003', 'Fuji Brown', 64.56, 30, 2, '', '991.jpg', 'The straight dope on our O.G. Straight Jeans? Think \'90s nostalgia meets new-normal comfort, served straight up. Accept no substitutes.\r\nContoured high-rise waistband, with button closure and built-in belt loops.\r\nZip fly.\r\nRiveted scoop pockets and coin pocket at front; patch pockets at back.\r\nClever Secret-Slim front pockets hold you in for a slimming effect---instant confidence boost.\r\nSoft, durable pop-color wash cotton denim, with comfortable stretch to flatter all shapes.\r\nThe non-petroleum mineral dyes used for these jeans were pulled from the soil. Derived from nature with no chemicals used. A color palette only nature could create.\r\nUses less water & energy than standard dyes.\r\nNever-Quit Shape Retention holds its shape and hugs in all the right places, wear after wear.\r\nUniversally flattering on all shapes, including straight and curvy.\r\nTag-free label inside back waist for added comfort.\r\n#673547', 'Machine wash cold, gentle cycle, hang dry.\r\nImported.', 'Cotton', 'Checked', 'Full Sleeve', 'Regular', 'Casual', 'Mineral-Dye Jeans for Women', 'Mineral-Dye Jeans for Women', 'Mineral-Dye Jeans for Women', 'Yes', 1, '2021-01-24 18:57:48', '2021-01-24 21:35:52');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(9, 1, '3324031610884733.jpg', 1, '2021-01-17 19:58:53', '2021-01-17 19:58:53'),
(10, 1, '2995071610884733.jpg', 1, '2021-01-17 19:58:53', '2021-01-17 19:58:53'),
(11, 4, '5119121610889877.jpg', 1, '2021-01-17 21:24:37', '2021-01-17 21:24:37'),
(12, 4, '5240841610889877.jpg', 1, '2021-01-17 21:24:37', '2021-01-17 21:24:37'),
(13, 4, '8651261610889877.jpg', 1, '2021-01-17 21:24:37', '2021-01-17 21:24:37'),
(14, 5, '3436631610890033.jpg', 1, '2021-01-17 21:27:13', '2021-01-17 21:27:13'),
(15, 6, '9815781610890421.jpg', 1, '2021-01-17 21:33:41', '2021-01-17 21:33:41'),
(16, 6, '3087551610890421.jpg', 1, '2021-01-17 21:33:41', '2021-01-17 21:33:41'),
(17, 6, '7069491610890421.jpg', 1, '2021-01-17 21:33:41', '2021-01-17 21:33:41'),
(18, 7, '6810761611477714.jpg', 1, '2021-01-24 16:41:54', '2021-01-24 16:41:54'),
(19, 7, '1188611611477715.jpg', 1, '2021-01-24 16:41:55', '2021-01-24 16:41:55'),
(20, 7, '6555681611477715.jpg', 1, '2021-01-24 16:41:55', '2021-01-24 16:41:55'),
(21, 8, '4549601611478676.jpg', 1, '2021-01-24 16:57:56', '2021-01-24 16:57:56'),
(22, 8, '6034631611478676.jpg', 1, '2021-01-24 16:57:57', '2021-01-24 16:57:57'),
(23, 8, '4805571611478677.jpg', 1, '2021-01-24 16:57:57', '2021-01-24 16:57:57'),
(24, 9, '403371611479024.jpg', 1, '2021-01-24 17:03:44', '2021-01-24 17:03:44'),
(25, 9, '7650811611479024.jpg', 1, '2021-01-24 17:03:44', '2021-01-24 17:03:44'),
(26, 9, '4012641611479024.jpg', 1, '2021-01-24 17:03:44', '2021-01-24 17:03:44'),
(27, 10, '1476371611479441.jpg', 1, '2021-01-24 17:10:41', '2021-01-24 17:10:41'),
(28, 10, '8652341611479441.jpg', 1, '2021-01-24 17:10:42', '2021-01-24 17:10:42'),
(29, 11, '9242801611479868.jpg', 1, '2021-01-24 17:17:49', '2021-01-24 17:17:49'),
(30, 11, '7884701611479869.jpg', 1, '2021-01-24 17:17:49', '2021-01-24 17:17:49'),
(31, 11, '7031361611479869.jpg', 1, '2021-01-24 17:17:49', '2021-01-24 17:17:49'),
(32, 11, '6106301611479869.jpg', 1, '2021-01-24 17:17:49', '2021-01-24 17:17:49'),
(33, 12, '8878661611481955.jpg', 1, '2021-01-24 17:52:35', '2021-01-24 17:52:35'),
(34, 12, '779211611481955.jpg', 1, '2021-01-24 17:52:36', '2021-01-24 17:52:36'),
(35, 12, '1023051611481956.jpg', 1, '2021-01-24 17:52:36', '2021-01-24 17:52:36'),
(36, 12, '7414201611481956.jpg', 1, '2021-01-24 17:52:36', '2021-01-24 17:52:36'),
(37, 13, '7983351611482560.jpg', 1, '2021-01-24 18:02:40', '2021-01-24 18:02:40'),
(38, 13, '5336851611482560.jpg', 1, '2021-01-24 18:02:41', '2021-01-24 18:02:41'),
(39, 13, '7646471611482561.jpg', 1, '2021-01-24 18:02:41', '2021-01-24 18:02:41'),
(40, 13, '9765761611482561.jpg', 1, '2021-01-24 18:02:41', '2021-01-24 18:02:41'),
(41, 14, '2821181611482841.jpg', 1, '2021-01-24 18:07:21', '2021-01-24 18:07:21'),
(42, 14, '3996731611482842.jpg', 1, '2021-01-24 18:07:22', '2021-01-24 18:07:22'),
(43, 14, '576771611482842.jpg', 1, '2021-01-24 18:07:22', '2021-01-24 18:07:22'),
(44, 15, '3973921611483958.jpg', 1, '2021-01-24 18:25:59', '2021-01-24 18:25:59'),
(45, 15, '2761761611483959.jpg', 1, '2021-01-24 18:25:59', '2021-01-24 18:25:59'),
(46, 15, '6649681611483959.jpg', 1, '2021-01-24 18:25:59', '2021-01-24 18:25:59'),
(47, 15, '9138611611483959.jpg', 1, '2021-01-24 18:25:59', '2021-01-24 18:25:59'),
(48, 16, '7111611611484166.jpg', 1, '2021-01-24 18:29:26', '2021-01-24 18:29:26'),
(49, 16, '3588181611484167.jpg', 1, '2021-01-24 18:29:27', '2021-01-24 18:29:27'),
(50, 16, '8225391611484167.jpg', 1, '2021-01-24 18:29:27', '2021-01-24 18:29:27'),
(51, 16, '7455341611484167.jpg', 1, '2021-01-24 18:29:27', '2021-01-24 18:29:27'),
(52, 17, '7485041611484367.jpg', 1, '2021-01-24 18:32:47', '2021-01-24 18:32:47'),
(53, 17, '5827651611484367.jpg', 1, '2021-01-24 18:32:47', '2021-01-24 18:32:47'),
(54, 17, '2657431611484367.jpg', 1, '2021-01-24 18:32:47', '2021-01-24 18:32:47'),
(55, 17, '1147731611484367.jpg', 1, '2021-01-24 18:32:47', '2021-01-24 18:32:47'),
(56, 18, '9777971611484547.jpg', 1, '2021-01-24 18:35:47', '2021-01-24 18:35:47'),
(57, 18, '9688251611484547.jpg', 1, '2021-01-24 18:35:47', '2021-01-24 18:35:47'),
(58, 18, '6042801611484547.jpg', 1, '2021-01-24 18:35:48', '2021-01-24 18:35:48'),
(59, 18, '1787041611484548.jpg', 1, '2021-01-24 18:35:48', '2021-01-24 18:35:48'),
(60, 19, '2550271611485346.jpg', 1, '2021-01-24 18:49:06', '2021-01-24 18:49:06'),
(61, 19, '753361611485346.jpg', 1, '2021-01-24 18:49:06', '2021-01-24 18:49:06'),
(62, 19, '8696791611485346.jpg', 1, '2021-01-24 18:49:06', '2021-01-24 18:49:06'),
(63, 19, '6015181611485346.jpg', 1, '2021-01-24 18:49:06', '2021-01-24 18:49:06'),
(64, 20, '2654221611485589.jpg', 1, '2021-01-24 18:53:09', '2021-01-24 18:53:09'),
(65, 20, '6473901611485589.jpg', 1, '2021-01-24 18:53:09', '2021-01-24 18:53:09'),
(66, 20, '8737721611485589.jpg', 1, '2021-01-24 18:53:09', '2021-01-24 18:53:09'),
(67, 22, '7530521611485923.jpg', 1, '2021-01-24 18:58:43', '2021-01-24 18:58:43'),
(68, 22, '7042991611485923.jpg', 1, '2021-01-24 18:58:43', '2021-01-24 18:58:43'),
(69, 22, '3323501611485923.jpg', 1, '2021-01-24 18:58:44', '2021-01-24 18:58:44'),
(70, 21, '2239471611485945.jpg', 1, '2021-01-24 18:59:06', '2021-01-24 18:59:06'),
(71, 21, '1381281611485946.jpg', 1, '2021-01-24 18:59:06', '2021-01-24 18:59:06'),
(72, 21, '5607291611485946.jpg', 1, '2021-01-24 18:59:06', '2021-01-24 18:59:06'),
(73, 21, '2516161611485946.jpg', 1, '2021-01-24 18:59:06', '2021-01-24 18:59:06'),
(75, 24, '5578131611598446.jpg', 1, '2021-01-26 02:14:06', '2021-01-26 02:14:06');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'man', 1, NULL, '2021-01-14 12:34:33'),
(2, 'woman', 1, NULL, '2021-01-14 00:21:49'),
(3, 'kids', 1, NULL, '2021-01-14 00:12:54');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rss` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinterest` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_plus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vimeo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `shop_title`, `hotline`, `email`, `logo`, `about`, `address`, `instagram`, `facebook`, `linkedin`, `rss`, `youtube`, `pinterest`, `google_plus`, `skype`, `vimeo`, `created_at`, `updated_at`) VALUES
(1, 'Narstyle', '+1 123 456 7890', 'narstyle@info.com', '1948.png', 'Imagine that the world runs right and there’s a place that offers clothing .', 'New York, USA', '', '#', '#', '#', '#', '#', '#', '#', '#', NULL, '2021-01-23 02:59:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `city`, `country`, `mobile`, `email`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'ehsan', 'tehran shiraz', '', 'Angola', '23695486321', 'ehsan1372d@gmail.com', NULL, '$2y$10$55v.wlNjCceGcVF9s8k7COTpeGreN8/s8Z2sLhFT9AsDovf5ZiHLC', 0, NULL, '2021-01-24 03:36:09', '2021-01-26 00:48:55'),
(4, 'ehsan', '', '', '', '09374939748', 'a@a.com', NULL, '$2y$10$Ih1uN61tN8I4f0rtmaIOdOQcshWoloOCiEc/2Fz/iBMd/T4tILrGS', 1, NULL, '2021-01-24 20:55:16', '2021-01-24 20:55:16'),
(5, 'ehsan', '', '', '', '09374939748', 'a@a.comsdds', NULL, '$2y$10$xwqcSIPD7jX9awkHV6ENpOT9PAZqJjLPkhNdnbIycPNT8pMs4AmhW', 0, NULL, '2021-01-25 23:14:26', '2021-01-25 23:14:26'),
(6, 'ehsan', '', '', '', '09374939748', 'ehsan1372wd@gmail.com', NULL, '$2y$10$0FSXehgmt28WEliCwVQSb.OwW2ZVTLouXqvc52aVnO3gzwk00LW4m', 0, NULL, '2021-01-25 23:15:22', '2021-01-25 23:15:22');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `session_id`, `product_id`, `created_at`, `updated_at`) VALUES
(3, 2, '0', 1, '2021-01-22 22:14:35', '2021-01-22 22:14:35'),
(4, 2, '0', 3, '2021-01-22 22:17:55', '2021-01-22 22:17:55'),
(5, 2, '0', 6, '2021-01-22 22:19:33', '2021-01-22 22:19:33'),
(6, 2, '0', 4, '2021-01-22 23:09:12', '2021-01-22 23:09:12'),
(9, 0, 'hHIRzNEhXlySgopS6XhYgF7LVqSqNos2ZCoU7bGC', 4, '2021-01-24 03:33:48', '2021-01-24 03:33:48'),
(16, 0, 'Z1jn49Sl62JXvoLzeIIR9EPl3arLMTEDCRpVbdOm', 5, '2021-01-24 14:29:59', '2021-01-24 14:29:59'),
(17, 0, 'Z1jn49Sl62JXvoLzeIIR9EPl3arLMTEDCRpVbdOm', 3, '2021-01-24 14:30:07', '2021-01-24 14:30:07'),
(18, 0, 'Z1jn49Sl62JXvoLzeIIR9EPl3arLMTEDCRpVbdOm', 2, '2021-01-24 14:30:10', '2021-01-24 14:30:10'),
(19, 3, '0', 4, '2021-01-24 20:48:09', '2021-01-24 20:48:09'),
(21, 4, '0', 20, '2021-01-24 20:55:49', '2021-01-24 20:55:49'),
(22, 4, '0', 22, '2021-01-24 21:06:08', '2021-01-24 21:06:08'),
(23, 4, '0', 12, '2021-01-24 21:44:34', '2021-01-24 21:44:34'),
(25, 4, '0', 3, '2021-01-24 22:37:24', '2021-01-24 22:37:24'),
(26, 4, '0', 10, '2021-01-24 22:40:14', '2021-01-24 22:40:14'),
(27, 4, '0', 11, '2021-01-24 22:40:37', '2021-01-24 22:40:37'),
(28, 4, '0', 4, '2021-01-24 22:41:23', '2021-01-24 22:41:23'),
(29, 4, '0', 5, '2021-01-24 22:41:25', '2021-01-24 22:41:25'),
(30, 4, '0', 18, '2021-01-24 22:41:33', '2021-01-24 22:41:33'),
(31, 4, '0', 19, '2021-01-24 22:41:36', '2021-01-24 22:41:36'),
(32, 4, '0', 14, '2021-01-24 22:42:50', '2021-01-24 22:42:50'),
(34, 4, '0', 7, '2021-01-24 22:44:07', '2021-01-24 22:44:07'),
(35, 4, '0', 8, '2021-01-24 22:48:14', '2021-01-24 22:48:14'),
(36, 4, '0', 15, '2021-01-24 23:02:02', '2021-01-24 23:02:02'),
(37, 4, '0', 13, '2021-01-24 23:06:20', '2021-01-24 23:06:20'),
(38, 4, '0', 6, '2021-01-24 23:37:27', '2021-01-24 23:37:27'),
(39, 0, 'JRPf84YpV9k6ot4x7PlQxOJ2J9wSonmb9jjYvFBA', 9, '2021-01-26 05:17:41', '2021-01-26 05:17:41'),
(40, 0, 'JRPf84YpV9k6ot4x7PlQxOJ2J9wSonmb9jjYvFBA', 7, '2021-01-26 05:18:18', '2021-01-26 05:18:18'),
(44, 0, 'ZxCDIgKidUG3qK5KzwwXWNXWSFCpjQVrhWdFPFoh', 5, '2021-01-26 13:01:35', '2021-01-26 13:01:35'),
(45, 0, 'ZxCDIgKidUG3qK5KzwwXWNXWSFCpjQVrhWdFPFoh', 21, '2021-01-26 14:13:13', '2021-01-26 14:13:13'),
(46, 0, 'ZxCDIgKidUG3qK5KzwwXWNXWSFCpjQVrhWdFPFoh', 6, '2021-01-26 15:44:05', '2021-01-26 15:44:05');

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
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `compares`
--
ALTER TABLE `compares`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `compares`
--
ALTER TABLE `compares`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
