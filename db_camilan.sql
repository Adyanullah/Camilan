-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2024 at 08:52 AM
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

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`NAMA_ADMIN`, `ID_ADMIN`, `NOMER_TELPON_ADMIN`, `ALAMAT_ADMIN`, `USERNAME_ADMIN`, `PASSWORD_ADMIN`, `EMAIL_ADMIN`) VALUES
('Mas Admin', '001', '081357885321', 'Dagelan, Tuban, Bali', 'Admin1', 'seblakgakenak', 'Admin@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `ID_BARANG` int(11) NOT NULL,
  `NAMA_BARANG` varchar(50) DEFAULT NULL,
  `HARGA_BARANG` int(11) DEFAULT NULL,
  `STOCK` int(11) DEFAULT NULL,
  `FOTO_BARANG` text DEFAULT NULL,
  `Deskripsi` text NOT NULL,
  `Ukuran` text NOT NULL DEFAULT '1',
  `VARIAN` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`ID_BARANG`, `NAMA_BARANG`, `HARGA_BARANG`, `STOCK`, `FOTO_BARANG`, `Deskripsi`, `Ukuran`, `VARIAN`) VALUES
(10, 'Mi Lidi', 5000, 10, '1717409136Mi Lidi Original.jpeg', 'sejenis mi yang terbuat dari tepung beras yang dipadatkan dan dikeringkan sehingga menjadi seperti lidi atau stik tipis. Biasanya mi lidi ini digoreng dalam minyak panas hingga menjadi renyah dan sering disajikan sebagai camilan atau tambahan pada hidangan seperti bakso atau mie kuah. Mi lidi memiliki tekstur yang renyah dan ringan serta sering diolah dengan berbagai bumbu dan rempah untuk memberikan cita rasa yang khas.', '1,2', '2,3'),
(11, 'Basreng', 7000, 2, '1717398087Basreng Original.jpeg', 'Basreng adalah singkatan dari \"Bakso Goreng\", merupakan camilan populer di Indonesia. Basreng terbuat dari campuran bakso yang dicincang, tepung terigu, dan berbagai bumbu rempah lainnya. Adonan kemudian dibentuk bulat dan digoreng hingga berwarna kecokelatan dan renyah. Biasanya, basreng disajikan dengan taburan bumbu seperti bubuk cabe atau balutan saus sambal untuk memberikan rasa pedas yang khas. Camilan ini memiliki cita rasa gurih, pedas, dan renyah yang sangat disukai oleh banyak orang di Indonesia.\r\n\r\nKomposisi umum dari basreng meliputi:\r\n\r\n1. Bakso: Bakso yang digunakan bisa berupa bakso sapi, ayam, atau campuran kedua jenis bakso tersebut. Bakso dihaluskan atau dicincang kecil-kecil sebelum dicampur dengan bahan lainnya.\r\n\r\n2. Tepung Terigu: Tepung terigu berfungsi sebagai bahan pengikat untuk adonan basreng. Tepung terigu biasanya digunakan dalam proporsi yang cukup untuk memberikan tekstur yang renyah setelah digoreng.\r\n\r\n3. Bumbu Rempah: Bumbu rempah seperti bawang putih, bawang merah, ketumbar, garam, merica, dan penyedap rasa bisa ditambahkan untuk memberikan cita rasa yang khas pada basreng.\r\n\r\n4. Telur: Kadang-kadang telur juga ditambahkan untuk memberikan kekenyalan dan rasa yang lebih kaya pada adonan basreng.\r\n\r\n5. Penyedap Rasa: Penyedap rasa atau bumbu tambahan lainnya seperti gula, kaldu bubuk, atau bumbu lainnya bisa ditambahkan sesuai selera untuk meningkatkan cita rasa basreng.', '1', '3'),
(12, 'Keripik Usus Goreng', 5000, 6, '1717398449Keripik Usus.jpg', 'Keripik usus adalah camilan yang terbuat dari usus hewan yang dipotong tipis, kemudian digoreng hingga renyah. Camilan ini populer di berbagai belahan dunia, terutama di banyak negara Asia dan Eropa.\r\n\r\nKomposisi umum dari keripik usus meliputi:\r\n\r\n1. Usus: Usus hewan seperti sapi, ayam, atau babi yang telah dibersihkan dan dipotong tipis menjadi bagian-bagian kecil. Usus yang digunakan biasanya adalah bagian usus halus atau usus besar.\r\n\r\n2. Tepung: Tepung terigu atau tepung bumbu digunakan sebagai bahan pengikat dan penambah tekstur pada adonan keripik. Tepung juga membantu dalam menciptakan lapisan renyah di luar usus saat digoreng.\r\n\r\n3. Bumbu: Bumbu-bumbu seperti garam, merica, bawang putih bubuk, bawang merah bubuk, paprika, atau bumbu lainnya ditambahkan untuk memberikan rasa dan aroma yang khas pada keripik usus.\r\n\r\n4. Minyak: Minyak digunakan untuk menggoreng keripik usus hingga matang dan berwarna kecokelatan. Minyak yang digunakan biasanya minyak nabati seperti minyak kedelai atau minyak jagung.', '1,2,3', '2,3'),
(13, 'Makaroni', 7000, 10, '1717398839download.jpeg', 'Makaroni adalah jenis pasta yang terbuat dari campuran tepung terigu dan air, yang dibentuk menjadi silinder panjang dan pipih. Makaroni memiliki tekstur yang kenyal saat dimasak dan biasanya direbus sebelum disajikan. Camilan atau hidangan berbahan makaroni sering kali dimasak dengan saus atau dicampur dengan bahan lain seperti daging, sayuran, atau keju. Makaroni dapat disajikan sebagai hidangan utama atau sebagai camilan, dan sangat populer di berbagai masakan di seluruh dunia.\r\n\r\nKomposisi dasar :  \r\nmakaroni terdiri dari tepung terigu, air, dan biasanya sedikit garam. Tepung terigu dicampur dengan air hingga membentuk adonan yang elastis, kemudian adonan tersebut dibentuk menjadi silinder panjang dan dipotong-potong menjadi bentuk makaroni. Beberapa varian makaroni mungkin juga ditambahkan telur untuk memberikan kekayaan rasa dan warna yang lebih khas. Setelah dibentuk, makaroni kemudian direbus dalam air garam hingga matang sebelum disajikan atau diolah lebih lanjut dalam berbagai hidangan.', '1,2,3', '2,3'),
(14, 'Kerupuk Seblak', 3500, 7, '1717399055Kerupuk Seblak.jpg', 'Kerupuk seblak adalah camilan yang terbuat dari kerupuk basah yang kemudian digoreng dan disajikan dengan bumbu-bumbu kering atau bumbu basah yang khas. Kerupuk basah yang digunakan biasanya terbuat dari tepung tapioka atau tepung kanji yang dicampur dengan air hingga membentuk adonan yang kental. \r\n\r\nKomposisi dasar dari kerupuk seblak antara lain meliputi:\r\n\r\n1. Kerupuk basah: Tepung tapioka atau tepung kanji yang dicampur dengan air dan bumbu-bumbu lainnya untuk membentuk adonan kerupuk.\r\n\r\n2. Bumbu-bumbu: Bumbu-bumbu seperti cabe bubuk, bawang putih, bawang merah, garam, gula, dan penyedap rasa lainnya seperti kaldu bubuk seringkali digunakan untuk memberikan cita rasa pedas, gurih, dan sedikit manis pada kerupuk seblak.\r\n\r\n3. Tambahkan bahan lain: Beberapa variasi kerupuk seblak bisa juga ditambahkan dengan bahan tambahan seperti kerupuk kering, kacang tanah, kerupuk mie, atau bahan lainnya sesuai selera dan kreasi masing-masing.', '1,2,3', '2,3'),
(15, 'Keripik kaca', 5500, 15, '1717399271Keripik Kaca.jpeg', 'Keripik kaca adalah camilan yang terbuat dari adonan tipis yang kemudian dipanggang atau digoreng hingga menjadi keripik yang kering dan transparan, menyerupai kaca. Camilan ini memiliki tekstur yang sangat renyah dan seringkali disajikan dengan berbagai bumbu atau rasa tambahan.\r\n\r\nKomposisi dasar dari keripik kaca secara singkat adalah:\r\n\r\n1. Tepung: Tepung terigu atau tepung jagung merupakan bahan utama dalam membuat adonan keripik kaca.\r\n\r\n2. Air: Air digunakan untuk mencampur tepung dan membentuk adonan yang kental.\r\n\r\n3. Minyak: Minyak digunakan untuk memperoleh tekstur yang renyah dan membantu proses pembentukan adonan menjadi keripik.\r\n\r\n4. Bumbu: Bumbu-bumbu seperti garam, merica, bawang putih bubuk, atau bumbu lainnya sering ditambahkan untuk memberikan rasa pada keripik kaca. Beberapa varian juga bisa memiliki tambahan rasa seperti keju, pedas, atau manis sesuai dengan preferensi.', '1,2,3', '2,3'),
(16, 'Kerupuk Pilus', 3500, 18, '1717399498Kerupuk pilus.jpg', 'Kerupuk pilus adalah camilan khas Indonesia yang terbuat dari adonan tepung tapioka yang ditarik tipis-tipis lalu digoreng hingga mengembang dan menjadi keriting. Camilan ini memiliki tekstur yang sangat renyah dan biasanya disajikan sebagai pelengkap hidangan atau sebagai camilan ringan.\r\n\r\nKomposisi dasar dari kerupuk pilus secara singkat adalah:\r\n\r\n1. Tepung Tapioka: Tepung tapioka merupakan bahan utama dalam pembuatan kerupuk pilus. Tepung ini memberikan kerupuk tekstur yang kenyal dan renyah.\r\n\r\n2. Air: Air digunakan untuk mencampur tepung tapioka menjadi adonan yang kental dan elastis.\r\n\r\n3. Garam: Garam ditambahkan untuk memberikan sedikit rasa pada kerupuk pilus.\r\n\r\n4. Minyak: Minyak digunakan untuk menggoreng kerupuk hingga matang dan kriuk.', '1,2,3', '2,3'),
(17, 'Keripik Tempe', 7000, 13, '1717399744Keripik Tempe.jpg', 'Keripik tempe adalah camilan yang terbuat dari tempe yang dipotong tipis-tipis, kemudian digoreng hingga menjadi renyah. Tempe sendiri merupakan makanan tradisional Indonesia yang terbuat dari fermentasi biji kedelai.\r\n\r\nKomposisi dasar dari keripik tempe secara singkat adalah:\r\n\r\n1. Tempe: Tempe yang telah matang dan dingin dipotong tipis-tipis menjadi irisan yang seragam untuk dijadikan keripik.\r\n\r\n2. Tepung: Tepung terigu atau tepung beras digunakan sebagai bahan pelapis untuk memberikan tekstur renyah pada keripik tempe setelah digoreng.\r\n\r\n3. Bumbu: Bumbu-bumbu seperti garam, merica, bawang putih, atau bumbu lainnya dapat ditambahkan untuk memberikan cita rasa yang khas pada keripik tempe.\r\n\r\n4. Minyak: Minyak digunakan untuk menggoreng keripik tempe hingga matang dan berwarna kecokelatan.', '1,2,3', '2,3');

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
('22-130 Ahmad Ar-rosyid Hidayatullah', 1, '089514735600', 'Rosyid711', 'sayasukakrupuk', 'ychronos13@gmail.com', 'Planet Bekasi, Jl. Margonda Gg.Melati No.3', 'Bekasi', 55, 'DKI Jakarta', 6, 'Default-Profile.svg'),
('Adyan', 2, '081357999222', 'adyan98', '123456', 'adyan@gmail.com', 'Babat, Sukodadi, Jalan Kartini No.99 Kiri Jalan', 'Lamongan', 222, 'Jawa Timur', 11, 'Default-Profile.svg'),
('Apa Cona', 4, '089514735692', 'apacona123', 'Cona123', 'apacona1967@gmail.com', 'Babat, Sukodadi, Jalan Kartini No.99 Kiri Jalan', 'Balikpapan', 19, 'Kalimantan Timur', 15, 'Default-Profile.svg'),
('Habibur', 5, '089786567453', 'habibur23', 'joko23', 'Habibur23@gmail.com', 'Kedinding Lor Gg Apel', '', 441, '', 11, 'Default-Profile.svg');

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
  `BERAT` int(11) NOT NULL,
  `ID_KATEGORI` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`ID_ORDER_DETAIL`, `ID_BARANG`, `ID_ORDER`, `JUMLAH_PRODUK`, `HARGA`, `BERAT`, `ID_KATEGORI`) VALUES
