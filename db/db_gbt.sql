-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2023 at 11:08 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gbt`
--

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nomor_hp` varchar(12) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenis_orderan` enum('Take away','Eat Here','Pesan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `nomor_hp`, `alamat`, `jenis_orderan`) VALUES
(19, 'Ripaldo Alyura  ', '085354061203', 'Jl. Menteng XXII No.15', 'Take away'),
(24, 'Aldi', '085754061654', 'Jl. Sukabumi 3A', 'Pesan'),
(25, 'Beni Sendri', '081243562234', 'Jl. Banjar X No.12', 'Eat Here'),
(26, 'Dewi Puspita', '085267899054', 'Jl. Rajawali V', 'Take away'),
(27, 'Taufik Ismail', '085345631278', 'Jl. G.Obos Induk No.2A', 'Pesan'),
(28, 'Ester Gracia Lestari', '085367543523', 'Jl. Yos Sudarso II', 'Eat Here'),
(29, 'Melani', '085467712356', 'Jl. Temanggung Tilung X', 'Take away');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
