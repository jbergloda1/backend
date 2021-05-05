-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2021 at 09:32 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoes`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` bigint(20) NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `total` float NOT NULL,
  `payment` varchar(10) NOT NULL,
  `dateorder` date NOT NULL,
  `note` text DEFAULT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `customer_id`, `total`, `payment`, `dateorder`, `note`, `status`, `created_at`, `updated_at`) VALUES
(27, 45, 480000, 'Tiền mặt', '2021-04-16', 'Vui lòng gửi đúng mẫu mã size giày', 3, '2021-04-16 03:04:55', '2021-04-27 23:52:24'),
(28, 47, 320000, 'COD', '2021-04-20', NULL, 3, '2021-04-20 01:14:49', '2021-04-28 01:03:27'),
(76, 95, 260000, 'COD', '2021-04-22', 'thanh toan khi nhan hang', 2, '2021-04-22 01:01:56', '2021-05-03 20:50:18'),
(77, 96, 260000, 'COD', '2021-04-22', 'thanh toan khi nhan hang', 1, '2021-04-22 01:04:05', '2021-04-22 01:04:05'),
(78, 97, 260000, 'COD', '2021-04-22', 'thanh toan khi nhan hang', 2, '2021-04-22 01:19:04', '2021-05-04 02:53:34'),
(109, 132, 320000, 'COD', '2021-04-27', 'asdas', 2, '2021-04-27 00:02:28', '2021-04-27 23:53:00'),
(113, 136, 2900000, 'Banking', '2021-04-27', 'Cho xac nhan banking', 2, '2021-04-27 00:28:32', '2021-04-27 23:52:52'),
(114, 137, 2900000, 'Banking', '2021-04-27', 'Cho xac nhan banking', 3, '2021-04-27 00:30:48', '2021-04-27 23:52:30'),
(117, 140, 2000000, 'Banking', '2021-05-04', 'Cho xac nhan banking', 1, '2021-05-03 21:29:10', '2021-05-03 21:29:10'),
(136, 162, 1300000, 'Banking', '2021-05-04', 'Cho xac nhan banking', 1, '2021-05-04 02:56:28', '2021-05-04 02:56:28'),
(137, 163, 300000, 'Banking', '2021-05-05', 'Cho xac nhan banking', 1, '2021-05-04 23:33:54', '2021-05-04 23:33:54'),
(138, 164, 300000, 'Banking', '2021-05-05', 'Cho xac nhan banking', 1, '2021-05-04 23:35:10', '2021-05-04 23:35:10'),
(139, 165, 300000, 'Banking', '2021-05-05', 'Cho xac nhan banking', 1, '2021-05-04 23:36:14', '2021-05-04 23:36:14'),
(140, 166, 300000, 'Banking', '2021-05-05', 'Cho xac nhan banking', 1, '2021-05-04 23:37:07', '2021-05-04 23:37:07'),
(141, 167, 300000, 'Banking', '2021-05-05', 'Cho xac nhan banking', 1, '2021-05-04 23:39:24', '2021-05-04 23:39:24'),
(142, 168, 300000, 'Banking', '2021-05-05', 'Cho xac nhan banking', 1, '2021-05-05 00:18:35', '2021-05-05 00:18:35'),
(143, 169, 300000, 'Banking', '2021-05-05', 'Cho xac nhan banking', 1, '2021-05-05 00:19:39', '2021-05-05 00:19:39');

-- --------------------------------------------------------

--
-- Table structure for table `bills_detail`
--

