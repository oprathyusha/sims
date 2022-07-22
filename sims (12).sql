-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2021 at 06:13 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sims`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `adminName` varchar(20) NOT NULL,
  `userID` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`adminName`, `userID`, `Password`) VALUES
('admin', 'admin@kssem.edu.in', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `USN` varchar(30) NOT NULL,
  `studentName` varchar(50) NOT NULL,
  `semester1` varchar(10) NOT NULL,
  `semester2` varchar(10) NOT NULL,
  `semester3` varchar(10) NOT NULL,
  `semester4` varchar(10) NOT NULL,
  `semester5` varchar(10) NOT NULL,
  `semester6` varchar(10) NOT NULL,
  `semester7` varchar(10) NOT NULL,
  `semester8` varchar(10) NOT NULL,
  `departmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`USN`, `studentName`, `semester1`, `semester2`, `semester3`, `semester4`, `semester5`, `semester6`, `semester7`, `semester8`, `departmentID`) VALUES
('1KG18CS061', 'Nagavaishnavi P', '80', '80', '80', '80', 'NA', 'NA', 'NA', 'NA', 1),
('1KG18CS069', 'Prathyusha O', '80', '80', '80', '80', 'NA', 'NA', 'NA', 'NA', 1),
('1KG18CS079', 'Poorvika J', '80', '80', '80', '80', 'NA', 'NA', 'NA', 'NA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentID` int(11) NOT NULL,
  `departmentName` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentID`, `departmentName`) VALUES
(1, 'Computer science engineering'),
(2, 'Electronics and communication');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `USN` varchar(30) NOT NULL,
  `sgpa1` varchar(10) NOT NULL,
  `sgpa2` varchar(10) NOT NULL,
  `sgpa3` varchar(10) NOT NULL,
  `sgpa4` varchar(10) NOT NULL,
  `sgpa5` varchar(10) NOT NULL,
  `sgpa6` varchar(10) NOT NULL,
  `sgpa7` varchar(10) NOT NULL,
  `sgpa8` varchar(10) NOT NULL,
  `departmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`USN`, `sgpa1`, `sgpa2`, `sgpa3`, `sgpa4`, `sgpa5`, `sgpa6`, `sgpa7`, `sgpa8`, `departmentID`) VALUES
('1KG18CS061', '8.5', '8.6', '8.7', '9', 'NA', 'NA', 'NA', 'NA', 1),
('1KG18CS069', '7.85', '8.35', '8.58', '9.0', 'NA', 'NA', 'NA', 'NA', 1),
('1KG18CS079', '8', '8', '8', '8', 'NA', 'NA', 'NA', 'NA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `USN` varchar(20) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(10) DEFAULT NULL,
  `phoneNumber` int(10) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `semester` int(11) NOT NULL,
  `userID` varchar(20) DEFAULT NULL,
  `studentLoginID` varchar(20) DEFAULT NULL,
  `departmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`USN`, `firstName`, `lastName`, `phoneNumber`, `email`, `DOB`, `semester`, `userID`, `studentLoginID`, `departmentID`) VALUES
('1KG18CS061', 'Nagavaishnavi', 'P', 987654321, 'vaishnavigupta@gmail.com', '2000-06-03', 5, 'admin@kssem.edu.in', '1KG18CS061', 1),
('1KG18CS069', 'Prathyusha', 'O', 1234567890, 'oprathyusha23@gmail.com', '2000-05-23', 5, 'admin@kssem.edu.in', '1KG18CS069', 1),
('1KG18CS079', 'Poorvika', 'J', 1234567890, 'poorvikagowda@gmail.com', '2000-08-31', 5, 'admin@kssem.edu.in', '1KG18CS079', 1);

-- --------------------------------------------------------

--
-- Table structure for table `studentlogin`
--

CREATE TABLE `studentlogin` (
  `USN` varchar(30) NOT NULL,
  `studentLoginID` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentlogin`
--

INSERT INTO `studentlogin` (`USN`, `studentLoginID`, `password`) VALUES
('1KG18CS061', '1KG18CS061', 'password'),
('1KG18CS069', '1KG18CS069', 'Password'),
('1KG18CS079', '1KG18CS079', 'password'),
('1KG18CS083', '1KG18CS083', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`USN`),
  ADD KEY `departmentID` (`departmentID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentID`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`USN`),
  ADD KEY `departmentID` (`departmentID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD KEY `userID` (`userID`),
  ADD KEY `studentLoginID` (`studentLoginID`),
  ADD KEY `student_ibfk_3` (`departmentID`);

--
-- Indexes for table `studentlogin`
--
ALTER TABLE `studentlogin`
  ADD PRIMARY KEY (`studentLoginID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`departmentID`) REFERENCES `department` (`departmentID`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`departmentID`) REFERENCES `department` (`departmentID`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `adminlogin` (`userID`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`studentLoginID`) REFERENCES `studentlogin` (`studentLoginID`),
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`departmentID`) REFERENCES `department` (`departmentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
