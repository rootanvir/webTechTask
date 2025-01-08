-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2025 at 01:28 PM
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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_borrowing_system`
--

CREATE TABLE `book_borrowing_system` (
  `isbn` varchar(20) NOT NULL,
  `book_title` varchar(32) NOT NULL,
  `author_name` varchar(32) NOT NULL,
  `quantity` int(10) NOT NULL,
  `is_fiction` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `book_borrowing_system`
--

INSERT INTO `book_borrowing_system` (`isbn`, `book_title`, `author_name`, `quantity`, `is_fiction`) VALUES
('test123', 'The test book', 'test name', 12342, 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_borrowing_system`
--
ALTER TABLE `book_borrowing_system`
  ADD PRIMARY KEY (`isbn`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
