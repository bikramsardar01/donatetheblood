-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2023 at 05:25 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donatetheblood`
--

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `contact_no` varchar(16) NOT NULL,
  `save_life_date` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `type` enum('user','admin','doctor') NOT NULL,
  `status` enum('donated','pending','Not donated') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`id`, `name`, `gender`, `email`, `city`, `dob`, `contact_no`, `save_life_date`, `password`, `blood_group`, `type`, `status`) VALUES
(8, 'Bharat thapa', 'male', 'bharat12@gmail.com', 'Lalitpur', '1999-02-31', '9842302504', '2023-07-30', 'dfb57b2e5f36c1f893dbc12dd66897d4', 'A+', 'user', 'donated'),
(10, 'Bikram sardar', 'male', 'bikramsardar706@gmail.com', 'Morang', '1999-11-28', '9805948695', '2023-12-01', '268b3295ebcc4f4ff2181ab92149a1b5', 'AB+', 'admin', 'donated'),
(11, 'Umesh ', 'male', 'umesh11@gmail.com', 'Jhapa', '1999-12-30', '9803863211', '2023-08-08', 'a6b0d7147620cdaec38ef27a045afafa', 'B+', 'user', 'donated'),
(12, 'Radhe ', 'male', 'radhe22@gmail.com', 'Dhulikhel', '1957-02-27', '9807777777', '2023-08-08', 'ba5588cec80a9fad1e18c9e643d4db90', 'AB+', 'user', 'donated'),
(13, 'Samir Thapaliya', 'male', 'samir11@gmail.com', 'Kathmandu', '1968-01-13', '9800000000', '2023-08-17', '22c77791e8db26ba90de4414dfcf0da1', 'A+', 'user', 'donated'),
(14, 'Prasun kayastha', 'male', 'prasun21@gmail.com', 'Bhaktapur', '1998-01-30', '9801011111', '2023-09-21', '369ba4ff3db2ffffc409cbcda61c8c1d', 'A-', 'user', 'donated'),
(15, 'Shanker Banquete', 'male', 'admin@test.com', 'Bhaktapur', '1975-10-17', '9822222222', '0', 'e10adc3949ba59abbe56e057f20f883e', 'A+', 'user', 'donated'),
(16, 'johnmax', 'male', 'admin1@test.com', 'Lalitpur', '1973-04-15', '9811111111', '2023-09-20', '4297f44b13955235245b2497399d7a93', 'B+', 'user', 'donated');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
