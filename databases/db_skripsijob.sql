-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 28 Jul 2020 pada 08.36
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_skripsijob`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `administrator`
--

CREATE TABLE `administrator` (
  `id_administrator` int(11) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `email` varchar(35) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(25) NOT NULL,
  `fk_id_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `administrator`
--

INSERT INTO `administrator` (`id_administrator`, `nama`, `email`, `username`, `password`, `fk_id_level`) VALUES
(1, 'fjr', 'fjrbgswra@gmail.com', 'fjr', '123', 1),
(4, 'admin', 'fjrbgswra@gmail.com', 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi_magang`
--

CREATE TABLE `divisi_magang` (
  `id_divisi` int(11) NOT NULL,
  `nama_divisi` varchar(45) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `divisi_magang`
--

INSERT INTO `divisi_magang` (`id_divisi`, `nama_divisi`, `gambar`, `keterangan`) VALUES
(1, 'Administrasi', 'divisi.png', 'Administrasi PT Andalan Bisturi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `tipe`, `bobot`) VALUES
(1, 'Usia', 'Cost', 0.1),
(2, 'Nilai Rata rata Matematika / Bisnis', 'Benefit', 0.1),
(3, 'Nilai Rata rata Bahasa Inggris', 'Benefit', 0.1),
(4, 'Nilai Rata rata Bahasa Indonesia', 'Benefit', 0.1),
(5, 'Etika Administrasi / Etika Profesi', 'Benefit', 0.2),
(6, 'Keahlian pengoprasian Komputer', 'Benefit', 0.2),
(7, 'Jumlah Nilai IPK', 'Benefit', 0.2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria2`
--

CREATE TABLE `kriteria2` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(255) NOT NULL,
  `tipe` varchar(50) NOT NULL,
  `bobot` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria2`
--

INSERT INTO `kriteria2` (`id_kriteria`, `nama_kriteria`, `tipe`, `bobot`) VALUES
(1, 'Nilai Rata rata Bahasa Indonesia', 'Benefit', 0.1),
(2, 'Nilai Rata rata Bahasa Inggris', 'Benefit', 0.1),
(3, 'Nilai Rata rata Matematika / Bisnis', 'Benefit', 0.1),
(4, 'Etika Administrasi / Etika Profesi', 'Benefit', 0.1),
(5, 'Keahlian pengoprasian Komputer', 'Benefit', 0.2),
(6, 'Pengalaman Administrasi', 'Benefit', 0.3),
(7, 'Jumlah Nilai IPK', 'Benefit', 0.1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `nama`, `username`, `password`) VALUES
(1, 'fajar', 'fjr', '123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_pelamar` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_pelamar`, `id_kriteria`, `nilai`) VALUES
(1, 12, 1, 22),
(2, 12, 2, 4),
(3, 12, 3, 3.5),
(4, 12, 4, 3),
(5, 12, 5, 3),
(6, 12, 6, 5),
(7, 12, 7, 3.3),
(8, 13, 1, 22),
(9, 13, 2, 3),
(10, 13, 3, 3),
(11, 13, 4, 3),
(12, 13, 5, 3),
(13, 13, 6, 3),
(14, 13, 7, 3.2),
(15, 14, 1, 23),
(16, 14, 2, 4),
(17, 14, 3, 3),
(18, 14, 4, 4),
(19, 14, 5, 3),
(20, 14, 6, 5),
(21, 14, 7, 3.5),
(22, 15, 1, 25),
(23, 15, 2, 4),
(24, 15, 3, 4),
(25, 15, 4, 4),
(26, 15, 5, 3),
(27, 15, 6, 3),
(28, 15, 7, 3.2),
(29, 16, 1, 25),
(30, 16, 2, 3),
(31, 16, 3, 4),
(32, 16, 4, 4),
(33, 16, 5, 3),
(34, 16, 6, 5),
(35, 16, 7, 3.4),
(36, 17, 1, 21),
(37, 17, 2, 3),
(38, 17, 3, 3),
(39, 17, 4, 3),
(40, 17, 5, 3),
(41, 17, 6, 5),
(42, 17, 7, 3.2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai2`
--

CREATE TABLE `nilai2` (
  `id_nilai` int(11) NOT NULL,
  `id_pelamar` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai2`
--

INSERT INTO `nilai2` (`id_nilai`, `id_pelamar`, `id_kriteria`, `nilai`) VALUES
(43, 12, 1, 3),
(44, 12, 2, 3.5),
(45, 12, 3, 4),
(46, 12, 4, 3),
(47, 12, 5, 5),
(48, 12, 6, 3),
(49, 12, 7, 3.3),
(50, 13, 1, 3),
(51, 13, 2, 3),
(52, 13, 3, 3),
(53, 13, 4, 3),
(54, 13, 5, 3),
(55, 13, 6, 3),
(56, 13, 7, 3.2),
(57, 14, 1, 4),
(58, 14, 2, 3),
(59, 14, 3, 4),
(60, 14, 4, 3),
(61, 14, 5, 5),
(62, 14, 6, 1),
(63, 14, 7, 3.5),
(64, 15, 1, 4),
(65, 15, 2, 4),
(66, 15, 3, 4),
(67, 15, 4, 3),
(68, 15, 5, 3),
(69, 15, 6, 3),
(70, 15, 7, 3.2),
(71, 16, 1, 4),
(72, 16, 2, 4),
(73, 16, 3, 4),
(74, 16, 4, 3),
(75, 16, 5, 5),
(76, 16, 6, 3),
(77, 16, 7, 3.4),
(78, 17, 1, 3),
(79, 17, 2, 3),
(80, 17, 3, 4),
(81, 17, 4, 3),
(82, 17, 5, 5),
(83, 17, 6, 5),
(84, 17, 7, 3.2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelamar`
--

CREATE TABLE `pelamar` (
  `id_pelamar` int(50) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `email` varchar(25) NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `nama_sekolah` varchar(45) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `tempat_lahir` varchar(25) DEFAULT NULL,
  `tanggal_lahir` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` text NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `fk_posisi_magang` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelamar`
--

INSERT INTO `pelamar` (`id_pelamar`, `nama`, `email`, `pendidikan`, `nama_sekolah`, `alamat`, `no_hp`, `tempat_lahir`, `tanggal_lahir`, `username`, `password`, `jenis_kelamin`, `fk_posisi_magang`, `status`) VALUES
(12, 'Apriliani Mevysta', 'apriliani@gmail.com', 'Kuliah', 'Universitas Brawijaya', 'Blitar', '089123123123', NULL, '1994-04-13', 'april', '123', 'Perempuan', 0, 1),
(13, 'Emilia Indraswari', 'emil@gmail.com', 'Kuliah', 'Politeknik Negri Malang', 'Malang', '08345345345', NULL, '1994-07-04', 'emil', '123', 'Perempuan', 0, 1),
(14, 'Hany Mustainah', 'hany@gmail.com', 'Kuliah', 'Universitas Brawijaya', 'Malang', '08678678678', NULL, '1995-02-15', 'hany', '123', 'Perempuan', 0, 1),
(15, 'Nurhamzah Prawidirja', 'nurhamzah@gmail.com', 'Kuliah', 'Universitas Merdeka Malang', 'Malang', '08987987987', NULL, '1989-05-24', 'nur', '123', 'Laki - Laki', 0, 1),
(16, 'Rosiana Putri Siahaan', 'rosiana@gmail.com', 'Kuliah', 'Politeknik Negri Malang', 'Malang', '08654654654', NULL, '1991-08-23', 'rosi', '123', 'Perempuan', 0, 1),
(17, 'Fajar Audi Bagaswara', 'Fjrbgswra1@gmail.com', 'Kuliah', 'Politeknik Negri Malang', 'Malang', '08122232041', 'Malang', '1997-11-17', 'fajar', '123', 'laki_laki', 4, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `portofolio`
--

CREATE TABLE `portofolio` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `portofolio`
--

INSERT INTO `portofolio` (`id`, `judul`, `gambar`, `deskripsi`) VALUES
(1, 'AMP & BIPOLAR', 'produk1.jpg', 'Implant Produk'),
(9, 'BROAD LC-DCP Plate', 'produk3.jpg', 'Implant produk'),
(10, 'CERVICLE H-VATE', 'produk41.jpg', 'Implant Produk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `posisi_kerja`
--

CREATE TABLE `posisi_kerja` (
  `id_posisi` int(11) NOT NULL,
  `nama_posisi` varchar(45) NOT NULL,
  `fk_id_divisi` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `posisi_kerja`
--

INSERT INTO `posisi_kerja` (`id_posisi`, `nama_posisi`, `fk_id_divisi`, `gambar`, `keterangan`) VALUES
(4, 'Karyawan Administrasi', 1, 'divisi1.png', 'Job Desk : Memilah pos, surat, paket kiriman, pemesanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_level`
--

CREATE TABLE `status_level` (
  `id_level` int(11) NOT NULL,
  `level` int(3) NOT NULL,
  `keterangan` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status_level`
--

INSERT INTO `status_level` (`id_level`, `level`, `keterangan`) VALUES
(1, 1, 'admin'),
(2, 2, 'karyawan'),
(3, 3, 'None');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id_administrator`),
  ADD KEY `fk_id_level` (`fk_id_level`);

--
-- Indexes for table `divisi_magang`
--
ALTER TABLE `divisi_magang`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`),
  ADD UNIQUE KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `kriteria2`
--
ALTER TABLE `kriteria2`
  ADD PRIMARY KEY (`id_kriteria`),
  ADD UNIQUE KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_pelamar` (`id_pelamar`) USING BTREE;

--
-- Indexes for table `nilai2`
--
ALTER TABLE `nilai2`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_kriteria` (`id_kriteria`),
  ADD KEY `id_pelamar` (`id_pelamar`) USING BTREE;

--
-- Indexes for table `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`id_pelamar`),
  ADD UNIQUE KEY `id_pelamar` (`id_pelamar`) USING BTREE,
  ADD KEY `fk_posisi_magang` (`fk_posisi_magang`);

--
-- Indexes for table `portofolio`
--
ALTER TABLE `portofolio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posisi_kerja`
--
ALTER TABLE `posisi_kerja`
  ADD PRIMARY KEY (`id_posisi`),
  ADD KEY `fk_id_divisi` (`fk_id_divisi`);

--
-- Indexes for table `status_level`
--
ALTER TABLE `status_level`
  ADD PRIMARY KEY (`id_level`),
  ADD KEY `level` (`level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `id_administrator` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `divisi_magang`
--
ALTER TABLE `divisi_magang`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kriteria2`
--
ALTER TABLE `kriteria2`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `nilai2`
--
ALTER TABLE `nilai2`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `pelamar`
--
ALTER TABLE `pelamar`
  MODIFY `id_pelamar` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `portofolio`
--
ALTER TABLE `portofolio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posisi_kerja`
--
ALTER TABLE `posisi_kerja`
  MODIFY `id_posisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status_level`
--
ALTER TABLE `status_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `administrator`
--
ALTER TABLE `administrator`
  ADD CONSTRAINT `administrator_ibfk_1` FOREIGN KEY (`fk_id_level`) REFERENCES `status_level` (`level`);

--
-- Ketidakleluasaan untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_pelamar`) REFERENCES `pelamar` (`id_pelamar`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
