-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2020 at 12:37 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kpbpjs`
--

-- --------------------------------------------------------

--
-- Table structure for table `atk`
--

CREATE TABLE `atk` (
  `no_atk` int(50) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `spesifikasi` varchar(100) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `tanggal_penggunaan` date NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `atk`
--

INSERT INTO `atk` (`no_atk`, `nama_barang`, `spesifikasi`, `jumlah`, `satuan`, `tanggal_penggunaan`, `keterangan`) VALUES
(9, 'kertas A4', '', 20, 'dus', '2020-05-21', 'kertas photocopy');

-- --------------------------------------------------------

--
-- Table structure for table `cetakan`
--

CREATE TABLE `cetakan` (
  `no_cetakan` int(50) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `spesifikasi` varchar(100) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `tanggal_penggunaan` date NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cetakan`
--

INSERT INTO `cetakan` (`no_cetakan`, `nama_barang`, `spesifikasi`, `jumlah`, `satuan`, `tanggal_penggunaan`, `keterangan`) VALUES
(3, 'toner 003', '', 10, 'buah', '2020-05-22', 'hitam = 2');

-- --------------------------------------------------------

--
-- Table structure for table `consumable`
--

CREATE TABLE `consumable` (
  `no_consumable` int(50) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `spesifikasi` varchar(100) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `tanggal_penggunaan` date NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consumable`
--

INSERT INTO `consumable` (`no_consumable`, `nama_barang`, `spesifikasi`, `jumlah`, `satuan`, `tanggal_penggunaan`, `keterangan`) VALUES
(1, 'super pell', '', 2, 'bungkus', '2020-05-22', ''),
(3, 'downy', '', 1, 'botol', '2020-05-26', '');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_peminjamkendaraan`
--

CREATE TABLE `daftar_peminjamkendaraan` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `bidang` varchar(100) NOT NULL,
  `keperluan` varchar(256) NOT NULL,
  `pukul` varchar(10) NOT NULL,
  `haritanggal` date NOT NULL,
  `jenis_kendaraan` varchar(50) NOT NULL,
  `plat` varchar(20) NOT NULL,
  `pengambilan_alat` varchar(256) NOT NULL,
  `pengembalian_alat` varchar(256) NOT NULL,
  `nama_pengemudi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar_peminjamkendaraan`
--

INSERT INTO `daftar_peminjamkendaraan` (`id`, `nama`, `bidang`, `keperluan`, `pukul`, `haritanggal`, `jenis_kendaraan`, `plat`, `pengambilan_alat`, `pengembalian_alat`, `nama_pengemudi`) VALUES
(12, 'sheiladita', 'pemasaran', 'ingin berobat', '10.00', '0000-00-00', 'Mobil', 'BG 8522 MZ', 'tidak ada', 'tidak ada', 'Victor Rozen'),
(16, 'lili', 'umum', 'ingin berobat', '10.00', '2020-05-27', 'Mobil', 'BG 1310 PZ', '', '', 'Victor Rozen');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_peminjamlaptop`
--

CREATE TABLE `daftar_peminjamlaptop` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(128) NOT NULL,
  `bidang` varchar(128) NOT NULL,
  `pemakaian_laptop` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `kelengkapan` varchar(50) NOT NULL,
  `waktu_peminjaman` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `daftar_peminjamlaptop`
--

INSERT INTO `daftar_peminjamlaptop` (`id`, `nama`, `jabatan`, `bidang`, `pemakaian_laptop`, `jenis`, `warna`, `kelengkapan`, `waktu_peminjaman`) VALUES
(2, 'sheiladita', 'pegawai', 'pemasaran', 'acer', 'notebook', 'hitam', 'tidak ada', '2020-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `pembelianrumahtangga`
--

CREATE TABLE `pembelianrumahtangga` (
  `no_pembelianrt` int(50) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `spesifikasi` varchar(100) NOT NULL,
  `jumlah` int(50) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `tanggal_penggunaan` date NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelianrumahtangga`
--

INSERT INTO `pembelianrumahtangga` (`no_pembelianrt`, `nama_barang`, `spesifikasi`, `jumlah`, `satuan`, `tanggal_penggunaan`, `keterangan`) VALUES
(11, 'aqua botol', '600 ml', 5, 'dus', '2020-05-31', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nama`, `username`, `image`, `password`, `role_id`) VALUES
('Annisa Purnamasari ', 'AN51423', 'default.jpg', '51423AN', 1),
('Yuli Hapsari', 'YH1243', 'default.jpg', '1243YH', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atk`
--
ALTER TABLE `atk`
  ADD PRIMARY KEY (`no_atk`);

--
-- Indexes for table `cetakan`
--
ALTER TABLE `cetakan`
  ADD PRIMARY KEY (`no_cetakan`);

--
-- Indexes for table `consumable`
--
ALTER TABLE `consumable`
  ADD PRIMARY KEY (`no_consumable`);

--
-- Indexes for table `daftar_peminjamkendaraan`
--
ALTER TABLE `daftar_peminjamkendaraan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daftar_peminjamlaptop`
--
ALTER TABLE `daftar_peminjamlaptop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembelianrumahtangga`
--
ALTER TABLE `pembelianrumahtangga`
  ADD PRIMARY KEY (`no_pembelianrt`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atk`
--
ALTER TABLE `atk`
  MODIFY `no_atk` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cetakan`
--
ALTER TABLE `cetakan`
  MODIFY `no_cetakan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `consumable`
--
ALTER TABLE `consumable`
  MODIFY `no_consumable` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `daftar_peminjamkendaraan`
--
ALTER TABLE `daftar_peminjamkendaraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `daftar_peminjamlaptop`
--
ALTER TABLE `daftar_peminjamlaptop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembelianrumahtangga`
--
ALTER TABLE `pembelianrumahtangga`
  MODIFY `no_pembelianrt` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
