-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2018 at 12:42 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address`
--

CREATE TABLE `tbl_address` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `fax` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `some_info` text NOT NULL,
  `phone_two` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_address`
--

INSERT INTO `tbl_address` (`id`, `title`, `address`, `country`, `phone`, `fax`, `email`, `some_info`, `phone_two`) VALUES
(1, 'icons8-pyramids-filled-100.png', 'SS Hall, room no 326 ,Shabag,dhaka', 'Bangladesh', '01710665226', '(000) 000 00 00 0', 'info@gmail.com', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', '01819075764');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` int(11) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `email`, `level`, `password`) VALUES
(1, 'admin', 'admin@gmail.com', 0, 'zxcvbnm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`id`, `brand_name`) VALUES
(1, 'Samsung'),
(3, 'Windows'),
(4, 'Nokia'),
(7, 'Walton'),
(8, 'Sony'),
(9, 'Accer'),
(10, 'Dell'),
(11, 'LG'),
(12, 'Symphony'),
(13, 'Oppo'),
(15, 'Iphone'),
(16, 'Cannon');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `session_id` varchar(100) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `total_price` int(100) NOT NULL,
  `img` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `session_id`, `product_id`, `product_name`, `price`, `quantity`, `total_price`, `img`, `date`) VALUES
(154, 'lqqq8ve5u5q6aq67uv6av3tv66', '11', 'Iphone 8', '5390.000', '2', 10780, 'uploads/products/a894686bd7.png', '2018-08-15 18:48:26'),
(155, 'lqqq8ve5u5q6aq67uv6av3tv66', '14', 'Samsung h5', '1999.000', '1', 1999, 'uploads/products/6f38c0cb83.png', '2018-08-15 18:55:12'),
(156, '6kq6956kj6tkb7kes337u0rnmq', '21', 'HRLD pt2', '1000.000', '1', 1000, 'uploads/products/44e227143f.jpg', '2018-08-15 18:59:17'),
(159, '7fhk7ocnsjvbt8n0mc1e8fk8p6', '21', 'HRLD pt2', '1000.000', '1', 1000, 'uploads/products/44e227143f.jpg', '2018-08-15 20:28:57'),
(160, '4q8t0flnirman5478ea3vj6l4n', '14', 'Samsung h5', '1999.000', '1', 1999, 'uploads/products/6f38c0cb83.png', '2018-08-17 11:09:01'),
(165, '8pjdcggh7vbglguutpnm3kt903', '21', 'HRLD pt2', '1000.000', '2', 2000, 'uploads/products/44e227143f.jpg', '2018-08-24 16:29:50'),
(166, 'ca2u5c7b232goo0tic2ago0jiv', '11', 'Iphone 8', '5390.000', '2', 10780, 'uploads/products/a894686bd7.png', '2018-08-27 13:58:37');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cat`
--

CREATE TABLE `tbl_cat` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cat`
--

INSERT INTO `tbl_cat` (`id`, `cat_name`) VALUES
(2, 'Charger'),
(8, 'Laptop'),
(9, 'Desktop'),
(11, 'Hardware'),
(13, 'Battery'),
(14, 'Mobile'),
(15, 'Camera'),
(16, 'Cook tools'),
(17, 'Freeze'),
(18, 'Television');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `compare_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `img` varchar(255) NOT NULL,
  `time_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_compare`
--

INSERT INTO `tbl_compare` (`compare_id`, `product_id`, `product_name`, `brand`, `session_id`, `price`, `img`, `time_date`) VALUES
(18, 11, 'Iphone 8', 'Iphone', '7fhk7ocnsjvbt8n0mc1e8fk8p6', 5390.00, 'uploads/products/a894686bd7.png', '2018-08-16 00:34:20'),
(19, 21, 'HRLD pt2', 'Cannon', '7fhk7ocnsjvbt8n0mc1e8fk8p6', 1000.00, 'uploads/products/44e227143f.jpg', '2018-08-16 00:36:46'),
(24, 17, 'DSLR 91g4', 'Cannon', 'lqqq8ve5u5q6aq67uv6av3tv66', 1976.00, 'uploads/products/21237b9f06.jpg', '2018-08-16 00:55:26'),
(25, 21, 'HRLD pt2', 'Cannon', '8pjdcggh7vbglguutpnm3kt903', 1000.00, 'uploads/products/44e227143f.jpg', '2018-08-24 22:29:20'),
(26, 13, 'Accer aspire 5734z', 'Accer', '8pjdcggh7vbglguutpnm3kt903', 2950.00, 'uploads/products/94efe81561.jpg', '2018-08-24 22:29:29'),
(27, 20, 'Video DSLR H6', 'Cannon', 'ca2u5c7b232goo0tic2ago0jiv', 9999.00, 'uploads/products/d746d7254e.jpg', '2018-08-27 20:11:42');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`contact_id`, `name`, `email`, `msg`) VALUES
(1, 'Abdullah', 'abdullah@gmail.com', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `zip` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `zip`, `city`, `country`, `phone`, `email`, `password`) VALUES
(1, 'Osman', 'SS Hall', '1000', 'dhaka', 'AF', '01710665226', 'asdfg@gmail.com', 'zxcvbnmn'),
(2, 'Khalid', 'SS Hall', '1000', 'Comilla', 'AU', '01510665346', 'kkkkkk@gmail.com', 'zzxcvbnmmnbvcx'),
(3, 'Khalid', 'Shahbag, Dhaka,1000', '1000', 'Dhaka', 'AL', '01819075764', 'khalid@gmail.com', 'zxcvbnm'),
(4, 'Abdullah Al amin', 'SS Hall', '1000', 'Comilla', 'Argentina', '017106652932', 'abdullah@gmail.com', 'zz'),
(5, 'Nahid Hasan', 'SS Hall, room no 326 ,Shabag,dhaka', '1000', 'Dhaka', 'Bangladesh', '01710665291', 'nahid@gmail.com', 'zxcvbnm'),
(6, 'Mamun', 'SS Hall', '1999', 'Dhaka', 'Bahrain', '01710665223', 'mamun@gmail.com', 'zxcvbnm'),
(7, 'Shamim', 'Comilla', '1111', 'Dhaka', 'Aruba', '01710665445', 'shamim@gmail.com', 'zzzz2222222222222'),
(9, 'Osman', 'SS Hall', '1200', 'Comilla', 'Australia', '01710665777', 'oo@gmail.com', 'zzzzzzzz'),
(10, 'Osman', 'SS Hall', '1200', 'Comilla', 'Armenia', '01510665324', 'dabdullah@gmail.com', 'gg3333333333333333');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `price` float(10,2) NOT NULL,
  `img` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL,
  `status` int(11) NOT NULL,
  `time_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `product_id`, `product_name`, `customer_id`, `price`, `img`, `quantity`, `status`, `time_date`) VALUES
