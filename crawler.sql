-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2020 at 02:45 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crawler`
--

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `link` text,
  `title` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `link`, `title`, `created_at`, `updated_at`) VALUES
(1, 'https://fabelio.com/ip/kursi-makan-xavier-wooden-seater.html', 'Kursi Makan Xavier Wooden Seater', '2020-02-02 10:04:11', '0000-00-00 00:00:00'),
(2, 'https://fabelio.com/ip/kursi-makan-chester-jeans.html', 'Kursi Makan Chester (Jeans)', '2020-02-02 10:55:11', '0000-00-00 00:00:00'),
(3, 'https://fabelio.com/ip/kursi-cessi-upholstered.html', 'Kursi Cessi Upholstered', '2020-02-02 10:04:11', '0000-00-00 00:00:00'),
(4, 'https://fabelio.com/ip/cessi-chair.html', 'Kursi Makan Cessi', '2020-02-02 10:55:11', '0000-00-00 00:00:00'),
(5, 'https://fabelio.com/ip/kursi-makan-emma-accent.html', 'Kursi Makan Emma Accent', '2020-02-02 10:55:11', '0000-00-00 00:00:00'),
(6, 'https://fabelio.com/ip/kursi-makan-sally.html', 'Kursi Makan Sally', '2020-02-02 10:55:11', '0000-00-00 00:00:00'),
(7, 'https://fabelio.com/ip/simo-dining-chair.html', 'Kursi Makan Simo', '2020-02-02 10:06:11', '0000-00-00 00:00:00'),
(8, 'https://fabelio.com/ip/mondy-chair-3975.html', 'Kursi Mondy', '2020-02-02 10:27:11', '0000-00-00 00:00:00'),
(9, 'https://fabelio.com/ip/zoey-2-seater-sofa.html', 'Sofa 2 Dudukan Zoey', '2020-02-02 10:36:11', '0000-00-00 00:00:00'),
(10, 'https://fabelio.com/ip/jobi-3-seater-sofa-8674.html', 'Sofa 3 Dudukan Jobi ', '2020-02-02 04:52:51', '2020-02-02 04:52:51'),
(11, 'https://fabelio.com/ip/set-ruang-makan-4-kursi-geo.html', 'Set Ruang Makan 4 Kursi Geo', '2020-02-02 05:06:42', '2020-02-02 05:06:42'),
(14, 'https://fabelio.com/ip/meja-makan-virgo-c.html', 'Meja Makan Virgo', '2020-02-02 09:03:27', '2020-02-02 09:03:27'),
(15, 'https://fabelio.com/ip/kursi-carla-green-velvet.html', 'Kursi Carla (Green Velvet)', '2020-02-02 21:33:14', '2020-02-02 21:33:14'),
(16, 'https://fabelio.com/ip/set-1-1-kursi-taylor.html', 'Set 1+1 Kursi Taylor', '2020-02-02 21:42:19', '2020-02-02 21:42:19'),
(17, 'https://fabelio.com/ip/set-1-1-kursi-taby.html', 'Set 1+1 Kursi Taby', '2020-02-02 23:29:06', '2020-02-02 23:29:06'),
(18, 'https://fabelio.com/ip/eton-armchair-4631.html', 'Sofa 1 Dudukan Eton ', '2020-02-03 00:41:08', '2020-02-03 00:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `page_details`
--

CREATE TABLE `page_details` (
  `id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `image` text,
  `description` varchar(500) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `currency` varchar(5) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `page_details`
--

