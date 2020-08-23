-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2019 at 03:00 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_reciptionists`
--

CREATE TABLE `add_reciptionists` (
  `reciptionist_id` int(20) NOT NULL,
  `reciptionist_name` varchar(50) NOT NULL,
  `reciptionist_email` varchar(30) NOT NULL,
  `reciptionist_phone` varchar(12) NOT NULL,
  `password` varchar(30) NOT NULL,
  `reciptionist_img_url` varchar(40) NOT NULL,
  `reciptionist_active_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_reciptionists`
--

INSERT INTO `add_reciptionists` (`reciptionist_id`, `reciptionist_name`, `reciptionist_email`, `reciptionist_phone`, `password`, `reciptionist_img_url`, `reciptionist_active_status`) VALUES
(3, 'BABU', 'k@gmail.com', '6678765', '123', 'There is no image', 1);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `app_no` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `blood` varchar(10) NOT NULL,
  `age` int(3) NOT NULL,
  `select_doctor` varchar(40) NOT NULL,
  `consultency_Fee` int(3) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(20) NOT NULL,
  `appointment_status` tinyint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `offline_appointment`
--

CREATE TABLE `offline_appointment` (
  `app_no1` int(10) NOT NULL,
  `name1` varchar(100) NOT NULL,
  `address1` varchar(100) NOT NULL,
  `contact1` varchar(11) NOT NULL,
  `email1` varchar(40) NOT NULL,
  `blood1` varchar(10) NOT NULL,
  `age1` int(3) NOT NULL,
  `select_doctor1` varchar(50) NOT NULL,
  `consultency_Fee1` int(5) NOT NULL,
  `date1` date NOT NULL,
  `time1` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_add_doctor`
--

CREATE TABLE `tbl_add_doctor` (
  `doctor_id` int(40) NOT NULL,
  `doctor_name` varchar(50) NOT NULL,
  `doctor_email` varchar(20) NOT NULL,
  `doctor_phone` varchar(20) NOT NULL,
  `d_image_url` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `doctor_active_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_add_doctor`
--

INSERT INTO `tbl_add_doctor` (`doctor_id`, `doctor_name`, `doctor_email`, `doctor_phone`, `d_image_url`, `password`, `doctor_active_status`) VALUES
(54, 'Dr Iffat Rahman', 'iffat@gmail.com', '01712314123', '', '123', 1),
(59, 'Muntahi Mohsin', 'hhemal20@yahoo.com', '01763186711', '', '123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin_info`
--

CREATE TABLE `tbl_admin_info` (
  `admin_id` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `img_url` varchar(100) NOT NULL,
  `activation_status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin_info`
--

INSERT INTO `tbl_admin_info` (`admin_id`, `name`, `email`, `phone_no`, `password`, `img_url`, `activation_status`) VALUES
(3, 'momo', 'momo@gmail.com', '01763186711', '123', 'adminImg/161452174.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `try`
--

CREATE TABLE `try` (
  `id` int(20) NOT NULL,
  `app` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `age` int(3) NOT NULL,
  `discount` varchar(40) NOT NULL,
  `date` date NOT NULL,
  `treatments` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_reciptionists`
--
ALTER TABLE `add_reciptionists`
  ADD PRIMARY KEY (`reciptionist_id`),
  ADD UNIQUE KEY `reciptionist_email` (`reciptionist_email`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`app_no`);

--
-- Indexes for table `offline_appointment`
--
ALTER TABLE `offline_appointment`
  ADD PRIMARY KEY (`app_no1`);

--
-- Indexes for table `tbl_add_doctor`
--
ALTER TABLE `tbl_add_doctor`
  ADD PRIMARY KEY (`doctor_id`),
  ADD UNIQUE KEY `doctor_email` (`doctor_email`);

--
-- Indexes for table `tbl_admin_info`
--
ALTER TABLE `tbl_admin_info`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `try`
--
ALTER TABLE `try`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_reciptionists`
--
ALTER TABLE `add_reciptionists`
  MODIFY `reciptionist_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `app_no` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offline_appointment`
--
ALTER TABLE `offline_appointment`
  MODIFY `app_no1` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_add_doctor`
--
ALTER TABLE `tbl_add_doctor`
  MODIFY `doctor_id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tbl_admin_info`
--
ALTER TABLE `tbl_admin_info`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `try`
--
ALTER TABLE `try`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
