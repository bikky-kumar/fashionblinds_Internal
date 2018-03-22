-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 22, 2018 at 09:40 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashionblinds_internal`
--

CREATE DATABASE fashionblinds_internal;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `full_name`, `admin_email`, `admin_password`) VALUES
(1, 'Paul Joyce', 'pauljoyce@fashionblinds.ie', 'Dublin320');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact_date` date DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `source` varchar(85) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `processed_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `full_name`, `email`, `phone`, `address`, `contact_date`, `status`, `source`, `staff_id`, `comment`, `processed_date`) VALUES
(2, 'Tony mullins', 'tony@gmail.com', '085459544', 'RZx0- D2, Dublin', '2018-02-23', 1, 'Instagram', 2, 'Need soon', '2017-03-23'),
(5, 'Roman', 'roman@gmail.com', '894595812', '24, dublin', '2018-03-06', 0, 'Linkedin', 5, 'N/A', '2018-03-21'),
(6, 'Maciek', 'maciek@gmail.com', '089673782', 'mount', '2018-03-06', 0, 'In Store Call', 5, 'Great', '2018-03-14'),
(12, 'paula', 'paula@intel.com', '', '', '0000-00-00', 0, '', 6, '', '2018-03-06'),
(14, 'Jacqui Sinagoga', 'jsinagoga@icloud.com', '', '', '0000-00-00', 0, '', 6, '', '0000-00-00'),
(15, 'Martha Hegarty', 'martha_mcgrory@yahoo.ie', 'p:+3530877788940', 'leixlup', '2018-03-06', 1, 'Facebook', 6, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_subtype`
--

CREATE TABLE `product_subtype` (
  `product_subtype_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_subtype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_subtype`
--

INSERT INTO `product_subtype` (`product_subtype_id`, `product_id`, `product_subtype`) VALUES
(1, 2, 'Wood Impressions'),
(2, 2, 'Essential'),
(3, 1, 'Splash'),
(4, 1, 'Lola'),
(5, 3, 'Vitra'),
(6, 3, 'Allegra'),
(7, 4, 'Splash'),
(8, 4, 'Aria');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE `product_type` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`product_id`, `product_name`) VALUES
(1, 'Roller Blinds'),
(2, 'Wooden Venetian'),
(3, 'Blackout Blinds'),
(4, 'Vertical Blinds'),
(5, 'Roman Blinds'),
(6, 'Venetian Blinds'),
(7, 'Roof Blinds');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(6) UNSIGNED NOT NULL,
  `staff_fullname` varchar(30) NOT NULL,
  `staff_Phone` varchar(30) DEFAULT NULL,
  `staff_email` varchar(50) NOT NULL,
  `staff_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `staff_fullname`, `staff_Phone`, `staff_email`, `staff_password`) VALUES
(2, 'Paul Joyce', '0894595812', 'pauljoyce@fashionblinds.ie', 'Paul'),
(5, 'marta joyce', '089992922', 'marta@fashionblinds.ie', 'martaj'),
(6, 'lynne joyce', '04904388', 'lynne@fashionblinds.ie', 'lynne');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `fk_staff_id` (`staff_id`);

--
-- Indexes for table `product_subtype`
--
ALTER TABLE `product_subtype`
  ADD PRIMARY KEY (`product_subtype_id`),
  ADD KEY `fk_product_id` (`product_id`);

--
-- Indexes for table `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `product_subtype`
--
ALTER TABLE `product_subtype`
  MODIFY `product_subtype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_type`
--
ALTER TABLE `product_type`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
