-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2022 at 09:06 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_gender` varchar(255) NOT NULL,
  `admin_contact` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_CNIC` varchar(255) NOT NULL,
  `admin_designation` varchar(255) NOT NULL,
  `admin_address` varchar(255) NOT NULL,
  `admin_Uname` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_gender`, `admin_contact`, `admin_email`, `admin_CNIC`, `admin_designation`, `admin_address`, `admin_Uname`, `admin_password`, `admin_image`) VALUES
(2, 'Maham', 'Female', '03138676531', '2019cs207@student.uet.edu.pk', '36303-1234567-8', 'admin', 'Multan', 'Admin', 'admin123', '');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `application_id` int(11) NOT NULL,
  `applicant_name` varchar(30) NOT NULL,
  `applicant_Uname` varchar(255) NOT NULL,
  `applicant_gender` varchar(10) NOT NULL,
  `applicant_contact` varchar(20) NOT NULL,
  `applicant_email` varchar(255) NOT NULL,
  `applicant_CNIC` varchar(15) NOT NULL,
  `applicant_address` varchar(255) NOT NULL,
  `applicant_pAddress` varchar(255) NOT NULL,
  `applicant_picture` varchar(255) NOT NULL,
  `applicant_gardName` varchar(30) DEFAULT NULL,
  `applicant_gardRelation` varchar(15) DEFAULT NULL,
  `applicant_gardCNIC` varchar(15) DEFAULT NULL,
  `applicant_gardContact` varchar(20) DEFAULT NULL,
  `applicant_emergencyRelation` varchar(255) DEFAULT NULL,
  `applicant_emergencyContact` varchar(20) DEFAULT NULL,
  `applicant_category` varchar(20) DEFAULT NULL,
  `applicant_redgNo` varchar(50) DEFAULT NULL,
  `applicant_department` varchar(50) DEFAULT NULL,
  `applicant_semester` int(11) DEFAULT NULL,
  `applicant_GPA` double(11,0) DEFAULT NULL,
  `applicant_CGPA` double(11,0) DEFAULT NULL,
  `applicant_batch` int(11) DEFAULT NULL,
  `application_status` int(1) NOT NULL,
  `application_type` varchar(255) NOT NULL,
  `room_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`application_id`, `applicant_name`, `applicant_Uname`, `applicant_gender`, `applicant_contact`, `applicant_email`, `applicant_CNIC`, `applicant_address`, `applicant_pAddress`, `applicant_picture`, `applicant_gardName`, `applicant_gardRelation`, `applicant_gardCNIC`, `applicant_gardContact`, `applicant_emergencyRelation`, `applicant_emergencyContact`, `applicant_category`, `applicant_redgNo`, `applicant_department`, `applicant_semester`, `applicant_GPA`, `applicant_CGPA`, `applicant_batch`, `application_status`, `application_type`, `room_no`) VALUES
