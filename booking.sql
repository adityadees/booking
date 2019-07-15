-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2019 at 10:39 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

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
  `booking_merek` enum('yamaha','honda','suzuki','kawasaki') NOT NULL,
  `booking_tipe` varchar(50) NOT NULL,
  `booking_plat` varchar(9) NOT NULL,
  `booking_layanan` enum('service','sparepart') NOT NULL,
  `booking_kendala` text NOT NULL,
  `booking_status` enum('menunggu','proses','selesai','batal') NOT NULL DEFAULT 'menunggu',
  `booking_tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_kode`, `user_id`, `booking_antrian`, `booking_merek`, `booking_tipe`, `booking_plat`, `booking_layanan`, `booking_kendala`, `booking_status`, `booking_tanggal`) VALUES
('SC1017131561159094', 13, 3, 'yamaha', '', '', 'service', 'asd', 'selesai', '2019-06-22'),
('SC2601171561737425', 17, 3, 'yamaha', '', 'BG 2456 F', 'service', 'Ganti oli  mesin', 'selesai', '2019-06-28'),
('SC26151561954590', 15, 6, 'yamaha', '', '1111Rw', 'service', 'servis bulanan', 'selesai', '2019-07-01'),
('SC2707151562044287', 15, 6, 'yamaha', '', 'BG 1616 U', 'service', 'Mogok', 'batal', '2019-07-02'),
('SC290101561159042', 10, 1, 'yamaha', '', 'BG123', 'service', 'assd', 'selesai', '2019-06-22'),
('SC2978151561725037', 15, 1, 'yamaha', '', 'bg1111ir', 'service', 'mogok', 'selesai', '2019-06-28'),
('SC3415151561955064', 15, 7, 'yamaha', '', '1111', 'service', '10', 'batal', '2019-07-01'),
('SC5269161561942592', 16, 2, 'yamaha', '', 'BG 1817 Z', 'service', 'service rutin bulanan', 'selesai', '2019-07-01'),
('SC5585111561162192', 11, 4, 'yamaha', '', 'BG123xc', 'service', 'asds', 'batal', '2019-06-22'),
('SC860171562043291', 17, 2, 'yamaha', '', 'BG 131 LA', 'service', 'Ganti Oli', 'batal', '2019-07-02'),
('SC9016151562589078', 15, 1, 'yamaha', '', 'BG223D', 'service', 'asds', 'batal', '2019-07-08'),
('SP2759151562042883', 15, 1, 'yamaha', '', 'BG 6437 U', 'sparepart', 'Ganti Oli', 'selesai', '2019-07-02'),
('SP38310161561733176', 16, 2, 'yamaha', '', 'BG 1817 Z', 'sparepart', 'Ganti bola lampu utama depan', 'selesai', '2019-06-28'),
('SP4087141562694488', 14, 1, 'yamaha', 'Mio', 'BG23455XD', 'sparepart', 'asdsd', 'selesai', '2019-07-10'),
('SP4377151562044146', 15, 5, 'yamaha', '', 'BG 4515 U', 'sparepart', 'Service', 'batal', '2019-07-02'),
('SP5322141561942896', 14, 3, 'yamaha', '', 'BG 1317 R', 'sparepart', 'ganti discpad depan', 'selesai', '2019-07-01'),
('SP5968171562044032', 17, 4, 'yamaha', '', 'BG 81 LA', 'sparepart', 'Service\r\n', 'batal', '2019-07-02'),
('SP6749151561940359', 15, 1, 'yamaha', '', 'BG 1714 R', 'sparepart', 'ganti oli', 'selesai', '2019-07-01'),
('SP7292191561944833', 19, 5, 'yamaha', '', 'BG 1719 P', 'sparepart', 'ganti discpad belakang', 'selesai', '2019-07-01'),
('SP8061161562043389', 16, 3, 'yamaha', '', 'BG 111 UH', 'sparepart', 'Service Bulanan', 'batal', '2019-07-02'),
('SP8107111561162265', 11, 5, 'yamaha', '', 'BG123', 'sparepart', 'asd', 'batal', '2019-06-22'),
('SP8372191561944077', 19, 4, 'yamaha', '', 'BG 1719', 'sparepart', 'ganti oli', 'selesai', '2019-07-01'),
('SP9727141561159068', 14, 2, 'yamaha', '', 'BG123xc', 'sparepart', 'asds', 'selesai', '2019-06-22');

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
(1, 'AJI', '081234567890', 'Jl KH. Azhari 7 ulu', 'aktif', 'default.png'),
(2, 'ISMAIL', '081234567891', 'Jl. KH Azhari 16 ulu', 'aktif', 'default.png'),
(3, 'LAN', '081234567892', 'Jl Rajawali 1 no 87', 'aktif', 'default.png');

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
-- Table structure for table `rincian`
--

