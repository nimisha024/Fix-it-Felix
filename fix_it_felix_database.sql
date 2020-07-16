-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2020 at 10:20 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbms`
--

-- --------------------------------------------------------

--
-- Table structure for table `authority`
--

CREATE TABLE `authority` (
  `a_id` int(11) NOT NULL,
  `a_email` varchar(255) NOT NULL,
  `a_password` varchar(255) NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `a_phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authority`
--

INSERT INTO `authority` (`a_id`, `a_email`, `a_password`, `a_name`, `a_phone`) VALUES
(1, 'luke@light.com', 'luke', 'skywalker', 1234567890);

-- --------------------------------------------------------

--
-- Table structure for table `contractor`
--

CREATE TABLE `contractor` (
  `c_id` int(11) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_password` varchar(255) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contractor`
--

INSERT INTO `contractor` (`c_id`, `c_email`, `c_password`, `c_name`, `c_phone`) VALUES
(-1, '', '', '', 0),
(1, 'darth@vader.com', 'darth', 'vader', 1234567890),
(2, 'bob@builder.com', 'bob', 'Bob The Builder', 1234567890);

-- --------------------------------------------------------

--
-- Table structure for table `handler`
--

CREATE TABLE `handler` (
  `h_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `a_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT -1,
  `img_loc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `handler`
--