(54, '14', 'Samsung h5', '4', 2098.95, 'uploads/products/6f38c0cb83.png', 1, 0, '2018-08-16 02:24:40'),
(55, '14', 'Samsung h5', '4', 2098.95, 'uploads/products/6f38c0cb83.png', 1, 0, '2018-08-16 02:52:17'),
(57, '14', 'Samsung h5', '4', 4197.90, 'uploads/products/6f38c0cb83.png', 2, 0, '2018-08-20 23:51:23'),
(58, '21', 'HRLD pt2', '4', 1050.00, 'uploads/products/44e227143f.jpg', 1, 0, '2018-08-20 23:51:23'),
(59, '20', 'Video DSLR H6', '4', 20997.90, 'uploads/products/d746d7254e.jpg', 2, 0, '2018-08-21 19:48:03'),
(60, '21', 'HRLD pt2', '4', 1050.00, 'uploads/products/44e227143f.jpg', 1, 0, '2018-08-23 20:57:33'),
(61, '20', 'Video DSLR H6', '4', 10498.95, 'uploads/products/d746d7254e.jpg', 1, 0, '2018-08-23 20:57:33'),
(62, '13', 'Accer aspire 5734z', '4', 6195.00, 'uploads/products/94efe81561.jpg', 2, 0, '2018-08-24 22:28:35'),
(63, '14', 'Samsung h5', '4', 2098.95, 'uploads/products/6f38c0cb83.png', 1, 0, '2018-08-24 22:28:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `details` text NOT NULL,
  `price` float(10,3) NOT NULL,
  `img` varchar(250) NOT NULL,
  `product_type` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `product_name`, `cat_id`, `brand_id`, `details`, `price`, `img`, `product_type`, `date`) VALUES
