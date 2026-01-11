-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 11, 2026 at 11:45 AM
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
-- Table structure for table `student_image_master`
--

CREATE TABLE `student_image_master` (
  `student_id` varchar(55) NOT NULL,
  `student_pic` varchar(55) NOT NULL,
  `student_certificate` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_image_master`
--

INSERT INTO `student_image_master` (`student_id`, `student_pic`, `student_certificate`) VALUES
('<br />\r\n<b>Notice</b>:  Undefined index: stud_id in <b>', 'academic.png', 'aim.jpg'),
('<br />\r\n<b>Notice</b>:  Undefined index: stud_id in <b>', 'academic.png', 'aim.jpg'),
('<br />\r\n<b>Notice</b>:  Undefined index: stud_id in <b>', 'academic.png', 'aim.jpg'),
('ACHUB_2026_24', 'academic.png', 'aim.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