CREATE TABLE `bills_detail` (
  `id` bigint(20) NOT NULL,
  `id_bill` bigint(20) NOT NULL,
  `id_product_size_color` bigint(20) NOT NULL,
  `amount` int(10) NOT NULL,
  `price` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bills_detail`
--

INSERT INTO `bills_detail` (`id`, `id_bill`, `id_product_size_color`, `amount`, `price`, `created_at`, `updated_at`) VALUES
(5, 27, 26, 3, 100000, '2021-04-16 03:04:55', '2021-04-16 03:04:55'),
(6, 27, 23, 6, 30000, '2021-04-16 03:04:55', '2021-04-16 03:04:55'),
(80, 76, 25, 2, 100000, '2021-04-22 01:01:56', '2021-04-22 01:01:56'),
(81, 76, 23, 2, 30000, '2021-04-22 01:01:57', '2021-04-22 01:01:57'),
(82, 77, 25, 2, 100000, '2021-04-22 01:04:05', '2021-04-22 01:04:05'),
(83, 77, 23, 2, 30000, '2021-04-22 01:04:05', '2021-04-22 01:04:05'),
(110, 109, 21, 2, 30000, '2021-04-27 00:02:28', '2021-04-27 00:02:28'),
(111, 109, 23, 2, 30000, '2021-04-27 00:02:28', '2021-04-27 00:02:28'),
(112, 109, 26, 2, 100000, '2021-04-27 00:02:28', '2021-04-27 00:02:28'),
(142, 136, 26, 10, 100000, '2021-05-04 02:56:28', '2021-05-04 02:56:28');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nam', 1, '2021-03-31 02:13:23', '2021-03-31 02:13:23'),
(2, 'Nữ', 1, '2021-03-31 02:13:23', '2021-03-31 02:13:23'),
(9, 'abc', 1, '2021-04-11 20:34:20', '2021-04-11 20:34:20'),
(10, 'abcádfsadgf', 1, '2021-04-11 20:34:44', '2021-04-11 20:34:44'),
(11, 'doanhhh', 1, '2021-04-11 21:44:59', '2021-04-11 21:44:59'),
(12, 'dggggg', 1, '2021-04-11 22:46:52', '2021-04-11 22:46:52'),
(13, 'd', 1, '2021-04-11 22:59:26', '2021-04-11 22:59:26'),
(14, '0.2', 1, '2021-04-11 23:00:28', '2021-04-11 23:00:28'),
(15, 'ttt', 1, '2021-04-11 23:09:18', '2021-04-11 23:09:18'),
(16, 'Dép Nike', 1, '2021-04-11 23:45:56', '2021-04-11 23:45:56'),
(17, 'tddtt', 1, '2021-04-11 23:51:35', '2021-04-11 23:51:35'),
(18, 'Trung niên', 1, '2021-04-14 19:00:25', '2021-04-14 19:00:25'),
(19, 'Trungfd niên', 1, '2021-04-14 19:22:10', '2021-04-14 19:22:10');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` bigint(20) NOT NULL,
  `color` varchar(256) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `color`, `created_at`, `updated_at`) VALUES
