-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2020 at 01:24 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminpanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `subtitle` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  `links` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `title`, `subtitle`, `description`, `links`) VALUES
(2, 'About Us', 'About My Website', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'www.getbootstrap.com');

-- --------------------------------------------------------

--
-- Table structure for table `dept_category`
--

CREATE TABLE `dept_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dept_category`
--

INSERT INTO `dept_category` (`id`, `name`, `description`, `image`) VALUES
(5, 'Department of Computer Science', '1', 'prof.jpg'),
(6, 'Department of Commerce', '2', 'prof2.jpg'),
(7, 'Department of Arts', '1', 'prof.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `dept_category_list`
--

CREATE TABLE `dept_category_list` (
  `id` int(11) NOT NULL,
  `dept_cate_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(191) NOT NULL,
  `section` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dept_category_list`
--

INSERT INTO `dept_category_list` (`id`, `dept_cate_id`, `name`, `description`, `section`) VALUES
(7, 6, 'BA', 'This is a BA Course', 'A'),
(8, 6, 'Journalism', 'This is Journalism Course', 'C'),
(9, 5, 'BCA', 'BCA Desc', 'A'),
(10, 5, 'BSc', 'BSc Desc', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `description` varchar(80) NOT NULL,
  `images` varchar(50) NOT NULL,
  `visible` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `designation`, `description`, `images`, `visible`) VALUES
(6, 'Professor 1', 'M', 'Master Professor 1', 'prof.jpg', 1),
(7, 'Professor 2', 'M', 'Master Professor 2', 'prof2.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `usertype` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `username`, `email`, `password`, `usertype`) VALUES
(8, 'Profesor', 'profesor@profesor.com', '1', 'admin'),
(11, 'Prof2', 'prof2@prof2.com', '2', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dept_category`
--
ALTER TABLE `dept_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dept_category_list`
--
ALTER TABLE `dept_category_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dept_cate_id` (`dept_cate_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dept_category`
--
ALTER TABLE `dept_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `dept_category_list`
--
ALTER TABLE `dept_category_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dept_category_list`
--
ALTER TABLE `dept_category_list`
  ADD CONSTRAINT `dept_category_list_ibfk_1` FOREIGN KEY (`dept_cate_id`) REFERENCES `dept_category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
