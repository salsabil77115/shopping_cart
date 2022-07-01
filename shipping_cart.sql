-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 01, 2022 at 09:09 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shipping_cart`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Rate` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `Rate`, `created_at`, `updated_at`) VALUES
(1, 'US', 2, '2022-06-29 21:02:22', '2022-06-29 21:02:22'),
(2, 'UK', 3, '2022-06-29 21:02:22', '2022-06-29 21:02:22'),
(3, 'CN', 2, '2022-06-29 21:02:22', '2022-06-29 21:02:22');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(21, '2022_06_29_152800_create_products_table', 1),
(22, '2022_06_29_155918_create_user_table', 1),
(23, '2022_06_29_211904_create_countries_table', 1),
(24, '2022_06_29_211924_create_offers_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

DROP TABLE IF EXISTS `offers`;
CREATE TABLE IF NOT EXISTS `offers` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `discount_value` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `product_id`, `discount_value`, `description`, `created_at`, `updated_at`) VALUES
(1, 6, 10, 'are on 10% off.', '2022-06-29 21:02:22', '2022-06-29 21:02:22'),
(2, 0, 50, 'Buy any two tops (t-shirt or blouse) and get any jacket half its price', '2022-06-29 21:02:22', '2022-06-29 21:02:22'),
(3, 0, 10, 'Buy any two items or more and get a maximum of $10 off shipping fees.', '2022-06-29 21:02:22', '2022-06-29 21:02:22');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `country_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `imagePath` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_country_id_foreign` (`country_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `country_id`, `title`, `price`, `imagePath`, `weight`, `created_at`, `updated_at`) VALUES
(1, 1, 'T-shirt', 30.99, 'http://ecx.images-amazon.com/images/I/51ZU%2BCvkTyL.jpg', '200', '2022-06-29 21:02:22', '2022-06-29 21:02:22'),
(2, 2, 'Blouse', 10.99, 'http://www.revelationz.net/images/book/gameofthrones3.jpg', '300', '2022-06-29 21:02:22', '2022-06-29 21:02:22'),
(3, 2, 'Pants', 64.99, 'http://d.gr-assets.com/books/1411114164l/33.jpg', '900', '2022-06-29 21:02:22', '2022-06-29 21:02:22'),
(4, 3, 'Sweatpants', 84.99, 'http://ecx.images-amazon.com/images/I/919-FLL37TL.jpg', '1100', '2022-06-29 21:02:22', '2022-06-29 21:02:22'),
(5, 1, 'Jacket', 199.99, 'http://www.georgerrmartin.com/wp-content/uploads/2012/08/feastforcrows.jpg', '2200', '2022-06-29 21:02:22', '2022-06-29 21:02:22'),
(6, 3, 'Shoes', 79.99, 'http://www.georgerrmartin.com/wp-content/uploads/2012/08/feastforcrows.jpg', '1300', '2022-06-29 21:02:22', '2022-06-29 21:02:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
