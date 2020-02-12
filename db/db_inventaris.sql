-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2020 at 06:38 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(8) NOT NULL,
  `nama` varchar(226) NOT NULL,
  `jumlah_barang` varchar(225) NOT NULL,
  `satuan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama`, `jumlah_barang`, `satuan`) VALUES
(6, 'Papan Tulis', '56', 'Unit'),
(15, 'Intel Core i9-9900 K', '40', 'Unit'),
(16, 'LG Monitor LK-45h', '25', 'Unit'),
(17, 'Buku Paket B Indonesia Kls.12', '65', 'Pack'),
(19, 'Gigabyte GTX1660 Super OC', '54', 'Unit'),
(20, 'Kursi', '100', 'Unit');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` int(11) NOT NULL,
  `tanggal_keluar` varchar(225) NOT NULL,
  `id_barang_kel` int(8) NOT NULL,
  `jumlah_keluar` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang_keluar`, `tanggal_keluar`, `id_barang_kel`, `jumlah_keluar`) VALUES
(22, '2020-02-05', 16, 3),
(23, '2020-02-05', 17, 4),
(25, '2020-02-05', 19, 6),
(26, '2020-02-05', 16, 5),
(27, '2020-02-05', 19, 4);

--
-- Triggers `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `update_brg_keluar` BEFORE INSERT ON `barang_keluar` FOR EACH ROW UPDATE `barang` SET `barang`.`jumlah_barang` = `barang`.`jumlah_barang` - NEW.jumlah_keluar WHERE `barang`.`id_barang` = NEW.id_barang_kel
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` int(8) NOT NULL,
  `tanggal_masuk` varchar(225) NOT NULL,
  `id_barang_stok` int(8) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `jumlah_masuk` int(225) NOT NULL,
  `kondisi` varchar(225) NOT NULL,
  `kategori` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `tanggal_masuk`, `id_barang_stok`, `supplier_id`, `jumlah_masuk`, `kondisi`, `kategori`) VALUES
(26, '2020-02-05', 15, 1, 12, 'Baik', 'Habis Simpan'),
(28, '2020-02-05', 17, 3, 23, 'Baik', 'Habis Simpan'),
(29, '2020-02-05', 20, 6, 35, 'Baik', 'Habis Simpan'),
(30, '2020-02-05', 17, 4, 25, 'Baik', 'Habis Simpan');

--
-- Triggers `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `update_stok_barang` BEFORE INSERT ON `barang_masuk` FOR EACH ROW UPDATE `barang` SET `barang`.`jumlah_barang` = `barang`.`jumlah_barang` + NEW.jumlah_masuk WHERE `barang`.`id_barang` = NEW.id_barang_stok
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `peminjam`
--

CREATE TABLE `peminjam` (
  `id` int(8) NOT NULL,
  `nama_peminjam` varchar(225) NOT NULL,
  `id_barang_pinjam` int(8) NOT NULL,
  `jumlah_pinjam` int(225) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjam`
--

INSERT INTO `peminjam` (`id`, `nama_peminjam`, `id_barang_pinjam`, `jumlah_pinjam`, `tgl_pinjam`, `tgl_kembali`) VALUES
(24, 'Dicky Saputra', 15, 4, '2020-02-05', '2020-02-05'),
(25, 'Ninis Indri', 17, 5, '2020-02-05', '2020-02-05'),
(26, 'Yefta Pascal F', 6, 25, '2020-02-05', '2020-02-05'),
(27, 'Agus Saputra', 19, 4, '2020-02-05', '2020-02-05'),
(28, 'Ayuk Lutviani', 17, 5, '2020-02-05', '2020-02-05'),
(29, 'Andrian Dico', 16, 3, '2020-02-05', '2020-02-07');

--
-- Triggers `peminjam`
--
DELIMITER $$
CREATE TRIGGER `update_brg_pinjam` BEFORE INSERT ON `peminjam` FOR EACH ROW UPDATE `barang` SET `barang`.`jumlah_barang` = `barang`.`jumlah_barang` - NEW.jumlah_pinjam WHERE `barang`.`id_barang` = NEW.id_barang_pinjam
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(8) NOT NULL,
  `nama_supplier` varchar(225) NOT NULL,
  `no_telp` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `no_telp`, `alamat`) VALUES
(1, 'Nor Rohmad Dwi', '085647837498', 'Ds.Banjaran Rt.12/09'),
(3, 'Dimas Ariyanto', '085634528378', 'Ds. Suwawal Rt.02/01'),
(4, 'Zaenal Abidin', '087896543426', 'Ds.Kecapi Rt.16/08'),
(6, 'Muhammad Adib\'bai', '089765676565', 'Ds.Sinanggul Rt.15/05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `password`) VALUES
(12, 'andrian', '$2y$10$TSrjjZ.7TaQeN/pBnkN26e0n8lOB5lh/7Aex0V.CHKGhV4In/ssKa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`),
  ADD KEY `id_barang` (`id_barang_stok`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `peminjam`
--
ALTER TABLE `peminjam`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_barang` (`id_barang_pinjam`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `id_barang_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_barang_masuk` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `peminjam`
--
ALTER TABLE `peminjam`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
