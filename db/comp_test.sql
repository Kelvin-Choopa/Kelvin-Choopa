-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2020 at 02:12 PM
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
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `text` varchar(11) NOT NULL,
  `type` varchar(11) NOT NULL,
  `options` text NOT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `text`, `type`, `options`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'muks', 'sdf', 'A,B,C,D', NULL, '2020-05-14 09:21:07', NULL),
(2, 'General', 'General', '', '', '2020-05-14 11:01:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mark_schema`
--

CREATE TABLE `mark_schema` (
  `id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `downloads` bigint(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `question_paper_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `past_papers`
--

CREATE TABLE `past_papers` (
  `id` int(11) NOT NULL,
  `title` int(100) NOT NULL,
  `year` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` int(11) NOT NULL DEFAULT current_timestamp(),
  `mark_schema_id` int(11) NOT NULL,
  `downloads` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `text` varchar(100) NOT NULL,
  `answer_id` int(11) DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `type`, `text`, `answer_id`, `created_by`, `created_at`, `updated_at`) VALUES
(28, 'fds', 'dsf', 1, '1', '2020-05-14 08:54:52', NULL),
(29, 'General', '', 1, '', '2020-05-14 09:33:37', NULL),
(30, 'General', 'brianmuks@gmail.com', 1, '', '2020-05-14 09:34:28', NULL),
(31, 'General', 'brianmuks@gmail.com', 1, '', '2020-05-14 09:35:12', NULL),
(32, 'General', 'brianmuks@gmail.com', 1, '', '2020-05-14 10:56:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL,
  `link` varchar(1000) NOT NULL,
  `downloads` bigint(20) NOT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `grade` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `school` varchar(100) NOT NULL,
  `dob` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `school` varchar(100) NOT NULL,
  `level` int(100) NOT NULL,
  `grade` int(2) NOT NULL,
  `password` varchar(128) NOT NULL,
  `gender` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `dob`, `school`, `level`, `grade`, `password`, `gender`) VALUES
(5, '', 'brian@g.com', '2020-05-01', 'fews', 1, 1, 'c20ad4d76fe97759aa27a0c99bff6710', 'Male'),
(23, 'Brian Mukuka', 'admin@gmail.com', '2020-05-19', 'fews', 12, 1, 'c20ad4d76fe97759aa27a0c99bff6710', 'Male'),
(25, 'Brian Mukuka', 'brianmuks@gmail.com', '2020-05-20', 'fews', 23, 2, '984cefd6d27eb0471fc401a493a4fdff', 'Male'),
(28, 'Brian Mukuka', 'brianmuks@gmail.com2', '2020-05-19', 'fews', 12, 12, '984cefd6d27eb0471fc401a493a4fdff', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mark_schema`
--
ALTER TABLE `mark_schema`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mark_schema`
--
ALTER TABLE `mark_schema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
