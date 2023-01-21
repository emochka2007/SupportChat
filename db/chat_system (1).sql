-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 01, 2023 at 02:51 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chatid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `chatroomid` int(11) NOT NULL,
  `message` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chat_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chatid`, `userid`, `chatroomid`, `message`, `chat_date`) VALUES
(1, 65, 12, 'asd_65', '2022-12-29 23:49:12'),
(2, 53, 53, 'worker88', '2022-12-29 23:49:21'),
(3, 53, 53, '132', '2022-12-29 23:50:52'),
(4, 65, 12, 'ру', '2022-12-29 23:51:41'),
(5, 53, 12, 'ру', '2022-12-29 23:51:51'),
(6, 53, 12, '123', '2022-12-29 23:56:03'),
(7, 53, 12, 'dkfsdf', '2022-12-29 23:57:31'),
(8, 53, 12, 'hello', '2022-12-30 00:06:48'),
(9, 53, 12, 'рпивтеъ', '2022-12-30 00:07:05');

-- --------------------------------------------------------

--
-- Table structure for table `chatroom`
--

CREATE TABLE `chatroom` (
  `chatroomid` int(11) NOT NULL,
  `chat_name` varchar(60) NOT NULL,
  `date_created` datetime NOT NULL,
  `chat_password` varchar(30) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chatroom`
--

INSERT INTO `chatroom` (`chatroomid`, `chat_name`, `date_created`, `chat_password`, `userid`) VALUES
(1, 'My First Chat Room', '2017-09-11 13:20:18', 'leeann', 2),
(2, 'Free Entrance :)', '2017-09-11 13:20:51', '', 3),
(3, 'Admin Chat Room', '2017-09-11 13:21:24', '', 1),
(4, 'IT-Target - asd', '2022-12-27 14:21:19', '123', 53),
(5, 'IT-Target - new_777', '2022-12-27 14:23:24', '123', 55),
(6, 'IT-Target - 1', '2022-12-27 14:26:18', '123', 57),
(7, 'IT-Target - cl', '2022-12-27 14:30:11', '123', 58),
(8, 'IT-Target - 2', '2022-12-27 14:31:41', '123', 59),
(9, 'IT-Target - 3', '2022-12-27 14:33:39', '123', 60),
(10, 'IT-Target - 4', '2022-12-27 14:35:18', '123', 61),
(11, 'IT-Target - newclient', '2022-12-29 23:14:48', '123', 53),
(12, 'IT-Target - asd_65', '2022-12-29 23:23:03', '123', 63),
(13, 'IT-Target - check', '2023-01-01 12:18:13', '123', 66),
(14, 'IT-Target - client_123', '2023-01-01 12:19:35', '123', 67),
(15, '123', '2023-01-01 12:29:16', '123', 53),
(16, 'IT-Target - task123', '2023-01-01 14:49:06', '123', 53),
(17, 'IT-Target - hello', '2023-01-01 17:50:06', '123', 53);

-- --------------------------------------------------------

--
-- Table structure for table `chat_member`
--

