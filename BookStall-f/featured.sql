-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2023 at 11:51 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `featured`
--

CREATE TABLE `featured` (
  `id` int(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `current_price` varchar(50) NOT NULL,
  `old_price` varchar(50) NOT NULL,
  `page_name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `featured`
--
ALTER TABLE `featured`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `featured`
--
ALTER TABLE `featured`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
