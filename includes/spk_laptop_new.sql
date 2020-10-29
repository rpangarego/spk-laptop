-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2020 at 02:17 PM
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
(1, '128GB', 0.2),
(2, '256GB', 0.4),
(3, '500GB', 0.6),
(4, '1TB', 0.8),
(5, '2TB', 1);

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
(1, 'Intel', 'Intel Pentium', 0.2),
(2, 'Intel', 'Intel Celeron', 0.4),
(3, 'Intel', 'Intel Core i3', 0.6),
(4, 'Intel', 'Intel Core i5', 0.8),
(5, 'Intel', 'Intel Core i7', 1),
(6, 'AMD', 'AMD A Series', 0.2),
(7, 'AMD', 'AMD FX Series', 0.4),
(8, 'AMD', 'AMD Ryzen 3', 0.6),
(9, 'Intel', 'AMD Ryzen 5', 0.8),
(10, 'Intel', 'AMD Ryzen 7', 1);

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
(1, 'Asus', 'Zenbook Pro Duo UX481FA', 16300000, 4, '10210U', '3.2 GHz', 3, 'DDR4', 4, 2, 5, 'RTX2060', 15, '1366X768', 'Windows 10', '2.3', '35,9 x 24,6 x 2,20 cm', '71Wh 8-cell Li-Polymer', 'asus_zenbook_pro_duo.jpg'),
(2, 'Asus', 'Vivobook 14 X412FL', 9200000, 3, '8145U', '3 GHz', 2, 'DDR4', 3, 2, 4, 'MX250', 14, '1366X768', 'Windows 10 Home', '1.5', '322 x 212 x 19.9 mm', '42WHr Battery', 'asus_vivobook_14.jpg'),
(3, 'Asus', 'E202SA-FD111D', 3268000, 2, 'N3050', '2.16 GHz', 1, 'DDR3L', 3, 1, 1, 'Graphics', 11.6, '1920x1080', 'DOS', '1.8', '35,9 x 24,6 x 2,20 cm', '3Cells 48 WHRS Polymer', '5d996c9a9ee6a_5d996c9a9ee6e.jpeg'),
(4, 'Asus', 'A455LA', 5210000, 3, '9012X', '2.6 GHz', 3, 'DDR3', 3, 1, 1, 'Graphics', 12, '1366X768', 'Free DOS', '1.5', '322 x 212 x 19.9 mm', 'Li-ion 6cell', '5d9969d68f4b5_5d9969d68f4b9.jpg'),
(5, 'Asus', 'X550VX', 10699000, 5, '8324U', '3.2 GHz', 3, 'DDR3L', 4, 2, 2, 'RTX2060', 15.6, '1920x1080', 'Windows 10', '2', '35,9 x 24,6 x 2,20 cm', 'Li-ion 4cell', '5d99664022ee7_5d99664022eeb.jpg'),
(6, 'Acer', 'Aspire E5-475G', 7290000, 7, '3204X', '2.8 GHz', 2, 'DDR3L', 3, 1, 1, 'Graphics', 12, '1366x720', 'Windows 10 Home', '1.2', '323 x 212 x 19.9 mm', '', '5d996c9a9ee6a_5d996c9a9ee6e.jpeg'),
(7, 'Acer', 'Aspire 4740', 9045000, 3, '6127M', '3 GHz', 2, 'DDR4', 3, 1, 3, 'RTX1060', 14, '1366x720', 'Free DOS', '1.4', '35,9 x 24,6 x 2,20 cm', '', '5d9964ddcfe9c_5d9964ddcfea1.jpg'),
(8, 'Acer', 'Aspire A315', 7600000, 9, '3500U', '3.2GHz', 3, 'DDR4', 3, 1, 2, 'RTX2060', 15.6, '1366X768', 'Windows 11', '2.3', '35,9 x 24,6 x 2,20 cm', '71Wh 8-cell Li-Polymer', '5d94203516ad7.jpg'),
(9, 'Acer', 'Aspire 3 A314', 3500000, 6, '9120E', '3.2 GHz', 2, 'DDR4', 4, 1, 2, 'MX250', 15, '1366X768', 'Windows 10 Home', '1.5', '323 x 212 x 19.9 mm', '42WHr Battery', '6f427041edac07e0bdded4e5b647fd9e.jpg'),
(10, 'Acer', 'Nitro 5 AN515', 10300000, 9, '3550h', '2.1 GHz', 3, 'DDR3L', 3, 2, 5, 'Graphics', 12, '1920x1081', 'DOS', '1.8', '35,9 x 24,6 x 2,20 cm', '3Cells 48 WHRS Polymer', '5d4d1c4872b4a.jpg'),
(11, 'Apple', 'MacBook Air [MQD32ID/A]', 14999000, 4, 'N3051', '3.2 GHz', 2, 'DDR4', 1, 2, 1, 'Graphics', 14, '1366X769', 'Mac OS', '1.5', '323 x 212 x 19.9 mm', 'Li-ion 6cell', '5a5425323ba7a.jpg'),
(12, 'Apple', 'MacBook Pro [MV922ID/A]', 33250000, 4, '6-core', '3 GHz', 4, 'DDR3L', 2, 2, 5, ' Pro 555X', 14, '1920x1081', 'Mac OS', '2', '35,9 x 24,6 x 2,20 cm', 'Li-ion 4cell', '5d2ede54d1654.jpg'),
(13, 'Apple', 'MacBook Pro [MV922ID/A]', 36739000, 5, '8324U', '2.16 GHz', 4, 'DDR3L', 2, 2, 5, ' Pro 555X', 15.6, '1920x1080', 'Mac OS', '1.2', '324 x 212 x 19.9 mm', '', '5bbeccd9f1866.jpg'),
(14, 'HP', 'Pavilion - 13-AN1033TU', 8250000, 3, '8145U', '2.8 GHz', 3, 'DDR4', 3, 2, 1, 'Graphics', 13.3, '1920x1083', 'DOS', '2', '35,9 x 24,6 x 2,20 cm', '', '8TN70PA-1_T1578464800.png'),
(15, 'HP', 'Notebook - 14S-cF1046TU', 3299000, 2, 'Dual-Core', '2.6 GHz', 1, 'DDR3L', 4, 1, 1, 'Graphics', 14, '1920x1080', 'Windows 10', '1.2', '323 x 212 x 19.9 mm', '71Wh 8-cell Li-Polymer', '8LB26PA-1_T1590561958.png'),
(16, 'Lenovo', 'Notebook V130', 7050000, 3, '7020U', '2.8 GHz', 2, 'DDR4', 4, 1, 1, 'Graphics', 15.6, '1366X768', 'Windows 10 Home', '1.5', '324 x 212 x 19.9 mm', '42WHr Battery', '5c91fa3535a17.jpg'),
(17, 'Lenovo', 'IdeaPad C340-14IWL', 8999000, 3, '10110U', '3 GHz', 3, 'DDR3L', 3, 1, 1, 'Graphics', 15, '1366X768', 'DOS', '1.8', '35,9 x 24,6 x 2,20 cm', '3Cells 48 WHRS Polymer', '5df3390320e37.jpg'),
(18, 'Lenovo', 'IdeaPad IP340-14IKB', 5860000, 9, '8145U', '3.2GHz', 2, 'DDR4', 3, 1, 2, 'RTX2060', 15.6, '1366X770', 'Free DOS', '1.5', '324 x 212 x 19.9 mm', 'Li-ion 6cell', '5e27ba6901988.jpg'),
(19, 'Lenovo', 'IdeaPad S145-14IWL', 8499000, 4, '8265U', '3.2 GHz', 3, 'DDR3L', 4, 1, 8, 'MX110', 12, '1920x1082', 'DOS', '2', '35,9 x 24,6 x 2,20 cm', 'Li-ion 4cell', '5dd38c7f806bd.jpg'),
(20, 'Lenovo', 'IdeaPad S340', 12350000, 5, '10510U', '2.1 GHz', 3, 'DDR4', 4, 1, 8, 'MX230', 14, '1366x720', 'Windows 10', '1.2', '325 x 212 x 19.9 mm', '71Wh 8-cell Li-Polymer', 'Lenovo_IdeaPad_S340_14_L_1.jpg'),
(21, 'Dell', 'XPS 13 9370', 25376000, 5, '8550U', '4.00 GHz', 3, 'DDR4', 2, 2, 1, 'Graphics', 13.3, '1920x1080', 'Windows 10 Home', '2.3', '35,9 x 24,6 x 2,20 cm', '3Cells 48 WHRS Polymer', '5cc6a847d3f1b.jpg'),
(22, 'Dell', 'Inspiron 14 5491 2 in 1', 13450000, 4, '1051U', '3.2 GHz', 3, 'DDR4', 3, 2, 8, 'MX230', 14, '1366x720', 'Windows 10', '1.8', '325 x 212 x 19.9 mm', 'Li-ion 6cell', 'Dell-Inspiron-14-5491-2-in-1-5bef4.jpg'),
(23, 'Dell', 'Vostro 3480', 8650000, 4, '8265U', '2.6 GHz', 2, 'DDR3L', 4, 1, 5, '520', 14, '1366X768', 'Windows 10', '1.8', '35,9 x 24,6 x 2,20 cm', 'Li-ion 4cell', 'notebook-vostro-14-3480.jpg'),
(24, 'Dell', 'Inspiron 13-5368', 8990000, 3, '10210U', '3.2 GHz', 2, 'DDR4', 4, 1, 2, 'RTX1060', 15, '1366X768', 'Windows 10 Home', '1.5', '323 x 212 x 19.9 mm', '', '5d996a9471279_5d996a947127e.jpg');

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
  MODIFY `id_penyimpanan` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_processor`
--
ALTER TABLE `tb_processor`
  MODIFY `id_processor` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
