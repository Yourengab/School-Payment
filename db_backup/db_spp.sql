-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2023 at 02:49 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

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
-- Table structure for table `tb_angkatan`
--

CREATE TABLE `tb_angkatan` (
  `angkatan` int(5) NOT NULL,
  `nominal_spp` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_angkatan`
--

INSERT INTO `tb_angkatan` (`angkatan`, `nominal_spp`) VALUES
(2020, 250000),
(2022, 300000),
(2023, 350000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_bulan`
--

CREATE TABLE `tb_bulan` (
  `bulan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_bulan`
--

INSERT INTO `tb_bulan` (`bulan`) VALUES
('Agustus'),
('April'),
('Desamber'),
('Februari'),
('Januari'),
('Juli'),
('Juni'),
('Maret'),
('Mei'),
('November'),
('Oktober'),
('September');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nis` int(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `angkatan` int(5) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `nama`, `angkatan`, `kelas`, `no_telp`, `password`, `level`) VALUES
(5091, 'Zidan Abraham', 2020, 'IV', '081887398266', '1234', 'siswa'),
(5402, 'Suryadana', 2022, 'III', '081778398973', '1234', 'siswa'),
(5403, 'Palguna', 2022, 'VI', '098878615542', '1234', 'siswa'),
(5411, 'Dewa Krsna', 2022, 'V', '087116354245', '1234', 'siswa'),
(5661, 'Rizky Ryan', 2023, 'VI', '098117675421', '1234', 'siswa'),
(5690, 'Ryan', 2023, 'V', '098556744567', '1234', 'siswa');

-- --------------------------------------------------------

--
-- Table structure for table `tb_spp`
--

CREATE TABLE `tb_spp` (
  `id_spp` int(4) NOT NULL,
  `nis` int(4) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bulan` varchar(10) NOT NULL,
  `total_bayar` double NOT NULL,
  `keterangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_spp`
--

INSERT INTO `tb_spp` (`id_spp`, `nis`, `nama`, `tgl_bayar`, `bulan`, `total_bayar`, `keterangan`) VALUES
(1, 5402, 'Suryadana', '2023-01-25', 'Januari', 300000, 'LUNAS'),
(2, 5402, 'Suryadana', '2023-01-25', 'Februari', 300000, 'LUNAS'),
(3, 5091, 'Zidan Abraham', '2023-01-25', 'Juni', 250000, 'LUNAS'),
(4, 5661, 'Rizky Ryan', '2023-01-25', 'Januari', 350000, 'LUNAS'),
(5, 5402, 'Suryadana', '2023-01-25', 'Maret', 300000, 'LUNAS'),
(6, 5411, 'Dewa Krsna', '2023-01-25', 'Februari', 300000, 'LUNAS'),
(7, 5690, 'Ryan', '2023-01-25', 'Januari', 350000, 'LUNAS'),
(8, 5403, 'Palguna', '2023-01-25', 'Januari', 300000, 'LUNAS');

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
-- Indexes for table `tb_angkatan`
--
ALTER TABLE `tb_angkatan`
  ADD PRIMARY KEY (`angkatan`);

--
-- Indexes for table `tb_bulan`
--
ALTER TABLE `tb_bulan`
  ADD PRIMARY KEY (`bulan`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `fk_level` (`level`),
  ADD KEY `fk_angkatan` (`angkatan`);

--
-- Indexes for table `tb_spp`
--
ALTER TABLE `tb_spp`
  ADD PRIMARY KEY (`id_spp`),
  ADD KEY `fk_nis` (`nis`),
  ADD KEY `fk_bulan` (`bulan`);

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
  MODIFY `id_spp` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `fk_angkatan` FOREIGN KEY (`angkatan`) REFERENCES `tb_angkatan` (`angkatan`),
  ADD CONSTRAINT `fk_level` FOREIGN KEY (`level`) REFERENCES `tb_user` (`level`);

--
-- Constraints for table `tb_spp`
--
ALTER TABLE `tb_spp`
  ADD CONSTRAINT `fk_bulan` FOREIGN KEY (`bulan`) REFERENCES `tb_bulan` (`bulan`),
  ADD CONSTRAINT `fk_nis` FOREIGN KEY (`nis`) REFERENCES `tb_siswa` (`nis`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
