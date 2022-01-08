-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2022 at 04:39 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fournishop`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`options`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `label`, `options`, `created_at`, `updated_at`) VALUES
(59, 'size', 'Size', '[{\"name\":\"10cm\",\"price\":2},{\"name\":\"20cm\",\"price\":22}]', '2021-12-20 00:47:48', '2021-12-20 00:47:48'),
(60, 'material', 'Material', NULL, '2021-12-20 00:48:18', '2021-12-20 00:48:18'),
(61, 'impression', 'Impression', '[{\"name\":\"recto\",\"price\":0,\"requiredFilesProperties\":[{\"name\":\"Recto\"}]},{\"name\":\"recto verso\",\"price\":0,\"requiredFilesProperties\":[{\"name\":\"recto\"},{\"name\":\"verso\"}]}]', '2021-12-20 19:36:54', '2021-12-20 19:36:54'),
(63, 'papier', 'Papier', '[{\"name\":\"standard\",\"price\":0,\"requiredFilesProperties\":[]},{\"name\":\"Rigide\",\"price\":0.2,\"requiredFilesProperties\":[]}]', '2022-01-03 13:29:06', '2022-01-03 13:29:06'),
(64, 'type_de_coin', 'Type de coin', '[{\"name\":\"normal\",\"price\":0,\"requiredFilesProperties\":[]},{\"name\":\"teron\",\"price\":0.1,\"requiredFilesProperties\":[]}]', '2022-01-03 13:29:54', '2022-01-03 13:29:54');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_product`
--

CREATE TABLE `attribute_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`options`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_product`
--

INSERT INTO `attribute_product` (`id`, `attribute_id`, `product_id`, `options`, `created_at`, `updated_at`) VALUES
(288, 59, 22, '[{\"name\":\"10cm\",\"price\":0,\"ref\":\"514ac787-1a7b-4b3c-8dc5-e85d32e13b91AqrOzwwpx5\"},{\"name\":\"20cm\",\"price\":0,\"ref\":\"d31d95f9-b553-4ad2-90a7-fcc86d5d407fQMOCaBOfg8\"}]', NULL, NULL),
(289, 60, 22, '[{\"name\":\"mat\",\"price\":0,\"requiredFilesProperties\":[],\"ref\":\"784887c7-86a5-4b46-b3dd-d041c2cb8368aegwWJSQR3\"},{\"name\":\"sync\",\"price\":0.3,\"requiredFilesProperties\":[],\"ref\":\"43e74b4a-eef3-42de-a8fb-23f8613d48e4w4veH8mqIC\"}]', NULL, NULL),
(290, 63, 22, '[{\"name\":\"standard\",\"price\":0,\"requiredFilesProperties\":[],\"ref\":\"fd926107-f388-4f58-8373-e5e6709fcaa7PGIXIouR3g\"},{\"name\":\"Rigide\",\"price\":0.2,\"requiredFilesProperties\":[],\"ref\":\"14e8ff8e-8bc1-4a4c-9fe1-061b95fc636cmr84OSnLvW\"}]', NULL, NULL),
(291, 64, 22, '[{\"name\":\"normal\",\"price\":0,\"requiredFilesProperties\":[],\"ref\":\"d68254a4-70f3-4ccc-aa7f-f103c65c2a2cj4UMpE46Dd\"},{\"name\":\"teron\",\"price\":0.1,\"requiredFilesProperties\":[],\"ref\":\"89f5834c-de3a-4d5a-a375-7a58dd3e2addipyCO220wc\"}]', NULL, NULL),
(292, 61, 22, '[{\"name\":\"recto\",\"price\":0,\"requiredFilesProperties\":[{\"name\":\"recto\"}],\"ref\":\"0734d37c-21f7-4cdd-8423-2a59393a9a1drBPfU5zhP0\"},{\"name\":\"recto verso\",\"price\":0,\"requiredFilesProperties\":[{\"name\":\"recto\"},{\"name\":\"verso\"}],\"ref\":\"4623588f-4b1d-4ac8-b420-7c7c0a4f1a0eiRYySidnhU\"}]', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `discount_price` double(8,2) NOT NULL DEFAULT 0.00,
  `coupon_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `subtotal`, `discount_price`, `coupon_code`, `user_id`, `created_at`, `updated_at`) VALUES
(14, 100.00, 20.00, '-20off', 1, '2022-01-07 12:57:18', '2022-01-08 13:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `selected_options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`selected_options`)),
  `design_by_company` tinyint(1) NOT NULL DEFAULT 0,
  `design_information` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `quantity`, `subtotal`, `selected_options`, `design_by_company`, `design_information`, `cart_id`, `product_id`, `created_at`, `updated_at`) VALUES
