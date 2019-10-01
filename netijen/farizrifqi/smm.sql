-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Agu 2019 pada 16.01
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualanan`
--

CREATE TABLE `penjualanan` (
  `id` int(20) NOT NULL,
  `nama_layanan` varchar(100) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `deskripsi` varchar(200) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penjualanan`
--

INSERT INTO `penjualanan` (`id`, `nama_layanan`, `provider`, `harga`, `deskripsi`, `status`) VALUES
(1, 'KUOTA 1TB', 'axis', '20000', '5GB YOUTUBEES<br />\n1KB BOKEP', 1),
(2, '20GB TELKOMSEL', 'telkomsel', '120000', '5 GB INTERNET<br />\r\n10 GB CHAT<br />\r\n5 GB BOKEP', 1),
(3, 'INDOSAT', 'telkomsel', '20000', 'GANTENGS', 1),
(4, '50 GB XL', 'xl', '10000', '25 GB VIDEO<br />\r\n25 GB INTERNET<br />\r\n1 MB CHATTINGAN', 1),
(5, 'kuota axis', 'axis', '20', 'termurah<br />\r\nterlambat', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `penjualanan`
--
ALTER TABLE `penjualanan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `penjualanan`
--
ALTER TABLE `penjualanan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