CREATE TABLE `rincian` (
  `rincian_id` int(11) NOT NULL,
  `rincian_nama` varchar(50) NOT NULL,
  `rincian_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rincian`
--

INSERT INTO `rincian` (`rincian_id`, `rincian_nama`, `rincian_harga`) VALUES
(1, 'Oli top 1', 39000),
(2, 'Oli Yamaha', 52000),
(3, 'Lampu Sen', 15000),
(4, 'Spion', 30000),
(5, 'Helm', 150000),
(6, 'Baut', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `booking_kode` varchar(20) NOT NULL,
  `montir_id` int(11) NOT NULL,
  `transaksi_biaya` int(11) NOT NULL,
  `transaksi_rincian` varchar(50) NOT NULL,
  `transaksi_keterangan` text NOT NULL,
  `transaksi_tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `booking_kode`, `montir_id`, `transaksi_biaya`, `transaksi_rincian`, `transaksi_keterangan`, `transaksi_tanggal`) VALUES
(5, 'SC290101561159042', 1, 15000, '', '123', '2019-06-22 07:30:23'),
(6, 'SP9727141561159068', 2, 150000, '', 'tess', '2019-06-22 18:17:44'),
(7, 'SC1017131561159094', 3, 20000, '', 'asdsd', '2019-06-22 18:17:52'),
(8, 'SC2978151561725037', 1, 90000, '', 'servis', '2019-06-28 19:32:16'),
(9, 'SP38310161561733176', 2, 0, '', '', '2019-06-28 21:47:24'),
(10, 'SC2601171561737425', 2, 0, '', '', '2019-06-28 22:57:44'),
(11, 'SP6749151561940359', 1, 40000, '', 'ganti oli mesin merk federal', '2019-07-01 07:53:18'),
(12, 'SC5269161561942592', 2, 40000, '', 'service rutin', '2019-07-01 08:02:12'),
(13, 'SP8372191561944077', 3, 38000, '', 'ganti oli mesin yamalube', '2019-07-01 08:22:08'),
(14, 'SP5322141561942896', 1, 30000, '', 'sparepart telah diganti dengan yang asli', '2019-07-01 08:34:40'),
(15, 'SP7292191561944833', 2, 35000, '', 'telah diganti dengan merk indoparts', '2019-07-01 08:37:54'),
(16, 'SC26151561954590', 2, 90000, '', 'ringan', '2019-07-01 11:22:53'),
(17, 'SP2759151562042883', 1, 90, '', 'oli ', '2019-07-02 11:53:10'),
(18, 'SP4087141562694488', 2, 67000, '2,3', 'Biaya perbaikan dan ganti sparepart', '2019-07-10 01:09:58');

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
(12, 'Admin', 'admin', '202cb962ac59075b964b07152d234b70', 'admin@aaa.com', '08999', '2019-06-22', 'aaa', 'admin'),
(14, 'rahmat', 'rahmat', '202cb962ac59075b964b07152d234b70', 'rah@aaa.com', '0888', '2019-06-22', 'asdsad', 'customer'),
(15, 'eki', 'eki', '202cb962ac59075b964b07152d234b70', 'me@g.com', '0811', '2019-06-05', 'jln. a. ayni', 'customer'),
(16, 'Ferly', 'Ferly', '202cb962ac59075b964b07152d234b70', 'Ferlyanugrah@gmail.com', '081211223344', '2000-06-02', 'Jln. pertahanan 4 No. 97', 'customer'),
(17, 'billa', 'billa', '202cb962ac59075b964b07152d234b70', 'nabillahastifatya25@gmail.com', '081369363068', '0000-00-00', 'komp griya damai indah k17 kenten laut', 'customer'),
(18, 'Hadi', 'hadi', '202cb962ac59075b964b07152d234b70', 'hadi18@gmail.com', '081267681173', '2019-07-11', 'jln pertahanan 3 depan sd 98', 'customer'),
(19, 'Shidiq', 'Shidiq', '202cb962ac59075b964b07152d234b70', 'eratosmobillius@gmail.com', '085368867132', '0000-00-00', 'Jln. Sumpah pemuda no. 139', 'customer');

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
-- Indexes for table `rincian`
--
ALTER TABLE `rincian`
  ADD PRIMARY KEY (`rincian_id`);

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
  MODIFY `pickup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rincian`
--
ALTER TABLE `rincian`
  MODIFY `rincian_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
