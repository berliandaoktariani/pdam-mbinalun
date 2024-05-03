-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Bulan Mei 2024 pada 04.45
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pdam`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(14) NOT NULL,
  `no_meter` varchar(12) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tenggang` varchar(2) NOT NULL,
  `id_tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `no_meter`, `nama`, `alamat`, `tenggang`, `id_tarif`) VALUES
('20240503092541', '123240550941', 'TARUNA BERUTU', 'MBINALUN', '03', 18),
('20240503092650', '123240550950', 'SUANDO SIMBOLON ', 'MBINALUN', '03', 18),
('20240503092710', '123240550910', 'PA RAJA LAE BANING', 'MBINALUN', '03', 18),
('20240503092729', '123240550929', 'HOLLIM BERUTU', 'MBINALUN', '03', 18),
('20240503092744', '123240550944', 'RYAN / JUS', 'MBINALUN', '03', 18),
('20240503092915', '123240550915', 'HARAPAN MANIK', 'MBINALUN', '03', 18),
('20240503092932', '123240550932', 'AHWAT BERUTU', 'MBINALUN', '03', 18),
('20240503092949', '123240550949', 'MALATUA SIREGAR', 'MBINALUN', '03', 18),
('20240503093013', '123240550913', 'BUYUNG BOANGMANALU', 'MBINALUN', '03', 18),
('20240503093028', '123240550928', 'UNDANG SINAMO', 'MBINALUN', '03', 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(15) NOT NULL,
  `id_pelanggan` varchar(14) NOT NULL,
  `id_petugas` varchar(12) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `waktu_bayar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `bulan_bayar` varchar(2) NOT NULL,
  `tahun_bayar` year(4) NOT NULL,
  `jumlah_bayar` double NOT NULL,
  `total_akhir` double NOT NULL,
  `bayar` double NOT NULL,
  `kembali` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pelanggan`, `id_petugas`, `tgl_bayar`, `waktu_bayar`, `bulan_bayar`, `tahun_bayar`, `jumlah_bayar`, `total_akhir`, `bayar`, `kembali`) VALUES
('BYR202405030001', '20240503092710', 'P20240429000', '2024-05-03', '2024-05-03 02:34:23', '05', 2024, 20000, 25000, 30000, 5000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penggunaan`
--

