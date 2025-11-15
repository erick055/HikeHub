-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Nov 15, 2025 at 06:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `trail_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review_text` text NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `likes` int(11) DEFAULT 0,
  `comments` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `trail_id`, `rating`, `review_text`, `image_path`, `likes`, `comments`, `created_at`) VALUES
(1, 2, 2, 5, 'qwe', NULL, 0, 0, '2025-10-30 10:55:20'),
(3, 4, 1, 5, '1561', NULL, 0, 0, '2025-10-31 06:19:26'),
(4, 4, 2, 5, 'qweqwe', NULL, 0, 0, '2025-11-03 08:41:52');

-- --------------------------------------------------------

--
-- Table structure for table `trails`
--

CREATE TABLE `trails` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `difficulty` varchar(50) DEFAULT NULL,
  `length_km` decimal(5,1) DEFAULT NULL,
  `time_hours` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trails`
--

INSERT INTO `trails` (`id`, `name`, `location`, `description`, `image_path`, `difficulty`, `length_km`, `time_hours`) VALUES
(1, 'Mt. Pico de Loro', 'Ternate, Cavite', 'One of the most popular hiking destinations in Cavite, known for its iconic parrot\'s beak summit.', 'img/pico.png', 'Moderate', 8.5, '4-6 hours'),
(2, 'Mt. Palay-Palay', 'Maragondon, Cavite', 'A scenic trail with lush forests and diverse wildlife, perfect for nature enthusiasts.', 'img/palaypalay.png', 'Easy', 4.2, '2-3 Hours'),
(3, 'Mt. Talamitam', 'Nasugbu, Batangas', 'A relatively easy climb with open trails and a rewarding summit view.', 'img/talamits.png', 'Moderate', 8.5, '3-4 Hours');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `bio` text DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `experience_level` varchar(50) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `emergency_contact` varchar(100) DEFAULT NULL,
  `favorite_trail_type` varchar(100) DEFAULT NULL,
  `best_hiking_time` varchar(50) DEFAULT NULL,
  `companion_preference` varchar(50) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `bio`, `location`, `experience_level`, `phone_number`, `emergency_contact`, `favorite_trail_type`, `best_hiking_time`, `companion_preference`, `profile_picture`) VALUES
(2, 'erick', 'erick@gmail.com', '$2y$10$7T/XMnsfgCmpFsTrpxeafuq6veoN/ufsZnFxYhraa3CTdFnB7C0P6', 'HEllo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'dann', 'erick1@gmail.com', '$2y$10$NLpf/cD.hSeRg3r1OcYOfOCWdUnv2X2xJAdiGk9DlTtE04PGHH3LW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'erick11', 'erick11@gmail.com', '$2y$10$2zgMJDJ./4CxN1LQiGkfFOoUkGjiGjp2.tcU5.jVBQ8C9RjNBagoG', 'ASDASDASDASD', 'cavite', 'Intermediate', '09976072595', '09283414959', 'Waterfall', 'Afternoon', 'Friends', NULL),
(5, 'dannerick', 'erickpallorina@gmail.com', '$2y$10$olK4.pxNg8U45Dw.ZDDBduQq4HREnuwR8Wl5q34Dseald4520hv/O', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'dann', 'dann123@gmail.com', '$2y$10$7n7ua3DVrumOVFO284nMauBkx6Xkq3ENmtftMv5ZKakKI79jnVy.m', '', '', 'Beginner', '', '', 'Mountain', 'Morning', 'Solo', 'uploads/profiles/user_6_69188d27d607b.jpg'),
(7, 'dann', 'dann2@gmail.com', '$2y$10$e83OMSCrLMdAZq5eE7a0/OYistbZnfALWUGmDNC8CWRFRpXHop8Pu', '', '', 'Beginner', '', '', 'Mountain', 'Morning', 'Solo', 'uploads/profiles/user_7_6914833c732b1.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `trail_id` (`trail_id`);

--
-- Indexes for table `trails`
--
ALTER TABLE `trails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trails`
--
ALTER TABLE `trails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`trail_id`) REFERENCES `trails` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
