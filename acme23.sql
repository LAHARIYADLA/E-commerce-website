-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2023 at 02:22 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `acme23`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `proid` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartid`, `userid`, `proid`, `created_date`) VALUES
(21, 9, 16, '2023-04-03 18:26:05'),
(29, 1, 21, '2023-04-06 09:44:55'),
(30, 1, 17, '2023-04-06 18:37:21'),
(36, 9, 21, '2023-04-08 16:52:21');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `userid` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `adr` text NOT NULL,
  `phn` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`userid`, `username`, `password`, `created_date`, `adr`, `phn`) VALUES
(1, 'client', '900150983cd24fb0d6963f7d28e17f72', '2023-04-03 18:00:04', 'abc', '4564564560'),
(9, 'c1', 'a9f7e97965d6cf799a529102a973b8b9', '2023-04-05 12:35:50', 'plot no:76,abc colony,xyz city,maharashtra,pin code:564006', '1231231230'),
(28, 'newuser', '22af645d1859cb5ca6da0c484f1f37ea', '2023-04-08 16:16:21', 'abc', '787189714254');

-- --------------------------------------------------------

--
-- Table structure for table `delivered_orders`
--

CREATE TABLE `delivered_orders` (
  `orderid` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `proid` int(11) NOT NULL,
  `delivered_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ordered_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delivered_orders`
--

INSERT INTO `delivered_orders` (`orderid`, `clientid`, `proid`, `delivered_date`, `ordered_date`) VALUES
(19, 9, 29, '2023-04-08 16:53:28', '2023-04-08 16:52:33');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `proid` int(11) NOT NULL,
  `ordered_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderid`, `userid`, `proid`, `ordered_date`) VALUES
(20, 9, 37, '2023-04-08 18:15:20');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `proid` int(11) NOT NULL,
  `name` varchar(80) NOT NULL,
  `price` float NOT NULL,
  `details` text NOT NULL,
  `imgpath` varchar(200) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `userid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`proid`, `name`, `price`, `details`, `imgpath`, `created_date`, `userid`) VALUES
(17, ' MILTON BOTTLE', 999, 'Material: Stainless Steel\r\nColour: Silver\r\nPattern: Textured\r\nCapacity: 1000 ml ', '../shared/images/14-02-04-2023-14-41-32-bottle.jpg', '2023-04-02 12:41:32', 14),
(18, 'laptop', 46000, 'Hp company,15 inches screen,250GB SSD,high speed RAM,Gaming pc,includes Graphic card', '../shared/images/10-02-04-2023-14-42-23-laptop.jpg', '2023-04-02 12:42:23', 20),
(21, 'WRONG SHIRT', 1000, ' Beige and Red casual reversible shirt,has a spread collar, long sleeves, button placket, curved hem, and 1 patch pocket\r\n\r\n\r\n  ', '../shared/images/13-03-04-2023-19-45-45-virat.jpg', '2023-04-03 17:45:45', 14),
(23, 'APPLE air dopes', 400, '          two yr warranty ,color white,Brand APPLE,Gives you best experience for music lovers  ', '../shared/images/20-03-04-2023-22-31-39-AirPod 2nd Gen.jpg', '2023-04-03 20:31:39', 20),
(25, 'dinning table', 10000, 'A table and four chairs .Made with Rose wood. Square Shape with 70 inches side.', '../shared/images/20-04-04-2023-20-21-22-dining_table.jpg', '2023-04-04 18:21:22', 20),
(26, 'FOSSIL WATCH', 14995, '                   Case Size: 50 mm\r\nStrap :  Black Stainless Steel\r\nCase Water Resistance: 10 ATM\r\nCase Material: Stainless Steel  ', '../shared/images/14-08-04-2023-12-18-00-fossil.jpeg', '2023-04-08 10:18:00', 14),
(27, 'Canon Digital SLR Camera ', 37990, '                                      Model Name	EOS 1500D\r\nEffective Still Resolution	24.10\r\nSpecial Feature	Built-in Monaural Microphone, Sound-Recording Level Adjustable, Wind Filter Provided   ', '../shared/images/14-08-04-2023-12-51-55-cam.jpg', '2023-04-08 10:51:11', 14),
(29, 'sky bag', 4099, '         Skybags Mint 67 cms Polycarbonate Turquoise Hardsided Check,Capacity:58liters  ', '../shared/images/20-08-04-2023-13-41-22-skybag.jpg', '2023-04-08 11:41:22', 20),
(31, 'girls college bag', 999, '          TYPIFY® Preppy Korean Ribbon Women Backpack College Bag, latest Girls. Gift for Her ', '../shared/images/20-08-04-2023-13-49-01-girlsbag.jpg', '2023-04-08 11:49:01', 20),
(35, ' i-phone', 139900, '                           Apple iPhone 14 Pro (256 GB) - Deep Purple    ', '../shared/images/14-08-04-2023-18-21-03-iphone.jpg', '2023-04-08 16:05:05', 14),
(37, 'SONY head  phones', 3999, '                    sony massive music fest .\r\nTHREE YEARS warranty.enjoy the experience ', '../shared/images/20-08-04-2023-18-45-06-sony.jpg', '2023-04-08 16:45:06', 20);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `orderid` int(11) NOT NULL,
  `proid` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `rating` float DEFAULT NULL,
  `review` text DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`orderid`, `proid`, `clientid`, `rating`, `review`, `created_date`) VALUES
(19, 29, 9, 4.5, 'great journey with sky bags.very comfortable', '2023-04-08 16:54:38');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `userid` int(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`userid`, `username`, `password`, `created_date`) VALUES
(14, 'vendor', '900150983cd24fb0d6963f7d28e17f72', '2023-04-01 06:48:52'),
(20, 'v1', '6654c734ccab8f440ff0825eb443dc7f', '2023-04-03 17:36:37'),
(27, 'lahari', '529ca8050a00180790cf88b63468826a', '2023-04-08 16:03:45'),
(28, 'newvendor', '22af645d1859cb5ca6da0c484f1f37ea', '2023-04-08 16:19:43'),
(29, 'new', '22af645d1859cb5ca6da0c484f1f37ea', '2023-04-08 16:43:19'),
(30, 'newregistration', '006d2143154327a64d86a264aea225f3', '2023-04-08 16:48:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`proid`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `proid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `userid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
