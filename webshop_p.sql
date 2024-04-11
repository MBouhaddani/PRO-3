-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2024 at 07:01 PM
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
-- Database: `webshop_p`
--

-- --------------------------------------------------------

--
-- Table structure for table `bestelling`
--

CREATE TABLE `bestelling` (
  `bestellingcode` int(11) NOT NULL,
  `klantcode` int(11) NOT NULL,
  `productcode` int(11) NOT NULL,
  `aantal` int(11) NOT NULL,
  `besteldatum` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `klant`
--

CREATE TABLE `klant` (
  `klantcode` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `adres` varchar(100) NOT NULL,
  `plaats` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klant`
--

INSERT INTO `klant` (`klantcode`, `type`, `adres`, `plaats`) VALUES
(1, 'Pieter Jansse', 'Xanderstraat 120', 'Rotterdam'),
(2, 'William Franss', 'Utestraat 44', 'Amsterdam');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productcode` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `voor` varchar(100) NOT NULL,
  `club` varchar(100) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `prijs` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productcode`, `type`, `voor`, `club`, `merk`, `prijs`) VALUES
(1, 'Voetbalshirt', 'Heren', 'Feyenoord', 'Castor', 90.00),
(2, 'Trainingspak', 'Heren', 'Utrecht', 'Castore', 140.00),
(3, 'Voetbalshirt', 'Dames', 'Feyenoord', 'Castore', 80.00),
(4, 'Trainingspak', 'Dames', 'Utrecht', 'Castore', 130.00),
(5, 'Voetbalshirt', 'Kinderen', 'Feyenoord', 'Castore', 70.00),
(6, 'Trainingspak', 'Kinderen', 'Utrecht', 'Castore', 120.00),
(7, 'Voetbalshirt', 'Heren', 'Ajax', 'Adidas', 100.00),
(8, 'Trainigspak', 'Heren', 'Ajax', 'Adidas', 180.00),
(9, 'Voetbalshirt', 'Dames', 'Ajax', 'Adidas', 100.00),
(10, 'Trainigspak', 'Dames', 'Ajax', 'Adidas', 180.00),
(11, 'Voetbalshirt', 'Kinderen', 'Ajax', 'Adidas', 100.00),
(12, 'Trainigspak', 'Kinderen', 'Ajax', 'Adidas', 180.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bestelling`
--
ALTER TABLE `bestelling`
  ADD PRIMARY KEY (`bestellingcode`),
  ADD KEY `klantcode` (`klantcode`),
  ADD KEY `productcode` (`productcode`);

--
-- Indexes for table `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`klantcode`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productcode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bestelling`
--
ALTER TABLE `bestelling`
  MODIFY `bestellingcode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `klant`
--
ALTER TABLE `klant`
  MODIFY `klantcode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productcode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bestelling`
--
ALTER TABLE `bestelling`
  ADD CONSTRAINT `bestelling_ibfk_1` FOREIGN KEY (`productcode`) REFERENCES `product` (`productcode`),
  ADD CONSTRAINT `bestelling_ibfk_2` FOREIGN KEY (`klantcode`) REFERENCES `klant` (`klantcode`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
