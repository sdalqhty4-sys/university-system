-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2022 at 02:43 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `col`
--

CREATE TABLE `col` (
  `Col_No` int(11) NOT NULL,
  `Col_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `col`
--

INSERT INTO `col` (`Col_No`, `Col_Name`) VALUES
(1, 'Computer Sciences and information'),
(2, 'Computer Center'),
(3, 'Education');

-- --------------------------------------------------------

--
-- Table structure for table `depart`
--

CREATE TABLE `depart` (
  `Dep_No` int(11) NOT NULL,
  `Col_No` int(11) NOT NULL,
  `Dep_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `depart`
--

INSERT INTO `depart` (`Dep_No`, `Col_No`, `Dep_Name`) VALUES
(1, 1, 'IT'),
(2, 1, 'CS'),
(3, 2, 'Network'),
(4, 2, 'Graphics'),
(5, 3, 'English');

-- --------------------------------------------------------

--
-- Table structure for table `st`
--

CREATE TABLE `st` (
  `St_No` int(11) NOT NULL,
  `Col_No` int(11) NOT NULL,
  `Dep_No` int(11) NOT NULL,
  `St_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `st`
--

INSERT INTO `st` (`St_No`, `Col_No`, `Dep_No`, `St_Name`) VALUES
(1, 1, 1, 'Ahmed Ali'),
(2, 1, 1, 'Mohammed'),
(3, 1, 2, 'Sami'),
(4, 1, 2, 'Salwa'),
(5, 2, 3, 'Saif'),
(6, 2, 3, 'Murad'),
(7, 2, 4, 'Abdulaziz'),
(8, 2, 4, 'Faisal'),
(9, 3, 5, 'Amal'),
(10, 3, 5, 'Abeer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `col`
--
ALTER TABLE `col`
  ADD PRIMARY KEY (`Col_No`);

--
-- Indexes for table `depart`
--
ALTER TABLE `depart`
  ADD PRIMARY KEY (`Dep_No`);

--
-- Indexes for table `st`
--
ALTER TABLE `st`
  ADD PRIMARY KEY (`St_No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `col`
--
ALTER TABLE `col`
  MODIFY `Col_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `depart`
--
ALTER TABLE `depart`
  MODIFY `Dep_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `st`
--
ALTER TABLE `st`
  MODIFY `St_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
