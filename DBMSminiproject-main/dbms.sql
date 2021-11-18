-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2021 at 10:27 AM
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
-- Database: `dbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `cheff`
--

CREATE TABLE `cheff` (
  `chefid` int(4) NOT NULL,
  `NAME` text NOT NULL,
  `AGE` int(3) NOT NULL,
  `SALARY` int(10) NOT NULL,
  `HIRE-DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cheff`
--

INSERT INTO `cheff` (`chefid`, `NAME`, `AGE`, `SALARY`, `HIRE-DATE`) VALUES
(1, 'BHARATH HEGDE', 20, 30000, '2020-11-01'),
(2, 'Roshan', 35, 25000, '2020-06-15'),
(3, 'RAHUL', 30, 30000, '2020-07-06'),
(4, 'Ashok', 45, 45000, '2020-05-03'),
(5, 'ANVITH', 20, 100000, '2020-10-01');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Cid` int(4) NOT NULL,
  `NAME` text NOT NULL,
  `AGE` int(3) NOT NULL,
  `PHONENO` int(10) NOT NULL,
  `EMAIL` varchar(15) NOT NULL,
  `DATE AND TIME` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Cid`, `NAME`, `AGE`, `PHONENO`, `EMAIL`, `DATE AND TIME`) VALUES
(1, 'ANVITH', 20, 920728266, 'this@this.com', '2020-12-01 00:01:46'),
(2, 'Manoj', 20, 1234567890, 'this@this.com', '2020-12-31 23:44:14'),
(3, 'Amogha', 22, 920725555, 'this@this.com', '2020-12-31 23:44:56'),
(54, 'mahesh', 20, 2147483647, 'anvithshetty999', '2020-12-01 09:18:42'),
(55, 'raghu', 21, 1236547290, 'anvithshetty250', '2021-01-11 10:13:15'),
(56, 'prajwal', 20, 77777, '1by18cs023@bmsi', '2021-01-24 22:12:38'),
(57, 'raj', 50, 2147483647, '1by18cs023@bmsi', '2021-01-28 14:05:56');

-- --------------------------------------------------------

--
-- Table structure for table `meal`
--

CREATE TABLE `meal` (
  `mid` int(4) NOT NULL,
  `NAME` text NOT NULL,
  `Price` int(5) NOT NULL,
  `chefid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `meal`
--

INSERT INTO `meal` (`mid`, `NAME`, `Price`, `chefid`) VALUES
(1, 'SHAWARMA', 70, 1),
(2, 'Parota', 30, 3),
(4, 'chicken curry', 110, 1),
(5, 'maggi', 20, 1),
(6, 'paneer role', 70, 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(4) NOT NULL,
  `cid` int(11) NOT NULL,
  `wid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `Time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `cid`, `wid`, `mid`, `quantity`, `Time`) VALUES
(1, 2, 2, 4, 1, '2020-12-31 23:45:49'),
(2, 3, 4, 2, 2, '2020-12-31 23:46:09'),
(5, 54, 3, 2, 2, '2021-01-01 00:01:41'),
(16, 1, 1, 1, 5, '2020-12-01 08:51:33'),
(17, 54, 1, 1, 5, '2020-12-01 09:19:07'),
(18, 55, 1, 1, 1, '2021-01-11 10:15:39'),
(19, 56, 1, 1, 5, '2021-01-24 22:12:57'),
(20, 57, 1, 5, 1, '2021-01-28 14:07:09'),
(21, 55, 5, 6, 4, '2021-01-28 14:25:55');

-- --------------------------------------------------------

--
-- Table structure for table `waiter`
--

CREATE TABLE `waiter` (
  `wid` int(4) NOT NULL,
  `NAME` text NOT NULL,
  `AGE` int(3) NOT NULL,
  `SALARY` int(10) NOT NULL,
  `HIRE-DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `waiter`
--

INSERT INTO `waiter` (`wid`, `NAME`, `AGE`, `SALARY`, `HIRE-DATE`) VALUES
(1, 'bharath', 20, 15000, '0000-00-00'),
(2, 'Mohan', 50, 25000, '2020-12-01'),
(3, 'Kevin', 55, 55000, '2020-08-11'),
(4, 'Kohli', 32, 55000, '2020-12-07'),
(5, 'mohan', 50, 50000, '2020-10-01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cheff`
--
ALTER TABLE `cheff`
  ADD PRIMARY KEY (`chefid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Cid`);

--
-- Indexes for table `meal`
--
ALTER TABLE `meal`
  ADD PRIMARY KEY (`mid`),
  ADD KEY `CHEFF-ID` (`chefid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `c.id` (`cid`),
  ADD KEY `w.id` (`wid`),
  ADD KEY `m.id` (`mid`);

--
-- Indexes for table `waiter`
--
ALTER TABLE `waiter`
  ADD PRIMARY KEY (`wid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cheff`
--
ALTER TABLE `cheff`
  MODIFY `chefid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Cid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `meal`
--
ALTER TABLE `meal`
  MODIFY `mid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `waiter`
--
ALTER TABLE `waiter`
  MODIFY `wid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meal`
--
ALTER TABLE `meal`
  ADD CONSTRAINT `meal_ibfk_1` FOREIGN KEY (`chefid`) REFERENCES `cheff` (`chefid`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `customer` (`Cid`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`wid`) REFERENCES `waiter` (`wid`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`mid`) REFERENCES `meal` (`mid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
