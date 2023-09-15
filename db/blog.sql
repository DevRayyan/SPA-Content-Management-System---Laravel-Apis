-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2023 at 04:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

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
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `msg`, `created_at`) VALUES
(1, 'Rayyan Ali', 'rayyanaliddd4422@gmail.com', 'great work', '2023-05-18 12:12:57'),
(2, 'Rayyan Ali', 'rayyanaliddd4422@gmail.com', 'great work', '2023-05-18 12:13:05'),
(3, 'rayyan Ali', 'aliayyan.dev@gmail.com', 'hello', '2023-05-20 06:49:52'),
(4, 'rayyan Ali', 'aliayyan.dev@gmail.com', 'hello', '2023-05-20 06:54:02'),
(5, 'rayyan Ali', 'aliayyan.dev@gmail.com', 'ddddd', '2023-05-20 06:54:49'),
(6, 'rayyan Ali', 'aliayyan.dev@gmail.com', 'fgfgfgf', '2023-07-16 07:49:30'),
(7, 'rayyan Ali', 'aliayyan.dev@gmail.com', 'fgfgfgf', '2023-07-16 07:50:37'),
(8, 'rayyan Ali', 'aliayyan.dev@gmail.com', 'fgfgfgf', '2023-07-16 07:51:28'),
(9, 'rayyan Ali', 'aliayyan.dev@gmail.com', 'fgfgfgf', '2023-07-16 07:51:35'),
(10, 'rayyan Ali', 'aliayyan.dev@gmail.com', 'fgfgfgf', '2023-07-16 07:52:02'),
(11, 'rayyan Ali', 'aliayyan.dev@gmail.com', 'trydyu', '2023-07-16 07:52:43'),
(12, 'rayyan Ali', 'aliayyan.dev@gmail.com', 'dfgjhdfgjdfjd', '2023-07-16 07:55:10'),
(13, 'rayyan Ali', 'aliayyan.dev@gmail.com', 'dfjdjhj', '2023-07-16 07:55:22'),
(14, 'rayyan Ali', 'aliayyan.dev@gmail.com', 'dfhjdfhj', '2023-07-16 07:55:48'),
(15, 'rayyan Ali', 'aliayyan.dev@gmail.com', 'cghjfgjkgk', '2023-07-16 07:56:08');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `parent_category`
--

