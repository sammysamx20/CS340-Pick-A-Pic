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
-- Table structure for table `FinComment`
--

CREATE TABLE `FinComment` (
  `commentID` int(20) NOT NULL,
  `pictureID` int(20) NOT NULL,
  `Content` varchar(1000) NOT NULL,
  `Owner` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FinComment`
--

INSERT INTO `FinComment` (`commentID`, `pictureID`, `Content`, `Owner`) VALUES
(436415, 9785945, 'sexy', 'sammysamx20'),
(529474, 6887778, 'repeats?', 'User1'),
(569090, 4253086, 'Hi', 'User1'),
(1145851, 1767072, 'looks good', 'User1'),
(1850305, 5385362, 'this looks GREATT!!!', 'User1'),
(1905475, 1767072, 'wow', 'User1'),
(3213701, 2140487, 'looks good', ''),
(3248494, 3831759, 'This isn\'t what I thought it was', 'new user'),
(3649932, 1767072, 'hi', 'rewq'),
(3839135, 4253086, 'This is still ugly af', 'User2'),
(4068864, 9097109, 'this looks GREATT!!!', 'User1'),
(4301102, 1767072, 'BANANANANNANANAA', 'User1'),
(4323599, 9097109, 'this looks GREATT!!!', 'User1'),
(4354090, 4253086, 'Hi', 'User1'),
(4474936, 937121, 'hey ben', 'User1'),
(4492423, 6887778, 'looks good', 'User1'),
(4497800, 1767072, 'wow', 'User1'),
(4656720, 3831759, 'Picked up a summer class that conflicts with most shifts I picked up between the 18th and 22nd of June', 'User1'),
(4781549, 4253086, 'YOU UGLY', 'User1'),
(4960355, 1767072, 'wow', 'User1'),
(5073870, 1767072, 'New comment', 'User1'),
(5166214, 4253086, 'YOU UGLY', 'User1'),
(5277007, 1767072, 'wow', 'User1'),
(5367913, 9785945, 'thanks rewq', 'sammysamx20'),
(5791606, 2762007, 'Good picture', 'User1'),
(5912437, 1767072, 'wow', 'User1'),
(6109808, 4253086, 'This isn\'t what I thought it was', 'User1'),
(6158787, 4253086, 'This is still ugly af', 'User2'),
(6501286, 1767072, 'BANANANANNANANAA', 'User1'),
(7507165, 4253086, 'anoter test comment', 'User1'),
(7529151, 6887778, 'it only shows after', 'User1'),
(7596010, 1767072, 'fdsafdsafdsa', 'User1'),
(7885571, 4253086, 'Test', 'User1'),
(8113515, 3831759, 'Good picture', 'User1'),
(8333639, 937121, 'different', 'User2'),
(8433333, 937121, 'different', 'User2'),
(8935780, 5385362, 'this looks GREATT!!!', 'User1'),
(9177631, 9785945, 'looks good', 'rewq'),
(9224203, 9785945, 'This isn\'t what I thought it was', 'new user3'),
(9400028, 9785945, 'looks good', 'rewq'),
(9607517, 6887778, 'wow looks nice', 'User1'),
(9612757, 1767072, 'wow', 'User1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `FinComment`
--
ALTER TABLE `FinComment`
  ADD PRIMARY KEY (`commentID`),
  ADD KEY `Owner` (`Owner`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
