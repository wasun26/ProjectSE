-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2020 at 03:56 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `se`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(10) NOT NULL,
  `phase` varchar(5) NOT NULL,
  `subject` varchar(6) NOT NULL,
  `semester` int(1) UNSIGNED NOT NULL,
  `year` year(4) NOT NULL,
  `date` date NOT NULL,
  `time` int(1) NOT NULL,
  `room` varchar(5) NOT NULL,
  `examiner_t` int(10) UNSIGNED DEFAULT NULL,
  `examiner_s` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `name` varchar(5) NOT NULL,
  `status` int(1) UNSIGNED NOT NULL DEFAULT 1,
  `capacity` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `fname`, `lname`) VALUES
(1, 'เจ้าหน้าที่1', '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `year` int(1) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` varchar(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `tid`) VALUES
('204111', 'Fund', 11111),
('204112', 'Fund2', 11111);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `fname`, `lname`) VALUES
(11111, 'aaa', 'bbb'),
(11122, 'ccc', 'eee');

-- --------------------------------------------------------

--
-- Table structure for table `timeexam`
--

CREATE TABLE `timeexam` (
  `id` int(1) NOT NULL,
  `timeStart` time(5) NOT NULL,
  `timeFinish` time(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room` (`room`),
  ADD KEY `subject` (`subject`),
  ADD KEY `exam_ibfk_2` (`time`),
  ADD KEY `examiner_t` (`examiner_t`),
  ADD KEY `examiner_s` (`examiner_s`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`name`) USING BTREE;

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tid_id` (`tid`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timeexam`
--
ALTER TABLE `timeexam`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timeexam`
--
ALTER TABLE `timeexam`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`room`) REFERENCES `room` (`name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_ibfk_2` FOREIGN KEY (`time`) REFERENCES `timeexam` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_ibfk_3` FOREIGN KEY (`examiner_s`) REFERENCES `staff` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_ibfk_4` FOREIGN KEY (`examiner_t`) REFERENCES `teacher` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `tid_id` FOREIGN KEY (`tid`) REFERENCES `teacher` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