(139, 'Đen', '2021-04-05 23:40:34', '2021-04-05 23:40:34'),
(140, 'Xám', '2021-04-05 23:40:34', '2021-04-05 23:40:34'),
(141, 'Xanh', '2021-04-07 15:26:07', '2021-04-07 15:26:11');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(256) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `email`, `name`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(45, 'doan@gmail.com', 'Võ Phạm Tấn Đoan', '0337338920', 'Phú Yên', '2021-04-16 03:04:55', '2021-04-16 03:04:55'),
(47, 'nguyenvana@gmail.com', 'Nguyễn Văn A', '0337338920', 'Quy Nhơn, Bình Định', '2021-04-20 01:14:49', '2021-04-20 01:14:49'),
(91, 'nhatlinh@gmail.com', 'Tran Nhat Linh', '0337338920', 'Quy Nhơn, Bình Định', '2021-04-22 00:54:02', '2021-04-22 00:54:02'),
(92, 'nhatlinh@gmail.com', 'Tran Nhat Linh', '0337338920', 'Quy Nhơn, Bình Định', '2021-04-22 00:56:38', '2021-04-22 00:56:38'),
(93, 'nhatlinh@gmail.com', 'Tran Nhat Linh', '0337338920', 'Quy Nhơn, Bình Định', '2021-04-22 00:57:46', '2021-04-22 00:57:46'),
(94, 'nhatlinh@gmail.com', 'Tran Nhat Linh', '0337338920', 'Quy Nhơn, Bình Định', '2021-04-22 00:57:59', '2021-04-22 00:57:59'),
(95, 'nhatlinh@gmail.com', 'Tran Nhat Linh', '0337338920', 'Quy Nhơn, Bình Định', '2021-04-22 01:01:56', '2021-04-22 01:01:56'),
(96, 'nhatlinh@gmail.com', 'Tran Nhat Linh', '0337338920', 'Quy Nhơn, Bình Định', '2021-04-22 01:04:05', '2021-04-22 01:04:05'),
(97, 'nhatlinh@gmail.com', 'Tran Nhat Linh', '0337338920', 'Quy Nhơn, Bình Định', '2021-04-22 01:19:04', '2021-04-22 01:19:04'),
(108, 'test@gmail.com', 'testtest', '0337338920', 'Quy Nhơn, Bình Định', '2021-04-26 21:27:21', '2021-04-26 21:27:21'),
(109, 'test@gmail.com', 'testtest', '0337338920', 'Quy Nhơn, Bình Định', '2021-04-26 21:32:14', '2021-04-26 21:32:14'),
(110, 'test@gmail.com', 'testtest', '0337338920', 'Quy Nhơn, Bình Định', '2021-04-26 21:42:17', '2021-04-26 21:42:17'),
(131, 'test@gmail.com', 'testtest', '0337338920', 'Quy Nhơn, Bình Định', '2021-04-26 23:59:17', '2021-04-26 23:59:17'),
(132, 'test@gmail.com', 'testtest', '0337338920', 'Quy Nhơn, Bình Định', '2021-04-27 00:02:28', '2021-04-27 00:02:28'),
(133, 'test@gmail.com', 'testtest', '0337338920', 'Quy Nhơn, Bình Định', '2021-04-27 00:19:53', '2021-04-27 00:19:53'),
(134, 'test@gmail.com', 'testtest', '0337338920', 'Quy Nhơn, Bình Định', '2021-04-27 00:21:56', '2021-04-27 00:21:56'),
(135, 'test@gmail.com', 'testtest', '0337338920', 'Quy Nhơn, Bình Định', '2021-04-27 00:22:16', '2021-04-27 00:22:16'),
(136, 'finaltest@gmail.com', 'Doan Nguyen', '0337338920', 'Quy Nhơn, Bình Định', '2021-04-27 00:28:32', '2021-04-27 00:28:32'),
(137, 'finaltest@gmail.com', 'Doan Nguyen', '0337338920', 'Quy Nhơn, Bình Định', '2021-04-27 00:30:48', '2021-04-27 00:30:48'),
(140, 'finaltest@gmail.com', 'Doan Nguyen', '0337338920', 'Quy Nhơn, Bình Định', '2021-05-03 21:28:48', '2021-05-03 21:28:48'),
(141, 'finaltest@gmail.com', 'Doan Nguyen', '0337338920', 'Quy Nhơn, Bình Định', '2021-05-03 21:39:00', '2021-05-03 21:39:00'),
(142, 'finaltest@gmail.com', 'Doan Nguyen', '0337338920', 'Quy Nhơn, Bình Định', '2021-05-03 21:40:23', '2021-05-03 21:40:23'),
(143, 'finaltest@gmail.com', 'Doan Nguyen', '0337338920', 'Quy Nhơn, Bình Định', '2021-05-03 21:40:46', '2021-05-03 21:40:46'),
(144, 'finaltest@gmail.com', 'Doan Nguyen', '0337338920', 'Quy Nhơn, Bình Định', '2021-05-03 21:41:27', '2021-05-03 21:41:27'),
(145, 'finaltest@gmail.com', 'Doan Nguyen', '0337338920', 'Quy Nhơn, Bình Định', '2021-05-03 21:42:19', '2021-05-03 21:42:19'),
(146, 'finaltest@gmail.com', 'Doan Nguyen', '0337338920', 'Quy Nhơn, Bình Định', '2021-05-03 21:47:12', '2021-05-03 21:47:12'),
(147, 'finaltest@gmail.com', 'Doan Nguyen', '0337338920', 'Quy Nhơn, Bình Định', '2021-05-03 21:47:39', '2021-05-03 21:47:39'),
(148, 'finaltest@gmail.com', 'Doan Nguyen', '0337338920', 'Quy Nhơn, Bình Định', '2021-05-03 21:48:45', '2021-05-03 21:48:45'),
(149, 'finaltest@gmail.com', 'Doan Nguyen', '0337338920', 'Quy Nhơn, Bình Định', '2021-05-03 21:49:17', '2021-05-03 21:49:17'),
(150, 'finaltest@gmail.com', 'Doan Nguyen', '0337338920', 'Quy Nhơn, Bình Định', '2021-05-03 21:49:27', '2021-05-03 21:49:27'),
(151, 'finaltest@gmail.com', 'Doan Nguyen', '0337338920', 'Quy Nhơn, Bình Định', '2021-05-03 21:49:40', '2021-05-03 21:49:40'),
(152, 'finaltest@gmail.com', 'Doan Nguyen', '0337338920', 'Quy Nhơn, Bình Định', '2021-05-03 21:50:15', '2021-05-03 21:50:15'),
(153, 'finaltest@gmail.com', 'Doan Nguyen', '0337338920', 'Quy Nhơn, Bình Định', '2021-05-03 21:50:51', '2021-05-03 21:50:51'),
(154, 'finaltest@gmail.com', 'Doan Nguyen', '0337338920', 'Quy Nhơn, Bình Định', '2021-05-03 21:51:29', '2021-05-03 21:51:29'),
(155, 'finaltest@gmail.com', 'Doan Nguyen', '0337338920', 'Quy Nhơn, Bình Định', '2021-05-03 21:53:33', '2021-05-03 21:53:33'),
(162, 'finaltest@gmail.com', 'Doan Nguyen', '0337338920', 'Quy Nhơn, Bình Định', '2021-05-04 02:56:28', '2021-05-04 02:56:28'),
(163, 'finaltest@gmail.com', 'Doan Nguyen', '0337338920', 'Quy Nhơn, Bình Định', '2021-05-04 23:33:54', '2021-05-04 23:33:54'),
(164, 'finaltest@gmail.com', 'Doan Nguyen', '0337338920', 'Quy Nhơn, Bình Định', '2021-05-04 23:34:48', '2021-05-04 23:34:48'),
(165, 'finaltest@gmail.com', 'Doan Nguyen', '0337338920', 'Quy Nhơn, Bình Định', '2021-05-04 23:36:14', '2021-05-04 23:36:14'),
(166, 'finaltest@gmail.com', 'Doan Nguyen', '0337338920', 'Quy Nhơn, Bình Định', '2021-05-04 23:37:07', '2021-05-04 23:37:07'),
(167, 'finaltest@gmail.com', 'Doan Nguyen', '0337338920', 'Quy Nhơn, Bình Định', '2021-05-04 23:39:23', '2021-05-04 23:39:23'),
(168, 'finaltest@gmail.com', 'Doan Nguyen', '0337338920', 'Quy Nhơn, Bình Định', '2021-05-05 00:18:35', '2021-05-05 00:18:35'),
(169, 'finaltest@gmail.com', 'Doan Nguyen', '0337338920', 'Quy Nhơn, Bình Định', '2021-05-05 00:19:39', '2021-05-05 00:19:39');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2019_06_05_095305_create_documents_table', 2),
(3, '2019_06_12_102546_create_roles_table', 2),
(4, '2019_06_13_074429_create_users_table', 2),
(5, '2021_03_31_012908_create_categories_table', 2),
(6, '2021_03_31_013423_create_suppliers_table', 2),
(7, '2021_04_01_011805_create_product_colors_table', 2),
(8, '2021_04_01_011826_create_product_sizes_table', 2),
(9, '2021_04_01_011846_create_product_images_table', 2),
(10, '2021_04_01_011922_create_products_table', 2),
(11, '2021_04_06_023813_create_sizes_table', 2),
(12, '2021_04_14_073127_create_sessions_table', 3);

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
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`Id`, `Name`, `Title`) VALUES
(1, 'User.Index', 'view user list'),
(2, 'User.Add', 'Add User'),
(3, 'User.Edit', 'Edit User'),
(4, 'User.Delete', 'Delete User');

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
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` int(100) DEFAULT NULL,
  `img` varchar(256) NOT NULL,
  `note` text NOT NULL,
  `import_price` double NOT NULL,
  `export_price` double DEFAULT NULL,
  `sale` int(100) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `supplier_id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `amount`, `img`, `note`, `import_price`, `export_price`, `sale`, `status`, `supplier_id`, `category_id`, `created_at`, `updated_at`) VALUES
