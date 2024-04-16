-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2024 at 02:59 PM
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
-- Database: `spark_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_list`
--

CREATE TABLE `admin_list` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `pwd` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_list`
--

INSERT INTO `admin_list` (`id`, `username`, `pwd`) VALUES
(1, 'admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `bookings_list`
--

CREATE TABLE `bookings_list` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `usermail` varchar(255) NOT NULL,
  `eventName` varchar(255) NOT NULL,
  `eventDate` date NOT NULL,
  `ticketID` varchar(255) NOT NULL,
  `ticketType` varchar(255) NOT NULL,
  `bookingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings_list`
--

INSERT INTO `bookings_list` (`id`, `username`, `usermail`, `eventName`, `eventDate`, `ticketID`, `ticketType`, `bookingDate`) VALUES
(49, 'dinuka sadaruwan', 'deelaka.lakpura94@gmail.com', 'Green Flames', '2024-03-28', 'TICKET_65fa9aa33d0c4', '13000', '2024-03-20 08:13:34'),
(50, 'dinuka sadaruwan', 'deelaka.lakpura94@gmail.com', 'Green Flames', '2024-03-28', 'TICKET_65fab82ad33b8', '13000', '2024-03-20 10:19:32'),
(51, 'dinuka sadaruwan', 'deelaka.lakpura94@gmail.com', 'Green Flames', '2024-03-28', 'TICKET_65fab898bd358', '13000', '2024-03-20 10:21:19'),
(52, 'dinuka sadaruwan', 'deelaka.lakpura94@gmail.com', 'Green Flames', '2024-03-28', 'TICKET_65fab90a15c55', '13000', '2024-03-20 10:23:13'),
(53, 'dinuka sadaruwan', 'deelaka.lakpura94@gmail.com', 'Green Flames', '2024-03-28', 'TICKET_65fab9521a703', '13000', '2024-03-20 10:24:31'),
(54, 'dinuka sadaruwan', 'deelaka.lakpura94@gmail.com', 'Green Flames', '2024-03-28', 'TICKET_65fab9d019034', '13000', '2024-03-20 10:26:33'),
(55, 'dinuka sadaruwan', 'deelaka.lakpura94@gmail.com', 'Green Flames', '2024-03-28', 'TICKET_65faba25c3eb2', '13000', '2024-03-20 10:27:52'),
(56, 'dinuka sadaruwan', 'deelaka.lakpura94@gmail.com', 'Green Flames', '2024-03-28', 'TICKET_65faba4551f80', '13000', '2024-03-20 10:28:30'),
(57, 'dinuka sadaruwan', 'deelaka.lakpura94@gmail.com', 'Green Flames', '2024-03-28', 'TICKET_65fabb21c1756', '13000', '2024-03-20 10:32:09'),
(58, 'dinuka sadaruwan', 'deelaka.lakpura94@gmail.com', 'Green Flames', '2024-03-28', 'TICKET_65fabbc9bd6b2', '13000', '2024-03-20 10:34:57'),
(59, 'dinuka sadaruwan', 'deelaka.lakpura94@gmail.com', 'Green Flames', '2024-03-28', 'TICKET_65fabbe2c92d3', '13000', '2024-03-20 10:35:22'),
(60, 'dinuka sadaruwan', 'deelaka.lakpura94@gmail.com', 'Green Flames', '2024-03-28', 'TICKET_65fabcf082138', '13000', '2024-03-20 10:39:50'),
(61, 'dinuka sadaruwan', 'deelaka.lakpura94@gmail.com', 'Green Flames', '2024-03-28', 'TICKET_65fabedff2486', '13000', '2024-03-20 10:48:06'),
(62, 'dinuka sadaruwan', 'deelaka.lakpura94@gmail.com', 'Green Flames', '2024-03-28', 'TICKET_65fabfaa36829', '13000', '2024-03-20 10:51:29'),
(63, 'dinuka sadaruwan', 'deelaka.lakpura94@gmail.com', 'Green Flames', '2024-03-28', 'TICKET_65fac09eef0c1', '13000', '2024-03-20 10:55:37'),
(64, 'dinuka sadaruwan', 'deelaka.lakpura94@gmail.com', 'Green Flames', '2024-03-28', 'TICKET_65fac14a5c267', '13000', '2024-03-20 10:58:26'),
(65, 'dinuka sadaruwan', 'deelaka.lakpura94@gmail.com', 'Green Flames', '2024-03-28', 'TICKET_65fac17e0a9a9', '13000', '2024-03-20 10:59:16'),
(66, 'isini amaya', 'isini.galpaya2001@gmail.com', 'Green Flames', '2024-03-28', 'TICKET_65fac1e5a839a', '4000', '2024-03-20 11:01:09'),
(67, 'dinuka sadaruwan', 'deelaka.lakpura94@gmail.com', 'Green Flames', '2024-03-28', 'TICKET_65fac51a8e2b0', '13000', '2024-03-20 11:14:43'),
(68, 'dinuka sadaruwan', 'deelaka.lakpura94@gmail.com', 'Green Flames', '2024-03-28', 'TICKET_65fac6d609c1b', '13000', '2024-03-20 11:22:05'),
(69, 'dinuka sadaruwan', 'deelaka.lakpura94@gmail.com', 'Green Flames', '2024-03-28', 'TICKET_65fac802af8e2', '13000', '2024-03-20 11:27:06'),
(70, 'dinuka sadaruwan', 'deelaka.lakpura94@gmail.com', 'Green Flames', '2024-03-28', 'TICKET_65fac86f1aabc', '13000', '2024-03-20 11:28:52'),
(71, 'dinuka sadaruwan', 'deelaka.lakpura94@gmail.com', 'Green Flames', '2024-03-28', 'TICKET_65facaabea69e', '13000', '2024-03-20 11:38:28'),
(72, 'dinuka sadaruwan', 'deelaka.lakpura94@gmail.com', 'Green Flames', '2024-03-28', 'TICKET_65facadd73e0d', '13000', '2024-03-20 11:39:17'),
(73, 'dinuka sadaruwan', 'deelaka.lakpura94@gmail.com', 'Green Flames', '2024-03-28', 'TICKET_65facb2869fad', '13000', '2024-03-20 11:40:32'),
(74, 'dinuka sadaruwan', 'deelaka.lakpura94@gmail.com', 'Green Flames', '2024-03-28', 'TICKET_65facc0352d15', '13000', '2024-03-20 11:44:12'),
(75, 'Dilshi Tharusha', 'mahagamamudalige@gmail.com', 'Green Flames', '2024-03-28', 'TICKET_65faccc38ab36', '4000', '2024-03-20 11:47:24'),
(76, 'Hashini', 'hashinikarunathilaka28@gmail.com', 'Green Fiesta', '2024-12-23', 'TICKET_65fae547100bf', '2000', '2024-03-20 13:32:09'),
(77, 'Hashini', 'hashinikarunathilaka28@gmail.com', 'Green Fiesta', '2024-12-23', 'TICKET_65fae547100bf', '2000', '2024-03-20 13:32:10'),
(78, 'Hashini', 'hashinikarunathilaka28@gmail.com', 'Green Fiesta', '2024-12-23', 'TICKET_65fbd4d1276fa', '2000', '2024-03-21 06:34:09'),
(79, 'Hashini', 'hashinikarunathilaka28@gmail.com', 'Green Fiesta', '2024-12-23', 'TICKET_65fbd4d1276fa', '2000', '2024-03-21 06:34:12'),
(80, 'Hashini', 'hashinikarunathilaka28@gmail.com', 'Green Flames', '2024-03-28', 'TICKET_65fc35d0ba661', '2000', '2024-03-21 13:27:55'),
(81, 'Hashini', 'hashinikarunathilaka28@gmail.com', 'Green Flames', '2024-03-28', 'TICKET_65fc3bf637035', '2000', '2024-03-21 13:54:08'),
(82, 'Hashini', 'hashinikarunathilaka28@gmail.com', 'Green Flames', '2024-03-28', 'TICKET_65fc3bf637035', '2000', '2024-03-21 13:54:09'),
(83, 'Hashini', 'hashinikarunathilaka28@gmail.com', 'Green Fiesta', '2024-03-05', 'TICKET_65fc3c80758c0', '2000', '2024-03-21 13:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `full_name`, `email`, `company`, `message`, `created_at`) VALUES
(2, 'hashini', 'hashinikarunathilaka28@gmail.com', 'nsbm', 'good', '2024-03-20 13:27:00'),
(3, 'Dilshi Tharusha Mahagama Mudalige', 'mahagamamudalige@gmail.com', 'nsbm', 'good', '2024-03-21 13:22:09');

-- --------------------------------------------------------

--
-- Table structure for table `events_list`
--

CREATE TABLE `events_list` (
  `id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `event_category` varchar(50) NOT NULL,
  `event_time` time NOT NULL,
  `event_venue` varchar(255) NOT NULL,
  `event_image_url` varchar(255) NOT NULL,
  `event_desc` varchar(800) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events_list`
--

INSERT INTO `events_list` (`id`, `event_name`, `event_date`, `event_category`, `event_time`, `event_venue`, `event_image_url`, `event_desc`) VALUES
(8, 'Green Flames', '2024-03-28', 'Pay to play', '18:12:00', 'Main Ground', 'uploads/WhatsApp Image 2024-03-18 at 11.56.20.jpeg', 'Green flames event'),
(9, 'Prana', '2024-05-29', 'Free to see', '17:00:00', 'Main Ground', 'uploads/WhatsApp Image 2024-03-18 at 11.57.05.jpeg', 'Prana '),
(10, 'Siyapath Siya Udanaya ', '2024-04-12', 'Free to see', '08:00:00', 'Main Ground', 'uploads/WhatsApp Image 2024-03-18 at 11.58.04.jpeg', 'Siyapath Siya Udanaya '),
(16, 'Green Fiesta', '2024-03-05', 'Pay to play', '10:25:00', 'nsbm', 'uploads/IMG_8914.JPG', 'yyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyyy');

-- --------------------------------------------------------

--
-- Table structure for table `images_list`
--

CREATE TABLE `images_list` (
  `id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `upload_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images_list`
