-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jun 2022 pada 19.18
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `s1g_lamongan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `s1g_album_acara`
--

CREATE TABLE `s1g_album_acara` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_acara` int(10) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `s1g_album_acara`
--

INSERT INTO `s1g_album_acara` (`id`, `nama`, `id_acara`, `gambar`) VALUES
(1, 'agungsapta', 1, '1656349776_c9146d579f8cdf813dbb.jpg'),
(2, 'asdasd', 1, '1656349883_9a505d65cb59d7dc69d7.png'),
(3, 'asd', 7, '1656349942_2fa7b5559240ea3863bc.jpg'),
(4, 'agungsaptahs', 7, '1656349973_3f961aee974efc54fb8f.jpg'),
(5, 'sadas', 7, '1656349987_e957475cf3b5d0e4a15c.jpg'),
(6, 'asdasd', 7, '1656349998_f5ab84861895704be9b7.png'),
(7, 'sadas', 7, '1656350014_f0290a0785c253309210.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `s1g_album_peta`
--

CREATE TABLE `s1g_album_peta` (
  `id` int(10) NOT NULL,
  `id_pariwisata` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `s1g_album_peta`
--

INSERT INTO `s1g_album_peta` (`id`, `id_pariwisata`, `nama`, `gambar`) VALUES
(1, 50, 'agungsapta', '1656346315_0016487488923370983d.jpg'),
(3, 50, 'sadas', '1656348646_0ffab8063d4b32aae970.jpg'),
(4, 1, 'asd', '1656349716_864437e4adf4da01cebc.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `s1g_album_acara`
--
ALTER TABLE `s1g_album_acara`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `s1g_album_peta`
--
ALTER TABLE `s1g_album_peta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `s1g_album_acara`
--
ALTER TABLE `s1g_album_acara`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `s1g_album_peta`
--
ALTER TABLE `s1g_album_peta`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