(227, 'Giày thể thao nữ', 500, '657728473.png', 'Giày nhập khẩu', 100000, 30000, 30, 1, 1, 1, '2021-04-11 19:07:57', '2021-05-04 19:59:20'),
(228, 'Giày thể thao nam', 500, '118294873.png', 'Giày nhập khẩu', 100000, 30000, 30, 1, 1, 1, '2021-04-11 19:08:25', '2021-04-11 19:08:25'),
(229, 'Dép Nike', 100, '1245428979.png', 'Dép có vai', 100000, 0, 0, 1, 1, 1, '2021-04-11 23:15:52', '2021-04-11 23:15:52'),
(232, 'Giày Stan Smith', 20, '1486395966.jpg', 'Limited', 1200000, 1080000, 10, 1, 2, 18, '2021-05-04 19:15:44', '2021-05-04 19:15:45'),
(233, 'Sneaker Nam', 20, '1481000781.jpg', 'Limited', 200000, 180000, 10, 1, 14, 18, '2021-05-04 19:27:15', '2021-05-04 19:27:15'),
(234, 'Sneaker Nữ', 20, '648647090.jpg', 'Limited', 200000, 180000, 10, 1, 14, 18, '2021-05-04 21:36:59', '2021-05-04 21:36:59'),
(235, 'Addidas Original', 30, '304459571.jpg', 'Limited', 5000000, 4500000, 10, 1, 2, 18, '2021-05-04 21:38:52', '2021-05-04 21:38:52'),
(236, 'Dép Adidas', 250, '175223924.jpg', 'Limited', 800000, 720000, 10, 1, 2, 18, '2021-05-04 21:39:48', '2021-05-04 21:39:48');

