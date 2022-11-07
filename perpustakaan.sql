-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2022 at 11:14 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id`, `nama`, `username`, `password`) VALUES
(2, 'Khopipah', 'pipah', '111'),
(3, 'Admin', 'admin', '111'),
(4, 'Nurhalizah', 'Nurhalizah', '123');

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_anggota` int(5) NOT NULL,
  `no_identitas` int(100) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `nama_anggota` varchar(100) NOT NULL,
  `tgl_lhr` date NOT NULL,
  `tlp` varchar(13) NOT NULL,
  `kls` int(2) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_anggota`, `no_identitas`, `jk`, `nama_anggota`, `tgl_lhr`, `tlp`, `kls`, `jurusan`, `alamat`) VALUES
(11, 1010004, 'P', 'Nurhalizah', '2006-06-18', '0895414802791', 11, 'RPL', 'Kp. Batu Gede'),
(12, 1010003, 'L', 'Petir', '2005-08-12', '0893784903992', 11, 'RPL', 'PMI'),
(13, 1010002, 'L', 'Zeki', '2005-05-05', '0873684738882', 11, 'RPL', 'Petahunan'),
(14, 1010001, 'P', 'Billie Ellish', '1999-07-19', '0878277389273', 12, 'DPIB', 'Nganjuk'),
(15, 1010005, 'L', 'Taehyung', '2000-03-01', '0896756566558', 12, 'TP', 'Depok'),
(16, 1010654, 'L', 'Jaemin', '2005-03-01', '0867547654567', 11, 'SIJA', 'Bojong Gede');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `no` int(11) NOT NULL,
  `rak` int(20) NOT NULL,
  `id_buku` varchar(10) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `thn_terbit` int(5) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `stok` int(255) NOT NULL,
  `tgl_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`no`, `rak`, `id_buku`, `judul`, `pengarang`, `penerbit`, `thn_terbit`, `kategori`, `stok`, `tgl_masuk`) VALUES
(10, 3, '20201205', 'Sejarah Dunia Yang Disembunyikan', 'Jonathan Black', 'Pustaka Alvabet', 2007, 'Pelajaran', 53, '2022-02-15'),
(11, 2, '20201923', 'Bulan', 'Tere Liye', 'Gramedia Pustaka Utama', 2015, 'Novel', 45, '2022-02-09'),
(12, 2, '20201838', 'Basis Data', 'Darsono', 'Bumi Aksara', 2019, 'Pelajaran', 91, '2022-03-02'),
(13, 3, '202012', 'Hujan', 'Tere Liye', 'Gramedia Pustaka Utama', 2015, 'Novel', 45, '2022-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kembalian`
--

CREATE TABLE `tb_kembalian` (
  `id_kembali` int(20) NOT NULL,
  `id_pinjam` int(30) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `denda` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_peminjam`
--

CREATE TABLE `tb_peminjam` (
  `id_pinjam` int(5) NOT NULL,
  `id_buku` int(100) NOT NULL,
  `id_anggota` int(13) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_tempo` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_peminjam`
--

INSERT INTO `tb_peminjam` (`id_pinjam`, `id_buku`, `id_anggota`, `tgl_pinjam`, `tgl_tempo`, `status`) VALUES
(19, 20201997, 11, '2022-03-03', '2022-03-13', ''),
(21, 20201838, 12, '2022-03-03', '2022-03-13', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengunjung`
--

CREATE TABLE `tb_pengunjung` (
  `id_pengunjung` int(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `umur` int(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no.tlp` int(100) NOT NULL,
  `tgl_masuk` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD UNIQUE KEY `no_identitas` (`no_identitas`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tb_kembalian`
--
ALTER TABLE `tb_kembalian`
  ADD PRIMARY KEY (`id_kembali`),
  ADD KEY `id_pinjam` (`id_pinjam`);

--
-- Indexes for table `tb_peminjam`
--
ALTER TABLE `tb_peminjam`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `id_anggota` (`id_anggota`);

--
-- Indexes for table `tb_pengunjung`
--
ALTER TABLE `tb_pengunjung`
  ADD PRIMARY KEY (`id_pengunjung`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_anggota` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_kembalian`
--
ALTER TABLE `tb_kembalian`
  MODIFY `id_kembali` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_peminjam`
--
ALTER TABLE `tb_peminjam`
  MODIFY `id_pinjam` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
