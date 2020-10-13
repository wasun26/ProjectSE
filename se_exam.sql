-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2020 at 09:57 PM
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
-- Database: `se_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `id` int(10) UNSIGNED NOT NULL,
  `sid` varchar(10) NOT NULL,
  `subjectid` varchar(6) NOT NULL,
  `semester` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`id`, `sid`, `subjectid`, `semester`) VALUES
(1, '610510999', '204111', 0),
(2, '610510999', '204100', 0);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(10) NOT NULL,
  `phase` int(10) UNSIGNED NOT NULL,
  `subject` varchar(6) NOT NULL,
  `year` year(4) NOT NULL,
  `semester` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` int(1) NOT NULL,
  `room` varchar(8) NOT NULL,
  `examiner_t` int(10) UNSIGNED DEFAULT NULL,
  `examiner_s` int(10) UNSIGNED DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`id`, `phase`, `subject`, `year`, `semester`, `date`, `time`, `room`, `examiner_t`, `examiner_s`, `status`) VALUES
(1, 1, '204111', 2020, 1, '2020-10-12', 1, 'CSB100-1', 11111, 1, -1),
(2, 1, '204100', 2020, 1, '2020-10-13', 1, 'CSB100-2', 11122, 1, -1),
(12, 1, '204231', 2020, 1, '2020-10-14', 3, 'CSB100-2', 11122, NULL, -1);

-- --------------------------------------------------------

--
-- Table structure for table `phase`
--

CREATE TABLE `phase` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phase`
--

INSERT INTO `phase` (`id`, `name`) VALUES
(1, 'Mid'),
(2, 'Final'),
(3, 'Summer');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `name` varchar(8) NOT NULL,
  `status` int(1) UNSIGNED NOT NULL DEFAULT 1,
  `capacity` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`name`, `status`, `capacity`) VALUES
('CSB100-1', 1, 50),
('CSB100-2', 1, 50);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `id` int(10) UNSIGNED NOT NULL,
  `term` int(1) UNSIGNED NOT NULL,
  `year` int(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id`, `term`, `year`) VALUES
(1, 1, 2563);

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
  `access` int(1) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `fname`, `lname`, `access`, `email`, `password`) VALUES
(610510999, 'นายก', 'สกุล', 3, 'test@cmu.ac.th', '1234');

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
('204100', 'Information Technology and Modern Life', 11122),
('204111', 'Fundamentals of Programming', 11111),
('204112', 'Fundamentals of Programming 2', 11111),
('204113', 'Principles of Computing', 11111),
('204211', 'Object-Oriented Programming', 11111),
('204231', 'Computer Organization and Architecture', 11111),
('204232', 'Computer Networks and Protocols', 11111),
('204251', 'Data Structures', 11111),
('204315', 'Organization of Programming Languages', 11111);

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
-- Dumping data for table `timeexam`
--

INSERT INTO `timeexam` (`id`, `timeStart`, `timeFinish`) VALUES
(1, '08:00:00.00000', '11:00:00.00000'),
(2, '12:00:00.00000', '15:00:00.00000'),
(3, '15:30:00.00000', '18:30:00.00000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `type` int(1) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `type`, `email`, `password`) VALUES
('1', 'เจ้าหน้าที่1', 'นามสกุลเจ้าหน้าที่1', 3, 'staff1@cmu.ac.th', '1111'),
('11111', 'aaa', 'bbb', 2, 'test.t@cmu.ac.th', '1234'),
('11122', 'ccc', 'eee', 2, 'test2.t@cmu.ac.th', '1234'),
('610510999', 'นายก', 'สกุล', 1, 'test@cmu.ac.th', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(1) UNSIGNED NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sid` (`sid`),
  ADD KEY `subjectid` (`subjectid`),
  ADD KEY `semester` (`semester`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room` (`room`),
  ADD KEY `subject` (`subject`),
  ADD KEY `exam_ibfk_2` (`time`),
  ADD KEY `examiner_t` (`examiner_t`),
  ADD KEY `examiner_s` (`examiner_s`),
  ADD KEY `phase` (`phase`),
  ADD KEY `semester` (`semester`);

--
-- Indexes for table `phase`
--
ALTER TABLE `phase`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`name`) USING BTREE;

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`),
  ADD KEY `term` (`term`),
  ADD KEY `year` (`year`);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enroll`
--
ALTER TABLE `enroll`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `phase`
--
ALTER TABLE `phase`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `timeexam`
--
ALTER TABLE `timeexam`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enroll`
--
ALTER TABLE `enroll`
  ADD CONSTRAINT `enroll_ibfk_1` FOREIGN KEY (`subjectid`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enroll_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`room`) REFERENCES `room` (`name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_ibfk_2` FOREIGN KEY (`time`) REFERENCES `timeexam` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_ibfk_3` FOREIGN KEY (`examiner_s`) REFERENCES `staff` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_ibfk_4` FOREIGN KEY (`examiner_t`) REFERENCES `teacher` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_ibfk_6` FOREIGN KEY (`phase`) REFERENCES `phase` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_ibfk_7` FOREIGN KEY (`subject`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_ibfk_8` FOREIGN KEY (`semester`) REFERENCES `semester` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `tid_id` FOREIGN KEY (`tid`) REFERENCES `teacher` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
