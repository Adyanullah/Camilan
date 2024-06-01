-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2024 at 01:46 PM
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
  `NAMA_BARANG` varchar(50) DEFAULT NULL,
  `HARGA_BARANG` int(11) DEFAULT NULL,
  `STOCK` int(11) DEFAULT NULL,
  `FOTO_BARANG` text DEFAULT NULL,
  `Deskripsi` text NOT NULL,
  `Ukuran` text NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`ID_BARANG`, `ID_KATEGORI`, `NAMA_BARANG`, `HARGA_BARANG`, `STOCK`, `FOTO_BARANG`, `Deskripsi`, `Ukuran`) VALUES
(1, '002', 'Basreng Pedas', 15000, 44, '1713756150basrenghot.jpeg', '<p>Cemilan ini memiliki bentuk seperti buluh pipa, yang dilapisi dengan bumbu cabai dan rempah-rempah lainnya. Rasanya tidak terlalu pedas, kamu bisa memakannya dengan santai.</p>\r\n\r\n<ul>Bahan-bahan Berkualitas:\r\n<li>1. Makaroni berkualitas tinggi </li>\r\n<li>2. Bumbu-bumbu rempah alami </li>\r\n<li>3. Minyak nabati berkualitas untuk penggorengan  </li></ul>\r\n\r\nKemasan: \r\n1. Tersedia dalam kemasan yang mudah dibawa dan disimpan \r\n2. Sachet kecil untuk camilan sehari-hari \r\n3. Kemasan besar untuk berbagi atau acara tertentu', '1'),
(2, '002', 'Kerupuk Seblak', 5000, 58, '1717159566kerupukseblak.jpeg', 'Kerupuk Seblak Enak !!!', '1,2'),
(3, '002', 'Hot Jelatos Keripik Kaca', 9000, 40, '1717159705keripikkacahot.jpeg', 'Kripik Kaca kini tersedia di semua ukuran !!!', '1,2,3'),
(4, '003', 'Mushome Rumput Laut Gurih', 14000, 60, '1717159831mushomerumputlaut.jpeg', 'Rumput Laut ASLI Indonesia, Cintai Produk Lokal, Tersedia di 2 Ukuran!!!', '1,2'),
(5, '001', 'Sukade Manisan Pepaya', 20000, 39, '1713757061sukademanisanpepaya.jpeg', '', '1'),
(6, '001', 'Carica Dieng', 17000, 18, '1713757290caricadieng.jpeg', '', '1');

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
  `ALAMAT` text DEFAULT NULL,
  `KOTA` text NOT NULL,
  `ID_KOTA` int(11) NOT NULL,
  `PROVINSI` text NOT NULL,
  `ID_PROVINSI` int(11) NOT NULL,
  `FOTO` text DEFAULT 'Default-Profile.svg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`NAMA_CUSTOMER`, `ID_CUSTOMER`, `NOMOR_TELPON_CUSTOMER`, `USERNAME`, `PASSWORD`, `EMAIL`, `ALAMAT`, `KOTA`, `ID_KOTA`, `PROVINSI`, `ID_PROVINSI`, `FOTO`) VALUES
