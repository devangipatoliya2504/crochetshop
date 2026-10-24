-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 15, 2025 at 08:01 AM
-- Server version: 5.6.20-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crochetshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`admin_id` int(10) NOT NULL,
  `admin_username` varchar(20) NOT NULL,
  `admin_password` varchar(10) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_username`, `admin_password`) VALUES
(1, 'devu', '2504'),
(2, 'vishu', '0509');

-- --------------------------------------------------------

--
-- Table structure for table `cart_item`
--

CREATE TABLE IF NOT EXISTS `cart_item` (
`cart_id` int(55) NOT NULL,
  `id` int(55) NOT NULL,
  `p_id` int(55) NOT NULL,
  `c_quantity` int(55) NOT NULL,
  `p_detail` text NOT NULL,
  `total` int(50) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=363 ;

--
-- Dumping data for table `cart_item`
--

INSERT INTO `cart_item` (`cart_id`, `id`, `p_id`, `c_quantity`, `p_detail`, `total`) VALUES
(362, 17, 97, 3, 'rainbow', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`c_id` int(10) NOT NULL,
  `c_name` varchar(20) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `c_name`) VALUES
(46, 'purse'),
(45, 'toy'),
(42, 'cap'),
(41, 'blenket');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
`f_id` int(10) NOT NULL,
  `r_id` int(10) NOT NULL,
  `r_username` varchar(20) NOT NULL,
  `f_comment` varchar(20) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `r_id`, `r_username`, `f_comment`) VALUES
(19, 22, 'tt', 'rtrttrrt'),
(18, 22, 'tt', 'fgrtretrt'),
(13, 17, 'devu', '	very nice..	');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
`order_details_id` int(55) NOT NULL,
  `order_id` int(55) NOT NULL,
  `p_id` int(55) NOT NULL,
  `quantity` int(55) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=107 ;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_details_id`, `order_id`, `p_id`, `quantity`) VALUES