CREATE TABLE `penggunaan` (
  `id_penggunaan` varchar(20) NOT NULL,
  `id_pelanggan` varchar(14) NOT NULL,
  `bulan` varchar(2) NOT NULL,
  `tahun` year(4) NOT NULL,
  `meter_awal` int(11) NOT NULL,
  `meter_akhir` int(11) NOT NULL,
  `tgl_cek` date NOT NULL,
  `id_petugas` varchar(12) NOT NULL,
  `beban` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penggunaan`
--

INSERT INTO `penggunaan` (`id_penggunaan`, `id_pelanggan`, `bulan`, `tahun`, `meter_awal`, `meter_akhir`, `tgl_cek`, `id_petugas`, `beban`) VALUES
('20240503092541052024', '20240503092541', '05', 2024, 0, 10, '2024-05-01', 'P20240429000', 0),
('20240503092541062024', '20240503092541', '06', 2024, 10, 15, '2024-06-01', 'P20240429000', 0),
('20240503092541072024', '20240503092541', '07', 2024, 15, 20, '2024-07-01', 'P20240429000', 0),
('20240503092541082024', '20240503092541', '08', 2024, 20, 0, '0000-00-00', '', 0),
('20240503092650052024', '20240503092650', '05', 2024, 0, 5, '2024-05-01', 'P20240429000', 0),
('20240503092650062024', '20240503092650', '06', 2024, 5, 10, '2024-05-01', 'P20240429000', 0),
('20240503092650072024', '20240503092650', '07', 2024, 10, 15, '2024-07-01', 'P20240429000', 0),
('20240503092650082024', '20240503092650', '08', 2024, 15, 0, '0000-00-00', '', 0),
('20240503092710052024', '20240503092710', '05', 2024, 0, 30, '2024-05-01', 'P20240429000', 0),
('20240503092710062024', '20240503092710', '06', 2024, 30, 0, '0000-00-00', '', 0),
('20240503092729052024', '20240503092729', '05', 2024, 0, 0, '0000-00-00', '', 0),
('20240503092744052024', '20240503092744', '05', 2024, 0, 0, '0000-00-00', '', 0),
('20240503092915052024', '20240503092915', '05', 2024, 0, 0, '0000-00-00', '', 0),
('20240503092932052024', '20240503092932', '05', 2024, 0, 0, '0000-00-00', '', 0),
('20240503092949052024', '20240503092949', '05', 2024, 0, 0, '0000-00-00', '', 0),
('20240503093013052024', '20240503093013', '05', 2024, 0, 0, '0000-00-00', '', 0),
('20240503093028052024', '20240503093028', '05', 2024, 0, 0, '0000-00-00', '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` varchar(12) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `akses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama`, `alamat`, `no_telepon`, `jk`, `username`, `password`, `akses`) VALUES
('P20240429000', 'admin', 'MBINALUN', '08216656522', 'L', 'admin', '123', 'petugas');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `qw_pembayaran`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `qw_pembayaran` (
`id_pembayaran` varchar(15)
,`id_pelanggan` varchar(14)
,`id_petugas` varchar(12)
,`tgl_bayar` date
,`waktu_bayar` timestamp
,`bulan_bayar` varchar(2)
,`tahun_bayar` year(4)
,`jumlah_bayar` double
,`total_akhir` double
,`bayar` double
,`kembali` double
,`nama_pelanggan` varchar(50)
,`nama_petugas` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `qw_penggunaan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `qw_penggunaan` (
`id_penggunaan` varchar(20)
,`id_pelanggan` varchar(14)
,`bulan` varchar(2)
,`tahun` year(4)
,`meter_awal` int(11)
,`meter_akhir` int(11)
,`tgl_cek` date
,`beban` double
,`id_petugas` varchar(12)
,`nama_pelanggan` varchar(50)
,`nama_petugas` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `qw_tagihan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `qw_tagihan` (
`id_tagihan` int(11)
,`id_pelanggan` varchar(14)
,`bulan` varchar(2)
,`tahun` year(4)
,`jumlah_meter` int(11)
,`tarif_permtr` double
,`beban` double
,`jumlah_bayar` double
,`status` varchar(15)
,`id_petugas` varchar(12)
,`nama_pelanggan` varchar(50)
,`id_tarif` int(11)
,`nama_petugas` varchar(50)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` int(11) NOT NULL,
  `id_pelanggan` varchar(14) NOT NULL,
  `bulan` varchar(2) NOT NULL,
  `tahun` year(4) NOT NULL,
  `jumlah_meter` int(11) NOT NULL,
  `tarif_permtr` double NOT NULL,
  `jumlah_bayar` double NOT NULL,
  `status` varchar(15) NOT NULL,
  `id_petugas` varchar(12) NOT NULL,
  `beban` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tagihan`
--

INSERT INTO `tagihan` (`id_tagihan`, `id_pelanggan`, `bulan`, `tahun`, `jumlah_meter`, `tarif_permtr`, `jumlah_bayar`, `status`, `id_petugas`, `beban`) VALUES
(113, '20240503092541', '05', 2024, 10, 500, 10000, 'Belum Bayar', 'P20240429000', 0),
(114, '20240503092541', '06', 2024, 25, 500, 12500, 'Belum Bayar', 'P20240429000', 0),
(115, '20240503092541', '07', 2024, 35, 500, 15000, 'Belum Bayar', 'P20240429000', 0),
(116, '20240503092650', '05', 2024, 5, 500, 7500, 'Belum Bayar', 'P20240429000', 0),
(117, '20240503092650', '06', 2024, 15, 500, 10000, 'Belum Bayar', 'P20240429000', 0),
(118, '20240503092650', '07', 2024, 25, 500, 12500, 'Belum Bayar', 'P20240429000', 0),
(119, '20240503092710', '05', 2024, 30, 500, 20000, 'Terbayar', 'P20240429000', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tarif`
--

CREATE TABLE `tarif` (
  `id_tarif` int(11) NOT NULL,
  `kode_tarif` varchar(20) NOT NULL,
  `golongan` varchar(10) NOT NULL,
  `daya` varchar(10) NOT NULL,
  `tarif_permtr` double NOT NULL,
  `beban` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tarif`
--

INSERT INTO `tarif` (`id_tarif`, `kode_tarif`, `golongan`, `daya`, `tarif_permtr`, `beban`) VALUES
(18, 'RT/1MTR', 'RT', '1MTR', 500, 5000);

-- --------------------------------------------------------

--
-- Struktur untuk view `qw_pembayaran`
--
DROP TABLE IF EXISTS `qw_pembayaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `qw_pembayaran`  AS SELECT `pembayaran`.`id_pembayaran` AS `id_pembayaran`, `pembayaran`.`id_pelanggan` AS `id_pelanggan`, `pembayaran`.`id_petugas` AS `id_petugas`, `pembayaran`.`tgl_bayar` AS `tgl_bayar`, `pembayaran`.`waktu_bayar` AS `waktu_bayar`, `pembayaran`.`bulan_bayar` AS `bulan_bayar`, `pembayaran`.`tahun_bayar` AS `tahun_bayar`, `pembayaran`.`jumlah_bayar` AS `jumlah_bayar`, `pembayaran`.`total_akhir` AS `total_akhir`, `pembayaran`.`bayar` AS `bayar`, `pembayaran`.`kembali` AS `kembali`, `pelanggan`.`nama` AS `nama_pelanggan`, `petugas`.`nama` AS `nama_petugas` FROM ((`pembayaran` join `pelanggan` on(`pelanggan`.`id_pelanggan` = `pembayaran`.`id_pelanggan`)) join `petugas` on(`petugas`.`id_petugas` = `pembayaran`.`id_petugas`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `qw_penggunaan`
--
DROP TABLE IF EXISTS `qw_penggunaan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `qw_penggunaan`  AS SELECT `penggunaan`.`id_penggunaan` AS `id_penggunaan`, `penggunaan`.`id_pelanggan` AS `id_pelanggan`, `penggunaan`.`bulan` AS `bulan`, `penggunaan`.`tahun` AS `tahun`, `penggunaan`.`meter_awal` AS `meter_awal`, `penggunaan`.`meter_akhir` AS `meter_akhir`, `penggunaan`.`tgl_cek` AS `tgl_cek`, `penggunaan`.`beban` AS `beban`, `penggunaan`.`id_petugas` AS `id_petugas`, `pelanggan`.`nama` AS `nama_pelanggan`, `petugas`.`nama` AS `nama_petugas` FROM ((`penggunaan` join `pelanggan` on(`penggunaan`.`id_pelanggan` = `pelanggan`.`id_pelanggan`)) join `petugas` on(`penggunaan`.`id_petugas` = `petugas`.`id_petugas`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `qw_tagihan`
--
DROP TABLE IF EXISTS `qw_tagihan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `qw_tagihan`  AS SELECT `tagihan`.`id_tagihan` AS `id_tagihan`, `tagihan`.`id_pelanggan` AS `id_pelanggan`, `tagihan`.`bulan` AS `bulan`, `tagihan`.`tahun` AS `tahun`, `tagihan`.`jumlah_meter` AS `jumlah_meter`, `tagihan`.`tarif_permtr` AS `tarif_permtr`, `tagihan`.`beban` AS `beban`, `tagihan`.`jumlah_bayar` AS `jumlah_bayar`, `tagihan`.`status` AS `status`, `tagihan`.`id_petugas` AS `id_petugas`, `pelanggan`.`nama` AS `nama_pelanggan`, `pelanggan`.`id_tarif` AS `id_tarif`, `petugas`.`nama` AS `nama_petugas` FROM ((`tagihan` join `pelanggan` on(`pelanggan`.`id_pelanggan` = `tagihan`.`id_pelanggan`)) join `petugas` on(`petugas`.`id_petugas` = `tagihan`.`id_petugas`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `penggunaan`
--
ALTER TABLE `penggunaan`
  ADD PRIMARY KEY (`id_penggunaan`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`);

--
-- Indeks untuk tabel `tarif`
--
ALTER TABLE `tarif`
  ADD PRIMARY KEY (`id_tarif`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  MODIFY `id_tagihan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT untuk tabel `tarif`
--
ALTER TABLE `tarif`
  MODIFY `id_tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
