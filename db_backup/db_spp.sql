-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2023 at 02:04 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bulan`
--

CREATE TABLE `tb_bulan` (
  `id_bulan` int(11) NOT NULL,
  `bulan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_bulan`
--

INSERT INTO `tb_bulan` (`id_bulan`, `bulan`) VALUES
(8, 'Agustus'),
(4, 'April'),
(12, 'Desember'),
(2, 'Februari'),
(1, 'Januari'),
(7, 'Juli'),
(6, 'Juni'),
(3, 'Maret'),
(5, 'Mei'),
(11, 'November'),
(10, 'Oktober'),
(9, 'September');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(2) NOT NULL,
  `kelas` varchar(4) NOT NULL,
  `nominal_spp` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`, `nominal_spp`) VALUES
(1, 'IX', 400000),
(2, 'VIII', 350000),
(3, 'VII', 300000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nis` int(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(4) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `nama`, `kelas`, `no_telp`, `alamat`, `password`, `level`) VALUES
(5000, 'Suryadana', 'IX', '098556744531', 'Jalan Pulau Bungin', '1234', 'siswa'),
(5002, 'Yourengab', 'VIII', '098556744512', 'Jalan Sidakarya', '1234', 'siswa'),
(5005, 'Alita', 'IX', '081339297812', 'Jalan Panjer', '1234', 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_spp`
--

CREATE TABLE `tb_spp` (
  `id_spp` int(4) NOT NULL,
  `nis` int(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelas` varchar(4) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `total_bayar` double NOT NULL,
  `keterangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_spp`
--

INSERT INTO `tb_spp` (`id_spp`, `nis`, `nama`, `kelas`, `tgl_bayar`, `bulan`, `total_bayar`, `keterangan`) VALUES
(36, 5002, 'Yourengab', 'VIII', '2023-01-28', 'Januari', 350000, 'LUNAS'),
(37, 5000, 'Suryadana', 'IX', '2023-01-28', 'Februari', 400000, 'LUNAS'),
(40, 5000, 'Suryadana', 'IX', '2023-01-29', 'Maret', 400000, 'LUNAS'),
(41, 5005, 'Alita', 'IX', '2023-01-29', 'Juni', 400000, 'LUNAS'),
(42, 5005, 'Alita', 'IX', '2023-01-29', 'Juli', 400000, 'LUNAS'),
(44, 5005, 'Alita', 'IX', '2023-01-29', 'Agustus', 400000, 'LUNAS'),
(46, 5002, 'Yourengab', 'VIII', '2023-01-31', 'Februari', 350000, 'LUNAS');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`level`) VALUES
('admin'),
('petugas'),
('siswa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_bulan`
--
ALTER TABLE `tb_bulan`
  ADD PRIMARY KEY (`id_bulan`),
  ADD KEY `bulan` (`bulan`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `kelas` (`kelas`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `fk_level` (`level`),
  ADD KEY `fk_kelas` (`kelas`);

--
-- Indexes for table `tb_spp`
--
ALTER TABLE `tb_spp`
  ADD PRIMARY KEY (`id_spp`),
  ADD KEY `fk_nis` (`nis`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_spp`
--
ALTER TABLE `tb_spp`
  MODIFY `id_spp` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `fk_kelas` FOREIGN KEY (`kelas`) REFERENCES `tb_kelas` (`kelas`),
  ADD CONSTRAINT `fk_level` FOREIGN KEY (`level`) REFERENCES `tb_user` (`level`);

--
-- Constraints for table `tb_spp`
--
ALTER TABLE `tb_spp`
  ADD CONSTRAINT `fk_bulan` FOREIGN KEY (`bulan`) REFERENCES `tb_bulan` (`bulan`),
  ADD CONSTRAINT `fk_nis` FOREIGN KEY (`nis`) REFERENCES `tb_siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
