-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 05:52 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `silkroad`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(2, 'admin', '$2y$10$XHSVLdZIV5f5jjzbKFqXH.3MnjqTG5AbBq4ZGWyN4qrE97oEljo9m'),
(3, 'admin2', '$2y$10$1n85oqZRf1xDRxy7Vpz4dOusq9fIq.KNkUWcwhDfRcz8r1GdUUa7O');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` varchar(50) NOT NULL,
  `product_img` varchar(100) NOT NULL,
  `product_quantity` int(100) NOT NULL,
  `product_description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_price`, `product_img`, `product_quantity`, `product_description`) VALUES
(1, 'Aspirin', '13000', 'aspirin.jpg', 20, 'Aspirin is a salicylate (sa-LIS-il-ate). It works by reducing substances in the body that cause pain, fever, and inflammation.\nAspirin is used to treat pain, and reduce fever or inflammation. '),
(2, 'Adderall', '45000', 'adderall.jpg', 50, 'Adderall is used to treat attention deficit hyperactivity disorder (ADHD) and narcolepsy. Adderall contains a combination of amphetamine and dextroamphetamine.'),
(3, 'Benztropine', '39000', 'benztropine-mesylate.jpg', 45, 'Benztropine is used with other medicines to treat symptoms of Parkinson\'s disease, such as stiffness or tremors.'),
(4, 'Benzonatate', '32000', 'benzonatate.jpg', 30, 'Benzonatate is a non-narcotic cough medicine.\r\nBenzonatate works by numbing the throat and lungs, making the cough reflex less active.'),
(5, 'Cephalexin', '45000', 'cephalexin.jpg', 32, 'Cephalexin is a cephalosporin (SEF a low spor in) antibiotic. It works by fighting bacteria in your body.\nCephalexin is used to treat infections caused by bacteria, including upper respiratory infect'),
(9, 'aaaaa', '123', '636f9e97242ea2017-02-08 (1).png', 132, '123');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'user', '$2y$10$yoChafH38xZTIclBY/ic1.9e7E7kkQyzoz6jMPhWt9Ffa6Dd4AWtC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
