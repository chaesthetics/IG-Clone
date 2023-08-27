-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2023 at 03:21 PM
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
(90, '2023-08-27', '21:13:03', NULL, 0x55736572506f7374732f467269747a206a65726f6d652d546f6265732f313639333134313938332e6a7067, 'Fresh start I would like to start this with this fine lady <3 ', 1),
(91, '2023-08-27', '21:15:10', NULL, 0x55736572506f7374732f53656261737469616e2d4572676f2f313639333134323131302e6a7067, 'Now every user must post something right?', 2),
(92, '2023-08-27', '21:16:29', NULL, 0x55736572506f7374732f4b6576696e20427279616e2d44617075672f313639333134323138392e6a7067, 'Let\'s see I got one fine lady too', 3);

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
  `iUserPassword` varchar(100) NOT NULL,
  `profile_picture` varchar(255) NOT NULL DEFAULT 'Images/user.jpg',
  `default_profile_picture` tinyint(1) DEFAULT 1,
  `date_created` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `ifirstname`, `ilastname`, `ibirth_month`, `ibirth_day`, `ibirth_year`, `iUserEmail`, `iUserPassword`, `profile_picture`, `default_profile_picture`, `date_created`) VALUES
(1, 'Fritz jerome', 'Tobes', 'May', 21, 2000, 'Admin@gmail.com', '123', 'Images/☆.jpg', 0, '2023-08-26'),
(2, 'Sebastian', 'Ergo', 'January', 21, 2000, 'Sebastian@gmail.com', 'sebastian123', 'Images/☆☆.jpg', 0, '2023-08-26'),
(3, 'Kevin Bryan', 'Dapug', 'February', 17, 2000, 'Kevin@gmail.com', 'Kevin123', 'Images/user.jpg', 1, '2023-08-26'),
(4, 'Jerome', 'Tobes', 'May', 21, 2000, 'Jerome@gmail.com', 'jerome123', 'Images/user.jpg', 1, '2023-08-26'),
(5, 'Hannah', 'Tobes', 'September', 3, 2001, 'Hannah@gmail.com', '123', 'Images/user.jpg', 1, '2023-08-26'),
(6, 'Irene Joy', 'Tobes', 'June', 28, 2004, 'Irene@gmail.com', 'irene123', 'Images/user.jpg', 1, '2023-08-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userposts`
--
ALTER TABLE `userposts`
  ADD PRIMARY KEY (`post_id`);

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
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
