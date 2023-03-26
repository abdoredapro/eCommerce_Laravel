-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2023 at 11:14 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2023-03-25 00:24:08', '$2y$10$mwa/n4oJ8z.ec1NspAPOh.evt2t9c7fpM5oGXaJzhVsQUcGkDRq3S', '7ZnWfvAsYpVuPAszrYIIHcuKcTF1pjwwBsQRAijzfGlcrVsZyVJQs4bLik6U', NULL, NULL, '2023-03-25 00:24:09', '2023-03-25 00:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name_en` varchar(255) NOT NULL,
  `brand_name_ar` varchar(255) NOT NULL,
  `brand_slug_en` varchar(255) NOT NULL,
  `brand_slug_ar` varchar(255) NOT NULL,
  `brand_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name_en`, `brand_name_ar`, `brand_slug_en`, `brand_slug_ar`, `brand_image`, `created_at`, `updated_at`) VALUES
(2, 'Apple', 'ابل', 'apple', 'ابل', '2258_Apple-Logo-PNG-Image-715x715.png', NULL, NULL),
(3, 'Huawei', 'هواوى', 'huawei', 'هواوى', '978_Huawei-Logo.wine.png', NULL, NULL),
(4, 'Oppo', 'اوبو', 'oppo', 'اوبو', '239_Oppo-Logo.wine.png', NULL, NULL),
(5, 'Samsung', 'سامسونج', 'samsung', 'سامسونج', '1984_Samsung_logo.png', NULL, NULL),
(6, 'Xiawmi', 'شاومى', 'xiawmi', 'شاومى', '149_unnamed.png', NULL, NULL),
(7, 'Vivo', 'فيفو', 'vivo', 'فيفو', '93_vivo-Phone-logo.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name_en` varchar(255) NOT NULL,
  `category_name_ar` varchar(255) NOT NULL,
  `category_slug_en` varchar(255) NOT NULL,
  `category_slug_ar` varchar(255) NOT NULL,
  `category_icon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name_en`, `category_name_ar`, `category_slug_en`, `category_slug_ar`, `category_icon`, `created_at`, `updated_at`) VALUES