('Ahmad Ar rosyid Hidayatullah', 1, '088888888888', 'Rosyid711', 'sayasukakrupuk', 'rosyi.drey@gmail.com', 'Sukodadi', 'Lamongan', 222, 'Jawa Timur', 11, 'Default-Profile.svg'),
('Adyan', 2, '081357999222', 'adyan98', '123456', 'adyan@gmail.com', 'Babat, Sukodadi, Jalan Kartini No.99 Kiri Jalan', 'Lamongan', 222, 'Jawa Timur', 11, 'Default-Profile.svg');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `ID_ORDER_DETAIL` int(11) NOT NULL,
  `ID_BARANG` int(11) DEFAULT NULL,
  `ID_ORDER` int(11) DEFAULT NULL,
  `JUMLAH_PRODUK` int(11) DEFAULT NULL,
  `HARGA` int(11) DEFAULT NULL,
  `BERAT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`ID_ORDER_DETAIL`, `ID_BARANG`, `ID_ORDER`, `JUMLAH_PRODUK`, `HARGA`, `BERAT`) VALUES
(1, 1, 5, 2, 30000, 200),
(2, 2, 5, 3, 15000, 300),
(3, 3, 5, 2, 18000, 200),
(4, 6, 5, 3, 51000, 300),
(5, 1, 6, 2, 30000, 200),
(6, 6, 6, 3, 51000, 300),
(7, 1, 7, 2, 30000, 200),
(8, 5, 7, 2, 40000, 200),
(9, 6, 7, 3, 51000, 300),
(10, 2, 9, 2, 10000, 200),
(11, 3, 9, 2, 18000, 200),
(12, 2, 10, 1, 5000, 100),
(13, 2, 11, 2, 10000, 200),
(14, 3, 12, 1, 9000, 100),
(15, 5, 12, 4, 80000, 400),
(16, 6, 12, 4, 68000, 400),
(17, 5, 13, 4, 80000, 400),
(18, 6, 14, 5, 85000, 500),
(19, 1, 16, 1, 15000, 100),
(20, 5, 17, 1, 20000, 100),
(21, 3, 18, 1, 9000, 100),
(22, 1, 22, 2, 30000, 200),
(23, 3, 22, 2, 18000, 200),
(24, 2, 23, 5, 25000, 500),
(25, 1, 24, 1, 15000, 100),
(26, 3, 24, 2, 18000, 500),
(27, 3, 24, 2, 18000, 1000);

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
  `ID_BARANG` varchar(50) NOT NULL,
  `ID_UKURAN` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `ID_KOMENTAR` int(11) NOT NULL,
  `ID_CUSTOMER` int(11) NOT NULL,
  `ID_BARANG` int(11) NOT NULL,
  `ISI_KOMENTAR` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`ID_KOMENTAR`, `ID_CUSTOMER`, `ID_BARANG`, `ISI_KOMENTAR`) VALUES
(1, 1, 2, 'Saya Suka Produk Ini'),
(2, 1, 3, 'Pedes COyyy!!!!');

-- --------------------------------------------------------

--
-- Table structure for table `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `ID_METODE_PEMBAYARAN` int(11) NOT NULL,
  `NAMA_METODE_PEMBAYARAN` varchar(50) DEFAULT NULL,
  `REKENING` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `ID_ORDER` int(11) NOT NULL,
  `ID_METODE_PEMBAYARAN` int(11) DEFAULT NULL,
  `ID_CUSTOMER` int(11) DEFAULT NULL,
  `TANGGAL_ORDER` timestamp NULL DEFAULT current_timestamp(),
  `TOTAL_ORDER` int(11) DEFAULT NULL,
  `Status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`ID_ORDER`, `ID_METODE_PEMBAYARAN`, `ID_CUSTOMER`, `TANGGAL_ORDER`, `TOTAL_ORDER`, `Status`) VALUES
(5, NULL, 1, '2024-05-20 14:05:23', 120000, 0),
(6, NULL, 1, '2024-05-20 14:10:59', 87000, 0),
(7, NULL, 1, '2024-05-20 14:11:43', 127000, 1),
(9, NULL, 1, '2024-05-27 03:27:51', 34000, 1),
(10, NULL, 1, '2024-05-27 06:38:06', 11000, 1),
(11, NULL, 1, '2024-05-27 06:38:41', 16000, 1),
(12, NULL, 1, '2024-05-27 11:12:05', 157000, 1),
(13, NULL, 1, '2024-05-27 11:16:45', 86000, 1),
(14, NULL, 1, '2024-05-27 11:17:34', 85000, 1),
(15, NULL, 1, '2024-05-27 11:17:39', 85000, 1),
(16, NULL, 1, '2024-05-27 12:17:29', 21000, 1),
(17, NULL, 1, '2024-05-27 12:23:43', 26000, 1),
(18, NULL, 1, '2024-05-27 12:26:25', 15000, 1),
(19, NULL, 1, '2024-05-31 11:41:37', 55000, 0),
(20, NULL, 1, '2024-05-31 11:42:18', 55000, 0),
(21, NULL, 1, '2024-05-31 11:49:21', 55000, 0),
(22, NULL, 1, '2024-05-31 11:50:20', 55000, 0),
(23, NULL, 1, '2024-05-31 15:36:17', 32000, 0),
(24, NULL, 1, '2024-05-31 15:43:16', 65000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ukuran_barang`
--

