-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2022 at 07:03 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurentdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `cname` varchar(50) NOT NULL,
  `entrydate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cid`, `cname`, `entrydate`) VALUES
(1, 'Fast Food', '2022-12-27 15:26:56'),
(2, 'Desi Food', '2022-12-27 15:28:29');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pid` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `Categroy_id` int(11) NOT NULL,
  `Status` varchar(25) NOT NULL,
  `Image` varchar(200) NOT NULL,
  `entryDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pid`, `Name`, `price`, `Categroy_id`, `Status`, `Image`, `entryDate`) VALUES
(1, 'Beef Biryani', 220, 2, 'Active', 'beafbiuryani.jpg', '2022-12-27 15:56:17'),
(2, 'Beaf Booti', 200, 2, 'Active', 'beafbooti.jpg', '2022-12-27 16:05:39'),
(3, 'Chicken Booti', 180, 2, 'Active', 'cheknbooti.jpg', '2022-12-27 16:06:50'),
(4, 'Chicken Roll', 230, 1, 'Active', 'chiceknrool.jpg', '2022-12-27 16:07:54'),
(5, 'Zinger Burger', 290, 1, 'Active', 'zinger.jpg', '2022-12-27 16:08:32');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `sID` int(11) NOT NULL,
  `StaffName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `NIC` varchar(50) NOT NULL,
  `Image` varchar(200) NOT NULL,
  `entryDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`sID`, `StaffName`, `email`, `password`, `contact`, `NIC`, `Image`, `entryDate`) VALUES
(1, 'Faizan', 'faizn@gmail.com', '123', '0241512541', '1254124653621', 'a.jpg', '2022-12-27 16:02:00');

-- --------------------------------------------------------

--
-- Table structure for table `table_tb`
--

CREATE TABLE `table_tb` (
  `tid` int(11) NOT NULL,
  `table_name` varchar(50) NOT NULL,
  `entrydate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `table_tb`
--

INSERT INTO `table_tb` (`tid`, `table_name`, `entrydate`) VALUES
(1, 'Table 1', '2022-12-27 15:34:03'),
(2, 'Table 2', '2022-12-27 15:34:09'),
(3, 'Table 3', '2022-12-27 15:34:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `Categroy_id` (`Categroy_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`sID`);

--
-- Indexes for table `table_tb`
--
ALTER TABLE `table_tb`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `sID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `table_tb`
--
ALTER TABLE `table_tb`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
