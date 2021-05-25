-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2021 at 09:57 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `intou`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `idkaryawan` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`idkaryawan`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `idbuku` char(7) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `idcategory` int(10) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `stok` int(10) NOT NULL,
  `tglmasuk` datetime NOT NULL DEFAULT current_timestamp(),
  `hargajual` int(100) NOT NULL,
  `hargabeli` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`idbuku`, `judul`, `idcategory`, `penulis`, `stok`, `tglmasuk`, `hargajual`, `hargabeli`) VALUES
('13', 'truebeauty', 0, 'kim', 250, '2021-04-18 00:00:00', 130, 100),
('14', 'q', 0, 'c', 123, '0000-00-00 00:00:00', 30, 10),
('15', 'q', 0, 'q', 145, '0000-00-00 00:00:00', 30, 10),
('16', 'bismillah', 0, 'bisa', 9999, '0000-00-00 00:00:00', 150, 70),
('20', 'dwe', 0, 'adw', 12, '2021-04-21 20:06:52', 70, 100),
('21', 'a', 0, 'andrea', 111, '2021-04-22 06:37:00', 30, 70),
('22', 'android', 0, 'andrea', 112, '2021-04-22 22:37:00', 30, 100),
('23', 'baru', 0, 'andrea', 122, '2021-05-07 11:28:00', 30, 70),
('B000026', 'Detektif Conan 2', 5, '', 0, '2021-05-13 16:49:07', 35000, 28000),
('B000027', 'Aku Kamu dan Dia', 2, '', 50, '2021-05-13 17:40:05', 95000, 70000),
('B000028', 'Ily3000', 2, '', 1400, '2021-05-13 19:32:35', 100000, 70000),
('B000029', 'sister', 4, '', 281, '2021-05-13 22:25:59', 130, 70),
('B000030', 'Create your android app', 4, '', 50, '2021-05-14 19:56:12', 100000, 80000),
('B000031', 'Anti fan', 2, '', 7, '2021-05-14 20:17:53', 120000, 80000),
('B000032', 'Machine Learning(N-gram)', 6, '', 5, '2021-05-14 21:07:24', 140000, 100000),
('B000033', 'How to Create app using Flutter', 4, 'Scott Cornell', 0, '2021-05-17 09:39:39', 130000, 95000),
('B000034', '(Soul) Mate', 2, 'nonalada', 55, '2021-05-20 10:11:16', 95000, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `idcategory` int(10) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`idcategory`, `category`) VALUES
(1, 'Thriller'),
(2, 'Romance'),
(4, 'Programming'),
(5, 'Komik'),
(6, 'Computer Science'),
(7, 'Historical');

-- --------------------------------------------------------

--
-- Table structure for table `historybuku`
--

