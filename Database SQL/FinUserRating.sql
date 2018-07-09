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
-- Table structure for table `FinUserRating`
--

CREATE TABLE `FinUserRating` (
  `Owner` varchar(20) NOT NULL,
  `Rating` int(1) NOT NULL,
  `Picture` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FinUserRating`
--

INSERT INTO `FinUserRating` (`Owner`, `Rating`, `Picture`) VALUES
('123456', 5, 937121),
('abC123', 3, 1767072),
('l3lah', 3, 1767072),
('rewq', 0, 937121),
('rewq', 1, 9785945),
('sam', 1, 2140487),
('sammysamx20', 5, 9785945),
('User1', 5, 1),
('User1', 4, 4),
('User1', 4, 5),
('User1', 0, 1767072),
('User1', 3, 2323646),
('User1', 0, 3831759),
('User1', 0, 4253086),
('User1', 2, 5266433),
('User1', 3, 6887778),
('User1', 5, 9097109),
('User2', 3, 1),
('User2', 5, 1767072),
('User3', 2, 1);

--
-- Triggers `FinUserRating`
--
DELIMITER $$
CREATE TRIGGER `REMOVEPICTURERATING` AFTER DELETE ON `FinUserRating` FOR EACH ROW BEGIN
	UPDATE FinPicture
    SET Rating = (SELECT AVG(R.Rating)
FROM FinUserRating R
WHERE R.Picture = old.Picture)
    WHERE pictureID = old.Picture;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `UPDATEPICTURERATING` AFTER INSERT ON `FinUserRating` FOR EACH ROW BEGIN
	UPDATE FinPicture
    SET Rating = (SELECT AVG(R.Rating)
FROM FinUserRating R
WHERE R.Picture = new.Picture)
    WHERE pictureID = new.Picture;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `UPDATEPICTURERATINGUPDATE` AFTER UPDATE ON `FinUserRating` FOR EACH ROW BEGIN
	UPDATE FinPicture
    SET Rating = (SELECT AVG(R.Rating)
FROM FinUserRating R
WHERE R.Picture = new.Picture)
    WHERE pictureID = new.Picture;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `FinUserRating`
--
ALTER TABLE `FinUserRating`
  ADD PRIMARY KEY (`Owner`,`Picture`),
  ADD KEY `Picture` (`Picture`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