(113, 57, 85.00, '[]', 0, '', 14, 30, '2022-01-07 13:06:40', '2022-01-07 16:31:30'),
(115, 100, 120.00, '{\"size\":\"514ac787-1a7b-4b3c-8dc5-e85d32e13b91AqrOzwwpx5\",\"material\":\"784887c7-86a5-4b46-b3dd-d041c2cb8368aegwWJSQR3\",\"papier\":\"14e8ff8e-8bc1-4a4c-9fe1-061b95fc636cmr84OSnLvW\",\"type_de_coin\":\"d68254a4-70f3-4ccc-aa7f-f103c65c2a2cj4UMpE46Dd\",\"impression\":\"4623588f-4b1d-4ac8-b420-7c7c0a4f1a0eiRYySidnhU\"}', 0, '', 14, 22, '2022-01-07 13:35:02', '2022-01-08 13:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `promotion_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `promotion_label`, `meta_title`, `meta_description`, `meta_keywords`, `group_id`, `created_at`, `updated_at`) VALUES
(1, 'Ria Briggs', 'hh', 'Ex vel repellendus', 'Assumenda cupiditate', 'Do dolore in perfere', 'Omnis in voluptas es', 1, '2021-12-15 20:44:07', '2021-12-30 09:33:48'),
(2, 'Emmanuel Patterson', 'Commodi veniam quas', 'Cupiditate officiis', 'Quas omnis quia quia', 'Eos eos voluptas i', 'Voluptates exercitat', 1, '2021-12-30 12:01:01', '2021-12-30 12:01:01'),
(3, 'Prescott Rasmussen', 'Libero autem ad cons', 'prix casse', 'Exercitation cupidat', 'Id nihil sed deserun', 'Laudantium eaque au', 3, '2021-12-30 12:01:08', '2021-12-31 14:32:09'),
(4, 'Octavius Jefferson', 'Et quas qui officiis', 'Voluptatem sit lab', 'Veritatis qui nihil', 'In placeat exceptur', 'Qui non id est qui', 3, '2021-12-30 12:01:15', '2021-12-30 12:01:15'),
(5, 'Thor Rosario', 'Incididunt inventore', 'Et sed eu eiusmod re', 'Totam qui saepe est', 'Aliquam minima qui c', 'Cumque quod amet vo', 3, '2021-12-30 12:01:24', '2021-12-30 12:01:24'),
(6, 'carte visite', 'carte-visite', '-50%', 'Mollitia quae cupidi', 'Dignissimos et dolor', 'Nam est numquam iste', 6, '2021-12-30 19:20:55', '2022-01-04 19:00:34');

-- --------------------------------------------------------

--
-- Table structure for table `category_groups`
--

CREATE TABLE `category_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` bigint(20) NOT NULL,
  `visible_in_menu` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_groups`
--

INSERT INTO `category_groups` (`id`, `name`, `position`, `visible_in_menu`, `created_at`, `updated_at`) VALUES
(1, 'Alana Blair', 100, 1, '2021-12-15 20:43:43', '2021-12-15 20:43:43'),
(2, 'Brock Maxwell', 23, 1, '2021-12-29 17:28:44', '2021-12-29 17:28:44'),
(3, 'Jasmine Pierce', 33, 1, '2021-12-29 17:28:49', '2021-12-29 17:28:49'),
(4, 'Aquila Franks', 88, 0, '2021-12-29 17:28:53', '2021-12-31 14:29:19'),
(5, 'Robin Stuart', 21, 1, '2021-12-29 17:28:57', '2021-12-29 17:28:57'),
(6, 'Justin Sexton', 47, 0, '2021-12-29 17:29:01', '2021-12-31 14:28:58'),
(7, 'Sacha Fuller', 66, 0, '2021-12-29 17:29:12', '2021-12-30 16:13:30'),
(8, 'Tate Chase', 13, 1, '2021-12-29 17:29:25', '2021-12-30 09:21:55'),
(9, 'Camden Wood', 84, 0, '2021-12-29 17:29:29', '2021-12-30 16:13:24'),
(10, 'Desirae Ray', 90, 1, '2021-12-29 17:29:33', '2021-12-31 14:29:48'),
(11, 'Haviva Walton', 25, 0, '2021-12-29 17:29:37', '2021-12-30 16:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percent_off` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `percent_off`, `created_at`, `updated_at`) VALUES
(2, 'a', 20.00, '2021-12-21 20:36:27', '2021-12-21 20:36:27'),
(4, 'b', 10.00, '2021-12-21 20:41:00', '2021-12-21 20:42:01'),
(5, '-20off', 20.00, '2022-01-07 14:17:07', '2022-01-07 14:17:20');

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `browse` tinyint(1) NOT NULL DEFAULT 1,
  `read` tinyint(1) NOT NULL DEFAULT 1,
  `edit` tinyint(1) NOT NULL DEFAULT 1,
  `add` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 1,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 1, 0, 0, 0, '{}', 1),
