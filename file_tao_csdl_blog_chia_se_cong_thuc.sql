-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th3 07, 2021 lúc 04:42 AM
-- Phiên bản máy phục vụ: 8.0.18
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `blog4`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_supper` tinyint(1) NOT NULL DEFAULT '0',
  `birth` date NOT NULL DEFAULT '2021-01-12',
  `day_account_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `photo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image.jpg',
  `is_lock` tinyint(1) NOT NULL DEFAULT '0',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_supper`, `birth`, `day_account_created`, `phone`, `photo`, `is_lock`, `is_delete`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'AdminSuper', 'adminsuper@gmail.com', NULL, '$2y$10$51WASHX0x6ysO/Jz6hAbSeSzv2q7bRyEYdsg.YXj4VZ7t8Uf.pAnK', 1, '2014-01-22', '2021-01-12 16:33:33', '0905305928', '1610667907.jpg', 0, 0, NULL, '2021-01-12 02:33:33', '2021-01-14 16:45:34'),
(2, 'Nguyễn Trí Đăng Khôi', 'nguyentridangkhoi@gmail.com', NULL, '$2y$10$aj1qn6/81JbJ1yyWqjUShO3bHDi7P0yWZvLJpQ9qNtJG8CdhaqiY2', 1, '2020-10-12', '2021-01-15 10:44:53', '0707327857', '1615090802.jpg', 0, 0, NULL, '2021-01-14 20:44:53', '2021-03-06 21:20:35'),
(10, 'Nguyễn Khoa Đăng', 'nguyenkhoadang@gmail.com', NULL, '$2y$10$xroKkcrhEQASDE1J6dorPuxvuNEmrniW5ZT3bfEmkvl4ChbTAyT1a', 0, '2021-03-11', '2021-03-06 21:27:06', '0909374062', '1615040827.jpg', 0, 0, NULL, '2021-03-06 07:27:07', '2021-03-06 07:27:07'),
(9, 'Đỗ Kim Long', 'dokimlong@gmail.com', NULL, '$2y$10$qQzWci/Hth6SCefF6hD3t.jfrJ3WKzEZSBH7VMaiOvm/oZHhTZjKe', 0, '2000-08-18', '2021-03-06 21:23:54', '0904123456', '1615040634.jpg', 0, 0, NULL, '2021-03-06 07:23:55', '2021-03-06 07:23:55'),
(11, 'Nguyễn Trí Cường', '', NULL, '', 0, '1970-10-26', '2021-03-07 11:24:08', '0905124728', '1615091070.jpg', 0, 1, NULL, '2021-03-06 21:24:08', '2021-03-06 21:24:48');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluans`
--

DROP TABLE IF EXISTS `binhluans`;
CREATE TABLE IF NOT EXISTS `binhluans` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `noi_dung_binh_luan` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cong_thuc_id` int(10) UNSIGNED NOT NULL,
  `thoi_gian_binh_luan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `binhluans_user_id_foreign` (`user_id`),
  KEY `binhluans_cong_thuc_id_foreign` (`cong_thuc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluans`
--

INSERT INTO `binhluans` (`id`, `noi_dung_binh_luan`, `user_id`, `cong_thuc_id`, `thoi_gian_binh_luan`, `created_at`, `updated_at`) VALUES
(30, 'Món này xuất sắc', 17, 1, '2021-03-07 11:26:54', '2021-03-06 21:26:54', '2021-03-06 21:26:54'),
(31, 'ok', 17, 7, '2021-03-07 11:27:10', '2021-03-06 21:27:10', '2021-03-06 21:27:10'),
(29, 'Món này ok lắm.', 16, 7, '2021-03-06 22:03:52', '2021-03-06 08:03:52', '2021-03-06 08:03:52'),
(26, 'ngon quá', 15, 2, '2021-03-06 21:54:58', '2021-03-06 07:54:58', '2021-03-06 07:54:58'),
(27, 'Yes madam', 16, 1, '2021-03-06 22:01:57', '2021-03-06 08:01:57', '2021-03-06 08:01:57'),
(28, 'Món này quá ngon.', 16, 7, '2021-03-06 22:02:19', '2021-03-06 08:02:19', '2021-03-06 08:02:19'),
(25, 'Món này tuyệt vời quá.', 15, 1, '2021-03-06 21:54:29', '2021-03-06 07:54:29', '2021-03-06 07:54:29'),
(24, 'món này ngon quá', 15, 1, '2021-03-06 21:54:10', '2021-03-06 07:54:10', '2021-03-06 07:54:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chiases`
--

