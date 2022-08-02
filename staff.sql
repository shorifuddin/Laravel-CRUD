-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2022 at 01:56 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(18) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datebirth` date DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `skill` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `multi_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `name`, `phone`, `username`, `email`, `datebirth`, `country`, `gender`, `skill`, `category`, `about`, `image`, `multi_image`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Shorif Uddin', '015714', 'shorif', 'mcshorif@gmail.com', '2022-08-22', 3, 1, 'php,java', '1', '<p>hellow o</p>', '1659415082_8890282.jpg', NULL, '62e893d53d6a6', 1, '2022-08-01 21:02:45', '2022-08-02 00:04:46'),
(3, 'Rony Naeem', '018555', 'RONY', 'rony@gmail.com', '2022-08-12', 2, 1, 'java', '1', '<p>rony</p>', '1659416439_3572717.jpg', NULL, '62e8af77adf4f', 1, '2022-08-01 23:00:39', NULL),
(4, 'Sagar Nath', '0185465', 'shagor', 'sagar@gmail.com', '2022-08-09', 2, 1, 'laravel', '1', '<p>Sagaa</p>', '1659420496_5821826.jpg', NULL, '62e8bf511445a', 1, '2022-08-02 00:08:17', NULL),
(5, 'Tarek chy', '0156465656', 'tarek55', 'tarek55@gmail.com', '2022-08-04', 2, 2, 'php,laravel', '1', '<p>ggggg</p>', '1659435458_9038524.jpg', NULL, '62e8f90982925', 0, '2022-08-02 04:14:33', '2022-08-02 04:19:18'),
(6, 'ABCD', '3456', 'ABCD', 'ABCD@GMAIL.COM', '2022-07-14', 2, 1, 'php', '1', '<p>DABC</p>', '1659441083_1618489.jpg', NULL, '62e90f5457437', 1, '2022-08-02 05:49:40', '2022-08-02 05:51:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
