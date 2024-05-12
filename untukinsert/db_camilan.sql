-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2024 at 07:10 AM
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
-- Database: `db_camilan`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getallbarang` ()   Begin

SELECT * FROM barang;
End$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `NAMA_ADMIN` varchar(50) DEFAULT NULL,
  `ID_ADMIN` varchar(50) NOT NULL,
  `NOMER_TELPON_ADMIN` varchar(50) DEFAULT NULL,
  `ALAMAT_ADMIN` text DEFAULT NULL,
  `USERNAME_ADMIN` varchar(50) DEFAULT NULL,
  `PASSWORD_ADMIN` varchar(50) DEFAULT NULL,
  `EMAIL_ADMIN` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `ID_BARANG` int(11) NOT NULL,
  `ID_KATEGORI` varchar(50) DEFAULT NULL,
  `ID_SUPPLIER` varchar(50) DEFAULT NULL,
  `NAMA_BARANG` varchar(50) DEFAULT NULL,
  `HARGA_BARANG` int(11) DEFAULT NULL,
  `STOCK` int(11) DEFAULT NULL,
  `FOTO_BARANG` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`ID_BARANG`, `ID_KATEGORI`, `ID_SUPPLIER`, `NAMA_BARANG`, `HARGA_BARANG`, `STOCK`, `FOTO_BARANG`) VALUES
(1, '002', '1010', 'Basreng Pedas', 15000, 49, '1713756150basrenghot.jpeg'),
(2, '002', '1010', 'Kerupuk Seblak', 5000, 67, '1713756404kerupukseblak.jpeg'),
(3, '002', '1010', 'Hot Jelatos Keripik Kaca', 9000, 47, '1713756555keripikkacahot.jpeg'),
(4, '003', '1010', 'Mushome Rumput Laut Gurih', 8000, 60, '1713756636mushomerumputlaut.jpeg'),
(5, '001', '1010', 'Sukade Manisan Pepaya', 20000, 49, '1713757061sukademanisanpepaya.jpeg'),
(6, '001', '1010', 'Carica Dieng', 17000, 28, '1713757290caricadieng.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `NAMA_CUSTOMER` varchar(50) DEFAULT NULL,
  `ID_CUSTOMER` int(11) NOT NULL,
  `NOMOR_TELPON_CUSTOMER` varchar(50) DEFAULT NULL,
  `USERNAME` varchar(50) DEFAULT NULL,
  `PASSWORD` varchar(64) DEFAULT NULL,
  `EMAIL` text DEFAULT NULL,
  `ALAMAT` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`NAMA_CUSTOMER`, `ID_CUSTOMER`, `NOMOR_TELPON_CUSTOMER`, `USERNAME`, `PASSWORD`, `EMAIL`, `ALAMAT`) VALUES
('Ahmad Ar rosyid Hidayatullah', 1, '088888888888', 'Rosyid777', 'sayasukakrupuk', 'rosyi.drey@gmail.com', 'Sukodadi');

-- --------------------------------------------------------

--
-- Table structure for table `detail_barang`
--

CREATE TABLE `detail_barang` (
  `ID_DETAIL_BARANG` int(11) NOT NULL,
  `ID_BARANG` varchar(50) NOT NULL,
  `KET_BARANG` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `ID_ORDER_DETAIL` varchar(50) NOT NULL,
  `ID_BARANG` int(11) DEFAULT NULL,
  `ID_ORDER` varchar(50) DEFAULT NULL,
  `JUMLAH_PRODUK` int(11) DEFAULT NULL,
  `TOTAL_HARGA` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `ID_KATEGORI` varchar(50) NOT NULL,
  `NAMA_KATEGORI` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`ID_KATEGORI`, `NAMA_KATEGORI`) VALUES
('001', 'Manis'),
('002', 'Pedas'),
('003', 'Gurih');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `ID_KERANJANG` int(11) NOT NULL,
  `ID_CUSTOMER` int(11) DEFAULT NULL,
  `ID_BARANG` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`ID_KERANJANG`, `ID_CUSTOMER`, `ID_BARANG`) VALUES
(1, 1, '2'),
(2, 1, '3'),
(3, 1, '5'),
(4, 1, '2'),
(5, 1, '6'),
(6, 1, '1'),
(7, 1, '3'),
(8, 1, '3'),
(9, 1, '6');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang_detail`
--

CREATE TABLE `keranjang_detail` (
  `ID_KERANJANG_DETAIL` varchar(50) NOT NULL,
  `ID_BARANG` int(11) DEFAULT NULL,
  `ID_KERANJANG` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `ID_METODE_PEMBAYARAN` varchar(50) NOT NULL,
  `ID_ORDER` varchar(50) DEFAULT NULL,
  `NAMA_METODE_PEMBAYARAN` varchar(50) DEFAULT NULL,
  `REKENING` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `ID_ORDER` varchar(50) NOT NULL,
  `ID_METODE_PEMBAYARAN` varchar(50) DEFAULT NULL,
  `ID_CUSTOMER` int(11) DEFAULT NULL,
  `TANGGAL_ORDER` timestamp NULL DEFAULT NULL,
  `TOTAL_ORDER` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `ID_SUPPLIER` varchar(50) NOT NULL,
  `NAMA_SUPPLIER` varchar(50) DEFAULT NULL,
  `ALAMAT_SUPPLIER` text DEFAULT NULL,
  `NO_TELPON_SUPPLIER` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`ID_SUPPLIER`, `NAMA_SUPPLIER`, `ALAMAT_SUPPLIER`, `NO_TELPON_SUPPLIER`) VALUES