DROP TABLE IF EXISTS `chiases`;
CREATE TABLE IF NOT EXISTS `chiases` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cong_thuc_id` int(10) UNSIGNED NOT NULL,
  `da_chia_se` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chiases_user_id_foreign` (`user_id`),
  KEY `chiases_cong_thuc_id_foreign` (`cong_thuc_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `congthucs`
--

DROP TABLE IF EXISTS `congthucs`;
CREATE TABLE IF NOT EXISTS `congthucs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ten_cong_thuc` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `loai_cong_thuc_id` int(10) UNSIGNED NOT NULL,
  `mo_ta_cong_thuc` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinh_anh` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `ngay_dang` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `da_xoa` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `congthucs_admin_id_foreign` (`admin_id`),
  KEY `congthucs_loai_cong_thuc_id_foreign` (`loai_cong_thuc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `congthucs`
--

INSERT INTO `congthucs` (`id`, `ten_cong_thuc`, `admin_id`, `loai_cong_thuc_id`, `mo_ta_cong_thuc`, `hinh_anh`, `ngay_dang`, `da_xoa`, `created_at`, `updated_at`) VALUES
(1, 'Phở Bắc Hải gia truyền.', 2, 11, '<h4>Nguy&ecirc;n liệu của m&oacute;n phở thật sự rất dễ mua v&agrave; dễ t&igrave;m n&ecirc;n mọi người cứ y&ecirc;n t&acirc;m nh&eacute;!</h4>\n<ul>\n<li>Thịt nạm b&ograve; : 0,5 kg</li>\n<li>Thịt thăn b&ograve; : 0,4kg</li>\n<li>Xương cục lợn : 0,5kg</li>\n<li>Phở : 1,2kg</li>\n<li>8 &ndash; 9 hoa hồi</li>\n<li>2 nh&aacute;nh quế</li>\n<li>1 thảo quả</li>\n<li>1 củ gừng</li>\n<li>5 củ h&agrave;nh t&iacute;m</li>\n<li>5 nh&aacute;nh h&agrave;nh l&aacute;</li>\n<li>H&agrave;nh t&acirc;y : 1 củ</li>\n<li>Rau ăn k&egrave;m: H&agrave;nh l&aacute;, m&ugrave;i t&agrave;u, m&ugrave;i ta, h&uacute;ng l&aacute;ng, rau quế</li>\n<li>Gia vị: Muối hạt, nước mắm, đường, bột canh</li>\n</ul>', '1615041917.jpg', '2021-01-12 16:34:57', 1, '2021-01-12 02:34:57', '2021-03-06 07:45:17'),
(2, 'Cơm chiên dương châu', 2, 8, '<h2><span id=\"nguyen_lieu\">Nguy&ecirc;n liệu</span></h2>\n<ul>\n<li>4 ch&eacute;n cơm trắng</li>\n<li>2 quả trứng g&agrave;</li>\n<li>100g thịt x&aacute; x&iacute;u</li>\n<li>1 c&acirc;y lạp xưởng</li>\n<li>20g t&ocirc;m kh&ocirc;</li>\n<li>100g đậu H&agrave; Lan</li>\n<li>1 củ c&agrave; rốt</li>\n<li>1 nắm ng&ograve; r&iacute;</li>\n<li>1 nắm h&agrave;nh l&aacute;</li>\n<li>1 củ tỏi</li>\n<li>C&aacute;c gia vị cần thiết kh&aacute;c: dầu điều, dầu ăn, nước tương (x&igrave; dầu), hạt n&ecirc;m, đường, muối, ti&ecirc;u xay</li>\n</ul>', '1615041737.jpg', '2021-01-12 16:37:18', 1, '2021-01-12 02:37:18', '2021-03-06 07:42:17'),
(3, 'Cơm gà xối mỡ', 2, 8, '<p>&nbsp;</p>\n<h3><span id=\"thuc-hien-lam-com-ga-xoi-mo\">Thực hiện l&agrave;m cơm g&agrave; xối mỡ</span></h3>\n<h4><span id=\"buoc-1-so-che-nguyen-lieu\">Bước 1: Sơ chế nguy&ecirc;n liệu &nbsp;</span></h4>\n<p>G&agrave; rửa sạch, chặt miếng vừa ăn. Ướp g&agrave; c&ugrave;ng với tỏi, hạt n&ecirc;m, một ch&uacute;t đường trong khoảng 30 ph&uacute;t.</p>\n<h4><span id=\"buoc-2-luoc-ga\">Bước 2: Luộc g&agrave;</span></h4>\n<p>Bắc một nồi nước, trong đ&oacute; cho đầu h&agrave;nh, gừng đập dập, th&ecirc;m một ch&uacute;t muối rồi thả g&agrave; đ&atilde; ướp v&agrave;o luộc ch&iacute;n. Sau khi g&agrave; ch&iacute;n, vớt g&agrave; ra để kh&ocirc; thật r&aacute;o nước.</p>\n<h4><span id=\"buoc-3-ran-ga\">Bước 3: R&aacute;n g&agrave;</span></h4>\n<p>G&agrave; phải để thật kh&ocirc; th&igrave; khi r&aacute;n để lớp da g&agrave; mới c&oacute; thể gi&ograve;n rụm. Đổ dầu v&agrave;o chảo, để dầu thật n&oacute;ng rồi thả g&agrave; v&agrave;o r&aacute;n cho tới khi lớp da gi&ograve;n v&agrave; ngả m&agrave;u v&agrave;ng c&aacute;nh gi&aacute;n.</p>\n<p>&nbsp;</p>', '1615090929.jpg', '2021-01-12 16:50:16', 1, '2021-01-12 02:50:16', '2021-03-06 21:22:09'),
(7, 'Hủ tiếu nam vang', 2, 2, '<h2>Nguy&ecirc;n Liệu Nấu Hủ Tiếu Nam Vang</h2>\n<div class=\"ingredients-field default \">\n<ul>\n<li>1kg hủ tiếu nam vang</li>\n<li>600g tần &ocirc;</li>\n<li>400g gan heo</li>\n<li>400g gi&aacute; sống</li>\n<li>400g tim heo</li>\n<li>400g x&agrave; l&aacute;ch</li>\n<li>400g t&ocirc;m s&uacute;</li>\n<li>200g hẹ l&aacute;</li>\n<li>400 nạc lưng heo</li>\n<li>30 c&aacute;i trứng c&uacute;t</li>\n<li>280 thịt nạc xay</li>\n<li>6 quả chanh</li>\n<li>280g mực</li>\n<li>2 củ h&agrave;nh t&acirc;y</li>\n<li>400 xương ống heo</li>\n<li>150g tỏi</li>\n<li>280 kh&ocirc; mực v&agrave; t&ocirc;m kh&ocirc;</li>\n<li>V&agrave; một &iacute;t rau cần t&agrave;u, h&agrave;nh l&aacute;, gừng</li>\n<li>280g củ cải muối</li>\n<li>C&aacute;c loại gia vị</li>\n</ul>\n</div>', '1615041986.jpg', '2021-01-16 13:15:00', 1, '2021-01-15 23:15:00', '2021-03-06 07:46:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhgias`
--

DROP TABLE IF EXISTS `danhgias`;
CREATE TABLE IF NOT EXISTS `danhgias` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cong_thuc_id` int(10) UNSIGNED NOT NULL,
  `muc_do_danh_gia` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `danhgias_user_id_foreign` (`user_id`),
  KEY `danhgias_cong_thuc_id_foreign` (`cong_thuc_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaicongthucs`
--

DROP TABLE IF EXISTS `loaicongthucs`;
CREATE TABLE IF NOT EXISTS `loaicongthucs` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ten_loai_cong_thuc` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `da_xoa` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaicongthucs`
--

INSERT INTO `loaicongthucs` (`id`, `ten_loai_cong_thuc`, `da_xoa`, `created_at`, `updated_at`) VALUES
(1, 'Cơm', 1, '2021-01-12 02:34:16', '2021-03-06 06:53:30'),
(2, 'Món cay 2', 0, '2021-01-12 02:34:27', '2021-03-06 21:20:45'),
(11, 'Món chua 2', 0, '2021-01-15 23:16:10', '2021-03-06 21:20:51'),
(8, 'Món mặn', 0, '2021-01-15 17:43:41', '2021-01-15 17:43:41'),
(7, 'Món chay', 0, '2021-01-15 17:43:34', '2021-01-15 17:43:34'),
(9, 'dvgerberhe', 1, '2021-01-15 19:07:43', '2021-01-15 23:16:01'),
(10, 'klo', 1, '2021-01-15 19:11:43', '2021-01-15 19:24:53'),
(12, 'mon ngon', 1, '2021-03-06 21:21:02', '2021-03-06 21:21:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luutrus`
--

DROP TABLE IF EXISTS `luutrus`;
CREATE TABLE IF NOT EXISTS `luutrus` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cong_thuc_id` int(10) UNSIGNED NOT NULL,
  `thoi_gian_luu_tru` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `luutrus_user_id_foreign` (`user_id`),
  KEY `luutrus_cong_thuc_id_foreign` (`cong_thuc_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2020_12_13_142236_create_loaicongthucs_table', 1),
(9, '2020_12_13_142349_create_congthucs_table', 1),
(10, '2020_12_13_143555_create_binhluans_table', 1),
(11, '2020_12_13_143835_create_chiases_table', 1),
(12, '2020_12_13_144102_create_theodois_table', 1),
(13, '2020_12_13_144247_create_danhgias_table', 1),
(14, '2020_12_13_144411_create_luutrus_table', 1),
(15, '2021_01_12_061643_create_admins_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
CREATE TABLE IF NOT EXISTS `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `client_id` int(10) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
CREATE TABLE IF NOT EXISTS `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
CREATE TABLE IF NOT EXISTS `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `client_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_personal_access_clients_client_id_index` (`client_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
CREATE TABLE IF NOT EXISTS `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `theodois`
--

DROP TABLE IF EXISTS `theodois`;
CREATE TABLE IF NOT EXISTS `theodois` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_theo_doi_id` int(10) UNSIGNED NOT NULL,
  `user_duoc_theo_doi_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `theodois_user_theo_doi_id_foreign` (`user_theo_doi_id`),
  KEY `theodois_user_duoc_theo_doi_id_foreign` (`user_duoc_theo_doi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth` date NOT NULL DEFAULT '2021-01-12',
  `day_account_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `photo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image.jpg',
  `is_lock` tinyint(1) NOT NULL DEFAULT '0',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `birth`, `day_account_created`, `phone`, `photo`, `is_lock`, `is_delete`, `remember_token`, `created_at`, `updated_at`) VALUES
(17, 'Nguyễn Thị Linh', 'nguyenthilinh@gmail.com', NULL, '$2y$10$3dGm5qiK00.eEtIC.qedROx9HV457pejm..cjCxLoCE5E1vDj4wm.', '2021-01-12', '2021-03-07 11:25:27', '0905305928', '1615091137.jpg', 0, 0, NULL, '2021-03-06 21:25:27', '2021-03-06 21:26:08'),
(16, 'Nguyễn Ngọc Thảo My', 'nguyenngocthaomy@gmail.com', NULL, '$2y$10$eQ3UWVInTdFjnXnvjoRNo.cwbPckhhJqgIoc984p8KDKxfIhfHbNO', '2021-01-12', '2021-03-06 22:01:03', '0', '1615042889.jpg', 0, 0, NULL, '2021-03-06 08:01:03', '2021-03-06 08:01:29'),
(15, 'Nguyễn Trí Đăng Khôi', 'nguyentridangkhoi@gmail.com', NULL, '$2y$10$BAUu.nEhDE0kSw0FpdlHCOMjDqxyF1qG9Ag8dKG0/R46ibgR4haJG', '2021-01-12', '2021-03-06 21:06:43', '0', '1615039782.jpg', 0, 0, NULL, '2021-03-06 07:06:43', '2021-03-06 07:09:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
