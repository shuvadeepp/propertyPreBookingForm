-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2022 at 07:50 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `propertytaxdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `incomegroup`
--

CREATE TABLE `incomegroup` (
  `propertyTypeId` int(11) NOT NULL,
  `propertyType` varchar(45) DEFAULT NULL,
  `propertyCost` varchar(45) DEFAULT NULL,
  `housingProjectId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `incomegroup`
--

INSERT INTO `incomegroup` (`propertyTypeId`, `propertyType`, `propertyCost`, `housingProjectId`) VALUES
(1, 'MIG (Middle Income Group)', '1200000', 1),
(2, 'LIG (Low Income Group)', '300000', 1),
(3, 'HIG (high-income Group)', '1800000', 1),
(4, 'MIG (Middle Income Group)', '1500000', 2),
(5, 'LIG (Low Income Group)', '2500000', 2),
(6, 'HIG (high-income Group)', '3500000', 2);

-- --------------------------------------------------------

--
-- Table structure for table `propertylist`
--

CREATE TABLE `propertylist` (
  `housingProjectId` int(11) NOT NULL,
  `housingProject` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `propertylist`
--

INSERT INTO `propertylist` (`housingProjectId`, `housingProject`) VALUES
(1, 'Mahadev Nagar'),
(2, 'Kalinga Nagar');

-- --------------------------------------------------------

--
-- Table structure for table `propertypre_bookingform`
--

CREATE TABLE `propertypre_bookingform` (
  `intId` int(11) NOT NULL,
  `appName` varchar(45) DEFAULT NULL,
  `appEmail` varchar(45) DEFAULT NULL,
  `appMobile` varchar(45) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `appIdProof` varchar(45) DEFAULT NULL,
  `housingProjectId` int(11) DEFAULT NULL,
  `propertyTypeId` int(11) DEFAULT NULL,
  `propertyCost` varchar(45) DEFAULT NULL,
  `created_On` datetime DEFAULT NULL,
  `deletedFlag` bit(1) DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `propertypre_bookingform`
--

INSERT INTO `propertypre_bookingform` (`intId`, `appName`, `appEmail`, `appMobile`, `dob`, `age`, `gender`, `appIdProof`, `housingProjectId`, `propertyTypeId`, `propertyCost`, `created_On`, `deletedFlag`) VALUES
(1, 'Demo', 'Demo@gmail.com', '999999999', '1995-08-31', NULL, 'Male', '1660454396.png', 1, 1, '₹1200000', '2022-08-14 05:19:56', b'0'),
(2, 'Manoj', 'Manoj@gmail.com', '9999999990', '1993-07-02', 29, 'Male', '1660456149.png', 1, 2, '₹300000', '2022-08-14 05:49:09', b'0'),
(3, 'Satya', 'Satya@gmail.com', '999999997', '1997-10-01', 24, 'Male', '1660460854.png', 2, 6, '₹3500000', '2022-08-14 07:07:34', b'0'),
(4, 'shuvadeep', 'shuvadeep@gmail.com', '9999999999', '1996-07-31', 26, 'Male', '1660480324.PNG', 1, 3, '₹1800000', '2022-08-14 18:02:04', b'0'),
(5, 'priyanka', 'priyanka@gmail.com', '9879878753', '1996-07-07', 26, 'Female', '1660504382.PNG', 2, 4, '₹1500000', '2022-08-15 00:43:02', b'0'),
(6, 'Hello', 'hello@gmail.com', '5677777777', '2000-06-13', 22, 'Male', '1660545435.PNG', 2, 5, '₹2500000', '2022-08-15 12:07:15', b'0'),
(7, 'testing', 'testing@gmail.com', '7777777777', '1996-03-14', 26, 'Male', '1660545825.png', 1, 2, '₹300000', '2022-08-15 12:13:45', b'0'),
(8, 'biswa', 'biswa@gmail.com', '9877698765', '2001-06-02', 21, 'Other', '1660584159.png', 2, 5, '₹2500000', '2022-08-15 22:52:39', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `incomegroup`
--
ALTER TABLE `incomegroup`
  ADD PRIMARY KEY (`propertyTypeId`);

--
-- Indexes for table `propertylist`
--
ALTER TABLE `propertylist`
  ADD PRIMARY KEY (`housingProjectId`);

--
-- Indexes for table `propertypre_bookingform`
--
ALTER TABLE `propertypre_bookingform`
  ADD PRIMARY KEY (`intId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `incomegroup`
--
ALTER TABLE `incomegroup`
  MODIFY `propertyTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `propertylist`
--
ALTER TABLE `propertylist`
  MODIFY `housingProjectId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `propertypre_bookingform`
--
ALTER TABLE `propertypre_bookingform`
  MODIFY `intId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
