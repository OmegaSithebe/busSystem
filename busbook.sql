-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2021 at 08:59 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `busbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studID` int(11) NOT NULL,
  `studName` text NOT NULL,
  `studSurname` text NOT NULL,
  `studNo` text NOT NULL,
  `studEmail` text NOT NULL,
  `studGender` text NOT NULL,
  `studPassword` text NOT NULL,
  `campusName` text NOT NULL,
  `facultyName` text NOT NULL,
  `studAltE` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studID`, `studName`, `studSurname`, `studNo`, `studEmail`, `studGender`, `studPassword`, `campusName`, `facultyName`, `studAltE`) VALUES
(23, 'Simphiwe', 'Mthanti', '216599390', '216599390@tut4life.ac.za', 'Male', '$2y$10$uZwrMnhV4JNdThdebwm58OIT92UqMq0SIqiZTzwnFIhkKTQoCIpq2', 'Soshanguve South Campus', 'Faculty of Information and Communication Technology', ''),
(24, 'Omega', 'Sithebe', '216321774', '216321774@tut4life.ac.za', 'Male', '$2y$10$lHnnn8AalVhylqndcHkIMe/ngdWZSpcvQzGIE4s8pfjXvAmruxiLC', 'Em​alahleni Campus', 'Faculty of Information and Communication Technology', ''),
(25, 'Minenhle', 'Mbatha', '216321775', '216321775@tut4life.ac.za', 'Female', '$2y$10$Br9HsmNFKvUWqWmmyxRC9.OZB8EIH0adxG2iTk9dw0ApQzWhY1IfG', 'Ga-Rankuwa Campus', 'Faculty of Economics and Finance', '');

-- --------------------------------------------------------

--
-- Table structure for table `tripbook`
--

CREATE TABLE `tripbook` (
  `tripID` int(11) NOT NULL,
  `tripName` text NOT NULL,
  `tripTime` text NOT NULL,
  `studID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tripbook`
--

INSERT INTO `tripbook` (`tripID`, `tripName`, `tripTime`, `studID`) VALUES
(64, 'Soshanguve North Campus to Soshanguve South Campus', '10:30', 23),
(66, 'Arcadia Campus to Pretoria Campus', '10:00', 24),
(67, 'Arcadia Campus to Pretoria Campus', '10:00', 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studID`);

--
-- Indexes for table `tripbook`
--
ALTER TABLE `tripbook`
  ADD PRIMARY KEY (`tripID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tripbook`
--
ALTER TABLE `tripbook`
  MODIFY `tripID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
