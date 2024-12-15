-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 15, 2024 at 01:59 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lavaui`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` bigint UNSIGNED NOT NULL,
  `id` int NOT NULL,
  `class_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `id`, `class_id`) VALUES
(1, 4, 26),
(2, 4, 29),
(3, 4, 38);

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Class_Type` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Available_Slots` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `name`, `Class_Type`, `Available_Slots`, `email`, `appointment_date`, `appointment_time`, `created_at`, `updated_at`) VALUES
(1, 'Mason, Sanieca F.', '', 0, 'masonsanieca7@gmail.com', '2024-12-19', '02:07:00', '2024-12-09 18:03:10', '2024-12-09 18:03:10'),
(3, 'hhh', '', 0, 'hdjdf@gmail.com', '2024-12-24', '02:22:00', '2024-12-09 18:19:46', '2024-12-09 18:19:46'),
(4, 'hhh', '', 0, 'hdjdf@gmail.com', '2024-12-12', '06:27:00', '2024-12-09 18:27:52', '2024-12-09 18:27:52'),
(17, 'Mason, Sanieca F.', '', 0, 'masonsanieca7@gmail.com', '2024-12-06', '10:47:00', '2024-12-11 02:44:07', '2024-12-11 02:44:07');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int NOT NULL,
  `class_name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `instructor` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dance_classes`
--

CREATE TABLE `dance_classes` (
  `class_id` int NOT NULL,
  `class_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `instructor_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `class_time` datetime DEFAULT NULL,
  `available_slots` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dance_classes`
--

