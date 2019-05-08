-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2019 at 05:48 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `match_info`
--

CREATE TABLE `match_info` (
  `match_name` varchar(15) NOT NULL,
  `Bat1` varchar(20) NOT NULL,
  `Bat2` varchar(20) NOT NULL,
  `Bat3` varchar(20) NOT NULL,
  `Bat4` varchar(20) NOT NULL,
  `WK1` varchar(20) NOT NULL,
  `Bat6` varchar(20) NOT NULL,
  `Bat7` varchar(20) NOT NULL,
  `Bat8` varchar(20) NOT NULL,
  `Bat9` varchar(20) NOT NULL,
  `WK2` varchar(20) NOT NULL,
  `Bow1` varchar(20) NOT NULL,
  `Bow2` varchar(20) NOT NULL,
  `Bow3` varchar(20) NOT NULL,
  `Bow4` varchar(20) NOT NULL,
  `Bow5` varchar(20) NOT NULL,
  `Bow6` varchar(20) NOT NULL,
  `Bow7` varchar(20) NOT NULL,
  `Bow8` varchar(20) NOT NULL,
  `All1` varchar(20) NOT NULL,
  `All2` varchar(20) NOT NULL,
  `All3` varchar(20) NOT NULL,
  `All4` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `p1_team`
--

CREATE TABLE `p1_team` (
  `PhoneNo` bigint(15) NOT NULL,
  `match_name` varchar(20) NOT NULL,
  `WK` varchar(20) NOT NULL,
  `Bat1` varchar(12) NOT NULL,
  `Bat2` varchar(15) NOT NULL,
  `Bat3` varchar(15) NOT NULL,
  `Bat4` varchar(15) NOT NULL,
  `Bow1` varchar(15) NOT NULL,
  `Bow2` varchar(15) NOT NULL,
  `Bow3` varchar(15) NOT NULL,
  `Bow4` varchar(15) NOT NULL,
  `All1` varchar(15) NOT NULL,
  `All2` varchar(15) NOT NULL,
  `Points` int(15) NOT NULL,
  `Captain` varchar(20) DEFAULT NULL,
  `Vice_Captain` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p1_team`
--

INSERT INTO `p1_team` (`PhoneNo`, `match_name`, `WK`, `Bat1`, `Bat2`, `Bat3`, `Bat4`, `Bow1`, `Bow2`, `Bow3`, `Bow4`, `All1`, `All2`, `Points`, `Captain`, `Vice_Captain`) VALUES
(9979271245, 'INDVsAUS', 'Dhoni', 'Rohit', 'Virat', 'Steve', 'Warner', 'Bhuvi', 'Bumrah', 'Shami', 'Ashwin', 'Jadeja', 'Maxwell', 150, 'Dhoni', 'Virat'),
(9999944444, 'INDVsAUS', 'Nevil', 'Steve', 'Warner', 'Khwaja', 'Ricky', 'Shami', 'Ashwin', 'Lyon', 'Zampa', 'Hardik', 'Stoinis', 80, 'Warner', 'Hardik');

-- --------------------------------------------------------

--
-- Table structure for table `reguser`
--

CREATE TABLE `reguser` (
  `Name` varchar(15) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `PhoneNo` bigint(15) NOT NULL,
  `Points` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reguser`
--

INSERT INTO `reguser` (`Name`, `Password`, `Email`, `PhoneNo`, `Points`) VALUES
('Vedang', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'vedang@gmail.com', 8888888888, 50),
('Hardik', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'hardik@gmail.com', 9979271245, 100),
('ronak', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'ronak@gmail.com', 9999944444, 80),
('Harshad', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'harshad@gmail.com', 9999999999, 50);

-- --------------------------------------------------------

--
-- Table structure for table `time_to_expire`
--

CREATE TABLE `time_to_expire` (
  `date_of_expiry` datetime NOT NULL,
  `match_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_to_expire`
--

INSERT INTO `time_to_expire` (`date_of_expiry`, `match_name`) VALUES
('2019-04-12 18:15:00', 'INDVSNZ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `match_info`
--
ALTER TABLE `match_info`
  ADD PRIMARY KEY (`match_name`);

--
-- Indexes for table `p1_team`
--
ALTER TABLE `p1_team`
  ADD PRIMARY KEY (`PhoneNo`),
  ADD UNIQUE KEY `PhoneNo` (`PhoneNo`);

--
-- Indexes for table `reguser`
--
ALTER TABLE `reguser`
  ADD PRIMARY KEY (`PhoneNo`);

--
-- Indexes for table `time_to_expire`
--
ALTER TABLE `time_to_expire`
  ADD PRIMARY KEY (`match_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
