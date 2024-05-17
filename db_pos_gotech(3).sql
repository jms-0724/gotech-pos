-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2024 at 03:51 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pos_gotech`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `cust_id` int(10) NOT NULL,
  `cust_fname` varchar(100) NOT NULL,
  `cust_lname` varchar(100) NOT NULL,
  `cust_brgy` varchar(100) NOT NULL,
  `cust_municipality` varchar(100) NOT NULL,
  `cust_province` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`cust_id`, `cust_fname`, `cust_lname`, `cust_brgy`, `cust_municipality`, `cust_province`) VALUES
(1, 'Harry', 'Potts', 'Lingsat', 'City of San Fernando', 'La Union'),
(2, 'James Adamor', 'Castle', 'Tallaoen', 'Luna', 'La Union');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inventory`
--

CREATE TABLE `tbl_inventory` (
  `prod_id` int(12) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `prod_type` varchar(100) NOT NULL,
  `prod_quantity` int(5) NOT NULL,
  `prod_price` decimal(10,2) NOT NULL,
  `prod_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_inventory`
--

INSERT INTO `tbl_inventory` (`prod_id`, `prod_name`, `prod_type`, `prod_quantity`, `prod_price`, `prod_photo`) VALUES
(21100201, 'Fantech HG17S Visage II Stereo Gaming Headset', 'Peripherals', 6, 595.00, '../../product_images/headset1.jpg'),
(21100202, 'Fantech Raigor II WG10 Wireless Gaming Mouse Gray White Red', 'Peripherals', 10, 295.00, '../../product_images/mouse1.jpg'),
(21100203, 'Intel Core i3-12100', 'PC Parts', 3, 7290.00, '../../product_images/i3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(8) NOT NULL,
  `money_tendered` decimal(10,2) NOT NULL,
  `amount_left` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `money_tendered`, `amount_left`) VALUES
(20, 600.00, 5.00),
(21, 600.00, 10.00),
(22, 1500.00, 310.00),
(23, 400.00, 105.00),
(24, 7500.00, 210.00),
(28, 8000.00, 710.00),
(29, 1000.00, 110.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction`
--

CREATE TABLE `tbl_transaction` (
  `transact_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `transact_date` date NOT NULL,
  `payment_id` int(8) NOT NULL,
  `total_trans` decimal(10,2) NOT NULL,
  `total_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_transaction`
--

INSERT INTO `tbl_transaction` (`transact_id`, `cust_id`, `transact_date`, `payment_id`, `total_trans`, `total_quantity`) VALUES
(20, 1, '2024-04-13', 20, 595.00, 1),
(21, 1, '2024-04-24', 21, 590.00, 2),
(22, 1, '2024-04-24', 22, 1190.00, 2),
(23, 2, '2024-05-05', 23, 295.00, 1),
(24, 2, '2024-05-07', 24, 7290.00, 1),
(28, 2, '2024-05-12', 28, 7290.00, 1),
(29, 2, '2024-05-13', 29, 890.00, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction_details`
--

CREATE TABLE `tbl_transaction_details` (
  `trans_detail_id` int(8) NOT NULL,
  `transact_id` int(8) NOT NULL,
  `prod_id` int(8) NOT NULL,
  `quantity_purchased` int(8) NOT NULL,
  `price_per_item` decimal(10,2) NOT NULL,
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_transaction_details`
--

INSERT INTO `tbl_transaction_details` (`trans_detail_id`, `transact_id`, `prod_id`, `quantity_purchased`, `price_per_item`, `total_price`) VALUES
(1, 20, 21100201, 1, 595.00, 595.00),
(2, 21, 21100202, 2, 295.00, 590.00),
(3, 22, 21100201, 2, 595.00, 1190.00),
(4, 23, 21100202, 1, 295.00, 295.00),
(5, 24, 21100203, 1, 7290.00, 7290.00),
(9, 28, 21100203, 1, 7290.00, 7290.00),
(10, 29, 21100201, 1, 595.00, 595.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `uid` int(8) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `ulevel` varchar(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`uid`, `username`, `password`, `ulevel`, `fname`, `lname`) VALUES
(1, 'admin', '$2y$10$QCnZUQQY5J4408Kyre8KFe82ZZ9GDvDG..xou3CtLzi3TdujYS5FS', 'Administrator', 'Jerwin', 'Chan'),
(2, 'cashier1', '$2y$10$SOmPdD/6LbxncEcROKYVIeZmBRuxsTGxrtTEX28BTA.5sADdbzXSa', 'Cashier', 'Jack', 'Cruz'),
(3, 'cashier2', '$2y$10$uSC0RkdPWhlqoOTS6FkPxeFhJR6LGcKWLg4XGsb9n24', 'Cashier', 'Jenny', 'Hanes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD PRIMARY KEY (`transact_id`),
  ADD KEY `FK_to_tbl_payment` (`payment_id`),
  ADD KEY `FK_tbl_customers` (`cust_id`);

--
-- Indexes for table `tbl_transaction_details`
--
ALTER TABLE `tbl_transaction_details`
  ADD PRIMARY KEY (`trans_detail_id`),
  ADD KEY `FK_tbl_transaction` (`transact_id`),
  ADD KEY `FK_tbl_products` (`prod_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `uid` (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `cust_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_inventory`
--
ALTER TABLE `tbl_inventory`
  MODIFY `prod_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21100204;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  MODIFY `transact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_transaction_details`
--
ALTER TABLE `tbl_transaction_details`
  MODIFY `trans_detail_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `uid` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_transaction`
--
ALTER TABLE `tbl_transaction`
  ADD CONSTRAINT `FK_tbl_customers` FOREIGN KEY (`cust_id`) REFERENCES `tbl_customer` (`cust_id`),
  ADD CONSTRAINT `FK_to_tbl_payment` FOREIGN KEY (`payment_id`) REFERENCES `tbl_payment` (`payment_id`);

--
-- Constraints for table `tbl_transaction_details`
--
ALTER TABLE `tbl_transaction_details`
  ADD CONSTRAINT `FK_tbl_products` FOREIGN KEY (`prod_id`) REFERENCES `tbl_inventory` (`prod_id`),
  ADD CONSTRAINT `FK_tbl_transaction` FOREIGN KEY (`transact_id`) REFERENCES `tbl_transaction` (`transact_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
