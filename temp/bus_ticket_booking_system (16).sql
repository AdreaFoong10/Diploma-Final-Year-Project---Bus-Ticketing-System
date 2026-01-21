-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2023 at 05:01 PM
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
  `admin_email_address` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_pic` varchar(100) NOT NULL,
  `admin_level` varchar(100) NOT NULL,
  `admin_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_fullname`, `admin_username`, `admin_email_address`, `admin_password`, `admin_pic`, `admin_level`, `admin_status`) VALUES
(1, 'Adrea Foong Jun Jie', 'Adrea_al2', 'a@gmail.com', 'adrea', 'Nitro_Wallpaper_5000x2813.jpg', '2', 0),
(2, 'Mah Qi Xiang', 'Qi_Xiang_al1', 'kidqixiang@gmail.com', 'Qixiang12!', 'Nitro_Wallpaper_5000x2813.jpg', '1', 0),
(3, 'Tay Han Chung', 'Han_Chung_al1', 'thc@gmail.com', 'hanchung', 'Nitro_Wallpaper_5000x2813.jpg', '1', 0),
(4, 'Yap Chong Yi', 'chongyi35', 'yap@gmail.com', 'chongyi', 'Nitro_Wallpaper_5000x2813.jpg', '1', 0),
(8, 'qweqweq', 'sadasdsadasd', 'Sdads@f.c', 'ABC123#e', '', '1', 0);

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
(2, 'MUS6560', 2, 1, 2),
(3, 'MSA5808', 3, 1, 3),
(4, 'WHA2597', 4, 1, 4),
(5, 'WHY1567', 5, 1, 5),
(6, 'HJF7612', 6, 1, 6),
(7, 'WSA5808', 7, 1, 7),
(8, 'WSA5708', 8, 1, 8),
(9, 'JAS7890', 9, 2, 9),
(10, 'MNO2345', 10, 2, 10),
(11, 'PQR6789', 11, 2, 11),
(12, 'STU0123', 12, 2, 12),
(13, 'VWX4567', 13, 2, 13),
(14, 'YZA8901', 14, 2, 14),
(15, 'BCD2345', 15, 2, 15),
(16, 'EFG6789', 16, 2, 16),
(17, 'JKL7890', 17, 3, 17),
(18, 'MAS2345', 18, 3, 18),
(19, 'PCD1289', 19, 3, 19),
(20, 'SGF3223', 20, 3, 20),
(21, 'FGB1267', 21, 3, 21),
(22, 'YCD1201', 22, 3, 22),
(23, 'BOP5645', 23, 3, 23),
(24, 'GHS0989', 24, 3, 24),
(25, 'HIJ0123', 25, 4, 25),
(26, 'KLM4567', 26, 4, 26),
(27, 'NOP8901', 27, 4, 27),
(28, 'QRS2345', 28, 4, 28),
(29, 'TUV6789', 29, 4, 29),
(30, 'WXY0123', 30, 4, 30),
(31, 'ZAB4567', 31, 4, 31),
(32, 'CDE8901', 32, 4, 32),
(33, 'FGH2345', 33, 5, 33),
(34, 'IJK6789', 34, 5, 34),
(35, 'LMN0123', 35, 5, 35),
(36, 'OPQ4567', 36, 5, 36),
(37, 'RST8901', 37, 5, 37),
(38, 'UVW2345', 38, 5, 38),
(39, 'XYZ6789', 39, 5, 39),
(40, 'ABC0123', 40, 5, 40),
(41, 'FSD1625', 41, 6, 41),
(42, 'GHI8901', 42, 6, 42),
(43, 'JKL3456', 43, 6, 43),
(44, 'GGS9990', 44, 6, 44),
(45, 'PQR1234', 45, 6, 45),
(46, 'STU5678', 46, 6, 46),
(47, 'IIU1238', 47, 6, 47),
(48, 'NHS1023', 48, 6, 48),
(49, 'PGH0928', 49, 7, 49),
(50, 'GHS0293', 50, 7, 50),
(51, 'VWX9012', 51, 7, 51),
(52, 'YZA3456', 52, 7, 52),
(53, 'BCD7890', 53, 7, 53),
(54, 'EFG1234', 54, 7, 54),
(55, 'HIJ5678', 55, 7, 55),
(56, 'KLM9012', 56, 7, 56),
(57, '9QAUDI1', 57, 8, 57),
(58, 'TD91IM2', 58, 8, 58),
(59, '3R3G8XC', 59, 8, 59),
(60, 'PDHWD9N', 60, 8, 60),
(61, 'Q4SN5U8', 61, 8, 61),
(62, 'HE26Z7T', 62, 8, 62),
(63, 'XSFXL9X', 63, 8, 63),
(64, 'DYAYXDR', 64, 8, 64),
(65, 'RUAF70Y', 65, 9, 65),
(66, 'NKQ18BY', 66, 9, 66),
(67, '96CB31E', 67, 9, 67),
(68, '6TVRL3E', 68, 9, 68),
(69, '7MJAT0J', 69, 9, 69),
(70, '50K4DVP', 70, 9, 70),
(71, 'NE9SUTJ', 71, 9, 71),
(72, '71WTWA1', 72, 9, 72),
(73, 'IWLFQGW', 73, 10, 73),
(74, 'GZ7YN8B', 74, 10, 74),
(75, '1W1YX95', 75, 10, 75),
(76, '6CV1MQI', 76, 10, 76),
(77, 'UNORV54', 77, 10, 77),
(78, 'T0BO3WA', 78, 10, 78),
(79, 'F24NP7U', 79, 10, 79),
(80, 'EBVYN96', 80, 10, 80),
(81, 'L82L7QD', 81, 11, 81),
(82, '1VPQG1X', 82, 11, 82),
(83, 'HKP2ZMO', 83, 11, 83),
(84, '8NQCJGE', 84, 11, 84),
(85, 'SXSC076', 85, 11, 85),
(86, '25BDLSX', 86, 11, 86),
(87, 'INYNPPA', 87, 11, 87),
(88, '138WYSV', 88, 11, 88),
(89, '1JKGJC8', 89, 12, 89),
(90, 'Z5KJ66J', 90, 12, 90),
(91, '3VLMC3L', 91, 12, 91),
(92, 'I5YJ1ZN', 92, 12, 92),
(93, 'LDV3YUR', 93, 12, 93),
(94, 'FH0EBKC', 94, 12, 94),
(95, 'NENEH5O', 95, 12, 95),
(96, 'BGS1029', 96, 12, 96),
(97, 'BCEBDNU', 97, 1, 97),
(98, 'YZ1TYRP', 98, 1, 98),
(99, '5V7S1XQ', 99, 1, 99),
(100, 'G1T94KL', 100, 1, 100),
(101, 'BFSA5W4', 101, 1, 101),
(102, 'OPIJ5U5', 102, 1, 102),
(103, 'GFHVXMB', 103, 1, 103),
(104, 'GGOA377', 104, 1, 104),
(105, 'YVTQO3H', 105, 2, 105),
(106, 'H2MRZ6D', 106, 2, 106),
(107, 'Y1Y65VD', 107, 2, 107),
(108, 'V4N0Z86', 108, 2, 108),
(109, 'KNP5CKO', 109, 2, 109),
(110, 'VNXWOVO', 110, 2, 110),
(111, 'YWLMZD6', 111, 2, 111),
(112, 'NPCPDNM', 112, 2, 112),
(113, 'ABC1234', 113, 3, 113),
(114, 'DEF2345', 114, 3, 114),
(115, 'GHI3456', 115, 3, 115),
(116, 'JKL4567', 116, 3, 116),
(117, 'MNO5678', 117, 3, 117),
(118, 'PVF2789', 118, 3, 118),
(119, 'STU7890', 119, 3, 119),
(120, 'VWX8901', 120, 3, 120),
(121, 'XYZ9876', 121, 4, 121),
(122, 'LMN4567', 122, 4, 122),
(123, 'USI8364', 123, 4, 123),
(124, 'STU2345', 124, 4, 124),
(125, 'NHS0982', 125, 4, 125),
(126, 'JKL6789', 126, 4, 126),
(127, 'HGS0192', 127, 4, 127),
(128, 'DEF0123', 128, 4, 128),
(129, 'DET1304', 129, 5, 129),
(130, 'MNO4567', 130, 5, 130),
(131, 'JXC1923', 131, 5, 131),
(132, 'NOP5432', 132, 5, 132),
(133, 'GSH7643', 133, 5, 133),
(134, 'XGS7632', 134, 5, 134),
(135, 'BCD3456', 135, 5, 135),
(136, 'CVB1623', 136, 5, 136),
(137, 'KJS9172', 137, 6, 137),
(138, 'FFD1234', 138, 6, 138),
(139, 'UWK7129', 139, 6, 139),
(140, 'JKL2345', 140, 6, 140),
(141, 'TTE7263', 141, 6, 141),
(142, 'RDS6689', 142, 6, 142),
(143, 'ARQ7752', 143, 6, 143),
(144, 'SGX7716', 144, 6, 144),
(145, 'XCV0823', 145, 7, 145),
(146, 'NGS0192', 146, 7, 145),
(147, 'STD8374', 147, 7, 147),
(148, 'NST5461', 148, 7, 148),
(149, 'FSG8134', 149, 7, 149),
(150, 'UEY1934', 150, 7, 150),
(151, 'HBG0192', 151, 7, 151),
(152, 'GSF1298', 152, 7, 152),
(153, 'VGS0192', 153, 8, 153),
(154, 'AUI1245', 154, 8, 154),
(155, 'TWE8162', 155, 8, 155),
(156, 'NCB1823', 156, 8, 156),
(157, 'JJS3092', 157, 8, 157),
(158, 'BMW6789', 158, 8, 158),
(159, 'GTS3882', 159, 8, 159),
(160, 'XSQ8374', 160, 8, 160),
(161, 'QTR1263', 161, 9, 161),
(162, 'RTY9123', 162, 9, 162),
(163, 'PZO1623', 163, 9, 163),
(164, 'NST6421', 164, 9, 164),
(165, 'BHG0081', 165, 9, 165),
(166, 'GFD1834', 166, 9, 166),
(167, 'GHS0192', 167, 9, 167),
(168, 'OIU1928', 168, 9, 168),
(169, 'ABC9876', 169, 10, 169),
(170, 'SDF9012', 170, 10, 170),
(171, 'UST1936', 171, 10, 171),
(172, 'UET1734', 172, 10, 172),
(173, 'MNO9012', 173, 10, 173),
(174, 'HTR6989', 174, 10, 174),
(175, 'YTR3553', 175, 10, 175),
(176, 'PIY5431', 176, 10, 176),
(177, 'JKL9876', 177, 11, 177),
(178, 'WES7192', 178, 11, 178),
(179, 'YTX1934', 179, 11, 179),
(180, 'LOX9134', 180, 11, 180),
(181, 'GSH6344', 181, 11, 181),
(182, 'YZA6789', 182, 11, 182),
(183, 'NGS0183', 183, 11, 183),
(184, 'EFG0123', 184, 11, 184),
(185, 'GFF3211', 185, 12, 185),
(186, 'JJH1723', 186, 12, 186),
(187, 'UYS1623', 187, 12, 187),
(188, 'HHJ3345', 188, 12, 188),
(189, 'FSG1029', 189, 12, 189),
(190, 'YSR1823', 190, 12, 190),
(191, 'YST1022', 191, 12, 191),
(192, 'BSU1623', 192, 12, 192),
(193, 'XYZ1234', 193, 1, 193),
(194, 'HDT3462', 194, 1, 194),
(195, 'HSU1834', 195, 1, 195),
(196, 'BBC2022', 196, 1, 196),
(197, 'VWX1111', 197, 1, 197),
(198, 'USO2940', 198, 1, 198),
(199, 'OIO9182', 199, 1, 199),
(200, 'MHS1826', 200, 1, 200),
(201, 'JUW1834', 201, 2, 201),
(202, 'DER1325', 202, 2, 202),
(203, 'MKJ0192', 203, 2, 203),
(204, 'JFS0990', 204, 2, 204),
(205, 'MDQ2345', 205, 2, 205),
(206, 'PBB2389', 206, 2, 206),
(207, 'SFQ5823', 207, 2, 207),
(208, 'VGQ1267', 208, 2, 208),
(209, 'XYZ5678', 209, 3, 209),
(210, 'LMN9012', 210, 3, 210),
(211, 'PQR3456', 211, 3, 211),
(212, 'UTE1673', 212, 3, 212),
(213, 'VWX2345', 213, 3, 213),
(214, 'FPO1034', 214, 3, 214),
(215, 'XOY1236', 215, 3, 215),
(216, 'DEF4567', 216, 3, 216),
(217, 'ABC9012', 217, 4, 217),
(218, 'DEF3456', 218, 4, 218),
(219, 'GHI7890', 219, 4, 219),
(220, 'ISU9304', 220, 4, 220),
(221, 'MNO6789', 221, 4, 221),
(222, 'PSf1263', 222, 4, 222),
(223, 'XXS1771', 223, 4, 223),
(224, 'NBV0192', 224, 4, 224),
(225, 'XYZ3456', 225, 5, 225),
(226, 'LMN7890', 226, 5, 226),
(227, 'PQR2345', 227, 5, 227),
(228, 'STU6789', 228, 5, 228),
(229, 'ASY3742', 229, 5, 229),
(230, 'QTA1324', 230, 5, 230),
(231, 'GHS4452', 231, 5, 231),
(232, 'GGH0912', 232, 5, 232),
(233, 'HGU7654', 233, 6, 233),
(234, 'BBH1023', 234, 6, 234),
(235, 'UUH7753', 235, 6, 235),
(236, 'UVD2021', 236, 6, 236),
(237, 'KSJ0953', 237, 6, 237),
(238, 'JDI7341', 238, 6, 238),
(239, 'SXO7331', 239, 6, 239),
(240, 'VWX6789', 240, 6, 240),
(241, 'XYZ2345', 241, 7, 241),
(242, 'UDT9372', 242, 7, 242),
(243, 'HTS9382', 243, 7, 243),
(244, 'QBC8123', 244, 7, 244),
(245, 'QWE9823', 245, 7, 245),
(246, 'JRE2341', 246, 7, 246),
(247, 'ZQA5281', 247, 7, 247),
(248, 'MJS0192', 248, 7, 248),
(249, 'XYZ7890', 249, 8, 249),
(250, 'LMN2345', 250, 8, 250),
(251, 'PDW3289', 251, 8, 251),
(252, 'BGQ3623', 252, 8, 252),
(253, 'POW1267', 253, 8, 253),
(254, 'JKY1934', 254, 8, 254),
(255, 'JSU8253', 255, 8, 255),
(256, 'DEF6789', 256, 8, 256),
(257, 'UYS1923', 257, 9, 257),
(258, 'DEF5678', 258, 9, 258),
(259, 'GHI9012', 259, 9, 259),
(260, 'BBH4321', 260, 9, 260),
(261, 'MNO7890', 261, 9, 261),
(262, 'LLO1023', 262, 9, 262),
(263, 'NNC3333', 263, 9, 263),
(264, 'VWX0123', 264, 9, 264),
(265, 'SSC1234', 265, 10, 265),
(266, 'LMN5678', 266, 10, 266),
(267, 'PQR9012', 267, 10, 267),
(268, 'STU3456', 268, 10, 268),
(269, 'VWX7890', 269, 10, 269),
(270, 'YYT2634', 270, 10, 270),
(271, 'UWQ2023', 271, 10, 271),
(272, 'JUS4132', 272, 10, 272),
(273, 'ABC5678', 273, 11, 273),
(274, 'DEF9012', 274, 11, 274),
(275, 'POU0192', 275, 11, 275),
(276, 'JFS9990', 276, 11, 276),
(277, 'MVO2345', 277, 11, 277),
(278, 'PBG1289', 278, 11, 278),
(279, 'KLP1223', 279, 11, 279),
(280, 'OIQ1267', 280, 11, 280),
(281, 'XYZ9012', 281, 12, 281),
(282, 'LMN3456', 282, 12, 282),
(283, 'PQR7890', 283, 12, 283),
(284, 'JRS9222', 284, 12, 284),
(285, 'DFR7453', 285, 12, 285),
(286, 'JKL0123', 286, 12, 286),
(287, 'RRE4253', 287, 12, 287),
(288, 'LOP1824', 288, 12, 288),
(289, 'ABC7890', 289, 1, 289),
(290, 'OOW6182', 290, 1, 290),
(291, 'RRE184', 291, 1, 291),
(292, 'JYT1823', 292, 1, 292),
(293, 'JSI4301', 293, 1, 293),
(294, 'JRS4652', 294, 1, 294),
(295, 'QRS4321', 295, 1, 295),
(296, 'CVS4371', 296, 1, 296),
(297, 'BTY3841', 297, 2, 297),
(298, 'LMN6789', 298, 2, 298),
(299, 'PQR0123', 299, 2, 299),
(300, 'STU4567', 300, 2, 300),
(301, 'GSH0192', 301, 2, 301),
(302, 'YHI0957', 302, 2, 302),
(303, 'GHI6789', 303, 2, 303),
(304, 'KKI9182', 304, 2, 304),
(305, 'ABC6789', 305, 3, 305),
(306, 'YQE1523', 306, 3, 306),
(307, 'GFS1623', 307, 3, 307),
(308, 'JKL8901', 308, 3, 308),
(309, 'MHO2645', 309, 3, 309),
(310, 'PCF3289', 310, 3, 310),
(311, 'VGG0013', 311, 3, 311),
(312, 'HDW1267', 312, 3, 312),
(313, 'XYZ0123', 313, 4, 313),
(314, 'LOI1023', 314, 4, 314),
(315, 'PQR8901', 315, 4, 315),
(316, 'KKZ3641', 316, 4, 316),
(317, 'LLO3843', 317, 4, 317),
(318, 'DFD1882', 318, 4, 318),
(319, 'GHI4567', 319, 4, 319),
(320, 'RES4209', 320, 4, 320),
(321, 'ABC4567', 321, 5, 321),
(322, 'DEF8901', 322, 5, 322),
(323, 'GHI2345', 323, 5, 323),
(324, 'JSI2834', 324, 5, 324),
(325, 'MNO0123', 325, 5, 325),
(326, 'JXI1023', 326, 5, 326),
(327, 'CCV2222', 327, 5, 327),
(328, 'CPU6253', 328, 5, 328),
(329, 'FGS1789', 329, 6, 329),
(330, 'FGS4431', 330, 6, 330);

-- --------------------------------------------------------

--
-- Table structure for table `bus_operators`
--

CREATE TABLE `bus_operators` (
  `bus_operator_id` int(11) NOT NULL,
  `bus_operator_name` varchar(100) NOT NULL,
  `bus_operator_pic` varchar(100) NOT NULL,
  `bus_operator_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus_operators`
--

INSERT INTO `bus_operators` (`bus_operator_id`, `bus_operator_name`, `bus_operator_pic`, `bus_operator_status`) VALUES
(1, 'City Express', 'city express.png', 1),
(2, 'KKKL', 'KKKL.png', 1),
(3, 'Maraliner', 'maraliner.png', 1),
(4, 'Mayang Sari Express', 'mayang sari.png', 1),
(5, 'Yellow Star Express', 'yellow star.png', 1);

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
(1, '2023-05-05', 'Kuala Lumpur Sentral', 'Penang Sentral', 1.30, '05.12', 6.42, 35, 'A', 1, 1, 5, 3),
(2, '2023-05-05', 'Kuala Lumpur Sentral', 'Penang Sentral', 6.30, '05.12', 11.42, 36, 'B', 1, 2, 5, 3),
(3, '2023-05-05', 'Kuala Lumpur Sentral', 'Penang Sentral', 12.00, '05.12', 17.12, 35, 'C', 1, 3, 5, 3),
(4, '2023-05-05', 'Kuala Lumpur Sentral', 'Penang Sentral', 14.15, '05.12', 19.27, 35, 'D', 1, 4, 5, 3),
(5, '2023-05-05', 'Kuala Lumpur Sentral', 'Penang Sentral', 19.15, '05.12', 0.27, 37, 'E', 1, 5, 5, 3),
(6, '2023-06-26', 'Kuala Lumpur Sentral', 'Penang Sentral', 1.30, '05.12', 6.42, 35, 'A', 1, 1, 5, 3),
(7, '2023-06-26', 'Kuala Lumpur Sentral', 'Penang Sentral', 6.30, '05.12', 11.42, 36, 'B', 1, 2, 5, 3),
(8, '2023-06-26', 'Kuala Lumpur Sentral', 'Penang Sentral', 12.00, '05.12', 17.12, 35, 'C', 1, 3, 5, 3),
(9, '2023-06-26', 'Kuala Lumpur Sentral', 'Penang Sentral', 14.15, '05.12', 19.27, 35, 'D', 1, 4, 5, 3),
(10, '2023-06-26', 'Kuala Lumpur Sentral', 'Penang Sentral', 19.15, '05.12', 0.27, 37, 'E', 1, 5, 5, 3),
(11, '2023-07-01', 'Kuala Lumpur Sentral', 'Penang Sentral', 1.30, '05.12', 6.42, 35, 'A', 1, 1, 5, 3),
(12, '2023-07-01', 'Kuala Lumpur Sentral', 'Penang Sentral', 6.30, '05.12', 11.42, 36, 'B', 1, 2, 5, 3),
(13, '2023-07-01', 'Kuala Lumpur Sentral', 'Penang Sentral', 12.00, '05.12', 17.12, 35, 'C', 1, 3, 5, 3),
(14, '2023-07-01', 'Kuala Lumpur Sentral', 'Penang Sentral', 14.15, '05.12', 19.27, 35, 'D', 1, 4, 5, 3),
(15, '2023-07-01', 'Kuala Lumpur Sentral', 'Penang Sentral', 19.15, '05.12', 0.27, 37, 'E', 1, 5, 5, 3),
(16, '2023-07-02', 'Kuala Lumpur Sentral', 'Penang Sentral', 1.30, '05.12', 6.42, 35, 'A', 1, 1, 5, 3),
(17, '2023-07-02', 'Kuala Lumpur Sentral', 'Penang Sentral', 6.30, '05.12', 11.42, 36, 'B', 1, 2, 5, 3),
(18, '2023-07-02', 'Kuala Lumpur Sentral', 'Penang Sentral', 12.00, '05.12', 17.12, 35, 'C', 1, 3, 5, 3),
(19, '2023-07-02', 'Kuala Lumpur Sentral', 'Penang Sentral', 14.15, '05.12', 19.27, 35, 'D', 1, 4, 5, 3),
(20, '2023-07-02', 'Kuala Lumpur Sentral', 'Penang Sentral', 19.15, '05.12', 0.27, 37, 'E', 1, 5, 5, 3),
(21, '2023-07-03', 'Kuala Lumpur Sentral', 'Penang Sentral', 1.30, '05.12', 6.42, 35, 'A', 1, 1, 5, 3),
(22, '2023-07-03', 'Kuala Lumpur Sentral', 'Penang Sentral', 6.30, '05.12', 11.42, 36, 'B', 1, 2, 5, 3),
(23, '2023-07-03', 'Kuala Lumpur Sentral', 'Penang Sentral', 12.00, '05.12', 17.12, 35, 'C', 1, 3, 5, 3),
(24, '2023-07-03', 'Kuala Lumpur Sentral', 'Penang Sentral', 14.15, '05.12', 19.27, 35, 'D', 1, 4, 5, 3),
(25, '2023-07-03', 'Kuala Lumpur Sentral', 'Penang Sentral', 19.15, '05.12', 0.27, 37, 'E', 1, 5, 5, 3),
(26, '2023-07-04', 'Malacca Sentral', 'Kuala Lumpur Sentral', 6.00, '02.00', 8.00, 12, 'A', 1, 1, 1, 3),
(27, '2023-07-04', 'Malacca Sentral', 'Kuala Lumpur Sentral', 8.45, '02.00', 10.45, 15, 'B', 1, 2, 1, 3),
(28, '2023-07-04', 'Malacca Sentral', 'Kuala Lumpur Sentral', 12.00, '02.00', 14.00, 16, 'C', 1, 3, 1, 3),
(29, '2023-07-04', 'Malacca Sentral', 'Kuala Lumpur Sentral', 12.30, '02.00', 14.30, 14.5, 'D', 1, 4, 1, 3),
(30, '2023-07-04', 'Malacca Sentral', 'Kuala Lumpur Sentral', 21.00, '02.00', 23.00, 13, 'E', 1, 5, 1, 3),
(31, '2023-07-04', 'Malacca Sentral', 'Johor Bahru Sentral', 6.15, '03.54', 10.09, 20, 'A', 1, 1, 2, 3),
(32, '2023-07-04', 'Malacca Sentral', 'Johor Bahru Sentral', 7.45, '03.54', 11.39, 21, 'B', 1, 2, 2, 3),
(33, '2023-07-04', 'Malacca Sentral', 'Johor Bahru Sentral', 12.10, '03.40', 16.04, 22, 'C', 1, 3, 2, 3),
(34, '2023-07-04', 'Malacca Sentral', 'Johor Bahru Sentral', 15.00, '03.54', 18.54, 20.5, 'D', 1, 4, 2, 3),
(35, '2023-07-04', 'Malacca Sentral', 'Johor Bahru Sentral', 18.00, '03.54', 21.54, 21, 'E', 1, 5, 2, 3),
(36, '2023-07-04', 'Malacca Sentral', 'Penang Sentral', 8.00, '07.48', 15.48, 42, 'A', 1, 1, 3, 3),
(37, '2023-07-04', 'Malacca Sentral', 'Penang Sentral', 8.30, '07.48', 16.18, 43, 'B', 1, 2, 3, 3),
(38, '2023-07-04', 'Malacca Sentral', 'Penang Sentral', 12.30, '07.48', 20.18, 45, 'C', 1, 3, 3, 3),
(39, '2023-07-04', 'Malacca Sentral', 'Penang Sentral', 11.45, '07.48', 19.33, 48, 'D', 1, 4, 3, 3),
(40, '2023-07-04', 'Malacca Sentral', 'Penang Sentral', 20.00, '07.48', 3.48, 49, 'E', 1, 5, 3, 3),
(41, '2023-07-04', 'Kuala Lumpur Sentral', 'Johor Bahru Sentral', 12.30, '05.12', 17.42, 35, 'A', 1, 1, 4, 3),
(42, '2023-07-04', 'Kuala Lumpur Sentral', 'Johor Bahru Sentral', 1.00, '05.12', 6.12, 37, 'B', 1, 2, 4, 3),
(43, '2023-07-04', 'Kuala Lumpur Sentral', 'Johor Bahru Sentral', 7.00, '05.12', 12.12, 40, 'C', 1, 3, 4, 3),
(44, '2023-07-04', 'Kuala Lumpur Sentral', 'Johor Bahru Sentral', 12.00, '05.12', 17.12, 37, 'D', 1, 4, 4, 3),
(45, '2023-07-04', 'Kuala Lumpur Sentral', 'Johor Bahru Sentral', 17.30, '05.12', 10.42, 36, 'E', 1, 5, 4, 3),
(46, '2023-07-04', 'Kuala Lumpur Sentral', 'Penang Sentral', 1.30, '05.12', 6.42, 35, 'A', 1, 1, 5, 3),
(47, '2023-07-04', 'Kuala Lumpur Sentral', 'Penang Sentral', 6.30, '05.12', 11.42, 36, 'B', 1, 2, 5, 3),
(48, '2023-07-04', 'Kuala Lumpur Sentral', 'Penang Sentral', 12.00, '05.12', 17.12, 35, 'C', 1, 3, 5, 3),
(49, '2023-07-04', 'Kuala Lumpur Sentral', 'Penang Sentral', 14.15, '05.12', 19.27, 35, 'D', 1, 4, 5, 3),
(50, '2023-07-04', 'Kuala Lumpur Sentral', 'Penang Sentral', 19.15, '05.12', 0.27, 37, 'E', 1, 5, 5, 3),
(51, '2023-07-04', 'Johor Bahru Sentral', 'Penang Sentral', 9.00, '09.45', 18.45, 35, 'A', 1, 1, 6, 3),
(52, '2023-07-04', 'Johor Bahru Sentral', 'Penang Sentral', 9.30, '09.45', 19.15, 36, 'B', 1, 2, 6, 3),
(53, '2023-07-04', 'Johor Bahru Sentral', 'Penang Sentral', 16.00, '09.45', 1.45, 35, 'C', 1, 3, 6, 3),
(54, '2023-07-04', 'Johor Bahru Sentral', 'Penang Sentral', 19.30, '09.45', 5.15, 35, 'D', 1, 4, 6, 3),
(55, '2023-07-04', 'Johor Bahru Sentral', 'Penang Sentral', 20.00, '09.45', 5.45, 37, 'E', 1, 5, 6, 3),
(56, '2023-07-04', 'Kuala Lumpur Sentral', 'Malacca Sentral', 7.00, '02.00', 9.00, 14, 'A', 1, 1, 7, 3),
(57, '2023-07-04', 'Kuala Lumpur Sentral', 'Malacca Sentral', 8.30, '02.00', 10.30, 15, 'B', 1, 2, 7, 3),
(58, '2023-07-04', 'Kuala Lumpur Sentral', 'Malacca Sentral', 12.00, '02.00', 14.00, 16, 'C', 1, 3, 7, 3),
(59, '2023-07-04', 'Kuala Lumpur Sentral', 'Malacca Sentral', 14.30, '02.00', 16.30, 14.5, 'D', 1, 4, 7, 3),
(60, '2023-07-04', 'Kuala Lumpur Sentral', 'Malacca Sentral', 20.00, '02.00', 22.00, 13, 'E', 1, 5, 7, 3),
(61, '2023-07-04', 'Johor Bahru Sentral', 'Malacca Sentral', 7.30, '03.54', 11.24, 20, 'A', 1, 1, 8, 3),
(62, '2023-07-04', 'Johor Bahru Sentral', 'Malacca Sentral', 8.30, '03.54', 12.24, 21, 'B', 1, 2, 8, 3),
(63, '2023-07-04', 'Johor Bahru Sentral', 'Malacca Sentral', 12.00, '03.54', 15.54, 22, 'C', 1, 3, 8, 3),
(64, '2023-07-04', 'Johor Bahru Sentral', 'Malacca Sentral', 15.00, '03.54', 16.54, 20.5, 'D', 1, 4, 8, 3),
(65, '2023-07-04', 'Johor Bahru Sentral', 'Malacca Sentral', 19.30, '03.54', 11.24, 21, 'E', 1, 5, 8, 3),
(66, '2023-07-04', 'Penang Sentral', 'Malacca Sentral', 9.15, '07.48', 17.03, 42, 'A', 1, 1, 9, 3),
(67, '2023-07-04', 'Penang Sentral', 'Malacca Sentral', 9.30, '07.48', 17.18, 43, 'B', 1, 2, 9, 3),
(68, '2023-07-04', 'Penang Sentral', 'Malacca Sentral', 10.00, '07.48', 17.48, 45, 'C', 1, 3, 9, 3),
(69, '2023-07-04', 'Penang Sentral', 'Malacca Sentral', 10.30, '07.48', 18.18, 48, 'D', 1, 4, 9, 3),
(70, '2023-07-04', 'Penang Sentral', 'Malacca Sentral', 21.15, '07.48', 5.03, 49, 'E', 1, 5, 9, 3),
(71, '2023-07-04', 'Johor Bahru Sentral', 'Kuala Lumpur Sentral', 4.00, '05.12', 9.12, 35, 'A', 1, 1, 10, 3),
(72, '2023-07-04', 'Johor Bahru Sentral', 'Kuala Lumpur Sentral', 2.30, '05.12', 7.42, 37, 'B', 1, 2, 10, 3),
(73, '2023-07-04', 'Johor Bahru Sentral', 'Kuala Lumpur Sentral', 10.10, '05.12', 15.22, 40, 'C', 1, 3, 10, 3),
(74, '2023-07-04', 'Johor Bahru Sentral', 'Kuala Lumpur Sentral', 15.30, '05.12', 120.12, 37, 'D', 1, 4, 10, 3),
(75, '2023-07-04', 'Johor Bahru Sentral', 'Kuala Lumpur Sentral', 8.20, '05.12', 13.32, 36, 'E', 1, 5, 10, 3),
(76, '2023-07-04', 'Penang Sentral', 'Kuala Lumpur Sentral', 0.15, '05.12', 5.27, 35, 'A', 1, 1, 11, 3),
(77, '2023-07-04', 'Penang Sentral', 'Kuala Lumpur Sentral', 0.45, '05.12', 5.57, 36, 'B', 1, 2, 11, 3),
(78, '2023-07-04', 'Penang Sentral', 'Kuala Lumpur Sentral', 7.00, '05.12', 12.12, 35, 'C', 1, 3, 11, 3),
(79, '2023-07-04', 'Penang Sentral', 'Kuala Lumpur Sentral', 12.00, '05.12', 17.12, 35, 'D', 1, 4, 11, 3),
(80, '2023-07-04', 'Penang Sentral', 'Kuala Lumpur Sentral', 17.00, '05.12', 22.12, 37, 'E', 1, 5, 11, 3),
(81, '2023-07-04', 'Penang Sentral', 'Johor Bahru Sentral', 7.30, '09.45', 17.15, 35, 'A', 1, 1, 12, 3),
(82, '2023-07-04', 'Penang Sentral', 'Johor Bahru Sentral', 8.15, '09.45', 18.00, 36, 'B', 1, 2, 12, 3),
(83, '2023-07-04', 'Penang Sentral', 'Johor Bahru Sentral', 10.00, '09.45', 19.45, 35, 'C', 1, 3, 12, 3),
(84, '2023-07-04', 'Penang Sentral', 'Johor Bahru Sentral', 20.00, '09.45', 5.45, 35, 'D', 1, 4, 12, 3),
(85, '2023-07-04', 'Penang Sentral', 'Johor Bahru Sentral', 20.30, '09.45', 6.15, 37, 'E', 1, 5, 12, 3),
(86, '2023-07-05', 'Malacca Sentral', 'Kuala Lumpur Sentral', 6.00, '02.00', 8.00, 12, 'A', 1, 1, 1, 3),
(87, '2023-07-05', 'Malacca Sentral', 'Kuala Lumpur Sentral', 8.45, '02.00', 10.45, 15, 'B', 1, 2, 1, 3),
(88, '2023-07-05', 'Malacca Sentral', 'Kuala Lumpur Sentral', 12.00, '02.00', 14.00, 16, 'C', 1, 3, 1, 3),
(89, '2023-07-05', 'Malacca Sentral', 'Kuala Lumpur Sentral', 12.30, '02.00', 14.30, 14.5, 'D', 1, 4, 1, 3),
(90, '2023-07-05', 'Malacca Sentral', 'Kuala Lumpur Sentral', 21.00, '02.00', 23.00, 13, 'E', 1, 5, 1, 3),
(91, '2023-07-05', 'Malacca Sentral', 'Johor Bahru Sentral', 6.15, '03.54', 10.09, 20, 'A', 1, 1, 2, 3),
(92, '2023-07-05', 'Malacca Sentral', 'Johor Bahru Sentral', 7.45, '03.54', 11.39, 21, 'B', 1, 2, 2, 3),
(93, '2023-07-05', 'Malacca Sentral', 'Johor Bahru Sentral', 12.10, '03.40', 16.04, 22, 'C', 1, 3, 2, 3),
(94, '2023-07-05', 'Malacca Sentral', 'Johor Bahru Sentral', 15.00, '03.54', 18.54, 20.5, 'D', 1, 4, 2, 3),
(95, '2023-07-05', 'Malacca Sentral', 'Johor Bahru Sentral', 18.00, '03.54', 21.54, 21, 'E', 1, 5, 2, 3),
(96, '2023-07-05', 'Malacca Sentral', 'Penang Sentral', 8.00, '07.48', 15.48, 42, 'A', 1, 1, 3, 3),
(97, '2023-07-05', 'Malacca Sentral', 'Penang Sentral', 8.30, '07.48', 16.18, 43, 'B', 1, 2, 3, 3),
(98, '2023-07-05', 'Malacca Sentral', 'Penang Sentral', 12.30, '07.48', 20.18, 45, 'C', 1, 3, 3, 3),
(99, '2023-07-05', 'Malacca Sentral', 'Penang Sentral', 11.45, '07.48', 19.33, 48, 'D', 1, 4, 3, 3),
(100, '2023-07-05', 'Malacca Sentral', 'Penang Sentral', 20.00, '07.48', 3.48, 49, 'E', 1, 5, 3, 3),
(101, '2023-07-05', 'Kuala Lumpur Sentral', 'Johor Bahru Sentral', 12.30, '05.12', 17.42, 35, 'A', 1, 1, 4, 3),
(102, '2023-07-05', 'Kuala Lumpur Sentral', 'Johor Bahru Sentral', 1.00, '05.12', 6.12, 37, 'B', 1, 2, 4, 3),
(103, '2023-07-05', 'Kuala Lumpur Sentral', 'Johor Bahru Sentral', 7.00, '05.12', 12.12, 40, 'C', 1, 3, 4, 3),
(104, '2023-07-05', 'Kuala Lumpur Sentral', 'Johor Bahru Sentral', 12.00, '05.12', 17.12, 37, 'D', 1, 4, 4, 3),
(105, '2023-07-05', 'Kuala Lumpur Sentral', 'Johor Bahru Sentral', 17.30, '05.12', 10.42, 36, 'E', 1, 5, 4, 3),
(106, '2023-07-05', 'Kuala Lumpur Sentral', 'Penang Sentral', 1.30, '05.12', 6.42, 35, 'A', 1, 1, 5, 3),
(107, '2023-07-05', 'Kuala Lumpur Sentral', 'Penang Sentral', 6.30, '05.12', 11.42, 36, 'B', 1, 2, 5, 3),
(108, '2023-07-05', 'Kuala Lumpur Sentral', 'Penang Sentral', 12.00, '05.12', 17.12, 35, 'C', 1, 3, 5, 3),
(109, '2023-07-05', 'Kuala Lumpur Sentral', 'Penang Sentral', 14.15, '05.12', 19.27, 35, 'D', 1, 4, 5, 3),
(110, '2023-07-05', 'Kuala Lumpur Sentral', 'Penang Sentral', 19.15, '05.12', 0.27, 37, 'E', 1, 5, 5, 3),
(111, '2023-07-05', 'Johor Bahru Sentral', 'Penang Sentral', 9.00, '09.45', 18.45, 35, 'A', 1, 1, 6, 3),
(112, '2023-07-05', 'Johor Bahru Sentral', 'Penang Sentral', 9.30, '09.45', 19.15, 36, 'B', 1, 2, 6, 3),
(113, '2023-07-05', 'Johor Bahru Sentral', 'Penang Sentral', 16.00, '09.45', 1.45, 35, 'C', 1, 3, 6, 3),
(114, '2023-07-05', 'Johor Bahru Sentral', 'Penang Sentral', 19.30, '09.45', 5.15, 35, 'D', 1, 4, 6, 3),
(115, '2023-07-05', 'Johor Bahru Sentral', 'Penang Sentral', 20.00, '09.45', 5.45, 37, 'E', 1, 5, 6, 3),
(116, '2023-07-05', 'Kuala Lumpur Sentral', 'Malacca Sentral', 7.00, '02.00', 9.00, 14, 'A', 1, 1, 7, 3),
(117, '2023-07-05', 'Kuala Lumpur Sentral', 'Malacca Sentral', 8.30, '02.00', 10.30, 15, 'B', 1, 2, 7, 3),
(118, '2023-07-05', 'Kuala Lumpur Sentral', 'Malacca Sentral', 12.00, '02.00', 14.00, 16, 'C', 1, 3, 7, 3),
(119, '2023-07-05', 'Kuala Lumpur Sentral', 'Malacca Sentral', 14.30, '02.00', 16.30, 14.5, 'D', 1, 4, 7, 3),
(120, '2023-07-05', 'Kuala Lumpur Sentral', 'Malacca Sentral', 20.00, '02.00', 22.00, 13, 'E', 1, 5, 7, 3),
(121, '2023-07-05', 'Johor Bahru Sentral', 'Malacca Sentral', 7.30, '03.54', 11.24, 20, 'A', 1, 1, 8, 3),
(122, '2023-07-05', 'Johor Bahru Sentral', 'Malacca Sentral', 8.30, '03.54', 12.24, 21, 'B', 1, 2, 8, 3),
(123, '2023-07-05', 'Johor Bahru Sentral', 'Malacca Sentral', 12.00, '03.54', 15.54, 22, 'C', 1, 3, 8, 3),
(124, '2023-07-05', 'Johor Bahru Sentral', 'Malacca Sentral', 15.00, '03.54', 16.54, 20.5, 'D', 1, 4, 8, 3),
(125, '2023-07-05', 'Johor Bahru Sentral', 'Malacca Sentral', 19.30, '03.54', 11.24, 21, 'E', 1, 5, 8, 3),
(126, '2023-07-05', 'Penang Sentral', 'Malacca Sentral', 9.15, '07.48', 17.03, 42, 'A', 1, 1, 9, 3),
(127, '2023-07-05', 'Penang Sentral', 'Malacca Sentral', 9.30, '07.48', 17.18, 43, 'B', 1, 2, 9, 3),
(128, '2023-07-05', 'Penang Sentral', 'Malacca Sentral', 10.00, '07.48', 17.48, 45, 'C', 1, 3, 9, 3),
(129, '2023-07-05', 'Penang Sentral', 'Malacca Sentral', 10.30, '07.48', 18.18, 48, 'D', 1, 4, 9, 3),
(130, '2023-07-05', 'Penang Sentral', 'Malacca Sentral', 21.15, '07.48', 5.03, 49, 'E', 1, 5, 9, 3),
(131, '2023-07-05', 'Johor Bahru Sentral', 'Kuala Lumpur Sentral', 4.00, '05.12', 9.12, 35, 'A', 1, 1, 10, 3),
(132, '2023-07-05', 'Johor Bahru Sentral', 'Kuala Lumpur Sentral', 2.30, '05.12', 7.42, 37, 'B', 1, 2, 10, 3),
(133, '2023-07-05', 'Johor Bahru Sentral', 'Kuala Lumpur Sentral', 10.10, '05.12', 15.22, 40, 'C', 1, 3, 10, 3),
(134, '2023-07-05', 'Johor Bahru Sentral', 'Kuala Lumpur Sentral', 15.30, '05.12', 120.12, 37, 'D', 1, 4, 10, 3),
(135, '2023-07-05', 'Johor Bahru Sentral', 'Kuala Lumpur Sentral', 8.20, '05.12', 13.32, 36, 'E', 1, 5, 10, 3),
(136, '2023-07-05', 'Penang Sentral', 'Kuala Lumpur Sentral', 0.15, '05.12', 5.27, 35, 'A', 1, 1, 11, 3),
(137, '2023-07-05', 'Penang Sentral', 'Kuala Lumpur Sentral', 0.45, '05.12', 5.57, 36, 'B', 1, 2, 11, 3),
(138, '2023-07-05', 'Penang Sentral', 'Kuala Lumpur Sentral', 7.00, '05.12', 12.12, 35, 'C', 1, 3, 11, 3),
(139, '2023-07-05', 'Penang Sentral', 'Kuala Lumpur Sentral', 12.00, '05.12', 17.12, 35, 'D', 1, 4, 11, 3),
(140, '2023-07-05', 'Penang Sentral', 'Kuala Lumpur Sentral', 17.00, '05.12', 22.12, 37, 'E', 1, 5, 11, 3),
(141, '2023-07-05', 'Penang Sentral', 'Johor Bahru Sentral', 7.30, '09.45', 17.15, 35, 'A', 1, 1, 12, 3),
(142, '2023-07-05', 'Penang Sentral', 'Johor Bahru Sentral', 8.15, '09.45', 18.00, 36, 'B', 1, 2, 12, 3),
(143, '2023-07-05', 'Penang Sentral', 'Johor Bahru Sentral', 10.00, '09.45', 19.45, 35, 'C', 1, 3, 12, 3),
(144, '2023-07-05', 'Penang Sentral', 'Johor Bahru Sentral', 20.00, '09.45', 5.45, 35, 'D', 1, 4, 12, 3),
(145, '2023-07-05', 'Penang Sentral', 'Johor Bahru Sentral', 20.30, '09.45', 6.15, 37, 'E', 1, 5, 12, 3),
(146, '2023-07-06', 'Malacca Sentral', 'Kuala Lumpur Sentral', 6.00, '02.00', 8.00, 12, 'A', 1, 1, 1, 3),
(147, '2023-07-06', 'Malacca Sentral', 'Kuala Lumpur Sentral', 8.45, '02.00', 10.45, 15, 'B', 1, 2, 1, 3),
(148, '2023-07-06', 'Malacca Sentral', 'Kuala Lumpur Sentral', 12.00, '02.00', 14.00, 16, 'C', 1, 3, 1, 3),
(149, '2023-07-06', 'Malacca Sentral', 'Kuala Lumpur Sentral', 12.30, '02.00', 14.30, 14.5, 'D', 1, 4, 1, 3),
(150, '2023-07-06', 'Malacca Sentral', 'Kuala Lumpur Sentral', 21.00, '02.00', 23.00, 13, 'E', 1, 5, 1, 3),
(151, '2023-07-06', 'Malacca Sentral', 'Johor Bahru Sentral', 6.15, '03.54', 10.09, 20, 'A', 1, 1, 2, 3),
(152, '2023-07-06', 'Malacca Sentral', 'Johor Bahru Sentral', 7.45, '03.54', 11.39, 21, 'B', 1, 2, 2, 3),
(153, '2023-07-06', 'Malacca Sentral', 'Johor Bahru Sentral', 12.10, '03.40', 16.04, 22, 'C', 1, 3, 2, 3),
(154, '2023-07-06', 'Malacca Sentral', 'Johor Bahru Sentral', 15.00, '03.54', 18.54, 20.5, 'D', 1, 4, 2, 3),
(155, '2023-07-06', 'Malacca Sentral', 'Johor Bahru Sentral', 18.00, '03.54', 21.54, 21, 'E', 1, 5, 2, 3),
(156, '2023-07-06', 'Malacca Sentral', 'Penang Sentral', 8.00, '07.48', 15.48, 42, 'A', 1, 1, 3, 3),
(157, '2023-07-06', 'Malacca Sentral', 'Penang Sentral', 8.30, '07.48', 16.18, 43, 'B', 1, 2, 3, 3),
(158, '2023-07-06', 'Malacca Sentral', 'Penang Sentral', 12.30, '07.48', 20.18, 45, 'C', 1, 3, 3, 3),
(159, '2023-07-06', 'Malacca Sentral', 'Penang Sentral', 11.45, '07.48', 19.33, 48, 'D', 1, 4, 3, 3),
(160, '2023-07-06', 'Malacca Sentral', 'Penang Sentral', 20.00, '07.48', 3.48, 49, 'E', 1, 5, 3, 3),
(161, '2023-07-06', 'Kuala Lumpur Sentral', 'Johor Bahru Sentral', 12.30, '05.12', 17.42, 35, 'A', 1, 1, 4, 3),
(162, '2023-07-06', 'Kuala Lumpur Sentral', 'Johor Bahru Sentral', 1.00, '05.12', 6.12, 37, 'B', 1, 2, 4, 3),
(163, '2023-07-06', 'Kuala Lumpur Sentral', 'Johor Bahru Sentral', 7.00, '05.12', 12.12, 40, 'C', 1, 3, 4, 3),
(164, '2023-07-06', 'Kuala Lumpur Sentral', 'Johor Bahru Sentral', 12.00, '05.12', 17.12, 37, 'D', 1, 4, 4, 3),
(165, '2023-07-06', 'Kuala Lumpur Sentral', 'Johor Bahru Sentral', 17.30, '05.12', 10.42, 36, 'E', 1, 5, 4, 3),
(166, '2023-07-06', 'Kuala Lumpur Sentral', 'Penang Sentral', 1.30, '05.12', 6.42, 35, 'A', 1, 1, 5, 3),
(167, '2023-07-06', 'Kuala Lumpur Sentral', 'Penang Sentral', 6.30, '05.12', 11.42, 36, 'B', 1, 2, 5, 3),
(168, '2023-07-06', 'Kuala Lumpur Sentral', 'Penang Sentral', 12.00, '05.12', 17.12, 35, 'C', 1, 3, 5, 3),
(169, '2023-07-06', 'Kuala Lumpur Sentral', 'Penang Sentral', 14.15, '05.12', 19.27, 35, 'D', 1, 4, 5, 3),
(170, '2023-07-06', 'Kuala Lumpur Sentral', 'Penang Sentral', 19.15, '05.12', 0.27, 37, 'E', 1, 5, 5, 3),
(171, '2023-07-06', 'Johor Bahru Sentral', 'Penang Sentral', 9.00, '09.45', 18.45, 35, 'A', 1, 1, 6, 3),
(172, '2023-07-06', 'Johor Bahru Sentral', 'Penang Sentral', 9.30, '09.45', 19.15, 36, 'B', 1, 2, 6, 3),
(173, '2023-07-06', 'Johor Bahru Sentral', 'Penang Sentral', 16.00, '09.45', 1.45, 35, 'C', 1, 3, 6, 3),
(174, '2023-07-06', 'Johor Bahru Sentral', 'Penang Sentral', 19.30, '09.45', 5.15, 35, 'D', 1, 4, 6, 3),
(175, '2023-07-06', 'Johor Bahru Sentral', 'Penang Sentral', 20.00, '09.45', 5.45, 37, 'E', 1, 5, 6, 3),
(176, '2023-07-06', 'Kuala Lumpur Sentral', 'Malacca Sentral', 7.00, '02.00', 9.00, 14, 'A', 1, 1, 7, 3),
(177, '2023-07-06', 'Kuala Lumpur Sentral', 'Malacca Sentral', 8.30, '02.00', 10.30, 15, 'B', 1, 2, 7, 3),
(178, '2023-07-06', 'Kuala Lumpur Sentral', 'Malacca Sentral', 12.00, '02.00', 14.00, 16, 'C', 1, 3, 7, 3),
(179, '2023-07-06', 'Kuala Lumpur Sentral', 'Malacca Sentral', 14.30, '02.00', 16.30, 14.5, 'D', 1, 4, 7, 3),
(180, '2023-07-06', 'Kuala Lumpur Sentral', 'Malacca Sentral', 20.00, '02.00', 22.00, 13, 'E', 1, 5, 7, 3),
(181, '2023-07-06', 'Johor Bahru Sentral', 'Malacca Sentral', 7.30, '03.54', 11.24, 20, 'A', 1, 1, 8, 3),
(182, '2023-07-06', 'Johor Bahru Sentral', 'Malacca Sentral', 8.30, '03.54', 12.24, 21, 'B', 1, 2, 8, 3),
(183, '2023-07-06', 'Johor Bahru Sentral', 'Malacca Sentral', 12.00, '03.54', 15.54, 22, 'C', 1, 3, 8, 3),
(184, '2023-07-06', 'Johor Bahru Sentral', 'Malacca Sentral', 15.00, '03.54', 16.54, 20.5, 'D', 1, 4, 8, 3),
(185, '2023-07-06', 'Johor Bahru Sentral', 'Malacca Sentral', 19.30, '03.54', 11.24, 21, 'E', 1, 5, 8, 3),
(186, '2023-07-06', 'Penang Sentral', 'Malacca Sentral', 9.15, '07.48', 17.03, 42, 'A', 1, 1, 9, 3),
(187, '2023-07-06', 'Penang Sentral', 'Malacca Sentral', 9.30, '07.48', 17.18, 43, 'B', 1, 2, 9, 3),
(188, '2023-07-06', 'Penang Sentral', 'Malacca Sentral', 10.00, '07.48', 17.48, 45, 'C', 1, 3, 9, 3),
(189, '2023-07-06', 'Penang Sentral', 'Malacca Sentral', 10.30, '07.48', 18.18, 48, 'D', 1, 4, 9, 3),
(190, '2023-07-06', 'Penang Sentral', 'Malacca Sentral', 21.15, '07.48', 5.03, 49, 'E', 1, 5, 9, 3),
(191, '2023-07-06', 'Johor Bahru Sentral', 'Kuala Lumpur Sentral', 4.00, '05.12', 9.12, 35, 'A', 1, 1, 10, 3),
(192, '2023-07-06', 'Johor Bahru Sentral', 'Kuala Lumpur Sentral', 2.30, '05.12', 7.42, 37, 'B', 1, 2, 10, 3),
(193, '2023-07-06', 'Johor Bahru Sentral', 'Kuala Lumpur Sentral', 10.10, '05.12', 15.22, 40, 'C', 1, 3, 10, 3),
(194, '2023-07-06', 'Johor Bahru Sentral', 'Kuala Lumpur Sentral', 15.30, '05.12', 120.12, 37, 'D', 1, 4, 10, 3),
(195, '2023-07-06', 'Johor Bahru Sentral', 'Kuala Lumpur Sentral', 8.20, '05.12', 13.32, 36, 'E', 1, 5, 10, 3),
(196, '2023-07-06', 'Penang Sentral', 'Kuala Lumpur Sentral', 0.15, '05.12', 5.27, 35, 'A', 1, 1, 11, 3),
(197, '2023-07-06', 'Penang Sentral', 'Kuala Lumpur Sentral', 0.45, '05.12', 5.57, 36, 'B', 1, 2, 11, 3),
(198, '2023-07-06', 'Penang Sentral', 'Kuala Lumpur Sentral', 7.00, '05.12', 12.12, 35, 'C', 1, 3, 11, 3),
(199, '2023-07-06', 'Penang Sentral', 'Kuala Lumpur Sentral', 12.00, '05.12', 17.12, 35, 'D', 1, 4, 11, 3),
(200, '2023-07-06', 'Penang Sentral', 'Kuala Lumpur Sentral', 17.00, '05.12', 22.12, 37, 'E', 1, 5, 11, 3),
(201, '2023-07-06', 'Penang Sentral', 'Johor Bahru Sentral', 7.30, '09.45', 17.15, 35, 'A', 1, 1, 12, 3),
(202, '2023-07-06', 'Penang Sentral', 'Johor Bahru Sentral', 8.15, '09.45', 18.00, 36, 'B', 1, 2, 12, 3),
(203, '2023-07-06', 'Penang Sentral', 'Johor Bahru Sentral', 10.00, '09.45', 19.45, 35, 'C', 1, 3, 12, 3),
(204, '2023-07-06', 'Penang Sentral', 'Johor Bahru Sentral', 20.00, '09.45', 5.45, 35, 'D', 1, 4, 12, 3),
(205, '2023-07-06', 'Penang Sentral', 'Johor Bahru Sentral', 20.30, '09.45', 6.15, 37, 'E', 1, 5, 12, 3),
(206, '2023-07-07', 'Malacca Sentral', 'Kuala Lumpur Sentral', 6.00, '02.00', 8.00, 12, 'A', 1, 1, 1, 3),
(207, '2023-07-07', 'Malacca Sentral', 'Kuala Lumpur Sentral', 8.45, '02.00', 10.45, 15, 'B', 1, 2, 1, 3),
(208, '2023-07-07', 'Malacca Sentral', 'Kuala Lumpur Sentral', 12.00, '02.00', 14.00, 16, 'C', 1, 3, 1, 3),
(209, '2023-07-07', 'Malacca Sentral', 'Kuala Lumpur Sentral', 12.30, '02.00', 14.30, 14.5, 'D', 1, 4, 1, 3),
(210, '2023-07-07', 'Malacca Sentral', 'Kuala Lumpur Sentral', 21.00, '02.00', 23.00, 13, 'E', 1, 5, 1, 3),
(211, '2023-07-07', 'Malacca Sentral', 'Johor Bahru Sentral', 6.15, '03.54', 10.09, 20, 'A', 1, 1, 2, 3),
(212, '2023-07-07', 'Malacca Sentral', 'Johor Bahru Sentral', 7.45, '03.54', 11.39, 21, 'B', 1, 2, 2, 3),
(213, '2023-07-07', 'Malacca Sentral', 'Johor Bahru Sentral', 12.10, '03.40', 16.04, 22, 'C', 1, 3, 2, 3),
(214, '2023-07-07', 'Malacca Sentral', 'Johor Bahru Sentral', 15.00, '03.54', 18.54, 20.5, 'D', 1, 4, 2, 3),
(215, '2023-07-07', 'Malacca Sentral', 'Johor Bahru Sentral', 18.00, '03.54', 21.54, 21, 'E', 1, 5, 2, 3),
(216, '2023-07-07', 'Malacca Sentral', 'Penang Sentral', 8.00, '07.48', 15.48, 42, 'A', 1, 1, 3, 3),
(217, '2023-07-07', 'Malacca Sentral', 'Penang Sentral', 8.30, '07.48', 16.18, 43, 'B', 1, 2, 3, 3),
(218, '2023-07-07', 'Malacca Sentral', 'Penang Sentral', 12.30, '07.48', 20.18, 45, 'C', 1, 3, 3, 3),
(219, '2023-07-07', 'Malacca Sentral', 'Penang Sentral', 11.45, '07.48', 19.33, 48, 'D', 1, 4, 3, 3),
(220, '2023-07-07', 'Malacca Sentral', 'Penang Sentral', 20.00, '07.48', 3.48, 49, 'E', 1, 5, 3, 3),
(221, '2023-07-07', 'Kuala Lumpur Sentral', 'Johor Bahru Sentral', 12.30, '05.12', 17.42, 35, 'A', 1, 1, 4, 3),
(222, '2023-07-07', 'Kuala Lumpur Sentral', 'Johor Bahru Sentral', 1.00, '05.12', 6.12, 37, 'B', 1, 2, 4, 3),
(223, '2023-07-07', 'Kuala Lumpur Sentral', 'Johor Bahru Sentral', 7.00, '05.12', 12.12, 40, 'C', 1, 3, 4, 3),
(224, '2023-07-07', 'Kuala Lumpur Sentral', 'Johor Bahru Sentral', 12.00, '05.12', 17.12, 37, 'D', 1, 4, 4, 3),
(225, '2023-07-07', 'Kuala Lumpur Sentral', 'Johor Bahru Sentral', 17.30, '05.12', 10.42, 36, 'E', 1, 5, 4, 3),
(226, '2023-07-07', 'Kuala Lumpur Sentral', 'Penang Sentral', 1.30, '05.12', 6.42, 35, 'A', 1, 1, 5, 3),
(227, '2023-07-07', 'Kuala Lumpur Sentral', 'Penang Sentral', 6.30, '05.12', 11.42, 36, 'B', 1, 2, 5, 3),
(228, '2023-07-07', 'Kuala Lumpur Sentral', 'Penang Sentral', 12.00, '05.12', 17.12, 35, 'C', 1, 3, 5, 3),
(229, '2023-07-07', 'Kuala Lumpur Sentral', 'Penang Sentral', 14.15, '05.12', 19.27, 35, 'D', 1, 4, 5, 3),
(230, '2023-07-07', 'Kuala Lumpur Sentral', 'Penang Sentral', 19.15, '05.12', 0.27, 37, 'E', 1, 5, 5, 3),
(231, '2023-07-07', 'Johor Bahru Sentral', 'Penang Sentral', 9.00, '09.45', 18.45, 35, 'A', 1, 1, 6, 3),
(232, '2023-07-07', 'Johor Bahru Sentral', 'Penang Sentral', 9.30, '09.45', 19.15, 36, 'B', 1, 2, 6, 3),
(233, '2023-07-07', 'Johor Bahru Sentral', 'Penang Sentral', 16.00, '09.45', 1.45, 35, 'C', 1, 3, 6, 3),
(234, '2023-07-07', 'Johor Bahru Sentral', 'Penang Sentral', 19.30, '09.45', 5.15, 35, 'D', 1, 4, 6, 3),
(235, '2023-07-07', 'Johor Bahru Sentral', 'Penang Sentral', 20.00, '09.45', 5.45, 37, 'E', 1, 5, 6, 3),
(236, '2023-07-07', 'Kuala Lumpur Sentral', 'Malacca Sentral', 7.00, '02.00', 9.00, 14, 'A', 1, 1, 7, 3),
(237, '2023-07-07', 'Kuala Lumpur Sentral', 'Malacca Sentral', 8.30, '02.00', 10.30, 15, 'B', 1, 2, 7, 3),
(238, '2023-07-07', 'Kuala Lumpur Sentral', 'Malacca Sentral', 12.00, '02.00', 14.00, 16, 'C', 1, 3, 7, 3),
(239, '2023-07-07', 'Kuala Lumpur Sentral', 'Malacca Sentral', 14.30, '02.00', 16.30, 14.5, 'D', 1, 4, 7, 3),
(240, '2023-07-07', 'Kuala Lumpur Sentral', 'Malacca Sentral', 20.00, '02.00', 22.00, 13, 'E', 1, 5, 7, 3),
(241, '2023-07-07', 'Johor Bahru Sentral', 'Malacca Sentral', 7.30, '03.54', 11.24, 20, 'A', 1, 1, 8, 3),
(242, '2023-07-07', 'Johor Bahru Sentral', 'Malacca Sentral', 8.30, '03.54', 12.24, 21, 'B', 1, 2, 8, 3),
(243, '2023-07-07', 'Johor Bahru Sentral', 'Malacca Sentral', 12.00, '03.54', 15.54, 22, 'C', 1, 3, 8, 3),
(244, '2023-07-07', 'Johor Bahru Sentral', 'Malacca Sentral', 15.00, '03.54', 16.54, 20.5, 'D', 1, 4, 8, 3),
(245, '2023-07-07', 'Johor Bahru Sentral', 'Malacca Sentral', 19.30, '03.54', 11.24, 21, 'E', 1, 5, 8, 3),
(246, '2023-07-07', 'Penang Sentral', 'Malacca Sentral', 9.15, '07.48', 17.03, 42, 'A', 1, 1, 9, 3),
(247, '2023-07-07', 'Penang Sentral', 'Malacca Sentral', 9.30, '07.48', 17.18, 43, 'B', 1, 2, 9, 3),
(248, '2023-07-07', 'Penang Sentral', 'Malacca Sentral', 10.00, '07.48', 17.48, 45, 'C', 1, 3, 9, 3),
(249, '2023-07-07', 'Penang Sentral', 'Malacca Sentral', 10.30, '07.48', 18.18, 48, 'D', 1, 4, 9, 3),
(250, '2023-07-07', 'Penang Sentral', 'Malacca Sentral', 21.15, '07.48', 5.03, 49, 'E', 1, 5, 9, 3),
(251, '2023-07-07', 'Johor Bahru Sentral', 'Kuala Lumpur Sentral', 4.00, '05.12', 9.12, 35, 'A', 1, 1, 10, 3),
(252, '2023-07-07', 'Johor Bahru Sentral', 'Kuala Lumpur Sentral', 2.30, '05.12', 7.42, 37, 'B', 1, 2, 10, 3),
(253, '2023-07-07', 'Johor Bahru Sentral', 'Kuala Lumpur Sentral', 10.10, '05.12', 15.22, 40, 'C', 1, 3, 10, 3),
(254, '2023-07-07', 'Johor Bahru Sentral', 'Kuala Lumpur Sentral', 15.30, '05.12', 120.12, 37, 'D', 1, 4, 10, 3),
(255, '2023-07-07', 'Johor Bahru Sentral', 'Kuala Lumpur Sentral', 8.20, '05.12', 13.32, 36, 'E', 1, 5, 10, 3),
(256, '2023-07-07', 'Penang Sentral', 'Kuala Lumpur Sentral', 0.15, '05.12', 5.27, 35, 'A', 1, 1, 11, 3),
(257, '2023-07-07', 'Penang Sentral', 'Kuala Lumpur Sentral', 0.45, '05.12', 5.57, 36, 'B', 1, 2, 11, 3),
(258, '2023-07-07', 'Penang Sentral', 'Kuala Lumpur Sentral', 7.00, '05.12', 12.12, 35, 'C', 1, 3, 11, 3),
(259, '2023-07-07', 'Penang Sentral', 'Kuala Lumpur Sentral', 12.00, '05.12', 17.12, 35, 'D', 1, 4, 11, 3),
(260, '2023-07-07', 'Penang Sentral', 'Kuala Lumpur Sentral', 17.00, '05.12', 22.12, 37, 'E', 1, 5, 11, 3),
(261, '2023-07-07', 'Penang Sentral', 'Johor Bahru Sentral', 7.30, '09.45', 17.15, 35, 'A', 1, 1, 12, 3),
(262, '2023-07-07', 'Penang Sentral', 'Johor Bahru Sentral', 8.15, '09.45', 18.00, 36, 'B', 1, 2, 12, 3),
(263, '2023-07-07', 'Penang Sentral', 'Johor Bahru Sentral', 10.00, '09.45', 19.45, 35, 'C', 1, 3, 12, 3),
(264, '2023-07-07', 'Penang Sentral', 'Johor Bahru Sentral', 20.00, '09.45', 5.45, 35, 'D', 1, 4, 12, 3),
(265, '2023-07-07', 'Penang Sentral', 'Johor Bahru Sentral', 20.30, '09.45', 6.15, 37, 'E', 1, 5, 12, 3),
(266, '2023-07-08', 'Malacca Sentral', 'Kuala Lumpur Sentral', 6.00, '02.00', 8.00, 12, 'A', 1, 1, 1, 3),
(267, '2023-07-08', 'Malacca Sentral', 'Kuala Lumpur Sentral', 8.45, '02.00', 10.45, 15, 'B', 1, 2, 1, 3),
(268, '2023-07-08', 'Malacca Sentral', 'Kuala Lumpur Sentral', 12.00, '02.00', 14.00, 16, 'C', 1, 3, 1, 3),
(269, '2023-07-08', 'Malacca Sentral', 'Kuala Lumpur Sentral', 12.30, '02.00', 14.30, 14.5, 'D', 1, 4, 1, 3),
(270, '2023-07-08', 'Malacca Sentral', 'Kuala Lumpur Sentral', 21.00, '02.00', 23.00, 13, 'E', 1, 5, 1, 3),
(271, '2023-07-08', 'Malacca Sentral', 'Johor Bahru Sentral', 6.15, '03.54', 10.09, 20, 'A', 1, 1, 2, 3),
(272, '2023-07-08', 'Malacca Sentral', 'Johor Bahru Sentral', 7.45, '03.54', 11.39, 21, 'B', 1, 2, 2, 3),
(273, '2023-07-08', 'Malacca Sentral', 'Johor Bahru Sentral', 12.10, '03.40', 16.04, 22, 'C', 1, 3, 2, 3),
(274, '2023-07-08', 'Malacca Sentral', 'Johor Bahru Sentral', 15.00, '03.54', 18.54, 20.5, 'D', 1, 4, 2, 3),
(275, '2023-07-08', 'Malacca Sentral', 'Johor Bahru Sentral', 18.00, '03.54', 21.54, 21, 'E', 1, 5, 2, 3),
(276, '2023-07-08', 'Malacca Sentral', 'Penang Sentral', 8.00, '07.48', 15.48, 42, 'A', 1, 1, 3, 3),
(277, '2023-07-08', 'Malacca Sentral', 'Penang Sentral', 8.30, '07.48', 16.18, 43, 'B', 1, 2, 3, 3),
(278, '2023-07-08', 'Malacca Sentral', 'Penang Sentral', 12.30, '07.48', 20.18, 45, 'C', 1, 3, 3, 3),
(279, '2023-07-08', 'Malacca Sentral', 'Penang Sentral', 11.45, '07.48', 19.33, 48, 'D', 1, 4, 3, 3),
(280, '2023-07-08', 'Malacca Sentral', 'Penang Sentral', 20.00, '07.48', 3.48, 49, 'E', 1, 5, 3, 3),
(281, '2023-07-08', 'Kuala Lumpur Sentral', 'Johor Bahru Sentral', 12.30, '05.12', 17.42, 35, 'A', 1, 1, 4, 3),
(282, '2023-07-08', 'Kuala Lumpur Sentral', 'Johor Bahru Sentral', 1.00, '05.12', 6.12, 37, 'B', 1, 2, 4, 3),
(283, '2023-07-08', 'Kuala Lumpur Sentral', 'Johor Bahru Sentral', 7.00, '05.12', 12.12, 40, 'C', 1, 3, 4, 3),
(284, '2023-07-08', 'Kuala Lumpur Sentral', 'Johor Bahru Sentral', 12.00, '05.12', 17.12, 37, 'D', 1, 4, 4, 3),
(285, '2023-07-08', 'Kuala Lumpur Sentral', 'Johor Bahru Sentral', 17.30, '05.12', 10.42, 36, 'E', 1, 5, 4, 3),
(286, '2023-07-08', 'Kuala Lumpur Sentral', 'Penang Sentral', 1.30, '05.12', 6.42, 35, 'A', 1, 1, 5, 3),
(287, '2023-07-08', 'Kuala Lumpur Sentral', 'Penang Sentral', 6.30, '05.12', 11.42, 36, 'B', 1, 2, 5, 3),
(288, '2023-07-08', 'Kuala Lumpur Sentral', 'Penang Sentral', 12.00, '05.12', 17.12, 35, 'C', 1, 3, 5, 3),
(289, '2023-07-08', 'Kuala Lumpur Sentral', 'Penang Sentral', 14.15, '05.12', 19.27, 35, 'D', 1, 4, 5, 3),
(290, '2023-07-08', 'Kuala Lumpur Sentral', 'Penang Sentral', 19.15, '05.12', 0.27, 37, 'E', 1, 5, 5, 3),
(291, '2023-07-08', 'Johor Bahru Sentral', 'Penang Sentral', 9.00, '09.45', 18.45, 35, 'A', 1, 1, 6, 3),
(292, '2023-07-08', 'Johor Bahru Sentral', 'Penang Sentral', 9.30, '09.45', 19.15, 36, 'B', 1, 2, 6, 3),
(293, '2023-07-08', 'Johor Bahru Sentral', 'Penang Sentral', 16.00, '09.45', 1.45, 35, 'C', 1, 3, 6, 3),
(294, '2023-07-08', 'Johor Bahru Sentral', 'Penang Sentral', 19.30, '09.45', 5.15, 35, 'D', 1, 4, 6, 3),
(295, '2023-07-08', 'Johor Bahru Sentral', 'Penang Sentral', 20.00, '09.45', 5.45, 37, 'E', 1, 5, 6, 3),
(296, '2023-07-08', 'Kuala Lumpur Sentral', 'Malacca Sentral', 7.00, '02.00', 9.00, 14, 'A', 1, 1, 7, 3),
(297, '2023-07-08', 'Kuala Lumpur Sentral', 'Malacca Sentral', 8.30, '02.00', 10.30, 15, 'B', 1, 2, 7, 3),
(298, '2023-07-08', 'Kuala Lumpur Sentral', 'Malacca Sentral', 12.00, '02.00', 14.00, 16, 'C', 1, 3, 7, 3),
(299, '2023-07-08', 'Kuala Lumpur Sentral', 'Malacca Sentral', 14.30, '02.00', 16.30, 14.5, 'D', 1, 4, 7, 3),
(300, '2023-07-08', 'Kuala Lumpur Sentral', 'Malacca Sentral', 20.00, '02.00', 22.00, 13, 'E', 1, 5, 7, 3),
(301, '2023-07-08', 'Johor Bahru Sentral', 'Malacca Sentral', 7.30, '03.54', 11.24, 20, 'A', 1, 1, 8, 3),
(302, '2023-07-08', 'Johor Bahru Sentral', 'Malacca Sentral', 8.30, '03.54', 12.24, 21, 'B', 1, 2, 8, 3),
(303, '2023-07-08', 'Johor Bahru Sentral', 'Malacca Sentral', 12.00, '03.54', 15.54, 22, 'C', 1, 3, 8, 3),
(304, '2023-07-08', 'Johor Bahru Sentral', 'Malacca Sentral', 15.00, '03.54', 16.54, 20.5, 'D', 1, 4, 8, 3),
(305, '2023-07-08', 'Johor Bahru Sentral', 'Malacca Sentral', 19.30, '03.54', 11.24, 21, 'E', 1, 5, 8, 3),
(306, '2023-07-08', 'Penang Sentral', 'Malacca Sentral', 9.15, '07.48', 17.03, 42, 'A', 1, 1, 9, 3),
(307, '2023-07-08', 'Penang Sentral', 'Malacca Sentral', 9.30, '07.48', 17.18, 43, 'B', 1, 2, 9, 3),
(308, '2023-07-08', 'Penang Sentral', 'Malacca Sentral', 10.00, '07.48', 17.48, 45, 'C', 1, 3, 9, 3),
(309, '2023-07-08', 'Penang Sentral', 'Malacca Sentral', 10.30, '07.48', 18.18, 48, 'D', 1, 4, 9, 3),
(310, '2023-07-08', 'Penang Sentral', 'Malacca Sentral', 21.15, '07.48', 5.03, 49, 'E', 1, 5, 9, 3),
(311, '2023-07-08', 'Johor Bahru Sentral', 'Kuala Lumpur Sentral', 4.00, '05.12', 9.12, 35, 'A', 1, 1, 10, 3),
(312, '2023-07-08', 'Johor Bahru Sentral', 'Kuala Lumpur Sentral', 2.30, '05.12', 7.42, 37, 'B', 1, 2, 10, 3),
(313, '2023-07-08', 'Johor Bahru Sentral', 'Kuala Lumpur Sentral', 10.10, '05.12', 15.22, 40, 'C', 1, 3, 10, 3),
(314, '2023-07-08', 'Johor Bahru Sentral', 'Kuala Lumpur Sentral', 15.30, '05.12', 120.12, 37, 'D', 1, 4, 10, 3),
(315, '2023-07-08', 'Johor Bahru Sentral', 'Kuala Lumpur Sentral', 8.20, '05.12', 13.32, 36, 'E', 1, 5, 10, 3),
(316, '2023-07-08', 'Penang Sentral', 'Kuala Lumpur Sentral', 0.15, '05.12', 5.27, 35, 'A', 1, 1, 11, 3),
(317, '2023-07-08', 'Penang Sentral', 'Kuala Lumpur Sentral', 0.45, '05.12', 5.57, 36, 'B', 1, 2, 11, 3),
(318, '2023-07-08', 'Penang Sentral', 'Kuala Lumpur Sentral', 7.00, '05.12', 12.12, 35, 'C', 1, 3, 11, 3),
(319, '2023-07-08', 'Penang Sentral', 'Kuala Lumpur Sentral', 12.00, '05.12', 17.12, 35, 'D', 1, 4, 11, 3),
(320, '2023-07-08', 'Penang Sentral', 'Kuala Lumpur Sentral', 17.00, '05.12', 22.12, 37, 'E', 1, 5, 11, 3),
(321, '2023-07-08', 'Penang Sentral', 'Johor Bahru Sentral', 7.30, '09.45', 17.15, 35, 'A', 1, 1, 12, 3),
(322, '2023-07-08', 'Penang Sentral', 'Johor Bahru Sentral', 8.15, '09.45', 18.00, 36, 'B', 1, 2, 12, 3),
(323, '2023-07-08', 'Penang Sentral', 'Johor Bahru Sentral', 10.00, '09.45', 19.45, 35, 'C', 1, 3, 12, 3),
(324, '2023-07-08', 'Penang Sentral', 'Johor Bahru Sentral', 20.00, '09.45', 5.45, 35, 'D', 1, 4, 12, 3),
(325, '2023-07-08', 'Penang Sentral', 'Johor Bahru Sentral', 20.30, '09.45', 6.15, 37, 'E', 1, 5, 12, 3),
(326, '2023-07-09', 'Penang Sentral', 'Johor Bahru Sentral', 7.30, '09.45', 17.15, 35, 'A', 1, 1, 12, 3),
(327, '2023-07-09', 'Penang Sentral', 'Johor Bahru Sentral', 8.15, '09.45', 18.00, 36, 'B', 1, 2, 12, 3),
(328, '2023-07-09', 'Penang Sentral', 'Johor Bahru Sentral', 10.00, '09.45', 19.45, 35, 'C', 1, 3, 12, 3),
(329, '2023-07-09', 'Penang Sentral', 'Johor Bahru Sentral', 20.00, '09.45', 5.45, 35, 'D', 1, 4, 12, 3),
(330, '2023-07-09', 'Penang Sentral', 'Johor Bahru Sentral', 20.30, '09.45', 6.15, 37, 'E', 1, 5, 12, 3);

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

--
-- Dumping data for table `bus_seat`
--

INSERT INTO `bus_seat` (`bus_seat_id`, `bus_seat_no`, `bus_seat_status`, `bus_schedule_id`, `bus_id`) VALUES
(22, '10A', 1, 206, 206);

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
(1, 'John Leau', '0137218721', '2025-03-20', 'rnoorhakim@gmail.com'),
(2, 'Jane Vadaketh', '0196984072', '2024-03-30', 'uaidi@gmail.com'),
(3, 'Siva a/l Shan', '0148881039', '2026-01-01', 'chokshew99@gmail.com'),
(4, 'Satwant a/l Harikrish Kamalesvaran', '0198693947', '2025-09-13', 'kangbuioo@gmail.net'),
(5, 'Syed Zulman bin Wan Azizan Soberi', '0115935665', '2024-12-31', 'williamshi@gmail.com'),
(6, 'Ngan Chung Say', '0134988054', '2024-07-14', 'roslimimi@gmail.com'),
(7, 'S. A. Patto', '0176087513', '2024-01-31', 'shanmugaratnam.thiagai@gmail.com'),
(8, 'Kasthuriraani a/l Rehman', '0159572628', '2024-06-14', 'kamaruzain08@gmail.com'),
(9, 'M. G. Samarasan', '0131320603', '2025-10-01', 'oradzi@gmail.com'),
(10, 'K. R.Arumugam', '0134012003', '2023-11-19', 'alihasyim@gmail.com'),
(11, 'Wesley Ser Wei Jie', '0134569875', '2025-09-01', 'wesley@gmail.com'),
(12, 'Ng Chun Hong', '0124562143', '2025-10-30', 'hong@gmail.com'),
(13, 'Mohd Farhan bin Ahmad', '0198765432', '2024-06-30', 'farhan.ahmad@gmail.com'),
(14, 'Nurul Huda binti Abdullah', '0187654321', '2025-09-15', 'nurul.abdullah@gmail.com'),
(15, 'Lim Wei Ting', '0165432198', '2023-12-31', 'wt.lim@gmail.com'),
(16, 'Ahmad bin Hassan', '0198745632', '2025-05-20', 'ahmad.hassan@gmail.com'),
(17, 'Tan Mei Ling', '0123456789', '2026-02-28', 'meiling.tan@gmail.com'),
(18, 'Yusuf bin Ali', '0198765431', '2024-08-15', 'yusuf.ali@gmail.com'),
(19, 'Lily Wong Mei Ling', '0187654322', '2023-11-30', 'lily.wong@gmail.com'),
(20, 'Rahman bin Abdullah', '01986543222', '2025-04-15', 'rahman.abdullah@gmail.com'),
(21, 'Siti Aminah binti Mohd Yusof', '0198765433', '2026-01-31', 'siti.aminah@gmail.com'),
(22, 'Jason Tan Wei Ming', '0165432197', '2024-12-31', 'jasonTAN@gmail.com'),
(23, 'Nadia binti Ibrahim', '0198745635', '2025-07-20', 'nadia.ibrahim@gmail.com'),
(24, 'David Lim Chee Wei', '0123456710', '2026-04-30', 'david.lim@gmail.com'),
(25, 'Aisha binti Mohd Aziz', '01987654311', '2023-09-15', 'aisha.aziz@gmail.com'),
(26, 'Ryan Chong Wai Leong', '0187654323', '2024-08-31', 'ryan.chong@gmail.com'),
(27, 'Nurul Ain binti Zainal', '0198654321', '2025-03-15', 'nurul.ain@gmail.com'),
(28, 'Arif bin Abdul Razak', '0198765442', '2024-10-31', 'arif.razak@gmail.com'),
(29, 'Sarah Lim Mei Ling', '0165432199', '2023-12-31', 'sarah.lim@gmail.com'),
(30, 'Mohd Ali bin Ismail', '0198745637', '2026-07-20', 'mohd.ali@gmail.com'),
(31, 'Jessica Tan Su Mei', '0123456711', '2024-05-31', 'jessica.tan@gmail.com'),
(32, 'Muhammad bin Yusuf', '0198765434', '2025-08-15', 'muhammad.yusuf@gmail.com'),
(33, 'Catherine Wong Siew Ling', '0170992145', '2023-11-30', 'catherine.wong@gmail.com'),
(34, 'Zaid bin Abdullah', '0198765435', '2024-06-30', 'zaid.abdullah@gmail.com'),
(35, 'Amanda Lee Xin Yi', '01876543222', '2025-09-15', 'amanda.lee@gmail.com'),
(36, 'Chen Wei Jie', '0162891092', '2023-12-31', 'wj.chen@gmail.com'),
(37, 'Rahim bin Ismail', '0138327421', '2025-05-20', 'rahim.ismail@gmail.com'),
(38, 'Samantha Tan Mei Ling', '01234567803', '2026-02-27', 'samantha.tan@gmail.com'),
(39, 'Ahmad bin Mohd Ali', '0198765436', '2024-08-15', 'ahmad.mohd@gmail.com'),
(40, 'Emily Wong Mei Ling', '01876543312', '2023-11-30', 'emily.wong@gmail.com'),
(41, 'Zainab binti Rahman', '01986543232', '2025-04-15', 'zainab.rahman@gmail.com'),
(42, 'Azlan bin Omar', '0198765437', '2026-01-31', 'azlan.omar@gmail.com'),
(43, 'Grace Lim Wei Ling', '01654321967', '2024-12-31', 'grace.lim@gmail.com'),
(44, 'Amirah binti Yusof', '01987456890', '2025-07-20', 'amirah.yusof@gmail.com'),
(45, 'Benjamin Tan Chee Wei', '01234567812', '2026-04-30', 'benjamin.tan@gmail.com'),
(46, 'Sarah binti Aziz', '0198765438', '2023-09-15', 'sarah.aziz@gmail.com'),
(47, 'Daniel Chong Wai Leong', '01876543232', '2024-08-31', 'daniel.chong@gmail.com'),
(48, 'Nadia binti Zainal Abidin', '01986543250', '2025-03-15', 'nadia.zainal@gmail.com'),
(49, 'Ahmad Rizal bin Mohd Razak', '01987654390', '2024-10-31', 'ahmad.rizal@gmail.com'),
(50, 'Elaine Lim Mei Ling', '01654321999', '2023-12-31', 'elaine.lim@gmail.com'),
(51, 'Hassan bin Ali', '0198745639', '2026-07-20', 'hassan.ali@gmail.com'),
(52, 'Melissa Tan Su Mei', '01234567888', '2024-05-31', 'melissa.tan@gmail.com'),
(53, 'Syed bin Yusuf', '0198765460', '2025-08-15', 'syed.yusuf@gmail.com'),
(54, 'Cassandra Wong Siew Ling', '01876543235', '2023-11-30', 'cassandra.wong@gmail.com'),
(55, 'Ahmad bin Iskandar', '01987654345', '2024-06-30', 'ahmad.iskandar@gmail.com'),
(56, 'Evelyn Tan Li Wei', '01876543242', '2025-09-15', 'evelyn.tan@gmail.com'),
(57, 'Koh Wei Jie', '01654321909', '2023-12-31', 'kj.koh@gmail.com'),
(58, 'Rizwan bin Abdullah', '0198745669', '2025-05-20', 'rizwan.abdullah@gmail.com'),
(59, 'Michelle Lee Mei Ling', '01234567800', '2026-02-28', 'michelle.lee@gmail.com'),
(60, 'Zulkifli bin Ali', '0198765424', '2024-08-15', 'zulkifli.ali@gmail.com'),
(61, 'Jacqueline Wong Mei Ling', '0187654390', '2023-11-30', 'jacqueline.wong@gmail.com'),
(62, 'Hafizah binti Rahman', '01986543256', '2025-04-15', 'hafizah.rahman@gmail.com'),
(63, 'Arif bin Ismail', '0198765444', '2026-01-31', 'arif.ismail@gmail.com'),
(64, 'Chloe Lim Wei Ling', '01654321919', '2024-12-31', 'chloe.lim@gmail.com'),
(65, 'Aminah binti Yusof', '0198745678', '2025-07-20', 'aminah.yusof@gmail.com'),
(66, 'Ryan Tan Chee Wei', '01234567879', '2026-04-30', 'ryan.tan@gmail.com'),
(67, 'Nadia binti Aziz', '0198765479', '2023-09-15', 'nadia.aziz@gmail.com'),
(68, 'Jeremy Chong Wai Leong', '01566190772', '2024-08-31', 'jeremy.chong@gmail.com'),
(69, 'Amelia binti Zainal Abidin', '01986543265', '2025-03-15', 'amelia.zainal@gmail.com'),
(70, 'Haziq bin Mohd Razak', '0198765459', '2024-10-31', 'haziq.razak@gmail.com'),
(71, 'Vivian Lim Mei Ling', '01255449810', '2023-12-31', 'vivian.lim@gmail.com'),
(72, 'Faisal bin Ali', '0181223496', '2026-07-20', 'faisal.ali@gmail.com'),
(73, 'Stephanie Tan Su Mei', '01234567859', '2024-05-31', 'stephanie.tan@gmail.com'),
(74, 'Ziad bin Yusuf', '01987654509', '2025-08-15', 'ziad.yusuf@gmail.com'),
(75, 'Jasmine Wong Siew Ling', '0187658843', '2023-11-30', 'jasmine.wong@gmail.com'),
(76, 'Ahmad bin Ibrahem', '0138821932', '2024-06-30', 'ahmad.ibrahim@gmail.com'),
(77, 'Sophia Tan Li Wei', '0181190293', '2025-09-15', 'sophia.tan@gmail.com'),
(78, 'Lee Wei Jie', '01089990817', '2023-12-31', 'wj.lee@gmail.com'),
(79, 'Khalid bin Abdullah', '01709418936', '2025-05-20', 'khalid.abdullah@gmail.com'),
(80, 'Karen Lee Mei Ling', '0101289343', '2026-02-28', 'karen.lee@gmail.com'),
(81, 'Ali bin Mohd Ali', '0138983212', '2024-08-15', 'ali.mohd@gmail.com'),
(82, 'Rachel Wong Mei Ling', '0189283810', '2023-11-30', 'rachel.wong@gmail.com'),
(83, 'Zara binti Rahman', '0123147590', '2025-04-15', 'zara.rahman@gmail.com'),
(84, 'Ahmad bin Omar', '0141289238', '2026-01-31', 'ahmad.omar@gmail.com'),
(85, 'Isabella Lim Wei Ling', '0189911066', '2024-12-31', 'isabella.lim@gmail.com'),
(86, 'Siti binti Yusof', '0148743256', '2025-07-20', 'siti.yusof@gmail.com'),
(87, 'Joshua Tan Chee Wei', '0113431289', '2026-04-30', 'joshua.tan@gmail.com'),
(88, 'Nora binti Aziz', '0141238982', '2023-09-15', 'nora.aziz@gmail.com'),
(89, 'Gabriel Chong Wai Leong', '0179110280', '2024-08-31', 'gabriel.chong@gmail.com'),
(90, 'Emily binti Zainal Abidin', '0113519407', '2025-03-15', 'emily.zainal@gmail.com'),
(91, 'Imran bin Mohd Razak', '0129325340', '2024-10-31', 'imran.razak@gmail.com'),
(92, 'Michelle Lim Mei Ling', '01688810031', '2023-12-31', 'michelle.lim@gmail.com'),
(93, 'Ahmad bin Ali', '0158745236', '2026-07-20', 'ahmad.ali@gmail.com'),
(94, 'Samantha Tan Su Mei', '0123248391', '2024-05-31', 'samanthaTAN@gmail.com'),
(95, 'Yusri bin Yusuf', '0120934235', '2025-08-15', 'yusri.yusuf@gmail.com'),
(96, 'Emily Wong Siew Ling', '0119910981', '2023-11-30', 'emilyWong@gmail.com'),
(97, 'Amir bin Iskandar', '0142156782', '2024-06-30', 'amir.iskandar@gmail.com'),
(98, 'Olivia Tan Li Wei', '0120999222', '2025-09-15', 'olivia.tan@gmail.com'),
(99, 'Lim Wei Jie', '01790193321', '2023-12-31', 'wj.lim@gmail.com'),
(100, 'Razman bin Abdullah', '0168762345', '2025-05-20', 'razman.abdullah@gmail.com'),
(101, 'Jessica Lee Mei Ling', '0121332948', '2026-02-28', 'jessica.lee@gmail.com'),
(102, 'Abdullah bin Mohd Ali', '0119873215', '2024-08-15', 'abdullah.mohd@gmail.com'),
(103, 'Sophie Wong Mei Ling', '01488810987', '2023-11-30', 'sophie.wong@gmail.com'),
(104, 'Alya binti Rahman', '0103450179', '2025-04-15', 'alya.rahman@gmail.com'),
(105, 'Omar bin Ismail', '0133928175', '2026-01-31', 'omar.ismail@gmail.com'),
(106, 'Vanessa Lim Wei Ling', '0109123887', '2024-12-31', 'vanessa.lim@gmail.com'),
(107, 'Yasmin binti Yusof', '0103847542', '2025-07-20', 'yasmin.yusof@gmail.com'),
(108, 'Aaron Tan Chee Wei', '0137834392', '2026-04-30', 'aaron.tan@gmail.com'),
(109, 'Hani binti Aziz', '0185397218', '2023-09-15', 'hani.aziz@gmail.com'),
(110, 'Nicholas Chong Wai Leong', '0100908076', '2024-08-31', 'nicholas.chong@gmail.com'),
(111, 'Aisha binti Zainal Abidin', '0134947510', '2025-03-15', 'aisha.zainal@gmail.com'),
(112, 'Syed bin Mohd Razak', '0197523198', '2024-10-31', 'syed.razak@gmail.com'),
(113, 'Ashley Lim Mei Ling', '01911225522', '2023-12-31', 'ashley.lim@gmail.com'),
(114, 'Ahmad bin Azmi', '01488149378', '2026-07-20', 'ahmad.azmi@gmail.com'),
(115, 'Sophia Tan Su Mei', '0149728334', '2024-05-31', 'sophiaTan@gmail.com'),
(116, 'Yusuf bin Ismail', '0163715928', '2025-08-15', 'yusuf.ismail@gmail.com'),
(117, 'Isabelle Wong Siew Ling', '01588877790', '2023-11-30', 'isabelle.wong@gmail.com'),
(118, 'Adam bin Ismail', '01293278157', '2024-06-30', 'adam.ismail@gmail.com'),
(119, 'Natalie Tan Li Wei', '0139856940', '2025-09-15', 'natalie.tan@gmail.com'),
(120, 'Wong Wei Jie', '01199228704', '2023-12-31', 'wj.wong@gmail.com'),
(121, 'Amin bin Abdullah', '01788143879', '2025-05-20', 'amin.abdullah@gmail.com'),
(122, 'Emily Lee Mei Ling', '0141374238', '2026-02-28', 'emily.lee@gmail.com'),
(123, 'Ahmad bin Mohd Zuro', '01095312577', '2024-08-15', 'ahmadMOhd@gmail.com'),
(124, 'Rachel Wong Mei Yue', '0169110232', '2023-11-30', 'rachelwong@gmail.com'),
(125, 'Zara binti Rohman', '0140491457', '2025-04-15', 'zara.rohman@gmail.com'),
(126, 'Ismail bin Omar', '0144837625', '2026-01-31', 'ismail.omar@gmail.com'),
(127, 'Lily Lim Wei Ling', '01391150935', '2024-12-31', 'lily.lim@gmail.com'),
(128, 'Siti binti Ahmad', '01183718849', '2025-07-20', 'siti.ahmad@gmail.com'),
(129, 'Ethan Tan Chee Wei', '0158133724', '2026-04-30', 'ethan.tan@gmail.com'),
(130, 'Nadi', '0117428653', '2023-09-15', 'nadi@gmail.com'),
(131, 'Gabriel Chong Wai Lun', '01401784158', '2024-08-31', 'gabrielchong11@gmail.com'),
(132, 'Hana binti Zainal Abidin', '0157045941', '2025-03-15', 'hana.zainal@gmail.com'),
(133, 'Irfan bin Mohd Razak', '01391725604', '2024-10-31', 'irfan.razak@gmail.com'),
(134, 'Melissa Lim Mei Ling', '0139234776', '2023-12-31', 'melissa.lim@gmail.com'),
(135, 'Azmi bin Azmi', '01183718552', '2026-07-20', 'azmi.azmi@gmail.com'),
(136, 'Sophia Tan Su Ling', '0156412373', '2024-05-31', 'sophia@gmail.com'),
(137, 'Yusuf bin Iman', '01391470265', '2025-08-15', 'yusuf.iman@gmail.com'),
(138, 'Lily Wong Siew Ling', '0159752768', '2023-11-30', 'lilyWong@gmail.com'),
(139, 'Ahmad bin Rahim', '0179012467', '2024-06-30', 'ahmad.rahim@gmail.com'),
(140, 'Sophie Lee Li Wei', '0184432697', '2025-09-15', 'sophie.lee@gmail.com'),
(141, 'Lee Wen Jie', '01266790691', '2023-12-31', 'wjlee@gmail.com'),
(142, 'Khalid bin Ismail', '0138371855', '2025-05-20', 'khalid.ismail@gmail.com'),
(143, 'Karen Lee Mei Lin', '0162367436', '2026-02-28', 'karenlee@gmail.com'),
(144, 'Ali bin Mohd Abu', '0191706142', '2024-08-15', 'alimohd@gmail.com'),
(145, 'Rachel Wong Mei You', '0165465799', '2023-11-30', 'rachelWong1@gmail.com'),
(146, 'Zora binti Rahman', '0169740415', '2025-04-15', 'zora.rahman@gmail.com'),
(147, 'Aiman bin Omar', '0159801957', '2026-01-31', 'aiman.omar@gmail.com'),
(148, 'Isabella Lim Wei Xing', '0129810924', '2024-12-31', 'isabellalim@gmail.com'),
(149, 'Lina binti Yusof', '01699910540', '2025-07-20', 'lina.yusof@gmail.com'),
(150, 'Joshua Tan Chee Wen', '0179433667', '2026-04-30', 'joshuatan@gmail.com'),
(151, 'Norah binti Aziz', '0141998570', '2023-09-15', 'norah.aziz@gmail.com'),
(152, 'Rizwan bin Ibrahim', '0131959780', '2024-06-30', 'rizwan.ibrahim@gmail.com'),
(153, 'Amelia Tan Li Wei', '01190743259', '2025-09-15', 'amelia.tan@gmail.com'),
(154, 'Lim Wei Xun', '01988279124', '2023-12-31', 'wx.lim0@gmail.com'),
(155, 'Rahman bin Khalid', '01198776231', '2025-05-20', 'rahman.khalid@gmail.com'),
(156, 'Michelle Lee Mei Fong', '0179643736', '2026-02-28', 'michelle.fong@gmail.com'),
(157, 'Mohd Ali bin Hassan', '0109578019', '2024-08-15', 'mohdAli@gmail.com'),
(158, 'Rachel Wong Fu Zhen', '0159902885', '2023-11-30', 'rachelwong55@gmail.com'),
(159, 'Zarah binti Rahman', '0179571440', '2025-04-15', 'zarah.rahman@gmail.com'),
(160, 'Omar bin Ahmad', '0169599810', '2026-01-31', 'omar.ahmad@gmail.com'),
(161, 'Elaine Lim Wei Ling', '01533219967', '2024-12-31', 'elaineLim@gmail.com'),
(162, 'Hassan', '0157713046', '2024-06-30', 'hassanAli@gmail.com'),
(163, 'Sophia Tan Li Na', '01790431349', '2025-09-15', 'sophiaTan12@gmail.com'),
(164, 'Chen Wei Ji', '0149099221', '2023-12-31', 'wjChen@gmail.com'),
(165, 'Khalid bin Rahman', '01839238870', '2025-05-20', 'khalid.rahman@gmail.com'),
(166, 'Emily Lee Mei Xuan', '0179663473', '2026-02-28', 'emilylee@gmail.com'),
(167, 'Ahmad bin Mohd Sakiran', '0167613604', '2024-08-15', 'ahmad@gmail.com'),
(168, 'Jessica Wong Mei Ling', '0169101958', '2023-11-30', 'jessica.wong@gmail.com'),
(169, 'Zara binti Mohd Rashid', '0181054741', '2025-04-15', 'zara.rashid@gmail.com'),
(170, 'Ahmad bin Othman', '0174076631', '2026-01-31', 'ahmad.othman@gmail.com'),
(171, 'Linda Lim Wei Xuan', '01198096171', '2024-12-31', 'linda.lim@gmail.com'),
(172, 'Rosna binti Yusof', '01231242751', '2025-07-20', 'rosna.yusof@gmail.com'),
(173, 'Jason Tan Chee Seng', '0183967643', '2026-04-30', 'jason.tan@gmail.com'),
(174, 'Nora binti Ismail', '01764603716', '2023-09-15', 'nora.ismail@gmail.com'),
(175, 'Ethan Chong Wai Xuan', '01868431957', '2024-08-31', 'ethan.chong@gmail.com'),
(176, 'Hana binti Zainal Sakinah', '0191054741', '2025-03-15', 'hanazainal@gmail.com'),
(177, 'Rahim bin Abdullah', '0196147630', '2024-06-30', 'rahim.abdullah@gmail.com'),
(178, 'Isabella Tan Li Na', '0189231765', '2025-09-15', 'isabella.tan@gmail.com'),
(179, 'Lim Wei Xiang', '0146612980', '2023-12-31', 'wx.lim@gmail.com'),
(180, 'Rahman bin Khalil', '01391876421', '2025-05-20', 'rahman.khalil@gmail.com'),
(181, 'Michelle Lee Mei Xuan', '0197643597', '2026-02-28', 'michelle.Xuan@gmail.com'),
(182, 'Ahmad bin Mohd Hussein', '0134371890', '2024-08-15', 'ahmad.hussein@gmail.com'),
(183, 'Jennifer Wong Mei Ling', '01344330578', '2023-11-30', 'jennifer.wong@gmail.com'),
(184, 'Zara binti Mohd Yusof', '0101410753', '2025-04-15', 'zara.yusof@gmail.com'),
(185, 'Omar bin Abdullah', '0123407918', '2026-01-31', 'omar.abdullah@gmail.com'),
(186, 'Elaine Lim Wei Qi', '0129118909', '2024-12-31', 'elaineLIM@gmail.com'),
(187, 'Adam bin Ismel', '01411219463', '2025-07-20', 'adamismail@gmail.com'),
(188, 'Emily Tan Chee Seng', '0194569473', '2026-04-30', 'emily.tan@gmail.com'),
(189, 'Nadia binti Ahmad', '0123841097', '2023-09-15', 'nadia.ahmad@gmail.com'),
(190, 'Gabriel Chong Wai Xuan', '0101124970', '2024-08-31', 'gabrielChong@gmail.com'),
(191, 'Hana binti Mohd Zain', '0115374186', '2025-03-15', 'hana.zain@gmail.com'),
(192, 'Kamal bin Rahim', '0148231934', '2024-06-30', 'kamal.rahim@gmail.com'),
(193, 'Sophie Lee Li Na', '01166610332', '2025-09-15', 'sophielee@gmail.com'),
(194, 'Lim Wei Xing', '0189912465', '2023-12-31', 'wxlim@gmail.com'),
(195, 'Rahmah bin Khalid', '01712214394', '2025-05-20', 'rahmah.khalid@gmail.com'),
(196, 'Michelle Lee Mei Xue', '0104734561', '2026-02-28', 'michelleXue@gmail.com'),
(197, 'Ahmad bin Mohd Sumantri', '0144389213', '2024-08-15', 'ahmadmohd33@gmail.com'),
(198, 'Jessica Wong Li Ling', '0176634952', '2023-11-30', 'jessicawong@gmail.com'),
(199, 'Zara binti Mohd Ahmad', '0115138764', '2025-04-15', 'zara.ahmad@gmail.com'),
(200, 'Aiman bin Othman', '01541121396', '2026-01-31', 'aiman.othman@gmail.com'),
(201, 'Linda Lim Wei Xin', '01788120895', '2024-12-31', 'lindalim@gmail.com'),
(202, 'Rosman binti Yusof', '0153287562', '2025-07-20', 'Rosman.yusof@gmail.com'),
(203, 'Jason Tan Chee Sin', '0114467153', '2026-04-30', 'jasonTan@gmail.com'),
(204, 'Nara binti Ismail', '0124319112', '2023-09-15', 'nara.ismail@gmail.com'),
(205, 'Ethan Chong Wai Lun', '0186635967', '2024-08-31', 'ethanchong@gmail.com'),
(206, 'Hana binti Zainal Aswad', '0125716348', '2025-03-15', 'hanaZainal1@gmail.com'),
(207, 'Aziz bin Ibrahim', '0119210723', '2024-06-30', 'aziz.ibrahim@gmail.com'),
(208, 'Amelia Tan Li Na', '0136535978', '2025-09-15', 'ameliatan@gmail.com'),
(209, 'Lim Wei Xian', '01188950993', '2023-12-31', 'wx.lim1@gmail.com'),
(210, 'Rahma bin Khalid', '0192326857', '2025-05-20', 'rahma.khalid@gmail.com'),
(211, 'Michelle Lee Mei Lee', '0117144536', '2026-02-28', 'michelle142@gmail.com'),
(212, 'Daniel Lim Wei Jie', '0160992139', '2023-12-31', 'daniel.lim@gmail.com'),
(213, 'Nurul binti Ahmad', '0179322170', '2024-08-15', 'nurul.ahmad@gmail.com'),
(214, 'Jessica Wong Lee Ling', '0178891093', '2023-11-30', 'jessicawong1@gmail.com'),
(215, 'Zara binti Mohd Rahman', '0136537418', '2025-04-15', 'zararahman@gmail.com'),
(216, 'Iman bin Omar', '0170973122', '2026-01-31', 'Iman.omar@gmail.com'),
(217, 'Liam Lim Wei Ling', '0199114032', '2024-12-31', 'liam.lim@gmail.com'),
(218, 'Zara binti Yusof', '0117635228', '2025-07-20', 'zarayusof@gmail.com'),
(219, 'Ethan Tan Chee Seng', '0126713454', '2026-04-30', 'ethantan@gmail.com'),
(220, 'Nora binti Ahmad', '0169037082', '2023-09-15', 'nora.ahmad@gmail.com'),
(221, 'Emily Chong Wai Xuan', '01699903321', '2024-08-31', 'emily.chong@gmail.com'),
(222, 'Zainab binti Zainal', '0148651347', '2025-03-15', 'zainab.zainal@gmail.com'),
(223, 'Adam bin Ibrahim', '01519208307', '2024-06-30', 'adam.ibrahim@gmail.com'),
(224, 'Sophie Lee Li Chin', '01027654321', '2025-09-15', 'sophieLee@gmail.com'),
(225, 'Lim Wen Xuan', '01977321464', '2023-12-31', 'wx.lim2@gmail.com'),
(226, 'Raham bin Khalid', '0183296415', '2025-05-20', 'raham.khalid@gmail.com'),
(227, 'Michelle Lee Mei Ong', '0124564731', '2026-02-28', 'michelleOng@gmail.com'),
(228, 'Ahmad bin Mohd Hassan', '0110980237', '2024-08-15', 'ahmadhassan@gmail.com'),
(229, 'Jessica Wong Mei Xing', '0129089543', '2023-11-30', 'jessicawong2@gmail.com'),
(230, 'Zara binti Mohd Ali', '0109032561', '2025-04-15', 'zara.ali@gmail.com'),
(231, 'Abu bin Othman', '0120793820', '2026-01-31', 'abu.othman@gmail.com'),
(232, 'Lina binti Aziz', '0130729830', '2024-06-30', 'lina.aziz@gmail.com'),
(233, 'Aiden Tan Chee Seng', '01322256745', '2025-09-15', 'aiden.tan@gmail.com'),
(234, 'Lee Wee Jie', '01290023457', '2023-12-31', 'wjLee22@gmail.com'),
(235, 'Khali bin Ismail', '0135321946', '2025-05-20', 'khali.ismail@gmail.com'),
(236, 'Emily Lee Lee Xuan', '0135315674', '2026-02-28', 'emilyLee@gmail.com'),
(237, 'Hamid bin Hassan', '0190703289', '2024-08-15', 'hamidhassan@gmail.com'),
(238, 'Rachel Wong En Yu', '0186473990', '2023-11-30', 'rachel.wong11@gmail.com'),
(239, 'Zarah binti Rohman', '0119106352', '2025-04-15', 'zarah.rohman@gmail.com'),
(240, 'Ali bin Omar', '0187100932', '2026-01-31', 'ali.omar@gmail.com'),
(241, 'Elaine Lim Wen Ling', '01490134692', '2024-12-31', 'elaineLIM12@gmail.com'),
(242, 'Siti binti ali', '01232190436', '2025-07-20', 'siti.ali@gmail.com'),
(243, 'Joshua Tan Chee Yee', '0147543561', '2026-04-30', 'joshuaTan0@gmail.com'),
(244, 'Nora binti Ali', '0186213090', '2023-09-15', 'nora.ali@gmail.com'),
(245, 'Daniel Chong Wai Lee', '01011203249', '2024-08-31', 'danielChong@gmail.com'),
(246, 'Hana binti Zainal Abidan', '0116351910', '2025-03-15', 'hanazainal11@gmail.com'),
(247, 'Rizwan bin Mohd Razak', '0107162534', '2024-10-31', 'rizwan.razak@gmail.com'),
(248, 'Melissa Lim Mei Xing', '01099123323', '2023-12-31', 'melissalim@gmail.com'),
(249, 'Azmin bin Azmi', '01036213940', '2026-07-20', 'azmin.azmi@gmail.com'),
(250, 'Sophia Tan Su Xing', '0148156453', '2024-05-31', 'sophiatan22@gmail.com'),
(251, 'Yusuf bin Aiman', '0125741362', '2025-08-15', 'yusuf.Aiman@gmail.com'),
(252, 'Amir bin Abdullah', '0132751463', '2024-06-30', 'amir.abdullah@gmail.com'),
(253, 'Lily Tan Li Na', '01322129076', '2025-09-15', 'lily.tan@gmail.com'),
(254, 'Chen Wei Ze', '0119877456', '2023-12-31', 'wj.chen11@gmail.com'),
(255, 'Khalid bin Rahmad', '01891304431', '2025-05-20', 'khalid.rahmad@gmail.com'),
(256, 'Emily Lee Jia Xuan', '0144538157', '2026-02-28', 'emily.lee13@gmail.com'),
(257, 'Ahmad bin Mohd Hasan', '0177534162', '2024-08-15', 'ahmadhassan12@gmail.com'),
(258, 'Rachel Wong Yu En', '0129097152', '2023-11-30', 'rachelWONG2@gmail.com'),
(259, 'Aiman binti Rahman', '0121693105', '2025-04-15', 'aiman.rahman@gmail.com'),
(260, 'Abu bin Omar', '0151627534', '2026-01-31', 'abu.omar@gmail.com'),
(261, 'Elaine Lim Wee Ling', '01988726593', '2024-12-31', 'elaineL12@gmail.com'),
(262, 'Siti binti Aiman', '01891133044', '2025-07-20', 'siti.aiman@gmail.com'),
(263, 'Joshua Tan Chee Jun', '0158755318', '2026-04-30', 'joshuatan11@gmail.com'),
(264, 'Nora binti Aiman', '0109256314', '2023-09-15', 'nora.aiman@gmail.com'),
(265, 'Daniel Chong Wai Liu', '01908651231', '2024-08-31', 'danielchong22@gmail.com'),
(266, 'Hana binti Zainal Adin', '0130363159', '2025-03-15', 'hanazainal12@gmail.com'),
(267, 'Rizwad bin Mohd Razak', '0101924536', '2024-10-31', 'rizwad.razak@gmail.com'),
(268, 'Melissa Lim Mei Lin', '01591235147', '2023-12-31', 'melissaLim@gmail.com'),
(269, 'Hazid bin Azmi', '01691314340', '2026-07-20', 'Hazid.azmi@gmail.com'),
(270, 'Sophia Tan Su Shang', '0168471535', '2024-05-31', 'sophiaTAN22@gmail.com'),
(271, 'Yusuf bin Azmin', '0164492156', '2025-08-15', 'yusuf.Azmin@gmail.com'),
(272, 'Hassan bin Mohd Ali', '0146245361', '2024-06-30', 'hassanALI11@gmail.com'),
(273, 'Sophie Lee Li Yan', '01509185478', '2025-09-15', 'sophieLee11@gmail.com'),
(274, 'Lee Wei Jun', '01699013364', '2023-12-31', 'wjLEE1@gmail.com'),
(275, 'Khalid bin Yusuf', '01290134134', '2025-05-20', 'khalid.yusuf@gmail.com'),
(276, 'Karen Lee xiao Ling', '0179543751', '2026-02-28', 'karenLee0@gmail.com'),
(277, 'Ahmad bin Mohd Yusuf', '0156362415', '2024-08-15', 'ahmadyusuf@gmail.com'),
(278, 'Rachel Wong Li Yue', '01691020121', '2023-11-30', 'RachelWong22@gmail.com'),
(279, 'Ali binti Rahman', '0140135693', '2025-04-15', 'ali.rahman@gmail.com'),
(280, 'Omar bin Ali', '0131624653', '2026-01-31', 'omar.ali@gmail.com'),
(281, 'Elaine Lim Wei Xing', '01343235463', '2024-12-31', 'elaine22@gmail.com'),
(282, 'Siti binti Iman', '01099403113', '2025-07-20', 'siti.iman@gmail.com'),
(283, 'Jason Tan Chee Yee', '0170155473', '2026-04-30', 'jasontan11@gmail.com'),
(284, 'Nora binti Abu', '01154290617', '2023-09-15', 'nora.abu@gmail.com'),
(285, 'Ethan Chong Wei Xuan', '01155690639', '2024-08-31', 'ethanChong1@gmail.com'),
(286, 'Hana binti Zaina', '0156013395', '2025-03-15', 'hanazainal13@gmail.com'),
(287, 'Riwan bin Ibrahim', '0195042691', '2024-06-30', 'riwan.ibrahim@gmail.com'),
(288, 'Amelia Tan Wei Wei', '0142215487', '2025-09-15', 'ameliatan1@gmail.com'),
(289, 'Lim Wun Xuan', '0189138794', '2023-12-31', 'wx.lim3@gmail.com'),
(290, 'Rahha bin Khalid', '01598434145', '2025-05-20', 'rahha.khalid@gmail.com'),
(291, 'Michelle Lee Mei Yue', '0114521731', '2026-02-28', 'michelleYue@gmail.com'),
(292, 'Aiman bin Rahim', '0155046229', '2024-06-30', 'aiman.rahim@gmail.com'),
(293, 'Sophie Lee Li Mei', '01098467239', '2025-09-15', 'sophieLee22@gmail.com'),
(294, 'Lee Wei Ji', '0179330548', '2023-12-31', 'wjlee22@gmail.com'),
(295, 'Khalid bin Iman', '0109214743', '2025-05-20', 'khalid.iman@gmail.com'),
(296, 'Karen Lee Mei Foong', '0180415753', '2026-02-28', 'karenlee11@gmail.com'),
(297, 'Aiman bin Mohd Ali', '0116261435', '2024-08-15', 'aiman.mohd@gmail.com'),
(298, 'Rachel Wong Ke Qing', '01390782213', '2023-11-30', 'rachelwongkeqing@gmail.com'),
(299, 'Iman binti Rahman', '01787153265', '2025-04-15', 'Iman.rahman@gmail.com'),
(300, 'Omar bin Iman', '0129880872', '2026-01-31', 'omar.iman@gmail.com'),
(301, 'Elaine Lim Wei Lee', '01198417749', '2024-12-31', 'elaine99@gmail.com'),
(302, 'Siti binti Abu', '01877124521', '2025-07-20', 'siti.abu@gmail.com'),
(303, 'Jason Tan Chee Hong', '0195071435', '2026-04-30', 'jason.tan22@gmail.com'),
(304, 'Sarah binti Ali', '01297810254', '2023-09-15', 'sarah.ali@gmail.com'),
(305, 'Ethan Chong Wai Xun', '01191870983', '2024-08-31', 'ethanChong2@gmail.com'),
(306, 'Hana bin Zainal', '0168654323', '2025-03-15', 'hanazainal44@gmail.com'),
(307, 'Rizwan bin Aiman', '0128731098', '2024-06-30', 'rizwan.Aiman@gmail.com'),
(308, 'Amelia Tan Lee Wei', '0120997762', '2025-09-15', 'ameliatan2@gmail.com'),
(309, 'Lim Wee Xuan', '01588129362', '2023-12-31', 'wx.lim4@gmail.com'),
(310, 'Ramad bin Khalid', '0177124451', '2025-05-20', 'ramad.khalid@gmail.com'),
(311, 'Sivakumar Arivanathan', '0139163027', '2026-02-28', 'garifffauzi@gmail.com'),
(312, 'Jane Wu Lee Chin', '0183999435', '2024-06-30', 'WuChin@gmail.com'),
(313, 'Cham Wee Tai', '0194160517', '2025-09-15', 'perumal.yunos@gmail.com'),
(314, 'Asha Kaveri', '0159335062', '2023-12-31', 'taohei03@gmail.com'),
(315, 'Nur Mysarah binti Puadi Zulamin', '01369879059', '2025-05-20', 'yuefu.yen@gmail.com'),
(316, 'Mohammed Amin bin Che Norazmi', '0152861555', '2026-02-28', 'mepek58@gmail.com'),
(317, 'D. Selvarajoo', '0191784861', '2024-08-15', 'manrick93@gmail.com'),
(318, 'Hajjah Mysara Tarjuddin', '01208077108', '2023-11-30', 'ernliat16@gmail.com'),
(319, 'Sim Min Pui', '0152806560', '2025-04-15', 'chiukang.mazalan@gmail.com'),
(320, 'Sumisha a/l Maniam', '0173411901', '2026-01-31', 'yowyok14@gmail.com'),
(321, 'Noor Wahidah Adham', '0167523934', '2024-12-31', 'ctng@gmail.com'),
(322, 'Loo Boon Cee', '0122641528', '2025-07-20', 'BoonCee01@gmail.com'),
(323, 'Moktar Zaid bin Syukri Asyran', '0102964773', '2026-04-30', 'chengara@gmail.com'),
(324, 'Muhammet Nik Zakri Izam', '0165634881', '2023-09-15', 'ilyana.madhavan@gmail.com'),
(325, 'Mohamed Azim Zubair bin Syed Huzzaini', '0181717913', '2024-08-31', 'tse1@gmail.com'),
(326, 'Muhamed Farris bin Ridzwan Hamizie', '0190302061', '2025-03-15', 'raj.afandy@gmail.com'),
(327, 'Meng Tea Siu', '01441130491', '2024-06-30', 'teasiu64@gmail.com'),
(328, 'Nur Iklil Soberi binti Azmee', '0145708539', '2025-09-15', 'thanabalasingam@gmail.com'),
(329, 'Yu Ni Mong', '0162463876', '2023-12-31', 'nimong@gmail.com'),
(330, 'Nur Nurfatiha Dolkefli binti Raffioddin', '0172856881', '2025-05-20', 'dyacob@gmail.com'),
(587, 'Tay Bing Jie', '01136523314', '2025-06-18', 'bingjie@gmail.com'),
(588, 'Mong Ren Er', '01236598745', '2025-08-08', 'rener@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `name_on_seat` varchar(100) NOT NULL,
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
  `payment_date` datetime NOT NULL,
  `return_status` int(1) NOT NULL COMMENT '1 = return, 0 = departure',
  `user_id` int(11) NOT NULL,
  `bus_schedule_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `name_on_seat`, `bus_seat_no`, `total_pay`, `name_on_card`, `payment_method`, `card_number`, `expiration_date`, `cvv`, `contact_no`, `email_address`, `booking_no`, `payment_date`, `return_status`, `user_id`, `bus_schedule_id`) VALUES
