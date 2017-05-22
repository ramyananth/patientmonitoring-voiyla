-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 29, 2017 at 09:09 AM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `Patient`
--

CREATE TABLE `Patient` (
  `name` varchar(200) NOT NULL,
  `number` int(50) NOT NULL,
  `type` varchar(200) NOT NULL,
  `diagnosis` varchar(200) DEFAULT NULL,
  `med1` varchar(200) DEFAULT NULL,
  `med2` varchar(200) DEFAULT NULL,
  `password` varchar(150) NOT NULL,
  `doctor` varchar(150) NOT NULL,
  `patientStatus` varchar(10) DEFAULT 'false',
  `doctorStatus` varchar(10) NOT NULL DEFAULT 'false',
  `nurseStatus` varchar(10) NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Patient`
--

INSERT INTO `Patient` (`name`, `number`, `type`, `diagnosis`, `med1`, `med2`, `password`, `doctor`, `patientStatus`, `doctorStatus`, `nurseStatus`) VALUES
('1234', 1010, 'in', NULL, NULL, NULL, '1234', 'ABCD', NULL, 'false', 'false'),
('1234', 1011, 'in', NULL, NULL, NULL, '1234', 'ABCD', NULL, 'false', 'false'),
('', 1234, 'in', NULL, NULL, NULL, '', '', NULL, 'false', 'false'),
('', 1235, 'in', NULL, NULL, NULL, '', '', NULL, 'false', 'false'),
('1234', 1236, 'in', NULL, NULL, NULL, '', '', NULL, 'false', 'false'),
('buba', 1234567890, 'in', '1-0-0-1', 'Metacin', 'Crocin', '1234', 'rama', NULL, 'false', 'false');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Patient`
--
ALTER TABLE `Patient`
  ADD PRIMARY KEY (`number`),
  ADD UNIQUE KEY `number` (`number`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
