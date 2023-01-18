-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 08, 2023 at 04:24 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstall`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `bname` varchar(50) NOT NULL,
  `bprice` int(6) NOT NULL,
  `qty` int(5) NOT NULL,
  `id` int(8) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`bname`, `bprice`, `qty`, `id`) VALUES
('Retro', 21, 3, 1),
('Retro', 21, 2, 2),
('Retro', 1, 2, 3),
('Retro', 1, 6, 4),
('Retro', 1, 7, 5),
('Retro', 1, 7, 6),
('Retro', 1, 5, 7);

-- --------------------------------------------------------

--
-- Table structure for table `featured`
--

DROP TABLE IF EXISTS `featured`;
CREATE TABLE IF NOT EXISTS `featured` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `current_price` varchar(50) NOT NULL,
  `old_price` varchar(50) NOT NULL,
  `page_name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `featured`
--

INSERT INTO `featured` (`id`, `img`, `name`, `current_price`, `old_price`, `page_name`) VALUES
(1, 'image/book-1.png', 'Slayer', '$15.99', '$20.00', 'product1.php'),
(2, 'image/book-2.png', 'Soul Stealer', '$13.99', '$20.00', 'product2.php'),
(3, 'image/book-3.png', 'Dragon\'s Heir', '$15.99', '$20.00', 'product3.php'),
(4, 'image/book-4.png', 'Sister', '$13.99', '$15.99', 'product4.php'),
(6, 'image/book-6.png', 'Epic', '$28.99', '$30.00', 'product6.php'),
(7, 'image/book-5.png', 'Butterfly Lion', '$15.99', '$20.00', 'product5.php'),
(9, 'image/book-7.png', 'Sample Text', '$13.99', '$15.99', 'product7.php'),
(10, 'image/book-8.png', 'Black History Month', '$14.99', '$19.00', 'product8.php'),
(11, 'image/book-9.png', 'Bay Street', '$28.99', '$30.00', 'product9.php'),
(12, 'image/book-10.png', 'Retro', '$43.99', '$50.00', 'product10.php');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

DROP TABLE IF EXISTS `offer`;
CREATE TABLE IF NOT EXISTS `offer` (
  `img_id` int(10) NOT NULL AUTO_INCREMENT,
  `img` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`img_id`, `img`) VALUES
(1, 'image/book-1.png'),
(2, 'image/book-2.png'),
(3, 'image/book-3.png'),
(4, 'image/book-4.png'),
(5, 'image/book-5.png'),
(6, 'image/book-6.png');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
CREATE TABLE IF NOT EXISTS `review` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `rate` varchar(10) DEFAULT NULL,
  `feedback` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ID`, `name`, `email`, `rate`, `feedback`) VALUES
(1, 'chamith', 'eranda@gmail.com', '3stars', 'I am satisfied'),
(2, 'chamith', 'eranda@gmail.com', '5stars', 'second'),
(3, 'cha', 'ffgefkmbd@lfnfr', '4stars', '6'),
(4, 'chamith', 'eranda@gmail.com', '1star', 'gtrhrt'),
(5, '', '', '1star', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
