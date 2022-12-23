-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2022 at 04:01 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bp`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `BankID` int(20) NOT NULL,
  `Bname` text NOT NULL,
  `Bcity` text NOT NULL,
  `bank_tire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`BankID`, `Bname`, `Bcity`, `bank_tire`) VALUES
(1201, 'HDFC', 'South 24 Pargonas', 3),
(1202, 'Bank of Boroda', 'Kolkata', 5),
(1203, 'SBI', 'Baranagar', 1),
(1205, 'Punjab National Bank', 'Bankura', 5);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Cust_ID` int(20) NOT NULL,
  `Cname` text NOT NULL,
  `Age` int(11) NOT NULL,
  `Cust_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Cust_ID`, `Cname`, `Age`, `Cust_type`) VALUES
(62560, 'Mr. Suvendu Chowdhury', 20, 'Corporate'),
(62561, 'Mr.Debarpan Mondol', 21, 'Corporate'),
(62563, 'Mr. Avas Saha', 95, 'Regular'),
(62564, 'Mr. Anamitra Mandal', 55, 'Regular');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `LoanID` int(11) NOT NULL,
  `Cust_ID` int(20) DEFAULT NULL,
  `BankID` int(20) DEFAULT NULL,
  `Amount` text DEFAULT NULL,
  `No_of_emi_type` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`LoanID`, `Cust_ID`, `BankID`, `Amount`, `No_of_emi_type`) VALUES
(20321, 62560, 1202, '1200000', 'car'),
(20329, 62561, 1203, '2147483647', 'Home'),
(20330, 62561, 1203, '125000000000', 'Home'),
(20332, 62560, 1202, '700000000', 'Car'),
(20333, 62560, 1202, '700000000', 'Car'),
(20334, 62563, 1205, '450000', 'Education'),
(20335, 62564, 1201, '12000000', 'Home');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`BankID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Cust_ID`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`LoanID`),
  ADD KEY `Cust_ID` (`Cust_ID`),
  ADD KEY `BankID` (`BankID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `BankID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1206;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Cust_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62565;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `LoanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20336;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `loan`
--
ALTER TABLE `loan`
  ADD CONSTRAINT `loan_ibfk_1` FOREIGN KEY (`Cust_ID`) REFERENCES `customer` (`Cust_ID`),
  ADD CONSTRAINT `loan_ibfk_2` FOREIGN KEY (`BankID`) REFERENCES `bank` (`BankID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
