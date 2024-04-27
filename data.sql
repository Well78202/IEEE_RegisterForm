-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2024 at 07:29 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ieee`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `fullname` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`fullname`, `username`, `email`, `password`, `phone`, `address`, `birthdate`) VALUES
('Ahmed Walid Ahmed', 'ai4ramadan@gmail.com', 'admin@admin.com', '$2y$10$pEZnfjIEqHsYSWe5yBNE7upIirCPUcbqBSi7y6WvZGjA.GG/BahrC', '01063049026', 'asdihwaud', '2024-04-25'),
('mohamed', 'salah', 'admin1@gmail.com', '$2y$10$mPdy6338BmoBe7SdEJAx6OEeJTlfYdzi0atAw/hqyJkNVHGVnKSRm', '01063049026', 'asdihwaud', '2024-04-17'),
('mar', 'var', 'admin0@gmail.com', '$2y$10$OqqqNWZ25o.ReREJRje8A.QJtEuUL4wDmAVL8K1xFkWZJ0XhtSIT.', '01063049026', 'asdihwaud', '2024-04-22'),
('Ahmed Walid Ahmedaaaa', 'weallaaaa', 'araaaa@gmail.com', '$2y$10$gZjlHLOhHAaMA8mBVva3A.c6S8TYUnAV3aSB93CZw9PvpQ71dBtrq', '01063049026', 'asdihwaud', '2024-04-11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`username`,`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
