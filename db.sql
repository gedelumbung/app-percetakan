-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Inang: localhost
-- Waktu pembuatan: 30 Agu 2015 pada 09.27
-- Versi Server: 5.5.44-0ubuntu0.14.04.1
-- Versi PHP: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `db_penjualan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_daftar_cetak`
--

CREATE TABLE IF NOT EXISTS `dlmbg_daftar_cetak` (
  `id_daftar_cetak` int(10) NOT NULL AUTO_INCREMENT,
  `kode_pemesanan` varchar(20) NOT NULL,
  `kode_jenis_cetakan` int(10) NOT NULL,
  PRIMARY KEY (`id_daftar_cetak`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_gaji_karyawan`
--

CREATE TABLE IF NOT EXISTS `dlmbg_gaji_karyawan` (
  `id_gaji_karyawan` int(5) NOT NULL AUTO_INCREMENT,
  `id_karyawan` int(5) NOT NULL,
  `tanggal` varchar(40) NOT NULL,
  PRIMARY KEY (`id_gaji_karyawan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `dlmbg_gaji_karyawan`
--

INSERT INTO `dlmbg_gaji_karyawan` (`id_gaji_karyawan`, `id_karyawan`, `tanggal`) VALUES
(1, 2, 'May 2013'),
(3, 3, 'May 2013');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_jenis_cetakan`
--

CREATE TABLE IF NOT EXISTS `dlmbg_jenis_cetakan` (
  `kode_jenis_cetakan` int(5) NOT NULL AUTO_INCREMENT,
  `id_jenis_satuan` int(10) NOT NULL,
  `nama_cetakan` varchar(100) NOT NULL,
  `harga` int(20) NOT NULL,
  PRIMARY KEY (`kode_jenis_cetakan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `dlmbg_jenis_cetakan`
--

INSERT INTO `dlmbg_jenis_cetakan` (`kode_jenis_cetakan`, `id_jenis_satuan`, `nama_cetakan`, `harga`) VALUES
(1, 1, 'Kertas A45', 10000),
(3, 2, 'Kertas Manila', 9000),
(5, 2, 'aaa', 3000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_jenis_satuan`
--

CREATE TABLE IF NOT EXISTS `dlmbg_jenis_satuan` (
  `id_jenis_satuan` int(10) NOT NULL AUTO_INCREMENT,
  `satuan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_jenis_satuan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `dlmbg_jenis_satuan`
--

INSERT INTO `dlmbg_jenis_satuan` (`id_jenis_satuan`, `satuan`) VALUES
(1, 'rim'),
(2, 'lembar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_karyawan`
--

CREATE TABLE IF NOT EXISTS `dlmbg_karyawan` (
  `id_karyawan` int(5) NOT NULL AUTO_INCREMENT,
  `nama_karyawan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `gaji_pokok` int(20) NOT NULL,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `dlmbg_karyawan`
--

INSERT INTO `dlmbg_karyawan` (`id_karyawan`, `nama_karyawan`, `alamat`, `gaji_pokok`) VALUES
(2, 'Wayan Joblar', 'Jakarta', 400000),
(3, 'Made Lempog', 'surabaya', 350000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_kwitansi`
--

CREATE TABLE IF NOT EXISTS `dlmbg_kwitansi` (
  `kode_kwitansi` varchar(20) NOT NULL,
  `kode_nota` varchar(20) NOT NULL,
  `tgl_bayar` int(30) NOT NULL,
  PRIMARY KEY (`kode_kwitansi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_pelanggan`
--

CREATE TABLE IF NOT EXISTS `dlmbg_pelanggan` (
  `kode_pelanggan` int(5) NOT NULL AUTO_INCREMENT,
  `nama_pelanggan` varchar(100) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `alamat_pelanggan` text NOT NULL,
  PRIMARY KEY (`kode_pelanggan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data untuk tabel `dlmbg_pelanggan`
--

INSERT INTO `dlmbg_pelanggan` (`kode_pelanggan`, `nama_pelanggan`, `jenis`, `alamat_pelanggan`) VALUES
(31, 'Gede Lumbung', 'Umum', 'Dewi Madri'),
(33, 'Dedek', 'Perusahaan', 'fdfdfdf'),
(35, 'Ika Kartika Rahayu', 'Umum', 'Rogojampi, Banyuwangi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_pembayaran`
--

CREATE TABLE IF NOT EXISTS `dlmbg_pembayaran` (
  `kode_pembayaran` varchar(30) NOT NULL,
  `kode_pemesanan` varchar(30) NOT NULL,
  `tgl_bayar` varchar(40) NOT NULL,
  `bayar` int(10) NOT NULL,
  PRIMARY KEY (`kode_pembayaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dlmbg_pembayaran`
--

INSERT INTO `dlmbg_pembayaran` (`kode_pembayaran`, `kode_pemesanan`, `tgl_bayar`, `bayar`) VALUES
('PM00000001', 'PS00000001', '28 June 2013', 173000),
('PM00000002', 'PS00000002', '14 July 2013', 60000),
('PM00000003', 'PS00000004', '18 July 2013', 20000),
('PM00000004', 'PS00000006', '31 August 2015', 10000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_pemesanan`
--

CREATE TABLE IF NOT EXISTS `dlmbg_pemesanan` (
  `kode_pemesanan` varchar(20) NOT NULL,
  `tgl_pesan` varchar(30) NOT NULL,
  `tgl_selesai` varchar(30) NOT NULL,
  `kode_pelanggan` int(5) NOT NULL,
  `jumlah_harga` int(20) NOT NULL,
  `uang_muka` int(20) NOT NULL,
  `status_pembayaran` varchar(50) NOT NULL DEFAULT 'Belum Lunas',
  PRIMARY KEY (`kode_pemesanan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dlmbg_pemesanan`
--

INSERT INTO `dlmbg_pemesanan` (`kode_pemesanan`, `tgl_pesan`, `tgl_selesai`, `kode_pelanggan`, `jumlah_harga`, `uang_muka`, `status_pembayaran`) VALUES
('PS00000001', '24 June 2013', '27 June 2013', 31, 93000, 20000, '0'),
('PS00000002', '14 July 2013', '16 July 2013', 33, 93000, 40000, 'Lunas'),
('PS00000003', '14 July 2013', '17 July 2013', 33, 30000, 30000, 'Lunas'),
('PS00000004', '15 July 2013', '20 July 2013', 35, 20000, 10000, 'Lunas'),
('PS00000005', '16 July 2013', '20 July 2013', 35, 45000, 30000, 'Belum Lunas'),
('PS00000006', '20 August 2015', '29 August 2015', 33, 19000, 10000, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_pemesanan_detail`
--

CREATE TABLE IF NOT EXISTS `dlmbg_pemesanan_detail` (
  `id_pemesanan_detail` int(10) NOT NULL AUTO_INCREMENT,
  `kode_pemesanan` varchar(30) NOT NULL,
  `kode_jenis_cetakan` int(10) NOT NULL,
  `jumlah` int(10) NOT NULL,
  PRIMARY KEY (`id_pemesanan_detail`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data untuk tabel `dlmbg_pemesanan_detail`
--

INSERT INTO `dlmbg_pemesanan_detail` (`id_pemesanan_detail`, `kode_pemesanan`, `kode_jenis_cetakan`, `jumlah`) VALUES
(53, 'PS00000001', 1, 3),
(54, 'PS00000001', 5, 21),
(55, 'PS00000002', 1, 3),
(56, 'PS00000002', 5, 21),
(58, 'PS00000003', 1, 3),
(59, 'PS00000004', 1, 2),
(60, 'PS00000005', 3, 3),
(61, 'PS00000005', 5, 6),
(64, 'PS00000006', 1, 1),
(65, 'PS00000006', 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_sessions`
--

CREATE TABLE IF NOT EXISTS `dlmbg_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dlmbg_sessions`
--

INSERT INTO `dlmbg_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('36045a45ea50e4317f16f7b91e48a54d', '203.128.94.158', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.157 Safari/537.36', 1440926800, 'a:6:{s:9:"user_data";s:0:"";s:9:"logged_in";s:17:"yesGetMeLoginBaby";s:15:"nama_user_login";s:12:"Gede Lumbung";s:9:"kode_user";s:1:"1";s:8:"username";s:5:"admin";s:5:"level";s:5:"admin";}'),
('51b616c2b0f06b0b13a718b006e6d726', '203.128.94.158', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.155 Safari/537.36', 1439816246, 'a:7:{s:9:"user_data";s:0:"";s:9:"logged_in";s:17:"yesGetMeLoginBaby";s:15:"nama_user_login";s:12:"Gede Lumbung";s:9:"kode_user";s:1:"1";s:8:"username";s:5:"admin";s:5:"level";s:5:"admin";s:10:"key_search";s:14:"nama_pelanggan";}');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_setting`
--

CREATE TABLE IF NOT EXISTS `dlmbg_setting` (
  `id_setting` int(10) NOT NULL AUTO_INCREMENT,
  `tipe` varchar(50) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content_setting` text NOT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `dlmbg_setting`
--

INSERT INTO `dlmbg_setting` (`id_setting`, `tipe`, `title`, `content_setting`) VALUES
(1, 'site_title', 'Nama Situs', 'Aplikasi Percetakan | DLMBG'),
(2, 'site_quotes', 'Quotes Situs', 'Okelah Kalo Begitu'),
(3, 'site_footer', 'Teks Footer', 'Gede Lumbung - 2013 <br>Aplikasi Percetakan | DLMBG'),
(4, 'key_login', 'Hash Key MD5', 'AppPercetakan32'),
(5, 'site_theme', 'Theme Folder', 'flat-dot'),
(6, 'site_limit_small', 'Limit Data Small', '5'),
(7, 'site_limit_medium', 'Limit Data Medium', '10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dlmbg_user`
--

CREATE TABLE IF NOT EXISTS `dlmbg_user` (
  `kode_user` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(10) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  PRIMARY KEY (`kode_user`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `dlmbg_user`
--

INSERT INTO `dlmbg_user` (`kode_user`, `username`, `password`, `level`, `nama_user`) VALUES
(1, 'admin', '4c47281cf940a96b55dc2323d237f190', 'admin', 'Gede Lumbung'),
(3, 'kasir', 'f2f9e8daebf8c0ebceef0050fe6c2423', 'kasir', 'Dedek Haryanto');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
