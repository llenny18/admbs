-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2023 at 04:20 AM
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
-- Database: `food_park`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `ftype` varchar(50) NOT NULL,
  `fprice` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `foodID` int(11) NOT NULL,
  `foodName` varchar(50) NOT NULL,
  `foodType` varchar(50) NOT NULL,
  `foodPrice` decimal(10,2) NOT NULL,
  `RID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`foodID`, `foodName`, `foodType`, `foodPrice`, `RID`) VALUES
(1, 'Chicken Wings with Fries & Rice', 'Meal', '139.00', 1),
(2, 'Spaghetti', 'Meal', '119.00', 1),
(3, 'Tuna Pesto', 'Meal', '139.00', 1),
(9, 'Nachos', 'Snack', '99.00', 1),
(10, 'Rice Bowl', 'Meal', '75.00', 1),
(11, 'Pork Siomai Fried Noodles', 'Meal', '59.00', 3),
(12, 'Steamed Siomai', 'Snack', '30.00', 3),
(13, 'Spam Musubi', 'Meal', '139.00', 3),
(14, 'Tenta-cool - 4pcs', 'Side Dish', '65.00', 3),
(15, 'Tenta-cool - 12pcs', 'Side Dish', '145.00', 3),
(16, 'Tako-late - 4pcs', 'Side Dish', '60.00', 3),
(17, 'Tako-late - 12pcs', 'Side Dish', '140.00', 3),
(18, 'Matcha Creamcheese Milk Tea', 'Bevarages', '75.00', 4),
(19, 'Brown Sugar Milk Tea', 'Bevarages', '75.00', 4),
(20, 'Iced Americano', 'Bevarages', '84.00', 4),
(21, 'Iced Cafe Latte (Best Seller)', 'Bevarages', '100.00', 4),
(22, 'Hershey\'s Chocolate Frappe', 'Bevarages', '128.00', 4),
(23, 'Sisig Meal', 'Meal', '89.00', 5),
(24, 'Roasted Quarter Meal', 'Meal', '115.00', 5),
(25, 'Duo BBQ Meal', 'Meal', '115.00', 5),
(26, '20 pcs Shanghai', 'Meal', '330.00', 5),
(27, 'Signature Roasted (whole chicken)', 'Meal', '385.00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `foodtype`
--

CREATE TABLE `foodtype` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foodtype`
--

INSERT INTO `foodtype` (`id`, `name`) VALUES
(4, 'Bevarages'),
(1, 'Dessert'),
(2, 'Liqour'),
(6, 'Meal'),
(3, 'Side Dish'),
(5, 'Snack');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `hfname` varchar(50) NOT NULL,
  `hftype` varchar(50) NOT NULL,
  `hfprice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `RID` int(11) NOT NULL,
  `rname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`RID`, `rname`) VALUES
(1, 'Mac\'s Meal'),
(2, 'Drinks Plus Plus'),
(3, 'Noodle Bros x Takoyaki Hub '),
(4, 'Tea Drop'),
(5, 'Kuya Ed’s Roasted and Fried'),
(6, 'Sam-J');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UID` int(11) NOT NULL,
  `uname` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `RID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UID`, `uname`, `pass`, `RID`) VALUES
(4, 'Allen', 'allenpass123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`foodID`),
  ADD KEY `RID` (`RID`),
  ADD KEY `foodType` (`foodType`);

--
-- Indexes for table `foodtype`
--
ALTER TABLE `foodtype`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`RID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UID`),
  ADD KEY `RID` (`RID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `foodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `RID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foods`
--
ALTER TABLE `foods`
  ADD CONSTRAINT `foods_ibfk_1` FOREIGN KEY (`RID`) REFERENCES `shops` (`RID`),
  ADD CONSTRAINT `foods_ibfk_2` FOREIGN KEY (`foodType`) REFERENCES `foodtype` (`name`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`RID`) REFERENCES `shops` (`RID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
