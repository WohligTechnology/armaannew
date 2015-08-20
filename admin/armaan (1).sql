-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2015 at 07:05 PM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `armaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `accesslevel`
--

CREATE TABLE IF NOT EXISTS `accesslevel` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accesslevel`
--

INSERT INTO `accesslevel` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'Operator'),
(3, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `armaan_feedback`
--

CREATE TABLE IF NOT EXISTS `armaan_feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `feedback` text NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address1` text,
  `address2` text,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `armaan_feedback`
--

INSERT INTO `armaan_feedback` (`id`, `name`, `email`, `feedback`, `phone`, `address1`, `address2`, `city`, `country`, `postcode`) VALUES
(1, 'demo', '1@1.com', '1', '1', '1', '1', '1', '1', '1'),
(2, 'Avinash', 'avinash@wohlig.com', 'nice website', '8989899090', 'demo address1', 'demo address2', 'mumbai', 'india', '400022'),
(15, 'gyhj', 'dsa@jdfha.djf', 'cgvhjn', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined'),
(16, 'wsdrg', 'dsa@jdfha.djf', 'se', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined'),
(17, 'mgbm', 'poojathakare55@gmail.com', 'hk,', 'lk;lbv', 'k', 'bvn', 'bnm', ',.', 'kl;'''),
(18, 'hlkkj,', 'poojathakare55@gmail.com', 'jkkj', 'undefined', 'jl', 'undefined', 'undefined', 'undefined', 'undefined'),
(19, 'ahjmhj', 'poojathakare55@gmail.com', 'jkn,nm', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined'),
(20, 'kmbhjnnmn', 'poojathakare55@gmail.com', 'jgvnb', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined', 'undefined');

-- --------------------------------------------------------

--
-- Table structure for table `armaan_media`
--

CREATE TABLE IF NOT EXISTS `armaan_media` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mediatype` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `video` varchar(255) NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `armaan_media`
--

INSERT INTO `armaan_media` (`id`, `name`, `mediatype`, `image`, `video`, `order`) VALUES
(1, 'Demao', 1, 'DMH-GARKr1U', '', 1),
(2, '', 1, 'O4yxrC3LmGA', '', 0),
(3, '', 1, 'idbp_4ORmjs', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `armaan_producttype`
--

CREATE TABLE IF NOT EXISTS `armaan_producttype` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `order` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `armaan_producttype`
--

INSERT INTO `armaan_producttype` (`id`, `name`, `order`) VALUES
(1, 'Bread', 1),
(2, 'Snacks - Vegetarian', 1),
(3, 'Snacks - Non Vegetarian', 1),
(4, 'Herbs and Spices', 1),
(5, 'Non Vegetarian', 1),
(6, 'Fish', 1),
(7, 'Pastry', 1);

-- --------------------------------------------------------

--
-- Table structure for table `armaan_project`
--

CREATE TABLE IF NOT EXISTS `armaan_project` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pieces` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `producttype` int(11) NOT NULL,
  `json` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `armaan_project`
--

INSERT INTO `armaan_project` (`id`, `name`, `pieces`, `description`, `image`, `order`, `status`, `producttype`, `json`) VALUES
(1, 'APP5 Plain Paratha', 5, 'Our irresistible Original Paratha is a soft dough based bread used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'download_(1).jpg', 1, 1, 1, ''),
(2, 'APP5 Plain Paratha2', 4, 'Any irresistible Original Paratha is a soft dough based bread used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'download_(3).jpg', 2, 1, 1, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"APP5 Plain Paratha"},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":"Our irresistible Original Paratha is a soft dough based bread used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours."}]'),
(3, 'APP5 Plain Paratha3', 3, 'irresistible Original Paratha is a soft dough based bread used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'download.jpg', 0, 1, 1, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"APP5 Plain Paratha3"},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":"3431 irresistible Original Paratha is a soft dough based bread used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours."}]'),
(4, 'APP5 Plain Paratha4', 2, 'wertyuiirresistible Original Paratha is a soft dough based bread used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'images_(1)2.jpg', 0, 1, 1, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"APP5 Plain Paratha5"},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":"qqqqwertyuiirresistible Original Paratha is a soft dough based bread used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.   "}]'),
(5, 'APP5 Plain Paratha5', 1, '32432143Our irresistible Original Paratha is a soft dough based bread used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'images.jpg', 0, 1, 1, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"APP5 Plain Paratha5"},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":"121221Our irresistible Original Paratha is a soft dough based bread used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours."}]'),
(6, 'APP5 Plain Paratha6', 0, 'qqqqq irresistible Original Paratha is a soft dough based bread used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'images1.jpg', 0, 1, 1, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"APP5 Plain Paratha5"},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":"qqqqq irresistible Original Paratha is a soft dough based bread used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.         "}]'),
(7, 'Roll', 2, 'sjdgs  Our irresistible Original Paratha is a soft dough based bread                                                          used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'download_(1)1.jpg', 0, 1, 2, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":"Roll"},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":"12321sjdgs  Our irresistible Original Paratha is a soft dough based bread                                                          used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours."}]'),
(8, 'Plain Paratha', 3, 'sjdgs  Our irresistible Original Paratha is a soft dough based bread                                                          used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.dsd', 'download_(2).jpg', 0, 1, 2, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(9, 'Plain Paratha', 4, 'adfsjdgs  Our irresistible Original Paratha is a soft dough based bread                                                          used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'download1.jpg', 0, 1, 2, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(10, 'Plain Paratha', 7, 'qwertyusjdgs  Our irresistible Original Paratha is a soft dough based bread                                                          used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'images_(1)3.jpg', 0, 1, 2, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(11, 'Plain Paratha', 2, 'qwetkjmhngbvcsjdgs  Our irresistible Original Paratha is a soft dough based bread                                                          used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'images_(2).jpg', 0, 1, 2, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(12, 'Plain Paratha', 3, '7899sjdgs  Our irresistible Original Paratha is a soft dough based bread                                                          used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'images2.jpg', 0, 1, 2, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(13, 'Plain Paratha', 6, 'xcvsjdgs  Our irresistible Original Paratha is a soft dough based bread                                                          used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'download_(3)1.jpg', 0, 1, 3, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(14, 'Plain Paratha', 7, '798sjdgs  Our irresistible Original Paratha is a soft dough based bread                                                          used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'download2.jpg', 0, 1, 3, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(15, 'Plain Paratha', 1, 'knkjjvsjdgs  Our irresistible Original Paratha is a soft dough based bread                                                          used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'images_(1)4.jpg', 0, 1, 3, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(16, 'Plain Paratha', 8, '132312sjdgs  Our irresistible Original Paratha is a soft dough based bread                                                          used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'images_(2)1.jpg', 0, 1, 3, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(17, 'Plain Paratha', 9, 'mbcsjdgs  Our irresistible Original Paratha is a soft dough based bread                                                          used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'images_(3)1.jpg', 0, 1, 3, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(18, 'Plain Paratha', 1, '31321sjdgs  Our irresistible Original Paratha is a soft dough based bread                                                          used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'images3.jpg', 0, 1, 3, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(19, 'Plain Paratha', 8, '12365798sjdgs  Our irresistible Original Paratha is a soft dough based bread                                                          used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'images_(1)5.jpg', 0, 1, 4, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(20, 'Plain Paratha', 6, 'nbhsjdgs  Our irresistible Original Paratha is a soft dough based bread                                                          used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'images_(2)2.jpg', 0, 1, 4, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(21, 'Plain Paratha', 4, 'ted6wsjdgs  Our irresistible Original Paratha is a soft dough based bread                                                          used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'images_(3)2.jpg', 0, 1, 4, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(22, 'Plain Paratha', 3, 'wrqevsjdgs  Our irresistible Original Paratha is a soft dough based bread                                                          used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'images_(4).jpg', 0, 1, 4, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(23, 'Plain Paratha', 2, 'euhfgtsjdgs  Our irresistible Original Paratha is a soft dough based bread                                                          used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'images_(5).jpg', 0, 1, 4, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(24, 'Plain Paratha', 4, 'm,bvvdbsjdgs  Our irresistible Original Paratha is a soft dough based bread                                                          used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'images4.jpg', 0, 1, 4, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(25, 'Plain Paratha', 0, 'mnvcnsjdgs  Our irresistible Original Paratha is a soft dough based bread                                                          used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'download_(1)2.jpg', 0, 1, 5, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(26, 'Plain Paratha', 1, 'mnvcnsjdgs  Our irresistible Original Paratha is a soft dough based bread    used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'download3.jpg', 0, 1, 5, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(27, 'Plain Paratha', 2, 'mnvcnsjdgs  Our irresistible Original Paratha is a soft dough based bread    used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'images_(1)6.jpg', 0, 1, 5, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(28, 'Plain Paratha', 3, 'mnvcnsjdgs  Our irresistible Original Paratha is a soft dough based bread    used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'images_(2)3.jpg', 0, 1, 5, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(29, 'Plain Paratha', 4, 'mnvcnsjdgs  Our irresistible Original Paratha is a soft dough based bread    used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'images_(3)3.jpg', 0, 1, 5, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(30, 'Plain Paratha', 5, 'mnvcnsjdgs  Our irresistible Original Paratha is a soft dough based bread    used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'images5.jpg', 0, 1, 5, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(31, 'Plain Paratha', 6, 'mnvcnsjdgs  Our irresistible Original Paratha is a soft dough based bread    used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'download_(2)1.jpg', 0, 1, 6, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(32, 'Plain Paratha', 1, 'mnvcnsjdgs  Our irresistible Original Paratha is a soft dough based bread    used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'download4.jpg', 0, 1, 6, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(33, 'Plain Paratha', 2, 'mnvcnsjdgs  Our irresistible Original Paratha is a soft dough based bread    used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'images_(1)7.jpg', 0, 1, 6, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(34, 'Plain Paratha', 3, 'mnvcnsjdgs  Our irresistible Original Paratha is a soft dough based bread    used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'images_(2)4.jpg', 0, 1, 6, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(35, 'Plain Paratha', 4, 'mnvcnsjdgs  Our irresistible Original Paratha is a soft dough based bread    used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'images_(3)4.jpg', 0, 1, 6, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(36, 'Plain Paratha', 5, 'mnvcnsjdgs  Our irresistible Original Paratha is a soft dough based bread    used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'images6.jpg', 0, 1, 6, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(37, 'Plain Paratha', 6, 'mnvcnsjdgs  Our irresistible Original Paratha is a soft dough based bread    used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'download_(1)3.jpg', 0, 1, 7, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(38, 'Plain Paratha', 7, 'mnvcnsjdgs  Our irresistible Original Paratha is a soft dough based bread    used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'download5.jpg', 0, 1, 7, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(39, 'Plain Paratha', 8, 'mnvcnsjdgs  Our irresistible Original Paratha is a soft dough based bread    used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'images_(1)8.jpg', 0, 1, 7, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(40, 'Plain Paratha', 9, 'mnvcnsjdgs  Our irresistible Original Paratha is a soft dough based bread    used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'images_(2)5.jpg', 0, 1, 7, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(41, 'Plain Paratha', 2, 'mnvcnsjdgs  Our irresistible Original Paratha is a soft dough based bread    used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'images_(3)5.jpg', 0, 1, 7, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]'),
(42, 'Plain Paratha', 1, 'mnvcnsjdgs  Our irresistible Original Paratha is a soft dough based bread    used as a compliment to South Asian dishes, this popular product tastes great as a morning snack or as an afternoon bite. Using only the best ingredients our Paratha is Trans Fat Free and contains No Artificial preservatives or flavours.', 'images7.jpg', 0, 1, 7, '[{"label":"Meta Title","type":"text","classes":"","placeholder":"","value":""},{"label":"Meta Description","type":"text","classes":"","placeholder":"","value":""}]');

-- --------------------------------------------------------

--
-- Table structure for table `logintype`
--

CREATE TABLE IF NOT EXISTS `logintype` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logintype`
--

INSERT INTO `logintype` (`id`, `name`) VALUES
(1, 'Facebook'),
(2, 'Twitter'),
(3, 'Email'),
(4, 'Google');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `linktype` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `isactive` int(11) NOT NULL,
  `order` int(11) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `description`, `keyword`, `url`, `linktype`, `parent`, `isactive`, `order`, `icon`) VALUES
(1, 'Users', '', '', 'site/viewusers', 1, 0, 1, 1, 'icon-user'),
(4, 'Dashboard', '', '', 'site/index', 1, 0, 1, 0, 'icon-dashboard'),
(6, 'Product Type', '', '', 'site/viewproducttype', 1, 0, 1, 2, 'icon-user'),
(7, 'Product', '', '', 'site/viewproject', 1, 0, 1, 3, 'icon-user'),
(8, 'Media', '', '', 'site/viewmedia', 1, 0, 1, 4, 'icon-user'),
(9, 'Feedback', '', '', 'site/viewfeedback', 1, 0, 1, 5, 'icon-user');

-- --------------------------------------------------------

--
-- Table structure for table `menuaccess`
--

CREATE TABLE IF NOT EXISTS `menuaccess` (
  `menu` int(11) NOT NULL,
  `access` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menuaccess`
--

INSERT INTO `menuaccess` (`menu`, `access`) VALUES
(1, 1),
(4, 1),
(2, 1),
(3, 1),
(5, 1),
(6, 1),
(7, 1),
(7, 3),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`) VALUES
(1, 'inactive'),
(2, 'Active'),
(3, 'Waiting'),
(4, 'Active Waiting'),
(5, 'Blocked');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `accesslevel` int(11) DEFAULT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `socialid` varchar(255) NOT NULL,
  `logintype` int(11) NOT NULL,
  `json` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `email`, `accesslevel`, `timestamp`, `status`, `image`, `username`, `socialid`, `logintype`, `json`) VALUES
(1, 'wohlig', 'a63526467438df9566c508027d9cb06b', 'wohlig@wohlig.com', 1, '0000-00-00 00:00:00', 1, NULL, '', '', 0, ''),
(4, 'pratik', '0cb2b62754dfd12b6ed0161d4b447df7', 'pratik@wohlig.com', 1, '2014-05-12 06:52:44', 1, NULL, 'pratik', '1', 1, ''),
(5, 'wohlig123', 'wohlig123', 'wohlig1@wohlig.com', 1, '2014-05-12 06:52:44', 1, NULL, '', '', 0, ''),
(6, 'wohlig1', 'a63526467438df9566c508027d9cb06b', 'wohlig2@wohlig.com', 1, '2014-05-12 06:52:44', 1, NULL, '', '', 0, ''),
(7, 'Avinash', '7b0a80efe0d324e937bbfc7716fb15d3', 'avinash@wohlig.com', 1, '2014-10-17 06:22:29', 1, NULL, '', '', 0, ''),
(9, 'avinash', 'a208e5837519309129fa466b0c68396b', 'a@email.com', 2, '2014-12-03 11:06:19', 3, '', '', '123', 1, 'demojson'),
(13, 'aaa', 'a208e5837519309129fa466b0c68396b', 'aaa3@email.com', 3, '2014-12-04 06:55:42', 3, NULL, '', '1', 2, 'userjson'),
(14, 'Avinash Ghare', '4d58a7a64a610c882f16ab99c23c1054', 'avinash6767@gmail.com', 1, '2015-04-20 10:34:11', 2, 'Nature_at_its_Best!!!.png', '', '1', 1, ''),
(15, 'avinash', 'a208e5837519309129fa466b0c68396b', 'a@w.com', 1, '2015-04-23 06:47:34', 1, 'Nature_at_its_Best!!!.png', '', '1', 1, 'demojson');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE IF NOT EXISTS `userlog` (
  `id` int(11) NOT NULL,
  `onuser` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `onuser`, `status`, `description`, `timestamp`) VALUES
(1, 1, 1, 'User Address Edited', '2014-05-12 06:50:21'),
(2, 1, 1, 'User Details Edited', '2014-05-12 06:51:43'),
(3, 1, 1, 'User Details Edited', '2014-05-12 06:51:53'),
(4, 4, 1, 'User Created', '2014-05-12 06:52:44'),
(5, 4, 1, 'User Address Edited', '2014-05-12 12:31:48'),
(6, 23, 2, 'User Created', '2014-10-07 06:46:55'),
(7, 24, 2, 'User Created', '2014-10-07 06:48:25'),
(8, 25, 2, 'User Created', '2014-10-07 06:49:04'),
(9, 26, 2, 'User Created', '2014-10-07 06:49:16'),
(10, 27, 2, 'User Created', '2014-10-07 06:52:18'),
(11, 28, 2, 'User Created', '2014-10-07 06:52:45'),
(12, 29, 2, 'User Created', '2014-10-07 06:53:10'),
(13, 30, 2, 'User Created', '2014-10-07 06:53:33'),
(14, 31, 2, 'User Created', '2014-10-07 06:55:03'),
(15, 32, 2, 'User Created', '2014-10-07 06:55:33'),
(16, 33, 2, 'User Created', '2014-10-07 06:59:32'),
(17, 34, 2, 'User Created', '2014-10-07 07:01:18'),
(18, 35, 2, 'User Created', '2014-10-07 07:01:50'),
(19, 34, 2, 'User Details Edited', '2014-10-07 07:04:34'),
(20, 18, 2, 'User Details Edited', '2014-10-07 07:05:11'),
(21, 18, 2, 'User Details Edited', '2014-10-07 07:05:45'),
(22, 18, 2, 'User Details Edited', '2014-10-07 07:06:03'),
(23, 7, 6, 'User Created', '2014-10-17 06:22:29'),
(24, 7, 6, 'User Details Edited', '2014-10-17 06:32:22'),
(25, 7, 6, 'User Details Edited', '2014-10-17 06:32:37'),
(26, 8, 6, 'User Created', '2014-11-15 12:05:52'),
(27, 9, 6, 'User Created', '2014-12-02 10:46:36'),
(28, 9, 6, 'User Details Edited', '2014-12-02 10:47:34'),
(29, 4, 6, 'User Details Edited', '2014-12-03 10:34:49'),
(30, 4, 6, 'User Details Edited', '2014-12-03 10:36:34'),
(31, 4, 6, 'User Details Edited', '2014-12-03 10:36:49'),
(32, 8, 6, 'User Details Edited', '2014-12-03 10:47:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accesslevel`
--
ALTER TABLE `accesslevel`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `armaan_feedback`
--
ALTER TABLE `armaan_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `armaan_media`
--
ALTER TABLE `armaan_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `armaan_producttype`
--
ALTER TABLE `armaan_producttype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `armaan_project`
--
ALTER TABLE `armaan_project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logintype`
--
ALTER TABLE `logintype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accesslevel`
--
ALTER TABLE `accesslevel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `armaan_feedback`
--
ALTER TABLE `armaan_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `armaan_media`
--
ALTER TABLE `armaan_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `armaan_producttype`
--
ALTER TABLE `armaan_producttype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `armaan_project`
--
ALTER TABLE `armaan_project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `logintype`
--
ALTER TABLE `logintype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
