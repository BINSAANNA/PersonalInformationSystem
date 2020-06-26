-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2019 at 07:27 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pis`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `per_no` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `grade` varchar(10) DEFAULT NULL,
  `dt_grade` date DEFAULT NULL,
  `trade` varchar(10) DEFAULT NULL,
  `dt_birth` date DEFAULT NULL,
  `address` mediumtext,
  `station` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`per_no`, `name`, `grade`, `dt_grade`, `trade`, `dt_birth`, `address`, `station`) VALUES
(991911, 'A K', 'JGM', '2014-04-01', 'ENG/MECH', '1968-01-01', 'qwerty uiop asdf gh jkl zxc vb nm', 'Kolkata'),
(991247, 'RAO MS', 'SAG', '2010-11-03', 'ADM', '1960-08-01', 'asdfsajdgsd sdfabjfasdfjbs nfs fs adf sadfbsdjaf', 'Kanpur');

-- --------------------------------------------------------

--
-- Table structure for table `experiece`
--

CREATE TABLE `experiece` (
  `e_per_id` int(11) NOT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `dt_from` date DEFAULT NULL,
  `dt_upto` date DEFAULT NULL,
  `exp` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `per_no` int(11) NOT NULL,
  `basic` int(11) DEFAULT NULL,
  `allowance` int(11) DEFAULT NULL,
  `tax` float DEFAULT NULL,
  `gross` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`per_no`, `basic`, `allowance`, `tax`, `gross`) VALUES
(991247, 249000, 15000, 0, 264000);

-- --------------------------------------------------------

--
-- Table structure for table `qualification`
--

CREATE TABLE `qualification` (
  `sl` int(11) NOT NULL,
  `q_per_id` int(11) DEFAULT NULL,
  `qualification` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qualification`
--

INSERT INTO `qualification` (`sl`, `q_per_id`, `qualification`, `subject`) VALUES
(1, 991911, 'B.E', 'MECH ENG'),
(4, 991247, 'BE', 'MECH ENG'),
(7, 987654, 'sd', 'fdgf'),
(9, 987654, 'ds', 'gdsvcx');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `per_no` int(11) NOT NULL,
  `c_no` int(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`per_no`, `c_no`) VALUES
(991247, 12584669),
(817926, 5803);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`per_no`);

--
-- Indexes for table `experiece`
--
ALTER TABLE `experiece`
  ADD PRIMARY KEY (`e_per_id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`per_no`);

--
-- Indexes for table `qualification`
--
ALTER TABLE `qualification`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`per_no`),
  ADD UNIQUE KEY `c_no` (`c_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `per_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=991912;
--
-- AUTO_INCREMENT for table `experiece`
--
ALTER TABLE `experiece`
  MODIFY `e_per_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `per_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=991912;
--
-- AUTO_INCREMENT for table `qualification`
--
ALTER TABLE `qualification`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `per_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=991912;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
