-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 19, 2023 at 04:00 AM
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
(1, 'Slayer', 'ISBN 1', 'image/book-1.png', 'john cathol', 1, 1997, '2', '$15.99', '<h2>About the Author </h2> Kiersten White is the New York Times bestselling author of many books for teens and young readers, including And I Darken, Now I Rise, Bright We Burn, The Dark Descent of Elizabeth Frankenstein, and Slayer. She lives with her family near the ocean in San Diego, where she perpetually lurks in the shadows. Visit Kiersten online at KierstenWhite.com and follow @KierstenWhite on Twitter.'),
(2, 'Soul Stealer', 'ISBN 2', 'image/book-2.png', 'Andrew philips', 1, 2002, '2', '$13.99', '<h2>Dear Reader,</h2>This labor of love took me a little over three years to write and two years to edit. I really like how it turned out, and I hope you do too. I didn\'t even intend to publish it at first, but 350 pages later, I knew I wanted to share this story.'),
(4, 'Sister', 'ISBN 3', 'image/book-4.png', 'Sarath ', 1, 2004, '1', '$13.99', 'In 1997 Isabel Quirke sits down to write a letter to her sister. A letter she never intends to send. Within the pages of that letter she describes the frightening events that lead up to the disintegration of their relationship.'),
(6, 'Epic', 'ISBN 4', 'image/book-6.png', 'david', 1, 2007, '1', '$28.99', '<h2>About the Author </h2>About the author (2011) Michael Morpurgo OBE is one of Britain\'s best-loved writers for children, and has sold more than 35 million books around the world. He has written more than 150 novels and won many prizes, including the Smarties Prize, the Whitbread Award and the Blue Peter Book Award, while several of his books have been adapted for stage and screen, including the global theatrical phenomenon War Horse. Michael was Children’s Laureate from 2003 to 2005, and founded the charity Farms for City Children with his wife, Clare. He was knighted in 2018 for services to literature and charity.	'),
(7, 'Butterfly Lion', 'ISBN 5', 'image/book-5.png', 'James', 1, 2004, '1', '$15.99', '<h2>About the Author </h2>John Eldredge is a bestselling author, a counselor, and a teacher. He is also president of Ransomed Heart, a ministry devoted to helping people discover the heart of God, recover their own hearts in God\'s love, and learn to live in God\'s kingdom. John and his wife, Stasi, live near Colorado Springs, Colorado.'),
(9, 'Sample Text', 'ISBN 7', 'image/book-7.png', 'Arthor', 1, 2008, '3', '$13.99', 'This English textbook links directly to the National Curriculum and mixes clear accessible teaching with opportunities to talk about and practice key English concepts. Each textbook is accompanied by a Planning and Assessment Guide, which is designed to support the teacher in planning and assessing the content of the programme.\r\n'),
(10, 'Black History Month', 'ISBN 8', 'image/book-8.png', 'Victor', 1, 2001, '3', '$14.99', '<h2>From the Author </h2>This labor of love took me a little over three years to write and two years to edit. I really like how it turned out, and I hope you do too. I didn\'t even intend to publish it at first, but 350 pages later, I knew I wanted to share this story.\r\n'),
(11, 'Bay Street', 'ISBN 9', 'image/book-9.png', 'Luwice', 1, 2008, '2', '$28.99', '<h2>About the Author </h2>Philip Slayton studied law at Oxford University as a Rhodes Scholar, and then clerked at the Supreme Court of Canada. In the first chapter of his legal career he was a law professor and dean of law at Western University.\r\n'),
(12, 'Retro', 'ISBN 11', 'image/book-10.png', 'Tylor', 1, 2005, '1', '$43.99', '<h2>Dear Reader,</h2>This labor of love took me a little over three years to write and two years to edit. I really like how it turned out, and I hope you do too. I didn\'t even intend to publish it at first, but 350 pages later, I knew I wanted to share this story.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
