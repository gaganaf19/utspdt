-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2023 at 11:25 AM
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
-- Database: `so`
--

-- --------------------------------------------------------

--
-- Table structure for table `biaya_tetap`
--

CREATE TABLE `biaya_tetap` (
  `id_biayatetap` int(11) NOT NULL,
  `nama_biaya` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `total_harga` int(11) NOT NULL,
  `catatan` varchar(50) NOT NULL,
  `harga_satuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `biaya_tetap`
--

INSERT INTO `biaya_tetap` (`id_biayatetap`, `nama_biaya`, `jumlah`, `tanggal`, `total_harga`, `catatan`, `harga_satuan`) VALUES
(1, 'sewa lahan', 3, '2023-04-08', 150000, '  ', 50000);

-- --------------------------------------------------------

--
-- Table structure for table `biaya_tidaktetap`
--

CREATE TABLE `biaya_tidaktetap` (
  `id_biayatidaktetap` int(11) NOT NULL,
  `nama_biaya` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `total_harga` int(11) NOT NULL,
  `catatan` varchar(50) NOT NULL,
  `harga_satuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `biaya_tidaktetap`
--

INSERT INTO `biaya_tidaktetap` (`id_biayatidaktetap`, `nama_biaya`, `jumlah`, `tanggal`, `total_harga`, `catatan`, `harga_satuan`) VALUES
(1, 'obat', 5, '2023-04-08', 500000, ' ', 100000),
(2, 'obat semprot', 7, '2023-04-09', 84000, ' ', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `total_pengeluaran_tetap` int(11) NOT NULL,
  `total_pengeluaran_tidak_tetap` int(11) NOT NULL,
  `total_pengeluaran` int(11) NOT NULL,
  `total_pemasukan` int(11) NOT NULL,
  `total_keuntungan` int(11) NOT NULL,
  `id_laporan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`total_pengeluaran_tetap`, `total_pengeluaran_tidak_tetap`, `total_pengeluaran`, `total_pemasukan`, `total_keuntungan`, `id_laporan`) VALUES
(150000, 584000, 734000, 0, -734000, 3),
(150000, 584000, 734000, 2375000, 1641000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id_pemasukan` int(11) NOT NULL,
  `nama_pelanggan` varchar(30) NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` varchar(20) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `catatan` varchar(30) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `jenis` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id_pemasukan`, `nama_pelanggan`, `tanggal`, `jumlah`, `total_harga`, `catatan`, `harga_satuan`, `jenis`) VALUES
(3, 'gagan', '2023-04-09', '250', 2375000, ' ', 9500, 'Padi');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biaya_tetap`
--
ALTER TABLE `biaya_tetap`
  ADD PRIMARY KEY (`id_biayatetap`);

--
-- Indexes for table `biaya_tidaktetap`
--
ALTER TABLE `biaya_tidaktetap`
  ADD PRIMARY KEY (`id_biayatidaktetap`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biaya_tetap`
--
ALTER TABLE `biaya_tetap`
  MODIFY `id_biayatetap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `biaya_tidaktetap`
--
ALTER TABLE `biaya_tidaktetap`
  MODIFY `id_biayatidaktetap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