(1, 'Fashion', 'فاشون', 'fashion', 'فاشون', 'fa fa-heart', NULL, NULL),
(2, 'Electronics', 'الكترونيات', 'electronics', 'الكترونيات', 'fa fa-television', NULL, NULL),
(3, 'Sweet Home', 'منزل جميل', 'sweet-home', 'منزل-جميل', 'fa fa-home', NULL, NULL),
(4, 'Appliances', 'الأجهزة', 'appliances', 'الأجهزة', 'fa fa-television', NULL, NULL),
(5, 'Beauty', 'جمال', 'beauty', 'جمال', 'fa fa-female', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `shippin_name` varchar(255) NOT NULL,
  `shipping_email` varchar(255) NOT NULL,
  `shipping_phone` varchar(255) NOT NULL,
  `post_code` int(11) NOT NULL,
  `note` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) NOT NULL,
  `coupon_discount` int(11) NOT NULL,
  `coupon_validity` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `district_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tanta', '2023-03-25 18:11:12', NULL),
(2, 1, 'Esmailia', '2023-03-25 18:12:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `division_name`, `created_at`, `updated_at`) VALUES
(1, 'Cairo', '2023-03-25 18:10:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_02_02_203839_create_sessions_table', 1),
(7, '2021_02_02_212221_create_admins_table', 1),
(8, '2022_03_04_095006_create_brands_table', 1),
(9, '2022_03_05_184013_create_categories_table', 1),
(10, '2022_03_05_214419_create_sub_categories_table', 1),
(11, '2022_03_06_202130_create_sub_sub_categories_table', 1),
(12, '2022_03_07_193413_create_products_table', 1),
(13, '2022_03_07_200601_create_multi__images_table', 1),
(14, '2022_03_12_153936_create_sliders_table', 1),
(15, '2022_03_18_175140_create_wishlists_table', 1),
(16, '2022_03_20_162601_create_coupons_table', 1),
(17, '2022_03_20_194509_create_divisions_table', 1),
(18, '2022_03_20_201438_create_districts_table', 1),
(19, '2022_03_20_212012_create_states_table', 1),
(20, '2022_03_23_150659_create_checkouts_table', 1),
(21, '2022_03_23_215458_create_orders_table', 1),
(22, '2022_03_23_215604_create_order_items_table', 1),
(23, '2022_03_28_194249_create_site_settings_table', 1),
(24, '2022_03_28_202046_create_seos_table', 1),
(25, '2022_03_29_132151_create_reviews_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `multi__images`
--

CREATE TABLE `multi__images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi__images`
--

INSERT INTO `multi__images` (`id`, `product_id`, `image_name`, `created_at`, `updated_at`) VALUES
(1, 5, '2251_81znskk9xdL._AC_SY550_.jpg', '2023-03-25 17:03:28', NULL),
(2, 5, '9851_817Yx-9vAvL._AC_SY550_.jpg', '2023-03-25 17:03:28', NULL),
(3, 6, '4188_51HhYD53fML._AC_SX425_.jpg', '2023-03-25 17:27:21', NULL),
(4, 6, '4460_51lK7219NJL._AC_SX425_.jpg', '2023-03-25 17:27:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `post_code` int(11) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `payment_type` varchar(255) NOT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `currency` varchar(255) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `order_number` varchar(255) DEFAULT NULL,
  `invoice_no` varchar(255) NOT NULL,
  `order_date` varchar(255) NOT NULL,
  `order_month` varchar(255) NOT NULL,
  `order_year` varchar(255) NOT NULL,
  `confirmed_date` varchar(255) DEFAULT NULL,
  `processing_date` varchar(255) DEFAULT NULL,
  `picked_date` varchar(255) DEFAULT NULL,
  `shipped_date` varchar(255) DEFAULT NULL,
  `delivered_date` varchar(255) DEFAULT NULL,
  `return_order` tinyint(4) NOT NULL DEFAULT 0,
  `cancel_date` varchar(255) DEFAULT NULL,
  `return_date` varchar(255) DEFAULT NULL,
  `return_reason` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `division_id`, `district_id`, `state_id`, `name`, `email`, `phone`, `post_code`, `notes`, `payment_type`, `payment_method`, `transaction_id`, `currency`, `amount`, `order_number`, `invoice_no`, `order_date`, `order_month`, `order_year`, `confirmed_date`, `processing_date`, `picked_date`, `shipped_date`, `delivered_date`, `return_order`, `cancel_date`, `return_date`, `return_reason`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 1, 'Abdo reda', 'abdo@gmail.com', '01014318965', 10050, 'ssssss', 'Cash On Delivery', 'Cash', '3007EN', 'usd', 298.00, '8258', 'Nemr78405671', '25 March 2023', 'March', '2023', NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'Pending', '2023-03-25 18:12:58', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `qty` varchar(255) NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `color`, `size`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL, '1', 280.00, '2023-03-25 18:13:10', NULL),
(2, 1, 6, 'black', '1', '1', 18.00, '2023-03-25 18:13:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `Subcategory_id` int(11) NOT NULL,
  `SubSubCategory_id` int(11) NOT NULL,
  `product_name_en` varchar(255) NOT NULL,
  `product_name_ar` varchar(255) NOT NULL,
  `product_slug_en` varchar(255) NOT NULL,
  `product_slug_ar` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_amount` varchar(255) NOT NULL,
  `product_tags_en` varchar(255) NOT NULL,
  `product_tags_ar` varchar(255) NOT NULL,
  `product_size_en` varchar(255) DEFAULT NULL,
  `product_size_ar` varchar(255) DEFAULT NULL,
  `product_color_en` varchar(255) DEFAULT NULL,
  `product_color_ar` varchar(255) DEFAULT NULL,
  `selling_price` varchar(255) NOT NULL,
  `discount_price` varchar(255) DEFAULT NULL,
  `short_des_en` varchar(255) NOT NULL,
  `short_des_ar` varchar(255) NOT NULL,
  `long_des_en` text NOT NULL,
  `long_des_ar` text NOT NULL,
  `product_thambnail` varchar(255) NOT NULL,
  `hot_deals` int(11) DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `speacial_offer` int(11) DEFAULT NULL,
  `speacial_deals` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `Subcategory_id`, `SubSubCategory_id`, `product_name_en`, `product_name_ar`, `product_slug_en`, `product_slug_ar`, `product_code`, `product_amount`, `product_tags_en`, `product_tags_ar`, `product_size_en`, `product_size_ar`, `product_color_en`, `product_color_ar`, `selling_price`, `discount_price`, `short_des_en`, `short_des_ar`, `long_des_en`, `long_des_ar`, `product_thambnail`, `hot_deals`, `featured`, `speacial_offer`, `speacial_deals`, `status`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 1, 1, 'Ravin EG mens Ravin Sweatshirt', 'تيشرت رجالى', 'ravin-eg-mens-ravin-practical-full-sleeves-zipped-sweatshirt-w6m094-hooded-sweatshirt', 'تيشرت-رجالى', '458', '20', 'tshirt,man', 'تيشرت', '38', '38', 'red', 'اسود', '300', '280', 'This sweatshirt from Ravin', 'هذا القميص من النوع الثقيل من Ravin', '<p>This sweatshirt from Ravin will be your favourite. It is made from mix of cotton and polyester to ensure maximum comfort. Comes with a full zipper for a secure fit. Featuring a hooded neck to protect your head in windy rainy days and to give you the cozy feel. It can be easily layered over variety of tees and can by styled in various ways , You can style it comfy with a matching sweatpants and white sneakers for a mono-tone trendy look or you can layer it over a white tee with light blue jeans and white sneakers for an easy going casual look.</p>', '<p>سيكون هذا القميص من النوع الثقيل من Ravin هو المفضل لديك. مصنوع من مزيج من القطن والبوليستر لضمان أقصى قدر من الراحة. يأتي مع سحاب كامل لملاءمة آمنة. تتميز بغطاء للرأس لحماية رأسك في الأيام الممطرة والرياح لتمنحك الشعور بالراحة. يمكن ارتداؤه بسهولة فوق مجموعة متنوعة من التي شيرتات ويمكن تصميمه بطرق مختلفة ، يمكنك تصميمه بشكل مريح مع بنطال رياضي وحذاء رياضي أبيض متناسق للحصول على مظهر عصري أحادي اللون أو يمكنك وضعه فوق تي شيرت أبيض مع بنطال جينز أزرق فاتح و حذاء رياضي أبيض لإطلالة كاجوال سهلة.</p>', '5630_81znskk9xdL._AC_SY550_.jpg', NULL, NULL, 1, NULL, 1, '2023-03-25 16:59:56', NULL),
