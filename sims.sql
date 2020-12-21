-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2020 at 03:24 PM
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
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `USN` varchar(20) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(10) DEFAULT NULL,
  `phoneNumber` int(11) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `userID` varchar(20) DEFAULT NULL,
  `studentLoginID` varchar(20) DEFAULT NULL,
  `departmentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`USN`, `firstName`, `lastName`, `phoneNumber`, `email`, `DOB`, `userID`, `studentLoginID`, `departmentID`) VALUES
('1KG18CS069', 'Prathyusha', 'O', 0, 'oprathyusha23@gmail.', '2000-05-23', 'admin@kssem.edu.in', '1KG18CS069', 1),
('1KG18CS069', 'Prathyusha', 'O', 0, 'oprathyusha23@gmail.', '2000-05-23', 'admin@kssem.edu.in', '1KG18CS069', 1),
('1', 'p', 'o', 99, 'p', '0000-00-00', 'admin@kssem.edu.in', '1KG18CS069', 1),
('1', 'p', 'o', 99, 'p', '0000-00-00', 'admin@kssem.edu.in', '1KG18CS069', 1);

-- --------------------------------------------------------

--
-- Table structure for table `studentlogin`
--

CREATE TABLE `studentlogin` (
  `studentLoginID` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studentlogin`
--

INSERT INTO `studentlogin` (`studentLoginID`, `password`) VALUES
('1KG18CS069', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD KEY `userID` (`userID`),
  ADD KEY `studentLoginID` (`studentLoginID`);

--
-- Indexes for table `studentlogin`
--
ALTER TABLE `studentlogin`
  ADD PRIMARY KEY (`studentLoginID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `adminlogin` (`userID`),
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`studentLoginID`) REFERENCES `studentlogin` (`studentLoginID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
