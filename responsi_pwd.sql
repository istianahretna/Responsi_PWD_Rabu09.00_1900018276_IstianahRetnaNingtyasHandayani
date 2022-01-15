-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jan 2022 pada 05.50
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `responsi_pwd`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `email`, `pass`, `name`) VALUES
(1, 'admin@gmail.com', 'admin', 'istianah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_barang`
--

CREATE TABLE `data_barang` (
  `id_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(200) NOT NULL,
  `harga_produk` varchar(100) NOT NULL,
  `berat_produk` varchar(100) NOT NULL,
  `stok` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_barang`
--

INSERT INTO `data_barang` (`id_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `stok`) VALUES
('1', 'Wedang Jahe Bubuk', '13000', '250 gr', 80),
('2', 'Wedang Temulawak Bubuk', '15000', '250 gr', 95),
('3', 'Wedang Kunir Bubuk', '17000', '250 gr', 75),
('4', 'Wedang Jahe Kayu Manis', '15000', '250 gr', 100),
('5', 'Wedang Jahe Serai', '12000', '250 gr', 150),
('6', 'Wedang Kunyit Asam Bubuk', '13000', '250 gr', 65),
('7', 'Wedang Jahe  Merah Bubuk', '15000', '250gr', 40),
('8', 'Wedang Skoteng Bubuk', '14000', '250 gr', 200);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nohp` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `komentar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id`, `nama`, `nohp`, `email`, `komentar`) VALUES
(2, 'Bela', '089563422713', 'bela@gmail.com', 'Request wedang jahe sere lemon'),
(3, 'tina', '0895645349896', 'tina@gmail.com', 'sangat menarik'),
(7, 'Istianah Retna Ningtyas H', '0895645343687', 'istianahretnaningtyas@gmail.com', 'Request Wedang Uwuh Bubuk'),
(8, 'tyas', '08347896456', 'istianah@gmail.com', 'Request Wedang Beras Kencur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(100) NOT NULL,
  `id_pelanggan` varchar(50) NOT NULL,
  `nohp` varchar(50) NOT NULL,
  `tgl_pembelian` date NOT NULL,
  `alamat_pengiriman` varchar(100) NOT NULL,
  `sub_total` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `nohp`, `tgl_pembelian`, `alamat_pengiriman`, `sub_total`) VALUES
(66, '1', '081237656546', '2022-01-12', 'berbah', '12000'),
(67, '10', '08665445378565', '2022-01-13', 'Bantul', '25000'),
(68, '1', '0896753555434', '2022-01-14', 'Jawa Timur', '15000'),
(69, '1', '0895645349896', '2022-01-14', 'Kalimantan, Indonesia ', '27000'),
(70, '1', '088495325421', '2022-01-14', 'Jakarta', '27000'),
(71, '1', '088495325421', '2022-01-14', 'Jakarta', '27000'),
(73, '1', '088495325421', '2022-01-14', 'Jogja', '15000'),
(74, '12', '0878473476', '2022-01-14', 'Yogyakarta', '29000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `pass`) VALUES
(1, 'tina@gmail.com', 'tina', '4e817b7b5292b8e002d7d90290210b0a'),
(2, 'tyas@gmail.com', 'tyas', 'cc8a44247430a7995818b005f9030833'),
(3, 'coba@gamil.com', 'cobaaaa', 'a3040f90cc20fa672fe31efcae41d2db'),
(7, 'istianahretnaningtyas@gmail.com', 'Istianah Retna Ningtyas Handayani', 'f5a459b4abc0baa8aa6a6f3c9cfe3d1c'),
(11, 'tinaa@gmail.com', 'tinaa', '4e817b7b5292b8e002d7d90290210b0a'),
(12, 'istianahretna@gmail.com', 'istianahretna', 'cc8a44247430a7995818b005f9030833');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