(6, 6, 2, 6, 11, 'Xiaomi Redmi Buds 3 Lite Wireless', 'Xiaomi Redmi Buds 3 Lite Wireless', 'xiaomi-redmi-buds-3-lite-wireless', 'Xiaomi-Redmi-Buds-3-Lite-Wireless', '84', '26', 'xiawmi,mobile', 'موبايل,شاومى', '1', '1', 'black', 'اسود', '20', '18', 'Secure and comfortable fit with 3 sizes of Cat Ear flexible tips and wings - True Wireless TWS Headphones with Bluetooth 5.2', 'تناسب آمن ومريح مع 3 أحجام من الأطراف والأجنحة المرنة من Cat Ear - True Wireless TWS Headphones with Bluetooth 5.2', '<ul>\r\n	<li>Secure and comfortable fit with 3 sizes of Cat Ear flexible tips and wings - True Wireless TWS Headphones with Bluetooth 5.2</li>\r\n	<li>- Instant and easy wireless connection. Get out of the case and start enjoying! - High sound quality with 6 mm dynamic controller</li>\r\n	<li>- Low latency mode for immersive gaming experience - Up to 18 hours total battery life. Power for the whole day!</li>\r\n	<li>- Clear calls with ambient noise cancellation - High sensitivity and simplicity for your touch controls</li>\r\n	<li>Bluetooth version: 5.2 Bluetooth transmission power: up to 10 m Battery life (headset only): up to 5 hours Battery life (headset + case): up to 18 hours</li>\r\n	<li>- Instant and easy wireless connection. Get out of the case and start enjoying! - High sound quality with 6 mm dynamic controller</li>\r\n	<li>- Low latency mode for immersive gaming experience - Up to 18 hours total battery life. Power for the whole day!</li>\r\n</ul>', '<ul>\r\n	<li>Secure and comfortable fit with 3 sizes of Cat Ear flexible tips and wings - True Wireless TWS Headphones with Bluetooth 5.2</li>\r\n	<li>- Instant and easy wireless connection. Get out of the case and start enjoying! - High sound quality with 6 mm dynamic controller</li>\r\n	<li>- Low latency mode for immersive gaming experience - Up to 18 hours total battery life. Power for the whole day!</li>\r\n	<li>- Clear calls with ambient noise cancellation - High sensitivity and simplicity for your touch controls</li>\r\n	<li>Bluetooth version: 5.2 Bluetooth transmission power: up to 10 m Battery life (headset only): up to 5 hours Battery life (headset + case): up to 18 hours</li>\r\n	<li>- Instant and easy wireless connection. Get out of the case and start enjoying! - High sound quality with 6 mm dynamic controller</li>\r\n	<li>- Low latency mode for immersive gaming experience - Up to 18 hours total battery life. Power for the whole day!</li>\r\n</ul>', '2448_51HhYD53fML._AC_SX425_.jpg', 1, 1, NULL, NULL, 1, '2023-03-25 17:53:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_author` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `google_analytics` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('RbWVkJcVl8F5lRo5DMu29aZL53wNWeiRc5LJ4e2E', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoib0VBY2EwQTl1ZmZkR2NrT1pXeHNrVzRHcWo3T0J4VWc1TmlMWnNKRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NjoibG9jYWxlIjtzOjI6ImVuIjt9', 1679782399);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `website_name` varchar(255) DEFAULT NULL,
  `website_address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `logo`, `website_name`, `website_address`, `phone`, `email`, `facebook`, `twitter`, `created_at`, `updated_at`) VALUES
(1, '6474_3208_r.png', 'Nm eCommerce', 'Tanta, Elnahas ST', '01014318965', 'mondyana5@gmail.com', 'www.facebook.com', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_image` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_image`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, '1476_1477304_EG_Header_Main_Header_1500x786_EN.jpg', NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `division_id`, `district_id`, `state_name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'El Nahas', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subCategory_name_en` varchar(255) NOT NULL,
  `subCategory_name_ar` varchar(255) NOT NULL,
  `subCategory_slug_en` varchar(255) NOT NULL,
  `subCategory_slug_ar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subCategory_name_en`, `subCategory_name_ar`, `subCategory_slug_en`, `subCategory_slug_ar`, `created_at`, `updated_at`) VALUES
(1, 1, 'Mans Top Ware', 'ملابس رجالية', 'mans-top-ware', 'ملابس-رجالية', NULL, NULL),
(2, 1, 'Mans Bottom Ware', 'مان بوتوم وير', 'mans-bottom-ware', 'مان-بوتوم-وير', NULL, NULL),
(3, 1, 'Mans Footwear', 'أحذية رجالي', 'mans-footwear', 'أحذية-رجالي', NULL, NULL),
(4, 1, 'Women Footwear', 'أحذية نسائية', 'women-footwear', 'أحذية-نسائية', NULL, NULL),
(5, 2, 'Computer Peripherals', 'ملحقات الكمبيوتر', 'computer-peripherals', 'ملحقات-الكمبيوتر', NULL, NULL),
(6, 2, 'Mobile Accessory', 'ملحقات الهاتف المحمول', 'mobile-accessory', 'ملحقات-الهاتف-المحمول', NULL, NULL),
(7, 2, 'Gaming', 'الألعاب', 'gaming', 'الألعاب', NULL, NULL),
(8, 3, 'Home Furnishings', 'اثاث منزلى', 'home-furnishings', 'اثاث-منزلى', NULL, NULL),
(9, 3, 'Living Room', 'غرفة المعيشة', 'living-room', 'غرفة-المعيشة', NULL, NULL),
(10, 3, 'Home Decor', 'ديكور المنزل', 'home-decor', 'ديكور-المنزل', NULL, NULL),
(11, 4, 'Televisions', 'التلفزيونات', 'televisions', 'التلفزيونات', NULL, NULL),
(12, 4, 'Washing Machines', 'غسالة ملابس', 'washing-machines', 'غسالة-ملابس', NULL, NULL),
(13, 4, 'Refrigerators', 'غسالة ملابس', 'refrigerators', 'غسالة-ملابس', NULL, NULL),
(14, 5, 'Beauty and Personal Care', 'الجمال والعناية الشخصية', 'beauty-and-personal-care', 'الجمال-والعناية-الشخصية', NULL, NULL),
(15, 5, 'Food and Drinks', 'الطعام و الشراب', 'food-and-drinks', 'الطعام-و-الشراب', NULL, NULL),
(16, 5, 'Bady Care', 'العناية بالجسم', 'bady-care', 'العناية-بالجسم', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_categories`
--

