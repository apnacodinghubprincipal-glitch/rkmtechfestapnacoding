-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 11, 2026 at 11:46 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `camps_dbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_master`
--

CREATE TABLE `student_master` (
  `id` int(11) NOT NULL,
  `reg_no` varchar(255) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `health_status` varchar(100) NOT NULL,
  `sms_phone_no` varchar(100) NOT NULL,
  `present_address` text NOT NULL,
  `resident_ph_no` varchar(100) NOT NULL,
  `pass_word` varchar(255) NOT NULL,
  `adhar_no` varchar(22) NOT NULL,
  `blood_group` text NOT NULL,
  `reg_date` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_master`
--

INSERT INTO `student_master` (`id`, `reg_no`, `surname`, `name`, `dob`, `health_status`, `sms_phone_no`, `present_address`, `resident_ph_no`, `pass_word`, `adhar_no`, `blood_group`, `reg_date`) VALUES
(2, '', 'PROSAD ', 'IPSHITA', '30/09/2019', 'GOOD', '9330162927', '13/1, PANCHANAN TALA  RD', '1111111111', '151239', '898989898988', 'B+', '09/01/2026'),
(3, '', 'AGARWAL', 'TANUSIYA', '30/09/2019', 'GOOD', '9330162927', 'REREERRERERE', '1111111111', '543441', '898989898988', 'O+', '09/01/2026'),
(4, 'ACHUB_2026_4', 'AGARWAL', 'TANUSIYA', '30/09/2019', 'GOOD', '9330162927', 'REREERRERERE', '1111111111', '157394', '898989898988', 'O+', '09/01/2026');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_master`
--
ALTER TABLE `student_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_master`
--
ALTER TABLE `student_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
