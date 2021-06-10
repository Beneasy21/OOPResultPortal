-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 05:18 PM
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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `hashed_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `username`, `hashed_password`) VALUES
(2, 'Benjamin', 'Sule', 'ban@ban.com', 'Bannie21', '$2y$10$6e9Zv/2tODdOE4Yn0xtAsepTXD7FxxEeySAY4SLMcxVeUavhSV2Da');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `studId` varchar(15) NOT NULL,
  `studName` varchar(40) NOT NULL,
  `sex` varchar(11) NOT NULL,
  `currentClass` varchar(11) NOT NULL,
  `arm` varchar(20) NOT NULL,
  `studImage` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `studId`, `studName`, `sex`, `currentClass`, `arm`, `studImage`) VALUES
(1, '1', 'Abu Emmanuel', 'M', '2', '1', NULL),
(2, '2', 'Achimi Grace Ojochogwu', 'F', '2', '1', NULL),
(3, '3', 'Adanu Reuben', 'M', '2', '1', NULL),
(4, '4', 'Adehi Gamaliel', 'M', '2', '1', NULL),
(5, '5', 'Agbo Amarachi Perpetual', 'F', '2', '1', NULL),
(6, '6', 'Aruwa Nicodemus', 'M', '2', '1', NULL),
(7, '7', 'Benjamin Patience Ojogefu', 'F', '2', '1', NULL),
(8, '8', 'Daniel James', 'M', '2', '1', NULL),
(9, '9', 'Daniel Patience', 'F', '2', '1', NULL),
(10, '10', 'Danladi Miracle', 'F', '2', '1', NULL),
(11, '11', 'Egwuoba Benedict', 'M', '2', '1', NULL),
(12, '12', 'Ejiga Regina Omacheleojo', 'F', '2', '1', NULL),
(13, '13', 'Elijah Victoria Omojo', 'F', '2', '1', NULL),
(14, '14', 'Ezema Desmond Nnemaka', 'M', '2', '1', NULL),
(15, '15', 'Ezeuke David Uchechukwu', 'M', '2', '1', NULL),
(16, '16', 'Ezike Emmanuel', 'M', '2', '2', NULL),
(17, '17', 'Ibrahim Nathaniel Ugebedeojo', 'M', '2', '2', NULL),
(18, '18', 'Ibrahim Ufedojo Keziah', 'F', '2', '2', NULL),
(19, '19', 'Idogwu Sunday', 'M', '2', '2', NULL),
(20, '20', 'Isah Kasimu', 'M', '2', '2', NULL),
(21, '21', 'John Emmanuel', 'M', '2', '2', NULL),
(22, '22', 'John Jibrin Deborah', 'F', '2', '2', NULL),
(23, '23', 'John Joseph', 'M', '2', '2', NULL),
(24, '24', 'Joseph Ojoajogwu', 'M', '2', '2', NULL),
(25, '25', 'Keke Friday', 'M', '2', '2', NULL),
(26, '26', 'Kure Eunice', 'F', '2', '2', NULL),
(27, '27', 'Momoh David Enyojo', 'M', '2', '2', NULL),
(28, '28', 'Musa Rosemary Ojonugwa', 'F', '2', '2', NULL),
(29, '29', 'Odaudu Solomon Omaye', 'M', '2', '2', NULL),
(30, '30', 'Okike Israel Chinonso', 'M', '2', '2', NULL),
(31, '31', 'Ozor Juliet Onyinyechukwu', 'F', '2', '2', NULL),
(32, '32', 'Paul Silas', 'M', '2', '2', NULL),
(33, '33', 'Salifu Ibrahim', 'M', '2', '3', NULL),
(34, '34', 'Samuel Esther Iye', 'F', '2', '3', NULL),
(35, '35', 'Shiloba Innocent', 'M', '2', '3', NULL),
(36, '36', 'Silas Caroline Precious', 'F', '2', '3', NULL),
(37, '37', 'Sumaila Aishat', 'F', '2', '3', NULL),
(38, '38', 'Tokula Precious', 'F', '2', '3', NULL),
(39, '39', 'Udaya Rachael Mmesoma', 'F', '2', '3', NULL),
(40, '40', 'Ugbede Happiness Enyo-ojo', 'F', '2', '3', NULL),
(41, '41', 'Umoru Solomon', 'M', '2', '3', NULL),
(42, '42', 'Usman Halimat', 'F', '2', '3', NULL),
(43, '43', 'Yusufu Sunday', 'M', '2', '3', NULL),
(44, '44', 'Zekeri Shedrach', 'M', '2', '3', NULL),
(45, '51', 'Akpan Etorobong', 'M', '', '2', NULL),
(52, '52', 'Daniel Worlu', 'M', '', '2', NULL),
(53, '53', 'Joseph John', 'M', '2', '2', NULL),
(54, '54', 'Joe Abanna', 'M', '2', '1', NULL),
(55, '55', 'Mercy Abah', 'F', '3', '2', NULL),
(56, '56', 'Abu Moses', 'M', '6', '2', NULL),
(57, '56', 'Akpelu Johnny', 'M', '4', '2', NULL),
(58, '57', 'Abel Beke', 'M', '1', '1', NULL),
(59, '58', 'Alubu Nancy', 'F', '3', '2', NULL),
(60, '59', 'Abel Dinga', 'M', '1', '2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblacadyr`
--

