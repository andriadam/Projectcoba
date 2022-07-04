-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2020 at 01:38 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dcutb`
--
CREATE DATABASE IF NOT EXISTS `dcutb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dcutb`;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `idBooking` int(11) NOT NULL,
  `idPelanggan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor` varchar(20) NOT NULL,
  `tanggalJam` varchar(100) NOT NULL,
  `alamatLengkap` varchar(250) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kapster` varchar(50) NOT NULL,
  `ongkir` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`idBooking`, `idPelanggan`, `nama`, `nomor`, `tanggalJam`, `alamatLengkap`, `kota`, `kapster`, `ongkir`) VALUES
(1, 1, 'Andri Adam', '2147483647', '2020/11/08 16:51', 'JL. Faliman Jaya', 'Jakarta', '3. Novi', 13),
(2, 1, 'Andri Adam', '2147483647', '2021/02/24 22:00', 'JL. Faliman Jaya', 'Jakarta', '4. Elsa', 13),
(3, 1, 'Andri Adam', '2147483647', '2020/11/29 16:54', 'JL. Faliman Jaya', 'Jakarta', '--Random--', 13);

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`kota`, `tarif`) VALUES
('Bandung', 15),
('Jakarta', 13),
('Tangerang', 10);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `idPelanggan` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nomor` varchar(50) NOT NULL,
  `alamatLengkap` varchar(250) NOT NULL,
  `kota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`idPelanggan`, `email`, `password`, `nama`, `nomor`, `alamatLengkap`, `kota`) VALUES
(1, 'andriadam2792000@gmail.com', '$2y$10$MsUennvIaOLMlq8KovZE6u4STRxc5/lphJa/AAM7.iqMy2O9ifqJq', 'Andri Adam', '089602748612', 'JL. Faliman Jaya', 'Jakarta'),
(2, 'andriadam27@student.gunadarma.ac.id', '$2y$10$K7xvIvUSczTF92uB/r43MeMr0iA9idjNoiTrE9V4qR5Mv6HFqv6.G', 'Adam Andri', '0865644454', 'JL. Melati Putih', 'Jakarta'),
(3, 'darwis@gmail.com', '$2y$10$J6n7GC/rWfK/QJIPY4.fputSnq0jQD77SSy3Wi4.ZP1EUak.MfdrC', 'darwis', '08123423231', 'jl dr sitanala', 'Tangerang');

-- --------------------------------------------------------

--
-- Table structure for table `pembeliaan`
--

CREATE TABLE `pembeliaan` (
  `idPembeliaan` int(11) NOT NULL,
  `idPelanggan` int(11) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  `alamatLengkap` varchar(250) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembeliaan`
--

INSERT INTO `pembeliaan` (`idPembeliaan`, `idPelanggan`, `nama`, `nomor`, `alamatLengkap`, `kota`, `ongkir`, `total`) VALUES
(1, 1, 'Andri Adam', '089602748612', 'JL. Faliman Jaya', 'Jakarta', 13, 503),
(2, 1, 'Andri Adam', '089602748612', 'JL. Faliman Jaya', 'Jakarta', 13, 733),
(3, 1, 'Andri Adam', '089602748612', 'JL. Faliman Jaya', 'Jakarta', 13, 733),
(4, 1, 'Andri Adam', '089602748612', 'JL. Faliman Jaya', 'Jakarta', 13, 943),
(5, 1, 'Andri Adam', '089602748612', 'JL. Faliman Jaya', 'Jakarta', 13, 783),
(6, 1, 'Andri Adam', '089602748612', 'JL. Faliman Jaya', 'Jakarta', 13, 613),
(7, 1, 'Andri Adam', '089602748612', 'JL. Faliman Jaya', 'Jakarta', 13, 93),
(8, 3, 'darwis', '08123423231', 'jl dr sitanala', 'Tangerang', 10, 690),
(9, 1, 'Andri Adam', '089602748612', 'JL. Faliman Jaya', 'Jakarta', 13, 253),
(10, 1, 'Andri Adam', '089602748612', 'JL. Faliman Jaya', 'Jakarta', 13, 733),
(11, 1, 'Andri Adam', '089602748612', 'JL. Faliman Jaya', 'Jakarta', 13, 5563),
(12, 1, 'Andri Adam', '089602748612', 'JL. Faliman Jaya', 'Jakarta', 13, 333);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `idProduk` int(11) NOT NULL,
  `gambarProduk` varchar(250) NOT NULL,
  `judulProduk` varchar(100) NOT NULL,
  `diskonProduk` int(3) NOT NULL,
  `hargaProduk` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idProduk`, `gambarProduk`, `judulProduk`, `diskonProduk`, `hargaProduk`, `stok`) VALUES
(1, 'produk-1.png', 'Barbers', 20, 80, 10),
(2, 'produk-2.png', 'Apothecary', 20, 180, 10),
(3, 'produk-3.png', 'Uppercut', 20, 150, 10),
(4, 'produk-4.png', 'Barbers', 20, 80, 10),
(5, 'produk-5.png', 'Barbers', 20, 80, 10),
(6, 'produk-6.png', 'Barbers', 20, 80, 10),
(7, 'produk-7.png', 'Barbers', 20, 80, 10),
(8, 'produk-8.png', 'Barbers', 20, 80, 10),
(9, 'produk-9.png', 'Barbers', 20, 80, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tukang_cukur`
--

CREATE TABLE `tukang_cukur` (
  `idTukangCukur` int(11) NOT NULL,
  `namaTukangCukur` varchar(100) NOT NULL,
  `alamatTukangCukur` varchar(250) NOT NULL,
  `nomorTukangCukur` int(50) NOT NULL,
  `foto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`idBooking`),
  ADD KEY `idPelanggan` (`idPelanggan`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`kota`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idPelanggan`);

--
-- Indexes for table `pembeliaan`
--
ALTER TABLE `pembeliaan`
  ADD PRIMARY KEY (`idPembeliaan`),
  ADD KEY `idPelanggan` (`idPelanggan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idProduk`);

--
-- Indexes for table `tukang_cukur`
--
ALTER TABLE `tukang_cukur`
  ADD PRIMARY KEY (`idTukangCukur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `idBooking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `idPelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembeliaan`
--
ALTER TABLE `pembeliaan`
  MODIFY `idPembeliaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `idProduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tukang_cukur`
--
ALTER TABLE `tukang_cukur`
  MODIFY `idTukangCukur` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
