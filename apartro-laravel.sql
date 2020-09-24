-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2020 at 05:02 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apartro-laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartment`
--

CREATE TABLE `apartment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `notice` varchar(255) DEFAULT NULL,
  `adminId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apartment`
--

INSERT INTO `apartment` (`id`, `name`, `description`, `notice`, `adminId`) VALUES
(6, 'Harmony Valley', '299B Baker Street, London', 'This is funny notice for testing purpose onl', 1);

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `descrption` varchar(255) DEFAULT NULL,
  `cost` int(11) NOT NULL,
  `month` varchar(255) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `complains`
--

CREATE TABLE `complains` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `unitId` int(11) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `isResolved` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complains`
--

INSERT INTO `complains` (`id`, `userId`, `unitId`, `description`, `isResolved`) VALUES
(1, 3, 1, 'I am having a problem with my water line ', 1),
(2, 5, 2, 'Gas nai vaai sokal theke -_- ', 0),
(3, 1, 1, 'sdfsdfsdsdfdsf', 0),
(4, 5, 3, 'gdfgfd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `salary` int(11) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `nid` int(11) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `cost` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `description`, `cost`, `userId`) VALUES
(1, 'Lift repair ', 2100, 1),
(2, 'water tank replacement ', 5100, 2);

-- --------------------------------------------------------

--
-- Table structure for table `floors`
--

CREATE TABLE `floors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `floors`
--

INSERT INTO `floors` (`id`, `name`) VALUES
(3, 'Ground Floor'),
(4, 'Second FloorS'),
(7, 'fsd');

-- --------------------------------------------------------

--
-- Table structure for table `tanents`
--

CREATE TABLE `tanents` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `rantedUnit` int(11) DEFAULT NULL,
  `rent` int(11) NOT NULL,
  `nid` int(11) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `floorId` int(11) DEFAULT NULL,
  `ownerId` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `notice` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `floorId`, `ownerId`, `name`, `notice`) VALUES
(1, 3, 2, 'Flat 101', NULL),
(2, 3, 2, 'Flat 102', NULL),
(3, 4, 7, 'New Unit', NULL),
(4, 3, 7, 'etwrte', NULL),
(6, 3, 2, 'tyerstesr', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','owner','tenant','employee') NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `isActive`, `firstName`, `lastName`, `email`, `gender`, `image`, `createdAt`) VALUES
(1, 'admin', 'admin', 'admin', 1, 'Admins', 'Bossss', 'test@test.com', 'male', 'user-admin.png', '2020-08-13 14:37:08'),
(2, 'owner', '$2a$08$y1I/I37ZMbpSmbQqHH3DyOiV1KQBTkv/0VSFqsa78H.dM.CXIGOYi', 'owner', 0, NULL, NULL, NULL, NULL, NULL, '2020-08-13 15:11:24'),
(3, 'tanent', '$2a$08$v3lQnl5fmnabepzigWfG3.p7EZRH76kGLUEKkkNe9IeMVY7RXF026', 'tenant', 0, NULL, NULL, NULL, NULL, NULL, '2020-08-13 15:11:37'),
(5, 'koqovygy', '$2a$08$BpxUPmWVuaMMu2VM1D4tJO7k0aX60EQVDYtyGJRk3su.qzj5g9pgq', 'employee', 1, NULL, NULL, NULL, 'female', NULL, '2020-08-13 15:12:03'),
(7, 'new user', '$2a$08$CnjIuxU90la9dwilkWXPfevSvNg.xogY4ZPWT/Y0g7V1JsKVsrYjO', 'owner', 1, 'New Name', 'test name', 'tset@gmail.com', 'male', NULL, '2020-08-14 03:21:24'),
(8, 'rozely', 'Error recusandae Qu', 'admin', 1, NULL, NULL, 'namonuzyk@mailinator.com', 'female', NULL, '2020-09-07 16:06:50'),
(9, 'qbbScK4SWC', 'uBqEGNxTSA', 'admin', 0, NULL, NULL, 'fH9y7L23WK', 'male', NULL, '2020-09-07 16:07:00');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `unitId` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `entryTime` varchar(255) DEFAULT NULL,
  `exitTime` varchar(255) DEFAULT NULL,
  `entryDate` varchar(255) DEFAULT NULL,
  `exitDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `userId`, `unitId`, `name`, `address`, `phone`, `entryTime`, `exitTime`, `entryDate`, `exitDate`) VALUES
(1, 2, 1, 'tets suername ', 'dhaka bd', '0145522211', '12:40', '1:40', '1-8-2020', '4-8-2020');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartment`
--
ALTER TABLE `apartment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adminId` (`adminId`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `unitId` (`unitId`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `floors`
--
ALTER TABLE `floors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tanents`
--
ALTER TABLE `tanents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `rantedUnit` (`rantedUnit`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD KEY `floorId` (`floorId`),
  ADD KEY `ownerId` (`ownerId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `visitor_ibfk_2` (`unitId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apartment`
--
ALTER TABLE `apartment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complains`
--
ALTER TABLE `complains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `floors`
--
ALTER TABLE `floors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tanents`
--
ALTER TABLE `tanents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apartment`
--
ALTER TABLE `apartment`
  ADD CONSTRAINT `apartment_ibfk_1` FOREIGN KEY (`adminId`) REFERENCES `users` (`id`);

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `complains`
--
ALTER TABLE `complains`
  ADD CONSTRAINT `complains_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `complains_ibfk_2` FOREIGN KEY (`unitId`) REFERENCES `units` (`id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`);

--
-- Constraints for table `tanents`
--
ALTER TABLE `tanents`
  ADD CONSTRAINT `tanents_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tanents_ibfk_2` FOREIGN KEY (`rantedUnit`) REFERENCES `units` (`id`);

--
-- Constraints for table `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `units_ibfk_1` FOREIGN KEY (`floorId`) REFERENCES `floors` (`id`),
  ADD CONSTRAINT `units_ibfk_2` FOREIGN KEY (`ownerId`) REFERENCES `users` (`id`);

--
-- Constraints for table `visitors`
--
ALTER TABLE `visitors`
  ADD CONSTRAINT `visitors_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `visitors_ibfk_2` FOREIGN KEY (`unitId`) REFERENCES `units` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
