-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2018 at 08:38 PM
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
(1, 'Nina dey', 'nina@gmail.com', '085459544', 'RZx0- D2, Dublin', '2017-02-23', 1, 'facebook', 1, 'Need ASAP', '2017-03-23'),
(2, 'Tony mullins', 'tony@gmail.com', '085459544', 'RZx0- D2, Dublin', '2018-02-23', 1, 'Instagram', 2, 'Need soon', '2017-03-23'),
(3, 'Giani Martins', 'giani@gmail.com', '085459544', 'Claire street, Dublin', '2016-02-23', 0, 'call', 2, 'Need soon', '2017-03-23'),
(4, 'Bikky Kumar', 'bikky.kumar.ie@gmail.com', '894595812', '24 Mount street upper', '2018-03-08', 0, 'Linkedin', 1, 'sa', NULL),
(5, 'Roman Roles', 'roman@gmail.com', '894595812', '24 Mount street upper', '2018-03-06', 1, 'Linkedin', 0, 'N/A', NULL);

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
(1, 'Bikky Kumar', '0894595812', 'bikky8010@gmail.com', 'Dublin'),
(2, 'Paul Joyce', '0894595812', 'pauljoyce@fashionblinds.ie', 'Paul');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `fk_staff_id` (`staff_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
