-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2021 at 04:33 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_category`
--

CREATE TABLE `add_category` (
  `id` int(3) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `add_category`
--

INSERT INTO `add_category` (`id`, `category_name`, `category_description`, `status`) VALUES
(7, 'Politics', 'Today politics is bad', '1'),
(8, 'Car', 'I like car driving.', '1'),
(9, 'Bike', 'Today Bike accident rapidly', '1'),
(10, 'Laptop', 'HP is awesome brand', '1'),
(11, 'Desktop', '                        Desktop is use smoothly                    ', '1'),
(12, 'Car', 'nice car                                        ', '0'),
(13, 'Bike', '                        Biker are hitting                     ', '1'),
(14, 'Education', 'Education is backbone of nation', '1'),
(15, 'Bicycles', 'bicycle riding is very nice.', '1'),
(16, 'Bicycles', 'new tradition', '0');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(3) NOT NULL,
  `category_id` int(3) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `long_description` text NOT NULL,
  `blog_image` text NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `category_id`, `blog_title`, `short_description`, `long_description`, `blog_image`, `status`) VALUES
(12, 8, 'toyota', 'asdfas', '<p>fas fsdf afad</p>', '../assets/img/car1.jpg', '1'),
(13, 9, 'Hung', 'I like bike', '<p>Today bike accident is increase</p>', '../assets/img/bike3.jpg', '1'),
(14, 10, 'Dell', '                                    new brand                                                                                                ', '<p>Dell laptop is very long lasting useable</p>', '../assets/img/photo-1498050108023-c5249f4df085.jpg', '1'),
(15, 14, 'Writing exam', 'Education is successful when it is work good sector.                              ', '<p>Education is backbone of nation. We read must our National Poet books for gathering knowlede.</p>', '../assets/img/education 2.jpg', '1'),
(16, 7, 'Visit', '  Read the legend & famous writer story.                                                                                                                                                                                                                                ', '<p>fs sfa fas sa</p>', '../assets/img/education1.jpg', '1'),
(17, 13, 'Yahma', 'Update mode 1l                                                                                                                                                                                                                                                                                                ', '<p>Yahma is&nbsp; awesome brand bike in this present time. I like very much this brand.today young people like so much for gorgious category.</p>', '../assets/img/Yamaha-YZF-R15-V3-Side.jpg', '1'),
(18, 15, 'Duronto2', 'Bicycle is very fashionable.                                ', '<p>Today young people like most bicycle</p>', '../assets/img/bycyle.jpg', '1'),
(19, 12, 'mitsubushi', '  A brand car                                ', '<p>Its very useable in govt sector. today is ts very fashion able.</p>', '../assets/img/car2.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'Super Admin', 'admin@blogs.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_category`
--
ALTER TABLE `add_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_category`
--
ALTER TABLE `add_category`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
