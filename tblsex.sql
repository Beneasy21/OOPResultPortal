-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 05:12 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fameschool`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblsex`
--

CREATE TABLE `tblsex` (
  `sexId` int(11) NOT NULL,
  `longName` varchar(11) NOT NULL,
  `shortName` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsex`
--

INSERT INTO `tblsex` (`sexId`, `longName`, `shortName`) VALUES
(1, 'Male', 'M'),
(2, 'Female', 'F'),
(5, 'Masculine', 'Mas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblsex`
--
ALTER TABLE `tblsex`
  ADD PRIMARY KEY (`sexId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblsex`
--
ALTER TABLE `tblsex`
  MODIFY `sexId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