INSERT INTO `dance_classes` (`class_id`, `class_name`, `instructor_name`, `class_time`, `available_slots`) VALUES
(26, 'Ballet', 'Kenny', '2024-12-25 03:41:00', 19),
(28, 'Modern', 'Sanieca', '2024-12-11 03:44:00', 1),
(29, 'Cheerdance', 'Cherry', '2024-12-07 11:44:00', 65),
(30, 'Ball room', 'Ericka', '2024-12-26 11:45:00', 4),
(31, 'Jazz', 'Hanz', '2024-12-19 11:45:00', 7),
(32, 'Folkdance', 'Ella', '2024-12-13 11:46:00', 9),
(33, 'Chacha', 'Vhybenica', '2024-12-28 11:46:00', 90),
(34, 'Tap Dance', 'secret', '2024-12-16 13:00:00', 12),
(35, 'Salsa', 'Kenny', '2024-12-11 15:23:00', 20),
(36, 'Contemporary', 'Kenny', '2024-12-12 15:21:00', 20),
(37, 'Ballet', 'Jioh', '2025-01-10 16:47:00', 3),
(38, 'Jazz', 'Kow2', '2024-12-19 21:04:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `is_read` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `reset_token` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_on` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `browser` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `ip` varchar(60) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `session_data` varchar(70) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `user_id`, `browser`, `ip`, `session_data`, `created_at`) VALUES
(1, 1, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', '::1', '412300e827fd282f545711594a968d6d5fc2fdfd46cec634f4fed838c6ef52a5', '2024-11-30 21:21:04'),
(2, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', '::1', 'f2aa50b53cadc2ccfb5b63e291e5ee1491ae8c02de517e91ddb43dfec3150386', '2024-12-05 18:02:48'),
(3, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', '::1', '8f04f5828799feba8b964add6af18fe0bbc75c2ff7368b1b69388535cacaf23c', '2024-12-08 12:38:48'),
(10, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', '::1', 'aad3f53887a72a86ea5b93cd67d76e11235bab2bade79acb565547a1df05c049', '2024-12-11 15:19:09'),
(11, 2, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', '::1', 'f23f1da1b19c2ee2ac3e57bc2527078ee2098dd13132632dd6781bb0f3c58643', '2024-12-13 12:48:59'),
(14, 4, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', '::1', '8542cc278060c6aa560fead0fa8d39a386b1aeb4fe12cef00c917172cb412b7c', '2024-12-15 17:20:26'),
(18, 4, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', '::1', 'b0dd3ae92694e95894359693e826b357a0129f716a1a5ba23e09ad3e7ef1f9c8', '2024-12-15 17:54:36'),
(19, 4, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', '::1', '0b53e331c26de65f1e4e271c3fd3f6d11cd16e99c1eb83c860faec654b85ba29', '2024-12-15 17:55:10'),
(20, 4, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', '::1', 'a1cd31bb9134a9209a7a565b6e987a091ea88f8dd0b46bd24beebc8849d7c62c', '2024-12-15 17:55:58'),
(21, 4, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', '::1', '69cf5af9ca8afc771a5bdd2cf8bdd6b0166648056ae35e8bc59e4d5f1a5ae5b5', '2024-12-15 17:57:07'),
(22, 4, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', '::1', 'cb83c127e9a1f0d2124917368c986f635e6d33cd5be7611754e34e54af6219d0', '2024-12-15 17:57:12'),
(27, 5, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', '::1', '73bbdd1081eecb39b980246b963f86422b4edf5872baffd72c427698695f5028', '2024-12-15 21:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_token` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `google_oauth_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `role` varchar(20) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_token`, `email_verified_at`, `password`, `remember_token`, `google_oauth_id`, `created_at`, `updated_at`, `role`) VALUES
(1, 'admin', 'masonsanieca7@gmail.com', 'admin@gmail.com', NULL, 'admin123', NULL, NULL, '2024-11-30 13:21:04', '2024-12-15 08:43:35', 'user'),
(2, 'Sanyeca', 'strikinglycms@gmail.com', 'b26495679239ec670a2884c462291beb04553b324f3276eae8a062c77648831e8d9e9bc0321c8fd092f1ca5378e0cdaab04e', NULL, '$2y$04$1N6.i9Bse3cSlczP.xFGyuWfOwa5JsFy/zynWn28lfobSKfvG79wC', NULL, NULL, '2024-12-05 10:02:48', '2024-12-05 10:02:48', 'user'),
(3, 'kkeyy', 'kennyy762@gmail.com', '34d98994b52720cd69da5f781607ea45231e31bbed389292685541efe3b26c8ac0a116343ebad99c143a1d9cc35eb2dd2759', NULL, '$2y$04$rpX6y5WDn0zpjBxCCIdRRu4tBxBuILrAFRByYKPvXYKlDS1Wjqwg.', NULL, NULL, '2024-12-11 06:22:44', '2024-12-11 06:22:44', 'user'),
(4, 'Daniel', 'admin@gmail.com', '9c688d131ffd0e1d782a22ac000fdb7d64f06081e807a04b26ec65162db0ffb43641515f15460be0571a474c4b48a9ddb401', NULL, '$2y$04$JAWvHQmyXDHYuWXhPm8dYunu/EPtnTe4SRfLTM6aZEUWp5alMpxG6', NULL, NULL, '2024-12-15 08:46:19', '2024-12-15 13:31:00', 'admin'),
(5, 'Fireed', 'fire@gmail.com', 'a531f201328dc458560ae28e324a017c4903d51b6e1aeca44db0862fa08e98c4d98ac6c4f0f670ea35ff4db8e7956b861e5e', NULL, '$2y$04$yCfp2pAQftM51Xigecwguu81O52HGec6SB58TvenDJmyLP1U35WB2', NULL, NULL, '2024-12-15 13:55:09', '2024-12-15 13:55:09', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`),
  ADD UNIQUE KEY `appointment_id` (`appointment_id`),
  ADD KEY `fk_user` (`id`),
  ADD KEY `fk_dance_class` (`class_id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dance_classes`
--
ALTER TABLE `dance_classes`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dance_classes`
--
ALTER TABLE `dance_classes`
  MODIFY `class_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `fk_dance_class` FOREIGN KEY (`class_id`) REFERENCES `dance_classes` (`class_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