(2, 'Maham', 'mahi', 'Female', '03138676531', 'mahamwajid1034@gmail.com', '1234567891234', 'Lahore', 'Multan', '', 'Riffat', 'mother', '23456123451234', '03138676059', 'sister', '03124567892', 'University Student', '2019cs207', 'Computer Science', 5, 4, 3, 2019, 1, 'allotment', 1),
(3, 'Rehman', 'pika', 'male', '03467455643', 'insanedevil16171@gmail.com', '1234567890123', 'Lahore', 'Gojra', '', 'Rasheed', 'Father', '1234561234561', '03457569261', 'Father', '03457569261', 'University Student', '2019cs231', 'Computer Science', 5, NULL, NULL, 2019, 0, 'allotment', 1),
(7, 'Rehman', 'pika', 'male', '0346-7455643', 'demo@demo.com', '12345-7654321-1', 'lahore', 'gojra', '', 'nbdsf', 'jsdhgf', '12345-7654321-2', '0346-7455643', 'kjyjhfr', '0346-7455643', 'University Student', '213', 'cs', 5, 0, 0, 2019, 1, 'allotment', 0);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `stud_name` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `day` varchar(255) NOT NULL,
  `attendance` varchar(255) NOT NULL,
  `applicant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `stud_name`, `date`, `day`, `attendance`, `applicant_id`) VALUES
(2, 'Maham', '2021-12-20 00:00:00', 'Monday', 'present', 0),
(3, 'Maham', '2021-12-18 00:00:00', 'Wednesday', 'absent', 0),
(4, 'Rehman', '2021-12-20 00:00:00', 'Monday', 'present', 0);

-- --------------------------------------------------------

--
-- Table structure for table `attendant`
--

CREATE TABLE `attendant` (
  `attendant_id` int(11) NOT NULL,
  `attendant_name` varchar(255) NOT NULL,
  `attendant_gender` varchar(20) NOT NULL,
  `attendant_contact` varchar(50) NOT NULL,
  `attendant_DOB` date NOT NULL,
  `attendant_CNIC` varchar(20) NOT NULL,
  `attendant_email` varchar(255) NOT NULL,
  `attendant_address` varchar(255) NOT NULL,
  `attendant_pAddress` varchar(255) NOT NULL,
  `attendant_picture` varchar(255) NOT NULL,
  `attendant_Uname` varchar(255) NOT NULL,
  `attendant_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendant`
--

INSERT INTO `attendant` (`attendant_id`, `attendant_name`, `attendant_gender`, `attendant_contact`, `attendant_DOB`, `attendant_CNIC`, `attendant_email`, `attendant_address`, `attendant_pAddress`, `attendant_picture`, `attendant_Uname`, `attendant_password`) VALUES
(6, 'Demo', 'Female', ' 1234-1234567', '2021-12-13', '12345-1234567-1', 'demo1@demo.com', 'hgdsfg', 'kuegyfyeh', 'upload/Profile.png', 'demo1', '#Demo1'),
(7, 'DemoDemo', 'Male', ' 1234-1345627', '2021-12-13', '12345-1234567-2', 'demo2@demo.com', 'jhgs', 'kuuytres', 'upload/Profile.png', 'demo2', '#Demo2');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `bill_id` int(11) NOT NULL,
  `std_name` varchar(255) NOT NULL,
  `bill_type` varchar(30) NOT NULL,
  `bill_payment` int(11) NOT NULL,
  `bill_img` varchar(255) NOT NULL,
  `bill_status` tinyint(1) NOT NULL,
  `res_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`bill_id`, `std_name`, `bill_type`, `bill_payment`, `bill_img`, `bill_status`, `res_id`) VALUES
(4, 'Rehman', 'present', 3000, '../Admin/upload/t1.jpg', 0, 12);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(30) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`c_id`, `c_name`, `c_email`, `c_message`) VALUES
(2, 'Rehman', 'demoEmail@demo.com', 'Brilliant Experience!'),
(3, 'mahi', 'mahi@demo.com', 'Demo message!'),
(4, 'mahi', 'mahi@demo.com', 'Demo message!'),
(5, 'demo', 'abc@demo.com', 'demo message!'),
(7, 'maham', 'abc123@gmail.com', 'demo message!');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `com_id` int(11) NOT NULL,
  `res_Uname` varchar(50) NOT NULL,
  `room_no` int(11) NOT NULL,
  `com_message` varchar(255) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`com_id`, `res_Uname`, `room_no`, `com_message`, `status`) VALUES
(1, 'mahi', 7, 'improve room conditions!', 0);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `room_type` varchar(255) NOT NULL,
  `room_beds` int(11) NOT NULL,
  `room_space` int(11) NOT NULL,
  `room_people` int(11) NOT NULL,
  `room_vacancy` int(11) NOT NULL,
  `room_attendant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_name`, `room_type`, `room_beds`, `room_space`, `room_people`, `room_vacancy`, `room_attendant`) VALUES
(1, 'Room 101', 'Normal', 3, 3, 2, 1, 6),
(3, 'Room 102', 'AC', 5, 5, 3, 2, 7),
(4, 'Room 103', 'Cooler', 5, 5, 4, 1, 7),
(5, 'Room 104', 'Normal', 4, 5, 3, 2, 6),
(10, 'demo room                                    ', 'Cooler', 4, 4, 2, 2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(30) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_category` varchar(20) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fname`, `user_email`, `user_category`, `user_name`, `user_password`) VALUES
(4, 'Maham', 'demo1@demo.com', 'University Student', 'mahi', 'Mahi@123'),
(12, 'Rehman', 'demo2@demo.com', 'University Student', 'pika', 'Pika@123'),
(13, 'Demo', 'demo@abc.com', 'Non-University Stude', 'demo', 'Demo#12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `room_no` (`room_no`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `applicant_id` (`applicant_id`);

--
-- Indexes for table `attendant`
--
ALTER TABLE `attendant`
  ADD PRIMARY KEY (`attendant_id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `room_attendant` (`room_attendant`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attendant`
--
ALTER TABLE `attendant`
  MODIFY `attendant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `bill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `room_no` FOREIGN KEY (`room_no`) REFERENCES `room` (`room_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `applicant_id` FOREIGN KEY (`applicant_id`) REFERENCES `applications` (`application_id`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_attendant` FOREIGN KEY (`room_attendant`) REFERENCES `attendant` (`attendant_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
