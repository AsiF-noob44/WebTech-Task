-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2025 at 09:04 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `books`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookstable`
--

CREATE TABLE `bookstable` (
  `id` int(10) NOT NULL,
  `book_Name` varchar(200) NOT NULL,
  `author_Name` varchar(100) NOT NULL,
  `quantity` int(10) NOT NULL,
  `publication_Year` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookstable`
--

INSERT INTO `bookstable` (`id`, `book_Name`, `author_Name`, `quantity`, `publication_Year`) VALUES
(1, 'The Arab of the Future', 'Riad Sattouf', 799, 2015),
(2, 'Fundamentals of Physics', 'David Halliday', 1000, 2013),
(3, 'Fundamentals of Physics and Chemistry of the Atmosphere', 'Guido Visconti', 50, 2016),
(4, 'To Kill a Mockingbird', 'Harper Lee', 10, 1960),
(5, 'The Great Gatsby', 'F. Scott Fitzgerald', 30, 1925);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookstable`
--
ALTER TABLE `bookstable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookstable`
--
ALTER TABLE `bookstable`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
