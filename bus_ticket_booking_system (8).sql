-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 12:02 PM
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
-- Database: `bus_ticket_booking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_fullname` varchar(100) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_pic` varchar(100) NOT NULL,
  `admin_level` varchar(100) NOT NULL,
  `admin_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_fullname`, `admin_username`, `admin_password`, `admin_pic`, `admin_level`, `admin_status`) VALUES
(1, 'Adrea Foong Jun Jie', 'Adrea_al2', 'adrea', '', '2', 0),
(2, 'Mah Qi Xiang', 'Qi_Xiang_al1', 'qixiang', '', '1', 0),
(3, 'Tay Han Chung', 'Han_Chung_al1', 'hanchung', '', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `bus_id` int(11) NOT NULL,
  `bus_number_plate` varchar(100) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `bus_schedule_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bus_id`, `bus_number_plate`, `driver_id`, `route_id`, `bus_schedule_id`) VALUES
(1, 'MDT7632', 1, 1, 1),
(2, 'MUS6560', 2, 2, 2),
(3, 'MSA5808', 3, 3, 3),
(4, 'WHA 2597', 4, 4, 4),
(5, 'WHY1567', 5, 5, 5),
(6, 'HJF7612', 6, 6, 6),
(13, 'WA 1309', 7, 7, 9);

-- --------------------------------------------------------

--
-- Table structure for table `bus_operators`
--

CREATE TABLE `bus_operators` (
  `bus_operator_id` int(11) NOT NULL,
  `bus_operator_name` varchar(100) NOT NULL,
  `bus_operator_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus_operators`
--

INSERT INTO `bus_operators` (`bus_operator_id`, `bus_operator_name`, `bus_operator_pic`) VALUES
(1, 'City Express', 'city express.png'),
(2, 'KKKL', 'KKKL.png'),
(3, 'Maraliner', 'maraliner.png'),
(4, 'Mayang Sari Express', 'mayang sari.png'),
(5, 'Yellow Star Express', 'yellow star.png');

-- --------------------------------------------------------

--
-- Table structure for table `bus_schedule`
--

CREATE TABLE `bus_schedule` (
  `bus_schedule_id` int(11) NOT NULL,
  `bus_schedule_date` date NOT NULL,
  `boarding` varchar(100) NOT NULL,
  `alighting` varchar(100) NOT NULL,
  `departure_time` float(6,2) NOT NULL,
  `duration` varchar(100) NOT NULL,
  `arrival_time` float(6,2) NOT NULL,
  `fare` float NOT NULL,
  `gate` varchar(1) NOT NULL,
  `bus_schedule_status` int(11) NOT NULL COMMENT '1 = available,0 = unavailable',
  `bus_operator_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus_schedule`
--

INSERT INTO `bus_schedule` (`bus_schedule_id`, `bus_schedule_date`, `boarding`, `alighting`, `departure_time`, `duration`, `arrival_time`, `fare`, `gate`, `bus_schedule_status`, `bus_operator_id`, `route_id`, `admin_id`) VALUES
(1, '2023-07-15', 'Malacca Sentral', 'Kuala Lumpur Sentral', 4.00, '2 hours', 6.00, 14, 'A', 1, 1, 1, 3),
(2, '2023-07-15', 'Malacca Sentral', 'Kuala Lumpur Sentral', 6.30, '2 hours', 8.30, 15, 'B', 1, 2, 1, 3),
(3, '2023-07-15', 'Malacca Sentral', 'Kuala Lumpur Sentral', 10.00, '2 hours', 12.00, 16, 'C', 1, 3, 1, 3),
(4, '2023-07-15', 'Malacca Sentral', 'Kuala Lumpur Sentral', 12.30, '2 hours', 14.30, 14.5, 'D', 1, 4, 1, 3),
(5, '2023-07-15', 'Malacca Sentral', 'Kuala Lumpur Sentral', 8.00, '2 hours', 10.00, 13, 'A', 1, 5, 1, 3),
(6, '2023-07-15', 'Malacca Sentral', 'Kuala Lumpur Sentral', 16.30, '2 hours', 18.30, 17, 'B', 1, 1, 1, 3),
(9, '2023-07-18', 'Kuala Lumpur Sentral', 'Malacca Sentral', 15.00, '2 hours 30 minutes', 17.30, 18, 'C', 1, 2, 7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `bus_seat`
--

CREATE TABLE `bus_seat` (
  `bus_seat_id` int(11) NOT NULL,
  `bus_seat_no` varchar(100) NOT NULL,
  `bus_seat_status` int(11) NOT NULL COMMENT '1=go,0=return',
  `bus_schedule_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` int(11) NOT NULL,
  `driver_fullname` varchar(100) NOT NULL,
  `driver_contact_no` varchar(100) NOT NULL,
  `driver_licence_expiry_date` date NOT NULL,
  `driver_email_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `driver_fullname`, `driver_contact_no`, `driver_licence_expiry_date`, `driver_email_address`) VALUES