INSERT INTO `handler` (`h_id`, `p_id`, `c_id`, `a_id`, `status`, `img_loc`) VALUES
(71, 199, 2, 1, 3, 'uploads/5edca11dc0e654.35956823.jpg'),
(72, 200, 2, 1, 3, 'uploads/5edca146e2af15.53172935.jpg'),
(73, 201, 2, NULL, 2, 'uploads/5edca14dc01b19.99870996.jpg'),
(74, 202, NULL, NULL, -1, 'uploads/5edca159f40d05.84883923.jpg'),
(75, 203, 2, NULL, 2, 'uploads/5edca161654a35.88705775.jpg'),
(76, 204, 2, NULL, 1, 'uploads/5edca167d1c536.91768275.jpg'),
(77, 205, 2, NULL, 2, 'uploads/5edca17111f496.53440528.jpg'),
(78, 206, 2, NULL, 1, 'uploads/5edca17aee3633.56648602.jpg'),
(79, 207, NULL, NULL, -1, 'uploads/5edca244e22a88.56956923.jpg'),
(80, 208, NULL, NULL, -1, 'uploads/5edca24b39f6e7.59972676.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `potholes`
--

CREATE TABLE `potholes` (
  `p_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL,
  `img_loc` varchar(255) NOT NULL,
  `date` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `potholes`
--

INSERT INTO `potholes` (`p_id`, `u_id`, `latitude`, `longitude`, `img_loc`, `date`) VALUES
(50, 1, '', '', '', 2147483647),
(51, 1, '', '', '', 2147483647),
(53, 1, '', '', '', 2147483647),
(56, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(57, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(58, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(59, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(60, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(61, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(62, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(63, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(64, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(65, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(66, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(67, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(68, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(69, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(70, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(71, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(72, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(73, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(74, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(75, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(76, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(77, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(78, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(79, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(80, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(81, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(82, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(83, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(84, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(85, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(86, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(87, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(88, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(89, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(90, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8caf072a9568.70343927.jpg', 2147483647),
(91, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8d59ff5f5e73.15952511.jpg', 2147483647),
(92, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fb9f19e1897.05709132.jpg', 2147483647),
(93, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fb9f19e1897.05709132.jpg', 2147483647),
(94, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fb9f19e1897.05709132.jpg', 2147483647),
(95, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fb9f19e1897.05709132.jpg', 2147483647),
(96, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fb9f19e1897.05709132.jpg', 2147483647),
(97, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fb9f19e1897.05709132.jpg', 2147483647),
(98, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fb9f19e1897.05709132.jpg', 2147483647),
(99, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fb9f19e1897.05709132.jpg', 2147483647),
(100, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fb9f19e1897.05709132.jpg', 2147483647),
(101, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fb9f19e1897.05709132.jpg', 2147483647),
(102, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fb9f19e1897.05709132.jpg', 2147483647),
(103, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fb9f19e1897.05709132.jpg', 2147483647),
(104, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fb9f19e1897.05709132.jpg', 2147483647),
(105, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fb9f19e1897.05709132.jpg', 2147483647),
(106, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fb9f19e1897.05709132.jpg', 2147483647),
(107, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fb9f19e1897.05709132.jpg', 2147483647),
(108, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fb9f19e1897.05709132.jpg', 2147483647),
(109, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fd123043f95.33374656.jpg', 2147483647),
(110, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fd23539f0c8.79351527.jpg', 2147483647),
(111, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fd23539f0c8.79351527.jpg', 2147483647),
(112, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fd23539f0c8.79351527.jpg', 2147483647),
(113, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fd23539f0c8.79351527.jpg', 2147483647),
(114, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fd23539f0c8.79351527.jpg', 2147483647),
(115, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fd23539f0c8.79351527.jpg', 2147483647),
(116, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fd23539f0c8.79351527.jpg', 2147483647),
(117, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fd23539f0c8.79351527.jpg', 2147483647),
(118, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fd123043f95.33374656.jpg', 2147483647),
(119, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fd8d0e54405.45850043.jpg', 2147483647),
(120, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fd8d0e54405.45850043.jpg', 2147483647),
(121, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fd8d0e54405.45850043.jpg', 2147483647),
(122, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fd8d0e54405.45850043.jpg', 2147483647),
(123, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fd8d0e54405.45850043.jpg', 2147483647),
(124, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fd8d0e54405.45850043.jpg', 2147483647),
(125, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fd8d0e54405.45850043.jpg', 2147483647),
(126, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fd8d0e54405.45850043.jpg', 2147483647),
(127, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fd8d0e54405.45850043.jpg', 2147483647),
(128, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fd8d0e54405.45850043.jpg', 2147483647),
(129, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fd8d0e54405.45850043.jpg', 2147483647),
(130, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fd8d0e54405.45850043.jpg', 2147483647),
(131, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fd8d0e54405.45850043.jpg', 2147483647),
(132, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fd123043f95.33374656.jpg', 2147483647),
(136, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e8fd123043f95.33374656.jpg', 2147483647),
(137, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e901ba3d97ee8.07224297.jpg', 2147483647),
(138, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e901c32090aa4.55403748.jpg', 2147483647),
(139, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92a465ce55c0.98590575.jpg', 2147483647),
(140, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92a46fea4c87.15397372.jpg', 2147483647),
(141, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92a47ab4da47.68252890.jpg', 2147483647),
(142, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92ab579c30c3.12408670.jpg', 2147483647),
(143, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92ab5e1224d3.29072781.jpg', 2147483647),
(144, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92ab64579ed9.66301432.jpg', 2147483647),
(145, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92ab6b929977.54577732.jpg', 2147483647),
(146, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92ab73c0ee01.64613330.jpg', 2147483647),
(147, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92ab7b9e82b7.53470557.jpg', 2147483647),
(148, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92ab83cb0453.73480888.jpg', 2147483647),
(149, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92ab8a9f7031.43547276.jpg', 2147483647),
(150, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92ab93b2a205.95012532.jpg', 2147483647),
(151, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92b69fa25914.66102491.jpg', 2147483647),
(152, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92b736da0ae6.97002369.jpg', 2147483647),
(153, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92b736da0ae6.97002369.jpg', 2147483647),
(154, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92b975c61a16.07235304.jpg', 2147483647),
(155, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92b975c61a16.07235304.jpg', 2147483647),
(156, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92b975c61a16.07235304.jpg', 2147483647),
(157, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92b975c61a16.07235304.jpg', 2147483647),
(158, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92b975c61a16.07235304.jpg', 2147483647),
(159, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92b975c61a16.07235304.jpg', 2147483647),
(160, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92b9bf8d10e5.93690238.jpg', 2147483647),
(161, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92b9bf8d10e5.93690238.jpg', 2147483647),
(162, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92b9bf8d10e5.93690238.jpg', 2147483647),
(163, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92b9bf8d10e5.93690238.jpg', 2147483647),
(164, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92b9bf8d10e5.93690238.jpg', 2147483647),
(165, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92b9bf8d10e5.93690238.jpg', 2147483647),
(166, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92b9bf8d10e5.93690238.jpg', 2147483647),
(167, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92b9bf8d10e5.93690238.jpg', 2147483647),
(168, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92b9bf8d10e5.93690238.jpg', 2147483647),
(169, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92b9bf8d10e5.93690238.jpg', 2147483647),
(170, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92b9bf8d10e5.93690238.jpg', 2147483647),
(171, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92b9bf8d10e5.93690238.jpg', 2147483647),
(172, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92bbaad27516.10782183.jpg', 2147483647),
(173, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92bbaad27516.10782183.jpg', 2147483647),
(174, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92bbaad27516.10782183.jpg', 2147483647),
(175, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92bbaad27516.10782183.jpg', 2147483647),
(176, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92bbaad27516.10782183.jpg', 2147483647),
(177, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92bbaad27516.10782183.jpg', 2147483647),
(178, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92bbaad27516.10782183.jpg', 2147483647),
(179, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92bbaad27516.10782183.jpg', 2147483647),
(180, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92bbaad27516.10782183.jpg', 2147483647),
(181, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92c53eed8643.91691289.jpg', 2147483647),
(182, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92ca421813b0.18049461.jpg', 2147483647),
(183, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92ca4c002c23.47727157.jpg', 2147483647),
(184, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92ca53c8cfb7.30382363.jpg', 2147483647),
(185, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92ca5b89e369.77210785.jpg', 2147483647),
(186, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92ca67bb02a8.57916250.jpg', 2147483647),
(187, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92ca7124ee80.88848271.jpg', 2147483647),
(188, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e92ca79a9aa78.10014358.jpg', 2147483647),
(189, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e9447fe33bef8.11686147.jpg', 2147483647),
(190, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e9859415a6159.74583089.jpg', 2147483647),
(191, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e985ab620a9b1.66239890.jpg', 2147483647),
(192, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e985ab620a9b1.66239890.jpg', 2147483647),
(193, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e985ab620a9b1.66239890.jpg', 2147483647),
(194, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5e9a8b85e8a366.75449074.jpg', 2147483647),
(195, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5edb9c69ab3302.89537981.jpg', 2147483647),
(196, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5edc90a3e344d0.09278473.jpg', 2147483647),
(197, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5edc9129287cc0.10127141.jpg', 2147483647),
(198, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5edc912ec3e7f0.60769467.jpg', 2147483647),
(199, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5edca11dc0e654.35956823.jpg', 2147483647),
(200, 6, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5edca146e2af15.53172935.jpg', 2147483647),
(201, 6, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5edca14dc01b19.99870996.jpg', 2147483647),
(202, 6, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5edca159f40d05.84883923.jpg', 2147483647),
(203, 6, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5edca161654a35.88705775.jpg', 2147483647),
(204, 6, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5edca167d1c536.91768275.jpg', 2147483647),
(205, 6, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5edca17111f496.53440528.jpg', 2147483647),
(206, 6, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5edca17aee3633.56648602.jpg', 2147483647),
(207, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5edca244e22a88.56956923.jpg', 2147483647),
(208, 1, '12+50+12.8616+N', '80+9+23.8247+E', 'uploads/5edca24b39f6e7.59972676.jpg', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_phone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_email`, `u_password`, `u_name`, `u_phone`) VALUES
(1, 'hello@there.com', 'hello', 'Kenobi', 1234567890),
(6, 'bilbo@baggins.com', 'bilbo', 'bilbo', 2147483647),
(7, 'joseph@joestar.com', 'jeseph', 'joseph', 2147483647),
(8, 'darth@sidious.com', 'darth', 'The Senate', 1234567890);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authority`
--
ALTER TABLE `authority`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `contractor`
--
ALTER TABLE `contractor`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `handler`
--
ALTER TABLE `handler`
  ADD PRIMARY KEY (`h_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `potholes`
--
ALTER TABLE `potholes`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `u_id` (`u_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authority`
--
ALTER TABLE `authority`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contractor`
--
ALTER TABLE `contractor`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `handler`
--
ALTER TABLE `handler`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `potholes`
--
ALTER TABLE `potholes`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `handler`
--
ALTER TABLE `handler`
  ADD CONSTRAINT `handler_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `potholes` (`p_id`),
  ADD CONSTRAINT `handler_ibfk_2` FOREIGN KEY (`c_id`) REFERENCES `contractor` (`c_id`);

--
-- Constraints for table `potholes`
--
ALTER TABLE `potholes`
  ADD CONSTRAINT `potholes_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `user` (`u_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
