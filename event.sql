-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 17, 2025 at 10:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `event_id`, `user_id`, `booking_date`) VALUES
(1, 1, 'USR_1', '2025-06-17 07:30:49'),
(2, 2, 'USR_1', '2025-06-17 07:30:59'),
(3, 4, 'USR_1', '2025-06-17 07:31:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) NOT NULL DEFAULT 'enable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `email`, `username`, `contact`, `password`, `created_date`, `status`) VALUES
(1, 'USR_1', 'syedhamzaroshan22@gmail.com', 'Syed Hamza Roshan', '8863838200', '6cee544b3061dc5b80c35b5f621cf972', '2025-06-17 01:55:52', 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` varchar(55) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `available_seats` int(11) NOT NULL,
  `status` varchar(19) NOT NULL DEFAULT 'enable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`id`, `name`, `date`, `venue`, `available_seats`, `status`) VALUES
(1, 'Rock n Roll Concert', 'July 15, 2025', 'Madison Square Garden, New York', 10, 'enable'),
(2, 'Food and Wine Festival', 'August 5, 2025', 'Downtown Convention Center, Los Angeles', 8, 'enable'),
(3, 'Tech Innovators Conference 2025', 'September 10, 2025', 'Silicon Valley Convention Hall, San Francisco', 11, 'enable'),
(4, 'The Phantom of the Opera', 'October 2, 2025', 'Broadway Theatre, New York', 30, 'enable'),
(5, 'Charity Gala & Auction for Children', 'November 20, 2025', 'Grand Ballroom, The Ritz-Carlton, Miami', 20, 'enable');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
