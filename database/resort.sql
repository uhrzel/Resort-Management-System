-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 07:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resort`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned_rooms`
--

CREATE TABLE `assigned_rooms` (
  `customer_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `assigned_rooms`
--

INSERT INTO `assigned_rooms` (`customer_id`, `room_id`) VALUES
(1, 701),
(2, 1001),
(3, 702),
(5, 1002),
(6, 1001),
(7, 101),
(7, 1002),
(8, 102),
(14, 103),
(11, 201),
(13, 202),
(10, 604);

-- --------------------------------------------------------

--
-- Stand-in structure for view `bestrating`
-- (See below for the actual view)
--
CREATE TABLE `bestrating` (
`id` int(11)
,`star` int(5)
,`comnt` varchar(225)
);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `mid` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`mid`, `email`, `password`, `status`) VALUES
(1, 'sherlock@sa.com', '202cb962ac59075b964b07152d234b70', 'Not Verified'),
(2, 'admin@r.com', '202cb962ac59075b964b07152d234b70', 'Not Verified'),
(5, 'ratul@gmail.com', '202cb962ac59075b964b07152d234b70', 'Not Verified'),
(6, 'taslim@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02', 'Not Verified'),
(11, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'Verified');

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `mid` int(11) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`mid`, `last_name`, `first_name`, `email`, `password`) VALUES
(1, 'sharlock', 'iam', 'sherlock@sa.com', '202cb962ac59075b964b07152d234b70'),
(2, 'admin', 'admin', 'admin@r.com', '21232f297a57a5a743894a0e4a801fc3'),
(6, 'taslim', '', 'taslim@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02'),
(5, 'ratul', '', 'ratul@gmail.com', '202cb962ac59075b964b07152d234b70'),
(7, 'all', 'admin', 'a', '202cb962ac59075b964b07152d234b70'),
(28, 'sasa', 'sa', 'ajmixrhyme@gmail.com', '202cb962ac59075b964b07152d234b70'),
(27, 'Zolina', 'Arzel John', 'Arzeljrz17@gmail.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `coid` int(6) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `message` varchar(225) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`coid`, `name`, `email`, `message`) VALUES
(1, 'sherlock', 'sherlock@sa.com', 'hello !! how r u ?'),
(5, 'diya', 'diya@diya.com', 'Eagles come in all shapes and sizes, but you will recognize them chiefly by their attitudes'),
(3, 'sherlock', 'sherlock@sa.com', 'its working xD'),
(4, 'sherlock', 'sherlock@sa.com', 'helllllllllllllllllllllo');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `star` int(5) NOT NULL,
  `comnt` varchar(225) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `star`, `comnt`) VALUES
(1, 5, 'great service !!!'),
(5, 5, 'happy with service'),
(4, 5, 'Loved it :D'),
(7, 5, 'happy with service'),
(11, 4, 'it was satisfying '),
(12, 4, 'it was satisfying '),
(13, 4, 'it was satisfying '),
(14, 4, 'Nice :D'),
(15, 5, 'had a great time'),
(16, 5, 'had a great time'),
(17, 5, 'hello'),
(18, 5, 'great place ');

-- --------------------------------------------------------

--
-- Table structure for table `request_room`
--

CREATE TABLE `request_room` (
  `id` int(6) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `a_date` date NOT NULL,
  `d_date` date NOT NULL,
  `people` int(10) NOT NULL,
  `room_type` varchar(225) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `request_room`
--

INSERT INTO `request_room` (`id`, `name`, `email`, `phone`, `a_date`, `d_date`, `people`, `room_type`, `status`) VALUES
(1, 'admin', 'admin@r.com', '12345', '2017-12-19', '2017-12-21', 2, 'Presidential', 0),
(2, 'admin', 'admin@r.com', '12345', '2017-12-19', '2017-12-21', 2, 'Presidential', 0);

--
-- Triggers `request_room`
--
DELIMITER $$
CREATE TRIGGER `request_delete` BEFORE DELETE ON `request_room` FOR EACH ROW BEGIN
INSERT INTO request_room_delete 
VALUES (old.id,old.name,old.email,old.phone,old.a_date,old.d_date,old.people,old.room_type);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `request_insert` AFTER INSERT ON `request_room` FOR EACH ROW BEGIN
INSERT INTO request_room_backup VALUES (NEW.id,NEW.name,NEW.email,NEW.phone,NEW.a_date,NEW.d_date,NEW.people,NEW.room_type);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `request_room_backup`
--

CREATE TABLE `request_room_backup` (
  `id` int(6) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `a_date` date NOT NULL,
  `d_date` date NOT NULL,
  `people` int(10) NOT NULL,
  `room_type` varchar(225) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `request_room_backup`
--

INSERT INTO `request_room_backup` (`id`, `name`, `email`, `phone`, `a_date`, `d_date`, `people`, `room_type`) VALUES
(1, 'admin', 'admin@r.com', '12345', '2017-12-19', '2017-12-21', 2, 'Presidential');

-- --------------------------------------------------------

--
-- Table structure for table `request_room_delete`
--

CREATE TABLE `request_room_delete` (
  `id` int(6) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `a_date` date NOT NULL,
  `d_date` date NOT NULL,
  `people` int(10) NOT NULL,
  `room_type` varchar(225) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `request_room_delete`
--

INSERT INTO `request_room_delete` (`id`, `name`, `email`, `phone`, `a_date`, `d_date`, `people`, `room_type`) VALUES
(22, 'asdag', 'ggfa', '12345', '2017-12-01', '2017-12-08', 2, 'double'),
(21, 'asda', 'asda', '1234', '2017-12-06', '2017-12-15', 2, 'single');

-- --------------------------------------------------------

--
-- Table structure for table `resort_rooms`
--

CREATE TABLE `resort_rooms` (
  `Room_id` int(11) NOT NULL,
  `Type` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `resort_rooms`
--

INSERT INTO `resort_rooms` (`Room_id`, `Type`) VALUES
(602, 'Deluxe'),
(601, 'Deluxe'),
(603, 'Deluxe'),
(604, 'Deluxe'),
(605, 'Deluxe'),
(701, 'Presidential'),
(702, 'Presidential'),
(703, 'Presidential'),
(101, 'Single'),
(102, 'Single'),
(103, 'Single'),
(104, 'Single'),
(105, 'Single'),
(106, 'Single'),
(107, 'Single'),
(108, 'Single'),
(109, 'Single'),
(110, 'Single'),
(201, 'Double'),
(202, 'Double'),
(203, 'Double'),
(204, 'Double'),
(205, 'Double'),
(206, 'Double'),
(207, 'Double'),
(208, 'Double'),
(209, 'Double'),
(210, 'Double'),
(1001, 'Bungalow'),
(1002, 'Bungalow');

-- --------------------------------------------------------

--
-- Structure for view `bestrating`
--
DROP TABLE IF EXISTS `bestrating`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bestrating`  AS SELECT `rating`.`id` AS `id`, `rating`.`star` AS `star`, `rating`.`comnt` AS `comnt` FROM `rating` WHERE `rating`.`star` <> 0 LIMIT 0, 5 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`coid`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_room`
--
ALTER TABLE `request_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_room_backup`
--
ALTER TABLE `request_room_backup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_room_delete`
--
ALTER TABLE `request_room_delete`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resort_rooms`
--
ALTER TABLE `resort_rooms`
  ADD PRIMARY KEY (`Room_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `coid` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `request_room`
--
ALTER TABLE `request_room`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `request_room_backup`
--
ALTER TABLE `request_room_backup`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `request_room_delete`
--
ALTER TABLE `request_room_delete`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
