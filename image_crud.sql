-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2023 at 02:10 PM
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
-- Database: `image_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `userposts`
--

CREATE TABLE `userposts` (
  `post_id` int(11) NOT NULL,
  `post_created` date DEFAULT current_timestamp(),
  `time_posted` time DEFAULT current_timestamp(),
  `image_post_id` int(11) DEFAULT NULL,
  `image_post` longblob DEFAULT NULL,
  `text_post` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userposts`
--

INSERT INTO `userposts` (`post_id`, `post_created`, `time_posted`, `image_post_id`, `image_post`, `text_post`, `user_id`) VALUES
(66, '2023-08-13', '15:31:34', NULL, 0x55736572506f7374732f53656261737469616e2d4572676f2f313639313931313839342e6a706567, 'Test 1', 2),
(67, '2023-08-13', '15:31:40', NULL, 0x2f547769747465722f5068705f666f726d61742f736176652e706870, 'Test 2', 2),
(68, '2023-08-13', '15:31:47', NULL, 0x2f547769747465722f5068705f666f726d61742f736176652e706870, 'Test 3', 2),
(69, '2023-08-13', '15:34:05', NULL, 0x55736572506f7374732f53656261737469616e2d4572676f2f313639313931323034352e6a706567, 'Test 4', 2),
(70, '2023-08-13', '15:35:50', NULL, 0x55736572506f7374732f467269747a206a65726f6d652d546f6265732f313639313931323135302e6a7067, 'Test 5', 1),
(71, '2023-08-13', '15:47:22', NULL, 0x55736572506f7374732f467269747a206a65726f6d652d546f6265732f313639313931323834322e6a7067, 'Test 6', 1),
(72, '2023-08-13', '15:49:44', NULL, 0x55736572506f7374732f467269747a206a65726f6d652d546f6265732f313639313931323938342e6a7067, 'Test 7', 1),
(73, '2023-08-13', '16:01:05', NULL, 0x55736572506f7374732f467269747a206a65726f6d652d546f6265732f313639313931333636352e6a7067, 'Test 8', 1),
(74, '2023-08-13', '16:02:50', NULL, 0x55736572506f7374732f467269747a206a65726f6d652d546f6265732f313639313931333737302e6a7067, 'Test 9', 1),
(75, '2023-08-13', '16:09:34', NULL, 0x55736572506f7374732f53656261737469616e2d4572676f2f313639313931343137342e6a7067, '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `ifirstname` varchar(50) NOT NULL,
  `ilastname` varchar(50) NOT NULL,
  `ibirth_month` text DEFAULT NULL,
  `ibirth_day` int(11) DEFAULT NULL,
  `ibirth_year` int(11) DEFAULT NULL,
  `iUserEmail` varchar(100) NOT NULL,
  `iUserPassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `ifirstname`, `ilastname`, `ibirth_month`, `ibirth_day`, `ibirth_year`, `iUserEmail`, `iUserPassword`) VALUES
(1, 'Fritz jerome', 'Tobes', 'May', 21, 2000, 'Admin@gmail.com', '123'),
(2, 'Sebastian', 'Ergo', 'January', 21, 2000, 'Sebastian@gmail.com', 'sebastian123'),
(3, 'Kevin Bryan', 'Dapug', 'February', 17, 2000, 'Kevin@gmail.com', 'Kevin123'),
(4, 'Jerome', 'Tobes', 'May', 21, 2000, 'Jerome@gmail.com', 'jerome123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userposts`
--
ALTER TABLE `userposts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UserEmail` (`iUserEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userposts`
--
ALTER TABLE `userposts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `userposts`
--
ALTER TABLE `userposts`
  ADD CONSTRAINT `userposts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
