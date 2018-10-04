-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 14, 2018 at 05:45 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `bba`
--

CREATE TABLE `bba` (
  `id` int(11) NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_desc` tinytext NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `qty` int(5) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bba`
--

INSERT INTO `bba` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `qty`, `price`) VALUES
(0, 'bba4', 'Logo', 'This is an official website of GSWA', '1338b985-3be1-455f-8398-bb22e6cdf3d2.png', 10, '300.00'),
(1, 'BBA1', 'Formal Shirt', 'The shirt is very nice ,standard, qualified for men .The shirt is very nice ,standard, qualified for men .', 'formalshirt1.jpg', 10, '500.00'),
(2, 'BBA2', '', 'The shirt is very nice ,standard, qualified for men .The shirt is very nice ,standard, qualified for men .', 'formalshirt2.jpg', 10, '600.00');

-- --------------------------------------------------------

--
-- Table structure for table `cse`
--

CREATE TABLE `cse` (
  `id` int(11) NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_desc` tinytext NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `qty` int(5) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cse`
--

INSERT INTO `cse` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `qty`, `price`) VALUES
(1, 'CSE1', 'Mouse', 'With a clean vamp, tonal stitch details throughout, and a unique formstripe finish, the all new sports shoes fits the needs of multiple running consumers by offering an athletic and a lifestyle look.', 'mouse.jpg', 15, '300.00'),
(2, 'CSE2', 'Keyboard', 'A sleek, tonal stitched cap for runners. The plain texture and unique design will help runners to concentrate more on running and less on their hair. The combbination of casual and formal look is just brilliant.', 'keyboard.jpg', 7, '600.00'),
(3, 'CSE3', 'Headphone', 'The Sports Band collection features highly polished stainless steel and space black stainless steel cases. The display is protected by sapphire crystal. And there is a choice of three different leather bands.', 'headphone.jpg', 10, '700.00');

-- --------------------------------------------------------

--
-- Table structure for table `nfs`
--

CREATE TABLE `nfs` (
  `id` int(11) NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_desc` tinytext NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `qty` int(5) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nfs`
--

INSERT INTO `nfs` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `qty`, `price`) VALUES
(1, 'tshirt1', 'T-Shirt', 'It is very good. The cotton is very qualified. It is very good. The cotton is very qualified.It is very good. The cotton is very qualified.', 'tshirt1.jpg', 15, '200.00'),
(2, 'tshirt2', 'T-Shirt', 'It is very good. The cotton is very qualified.It is very good. The cotton is very qualified.It is very good. The cotton is very qualified.It is very good. The cotton is very qualified.', 'tshirt2.jpg', 15, '200.00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(15) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `price` int(10) NOT NULL,
  `units` int(5) NOT NULL,
  `total` int(15) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `probook`
--

CREATE TABLE `probook` (
  `id` int(11) NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_desc` tinytext NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `qty` int(5) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `probook`
--

INSERT INTO `probook` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `qty`, `price`) VALUES
(1, 'probook1', 'Beginning PHP & MySQL', 'Author name : W. Jason Glimore\r\nThird Edition', 'phpbook.jpg', 10, '1000.00'),
(2, 'probook2', 'Programming in ANSI C', 'Author: E Balagurusamy\r\nSixth Edition', 'cbook.jpg', 10, '300.00'),
(3, 'probook3', 'The Complete Reference Java', 'Author : Herbert Schildt\r\nSeventh Edition', 'javabook.jpg', 10, '500.00');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE `rate` (
  `id` int(11) NOT NULL,
  `nameOfgame` varchar(50) NOT NULL,
  `game` varchar(20) NOT NULL,
  `rating` float NOT NULL,
  `hits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`id`, `nameOfgame`, `game`, `rating`, `hits`) VALUES
(1, 'call OF duty', 'codbo', 0, 0),
(2, 'Fifa11', 'fifa11', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `robotics`
--

CREATE TABLE `robotics` (
  `id` int(11) NOT NULL,
  `product_code` varchar(60) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_desc` tinytext NOT NULL,
  `product_img_name` varchar(60) NOT NULL,
  `qty` int(5) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `robotics`
--

INSERT INTO `robotics` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `qty`, `price`) VALUES
(1, 'rob1', 'Arduino UNO', 'This is very much important for robotics.', 'arduino Uno.jpg', 10, '600.00'),
(2, 'rob2', 'PIR sensor', 'PIR - Passive Infrared Ray sensor. It detects the movement of any object.', 'pir sensor.jpg', 15, '180.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `faculty` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `interest` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `vstatus` int(11) NOT NULL DEFAULT '0',
  `token` varchar(100) NOT NULL,
  `rdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `address`, `faculty`, `email`, `interest`, `password`, `vstatus`, `token`, `rdate`, `type`) VALUES
(2, 'Admin', 'ontu', 'PSTU', '', 'admin@gmail.com', '', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, '0', '2017-12-15 02:35:45', 'admin'),
(4, 'kazi', 'zahid', 'Dumki', 'BBA', 'zahidcse@gmail.com', 'programming', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 0, '0', '2017-12-15 02:35:45', 'user'),
(52, 'Saiful', 'Islam Khan', 'Dumki', 'CSE', 'mohammadsaifulcsepstu@gmail.com', 'robotics', '123', 1, 'p5WBVPf1I1T0LgzTwCwvYIsdzCAQiWEKBLQLuGTfoN12iIWsEu', '2018-01-11 13:46:56', 'user'),
(53, 'Ontu', 'Chakrobarti', 'village : Ulania ,P.O : Ulania', 'CSE', 'acbontu@gmail.com', 'programming', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, '', '2018-01-11 13:48:57', 'user'),
(54, 'hbdhfsdhv', 'Rabbi', 'Dumki', 'CSE', 'mehedirabbi16@gmail.com', 'programming', '123', 0, 'CxpCU6vz7EPQJgBjIwyixySDbVkH6K5ihCTO9BY3Jj2nsQiDiN', '2018-01-12 14:02:47', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bba`
--
ALTER TABLE `bba`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_code` (`product_code`);

--
-- Indexes for table `cse`
--
ALTER TABLE `cse`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`product_code`);

--
-- Indexes for table `nfs`
--
ALTER TABLE `nfs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_code` (`product_code`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `probook`
--
ALTER TABLE `probook`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`product_code`);

--
-- Indexes for table `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `robotics`
--
ALTER TABLE `robotics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cse`
--
ALTER TABLE `cse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `robotics`
--
ALTER TABLE `robotics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
