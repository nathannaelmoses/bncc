-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2025 at 04:44 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `mskaryawan`
--

CREATE TABLE `mskaryawan` (
  `KaryawanId` int(11) NOT NULL,
  `KaryawanName` varchar(251) DEFAULT NULL,
  `KaryawanAge` int(11) DEFAULT NULL,
  `KaryawanAddress` varchar(251) DEFAULT NULL,
  `KaryawanTelp` varchar(251) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mskaryawan`
--

INSERT INTO `mskaryawan` (`KaryawanId`, `KaryawanName`, `KaryawanAge`, `KaryawanAddress`, `KaryawanTelp`) VALUES
(5, 'testdulugasih', 30, 'awdawddadwadawdwa', '08128212323');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Username`, `Password`) VALUES
(10, 'moses@moses', 'a'),
(11, 'aaaaaa@gmail.com', 'a'),
(12, 'nathanael.moses@binus.ac.id', 'err'),
(14, 'weqweq@q', 'q'),
(15, 'test@ad', 'ad'),
(16, 'aawd@a', 'A'),
(17, 'reynard@Amadeus', 'rey'),
(18, 'es25-1@es25-1', 'es25-1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mskaryawan`
--
ALTER TABLE `mskaryawan`
  ADD PRIMARY KEY (`KaryawanId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mskaryawan`
--
ALTER TABLE `mskaryawan`
  MODIFY `KaryawanId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
