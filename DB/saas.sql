-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2020 at 04:47 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ownname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discription` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `mobile`, `email`, `nid`, `address`, `status`, `role`, `ownname`, `discription`, `image`, `password`, `free1`, `free2`, `free3`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '5491', NULL, '1234579564', 'Dhaka-Uttara-1223', '1', '2', NULL, NULL, 'public/image/5e30724b56d9cUntitled-4.jpg', '$2y$10$fExLH2dgVs/GIJ5gaazm8uMTuM7kc2eiz27.AhKDKu0Bqotexpu7q', NULL, NULL, NULL, '2020-01-28 17:41:31', '2020-01-28 17:41:31'),
(2, 'Sayeed Enterprice Ltd', '111', 'admin@admin.com', '43546545', 'khrichen rode dhaka', '1', '1', 'MD Abu Sayeed', 'discrip hello', 'public/image/5e3ac560985e0download.jpg', '$2y$10$F1K6I9r7uRlv06kAj7U1leIYtROyQPbt.mYAEZjIuR7aCYnVTJqEW', 'BSC in CSE', 'PHP', 'Coding', '2020-01-28 17:54:22', '2020-02-19 19:02:24'),
(4, 'Sayeed Telecom', '222', 'abu.sayeed.diu@gmail.com', '43546545', 'Dhaka-Uttara-1223', '1', '1', 'MD Abu Sayeed', 'Hello World', 'public/image/5e4d3320df7cbmain-product.png', '$2y$10$1LrWdvqkNA2ykzju7JqHX.LuEe5FcqzP6BhAGUr2COFSSZLrerJx6', 'BSC in CSE', 'PHP', 'Coding', '2020-01-29 11:21:04', '2020-02-19 13:08:08'),
(5, 'Bangladesh Bike Bazar', '333', 'bike@gmail.com', '1023934877564', 'Naogaon,Bangladesh', '1', '1', NULL, NULL, 'public/image/5e4fe40f3010482565637_106331824247293_7061020311587651584_n.jpg', '$2y$10$/PehGxT/tpJ5AO7Rb14oLOst.vr9BBR3YvuZBXtYmhXMQhlQMxmeq', NULL, NULL, NULL, '2020-02-21 14:07:11', '2020-02-21 14:07:11');

-- --------------------------------------------------------

--
-- Table structure for table `bands`
--

CREATE TABLE `bands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(25) NOT NULL,
  `bandname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bands`
--