CREATE TABLE `tblacadyr` (
  `acadYrId` int(11) NOT NULL,
  `longName` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `shortName` varchar(25) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `tblacadyr`
--

INSERT INTO `tblacadyr` (`acadYrId`, `longName`, `shortName`) VALUES
(1, '2017/2018', '17/18'),
(2, '2018/2019', '18/19');

-- --------------------------------------------------------

--
-- Table structure for table `tblarm`
--

CREATE TABLE `tblarm` (
  `armId` int(11) NOT NULL,
  `armLName` varchar(50) NOT NULL,
  `armSName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblarm`
--

INSERT INTO `tblarm` (`armId`, `armLName`, `armSName`) VALUES
(1, 'Apha', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tblclasss`
--

CREATE TABLE `tblclasss` (
  `classsId` int(11) NOT NULL,
  `classsLName` varchar(50) NOT NULL,
  `classsSName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblclasss`
--

INSERT INTO `tblclasss` (`classsId`, `classsLName`, `classsSName`) VALUES
(1, 'Primary One', 'Pri 1'),
(2, 'Primary Two', 'Pri 2');

-- --------------------------------------------------------

--
-- Table structure for table `tbllocation`
--

CREATE TABLE `tbllocation` (
  `locId` int(11) NOT NULL,
  `locLName` varchar(50) NOT NULL,
  `locSName` varchar(50) NOT NULL,
  `locAddress` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllocation`
--

INSERT INTO `tbllocation` (`locId`, `locLName`, `locSName`, `locAddress`) VALUES
(1, 'Lokoja', 'Lkj', 'Behind Transformer, Ganaja Lokoja');

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

-- --------------------------------------------------------

--
-- Table structure for table `tblstaff`
--

CREATE TABLE `tblstaff` (
  `staffId` int(11) NOT NULL,
  `staffLName` varchar(255) NOT NULL,
  `staffFName` varchar(255) NOT NULL,
  `hireDate` date NOT NULL,
  `sex` int(11) NOT NULL,
  `staffCatId` int(11) NOT NULL,
  `staffMail` varchar(255) NOT NULL,
  `staffPhone` varchar(50) NOT NULL,
  `staffContactAdd` varchar(255) NOT NULL,
  `staffPermHomeAdd` varchar(255) NOT NULL,
  `staffImage` varchar(255) NOT NULL,
  `staffUsername` varchar(50) NOT NULL,
  `staffPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstaff`
--

INSERT INTO `tblstaff` (`staffId`, `staffLName`, `staffFName`, `hireDate`, `sex`, `staffCatId`, `staffMail`, `staffPhone`, `staffContactAdd`, `staffPermHomeAdd`, `staffImage`, `staffUsername`, `staffPassword`) VALUES
(2, 'SULE', 'Benjamin', '2016-12-13', 1, 1, 'b.agbene@gmail.com', '08078665544', 'Block 9 Omerelu Street', 'Omala L.G.A, Kogi State ', 'default.png', 'Beneasy', '$2y$10$sowFlhNG78oJT7Dz.I61PeoPiVNv09mxCsS3qAnN5dSOHyjq9Qeli'),
(6, 'Chidi', 'Mokeme', '2018-01-12', 1, 1, 'chidi@gmail.com', '08061358646', 'Opposite Ojogba Palace', 'Nnewi - Anambra State', 'scan0003.jpg', 'Chidimokeme', '$2y$10$d4UxcTCN9M19y.kIRKw2PeYuBKo8GBEfUuVfMq5cEfUas2HZostJG'),
(8, 'Adede', 'Alex', '2020-12-01', 1, 2, 'alexo@gmail.com', '081378686621', 'Behind Fame school', 'Abejukolo', '16073469126731682770054.jpg', 'Alexoooo', '$2y$10$SrB9mKZZ.fzLp.X.wx8Uh.RbVbNa3lVEXLBh3vYDQWbYHMwP97g/q');

-- --------------------------------------------------------

--
-- Table structure for table `tblstaffcat`
--

CREATE TABLE `tblstaffcat` (
  `staffCatId` int(11) NOT NULL,
  `shortName` varchar(50) NOT NULL,
  `longName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstaffcat`
--

INSERT INTO `tblstaffcat` (`staffCatId`, `shortName`, `longName`) VALUES
(1, 'Admin', 'Administrative'),
(2, 'Acad', 'Academic');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

CREATE TABLE `tblstudents` (
  `studId` int(11) NOT NULL,
  `studRegNo` varchar(15) NOT NULL,
  `studLName` varchar(50) NOT NULL,
  `studFName` varchar(50) NOT NULL,
  `studSex` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `initialClass` int(11) NOT NULL,
  `currentClass` int(11) NOT NULL,
  `acadYrId` int(11) NOT NULL,
  `armId` int(11) NOT NULL,
  `parentName` varchar(255) NOT NULL,
  `studRegDate` datetime NOT NULL,
  `studPix` varchar(255) NOT NULL,
  `studStatus` int(11) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `studUsername` varchar(255) NOT NULL,
  `studPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

CREATE TABLE `tblsubjects` (
  `subId` int(11) NOT NULL,
  `subjectLName` varchar(50) NOT NULL,
  `subjectSName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`subId`, `subjectLName`, `subjectSName`) VALUES
(1, 'Agricultural Science', 'Agric Sc'),
(2, 'Biology', 'Bio'),
(3, 'Christian Religious Studies', 'C.R.S'),
(4, 'Chemistry', 'Chem'),
(5, 'Civic Education', 'Civic Educ.'),
(6, 'Commerce', 'Comm'),
(7, 'Cultural and Creative Arts', 'C.C.A'),
(8, 'Economics', 'Econs'),
(9, 'English Language', 'Eng Lang'),
(10, 'Financial Accounting', 'Fin Acct'),
(11, 'Further Mathematics', 'Further Maths'),
(12, 'Geography', 'Geog'),
(13, 'Government', 'Govt'),
(14, 'Health and Safety', 'H & S'),
(15, 'Islamic Religious Studies', 'I.R.S'),
(16, 'Information & Communication Technology', 'I.C.T'),
(17, 'Literacy', 'Lit'),
(18, 'Literature In English', 'Lit In Eng'),
(19, 'Mathematics', 'Maths'),
(20, 'Nature, Science and Technology', 'N S&T'),
(21, 'Numeracy', 'Num'),
(22, 'Physics', 'Phy'),
(23, 'Prevocational Studies', 'PreVoc Stu'),
(24, 'Religion', 'Rel'),
(25, 'Trade and Entrepreneurship', 'T & E'),
(26, 'Value Education', 'V E');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjecttaught`
--

CREATE TABLE `tblsubjecttaught` (
  `subTaughtId` int(25) NOT NULL,
  `subjectId` int(11) NOT NULL,
  `staffId` int(11) NOT NULL,
  `locationId` int(11) NOT NULL,
  `classsId` int(11) NOT NULL,
  `armId` int(11) NOT NULL,
  `acadYrId` int(11) NOT NULL,
  `termId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjecttaught`
--

INSERT INTO `tblsubjecttaught` (`subTaughtId`, `subjectId`, `staffId`, `locationId`, `classsId`, `armId`, `acadYrId`, `termId`) VALUES
(1, 1, 2, 1, 1, 1, 2, 1),
(2, 1, 6, 1, 2, 1, 2, 2),
(3, 7, 2, 1, 1, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblterm`
--

CREATE TABLE `tblterm` (
  `termId` int(11) NOT NULL,
  `termLName` varchar(50) NOT NULL,
  `termSName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblterm`
--

INSERT INTO `tblterm` (`termId`, `termLName`, `termSName`) VALUES
(1, 'First', '1st'),
(2, 'Second', '2nd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_username` (`username`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblacadyr`
--
ALTER TABLE `tblacadyr`
  ADD PRIMARY KEY (`acadYrId`);

--
-- Indexes for table `tblarm`
--
ALTER TABLE `tblarm`
  ADD PRIMARY KEY (`armId`);

--
-- Indexes for table `tblclasss`
--
ALTER TABLE `tblclasss`
  ADD PRIMARY KEY (`classsId`);

--
-- Indexes for table `tbllocation`
--
ALTER TABLE `tbllocation`
  ADD PRIMARY KEY (`locId`);

--
-- Indexes for table `tblsex`
--
ALTER TABLE `tblsex`
  ADD PRIMARY KEY (`sexId`);

--
-- Indexes for table `tblstaff`
--
ALTER TABLE `tblstaff`
  ADD PRIMARY KEY (`staffId`);

--
-- Indexes for table `tblstaffcat`
--
ALTER TABLE `tblstaffcat`
  ADD PRIMARY KEY (`staffCatId`);

--
-- Indexes for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`studId`),
  ADD UNIQUE KEY `studRegNo` (`studRegNo`),
  ADD UNIQUE KEY `studUsername` (`studUsername`);

--
-- Indexes for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  ADD PRIMARY KEY (`subId`);

--
-- Indexes for table `tblsubjecttaught`
--
ALTER TABLE `tblsubjecttaught`
  ADD PRIMARY KEY (`subTaughtId`);

--
-- Indexes for table `tblterm`
--
ALTER TABLE `tblterm`
  ADD PRIMARY KEY (`termId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `tblacadyr`
--
ALTER TABLE `tblacadyr`
  MODIFY `acadYrId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblarm`
--
ALTER TABLE `tblarm`
  MODIFY `armId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblclasss`
--
ALTER TABLE `tblclasss`
  MODIFY `classsId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbllocation`
--
ALTER TABLE `tbllocation`
  MODIFY `locId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblsex`
--
ALTER TABLE `tblsex`
  MODIFY `sexId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblstaff`
--
ALTER TABLE `tblstaff`
  MODIFY `staffId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblstaffcat`
--
ALTER TABLE `tblstaffcat`
  MODIFY `staffCatId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `studId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  MODIFY `subId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tblsubjecttaught`
--
ALTER TABLE `tblsubjecttaught`
  MODIFY `subTaughtId` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblterm`
--
ALTER TABLE `tblterm`
  MODIFY `termId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
