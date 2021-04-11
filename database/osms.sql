-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2021 at 08:28 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `osms`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `a_id` int(11) NOT NULL,
  `a_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `a_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `a_password` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`a_id`, `a_name`, `a_email`, `a_password`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$yTAEqGTufg2PkNQ/SVobZe1JibOAenNp7lx1tNEvxscOOcuPb7K.O');

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `asset_id` int(11) NOT NULL,
  `asset_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `asset_date` date NOT NULL,
  `asset_available` int(11) NOT NULL,
  `asset_total` int(11) NOT NULL,
  `asset_originalprice` int(11) NOT NULL,
  `asset_sellingprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`asset_id`, `asset_name`, `asset_date`, `asset_available`, `asset_total`, `asset_originalprice`, `asset_sellingprice`) VALUES
(2, 'keyboard', '2021-02-02', 0, 5, 300, 600),
(3, 'mouse', '2021-02-02', 4, 6, 200, 300);

-- --------------------------------------------------------

--
-- Table structure for table `assignwork`
--

CREATE TABLE `assignwork` (
  `r_no` int(11) NOT NULL,
  `assignworkr_id` int(11) NOT NULL,
  `assignworkr_info` text COLLATE utf8_bin NOT NULL,
  `assignworkr_description` text COLLATE utf8_bin NOT NULL,
  `assignworkr_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `assignworkr_address1` text COLLATE utf8_bin NOT NULL,
  `assignworkr_address2` text COLLATE utf8_bin NOT NULL,
  `assignworkr_city` varchar(60) COLLATE utf8_bin NOT NULL,
  `assignworkr_state` varchar(60) COLLATE utf8_bin NOT NULL,
  `assignworkr_zip` text COLLATE utf8_bin NOT NULL,
  `assignworkr_email` text COLLATE utf8_bin NOT NULL,
  `assignworkr_mobile` bigint(20) NOT NULL,
  `assignworkr_date` date NOT NULL,
  `assignworkr_technician` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `assignwork`
--

INSERT INTO `assignwork` (`r_no`, `assignworkr_id`, `assignworkr_info`, `assignworkr_description`, `assignworkr_name`, `assignworkr_address1`, `assignworkr_address2`, `assignworkr_city`, `assignworkr_state`, `assignworkr_zip`, `assignworkr_email`, `assignworkr_mobile`, `assignworkr_date`, `assignworkr_technician`) VALUES
(2, 9, 'Mouse not working', ' Mobile not working something something', 'Muhammad Nadeem', 'house no:500', 'railway colony 4', 'pattoki', 'punjab', '001516', 'nadeem77599@gmail.com', 3347759946, '2021-02-25', 'kasar'),
(3, 6, 'Keyboard not working', ' keyboard not working something something', 'Muhammad Nadeem', 'Address No.1', 'Address No.2', 'pattoki', 'punjab', '456217', 'nadeem77599@gmail.com', 3347759946, '2021-02-13', 'alexandar');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `u_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `u_password` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`u_id`, `u_name`, `u_email`, `u_password`) VALUES
(22, 'ali', 'ali@gmail.com', '$2y$10$p6XgUqpku2e806KTjci6EeXboAqHDcVnCgj3woWbAxRNntXvpVQN.'),
(24, 'dream', 'dream@gmail.com', '$2y$10$Ejll9D8FJfaXZisr85Ppwe9sbdyEcuZoodMcTqxM3WzmXcF5joGVm');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `requester_id` int(11) NOT NULL,
  `requester_info` text COLLATE utf8_bin NOT NULL,
  `requester_description` text COLLATE utf8_bin NOT NULL,
  `requester_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_address1` text COLLATE utf8_bin NOT NULL,
  `requester_address2` text COLLATE utf8_bin NOT NULL,
  `requester_city` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_state` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_zip` text COLLATE utf8_bin NOT NULL,
  `requester_email` varchar(60) COLLATE utf8_bin NOT NULL,
  `requester_mobile` bigint(20) NOT NULL,
  `requester_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`requester_id`, `requester_info`, `requester_description`, `requester_name`, `requester_address1`, `requester_address2`, `requester_city`, `requester_state`, `requester_zip`, `requester_email`, `requester_mobile`, `requester_date`) VALUES
(8, 'Button not working', ' technicianid not working something something', 'nadeem mughal', 'house no.400', 'railway colony 2', 'pattoki', 'punjab', '456217', 'nadeem77599@gmail.com', 3347759946, '2021-02-14'),
(9, 'Touch pad not working', ' Touch pad not working something something', 'nadeem mughal', 'house no:500', 'railway colony 1', 'pattoki', 'punjab', '6161', 'nadeem77599@gmail.com', 3347759946, '2021-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `sellproductbill`
--

CREATE TABLE `sellproductbill` (
  `spb_id` int(11) NOT NULL,
  `spc_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `spc_address` text COLLATE utf8_bin NOT NULL,
  `sp_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `sp_quantity` int(11) NOT NULL,
  `esp_price` int(11) NOT NULL,
  `spt_price` int(11) NOT NULL,
  `sp_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `sellproductbill`
--

INSERT INTO `sellproductbill` (`spb_id`, `spc_name`, `spc_address`, `sp_name`, `sp_quantity`, `esp_price`, `spt_price`, `sp_date`) VALUES
(3, 'awais', 'Lahore , Gulburg 2', 'keyboard', 1, 600, 600, '2021-02-15'),
(4, 'wali', 'Lahore , Gulburg 3', 'keyboard', 1, 600, 600, '2021-02-15'),
(5, 'iqra', 'lahore , Gulburg 4', 'keyboard', 1, 600, 600, '2021-02-15'),
(6, 'waseem', 'Lahore , Gulburg 9', 'mouse', 1, 300, 300, '2021-02-15'),
(7, 'roobi', 'Lahore , Gulburg 10', 'mouse', 1, 300, 300, '2021-02-15'),
(8, 'iqra', 'Lahore , Gulburg 11', 'keyboard', 2, 600, 1200, '2021-02-26');

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE `technician` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(60) COLLATE utf8_bin NOT NULL,
  `t_city` varchar(60) COLLATE utf8_bin NOT NULL,
  `t_mobile` bigint(20) NOT NULL,
  `t_email` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `technician`
--

INSERT INTO `technician` (`t_id`, `t_name`, `t_city`, `t_mobile`, `t_email`) VALUES
(1, 'kasar', 'pattoki', 334889456, 'kasar@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`asset_id`);

--
-- Indexes for table `assignwork`
--
ALTER TABLE `assignwork`
  ADD PRIMARY KEY (`r_no`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`u_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`requester_id`);

--
-- Indexes for table `sellproductbill`
--
ALTER TABLE `sellproductbill`
  ADD PRIMARY KEY (`spb_id`);

--
-- Indexes for table `technician`
--
ALTER TABLE `technician`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `asset_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assignwork`
--
ALTER TABLE `assignwork`
  MODIFY `r_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `requester_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sellproductbill`
--
ALTER TABLE `sellproductbill`
  MODIFY `spb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `technician`
--
ALTER TABLE `technician`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
