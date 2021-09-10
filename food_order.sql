-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 10, 2021 at 04:18 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullName` varchar(100) COLLATE utf8_bin NOT NULL,
  `username` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(225) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullName`, `username`, `password`) VALUES
(30, 'Admin', 'Admin', '85bf5831e593431e882887e077400b7f'),
(32, 'Admin2', 'Admin2', '74f50190d9d2121951d136b1900193bf');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_bin NOT NULL,
  `image_name` varchar(225) COLLATE utf8_bin NOT NULL,
  `active` varchar(10) COLLATE utf8_bin NOT NULL,
  `featured` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `title`, `image_name`, `active`, `featured`) VALUES
(20, 'menu-burger', 'Food_Category_957.jpg', 'Yes', 'Yes'),
(21, 'menu-Pizza', 'Food_Category_554.jpg', 'Yes', 'Yes'),
(22, 'menu-momo', 'Food_Category_988.jpg', 'Yes', 'Yes'),
(23, 'koshary', 'Food_Category_126.jpeg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(150) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `price` decimal(10,0) UNSIGNED NOT NULL,
  `image_name` varchar(255) COLLATE utf8_bin NOT NULL,
  `category_id` int(11) NOT NULL,
  `featured` varchar(10) COLLATE utf8_bin NOT NULL,
  `active` varchar(10) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(8, 'pizza', 'pizaaaaaaaa', '12', 'Food_Category_181.jpg', 21, 'Yes', 'Yes'),
(9, 'momo', 'momomoo', '5', 'Food_Category_655.jpg', 22, 'Yes', 'Yes'),
(10, 'koshary', 'An Egyptian dish that originated during the mid-19th century', '10', 'Food_Category_211.jpg', 23, 'Yes', 'Yes'),
(14, 'burger', 'Burger ', '5', 'Food_Category_214.jpg', 20, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) COLLATE utf8_bin NOT NULL,
  `price` decimal(10,0) UNSIGNED NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(50) COLLATE utf8_bin NOT NULL,
  `customerName` varchar(100) COLLATE utf8_bin NOT NULL,
  `customerContact` varchar(20) COLLATE utf8_bin NOT NULL,
  `customerEmail` varchar(100) COLLATE utf8_bin NOT NULL,
  `customerAddress` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `food`, `price`, `qty`, `total`, `date`, `status`, `customerName`, `customerContact`, `customerEmail`, `customerAddress`) VALUES
(1, 'Sadeko Momo', '6', 10, '60', '2020-11-30 03:49:48', 'Cancelled', 'Bradley Farrell', '+1 (576) 504-4657', 'zuhafiq@mailinator.com', 'Duis aliqua Qui lor '),
(2, 'Best Burger', '4', 7, '28', '2020-11-30 03:52:43', 'Delivered', 'Kelly Dillard', '+1 (908) 914-3106', 'fexekihor@mailinator.com', 'Incidunt ipsum ad d'),
(3, 'Mixed Pizza', '10', 2, '20', '2020-11-30 04:07:17', 'Delivered', 'Jana Bush', '+1 (562) 101-2028', 'tydujy@mailinator.com', 'Minima iure ducimus'),
(4, 'pizza', '12', 4, '48', '2021-09-07 03:51:30', 'Delivered', 'Mustafa Anwar', '123123', 'mustafaanwar287@gmail.com', 'شارع 10-المنشيه-المحله الكبرى'),
(5, 'pizza', '12', 1, '12', '2021-09-07 03:52:57', 'Delivered', 'Mustafa Anwar', '123', 'mustafaanwar287@gmail.com', 'شارع 10-المنشيه-المحله الكبرى'),
(6, 'koshary', '10', 0, '0', '2021-09-09 12:11:51', 'Delivered', 'Mustafa Anwar', '122223', 'mustafaanwar287@gmail.com', 'شارع 10-المنشيه-المحله الكبرى'),
(7, 'koshary', '10', 1, '10', '2021-09-09 12:12:06', 'Cancelled', 'Mustafa Anwar', '123', 'mustafaanwar287@gmail.com', 'شارع 10-المنشيه-المحله الكبرى'),
(8, 'pizza', '12', 1, '12', '2021-09-09 12:13:38', 'Cancelled', 'asd', '123', 'asdasd@asd.com', 'asdasd\"><asd'),
(9, 'pizza', '12', 7, '84', '2021-09-10 02:58:30', 'Ordered', 'Mustafa Anwar', '12322', 'mustafaanwar287@gmail.com', 'شارع 10-المنشيه-المحله الكبرى');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_id` (`cat_id`,`title`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
