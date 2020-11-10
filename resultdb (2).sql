-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2019 at 11:04 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `name` varchar(50) NOT NULL,
  `exam_no` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `activate` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `date`, `name`, `exam_no`, `password`, `activate`) VALUES
(1, '2019-02-24', 'Adebayo Ralman Adeleke', '9117', 'student01', 'Active'),
(2, '2019-02-24', 'Oke Olabisi Aliat (R)', '9122', 'femyte20', 'Blocked'),
(3, '2019-02-24', 'Okoye Stephine Nmesom (R)', '9241', '', 'Blocked'),
(4, '2019-02-24', 'Idowu Oyinkansola Abigael', '9268', '', 'Active'),
(5, '2019-02-24', 'Oloniluyi Oluwadarasimi William', '9269', '', 'Blocked'),
(6, '2019-02-24', 'Ajulo Gideon Ilashe', '9270', '', 'Blocked'),
(7, '2019-02-24', 'Omogbehin Ayobami Omotoyosi', '9271', '', 'Active'),
(8, '2019-02-24', 'Akintunde Mercy Oluwapelumi', '9272', '', 'Blocked'),
(9, '2019-02-24', 'Yakub Hajrat Kofoworola', '9273', 'yaqi2019', 'Active'),
(10, '2019-02-24', 'Rasaq Faisal Oladimeji', '9274', '', 'Active'),
(11, '2019-02-24', 'Adesina Daniel Damilare', '9275', '', 'Active'),
(12, '2019-02-26', 'Ilesanmi Winifred Oluwatumininu', '9277', '', 'Blocked'),
(13, '2019-02-26', 'Awe Adebayo Oluseyi', '9278', '', 'Active'),
(14, '2019-02-26', 'Olaoya Opemipo Jesutofunmi', '9279', '', 'Blocked'),
(15, '2019-02-26', 'Odimgbe Elizabeth Chigozie', '9280', '', 'Active'),
(16, '2019-03-05', 'Oladosu Joshua Adekunle', '10012', '', 'Blocked'),
(17, '2019-03-05', 'Abubakar Audu Babagana', '10013', '', 'Active'),
(18, '2019-03-05', 'Okafor Grace Amaka', '10014', '', 'Blocked'),
(23, '2019-03-18', 'Aboke Inioluwa Esther', '9283', '', 'Active'),
(24, '2019-03-18', 'Adebiyi Abdulrahman Gbolahan', '9284', '', 'Blocked'),
(25, '2019-03-18', 'Ayanlade Al-Jamat Ayantoke', '9285', '', 'Active'),
(26, '2019-05-08', 'Fadairo Basit Adigun', '9323', '', 'Active'),
(27, '2019-06-18', 'Samson Olonade', '7890', '', 'Blocked'),
(28, '2019-06-24', 'ghtter', '45666', '', 'Blocked'),
(29, '2019-06-24', 'adenekan Kunle', '9008', '', 'Blocked'),
(30, '2019-06-25', 'Olusola', '798654', '', 'Active'),
(31, '2019-06-25', 'Adeolu', '6543', '', 'Blocked'),
(32, '2019-07-29', 'Sunny Ade', '0081', '78ytehgt665*', 'Active'),
(34, '2019-08-06', 'Adetoun Bamidele', '090725', 'hgsyg265276@', 'Active');

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
(9, 'Anyone', 'anyone@gmail.com', 'tester', 'admin_femi');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