CREATE TABLE `parent_category` (
  `parent_cat_id` int(11) NOT NULL,
  `parent_cat_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent_category`
--

INSERT INTO `parent_category` (`parent_cat_id`, `parent_cat_name`, `created_at`) VALUES
(1, 'Backend Development', '2023-05-16 04:31:42'),
(2, 'Frontend Development', '2023-05-16 05:57:52');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(150, 'App\\Models\\User', 40, 'rayyanali4422@gmail.com', '7019131cb0dbbba29e283f5082c9e3166477484397c5bd10eca1ecb0da9c3bc1', '{\"expires_at\":\"2023-07-25T19:24:06.145396Z\"}', NULL, NULL, '2023-07-26 01:54:06', '2023-07-26 01:54:06'),
(151, 'App\\Models\\User', 40, 'api_token', '2ebc5aae036f5db9ba21c95fbfbb84b4767018c8e8f52a3e7bdea314c8d26e65', '{\"expires_at\":\"2023-07-25T19:26:00.043702Z\"}', NULL, NULL, '2023-07-26 01:56:00', '2023-07-26 01:56:00'),
(152, 'App\\Models\\User', 40, 'rayyanali4422@gmail.com', '9b43b1b72fdc5d94e56072da8a3884d34c5e51aff1d506f6cfa09b576c597133', '{\"expires_at\":\"2023-08-02T07:48:26.720663Z\"}', NULL, NULL, '2023-08-02 14:18:26', '2023-08-02 14:18:26');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `sub_category` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `plan` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `image`, `title`, `description`, `sub_category`, `status`, `plan`, `created_at`, `updated_at`) VALUES
(1, '/storage/post/post1.png', 'Macbook Pro M1.', 'Lorem ipsum dolor sit amet.\r\n', 'html,css,javascript,jquery,bootstrap,ajax', 1, 1, '2023-02-21 01:37:46', '2023-05-21 01:37:46'),
(2, '/storage/post/post1.jpg\n', 'Second Post are here to see', 'this is the post2 here you can see full details form browse page click the below button.', 'reactjs,mysql,laravel', 1, 1, '2023-05-21 02:29:36', '2023-05-21 02:29:36'),
(3, '/storage/post/post1.jpg\n', 'post3\r\n', 'post3', 'js,html', 1, 0, '2023-05-22 00:23:29', '2023-05-22 00:23:29'),
(4, '/storage/post/post1.jpg\n', 'post4', 'post4', 'php,html', 1, 0, '2023-05-22 00:24:47', '2023-05-22 00:24:47'),
(5, '/storage/post/post1.jpg', 'post5', 'post5', 'php,html', 1, 0, '2023-05-22 00:24:47', '2023-05-22 00:24:47'),
(6, '/storage/post/post1.jpg', 'post6', 'post6', 'php,html', 1, 0, '2023-05-22 00:24:47', '2023-05-22 00:24:47'),
(7, '/storage/post/post1.jpg', 'post7', 'post7', 'php,html', 1, 0, '2023-05-22 00:24:47', '2023-05-22 00:24:47'),
(8, '/storage/post/post1.jpg', 'post8', 'post8', 'php,html', 1, 0, '2023-05-22 00:24:47', '2023-05-22 00:24:47'),
(9, '/storage/post/post1.jpg', 'post9', 'post9', 'php,html', 1, 0, '2023-05-22 00:24:47', '2023-05-22 00:24:47'),
(10, '/storage/post/post1.jpg', 'post', 'post10', 'php,html', 1, 0, '2023-05-22 00:24:47', '2023-05-22 00:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `msg` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `image`, `name`, `occupation`, `email`, `msg`, `created_at`) VALUES
(65, '/storage/review/R1kDbHsFiTubZeyBmwxebJuBhlDDqH6YxdCe7FdF.png', 'Muhammad Taha', 'Web Full Stack Developer', 'rayyanali4422@gmail.com', 'fdjdfjdfhjghjdghk sdghsgh df ghd fjhd fj df j df jh djh d fjh d fjh df jd fj df j df jd fj df j dfj d fj dfj df j df jdfj df jd fj dfjdfj df jd fj dfj fdjdfjdfhjghjdghk sdghsgh df ghd fjhd fj df j df jh djh d fjh d fjh df jd fj df j df jd fj df j dfj', '2023-05-21 08:33:09'),
(66, '/storage/review/HqDHNERjKg56UI6yViNGEyMaCjINAgnQ82xE3WDo.jpg', 'Muhammad Taha', 'Web Full Stack Developer', 'rayyanali4422@gmail.com', 'hello', '2023-05-21 08:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `parent_cat_id` int(11) NOT NULL,
  `category_title` varchar(255) NOT NULL,
  `category_desc` varchar(255) NOT NULL,
  `category_icon` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `parent_cat_id`, `category_title`, `category_desc`, `category_icon`, `status`, `created_at`) VALUES
(1, 1, 'HyperText Preprocessor (PHP)', 'Simple And Easy Server Side Language Card 1 Description', '#6A75C425,fa-light fa-aperture,#6A75C4', 1, '2023-05-16 04:34:16'),
(2, 1, 'MySql Database\r\n', 'Simple And Easy Server Side Language Simple And Easy Server Side Language\r\n\r\n', '#3f4c6b25,fa-light fa-database,#3f4c6b', 1, '2023-05-16 05:11:29'),
(3, 2, 'Semantic HTML 5', 'Simple And Easy Server Side Language Card 1 Description', '#CB306625,fa-light fa-chart-tree-map,#CB3066', 1, '2023-05-16 10:14:54'),
(4, 2, 'Styled With CSS 3', 'Card 2 Description Simple And Easy Server Side Language', '#116BFE25,fa-light fa-bezier-curve,#116BFE\r\n', 1, '2023-05-16 10:18:10'),
(5, 2, 'Logical Javascript', 'pixels, code, and everything nice, that\'s what JavaScript is made of.', '#ED8F0325,fa-light fa-chart-network,#ED8F03', 1, '2023-05-16 10:19:52'),
(6, 2, 'React Js', 'Simple And Easy Server Side Language vSimple And Easy Server Side Language', '#00c8ff25,fa-brands fa-react,#00c8ff', 1, '2023-05-17 00:32:04');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `occupation` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `image`, `name`, `email`, `occupation`, `link`, `created_at`) VALUES
(1, '/storage/team/eG8A9rpS3p9r2Unae7J7r7qkW3BvIBp1qUjEyZYJ.jpg', 'rayyan ALi', 'rayyanali4422@gmail.com', 'graphic Designer', '', '2023-05-20 11:00:31'),
(2, '/storage/team/tYSfsldUM31PcPEcu1uupOClF1CnH31JwekSaDtR.jpg', 'rayyan ALi', 'rayyanali4422@gmail.com', 'graphic Designer', NULL, '2023-05-20 11:15:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `plan` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `plan`, `remember_token`, `created_at`, `updated_at`) VALUES
(40, 'rayyan ali', 'rayyanali4422@gmail.com', NULL, '$2y$10$O/5.0GLTYpgOnXhOYv6VceyF4LjjIBEiXxKb6krY6MTLLOBl8LjHS', 0, NULL, '2023-07-26 01:22:25', '2023-07-26 01:22:25');

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
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent_category`
--
ALTER TABLE `parent_category`
  ADD PRIMARY KEY (`parent_cat_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
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
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `parent_category`
--
ALTER TABLE `parent_category`
  MODIFY `parent_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
