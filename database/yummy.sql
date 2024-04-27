-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 27, 2024 at 06:25 PM
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
-- Database: `yummy`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_cart`
--

CREATE TABLE `customer_cart` (
  `Payment` varchar(100) DEFAULT NULL,
  `Cart_ID` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `Dish_hotel_name` varchar(100) NOT NULL,
  `Dish_name` varchar(100) NOT NULL,
  `Dish_price` varchar(100) NOT NULL,
  `dish_quantity` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer_cart`
--

INSERT INTO `customer_cart` (`Payment`, `Cart_ID`, `customer_email`, `Dish_hotel_name`, `Dish_name`, `Dish_price`, `dish_quantity`) VALUES
('PAY88275', 'CRT23852', 'bavan@gmail.com', 'Arya_bhavan', 'ChepaPulusu', '129', '1'),
('PAY88275', 'CRT74298', 'bavan@gmail.com', 'Arya_bhavan', 'AndhraChickenBiriyani', '129', '1');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `Payment_id` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `Total_items` varchar(100) NOT NULL,
  `Dish_names` varchar(1000) NOT NULL,
  `total_seats` varchar(100) NOT NULL,
  `Hotel_name` varchar(100) NOT NULL,
  `Date/time` varchar(100) NOT NULL,
  `total_amount_paid` varchar(100) NOT NULL,
  `payment_details` varchar(100) NOT NULL,
  `Date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`Payment_id`, `customer_email`, `Total_items`, `Dish_names`, `total_seats`, `Hotel_name`, `Date/time`, `total_amount_paid`, `payment_details`, `Date`) VALUES
('PAY50701', 'bavan@gmail.com', '1', '1.AppamChickenStew   ', '19,20,21,22,23,24,', 'hotel_saravana_bhavan', '16-08-2023', '159', 'Card Number : 789543212345 Name on card : BAVAN Time : 01-08-2023 23:44 pm', '2023-08-16 15:00'),
('PAY93521', 'bavan@gmail.com', '2', '1.AppamChickenStew   2.Bobbatlu   ', '26,27,', 'hotel_saravana_bhavan', '04-08-2023', '277', 'Card Number : 435524556788 Name on card : Shree v Time : 02-08-2023 11:38 am', '2023-08-04 01:00'),
('PAY63796', 'bavan@gmail.com', '1', '1.MasalaDosa   ', '29,31,', 'Arya_bhavan', '03-08-2023', '39', 'Card Number : 567898765432 Name on card : BAVAN Time : 02-08-2023 14:38 pm', '2023-08-03 16:00'),
('PAY27136', 'bavan@gmail.com', '2', '1.Upma   2.MasalaDosa   ', '29,31,', 'The_vellore_Kitchen', '08-08-2023', '248', 'UPI ID : bavan@paytm Time : 07-08-2023 21:23 pm', '2023-08-08 16:00'),
('PAY23811', 'bavan@gmail.com', '2', '1.CurdRice   2.Coffee   ', '30,32,', 'Darling_Residency', '09-08-2023', '44', 'UPI ID : bavan@paytm Time : 08-08-2023 15:35 pm', '2023-08-09 16:00'),
('PAY12807', 'bavan@gmail.com', '2', '1.CurdRice   2.Coffee   ', '27,28,', 'Darling_Residency', '08-08-2023', '44', 'UPI ID : vxcbbbxbbnfxnx Time : 08-08-2023 15:42 pm', '2023-08-08 00:12'),
('PAY44750', 'bavan@gmail.com', '1', '1.CurdRice   ', '25,26,', 'Darling_Residency', '08-08-2023', '29', 'UPI ID : awwwww Time : 08-08-2023 15:54 pm', '2023-08-08 00:13'),
('PAY53791', 'bavan@gmail.com', '1', '1.CurdRice   ', '25,26,', 'Darling_Residency', '08-08-2023', '29', 'UPI ID : WWEW Time : 08-08-2023 15:55 pm', '2023-08-08 00:13');

-- --------------------------------------------------------

--
-- Table structure for table `customer_payment`
--

CREATE TABLE `customer_payment` (
  `Payment_ID` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `Total_items` varchar(100) NOT NULL,
  `Total_payment` varchar(100) NOT NULL,
  `Payment_type` varchar(100) NOT NULL,
  `Other_details` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer_payment`
--

INSERT INTO `customer_payment` (`Payment_ID`, `customer_email`, `Total_items`, `Total_payment`, `Payment_type`, `Other_details`) VALUES
('PAY50701', 'bavan@gmail.com', '1', '159', 'Debit card', 'Card Number : 789543212345 Name on card : BAVAN Time : 01-08-2023 23:44 pm'),
('PAY23811', 'bavan@gmail.com', '2', '44', 'UPI', 'UPI ID : bavan@paytm Time : 08-08-2023 15:35 pm'),
('PAY63796', 'bavan@gmail.com', '1', '39', 'Debit card', 'Card Number : 567898765432 Name on card : BAVAN Time : 02-08-2023 14:38 pm'),
('PAY27136', 'bavan@gmail.com', '2', '248', 'UPI', 'UPI ID : bavan@paytm Time : 07-08-2023 21:23 pm'),
('PAY12807', 'bavan@gmail.com', '2', '44', 'UPI', 'UPI ID : vxcbbbxbbnfxnx Time : 08-08-2023 15:42 pm'),
('PAY44750', 'bavan@gmail.com', '1', '29', 'UPI', 'UPI ID : awwwww Time : 08-08-2023 15:54 pm'),
('PAY53791', 'bavan@gmail.com', '1', '29', 'UPI', 'UPI ID : WWEW Time : 08-08-2023 15:55 pm');

-- --------------------------------------------------------

--
-- Table structure for table `customer_registration_details`
--

CREATE TABLE `customer_registration_details` (
  `Firstname` varchar(100) NOT NULL,
  `Lastname` varchar(100) NOT NULL,
  `phone_number` varchar(100) NOT NULL,
  `Date_of_birth` varchar(100) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Pincode` varchar(100) NOT NULL,
  `EmailID` varchar(100) NOT NULL,
  `User_Password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `customer_registration_details`
--

INSERT INTO `customer_registration_details` (`Firstname`, `Lastname`, `phone_number`, `Date_of_birth`, `Address`, `Pincode`, `EmailID`, `User_Password`) VALUES
('Bavan', 'K', '7678987654', '2002-04-18', 'Katpadi Vellore', '632004', 'bavan@gmail.com', 'password'),
('Bavan', 'Sharma', '4567898765', '2000-03-03', 'Katpadi Vellore', '632004', 'bavans@gmail.com', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_cart`
--
ALTER TABLE `customer_cart`
  ADD PRIMARY KEY (`Cart_ID`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`Payment_id`);

--
-- Indexes for table `customer_payment`
--
ALTER TABLE `customer_payment`
  ADD PRIMARY KEY (`Payment_ID`);

--
-- Indexes for table `customer_registration_details`
--
ALTER TABLE `customer_registration_details`
  ADD PRIMARY KEY (`EmailID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