CREATE TABLE `chat_member` (
  `chat_memberid` int(11) NOT NULL,
  `chatroomid` int(11) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_member`
--

INSERT INTO `chat_member` (`chat_memberid`, `chatroomid`, `userid`) VALUES
(1, 1, 2),
(2, 2, 3),
(3, 3, 1),
(4, 3, 2),
(5, 3, 5),
(6, 3, 10),
(7, 2, 17),
(8, 3, 17),
(9, 4, 4),
(10, 5, 4),
(11, 6, 4),
(12, 7, 4),
(13, 8, 4),
(14, 9, 4),
(15, 10, 4),
(16, 11, 4),
(17, 12, 4),
(18, 13, 4),
(19, 14, 4),
(20, 3, 16),
(21, 15, 22),
(22, 16, 23),
(23, 17, 22),
(24, 18, 28),
(25, 19, 28),
(26, 20, 28),
(27, 21, 4),
(28, 22, 4),
(29, 23, 4),
(30, 24, 4),
(31, 25, 4),
(32, 26, 4),
(33, 27, 4),
(34, 28, 4),
(35, 29, 4),
(36, 30, 4),
(37, 31, 4),
(38, 16, 16),
(39, 15, 16),
(40, 17, 4),
(41, 18, 4),
(42, 18, 22),
(43, 19, 16),
(44, 20, 30),
(45, 21, 4),
(46, 16, 4),
(47, 22, 31),
(48, 23, 34),
(49, 24, 35),
(50, 25, 33),
(51, 1000, 39),
(52, 0, 40),
(53, 1001, 40),
(55, 1003, 44),
(56, 1004, 4),
(57, 1005, 46),
(58, 1006, 4),
(59, 1007, 48),
(61, 1003, 4),
(62, 1008, 50),
(63, 1009, 50),
(64, 1010, 50),
(65, 1011, 50),
(66, 1003, 54),
(67, 1005, 54),
(68, 1012, 55),
(69, 1012, 54),
(70, 1004, 54),
(71, 1010, 54),
(72, 1013, 56),
(73, 1013, 54),
(74, 1014, 54),
(75, 1015, 58),
(76, 1015, 53),
(77, 1016, 60),
(78, 1017, 61),
(79, 1018, 61),
(80, 1019, 63),
(81, 1020, 63),
(82, 4, 53),
(83, 4, 56),
(84, 5, 55),
(85, 5, 56),
(86, 6, 57),
(87, 7, 58),
(88, 8, 59),
(89, 9, 60),
(90, 10, 61),
(91, 11, 53),
(92, 11, 64),
(93, 12, 63),
(94, 5, 53),
(95, 12, 53),
(96, 13, 66),
(97, 14, 67),
(98, 15, 53),
(99, 16, 53),
(100, 17, 53);

-- --------------------------------------------------------

--
-- Table structure for table `Reviews`
--

CREATE TABLE `Reviews` (
  `id` int(11) NOT NULL,
  `WorkerId` int(11) DEFAULT NULL,
  `reviewSum` int(11) DEFAULT NULL,
  `reviewCount` int(11) DEFAULT NULL,
  `result_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `Reviews`
--

INSERT INTO `Reviews` (`id`, `WorkerId`, `reviewSum`, `reviewCount`, `result_time`) VALUES
(3, 53, 60, 14, 4),
(4, 56, 10, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `taskid` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `description` varchar(150) CHARACTER SET utf8 NOT NULL,
  `workerId` int(11) DEFAULT NULL,
  `status_task` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `createdBy` int(11) DEFAULT NULL,
  `clientCompany` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `result_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`taskid`, `name`, `description`, `workerId`, `status_task`, `createdBy`, `clientCompany`, `start_time`, `end_time`, `result_time`) VALUES
(27, 'new', 'new', 53, NULL, NULL, NULL, NULL, NULL, NULL),
(62, '999IT-Target', '999', 53, 'Done', 70, '999', '2023-01-01 17:38:57', '2023-01-01 17:43:08', 4),
(63, '999IT-Target', '999erwerew', 53, 'Done', 70, '999', '2023-01-01 17:39:13', '2023-01-01 17:41:44', 3),
(64, '999IT-Target', '999erwerew', 53, 'Done', 70, '999', '2023-01-01 17:39:27', '2023-01-01 17:39:33', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL,
  `uname` varchar(60) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `access` int(1) NOT NULL,
  `company` varchar(255) DEFAULT NULL,
  `has_review` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `uname`, `photo`, `access`, `company`, `has_review`) VALUES
(1, 'admin', 'admin', 'Admin', '', 1, NULL, NULL),
(53, 'worker88', 'worker88', 'worker_it', 'user.png', 2, 'IT-Target', 'true'),
(55, 'asd', '123', 'asd', 'user.png', 3, 'IT-Target', 'true'),
(56, 'new_worker', '123', 'new_worker', 'user.png', 2, 'IT-Target', NULL),
(57, 'new_777', '123', 'new_777', 'user.png', 3, 'IT-Target', 'true'),
(58, '1', '123', '1', 'user.png', 3, 'IT-Target', NULL),
(59, 'cl', '123', 'cl', 'user.png', 3, 'IT-Target', NULL),
(60, '2', '123', '2', 'user.png', 3, 'IT-Target', 'true'),
(61, '3', '123', '3', 'user.png', 3, 'IT-Target', 'true'),
(62, '4', '123', '4', 'user.png', 3, 'IT-Target', 'true'),
(63, 'newclient', '123', 'newclient', 'user.png', 3, 'IT-Target', 'true'),
(64, 'asd_worker', '123', 'asd', 'user.png', 2, 'IT-Target', NULL),
(65, 'asd_65', '123', 'asd_65', 'user.png', 3, 'IT-Target', NULL),
(66, 'daun', 'daun', 'hello', 'user.png', 3, 'IT-Target', NULL),
(67, 'check', '123', 'check', 'user.png', 2, 'IT-Target', NULL),
(68, 'client_123', '123', 'client', 'user.png', 3, 'IT-Target', NULL),
(69, 'task123', '123', 'task123', 'user.png', 3, 'IT-Target', NULL),
(70, '99', '123', '99', 'user.png', 3, 'IT-Target', NULL),
(71, 'nick', '123', 'nick', 'user.png', 3, 'IT-Target', NULL),
(72, 'hello', '123', 'hello', 'user.png', 2, 'IT-Target', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chatid`);

--
-- Indexes for table `chatroom`
--
ALTER TABLE `chatroom`
  ADD PRIMARY KEY (`chatroomid`);

--
-- Indexes for table `chat_member`
--
ALTER TABLE `chat_member`
  ADD PRIMARY KEY (`chat_memberid`);

--
-- Indexes for table `Reviews`
--
ALTER TABLE `Reviews`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`taskid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `chatroom`
--
ALTER TABLE `chatroom`
  MODIFY `chatroomid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `chat_member`
--
ALTER TABLE `chat_member`
  MODIFY `chat_memberid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `Reviews`
--
ALTER TABLE `Reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `taskid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
