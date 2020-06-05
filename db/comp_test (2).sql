-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2020 at 07:26 PM
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
(2, 'General', 'General', '', '', '2020-05-14 11:01:24', NULL),
(3, 'A', 'A', '', '', '2020-05-19 03:04:35', NULL),
(4, 'B', 'B', '', '', '2020-05-19 03:05:37', NULL),
(5, 'General', 'General', '', '', '2020-05-28 09:25:54', NULL),
(6, 'General', 'General', '', '', '2020-05-28 09:25:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mark_schema`
--

CREATE TABLE `mark_schema` (
  `id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` varchar(1000) NOT NULL,
  `downloads` bigint(20) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `link` varchar(1000) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `level` varchar(100) NOT NULL DEFAULT 'junior'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mark_schema`
--

INSERT INTO `mark_schema` (`id`, `year`, `description`, `created_at`, `created_by`, `downloads`, `title`, `link`, `month`, `level`) VALUES
(1, 2016, 'Zapf to social green', '2020-05-19 02:27:01', '', NULL, 'Mouse', '387543.pdf', 0, 'junior'),
(2, 2017, 'Zapf to social green', '2020-05-19 02:27:01', 'Brian Mukuka', NULL, 'Mouse', '387543.pdf', 0, 'senior'),
(3, 2021, 'zz', '2020-05-29 10:52:47', 'Brian Mukuka', NULL, 'Mouse m', '437653.pdf', 1, 'senior');

-- --------------------------------------------------------

--
-- Table structure for table `past_papers`
--

CREATE TABLE `past_papers` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `updated_at` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `mark_schema_id` int(11) DEFAULT NULL,
  `downloads` bigint(20) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `link` varchar(1000) NOT NULL,
  `level` varchar(100) NOT NULL DEFAULT 'junior'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `past_papers`
--

INSERT INTO `past_papers` (`id`, `title`, `year`, `subject`, `created_by`, `updated_at`, `created_at`, `mark_schema_id`, `downloads`, `month`, `description`, `link`, `level`) VALUES
(1, 'Mouse', 2016, NULL, '', NULL, '2020-05-19 02:12:11', NULL, NULL, 2, 'Zapf to social green', '817305.pdf', 'junior'),
(2, 'asdf', 2016, NULL, '', NULL, '2020-05-19 02:17:18', NULL, NULL, 1, 'Zapf to social green', '866237.pdf', 'junior'),
(3, 'Mouse', 2016, NULL, '', NULL, '2020-05-19 02:20:56', NULL, NULL, 0, 'Zapf to social green', '786737.pdf', 'junior'),
(4, 'Mouse', 2016, NULL, '', NULL, '2020-05-19 02:25:56', NULL, NULL, 0, 'Zapf to social green', '514956.pdf', 'junior'),
(5, 'Mouse', 2016, NULL, 'Brian Mukuka', NULL, '2020-05-29 10:46:49', NULL, NULL, 0, 'Zapf to social green', '204515.pdf', 'junior'),
(6, 'Mouse', 2016, NULL, 'Brian Mukuka', NULL, '2020-05-29 10:50:18', NULL, NULL, 0, 'Zapf to social green', '252423.pdf', 'junior'),
(7, 'Mouse', 2016, NULL, '', NULL, '2020-05-29 10:50:42', NULL, NULL, 0, 'Zapf to social green', '226780.pdf', 'junior'),
(8, 'focus me', 2020, NULL, 'Brian Mukuka', NULL, '2020-05-29 10:51:54', NULL, NULL, 3, 'focus focus focus focus', '226780.pdf', 'junior'),
(9, 'Mouse', 2016, NULL, 'Brian Mukuka', NULL, '2020-06-05 14:26:10', NULL, NULL, 0, 'sdgsf', '226780.pdf', 'senior');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `text` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NULL,
  `a` varchar(1000) DEFAULT NULL,
  `b` varchar(1000) DEFAULT NULL,
  `c` varchar(1000) DEFAULT NULL,
  `d` varchar(1000) DEFAULT NULL,
  `answer` varchar(1000) NOT NULL,
  `level` varchar(100) NOT NULL DEFAULT 'junior'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `type`, `text`, `created_by`, `created_at`, `updated_at`, `a`, `b`, `c`, `d`, `answer`, `level`) VALUES
(53, 'true-false', 'What is php ', '', '2020-06-01 11:41:43', NULL, '', '', '', '', 'false', 'junior'),
(54, 'one-word', 'What is php ', '', '2020-06-05 12:51:26', NULL, '', '', '', '', 'false', 'junior'),
(55, 'multiple-choice', 'What is php ', '', '2020-06-05 12:51:39', NULL, '', '', '', '', 'false', 'junior'),
(56, 'multiple-choice', 'What is php ', '', '2020-06-05 12:51:49', NULL, '', '', '', '', 'false', 'junior'),
(57, 'one-word', 'What is php ', '', '2020-06-05 12:52:00', NULL, '', '', '', '', 'false', 'junior'),
(58, 'true-false', 'What is php ', '', '2020-06-05 12:52:06', NULL, '', '', '', '', 'false', 'junior'),
(59, 'one-word', 'What is php ', '', '2020-06-05 17:00:44', NULL, '', '', '', '', 'false', 'junior'),
(60, 'one-word', 'What is php ', '', '2020-06-05 17:01:05', NULL, '', '', '', '', 'false', 'junior'),
(61, 'one-word', 'What is php ', '', '2020-06-05 17:01:53', NULL, '', '', '', '', 'false', 'junior'),
(62, 'one-word', 'What is php ', '', '2020-06-05 17:05:19', NULL, '', '', '', '', 'false', 'junior'),
(63, 'one-word', 'What is php ', '', '2020-06-05 17:05:32', NULL, '', '', '', '', 'false', 'junior');

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
  `downloads` bigint(20) DEFAULT 0,
  `created_by` varchar(100) DEFAULT NULL,
  `description` varchar(1000) NOT NULL,
  `level` varchar(100) NOT NULL DEFAULT 'junior'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `title`, `type`, `created_at`, `updated_at`, `link`, `downloads`, `created_by`, `description`, `level`) VALUES
(8, 'asdf', 'pdf', '2020-05-19 01:01:19', NULL, '420372.pdf', 0, NULL, '', 'junior'),
(9, 'Mouse', 'mp4', '2020-05-19 01:07:07', NULL, '230327.mp4', 0, NULL, 'dsa;kfjas;kfjasd;lkfj;sadklmfasd;lfkasdl/', 'junior'),
(10, 'Mouse', 'png', '2020-05-19 01:13:40', NULL, '910199.png', 0, NULL, '', 'junior'),
(11, 'Mouse', 'png', '2020-05-19 01:16:45', NULL, '576582.png', 0, NULL, '', 'junior'),
(12, 'Mouse', 'pdf', '2020-05-19 02:03:40', NULL, '970863.pdf', 0, '', '', 'junior'),
(13, 'asdf', 'pdf', '2020-05-19 02:06:52', NULL, '996192.pdf', 0, '', '', 'junior'),
(14, 'Mouse', 'pdf', '2020-05-29 12:01:32', NULL, '737547.pdf', 0, '', 'kjkpllk', 'junior'),
(15, 'Intro to Computer', 'mp4', '2020-05-29 12:02:34', NULL, '661793.mp4', 0, '', 'Intro to ComputerIntro to Computer', 'junior'),
(16, 'Zapf to social green', 'png', '2020-06-05 10:54:41', NULL, '196250.png', 0, '', 'Zapf to social green', 'level'),
(17, 'Mouse', 'png', '2020-06-05 12:45:41', NULL, '388277.png', 0, '', 'Zapf to social green', 'level'),
(18, 'Mouse', 'png', '2020-06-05 12:46:53', NULL, '791590.png', 0, '', 'Zapf to social green', 'junior'),
(19, '', '', '2020-06-05 14:19:35', NULL, '', 0, 'Brian Mukuka', '', '');

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
  `level` int(100) DEFAULT NULL,
  `grade` int(2) NOT NULL,
  `password` varchar(128) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `dob`, `school`, `level`, `grade`, `password`, `gender`, `role`) VALUES
(5, '', 'brian@g.com', '2020-05-01', 'fews', 1, 1, 'c20ad4d76fe97759aa27a0c99bff6710', 'Male', 'student'),
(23, 'Brian Mukuka', 'admin@gmail.com', '2020-05-19', 'fews', 12, 1, 'c20ad4d76fe97759aa27a0c99bff6710', 'Male', 'student'),
(25, 'Brian Mukuka', 'brianmuks@gmail.com', '2020-05-20', 'fews', 23, 2, '984cefd6d27eb0471fc401a493a4fdff', 'Male', 'admin'),
(28, 'Brian Mukuka', 'brianmuks@gmail.com2', '2020-05-19', 'fews', 12, 12, '984cefd6d27eb0471fc401a493a4fdff', 'Male', 'student'),
(29, 'Brian Mukuka', 'brianmuks@gmail.com4', '2020-05-12', 'fews', NULL, 8, 'c20ad4d76fe97759aa27a0c99bff6710', 'Male', 'student');

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
-- Indexes for table `past_papers`
--
ALTER TABLE `past_papers`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mark_schema`
--
ALTER TABLE `mark_schema`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `past_papers`
--
ALTER TABLE `past_papers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