-- --------------------------------------------------------

--
-- Table structure for table `product_size_color`
--

CREATE TABLE `product_size_color` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `size_id` bigint(20) NOT NULL,
  `color_id` bigint(20) NOT NULL,
  `amount` int(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_size_color`
--

INSERT INTO `product_size_color` (`id`, `product_id`, `size_id`, `color_id`, `amount`, `created_at`, `updated_at`) VALUES
(21, 227, 125, 140, 250, '2021-04-11 19:07:57', '2021-04-11 19:07:57'),
(22, 227, 126, 139, 250, '2021-04-11 19:07:57', '2021-04-11 19:07:57'),
(23, 228, 125, 140, 178, '2021-04-11 19:08:25', '2021-04-26 23:41:53'),
(25, 229, 126, 139, -54, '2021-04-11 23:15:52', '2021-04-22 01:44:06'),
(26, 229, 125, 141, 50, '2021-04-11 23:15:52', '2021-04-11 23:15:52'),
(27, 232, 125, 141, 20, '2021-05-04 19:15:44', '2021-05-04 19:15:44'),
(28, 233, 125, 141, 20, '2021-05-04 19:27:15', '2021-05-04 19:27:15'),
(29, 234, 125, 141, 20, '2021-05-04 21:36:59', '2021-05-04 21:36:59'),
(30, 235, 125, 141, 30, '2021-05-04 21:38:52', '2021-05-04 21:38:52'),
(31, 236, 125, 141, 250, '2021-05-04 21:39:48', '2021-05-04 21:39:48');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`Id`, `Name`) VALUES
(1, 'Administrator'),
(2, 'User'),
(3, 'Editor'),
(4, 'Moderators');

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE `role_permission` (
  `Id_role` int(11) NOT NULL,
  `Id_permission` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`Id_role`, `Id_permission`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `session_users`
--

CREATE TABLE `session_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `refresh_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token_expried` datetime NOT NULL,
  `refresh_token_expried` datetime NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `session_users`
--

INSERT INTO `session_users` (`id`, `token`, `refresh_token`, `token_expried`, `refresh_token_expried`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1hSrr4qoKNsFzXmMVfxUZMsXhg1FW90IFSZ8UXY2', 'ZCdW8KhcDun2gum2C9r9xPCFhA0jJdONg2Fk732M', '2021-05-06 10:06:47', '2022-04-01 10:06:47', 5, '2021-04-06 03:06:47', '2021-04-06 03:06:47'),
(2, 'sLdOtL3RK4w3wn9wxvAtU7yhEfb7tcBZPDH78miS', 'bDWDhlhuJLiQAVWJFQH9gySbal2uhq46n9YBnqpV', '2021-05-28 04:20:22', '2022-04-23 04:20:22', 23, '2021-04-27 21:20:22', '2021-04-27 21:20:22'),
(3, 'XzFzFMXVvv1roaShUlbGPTpmfw5mAamUVxOZcgVT', 'kz0mW75gN4QBq5jMlFWzjJyvVVJ8sCT8iHoKloBs', '2021-06-03 02:01:53', '2022-04-29 02:01:53', 22, '2021-05-03 19:01:53', '2021-05-03 19:01:53');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` bigint(20) NOT NULL,
  `size` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `size`, `created_at`, `updated_at`) VALUES
(125, 39, NULL, NULL),
(126, 40, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` bigint(20) NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `name` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `phone` int(12) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `category_id`, `name`, `address`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nike', 'USA', 1232456, 1, '2021-03-31 04:07:32', '2021-03-31 04:07:32'),
(2, 2, 'ADIDAS', 'Việt Nam', 963852741, 1, '2021-03-31 04:07:32', '2021-03-31 04:07:32'),
(14, 1, 'Sneaker', 'Việt Nam', 963852741, 1, '2021-05-04 19:26:31', '2021-05-04 19:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateofbirth` date NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(256) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `img` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_role` int(1) DEFAULT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `code`, `name`, `dateofbirth`, `phone`, `address`, `email`, `email_verified_at`, `img`, `password`, `id_role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'NV003', 'Lee Zet', '1999-02-03', 123456, 'Phú Yên', 'user2@gmail.com', NULL, '1158028106.jpg', '123456789', 2, 1, '2021-04-09 01:21:48', '2021-04-09 01:21:48'),
(2, 'NV002', 'Nguyen Tan Doan', '1999-02-03', 123456, 'Phú Yên', 'user@gmail.com', NULL, '1158028706.jpg', '123456789', 2, 1, '2021-04-09 01:21:48', '2021-04-09 01:21:48'),
(22, 'NV001', 'Trần Nhật Linh', '1999-02-03', 123456, 'Phú Yên', 'admin@gmail.com', NULL, '1158048706.jpg', '$2y$10$ThKejiPLQJDeH2OudfdtMOCFkMBlkSlCGtUa8PJQ.qXym/32LwjFe', 1, 1, '2021-04-09 01:21:48', '2021-04-09 01:21:48'),
(23, 'NV012', 'Phap Dinh', '1999-02-03', 665987216, 'Song Cau - Phu Yen', 'phapdinh@gmail.com', NULL, '1960380112.jpg', '$2y$10$WKvZKg3Ob4qH5FmOKbOuf.D3HoO9eWXNBSkEW8Pm1YQSEZnyT1a/2', NULL, 1, '2021-04-27 21:19:55', '2021-04-27 21:19:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `bills_detail`
--
ALTER TABLE `bills_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bill` (`id_bill`),
  ADD KEY `id_product_size_color` (`id_product_size_color`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
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
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supplier_id` (`supplier_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `product_size_color`
--
ALTER TABLE `product_size_color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `size_id` (`size_id`),
  ADD KEY `color_id` (`color_id`);

--
-- Indexes for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD KEY `fk_id_permission` (`Id_permission`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `session_users`
--
ALTER TABLE `session_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `bills_detail`
--
ALTER TABLE `bills_detail`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `product_size_color`
--
ALTER TABLE `product_size_color`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `session_users`
--
ALTER TABLE `session_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `bills_detail`
--
ALTER TABLE `bills_detail`
  ADD CONSTRAINT `bills_detail_ibfk_1` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `bills_detail_ibfk_3` FOREIGN KEY (`id_product_size_color`) REFERENCES `product_size_color` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `product_size_color`
--
ALTER TABLE `product_size_color`
  ADD CONSTRAINT `product_size_color_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `product_size_color_ibfk_2` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`),
  ADD CONSTRAINT `product_size_color_ibfk_3` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`);

--
-- Constraints for table `role_permission`
--
ALTER TABLE `role_permission`
  ADD CONSTRAINT `fk_id_permission` FOREIGN KEY (`Id_permission`) REFERENCES `permission` (`Id`);

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_id_role` FOREIGN KEY (`id_role`) REFERENCES `roles` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
