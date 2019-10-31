-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2018 at 08:46 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
`id_jabatan_karyawan` int(100) NOT NULL,
  `level_jabatan_karyawan` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan_karyawan`, `level_jabatan_karyawan`) VALUES
(1, 'apoteker'),
(2, 'asisten apoteker'),
(3, 'kasir');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE IF NOT EXISTS `karyawan` (
`id_karyawan` int(100) NOT NULL,
  `username_karyawan` varchar(100) NOT NULL,
  `password_karyawan` varchar(100) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `id_level_karyawan` int(100) NOT NULL,
  `admin_input_karyawan` varchar(100) NOT NULL,
  `tanggal_input` date NOT NULL,
  `jam_input` time NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `username_karyawan`, `password_karyawan`, `nama_karyawan`, `id_level_karyawan`, `admin_input_karyawan`, `tanggal_input`, `jam_input`) VALUES
(1, 'admin', 'admin', 'admin', 1, 'admin', '2018-11-21', '14:27:07'),
(2, 'tita', 'tita', 'siska', 1, 'admin', '2018-11-21', '15:02:34'),
(3, 'lulu', 'lulu', 'lulu', 3, 'admin', '2018-11-22', '21:12:26');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE IF NOT EXISTS `obat` (
`id_obat` int(100) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `suplier` varchar(100) NOT NULL,
  `harga_suplier` int(100) NOT NULL,
  `harga_jual` int(100) NOT NULL,
  `jumlah_obat` int(100) NOT NULL,
  `jenis_satuan` varchar(100) NOT NULL,
  `tanggal_kadaluarsa` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `suplier`, `harga_suplier`, `harga_jual`, `jumlah_obat`, `jenis_satuan`, `tanggal_kadaluarsa`) VALUES
(2, 'Bodrex', 'suplier', 5000, 6500, 50, 'Strip', '2019-02-15'),
(3, 'Demacolin', 'PT Jasa Obat', 6000, 7000, 15, 'Botol', '2019-02-14'),
(4, 'LexaCroll', 'Pt Kimia', 15000, 15500, 20, 'Strip', '2019-02-16');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE IF NOT EXISTS `pasien` (
`id_pasien` int(100) NOT NULL,
  `nama_pasien` varchar(100) NOT NULL,
  `umur_pasien` int(100) NOT NULL,
  `jenis_kelamin_pasien` varchar(100) NOT NULL,
  `tanggal_lahir_pasien` date NOT NULL,
  `tempat_lahir_pasien` varchar(100) NOT NULL,
  `alamat_pasien` text NOT NULL,
  `resep_pasien` text NOT NULL,
  `admin_input_pasien` varchar(100) NOT NULL,
  `tanggal_input_pasien` date NOT NULL,
  `jam_input_pasien` time NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `umur_pasien`, `jenis_kelamin_pasien`, `tanggal_lahir_pasien`, `tempat_lahir_pasien`, `alamat_pasien`, `resep_pasien`, `admin_input_pasien`, `tanggal_input_pasien`, `jam_input_pasien`) VALUES
(1, 'suryo', 22, 'Laki-Laki', '1964-03-02', '', 'jl gendeng', '-Lexacroll 3x1\r\n-Bodrex 4x4\r\n-Demacolin 1x1', '', '2018-12-04', '23:18:01'),
(2, 'agung', 7, 'Laki-Laki', '1998-06-18', '', 'jl jalan jalan', '-Lexacrol 3x1\r\n-Bodrex 2x1', '', '2018-12-04', '23:46:38'),
(3, 'lala', 6, 'Perempuan', '2024-04-08', '', 'jl kusuma', '-bodrex 3x1\r\n-demacolin 2x1', '', '2018-12-04', '23:50:58');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
`id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nama` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total_harga` int(20) NOT NULL,
  `laba` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `tanggal`, `nama`, `jumlah`, `harga`, `total_harga`, `laba`) VALUES
(1, '0000-00-00', '', 0, 0, 0, 0),
(2, '0000-00-00', '', 0, 0, 0, 0),
(3, '0000-00-00', '', 0, 0, 0, 0),
(4, '0000-00-00', '', 0, 0, 0, 0),
(5, '0000-00-00', '', 0, 0, 0, 0),
(6, '0000-00-00', '', 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
 ADD PRIMARY KEY (`id_jabatan_karyawan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
 ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
 ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
 ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
MODIFY `id_jabatan_karyawan` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
MODIFY `id_karyawan` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
MODIFY `id_obat` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
MODIFY `id_pasien` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
