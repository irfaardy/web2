-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2020 at 11:23 AM
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
-- Database: `ask_cell`
--

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
-- Table structure for table `images_storage`
--

CREATE TABLE `images_storage` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_object` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_file_name` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_file_name_small` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img_link` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` double(20,2) NOT NULL,
  `ip_addr` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_by` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images_storage`
--

INSERT INTO `images_storage` (`id`, `user_id`, `id_object`, `type`, `img_file_name`, `img_file_name_small`, `img_link`, `mime_type`, `size`, `ip_addr`, `created_at`, `updated_at`, `deleted_at`, `updated_by`) VALUES
(5, '1', 'SMP120200124L9QF', 'SMP', 'IMG_1579846449_1_27PJR_o', 'IMG_1579846449_1_27PJR_s', 'img_12020012427PJR', 'image/png', 1843595.00, '127.0.0.1', '2020-01-23 23:14:09', '2020-01-23 23:14:09', NULL, NULL),
(6, '1', 'SMP120200124ZAPU', 'SMP', 'IMG_1579851274_1_8ScXS_o', 'IMG_1579851274_1_8ScXS_s', 'img_1202001248ScXS', 'image/jpeg', 33534.00, '127.0.0.1', '2020-01-24 00:34:35', '2020-01-24 00:34:35', NULL, NULL),
(7, '1', 'SMP320200124IIX0', 'SMP', 'IMG_1579851660_1_j2fzl_o', 'IMG_1579851660_1_j2fzl_s', 'img_320200124j2fzl', 'image/webp', 208368.00, '127.0.0.1', '2020-01-24 00:41:00', '2020-01-24 00:41:00', NULL, NULL),
(8, '1', 'ARK-20200124-15798576871IWU7X', 'ARK', 'IMG_1579857687_1_gMBgo_o', 'IMG_1579857687_1_gMBgo_s', 'img_ARK-20200124-15798576871IWU7X20200124gMBgo', 'image/jpeg', 228519.00, '127.0.0.1', '2020-01-24 02:21:28', '2020-01-24 02:21:28', NULL, NULL),
(9, '1', 'ARK-20200124-1579858612XFZ0YS', 'ARK', 'IMG_1579858612_1_va6Sg_o', 'IMG_1579858612_1_va6Sg_s', 'img_ARK-20200124-1579858612XFZ0YS20200124va6Sg', 'image/jpeg', 10235.00, '127.0.0.1', '2020-01-24 02:36:53', '2020-01-24 02:36:53', NULL, NULL),
(10, '1', 'ARK-20200124-1579858615OBRZFS', 'ARK', 'IMG_1579858615_1_ILYrm_o', 'IMG_1579858615_1_ILYrm_s', 'img_ARK-20200124-1579858615OBRZFS20200124ILYrm', 'image/jpeg', 10235.00, '127.0.0.1', '2020-01-24 02:36:55', '2020-01-24 02:36:55', NULL, NULL),
(11, '1', 'ARK-20200124-1579858966USS81F', 'ARK', 'IMG_1579858967_1_mP1T9_o', 'IMG_1579858967_1_mP1T9_s', 'img_ARK-20200124-1579858966USS81F20200124mP1T9', 'image/jpeg', 41437.00, '127.0.0.1', '2020-01-24 02:42:47', '2020-01-24 02:42:47', NULL, NULL),
(12, '1', 'ARK-20200124-1579859303U4ICQR', 'ARK', 'IMG_1579859303_1_9VC4N_o', 'IMG_1579859303_1_9VC4N_s', 'img_ARK-20200124-1579859303U4ICQR202001249VC4N', 'image/jpeg', 37413.00, '127.0.0.1', '2020-01-24 02:48:23', '2020-01-24 02:48:23', NULL, NULL),
(13, '1', 'ARK-20200124-1579859847SQ8YC5', 'ARK', 'IMG_1579859847_1_ovQsK_o', 'IMG_1579859847_1_ovQsK_s', 'img_ARK-20200124-1579859847SQ8YC520200124ovQsK', 'image/webp', 30956.00, '127.0.0.1', '2020-01-24 02:57:28', '2020-01-24 02:57:28', NULL, NULL);

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
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2020_01_11_030039_merk_ponsel', 1),
(13, '2020_01_11_030502_ponsel', 1),
(14, '2020_01_11_040614_artikel', 1),
(15, '2020_01_11_040842_user_review_ponsel', 1),
(16, '2020_01_16_020720_update_users_table', 1),
(17, '2020_01_24_031407_images_storage', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_artikel`
--

