-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2024 at 03:21 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `idProduk` smallint(50) NOT NULL,
  `namaProduk` varchar(500) NOT NULL,
  `fotoProduk` varchar(500) NOT NULL,
  `hargaProduk` int(100) NOT NULL,
  `stokProduk` smallint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idProduk`, `namaProduk`, `fotoProduk`, `hargaProduk`, `stokProduk`) VALUES
(1, 'naon', 'Produk_1.png', 1000000, 999);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` char(255) NOT NULL,
  `is_seller` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `is_seller`) VALUES
(15, 'd', 'd@d.d', '$2y$10$CVdsAo57.Qi4tFlpdejHV.0zrxaKNbaZIxPHWLU4niX2Av65i3una', 1),
(16, 'a', 'a@a.a', '$2y$10$QYhQ.BsU7cZwHNjzZwYPZO/Apg0hEVnE8hGszX7PuJzOS8/CFywoG', 1),
(17, 'b', 'b@b.b', '$2y$10$9JDlx0z0Sx/A0G7QwbN5G.ZqyP40eKbnWPrs2AtOapI/41AzL/9Ru', 0),
(18, 'c', 'c@c.c', '$2y$10$Ua/jwL9XlkbBzKETWkkbeOHiWa7UQ5PYqqpb0r9MqI11b3xKhY72m', 0),
(19, 'daffa pramudya', 'e@e.e', '$2y$10$cvgShEIV0BUQZK2Q/ittk.YyPVRxzTqVP41avDL/pPFRzq0HnFgEy', 1);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `idProduk` smallint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