(23, 'Tay Han Chung', '10A', 12, 'Tay Han Chung', 'VisaCard', '4111111111111111', '6/23', '555', '01139674436', 'tayhanchung@gmail.com', '649eec547e', '2023-06-30 22:53:08', 0, 1, 206);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `rating_point` int(11) NOT NULL,
  `rate_datetime` int(11) NOT NULL,
  `booking_no` varchar(100) NOT NULL,
  `bus_schedule_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Tay Han Chung', '01139674436', 'tayhanchung@gmail.com', 'thc1765', 'Thc1765#', 'default picture.png'),
(2, 'Muhammad Ali', '019204 3245', 'muhammad.ali@gmail.com', 'johnse25', '25Db7599#', 'default picture.png'),
(3, 'Siti Aisyah', '012345 6789', 'siti.aisyah@gmail.com', 'janesm320', 'P@ssw0rd123', 'default picture.png'),
(4, 'Ahmad Hassan', '017890 1234', 'ahmad.hassan@gmail.com', 'mjohnson12', 'mySecretPass', 'default picture.png'),
(5, 'Nurul Amira', '016-567 8901', 'nurul.amira@gmail.com', 'emilyb354', 'StrongPassword456', 'default picture.png'),
(6, 'Mohd Faizal', '013456 7890', 'mohd.faizal@gmail.com', 'davidle789e', 'SecurePass123', 'default picture.png'),
(7, 'Nurul Huda', '011234 5678', 'nurul.huda@gmail.com', 'jennife865rd', 'Password123!', 'default picture.png'),
(8, 'Lim Wei Jie', '018987 6543', 'lim.weijie@gmail.com', 'robertw37', 'Passw0rd!', 'default picture.png'),
(9, 'Norazimah Abdullah', '015678 9012', 'norazimah.abdullah@gmail.com', 'oliviaj20', 'StrongP@ss', 'default picture.png'),
(10, 'Azman Bin Ibrahim', '019123 4567', 'azman.ibrahim@gmail.com', 'william7825t', 'MySecr3t', 'default picture.png'),
(11, 'Nurul Hidayah', '017654 3210', 'nurul.hidayah@gmail.com', 'sophiaa35', 'Pa$$w0rd', 'default picture.png'),
(12, 'Lim Chin Huat', '013345 6789', 'lim.chinhuat@gmail.com', 'danielb3', 'MyP@ssw0rd', 'default picture.png'),
(13, 'Nurul Afiqah', '016789 0123', 'nurul.afiqah@gmail.com', 'emilyj37', 'P@ssword123', 'default picture.png'),
(14, 'Mohd Azman', '011876 5432', 'mohd.azman@gmail.com', 'matthewd76', 'StrongP@ssw0rd', 'default picture.png'),
(15, 'Nurul Natasha', '018567 8901', 'nurul.natasha@gmail.com', 'emmaw102', 'Password!23', 'default picture.png'),
(16, 'Ahmad Faisal', '015012 3456', 'ahmad.faisal@gmail.com', 'andrewt24', 'Myp@ss123', 'default picture.png'),
(17, 'Nurul Hidayah', '019654 3210', 'nurul.hidayah@gmail.com', 'avaa277', 'Secret@123', 'default picture.png'),
(18, 'Lim Wei Xiang', '017234 5678', 'lim.weixiang@gmail.com', 'jamesb789', 'P@ssw0rd!', 'default picture.png'),
(19, 'Norazlina Hassan', '013987 6543', 'norazlina.hassan@gmail.com', 'charlotted36', 'MyP@ssw0rd!', 'default picture.png'),
(20, 'Ahmad Hafiz Bin Mohd', '016678 9012', 'ahmadhafiz.mohd@gmail.com', 'benjaminw27', 'StrongP@ssw0rd!', 'default picture.png'),
(21, 'Nurul Izzati', '011123 4567', 'nurul.izzati@gmail.com', 'miat368', 'Password123!$', 'default picture.png'),
(22, 'John Doe', '0123456789', 'johndoe12@gmail.com', 'johndoe123', 'JohnDoe12@', 'default picture.png'),
(23, 'Jane Smith', '0129876543', 'janesmith666@gmail.com', 'janesmith1', 'Jane666#', 'default picture.png'),
(24, 'Michael Lee', '0187654321', 'michaellee@gmail.com', 'mlee456', 'MichaelLee89@', 'default picture.png'),
(25, 'Sarah Tan', '0171234567', 'sarahtan555@gmail.com', 'sarah123', 'Sarah55$', 'default picture.png'),
(26, 'David Lim', '0195086723', 'davidlim21@gmail.com', 'davidlim2', 'Davidlim@21', 'default picture.png'),
(27, 'Adrea Foong Jun Jie', '01136547785', '1211201349@student.mmu.edu.my', 'adrea1349', 'Adrea1349#', 'default picture.png'),
(28, 'Mah Qi Xiang', '01226985546', '1211201958@student.mmu.edu.my', 'qixiang1958', 'Qixiang1958#', 'default picture.png'),
(29, 'Tay Bing Jie', '01136521146', 'bingjie@gmail.com', 'bingjie123', 'Bingjie123#', 'default picture.png');

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
  ADD KEY `bus_schedule_id` (`bus_schedule_id`),
  ADD KEY `user_id` (`user_id`);

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
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=577;

--
-- AUTO_INCREMENT for table `bus_operators`
--
ALTER TABLE `bus_operators`
  MODIFY `bus_operator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bus_schedule`
--
ALTER TABLE `bus_schedule`
  MODIFY `bus_schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=331;

--
-- AUTO_INCREMENT for table `bus_seat`
--
ALTER TABLE `bus_seat`
  MODIFY `bus_seat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=589;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`bus_schedule_id`) REFERENCES `bus_schedule` (`bus_schedule_id`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
