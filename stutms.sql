-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 12, 2025 at 04:34 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stutms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `from_id` int NOT NULL,
  `to_id` int NOT NULL,
  `message` varchar(191) NOT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from_id`, `to_id`, `message`, `status`) VALUES
(1, 1, 4, 'Hi!', 0),
(2, 4, 1, 'Hi Muzaffar', 1),
(3, 2, 1, 'Hi Muzaffar!', 1),
(4, 1, 4, 'Is the Work OK!', 0),
(5, 4, 1, 'SIR!', 1),
(6, 1, 5, 'SIR!!!', 1),
(7, 1, 5, 'gl;iahshgo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int NOT NULL,
  `Test_num` int NOT NULL,
  `Student_id` int NOT NULL,
  `Total_marks` int NOT NULL,
  `Obtained_marks` int NOT NULL,
  `Teacher_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `Test_num`, `Student_id`, `Total_marks`, `Obtained_marks`, `Teacher_id`) VALUES
(1, 1, 1, 150, 45, 1),
(2, 1, 2, 150, 145, 1),
(3, 1, 3, 150, 137, 1),
(4, 2, 1, 50, 10, 1),
(5, 2, 2, 50, 50, 1),
(6, 2, 3, 50, 45, 1),
(7, 3, 1, 25, 5, 1),
(8, 3, 2, 25, 23, 1),
(9, 3, 3, 25, 17, 1),
(10, 1, 1, 25, 7, 4),
(11, 1, 2, 25, 22, 4),
(12, 1, 3, 25, 25, 4);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `Roll_num` int NOT NULL,
  `Name` varchar(191) NOT NULL,
  `Email` varchar(191) NOT NULL,
  `Phone` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`Roll_num`, `Name`, `Email`, `Phone`) VALUES
(1, 'Hamza', 'hamza@example.com', 354645684),
(2, 'Hassam', 'Hassam@example.com', 513641564),
(3, 'Abdullah', 'Abdullah@example.com', 646431654),
(4, 'Danial', 'danial@example.com', 789465);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int NOT NULL,
  `Teacher_name` varchar(191) NOT NULL,
  `Email` varchar(191) NOT NULL,
  `Phone` int NOT NULL,
  `password` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `Teacher_name`, `Email`, `Phone`, `password`) VALUES
(1, 'Sir Muzaffar', 'muzaffar@example.com', 64984798, 'admin'),
(2, 'Mam Maham', 'maham@example.com', 12345678, 'admin'),
(4, 'Mam Sanam', 'sanam@example.com', 789456, 'admin'),
(5, 'Sir Khawar', 'khawar@rekhta.com', 164976352, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Student_id` (`Student_id`),
  ADD KEY `Teacher_id` (`Teacher_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`Roll_num`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `Roll_num` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`Student_id`) REFERENCES `students` (`Roll_num`),
  ADD CONSTRAINT `results_ibfk_2` FOREIGN KEY (`Teacher_id`) REFERENCES `teachers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
