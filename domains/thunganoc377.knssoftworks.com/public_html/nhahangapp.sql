-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2022 at 05:40 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nhahangapp`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetListCat` ()  SELECT ROW_NUMBER() OVER(ORDER BY t.name)id,
       t.name AS cat_name
FROM food AS f 
INNER JOIN categories AS t 
ON t.id = f.id_cat
WHERE f.quantity > 0 
ORDER BY t.name$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PrintBillInfo` (IN `idbill` INT)  SELECT f.name , bi.quantity ,f.price FROM food AS f, bill_info AS bi WHERE f.id = bi.id_food AND bi.id_bill = idbill$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PrintBillInfoTotal` (IN `idbill` INT)  SELECT t.name , b.id ,b.total , b.discount ,b.DateChecked FROM bill AS b, tablefood AS t WHERE b.id = idbill AND t.id = b.id_table$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bill`
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
-- Dumping data for table `bill`
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
(21, 3, 2, 60000, 50, '1', 'Bruno', '0774657983', '2021-12-28 15:23:22', '2021-12-28 18:34:25');

-- --------------------------------------------------------

--
-- Table structure for table `bill_info`
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
-- Dumping data for table `bill_info`
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
(70, 21, 17, 1, NULL, '2021-12-28 15:23:22', '2021-12-28 15:23:22');

--
-- Triggers `bill_info`
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Chưa đặt tên',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Hải sản', NULL, NULL),
(2, 'Món Bò', NULL, NULL),
(3, 'Món Heo', NULL, NULL),
(4, 'Món Gà', NULL, NULL),
(5, 'Món Cơm', NULL, NULL),
(6, 'Lẩu', NULL, NULL),
(7, 'Special', NULL, '2021-12-31 11:31:56'),
(8, 'Nước giải khát', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `food`
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
-- Dumping data for table `food`
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
(20, 'Ốc len xào dừa', 1, 50, 40000, 'Còn hàng', 'oc-len-xao-dua-.jpg', '2021-12-04 19:33:57', '2021-12-04 19:33:57');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tablefood`
--

CREATE TABLE `tablefood` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Chưa đặt tên bàn',
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Trống',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tablefood`
--

INSERT INTO `tablefood` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bàn 1', 'Trống', NULL, NULL),
(2, 'Bàn 2', 'Trống', NULL, NULL),
(3, 'Bàn 3', 'Trống', NULL, NULL),
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
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `username`, `email_verified_at`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Khiêm', '0774186811', 'admin', NULL, '$2y$10$OtkoDBXDU7/OJC5qEf3HnehV25ARtKoBUsmvVxfCpxvl30zEhhe4m', 1, NULL, '2021-11-24 16:38:30', '2021-11-24 22:07:12'),
(2, 'Nguyễn Anh', '0774568972', 'brunocr7', NULL, '$2y$10$3QZdxVuh1.vwnbFbN1seq.xE0saPjfghH8Rm0QfA9WNXab0Hs7qpS', 0, NULL, '2021-11-24 16:40:06', '2021-11-30 19:03:52'),
(3, 'Quảng Nổ', '0777896999', 'bkav', NULL, '$2y$10$fil1wyFoSYjqjk9zK79af.ct.YXrPD2lzoaqw3bThy.HesS9pkf1C', 0, NULL, '2021-11-24 16:51:31', '2021-11-24 19:26:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_table` (`id_table`),
  ADD KEY `FK_bill_maker` (`bill_maker`);

--
-- Indexes for table `bill_info`
--
ALTER TABLE `bill_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_bill` (`id_bill`),
  ADD KEY `fk_id_food` (`id_food`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cat` (`id_cat`),
  ADD KEY `id_cat_2` (`id_cat`);

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
-- Indexes for table `tablefood`
--
ALTER TABLE `tablefood`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `bill_info`
--
ALTER TABLE `bill_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tablefood`
--
ALTER TABLE `tablefood`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `fk_id_table` FOREIGN KEY (`id_table`) REFERENCES `tablefood` (`id`);

--
-- Constraints for table `bill_info`
--
ALTER TABLE `bill_info`
  ADD CONSTRAINT `fk_id_bill` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `fk_id_food` FOREIGN KEY (`id_food`) REFERENCES `food` (`id`);

--
-- Constraints for table `food`
--
ALTER TABLE `food`
  ADD CONSTRAINT `fk_id_cat` FOREIGN KEY (`id_cat`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
