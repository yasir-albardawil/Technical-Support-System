-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2016 at 11:19 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kfu_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `Ticket_no` int(10) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Item` varchar(100) NOT NULL,
  `Subject_id` int(10) NOT NULL,
  `Message` varchar(100) NOT NULL,
  `Emp_no` int(10) NOT NULL,
  `Lab_no` int(10) NOT NULL,
  `Recipient` varchar(10) NOT NULL,
  `Date` varchar(100) NOT NULL,
  `Status` varchar(100) NOT NULL,
  `Compeltion_date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`Ticket_no`, `Type`, `Item`, `Subject_id`, `Message`, `Emp_no`, `Lab_no`, `Recipient`, `Date`, `Status`, `Compeltion_date`) VALUES
(1, '0', 'Labtop', 0, 'I have a virus on my laptop.', 3, 1222, 'support', '08/25/2016 10:44:00 AM', 'Solved', '10/04/2016'),
(2, '1', 'Project', 0, 'The projector doesn''t work.', 3, 1239, '', '08/25/2016 10:47:21 AM', 'Open', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`Ticket_no`),
  ADD KEY `FK_ticket` (`Emp_no`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `FK_ticket` FOREIGN KEY (`Emp_no`) REFERENCES `users` (`Emp_no`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
