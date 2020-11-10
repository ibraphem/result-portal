-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2019 at 04:52 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resultdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `admission_no` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `session` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `term` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `classes` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `arm` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `file_name`, `uploaded_on`, `status`, `admission_no`, `session`, `term`, `classes`, `arm`) VALUES
(1, '9117.pdf', '2019-02-25 10:32:13', '1', '9117', ' 2018/2019', 'First Term', 'JSS1', 'A'),
(2, '9122.pdf', '2019-02-25 10:32:13', '1', '9122', ' 2018/2019', 'First Term', 'JSS1', 'A'),
(3, '9241.pdf', '2019-02-25 10:32:13', '1', '9241', ' 2018/2019', 'First Term', 'JSS1', 'A'),
(4, '9268.pdf', '2019-02-25 10:32:13', '1', '9268', ' 2018/2019', 'First Term', 'JSS1', 'A'),
(5, '9269.pdf', '2019-02-25 10:32:13', '1', '9269', ' 2018/2019', 'First Term', 'JSS1', 'A'),
(6, '9270.pdf', '2019-02-25 10:32:13', '1', '9270', ' 2018/2019', 'First Term', 'JSS1', 'A'),
(7, '9271.pdf', '2019-02-25 10:32:13', '1', '9271', ' 2018/2019', 'First Term', 'JSS1', 'A'),
(8, '9272.pdf', '2019-02-25 10:32:13', '1', '9272', ' 2018/2019', 'First Term', 'JSS1', 'A'),
(9, '9273.pdf', '2019-02-25 10:32:13', '1', '9273', ' 2018/2019', 'First Term', 'JSS1', 'A'),
(10, '9274.pdf', '2019-02-25 10:32:13', '1', '9274', ' 2018/2019', 'First Term', 'JSS1', 'A'),
(11, '9275.pdf', '2019-02-25 10:32:13', '1', '9275', ' 2018/2019', 'First Term', 'JSS1', 'A'),
(12, '9277.pdf', '2019-02-25 10:32:13', '1', '9277', ' 2018/2019', 'First Term', 'JSS1', 'A'),
(13, '9278.pdf', '2019-02-25 10:32:13', '1', '9278', ' 2018/2019', 'First Term', 'JSS1', 'A'),
(14, '9279.pdf', '2019-02-25 10:32:13', '1', '9279', ' 2018/2019', 'First Term', 'JSS1', 'A'),
(15, '9280.pdf', '2019-02-25 10:32:13', '1', '9280', ' 2018/2019', 'First Term', 'JSS1', 'A'),
(16, '9282.pdf', '2019-02-25 10:32:13', '1', '9282', ' 2018/2019', 'First Term', 'JSS1', 'A'),
(17, '9283.pdf', '2019-02-25 10:32:13', '1', '9283', ' 2018/2019', 'First Term', 'JSS1', 'A'),
(18, '9284.pdf', '2019-02-25 10:32:13', '1', '9284', ' 2018/2019', 'First Term', 'JSS1', 'A'),
(19, '9285.pdf', '2019-02-25 10:32:13', '1', '9285', ' 2018/2019', 'First Term', 'JSS1', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(50) NOT NULL,
  `exam_no` varchar(15) NOT NULL,
  `activate` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `date`, `name`, `exam_no`, `activate`) VALUES
(1, '2019-02-24', 'Adebayo Ralman Adeleke', '9117', 'Blocked'),
(2, '2019-02-24', 'Oke Olabisi Aliat (R)', '9122', 'Active'),
(3, '2019-02-24', 'Okoye Stephine Nmesom (R)', '9241', 'Blocked'),
(4, '2019-02-24', 'Idowu Oyinkansola Abigael', '9268', 'Active'),
(5, '2019-02-24', 'Oloniluyi Oluwadarasimi William', '9269', 'Blocked'),
(6, '2019-02-24', 'Ajulo Gideon Ilashe', '9270', 'Blocked'),
(7, '2019-02-24', 'Omogbehin Ayobami Omotoyosi', '9271', 'Blocked'),
(8, '2019-02-24', 'Akintunde Mercy Oluwapelumi', '9272', 'Active'),
(9, '2019-02-24', 'Yakub Hajrat Kofoworola', '9273', 'Blocked'),
(10, '2019-02-24', 'Rasaq Faisal Oladimeji', '9274', 'Active'),
(11, '2019-02-24', 'Adesina Daniel Damilare', '9275', 'Blocked');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`) VALUES
(1, 'Olayioye Ibrahim O.', 'ibraphem@gmail.com', 'ibraphem', 'femyte20'),
(2, 'Abolupe Olawunmi', 'aunt@gmail.com', 'olawunmi', 'kushimo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
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
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
