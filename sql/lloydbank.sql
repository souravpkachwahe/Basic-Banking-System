-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2021 at 03:56 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sparks_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction`

--


CREATE TABLE `transaction` (
  `Sno` int(3) NOT NULL,
  `Sender` text NOT NULL,
  `Receiver` text NOT NULL,
  `Balance` int(8) NOT NULL,
  `Datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



CREATE TABLE `users` (
  `Id` int(5) NOT NULL,
  `First Name` text NOT NULL,
  `Last Name` text NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Balance` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`Id`, `First Name`, `Last Name`,`Email`, `Balance`) 
VALUES 
(1,'Dikshant','Verma','dikshant@gmail.com', 3000),
(2,'Shah Minhal','Fida', 'minhal@gmail.com', 5000),
(3,'Satyam','Sahay','satyam@gmail.com', 2000),
(4,'Shikhar','Sharma','shikhar@gmail.com', 6000),
(5,'Tejas','S','Tejas@gmail.com', 7000),
(6,'Shashank','C','shashank@gmail.com', 5000),
(7,'Thanuj','Kumar','thanuj@gmail.com', 1000),
(8,'Sharath','C','sharath@gmail.com', 9000),
(9,'Sanjay','H S','sanjay@gmail.com', 1000),
(10,'SriHari','U','srihari@gmail.com', 9000);



--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`Sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `Sno` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `Users`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
