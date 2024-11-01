-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2024 at 03:56 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dalelshop`
--
CREATE DATABASE IF NOT EXISTS `dalelshop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dalelshop`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` smallint(50) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `created_at`) VALUES
(1, 16, 1, 1, '2024-10-31 18:01:02'),
(2, 16, 3, 1, '2024-10-31 18:02:17'),
(3, 16, 5, 1, '2024-10-31 18:04:06');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `idProduk` smallint(50) NOT NULL,
  `namaProduk` varchar(500) NOT NULL,
  `fotoProduk` varchar(500) NOT NULL,
  `hargaProduk` int(100) NOT NULL,
  `stokProduk` smallint(100) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idProduk`, `namaProduk`, `fotoProduk`, `hargaProduk`, `stokProduk`, `id`) VALUES
(1, 'naon', 'Produk_1.jpg', 1000000, 999, 16),
(2, 'a', 'Produk_2.PNG', 0, 0, 16),
(3, 'abc', 'Produk_3.png', 10000, 99, 16),
(4, 'hjk', 'Produk_4.png', 2304, 78, 16),
(5, 'wee', 'Produk_5.jpg', 876554, 100, 16);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` char(255) NOT NULL,
  `is_seller` tinyint(1) NOT NULL,
  `nomor` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `gender` enum('Laki-laki','Perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `is_seller`, `nomor`, `alamat`, `gender`) VALUES
(15, 'd', 'd@d.d', '$2y$10$CVdsAo57.Qi4tFlpdejHV.0zrxaKNbaZIxPHWLU4niX2Av65i3una', 1, '0812919', 'Jl. acumalaka', 'Laki-laki'),
(16, 'aa', 'a@a.a', '$2y$10$QYhQ.BsU7cZwHNjzZwYPZO/Apg0hEVnE8hGszX7PuJzOS8/CFywoG', 1, '', '', 'Laki-laki'),
(17, 'b', 'b@b.b', '$2y$10$9JDlx0z0Sx/A0G7QwbN5G.ZqyP40eKbnWPrs2AtOapI/41AzL/9Ru', 0, '', '', 'Laki-laki'),
(18, 'c', 'c@c.c', '$2y$10$Ua/jwL9XlkbBzKETWkkbeOHiWa7UQ5PYqqpb0r9MqI11b3xKhY72m', 0, '', '', 'Laki-laki'),
(19, 'daffa pramudya', 'e@e.e', '$2y$10$cvgShEIV0BUQZK2Q/ittk.YyPVRxzTqVP41avDL/pPFRzq0HnFgEy', 1, '', '', 'Laki-laki');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idProduk`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `idProduk` smallint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `produk` (`idProduk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