CREATE TABLE `historybuku` (
  `idbuku` char(7) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `idcategory` int(10) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `stok` int(10) NOT NULL,
  `tglmasuk` datetime NOT NULL,
  `hargajual` int(10) NOT NULL,
  `hargabeli` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `historybuku`
--

INSERT INTO `historybuku` (`idbuku`, `judul`, `idcategory`, `penulis`, `stok`, `tglmasuk`, `hargajual`, `hargabeli`) VALUES
('10', 'sister', 0, 'andrea', 10, '0000-00-00 00:00:00', 200, 150),
('17', 'h', 0, 'h', 1, '0000-00-00 00:00:00', 30, 70),
('18', 'e', 0, 'e', 112, '0000-00-00 00:00:00', 30, 70),
('19', 'z', 0, 'z', 123, '0000-00-00 00:00:00', 30, 70),
('8', 'modul DIPL', 0, 'aslab', 145, '2021-04-18 01:15:00', 150, 40),
('B000024', 'android', 4, '', 0, '2021-05-13 11:11:34', 0, 0),
('B000025', 'Truebeauty', 2, '', 0, '2021-05-13 11:54:43', 100000, 80000);

-- --------------------------------------------------------

--
-- Table structure for table `laporanpembelian`
--

CREATE TABLE `laporanpembelian` (
  `idtransaksi` int(100) NOT NULL,
  `idbuku` int(100) NOT NULL,
  `hargasatuan` int(100) NOT NULL,
  `hargatotal` int(100) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `laporanpenjualan`
--

CREATE TABLE `laporanpenjualan` (
  `idtransaksip` int(100) NOT NULL,
  `idbuku` int(100) NOT NULL,
  `hargasatuan` int(100) NOT NULL,
  `hargatotal` int(100) NOT NULL,
  `total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `idpelanggan` int(11) NOT NULL,
  `namapelanggan` varchar(100) NOT NULL,
  `alamatpelanggan` varchar(200) NOT NULL,
  `contactpelanggan` int(20) NOT NULL,
  `emailpelanggan` varchar(100) NOT NULL,
  `kotapelanggan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`idpelanggan`, `namapelanggan`, `alamatpelanggan`, `contactpelanggan`, `emailpelanggan`, `kotapelanggan`) VALUES
(5, 'rizkaa', 'bdg', 4567, 'rzk@gmail.com', 'bdgg'),
(6, 'fitriswe', 'kepo ii', 909090, 'fitri@gmail.com', 'jawa'),
(8, 'andrea', 'wdw', 44442, 'rzk@gmail.com', 'jkt'),
(9, 'fitri', 'jl....', 1234, 'fitri@gmail.com', 'jawa'),
(10, 'yeol', 'jl..', 6543, 'yeol@gmail.com', 'korea'),
(11, 'Lala', 'jl.agr', 8975436, 'lala@gmail.com', 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `idsupplier` int(10) NOT NULL,
  `namasupplier` varchar(100) NOT NULL,
  `alamatsupplier` varchar(500) NOT NULL,
  `contactsupplier` int(20) NOT NULL,
  `emailsupplier` varchar(100) NOT NULL,
  `kotasupplier` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`idsupplier`, `namasupplier`, `alamatsupplier`, `contactsupplier`, `emailsupplier`, `kotasupplier`) VALUES
(1, 'andrearhmdd', 'kavling agraria no.28-29', 8123, 'adr@gmail.com', 'jakarta'),
(4, 'sindiy', 'cb1', 890, 'qwe@gmail.com', 'mks1'),
(6, 'fitri1', 'd2', 567, 'ert@gmail.com', 'jw'),
(9, 'rizka', 'jl. riung bandung 11', 1432, 'rty@gmail.com', 'bdg'),
(10, 'yeol', 'jl....', 1297803, 'yeol@gmail.com', 'korsel'),
(11, 'wonu', 'jl...', 623457, 'wonu@gmail.com', 'gangnam'),
(13, 'Danin', 'jl....', 120678467, 'danin@gmail.com', 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `transaksimsk`
--

CREATE TABLE `transaksimsk` (
  `idtransaksi` char(16) NOT NULL,
  `idsupplier` int(10) NOT NULL,
  `id_buku` char(7) NOT NULL,
  `totalmasuk` int(100) NOT NULL,
  `hargapcs` int(100) NOT NULL,
  `hargatotal` int(100) NOT NULL,
  `tanggal_masuk` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksimsk`
--

INSERT INTO `transaksimsk` (`idtransaksi`, `idsupplier`, `id_buku`, `totalmasuk`, `hargapcs`, `hargatotal`, `tanggal_masuk`) VALUES
('36', 0, '0', 145, 2000, 4500000, '2021-04-22'),
('37', 0, '0', 145, 45000, 233, '2021-04-22'),
('T-BM-21051300001', 1, '0', 122, 45000, 4500000, '2021-05-13'),
('T-BM-21051300002', 1, 'B000026', 100, 45000, 4500000, '2021-05-13'),
('T-BM-21051300003', 10, 'B000028', 1456, 45000, 4500000, '2021-05-13'),
('T-BM-21051300004', 4, 'B000027', 120, 2000, 20000, '2021-05-13'),
('T-BM-21051300005', 9, 'B000029', 300, 10, 34, '2021-05-13'),
('TBM-0006', 6, 'B000030', 150, 80000, 4500000, '2021-05-14'),
('TBM-0007', 11, 'B000031', 10, 45000, 4500000, '0000-00-00'),
('TBM-0008', 1, 'B000027', 20, 45000, 4500000, '0000-00-00'),
('TBM-0009', 10, 'B000029', 3, 45000, 4500000, '2021-05-14'),
('TBM-0010', 10, 'B000032', 10, 45000, 4500000, '2021-05-16'),
('TBM-0011', 1, 'B000031', 2, 45000, 4500000, '2021-05-16'),
('TBM-0012', 13, 'B000034', 55, 50000, 95000, '2021-05-20');

--
-- Triggers `transaksimsk`
--
DELIMITER $$
CREATE TRIGGER `update_masuk` BEFORE INSERT ON `transaksimsk` FOR EACH ROW UPDATE `buku` SET `buku`.`stok` = `buku`.`stok` + NEW.totalmasuk WHERE `buku`.`idbuku` = NEW.id_buku
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaksipjl`
--

CREATE TABLE `transaksipjl` (
  `idpenjualan` char(16) NOT NULL,
  `id_buku` char(7) NOT NULL,
  `idpelanggan` int(10) NOT NULL,
  `qty` int(100) NOT NULL,
  `hargapcs` int(100) NOT NULL,
  `biayakirim` int(100) NOT NULL,
  `hargatotal` int(100) NOT NULL,
  `tanggal_keluar` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksipjl`
--

INSERT INTO `transaksipjl` (`idpenjualan`, `id_buku`, `idpelanggan`, `qty`, `hargapcs`, `biayakirim`, `hargatotal`, `tanggal_keluar`) VALUES
('TPJL-21', 'B000028', 10, 23, 45000, 2000, 4500000, '2021-05-14'),
('TPJL-22', 'B000030', 8, 50, 45000, 2000, 4500000, '0000-00-00'),
('TPJL-23', 'B000027', 10, 7, 45000, 2000, 4500000, '0000-00-00'),
('TPJL-24', 'B000028', 6, 33, 80000, 2000, 1600000, '0000-00-00'),
('TPJL-25', 'B000030', 5, 50, 45000, 2000, 4500000, '0000-00-00'),
('TPJL-26', 'B000031', 8, 5, 80000, 2000, 1600000, '2021-05-14'),
('TPJL-27', 'B000032', 8, 5, 45000, 2000, 4500000, '0000-00-00'),
('TPJL-28', 'B000031', 9, 3, 45000, 2000, 450000, '2021-05-16');

--
-- Triggers `transaksipjl`
--
DELIMITER $$
CREATE TRIGGER `update_penjualan` BEFORE INSERT ON `transaksipjl` FOR EACH ROW UPDATE `buku` SET `buku`.`stok` = `buku`.`stok` - NEW.qty WHERE `buku`.`idbuku` = NEW.id_buku
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`idkaryawan`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`idbuku`),
  ADD KEY `idcategory` (`idcategory`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idcategory`);

--
-- Indexes for table `historybuku`
--
ALTER TABLE `historybuku`
  ADD PRIMARY KEY (`idbuku`),
  ADD KEY `idcategory` (`idcategory`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idpelanggan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`idsupplier`);

--
-- Indexes for table `transaksimsk`
--
ALTER TABLE `transaksimsk`
  ADD PRIMARY KEY (`idtransaksi`),
  ADD KEY `idsupplier` (`idsupplier`),
  ADD KEY `idbuku` (`id_buku`),
  ADD KEY `idsupplier_2` (`idsupplier`);

--
-- Indexes for table `transaksipjl`
--
ALTER TABLE `transaksipjl`
  ADD PRIMARY KEY (`idpenjualan`),
  ADD KEY `idbuku` (`id_buku`),
  ADD KEY `idpelanggan` (`idpelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `idkaryawan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `idcategory` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `idpelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `idsupplier` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksipjl`
--
ALTER TABLE `transaksipjl`
  ADD CONSTRAINT `transaksipjl_ibfk_1` FOREIGN KEY (`idpelanggan`) REFERENCES `pelanggan` (`idpelanggan`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
