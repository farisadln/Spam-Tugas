-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 09, 2018 at 06:03 PM
-- Server version: 10.2.15-MariaDB
-- PHP Version: 7.1.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(10) NOT NULL,
  `nama_barang` varchar(99) NOT NULL,
  `harga` double NOT NULL,
  `stok` int(99) NOT NULL,
  `foto` varchar(225) NOT NULL,
  `kategori` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`, `stok`, `foto`, `kategori`) VALUES
(1, 'Headset', 999, 90, '', 'Aksesoris'),
(2, 'Laptop', 290, 10, '', 'Laptop'),
(3, 'Laptop Bagus', 999, 10, '', 'Laptop'),
(4, 'Laptop Game', 10, 5, '', 'Laptop'),
(5, 'Hape ', 99, 5, '', 'Gadget'),
(6, 'Camera', 100, 5, '', 'Gadget');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_user` int(30) NOT NULL,
  `id_barang` int(30) NOT NULL,
  `total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id_cart`, `id_user`, `id_barang`, `total`) VALUES
(1, 17, 1, NULL),
(2, 17, 5, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lat_user`
--

CREATE TABLE `lat_user` (
  `id` int(11) NOT NULL,
  `uname` varchar(200) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `level` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lat_user`
--

INSERT INTO `lat_user` (`id`, `uname`, `pass`, `level`) VALUES
(5, 'faris', '1234', 'user'),
(8, 'admin', 'admin', 'user'),
(9, 'ikaru', 'ikaru', 'user'),
(10, 'khanza', 'khanza', 'user'),
(17, 'nana', '1234', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `lat_user_lvl`
--

CREATE TABLE `lat_user_lvl` (
  `id` int(11) NOT NULL,
  `lvl_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lat_user_lvl`
--

INSERT INTO `lat_user_lvl` (`id`, `lvl_name`) VALUES
(1, 'admin'),
(2, 'regular');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `lat_user`
--
ALTER TABLE `lat_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uname` (`uname`);

--
-- Indexes for table `lat_user_lvl`
--
ALTER TABLE `lat_user_lvl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lat_user`
--
ALTER TABLE `lat_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `lat_user_lvl`
--
ALTER TABLE `lat_user_lvl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `lat_user` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
