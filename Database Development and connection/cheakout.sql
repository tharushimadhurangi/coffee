-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 18, 2024 at 12:33 PM
-- Server version: 8.4.0
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cheakout`
--

-- --------------------------------------------------------

--
-- Table structure for table `pay`
--

CREATE TABLE `pay` (
  `card_number` varchar(16) DEFAULT NULL,
  `expiration_date` int NOT NULL,
  `cvv` int NOT NULL,
  `total_price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pay`
--

INSERT INTO `pay` (`card_number`, `expiration_date`, `cvv`, `total_price`) VALUES
('234567', 13, 345, 1200),
('2423537658', 14, 346, 1560),
('5678789', 14, 456, 5670),
('23235346457', 2, 432, 6790),
('35346457568', 6, 789, 4560),
('35346457568', 6, 789, 4560),
('35346457568', 6, 789, 4560),
('35346457568', 6, 789, 4560),
('35346457568', 6, 789, 4560),
('346457685686', 6, 340, 6790),
('41356787890', 12, 569, 780),
('343657868', 4, 568, 1570),
('343657868', 4, 568, 1570),
('343657868', 4, 568, 1570),
('343657868', 4, 568, 1570);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
