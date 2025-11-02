-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2025 at 02:35 PM
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
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(10) DEFAULT NULL,
  `nama_barang` varchar(100) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `nama_barang`, `harga`, `stok`, `supplier_id`) VALUES
(1, 'BRG001', 'Beras 5kg', 60000, 50, 1),
(2, 'BRG002', 'Gula 1kg', 15000, 100, 2),
(3, 'BRG003', 'Minyak Goreng 1L', 20000, 80, 3),
(4, 'BRG004', 'Sabun Mandi', 5000, 120, 4),
(5, 'BRG005', 'Shampoo 200ml', 18000, 60, 5),
(6, 'BRG006', 'Teh Celup', 12000, 90, 6),
(7, 'BRG007', 'Kopi Bubuk 250g', 25000, 70, 7),
(8, 'BRG008', 'Susu Kental Manis', 14000, 85, 8),
(9, 'BRG009', 'Detergen 1kg', 18000, 95, 9),
(10, 'BRG010', 'Tepung Terigu 1kg', 13000, 110, 10);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `jenis_kelamin` enum('L','P') DEFAULT 'L',
  `telp` varchar(12) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `jenis_kelamin`, `telp`, `alamat`) VALUES
(1, 'Andi', 'L', '0811111111', 'Jl. Mawar No.1'),
(2, 'Budi', 'L', '0811111112', 'Jl. Melati No.2'),
(3, 'Citra', 'P', '0811111113', 'Jl. Anggrek No.3'),
(4, 'Dewi', 'P', '0811111114', 'Jl. Kenanga No.4'),
(5, 'Eko', 'L', '0811111115', 'Jl. Dahlia No.5'),
(6, 'Fina', 'P', '0811111116', 'Jl. Cempaka No.6'),
(7, 'Gilang', 'L', '0811111117', 'Jl. Flamboyan No.7'),
(8, 'Hani', 'P', '0811111118', 'Jl. Teratai No.8'),
(9, 'Indra', 'L', '0811111119', 'Jl. Nusa Indah No.9'),
(10, 'Joko', 'L', '0811111120', 'Jl. Anyelir No.10');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `waktu_bayar` datetime DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `metode` enum('TUNAI','TRANSFER','EDC') DEFAULT NULL,
  `transaksi_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `waktu_bayar`, `total`, `metode`, `transaksi_id`) VALUES
(1, '2025-10-01 10:00:00', 150000, 'TUNAI', 1),
(2, '2025-10-02 11:00:00', 23000, 'EDC', 2),
(3, '2025-10-03 12:30:00', 125000, 'TRANSFER', 3),
(4, '2025-10-04 13:00:00', 30000, 'TUNAI', 4),
(5, '2025-10-05 14:00:00', 40000, 'EDC', 5),
(6, '2025-10-06 15:00:00', 37000, 'TUNAI', 6),
(7, '2025-10-07 16:00:00', 92000, 'TRANSFER', 7),
(8, '2025-10-08 17:00:00', 29000, 'EDC', 8),
(9, '2025-10-09 18:00:00', 33000, 'TRANSFER', 9),
(10, '2025-10-10 19:00:00', 78000, 'TUNAI', 10);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `telp` varchar(12) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `telp`, `alamat`) VALUES
(1, 'PT Sumber Makmur', '081234567890', 'Jl. Merdeka No.1'),
(2, 'CV Sejahtera Abadi', '081234567891', 'Jl. Gatot Subroto No.5'),
(3, 'PT Indo Pangan', '081234567892', 'Jl. Raya Bogor No.12'),
(4, 'UD Sentosa Jaya', '081234567893', 'Jl. Veteran No.10'),
(5, 'CV Berkah Mandiri', '081234567894', 'Jl. Ahmad Yani No.15'),
(6, 'PT Sari Rasa', '081234567895', 'Jl. Diponegoro No.20'),
(7, 'PT Makmur Lestari', '081234567896', 'Jl. Cendana No.33'),
(8, 'CV Prima Utama', '081234567897', 'Jl. Melati No.25'),
(9, 'UD Cahaya Baru', '081234567898', 'Jl. Pahlawan No.9'),
(10, 'PT Sinar Terang', '081234567899', 'Jl. Kartini No.45'),
(19, 'PT Pamekasan Hebat Bersatu', '087765604482', 'Jl. Waru Barat No. 01 ');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `waktu_transaksi` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `pelanggan_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `waktu_transaksi`, `keterangan`, `total`, `pelanggan_id`) VALUES
(1, '2025-10-01', 'Pembelian kebutuhan dapur', 150000, 1),
(2, '2025-10-02', 'Pembelian sabun dan shampoo', 23000, 2),
(3, '2025-10-03', 'Pembelian bahan pokok', 125000, 3),
(4, '2025-10-04', 'Pembelian minuman', 30000, 4),
(5, '2025-10-05', 'Pembelian kebutuhan mandi', 40000, 5),
(6, '2025-10-06', 'Pembelian kopi dan teh', 37000, 6),
(7, '2025-10-07', 'Pembelian bahan masak', 92000, 7),
(8, '2025-10-08', 'Pembelian susu dan gula', 29000, 8),
(9, '2025-10-09', 'Pembelian tepung dan minyak', 33000, 9),
(10, '2025-10-10', 'Pembelian beras dan detergen', 78000, 10);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `transaksi_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`transaksi_id`, `barang_id`, `harga`, `qty`) VALUES
(1, 1, 60000, 2),
(1, 2, 15000, 2),
(2, 4, 5000, 1),
(2, 5, 18000, 1),
(3, 1, 60000, 1),
(3, 2, 15000, 2),
(3, 3, 20000, 1),
(4, 6, 12000, 2),
(5, 4, 5000, 3),
(5, 5, 18000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` tinyint(2) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(35) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `hp` varchar(20) DEFAULT NULL,
  `level` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `alamat`, `hp`, `level`) VALUES
(1, 'admin', 'admin123', 'Admin Toko', 'Jl. Pusat No.1', '0812121212', 1),
(2, 'kasir1', 'kasir123', 'Kasir A', 'Jl. Timur No.2', '0812121213', 2),
(3, 'kasir2', 'kasir234', 'Kasir B', 'Jl. Barat No.3', '0812121214', 2),
(4, 'staff1', 'staff123', 'Staff Gudang', 'Jl. Selatan No.4', '0812121215', 3),
(5, 'owner', 'owner123', 'Pemilik Toko', 'Jl. Utara No.5', '0812121216', 1),
(6, 'manager', 'manager123', 'Manajer', 'Jl. Sudirman No.6', '0812121217', 1),
(7, 'kasir3', 'kasir345', 'Kasir C', 'Jl. Diponegoro No.7', '0812121218', 2),
(8, 'staff2', 'staff234', 'Staff Admin', 'Jl. Veteran No.8', '0812121219', 3),
(9, 'superuser', 'super123', 'Super User', 'Jl. Mangga No.9', '0812121220', 1),
(10, 'tester', 'test123', 'Tester', 'Jl. Durian No.10', '0812121221', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_barang_supplier` (`supplier_id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pembayaran_transaksi` (`transaksi_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_transaksi_pelanggan` (`pelanggan_id`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD PRIMARY KEY (`transaksi_id`,`barang_id`),
  ADD KEY `fk_td_barang` (`barang_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_barang_supplier` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_pembayaran_transaksi` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_transaksi_pelanggan` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  ADD CONSTRAINT `fk_td_barang` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_td_transaksi` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