(1, 'DSLR', 15, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 1000.000, 'uploads/products/599f2a41b7.jpg', '1', '2018-08-06 15:32:31'),
(6, 'DSLR', 15, 11, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 500.000, 'uploads/products/fb39c8afae.png', '1', '2018-08-08 10:20:53'),
(7, 'Blander nh2', 16, 8, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 9000.000, 'uploads/products/9e58b5c606.png', '1', '2018-08-06 17:58:42'),
(8, 'Lorem ipsum doller sit ammet Lorem ipsum doller sit ammet', 18, 8, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 1000.000, 'uploads/products/21f155161c.jpg', '1', '2018-08-06 19:35:09'),
(9, 'LG CC tv camera', 15, 11, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 4000.000, 'uploads/products/03ee2d7256.jpg', '2', '2018-08-06 18:22:01'),
(10, 'Asian Fan', 11, 8, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 100.000, 'uploads/products/f3087fa844.jpg', '2', '2018-08-06 18:22:52'),
(11, 'Iphone 8', 14, 15, '<p><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</span><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</span><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</span><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</span><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</span><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</span><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</span><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</span><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</span><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</span><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</span><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</span><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</span><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</span><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</span><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</span><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</span><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</span><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</span><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</span><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</span><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</span></p>', 5390.000, 'uploads/products/a894686bd7.png', '1', '2018-08-08 17:12:08'),
(13, 'Accer aspire 5734z', 8, 9, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>', 2950.000, 'uploads/products/94efe81561.jpg', '1', '2018-08-08 17:13:23'),
(14, 'Samsung h5', 17, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>', 1999.000, 'uploads/products/6f38c0cb83.png', '1', '2018-08-08 17:12:46'),
(15, 'CC tv', 11, 10, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>', 1000.000, 'uploads/products/add5670a17.png', '2', '2018-08-13 21:08:39'),
(18, 'Lady DSLR H3', 15, 11, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>', 1000.000, 'uploads/products/4efd2d7bfe.jpg', '2', '2018-08-08 18:29:17'),
(19, 'DSLR H1', 15, 10, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>', 200.000, 'uploads/products/6b52d3b338.jpg', '2', '2018-08-08 18:29:54'),
(20, 'Video DSLR H6', 15, 16, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>', 9999.000, 'uploads/products/d746d7254e.jpg', '1', '2018-08-08 18:30:34'),
(21, 'HRLD pt2', 15, 16, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>', 1000.000, 'uploads/products/44e227143f.jpg', '2', '2018-08-08 18:31:11'),
(22, 'DSLR Zn7', 15, 11, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmodLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>', 5969.000, 'uploads/products/94ac6f1d8d.jpg', '2', '2018-08-08 18:31:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipt`
--

CREATE TABLE `tbl_shipt` (
  `shipt_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `time_date` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_shipt`
--

INSERT INTO `tbl_shipt` (`shipt_id`, `product_id`, `order_id`, `product_name`, `img`, `customer_id`, `total_price`, `time_date`, `quantity`, `status`) VALUES
(31, 19, 35, 'DSLR H1', 'uploads/products/6b52d3b338.jpg', 4, '420.00', '2018-08-15 01:00:28', 2, 1),
(32, 20, 33, 'Video DSLR H6', 'uploads/products/d746d7254e.jpg', 4, '10498.95', '2018-08-15 01:00:28', 1, 1),
(33, 22, 34, 'DSLR Zn7', 'uploads/products/94ac6f1d8d.jpg', 4, '12534.90', '2018-08-15 01:00:28', 2, 1),
(34, 19, 38, 'DSLR H1', 'uploads/products/6b52d3b338.jpg', 5, '210.00', '2018-08-15 01:20:21', 1, 1),
(35, 9, 37, 'LG CC tv camera', 'uploads/products/03ee2d7256.jpg', 5, '4200.00', '2018-08-15 01:20:21', 1, 1),
(36, 20, 36, 'Video DSLR H6', 'uploads/products/d746d7254e.jpg', 5, '10498.95', '2018-08-15 01:20:21', 1, 1),
(37, 20, 39, 'Video DSLR H6', 'uploads/products/d746d7254e.jpg', 4, '10498.95', '2018-08-15 12:18:27', 1, 1),
(38, 14, 40, 'Samsung h5', 'uploads/products/6f38c0cb83.png', 4, '2098.95', '2018-08-15 12:21:28', 1, 1),
(39, 11, 41, 'Iphone 8', 'uploads/products/a894686bd7.png', 4, '5659.50', '2018-08-15 12:50:07', 1, 1),
(40, 22, 44, 'DSLR Zn7', 'uploads/products/94ac6f1d8d.jpg', 4, '6267.45', '2018-08-15 13:59:05', 1, 1),
(41, 11, 43, 'Iphone 8', 'uploads/products/a894686bd7.png', 4, '5659.50', '2018-08-15 13:59:05', 1, 1),
(42, 13, 46, 'Accer aspire 5734z', 'uploads/products/94efe81561.jpg', 4, '3097.50', '2018-08-15 14:01:42', 1, 1),
(43, 21, 45, 'HRLD pt2', 'uploads/products/44e227143f.jpg', 4, '1050.00', '2018-08-15 14:01:41', 1, 1),
(44, 21, 52, 'HRLD pt2', 'uploads/products/44e227143f.jpg', 4, '1050.00', '2018-08-16 01:50:03', 1, 1),
(45, 14, 53, 'Samsung h5', 'uploads/products/6f38c0cb83.png', 4, '2098.95', '2018-08-16 01:52:23', 1, 1),
(46, 11, 51, 'Iphone 8', 'uploads/products/a894686bd7.png', 4, '5659.50', '2018-08-16 00:46:30', 1, 1),
(47, 21, 50, 'HRLD pt2', 'uploads/products/44e227143f.jpg', 4, '1050.00', '2018-08-16 00:46:30', 1, 1),
(48, 14, 49, 'Samsung h5', 'uploads/products/6f38c0cb83.png', 4, '2098.95', '2018-08-16 00:46:29', 1, 1),
(49, 15, 48, 'CC tv', 'uploads/products/add5670a17.png', 4, '1050.00', '2018-08-15 15:34:31', 1, 1),
(50, 13, 47, 'Accer aspire 5734z', 'uploads/products/94efe81561.jpg', 4, '3097.50', '2018-08-15 15:34:31', 1, 1),
(51, 20, 42, 'Video DSLR H6', 'uploads/products/d746d7254e.jpg', 4, '10498.95', '2018-08-15 13:59:05', 1, 1),
(52, 11, 57, 'Iphone 8', 'uploads/products/a894686bd7.png', 4, '5659.50', '2018-08-16 02:52:17', 1, 1),
(53, 13, 56, 'Accer aspire 5734z', 'uploads/products/94efe81561.jpg', 4, '3097.50', '2018-08-16 02:52:17', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_socile`
--

CREATE TABLE `tbl_socile` (
  `id` int(11) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `googleplus` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_socile`
--

INSERT INTO `tbl_socile` (`id`, `fb`, `twitter`, `googleplus`, `linkedin`) VALUES
(1, 'https://www.facebook.com/profile.php?id=100023748043014', 'https://twitter.com/MAALAMIN18', 'https://plus.google.com/106938172843419658734', 'https://www.linkedin.com/in/abdullah-al-amin-611957169/');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wish`
--

CREATE TABLE `tbl_wish` (
  `wish_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wish`
--

INSERT INTO `tbl_wish` (`wish_id`, `product_id`, `product_name`, `brand`, `customer_id`, `price`, `img`) VALUES
(16, 17, 'DSLR 91g4', 'Cannon', 0, 1976.00, 'uploads/products/21237b9f06.jpg'),
(17, 13, 'Accer aspire 5734z', 'Accer', 4, 2950.00, 'uploads/products/94efe81561.jpg'),
(18, 20, 'Video DSLR H6', 'Cannon', 4, 9999.00, 'uploads/products/d746d7254e.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_address`
--
ALTER TABLE `tbl_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_cat`
--
ALTER TABLE `tbl_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`compare_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_shipt`
--
ALTER TABLE `tbl_shipt`
  ADD PRIMARY KEY (`shipt_id`);

--
-- Indexes for table `tbl_socile`
--
ALTER TABLE `tbl_socile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_wish`
--
ALTER TABLE `tbl_wish`
  ADD PRIMARY KEY (`wish_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_address`
--
ALTER TABLE `tbl_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;

--
-- AUTO_INCREMENT for table `tbl_cat`
--
ALTER TABLE `tbl_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `compare_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_shipt`
--
ALTER TABLE `tbl_shipt`
  MODIFY `shipt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `tbl_socile`
--
ALTER TABLE `tbl_socile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_wish`
--
ALTER TABLE `tbl_wish`
  MODIFY `wish_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