(2, 1, 'name', 'text', 'Nom', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required\"}}', 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"required\"}}', 3),
(4, 1, 'password', 'password', 'Mot de passe', 1, 0, 0, 1, 1, 0, '{}', 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, '{}', 5),
(6, 1, 'created_at', 'timestamp', 'Créé à', 0, 1, 1, 0, 0, 0, '{}', 7),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 9),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, '{}', 6),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Rôle principal', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":\"0\",\"taggable\":\"0\"}', 11),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Rôles additionnels', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 12),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, '{}', 13),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 1, 0, 0, 0, '{}', 1),
(17, 3, 'name', 'text', 'Nom', 1, 1, 1, 1, 1, 1, '{}', 2),
(18, 3, 'created_at', 'timestamp', 'Créé à', 0, 1, 1, 0, 0, 0, '{}', 4),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(20, 3, 'display_name', 'text', 'Nom d\'affichage', 1, 1, 1, 1, 1, 1, '{}', 3),
(21, 1, 'role_id', 'text', 'Rôle principal', 0, 1, 1, 1, 1, 1, '{}', 10),
(22, 4, 'id', 'text', 'Id', 1, 0, 1, 0, 0, 0, '{}', 1),
(23, 4, 'name', 'text', 'Nom', 1, 1, 1, 1, 1, 1, '{}', 3),
(24, 4, 'slug', 'text', 'Slug', 0, 1, 1, 0, 0, 1, '{\"validation\":{\"rule\":\"unique:categories\"}}', 4),
(25, 4, 'promotion_label', 'text', 'Étiquette de promotion', 0, 1, 1, 1, 1, 1, '{}', 5),
(26, 4, 'meta_title', 'text', 'Meta Title', 0, 0, 1, 1, 1, 1, '{}', 7),
(27, 4, 'meta_description', 'text_area', 'Meta Description', 0, 0, 1, 1, 1, 1, '{}', 8),
(28, 4, 'meta_keywords', 'text_area', 'Meta Keywords', 0, 0, 1, 1, 1, 1, '{}', 9),
(29, 4, 'group_id', 'text', 'Group Id', 1, 1, 1, 1, 1, 1, '{}', 2),
(30, 4, 'created_at', 'timestamp', 'Créé à', 0, 1, 1, 0, 0, 0, '{}', 10),
(31, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 11),
(32, 5, 'id', 'text', 'Id', 1, 0, 1, 0, 0, 0, '{}', 1),
(33, 5, 'name', 'text', 'Nom', 1, 1, 1, 1, 1, 1, '{}', 2),
(34, 5, 'position', 'number', 'Position', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"numeric|min:0\"}}', 3),
(35, 5, 'visible_in_menu', 'checkbox', 'Visible au menu', 1, 1, 1, 1, 1, 1, '{\"on\":\"oui\",\"off\":\"non\",\"checked\":true}', 4),
(36, 5, 'created_at', 'timestamp', 'Créé à', 0, 1, 1, 0, 0, 0, '{}', 5),
(37, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(38, 4, 'category_belongsto_category_group_relationship', 'relationship', 'Groupe', 1, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\CategoryGroup\",\"table\":\"category_groups\",\"type\":\"belongsTo\",\"column\":\"group_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"attribute_product\",\"pivot\":\"0\",\"taggable\":\"0\"}', 6),
(44, 7, 'id', 'text', 'Id', 1, 0, 1, 0, 0, 0, '{}', 1),
(45, 7, 'title', 'text', 'Titre', 1, 1, 1, 1, 1, 1, '{}', 3),
(46, 7, 'slug', 'text', 'Slug', 0, 0, 1, 0, 0, 1, '{\"validation\":{\"rule\":\"unique:products\"}}', 4),
(47, 7, 'details', 'text_area', 'Détails', 1, 0, 1, 1, 1, 1, '{}', 5),
(48, 7, 'description', 'rich_text_box', 'Description', 0, 0, 1, 1, 1, 1, '{\"tinymceOptions\":{\"content_css\":\"\\/css\\/app.css\"}}', 6),
(53, 7, 'popular', 'checkbox', 'Populaire', 1, 1, 1, 1, 1, 1, '{\"on\":\"oui\",\"off\":\"non\"}', 10),
(54, 7, 'active', 'checkbox', 'Actif', 1, 1, 1, 1, 1, 1, '{\"on\":\"oui\",\"off\":\"non\"}', 11),
(55, 7, 'promotion_label', 'text', 'Étiquette de promotion', 0, 0, 1, 1, 1, 1, '{}', 12),
(56, 7, 'meta_title', 'text', 'Meta Title', 0, 0, 1, 1, 1, 1, '{}', 15),
(57, 7, 'meta_description', 'text_area', 'Meta Description', 0, 0, 1, 1, 1, 1, '{}', 16),
(58, 7, 'meta_keywords', 'text_area', 'Meta Keywords', 0, 0, 1, 1, 1, 1, '{}', 17),
(59, 7, 'category_id', 'text', 'Category Id', 0, 1, 1, 1, 1, 1, '{}', 2),
(60, 7, 'images', 'multiple_images', 'Images', 0, 1, 1, 1, 1, 1, '{\"resize\":{\"width\":\"764\",\"height\":null},\"upsize\":true}', 13),
(61, 7, 'created_at', 'timestamp', 'Créé à', 0, 1, 1, 0, 0, 0, '{}', 18),
(62, 7, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 19),
(63, 7, 'product_belongsto_category_relationship', 'relationship', 'Catégorie', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Models\\\\Category\",\"table\":\"categories\",\"type\":\"belongsTo\",\"column\":\"category_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"attribute_product\",\"pivot\":\"0\",\"taggable\":\"0\"}', 14),
(64, 8, 'id', 'text', 'Id', 1, 0, 1, 0, 0, 0, '{}', 1),
(65, 8, 'name', 'text', 'Nom', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"unique:attributes\"}}', 2),
(66, 8, 'label', 'text', 'Label', 1, 1, 1, 1, 1, 1, '{}', 3),
(67, 8, 'options', 'text', 'Options', 0, 0, 0, 0, 0, 0, '{}', 4),
(68, 8, 'created_at', 'timestamp', 'Créé à', 0, 1, 1, 0, 0, 0, '{}', 5),
(69, 8, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(70, 1, 'email_verified_at', 'timestamp', 'Email Verified At', 0, 0, 0, 0, 0, 0, '{}', 8),
(72, 7, 'allowed_quantities', 'text', 'Quantités autorisées', 1, 0, 0, 0, 0, 0, '{}', 9),
(73, 9, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(74, 9, 'code', 'text', 'Code', 1, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"unique:coupons\"}}', 2),
(75, 9, 'percent_off', 'number', 'Pourcentage de réduction', 0, 1, 1, 1, 1, 1, '{\"validation\":{\"rule\":\"numeric|min:0|max:100\"}}', 3),
(76, 9, 'created_at', 'timestamp', 'Créé à', 0, 1, 1, 0, 0, 0, '{}', 4),
(77, 9, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 5),
(78, 7, 'design_price', 'text', 'Prix de conception', 0, 1, 1, 1, 1, 1, '{}', 7),
(79, 10, 'id', 'text', 'Id', 1, 0, 1, 0, 0, 0, '{}', 1),
(80, 10, 'rating', 'number', 'Évaluation', 1, 1, 1, 0, 0, 0, '{}', 4),
(81, 10, 'body', 'text_area', 'Avis', 1, 1, 1, 0, 0, 0, '{}', 5),
(82, 10, 'active', 'checkbox', 'Actif', 1, 1, 1, 1, 0, 1, '{\"on\":\"oui\",\"off\":\"non\"}', 6),
(83, 10, 'product_id', 'text', 'Product Id', 1, 0, 0, 0, 0, 0, '{}', 2),
(84, 10, 'user_id', 'text', 'User Id', 1, 0, 0, 0, 0, 0, '{}', 3),
(85, 10, 'created_at', 'timestamp', 'Créé à', 0, 1, 1, 0, 0, 0, '{}', 9),
(86, 10, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 10),
(88, 10, 'review_belongsto_product_relationship', 'relationship', 'Produit', 0, 1, 1, 0, 0, 0, '{\"model\":\"App\\\\Models\\\\Product\",\"table\":\"products\",\"type\":\"belongsTo\",\"column\":\"product_id\",\"key\":\"id\",\"label\":\"title\",\"pivot_table\":\"attribute_product\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7),
(89, 10, 'review_belongsto_user_relationship', 'relationship', 'Utilisateur', 0, 1, 1, 0, 0, 0, '{\"model\":\"App\\\\Models\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"attribute_product\",\"pivot\":\"0\",\"taggable\":\"0\"}', 8);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT 0,
  `server_side` tinyint(4) NOT NULL DEFAULT 0,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2021-12-15 19:47:30', '2021-12-16 23:52:56'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2021-12-15 19:47:30', '2021-12-15 19:47:30'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2021-12-15 19:47:30', '2021-12-15 20:42:16'),
(4, 'categories', 'categories', 'Category', 'Categories', NULL, 'App\\Models\\Category', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2021-12-15 19:49:46', '2021-12-30 19:21:48'),
(5, 'category_groups', 'category-groups', 'Category Group', 'Category Groups', NULL, 'App\\Models\\CategoryGroup', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2021-12-15 19:51:02', '2021-12-29 17:27:50'),
(7, 'products', 'products', 'Product', 'Products', NULL, 'App\\Models\\Product', NULL, 'App\\Http\\Controllers\\Voyager\\ProductController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2021-12-15 19:57:26', '2022-01-06 09:38:24'),
(8, 'attributes', 'attributes', 'Attribute', 'Attributes', NULL, 'App\\Models\\Attribute', NULL, 'App\\Http\\Controllers\\Voyager\\AttributeController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2021-12-15 20:02:09', '2021-12-21 21:37:21'),
(9, 'coupons', 'coupons', 'Coupon', 'Coupons', NULL, 'App\\Models\\Coupon', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2021-12-21 20:26:23', '2022-01-07 14:16:33'),
(10, 'reviews', 'reviews', 'Review', 'Reviews', NULL, 'App\\Models\\Review', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2022-01-08 14:19:27', '2022-01-08 14:32:39');

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
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `name`, `filename`, `path`, `mime_type`, `size`, `created_at`, `updated_at`) VALUES
(116, 'App\\Models\\CartItem', 113, 'recto', 'm5PlEojE0XOScDXMVEEHgqJvPlbrJPET0LqlbZam.jpg', 'cartItems/113/m5PlEojE0XOScDXMVEEHgqJvPlbrJPET0LqlbZam.jpg', 'image/jpeg', 101876, '2022-01-07 13:11:16', '2022-01-07 13:11:16'),
(117, 'App\\Models\\CartItem', 114, '0', 'hXCbHpGQrXzVAphQzx8nlPIvkP8GwmKoircNqBqb.png', 'cartItems/114/hXCbHpGQrXzVAphQzx8nlPIvkP8GwmKoircNqBqb.png', 'image/png', 37633, '2022-01-07 13:18:37', '2022-01-07 13:18:37'),
(118, 'App\\Models\\CartItem', 115, 'recto', 'cjWv3Khx8u45fe67fSSmnW6AWCAWMepXEuUcXvNg.jpg', 'cartItems/115/cjWv3Khx8u45fe67fSSmnW6AWCAWMepXEuUcXvNg.jpg', 'image/jpeg', 45824, '2022-01-07 13:35:02', '2022-01-07 13:35:02'),
(122, 'App\\Models\\CartItem', 115, 'verso', 'UfKFit4luRRIS4z1xzwp9v7YopduhbuUsW0Ml82e.jpg', 'cartItems/115/UfKFit4luRRIS4z1xzwp9v7YopduhbuUsW0Ml82e.jpg', 'image/jpeg', 199532, '2022-01-07 19:29:40', '2022-01-07 19:29:40');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2021-12-15 19:47:30', '2021-12-15 19:47:30');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Tableau de bord', '', '_self', 'voyager-boat', '#000000', NULL, 1, '2021-12-15 19:47:30', '2021-12-15 20:28:32', 'voyager.dashboard', 'null'),
(2, 1, 'Médias', '', '_self', 'voyager-images', '#000000', NULL, 6, '2021-12-15 19:47:30', '2021-12-21 20:29:36', 'voyager.media.index', 'null'),
(3, 1, 'Utilisateurs', '', '_self', 'voyager-people', '#000000', 17, 2, '2021-12-15 19:47:30', '2021-12-15 20:28:49', 'voyager.users.index', 'null'),
(4, 1, 'Rôles', '', '_self', 'voyager-lock', '#000000', 17, 1, '2021-12-15 19:47:30', '2021-12-15 20:24:33', 'voyager.roles.index', 'null'),
(5, 1, 'Outils Développeur', '', '_self', 'voyager-tools', '#000000', NULL, 7, '2021-12-15 19:47:30', '2021-12-21 20:29:36', NULL, ''),
(6, 1, 'Générateur de menus', '', '_self', 'voyager-list', '#000000', 5, 1, '2021-12-15 19:47:30', '2021-12-15 20:27:40', 'voyager.menus.index', 'null'),
(7, 1, 'Base de données', '', '_self', 'voyager-data', '#000000', 5, 2, '2021-12-15 19:47:30', '2021-12-15 20:27:57', 'voyager.database.index', 'null'),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 3, '2021-12-15 19:47:30', '2021-12-15 20:08:24', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 4, '2021-12-15 19:47:30', '2021-12-15 20:08:24', 'voyager.bread.index', NULL),
(10, 1, 'Réglages', '', '_self', 'voyager-settings', '#000000', NULL, 8, '2021-12-15 19:47:30', '2021-12-21 20:29:36', 'voyager.settings.index', 'null'),
(11, 1, 'Catégories', '', '_self', 'voyager-categories', '#000000', 16, 2, '2021-12-15 19:49:47', '2021-12-15 20:23:40', 'voyager.categories.index', 'null'),
(12, 1, 'Groupes', '', '_self', 'voyager-list', '#000000', 16, 1, '2021-12-15 19:51:02', '2021-12-15 20:30:32', 'voyager.category-groups.index', 'null'),
(14, 1, 'Produits', '', '_self', 'voyager-book', '#000000', 18, 3, '2021-12-15 19:57:26', '2022-01-08 14:20:24', 'voyager.products.index', 'null'),
(15, 1, 'Attributs', '', '_self', 'voyager-params', '#000000', 18, 1, '2021-12-15 20:02:09', '2022-01-08 14:20:20', 'voyager.attributes.index', 'null'),
(16, 1, 'Gestion catégories', '', '_self', 'voyager-categories', '#000000', NULL, 3, '2021-12-15 20:11:35', '2021-12-21 20:28:07', NULL, ''),
(17, 1, 'Gestion utilisateurs', '', '_self', 'voyager-people', '#000000', NULL, 2, '2021-12-15 20:12:36', '2021-12-15 20:22:43', NULL, ''),
(18, 1, 'Gestion produits', '', '_self', 'voyager-book', '#000000', NULL, 4, '2021-12-15 20:13:59', '2021-12-21 20:28:07', NULL, ''),
(19, 1, 'Coupons', '', '_self', 'voyager-pie-graph', '#000000', 20, 1, '2021-12-21 20:26:23', '2021-12-21 20:36:05', 'voyager.coupons.index', 'null'),
(20, 1, 'Gestion commandes', '', '_self', 'voyager-bag', '#000000', NULL, 5, '2021-12-21 20:29:10', '2021-12-21 20:29:29', NULL, ''),
(21, 1, 'Avis', '', '_self', 'voyager-star-two', '#000000', 18, 2, '2022-01-08 14:19:27', '2022-01-08 14:21:39', 'voyager.reviews.index', 'null');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_12_164936_create_category_groups_table', 1),
(6, '2021_12_12_221851_create_categories_table', 1),
(7, '2021_12_12_222640_create_attributes_table', 1),
(8, '2021_12_12_224425_create_variants_table', 1),
(9, '2021_12_12_225001_create_products_table', 1),
(10, '2021_12_13_000445_create_product_variant_table', 1),
(11, '2021_12_13_000755_create_attribute_product_table', 1),
(12, '2016_01_01_000000_add_voyager_user_fields', 2),
(13, '2016_01_01_000000_create_data_types_table', 2),
(14, '2016_05_19_173453_create_menu_table', 2),
(15, '2016_10_21_190000_create_roles_table', 2),
(16, '2016_10_21_190000_create_settings_table', 2),
(17, '2016_11_30_135954_create_permission_table', 2),
(18, '2016_11_30_141208_create_permission_role_table', 2),
(19, '2016_12_26_201236_data_types__add__server_side', 2),
(20, '2017_01_13_000000_add_route_to_menu_items_table', 2),
(21, '2017_01_14_005015_create_translations_table', 2),
(22, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 2),
(23, '2017_03_06_000000_add_controller_to_data_types_table', 2),
(24, '2017_04_21_000000_add_order_to_data_rows_table', 2),
(25, '2017_07_05_210000_add_policyname_to_data_types_table', 2),
(26, '2017_08_05_000000_add_group_to_settings_table', 2),
(27, '2017_11_26_013050_add_user_role_relationship', 2),
(28, '2017_11_26_015000_create_user_roles_table', 2),
(29, '2018_03_11_000000_add_user_settings', 2),
(30, '2018_03_14_000000_add_details_to_data_types_table', 2),
(31, '2018_03_16_000000_make_settings_value_nullable', 2),
(34, '2021_12_21_212149_create_coupons_table', 3),
(37, '2022_01_04_120737_create_carts_table', 4),
(38, '2022_01_04_125945_create_cart_items_table', 4),
(39, '2022_01_04_142559_create_media_table', 4),
(43, '2022_01_08_113052_create_reviews_table', 5);

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2021-12-15 19:47:30', '2021-12-15 19:47:30'),
(2, 'browse_bread', NULL, '2021-12-15 19:47:30', '2021-12-15 19:47:30'),
(3, 'browse_database', NULL, '2021-12-15 19:47:30', '2021-12-15 19:47:30'),
(4, 'browse_media', NULL, '2021-12-15 19:47:30', '2021-12-15 19:47:30'),
(5, 'browse_compass', NULL, '2021-12-15 19:47:30', '2021-12-15 19:47:30'),
(6, 'browse_menus', 'menus', '2021-12-15 19:47:30', '2021-12-15 19:47:30'),
(7, 'read_menus', 'menus', '2021-12-15 19:47:30', '2021-12-15 19:47:30'),
(8, 'edit_menus', 'menus', '2021-12-15 19:47:30', '2021-12-15 19:47:30'),
(9, 'add_menus', 'menus', '2021-12-15 19:47:30', '2021-12-15 19:47:30'),
(10, 'delete_menus', 'menus', '2021-12-15 19:47:30', '2021-12-15 19:47:30'),
(11, 'browse_roles', 'roles', '2021-12-15 19:47:30', '2021-12-15 19:47:30'),
(12, 'read_roles', 'roles', '2021-12-15 19:47:30', '2021-12-15 19:47:30'),
(13, 'edit_roles', 'roles', '2021-12-15 19:47:30', '2021-12-15 19:47:30'),
(14, 'add_roles', 'roles', '2021-12-15 19:47:30', '2021-12-15 19:47:30'),
(15, 'delete_roles', 'roles', '2021-12-15 19:47:30', '2021-12-15 19:47:30'),
(16, 'browse_users', 'users', '2021-12-15 19:47:30', '2021-12-15 19:47:30'),
(17, 'read_users', 'users', '2021-12-15 19:47:30', '2021-12-15 19:47:30'),
(18, 'edit_users', 'users', '2021-12-15 19:47:30', '2021-12-15 19:47:30'),
(19, 'add_users', 'users', '2021-12-15 19:47:30', '2021-12-15 19:47:30'),
(20, 'delete_users', 'users', '2021-12-15 19:47:30', '2021-12-15 19:47:30'),
(21, 'browse_settings', 'settings', '2021-12-15 19:47:30', '2021-12-15 19:47:30'),
(22, 'read_settings', 'settings', '2021-12-15 19:47:30', '2021-12-15 19:47:30'),
(23, 'edit_settings', 'settings', '2021-12-15 19:47:30', '2021-12-15 19:47:30'),
(24, 'add_settings', 'settings', '2021-12-15 19:47:30', '2021-12-15 19:47:30'),
(25, 'delete_settings', 'settings', '2021-12-15 19:47:30', '2021-12-15 19:47:30'),
(26, 'browse_categories', 'categories', '2021-12-15 19:49:47', '2021-12-15 19:49:47'),
(27, 'read_categories', 'categories', '2021-12-15 19:49:47', '2021-12-15 19:49:47'),
(28, 'edit_categories', 'categories', '2021-12-15 19:49:47', '2021-12-15 19:49:47'),
(29, 'add_categories', 'categories', '2021-12-15 19:49:47', '2021-12-15 19:49:47'),
(30, 'delete_categories', 'categories', '2021-12-15 19:49:47', '2021-12-15 19:49:47'),
(31, 'browse_category_groups', 'category_groups', '2021-12-15 19:51:02', '2021-12-15 19:51:02'),
(32, 'read_category_groups', 'category_groups', '2021-12-15 19:51:02', '2021-12-15 19:51:02'),
(33, 'edit_category_groups', 'category_groups', '2021-12-15 19:51:02', '2021-12-15 19:51:02'),
(34, 'add_category_groups', 'category_groups', '2021-12-15 19:51:02', '2021-12-15 19:51:02'),
(35, 'delete_category_groups', 'category_groups', '2021-12-15 19:51:02', '2021-12-15 19:51:02'),
(41, 'browse_products', 'products', '2021-12-15 19:57:26', '2021-12-15 19:57:26'),
(42, 'read_products', 'products', '2021-12-15 19:57:26', '2021-12-15 19:57:26'),
(43, 'edit_products', 'products', '2021-12-15 19:57:26', '2021-12-15 19:57:26'),
(44, 'add_products', 'products', '2021-12-15 19:57:26', '2021-12-15 19:57:26'),
(45, 'delete_products', 'products', '2021-12-15 19:57:26', '2021-12-15 19:57:26'),
(46, 'browse_attributes', 'attributes', '2021-12-15 20:02:09', '2021-12-15 20:02:09'),
(47, 'read_attributes', 'attributes', '2021-12-15 20:02:09', '2021-12-15 20:02:09'),
(48, 'edit_attributes', 'attributes', '2021-12-15 20:02:09', '2021-12-15 20:02:09'),
(49, 'add_attributes', 'attributes', '2021-12-15 20:02:09', '2021-12-15 20:02:09'),
(50, 'delete_attributes', 'attributes', '2021-12-15 20:02:09', '2021-12-15 20:02:09'),
(51, 'browse_coupons', 'coupons', '2021-12-21 20:26:23', '2021-12-21 20:26:23'),
(52, 'read_coupons', 'coupons', '2021-12-21 20:26:23', '2021-12-21 20:26:23'),
(53, 'edit_coupons', 'coupons', '2021-12-21 20:26:23', '2021-12-21 20:26:23'),
(54, 'add_coupons', 'coupons', '2021-12-21 20:26:23', '2021-12-21 20:26:23'),
(55, 'delete_coupons', 'coupons', '2021-12-21 20:26:23', '2021-12-21 20:26:23'),
(56, 'browse_reviews', 'reviews', '2022-01-08 14:19:27', '2022-01-08 14:19:27'),
(57, 'read_reviews', 'reviews', '2022-01-08 14:19:27', '2022-01-08 14:19:27'),
(58, 'edit_reviews', 'reviews', '2022-01-08 14:19:27', '2022-01-08 14:19:27'),
(60, 'delete_reviews', 'reviews', '2022-01-08 14:19:27', '2022-01-08 14:19:27');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(60, 1);

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allowed_quantities` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `popular` tinyint(1) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `promotion_label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `design_price` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `details`, `description`, `allowed_quantities`, `popular`, `active`, `promotion_label`, `meta_title`, `meta_description`, `meta_keywords`, `category_id`, `images`, `created_at`, `updated_at`, `design_price`) VALUES
(22, 'Quo omnis ad Nam ex', 'something', 'Les cartes de visite classiques WePrint offrent un excellent rapport qualité/prix tout en simplicité et élégance. Ces cartes de visite proposent de nombreuses options pour mettre en valeur votre marque.', '<p style=\"border: 0px; margin: 0px 0px 1.5em; padding: 0px; color: #3a3a3a; font-family: Lato, sans-serif; font-size: 19px;\">If you&rsquo;re thinking of starting a blog of your own, but just don&rsquo;t have a clue on what to blog about, then fear not!</p>\r\n<p style=\"border: 0px; margin: 0px 0px 1.5em; padding: 0px; color: #3a3a3a; font-family: Lato, sans-serif; font-size: 19px;\">In this article, I have included a whole load of blog examples from a wide variety of different niches, all run on different&nbsp;<a style=\"border: 0px; margin: 0px; padding: 0px; background-color: transparent; transition: color 0.1s ease-in-out 0s, background-color 0.1s ease-in-out 0s; text-decoration-line: none; color: #951a82;\" href=\"https://makeawebsitehub.com/choose-right-blogging-platform/\">blogging platforms</a>&nbsp;like WordPress, Joomla! and Drupal.</p>\r\n<p style=\"border: 0px; margin: 0px 0px 1.5em; padding: 0px; color: #3a3a3a; font-family: Lato, sans-serif; font-size: 19px;\">Since the beginning of the internet, millions and millions and millions of blogs have been created. Many have died due to lost interest or their owners giving up on the idea, while others have thrived and continue to grow,&nbsp;<a style=\"border: 0px; margin: 0px; padding: 0px; background-color: transparent; transition: color 0.1s ease-in-out 0s, background-color 0.1s ease-in-out 0s; text-decoration-line: none; color: #951a82;\" href=\"https://makeawebsitehub.com/how-to-make-money-blogging/\" target=\"_blank\" rel=\"noopener noreferrer\">making money</a>&nbsp;and earning their owners a steady income. It&rsquo;s a constant evolution of content that keeps people coming back for more, especially if these blogs contact highly resourceful material that people find useful and interesting.</p>\r\n<p style=\"border: 0px; margin: 0px 0px 1.5em; padding: 0px; color: #3a3a3a; font-family: Lato, sans-serif; font-size: 19px;\">Each example listed in this blog post are all different in some way and all bring something unique to their readers &amp; subscribers. I want to show you what is possible and how you can take inspiration from them and create an awesome blog of your own.</p>\r\n<p style=\"border: 0px; margin: 0px 0px 1.5em; padding: 0px; color: #3a3a3a; font-family: Lato, sans-serif; font-size: 19px;\">Some of these blogs make over $100k a month, others are just a hobby for their owners, but all have the same purpose&nbsp;at their core&hellip; the love of writing and sharing information.</p>\r\n<h3 style=\"border: 0px; margin: 0px 0px 20px; padding: 0px; font-family: Lato, sans-serif; font-size: 35px; line-height: 1.2em; color: #016c9e;\">Want to Start Your Own Blog?</h3>\r\n<p style=\"border: 0px; margin: 0px 0px 1.5em; padding: 0px; color: #3a3a3a; font-family: Lato, sans-serif; font-size: 19px;\">Remember that it doesn&rsquo;t cost the earth to start your own blog. You can be up and running for as little as $2.95 p/m with Bluehost.</p>\r\n<p style=\"border: 0px; margin: 0px 0px 1.5em; padding: 0px; color: #3a3a3a; font-family: Lato, sans-serif; font-size: 19px;\"><a style=\"border: 0px; margin: 0px; padding: 0px; background-color: transparent; transition: color 0.1s ease-in-out 0s, background-color 0.1s ease-in-out 0s; text-decoration-line: none; color: #951a82;\" href=\"https://makeawebsitehub.com/go/bluehost\" target=\"_blank\" rel=\"noopener noreferrer\">Bluehost</a>&nbsp;offer web hosting, Free SSL, Email, web builder and a&nbsp;<a style=\"border: 0px; margin: 0px; padding: 0px; background-color: transparent; transition: color 0.1s ease-in-out 0s, background-color 0.1s ease-in-out 0s; text-decoration-line: none; color: #951a82;\" href=\"https://makeawebsitehub.com/go/bluehost\" target=\"_blank\" rel=\"nofollow noopener\">FREE DOMAIN</a>.</p>', '[{\"value\":100,\"price\":100},{\"value\":200,\"price\":170}]', 0, 0, '-50%', 'Aut placeat obcaeca', 'Commodi consequatur', 'Dolorem sequi rerum', NULL, '[\"products\\\\December2021\\\\WgjgXLvfiHI951kWMyqy.jpg\",\"products\\\\December2021\\\\yaf696B2aQHddFc2X3ak.jpg\"]', '2021-12-30 17:40:12', '2022-01-06 09:39:50', 10),
(30, 'Necessitatibus error', 'necessitatibus-error', 'Autem consectetur vo', NULL, '[{\"value\":57,\"price\":85},{\"value\":10,\"price\":29}]', 0, 0, 'Ducimus ab nisi et', 'Qui iure ipsa irure', 'Aut sed repellendus', 'Sint soluta veritati', 1, '[\"products\\\\January2022\\\\nEw6R7d3OeGN0iaeYlcm.jpg\"]', '2022-01-05 13:54:48', '2022-01-05 13:54:48', 211);

-- --------------------------------------------------------

--
-- Table structure for table `product_variant`
--

CREATE TABLE `product_variant` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `variant_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `rating`, `body`, `active`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(67, 5, 'w', 1, 22, 1, '2022-01-08 14:19:38', '2022-01-08 14:29:55'),
(68, 5, 'we', 1, 22, 1, '2022-01-08 14:35:32', '2022-01-08 14:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2021-12-15 19:47:30', '2021-12-15 19:47:30'),
(2, 'user', 'Normal User', '2021-12-15 19:47:30', '2021-12-15 19:47:30');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Fournishop', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', NULL, '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Voyager', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Welcome to Voyager. The Missing Admin for Laravel', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', '', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', NULL, '', 'text', 1, 'Admin'),
(12, 'site.email', 'Email', 'fournishop01@gmail.com', NULL, 'text', 7, 'Site'),
(13, 'site.phone', 'Téléphone', '+212 23 22 33', NULL, 'text', 8, 'Site'),
(16, 'cart.delivery_price', 'Prix de livraison', '39', '{\r\n    \"type\" : \"number\"\r\n}', 'text', 9, 'Cart'),
(17, 'cart.tax', 'TVA', '20', NULL, 'text', 10, 'Cart');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, 1, 'omar', 'omar@gmail.com', 'users/default.png', NULL, '$2y$10$rxOtwSGGbhzYJY4tXg9z8OgxNqR4RatBW/eTIqWMoT/jPqVDDNh1S', 'BxZ9rRSpnhTo5aPrWzURpTcoCCGDGy5BGbjjgWXT2nHFMalmkBAfTqlY49ql', NULL, '2021-12-15 19:48:01', '2021-12-20 20:01:59'),
(3, 1, 'salah', 'salah@gmail.com', 'users/default.png', NULL, '$2y$10$nbjZPyGQOTUUuqht4mAsleiApBA1IUg6aunzZxJnuuq38wTowfndK', NULL, NULL, '2021-12-20 20:02:29', '2021-12-20 20:02:29');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `variants`
--

CREATE TABLE `variants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `attributes_name_unique` (`name`);

--
-- Indexes for table `attribute_product`
--
ALTER TABLE `attribute_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_product_attribute_id_foreign` (`attribute_id`),
  ADD KEY `attribute_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_cart_id_foreign` (`cart_id`),
  ADD KEY `cart_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`),
  ADD KEY `categories_group_id_foreign` (`group_id`);

--
-- Indexes for table `category_groups`
--
ALTER TABLE `category_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

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
  ADD KEY `permissions_key_index` (`key`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`) USING HASH,
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_variant`
--
ALTER TABLE `product_variant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_variant_product_id_foreign` (`product_id`),
  ADD KEY `product_variant_variant_id_foreign` (`variant_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- Indexes for table `variants`
--
ALTER TABLE `variants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `attribute_product`
--
ALTER TABLE `attribute_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category_groups`
--
ALTER TABLE `category_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `product_variant`
--
ALTER TABLE `product_variant`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `variants`
--
ALTER TABLE `variants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_product`
--
ALTER TABLE `attribute_product`
  ADD CONSTRAINT `attribute_product_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `attribute_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_group_id_foreign` FOREIGN KEY (`group_id`) REFERENCES `category_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `product_variant`
--
ALTER TABLE `product_variant`
  ADD CONSTRAINT `product_variant_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_variant_variant_id_foreign` FOREIGN KEY (`variant_id`) REFERENCES `variants` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
