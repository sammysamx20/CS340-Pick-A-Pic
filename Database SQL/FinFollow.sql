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
-- Table structure for table `FinFollow`
--

CREATE TABLE `FinFollow` (
  `Follower` varchar(20) NOT NULL,
  `Followed` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FinFollow`
--

INSERT INTO `FinFollow` (`Follower`, `Followed`) VALUES
('123456', 'sammysamx20'),
('123456', 'User1'),
('abC123', 'User1'),
('drater', 'User1'),
('jojo', 'sammysamx20'),
('jojo', 'User1'),
('new user3', 'rewq'),
('new user3', 'sammysamx20'),
('new user3', 'User1'),
('rewq', ''),
('rewq', 'bid'),
('rewq', 'kid'),
('rewq', 'User1'),
('rjeioa', 'User4'),
('rjeioaj', 'User4'),
('sam', 'sammysamx20'),
('sammysamx20', 'User1'),
('the best music', 'User4'),
('User1', 'rewq'),
('User1', 'User2'),
('User2', 'User1'),
('User3', 'User4'),
('User4', 'User3'),
('User5', 'User1'),
('Username77', 'User1'),
('walter', 'User4'),
('wfdsafds', 'User4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `FinFollow`
--
ALTER TABLE `FinFollow`
  ADD PRIMARY KEY (`Follower`,`Followed`),
  ADD KEY `Followed` (`Followed`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