('1010', 'UTM', 'Telang', '089514735692');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_ADMIN`),
  ADD UNIQUE KEY `ADMIN_PK` (`ID_ADMIN`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`ID_BARANG`),
  ADD UNIQUE KEY `BARANG_PK` (`ID_BARANG`),
  ADD KEY `MEMPUNYAI_FK` (`ID_KATEGORI`),
  ADD KEY `MENYUPLAI_FK` (`ID_SUPPLIER`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID_CUSTOMER`),
  ADD UNIQUE KEY `CUSTOMER_PK` (`ID_CUSTOMER`);

--
-- Indexes for table `detail_barang`
--
ALTER TABLE `detail_barang`
  ADD PRIMARY KEY (`ID_DETAIL_BARANG`);

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`ID_ORDER_DETAIL`),
  ADD UNIQUE KEY `ORDER_DETAIL_PK` (`ID_ORDER_DETAIL`),
  ADD KEY `MEMILIKI_FK` (`ID_ORDER`),
  ADD KEY `MEMESAN_FK` (`ID_BARANG`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`ID_KATEGORI`),
  ADD UNIQUE KEY `KATEGORI_PK` (`ID_KATEGORI`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`ID_KERANJANG`),
  ADD UNIQUE KEY `KERANJANG_PK` (`ID_KERANJANG`),
  ADD KEY `MENAMBAH_FK` (`ID_CUSTOMER`);

--
-- Indexes for table `keranjang_detail`
--
ALTER TABLE `keranjang_detail`
  ADD PRIMARY KEY (`ID_KERANJANG_DETAIL`),
  ADD UNIQUE KEY `KERANJANG_DETAIL_PK` (`ID_KERANJANG_DETAIL`),
  ADD KEY `TERDAPAT_FK` (`ID_KERANJANG`),
  ADD KEY `TERDIRI_FK` (`ID_BARANG`);

--
-- Indexes for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  ADD PRIMARY KEY (`ID_METODE_PEMBAYARAN`),
  ADD UNIQUE KEY `METODE_PEMBAYARAN_PK` (`ID_METODE_PEMBAYARAN`),
  ADD KEY `MEMBAYAR2_FK` (`ID_ORDER`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`ID_ORDER`),
  ADD UNIQUE KEY `ORDER_PK` (`ID_ORDER`),
  ADD KEY `MELAKUKAN_FK` (`ID_CUSTOMER`),
  ADD KEY `MEMBAYAR_FK` (`ID_METODE_PEMBAYARAN`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`ID_SUPPLIER`),
  ADD UNIQUE KEY `SUPPLIER_PK` (`ID_SUPPLIER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `ID_BARANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ID_CUSTOMER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_barang`
--
ALTER TABLE `detail_barang`
  MODIFY `ID_DETAIL_BARANG` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `ID_KERANJANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `FK_BARANG_MEMPUNYAI_KATEGORI` FOREIGN KEY (`ID_KATEGORI`) REFERENCES `kategori` (`ID_KATEGORI`),
  ADD CONSTRAINT `FK_BARANG_MENYUPLAI_SUPPLIER` FOREIGN KEY (`ID_SUPPLIER`) REFERENCES `supplier` (`ID_SUPPLIER`);

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `FK_DETAIL_P_MEMESAN_BARANG` FOREIGN KEY (`ID_BARANG`) REFERENCES `barang` (`ID_BARANG`),
  ADD CONSTRAINT `FK_DETAIL_P_MEMILIKI_PESANAN` FOREIGN KEY (`ID_ORDER`) REFERENCES `pesanan` (`ID_ORDER`);

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `FK_KERANJAN_MENAMBAH_CUSTOMER` FOREIGN KEY (`ID_CUSTOMER`) REFERENCES `customer` (`ID_CUSTOMER`);

--
-- Constraints for table `keranjang_detail`
--
ALTER TABLE `keranjang_detail`
  ADD CONSTRAINT `FK_KERANJAN_TERDAPAT_KERANJAN` FOREIGN KEY (`ID_KERANJANG`) REFERENCES `keranjang` (`ID_KERANJANG`),
  ADD CONSTRAINT `FK_KERANJAN_TERDIRI_BARANG` FOREIGN KEY (`ID_BARANG`) REFERENCES `barang` (`ID_BARANG`);

--
-- Constraints for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  ADD CONSTRAINT `FK_METODE_P_MEMBAYAR2_PESANAN` FOREIGN KEY (`ID_ORDER`) REFERENCES `pesanan` (`ID_ORDER`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `FK_PESANAN_MELAKUKAN_CUSTOMER` FOREIGN KEY (`ID_CUSTOMER`) REFERENCES `customer` (`ID_CUSTOMER`),
  ADD CONSTRAINT `FK_PESANAN_MEMBAYAR_METODE_P` FOREIGN KEY (`ID_METODE_PEMBAYARAN`) REFERENCES `metode_pembayaran` (`ID_METODE_PEMBAYARAN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
