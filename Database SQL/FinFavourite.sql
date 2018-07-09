-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: classmysql.engr.oregonstate.edu:3306
-- Generation Time: Jun 11, 2018 at 02:19 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cs340_youngsam`
--

-- --------------------------------------------------------

--
-- Table structure for table `FinFavourite`
--

CREATE TABLE `FinFavourite` (
  `userID` varchar(20) NOT NULL,
  `pictureID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FinFavourite`
--

INSERT INTO `FinFavourite` (`userID`, `pictureID`) VALUES
('', 937121),
('', 1767072),
('abC123', 1767072),
('l3lah', 6021731),
('rewq', 937121),
('rewq', 5385362),
('rewq', 6021731),
('sammysamx20', 9785945),
('User1', 4),
('User1', 937121),
('User1', 3831759),
('User1', 4253086),
('User2', 4),
('User3', 4),
('User4', 4),
('User5', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `FinFavourite`
--
ALTER TABLE `FinFavourite`
  ADD PRIMARY KEY (`userID`,`pictureID`),
  ADD KEY `pictureID` (`pictureID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
