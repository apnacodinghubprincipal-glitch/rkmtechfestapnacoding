-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 08, 2026 at 10:22 PM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absslilu_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_master2026`
--

CREATE TABLE `student_master2026` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `reg_no` varchar(255) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `class` varchar(100) NOT NULL,
  `dob` varchar(200) NOT NULL,
  `hard_copy_date` varchar(200) NOT NULL,
  `interaction_date` varchar(255) NOT NULL,
  `interaction_time` varchar(255) NOT NULL,
  `giving_date` varchar(50) NOT NULL,
  `submission_date` varchar(200) NOT NULL,
  `marks` varchar(255) NOT NULL,
  `caste` varchar(100) NOT NULL,
  `mother_tounge` varchar(100) NOT NULL,
  `birth_place` varchar(50) NOT NULL,
  `home_locality` varchar(100) NOT NULL,
  `mode_of_transporation` varchar(255) NOT NULL,
  `health_status` varchar(100) NOT NULL,
  `nearest_rail_station` varchar(100) NOT NULL,
  `sms_phone_no` varchar(100) NOT NULL,
  `present_address` text NOT NULL,
  `resident_ph_no` varchar(100) NOT NULL,
  `head_of_family` varchar(100) NOT NULL,
  `reg_date` varchar(200) NOT NULL,
  `pass_word` varchar(255) NOT NULL,
  `adhar_no` varchar(22) NOT NULL,
  `blood_group` text NOT NULL,
  `given_time` varchar(255) NOT NULL,
  `given_time2` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `otp` int(10) NOT NULL,
  `status1` varchar(3) NOT NULL,
  `transdate` varchar(33) NOT NULL,
  `udf8_father_name` varchar(222) NOT NULL,
  `pgtxnId` varchar(33) NOT NULL,
  `sptxnId` varchar(33) NOT NULL,
  `sprespstatus` varchar(33) NOT NULL,
  `payAmt` int(3) NOT NULL,
  `payMode` varchar(222) NOT NULL,
  `mobileNo` varchar(10) NOT NULL,
  `email` varchar(122) NOT NULL,
  `viewform_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student_master2026`
--
ALTER TABLE `student_master2026`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student_master2026`
--
ALTER TABLE `student_master2026`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