(1, 'John Leau', '60137218721', '2025-03-20', 'rnoorhakim@looi.com'),
(2, 'Jane Vadaketh', '60196984072', '2024-03-30', 'uaidi@retinam.com'),
(3, 'Siva a/l Shan', '60148881039', '2026-01-01', 'chokshew99@hotmail.com'),
(4, 'Satwant a/l Harikrish Kamalesvaran', '60198693947', '2025-09-13', 'kang.buioo@zizi.net'),
(5, 'Syed Zulman bin Wan Azizan Soberi', '6075935665', '2024-12-31', 'william.shi@gmail.com'),
(6, 'Ngan Chung Say', '60134988054', '2024-07-14', 'rosli.mimi@liao.com'),
(7, 'S. A. Patto', '60176087513', '2024-01-31', 'shanmugaratnam.thiagai@rajhans.biz'),
(8, 'Kasthuriraani a/l Rehman', '60159572628', '2024-06-14', 'kamaruzain08@yahoo.com'),
(9, 'M. G. Samarasan', '60131320603', '2025-10-01', 'oradzi@taufek.com'),
(10, 'K. R.Arumugam', '60134012003', '2023-11-19', 'ali.hasyim@gmail.com'),
(11, 'Wesley Ser Wei Jie', '60134569875', '2025-09-01', 'wesley@gmail.com'),
(12, 'Ng Chun Hong', '60124562143', '2025-10-30', 'hong@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `bus_seat_no` varchar(100) NOT NULL,
  `total_pay` float NOT NULL,
  `name_on_card` varchar(100) NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `card_number` varchar(100) NOT NULL,
  `expiration_date` varchar(100) NOT NULL,
  `cvv` varchar(100) NOT NULL,
  `contact_no` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `booking_no` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bus_schedule_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `rating_point` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL,
  `bus_schedule_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_id`, `rating_point`, `comment`, `bus_schedule_id`) VALUES
(1, 5, '', 1),
(2, 4, '', 1),
(3, 5, '', 2),
(4, 4, '', 3),
(5, 5, '', 2),
(6, 4, '', 6);

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `route_id` int(11) NOT NULL,
  `starting_point` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`route_id`, `starting_point`, `destination`) VALUES
(1, 'Malacca', 'Kuala Lumpur'),
(2, 'Malacca', 'Johor Bahru'),
(3, 'Malacca', 'Penang'),
(4, 'Kuala lumpur', 'Johor Bahru'),
(5, 'Kuala Lumpur', 'Penang'),
(6, 'Johor Bahru', 'Penang'),
(7, 'Kuala Lumpur', 'Malacca'),
(8, 'Johor Bahru', 'Malacca'),
(9, 'Penang', 'Malacca'),
(10, 'Johor Bahru', 'Kuala Lumpur'),
(11, 'Penang', 'Kuala Lumpur'),
(12, 'Penang', 'Johor Bahru');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(100) NOT NULL,
  `user_contact_no` varchar(100) NOT NULL,
  `user_email_address` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_pic` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fullname`, `user_contact_no`, `user_email_address`, `username`, `user_password`, `user_pic`) VALUES
(1, 'Tay Han Chung', '01139674436', 'tayhanchung@gmail.com', 'tay', '030415', 'fdfddf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`bus_id`),
  ADD KEY `route_id` (`route_id`),
  ADD KEY `bus_schedule_id` (`bus_schedule_id`),
  ADD KEY `driver_id` (`driver_id`);

--
-- Indexes for table `bus_operators`
--
ALTER TABLE `bus_operators`
  ADD PRIMARY KEY (`bus_operator_id`);

--
-- Indexes for table `bus_schedule`
--
ALTER TABLE `bus_schedule`
  ADD PRIMARY KEY (`bus_schedule_id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `route_id` (`route_id`),
  ADD KEY `bus_operator_id` (`bus_operator_id`);

--
-- Indexes for table `bus_seat`
--
ALTER TABLE `bus_seat`
  ADD PRIMARY KEY (`bus_seat_id`),
  ADD KEY `bus_schedule_id` (`bus_schedule_id`),
  ADD KEY `bus_id` (`bus_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `bus_schedule_id` (`bus_schedule_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `bus_schedule_id` (`bus_schedule_id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`route_id`);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `bus_operators`
--
ALTER TABLE `bus_operators`
  MODIFY `bus_operator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bus_schedule`
--
ALTER TABLE `bus_schedule`
  MODIFY `bus_schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bus_seat`
--
ALTER TABLE `bus_seat`
  MODIFY `bus_seat_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `bus_ibfk_1` FOREIGN KEY (`route_id`) REFERENCES `route` (`route_id`),
  ADD CONSTRAINT `bus_ibfk_2` FOREIGN KEY (`bus_schedule_id`) REFERENCES `bus_schedule` (`bus_schedule_id`),
  ADD CONSTRAINT `bus_ibfk_3` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`);

--
-- Constraints for table `bus_schedule`
--
ALTER TABLE `bus_schedule`
  ADD CONSTRAINT `bus_schedule_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `bus_schedule_ibfk_2` FOREIGN KEY (`route_id`) REFERENCES `route` (`route_id`),
  ADD CONSTRAINT `bus_schedule_ibfk_3` FOREIGN KEY (`bus_operator_id`) REFERENCES `bus_operators` (`bus_operator_id`);

--
-- Constraints for table `bus_seat`
--
ALTER TABLE `bus_seat`
  ADD CONSTRAINT `bus_seat_ibfk_1` FOREIGN KEY (`bus_schedule_id`) REFERENCES `bus_schedule` (`bus_schedule_id`),
  ADD CONSTRAINT `bus_seat_ibfk_2` FOREIGN KEY (`bus_id`) REFERENCES `bus` (`bus_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`bus_schedule_id`) REFERENCES `bus_schedule` (`bus_schedule_id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`bus_schedule_id`) REFERENCES `bus_schedule` (`bus_schedule_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