CREATE TABLE `tb_artikel` (
  `id_artikel` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_artikel`
--

INSERT INTO `tb_artikel` (`id_artikel`, `judul`, `deskripsi`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
('ARK-20200124-1579858612XFZ0YS', 'Oppo A9', '<p>Handphone battery besar dengan kapasitas 5000 mAh melengkapi perangkat <a href=\"https://www.pricebook.co.id/OPPO-A9-2020-8GB/40/PD_00086689\">OPPO A9 2020</a>, menawarkan pemakaian lebih dari 19 jam dalam penggunaan normal. Perangkat ini juga dilengkapi dengan fitur pengisian daya perangkat lain (reverse charging) dengan memanfaatkan fitur OTG.</p>\r\n\r\n<p>Pada bagian audio, OPPO A Series 2020 datang dengan speaker stereo ganda, menghadirkan efek suara surround dengan volume lebih tinggi dan peningkatan kualitas suara yang signifikan. Efek suara Dolby Atmos&reg; digunakan untuk memberikan pengalaman musik, video, dan permainan terbaik di kelasnya.</p>\r\n\r\n<p>OPPO A9 2020 merupakan perangkat yang menerima sertifikasi Hi-Res Audio, memastikan kualitas suara yang luar biasa, serta menciptakan pengalaman audio yang lebih mendebarkan, realistis, dan mendalam.</p>', '1', NULL, '2020-01-24 02:36:52', '2020-01-24 02:36:52'),
('ARK-20200124-1579858966USS81F', '12 Smartphone Menengah Terbaik 2019, Mana yang Unggul?', '<p>Di <a href=\"https://www.hitekno.com/tag/tahun-2019\">tahun 2019</a> ini, para vendor <a href=\"https://www.hitekno.com/tag/smartphone\">smartphone</a> berlomba-lomba merilis perangkat terbaiknya. Direntang harga Rp 2,8 juta hingga Rp 5,6 juta setidaknya ada 12 smartphone yang menurut tim HiTekno.com begitu mendominasi dengan performanya. Ada apa saja?</p>\r\n\r\n<p>Perpaduan sempurna antara fitur canggih hingga desain cakep serta harga bersaing menjadi beberapa faktor dominasi setidaknya 12 smartphone ini.</p>\r\n\r\n<p>Vendor smartphone sepertinya tahu betul apa yang dikehendaki oleh pengguna smartphone yang menjadi target pasarnya.</p>\r\n\r\n<p>Untuk kamu, berikut 12 <a href=\"https://www.hitekno.com/tag/smartphone-menengah-terbaik-2019\">smartphone menengah terbaik 2019</a> yang sudah tim HiTekno.com rangkum.</p>\r\n\r\n<p>Simak sampai akhir karena nantinya ada 1 smartphone yang menurut tim kami begitu unggul sepanjang 2019 ini.</p>\r\n\r\n<p><strong>1. <a href=\"https://www.hitekno.com/tag/redmi-note-8-pro\">Redmi Note 8 Pro</a></strong></p>\r\n\r\n<p><em>Redmi Note 8 Pro. (Xiaomi)</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Redmi Note 8 Pro dirilis bulan Oktober 2019 lalu di Indonesia. Perangkat ini mengandalkan layar 6,53 inci yang dipadukan dengan kamera 64 MP, 8 MP ultra wide, 2 MP depth sensor, dan 2 MP macro. Kamera selfie yang digunakan 20 MP.</p>\r\n\r\n<p>Chipset Redmi Note 8 Pro menggunakan MediaTek Helio G90T. Mengenai harga, untuk RAM 6 GB dan memori internal 64 GB dijual Rp 2.999.000. Sedangkan RAM 6 GB dan memori internal 128 GB dijual Rp 3.399.000.</p>\r\n\r\n<p><strong>2. Realme XT</strong></p>\r\n\r\n<p><em>Realme XT. (Realme)</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Realme XT rilis pada Oktober 2019 lalu dengan menggunakan layar 6,4 inci. Kamera perangkat ini beresolusi 64 MP, 8 MP, 2 MP dan 2 MP. Kamera Realme XT menggunakan sensor Sony IMX471.</p>\r\n\r\n<p>Chipset Realme XT menggunakan Snapdragon 712 dari Qualcomm. Untuk harga RAM 4 GB dan memori internal 128 GB dijual Rp 3.799.000. RAM 8 GB dan memori internal 128 GB dijual Rp 4.199.000.</p>\r\n\r\n<p><strong>3. Realme 5 Pro</strong></p>\r\n\r\n<p>&nbsp;</p>', '1', NULL, '2020-01-24 02:42:46', '2020-01-24 02:42:46'),
('ARK-20200124-1579859303U4ICQR', 'Kelebihan dan Kekurangan Realme 5i, ?', '<p><strong>Kelebihan Realme 5i</strong></p>\r\n\r\n<ol>\r\n	<li>Harga lebih murah.</li>\r\n	<li>Performa tetap ngebut dengan Snapdragon 665.</li>\r\n	<li>Baterai besar, 5.000 mAh.</li>\r\n	<li>Empat kamera belakang dengan ultrawide.</li>\r\n</ol>\r\n\r\n<p><strong>Kekurangan Realme 5i</strong></p>\r\n\r\n<ol>\r\n	<li>Tidak ada silikon case.</li>\r\n	<li>Desain body belakang yang biasa saja.</li>\r\n	<li>Charger cuma 10 watt dan masih micro USB.</li>\r\n	<li>Layar besar 6,52 inci tapi cuma beresolusi HD+ 720x1600 piksel.</li>\r\n</ol>', '1', NULL, '2020-01-24 02:48:23', '2020-01-24 02:48:23'),
('ARK-20200124-1579859847SQ8YC5', '5 Smartphone dengan Layar Paling Besar di Pasaran Saat Ini', '<p>Beberapa tahun belakangan ini, vendor <a href=\"https://www.liputan6.com/tekno/read/4160562/samsung-kini-punya-bos-smartphone-baru\"><em>smartphone</em></a>&nbsp;kerap kali mengunggulkan bentang layar mereka dalam berbagai materi promosi mereka.</p>\r\n\r\n<p>Sebelumnya, smartphone dengan bentang layar di atas 5,5 inci disebut sebagai <em>phablet</em>. Namun kini, kita sudah umum melihat <em>smartphone</em> dengan layar yang besar.</p>\r\n\r\n<p>Terkini, Samsung memperkenalkan kita dengan <a href=\"https://www.liputan6.com/tekno/read/4045190/samsung-buka-penjualan-perdana-galaxy-note-10-series\">Galaxy Note 10</a> dan Galaxy Note 10 Plus yang memiliki layar berukuran 6,3 inci dan 6,8 inci.</p>', '1', NULL, '2020-01-24 02:57:27', '2020-01-24 02:57:27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_merk_ponsel`
--

CREATE TABLE `tb_merk_ponsel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_merk_ponsel`
--

INSERT INTO `tb_merk_ponsel` (`id`, `nama`, `deskripsi`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Xiaomi', '12341231', '1', NULL, '2020-01-16 08:07:07', '2020-01-16 08:07:07'),
(3, 'Samsung', 'Samsul', '1', NULL, '2020-01-16 08:07:55', '2020-01-16 08:07:55'),
(4, 'Nokias', 'Nokia', '1', NULL, '2020-01-21 06:30:08', '2020-01-21 07:08:18');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ponsel`
--

CREATE TABLE `tb_ponsel` (
  `id` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_merk` bigint(20) NOT NULL,
  `spesifikasi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_ponsel`
--

INSERT INTO `tb_ponsel` (`id`, `nama`, `id_merk`, `spesifikasi`, `updated_by`, `deleted_at`, `created_at`, `updated_at`) VALUES
('SMP120200124ZAPU', 'Redmi 5', 1, '<p>Processor : 2 GB + 16 GB</p>\r\n\r\n<p>Batterai : 3300 mAh</p>\r\n\r\n<p>Kamera Belakang 12 MP</p>\r\n\r\n<p>4G Dual SIM</p>\r\n\r\n<p>Multimedia : MP4, MAV, FLAC, M4V, AAC dan APE.</p>', '1', NULL, '2020-01-24 00:34:34', '2020-01-24 00:34:34'),
('SMP320200124IIX0', 'Samsung Galaxy A10', 3, '<p>Samsung Galaxy A10</p>\r\n\r\n<p>SIM : Nano SIM, Dual SIM, Dual Standby</p>\r\n\r\n<p>CPU : Octa-Core</p>\r\n\r\n<p>RAM : 2 GB / 32 GB</p>\r\n\r\n<p>Battery : 3400 mAh - 4G (LTE)</p>\r\n\r\n<p>Kamera : 13 MP</p>', '1', NULL, '2020-01-24 00:41:00', '2020-01-24 00:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_review_user`
--

CREATE TABLE `tb_review_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_ponsel` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_by` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `socialite_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `socialite_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `socialite_id`, `socialite_name`, `level`, `photo`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, '4', 'https://lh3.googleusercontent.com/a-/AAuE7mDcs5gMa_5C6kQn4Z5zYSy2ffcP72tQlsmkHpG11YA', 'Irfa Ardiansyah', 'irfardy2@gmail.com', NULL, '$2y$10$6dHlQsPGduCfU1b9Rdnq4etsz9MqoaA/tSoUPFQTFqrB8brMxEZQW', '8U806ATo4rNVbVlfMOPvFcJ7UMqTc08Oq6p2ryswjK6IhnJGZIqIyF1WstlB', '2020-01-15 20:10:34', '2020-01-15 20:55:50'),
(2, NULL, NULL, '0', 'https://lh3.googleusercontent.com/a-/AAuE7mAPnbp-kHb7PiETMqeYC52uzeuQKggwjuB_lu6e5A', 'irfa ardiansyah', 'irfaardiansyah95@gmail.com', NULL, NULL, 'RIpCUrgVJA2prVfVZJz36zzskdjJuQsMe2HyDfLQSLCawkxTpMELaKLzV6FL', '2020-01-15 20:11:41', '2020-01-15 20:11:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images_storage`
--
ALTER TABLE `images_storage`
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
-- Indexes for table `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `tb_merk_ponsel`
--
ALTER TABLE `tb_merk_ponsel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_ponsel`
--
ALTER TABLE `tb_ponsel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_review_user`
--
ALTER TABLE `tb_review_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images_storage`
--
ALTER TABLE `images_storage`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_merk_ponsel`
--
ALTER TABLE `tb_merk_ponsel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_review_user`
--
ALTER TABLE `tb_review_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
