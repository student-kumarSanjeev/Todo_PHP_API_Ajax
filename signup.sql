-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 30, 2025 at 08:14 AM
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
-- Database: `todo_list`
--

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `username` varchar(250) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(250) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedat` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `name`, `username`, `email`, `password`, `createdAt`, `updatedat`) VALUES
(1, 'Smith', 'smith_123', 'smith@gmail.com', '$2y$10$z1f9m1QhB/6diLSigGsqIu2KUIZ0nRhO3T55L5xwohmz8Qv/0.tyC', '2025-05-27 09:49:35', '0000-00-00 00:00:00'),
(2, 'Eliot', 'eliot_123', 'eliot@gmail.com', '$2y$10$ZN2OJ1NtFgHhYJRn6Po5Iu5f/XpS1e2.2qVHXaIcGoxXMeUL4R4Tm', '2025-05-27 10:01:13', '0000-00-00 00:00:00'),
(3, 'Josh', 'josh_123', 'josh@gmail.com', '$2y$10$iRPjpPj69BOUR/wKtJXdVu5EsqQHtWSEsXoKJviihNrGzDhiHrbyy', '2025-05-27 13:16:38', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
