-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 05, 2021 at 06:36 PM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `healthcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'aa');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `a_id` int(100) NOT NULL,
  `p_id` int(100) NOT NULL,
  `assigned_to_id` int(100) NOT NULL,
  `department` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `start_time` int(25) NOT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`a_id`, `p_id`, `assigned_to_id`, `department`, `value`, `date`, `start_time`, `note`) VALUES
(10, 3, 4, 'Doctor', '', '2021-08-30', 0, 'any'),
(11, 3, 1, 'Doctor', 'Dr. Test Doc', '2021-09-04', 0, 'val'),
(13, 3, 90991, 'Technician', 'ECG', '2021-09-05', 0, 'aa'),
(14, 3, 1, 'Doctor', 'Dr. Test Doc', '2021-12-06', 10, 'testin on 6 dec');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_request`
--

CREATE TABLE `appointment_request` (
  `request_id` int(100) NOT NULL,
  `p_id` int(100) NOT NULL,
  `department` varchar(255) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `start_time` int(25) NOT NULL,
  `notes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment_request`
--

INSERT INTO `appointment_request` (`request_id`, `p_id`, `department`, `value`, `date`, `start_time`, `notes`) VALUES
(10, 3, 'Doctor', 'dr no.2', '2021-08-06', 0, 'test doc value'),
(15, 3, 'Doctor', 'Dr. Test Doc', '2021-09-11', 0, 'd1'),
(16, 3, 'Doctor', 'Dr. Test Doc', '2021-12-06', 12, '');

-- --------------------------------------------------------

--
-- Table structure for table `chatting`
--

CREATE TABLE `chatting` (
  `id` int(255) NOT NULL,
  `date` datetime NOT NULL,
  `doctor` varchar(255) NOT NULL,
  `patient` varchar(255) NOT NULL,
  `msg` longtext NOT NULL,
  `sender` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatting`
--

INSERT INTO `chatting` (`id`, `date`, `doctor`, `patient`, `msg`, `sender`, `status`) VALUES
(15, '2021-12-05 15:31:43', 'Dr. Test Doc', 'test user2', 'mmmm', 'Dr. Test Doc', 'read'),
(17, '2021-12-05 15:37:41', 'Dr. Test Doc', 'test user2', 'okk', 'Dr. Test Doc', 'read'),
(18, '2021-12-05 15:43:34', 'Dr. Test Doc', 'test user2', 'dmlkfd', 'Dr. Test Doc', 'read'),
(19, '2021-12-05 15:43:36', 'Dr. Test Doc', 'test user2', 'dvd', 'Dr. Test Doc', 'read'),
(20, '2021-12-05 15:43:38', 'Dr. Test Doc', 'test user2', 'vddv', 'Dr. Test Doc', 'read'),
(21, '2021-12-05 15:43:41', 'Dr. Test Doc', 'test user2', 'gregrr', 'Dr. Test Doc', 'read'),
(22, '2021-12-05 15:43:43', 'Dr. Test Doc', 'test user2', 'rgrgrg', 'Dr. Test Doc', 'read'),
(23, '2021-12-05 15:43:46', 'Dr. Test Doc', 'test user2', 'bsfbsfb', 'Dr. Test Doc', 'read'),
(24, '2021-12-05 15:43:48', 'Dr. Test Doc', 'test user2', 'bsfbsb', 'Dr. Test Doc', 'read'),
(25, '2021-12-05 15:43:50', 'Dr. Test Doc', 'test user2', 'sfbsb', 'Dr. Test Doc', 'read'),
(26, '2021-12-05 15:43:53', 'Dr. Test Doc', 'test user2', 'bsbsfb', 'Dr. Test Doc', 'read'),
(29, '2021-12-05 18:18:22', 'Dr. Test Doc', 'test user2', 'this is a reply', 'test user2', 'read'),
(30, '2021-12-05 18:29:55', 'Dr. Test Doc', 'test user2', 'hello', 'test user2', 'read'),
(31, '2021-12-05 18:30:00', 'Dr. Test Doc', 'test user2', 'hiii', 'test user2', 'read'),
(32, '2021-12-05 19:11:20', 'Dr. Test Doc', 'test user2', 'heklo', 'Dr. Test Doc', 'read'),
(33, '2021-12-05 19:11:25', 'Dr. Test Doc', 'test user2', 'test', 'Dr. Test Doc', 'read'),
(34, '2021-12-05 19:11:36', 'Dr. Test Doc', 'Test User', 'test', 'Dr. Test Doc', 'read'),
(35, '2021-12-05 19:22:30', 'Dr. Test Doc', 'test user2', 'hello man wassap', 'test user2', 'read'),
(36, '2021-12-05 19:22:53', 'dr no.2', 'test user2', 'hey man wassap\r\n', 'test user2', 'unread'),
(37, '2021-12-05 23:27:20', 'Dr. Test Doc', 'test user2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus assumenda magnam, sint laboriosam, dicta ipsum blanditiis animi tempore, quasi voluptatem quas reiciendis iste! Voluptas suscipit reprehenderit quasi rem officiis incidunt vero, repellendus earum eligendi at eos impedit sequi dolor consectetur aut, similique dolores autem mollitia! Doloremque quae ad temporibus exercitationem blanditiis sequi consectetur officia obcaecati quos ea, vero voluptas vel ut perferendis illum expedita cumque, repellat itaque rem culpa fuga. Vitae non similique iusto, aliquam dolorem eligendi nisi voluptate ex sit accusantium esse cum eaque error est quia delectus exercitationem! Sed et illum odit iusto sunt amet magnam aliquam delectus?', 'test user2', 'read'),
(38, '2021-12-05 23:31:36', 'Dr. Test Doc', 'test user2', 'lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam impedit ex amet modi nemo aut facilis incidunt ipsam suscipit autem ea obcaecati illum ut non, in ab consectetur earum delectus?', 'test user2', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `d_id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `specialization` varchar(255) NOT NULL,
  `fees` int(100) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`d_id`, `name`, `email`, `password`, `specialization`, `fees`, `created_date`) VALUES
(1, 'Dr. Test Doc', 'a@a.a', 'aa', 'test', 2220, '2021-08-16 17:59:31'),
(4, 'dr no.2', 'test2@a.a', 'aa', 'allergies', 1000, '2021-08-27 01:39:03');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `p_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `age` int(100) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `reg_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`p_id`, `name`, `email`, `password`, `address`, `age`, `gender`, `reg_date`) VALUES
(3, 'Test User', 'test@a.a', 'aa', 'test', 22, 'female', '2021-08-18 14:08:59'),
(4, 'test user2', 'test@test.com', 'aa', 'test2', 21, 'male', '2021-08-18 14:53:21');

