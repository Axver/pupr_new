-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Des 2019 pada 02.53
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
-- Database: `pupr_revisi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `account`
--

CREATE TABLE `account` (
  `nip` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `privilage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `account`
--

INSERT INTO `account` (`nip`, `nama`, `password`, `privilage`) VALUES
('1', 'Jesi Namora', '1', '1'),
('2', 'User', '2', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_alat_harian`
--

CREATE TABLE `detail_alat_harian` (
  `id_lap_harian_mingguan` date NOT NULL,
  `id_lap_perencanaan` varchar(4) NOT NULL,
  `id_paket` varchar(4) NOT NULL,
  `tahun` decimal(4,0) NOT NULL,
  `id_jenis_bahan_alat` varchar(4) NOT NULL,
  `jumlah` varchar(10) NOT NULL,
  `hari` varchar(50) NOT NULL,
  `id_satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_alat_harian`
--

INSERT INTO `detail_alat_harian` (`id_lap_harian_mingguan`, `id_lap_perencanaan`, `id_paket`, `tahun`, `id_jenis_bahan_alat`, `jumlah`, `hari`, `id_satuan`) VALUES
('0000-00-00', '1', '1', '2019', '1', '5', '1', '1'),
('0000-00-00', '1', '1', '2019', '1', '5', '3', '1'),
('0000-00-00', '1', '1', '2019', '1', '5', '5', '1'),
('0000-00-00', '1', '1', '2019', '1', '5', '7', '1'),
('0000-00-00', '1', '1', '2019', '2', '5', '2', '2'),
('0000-00-00', '1', '1', '2019', '2', '5', '4', '2'),
('0000-00-00', '1', '1', '2019', '2', '5', '6', '2'),
('2019-01-01', '1', '1', '2019', '1', '5', '1', '1'),
('2019-01-01', '1', '1', '2019', '1', '5', '3', '1'),
('2019-01-01', '1', '1', '2019', '1', '5', '5', '1'),
('2019-01-01', '1', '1', '2019', '1', '5', '6', '1'),
('2019-01-01', '1', '1', '2019', '1', '5', '7', '1'),
('2019-01-01', '1', '1', '2019', '2', '5', '1', '2'),
('2019-01-01', '1', '1', '2019', '2', '5', '2', '2'),
('2019-01-01', '1', '1', '2019', '2', '5', '3', '2'),
('2019-01-01', '1', '1', '2019', '2', '5', '5', '2'),
('2019-01-01', '1', '1', '2019', '2', '5', '7', '2'),
('2019-01-01', '1', '1', '2019', '3', '5', '1', '2'),
('2019-01-01', '1', '1', '2019', '3', '5', '3', '2'),
('2019-01-01', '1', '1', '2019', '3', '5', '5', '2'),
('2019-01-01', '1', '1', '2019', '3', '5', '7', '2'),
('2019-01-01', '1', '1', '2019', '4', '5', '1', '2'),
('2019-01-01', '1', '1', '2019', '4', '5', '3', '2'),
('2019-01-01', '1', '1', '2019', '4', '5', '5', '2'),
('2019-01-01', '1', '1', '2019', '4', '5', '6', '2'),
('2019-01-01', '1', '1', '2019', '4', '5', '7', '2'),
('2019-01-01', '2', '1', '2019', '1', '10', '1', '1'),
('2019-01-01', '2', '1', '2019', '1', '10', '3', '1'),
('2019-01-01', '2', '1', '2019', '1', '10', '5', '1'),
('2019-01-01', '2', '1', '2019', '1', '10', '7', '1'),
('2019-11-08', '1', '1', '2019', '1', '5', '1', '1'),
('2019-11-08', '1', '1', '2019', '1', '5', '3', '1'),
('2019-11-08', '1', '1', '2019', '1', '5', '5', '1'),
('2019-11-08', '1', '1', '2019', '1', '5', '7', '1'),
('2019-11-08', '1', '1', '2019', '2', '5', '2', '2'),
('2019-11-08', '1', '1', '2019', '2', '5', '4', '2'),
('2019-11-08', '1', '1', '2019', '2', '5', '6', '2'),
('2019-11-27', '1', '1', '2019', '1', '5', '1', '2'),
('2019-11-27', '1', '1', '2019', '1', '5', '2', '2'),
('2019-11-27', '1', '1', '2019', '1', '5', '3', '2'),
('2019-11-27', '1', '1', '2019', '1', '5', '4', '2'),
('2019-11-27', '1', '1', '2019', '1', '5', '5', '2'),
('2019-11-27', '1', '1', '2019', '1', '5', '6', '2'),
('2019-11-27', '1', '1', '2019', '1', '5', '7', '2'),
('2019-11-28', '1', '1', '2019', '1', '10', '1', '2'),
('2019-11-28', '1', '1', '2019', '1', '5', '2', '2'),
('2019-11-28', '1', '1', '2019', '1', '5', '3', '2'),
('2019-11-28', '1', '1', '2019', '1', '5', '4', '2'),
('2019-11-28', '1', '1', '2019', '1', '5', '5', '2'),
('2019-11-28', '1', '1', '2019', '1', '5', '6', '2'),
('2019-11-28', '1', '1', '2019', '1', '5', '7', '2'),
('2019-11-28', '1', '1', '2019', '2', '1', '2', '1'),
('2019-11-28', '1', '1', '2019', '2', '1', '4', '1'),
('2019-11-28', '1', '1', '2019', '2', '1', '6', '1'),
('2019-11-28', '1', '1', '2019', '3', '2', '1', '2'),
('2019-11-28', '1', '1', '2019', '3', '2', '3', '2'),
('2019-11-28', '1', '1', '2019', '3', '2', '5', '2'),
('2019-11-28', '1', '1', '2019', '3', '2', '7', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_bahan_alat`
--

CREATE TABLE `detail_bahan_alat` (
  `id_lap_perencanaan` varchar(4) NOT NULL,
  `id_paket` varchar(4) NOT NULL,
  `tahun` decimal(4,0) NOT NULL,
  `id_detail_bahan_alat` varchar(2) NOT NULL,
  `tanggal` varchar(15) NOT NULL,
  `minggu` varchar(3) NOT NULL,
  `id_jenis_bahan_alat` varchar(4) NOT NULL,
  `id_satuan` varchar(4) NOT NULL,
  `jumlah` decimal(3,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_bahan_alat`
--

INSERT INTO `detail_bahan_alat` (`id_lap_perencanaan`, `id_paket`, `tahun`, `id_detail_bahan_alat`, `tanggal`, `minggu`, `id_jenis_bahan_alat`, `id_satuan`, `jumlah`) VALUES
('1', '1', '2019', '1', '2019-01-01', '1', '1', '1', '10'),
('1', '1', '2019', '2', '2019-02-13', '2', '2', '1', '5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_bahan_alat_harian`
--

CREATE TABLE `detail_bahan_alat_harian` (
  `id_lap_harian_mingguan` date NOT NULL,
  `id_lap_perencanaan` varchar(4) NOT NULL,
  `id_paket` varchar(4) NOT NULL,
  `tahun` decimal(4,0) NOT NULL,
  `id_jenis_upah` varchar(50) NOT NULL,
  `hari` varchar(10) NOT NULL DEFAULT '0',
  `jenis_pekerjaan` varchar(50) NOT NULL,
  `total` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_bahan_alat_harian`
--

INSERT INTO `detail_bahan_alat_harian` (`id_lap_harian_mingguan`, `id_lap_perencanaan`, `id_paket`, `tahun`, `id_jenis_upah`, `hari`, `jenis_pekerjaan`, `total`) VALUES
('0000-00-00', '1', '1', '2019', '2', '1', '1', '5'),
('0000-00-00', '1', '1', '2019', '2', '11', '1', '5'),
('0000-00-00', '1', '1', '2019', '2', '20', '1', '5'),
('0000-00-00', '1', '1', '2019', '2', '3', '1', '5'),
('0000-00-00', '1', '1', '2019', '2', '31', '1', '5'),
('0000-00-00', '1', '1', '2019', '2', '40', '1', '5'),
('0000-00-00', '1', '1', '2019', '2', '5', '1', '5'),
('0000-00-00', '1', '1', '2019', '2', '51', '1', '5'),
('0000-00-00', '1', '1', '2019', '2', '60', '1', '5'),
('0000-00-00', '1', '1', '2019', '2', '7', '1', '5'),
('0000-00-00', '1', '1', '2019', '2', '71', '1', '5'),
('2019-01-01', '1', '1', '2019', '1', '1', '1', '10'),
('2019-01-01', '1', '1', '2019', '1', '3', '1', '10'),
('2019-01-01', '1', '1', '2019', '1', '5', '1', '10'),
('2019-01-01', '1', '1', '2019', '1', '6', '1', '10'),
('2019-01-01', '1', '1', '2019', '1', '7', '1', '10'),
('2019-01-01', '1', '1', '2019', '2', '1', '2', '10'),
('2019-01-01', '1', '1', '2019', '2', '2', '2', '10'),
('2019-01-01', '1', '1', '2019', '2', '3', '2', '10'),
('2019-01-01', '1', '1', '2019', '2', '7', '2', '10'),
('2019-01-01', '1', '1', '2019', '3', '1', '3', '10'),
('2019-01-01', '1', '1', '2019', '3', '3', '3', '10'),
('2019-01-01', '1', '1', '2019', '3', '5', '3', '10'),
('2019-01-01', '1', '1', '2019', '3', '6', '3', '10'),
('2019-01-01', '1', '1', '2019', '3', '7', '3', '10'),
('2019-01-01', '2', '1', '2019', '1', '1', '1', '10'),
('2019-01-01', '2', '1', '2019', '1', '5', '1', '10'),
('2019-01-01', '2', '1', '2019', '2', '2', '1', '10'),
('2019-01-01', '2', '1', '2019', '2', '4', '1', '10'),
('2019-11-08', '1', '1', '2019', '2', '1', '1', '5'),
('2019-11-08', '1', '1', '2019', '2', '11', '1', '5'),
('2019-11-08', '1', '1', '2019', '2', '20', '1', '5'),
('2019-11-08', '1', '1', '2019', '2', '3', '1', '5'),
('2019-11-08', '1', '1', '2019', '2', '31', '1', '5'),
('2019-11-08', '1', '1', '2019', '2', '40', '1', '5'),
('2019-11-08', '1', '1', '2019', '2', '5', '1', '5'),
('2019-11-08', '1', '1', '2019', '2', '51', '1', '5'),
('2019-11-08', '1', '1', '2019', '2', '60', '1', '5'),
('2019-11-08', '1', '1', '2019', '2', '7', '1', '5'),
('2019-11-08', '1', '1', '2019', '2', '71', '1', '5'),
('2019-11-27', '1', '1', '2019', '1', '1', '1', '2'),
('2019-11-27', '1', '1', '2019', '1', '2', '1', '2'),
('2019-11-27', '1', '1', '2019', '1', '3', '1', '2'),
('2019-11-27', '1', '1', '2019', '1', '4', '1', '2'),
('2019-11-27', '1', '1', '2019', '1', '5', '1', '2'),
('2019-11-27', '1', '1', '2019', '1', '6', '1', '2'),
('2019-11-27', '1', '1', '2019', '1', '7', '1', '2'),
('2019-11-27', '1', '1', '2019', '2', '2', '2', '2'),
('2019-11-27', '1', '1', '2019', '2', '4', '1', '2'),
('2019-11-27', '1', '1', '2019', '2', '5', '1', '2'),
('2019-11-27', '1', '1', '2019', '2', '6', '1', '2'),
('2019-11-27', '1', '1', '2019', '2', '7', '1', '2'),
('2019-11-28', '1', '1', '2019', '1', '2', '1', '5'),
('2019-11-28', '1', '1', '2019', '1', '4', '1', '5'),
('2019-11-28', '1', '1', '2019', '1', '6', '1', '5'),
('2019-11-28', '1', '1', '2019', '2', '1', '1', '5'),
('2019-11-28', '1', '1', '2019', '2', '3', '1', '5'),
('2019-11-28', '1', '1', '2019', '2', '5', '1', '5'),
('2019-11-28', '1', '1', '2019', '2', '7', '1', '5');

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
('1', '1', '1', '2019', '2019-12-08', '7', 0, 10),
('1', '1', '1', '2019', '2019-12-15', '8', 0, 10),
('1', '1', '1', '2019', '2019-12-22', '9', 0, 10),
('1', '2', '1', '2019', '2019-01-01', '1', 0, 10),
('2', '1', '1', '2019', '2019-11-01', '1', 0, 10),
('2', '1', '1', '2019', '2019-11-08', '2', 0, 10),
('2', '1', '1', '2019', '2019-11-15', '3', 0, 10),
('2', '2', '1', '2019', '2019-01-24', '3', 0, 10),
('2', '2', '1', '2019', '2019-01-31', '4', 0, 10),
('3', '1', '1', '2019', '2019-11-01', '1', 0, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_laporan_harian`
--

CREATE TABLE `detail_laporan_harian` (
  `id_lap_harian` varchar(50) NOT NULL,
  `id_perencanaan` varchar(50) NOT NULL,
  `id_paket` varchar(50) NOT NULL,
  `jenis_pekerjaan` varchar(50) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `panjang_penanganan` varchar(50) NOT NULL,
  `dimensi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_laporan_pengawasan`
--

CREATE TABLE `detail_laporan_pengawasan` (
  `id` int(11) NOT NULL,
  `id_lap_pengawasan` date NOT NULL,
  `id_lap_perencanaan` varchar(20) NOT NULL,
  `minggu` varchar(20) NOT NULL,
  `jenis_pekerjaan` varchar(50) NOT NULL,
  `jenis_pekerja` varchar(10) NOT NULL,
  `jumlah` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_laporan_pengawasan`
--

INSERT INTO `detail_laporan_pengawasan` (`id`, `id_lap_pengawasan`, `id_lap_perencanaan`, `minggu`, `jenis_pekerjaan`, `jenis_pekerja`, `jumlah`) VALUES
(1, '2019-01-08', '1', '2', '1', '2', '10'),
(2, '2019-01-08', '1', '2', '2', '2', '1'),
(3, '2019-12-31', '1', '53', '1', '1', '10'),
(4, '2019-12-31', '1', '53', '1', '2', '5'),
(5, '2019-12-31', '1', '53', '3', '3', '5');

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
('1', '2019', '2');

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
  `gambar` varchar(50) NOT NULL,
  `id_paket` varchar(50) NOT NULL,
  `id_perencanaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gambar_harian`
--

INSERT INTO `gambar_harian` (`id_lap_harian`, `gambar`, `id_paket`, `id_perencanaan`) VALUES
('0000-00-00', '71cc915a3ee5dfc14949a5856637bd12.jpg', '', '1'),
('2019-11-28', '8fb506d6193aa0cbf7428f56ee1f35bf.png', '', '1'),
('2019-11-28', 'd7b6bca27d95cf3733863a7a574ccd99.jpg', '', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar_pengawasan`
--

CREATE TABLE `gambar_pengawasan` (
  `id_pengawasan` varchar(50) NOT NULL,
  `minggu` varchar(50) NOT NULL,
  `id_perencanaan` varchar(50) NOT NULL,
  `id_gambar` varchar(50) NOT NULL,
  `id_pekerjaan` varchar(10) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gambar_pengawasan`
--

INSERT INTO `gambar_pengawasan` (`id_pengawasan`, `minggu`, `id_perencanaan`, `id_gambar`, `id_pekerjaan`, `gambar`, `keterangan`) VALUES
('2019-01-08', '2', '1', '1', '1', '4630203081e3e27b836a152bd3bb70f2.jpg', 'Ini adalah keterangan dari gambar'),
('2019-01-08', '2', '1', '2', '2', 'ec5d66c8bc1844e9e4e0737539454c58.png', 'Keterangan Kedua'),
('2019-01-08', '2', '1', '3', '1', 'f381286f9ec6bd082aa006ca8e21d129.png', 'Test Bug'),
('2019-01-08', '2', '1', '4', '1', '4c776722f67b15d4a28306cf9199d786.png', 'jnkjasd'),
('2019-01-08', '2', '1', '5', '1', 'a3330f97a62ced53d8f70de2d4ac6755.png', 'lkdjakd'),
('2019-12-31', '53', '1', '6', '1', '11f599a39bb114a78d6d0921d8e7b32c.png', 'Uji Gambar Tinggi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar_perencanaan`
--

CREATE TABLE `gambar_perencanaan` (
  `id_gambar` varchar(20) NOT NULL,
  `id_lap_perencanaan` varchar(10) NOT NULL,
  `jenis_pekerjaan` varchar(10) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `panjang_penanganan` varchar(10) NOT NULL,
  `dimensi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gambar_perencanaan`
--

INSERT INTO `gambar_perencanaan` (`id_gambar`, `id_lap_perencanaan`, `jenis_pekerjaan`, `gambar`, `panjang_penanganan`, `dimensi`) VALUES
('1', '1', '1', 'ae51ec322d12832e0546abdc2ae94c31.jpg', '100 m', '10,5,100'),
('2', '1', '2', 'fa90524ac0401f6f986334454fbd479c.png', '200m', '5,5,100'),
('3', '1', '3', '0a1fa6dd42bbec1f1523c7f3841343c1.jpg', '800m', '20,30,900');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar_tahap`
--

CREATE TABLE `gambar_tahap` (
  `id_paket` varchar(50) NOT NULL,
  `id_perencanaan` varchar(50) NOT NULL,
  `bulan_start` varchar(50) NOT NULL,
  `bulan_end` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `jenis_pekerjaan` varchar(50) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gambar_tahap`
--

INSERT INTO `gambar_tahap` (`id_paket`, `id_perencanaan`, `bulan_start`, `bulan_end`, `gambar`, `jenis_pekerjaan`, `keterangan`) VALUES
('1', '1', '8', '11', '1379e6474d1d91d946fe1dd45e069ceb.png', '1', ''),
('1', '1', '8', '11', 'c2baf62c644e1652798be0798b09add3.jpg', '1', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_bahan_alat`
--

CREATE TABLE `jenis_bahan_alat` (
  `id_jenis_bahan_alat` varchar(4) NOT NULL,
  `jenis_bahan_alat` varchar(32) NOT NULL,
  `harga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_bahan_alat`
--

INSERT INTO `jenis_bahan_alat` (`id_jenis_bahan_alat`, `jenis_bahan_alat`, `harga`) VALUES
('1', 'Bahan 1', '20000'),
('2', 'Bahan 2', '50000'),
('3', 'Bahan 3', '50000'),
('4', 'Bahan 4', '100000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_pekerjaan`
--

CREATE TABLE `jenis_pekerjaan` (
  `id` varchar(4) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_pekerjaan`
--

INSERT INTO `jenis_pekerjaan` (`id`, `nama_jenis`) VALUES
('1', 'Pekerjaan 1'),
('2', 'Pekerjaan 2'),
('3', 'Pekerjaan 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_upah`
--

CREATE TABLE `jenis_upah` (
  `id_jenis_upah` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_upah`
--

INSERT INTO `jenis_upah` (`id_jenis_upah`, `nama`, `harga`) VALUES
(1, 'Mekanik', '80000'),
(2, 'Tukang', '80000'),
(3, 'Pekerja', '90000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` varchar(2) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `nama`, `nip`, `jabatan`) VALUES
('1', 'Axver Devada', '085376199777', 'Jabatan Axver'),
('2', 'Namora Jesi', '09836373891', 'Pelaksana Teknik');

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
('0000-00-00', '1', '1', '2019', ''),
('2019-01-01', '1', '1', '2019', '2019-01-01'),
('2019-01-01', '2', '1', '2019', '2019-01-01'),
('2019-11-08', '1', '1', '2019', '2019-11-08'),
('2019-11-27', '1', '1', '2019', '2019-11-27'),
('2019-11-28', '1', '1', '2019', '2019-11-28');

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
('2019-01-01', '1', '1', '2019', '1'),
('2019-01-08', '1', '1', '2019', '2'),
('2019-12-31', '1', '1', '2019', '53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lap_perencanaan`
--

CREATE TABLE `lap_perencanaan` (
  `id_lap_perencanaan` varchar(4) NOT NULL,
  `id_paket` varchar(4) NOT NULL,
  `tahun` decimal(4,0) NOT NULL,
  `tukang` decimal(2,0) NOT NULL,
  `pekerja` decimal(2,0) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `jenis_pekerjaan` varchar(50) NOT NULL,
  `panjang_penanganan` varchar(50) NOT NULL,
  `keterangan_dimensi` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lap_perencanaan`
--

INSERT INTO `lap_perencanaan` (`id_lap_perencanaan`, `id_paket`, `tahun`, `tukang`, `pekerja`, `lokasi`, `jenis_pekerjaan`, `panjang_penanganan`, `keterangan_dimensi`, `keterangan`) VALUES
('1', '1', '2019', '0', '0', 'Padang Panjang', '', '10000', 'Keterangan Dimensi', 'Laporan Perencanaan Pertama'),
('2', '1', '2019', '0', '0', 'Padang Panjang', '', '100', '1000', 'Laporan Perencanaan Uji');

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
  `tahun_anggaran` varchar(50) NOT NULL,
  `nilai_paket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `tahun`, `nama`, `jumlah_tahap`, `jenis_pekerjaan`, `masa_pelaksanaan`, `lokasi`, `tahun_anggaran`, `nilai_paket`) VALUES
('1', '2019', 'Paket Pertama', '5', 'Pekerjaan Pembangunan', '3 Bulan', 'Padang Panjang', '2019', '100000000');

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
('1', 'Bh'),
('2', 'Pcs');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tahap`
--

CREATE TABLE `tahap` (
  `id_tahap` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tgl_caturwulan`
--

CREATE TABLE `tgl_caturwulan` (
  `id_caturwulan` varchar(50) NOT NULL,
  `tanggal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ttd_harian`
--

CREATE TABLE `ttd_harian` (
  `id_lap_harian` varchar(50) NOT NULL,
  `id_lap_perencanaan` varchar(50) NOT NULL,
  `id_dibuat` varchar(50) NOT NULL,
  `id_diperiksa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ttd_harian`
--

INSERT INTO `ttd_harian` (`id_lap_harian`, `id_lap_perencanaan`, `id_dibuat`, `id_diperiksa`) VALUES
('2019-01-01', '2', '2', '2'),
('2019-11-28', '1', '2', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ttd_pengawasan`
--

CREATE TABLE `ttd_pengawasan` (
  `minggu` varchar(50) NOT NULL,
  `id_pengawasan` varchar(50) NOT NULL,
  `id_perencanaan` varchar(50) NOT NULL,
  `id_dibuat` varchar(50) NOT NULL,
  `id_diperiksa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ttd_pengawasan`
--

INSERT INTO `ttd_pengawasan` (`minggu`, `id_pengawasan`, `id_perencanaan`, `id_dibuat`, `id_diperiksa`) VALUES
('53', '2019-12-31', '1', '2', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ttd_perencanaan`
--

CREATE TABLE `ttd_perencanaan` (
  `id_ttd` int(11) NOT NULL,
  `id_lap_perencanaan` varchar(20) NOT NULL,
  `id_disetujui` varchar(20) NOT NULL,
  `id_diperiksa` varchar(20) NOT NULL,
  `id_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ttd_perencanaan`
--

INSERT INTO `ttd_perencanaan` (`id_ttd`, `id_lap_perencanaan`, `id_disetujui`, `id_diperiksa`, `id_user`) VALUES
(2, '2', '1', '2', '2'),
(3, '1', '1', '2', '2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `detail_alat_harian`
--
ALTER TABLE `detail_alat_harian`
  ADD PRIMARY KEY (`id_lap_harian_mingguan`,`id_lap_perencanaan`,`id_paket`,`tahun`,`id_jenis_bahan_alat`,`hari`),
  ADD KEY `jenis_bahan_alat_detail_alat_harian_fk` (`id_jenis_bahan_alat`);

--
-- Indeks untuk tabel `detail_bahan_alat`
--
ALTER TABLE `detail_bahan_alat`
  ADD PRIMARY KEY (`id_lap_perencanaan`,`id_paket`,`tahun`,`id_detail_bahan_alat`),
  ADD KEY `satuan_detail_bahan_alat_fk` (`id_satuan`) USING BTREE,
  ADD KEY `jenis_bahan_alat_detail_bahan_alat_fk` (`id_jenis_bahan_alat`) USING BTREE;

--
-- Indeks untuk tabel `detail_bahan_alat_harian`
--
ALTER TABLE `detail_bahan_alat_harian`
  ADD PRIMARY KEY (`id_lap_harian_mingguan`,`id_lap_perencanaan`,`id_paket`,`tahun`,`id_jenis_upah`,`hari`,`jenis_pekerjaan`);

--
-- Indeks untuk tabel `detail_jenis_pekerjaan`
--
ALTER TABLE `detail_jenis_pekerjaan`
  ADD PRIMARY KEY (`id`,`id_lap_perencanaan`,`id_paket`,`tahun`,`tanggal`,`minggu`),
  ADD KEY `lap_perencanaan_detail_jenis_pekerjaan_fk` (`id_lap_perencanaan`,`id_paket`,`tahun`) USING BTREE;

--
-- Indeks untuk tabel `detail_laporan_harian`
--
ALTER TABLE `detail_laporan_harian`
  ADD PRIMARY KEY (`id_lap_harian`,`id_perencanaan`,`id_paket`);

--
-- Indeks untuk tabel `detail_laporan_pengawasan`
--
ALTER TABLE `detail_laporan_pengawasan`
  ADD PRIMARY KEY (`id`,`id_lap_pengawasan`,`id_lap_perencanaan`,`minggu`);

--
-- Indeks untuk tabel `detail_paket`
--
ALTER TABLE `detail_paket`
  ADD PRIMARY KEY (`id_paket`,`tahun`),
  ADD KEY `account_detail_paket_fk` (`nip`) USING BTREE;

--
-- Indeks untuk tabel `detail_tahap`
--
ALTER TABLE `detail_tahap`
  ADD PRIMARY KEY (`bulan`,`id_lap_perencanaan`,`id_paket`,`tahun`,`id_tahap`),
  ADD KEY `tahap_detail_tahap_fk` (`id_tahap`) USING BTREE,
  ADD KEY `lap_perencanaan_detail_tahap_fk` (`id_lap_perencanaan`,`id_paket`,`tahun`) USING BTREE;

--
-- Indeks untuk tabel `foto_harian_mingguan`
--
ALTER TABLE `foto_harian_mingguan`
  ADD PRIMARY KEY (`id_foto`,`id_lap_harian_mingguan`,`id_lap_perencanaan`,`id_paket`,`tahun`),
  ADD KEY `lap_harian_mingguan_foto_harian_mingguan_fk` (`id_lap_harian_mingguan`,`id_lap_perencanaan`,`id_paket`,`tahun`) USING BTREE;

--
-- Indeks untuk tabel `foto_pengawasan`
--
ALTER TABLE `foto_pengawasan`
  ADD PRIMARY KEY (`id_foto_pengawasan`,`id_lap_pengawasan`,`id_lap_perencanaan`,`id_paket`,`tahun`),
  ADD KEY `lap_pengawasan_foto_pengawasan_fk` (`id_lap_pengawasan`,`id_lap_perencanaan`,`id_paket`,`tahun`) USING BTREE;

--
-- Indeks untuk tabel `gambar_harian`
--
ALTER TABLE `gambar_harian`
  ADD PRIMARY KEY (`id_lap_harian`,`gambar`,`id_paket`,`id_perencanaan`);

--
-- Indeks untuk tabel `gambar_pengawasan`
--
ALTER TABLE `gambar_pengawasan`
  ADD PRIMARY KEY (`id_pengawasan`,`minggu`,`id_perencanaan`,`id_gambar`,`id_pekerjaan`);

--
-- Indeks untuk tabel `gambar_perencanaan`
--
ALTER TABLE `gambar_perencanaan`
  ADD PRIMARY KEY (`id_gambar`,`id_lap_perencanaan`,`jenis_pekerjaan`);

--
-- Indeks untuk tabel `gambar_tahap`
--
ALTER TABLE `gambar_tahap`
  ADD PRIMARY KEY (`id_paket`,`id_perencanaan`,`bulan_start`,`bulan_end`,`gambar`,`jenis_pekerjaan`);

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
-- Indeks untuk tabel `jenis_upah`
--
ALTER TABLE `jenis_upah`
  ADD PRIMARY KEY (`id_jenis_upah`);

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
  ADD KEY `lap_perencanaan_lap_harian_mingguan_fk` (`id_lap_perencanaan`,`id_paket`,`tahun`) USING BTREE;

--
-- Indeks untuk tabel `lap_pengawasan`
--
ALTER TABLE `lap_pengawasan`
  ADD PRIMARY KEY (`id_lap_pengawasan`,`id_lap_perencanaan`,`id_paket`,`tahun`,`minggu`),
  ADD KEY `lap_perencanaan_lap_pengawasan_fk` (`id_lap_perencanaan`,`id_paket`,`tahun`) USING BTREE;

--
-- Indeks untuk tabel `lap_perencanaan`
--
ALTER TABLE `lap_perencanaan`
  ADD PRIMARY KEY (`id_lap_perencanaan`,`id_paket`,`tahun`),
  ADD KEY `paket_lap_perencanaan_fk` (`id_paket`,`tahun`) USING BTREE;

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
-- Indeks untuk tabel `tgl_caturwulan`
--
ALTER TABLE `tgl_caturwulan`
  ADD PRIMARY KEY (`id_caturwulan`);

--
-- Indeks untuk tabel `ttd_harian`
--
ALTER TABLE `ttd_harian`
  ADD PRIMARY KEY (`id_lap_harian`,`id_lap_perencanaan`);

--
-- Indeks untuk tabel `ttd_pengawasan`
--
ALTER TABLE `ttd_pengawasan`
  ADD PRIMARY KEY (`minggu`,`id_pengawasan`,`id_perencanaan`);

--
-- Indeks untuk tabel `ttd_perencanaan`
--
ALTER TABLE `ttd_perencanaan`
  ADD PRIMARY KEY (`id_ttd`,`id_lap_perencanaan`,`id_disetujui`,`id_diperiksa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis_upah`
--
ALTER TABLE `jenis_upah`
  MODIFY `id_jenis_upah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_alat_harian`
--
ALTER TABLE `detail_alat_harian`
  ADD CONSTRAINT `jenis_bahan_alat_detail_alat_harian_fk` FOREIGN KEY (`id_jenis_bahan_alat`) REFERENCES `jenis_bahan_alat` (`id_jenis_bahan_alat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `lap_harian_mingguan_detail_alat_harian_fk` FOREIGN KEY (`id_lap_harian_mingguan`,`id_lap_perencanaan`,`id_paket`,`tahun`) REFERENCES `lap_harian_mingguan` (`id_lap_harian_mingguan`, `id_lap_perencanaan`, `id_paket`, `tahun`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `lap_harian_mingguan_detail_bahan_alat_harian_fk` FOREIGN KEY (`id_lap_harian_mingguan`,`id_lap_perencanaan`,`id_paket`,`tahun`) REFERENCES `lap_harian_mingguan` (`id_lap_harian_mingguan`, `id_lap_perencanaan`, `id_paket`, `tahun`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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
