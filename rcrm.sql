-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 07, 2021 at 01:02 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rcrm`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `first_name` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_number` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `specialization` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `work_ex_year` int(11) NOT NULL,
  `candidate_dob` int(11) NOT NULL,
  `address` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `resume` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `modified_on` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `first_name`, `last_name`, `email`, `contact_number`, `gender`, `specialization`, `work_ex_year`, `candidate_dob`, `address`, `resume`, `created_on`, `created_by`, `modified_by`, `modified_on`) VALUES
(1, 'swapnil', 'jadhav', 'abc@gmail.com', '9837363527', 1, '1', 9, 1615101111, 'hasdka', '', '2021-03-07 07:12:40', 1, 1, '2021-03-07 00:00:00'),
(2, 'abc', 'xyz', 'xyz@gmail.com', '9827263533', 1, NULL, 9, 590558400, NULL, NULL, '2021-03-07 08:14:30', NULL, NULL, '2021-03-07 08:14:30'),
(3, 'abc', 'xyz', 'xyza@gmail.com', '9827263533', 1, NULL, 9, 590558400, NULL, '6044a08ab8d19_PHPRESUME.docx', '2021-03-07 09:44:42', NULL, NULL, '2021-03-07 09:44:42'),
(4, 'abc', 'xyz', 'xyzsa@gmail.com', '9827263533', 1, NULL, 9, 590558400, NULL, '6044a0ed60162_PHPRESUME.docx', '2021-03-07 09:46:21', NULL, NULL, '2021-03-07 09:46:21'),
(5, 'abc1', 'xyz1', 'xyz1@gmail.com', '9827263533', 1, NULL, 9, 590558400, NULL, '6044b78007fd4_PHPRESUME.docx', '2021-03-07 11:22:40', NULL, NULL, '2021-03-07 11:22:40'),
(6, 'abc1', 'xyz12', 'xyz11@gmail.com', '9827263533', 1, NULL, 9, 590558400, NULL, '6044c88bd108b_PHPRESUME.docx', '2021-03-07 12:35:23', NULL, NULL, '2021-03-07 12:35:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `user_token` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user_token`, `is_active`, `created_on`, `created_by`, `modified_by`, `modified_on`) VALUES
(1, 'rcrmuser', 'rcrmuser@gmail.com', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJsdW1lbi1qd3QiLCJzdWIiOiIxIiwiaWF0IjoxNjE1MTE5NDcyLCJleHAiOjE2MTUxMjMwNzJ9.6iTW5R00942BJu7jkaSlzO-rWpOb4N-_cH5leda0ZuQ', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJsdW1lbi1qd3QiLCJzdWIiOiIxIiwiaWF0IjoxNjE1MTE5NDcyLCJleHAiOjE2MTUxMjMwNzJ9.6iTW5R00942BJu7jkaSlzO-rWpOb4N-_cH5leda0ZuQ', 1, '2021-03-07 05:32:07', 1, 1, '2021-03-07 11:02:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
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
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
