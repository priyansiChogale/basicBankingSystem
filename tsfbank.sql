-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 11, 2021 at 05:56 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tsfbank`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `amount`) VALUES
(1, 'Priyansi Chogale', 'priyansi@example.com', 19310),
(2, 'Meena Shah', 'meena@example.com', 30800),
(3, 'Ram Yadav', 'ram@example.com', 38000),
(4, 'Radha Joshi', 'radha@example.com', 20310),
(5, 'Naina Shah', 'naina@example.com', 34950),
(6, 'Rajiv Raut', 'rajiv@example.com', 50590),
(7, 'Nitin Sharma', 'nitin@example.com', 45090),
(8, 'Sanaya Pathak', 'sanaya@example.com', 34510),
(9, 'Supriya Naik', 'supriya@example.com', 54490),
(10, 'Sandeep Verma', 'sandeep@example.com', 42900);

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

DROP TABLE IF EXISTS `transfers`;
CREATE TABLE IF NOT EXISTS `transfers` (
  `Sender` varchar(255) NOT NULL,
  `Receiver` varchar(255) NOT NULL,
  `Amount` float NOT NULL,
  `Date & Time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`Sender`, `Receiver`, `Amount`, `Date & Time`) VALUES
('Ram Yadav', 'Meena Shah', 800, '2021-07-10 00:40:22'),
('Nitin Sharma', 'Ram Yadav', 3000, '2021-07-10 11:00:43'),
('Priyansi Chogale', 'Nitin Sharma', 90, '2021-07-10 11:15:56'),
('Meena Shah', 'Sanaya Pathak', 20, '2021-07-10 20:24:46'),
('Supriya Naik', 'Radha Joshi', 510, '2021-07-10 23:38:09'),
('Naina Shah', 'Nitin Sharma', 5000, '2021-07-10 23:43:42');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
