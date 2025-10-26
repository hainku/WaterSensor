-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 26, 2025 at 01:19 AM
-- Server version: 8.0.34
-- PHP Version: 8.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brgy`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblinfo`
--

CREATE TABLE `tblinfo` (
  `id` int NOT NULL,
  `UserID` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `LastName` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `FirstName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `MiddleName` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `ContactNo` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `Address` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `Role` varchar(10) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblinfo`
--

INSERT INTO `tblinfo` (`id`, `UserID`, `LastName`, `FirstName`, `MiddleName`, `ContactNo`, `Address`, `Role`) VALUES
(1, '1001', 'Admin', '', '', '', '', 'admin'),
(2, 'U-251010005425-5CL2z', 'dela cruz', 'juan', 'cruz', '0999999999', 'lipa city', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tblresident`
--

CREATE TABLE `tblresident` (
  `id` int NOT NULL,
  `ResidentID` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `LastName` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `FirstName` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `MiddleName` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `HouseNumber` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `Street` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `Purok` int NOT NULL,
  `ContactNo` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `HouseholdHead` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblresident`
--

INSERT INTO `tblresident` (`id`, `ResidentID`, `LastName`, `FirstName`, `MiddleName`, `HouseNumber`, `Street`, `Purok`, `ContactNo`, `HouseholdHead`) VALUES
(7, 'K-4-uNfYH', 'dela Cruz', 'Juan', 'Cruz', '1A', 'Buboy', 4, '9121111111', 1),
(11, 'K-250929032624-1-U6Xr1', 'dela cruz', 'joan', '', '2', 'street', 1, '9101111111', 1),
(12, 'K-250929033347-4-92mLp', 'Nobi', 'Nobita', 'A', '1A', 'buboy', 4, '91111111', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblthreshold`
--

CREATE TABLE `tblthreshold` (
  `id` int NOT NULL,
  `WaterLevel` float NOT NULL,
  `Status` varchar(15) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblthreshold`
--

INSERT INTO `tblthreshold` (`id`, `WaterLevel`, `Status`) VALUES
(1, 30, ''),
(2, 50, ''),
(3, 80, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `id` int NOT NULL,
  `UserID` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `Username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `Role` varchar(15) COLLATE utf8mb4_general_ci NOT NULL,
  `Status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`id`, `UserID`, `Username`, `Password`, `Role`, `Status`) VALUES
(1, '1001', 'admin', '1234', 'admin', 1),
(4, 'U-251010005425-5CL2z', 'U-251010005425-5CL2z', 'dela cruz', 'user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblwaterlevel`
--

CREATE TABLE `tblwaterlevel` (
  `id` int NOT NULL,
  `WaterLevel` int NOT NULL,
  `ReadingTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblinfo`
--
ALTER TABLE `tblinfo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UserID` (`UserID`);

--
-- Indexes for table `tblresident`
--
ALTER TABLE `tblresident`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ResidentID` (`ResidentID`);

--
-- Indexes for table `tblthreshold`
--
ALTER TABLE `tblthreshold`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UserID` (`UserID`);

--
-- Indexes for table `tblwaterlevel`
--
ALTER TABLE `tblwaterlevel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblinfo`
--
ALTER TABLE `tblinfo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblresident`
--
ALTER TABLE `tblresident`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblthreshold`
--
ALTER TABLE `tblthreshold`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblwaterlevel`
--
ALTER TABLE `tblwaterlevel`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
