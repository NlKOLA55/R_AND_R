-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 26, 2024 at 07:50 AM
-- Server version: 8.0.39-0ubuntu0.20.04.1
-- PHP Version: 8.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rr`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`) VALUES
(1, 'nikolamarjanusic@gmail.com', '9e4c57c1bc82d1a8d7157acc0ccc52654da2193fad39a0c02f6daf258dab729b');

-- --------------------------------------------------------

--
-- Table structure for table `admin_logins`
--

CREATE TABLE `admin_logins` (
  `admin_id` int DEFAULT NULL,
  `login_date` date NOT NULL,
  `login_Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_logins`
--

INSERT INTO `admin_logins` (`admin_id`, `login_date`, `login_Time`) VALUES
(1, '2024-08-16', '13:13:40'),
(1, '2024-08-17', '13:30:53'),
(1, '2024-08-17', '13:46:27'),
(1, '2024-08-17', '14:19:31'),
(1, '2024-08-17', '14:25:50'),
(1, '2024-08-18', '13:19:07'),
(1, '2024-08-19', '15:52:47'),
(1, '2024-08-19', '18:49:10'),
(1, '2024-08-19', '19:11:49'),
(1, '2024-08-19', '19:14:09'),
(1, '2024-08-20', '14:52:22'),
(1, '2024-08-20', '15:18:31'),
(1, '2024-08-24', '13:48:48'),
(1, '2024-08-25', '23:41:02'),
(1, '2024-08-25', '23:45:51'),
(1, '2024-08-26', '07:39:22'),
(1, '2024-08-26', '07:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `apointment`
--

CREATE TABLE `apointment` (
  `id` int NOT NULL,
  `created_date` date NOT NULL,
  `created_time` time NOT NULL,
  `Apointment_date` date NOT NULL,
  `Apointment_time` time NOT NULL,
  `user_id` int DEFAULT NULL,
  `doctor_id` int DEFAULT NULL,
  `treatments` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `msg` text COLLATE utf8mb4_general_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apointment`
--

INSERT INTO `apointment` (`id`, `created_date`, `created_time`, `Apointment_date`, `Apointment_time`, `user_id`, `doctor_id`, `treatments`, `msg`) VALUES
(1, '2024-08-25', '19:19:32', '2024-08-08', '14:00:00', 1, 5, 'Dental restoration', NULL),
(2, '2024-08-26', '07:12:22', '2024-08-14', '14:30:00', 1, 5, 'Dental restoration', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `fname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `profile_image` blob,
  `msg` text COLLATE utf8mb4_general_ci,
  `treatments` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `email`, `fname`, `lname`, `profile_image`, `msg`, `treatments`, `password`) VALUES
(5, 'nikolamarjanusic@gmail.com', 'Nikola', 'Marjanusic', NULL, NULL, '', '9e4c57c1bc82d1a8d7157acc0ccc52654da2193fad39a0c02f6daf258dab729b'),
(6, 'nako@gmail.com', 'Doc', 'Dukic', NULL, NULL, '', 'f073d7f6e21549f49256e1773cc26858eb69d2d9b775953b41290b9197dfa331'),
(7, 'Pero.Papic@gmail.com', 'Pero', 'Papic', NULL, NULL, '', 'f073d7f6e21549f49256e1773cc26858eb69d2d9b775953b41290b9197dfa331'),
(8, 'Jamie.Heatherson@gmail.com', 'Jamie', 'Heatherson', NULL, NULL, '', 'f073d7f6e21549f49256e1773cc26858eb69d2d9b775953b41290b9197dfa331'),
(9, 'Stefan.Prcic@gmail.com', 'Stefan', 'Prcic', NULL, NULL, '', 'f073d7f6e21549f49256e1773cc26858eb69d2d9b775953b41290b9197dfa331');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_logins`
--

CREATE TABLE `doctor_logins` (
  `doctor_id` int DEFAULT NULL,
  `login_date` date NOT NULL,
  `login_Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_logins`
--

INSERT INTO `doctor_logins` (`doctor_id`, `login_date`, `login_Time`) VALUES
(5, '2024-08-21', '13:23:48'),
(5, '2024-08-21', '19:39:12'),
(5, '2024-08-21', '19:40:15'),
(5, '2024-08-21', '19:41:48'),
(5, '2024-08-21', '19:43:57'),
(5, '2024-08-21', '19:44:34'),
(5, '2024-08-21', '19:45:12'),
(5, '2024-08-21', '19:46:04'),
(5, '2024-08-21', '19:48:00'),
(5, '2024-08-21', '19:48:54'),
(5, '2024-08-21', '19:52:41'),
(5, '2024-08-21', '19:54:21'),
(5, '2024-08-21', '20:03:58'),
(5, '2024-08-21', '20:04:53'),
(5, '2024-08-21', '20:06:50'),
(5, '2024-08-21', '20:08:17'),
(5, '2024-08-21', '20:09:06'),
(5, '2024-08-21', '20:09:39'),
(5, '2024-08-21', '20:10:33'),
(5, '2024-08-21', '20:10:45'),
(5, '2024-08-21', '20:11:38'),
(5, '2024-08-21', '20:58:08'),
(5, '2024-08-21', '20:59:26'),
(5, '2024-08-21', '21:01:36'),
(5, '2024-08-21', '21:02:28'),
(5, '2024-08-21', '21:03:03'),
(5, '2024-08-21', '21:03:48'),
(5, '2024-08-21', '21:05:07'),
(5, '2024-08-21', '21:05:52'),
(5, '2024-08-21', '21:07:03'),
(5, '2024-08-21', '21:07:50'),
(5, '2024-08-21', '21:10:38'),
(5, '2024-08-21', '21:11:47'),
(5, '2024-08-21', '21:12:11'),
(5, '2024-08-23', '13:21:11'),
(5, '2024-08-23', '15:45:19'),
(5, '2024-08-24', '17:13:30'),
(5, '2024-08-24', '20:15:07'),
(5, '2024-08-25', '10:59:25'),
(5, '2024-08-25', '12:21:07'),
(5, '2024-08-25', '19:53:52'),
(5, '2024-08-25', '22:00:24'),
(5, '2024-08-25', '23:43:32'),
(5, '2024-08-26', '07:14:51'),
(5, '2024-08-26', '07:19:29'),
(5, '2024-08-26', '07:24:24'),
(5, '2024-08-26', '07:25:43');

-- --------------------------------------------------------

--
-- Table structure for table `treatmentsinfo`
--

CREATE TABLE `treatmentsinfo` (
  `doctor_id` int DEFAULT NULL,
  `treatment` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `length` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `treatmentsinfo`
--

INSERT INTO `treatmentsinfo` (`doctor_id`, `treatment`, `length`) VALUES
(5, 'Dental restoration', '00:30:00'),
(5, 'Dental implant', '01:30:00'),
(5, 'Dental extraction', '01:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `fname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `lname` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci DEFAULT 'Not provided',
  `gender` varchar(20) COLLATE utf8mb4_general_ci DEFAULT 'Prefer not to say',
  `birthDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `fname`, `lname`, `password`, `phone`, `gender`, `birthDate`) VALUES
(1, 'nikolamarjanusic@gmail.com', 'Nikola', 'Marjanusic', '9e4c57c1bc82d1a8d7157acc0ccc52654da2193fad39a0c02f6daf258dab729b', '+381(0)691559040', 'Prefer not to say', '2024-08-09'),
(5, 'nako@gmail.com', 'hi', 'adas', 'f073d7f6e21549f49256e1773cc26858eb69d2d9b775953b41290b9197dfa331', '+381(0)691559040', 'Prefer not to say', '2024-09-07'),
(6, 'Radi.Test@gmail.com', 'Radi', 'Test', 'f073d7f6e21549f49256e1773cc26858eb69d2d9b775953b41290b9197dfa331', '', 'Not provided', '2024-08-09');

-- --------------------------------------------------------

--
-- Table structure for table `user_logins`
--

CREATE TABLE `user_logins` (
  `user_id` int DEFAULT NULL,
  `login_date` date NOT NULL,
  `login_Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_logins`
--

INSERT INTO `user_logins` (`user_id`, `login_date`, `login_Time`) VALUES
(1, '2024-08-16', '12:56:00'),
(1, '2024-08-16', '12:56:35'),
(1, '2024-08-17', '14:21:10'),
(1, '2024-08-17', '14:23:10'),
(1, '2024-08-17', '14:23:33'),
(1, '2024-08-17', '14:23:47'),
(1, '2024-08-17', '14:24:35'),
(1, '2024-08-20', '16:08:42'),
(1, '2024-08-20', '16:10:09'),
(1, '2024-08-21', '19:38:44'),
(1, '2024-08-23', '13:13:40'),
(1, '2024-08-23', '16:58:18'),
(1, '2024-08-24', '12:39:28'),
(1, '2024-08-24', '13:52:36'),
(1, '2024-08-24', '20:18:39'),
(1, '2024-08-25', '13:09:22'),
(1, '2024-08-25', '17:10:23'),
(1, '2024-08-25', '18:47:07'),
(1, '2024-08-25', '19:29:03'),
(1, '2024-08-26', '07:05:44');

-- --------------------------------------------------------

--
-- Table structure for table `workinfo`
--

CREATE TABLE `workinfo` (
  `doctor_id` int DEFAULT NULL,
  `day` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `start_time` time NOT NULL DEFAULT '07:00:00',
  `end_time` time NOT NULL DEFAULT '17:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `workinfo`
--

INSERT INTO `workinfo` (`doctor_id`, `day`, `start_time`, `end_time`) VALUES
(5, 'Monday', '07:00:00', '18:00:00'),
(5, 'Tuesday', '07:00:00', '18:00:00'),
(5, 'Wednesday', '07:00:00', '18:00:00'),
(5, 'Thursday', '07:00:00', '18:00:00'),
(5, 'Friday', '07:00:00', '18:00:00'),
(5, 'Saturday', '00:00:00', '00:00:00'),
(5, 'Sunday', '00:00:00', '00:00:00'),
(6, 'Monday', '07:00:00', '17:00:00'),
(6, 'Tuesday', '07:00:00', '17:00:00'),
(6, 'Wednesday', '07:00:00', '17:00:00'),
(6, 'Thursday', '07:00:00', '17:00:00'),
(6, 'Friday', '07:00:00', '17:00:00'),
(6, 'Saturday', '07:00:00', '17:00:00'),
(6, 'Sunday', '07:00:00', '17:00:00'),
(7, 'Monday', '07:00:00', '17:00:00'),
(7, 'Tuesday', '07:00:00', '17:00:00'),
(7, 'Wednesday', '07:00:00', '17:00:00'),
(7, 'Thursday', '07:00:00', '17:00:00'),
(7, 'Friday', '07:00:00', '17:00:00'),
(7, 'Saturday', '07:00:00', '17:00:00'),
(7, 'Sunday', '07:00:00', '17:00:00'),
(8, 'Monday', '07:00:00', '17:00:00'),
(8, 'Tuesday', '07:00:00', '17:00:00'),
(8, 'Wednesday', '07:00:00', '17:00:00'),
(8, 'Thursday', '07:00:00', '17:00:00'),
(8, 'Friday', '07:00:00', '17:00:00'),
(8, 'Saturday', '07:00:00', '17:00:00'),
(8, 'Sunday', '07:00:00', '17:00:00'),
(9, 'Monday', '07:00:00', '17:00:00'),
(9, 'Tuesday', '07:00:00', '17:00:00'),
(9, 'Wednesday', '07:00:00', '17:00:00'),
(9, 'Thursday', '07:00:00', '17:00:00'),
(9, 'Friday', '07:00:00', '17:00:00'),
(9, 'Saturday', '07:00:00', '17:00:00'),
(9, 'Sunday', '07:00:00', '17:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_logins`
--
ALTER TABLE `admin_logins`
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `apointment`
--
ALTER TABLE `apointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_logins`
--
ALTER TABLE `doctor_logins`
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `treatmentsinfo`
--
ALTER TABLE `treatmentsinfo`
  ADD KEY `doctor_id` (`doctor_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `workinfo`
--
ALTER TABLE `workinfo`
  ADD KEY `doctor_id` (`doctor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `apointment`
--
ALTER TABLE `apointment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_logins`
--
ALTER TABLE `admin_logins`
  ADD CONSTRAINT `admin_logins_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);

--
-- Constraints for table `apointment`
--
ALTER TABLE `apointment`
  ADD CONSTRAINT `apointment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `apointment_ibfk_2` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);

--
-- Constraints for table `doctor_logins`
--
ALTER TABLE `doctor_logins`
  ADD CONSTRAINT `doctor_logins_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);

--
-- Constraints for table `treatmentsinfo`
--
ALTER TABLE `treatmentsinfo`
  ADD CONSTRAINT `treatmentsinfo_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);

--
-- Constraints for table `user_logins`
--
ALTER TABLE `user_logins`
  ADD CONSTRAINT `user_logins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `workinfo`
--
ALTER TABLE `workinfo`
  ADD CONSTRAINT `workinfo_ibfk_1` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