INSERT INTO `bands` (`id`, `user_id`, `bandname`, `created_at`, `updated_at`) VALUES
(2, 2, 'Nokia', '2020-02-04 10:02:59', '2020-02-04 10:02:59'),
(3, 2, 'Walton', '2020-02-04 10:05:12', '2020-02-04 10:15:34'),
(5, 2, 'Suzuki', '2020-02-04 10:08:51', '2020-02-04 12:43:15'),
(6, 4, 'Nokia', '2020-02-10 13:35:17', '2020-02-10 13:35:17'),
(7, 4, 'Xiomi', '2020-02-10 13:35:24', '2020-02-10 13:35:24'),
(8, 4, 'LG', '2020-02-10 13:35:43', '2020-02-10 13:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominame` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nomimobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `name`, `mobile`, `nid`, `address`, `nominame`, `nomimobile`, `nominid`, `relation`, `date`, `free`, `free1`, `created_at`, `updated_at`) VALUES
(1, '4', 'Cyan Group', '5491', NULL, 'Dhaka-Uttara-1223', NULL, NULL, NULL, NULL, '14-Feb-2020', NULL, NULL, '2020-02-14 16:49:20', '2020-02-14 16:49:20'),
(2, '4', 'Sayeed', '5491', '434', 'Manda ,Naogaon, bangladesh', 'Sayeed', '111', '111', 'Grandfather', '14-Feb-2020', NULL, NULL, '2020-02-14 16:50:14', '2020-02-14 16:50:14'),
(3, '4', 'Sayeed', '5491', '434', 'khrichen rode dhaka', 'Sayeed', '333333', '33333', 'Uncle', '14-Feb-2020', NULL, NULL, '2020-02-14 16:58:28', '2020-02-14 16:58:28'),
(4, '4', 'Sayeed', '5491', '434', 'khrichen rode dhaka', 'Sayeed', '333333', '33333', 'Uncle', '14-Feb-2020', NULL, NULL, '2020-02-14 16:59:01', '2020-02-14 16:59:01'),
(5, '4', 'Sayeed', '5491', '434', 'khrichen rode dhaka', 'Sayeed', '333333', '33333', 'Uncle', '14-Feb-2020', NULL, NULL, '2020-02-14 17:06:07', '2020-02-14 17:06:07'),
(6, '4', 'Cyan Group', '111', NULL, 'Dhaka-Uttara-1223', NULL, NULL, NULL, NULL, '16-Feb-2020', NULL, NULL, '2020-02-15 18:30:20', '2020-02-15 18:30:20'),
(7, '2', 'Mr.Symex It ltd.', '222', '43546545', 'Dhaka-Uttara-1223', 'Sayeed', '111111111', '0133333', 'Brother', '16-Feb-2020', NULL, NULL, '2020-02-15 18:49:03', '2020-02-15 18:49:03'),
(8, '4', 'Sakib', '0131871278', '1234579564', 'Dhaka-Uttara-1223', 'hello', '12345667', '12345677', 'Brother', '16-Feb-2020', NULL, NULL, '2020-02-16 14:55:32', '2020-02-16 14:55:32'),
(9, '4', 'Al amin', '01765827626', '1234579564', 'Dhaka-Uttara-1223', 'Sayeed', '102898923787', NULL, 'Brother', '16-Feb-2020', NULL, NULL, '2020-02-16 15:10:36', '2020-02-16 15:10:36'),
(10, '2', 'Mr. Maleq', '0198345643', NULL, 'admin@gmail.com', NULL, NULL, NULL, NULL, '20-Feb-2020', NULL, NULL, '2020-02-19 19:15:47', '2020-02-19 19:15:47'),
(11, '2', 'Saiful Haque John', '0198345643', '1234579564', 'mirpur 1212 house', 'Sayeed2', '01457686', '09588834', 'Uncle', '20-Feb-2020', NULL, NULL, '2020-02-19 19:17:21', '2020-02-19 19:17:21'),
(12, '4', 'Saiful Haque John', '0198345643', NULL, 'mirpur 1212 house', NULL, NULL, NULL, NULL, '20-Feb-2020', NULL, NULL, '2020-02-20 06:14:45', '2020-02-20 06:14:45'),
(13, '4', 'Sayeed', '0198345643', NULL, 'mirpur 1212 house', NULL, NULL, NULL, NULL, '20-Feb-2020', NULL, NULL, '2020-02-20 11:32:43', '2020-02-20 11:32:43'),
(14, '4', 'Cyan Group gg', '0198345643', NULL, 'dhanmondi dhaka', NULL, NULL, NULL, NULL, '20-Feb-2020', NULL, NULL, '2020-02-20 17:07:04', '2020-02-20 17:07:04'),
(15, '4', 'sumon', '87877', '8787', 'mirpur 1212 house', 'Sayeed2', '87878', '9878', 'Grandmother', '21-Feb-2020', NULL, NULL, '2020-02-21 05:43:13', '2020-02-21 05:43:13'),
(16, '4', 'Mr. Maleq', '222', '1111111', 'mirpur 1212 house', 'Sayeed2', '234', '43434', 'Uncle', '21-Feb-2020', NULL, NULL, '2020-02-21 09:57:53', '2020-02-21 09:57:53');

-- --------------------------------------------------------

--
-- Table structure for table `daily_expenses`
--

CREATE TABLE `daily_expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `daily_expenses`
--

INSERT INTO `daily_expenses` (`id`, `user_id`, `expense_type`, `purpose`, `amount`, `details`, `date`, `free`, `created_at`, `updated_at`) VALUES
(1, '4', 'Electriticy Bill', 'Gas Bill', '4545', 'pol[op[', '19-Feb-2020', NULL, '2020-02-19 13:49:18', '2020-02-19 13:49:18'),
(2, '2', 'Cable bill', 'Gas Bill', '40', 'ttttttttttttt', '19-Feb-2020', NULL, '2020-02-19 13:57:03', '2020-02-19 14:08:24'),
(3, '2', 'Family Member', 'Frezz', '4545', NULL, '20-Feb-2020', NULL, '2020-02-19 18:49:00', '2020-02-19 18:49:00');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `userid`, `name`, `mobile`, `email`, `address`, `nid`, `status`, `created_at`, `updated_at`) VALUES
(1, '2', 'Sayeed', '0131871278', 'admin@admin.com', 'Dhaka-Uttara-1223', '1234579564', '1', '2020-01-30 11:50:03', '2020-01-30 11:50:03'),
(2, '2', 'Mr. Mamun', '01750758262', 'nurul.sayeed.dev@gmail.com', 'Monir Tower  Dhaka. Bangladesh', '435465456', '0', '2020-01-30 12:26:36', '2020-01-30 12:40:09'),
(3, '4', 'Moslem', '01517171717', 'admin@gmail.com', 'Manda ,Naogaon, bangladesh', '43546545', '1', '2020-01-30 18:51:49', '2020-01-30 18:51:49'),
(4, '4', 'Mr. Mamun', '111', 'admin@gmail.com', 'Monir Tower  Dhaka. Bangladesh', '43546545', '0', '2020-01-30 18:58:17', '2020-01-30 18:58:40'),
(5, '4', 'Mr. Mamun', '5555', 'nurul.sayeed.dev@gmail.com', 'Dhaka-Uttara-1223', '1234579564', '1', '2020-01-30 18:58:34', '2020-01-30 18:58:34'),
(6, '2', 'Cyan Group', '111', 'admin@admin.com', 'Monir Tower  Dhaka. Bangladesh', '1234579564', '1', '2020-01-30 20:25:40', '2020-01-30 20:25:54');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(4, '2019_12_23_234001_create_products_table', 1),
(5, '2020_01_28_224853_create_admins_table', 2),
(6, '2020_01_30_173344_create_employees_table', 3),
(7, '2020_01_31_012829_create_salaries_table', 4),
(8, '2020_02_04_155210_create_bands_table', 5),
(9, '2020_02_04_190247_create_soft_products_table', 6),
(10, '2020_02_04_190312_create_stocks_table', 6),
(11, '2020_02_04_190341_create_stockds_table', 6),
(12, '2019_05_03_000001_create_customer_columns', 7),
(13, '2019_05_03_000002_create_subscriptions_table', 7),
(14, '2020_02_13_154230_create_orders_table', 7),
(15, '2020_02_13_154246_create_order_details_table', 7),
(16, '2020_02_13_154310_create_customers_table', 7),
(17, '2020_02_13_164910_create_payments_table', 7),
(18, '2020_02_19_182716_create_purchases_table', 8),
(19, '2020_02_19_194158_create_daily_expenses_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` int(255) NOT NULL,
  `paytotal` int(255) NOT NULL,
  `duetotal` int(255) NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monthpay` int(255) DEFAULT NULL,
  `emi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paytime` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalemi` int(255) DEFAULT NULL,
  `free1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `userid`, `customerid`, `subtotal`, `paytotal`, `duetotal`, `qty`, `status`, `month`, `monthpay`, `emi`, `paytime`, `date`, `totalemi`, `free1`, `created_at`, `updated_at`) VALUES
(1, '4', '1', 500, 450, 50, '5', 'Regular', NULL, NULL, NULL, '0', '14-Feb-2020', NULL, NULL, '2020-02-14 16:49:20', '2020-02-14 19:58:34'),
(2, '4', '2', 515, 515, 0, '5', 'EMI', '3', 72, '2.5', '0', '14-Feb-2020', NULL, NULL, '2020-02-14 16:50:14', '2020-02-14 20:29:47'),
(3, '4', '3', 515, 514, 1, '5', 'EMI', '3', 72, '2.5', '0', '14-Feb-2020', NULL, NULL, '2020-02-14 16:58:28', '2020-02-14 19:11:07'),
(4, '4', '4', 515, 372, 143, '5', 'EMI', '3', 72, '2.5', '0', '14-Feb-2020', NULL, NULL, '2020-02-14 16:59:01', '2020-02-16 14:44:12'),
(5, '4', '5', 515, 315, 200, '5', 'EMI', '3', 72, '2.5', '0', '14-Feb-2020', 15, NULL, '2020-02-14 17:06:07', '2020-02-14 18:59:41'),
(10, '4', '6', 3500, 1233, 2267, '35', 'Regular', NULL, NULL, NULL, '0', '16-Feb-2020', NULL, NULL, '2020-02-15 18:30:20', '2020-02-15 18:30:20'),
(11, '2', '7', 427487, 83681, 343806, '10', 'EMI', '8', 49115, '2.5', '0', '16-Feb-2020', 65487, NULL, '2020-02-15 18:49:03', '2020-02-19 18:56:01'),
(12, '4', '8', 1038, 679, 359, '10', 'EMI', '3', 179, '2.5', '0', '16-Feb-2020', 38, NULL, '2020-02-16 14:55:32', '2020-02-16 14:56:15'),
(13, '4', '9', 10300, 10300, 0, '1', 'EMI', '3', 1767, '2', '0', '16-Feb-2020', 300, NULL, '2020-02-16 15:10:36', '2020-02-16 15:15:48'),
(14, '2', '10', 318000, 240000, 78000, '7', 'Regular', NULL, NULL, NULL, '0', '20-Feb-2020', NULL, NULL, '2020-02-19 19:15:47', '2020-02-19 19:15:47'),
(15, '2', '11', 356, 100, 256, '8', 'EMI', '3', 85, '2.5', '0', '20-Feb-2020', 18, NULL, '2020-02-19 19:17:21', '2020-02-19 19:17:21'),
(16, '4', '12', 200, 100, 100, '2', 'Regular', NULL, NULL, NULL, '0', '20-Feb-2020', NULL, NULL, '2020-02-20 06:14:45', '2020-02-20 06:14:45'),
(17, '4', '13', 20055, 20055, 0, '2', 'Regular', NULL, NULL, NULL, '0', '20-Feb-2020', NULL, NULL, '2020-02-20 11:32:43', '2020-02-20 11:32:43'),
(18, '4', '14', 100, 100, 0, '1', 'Regular', NULL, NULL, NULL, '0', '20-Feb-2020', NULL, NULL, '2020-02-20 17:07:04', '2020-02-20 17:07:04'),
(19, '4', '15', 10567, 5000, 5375, '1', 'EMI', '3', 1792, '2.5', '0', '21-Feb-2020', 375, NULL, '2020-02-21 05:43:14', '2020-02-21 05:43:14'),
(20, '4', '16', 623, 408, 215, '6', 'EMI', '3', 108, '2.5', '0', '21-Feb-2020', 23, NULL, '2020-02-21 09:57:54', '2020-02-21 09:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(255) NOT NULL,
  `total` int(255) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `user`, `order_id`, `product_id`, `productname`, `capacity`, `color`, `qty`, `price`, `total`, `date`, `free`, `free1`, `created_at`, `updated_at`) VALUES
(1, '4', '1', '4', 'LG-3', '3GB Ram 64 GB Rom', 'Default', '3', 100, 300, '14-Feb-2020', NULL, NULL, '2020-02-14 16:49:21', '2020-02-14 16:49:21'),
(2, '4', '1', '5', 'Redmi Note 7 S', '4 GB Ram 64 GB Rom', 'Default', '2', 100, 200, '14-Feb-2020', NULL, NULL, '2020-02-14 16:49:21', '2020-02-14 16:49:21'),
(3, '4', '2', '4', 'LG-3', '3GB Ram 64 GB Rom', 'Default', '3', 100, 300, '14-Feb-2020', NULL, NULL, '2020-02-14 16:50:14', '2020-02-14 16:50:14'),
(4, '4', '2', '5', 'Redmi Note 7 S', '4 GB Ram 64 GB Rom', 'Default', '2', 100, 200, '14-Feb-2020', NULL, NULL, '2020-02-14 16:50:14', '2020-02-14 16:50:14'),
(5, '4', '3', '4', 'LG-3', '3GB Ram 64 GB Rom', 'Default', '3', 100, 300, '14-Feb-2020', NULL, NULL, '2020-02-14 16:58:28', '2020-02-14 16:58:28'),
(6, '4', '3', '5', 'Redmi Note 7 S', '4 GB Ram 64 GB Rom', 'Default', '2', 100, 200, '14-Feb-2020', NULL, NULL, '2020-02-14 16:58:28', '2020-02-14 16:58:28'),
(7, '4', '4', '4', 'LG-3', '3GB Ram 64 GB Rom', 'Default', '3', 100, 300, '14-Feb-2020', NULL, NULL, '2020-02-14 16:59:02', '2020-02-14 16:59:02'),
(8, '4', '4', '5', 'Redmi Note 7 S', '4 GB Ram 64 GB Rom', 'Default', '2', 100, 200, '14-Feb-2020', NULL, NULL, '2020-02-14 16:59:02', '2020-02-14 16:59:02'),
(9, '4', '5', '4', 'LG-3', '3GB Ram 64 GB Rom', 'Default', '3', 100, 300, '14-Feb-2020', NULL, NULL, '2020-02-14 17:06:07', '2020-02-14 17:06:07'),
(10, '4', '5', '5', 'Redmi Note 7 S', '4 GB Ram 64 GB Rom', 'Default', '2', 100, 200, '14-Feb-2020', NULL, NULL, '2020-02-14 17:06:07', '2020-02-14 17:06:07'),
(11, '4', '10', '4', 'LG-3', '3GB Ram 64 GB Rom', 'Default', '5', 100, 500, '16-Feb-2020', NULL, NULL, '2020-02-15 18:30:20', '2020-02-15 18:30:20'),
(12, '4', '10', '5', 'Redmi Note 7 S', '4 GB Ram 64 GB Rom', 'Default', '30', 100, 3000, '16-Feb-2020', NULL, NULL, '2020-02-15 18:30:20', '2020-02-15 18:30:20'),
(13, '2', '11', '1', 'Walton Fezz', '15.5 CFT', 'Default', '3', 60000, 180000, '16-Feb-2020', NULL, NULL, '2020-02-15 18:49:03', '2020-02-15 18:49:03'),
(14, '2', '11', '2', 'TV', 'LED 42 inc', 'Default', '7', 26000, 182000, '16-Feb-2020', NULL, NULL, '2020-02-15 18:49:03', '2020-02-15 18:49:03'),
(15, '4', '12', '4', 'LG-3', '3GB Ram 64 GB Rom', 'Default', '7', 100, 700, '16-Feb-2020', NULL, NULL, '2020-02-16 14:55:32', '2020-02-16 14:55:32'),
(16, '4', '12', '5', 'Redmi Note 7 S', '4 GB Ram 64 GB Rom', 'Default', '3', 100, 300, '16-Feb-2020', NULL, NULL, '2020-02-16 14:55:32', '2020-02-16 14:55:32'),
(17, '4', '13', '4', 'LG-3', '3GB Ram 64 GB Rom', 'Default', '1', 10000, 10000, '16-Feb-2020', NULL, NULL, '2020-02-16 15:10:36', '2020-02-16 15:10:36'),
(18, '2', '14', '1', 'Walton Fezz', '15.5 CFT', 'Default', '4', 60000, 240000, '20-Feb-2020', NULL, NULL, '2020-02-19 19:15:47', '2020-02-19 19:15:47'),
(19, '2', '14', '2', 'TV', 'LED 42 inc', 'Default', '3', 26000, 78000, '20-Feb-2020', NULL, NULL, '2020-02-19 19:15:47', '2020-02-19 19:15:47'),
(20, '2', '15', '9', 'Walton Fezz', '4 GB Ram 64 GB Rom', 'Default', '6', 48, 288, '20-Feb-2020', NULL, NULL, '2020-02-19 19:17:21', '2020-02-19 19:17:21'),
(21, '2', '15', '10', 'Sizzxer', '150 CC', 'Default', '2', 25, 50, '20-Feb-2020', NULL, NULL, '2020-02-19 19:17:21', '2020-02-19 19:17:21'),
(22, '4', '16', '5', 'Redmi Note 7 S', '4 GB Ram 64 GB Rom', 'Default', '1', 100, 100, '20-Feb-2020', NULL, NULL, '2020-02-20 06:14:45', '2020-02-20 06:14:45'),
(23, '4', '16', '6', 'Nokia-12', '3GB Ram 64 GB Rom', 'Default', '1', 100, 100, '2020-2-20', NULL, NULL, '2020-02-20 06:14:45', '2020-02-20 06:14:45'),
(24, '4', '17', '4', 'LG-3', '3GB Ram 64 GB Rom', 'Default', '1', 10055, 10055, '20-Feb-2020', NULL, NULL, '2020-02-20 11:32:43', '2020-02-20 11:32:43'),
(25, '4', '17', '5', 'Redmi Note 7 S', '4 GB Ram 64 GB Rom', 'Default', '1', 10000, 10000, '20-Feb-2020', NULL, NULL, '2020-02-20 11:32:44', '2020-02-20 11:32:44'),
(26, '4', '18', '4', 'LG-3', '3GB Ram 64 GB Rom', 'Default', '1', 100, 100, '20-Feb-2020', NULL, NULL, '2020-02-20 17:07:04', '2020-02-20 17:07:04'),
(27, '4', '19', '5', 'Redmi Note 7 S', '4 GB Ram 64 GB Rom', 'Default', '1', 10000, 10000, '21-Feb-2020', NULL, NULL, '2020-02-21 05:43:14', '2020-02-21 05:43:14'),
(28, '4', '20', '5', 'Redmi Note 7 S', '4 GB Ram 64 GB Rom', 'Default', '5', 100, 500, '21-Feb-2020', NULL, NULL, '2020-02-21 09:57:54', '2020-02-21 09:57:54'),
(29, '4', '20', '6', 'Nokia-12', '3GB Ram 64 GB Rom', 'Default', '1', 100, 100, '21-Feb-2020', NULL, NULL, '2020-02-21 09:57:54', '2020-02-21 09:57:54');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orderid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customerid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` int(255) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `users_id`, `orderid`, `customerid`, `payment`, `date`, `free`, `created_at`, `updated_at`) VALUES
(1, '4', '1', '1', 300, '14-Feb-2020', NULL, '2020-02-14 16:49:21', '2020-02-14 16:49:21'),
(2, '4', '2', '2', 300, '14-Feb-2020', NULL, '2020-02-14 16:50:14', '2020-02-14 16:50:14'),
(3, '4', '3', '3', 300, '14-Feb-2020', NULL, '2020-02-14 16:58:28', '2020-02-14 16:58:28'),
(4, '4', '4', '4', 300, '14-Feb-2020', NULL, '2020-02-14 16:59:02', '2020-02-14 16:59:02'),
(5, '4', '5', '5', 300, '14-Feb-2020', NULL, '2020-02-14 17:06:07', '2020-02-14 17:06:07'),
(6, '4', '2', '2', 72, '15-Feb-2020', NULL, '2020-02-14 19:21:14', '2020-02-14 19:21:14'),
(7, '4', '1', '1', 100, '15-Feb-2020', NULL, '2020-02-14 19:57:45', '2020-02-14 19:57:45'),
(8, '4', '1', '1', 50, '15-Feb-2020', NULL, '2020-02-14 19:58:34', '2020-02-14 19:58:34'),
(9, '4', '2', '2', 71, '15-Feb-2020', NULL, '2020-02-14 20:29:47', '2020-02-14 20:29:47'),
(10, '4', '10', '6', 1233, '16-Feb-2020', NULL, '2020-02-15 18:30:20', '2020-02-15 18:30:20'),
(11, '2', '11', '7', 34566, '16-Feb-2020', NULL, '2020-02-15 18:49:03', '2020-02-15 18:49:03'),
(12, '4', '4', '4', 72, '16-Feb-2020', NULL, '2020-02-16 14:44:12', '2020-02-16 14:44:12'),
(13, '4', '12', '8', 500, '16-Feb-2020', NULL, '2020-02-16 14:55:32', '2020-02-16 14:55:32'),
(14, '4', '12', '8', 179, '16-Feb-2020', NULL, '2020-02-16 14:56:15', '2020-02-16 14:56:15'),
(15, '4', '13', '9', 5000, '16-Feb-2020', NULL, '2020-02-16 15:10:36', '2020-02-16 15:10:36'),
(16, '4', '13', '9', 1767, '16-Feb-2020', NULL, '2020-02-16 15:13:06', '2020-02-16 15:13:06'),
(17, '4', '13', '9', 1767, '16-Feb-2020', NULL, '2020-02-16 15:14:22', '2020-02-16 15:14:22'),
(18, '4', '13', '9', 1766, '16-Feb-2020', NULL, '2020-02-16 15:15:48', '2020-02-16 15:15:48'),
(19, '2', '11', '7', 49115, '20-Feb-2020', NULL, '2020-02-19 18:56:01', '2020-02-19 18:56:01'),
(20, '2', '14', '10', 240000, '20-Feb-2020', NULL, '2020-02-19 19:15:47', '2020-02-19 19:15:47'),
(21, '2', '15', '11', 100, '20-Feb-2020', NULL, '2020-02-19 19:17:21', '2020-02-19 19:17:21'),
(22, '4', '16', '12', 100, '20-Feb-2020', NULL, '2020-02-20 06:14:45', '2020-02-20 06:14:45'),
(23, '4', '17', '13', 20055, '20-Feb-2020', NULL, '2020-02-20 11:32:44', '2020-02-20 11:32:44'),
(24, '4', '18', '14', 100, '20-Feb-2020', NULL, '2020-02-20 17:07:04', '2020-02-20 17:07:04'),
(25, '4', '19', '15', 5000, '21-Feb-2020', NULL, '2020-02-21 05:43:14', '2020-02-21 05:43:14'),
(26, '4', '20', '16', 300, '21-Feb-2020', NULL, '2020-02-21 09:57:54', '2020-02-21 09:57:54'),
(27, '4', '20', '16', 108, '21-Feb-2020', NULL, '2020-02-21 09:58:34', '2020-02-21 09:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saleprice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `collectdate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `band` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dealername` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `user`, `band`, `dealername`, `qty`, `total`, `invoice`, `date`, `free`, `created_at`, `updated_at`) VALUES
(2, '4', '7', 'Sayeed', '5000', '100', '123456', '19-Feb-2020', NULL, '2020-02-19 12:48:48', '2020-02-19 13:00:29'),
(3, '4', '8', 'Sayeed', '108', '100000', '123456', '20-Feb-2020', NULL, '2020-02-19 13:03:46', '2020-02-19 13:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `salaries`
--

INSERT INTO `salaries` (`id`, `user_id`, `employee_id`, `amount`, `free`, `created_at`, `updated_at`) VALUES
(2, '4', '5', '100', NULL, '2020-01-30 19:41:20', '2020-01-30 20:20:04'),
(3, '3', '5', '1200', NULL, '2020-01-30 19:41:38', '2020-01-30 19:41:38'),
(4, '4', '3', '40', NULL, '2020-01-30 19:51:17', '2020-01-30 19:51:17'),
(5, '2', '1', '4545', NULL, '2020-01-30 20:23:43', '2020-01-30 20:23:43'),
(6, '4', '3', '4000', NULL, '2020-02-10 17:54:44', '2020-02-10 17:55:10');

-- --------------------------------------------------------

--
-- Table structure for table `soft_products`
--

CREATE TABLE `soft_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bandid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `productname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyprice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saleprice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `soft_products`
--

INSERT INTO `soft_products` (`id`, `userid`, `bandid`, `productname`, `color`, `buyprice`, `saleprice`, `capacity`, `size`, `image`, `status`, `free`, `free1`, `created_at`, `updated_at`) VALUES
(1, '2', '3', 'Walton Fezz', 'Red', '50000', '60000', '15.5 CFT', '200 liter', 'public/image/5e3ac32b4bffdimages.jpg', '1', NULL, NULL, '2020-02-04 14:12:29', '2020-02-05 13:29:15'),
(2, '2', '3', 'TV', 'Black', '25000', '26000', 'LED 42 inc', NULL, 'public/image/5e3981881a11ddownload (3).jpg', '1', NULL, NULL, '2020-02-04 14:36:57', '2020-02-04 14:36:57'),
(4, '4', '8', 'LG-3', 'White', '15000', '100', '3GB Ram 64 GB Rom', 'LED Display', 'public/image/5e415ca414840download (4).jpg', '1', NULL, NULL, '2020-02-10 13:37:40', '2020-02-14 16:48:11'),
(5, '4', '7', 'Redmi Note 7 S', 'Black', '17000', '100', '4 GB Ram 64 GB Rom', '4000 AMP', 'public/image/5e415ce2a1fa1download (5).jpg', '1', NULL, NULL, '2020-02-10 13:38:42', '2020-02-14 16:48:04'),
(6, '4', '6', 'Nokia-12', 'Orange', '30000', '100', '3GB Ram 64 GB Rom', 'Super Display', 'public/image/5e415d0834bdbimages (2).jpg', '1', NULL, NULL, '2020-02-10 13:39:20', '2020-02-14 16:47:57'),
(8, '4', '6', 'nokla 5', 'All Color', '12000', '100', '4 GB Ram 64 GB Rom', '3 feet by 7 feet', 'public/image/5e41997311eb1download (4).jpg', '1', NULL, NULL, '2020-02-10 17:57:07', '2020-02-14 16:47:49'),
(9, '2', '3', 'Walton Fezz', 'White', '28', '48', '4 GB Ram 64 GB Rom', '3 feet by 7 feet', 'public/image/5e426f2a370183758_menu_img.png', '1', NULL, NULL, '2020-02-11 09:08:58', '2020-02-11 09:08:58'),
(10, '2', '5', 'Sizzxer', 'Green', '14', '25', '150 CC', '200 liter', 'public/image/5e426f991eb19download (1).jpg', '1', NULL, NULL, '2020-02-11 09:10:49', '2020-02-11 10:35:55'),
(11, '2', '2', 'noki3', 'All Color', '13000', '14000', '4 GB Ram 64 GB Rom', 'uu', 'public/image/5e42707cdf1c0download (4).jpg', '1', NULL, NULL, '2020-02-11 09:14:36', '2020-02-11 10:07:43');

-- --------------------------------------------------------

--
-- Table structure for table `stockds`
--

CREATE TABLE `stockds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyprice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `saleprice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stockds`
--

INSERT INTO `stockds` (`id`, `user_id`, `product_id`, `buyprice`, `saleprice`, `qty`, `free`, `created_at`, `updated_at`) VALUES
(1, '2', '1', '50000', '60000', '10', NULL, '2020-02-04 14:12:30', '2020-02-04 14:12:30'),
(2, '2', '2', '25000', '26000', '15', NULL, '2020-02-04 14:36:57', '2020-02-11 06:43:15'),
(4, '4', '4', '15000', '16000', '5', NULL, '2020-02-10 13:37:40', '2020-02-10 13:37:40'),
(5, '4', '5', '17000', '18500', '8', NULL, '2020-02-10 13:38:42', '2020-02-10 13:38:42'),
(6, '4', '6', '30000', '40000', '10', NULL, '2020-02-10 13:39:20', '2020-02-10 13:39:20'),
(7, '4', '7', '23000', '25000', '10', NULL, '2020-02-10 13:42:52', '2020-02-10 13:42:52'),
(11, '4', '7', '12', '78', '5', NULL, '2020-02-10 15:30:58', '2020-02-10 15:30:58'),
(19, '4', '5', '12300', '12300', '8', NULL, '2020-02-10 15:48:42', '2020-02-10 15:48:42'),
(20, '4', '5', '12', '17', '16', NULL, '2020-02-10 15:50:18', '2020-02-10 15:50:18'),
(21, '4', '8', '12000', '14000', '10', NULL, '2020-02-10 17:57:07', '2020-02-10 17:57:07'),
(22, '2', '2', '12', '15', '20', NULL, '2020-02-11 05:46:05', '2020-02-11 06:44:15'),
(23, '2', '1', '12', '15', '10', NULL, '2020-02-11 06:52:22', '2020-02-11 06:52:22'),
(24, '2', '9', '28', '48', '90', NULL, '2020-02-11 09:08:58', '2020-02-11 09:08:58'),
(25, '2', '10', '14', '25', '5', NULL, '2020-02-11 09:10:49', '2020-02-11 09:10:49'),
(26, '2', '11', '13000', '14000', '10', NULL, '2020-02-11 09:14:36', '2020-02-11 09:14:36'),
(27, '4', '5', '12', '30000', '30', NULL, '2020-02-15 18:31:04', '2020-02-15 18:31:04'),
(28, '4', '4', '12', '12000', '10', NULL, '2020-02-15 18:31:25', '2020-02-15 18:31:25');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `user_id`, `product_id`, `stock`, `free`, `created_at`, `updated_at`) VALUES
(1, '2', '1', '13', NULL, '2020-02-04 14:12:30', '2020-02-19 19:15:47'),
(2, '2', '2', '25', NULL, '2020-02-04 14:36:57', '2020-02-19 19:15:47'),
(4, '4', '4', '0', NULL, '2020-02-10 13:37:40', '2020-02-20 17:07:04'),
(5, '4', '5', '21', NULL, '2020-02-10 13:38:42', '2020-02-21 09:57:54'),
(6, '4', '6', '8', NULL, '2020-02-10 13:39:20', '2020-02-21 09:57:54'),
(7, '4', '7', '31', NULL, '2020-02-10 13:42:52', '2020-02-10 15:47:26'),
(8, '4', '8', '10', NULL, '2020-02-10 17:57:07', '2020-02-10 17:57:07'),
(9, '2', '9', '84', NULL, '2020-02-11 09:08:58', '2020-02-19 19:17:21'),
(10, '2', '10', '3', NULL, '2020-02-11 09:10:49', '2020-02-19 19:17:21'),
(11, '2', '11', '10', NULL, '2020-02-11 09:14:37', '2020-02-11 09:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stripe_plan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
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
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `stripe_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_last_four` varchar(4) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trial_ends_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bands`
--
ALTER TABLE `bands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daily_expenses`
--
ALTER TABLE `daily_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soft_products`
--
ALTER TABLE `soft_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stockds`
--
ALTER TABLE `stockds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_user_id_stripe_status_index` (`user_id`,`stripe_status`(191));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bands`
--
ALTER TABLE `bands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `daily_expenses`
--
ALTER TABLE `daily_expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `soft_products`
--
ALTER TABLE `soft_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `stockds`
--
ALTER TABLE `stockds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