INSERT INTO `page_details` (`id`, `page_id`, `image`, `description`, `amount`, `currency`, `created_at`, `updated_at`) VALUES
(1, 1, 'https://m2fabelio.imgix.net/catalog/product/cache/image/265x265/beff4985b56e3afdbeabfc89641a4582/x/a/xavier_black_wood_2.jpg', '', '349300.00', 'IDR', '2020-02-02 02:11:27', '2020-02-02 02:11:27'),
(2, 2, 'https://m2fabelio.imgix.net/catalog/product/cache/image/265x265/beff4985b56e3afdbeabfc89641a4582/i/m/img_0793.jpg', '', '1799100.00', 'IDR', '2020-02-02 02:11:45', '2020-02-02 02:11:45'),
(3, 3, 'https://m2fabelio.imgix.net/catalog/product/cache/image/265x265/beff4985b56e3afdbeabfc89641a4582/d/c/dc-1724-patch2-1_1.jpg', '', '629100.00', 'IDR', '2020-02-02 02:12:05', '2020-02-02 02:12:05'),
(4, 4, 'https://m2fabelio.imgix.net/catalog/product/cache/image/265x265/beff4985b56e3afdbeabfc89641a4582/c/e/Cessi_Dining_Chair_0.jpg', '', '269100.00', 'IDR', '2020-02-02 02:12:26', '2020-02-02 02:12:26'),
(5, 5, 'https://m2fabelio.imgix.net/catalog/product/cache/image/265x265/beff4985b56e3afdbeabfc89641a4582/e/m/Emma_Accent_Chair_2.jpg', '', '359100.00', 'IDR', '2020-02-02 02:12:35', '2020-02-02 02:12:35'),
(6, 6, 'https://m2fabelio.imgix.net/catalog/product/cache/image/265x265/beff4985b56e3afdbeabfc89641a4582/5/7/5747_01.jpg', '', '1799100.00', 'IDR', '2020-02-02 02:12:46', '2020-02-02 02:12:46'),
(7, 7, 'https://m2fabelio.imgix.net/catalog/product/cache/image/265x265/beff4985b56e3afdbeabfc89641a4582/0/1/0159.jpg', '<ul>\r\n<li><span style=\"font-size: medium;\">Kursi makan serbaguna </span></li>\r\n<li><span style=\"font-size: medium;\">Kombinasi kayu dan besi </span></li>\r\n<li><span style=\"font-size: medium;\">Kokoh, tahan lama </span></li>\r\n</ul>', '899100.00', 'IDR', '2020-02-02 02:12:57', '2020-02-02 02:12:57'),
(8, 8, 'https://m2fabelio.imgix.net/catalog/product/cache/image/265x265/beff4985b56e3afdbeabfc89641a4582/m/o/Mondy_Chair_0.jpg', 'Kursi minimalis dengan busa dan kain indoor pada seluruh bagian body. Tipe furnitur siap pakai, tidak bisa dibongkar pasang. Desain produk ini tidak dapat disesuaikan (customized)', '799000.00', 'IDR', '2020-02-02 02:13:02', '2020-02-02 02:13:02'),
(9, 9, 'https://m2fabelio.imgix.net/catalog/product/cache/image/265x265/beff4985b56e3afdbeabfc89641a4582/z/o/Zoey_2_Seater_Sofa_5.jpg', '', '3799200.00', 'IDR', '2020-02-02 02:13:16', '2020-02-02 02:13:16'),
(10, 8, 'https://m2fabelio.imgix.net/catalog/product/cache/image/265x265/beff4985b56e3afdbeabfc89641a4582/m/o/Mondy_Chair_0.jpg', 'Kursi minimalis dengan busa dan kain indoor pada seluruh bagian body. Tipe furnitur siap pakai, tidak bisa dibongkar pasang. Desain produk ini tidak dapat disesuaikan (customized)', '699000.00', 'IDR', '2020-02-02 11:28:42', '2020-02-02 04:27:26'),
(11, 7, 'https://m2fabelio.imgix.net/catalog/product/cache/image/265x265/beff4985b56e3afdbeabfc89641a4582/0/1/0159.jpg', '<ul>\r\n<li><span style=\"font-size: medium;\">Kursi makan serbaguna </span></li>\r\n<li><span style=\"font-size: medium;\">Kombinasi kayu dan besi </span></li>\r\n<li><span style=\"font-size: medium;\">Kokoh, tahan lama </span></li>\r\n</ul>', '999100.00', 'IDR', '2020-02-02 04:49:57', '2020-02-02 04:31:20'),
(12, 10, 'https://m2fabelio.imgix.net/catalog/product/cache/image/265x265/beff4985b56e3afdbeabfc89641a4582/9/0/9067_1.jpg', '', '3824150.00', 'IDR', '2020-02-02 04:52:51', '2020-02-02 04:52:51'),
(13, 11, 'https://m2fabelio.imgix.net/catalog/product/cache/image/265x265/beff4985b56e3afdbeabfc89641a4582/1/3/1369_03.jpg', '', '5505250.00', 'IDR', '2020-02-02 05:06:42', '2020-02-02 05:06:42'),
(14, 7, 'https://m2fabelio.imgix.net/catalog/product/cache/image/265x265/beff4985b56e3afdbeabfc89641a4582/0/1/0159.jpg', '<ul>\r\n<li><span style=\"font-size: medium;\">Kursi makan serbaguna </span></li>\r\n<li><span style=\"font-size: medium;\">Kombinasi kayu dan besi </span></li>\r\n<li><span style=\"font-size: medium;\">Kokoh, tahan lama </span></li>\r\n</ul>', '899100.00', 'IDR', '2020-02-02 06:04:10', '2020-02-02 06:04:10'),
(15, 1, 'https://m2fabelio.imgix.net/catalog/product/cache/image/265x265/beff4985b56e3afdbeabfc89641a4582/x/a/xavier_black_wood_2.jpg', '', '349300.00', 'IDR', '2020-02-02 06:04:36', '2020-02-02 06:04:36'),
(16, 3, 'https://m2fabelio.imgix.net/catalog/product/cache/image/265x265/beff4985b56e3afdbeabfc89641a4582/d/c/dc-1724-patch2-1_1.jpg', '', '629100.00', 'IDR', '2020-02-02 06:04:44', '2020-02-02 06:04:44'),
(17, 7, 'https://m2fabelio.imgix.net/catalog/product/cache/image/265x265/beff4985b56e3afdbeabfc89641a4582/0/1/0159.jpg', '<ul>\r\n<li><span style=\"font-size: medium;\">Kursi makan serbaguna </span></li>\r\n<li><span style=\"font-size: medium;\">Kombinasi kayu dan besi </span></li>\r\n<li><span style=\"font-size: medium;\">Kokoh, tahan lama </span></li>\r\n</ul>', '899100.00', 'IDR', '2020-02-02 06:06:16', '2020-02-02 06:06:16'),
(18, 11, 'https://m2fabelio.imgix.net/catalog/product/cache/image/265x265/beff4985b56e3afdbeabfc89641a4582/1/3/1369_03.jpg', '', '5505250.00', 'IDR', '2020-02-02 06:06:19', '2020-02-02 06:06:19'),
(21, 14, 'https://m2fabelio.imgix.net/catalog/product/cache/image/265x265/beff4985b56e3afdbeabfc89641a4582/t/-/t-08_1__1.jpg', '', '559200.00', 'IDR', '2020-02-02 09:03:27', '2020-02-02 09:03:27'),
(22, 15, 'https://m2fabelio.imgix.net/catalog/product/cache/image/265x265/beff4985b56e3afdbeabfc89641a4582/c/a/carla_2.jpg', '', '1999200.00', 'IDR', '2020-02-02 21:33:14', '2020-02-02 21:33:14'),
(23, 16, 'https://m2fabelio.imgix.net/catalog/product/cache/image/265x265/beff4985b56e3afdbeabfc89641a4582/t/a/taylor_armchair_mansfield_double.jpg', '', '3598400.00', 'IDR', '2020-02-02 21:42:19', '2020-02-02 21:42:19'),
(24, 17, 'https://m2fabelio.imgix.net/catalog/product/cache/image/265x265/beff4985b56e3afdbeabfc89641a4582/s/e/set_kursi_tamu_taby_1_1_sofa_ruby1.jpg', '', '4248300.00', 'IDR', '2020-02-02 23:29:06', '2020-02-02 23:29:06'),
(25, 18, 'https://m2fabelio.imgix.net/catalog/product/cache/image/265x265/beff4985b56e3afdbeabfc89641a4582/e/t/eton_red_01.jpg', '', '1274150.00', 'IDR', '2020-02-03 00:41:08', '2020-02-03 00:41:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_details`
--
ALTER TABLE `page_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `page_details`
--
ALTER TABLE `page_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
