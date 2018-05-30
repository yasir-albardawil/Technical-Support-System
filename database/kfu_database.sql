-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 31 مايو 2018 الساعة 01:22
-- إصدار الخادم: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- بنية الجدول `feedback`
--

CREATE TABLE `feedback` (
  `Feedback_id` int(10) NOT NULL,
  `Request_no` int(10) NOT NULL,
  `Request_status` varchar(50) NOT NULL,
  `Feedback` varchar(50) NOT NULL,
  `Date` varchar(100) NOT NULL,
  `Comments` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- بنية الجدول `labs`
--

CREATE TABLE `labs` (
  `Lab_no` int(10) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Computers` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- بنية الجدول `subject`
--

CREATE TABLE `subject` (
  `Subject_id` int(10) NOT NULL,
  `Message` varchar(250) NOT NULL,
  `Ticket_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- بنية الجدول `tickets`
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
-- إرجاع أو استيراد بيانات الجدول `tickets`
--

INSERT INTO `tickets` (`Ticket_no`, `Type`, `Item`, `Subject_id`, `Message`, `Emp_no`, `Lab_no`, `Recipient`, `Date`, `Status`, `Compeltion_date`) VALUES
(1, '1', '1', 0, 'My project doesn\'t work.', 1, 1, '1', '05/31/2018 12:49:06 AM', '1', '1');

-- --------------------------------------------------------

--
-- بنية الجدول `users`
--

CREATE TABLE `users` (
  `Emp_no` int(10) NOT NULL,
  `First_name` varchar(100) NOT NULL,
  `Last_name` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Role` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- إرجاع أو استيراد بيانات الجدول `users`
--

INSERT INTO `users` (`Emp_no`, `First_name`, `Last_name`, `Password`, `Email`, `Phone`, `Role`) VALUES
(1, 'Yasir', 'Albardawil', '21232f297a57a5a743894a0e4a801fc3', 'admin@kfu.edu.sa', '0501169709', 0),
(2, 'Ahmed', 'AlAhmed', '6512bd43d9caa6e02c990b0a82652dca', 'support@kfu.edu.sa', '0560000000', 1),
(3, 'Mohamed', 'Almohamed', '6512bd43d9caa6e02c990b0a82652dca', 'employee@kfu.edu.sa', '0550000000', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Feedback_id`);

--
-- Indexes for table `labs`
--
ALTER TABLE `labs`
  ADD PRIMARY KEY (`Lab_no`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`Subject_id`),
  ADD KEY `Ticket_no` (`Ticket_no`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`Ticket_no`),
  ADD KEY `FK_ticket` (`Emp_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Emp_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Feedback_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- قيود الجداول المحفوظة
--

--
-- القيود للجدول `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `FK_ticket` FOREIGN KEY (`Emp_no`) REFERENCES `users` (`Emp_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
