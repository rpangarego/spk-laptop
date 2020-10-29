-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2020 at 02:58 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_laptop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(3) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(7, 'admin', 'admin', 'admin'),
(9, 'Ronaldo Pangarego', 'user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenispenyimpanan`
--

CREATE TABLE `tb_jenispenyimpanan` (
  `id_jenispenyimpanan` int(3) NOT NULL,
  `jenispenyimpanan` varchar(10) NOT NULL,
  `value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenispenyimpanan`
--

INSERT INTO `tb_jenispenyimpanan` (`id_jenispenyimpanan`, `jenispenyimpanan`, `value`) VALUES
(1, 'HDD', 0.6),
(2, 'SSD', 0.8);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kartugrafis`
--

CREATE TABLE `tb_kartugrafis` (
  `id_kartugrafis` int(3) NOT NULL,
  `kartugrafis` varchar(20) NOT NULL,
  `vram` varchar(10) NOT NULL,
  `value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kartugrafis`
--

INSERT INTO `tb_kartugrafis` (`id_kartugrafis`, `kartugrafis`, `vram`, `value`) VALUES
(1, 'Intel HD', '&lt;2GB', 0.2),
(2, 'AMD E Series', '&lt;2GB', 0.2),
(3, 'Radeon Apu Series', '&lt;2GB', 0.4),
(4, 'Radeon', '&lt;2GB', 0.6),
(5, 'Radeon', '2GB', 0.8),
(6, 'Radeon', '&gt;2GB', 1),
(7, 'Geforce', '&lt;2GB', 0.6),
(8, 'Geforce', '2GB', 0.8),
(9, 'Geforce', '&gt;2GB', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_memori`
--

CREATE TABLE `tb_memori` (
  `id_memori` int(3) NOT NULL,
  `memori` varchar(10) NOT NULL,
  `value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_memori`
--

INSERT INTO `tb_memori` (`id_memori`, `memori`, `value`) VALUES
(1, '2GB', 0.2),
(2, '4GB', 0.4),
(3, '8GB', 0.6),
(4, '16GB', 0.8),
(5, '32GB', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penyimpanan`
--

CREATE TABLE `tb_penyimpanan` (
  `id_penyimpanan` int(3) NOT NULL,
  `penyimpanan` varchar(10) NOT NULL,
  `value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penyimpanan`
--

INSERT INTO `tb_penyimpanan` (`id_penyimpanan`, `penyimpanan`, `value`) VALUES
(1, '128GB', 0.15),
(2, '256GB', 0.3),
(3, '320GB', 0.45),
(4, '500GB', 0.6),
(5, '1TB', 0.8),
(6, '2TB', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_processor`
--

CREATE TABLE `tb_processor` (
  `id_processor` int(3) NOT NULL,
  `processor` varchar(10) NOT NULL,
  `detailProcessor` varchar(20) NOT NULL,
  `value` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_processor`
--

INSERT INTO `tb_processor` (`id_processor`, `processor`, `detailProcessor`, `value`) VALUES
(1, 'Intel', 'Intel Celeron', 0.25),
(2, 'Intel', 'Intel Core i3', 0.5),
(3, 'Intel', 'Intel Core i5', 0.75),
(4, 'Intel', 'Intel Core i7', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(3) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `tipe_brand` varchar(40) NOT NULL,
  `harga` int(10) NOT NULL,
  `id_processor` int(3) NOT NULL,
  `seri_processor` varchar(10) NOT NULL,
  `kecepatan_processor` varchar(10) NOT NULL,
  `id_memori` int(3) NOT NULL,
  `tipe_memori` varchar(10) NOT NULL,
  `id_penyimpanan` int(3) NOT NULL,
  `id_jenispenyimpanan` int(3) NOT NULL,
  `id_kartugrafis` int(3) NOT NULL,
  `seri_kartugrafis` varchar(10) NOT NULL,
  `layar` float NOT NULL,
  `resolusi` varchar(10) DEFAULT NULL,
  `sistem_operasi` varchar(25) NOT NULL,
  `berat` varchar(10) DEFAULT NULL,
  `dimensi` varchar(30) DEFAULT NULL,
  `baterai` varchar(30) DEFAULT NULL,
  `foto_produk` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `brand`, `tipe_brand`, `harga`, `id_processor`, `seri_processor`, `kecepatan_processor`, `id_memori`, `tipe_memori`, `id_penyimpanan`, `id_jenispenyimpanan`, `id_kartugrafis`, `seri_kartugrafis`, `layar`, `resolusi`, `sistem_operasi`, `berat`, `dimensi`, `baterai`, `foto_produk`) VALUES
(1, 'Asus', 'E202SA-FD111D', 3268000, 1, '12Y', '2.7GHz', 1, 'DDR3L', 4, 1, 1, '8550', 12, '1366x720', 'Windows 8 Home', '1.2', '', 'Li-ion 4cell', '5d996c9a9ee6a_5d996c9a9ee6e.jpeg'),
(2, 'Acer', 'Aspire E5-475G', 7290000, 3, '13X', '3.1GHz', 2, 'DDR3L', 5, 1, 3, '8921', 15.6, '1920x1080', 'Windows 10 ', '1', '', 'Li-ion 3cell', '5d996c53337e5_5d996c53337ea.jpg'),
(3, 'Lenovo', 'IdeaPad 310-14LKB', 7155000, 3, '14P', '2.5GHz', 2, 'DDR3L', 5, 1, 3, '2312', 14, '1920x1080', 'Free DOS', '1.8', '', 'Li-ion 3cell', '5d996bbcdc147_5d996bbcdc14b.png'),
(4, 'Dell', 'Inspiron 13-5368', 8990000, 2, '15B', '2.5GHz', 2, 'DDR3', 4, 1, 2, '4364', 14, '1920x1080', 'Windows 8 Home', '1.1', '', 'Li-ion 3cell', '5d996a9471279_5d996a947127e.jpg'),
(5, 'Asus', 'A455LA', 5210000, 2, '16I', '2.7GHz', 2, 'DDR4', 4, 1, 1, '1315', 12, '1366x720', 'Free DOS', '1.5', '', 'Li-ion 6cell', '5d9969d68f4b5_5d9969d68f4b9.jpg'),
(6, 'Asus', 'X550VX', 10699000, 4, '17A', '3.1GHz', 3, 'DDR3L', 5, 2, 7, '5463', 15.6, '1920x1080', 'Windows 10 ', '2', '', 'Li-ion 4cell', '5d99664022ee7_5d99664022eeb.jpg'),
(7, 'Acer', 'Aspire 4740', 9045000, 2, '18V', '2.7GHz', 1, 'DDR4', 2, 2, 5, '3244', 14, '1366x720', 'Free DOS', '1', '35x12x0.5', 'Li-ion 3cell', '5d9964ddcfe9c_5d9964ddcfea1.jpg'),
(8, 'Apple', 'Macbook Pro MF-839', 16790000, 3, '19M', '3.2', 3, 'DDR4', 1, 2, 8, '1351', 13, '1920x1080', 'MacOS', '0.8', '', 'Li-ion 6cell', '5d99625c430cb_5d99625c430cf.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_jenispenyimpanan`
--
ALTER TABLE `tb_jenispenyimpanan`
  ADD PRIMARY KEY (`id_jenispenyimpanan`);

--
-- Indexes for table `tb_kartugrafis`
--
ALTER TABLE `tb_kartugrafis`
  ADD PRIMARY KEY (`id_kartugrafis`);

--
-- Indexes for table `tb_memori`
--
ALTER TABLE `tb_memori`
  ADD PRIMARY KEY (`id_memori`);

--
-- Indexes for table `tb_penyimpanan`
--
ALTER TABLE `tb_penyimpanan`
  ADD PRIMARY KEY (`id_penyimpanan`);

--
-- Indexes for table `tb_processor`
--
ALTER TABLE `tb_processor`
  ADD PRIMARY KEY (`id_processor`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_jenispenyimpanan`
--
ALTER TABLE `tb_jenispenyimpanan`
  MODIFY `id_jenispenyimpanan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_kartugrafis`
--
ALTER TABLE `tb_kartugrafis`
  MODIFY `id_kartugrafis` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_memori`
--
ALTER TABLE `tb_memori`
  MODIFY `id_memori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_penyimpanan`
--
ALTER TABLE `tb_penyimpanan`
  MODIFY `id_penyimpanan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_processor`
--
ALTER TABLE `tb_processor`
  MODIFY `id_processor` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