--

INSERT INTO `images_list` (`id`, `f_name`, `upload_time`) VALUES
(19, 'IMG-20240319-WA0005.jpg', '2024-03-19 10:51:13'),
(20, 'IMG-20240319-WA0006.jpg', '2024-03-19 10:51:18'),
(21, 'IMG-20240319-WA0007.jpg', '2024-03-19 10:51:24'),
(22, 'IMG-20240319-WA0008.jpg', '2024-03-19 10:51:29'),
(23, 'IMG-20240319-WA0009.jpg', '2024-03-19 10:51:35'),
(24, 'IMG-20240319-WA0010.jpg', '2024-03-19 10:51:40'),
(25, 'IMG-20240319-WA0011.jpg', '2024-03-19 10:51:46'),
(26, 'IMG-20240319-WA0012.jpg', '2024-03-19 10:51:52'),
(27, 'IMG-20240319-WA0014.jpg', '2024-03-19 10:52:02'),
(28, 'IMG-20240319-WA0015.jpg', '2024-03-19 10:52:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` enum('student','alumni') NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `batch` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `alumni_id` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `full_name`, `faculty`, `batch`, `email`, `pwd`, `alumni_id`, `created_at`) VALUES
(29, 'student', 'Hashini', 'faculty of computing', '22.1', 'hashinikarunathilaka28@gmail.com', '$2y$10$YYqyjmNieg3xAD4E0/DVietik23hq84.okYfxLRbXH/CsdR4Zm7BO', NULL, '2024-03-20 13:26:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_list`
--
ALTER TABLE `admin_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings_list`
--
ALTER TABLE `bookings_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events_list`
--
ALTER TABLE `events_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images_list`
--
ALTER TABLE `images_list`
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
-- AUTO_INCREMENT for table `admin_list`
--
ALTER TABLE `admin_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings_list`
--
ALTER TABLE `bookings_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `events_list`
--
ALTER TABLE `events_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `images_list`
--
ALTER TABLE `images_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
