-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 14, 2021 at 12:20 PM
-- Server version: 8.0.27-0ubuntu0.20.04.1
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ifarm`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maps`
--

CREATE TABLE `maps` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maps`
--

INSERT INTO `maps` (`id`, `created_at`, `updated_at`, `title`, `description`, `thumbnail`, `link`) VALUES
(1, '2021-12-06 03:03:15', '2021-12-06 03:03:15', 'Before and After CYCLONE/Typhoon MAP', 'Comparison of pre- and post-cyclone occurrence and extent of flooding in an area using split maps.', '61adedf33e51bScreenshot from 2021-12-06 18-53-55-min.png', 'https://nkeikon.users.earthengine.app/view/s1idai'),
(2, '2021-12-06 03:04:42', '2021-12-13 10:39:01', 'Typhoon Damage Assessment', 'Estimated Typhoon Damage Assessment based on historical data.', '61b7925aa572atyphoon.png', 'https://oahajj.users.earthengine.app/view/ifarm-flood-damage'),
(3, '2021-12-06 03:05:06', '2021-12-13 10:38:49', 'NDVI Maps', 'Latest available NDVI map compared to ~20 days old NDVI map based on satellite images.', '61b79260e0a43ndvi.png', 'https://oahajj.users.earthengine.app/view/ifarm-latest-ndvi');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_12_05_152045_create_news_table', 2),
(7, '2021_12_06_103816_create_maps_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_published` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `created_at`, `updated_at`, `title`, `author`, `date_published`, `description`, `thumbnail`, `link`) VALUES
(1, '2021-12-06 00:52:34', '2021-12-06 00:52:34', 'DOST – CLSU 2021 ECEST PARTNERSHIP PROGRAM', 'Kim L. Ravelo, PA-II, PSTC-Nueva Ecija', NULL, 'The Department of Science and Technology, Provincial Science and Technology Center Nueva Ecija (DOST PSTC-NE) has partnered with the Central Luzon State University (CLSU) for the implementation of community development projects that will benefit the towns of Cuyapo Pantabangan and Gabaldon in the said province.\r\n\r\nA check amounting to P1,781,121 was recently turned over to CLSU to finance projects identified through the conduct of Participatory Rural Appraisal (PRA) and Technology Need Assessment (TNA) activities in the three (3) municipalities. The CLSU College of Arts and Social Sciences (CASS) will implement the projects.', '61adcf5243e01CLSU2021eCEST.jpg', 'https://region3.dost.gov.ph/index.php/news/333-dost-clsu-2021-ecest-partnership-program'),
(2, '2021-12-06 01:42:10', '2021-12-06 02:08:26', 'DOST-III LAUNCHES CEST PROGRAM FOR REBEL RETURNEES IN ZAMBALES', 'Renz Hillary P. Reyman, PA-II, PSTC-Zambales', NULL, 'A multi-agency approach to help Aeta rebel returnees reintegrate themselves back to the  community was recently launched in San Marcelino, Zambales.  Led by the Department of Science and Technology (DOST) provincial office, the project aims to provide livelihood through the provision of training and  supplies for vegetable and free range chicken production under its Community Empowerment thru Science and Technology program.\r\n\r\nThe Aeta community is in Sitio Lumibao in Brgy.  Buhawen here. Through this project, they will have  access to sustainable source of food and livelihood opportunities.', '61ade11aa466cIMG20211011135258-min.jpg', 'https://region3.dost.gov.ph/index.php/news/329-dost-iii-launches-cest-program-for-rebel-returnees-in-zambales'),
(3, '2021-12-06 02:20:03', '2021-12-06 02:20:26', 'NSTW PRESS RELEASE – DOST SECRETARY VISITS BULSU', 'DOST Region 3', NULL, '#NSTWPressReleases\r\n\r\nIn connection to the regional celebration of the 2021 National Science and Technology Week, DOST Secretary Fortunato \"Boy\" T. De La Peňa and other DOST Top Officials will visit projects funded under the Regional Grants-in-Aid Program. These projects include:\r\n\r\n1) Establishment of a Business Innovation Unit for the Regional Inclusive and Innovation Center (RIIC): BRAID III - CLINC Center\"\r\n\r\n2) Enhancement of Regional Food Innovation Center Productivity thru the Development of Commercially-Viable Food Products and Disaster/Emergency Foods\"\r\n\r\n#DOSTCentralLuzon #ScienceforthePeople #2021NSTW #DOSTTugonSaHamon', '61ade3d39d0e1Draft Promo - DOST Bulacan.jpg', 'https://region3.dost.gov.ph/index.php/news/326-nstw-press-release-dost-secretary-visits-bulsu'),
(4, '2021-12-06 02:20:54', '2021-12-06 02:20:54', 'USAP SETUP TAYO COUNTDOWN – 1 DAY TO GO', 'DOST Region 3', NULL, 'Bukas na ang simula ng pinaka-aabangang \"Tara, uSap SETUP Tayo\" ng DOST Central Luzon!\r\n\r\n\'Di pa nakakapagregister? \'Wag mag-alala! Bukas pa ang registration natin para sa two-day event na ito.\r\n\r\nManuod, makinig, matuto, ma-inspire at manalo.\r\n\r\nRegister here -> https://bit.ly/uSapSETUPTayoRO3\r\n\r\n#DOSTCentralLuzon #uSapSETUPTayo #2021NSTW #DOSTTugonSaHamon #ScienceForThePeople', '61ade40600e8fusapSETUP1day.png', 'https://region3.dost.gov.ph/index.php/news/325-usap-setup-tayo-countdown-1-day-to-go');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `maps`
--
ALTER TABLE `maps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maps`
--
ALTER TABLE `maps`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
