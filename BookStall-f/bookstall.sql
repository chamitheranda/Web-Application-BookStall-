-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2023 at 11:41 AM
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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `pass`, `mail`) VALUES
(1, 'admin1', '123', 'admin@admin.lk');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(450) NOT NULL,
  `ISBN` varchar(450) NOT NULL,
  `Picture` varchar(450) NOT NULL,
  `Author` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `Categories` varchar(450) NOT NULL,
  `Price` float NOT NULL,
  `Description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `ISBN`, `Picture`, `Author`, `Status`, `year`, `Categories`, `Price`, `Description`) VALUES
(28, 'min.p v', 'min.p', 'https://pixlr.com/img/misc/e-icon.svg', 'min.p', 1, 0, '1', 0, 'min.p');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `bname` varchar(50) NOT NULL,
  `bprice` int(6) NOT NULL,
  `qty` int(5) NOT NULL,
  `id` int(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `books` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `books`) VALUES
(1, 'Thriller', 1, '0'),
(2, 'kk', 1, '0'),
(3, '0', 1, '0'),
(4, 'vsfvsd', 1, '0'),
(5, 'bvfver', 1, '0'),
(6, '9156', 1, '0'),
(7, 'lk-69', 1, '0'),
(8, '4545', 1, '0'),
(9, 'lipo', 1, '0'),
(10, '0054', 1, '0');

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

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `img_id` int(10) NOT NULL,
  `img` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `transactions` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `transactions`, `amount`, `date`) VALUES
(1, 1, 100, '0000-00-00'),
(2, 2, 200, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ID` int(5) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `rate` varchar(10) DEFAULT NULL,
  `feedback` varchar(500) DEFAULT NULL,
  `bname` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ID`, `name`, `email`, `rate`, `feedback`, `bname`) VALUES
(22, 'kasun maduranga', 'kasun@gmail.com', '4stars', 'It is a very good book .', 'Butterfly Lion'),
(27, 'sasindu rukshan', 'rukshan@gmail.com', '1star', 'Nice book\r\n', 'Retro'),
(23, 'supun rasanga', 'rasanga@gmail.com', '5stars', 'Acctually very good product ', 'Epic'),
(24, 'sisun sahara', 'sahara@gmail.com', '1star', 'Product is not good .', 'Sample Text'),
(25, 'farook mohommad', 'faruk@gmail.com', '2stars', 'Content is not good ', 'Soul Stealer'),
(26, 'tharindu madhushan', 'madushan@gmail.com', '3stars', 'Normal products ', 'Retro'),
(28, 'udesh indumina', 'indumina@gmail.com', '4stars', 'it is a good book .', 'Soul Stealer'),
(30, 'santhosh', 'eranda@gmail.com', '1star', 'dwertyu', 'Retro'),
(31, 'santhosh', 'eranda@gmail.com', '1star', 'dwertyu', 'Retro'),
(32, 'santhosh', 'eranda@gmail.com', '1star', 'dwertyu', 'Retro');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `book` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user`, `book`, `qty`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 2),
(3, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `status`, `name`, `address`, `mail`, `pass`, `phone`) VALUES
(1, 1, 'bnijenbijler', 'blknfkd., townies, 6516051', 'admin@lk', '123', '0454514'),
(2, 1, 'admi7871', '#34, park ave, colombi 69, 0120345', 'admin@admin.lk', 'pass', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(0) NOT NULL,
  `address` varchar(0) NOT NULL,
  `mail` varchar(0) NOT NULL,
  `password` varchar(0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featured`
--
ALTER TABLE `featured`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`img_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `featured`
--
ALTER TABLE `featured`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `img_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
