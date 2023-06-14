-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2020 at 01:46 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kaduagung`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(11) NOT NULL,
  `id_kk` int(11) NOT NULL,
  `id_pend` int(11) NOT NULL,
  `hubungan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `id_kk`, `id_pend`, `hubungan`) VALUES
(43, 57, 109, 'Kepala Keluarga'),
(44, 57, 110, 'Istri'),
(45, 57, 111, 'Anak'),
(46, 57, 112, 'Anak'),
(49, 59, 118, 'Kepala Keluarga'),
(50, 59, 119, 'Istri'),
(51, 59, 120, 'Anak'),
(52, 60, 121, 'Kepala Keluarga'),
(53, 60, 122, 'Istri'),
(54, 60, 123, 'Anak'),
(55, 60, 124, 'Anak'),
(56, 61, 113, 'Kepala Keluarga'),
(57, 61, 114, 'Istri'),
(58, 61, 115, 'Anak'),
(59, 62, 125, 'Kepala Keluarga'),
(60, 62, 126, 'Istri'),
(61, 62, 127, 'Anak'),
(62, 62, 129, 'Anak'),
(63, 63, 130, 'Kepala Keluarga'),
(64, 63, 131, 'Istri'),
(65, 63, 132, 'Anak'),
(66, 62, 128, 'Anak'),
(70, 65, 136, 'Kepala Keluarga'),
(71, 65, 137, 'Istri'),
(72, 65, 138, 'Anak'),
(74, 67, 139, 'Kepala Keluarga'),
(75, 67, 140, 'Istri'),
(76, 67, 141, 'Anak'),
(77, 67, 142, 'Anak'),
(78, 67, 143, 'Anak'),
(79, 67, 144, 'Anak'),
(80, 68, 116, 'Kepala Keluarga'),
(81, 68, 117, 'Anak'),
(82, 69, 133, 'Kepala Keluarga'),
(83, 69, 134, 'Anak'),
(85, 69, 135, 'Anak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kk`
--

CREATE TABLE `tb_kk` (
  `id_kk` int(11) NOT NULL,
  `no_kk` varchar(30) NOT NULL,
  `kepala` int(11) NOT NULL,
  `upload_kk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kk`
--

INSERT INTO `tb_kk` (`id_kk`, `no_kk`, `kepala`, `upload_kk`) VALUES
(57, '3208080702063202', 109, 'kk3123123123123.jpg'),
(59, '3208080602061290', 118, 'kk3208080602061290.jpg'),
(60, '3208311308130005', 121, 'kk3208311308130005.jpg'),
(61, '3208312007170003', 113, 'kk3208312007170003.jpg'),
(62, '3208312207080014', 125, 'kk3208312207080014.jpg'),
(63, '3208080702064848', 130, 'kk3208080702064848.jpg'),
(65, '3208312401200006', 136, 'kk3208312401200006.jpg'),
(67, '3208080602060506', 139, 'kk3208080602060506.jpg'),
(68, '3208311303200003', 116, 'kk3208311303200003.jpg'),
(69, '3208312202110001', 133, 'kk3208312202110001.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pdd`
--

CREATE TABLE `tb_pdd` (
  `id_pend` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `tempat_lh` varchar(15) NOT NULL,
  `tgl_lh` date NOT NULL,
  `jekel` enum('L','P') NOT NULL,
  `dusun` varchar(15) NOT NULL,
  `rt` varchar(4) NOT NULL,
  `rw` varchar(4) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `kawin` varchar(15) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `id_pendidikan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pdd`
--

INSERT INTO `tb_pdd` (`id_pend`, `nik`, `nama`, `tempat_lh`, `tgl_lh`, `jekel`, `dusun`, `rt`, `rw`, `agama`, `kawin`, `pekerjaan`, `id_pendidikan`) VALUES
(109, '3208312006720005', 'DEDE JUNAEDI', 'KUNINGAN', '1972-06-20', 'L', 'PUHUN', '002', '002', 'Islam', 'Sudah', 'WIRASWASTA', 'P-06'),
(110, '3208085606730003', 'UUN UNATI', 'KUNINGAN', '1973-06-16', 'P', 'PUHUN', '002', '002', 'Islam', 'Sudah', 'MENGURUS RUMAH TANGGA', 'P-05'),
(111, '3208312705970001', 'HILMAN MAULANA', 'KUNINGAN', '1997-05-27', 'L', 'PUHUN', '002', '002', 'Islam', 'Belum', 'PELAJAR/MAHASISWA', 'P-06'),
(112, '3208312104020001', 'NURUL HUDA', 'KUNINGAN', '2002-04-21', 'L', 'PUHUN', '002', '002', 'Islam', 'Belum', 'PELAJAR/MAHASISWA', 'P-05'),
(113, '3208312202700002', 'E.MAKSUD', 'KUNINGAN', '1970-02-22', 'L', 'PAHING', '003', '006', 'Islam', 'Sudah', 'BURUH HARIAN LEPAS', 'P-04'),
(114, '3208104804640001', 'ATIT SRI SUMARNI', 'KUNINGAN', '1964-04-08', 'P', 'PAHING', '003', '006', 'Islam', 'Sudah', 'MENGURUS RUMAH TANGGA', 'P-04'),
(115, '3208082611940002', 'IRIN SOBIRIN', 'KUNINGAN', '1994-11-26', 'L', 'PAHING', '003', '006', 'Islam', 'Belum', 'PELAJAR/MAHASISWA', 'P-04'),
(116, '3208086911920005', 'WATI KUSWATI', 'KUNINGAN', '1990-11-20', 'P', 'PAHING', '003', '006', 'Islam', 'Cerai Hidup', 'MENGURUS RUMAH TANGGA', 'P-05'),
(117, '3208315305180001', 'ADILA NISA ARDANI', 'KUNINGAN', '2016-06-13', 'P', 'PAHING', '003', '006', 'Islam', 'Belum', 'BELUM BEKERJA', 'P-01'),
(118, '3208306086910001', 'NANA SUTISNA', 'KUNINGAN', '1969-06-06', 'L', 'PAHING', '003', '006', 'Islam', 'Sudah', 'PEDAGANG', 'P-04'),
(119, '3208316006720005', 'ACIH DASIH', 'KUNINGAN', '1972-06-20', 'P', 'PAHING', '003', '006', 'Islam', 'Sudah', 'MENGURUS RUMAH TANGGA', 'P-04'),
(120, '3208312003980001', 'IWAN RIDWAN', 'KUNINGAN', '1998-03-20', 'L', 'PAHING', '003', '006', 'Islam', 'Belum', 'PELAJAR/MAHASISWA', 'P-05'),
(121, '3208131407880003', 'IYAN HERMAWAN', 'KUNINGAN', '1988-07-14', 'L', 'PAHING', '002', '006', 'Islam', 'Sudah', 'KARYAWAN SWASTA', 'P-06'),
(122, '3208314404880003', 'NINING SUHARNI', 'KUNINGAN', '1988-04-04', 'P', 'PAHING', '002', '006', 'Islam', 'Sudah', 'MENGURUS RUMAH TANGGA', 'P-06'),
(123, '3208310810130001', 'MUHAMMAD FADLI ALFAT', 'KUNINGAN', '2013-10-08', 'L', 'PAHING', '002', '006', 'Islam', 'Belum', 'BELUM BEKERJA', 'P-01'),
(124, '3208310403180001', 'ARKANA RAFIQ ISMAIL', 'KUNINGAN', '2013-10-08', 'L', 'PAHING', '002', '006', 'Islam', 'Belum', 'BELUM BEKERJA', 'P-01'),
(125, '3208310306810002', 'HENDRA SUHENDRA', 'KUNINGAN', '1961-06-03', 'L', 'PUHUN', '002', '002', 'Islam', 'Sudah', 'BURUH TANI PERKEBUNAN', 'P-04'),
(126, '3208084412790005', 'RITA', 'KUNINGAN', '1979-12-04', 'P', 'PUHUN', '002', '002', 'Islam', 'Sudah', 'MENGURUS RUMAH TANGGA', 'P-04'),
(127, '3208311905910002', 'DITA LESMANA', 'KUNINGAN', '1991-05-19', 'L', 'PUHUN', '002', '002', 'Islam', 'Belum', 'BELUM BEKERJA', 'P-05'),
(128, '3208315303050003', 'SINTIA M', 'KUNINGAN', '2005-03-13', 'P', 'PUHUN', '002', '002', 'Islam', 'Belum', 'PELAJAR/MAHASISWA', 'P-03'),
(129, '3208312804130002', 'PRIZKI HENDRIANA PRA', 'KUNINGAN', '2013-04-26', 'L', 'PUHUN', '002', '002', 'Islam', 'Belum', 'BELUM BEKERJA', 'P-01'),
(130, '3208312305660001', 'AHMAD', 'KUNINGAN', '1966-05-23', 'L', 'MANIS', '002', '004', 'Islam', 'Sudah', 'BURUH HARIAN LEPAS', 'P-06'),
(131, '3208084404730003', 'TUTI SETIAWATI', 'KUNINGAN', '1973-04-04', 'P', 'MANIS', '002', '004', 'Islam', 'Sudah', 'MENGURUS RUMAH TANGGA', 'P-06'),
(132, '3208310408970004', 'WIRID SAKTI ALAM', 'KUNINGAN', '1997-08-04', 'L', 'MANIS', '002', '004', 'Islam', 'Belum', 'KARYAWAN SWASTA', 'P-06'),
(133, '3208315103650001', 'WINIAR SUSILAWATI', 'KUNINGAN', '1986-03-11', 'P', 'PUHUN', '002', '002', 'Islam', 'Cerai Hidup', 'MENGURUS RUMAH TANGGA', 'P-05'),
(134, '3208314706960003', 'WICHENDRA', 'KUNINGAN', '1995-04-06', 'L', 'PUHUN', '002', '002', 'Islam', 'Belum', 'KARYAWAN SWASTA', 'P-06'),
(135, '3208314802040003', 'PIPIT VITA COMALA', 'KUNINGAN', '2004-03-08', 'P', 'PUHUN', '002', '002', 'Islam', 'Belum', 'PELAJAR/MAHASISWA', 'P-05'),
(136, '3208312202920001', 'ASEP NUROHMAN', 'KUNINGAN', '1992-02-22', 'L', 'PUHUN', '002', '002', 'Islam', 'Sudah', 'BURUH HARIAN LEPAS', 'P-05'),
(137, '3210154507950021', 'PUPUT NOVIANTI HIDAY', 'BOGOR', '1996-11-06', 'L', 'PUHUN', '002', '002', 'Islam', 'Sudah', 'MENGURUS RUMAH TANGGA', 'P-05'),
(138, '3208312803200001', 'ALFATIH NUR RAFASYA', 'KUNINGAN', '2020-03-28', 'L', 'PUHUN', '002', '002', 'Islam', 'Belum', 'BELUM BEKERJA', 'P-01'),
(139, '3208081608680001', 'WANDI', 'KUNINGAN', '1968-06-16', 'L', 'PUHUN', '001', '001', 'Islam', 'Sudah', 'WIRASWASTA', 'P-04'),
(140, '3208315203680001', 'UTI SUMARNI', 'KUNINGAN', '1968-03-12', 'P', 'PUHUN', '001', '001', 'Islam', 'Sudah', 'MENGURUS RUMAH TANGGA', 'P-06'),
(141, '3208082108940002', 'EDI HARDIANA', 'KUNINGAN', '1994-06-21', 'L', 'PUHUN', '001', '001', 'Islam', 'Belum', 'PELAJAR/MAHASISWA', 'P-05'),
(142, '3208312703000001', 'TONI PRIYANTO', 'KUNINGAN', '2000-03-27', 'L', 'PUHUN', '001', '001', 'Islam', 'Belum', 'PELAJAR/MAHASISWA', 'P-03'),
(143, '3208311008070003', 'NANDANG HIDAYAT', 'KUNINGAN', '2007-08-10', 'L', 'PUHUN', '001', '001', 'Islam', 'Belum', 'BELUM BEKERJA', 'P-01'),
(144, '3208316701110001', 'KAMILA ANUGRAH', 'KUNINGAN', '2011-01-27', 'P', 'PUHUN', '001', '001', 'Islam', 'Belum', 'BELUM BEKERJA', 'P-01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendidikan`
--

CREATE TABLE `tb_pendidikan` (
  `id_pendidikan` varchar(20) NOT NULL,
  `tingkatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pendidikan`
--

INSERT INTO `tb_pendidikan` (`id_pendidikan`, `tingkatan`) VALUES
('P-01', 'Tidak Sekolah'),
('P-02', 'Tidak Tamat SD'),
('P-03', 'Sedang SD'),
('P-04', 'SD'),
('P-05', 'SMP'),
('P-06', 'SMA'),
('P-07', 'D1'),
('P-08', 'D2'),
('P-09', 'D3'),
('P-10', 'S1'),
('P-11', 'S2'),
('P-12', 'S3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('Kasi Pemerintahan','RT','Kepala Desa') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(1, 'Eman Nurjaman', 'Eman', '1234', 'Kasi Pemerintahan'),
(7, 'Irin Sobirin', 'Irin', '1234', 'RT'),
(8, 'Hilman Maulana', 'Hilman', '1234', 'Kepala Desa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `tb_anggota_ibfk_1` (`id_pend`),
  ADD KEY `id_kk` (`id_kk`);

--
-- Indexes for table `tb_kk`
--
ALTER TABLE `tb_kk`
  ADD PRIMARY KEY (`id_kk`),
  ADD KEY `id_kepala` (`kepala`);

--
-- Indexes for table `tb_pdd`
--
ALTER TABLE `tb_pdd`
  ADD PRIMARY KEY (`id_pend`),
  ADD KEY `id_pendidikan` (`id_pendidikan`);

--
-- Indexes for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `tb_kk`
--
ALTER TABLE `tb_kk`
  MODIFY `id_kk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `tb_pdd`
--
ALTER TABLE `tb_pdd`
  MODIFY `id_pend` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;
--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD CONSTRAINT `tb_anggota_ibfk_1` FOREIGN KEY (`id_pend`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_anggota_ibfk_2` FOREIGN KEY (`id_kk`) REFERENCES `tb_kk` (`id_kk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_kk`
--
ALTER TABLE `tb_kk`
  ADD CONSTRAINT `tb_kk_ibfk_1` FOREIGN KEY (`kepala`) REFERENCES `tb_pdd` (`id_pend`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pdd`
--
ALTER TABLE `tb_pdd`
  ADD CONSTRAINT `tb_pdd_ibfk_1` FOREIGN KEY (`id_pendidikan`) REFERENCES `tb_pendidikan` (`id_pendidikan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
