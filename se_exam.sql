-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2020 at 04:29 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

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
  `semester` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`id`, `sid`, `subjectid`, `semester`) VALUES
(3, '610510809', '204321', 1);

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `id` int(10) NOT NULL,
  `phase` int(10) UNSIGNED NOT NULL,
  `subject` varchar(6) NOT NULL,
  `year` year(4) NOT NULL,
  `semester` int(1) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time` int(1) NOT NULL,
  `room` varchar(8) NOT NULL,
  `examiner_t` varchar(10) DEFAULT NULL,
  `examiner_s` varchar(10) DEFAULT NULL,
  `ownerID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(2, 'Final');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `name` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`name`) VALUES
('CS201'),
('CS202'),
('CS203'),
('CS207'),
('CS209'),
('CS210'),
('CS301'),
('CS302'),
('CS303'),
('CS307'),
('CS308'),
('CSB100-1'),
('CSB100-2');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `term` int(1) UNSIGNED NOT NULL,
  `year` int(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`term`, `year`) VALUES
(1, 2020),
(2, 2020),
(3, 2020);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` varchar(6) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tid` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `tid`) VALUES
('204101', 'Introduction to Computer', 'T1'),
('204202', 'Information Technology II', 'T3'),
('204211', 'Object-Oriented Programming', 'T3'),
('204321', 'Database System 1', 'T2'),
('204361', 'Software Engineering ', 'T1'),
('204362', 'Object-Oriented Design', 'T1'),
('204422', 'Data Warehousing', 'T2'),
('204490', 'Research in Computer Science', 'T1');

-- --------------------------------------------------------

--
-- Table structure for table `timeexam`
--

CREATE TABLE `timeexam` (
  `id` int(1) NOT NULL,
  `timeStart` time NOT NULL,
  `timeFinish` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timeexam`
--

INSERT INTO `timeexam` (`id`, `timeStart`, `timeFinish`) VALUES
(1, '08:00:00', '11:00:00'),
(2, '12:00:00', '15:00:00'),
(3, '15:30:00', '18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `access` int(1) UNSIGNED DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `access`, `email`, `password`) VALUES
('610510665', 'นายภูริภัทร', 'สิวะโภไคยกุล', 1, 'Puripat.si@cmu.ac.th', 'Puripat'),
('610510710', 'นายสหัสวรรษ', 'ปัญจขันธ์', 1, 'sahassawas_panjakan@cmu.ac.th', 'sahassawas'),
('610510803', 'นายธเนศ ', 'สิงห์ลอ', 1, 'Tanad_s@cmu.ac.th', 'Tanad'),
('610510809', 'นายวสันต์ ', 'แพทย์รัตน์', 3, 'wasun_pa@cmu.ac.th', '1111'),
('610510815', 'นายสิทธา', 'สินประสาธน์', 1, 'sittha_sinprasat@cmu.ac.th', 'sittha'),
('S1', 'นางสาววราภรณ์', 'อินสม', 3, 'insom.waraporn@cmu.ac.th', 'insom'),
('T1', 'ผู้ช่วยศาสตราจารย์ ดร.วัชรี', 'จำปามูล', 2, 'wjumpa@cmu.ac.th', 'wjumpa'),
('T2', 'ผู้ช่วยศาสตราจารย์ ดร.ดุษฎี', ' ประเสริฐธิติพงษ์', 2, 'dussadee.p@cmu.ac.th', 'dussadee'),
('T3', 'ผู้ช่วยศาสตราจารย์ ดร.เมทินี ', 'เขียวกันยะ', 2, 'matinee.k@cmu.ac.th', 'matinee');

-- --------------------------------------------------------

--
-- Table structure for table `user_access`
--

CREATE TABLE `user_access` (
  `id` int(1) UNSIGNED NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access`
--

INSERT INTO `user_access` (`id`, `name`) VALUES
(1, 'Student'),
(2, 'Teacher'),
(3, 'Staff');

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
  ADD KEY `phase` (`phase`),
  ADD KEY `examiner_t` (`examiner_t`),
  ADD KEY `examiner_s` (`examiner_s`),
  ADD KEY `time` (`time`),
  ADD KEY `ownerID` (`ownerID`),
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
  ADD PRIMARY KEY (`term`),
  ADD KEY `year` (`year`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tid` (`tid`);

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
  ADD KEY `access` (`access`);

--
-- Indexes for table `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enroll`
--
ALTER TABLE `enroll`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phase`
--
ALTER TABLE `phase`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `timeexam`
--
ALTER TABLE `timeexam`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_access`
--
ALTER TABLE `user_access`
  MODIFY `id` int(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enroll`
--
ALTER TABLE `enroll`
  ADD CONSTRAINT `enroll_ibfk_1` FOREIGN KEY (`subjectid`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enroll_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `enroll_ibfk_3` FOREIGN KEY (`semester`) REFERENCES `semester` (`term`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `exam`
--
ALTER TABLE `exam`
  ADD CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`room`) REFERENCES `room` (`name`) ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_ibfk_10` FOREIGN KEY (`examiner_t`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_ibfk_11` FOREIGN KEY (`examiner_s`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_ibfk_12` FOREIGN KEY (`ownerID`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_ibfk_13` FOREIGN KEY (`semester`) REFERENCES `semester` (`term`) ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_ibfk_6` FOREIGN KEY (`phase`) REFERENCES `phase` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_ibfk_7` FOREIGN KEY (`subject`) REFERENCES `subject` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `exam_ibfk_9` FOREIGN KEY (`time`) REFERENCES `timeexam` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`tid`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`access`) REFERENCES `user_access` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
