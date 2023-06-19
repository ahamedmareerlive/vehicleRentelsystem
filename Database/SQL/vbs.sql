-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 04:38 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wp`
--

-- --------------------------------------------------------

--
-- Table structure for table `vbs_booking`
--

CREATE TABLE `vbs_booking` (
  `id` int(11) NOT NULL,
  `vehicleId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `isNeedAc` tinyint(1) NOT NULL,
  `isNeedDriver` tinyint(1) NOT NULL,
  `needFrom` timestamp NOT NULL DEFAULT current_timestamp(),
  `needTo` timestamp NOT NULL DEFAULT current_timestamp(),
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vbs_booking`
--

INSERT INTO `vbs_booking` (`id`, `vehicleId`, `customerId`, `isNeedAc`, `isNeedDriver`, `needFrom`, `needTo`, `create_at`) VALUES
(1, 1, 3, 0, 0, '2023-05-18 14:28:44', '2023-05-24 14:28:44', '2023-05-17 14:29:28');

-- --------------------------------------------------------

--
-- Table structure for table `vbs_subscription`
--

CREATE TABLE `vbs_subscription` (
  `id` int(11) NOT NULL,
  `ownerId` int(11) NOT NULL,
  `amount` float NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `reference` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vbs_subscription`
--

INSERT INTO `vbs_subscription` (`id`, `ownerId`, `amount`, `create_at`, `reference`) VALUES
(1, 2, 1500, '2023-05-17 14:31:02', 'IN10151510616');

-- --------------------------------------------------------

--
-- Table structure for table `vbs_user`
--

CREATE TABLE `vbs_user` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `contact` int(10) NOT NULL,
  `nic` int(12) NOT NULL,
  `userType` int(11) NOT NULL,
  `userName` text NOT NULL,
  `password` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vbs_user`
--

INSERT INTO `vbs_user` (`id`, `name`, `contact`, `nic`, `userType`, `userName`, `password`, `create_at`) VALUES
(1, 'System Admin', 10215151, 102411518, 1, 'admin', 'admin', '2023-05-17 14:24:03'),
(2, 'mareer', 1022515, 1021514, 3, 'mareer', 'mareer', '2023-05-17 14:24:43'),
(3, 'ajaz', 785151, 10510511, 2, 'ajaz', 'ajaz', '2023-05-17 14:25:16');

-- --------------------------------------------------------

--
-- Table structure for table `vbs_vehicle`
--

CREATE TABLE `vbs_vehicle` (
  `id` int(11) NOT NULL,
  `vType` int(11) NOT NULL,
  `seatCount` int(11) NOT NULL,
  `acCharges` float NOT NULL,
  `driverCharges` float NOT NULL,
  `price` float NOT NULL,
  `image` text NOT NULL,
  `ownerId` int(11) NOT NULL,
  `name` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vbs_vehicle`
--

INSERT INTO `vbs_vehicle` (`id`, `vType`, `seatCount`, `acCharges`, `driverCharges`, `price`, `image`, `ownerId`, `name`, `create_at`) VALUES
(1, 1, 5, 200, 1500, 1000, 'https://thumbs.dreamstime.com/b/milky-way-galaxy-stars-space-dust-universe-187894499.jpg', 2, 'Vols Vecan', '2023-05-17 14:27:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `vbs_booking`
--
ALTER TABLE `vbs_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_subscription`
--
ALTER TABLE `vbs_subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_user`
--
ALTER TABLE `vbs_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vbs_vehicle`
--
ALTER TABLE `vbs_vehicle`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `vbs_booking`
--
ALTER TABLE `vbs_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vbs_subscription`
--
ALTER TABLE `vbs_subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vbs_user`
--
ALTER TABLE `vbs_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vbs_vehicle`
--
ALTER TABLE `vbs_vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
