-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th7 12, 2022 lúc 02:13 PM
-- Phiên bản máy phục vụ: 10.2.36-MariaDB
-- Phiên bản PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `oc377_nhahangapp`
--

DELIMITER $$
--
-- Thủ tục
--
$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(11) NOT NULL,
  `id_table` int(11) NOT NULL,
  `bill_maker` int(11) DEFAULT NULL,
  `total` float NOT NULL DEFAULT 0,
  `discount` int(11) NOT NULL DEFAULT 0,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `kh_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `kh_phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `id_table`, `bill_maker`, `total`, `discount`, `status`, `kh_name`, `kh_phone`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 295000, 0, '1', NULL, NULL, '2021-11-18 06:06:06', '2021-11-22 12:59:13'),
(2, 2, 2, 400000, 0, '1', NULL, NULL, '2021-11-18 07:13:10', '2021-11-19 11:13:36'),
(4, 4, 3, 40000, 0, '1', NULL, NULL, '2021-11-21 12:32:33', '2021-11-21 13:52:11'),
(5, 4, 3, 40000, 0, '1', NULL, NULL, '2021-11-21 13:54:50', '2021-11-21 13:54:56'),
(6, 4, 2, 40000, 0, '1', NULL, NULL, '2021-11-21 14:00:26', '2021-11-21 14:00:35'),
(7, 6, 2, 40000, 0, '1', NULL, NULL, '2021-11-21 14:01:11', '2021-11-21 14:01:32'),
(11, 10, 3, 40000, 0, '1', NULL, NULL, '2021-11-22 03:40:53', '2021-11-22 03:41:09'),
(12, 8, 3, 205000, 0, '1', NULL, NULL, '2021-11-22 13:08:01', '2021-11-22 13:24:11'),
(13, 11, 3, 720000, 0, '1', NULL, NULL, '2021-11-22 20:31:41', '2021-11-28 19:48:03'),
(14, 10, 2, 160000, 0, '1', NULL, NULL, '2021-11-23 17:27:58', '2021-11-23 17:32:44'),
(15, 10, 2, 270000, 0, '1', NULL, NULL, '2021-11-26 17:45:10', '2021-11-26 17:48:19'),
(16, 9, 2, 40000, 0, '1', NULL, NULL, '2021-11-28 15:39:57', '2021-11-28 15:42:48'),
(17, 8, 2, 180000, 0, '1', NULL, NULL, '2021-11-28 19:48:21', '2021-12-04 19:55:01'),
(19, 1, 2, 215000, 0, '1', 'Nguyễn Vũ Sơn', '077419765', '2021-12-27 17:15:54', '2021-12-28 16:30:27'),
(20, 5, 2, 160000, 0, '1', 'Nguyễn Vũ Sơn', '077419765', '2021-12-28 15:21:36', '2021-12-28 16:30:30'),
(21, 3, 2, 60000, 50, '1', 'Bruno', '0774657983', '2021-12-28 15:23:22', '2021-12-28 18:34:25'),
(22, 1, 2, 85000, 50, '1', NULL, NULL, '2022-02-26 18:38:35', '2022-02-26 18:40:51'),
(23, 1, 2, 180000, 0, '1', NULL, NULL, '2022-02-27 16:06:44', '2022-02-28 04:31:30'),
(24, 2, 1, 50000, 0, '1', NULL, NULL, '2022-02-28 04:31:53', '2022-02-28 05:29:23'),
(25, 2, 1, 100000, 0, '1', NULL, NULL, '2022-02-28 05:42:30', '2022-02-28 05:42:53'),
(26, 1, 1, 50000, 0, '1', NULL, NULL, '2022-02-28 06:18:27', '2022-02-28 06:26:45'),
(27, 7, 2, 120000, 0, '1', NULL, NULL, '2022-02-28 07:58:55', '2022-02-28 08:00:05'),
(28, 3, 2, 50000, 0, '1', NULL, NULL, '2022-02-28 08:00:49', '2022-02-28 08:01:04'),
(29, 4, 2, 270000, 0, '1', 'Thi', '0965109428', '2022-02-28 08:02:49', '2022-05-10 02:41:18'),
(30, 1, 1, 295000, 0, '1', 'Thi', '0965109428', '2022-05-10 02:18:55', '2022-05-10 02:41:11'),
(31, 1, 1, 0, 0, '0', NULL, NULL, '2022-05-12 07:20:36', '2022-05-12 07:20:36'),
(32, 2, 1, 230000, 0, '0', 'Thi', '965109428', '2022-07-02 02:03:35', '2022-07-02 02:04:58'),
(33, 3, 1, 435000, 0, '0', 'Tâm', '0372600461', '2022-07-02 02:13:04', '2022-07-02 02:25:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_info`
--

CREATE TABLE `bill_info` (
  `id` int(11) NOT NULL,
  `id_bill` int(11) NOT NULL,
  `id_food` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_info`
--

INSERT INTO `bill_info` (`id`, `id_bill`, `id_food`, `quantity`, `ghichu`, `created_at`, `updated_at`) VALUES
(1, 1, 10, 2, NULL, '2021-11-18 06:06:07', '2021-11-21 11:25:49'),
(2, 2, 12, 2, NULL, '2021-11-18 07:13:10', '2021-11-18 07:13:24'),
(3, 1, 4, 3, NULL, '2021-11-18 08:52:53', '2021-11-21 11:25:33'),
(4, 1, 1, 1, NULL, '2021-11-19 03:39:42', '2021-11-22 12:37:01'),
(5, 1, 2, 3, NULL, '2021-11-19 03:39:49', '2021-11-19 10:05:02'),
(9, 2, 10, 2, NULL, '2021-11-19 10:09:29', '2021-11-19 10:10:06'),
(10, 2, 14, 2, NULL, '2021-11-19 10:16:45', '2021-11-19 10:20:03'),
(17, 4, 4, 1, NULL, '2021-11-21 12:35:02', '2021-11-21 12:35:02'),
(30, 5, 2, 1, NULL, '2021-11-21 13:54:50', '2021-11-21 13:54:50'),
(31, 6, 2, 1, NULL, '2021-11-21 14:00:26', '2021-11-21 14:00:26'),
(32, 7, 2, 1, NULL, '2021-11-21 14:01:11', '2021-11-21 14:01:11'),
(38, 11, 4, 1, NULL, '2021-11-22 03:40:53', '2021-11-22 03:40:53'),
(39, 12, 9, 2, NULL, '2021-11-22 13:08:01', '2021-11-22 13:08:01'),
(40, 12, 12, 1, NULL, '2021-11-22 13:08:11', '2021-11-22 13:08:11'),
(41, 12, 14, 1, NULL, '2021-11-22 13:08:18', '2021-11-22 13:08:18'),
(42, 12, 7, 1, NULL, '2021-11-22 13:20:14', '2021-11-22 13:20:14'),
(43, 13, 9, 2, NULL, '2021-11-22 20:31:41', '2021-11-22 20:31:41'),
(44, 13, 11, 2, NULL, '2021-11-22 20:31:50', '2021-11-23 17:26:50'),
(45, 13, 15, 2, NULL, '2021-11-22 20:31:59', '2021-11-27 23:23:13'),
(47, 14, 2, 2, NULL, '2021-11-23 17:27:58', '2021-11-23 17:31:54'),
(48, 14, 3, 1, NULL, '2021-11-23 17:32:08', '2021-11-23 17:32:08'),
(50, 15, 12, 2, NULL, '2021-11-26 17:45:10', '2021-11-26 17:45:10'),
(51, 15, 4, 1, NULL, '2021-11-26 17:45:38', '2021-11-26 17:45:38'),
(52, 15, 3, 2, NULL, '2021-11-26 17:46:09', '2021-11-26 17:46:18'),
(55, 13, 4, 1, NULL, '2021-11-28 00:07:23', '2021-11-28 00:07:23'),
(56, 13, 5, 2, NULL, '2021-11-28 00:09:28', '2021-11-28 00:16:22'),
(57, 13, 7, 3, NULL, '2021-11-28 01:14:17', '2021-11-28 19:31:53'),
(58, 16, 4, 1, NULL, '2021-11-28 15:39:57', '2021-11-28 15:39:57'),
(59, 17, 4, 2, NULL, '2021-11-28 19:48:21', '2021-11-29 03:22:37'),
(60, 17, 5, 2, NULL, '2021-11-29 03:22:48', '2021-12-04 19:54:19'),
(66, 19, 1, 1, NULL, '2021-12-27 17:15:54', '2021-12-27 17:15:54'),
(67, 19, 15, 1, 'ko đuôi bò', '2021-12-27 17:16:34', '2021-12-27 17:16:34'),
(68, 20, 20, 2, NULL, '2021-12-28 15:21:36', '2021-12-28 15:21:36'),
(69, 20, 4, 2, 'rau nhiều', '2021-12-28 15:21:57', '2021-12-28 15:21:57'),
(70, 21, 17, 1, NULL, '2021-12-28 15:23:22', '2021-12-28 15:23:22'),
(71, 22, 17, 1, NULL, '2022-02-26 18:38:35', '2022-02-26 18:38:35'),
(72, 22, 7, 2, NULL, '2022-02-26 18:39:09', '2022-02-26 18:39:09'),
(73, 23, 19, 2, NULL, '2022-02-27 16:06:44', '2022-02-27 16:06:44'),
(74, 24, 5, 1, NULL, '2022-02-28 04:31:53', '2022-02-28 04:31:53'),
(75, 25, 5, 2, NULL, '2022-02-28 05:42:30', '2022-02-28 05:42:30'),
(76, 26, 5, 1, NULL, '2022-02-28 06:18:27', '2022-02-28 06:18:27'),
(77, 27, 13, 2, NULL, '2022-02-28 07:58:55', '2022-02-28 07:59:32'),
(78, 27, 5, 1, NULL, '2022-02-28 07:59:55', '2022-02-28 07:59:55'),
(79, 28, 5, 1, NULL, '2022-02-28 08:00:49', '2022-02-28 08:00:49'),
(80, 29, 19, 3, NULL, '2022-02-28 08:02:49', '2022-02-28 08:03:40'),
(81, 30, 17, 1, NULL, '2022-05-10 02:18:55', '2022-05-10 02:18:55'),
(82, 30, 16, 1, NULL, '2022-05-10 02:19:00', '2022-05-10 02:19:00'),
(83, 30, 13, 1, NULL, '2022-05-10 02:19:12', '2022-05-10 02:19:12'),
(84, 30, 7, 1, NULL, '2022-05-10 02:19:17', '2022-05-10 02:19:17'),
(85, 31, 17, 1, NULL, '2022-05-12 07:20:36', '2022-05-12 07:20:36'),
(86, 32, 5, 1, NULL, '2022-07-02 02:03:35', '2022-07-02 02:03:35'),
(87, 32, 3, 1, NULL, '2022-07-02 02:03:42', '2022-07-02 02:03:42'),
(88, 32, 14, 1, NULL, '2022-07-02 02:03:53', '2022-07-02 02:03:53'),
(89, 32, 16, 1, NULL, '2022-07-02 02:04:02', '2022-07-02 02:04:02'),
(90, 33, 14, 1, NULL, '2022-07-02 02:13:04', '2022-07-02 02:13:04'),
(91, 33, 20, 1, 'không dừa', '2022-07-02 02:13:15', '2022-07-02 02:13:15'),
(92, 33, 10, 1, 'không ớt', '2022-07-02 02:13:57', '2022-07-02 02:13:57'),
(93, 33, 3, 1, NULL, '2022-07-02 02:14:27', '2022-07-02 02:14:27'),
(94, 33, 16, 1, NULL, '2022-07-02 02:14:43', '2022-07-02 02:14:43'),
(95, 33, 13, 1, NULL, '2022-07-02 02:15:36', '2022-07-02 02:15:36'),
(96, 33, 7, 5, NULL, '2022-07-02 02:15:49', '2022-07-02 02:15:49'),
(97, 33, 19, 1, NULL, '2022-07-02 02:16:03', '2022-07-02 02:16:03');

--
-- Bẫy `bill_info`
--
DELIMITER $$
CREATE TRIGGER `UTG_DeleteBillInfo` AFTER DELETE ON `bill_info` FOR EACH ROW BEGIN

DECLARE billInfoID INT(11);
DECLARE billID INT(11);
DECLARE idTable INT(11);
DECLARE dem INT(11);
SET dem = 0;

SET billInfoID = old.id;
SET billID = old.id_bill;

SELECT id_table INTO idTable FROM bill WHERE id = billID;

SELECT COUNT(*) INTO dem FROM bill_info AS bi, bill AS b WHERE b.id= bi.id_bill AND b.id= billID AND b.status = 0;
IF dem=0 THEN
UPDATE `tablefood` SET `status` = 'Trống' WHERE `tablefood`.`id` = idTable;
DELETE FROM bill WHERE id = billID AND status = 0;
END IF;

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Chưa đặt tên',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Hải sản', NULL, '2022-06-01 04:41:58'),
(2, 'Món Bò', NULL, NULL),
(3, 'Món Heo', NULL, NULL),
(4, 'Món Gà', NULL, NULL),
(5, 'Món Cơm', NULL, NULL),
(6, 'Lẩu', NULL, NULL),
(7, 'Special', NULL, '2021-12-31 11:31:56'),
(8, 'Nước giải khát', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Chưa đặt tên',
  `id_cat` int(11) NOT NULL,
  `quantity` int(11) DEFAULT 50,
  `price` float NOT NULL DEFAULT 0,
  `status` varchar(25) COLLATE utf8_unicode_ci DEFAULT 'Còn hàng',
  `img` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `food`
--

INSERT INTO `food` (`id`, `name`, `id_cat`, `quantity`, `price`, `status`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Ốc bươu', 1, 23, 40000, 'Còn hàng', 'buou.png', NULL, '2022-02-18 16:21:57'),
(2, 'Nghêu hấp sả', 1, 0, 40000, 'Còn hàng', 'ngheu-hap-xa-1.jpg', NULL, '2021-12-04 19:41:09'),
(3, 'Sò dương nướng', 1, 39, 40000, 'Còn hàng', 'duong.png', NULL, '2022-02-18 16:27:39'),
(4, 'Sò điệp nướng', 1, 22, 40000, 'Còn hàng', 'diep.png', NULL, '2022-02-18 16:27:04'),
(5, 'Hào phô mai', 1, 34, 50000, 'Còn hàng', 'hao.png', NULL, '2022-02-18 16:30:24'),
(6, 'Ốc mỡ', 1, 48, 40000, 'Còn hàng', 'mo.png', NULL, '2022-02-18 16:31:00'),
(7, 'Coca Cola', 8, 42, 10000, 'Còn hàng', 'coca.jpg', NULL, '2022-02-18 16:36:48'),
(8, 'Pepsi', 8, 49, 10000, 'Còn hàng', 'pepsi.jpg', NULL, '2022-02-18 16:37:26'),
(9, 'Nước suối', 8, 45, 5000, 'Còn hàng', 'dasani-1litre.jpg', NULL, '2022-02-18 16:36:57'),
(10, 'Ốc móng tai', 1, 37, 40000, 'Còn hàng', 'mongtai.png', NULL, '2022-02-18 16:36:23'),
(11, 'Sò huyết xào tỏi', 1, 45, 40000, 'Còn hàng', 'sohuyet.png', NULL, '2022-02-18 16:29:42'),
(12, 'Sò lông nướng', 1, 25, 30000, 'Còn hàng', 'long.png', NULL, '2022-02-18 16:28:05'),
(13, 'Cơm chiên hải sản', 5, 29, 35000, 'Còn hàng', '4741c3cd3380139dd9fe74f7f243b555-cach-lam-com-chien-hai-san-s.jpg', NULL, '2022-02-18 16:28:55'),
(14, 'Ốc hương xào tỏi', 1, 27, 40000, 'Còn hàng', 'huong1.png', NULL, '2022-02-18 16:24:35'),
(15, 'Ốc cà na', 1, 29, 40000, 'Còn hàng', 'cana.png', NULL, '2022-02-18 16:22:43'),
(16, 'Lẩu thái nhỏ', 6, 40, 100000, 'Còn hàng', 'noi-lau-thai-hai-san.jpg', NULL, '2022-02-18 16:26:17'),
(17, 'Lẩu thái lớn', 6, 40, 150000, 'Còn hàng', 'noi-lau-thai-hai-san.jpg', NULL, '2022-02-18 16:26:25'),
(18, 'Sam trứng', 7, 100, 100000, 'Còn hàng', 'sam.png', NULL, '2022-02-18 16:38:35'),
(19, 'Nhum biển', 7, 10, 90000, 'Còn hàng', 'nhum.png', NULL, '2022-02-18 16:38:53'),
(20, 'Ốc len xào dừa', 1, 50, 40000, 'Còn hàng', 'oc-len-xao-dua-.jpg', '2021-12-04 19:33:57', '2021-12-04 19:33:57'),
(21, 'Lẩu bò', 2, 50, 150000, 'Còn hàng', 'Untitled.png', '2022-05-26 15:31:54', '2022-05-26 15:31:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tablefood`
--

CREATE TABLE `tablefood` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Chưa đặt tên bàn',
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Trống',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tablefood`
--

INSERT INTO `tablefood` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bàn 1', 'Có Khách', NULL, NULL),
(2, 'Bàn 2', 'Chờ Thanh Toán', NULL, NULL),
(3, 'Bàn 3', 'Chờ Thanh Toán', NULL, NULL),
(4, 'Bàn 4', 'Trống', NULL, NULL),
(5, 'Bàn 5', 'Trống', NULL, NULL),
(6, 'Bàn 6', 'Trống', NULL, NULL),
(7, 'Bàn 7', 'Trống', NULL, NULL),
(8, 'Bàn 8', 'Trống', NULL, NULL),
(9, 'Bàn 9', 'Trống', NULL, NULL),
(10, 'Bàn 10', 'Trống', NULL, NULL),
(11, 'Bàn 11', 'Trống', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `username`, `email_verified_at`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Thi Phạm', '0774186811', 'admin', NULL, '$2y$10$OtkoDBXDU7/OJC5qEf3HnehV25ARtKoBUsmvVxfCpxvl30zEhhe4m', 1, NULL, '2021-11-24 16:38:30', '2021-11-24 22:07:12'),
(2, 'Nguyễn Anh', '0774568972', 'brunocr7', NULL, '$2y$10$3QZdxVuh1.vwnbFbN1seq.xE0saPjfghH8Rm0QfA9WNXab0Hs7qpS', 0, NULL, '2021-11-24 16:40:06', '2021-11-30 19:03:52'),
(3, 'admin2', '0777896999', 'bkav', NULL, '$2y$10$G9X6HkoBVVU5y7WdN3.V.e.Qu1o4xf/8o6p0SEfG/JNnrH8ef01wC', 0, NULL, '2021-11-24 16:51:31', '2022-05-26 15:59:45'),
(4, 'Thi Phạm', '0965109428', 'carlislepham', NULL, '$2y$10$LVnuoFxRG4XYuATknfUGresWjaSyk5NWXELUs4nn7TMI2Cv2YwGou', 0, NULL, '2022-05-30 05:10:06', '2022-07-07 08:21:02'),
(5, 'Bùi Thuỳ Xuân Vi', '0925211400', 'Xuanvi', NULL, '$2y$10$ZbOV35qftXWezW2gD7E7deLMXoPBiOZqNongllIoBJAjV.28FhAt.', 0, NULL, '2022-06-01 04:58:20', '2022-07-11 05:03:32');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_table` (`id_table`),
  ADD KEY `FK_bill_maker` (`bill_maker`);

--
-- Chỉ mục cho bảng `bill_info`
--
ALTER TABLE `bill_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_bill` (`id_bill`),
  ADD KEY `fk_id_food` (`id_food`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cat` (`id_cat`),
  ADD KEY `id_cat_2` (`id_cat`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `tablefood`
--
ALTER TABLE `tablefood`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `bill_info`
--
ALTER TABLE `bill_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tablefood`
--
ALTER TABLE `tablefood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `fk_id_table` FOREIGN KEY (`id_table`) REFERENCES `tablefood` (`id`);

--
-- Các ràng buộc cho bảng `bill_info`
--
ALTER TABLE `bill_info`
  ADD CONSTRAINT `fk_id_bill` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `fk_id_food` FOREIGN KEY (`id_food`) REFERENCES `food` (`id`);

--
-- Các ràng buộc cho bảng `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `fk_id_cat` FOREIGN KEY (`id_cat`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
