-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 01, 2025 at 01:48 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `os`
--

-- --------------------------------------------------------

--
-- Table structure for table `hostel`
--

CREATE TABLE `hostel` (
  `name` text NOT NULL,
  `degree` varchar(60) NOT NULL,
  `major` varchar(60) NOT NULL,
  `semester` varchar(60) NOT NULL,
  `room` varchar(60) NOT NULL,
  `agno` varchar(60) NOT NULL,
  `cnic` varchar(60) NOT NULL,
  `amount` varchar(60) NOT NULL,
  `time` date NOT NULL,
  `voucher` varchar(60) NOT NULL,
  `bank` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `hostel`
--

INSERT INTO `hostel` (`name`, `degree`, `major`, `semester`, `room`, `agno`, `cnic`, `amount`, `time`, `voucher`, `bank`) VALUES
('SADIA', 'BS', 'SE', '7TH', '6', '2021-AG-8049', '3310092222346', '60000', '2025-02-14', '22', 'UBL'),
('Shoaib', 'PHD', 'SE', '7th', '6', '2021-ag-8047', '3310094423346', '60000', '2025-02-06', '45', 'UBL'),
('KHADIJA', 'PHD', 'SE', '7TH', '6', '2021-AG-8043', '3310094423729', '60000', '2025-02-26', '11', 'MCB'),
('WAJEEHA', 'MS', 'SE', '7TH', '6', '2021-AG-8047', '3310097723346', '60000RUPEES', '2025-02-12', '22', 'UBL');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hostel`
--
ALTER TABLE `hostel`
  ADD PRIMARY KEY (`cnic`),
  ADD UNIQUE KEY `cnic` (`cnic`),
  ADD UNIQUE KEY `cnic_2` (`cnic`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
