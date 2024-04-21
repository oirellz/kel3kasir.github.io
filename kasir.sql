-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2024 at 07:28 AM
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
-- Database: `kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `detail_id` int(11) NOT NULL,
  `penjualan_id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`detail_id`, `penjualan_id`, `kode`, `jumlah_produk`, `subtotal`) VALUES
(381, 258, 'BPC003', 1, 15000.00),
(382, 258, 'KPC006', 1, 60000.00),
(383, 258, 'TPC010', 1, 20000.00),
(384, 258, 'APC005', 1, 20000.00),
(385, 258, 'GKPC008', 1, 15000.00),
(386, 258, 'MPC009', 1, 20000.00),
(388, 258, 'APC005', 1, 20000.00),
(394, 258, 'CPC001', 1, 5000.00),
(395, 258, 'CPC001', 1, 5000.00);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `pelanggan_id` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `nomor_telpon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`pelanggan_id`, `nama_pelanggan`, `alamat`, `nomor_telpon`) VALUES
(111, 'varrel', 'mjl', '0812678963'),
(116, 'varel', 'kdp', '111');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `penjualan_id` int(11) NOT NULL,
  `tanggal_penjualan` date NOT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `pelanggan_id` int(11) NOT NULL,
  `petugas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`penjualan_id`, `tanggal_penjualan`, `total_harga`, `pelanggan_id`, `petugas_id`) VALUES
(255, '2024-04-14', 0.00, 111, 0),
(256, '2024-04-14', 0.00, 111, 0),
(257, '2024-04-14', 0.00, 111, 0),
(258, '2024-04-14', 180000.00, 111, 0);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `petugas_id` int(11) NOT NULL,
  `nama_petugas` varchar(255) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nomor_telpon` varchar(15) NOT NULL,
  `level` enum('admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`petugas_id`, `nama_petugas`, `username`, `password`, `nomor_telpon`, `level`) VALUES
(555, 'afifah', 'puteri', '123', '0897654321', 'admin'),
(666, 'rell', 'reli', '123', '0897654321', 'admin'),
(667, 'agustina', 'gustin', '123', '0891234124', 'petugas'),
(668, 'hiban', 'iban', '234', '0812341441', 'admin'),
(669, 'fadhila', 'fadhila', '345', '0893024324', 'petugas'),
(670, 'zalianti', 'zalianti', '345', '0823452124', 'petugas');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `produk_id` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`produk_id`, `kode`, `nama_produk`, `harga`, `stok`) VALUES
(444, 'CPC001', 'Cincin', 5000.00, -2),
(447, 'GPC002', 'Gelang', 10000.00, 50),
(448, 'BPC003', 'Bando', 15000.00, 29),
(449, 'JTPC004', 'Jam Tangan', 50000.00, 10),
(450, 'APC005', 'Anting', 20000.00, 18),
(451, 'KPC006', 'Kacamata', 60000.00, 29),
(452, 'JPC007', 'Jedai', 15000.00, 50),
(453, 'GKPC008', 'Gantungan Kunci', 15000.00, 39),
(454, 'MPC009', 'Mahkota', 20000.00, 19),
(455, 'TPC010', 'Topi', 20000.00, 47),
(456, 'PSPC011', 'Phone Strap', 15000.00, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `penjualan_id` (`penjualan_id`),
  ADD KEY `produk_id` (`kode`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`pelanggan_id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`penjualan_id`),
  ADD KEY `Pelanggan_id` (`pelanggan_id`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`petugas_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=396;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `pelanggan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `penjualan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `petugas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=671;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=457;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
