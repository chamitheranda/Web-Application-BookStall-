-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 19, 2023 at 02:39 AM
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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
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

DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `ISBN` varchar(450) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `Author` varchar(250) NOT NULL,
  `Status` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `Categories` varchar(450) NOT NULL,
  `Price` varchar(11) NOT NULL,
  `Description` varchar(3000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `ISBN`, `picture`, `Author`, `Status`, `year`, `Categories`, `Price`, `Description`) VALUES
(1, 'Slayer', '', 'image/book-1.png', '', 0, 0, '', '$15.99', '<h2>About the Author </h2> Kiersten White is the New York Times bestselling author of many books for teens and young readers, including And I Darken, Now I Rise, Bright We Burn, The Dark Descent of Elizabeth Frankenstein, and Slayer. She lives with her family near the ocean in San Diego, where she perpetually lurks in the shadows. Visit Kiersten online at KierstenWhite.com and follow @KierstenWhite on Twitter.'),
(2, 'Soul Stealer', '', 'image/book-2.png', '', 0, 0, '', '$13.99', '<h2>Dear Reader,</h2>This labor of love took me a little over three years to write and two years to edit. I really like how it turned out, and I hope you do too. I didn\'t even intend to publish it at first, but 350 pages later, I knew I wanted to share this story.'),
(4, 'Sister', '', 'image/book-4.png', '', 0, 0, '', '$13.99', 'In 1997 Isabel Quirke sits down to write a letter to her sister. A letter she never intends to send. Within the pages of that letter she describes the frightening events that lead up to the disintegration of their relationship.'),
(6, 'Epic', '', 'image/book-6.png', '', 0, 0, '', '$28.99', '<h2>About the Author </h2>About the author (2011) Michael Morpurgo OBE is one of Britain\'s best-loved writers for children, and has sold more than 35 million books around the world. He has written more than 150 novels and won many prizes, including the Smarties Prize, the Whitbread Award and the Blue Peter Book Award, while several of his books have been adapted for stage and screen, including the global theatrical phenomenon War Horse. Michael was Children’s Laureate from 2003 to 2005, and founded the charity Farms for City Children with his wife, Clare. He was knighted in 2018 for services to literature and charity.	'),
(7, 'Butterfly Lion', '', 'image/book-5.png', '', 0, 0, '', '$15.99', '<h2>About the Author </h2>John Eldredge is a bestselling author, a counselor, and a teacher. He is also president of Ransomed Heart, a ministry devoted to helping people discover the heart of God, recover their own hearts in God\'s love, and learn to live in God\'s kingdom. John and his wife, Stasi, live near Colorado Springs, Colorado.'),
(9, 'Sample Text', '', 'image/book-7.png', '', 0, 0, '', '$13.99', 'This English textbook links directly to the National Curriculum and mixes clear accessible teaching with opportunities to talk about and practice key English concepts. Each textbook is accompanied by a Planning and Assessment Guide, which is designed to support the teacher in planning and assessing the content of the programme.\r\n'),
(10, 'Black History Month', '', 'image/book-8.png', '', 0, 0, '', '$14.99', '<h2>From the Author </h2>This labor of love took me a little over three years to write and two years to edit. I really like how it turned out, and I hope you do too. I didn\'t even intend to publish it at first, but 350 pages later, I knew I wanted to share this story.\r\n'),
(11, 'Bay Street', '', 'image/book-9.png', '', 0, 0, '', '$28.99', '<h2>About the Author </h2>Philip Slayton studied law at Oxford University as a Rhodes Scholar, and then clerked at the Supreme Court of Canada. In the first chapter of his legal career he was a law professor and dean of law at Western University.\r\n'),
(12, 'Retro', '', 'image/book-10.png', '', 0, 0, '', '$43.99', '<h2>Dear Reader,</h2>This labor of love took me a little over three years to write and two years to edit. I really like how it turned out, and I hope you do too. I didn\'t even intend to publish it at first, but 350 pages later, I knew I wanted to share this story.');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `bname` varchar(50) NOT NULL,
  `qty` int(230) NOT NULL,
  `userEmail` varchar(40) NOT NULL,
  `bprice` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `bname`, `qty`, `userEmail`, `bprice`) VALUES
(4, 'Sister', 6, 'kasun@gmail.com', 13),
(5, 'Slayer', 4, 'kasun@gmail.com', 15),
(23, 'Sample Text', 28, 'kasun@gmail.com', 13.99);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `books` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `books`) VALUES
(1, 'Thriller', 0, '0');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `number` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`user_id`, `name`, `email`, `number`, `message`) VALUES
(1, 'hello mario', 'ishinihettiarachchiuv@gmail.com', 1, 'good'),
(1, 'Hettiarachchige Dona Ishini Tharaka', 'ishinihettiarachchiuv@gmail.com', 1, 'dead'),
(3, 'final project', 'kasun@gmail.com', 768375556, '3eswds');

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
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL,
  `transactions` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `bname` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

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

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `book` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `phone` varchar(220) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `status`, `fName`, `lName`, `pass`, `mail`, `phone`) VALUES
(1, 1, '', '', '', '', ''),
(2, 1, 'chamith', '', '', '', ''),
(3, 1, 'chamith', 'eranda', '2222', 'kasun@gmail.com', ''),
(4, 1, 'udesh', 'indumina', 'ttt', 'rasanga@gmail.com', ''),
(5, 1, 'sadaru', 'susil', 'iii', 'sahara@gmail.com', ''),
(6, 1, '', '', '', '', ''),
(7, 1, 'asanka', 'rukshan', '333', 'rukshan@gmail.com', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
