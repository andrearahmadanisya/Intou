-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2021 at 09:04 AM
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
(1, 'admin', 'kr123');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `idbuku` int(10) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `total` int(10) NOT NULL,
  `tglmasuk` datetime NOT NULL DEFAULT current_timestamp(),
  `hargajual` int(100) NOT NULL,
  `hargabeli` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`idbuku`, `judul`, `category`, `penulis`, `total`, `tglmasuk`, `hargajual`, `hargabeli`) VALUES
(10, 'sister', 'a', 'andrea', 10, '0000-00-00 00:00:00', 200, 150),
(12, 'android', 'programming', 'andrea', 123, '0000-00-00 00:00:00', 150, 40),
(13, 'truebeauty', 'romance', 'w', 250, '2021-04-18 01:15:00', 130, 100),
(14, 'q', 'b', 'c', 1, '2021-04-18 01:15:00', 30, 10),
(15, 'q', 'q', 'q', 145, '0000-00-00 00:00:00', 30, 10),
(16, 'bismillah', 'yu ', 'bisa', 9999, '0000-00-00 00:00:00', 150, 70),
(17, 'h', 'h', 'h', 1, '0000-00-00 00:00:00', 30, 70),
(18, 'e', 'e', 'e', 112, '0000-00-00 00:00:00', 30, 70);

-- --------------------------------------------------------

--
-- Table structure for table `historybuku`
--

CREATE TABLE `historybuku` (
  `idbuku` int(10) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `total` int(10) NOT NULL,
  `tglmasuk` datetime NOT NULL,
  `hargajual` int(10) NOT NULL,
  `hargabeli` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `historybuku`
--

INSERT INTO `historybuku` (`idbuku`, `judul`, `category`, `penulis`, `total`, `tglmasuk`, `hargajual`, `hargabeli`) VALUES
(8, 'modul DIPL', 'programming', 'aslab', 145, '2021-04-18 01:15:00', 150, 40);

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
(0, 'andreare', 'agraria28', 12345, 'adr@gmail.comyuhu', 'jkt1'),
(5, 'rizka', 'bdg', 4567, 'rzk@gmail.com', 'bdg'),
(6, 'fitriswe', 'kepo', 909090, 'fitri@gmail.com', 'jawa'),
(8, 'rizka', 'wdw', 4444, 'rzk@gmail.com', 'bdg');

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
(1, 'andrearh', 'kavling agraria', 8123, 'adr@gmail.com', 'jakarta'),
(4, 'sindiy', 'cb', 890, 'qwe@gmail.com', 'mks1'),
(6, 'fitri1', 'd', 567, 'ert@gmail.com', 'jw'),
(9, 'rizka', 'jl. riung bandung 11', 1432, 'rty@gmail.com', 'bdg');

-- --------------------------------------------------------

--
-- Table structure for table `transaksimsk`
--

CREATE TABLE `transaksimsk` (
  `idtransaksi` int(100) NOT NULL,
  `idbuku` int(100) NOT NULL,
  `idsupplier` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `hargapcs` int(100) NOT NULL,
  `hargatotal` int(100) NOT NULL,
  `tgltransaksi` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksipjl`
--

CREATE TABLE `transaksipjl` (
  `idtransaksip` int(100) NOT NULL,
  `idbuku` int(100) NOT NULL,
  `idpelanggan` int(100) NOT NULL,
  `total` int(100) NOT NULL,
  `hargapcs` int(100) NOT NULL,
  `hargatotal` int(100) NOT NULL,
  `tgltransaksi` int(100) NOT NULL,
  `biayakirim` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD PRIMARY KEY (`idbuku`);

--
-- Indexes for table `historybuku`
--
ALTER TABLE `historybuku`
  ADD PRIMARY KEY (`idbuku`);

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
  ADD PRIMARY KEY (`idtransaksi`);

--
-- Indexes for table `transaksipjl`
--
ALTER TABLE `transaksipjl`
  ADD PRIMARY KEY (`idtransaksip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `idkaryawan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `idbuku` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `idpelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `idsupplier` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaksimsk`
--
ALTER TABLE `transaksimsk`
  MODIFY `idtransaksi` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksipjl`
--
ALTER TABLE `transaksipjl`
  MODIFY `idtransaksip` int(100) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
