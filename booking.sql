-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2019 at 02:11 PM
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
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_kode` varchar(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_antrian` int(11) NOT NULL,
  `booking_plat` varchar(9) NOT NULL,
  `booking_layanan` enum('service','sparepart') NOT NULL,
  `booking_kendala` text NOT NULL,
  `booking_status` enum('menunggu','proses','selesai','batal') NOT NULL DEFAULT 'menunggu',
  `booking_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_kode`, `user_id`, `booking_antrian`, `booking_plat`, `booking_layanan`, `booking_kendala`, `booking_status`, `booking_tanggal`) VALUES
('SC1017131561159094', 13, 3, '', 'service', 'asd', 'selesai', '2019-06-22'),
('SC290101561159042', 10, 1, 'BG123', 'service', 'assd', 'selesai', '2019-06-22'),
('SC5585111561162192', 11, 4, 'BG123xc', 'service', 'asds', 'batal', '2019-06-22'),
('SP8107111561162265', 11, 5, 'BG123', 'sparepart', 'asd', 'menunggu', '2019-06-22'),
('SP9727141561159068', 14, 2, 'BG123xc', 'sparepart', 'asds', 'selesai', '2019-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `montir`
--

CREATE TABLE `montir` (
  `montir_id` int(11) NOT NULL,
  `montir_nama` varchar(50) NOT NULL,
  `montir_tel` char(12) NOT NULL,
  `montir_alamat` text NOT NULL,
  `montir_status` enum('aktif','nonaktif') NOT NULL,
  `montir_foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `montir`
--

INSERT INTO `montir` (`montir_id`, `montir_nama`, `montir_tel`, `montir_alamat`, `montir_status`, `montir_foto`) VALUES
(1, 'Wak dola', '089999', 'Jl antasari 1 no 87', 'aktif', 'default.png'),
(2, 'Wak Yen', '089999', 'Jl Rajawali 1 no 87', 'aktif', 'default.png'),
(3, 'Wak Ujang', '0189999', 'Jl Rajawali 1 no 87', 'aktif', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `pickup`
--

CREATE TABLE `pickup` (
  `pickup_id` int(11) NOT NULL,
  `booking_kode` varchar(20) NOT NULL,
  `montir_id` int(11) NOT NULL,
  `pickup_est_selesai` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `booking_kode` varchar(20) NOT NULL,
  `montir_id` int(11) NOT NULL,
  `transaksi_biaya` int(11) NOT NULL,
  `transaksi_keterangan` text NOT NULL,
  `transaksi_tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `booking_kode`, `montir_id`, `transaksi_biaya`, `transaksi_keterangan`, `transaksi_tanggal`) VALUES
(5, 'SC290101561159042', 1, 15000, '123', '2019-06-22 07:30:23'),
(6, 'SP9727141561159068', 2, 150000, 'tess', '2019-06-22 18:17:44'),
(7, 'SC1017131561159094', 3, 20000, 'asdsd', '2019-06-22 18:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(100) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_tel` char(12) NOT NULL,
  `user_tgl` date NOT NULL,
  `user_alamat` text NOT NULL,
  `user_role` enum('admin','customer') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_nama`, `user_username`, `user_password`, `user_email`, `user_tel`, `user_tgl`, `user_alamat`, `user_role`) VALUES
(10, 'Aditya Dharmawan Saputra', 'adityads', '202cb962ac59075b964b07152d234b70', 'adityads@ymail.com', '082371373347', '2019-06-17', 'jl.aaaa', 'customer'),
(11, 'Ahmad Rifai', 'fai', '202cb962ac59075b964b07152d234b70', 'fai@aaa.com', '08999', '2019-06-22', 'jl. aaaa', 'customer'),
(12, 'Admin', 'admin', '202cb962ac59075b964b07152d234b70', 'admin@aaa.com', '08999', '2019-06-22', 'aaa', 'admin'),
(13, 'Budiman', 'budi', '202cb962ac59075b964b07152d234b70', 'fad@sadas.com', '0899', '2019-06-22', 'aaa', 'customer'),
(14, 'rahmat', 'rahmat', '202cb962ac59075b964b07152d234b70', 'rah@aaa.com', '0888', '2019-06-22', 'asdsad', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_kode`);

--
-- Indexes for table `montir`
--
ALTER TABLE `montir`
  ADD PRIMARY KEY (`montir_id`);

--
-- Indexes for table `pickup`
--
ALTER TABLE `pickup`
  ADD PRIMARY KEY (`pickup_id`),
  ADD KEY `booking_kode` (`booking_kode`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`),
  ADD KEY `booking_id` (`booking_kode`),
  ADD KEY `montir_id` (`montir_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `montir`
--
ALTER TABLE `montir`
  MODIFY `montir_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pickup`
--
ALTER TABLE `pickup`
  MODIFY `pickup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pickup`
--
ALTER TABLE `pickup`
  ADD CONSTRAINT `pickup_ibfk_1` FOREIGN KEY (`booking_kode`) REFERENCES `booking` (`booking_kode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`booking_kode`) REFERENCES `booking` (`booking_kode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`montir_id`) REFERENCES `montir` (`montir_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