CREATE TABLE `sub_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `SubCategory_id` int(11) NOT NULL,
  `SubSubCategory_name_en` varchar(255) NOT NULL,
  `SubSubCategory_name_ar` varchar(255) NOT NULL,
  `SubSubCategory_slug_en` varchar(255) NOT NULL,
  `SubSubCategory_slug_ar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_sub_categories`
--

INSERT INTO `sub_sub_categories` (`id`, `category_id`, `SubCategory_id`, `SubSubCategory_name_en`, `SubSubCategory_name_ar`, `SubSubCategory_slug_en`, `SubSubCategory_slug_ar`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Mans Tshirt', 'تي شيرت رجالي', 'mans-tshirt', 'تي-شيرت-رجالي', NULL, NULL),
(2, 1, 1, 'Mans Casual Shirts', 'قمصان مان عادية', 'mans-casual-shirts', 'قمصان-مان-عادية', NULL, NULL),
(3, 1, 2, 'Mans Jeans', 'جينز رجالي', 'mans-jeans', 'جينز-رجالي', NULL, NULL),
(4, 1, 2, 'Mans Trousers', 'بنطلون رجالي', 'mans-trousers', 'بنطلون-رجالي', NULL, NULL),
(5, 1, 3, 'Mans Sports Shoes', 'أحذية رياضية مان', 'mans-sports-shoes', 'أحذية-رياضية-مان', NULL, NULL),
(6, 1, 3, 'Mans Casual Shoes', 'أحذية مان عارضة', 'mans-casual-shoes', 'أحذية-مان-عارضة', NULL, NULL),
(7, 1, 4, 'Women Flats', 'شقق نسائية', 'women-flats', 'شقق-نسائية', NULL, NULL),
(8, 1, 4, 'Women Heels', 'كعوب نسائية', 'women-heels', 'كعوب-نسائية', NULL, NULL),
(9, 2, 5, 'Printers', 'طابعات', 'printers', 'طابعات', NULL, NULL),
(10, 2, 5, 'Monitors', 'الشاشات', 'monitors', 'الشاشات', NULL, NULL),
(11, 2, 6, 'Plain Cases', 'حالات عادية', 'plain-cases', 'حالات-عادية', NULL, NULL),
(12, 2, 6, 'Designer Cases', 'حالات المصمم', 'designer-cases', 'حالات-المصمم', NULL, NULL),
(13, 2, 7, 'Gaming Mouse', 'ماوس الألعاب', 'gaming-mouse', 'ماوس-الألعاب', NULL, NULL),
(14, 2, 7, 'Gaming Keyboars', 'لوحة مفاتيح الألعاب', 'gaming-keyboars', 'لوحة-مفاتيح-الألعاب', NULL, NULL),
(15, 3, 8, 'Bed Liners', 'بطانات السرير', 'bed-liners', 'بطانات-السرير', NULL, NULL),
(16, 3, 8, 'Bedsheets', 'ملاءات', 'bedsheets', 'ملاءات', NULL, NULL),
(17, 3, 9, 'Tv Units', 'وحدات تلفزيون', 'tv-units', 'وحدات-تلفزيون', NULL, NULL),
(18, 3, 9, 'Dining Sets', 'أطقم الطعام', 'dining-sets', 'أطقم-الطعام', NULL, NULL),
(19, 3, 10, 'Lightings', 'الإنارات', 'lightings', 'الإنارات', NULL, NULL),
(20, 3, 10, 'Clocks', 'ساعات', 'clocks', 'ساعات', NULL, NULL),
(21, 4, 11, 'Big Screen TVs', 'تلفزيونات ذات شاشات كبيرة', 'big-screen-tvs', 'تلفزيونات-ذات-شاشات-كبيرة', NULL, NULL),
(22, 4, 11, 'Smart TVs', 'تلفزيونات ذكية', 'smart-tvs', 'تلفزيونات-ذكية', NULL, NULL),
(23, 4, 12, 'Washer Dryers', 'مجففات الغسالة', 'washer-dryers', 'مجففات-الغسالة', NULL, NULL),
(24, 4, 13, 'Single Door', 'باب واحد', 'single-door', 'باب-واحد', NULL, NULL),
(25, 5, 14, 'Eys Makeup', 'مكياج العين', 'eys-makeup', 'مكياج-العين', NULL, NULL),
(26, 5, 15, 'Beverages', 'المشروبات', 'beverages', 'المشروبات', NULL, NULL),
(27, 5, 15, 'Chocolates', 'الشوكولاتة', 'chocolates', 'الشوكولاتة', NULL, NULL),
(28, 5, 16, 'Baby Diapers', 'حفاضات اطفال', 'baby-diapers', 'حفاضات-اطفال', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `last_seen` text DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `last_seen`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Jonas Schimmel', 'admin@gmail.com', NULL, NULL, '2023-03-25 00:24:10', '$2y$10$q6LvFZ1xDEr2QwR13jxHOOdO5Ifls7Q9VHvJj.tiiFteZpajJpQDG', NULL, NULL, '29e7e0Airw', NULL, NULL, '2023-03-25 00:24:10', '2023-03-25 00:24:10'),
(2, 'Abdo reda', 'abdo@gmail.com', '01014318965', '2023-03-25 21:42:31', NULL, '$2y$10$PB6NHghIPObV3X0M/EpjW.WUUl/fnRSgBZSqyYDeC6wo7d007JiKG', NULL, NULL, NULL, NULL, NULL, '2023-03-25 17:06:32', '2023-03-25 19:42:31');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
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
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
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
-- Indexes for table `multi__images`
--
ALTER TABLE `multi__images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `multi__images`
--
ALTER TABLE `multi__images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
