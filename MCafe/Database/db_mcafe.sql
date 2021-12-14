-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Des 2021 pada 06.00
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mcafe`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(50) NOT NULL,
  `tanggal_pemesanan` datetime NOT NULL,
  `total_belanja` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `tanggal_pemesanan`, `total_belanja`) VALUES
(76, '2021-11-11 10:29:00', 10000),
(77, '2021-11-12 21:05:00', 10000),
(78, '2021-11-12 21:54:00', 10000),
(79, '2021-11-14 18:58:00', 15000),
(80, '2021-11-15 19:23:00', 10000),
(81, '2021-11-15 21:07:00', 10000),
(82, '2021-11-15 22:43:00', 25000),
(83, '2021-11-16 23:12:00', 10000),
(84, '2021-11-16 23:18:00', 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan_produk`
--

CREATE TABLE `pemesanan_produk` (
  `id_pemesanan_produk` int(50) NOT NULL,
  `id_pemesanan` int(50) NOT NULL,
  `id_menu` varchar(50) NOT NULL,
  `jumlah` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan_produk`
--

INSERT INTO `pemesanan_produk` (`id_pemesanan_produk`, `id_pemesanan`, `id_menu`, `jumlah`) VALUES
(32, 43, '25', 2),
(33, 44, '25', 1),
(34, 45, '25', 1),
(35, 46, '25', 1),
(36, 47, '25', 1),
(37, 48, '25', 1),
(38, 49, '25', 4),
(39, 50, '25', 2),
(40, 51, '27', 2),
(41, 51, '28', 1),
(42, 52, '27', 1),
(43, 52, '28', 1),
(44, 53, '27', 1),
(45, 53, '28', 2),
(46, 54, '27', 2),
(47, 54, '28', 1),
(48, 55, '28', 1),
(49, 56, '28', 1),
(50, 57, '28', 1),
(51, 58, '28', 1),
(52, 58, '27', 1),
(53, 59, '28', 1),
(54, 60, '27', 2),
(55, 61, '28', 2),
(56, 61, '27', 2),
(57, 62, '27', 1),
(58, 63, '28', 1),
(59, 63, '27', 1),
(60, 64, '28', 1),
(61, 65, '28', 1),
(62, 66, '28', 1),
(63, 0, '28', 2),
(64, 0, '27', 2),
(65, 0, '28', 1),
(66, 0, '27', 4),
(67, 0, '28', 4),
(68, 70, '28', 1),
(69, 71, '28', 1),
(70, 71, '27', 1),
(71, 72, '28', 2),
(72, 72, '27', 1),
(73, 73, '28', 1),
(74, 73, '27', 2),
(75, 74, '28', 1),
(76, 74, '27', 2),
(77, 75, '27', 1),
(78, 75, '28', 1),
(79, 76, '28', 1),
(80, 77, '28', 1),
(81, 78, '28', 1),
(82, 79, '27', 1),
(83, 80, '28', 1),
(84, 81, '28', 1),
(85, 82, '28', 1),
(86, 82, '27', 1),
(87, 83, '28', 1),
(88, 84, '28', 3),
(89, 84, '29', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_menu` int(50) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `jenis_menu` varchar(50) NOT NULL,
  `stok` int(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_menu`, `nama_menu`, `jenis_menu`, `stok`, `harga`, `gambar`) VALUES
(27, 'A', 'Makanan', 99, 15000, '2a4e770d284434cb44bc323bfc0b0376.jpg'),
(28, 'B', 'Minuman', 99, 10000, '0c8d877e6cdef968fe0ea795e6cf6d7e.jpg'),
(29, 'C', 'Makanan', 99, 20000, '03b7ef3b6b6cc2a2ba92a63c9143176e.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(25) NOT NULL,
  `alamat` varchar(25) NOT NULL,
  `hp` varchar(25) NOT NULL,
  `status` enum('admin','user','','') NOT NULL,
  `validasi` text NOT NULL,
  `code` mediumint(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `name`, `email`, `password`, `jenis_kelamin`, `alamat`, `hp`, `status`, `validasi`, `code`) VALUES
(10, 'Mcafe', 'mcafe.smd@gmail.com', '$2y$10$RkqxT5ayRzlRUeOAvQgP.ec8Dicn4Hr9z66OUk52yBbKdoMIC2E5O', 'Laki-Laki', 'Samarinda', '08', 'admin', 'verified', 0),
(13, 'Makhfud', 'makhfud1107@gmail.com', '$2y$10$7LGcgTWyHJ4QP3GZeoEwXehPMVK2afAwxCb6vosDPF8JjP84ditga', 'Laki-Laki', 'Samarinda', '08', 'user', 'verified', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indeks untuk tabel `pemesanan_produk`
--
ALTER TABLE `pemesanan_produk`
  ADD PRIMARY KEY (`id_pemesanan_produk`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT untuk tabel `pemesanan_produk`
--
ALTER TABLE `pemesanan_produk`
  MODIFY `id_pemesanan_produk` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_menu` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
