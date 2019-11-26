-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Nov 2019 pada 05.23
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
('1', 'Jesi Namora', '1', '1'),
('10', 'User 10', '10', '1'),
('1212', 'Jesi', '1212', '2'),
('130805140600', 'hafid yoza putra', '123456', '2'),
('2', 'Kyrogane Amino', '2', '2'),
('2222', 'Sakata Gintoki', '4', '2'),
('3', 'Ahmad Fauzan Hasbullah', '3', '2'),
('5', 'Reynaldi Munir', '5', '2'),
('6', 'Laftobi Kurama', '6', '2'),
('7', 'Ionicon Amario', '7', '2'),
('8473847938', 'User Kesekian', 'hahahaha', '1');

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

--
-- Dumping data untuk tabel `detail_bahan_alat`
--

INSERT INTO `detail_bahan_alat` (`id_lap_perencanaan`, `id_paket`, `tahun`, `id_detail_bahan_alat`, `id_jenis_bahan_alat`, `id_satuan`, `jumlah`, `tanggal`, `minggu`) VALUES
('1', '1', '2019', '44', '1', '1', '5', '2019-11-02', '1'),
('1', '1', '2019', '45', '10', '1', '10', '2019-11-29', '2'),
('10', '1', '2019', '46', '5', '1', '5', '2019-11-01', '1'),
('10', '1', '2019', '47', '10', '1', '5', '2019-11-02', '2'),
('12', '1', '2019', '4', '5', '1', '5', '2019-11-01', '1'),
('14', '1', '2019', '5', '6', '1', '6', '2019-11-01', '1'),
('17', '1', '2019', '6', '1', '1', '5', '2019-11-01', '1'),
('18', '1', '2019', '10', '2', '1', '5', '2019-11-08', '2'),
('18', '1', '2019', '7', '1', '1', '5', '2019-11-01', '1'),
('18', '1', '2019', '8', '1', '1', '5', '2019-11-08', '2'),
('18', '1', '2019', '9', '2', '1', '5', '2019-11-01', '1'),
('35', '1', '2019', '12', '1', '1', '100', '2019-11-01', '1'),
('36', '1', '2019', '13', '1', '1', '100', '2019-11-01', '1'),
('37', '1', '2019', '14', '1', '1', '100', '2019-11-01', '1'),
('38', '1', '2019', '15', '1', '1', '5', '2019-11-01', '1'),
('39', '1', '2019', '16', '1', '1', '5', '2019-11-01', '1'),
('40', '1', '2019', '17', '1', '1', '5', '2019-11-01', '1'),
('41', '1', '2019', '18', '1', '1', '5', '2019-11-01', '1'),
('42', '1', '2019', '19', '1', '1', '5', '2019-11-01', '1'),
('43', '1', '2019', '20', '1', '1', '5', '2019-11-01', '1'),
('44', '1', '2019', '21', '1', '1', '5', '2019-11-01', '1'),
('45', '1', '2019', '22', '1', '1', '10', '2019-11-01', '1'),
('46', '1', '2019', '23', '1', '1', '5', '2019-11-01', '1'),
('47', '1', '2019', '24', '1', '1', '5', '2019-11-01', '1'),
('48', '1', '2019', '25', '1', '1', '5', '2019-11-01', '1'),
('49', '1', '2019', '26', '1', '1', '5', '2019-11-01', '1'),
('50', '1', '2019', '27', '1', '1', '5', '2019-11-01', '1'),
('51', '1', '2019', '28', '1', '1', '5', '2019-11-01', '1'),
('52', '1', '2019', '29', '1', '1', '5', '2019-11-01', '1'),
('53', '1', '2019', '30', '1', '1', '5', '2019-11-01', '1'),
('54', '1', '2019', '31', '1', '1', '6', '2019-11-01', '1'),
('57', '9', '2019', '37', '4', '1', '10', '2019-11-05', '1'),
('57', '9', '2019', '38', '1', '2', '10', '2019-11-05', '1'),
('57', '9', '2019', '39', '1', '1', '20', '2019-01-31', '2'),
('59', '1', '2019', '48', '1', '10', '10', '2019-11-01', '1');

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
  `keterangan_dimensi` varchar(50) NOT NULL,
  `jumlah_tukang` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_bahan_alat_harian`
--

INSERT INTO `detail_bahan_alat_harian` (`id_lap_harian_mingguan`, `id_lap_perencanaan`, `id_paket`, `tahun`, `id_jenis_bahan_alat`, `id_satuan`, `jumlah_bahan`, `jenis_pekerja`, `jumlah_pekerja`, `gambar`, `jenis_pekerjaan`, `lokasi`, `panjang_penanganan`, `keterangan_dimensi`, `jumlah_tukang`) VALUES
('2019-01-01', '6', '5', '2019', '1', '1', '1', '1', '1', '', '', '', '', '', '10'),
('2019-01-01', '6', '5', '2019', '2', '1', '2', '2', '2', '', '', '', '', '', '5'),
('2019-01-01', '6', '5', '2019', '3', '1', '3', '3', '3', '', '', '', '', '', '4'),
('2019-01-01', '7', '6', '2019', '1', '1', '1', '12', '1', '', '', '', '', '', '6'),
('2019-01-01', '7', '6', '2019', '2', '1', '2', '2', '2', '', '', '', '', '', '10'),
('2019-01-01', '7', '6', '2019', '3', '1', '3', '3', '3', '', '', '', '', '', '2'),
('2019-11-01', '1', '1', '2019', '1', '1', '5', '1', '10', '', '', '', '', '', '8'),
('2019-11-01', '1', '1', '2019', '1', '2', '76', '15', '10', '', '', '', '', '', '150'),
('2019-11-01', '1', '1', '2019', '2', '1', '2', '2', '4', '', '', '', '', '', '20'),
('2019-11-01', '1', '1', '2019', '3', '1', '4', '8', '12', '', '', '', '', '', '10'),
('2019-11-01', '8', '1', '2019', '1', '1', '15', '1', '15', '', '', '', '', '', '8'),
('2019-11-01', '8', '1', '2019', '1', '1', '15', '10', '15', '', '', '', '', '', '4'),
('2019-11-02', '8', '1', '2019', '1', '1', '15', '1', '15', '', '', '', '', '', '2'),
('2019-11-02', '8', '1', '2019', '1', '1', '15', '10', '15', '', '', '', '', '', '9'),
('2019-11-04', '2', '3', '2019', '1', '1', '1', '1', '1', '', '', '', '', '', '1'),
('2019-11-04', '2', '3', '2019', '1', '1', '2', '2', '2', '', '', '', '', '', '1'),
('2019-11-04', '2', '3', '2019', '1', '1', '3', '3', '3', '', '', '', '', '', '1'),
('2019-11-04', '2', '3', '2019', '1', '1', '4', '4', '4', '', '', '', '', '', '1'),
('2019-11-04', '2', '3', '2019', '1', '1', '5', '5', '5', '', '', '', '', '', '3'),
('2019-11-07', '1', '1', '2019', '2', '1', '5', '1', '1', '', '', '', '', '', '6'),
('2019-11-15', '5', '4', '2019', '1', '1', '1', '1', '1', '', '', '', '', '', '3'),
('2019-11-15', '5', '4', '2019', '2', '1', '6', '2', '5', '', '', '', '', '', '3'),
('2019-11-15', '5', '4', '2019', '3', '1', '7', '3', '3', '', '', '', '', '', '1'),
('2019-11-18', '1', '1', '2019', '3', '1', '3', '1', '1', '', '', '', '', '', '2'),
('2019-11-19', '5', '4', '2019', '5', '2', '5', '13', '6', '', '', '', '', '', '7'),
('2019-11-20', '5', '4', '2019', '5', '2', '5', '13', '6', '', '', '', '', '', '2'),
('2019-11-21', '5', '4', '2019', '5', '2', '5', '13', '6', '', '', '', '', '', '2'),
('2019-11-22', '5', '4', '2019', '5', '2', '5', '13', '6', '', '', '', '', '', '2');

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
('1', '1', '1', '2019', '2019-11-07', '2', 0, 10),
('1', '10', '1', '2019', '2019-11-01', '1', 0, 6),
('1', '2', '3', '2019', '2019-11-04', '2', 0, 10),
('1', '28', '1', '2019', '2019-11-01', '1', 0, 100),
('1', '29', '1', '2019', '2019-11-01', '1', 0, 100),
('1', '3', '3', '2019', '2019-11-01', '1', 0, 10),
('1', '30', '1', '2019', '2019-11-01', '1', 0, 100),
('1', '31', '1', '2019', '2019-11-01', '1', 0, 100),
('1', '32', '1', '2019', '2019-11-01', '1', 0, 100),
('1', '33', '1', '2019', '2019-11-01', '1', 0, 100),
('1', '35', '1', '2019', '2019-11-01', '1', 0, 100),
('1', '36', '1', '2019', '2019-11-01', '1', 0, 100),
('1', '37', '1', '2019', '2019-11-01', '1', 0, 100),
('1', '38', '1', '2019', '2019-11-01', '1', 0, 5),
('1', '39', '1', '2019', '2019-11-01', '1', 0, 5),
('1', '4', '3', '2019', '2019-11-01', '1', 0, 10),
('1', '4', '3', '2019', '2019-11-13', '3', 0, 10),
('1', '40', '1', '2019', '2019-11-01', '1', 0, 5),
('1', '41', '1', '2019', '2019-11-01', '1', 0, 5),
('1', '42', '1', '2019', '2019-11-01', '1', 0, 5),
('1', '43', '1', '2019', '2019-11-01', '1', 0, 5),
('1', '44', '1', '2019', '2019-11-01', '1', 0, 5),
('1', '45', '1', '2019', '2019-11-01', '1', 0, 0),
('1', '46', '1', '2019', '2019-11-01', '1', 0, 10),
('1', '47', '1', '2019', '2019-11-01', '1', 0, 10),
('1', '48', '1', '2019', '2019-11-01', '1', 0, 10),
('1', '49', '1', '2019', '2019-11-01', '1', 0, 5),
('1', '5', '4', '2019', '2019-11-01', '1', 0, 1),
('1', '5', '4', '2019', '2019-11-15', '2', 0, 1),
('1', '5', '4', '2019', '2019-12-13', '6', 0, 1),
('1', '50', '1', '2019', '2019-11-01', '1', 0, 5),
('1', '51', '1', '2019', '2019-11-01', '1', 0, 5),
('1', '52', '1', '2019', '2019-11-01', '1', 0, 5),
('1', '53', '1', '2019', '2019-11-01', '1', 0, 5),
('1', '54', '1', '2019', '2019-11-01', '1', 0, 5),
('1', '59', '1', '2019', '2019-11-01', '1', 0, 10),
('1', '6', '5', '2019', '2019-01-01', '6', 0, 10),
('1', '6', '5', '2019', '2019-01-15', '1', 0, 10),
('1', '6', '5', '2019', '2019-02-02', '3', 0, 10),
('1', '7', '6', '2019', '2019-01-01', '1', 0, 10),
('1', '8', '1', '2019', '2019-11-01', '1', 0, 10),
('1', '9', '1', '2019', '2019-11-01', '1', 0, 10),
('10', '10', '1', '2019', '2019-11-01', '2', 0, 6),
('10', '59', '1', '2019', '2019-11-08', '2', 0, 10),
('16', '57', '9', '2019', '2019-01-02', '1', 0, 10),
('16', '57', '9', '2019', '2019-01-30', '2', 0, 100),
('2', '3', '3', '2019', '2019-11-01', '1', 0, 10),
('2', '4', '3', '2019', '2019-11-01', '1', 0, 10),
('2', '4', '3', '2019', '2019-11-13', '3', 0, 10),
('2', '4', '3', '2019', '2019-11-20', '4', 0, 10),
('2', '5', '4', '2019', '2019-11-01', '1', 0, 1),
('2', '5', '4', '2019', '2019-11-15', '2', 0, 1),
('2', '5', '4', '2019', '2019-12-13', '6', 0, 1),
('2', '6', '5', '2019', '2019-01-01', '6', 0, 10),
('2', '6', '5', '2019', '2019-01-15', '1', 0, 10),
('2', '6', '5', '2019', '2019-01-29', '3', 0, 10),
('2', '6', '5', '2019', '2019-02-02', '4', 0, 10),
('2', '7', '6', '2019', '2019-01-08', '2', 0, 10),
('3', '4', '3', '2019', '2019-11-01', '1', 0, 10),
('3', '4', '3', '2019', '2019-11-13', '3', 0, 10),
('3', '4', '3', '2019', '2019-11-20', '4', 0, 10),
('3', '5', '4', '2019', '2019-11-01', '1', 0, 1),
('3', '5', '4', '2019', '2019-11-01', '7', 0, 1),
('3', '5', '4', '2019', '2019-11-15', '2', 0, 1),
('3', '5', '4', '2019', '2019-12-13', '3', 0, 1),
('3', '5', '4', '2019', '2019-12-20', '6', 0, 1),
('3', '6', '5', '2019', '2019-01-01', '7', 0, 10),
('3', '6', '5', '2019', '2019-01-29', '1', 0, 10),
('3', '6', '5', '2019', '2019-02-02', '4', 0, 10),
('3', '6', '5', '2019', '2019-02-09', '6', 0, 10),
('3', '7', '6', '2019', '2019-01-15', '3', 0, 10),
('4', '4', '3', '2019', '2019-11-01', '1', 0, 10),
('4', '4', '3', '2019', '2019-11-13', '3', 0, 10),
('4', '4', '3', '2019', '2019-11-27', '5', 0, 10),
('4', '5', '4', '2019', '2019-11-29', '1', 0, 1),
('4', '5', '4', '2019', '2019-12-13', '3', 0, 1),
('4', '5', '4', '2019', '2019-12-20', '6', 0, 1),
('4', '57', '9', '2019', '2019-01-10', '1', 0, 10),
('4', '6', '5', '2019', '2019-01-29', '1', 0, 10),
('4', '6', '5', '2019', '2019-02-02', '4', 0, 10),
('4', '6', '5', '2019', '2019-02-09', '6', 0, 10),
('4', '7', '6', '2019', '2019-01-30', '4', 0, 10),
('5', '8', '1', '2019', '2019-11-01', '1', 0, 10),
('5', '9', '1', '2019', '2019-11-01', '1', 0, 10),
('6', '8', '1', '2019', '2019-11-01', '1', 0, 10),
('6', '9', '1', '2019', '2019-11-01', '1', 0, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_laporan_harian`
--

