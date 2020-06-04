-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2020 at 01:13 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pagedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(11) NOT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Birthday_day` int(2) NOT NULL,
  `Birthday_Month` varchar(2) NOT NULL,
  `Birthday_Year` int(4) NOT NULL,
  `Email_Id` varchar(50) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `Mobile_Number` bigint(10) NOT NULL,
  `Gender` char(1) NOT NULL,
  `Address` varchar(80) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Pin_Code` int(8) NOT NULL,
  `State` varchar(20) NOT NULL,
  `Contry_Name` varchar(20) NOT NULL,
  `ClassX_Board` varchar(50) NOT NULL,
  `ClassX_Percentage` double NOT NULL,
  `ClassX_YrOfPassing` int(4) NOT NULL,
  `ClassXII_Board` varchar(50) NOT NULL,
  `ClassXII_Percentage` double NOT NULL,
  `ClassXII_YrOfPassing` bigint(4) NOT NULL,
  `Graduation_Board` varchar(50) NOT NULL,
  `Graduation_Percentage` double NOT NULL,
  `Graduation_YrOfPassing` int(4) NOT NULL,
  `Masters_Board` varchar(50) NOT NULL,
  `Masters_Percentage` double NOT NULL,
  `Masters_YrOfPassing` int(4) NOT NULL,
  `Course` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `First_Name`, `Last_Name`, `Birthday_day`, `Birthday_Month`, `Birthday_Year`, `Email_Id`, `pass`, `Mobile_Number`, `Gender`, `Address`, `City`, `Pin_Code`, `State`, `Contry_Name`, `ClassX_Board`, `ClassX_Percentage`, `ClassX_YrOfPassing`, `ClassXII_Board`, `ClassXII_Percentage`, `ClassXII_YrOfPassing`, `Graduation_Board`, `Graduation_Percentage`, `Graduation_YrOfPassing`, `Masters_Board`, `Masters_Percentage`, `Masters_YrOfPassing`, `Course`) VALUES
(1, 'Kushagra', 'Agrawal', 5, '0', 1998, 'kushagra369@gmail.com', '', 9870741543, 'M', '299, Kali Bari', 'Bareilly', 243001, 'Uttar Pradesh', '-1', 'CBSE', 95, 2014, 'NIOS', 61, 2017, '', 0, 0, '', 0, 0, '5'),
(2, 'Kriti', 'Jaiswal', 10, '0', 1998, 'kritijaiswal101198@gmail.com', '', 9837889121, 'F', '1/2 A block', 'Delhi', 143221, 'Delhi', '-1', 'CBSE', 81, 2014, 'CBSE', 71, 2016, '', 0, 0, '', 0, 0, '5'),
(3, 'Neetu', 'Agrawal', 5, '0', 1980, 'neetupper@gmail.com', '', 7017126007, 'F', '230, Kali Bari', 'Bareilly', 243005, 'Uttar Pradesh', '-1', 'CBSE', 81, 2014, 'CBSE', 71, 2016, '', 0, 0, '', 0, 0, '2'),
(4, 'Lalu', 'Yadav', 1, '0', 2000, 'kjdcnercj@gmail.com', '', 9878787878, 'M', '983ukhnbwendihy38euuj', 'Patna', 657584, 'Bihar', '1', 'CBSE', 99, 1987, 'CBSE', 100, 1989, '', 0, 0, '', 0, 0, '3'),
(5, 'Kushagra', 'Agrawal', 1, '0', 2002, 'kushagra369@gmail.com', '', 9870741543, 'M', '299, Kali Bari', 'Bareilly', 243001, 'Uttar Pradesh', '1', 'CBSE', 95, 2014, 'CBSE', 75, 2017, '', 0, 0, '', 0, 0, '1'),
(8, 'Kushagra', 'Agrawal', 1, '0', 2002, 'tupper369@gmail.com', '', 9870741543, 'M', '299, Kali Bari', 'Bareilly', 243001, 'Uttar Pradesh', '1', 'CBSE', 95, 2014, 'CBSE', 75, 2017, '', 0, 0, '', 0, 0, '1'),
(9, 'wdqwd', 'awdw', 4, 'Fe', 2001, 'rashhhiii@gmail.com', '', 9898989898, 'M', 'dqwlwkjdnqewd', 'bareilly', 243001, 'Uttar Pradesh', '1', 'CBSE', 95, 2014, 'CBSE', 75, 2017, '', 0, 0, '', 0, 0, '2'),
(10, 'wdqwd', 'awdw', 4, 'Fe', 2001, 'rashhhiii@gmail.com', '', 9898989898, 'M', 'dqwlwkjdnqewd', 'bareilly', 243001, 'Uttar Pradesh', '1', 'CBSE', 95, 2014, 'CBSE', 75, 2017, '', 0, 0, '', 0, 0, '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