CREATE TABLE `ukuran_barang` (
  `ID_UKURAN` int(11) NOT NULL,
  `BERAT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ukuran_barang`
--

INSERT INTO `ukuran_barang` (`ID_UKURAN`, `BERAT`) VALUES
(1, 100),
(2, 250),
(3, 500);

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
  ADD KEY `MEMPUNYAI_FK` (`ID_KATEGORI`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID_CUSTOMER`),
  ADD UNIQUE KEY `CUSTOMER_PK` (`ID_CUSTOMER`);

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
  ADD KEY `MENAMBAH_FK` (`ID_CUSTOMER`),
  ADD KEY `FK_UKURAN_BARANG_KERANJANG` (`ID_UKURAN`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`ID_KOMENTAR`),
  ADD KEY `FK_KOMENTAR_BARANG` (`ID_BARANG`),
  ADD KEY `FK_KOMENTAR_USER` (`ID_CUSTOMER`);

--
-- Indexes for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  ADD PRIMARY KEY (`ID_METODE_PEMBAYARAN`),
  ADD UNIQUE KEY `METODE_PEMBAYARAN_PK` (`ID_METODE_PEMBAYARAN`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`ID_ORDER`),
  ADD UNIQUE KEY `ORDER_PK` (`ID_ORDER`),
  ADD KEY `MELAKUKAN_FK` (`ID_CUSTOMER`),
  ADD KEY `MEMBAYAR_FK` (`ID_METODE_PEMBAYARAN`);

--
-- Indexes for table `ukuran_barang`
--
ALTER TABLE `ukuran_barang`
  ADD PRIMARY KEY (`ID_UKURAN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `ID_BARANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ID_CUSTOMER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `ID_ORDER_DETAIL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `ID_KERANJANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `ID_KOMENTAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  MODIFY `ID_METODE_PEMBAYARAN` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `ID_ORDER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `ukuran_barang`
--
ALTER TABLE `ukuran_barang`
  MODIFY `ID_UKURAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `FK_BARANG_MEMPUNYAI_KATEGORI` FOREIGN KEY (`ID_KATEGORI`) REFERENCES `kategori` (`ID_KATEGORI`);

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `FK_DETAIL_P_MEMESAN_BARANG` FOREIGN KEY (`ID_BARANG`) REFERENCES `barang` (`ID_BARANG`),
  ADD CONSTRAINT `FK_PESANAN` FOREIGN KEY (`ID_ORDER`) REFERENCES `pesanan` (`ID_ORDER`);

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `FK_KERANJAN_MENAMBAH_CUSTOMER` FOREIGN KEY (`ID_CUSTOMER`) REFERENCES `customer` (`ID_CUSTOMER`),
  ADD CONSTRAINT `FK_UKURAN_BARANG_KERANJANG` FOREIGN KEY (`ID_UKURAN`) REFERENCES `ukuran_barang` (`ID_UKURAN`);

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `FK_KOMENTAR_BARANG` FOREIGN KEY (`ID_BARANG`) REFERENCES `barang` (`ID_BARANG`),
  ADD CONSTRAINT `FK_KOMENTAR_USER` FOREIGN KEY (`ID_CUSTOMER`) REFERENCES `customer` (`ID_CUSTOMER`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `FK_PEMBAYARAN_PESANAN` FOREIGN KEY (`ID_METODE_PEMBAYARAN`) REFERENCES `metode_pembayaran` (`ID_METODE_PEMBAYARAN`),
  ADD CONSTRAINT `FK_PESANAN_MELAKUKAN_CUSTOMER` FOREIGN KEY (`ID_CUSTOMER`) REFERENCES `customer` (`ID_CUSTOMER`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