CREATE TABLE `detail_laporan_harian` (
  `jenis_pekerjaan` varchar(50) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `panjang_penanganan` varchar(50) NOT NULL,
  `dimensi` varchar(50) NOT NULL,
  `id_lap_harian` varchar(50) NOT NULL,
  `id_perencanaan` varchar(50) NOT NULL,
  `id_paket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_laporan_harian`
--

INSERT INTO `detail_laporan_harian` (`jenis_pekerjaan`, `lokasi`, `panjang_penanganan`, `dimensi`, `id_lap_harian`, `id_perencanaan`, `id_paket`) VALUES
('Test', 'Uji Coba', 'Test', 'p:1,l:1,v:1,', '', '8', '1'),
('1', 'ajdhakjhdkas', 'lksdakskda', 'kjdhakjsdhakj', '2019-01-01', '7', '5'),
('dhakjdhkja', 'asdhkajhsdk', 'kadjaisdoai', 'madmas', '2019-11-01', '1', '1'),
('Uji Coba', 'Uji Coba', 'Uji Coba', 'p:1,l:1,v:1,', '2019-11-01', '8', '1'),
('Test', 'Uji Coba', 'Test', 'p:1,l:1,v:1,', '2019-11-02', '8', '1'),
('Uji Coba Test', 'Test Lagi Gan', 'Percobaan', 'p:10,l:15,v:100,', '2019-11-22', '5', '4');

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
  `progres` varchar(20) NOT NULL,
  `id_lap_perencanaan` varchar(20) NOT NULL,
  `minggu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_laporan_pengawasan`
--

INSERT INTO `detail_laporan_pengawasan` (`id`, `id_lap_pengawasan`, `jenis_pekerjaan`, `jumlah_pekerja`, `jenis_satuan`, `satuan`, `jumlah_satuan`, `progres`, `id_lap_perencanaan`, `minggu`) VALUES
(1, '2019-11-18', 'Uji Coba', 'Uji Coba', 'Uji Coba', 'Uji Coba', 'Uji Coba', '', '1', ''),
(2, '2019-11-18', 'Test', 'Test', 'Test', 'Test', 'Test', '', '1', ''),
(3, '2019-11-18', 'Hmmm', '70', 'Test', 'Test', '6', '', '1', ''),
(4, '2019-11-18', '1', '1', '1', '1', '1', '', '1', '3'),
(8, '2019-11-15', 'Edit 1', 'Edit 2', 'Edit 2', 'Edit 2', 'Edit 2', '', '7', '1'),
(9, '2019-11-15', 'Edit 2', 'Edit 2', 'Edit 2', 'Edit 2', 'Edit 2', '', '7', '1'),
(10, '2019-11-15', 'Contoh 1', 'Edit 2', '4', '4', '4', '4', '1', '1'),
(11, '2019-11-15', 'Tambah Row', 'Row Edit', '', '', '', '', '1', '1'),
(12, '2019-11-15', 'khfakhfkjs', 'khfakhfkjs', 'khfakhfkjs', 'khfakhfkjs', 'khfakhfkjs', 'khfakhfkjs', '1', '1'),
(13, '2019-11-15', 'khfakhfkjs', 'khfakhfkjs', 'khfakhfkjs', 'khfakhfkjs', 'khfakhfkjs', 'khfakhfkjs', '1', '1'),
(14, '2019-11-15', 'khfakhfkjs', 'khfakhfkjs', 'khfakhfkjs', 'khfakhfkjs', 'khfakhfkjs', 'khfakhfkjs', '1', '1'),
(15, '2019-11-18', 'By me', 'By me', 'By me', 'By me', 'By me', '', '1', '2'),
(16, '2019-11-18', '', '', '', '', '', '', '1', '2'),
(17, '2019-11-18', '', '', '', '', '', '', '1', '2'),
(18, '2019-11-18', '', '', '', '', '', '', '1', '2'),
(19, '2019-11-18', '', '', '', '', '', '', '1', '2'),
(20, '2019-11-18', '', '', '', '', '', '', '1', '2'),
(21, '2019-11-18', '', '', '', '', '', '', '1', '2'),
(22, '2019-11-18', '', '', '', '', '', '', '1', '2'),
(23, '2019-11-18', '', '', '', '', '', '', '1', '2'),
(24, '2019-11-18', '', '', '', '', '', '', '1', '2'),
(25, '2019-11-18', '', '', '', '', '', '', '1', '2'),
(26, '2019-11-18', '', '', '', '', '', '', '1', '2'),
(27, '2019-11-18', '', '', '', '', '', '', '1', '2'),
(28, '2019-11-18', '', '', '', '', '', '', '1', '2'),
(29, '2019-11-25', 'Penebasan Lahan', '', 'Cangkul', 'Bh', '10', '5%', '16', '1');

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
('9', '2019', '1212'),
('6', '2019', '130805140600'),
('7', '2019', '130805140600'),
('1', '2019', '2'),
('3', '2019', '5'),
('4', '2019', '6'),
('5', '2019', '7');

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
('2019-01-01', 'Anotasi_2019-11-09_1913011.png', '', '7'),
('2019-01-01', 'Anotasi_2019-11-09_1913012.png', '', ''),
('2019-01-01', 'Anotasi_2019-11-09_1913013.png', '', ''),
('2019-11-01', '341.png', '', ''),
('2019-11-01', '609e87e19ffab8a696ffc4018b760927.png', '', '1'),
('2019-11-01', '93da0d59f4e94f41312e966e007c8cb8.png', '', '1'),
('2019-11-01', 'a8655fb07da5d236c022191e374dd7de.jpg', '', '1'),
('2019-11-01', 'Anotasi_2019-11-08_105444.png', '', ''),
('2019-11-01', 'IMG20190901202252.jpg', '', ''),
('2019-11-02', 'Great_War_Tenma_ARc_(27).png', '', ''),
('2019-11-04', 'Add_a_heading.png', '', ''),
('2019-11-07', 'barcode1.png', '', ''),
('2019-11-15', 'Great_War_Tenma_ARc_(28).png', '', ''),
('2019-11-18', '14b2cdb0a0f4ce924173fdd9b1b2eb3a.png', '', '1'),
('2019-11-18', '1e43ebec1446185f536ae16e47205315.png', '', '1'),
('2019-11-18', 'Birth_Of_Demon_Lord_(4).png', '', ''),
('2019-11-18', 'cc8414a3a391c8cf0aafbc6be78c5e38.jpg', '', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar_pengawasan`
--

CREATE TABLE `gambar_pengawasan` (
  `id_pengawasan` varchar(50) NOT NULL,
  `minggu` varchar(50) NOT NULL,
  `id_perencanaan` varchar(50) NOT NULL,
  `id_gambar` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gambar_pengawasan`
--

INSERT INTO `gambar_pengawasan` (`id_pengawasan`, `minggu`, `id_perencanaan`, `id_gambar`, `gambar`) VALUES
('2019-11-15', '1', '1', '2', '8e5be2f962a84025716ed5c6872b09fa.png'),
('2019-11-18', '1', '1', '3', '7055037bcfe46c1df95335759e6e10fd.png');

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
('10', '1', 'd2a020fb562da377803d07232814cb9c.jpg'),
('11', '57', '8381e3aff5b4d120966867c765f25517.png'),
('2', '2', 'R_vs_Yuuki.png'),
('3', '3', 'apps_23032_13608622719434797_30372fd8-b4bd-41c0-beea-1c2a61e087c11.jpg'),
('4', '4', 'Great_War_Tenma_ARc_(1).png'),
('5', '5', 'GREAT_WAR_TENMA_ARC_BAGIAN_1_(4).png'),
('6', '6', 'Anotasi_2019-11-09_1916082.png'),
('7', '7', '35.png'),
('8', '43', 'barcode.png'),
('9', '1', '5d9e33663e2ffcc1b20275de478942d3.png');

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
('1', 'Cangkul', '100000'),
('10', 'TestTanpaIdEdit', '500000'),
('11', 'Alat Test Sekian', '10000'),
('2', 'Parang', '200000'),
('3', 'Palu', '10000'),
('4', 'Gerobak', '1000000'),
('5', 'Becak', '670000'),
('6', 'Alat 1', '600000'),
('7', 'Alat 2', '800000'),
('8', 'Alat 3', '560000'),
('9', 'TestJesi', '1000000');

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
('1', 'Penebasan Lahan'),
('10', 'Contoh 6'),
('11', 'TestJesi'),
('12', 'Uji Test'),
('13', 'NamaJenisTanpaId'),
('14', 'Uji'),
('15', 'Test Lagi'),
('16', 'Pembuatan Jalan 2'),
('2', 'Pembuatan Gorong-gor'),
('3', 'Penggalian Selokan'),
('4', 'Pembuatan Jalan'),
('5', 'Contoh 1'),
('6', 'Contoh 2'),
('7', 'Contoh 3'),
('8', 'Contoh 4'),
('9', 'Contoh 5 Edit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` varchar(2) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `nip` decimal(10,0) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `nama`, `nip`, `jabatan`) VALUES
('1', 'Muhammad Hamsion', '12345', 'Jabatan 1'),
('10', 'iduiaoudsoaio', '98932839', 'jdkajhdkjas'),
('11', 'jadkjahskj', '123737', 'kdakjhsdj'),
('12', 'jdkajsk', '984937487', 'kldaldkjak'),
('13', 'contain number', '191919', 'dakjdshk'),
('2', 'Kumara Zegion', '12341', 'Jabatan 2'),
('3', 'Nama Baru Update', '101010', 'Jabatan 3'),
('4', 'TambahBaru', '7643473', 'Jabatan 4'),
('5', 'PenTTD Baru', '89383838', 'Jabatan 5'),
('6', 'Howhow', '121212121', 'Jabatan 6'),
('7', 'jadhkjah', '98989787', 'jdkjahdjkas'),
('8', 'kadksajkdjlakj', '111111', 'kdhakjdsk'),
('9', 'Test Nama', '8767868', 'hdkjahdkjas');

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
('2019-01-01', '6', '5', '2019', '2019-01-01'),
('2019-01-01', '7', '6', '2019', '2019-01-01'),
('2019-11-01', '1', '1', '2019', '2019-11-01'),
('2019-11-01', '8', '1', '2019', '2019-11-01'),
('2019-11-02', '2', '3', '2019', '2019-11-02'),
('2019-11-02', '8', '1', '2019', '2019-11-02'),
('2019-11-03', '2', '3', '2019', '2019-11-03'),
('2019-11-04', '2', '3', '2019', '2019-11-04'),
('2019-11-07', '1', '1', '2019', '2019-11-07'),
('2019-11-15', '5', '4', '2019', '2019-11-15'),
('2019-11-18', '1', '1', '2019', '2019-11-18'),
('2019-11-19', '5', '4', '2019', '2019-11-19'),
('2019-11-20', '5', '4', '2019', '2019-11-20'),
('2019-11-21', '5', '4', '2019', '2019-11-21'),
('2019-11-22', '5', '4', '2019', '2019-11-22');

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
('2019-11-15', '1', '1', '2019', '1'),
('2019-11-15', '5', '4', '2019', '1'),
('2019-11-15', '6', '5', '2019', '1'),
('2019-11-15', '7', '6', '2019', '1'),
('2019-11-18', '1', '1', '2019', '1'),
('2019-11-18', '1', '1', '2019', '2'),
('2019-11-18', '1', '1', '2019', '3'),
('2019-11-25', '16', '1', '2019', '1');

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
('1', '1', '2019', '0', '0', 'testEdit', 'TestEdit', 'testEdit3', 'Edit4', 'testBugLagi77'),
('10', '1', '2019', '0', '0', 'test', 'test', 'test', 'test', 'testJesi'),
('11', '1', '2019', '0', '0', 'jghjg', 'gjhg', 'jjkj', 'jjhkj', 'Test'),
('12', '1', '2019', '0', '0', '', '', '', '', ''),
('13', '1', '2019', '0', '0', '', '', '', '', ''),
('14', '1', '2019', '0', '0', '', '', '', '', ''),
('15', '1', '2019', '0', '0', '', '', '', '', ''),
('16', '1', '2019', '0', '0', '', '', '', '', ''),
('17', '1', '2019', '0', '0', '', '', '', '', ''),
('18', '1', '2019', '0', '0', '', '', '', '', ''),
('19', '1', '2019', '0', '0', '', '', '', '', ''),
('2', '3', '2019', '0', '0', '', '', '', '', ''),
('20', '1', '2019', '0', '0', '', '', '', '', ''),
('21', '1', '2019', '0', '0', '', '', '', '', ''),
('22', '1', '2019', '0', '0', '', '', '', '', ''),
('23', '1', '2019', '0', '0', '', '', '', '', ''),
('24', '1', '2019', '0', '0', '', '', '', '', ''),
('25', '1', '2019', '0', '0', '', '', '', '', ''),
('26', '1', '2019', '0', '0', '', '', '', '', ''),
('27', '1', '2019', '0', '0', '', '', '', '', ''),
('28', '1', '2019', '0', '0', '', '', '', '', ''),
('29', '1', '2019', '0', '0', '', '', '', '', ''),
('3', '3', '2019', '0', '0', '', '', '', '', ''),
('30', '1', '2019', '0', '0', '', '', '', '', ''),
('31', '1', '2019', '0', '0', '', '', '', '', ''),
('32', '1', '2019', '0', '0', '', '', '', '', ''),
('33', '1', '2019', '0', '0', '', '', '', '', ''),
('34', '1', '2019', '0', '0', 'EditLagi', 'EditKeEmpathahaha', 'jhakdhkja', 'kjhdkajh', 'EditKesekian'),
('35', '1', '2019', '0', '0', '', '', '', '', ''),
('36', '1', '2019', '0', '0', '1', '1', '1', '1', '1'),
('37', '1', '2019', '0', '0', '1', '1', '1', '1', '1'),
('38', '1', '2019', '0', '0', 'test', 'test', 'test', 'test', 'test'),
('39', '1', '2019', '0', '0', '', '', '', '', ''),
('4', '3', '2019', '0', '0', '', '', '', '', ''),
('40', '1', '2019', '0', '0', '', '', '', '', ''),
('41', '1', '2019', '0', '0', '', '', '', '', 'Perencanaan Hmm'),
('42', '1', '2019', '0', '0', '', '', '', '', 'Perencanaan x'),
('43', '1', '2019', '0', '0', 'test', 'test', 'test', 'test', 'test'),
('44', '1', '2019', '0', '0', 'test', 'test', 'test', 'test', 'test'),
('45', '1', '2019', '0', '0', 'Lokasinya', 'Hahaha', 'Hahaha', 'Hahahaha', 'Hahahahaha'),
('46', '1', '2019', '0', '0', 'Padang', 'Penggalian', '100', '200', 'Ini Keterangan'),
('47', '1', '2019', '0', '0', 'Padang', 'Penggalian', '100', '200', 'Ini Keterangan'),
('48', '1', '2019', '0', '0', 'Padang', 'Penggalian', '100', '200', 'Ini Keterangan'),
('49', '1', '2019', '0', '0', 'khdkj', 'hjdkshdk', 'jhdskjh', 'jhkjfh', 'jhskj'),
('5', '4', '2019', '0', '0', '', '', '', '', 'Perencanaan 12'),
('50', '1', '2019', '0', '0', 'khdkj', 'hjdkshdk', 'jhdskjh', 'jhkjfh', 'jhskj'),
('51', '1', '2019', '0', '0', 'khdkj', 'hjdkshdk', 'jhdskjh', 'jhkjfh', 'jhskj'),
('52', '1', '2019', '0', '0', 'khdkj', 'hjdkshdk', 'jhdskjh', 'jhkjfh', 'Perencanaan 11'),
('53', '1', '2019', '0', '0', 'khdkj', 'hjdkshdk', 'jhdskjh', 'jhkjfh', 'Perencanaan 10'),
('54', '1', '2019', '0', '0', 'khdkj', 'hjdkshdk', 'jhdskjh', 'jhkjfh', 'jhskj'),
('55', '4', '2019', '0', '0', 'test', 'test', 'test', 'test', 'Perencanaan 9'),
('56', '4', '2019', '0', '0', 'test', 'test', 'test', 'test', 'Perencanaan 8'),
('57', '9', '2019', '0', '0', 'Padang Edit', 'Pembuatan Jalan Edit Edit 2', '300 m Edit', '20,20,30 Edit', 'Perencanaan 7'),
('58', '1', '2019', '0', '0', 'test', 'test', 'test', 'test', 'Perencanaan 6'),
('59', '1', '2019', '0', '0', 'jdhkajh', 'hdkjahjds', 'jhdkjahjk', 'jdhajh', 'Perencanaan 5'),
('6', '5', '2019', '0', '0', 'test', 'test', 'test', 'test', 'Perencanaan 4'),
('7', '6', '2019', '0', '0', 'Test', 'Test', 'Test', 'Test', 'Perencanaan 3'),
('8', '1', '2019', '0', '0', 'Test', 'test', 'test', 'test', 'Perencanaan 2'),
('9', '1', '2019', '10', '0', 'ajgahj', 'gdjhagd', 'hjgdjhag', 'hdgsjhg', 'Perencanaan 1');

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
('1', '2019', 'Paket Perubahan', '3', 'Pembuatan gorong-gorong', '1 Bulan', 'Padang Panjang', '2019', '100000000'),
('10', '2019', 'Test', '', '', '', '', '', ''),
('11', '2019', 'Tust', '', '', '', '', '', ''),
('12', '2019', 'Tost', '', '', '', '', '', ''),
('2', '2019', 'Paket 2', 'dsadas', 'jhdjahdjka', 'kdhadhka', 'jhdahsdk', 'jhdakjhsd', '10000000'),
('3', '2019', 'Paket 3', 'kjdhakjh', 'jhdkajhkj', 'jhakjdhs', 'jdhakjh', 'hdkajhsd', '10000000'),
('4', '2019', 'Paket 4', 'dhasjk', 'jhdkahk', 'jhdkahkj', 'jhadska', 'djhakjsd', '10000000'),
('5', '2019', 'Paket 5', 'jdhkasjhd', 'jdhakjhsk', 'hjdkjashk', 'hdkjahs', 'jdhkasdjk', '10000000'),
('6', '2019', 'Pembuatan jembatan', 'djhaskdj', 'jhdkjhak', 'hdshakjkj', 'jhdkajhs', 'jhdkjahdkjs', '10000000'),
('7', '2019', 'perbaikan jalan', 'dasdjhk', 'jhdkjsahj', 'dkjhaskjdhk', 'hdkjsahk', 'jhkjashd', '10000000'),
('8', '2019', 'Update Nama Paket Saya', 'djhakjh', 'kjhkahdkjsah', 'kjhdjkahdsk', 'jdkjahsdkj', 'jshakjdhk', '1000000'),
('9', '2019', 'Pembuatan Jalan', 'Jumlah Tahap', 'jhgjhg', 'gjhgj', 'hjghjg', 'hjgjh', '3000000');

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
('10', 'trerte'),
('11', 'gfdf'),
('2', 'Pcss'),
('3', 'Pcs'),
('4', 'jjj'),
('5', 'yuy'),
('6', 'mnnbnm'),
('7', 'buah'),
('8', 'jhk'),
('9', 'uyuyu');

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
  `id_ttd_harian` varchar(50) NOT NULL,
  `id_dibuat` varchar(50) NOT NULL,
  `id_diperiksa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ttd_harian`
--

INSERT INTO `ttd_harian` (`id_lap_harian`, `id_lap_perencanaan`, `id_ttd_harian`, `id_dibuat`, `id_diperiksa`) VALUES
('2019-11-01', '1', '1', '2', '2');

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
('1', '2019-11-15', '1', '2', '1'),
('2', '2019-11-18', '1', '2', '1');

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
(1, '54', '1', '2', '2'),
(3, '34', '2', '2', '2'),
(4, '55', '1', '1', '130805140600'),
(5, '56', '1', '1', '130805140600'),
(9, '57', '1', '3', '1212'),
(12, '1', '3', '1', '2'),
(13, '11', '1', '1', '2'),
(14, '10', '4', '2', '2'),
(15, '58', '1', '1', '2'),
(16, '59', '1', '1', '2');

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
  ADD PRIMARY KEY (`id_lap_perencanaan`,`id_paket`,`tahun`,`id_detail_bahan_alat`,`tanggal`,`minggu`),
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
  ADD PRIMARY KEY (`id`,`id_lap_perencanaan`,`id_paket`,`tahun`,`tanggal`,`minggu`),
  ADD KEY `lap_perencanaan_detail_jenis_pekerjaan_fk` (`id_lap_perencanaan`,`id_paket`,`tahun`);

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
  ADD PRIMARY KEY (`id_lap_harian`,`gambar`,`id_paket`,`id_perencanaan`);

--
-- Indeks untuk tabel `gambar_pengawasan`
--
ALTER TABLE `gambar_pengawasan`
  ADD PRIMARY KEY (`id_pengawasan`,`minggu`,`id_perencanaan`,`id_gambar`);

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
  ADD PRIMARY KEY (`id_lap_pengawasan`,`id_lap_perencanaan`,`id_paket`,`tahun`,`minggu`),
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
-- Indeks untuk tabel `tgl_caturwulan`
--
ALTER TABLE `tgl_caturwulan`
  ADD PRIMARY KEY (`id_caturwulan`);

--
-- Indeks untuk tabel `ttd_harian`
--
ALTER TABLE `ttd_harian`
  ADD PRIMARY KEY (`id_lap_harian`,`id_lap_perencanaan`,`id_ttd_harian`);

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