(34, 14, 65, 6),
(33, 14, 61, 1),
(32, 14, 62, 1),
(35, 15, 66, 3),
(36, 16, 61, 3),
(37, 17, 62, 1),
(38, 18, 66, 1),
(39, 19, 61, 1),
(40, 20, 66, 1),
(41, 21, 66, 3),
(42, 22, 61, 1),
(43, 23, 61, 1),
(44, 10, 61, 1),
(45, 11, 66, 1),
(46, 12, 61, 1),
(47, 13, 61, 1),
(48, 14, 63, 3),
(49, 14, 67, 2),
(50, 14, 61, 1),
(51, 15, 67, 1),
(52, 5, 61, 3),
(53, 5, 66, 1),
(54, 5, 67, 1),
(55, 5, 62, 1),
(56, 6, 63, 2),
(57, 7, 61, 1),
(58, 8, 67, 1),
(59, 8, 62, 1),
(60, 8, 65, 2),
(61, 9, 63, 25),
(62, 10, 61, 1),
(63, 10, 61, 1),
(64, 11, 67, 3),
(65, 12, 65, 1),
(66, 13, 62, 1),
(67, 14, 61, 1),
(68, 15, 67, 1),
(69, 16, 61, 1),
(70, 17, 67, 1),
(71, 18, 61, 1),
(72, 19, 74, 3),
(73, 20, 83, 1),
(74, 20, 82, 1),
(75, 20, 69, 1),
(76, 21, 75, 2),
(77, 22, 73, 1),
(78, 23, 75, 1),
(79, 23, 82, 1),
(80, 23, 70, 1),
(81, 23, 82, 1),
(82, 23, 68, 2),
(83, 23, 68, 1),
(84, 23, 69, 1),
(85, 23, 73, 1),
(86, 23, 82, 1),
(87, 23, 73, 3),
(88, 23, 88, 1),
(89, 23, 86, 1),
(90, 23, 82, 1),
(91, 23, 86, 1),
(92, 23, 70, 1),
(93, 23, 82, 1),
(94, 23, 82, 1),
(95, 0, 82, 1),
(96, 0, 82, 1),
(97, 0, 86, 1),
(98, 0, 82, 1),
(99, 0, 82, 1),
(100, 0, 89, 3),
(101, 0, 93, 1),
(102, 0, 92, 1),
(103, 24, 92, 1),
(104, 25, 90, 10),
(105, 26, 98, 1),
(106, 27, 98, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_master`
--

CREATE TABLE IF NOT EXISTS `order_master` (
`order_id` int(10) NOT NULL,
  `id` int(10) NOT NULL,
  `fnm` varchar(30) NOT NULL,
  `p_detail` text NOT NULL,
  `total` int(55) NOT NULL,
  `shipping_email` varchar(55) NOT NULL,
  `shipping_address` varchar(55) NOT NULL,
  `shipping_city` varchar(55) NOT NULL,
  `shipping_contact` int(55) NOT NULL,
  `order_date` date NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `order_master`
--

INSERT INTO `order_master` (`order_id`, `id`, `fnm`, `p_detail`, `total`, `shipping_email`, `shipping_address`, `shipping_city`, `shipping_contact`, `order_date`, `status`) VALUES
(27, 17, 'frg drefygh', 'uyuyuyu', 3400, 'fhd@gmail.com', 'dfsrh', 'rdeh', 1111111111, '2025-09-15', 1),
(26, 17, 'frg drefygh', 'uyuyuyu', 3400, 'fhd@gmail.com', 'dfsrh', 'rdeh', 1111111111, '2025-09-15', 0),
(25, 22, 'tt', 'green', 5000, 'tt@gmail.com', 'tt', 'tt', 1111111111, '2025-09-15', 0),
(24, 17, 'frg drefygh', 'white', 500, 'fhd@gmail.com', 'dfsrh', 'rdeh', 1234567896, '2025-09-15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`p_id` int(10) NOT NULL,
  `c_id` int(10) NOT NULL,
  `p_name` varchar(20) NOT NULL,
  `p_image` varchar(50) NOT NULL,
  `p_price` int(20) NOT NULL,
  `p_quantity` int(20) NOT NULL,
  `p_description` varchar(50) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=99 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `c_id`, `p_name`, `p_image`, `p_price`, `p_quantity`, `p_description`) VALUES
(94, 42, 'baby cap', '17.jfif', 500, 16, 'yellow'),
(95, 42, 'girl cap', '16.jfif', 600, 60, 'pink'),
(97, 41, 'big blenket', '4.jpg', 1000, 1, 'rainbow'),
(92, 45, 'rabbit', '19.jfif', 500, 12, 'white'),
(93, 45, 'doramon', '14.jfif', 850, 28, 'sky'),
(91, 46, 'big purse', '38.jfif', 900, 15, 'brown');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
`r_id` int(10) NOT NULL,
  `r_firstname` varchar(50) NOT NULL,
  `r_lastname` varchar(50) NOT NULL,
  `r_address` varchar(100) NOT NULL,
  `r_city` varchar(50) NOT NULL,
  `r_email` varchar(30) NOT NULL,
  `r_contect` varchar(15) NOT NULL,
  `r_username` varchar(20) NOT NULL,
  `r_password` varchar(20) NOT NULL,
  `r_securityque` varchar(50) NOT NULL,
  `r_answer` varchar(20) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`r_id`, `r_firstname`, `r_lastname`, `r_address`, `r_city`, `r_email`, `r_contect`, `r_username`, `r_password`, `r_securityque`, `r_answer`) VALUES
(19, 'nyasa', 'rupavatiya', 'junagadh', 'junagadh', 'nyasa@gmail.com', '9696969696', 'nyasa', 'nnnn', 'which is your favourite color?', 'white'),
(17, 'devangi', 'patoliya', 'surat', 'surat', 'devu@gmail.com', '5668865445', 'devu', 'ss', 'which is your favourite color?', 'black'),
(20, 'vishva', 'tilala', 'puna', 'puna', 'vishu@gmail.com', '5252525252', 'vishu', 'vvvv', 'which is your favourite color?', 'red'),
(18, 'nensi', 'vaishnav', 'jetpur', 'rajkot', 'nensi@gmail.com', '3546984765', 'nensi', '2504', 'which is your favourite color?', 'blue'),
(30, 'tanvi', 'patel', 'efrererer', 'tt', 'tt@gmail.com', '1111111111', 'tt', 'tt', 'what is your favourite city?', 'tt');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `cart_item`
--
ALTER TABLE `cart_item`
 ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
 ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
 ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `order_master`
--
ALTER TABLE `order_master`
 ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
 ADD PRIMARY KEY (`r_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cart_item`
--
ALTER TABLE `cart_item`
MODIFY `cart_id` int(55) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=363;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
MODIFY `f_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
MODIFY `order_details_id` int(55) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=107;
--
-- AUTO_INCREMENT for table `order_master`
--
ALTER TABLE `order_master`
MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=99;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
MODIFY `r_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
