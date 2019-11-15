-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Nov 2019 pada 04.43
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pupr`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `account`
--

CREATE TABLE `account` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `password` varchar(8) NOT NULL,
  `privilage` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`nip`, `nama`, `password`, `privilage`) VALUES
('0', '3', '3', '2'),
('1', '1', '1', '1'),
('2', '2', '2', '2'),
('4', '4', '4', '4'),
('5', '5', '5', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_bahan_alat`
--

CREATE TABLE `detail_bahan_alat` (
  `id_lap_perencanaan` varchar(4) NOT NULL,
  `id_paket` varchar(4) NOT NULL,
  `tahun` decimal(4,0) NOT NULL,
  `id_detail_bahan_alat` varchar(2) NOT NULL,
  `id_jenis_bahan_alat` varchar(4) NOT NULL,
  `id_satuan` varchar(4) NOT NULL,
  `jumlah` decimal(3,0) NOT NULL,
  `tanggal` varchar(15) NOT NULL,
  `minggu` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_bahan_alat_harian`
--

CREATE TABLE `detail_bahan_alat_harian` (
  `id_lap_harian_mingguan` date NOT NULL,
  `id_lap_perencanaan` varchar(4) NOT NULL,
  `id_paket` varchar(4) NOT NULL,
  `tahun` decimal(4,0) NOT NULL,
  `id_jenis_bahan_alat` varchar(4) NOT NULL,
  `id_satuan` varchar(4) NOT NULL,
  `jumlah_bahan` varchar(3) NOT NULL,
  `jenis_pekerja` varchar(50) NOT NULL,
  `jumlah_pekerja` varchar(50) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `jenis_pekerjaan` varchar(50) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `panjang_penanganan` varchar(50) NOT NULL,
  `keterangan_dimensi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_bahan_alat_harian`
--

INSERT INTO `detail_bahan_alat_harian` (`id_lap_harian_mingguan`, `id_lap_perencanaan`, `id_paket`, `tahun`, `id_jenis_bahan_alat`, `id_satuan`, `jumlah_bahan`, `jenis_pekerja`, `jumlah_pekerja`, `gambar`, `jenis_pekerjaan`, `lokasi`, `panjang_penanganan`, `keterangan_dimensi`) VALUES
('2019-11-01', '1', '1', '2019', '1', '1', '5', '1', '10', '', '0', '', '', ''),
('2019-11-01', '1', '1', '2019', '2', '1', '2', '2', '4', '', '0', '', '', ''),
('2019-11-01', '1', '1', '2019', '3', '1', '4', '3', '12', '', '0', '', '', ''),
('2019-11-02', '2', '3', '2019', '1', '1', '5', 'Satu', '5', '', '', '', '', ''),
('2019-11-04', '2', '3', '2019', '1', '1', '1', '1', '1', '', '', '', '', ''),
('2019-11-04', '2', '3', '2019', '1', '1', '2', '2', '2', '', '', '', '', ''),
('2019-11-04', '2', '3', '2019', '1', '1', '3', '3', '3', '', '', '', '', ''),
('2019-11-04', '2', '3', '2019', '1', '1', '4', '4', '4', '', '', '', '', ''),
('2019-11-04', '2', '3', '2019', '1', '1', '5', '5', '5', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_jenis_pekerjaan`
--

CREATE TABLE `detail_jenis_pekerjaan` (
  `id` varchar(4) NOT NULL,
  `id_lap_perencanaan` varchar(4) NOT NULL,
  `id_paket` varchar(4) NOT NULL,
  `tahun` decimal(4,0) NOT NULL,
  `tanggal` varchar(15) NOT NULL,
  `minggu` varchar(3) NOT NULL,
  `tukang` int(11) NOT NULL,
  `pekerja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_jenis_pekerjaan`
--

INSERT INTO `detail_jenis_pekerjaan` (`id`, `id_lap_perencanaan`, `id_paket`, `tahun`, `tanggal`, `minggu`, `tukang`, `pekerja`) VALUES
('1', '1', '1', '2019', '2019-11-01', '1', 0, 10),
('1', '1', '1', '2019', '2019-11-02', '2', 0, 10),
('1', '2', '3', '2019', '2019-11-04', '2', 0, 10),
('1', '3', '3', '2019', '2019-11-01', '1', 0, 10),
('2', '1', '1', '2019', '2019-11-02', '2', 0, 10),
('2', '1', '1', '2019', '2019-11-03', '3', 0, 10),
('2', '3', '3', '2019', '2019-11-01', '1', 0, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_laporan_pengawasan`
--

CREATE TABLE `detail_laporan_pengawasan` (
  `id` int(11) NOT NULL,
  `id_lap_pengawasan` date NOT NULL,
  `jenis_pekerjaan` varchar(20) NOT NULL,
  `jumlah_pekerja` varchar(20) NOT NULL,
  `jenis_satuan` varchar(20) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `jumlah_satuan` varchar(20) NOT NULL,
  `progres` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_laporan_pengawasan`
--

INSERT INTO `detail_laporan_pengawasan` (`id`, `id_lap_pengawasan`, `jenis_pekerjaan`, `jumlah_pekerja`, `jenis_satuan`, `satuan`, `jumlah_satuan`, `progres`) VALUES
(1, '2019-11-15', 'Contoh 1', '5', 'Cangkul', 'Bh', '2', ''),
(2, '2019-11-15', 'Contoh 2', '5', 'Cangkul', 'Bh', '2', ''),
(3, '2019-11-15', 'Contoh 3', '5', 'Cangkul', 'Bh', '2', ''),
(4, '2019-11-15', 'Contoh 4', '5', 'Cangkul', 'Bh', '2', ''),
(5, '2019-11-15', 'Contoh 5', '5', 'Cangkul', 'Bh', '2', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_paket`
--

CREATE TABLE `detail_paket` (
  `id_paket` varchar(4) NOT NULL,
  `tahun` decimal(4,0) NOT NULL,
  `nip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_paket`
--

INSERT INTO `detail_paket` (`id_paket`, `tahun`, `nip`) VALUES
('2', '2019', '0'),
('1', '2019', '2'),
('3', '2019', '5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_tahap`
--

CREATE TABLE `detail_tahap` (
  `bulan` varchar(10) NOT NULL,
  `id_lap_perencanaan` varchar(4) NOT NULL,
  `id_paket` varchar(4) NOT NULL,
  `tahun` decimal(4,0) NOT NULL,
  `id_tahap` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_harian_mingguan`
--

CREATE TABLE `foto_harian_mingguan` (
  `id_foto` varchar(4) NOT NULL,
  `id_lap_harian_mingguan` date NOT NULL,
  `id_lap_perencanaan` varchar(4) NOT NULL,
  `id_paket` varchar(4) NOT NULL,
  `tahun` decimal(4,0) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_pengawasan`
--

CREATE TABLE `foto_pengawasan` (
  `id_foto_pengawasan` varchar(4) NOT NULL,
  `id_lap_pengawasan` date NOT NULL,
  `id_lap_perencanaan` varchar(4) NOT NULL,
  `id_paket` varchar(4) NOT NULL,
  `tahun` decimal(4,0) NOT NULL,
  `foto_pengawasan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar_harian`
--

CREATE TABLE `gambar_harian` (
  `id_lap_harian` varchar(10) NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gambar_harian`
--

INSERT INTO `gambar_harian` (`id_lap_harian`, `gambar`) VALUES
('2019-11-01', '341.png'),
('2019-11-01', 'Anotasi_2019-11-08_105444.png'),
('2019-11-02', 'Great_War_Tenma_ARc_(27).png'),
('2019-11-04', 'Add_a_heading.png'),
('2019-11-18', 'Birth_Of_Demon_Lord_(4).png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar_perencanaan`
--

CREATE TABLE `gambar_perencanaan` (
  `id_gambar` varchar(20) NOT NULL,
  `id_lap_perencanaan` varchar(10) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gambar_perencanaan`
--

INSERT INTO `gambar_perencanaan` (`id_gambar`, `id_lap_perencanaan`, `gambar`) VALUES
('1', '1', 'screencapture-localhost-pupr-new-laporan-pelaksanaan-2019-10-27-10_22_09.png'),
('2', '2', 'R_vs_Yuuki.png'),
('3', '3', 'apps_23032_13608622719434797_30372fd8-b4bd-41c0-beea-1c2a61e087c11.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_bahan_alat`
--

CREATE TABLE `jenis_bahan_alat` (
  `id_jenis_bahan_alat` varchar(4) NOT NULL,
  `jenis_bahan_alat` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_bahan_alat`
--

INSERT INTO `jenis_bahan_alat` (`id_jenis_bahan_alat`, `jenis_bahan_alat`) VALUES
('1', 'Cangkul'),
('2', 'Parang'),
('3', 'Palu'),
('4', 'Gerobak'),
('5', 'Becak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pekerjaan`
--

CREATE TABLE `jenis_pekerjaan` (
  `id` varchar(4) NOT NULL,
  `nama_jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_pekerjaan`
--

INSERT INTO `jenis_pekerjaan` (`id`, `nama_jenis`) VALUES
('1', 'Penebasan Lahan'),
('2', 'Pembuatan Gorong-gor'),
('3', 'Penggalian Selokan'),
('4', 'Pembuatan Jalan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` varchar(2) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `nip` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `nama`, `nip`) VALUES
('1', 'Muhammad Hamsion', '12345'),
('2', 'Kumara Zegion', '12341');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lap_harian_mingguan`
--

CREATE TABLE `lap_harian_mingguan` (
  `id_lap_harian_mingguan` date NOT NULL,
  `id_lap_perencanaan` varchar(4) NOT NULL,
  `id_paket` varchar(4) NOT NULL,
  `tahun` decimal(4,0) NOT NULL,
  `hari_tanggal` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lap_harian_mingguan`
--

INSERT INTO `lap_harian_mingguan` (`id_lap_harian_mingguan`, `id_lap_perencanaan`, `id_paket`, `tahun`, `hari_tanggal`) VALUES
('2019-11-01', '1', '1', '2019', '2019-11-01'),
('2019-11-02', '2', '3', '2019', '2019-11-02'),
('2019-11-03', '2', '3', '2019', '2019-11-03'),
('2019-11-04', '2', '3', '2019', '2019-11-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lap_pengawasan`
--

CREATE TABLE `lap_pengawasan` (
  `id_lap_pengawasan` date NOT NULL,
  `id_lap_perencanaan` varchar(4) NOT NULL,
  `id_paket` varchar(4) NOT NULL,
  `tahun` decimal(4,0) NOT NULL,
  `minggu` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lap_pengawasan`
--

INSERT INTO `lap_pengawasan` (`id_lap_pengawasan`, `id_lap_perencanaan`, `id_paket`, `tahun`, `minggu`) VALUES
('2019-11-15', '1', '1', '2019', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lap_perencanaan`
--

CREATE TABLE `lap_perencanaan` (
  `id_lap_perencanaan` varchar(4) NOT NULL,
  `id_paket` varchar(4) NOT NULL,
  `tahun` decimal(4,0) NOT NULL,
  `tukang` decimal(2,0) NOT NULL,
  `pekerja` decimal(2,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lap_perencanaan`
--

INSERT INTO `lap_perencanaan` (`id_lap_perencanaan`, `id_paket`, `tahun`, `tukang`, `pekerja`) VALUES
('1', '1', '2019', '0', '0'),
('2', '3', '2019', '0', '0'),
('3', '3', '2019', '0', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id_paket` varchar(4) NOT NULL,
  `tahun` decimal(4,0) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah_tahap` varchar(30) NOT NULL,
  `jenis_pekerjaan` varchar(50) NOT NULL,
  `masa_pelaksanaan` varchar(50) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `tahun_anggaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `tahun`, `nama`, `jumlah_tahap`, `jenis_pekerjaan`, `masa_pelaksanaan`, `lokasi`, `tahun_anggaran`) VALUES
('1', '2019', 'Paket 1', '3', 'Pembuatan gorong-gorong', '1 Bulan', 'Padang Panjang', '2019'),
('2', '2019', 'Paket 2', '', '', '', '', ''),
('3', '2019', 'Paket 3', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` varchar(4) NOT NULL,
  `satuan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `satuan`) VALUES
('1', 'Bh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahap`
--

CREATE TABLE `tahap` (
  `id_tahap` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `detail_bahan_alat`
--
ALTER TABLE `detail_bahan_alat`
  ADD PRIMARY KEY (`id_lap_perencanaan`,`id_paket`,`tahun`,`id_detail_bahan_alat`),
  ADD KEY `satuan_detail_bahan_alat_fk` (`id_satuan`),
  ADD KEY `jenis_bahan_alat_detail_bahan_alat_fk` (`id_jenis_bahan_alat`);

--
-- Indeks untuk tabel `detail_bahan_alat_harian`
--
ALTER TABLE `detail_bahan_alat_harian`
  ADD PRIMARY KEY (`id_lap_harian_mingguan`,`id_lap_perencanaan`,`id_paket`,`tahun`,`id_jenis_bahan_alat`,`jenis_pekerja`),
  ADD KEY `satuan_detail_bahan_alat_harian_fk` (`id_satuan`),
  ADD KEY `jenis_bahan_alat_detail_bahan_alat_harian_fk` (`id_jenis_bahan_alat`);

--
-- Indeks untuk tabel `detail_jenis_pekerjaan`
--
ALTER TABLE `detail_jenis_pekerjaan`
  ADD PRIMARY KEY (`id`,`id_lap_perencanaan`,`id_paket`,`tahun`,`tanggal`),
  ADD KEY `lap_perencanaan_detail_jenis_pekerjaan_fk` (`id_lap_perencanaan`,`id_paket`,`tahun`);

--
-- Indeks untuk tabel `detail_laporan_pengawasan`
--
ALTER TABLE `detail_laporan_pengawasan`
  ADD PRIMARY KEY (`id`,`id_lap_pengawasan`);

--
-- Indeks untuk tabel `detail_paket`
--
ALTER TABLE `detail_paket`
  ADD PRIMARY KEY (`id_paket`,`tahun`),
  ADD KEY `account_detail_paket_fk` (`nip`);

--
-- Indeks untuk tabel `detail_tahap`
--
ALTER TABLE `detail_tahap`
  ADD PRIMARY KEY (`bulan`,`id_lap_perencanaan`,`id_paket`,`tahun`,`id_tahap`),
  ADD KEY `tahap_detail_tahap_fk` (`id_tahap`),
  ADD KEY `lap_perencanaan_detail_tahap_fk` (`id_lap_perencanaan`,`id_paket`,`tahun`);

--
-- Indeks untuk tabel `foto_harian_mingguan`
--
ALTER TABLE `foto_harian_mingguan`
  ADD PRIMARY KEY (`id_foto`,`id_lap_harian_mingguan`,`id_lap_perencanaan`,`id_paket`,`tahun`),
  ADD KEY `lap_harian_mingguan_foto_harian_mingguan_fk` (`id_lap_harian_mingguan`,`id_lap_perencanaan`,`id_paket`,`tahun`);

--
-- Indeks untuk tabel `foto_pengawasan`
--
ALTER TABLE `foto_pengawasan`
  ADD PRIMARY KEY (`id_foto_pengawasan`,`id_lap_pengawasan`,`id_lap_perencanaan`,`id_paket`,`tahun`),
  ADD KEY `lap_pengawasan_foto_pengawasan_fk` (`id_lap_pengawasan`,`id_lap_perencanaan`,`id_paket`,`tahun`);

--
-- Indeks untuk tabel `gambar_harian`
--
ALTER TABLE `gambar_harian`
  ADD PRIMARY KEY (`id_lap_harian`,`gambar`);

--
-- Indeks untuk tabel `gambar_perencanaan`
--
ALTER TABLE `gambar_perencanaan`
  ADD PRIMARY KEY (`id_gambar`,`id_lap_perencanaan`);

--
-- Indeks untuk tabel `jenis_bahan_alat`
--
ALTER TABLE `jenis_bahan_alat`
  ADD PRIMARY KEY (`id_jenis_bahan_alat`);

--
-- Indeks untuk tabel `jenis_pekerjaan`
--
ALTER TABLE `jenis_pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indeks untuk tabel `lap_harian_mingguan`
--
ALTER TABLE `lap_harian_mingguan`
  ADD PRIMARY KEY (`id_lap_harian_mingguan`,`id_lap_perencanaan`,`id_paket`,`tahun`),
  ADD KEY `lap_perencanaan_lap_harian_mingguan_fk` (`id_lap_perencanaan`,`id_paket`,`tahun`);

--
-- Indeks untuk tabel `lap_pengawasan`
--
ALTER TABLE `lap_pengawasan`
  ADD PRIMARY KEY (`id_lap_pengawasan`,`id_lap_perencanaan`,`id_paket`,`tahun`),
  ADD KEY `lap_perencanaan_lap_pengawasan_fk` (`id_lap_perencanaan`,`id_paket`,`tahun`);

--
-- Indeks untuk tabel `lap_perencanaan`
--
ALTER TABLE `lap_perencanaan`
  ADD PRIMARY KEY (`id_lap_perencanaan`,`id_paket`,`tahun`),
  ADD KEY `paket_lap_perencanaan_fk` (`id_paket`,`tahun`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`,`tahun`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `tahap`
--
ALTER TABLE `tahap`
  ADD PRIMARY KEY (`id_tahap`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_bahan_alat`
--
ALTER TABLE `detail_bahan_alat`
  ADD CONSTRAINT `jenis_bahan_alat_detail_bahan_alat_fk` FOREIGN KEY (`id_jenis_bahan_alat`) REFERENCES `jenis_bahan_alat` (`id_jenis_bahan_alat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lap_perencanaan_detail_bahan_alat_fk` FOREIGN KEY (`id_lap_perencanaan`,`id_paket`,`tahun`) REFERENCES `lap_perencanaan` (`id_lap_perencanaan`, `id_paket`, `tahun`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `satuan_detail_bahan_alat_fk` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `detail_bahan_alat_harian`
--
ALTER TABLE `detail_bahan_alat_harian`
  ADD CONSTRAINT `jenis_bahan_alat_detail_bahan_alat_harian_fk` FOREIGN KEY (`id_jenis_bahan_alat`) REFERENCES `jenis_bahan_alat` (`id_jenis_bahan_alat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lap_harian_mingguan_detail_bahan_alat_harian_fk` FOREIGN KEY (`id_lap_harian_mingguan`,`id_lap_perencanaan`,`id_paket`,`tahun`) REFERENCES `lap_harian_mingguan` (`id_lap_harian_mingguan`, `id_lap_perencanaan`, `id_paket`, `tahun`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `satuan_detail_bahan_alat_harian_fk` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `detail_jenis_pekerjaan`
--
ALTER TABLE `detail_jenis_pekerjaan`
  ADD CONSTRAINT `jenis_pekerjaan_detail_jenis_pekerjaan_fk` FOREIGN KEY (`id`) REFERENCES `jenis_pekerjaan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lap_perencanaan_detail_jenis_pekerjaan_fk` FOREIGN KEY (`id_lap_perencanaan`,`id_paket`,`tahun`) REFERENCES `lap_perencanaan` (`id_lap_perencanaan`, `id_paket`, `tahun`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `detail_paket`
--
ALTER TABLE `detail_paket`
  ADD CONSTRAINT `paket_detail_paket_fk` FOREIGN KEY (`id_paket`,`tahun`) REFERENCES `paket` (`id_paket`, `tahun`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `detail_tahap`
--
ALTER TABLE `detail_tahap`
  ADD CONSTRAINT `lap_perencanaan_detail_tahap_fk` FOREIGN KEY (`id_lap_perencanaan`,`id_paket`,`tahun`) REFERENCES `lap_perencanaan` (`id_lap_perencanaan`, `id_paket`, `tahun`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `tahap_detail_tahap_fk` FOREIGN KEY (`id_tahap`) REFERENCES `tahap` (`id_tahap`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `foto_harian_mingguan`
--
ALTER TABLE `foto_harian_mingguan`
  ADD CONSTRAINT `lap_harian_mingguan_foto_harian_mingguan_fk` FOREIGN KEY (`id_lap_harian_mingguan`,`id_lap_perencanaan`,`id_paket`,`tahun`) REFERENCES `lap_harian_mingguan` (`id_lap_harian_mingguan`, `id_lap_perencanaan`, `id_paket`, `tahun`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `foto_pengawasan`
--
ALTER TABLE `foto_pengawasan`
  ADD CONSTRAINT `lap_pengawasan_foto_pengawasan_fk` FOREIGN KEY (`id_lap_pengawasan`,`id_lap_perencanaan`,`id_paket`,`tahun`) REFERENCES `lap_pengawasan` (`id_lap_pengawasan`, `id_lap_perencanaan`, `id_paket`, `tahun`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `lap_harian_mingguan`
--
ALTER TABLE `lap_harian_mingguan`
  ADD CONSTRAINT `lap_perencanaan_lap_harian_mingguan_fk` FOREIGN KEY (`id_lap_perencanaan`,`id_paket`,`tahun`) REFERENCES `lap_perencanaan` (`id_lap_perencanaan`, `id_paket`, `tahun`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `lap_pengawasan`
--
ALTER TABLE `lap_pengawasan`
  ADD CONSTRAINT `lap_perencanaan_lap_pengawasan_fk` FOREIGN KEY (`id_lap_perencanaan`,`id_paket`,`tahun`) REFERENCES `lap_perencanaan` (`id_lap_perencanaan`, `id_paket`, `tahun`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `lap_perencanaan`
--
ALTER TABLE `lap_perencanaan`
  ADD CONSTRAINT `paket_lap_perencanaan_fk` FOREIGN KEY (`id_paket`,`tahun`) REFERENCES `paket` (`id_paket`, `tahun`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
