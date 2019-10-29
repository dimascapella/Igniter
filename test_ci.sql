-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2019 at 03:51 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `gambar`, `email`, `password`) VALUES
(10, 'asdas', '', 'asdas', 'asdasd'),
(11, 'tes data 1', '', 'tes data 1', 'tes data 1'),
(13, '2', '', '3', '4asdasdas'),
(14, '1', '', '1', 'asdasdasds'),
(15, '1231231', '', '123123', '31231231'),
(16, 'sadasd', '', 'asdasd', 'asdasdasdasdas'),
(17, 'dsadasd', '', 'dsadas', 'sdadasdas'),
(18, '123123123', '', '213123', '123123'),
(19, '12312312312312', '', '41251231', '526234324'),
(20, 'asdas', '', 'asdsa', 'sadas'),
(27, 'asda', '', 'asssssssss', 'asdasda'),
(28, 'asda', '', 'asdas', 'adasdasdaas'),
(31, 'sadasd', 'wp3955900.jpg', 'adasdas', '12312312'),
(32, 'asd', 'maxresdefault.jpg', 'sadas', 'sadasdasa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
