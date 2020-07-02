-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2020 at 12:09 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contact`
--

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `company`, `phone`, `email`, `password`, `created_on`, `updated_on`) VALUES
(2, 'Kara Denvers', 'Avangers', '63911335934', 'kara@gmail.com', '$2y$11$eUVGqDuGKDExpUO3cgfAouJl65zPT3gOPDIB8mXwofT9TwqJXsSMm', '2020-07-02 16:31:37', '2020-07-02 08:31:37'),
(4, 'Rick Ryan Medillo', 'Mudpoet Corporation', '639260019250', 'rickryan29.rr@gmail.com', '$2y$11$s4LPzsRJ9k4.Vm294A2kLuiE3Zn3LTRIQIt.DcvmjFk7FYUHl6MtG', '2020-07-02 17:18:22', '2020-07-02 09:25:18'),
(5, 'Steve Rogers', 'Steve and Company', '4568788', 'steve234@gmail.com', '$2y$11$MJquROsHCsXtnYmFS7I79u2lQ1NkCqYsRTnr0Ni8YClw9bFE5YDlq', '2020-07-02 17:20:48', '2020-07-02 09:21:16');

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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
