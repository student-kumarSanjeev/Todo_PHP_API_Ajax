-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 30, 2025 at 08:15 AM
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
-- Table structure for table `todo_data`
--

CREATE TABLE `todo_data` (
  `id` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `description` varchar(350) NOT NULL,
  `priority` enum('high','medium','low') NOT NULL,
  `is_completed` varchar(100) NOT NULL,
  `due_date` datetime NOT NULL DEFAULT current_timestamp(),
  `upldatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `todo_data`
--

INSERT INTO `todo_data` (`id`, `title`, `description`, `priority`, `is_completed`, `due_date`, `upldatedAt`) VALUES
(1, 'todo1', 'first todo item', 'high', '0', '2025-05-27 13:53:08', '2025-05-27 10:00:28'),
(2, 'Test', 'test ljasdflj ', 'high', '0', '2025-05-27 15:29:06', '0000-00-00 00:00:00'),
(3, 'Test2', 'test 2 description', 'medium', '1', '2025-05-27 15:31:06', '2025-05-27 10:01:53'),
(4, 'asdfasdf', 'asdfsadf', 'high', '0', '2025-05-27 15:38:02', '0000-00-00 00:00:00'),
(5, 'asdasdf', 'adsfasf', 'low', '0', '2025-05-27 15:43:31', '0000-00-00 00:00:00'),
(6, 'asdasdf', 'adsfasf', 'low', '0', '2025-05-27 15:44:40', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todo_data`
--
ALTER TABLE `todo_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todo_data`
--
ALTER TABLE `todo_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
