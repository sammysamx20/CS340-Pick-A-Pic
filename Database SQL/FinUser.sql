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
-- Table structure for table `FinUser`
--

CREATE TABLE `FinUser` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `NumPics` int(11) NOT NULL DEFAULT '0',
  `email` varchar(20) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FinUser`
--

INSERT INTO `FinUser` (`Username`, `Password`, `NumPics`, `email`, `firstname`, `lastname`) VALUES
('123456', 'AbC123', 0, '1234', '123', '123'),
('1234567', '1234567Aa', 0, '12345', '12345', '2345'),
('abC123', 'abC123', 0, 'kljlkj', 'kjklja', 'lkjlk'),
('anotheruser', 'Password1', 0, 'joe@giddy.com', 'Joe', 'Giddy'),
('BobLoblaw', 'AbC123', 0, 'kjl', 'Bob', 'Loblaw'),
('drater', 'AbC123', 0, 'kajkljklj', 'John', 'L'),
('fewq', '123Asd', 0, 'feq', 'fewq', 'fewq'),
('jksdjhskkl', '322321SDASsdD', 0, 'dsjfhsd\'kjhfsdkjh', 'kjhjksdfhsjkfdsh\'kjh', 'sjdfh\'sjkdh'),
('jojo', 'AbC123', 0, 'jo', 'jo', 'jo'),
('l3lah', 'asdfeq!d1E', 1, 'joe@notavirus.com', 'Joe', 'kdsjfkls'),
('new user', 'Password1', 0, 'googleadmin@google.c', 'First', 'last'),
('new user2', 'Password1', 0, 'newuser@newuser.com', 'new', 'user'),
('new user3', 'Password1', 0, 'newuser@newuser.com', 'New', 'User'),
('rewq', '123Asd', 3, 'rewq', 'reqw', 'rewq'),
('safdsa', 'rewqrewr4390210jfsda', 0, 'rewqr', 'rewqre', 'rewqre'),
('sam', '123Asd', 1, 'hello@gmail.com', 'sam', 'young'),
('sammysamx20', '123Asd', 2, 'sammysamx20@gmail.co', 'Sam', 'Young'),
('User1', 'password', 4, '', '', ''),
('User2', 'password', 1, '', '', ''),
('User3', 'password', 1, '', '', ''),
('User4', 'password', 1, '', '', ''),
('User5', 'password', 1, '', '', ''),
('Username77', 'Password1', 0, 'place@home.com', 'Arch', 'Bi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `FinUser`
--
ALTER TABLE `FinUser`
  ADD PRIMARY KEY (`Username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