-- --------------------------------------------------------

--
-- Table structure for table `p_records`
--

CREATE TABLE `p_records` (
  `record_id` int(100) NOT NULL,
  `p_id` int(100) NOT NULL,
  `height` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `blood_pressure` varchar(255) DEFAULT NULL,
  `blood_sugar` varchar(255) DEFAULT NULL,
  `allergies` varchar(255) DEFAULT NULL,
  `notes` varchar(255) DEFAULT NULL,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `p_records`
--

INSERT INTO `p_records` (`record_id`, `p_id`, `height`, `weight`, `blood_pressure`, `blood_sugar`, `allergies`, `notes`, `update_date`) VALUES
(1, 3, '23cm', '2gm', '2', '1', 'apple', 'aaa', '2021-08-22 11:57:29'),
(2, 4, '23cm', '2gm', '56', '33', 'pizza and tiger', 'something', '2021-08-24 22:34:12');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(100) NOT NULL,
  `p_id` int(100) DEFAULT NULL,
  `d_id` int(100) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `diagnosis` varchar(255) DEFAULT NULL,
  `prescription` longtext,
  `notes` longtext,
  `appointment_date` date NOT NULL,
  `report_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`report_id`, `p_id`, `d_id`, `value`, `diagnosis`, `prescription`, `notes`, `appointment_date`, `report_date`) VALUES
(6, 3, 4, NULL, NULL, NULL, NULL, '2021-08-30', '2021-08-28 13:23:52'),
(7, 3, 1, 'Dr. Test Doc', NULL, NULL, NULL, '2021-09-04', '2021-08-31 00:26:39'),
(9, 3, 90991, 'ECG', 'ecg', 'by techguy', 'test', '2021-09-05', '2021-08-31 00:46:17'),
(10, 3, 1, 'Dr. Test Doc', NULL, NULL, NULL, '2021-12-06', '2021-12-06 00:03:19');

-- --------------------------------------------------------

--
-- Table structure for table `technician`
--

CREATE TABLE `technician` (
  `t_id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `technician`
--

INSERT INTO `technician` (`t_id`, `name`, `email`, `password`, `created_date`) VALUES
(90991, 'tech guy', 'tech@a.a', 'aa', '2021-08-31 00:07:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `assigned_to_id` (`assigned_to_id`);

--
-- Indexes for table `appointment_request`
--
ALTER TABLE `appointment_request`
  ADD PRIMARY KEY (`request_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `chatting`
--
ALTER TABLE `chatting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `p_records`
--
ALTER TABLE `p_records`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `d_id` (`d_id`);

--
-- Indexes for table `technician`
--
ALTER TABLE `technician`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `a_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `appointment_request`
--
ALTER TABLE `appointment_request`
  MODIFY `request_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `chatting`
--
ALTER TABLE `chatting`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `d_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `p_records`
--
ALTER TABLE `p_records`
  MODIFY `record_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `technician`
--
ALTER TABLE `technician`
  MODIFY `t_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90992;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
