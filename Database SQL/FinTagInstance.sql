-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: classmysql.engr.oregonstate.edu:3306
-- Generation Time: Jun 11, 2018 at 02:20 AM
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
-- Table structure for table `FinTagInstance`
--

CREATE TABLE `FinTagInstance` (
  `pictureID` int(20) NOT NULL,
  `tagName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FinTagInstance`
--

INSERT INTO `FinTagInstance` (`pictureID`, `tagName`) VALUES
(1, 'Flavourtext'),
(1, 'Muffled screaming'),
(1, 'My life'),
(1, 'SWAG'),
(937121, 'cool'),
(1767072, 'hi'),
(1767072, 'I was there'),
(1767072, 'I was thereojdiojsfiojdsiofjds'),
(1767072, 'ugghh....'),
(5385362, 'peanut'),
(6021731, 'bot'),
(6021731, 'YOLO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `FinTagInstance`
--
ALTER TABLE `FinTagInstance`
  ADD PRIMARY KEY (`pictureID`,`tagName`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `FinTagInstance`
--
ALTER TABLE `FinTagInstance`
  ADD CONSTRAINT `FinTagInstance_ibfk_1` FOREIGN KEY (`pictureID`) REFERENCES `FinPicture` (`pictureID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
