-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th10 17, 2023 lúc 04:59 PM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ptw2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accounts`
--

DROP TABLE IF EXISTS `accounts`;
CREATE TABLE IF NOT EXISTS `accounts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`id`, `name`, `phone`, `address`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'user1', '1234567890', 'abc', 'user.png', NULL, NULL),
(2, 'user2', '1234567890', 'abc', 'user.png', NULL, NULL),
(3, 'user3', '1234567890', 'abc', 'user.png', NULL, NULL),
(4, 'user4', '1234567890', 'abc', 'user.png', NULL, NULL),
(5, 'user5', '1234567890', 'abc', 'user.png', NULL, NULL),
(6, 'user6', '1234567890', 'abc', 'user.png', NULL, NULL),
(7, 'user7', '1234567890', 'abc', 'user.png', NULL, NULL),
(8, 'user8', '1234567890', 'abc', 'user.png', NULL, NULL),
(9, 'user9', '1234567890', 'abc', 'user.png', NULL, NULL),
(10, 'user10', '1234567890', 'abc', 'user.png', NULL, NULL),
(11, 'user11', '1234567890', 'abc', 'user.png', NULL, NULL),
(12, 'user12', '1234567890', 'abc', 'user.png', NULL, NULL),
(13, 'user13', '1234567890', 'abc', 'user.png', NULL, NULL),
(14, 'user14', '1234567890', 'abc', 'user.png', NULL, NULL),
(15, 'user15', '1234567890', 'abc', 'user.png', NULL, NULL),
(16, 'user16', '1234567890', 'abc', 'user.png', NULL, NULL),
(17, 'user17', '1234567890', 'abc', 'user.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

DROP TABLE IF EXISTS `bills`;
CREATE TABLE IF NOT EXISTS `bills` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping` bigint NOT NULL,
  `total` bigint NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bills_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Giày', NULL, NULL),
(2, 'Áo', NULL, NULL),
(3, 'Quần', NULL, NULL),
(4, 'Áo đấu', NULL, NULL),
(5, 'Bộ', NULL, NULL),
(6, 'Phụ kiện', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufacturers`
--

DROP TABLE IF EXISTS `manufacturers`;
CREATE TABLE IF NOT EXISTS `manufacturers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Adidas', 'adidas.png', NULL, NULL),
(2, 'Hitec', 'hitec.png', NULL, NULL),
(3, 'NEW BALANCE', 'newbalance.png', NULL, NULL),
(4, 'Reebok', 'reebok.png', NULL, NULL),
(5, 'Nike', 'nike.png', NULL, NULL),
(6, 'Puma', 'puma.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 2),
(3, '2019_08_19_000000_create_failed_jobs_table', 3),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 4),
(5, '2023_11_10_023115_create_products_table', 4),
(6, '2023_11_15_024352_create_categories_table', 4),
(7, '2023_11_15_024426_create_manufacturers_table', 4),
(8, '2023_11_15_024459_create_orders_table', 4),
(9, '2023_11_15_025018_create_accounts_table', 4),
(10, '2023_11_15_055508_create_bills_table', 4),
(11, '2023_11_17_135512_create_sexes_table', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `bills_id` bigint UNSIGNED NOT NULL,
  `product_id` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL,
  `price` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_product_id_foreign` (`product_id`),
  KEY `orders_bills_id_foreign` (`bills_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` bigint UNSIGNED NOT NULL DEFAULT '0',
  `categories_id` bigint UNSIGNED NOT NULL,
  `manufacturer_id` bigint UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_categories_id_foreign` (`categories_id`),
  KEY `products_manufacturer_id_foreign` (`manufacturer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `image`, `sex`, `categories_id`, `manufacturer_id`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 'BỘ ARSENAL - QUẦN ÁO THỂ THAO LONG THANH', '11134207.jpg', 1, 5, 1, 'THÔNG TIN SẢN PHẨM:<br>- Chất Liệu: Thun Lạnh thể thao, thấm hút mồ hôi tốt, độ co giãn cực tốt. In ép công nghệ 3D hiện đại,màu sắc luôn tươi mới, Sử dụng mực INTECK Hàn Quốc lành tính với tất cả làn da nhạy cảm nhất', 27, NULL, NULL),
(2, 'Bộ Quần Áo Thể Thao Nam Chất Nỉ CottonCao', 'vn-11134207-7r98o-lkuihpjidmpn2a.jpg', 1, 2, 2, 'THÔNG TIN SẢN PHẨM:<br>- Chất Liệu: Thun Lạnh thể thao, thấm hút mồ hôi tốt, độ co giãn cực tốt. In ép công nghệ 3D hiện đại,màu sắc luôn tươi mới, Sử dụng mực INTECK Hàn Quốc lành tính với tất cả làn da nhạy cảm nhất', 27, NULL, NULL),
(3, 'BỘ QUẦN ÁO THỂ THAO NỮ', '436845a322df0db209f11dceb550018a_tn.jpg', 2, 5, 3, 'THÔNG TIN SẢN PHẨM:<br>- Chất Liệu: Thun Lạnh thể thao, thấm hút mồ hôi tốt, độ co giãn cực tốt. In ép công nghệ 3D hiện đại,màu sắc luôn tươi mới, Sử dụng mực INTECK Hàn Quốc lành tính với tất cả làn da nhạy cảm nhất', 27, NULL, NULL),
(4, 'CHÂN VÁY TENNIS 2 LỚP CAO CẤP', 'vn-11134201-23030-skss6gebomovff.jpg', 1, 6, 3, 'THÔNG TIN SẢN PHẨM:<br>- Chất Liệu: Thun Lạnh thể thao, thấm hút mồ hôi tốt, độ co giãn cực tốt. In ép công nghệ 3D hiện đại,màu sắc luôn tươi mới, Sử dụng mực INTECK Hàn Quốc lành tính với tất cả làn da nhạy cảm nhất', 27, NULL, NULL),
(5, 'BỘ QUẦN ÁO THỂ THAO - CLB PSG', 'vn-11134207-7qukw-lhvg35yxvh6p7a.jpg', 1, 5, 1, 'THÔNG TIN SẢN PHẨM:<br>- Chất Liệu: Thun Lạnh thể thao, thấm hút mồ hôi tốt, độ co giãn cực tốt. In ép công nghệ 3D hiện đại,màu sắc luôn tươi mới, Sử dụng mực INTECK Hàn Quốc lành tính với tất cả làn da nhạy cảm nhất', 27, NULL, NULL),
(6, 'Bộ phụ kiện dung cụ xoay balisong', 'vn-11134207-7r98o-llvvqgewbtgfa0.jpg', 1, 6, 4, 'THÔNG TIN SẢN PHẨM:<br>- Chất Liệu: Thun Lạnh thể thao, thấm hút mồ hôi tốt, độ co giãn cực tốt. In ép công nghệ 3D hiện đại,màu sắc luôn tươi mới, Sử dụng mực INTECK Hàn Quốc lành tính với tất cả làn da nhạy cảm nhất', 27, NULL, NULL),
(7, 'Dây Nhảy Thể Dục Và Đai Bảo Vệ Hỗ Trợ Khắc Phục Gù Lưng Cao Cấp', 'vn-11134207-7r98o-lmygi7di90wvec_tn.jpg', 3, 6, 3, 'THÔNG TIN SẢN PHẨM:<br>- Chất Liệu: Thun Lạnh thể thao, thấm hút mồ hôi tốt, độ co giãn cực tốt. In ép công nghệ 3D hiện đại,màu sắc luôn tươi mới, Sử dụng mực INTECK Hàn Quốc lành tính với tất cả làn da nhạy cảm nhất', 27, NULL, NULL),
(8, 'Băng Bảo Vệ Đầu Gối LI-NING Chính Hãng Đệm Đầu Gối', 'vn-11134207-7r98o-llnl6mh9q3in2b.jpg', 3, 6, 5, 'THÔNG TIN SẢN PHẨM:<br>- Chất Liệu: Thun Lạnh thể thao, thấm hút mồ hôi tốt, độ co giãn cực tốt. In ép công nghệ 3D hiện đại,màu sắc luôn tươi mới, Sử dụng mực INTECK Hàn Quốc lành tính với tất cả làn da nhạy cảm nhất', 27, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sexes`
--

DROP TABLE IF EXISTS `sexes`;
CREATE TABLE IF NOT EXISTS `sexes` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sexes`
--

INSERT INTO `sexes` (`id`, `text`, `created_at`, `updated_at`) VALUES
(1, 'Nam', NULL, NULL),
(2, 'Nữ', NULL, NULL),
(3, 'Tất cả', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `id_account`, `is_admin`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '$2y$12$ezynSqiX.PNvGiiXRTXHC.VfcAb/wvzPw6tS3MlE6GChIKAsWP3tG', '1', 1, NULL, NULL, NULL, NULL),
(2, 'user1@gmail.com', '$2y$12$Sb.Jsw2HdMgQpXm8aKJH7epuuVP.usgRfyV5GYwxssqpw60uD0rZS', '2', 0, NULL, NULL, NULL, NULL),
(3, 'user2@gmail.com', '$2y$12$Sb.Jsw2HdMgQpXm8aKJH7epuuVP.usgRfyV5GYwxssqpw60uD0rZS', '3', 0, NULL, NULL, NULL, NULL),
(4, 'user3@gmail.com', '$2y$12$Sb.Jsw2HdMgQpXm8aKJH7epuuVP.usgRfyV5GYwxssqpw60uD0rZS', '4', 0, NULL, NULL, NULL, NULL),
(5, 'user4@gmail.com', '$2y$12$Sb.Jsw2HdMgQpXm8aKJH7epuuVP.usgRfyV5GYwxssqpw60uD0rZS', '5', 0, NULL, NULL, NULL, NULL),
(6, 'user5@gmail.com', '$2y$12$Sb.Jsw2HdMgQpXm8aKJH7epuuVP.usgRfyV5GYwxssqpw60uD0rZS', '6', 0, NULL, NULL, NULL, NULL),
(7, 'user6@gmail.com', '$2y$12$Sb.Jsw2HdMgQpXm8aKJH7epuuVP.usgRfyV5GYwxssqpw60uD0rZS', '7', 0, NULL, NULL, NULL, NULL),
(8, 'user7@gmail.com', '$2y$12$Sb.Jsw2HdMgQpXm8aKJH7epuuVP.usgRfyV5GYwxssqpw60uD0rZS', '8', 0, NULL, NULL, NULL, NULL),
(9, 'user8@gmail.com', '$2y$12$Sb.Jsw2HdMgQpXm8aKJH7epuuVP.usgRfyV5GYwxssqpw60uD0rZS', '9', 0, NULL, NULL, NULL, NULL),
(10, 'user9@gmail.com', '$2y$12$Sb.Jsw2HdMgQpXm8aKJH7epuuVP.usgRfyV5GYwxssqpw60uD0rZS', '10', 0, NULL, NULL, NULL, NULL),
(11, 'user10@gmail.com', '$2y$12$Sb.Jsw2HdMgQpXm8aKJH7epuuVP.usgRfyV5GYwxssqpw60uD0rZS', '11', 0, NULL, NULL, NULL, NULL),
(12, 'user11@gmail.com', '$2y$12$Sb.Jsw2HdMgQpXm8aKJH7epuuVP.usgRfyV5GYwxssqpw60uD0rZS', '12', 0, NULL, NULL, NULL, NULL),
(13, 'user12@gmail.com', '$2y$12$Sb.Jsw2HdMgQpXm8aKJH7epuuVP.usgRfyV5GYwxssqpw60uD0rZS', '13', 0, NULL, NULL, NULL, NULL),
(14, 'user13@gmail.com', '$2y$12$Sb.Jsw2HdMgQpXm8aKJH7epuuVP.usgRfyV5GYwxssqpw60uD0rZS', '14', 0, NULL, NULL, NULL, NULL),
(15, 'user14@gmail.com', '$2y$12$Sb.Jsw2HdMgQpXm8aKJH7epuuVP.usgRfyV5GYwxssqpw60uD0rZS', '15', 0, NULL, NULL, NULL, NULL),
(16, 'user15@gmail.com', '$2y$12$Sb.Jsw2HdMgQpXm8aKJH7epuuVP.usgRfyV5GYwxssqpw60uD0rZS', '16', 0, NULL, NULL, NULL, NULL),
(17, 'user16@gmail.com', '$2y$12$Sb.Jsw2HdMgQpXm8aKJH7epuuVP.usgRfyV5GYwxssqpw60uD0rZS', '17', 0, NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
