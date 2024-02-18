-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2023 at 08:11 PM
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
-- Database: `staff_lounge_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(6, 'Admin 1', 'admin1@admin.com', '$2y$10$kakZ4yO/syEkESSAy1jnfe9NmpVrKWSMuL0urp3IDf5z6HMFwa5ty', '2023-06-22 18:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `date_booking` varchar(200) NOT NULL,
  `num_people` int(11) NOT NULL,
  `special_request` text DEFAULT NULL,
  `status` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` varchar(20) NOT NULL,
  `image` varchar(200) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `item_id`, `name`, `price`, `image`, `user_id`, `created_at`) VALUES
(13, 1, 'Dirkosh Firfir', '40', 'dabofirfir.jpeg', 10, '2023-06-06 11:09:36'),
(14, 1, 'Dirkosh Firfir', '40', 'dabofirfir.jpeg', 9, '2023-06-08 17:54:42'),
(15, 5, 'Dirkosh Firfir', '50', 'dirkoshFirfir.jpeg', 1, '2023-06-10 19:49:28'),
(16, 5, 'Dirkosh Firfir', '50', 'dirkoshFirfir.jpeg', 12, '2023-06-17 13:16:04'),
(17, 5, 'Dirkosh Firfir', '50', 'dirkoshFirfir.jpeg', 13, '2023-06-22 17:28:36');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(20) NOT NULL,
  `meal_id` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `name`, `image`, `description`, `price`, `meal_id`, `created_at`) VALUES
(5, 'Dirkosh Firfir', 'dirkoshFirfir.jpeg', 'Dirkosh firfir is a popular Ethiopian dish made from dried bread, locally known as \"dirkosh\" or \"kollo\". The bread is soaked in water, squeezed, and then sautéed with spices such as berbere (a blend of chili peppers, garlic, ginger, and other spices), onions, and tomatoes. ', '50', 1, '2023-06-10 19:40:31'),
(6, 'Tibs', 'Tibs.jpeg', 'asdfghjklmnbvcxcvbnm', '80', 2, '2023-06-10 19:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `block` int(11) NOT NULL,
  `phone_number` varchar(200) NOT NULL,
  `comment` text NOT NULL,
  `total_price` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `review` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `review`, `username`, `created_at`) VALUES
(1, 'Thank you for serving by Your delicious food and waiters that know how care for customer!', 'Aman3', '2023-06-09 06:28:13'),
(2, 'You foods make me crazy they are so astonishing!', 'Noah Z', '2023-06-09 06:28:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(5, 'Aman', 'aman@gmail.com', '$2y$10$cfPzKlEdYh/eF5yjH/DnheWNKKbZyynOpi9Gol/M5.3', '2023-05-31 11:45:00'),
(6, 'Amanuel', 'amanuel@gmail.com', '$2y$10$toJoTn8Z86aDPhR2qs.omeutCjt3a633XWC0u2mVPaR', '2023-05-31 16:44:20'),
(7, 'amanuelreta', 'amanuelmandefro3@gmail.com', '$2y$10$4zhVl.9p4dL1xvXgSvio4.gsJIFIMMjcBeGjitMNSEd', '2023-05-31 17:04:31'),
(8, 'aman2', 'aman2@gmail.com', '$2y$10$dNXJvKhP2peBTLV9rdh1CuozGwzvQ6.5tF1vaJJ7kQs', '2023-06-01 12:15:21'),
(9, 'Aman3', 'aman3@gmail.com', '$2y$10$S3eyriDxCqCSEG67aTAayuPZ093ZcCW6.99H6bt.xuDsNFpI3KG8a', '2023-06-01 12:19:51'),
(10, 'Amr ', 'aman12@gmail.com', '$2y$10$5emlFmJL4fKxfiLjyniBreMd2sv/FKwzwj.hfFAVsyXkdalTjA0va', '2023-06-06 11:08:02'),
(11, 'Amanuel Mandefrow', 'amanuel2@gmail.com', '$2y$10$zEWMKBdQGAJYQyMGBqMhuumYbE/THa.vcQPwmlPQ3L7XdGNR7nxzG', '2023-06-09 07:29:35'),
(12, 'Abc Dfg', 'abcd@gmail.com', '$2y$10$IWCI3pvv/Toxmp3pO7S7HuFTqOzfnnR8pl5w9HbJijIYir4i5p.aO', '2023-06-10 20:48:50'),
(14, 'Admin 1', 'admin1@admin.com', '$2y$10$kakZ4yO/syEkESSAy1jnfe9NmpVrKWSMuL0urp3IDf5z6HMFwa5ty', '2023-06-22 18:08:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
