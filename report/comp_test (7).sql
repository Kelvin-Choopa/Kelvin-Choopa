-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2020 at 08:21 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comp_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `resources_report`
--

CREATE TABLE `resources_report` (
  `id` int(11) NOT NULL,
  `resource_id` int(11) NOT NULL,
  `country` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `type` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resources_report`
--

INSERT INTO `resources_report` (`id`, `resource_id`, `country`, `district`, `province`, `user_id`, `created_at`, `type`) VALUES
(6, 1, 'Zambia', 'Lusaka', 'Lusaka', 25, '2020-06-25 06:12:51', ''),
(7, 1, 'Zambia', 'Lusaka', 'Lusaka', 25, '2020-06-25 06:14:00', 'mark_schema'),
(8, 12, 'Zambia', 'Lusaka', 'Lusaka', 25, '2020-06-25 06:15:14', 'pdf'),
(9, 8, 'Zambia', 'Lusaka', 'Lusaka', 25, '2020-06-25 06:15:37', 'past_papers');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `resources_report`
--
ALTER TABLE `resources_report`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `resources_report`
--
ALTER TABLE `resources_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