(32, 14, 28, 2, 7000, 200, 2),
(33, 14, 28, 2, 7000, 200, 3),
(34, 14, 28, 1, 3500, 500, 2),
(35, 10, 29, 1, 5000, 250, 3),
(36, 11, 30, 1, 7000, 100, 3),
(37, 17, 31, 1, 7000, 100, 2),
(38, 11, 32, 1, 7000, 100, 3);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `ID_KATEGORI` int(11) NOT NULL,
  `NAMA_KATEGORI` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`ID_KATEGORI`, `NAMA_KATEGORI`) VALUES
(1, 'Manis'),
(2, 'Pedas'),
(3, 'Gurih');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `ID_KERANJANG` int(11) NOT NULL,
  `ID_CUSTOMER` int(11) DEFAULT NULL,
  `ID_BARANG` varchar(50) NOT NULL,
  `ID_UKURAN` int(11) NOT NULL DEFAULT 1,
  `ID_KATEGORI` int(11) NOT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `metode_pembayaran`
--

CREATE TABLE `metode_pembayaran` (
  `ID_METODE_PEMBAYARAN` int(11) NOT NULL,
  `NAMA_METODE_PEMBAYARAN` varchar(50) DEFAULT NULL,
  `REKENING` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `metode_pembayaran`
--

INSERT INTO `metode_pembayaran` (`ID_METODE_PEMBAYARAN`, `NAMA_METODE_PEMBAYARAN`, `REKENING`) VALUES
(4, 'Bank Jatim', '9908123256742323'),
(5, 'BRI', '0989098798763422'),
(6, 'Bank Jatim', '1234123412341234'),
(7, 'Bank Jatim', '1234123412341234'),
(8, 'Bank Jatim', '1234123412341234');

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
(28, 4, 1, '2024-06-03 09:14:37', 24500, 1),
(29, 5, 1, '2024-06-03 09:40:08', 12000, 2),
(30, 6, 1, '2024-06-03 09:53:50', 14000, 0),
(31, 7, 1, '2024-06-03 09:55:33', 14000, 0),
(32, 8, 1, '2024-06-03 09:59:44', 14000, 2);

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
  ADD UNIQUE KEY `BARANG_PK` (`ID_BARANG`);

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
  ADD KEY `MEMESAN_FK` (`ID_BARANG`),
  ADD KEY `FK_KATEGORI_D_PESANAN` (`ID_KATEGORI`);

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
  ADD KEY `FK_UKURAN_BARANG_KERANJANG` (`ID_UKURAN`),
  ADD KEY `FK_KERANJANG_BARANGKATEGORI` (`ID_KATEGORI`);

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
  MODIFY `ID_BARANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ID_CUSTOMER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `ID_ORDER_DETAIL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `ID_KATEGORI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `ID_KERANJANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `ID_KOMENTAR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `metode_pembayaran`
--
ALTER TABLE `metode_pembayaran`
  MODIFY `ID_METODE_PEMBAYARAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `ID_ORDER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `ukuran_barang`
--
ALTER TABLE `ukuran_barang`
  MODIFY `ID_UKURAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `FK_DETAIL_P_MEMESAN_BARANG` FOREIGN KEY (`ID_BARANG`) REFERENCES `barang` (`ID_BARANG`),
  ADD CONSTRAINT `FK_KATEGORI_D_PESANAN` FOREIGN KEY (`ID_KATEGORI`) REFERENCES `kategori` (`ID_KATEGORI`),
  ADD CONSTRAINT `FK_PESANAN` FOREIGN KEY (`ID_ORDER`) REFERENCES `pesanan` (`ID_ORDER`);

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `FK_KERANJANG_BARANGKATEGORI` FOREIGN KEY (`ID_KATEGORI`) REFERENCES `kategori` (`ID_KATEGORI`),
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
