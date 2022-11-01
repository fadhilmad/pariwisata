-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Sep 2022 pada 18.38
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
-- Struktur dari tabel `s1g_acara`
--

CREATE TABLE `s1g_acara` (
  `id_acara` int(10) NOT NULL,
  `nama_tempat` varchar(100) NOT NULL,
  `id_kategori_acara` int(10) NOT NULL,
  `tanggal_acara` date DEFAULT NULL,
  `gambar_acara` text NOT NULL,
  `deskripsi_acara` text NOT NULL,
  `slug_acara` varchar(50) NOT NULL);

--
-- Dumping data untuk tabel `s1g_acara`
--

INSERT INTO `s1g_acara` (`id_acara`, `nama_tempat`, `id_kategori_acara`, `tanggal_acara`, `gambar_acara`, `deskripsi_acara`, `slug_acara`) VALUES
(11, 'makam kelurahan soasio', 6, '2022-07-07', '1657153583_47b12de78f391392c66d.jpg', 'asdas', 'makam-kelurahan-soasio'),
(12, 'asdasd', 6, '2022-07-17', '1657980421_8903c73f6c6026d15f7d.jpeg', 'asdasda', 'asdasd'),
(13, 'kebun kopi dua bersaudara', 6, '2022-07-13', '1658066620_10be4a1a4d1f0dda8f92.jpg', 'dfwq', ''),
(17, 'kebun kopi dua bersaudara', 6, '2022-07-07', '1658148467_6828db003fd7cc494e89.jpg', 'hfjhgjhjhh', 'kebun-kopi-dua-bersaudara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `s1g_admin`
--

CREATE TABLE `s1g_admin` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `profile_img` text NOT NULL,
  `level` enum('admin','user') DEFAULT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `no_hp` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL);

--
-- Dumping data untuk tabel `s1g_admin`
--

INSERT INTO `s1g_admin` (`id`, `nama`, `username`, `password`, `email`, `profile_img`, `level`, `status`, `no_hp`, `alamat`) VALUES
(1, 'Agung Sapta', 'agungsapta', '$2y$10$U4bYuW.44rUL877IrA3UbO.m0i3ICUpOzxjynTqdT3D0LmgVL6DWG', 'agungsapta6@gmail.com', 'https://lh3.googleusercontent.com/a-/AOh14GhzENUdAaS5RzJP6FbGq1iS5YXl1zUJJnSMzbv8ud4=s96-c', 'admin', '0', NULL, NULL),
(3, 'Dev Altiquery', 'devaltiquery', '$2y$10$U4bYuW.44rUL877IrA3UbO.m0i3ICUpOzxjynTqdT3D0LmgVL6DWG', 'devaltiquery@gmail.com', 'https://lh3.googleusercontent.com/a/AATXAJxRmro_l0QGsaGY9lfk82Kz7VV_8qo9rHIN2N_E=s96-c', 'user', '0', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `s1g_album_acara`
--

CREATE TABLE `s1g_album_acara` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `id_acara` int(10) NOT NULL,
  `gambar` text NOT NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `s1g_album_peta`
--

CREATE TABLE `s1g_album_peta` (
  `id` int(10) NOT NULL,
  `id_pariwisata` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `gambar` text NOT NULL);

--
-- Dumping data untuk tabel `s1g_album_peta`
--

INSERT INTO `s1g_album_peta` (`id`, `id_pariwisata`, `nama`, `gambar`) VALUES
(5, 52, 'adasdasd', '1657169321_727cdf1ffc67d80ff24d.jpg'),
(6, 52, 'asd', '1657169335_1f243d58a151524ee777.jpg'),
(7, 52, 'agungsapta', '1657169350_83ff30ae3b16cdbd0b92.jpg'),
(8, 52, 'agungsapta', '1657169366_8e3ae21b20cfbaddb2ed.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `s1g_booking_acara`
--

CREATE TABLE `s1g_booking_acara` (
  `id_booking` int(10) NOT NULL,
  `nama_tempat` varchar(100) NOT NULL,
  `id_kategori_acara` int(10) NOT NULL,
  `tanggal_acara` date DEFAULT NULL,
  `gambar_acara` text NOT NULL,
  `deskripsi_acara` text NOT NULL,
  `status` enum('diterima','ditolak','selesai','menunggu') NOT NULL DEFAULT 'menunggu',
  `bukti_bayar` text NOT NULL,
  `id_user` int(10) NOT NULL,
  `catatan` text DEFAULT NULL);

--
-- Dumping data untuk tabel `s1g_booking_acara`
--

INSERT INTO `s1g_booking_acara` (`id_booking`, `nama_tempat`, `id_kategori_acara`, `tanggal_acara`, `gambar_acara`, `deskripsi_acara`, `status`, `bukti_bayar`, `id_user`, `catatan`) VALUES
(1, 'kebun kopi dua bersaudara', 6, '2022-07-06', '1658066689_3aef479e37e563619c9e.jpg', 'asdas', 'selesai', '1658141171_d3f2b7b207abc7250f4b.jpg', 2, 'oke, silahkan persiapkan di tanggal tersebut'),
(7, 'kebun kopi dua bersaudara', 6, '2022-07-07', '1658148467_6828db003fd7cc494e89.jpg', 'hfjhgjhjhh', 'selesai', '1658148715_4e8c1df47ca65ed639fc.jpg', 2, 'siappkan segalanya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `s1g_feedback`
--

CREATE TABLE `s1g_feedback` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pesan` text NOT NULL);

--
-- Dumping data untuk tabel `s1g_feedback`
--

INSERT INTO `s1g_feedback` (`id`, `nama`, `email`, `pesan`) VALUES
(2, 'admin', 'admin@gmail.com', 'asdas'),
(4, 'admin', 'admin@gmail.com', 'asds'),
(5, 'agungsapta', 'agungsapta6@gmail.com', 'adas'),
(6, 'admin', 'asaptahss@gmail.com', 'sas'),
(7, 'mobile-novguanue', 'agungsapta6@gmail.com', 'asdasxz'),
(8, 'webtakjil', 'admin@gmail.com', 'SDSA'),
(9, 'mobile-novguanue', 'admin@gmail.com', 'sadsa'),
(10, 'agungsapta', 'admin@gmail.com', 'adada'),
(11, 'mobile-novguanue', 'anjarwati259@gmail.com', 'asdasxz');

-- --------------------------------------------------------

--
-- Struktur dari tabel `s1g_kategori`
--

CREATE TABLE `s1g_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `slug` varchar(50) NOT NULL);

--
-- Dumping data untuk tabel `s1g_kategori`
--

INSERT INTO `s1g_kategori` (`id_kategori`, `nama_kategori`, `slug`) VALUES
(12, 'Pantais tr', 'pantais-tr');

-- --------------------------------------------------------

--
-- Struktur dari tabel `s1g_kategori_acara`
--

CREATE TABLE `s1g_kategori_acara` (
  `id_kategori_acara` int(10) NOT NULL,
  `kategori_acara` varchar(100) NOT NULL,
  `slug` varchar(50) NOT NULL);

--
-- Dumping data untuk tabel `s1g_kategori_acara`
--

INSERT INTO `s1g_kategori_acara` (`id_kategori_acara`, `kategori_acara`, `slug`) VALUES
(6, 'Acara Tahunan', 'acara-tahunan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `s1g_komentar_pariwisata`
--

CREATE TABLE `s1g_komentar_pariwisata` (
  `id_komentar` int(10) NOT NULL,
  `id_pariwisata` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` varchar(20) NOT NULL,
  `rating` varchar(10) NOT NULL);

--
-- Dumping data untuk tabel `s1g_komentar_pariwisata`
--

INSERT INTO `s1g_komentar_pariwisata` (`id_komentar`, `id_pariwisata`, `id_user`, `isi`, `tanggal`, `rating`) VALUES
(3, 52, 2, 'asdasdasd', '2022-07-11', '2'),
(5, 52, 2, 'asdasd', '2022-07-11', '3'),
(6, 53, 2, 'asdasd', '2022-07-11', '5'),
(7, 52, 2, 'asdasd', '2022-07-18', '4'),
(8, 52, 2, 'aaaaaaaaaaaa', '2022-07-18', '3'),
(9, 52, 2, 'asdasdasd', '2022-07-18', '4.5'),
(10, 52, 2, 'dasdasdasdasdasdasssssssssssssss', '2022-07-18', '5'),
(11, 52, 2, 'hhhhhhhhhhhhhhhhhhhhhh', '2022-07-18', '3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `s1g_kuliner`
--

CREATE TABLE `s1g_kuliner` (
  `id_kuliner` int(10) NOT NULL,
  `nama_kuliner` varchar(50) NOT NULL,
  `gambar_kuliner` text NOT NULL,
  `lokasi_kuliner` varchar(100) NOT NULL,
  `deskripsi_kuliner` text NOT NULL,
  `slug` varchar(50) NOT NULL);

--
-- Dumping data untuk tabel `s1g_kuliner`
--

INSERT INTO `s1g_kuliner` (`id_kuliner`, `nama_kuliner`, `gambar_kuliner`, `lokasi_kuliner`, `deskripsi_kuliner`, `slug`) VALUES
(2, 'Kopi Lamongan', '1652972398_fc7bb393c196d45fc3c8.jpg', 'Depan Alun Alun kota', '  marupakan  ', 'kopi-lamongan'),
(3, 'Masakan Lamongan2', '1657153714_aa55398b833ae8ff487f.png', 'Depan Alun Alun kota', 'asdasdas', 'masakan-lamongan2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `s1g_pariwisata`
--

CREATE TABLE `s1g_pariwisata` (
  `id_pariwisata` int(20) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_pariwisata` text NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `gambar_pariwisata` text NOT NULL,
  `lokasi_pariwisata` text NOT NULL,
  `deskripsi_pariwisata` text NOT NULL,
  `slug_pariwisata` varchar(50) NOT NULL);

--
-- Dumping data untuk tabel `s1g_pariwisata`
--

INSERT INTO `s1g_pariwisata` (`id_pariwisata`, `id_kategori`, `nama_pariwisata`, `latitude`, `longitude`, `gambar_pariwisata`, `lokasi_pariwisata`, `deskripsi_pariwisata`, `slug_pariwisata`) VALUES
(52, 12, 'kebun kopi dua bersaudara', '-7.09272397178311', '112.33005592975165', 'benteng-kalamata-ternate_1.jpg', 'Kelurahan Dander', 'saaaa', 'kebun-kopi-dua-bersaudara'),
(53, 12, 'asdasd', '-7.079791585741159', '112.31219852888587', 'bjn.jpg', 'jl. aja dulu', 'asdasdas', 'asdasd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `s1g_penginapan`
--

CREATE TABLE `s1g_penginapan` (
  `id_penginapan` int(10) NOT NULL,
  `nama_tempat` varchar(50) NOT NULL,
  `lokasi_tempat` varchar(100) NOT NULL,
  `deskripsi_tempat` text NOT NULL,
  `gambar` text NOT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `slug` varchar(50) NOT NULL);

--
-- Dumping data untuk tabel `s1g_penginapan`
--

INSERT INTO `s1g_penginapan` (`id_penginapan`, `nama_tempat`, `lokasi_tempat`, `deskripsi_tempat`, `gambar`, `latitude`, `longitude`, `slug`) VALUES
(6, 'Pwenginapan Semaqam', 'jl. Ngidol', ' asdas', '1657153775_34617b0440c40391bb04.jpg', '-6.916961879839305', '112.30500364434653', 'pwenginapan-semaqam'),
(7, 'Pwenginapan Sem', 'jl. ngulon', 'seteewt', '1657153842_85b8aae587829d97602c.jpeg', '-7.10396390301353', '112.33966495449158', 'pwenginapan-sem');

-- --------------------------------------------------------

--
-- Struktur dari tabel `s1g_toko`
--

CREATE TABLE `s1g_toko` (
  `id_toko` int(10) NOT NULL,
  `id_kuliner` int(10) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `foto` text NOT NULL,
  `slug_toko` varchar(100) NOT NULL);

--
-- Dumping data untuk tabel `s1g_toko`
--

INSERT INTO `s1g_toko` (`id_toko`, `id_kuliner`, `nama_toko`, `alamat`, `foto`, `slug_toko`) VALUES
(11, 3, 'toko renjana', 'jl baru', '1657619568_3c6161b9584048810880.jpeg', 'toko-renjana'),
(12, 3, 'toko anjali', 'jl tanah gusur', '1657619606_1537acbf91230e24329c.jpeg', 'toko-anjali'),
(13, 2, 'toko kelontong', 'jl aja dlu nnti liat', '1657620329_b64d48d42ea7d1057d88.jpg', 'toko-kelontong'),
(14, 2, 'toko anjali', 'jl baru', '1657620343_49bf30bfdd13958c13d4.jpeg', 'toko-anjali');

-- --------------------------------------------------------

--
-- Struktur dari tabel `s1g_user`
--

CREATE TABLE `s1g_user` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` text NOT NULL);

--
-- Dumping data untuk tabel `s1g_user`
--

INSERT INTO `s1g_user` (`id_user`, `nama`, `email`, `password`, `foto`) VALUES
(1, 'agung sapta', 'agungsapta6@gmail.com', '$2y$10$H7Mdfe2.sSm6m0rBkGHjJ.79f9lRe6dyzaajnEwSfoSfz/zEWz5vO', 'default.jpg'),
(2, 's', 'agungsapta666@gmail.com', '$2y$10$qT6eyj..UkbY0y2AizzEHejO/edlK9rBxLXA1TP3EFNh0AI1jmQhO', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `s1g_acara`
--
ALTER TABLE `s1g_acara`
  ADD PRIMARY KEY (`id_acara`);

--
-- Indeks untuk tabel `s1g_admin`
--
ALTER TABLE `s1g_admin`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `s1g_booking_acara`
--
ALTER TABLE `s1g_booking_acara`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indeks untuk tabel `s1g_feedback`
--
ALTER TABLE `s1g_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `s1g_kategori`
--
ALTER TABLE `s1g_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `s1g_kategori_acara`
--
ALTER TABLE `s1g_kategori_acara`
  ADD PRIMARY KEY (`id_kategori_acara`);

--
-- Indeks untuk tabel `s1g_komentar_pariwisata`
--
ALTER TABLE `s1g_komentar_pariwisata`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indeks untuk tabel `s1g_kuliner`
--
ALTER TABLE `s1g_kuliner`
  ADD PRIMARY KEY (`id_kuliner`);

--
-- Indeks untuk tabel `s1g_pariwisata`
--
ALTER TABLE `s1g_pariwisata`
  ADD PRIMARY KEY (`id_pariwisata`);

--
-- Indeks untuk tabel `s1g_penginapan`
--
ALTER TABLE `s1g_penginapan`
  ADD PRIMARY KEY (`id_penginapan`);

--
-- Indeks untuk tabel `s1g_toko`
--
ALTER TABLE `s1g_toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indeks untuk tabel `s1g_user`
--
ALTER TABLE `s1g_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `s1g_acara`
--
ALTER TABLE `s1g_acara`
  MODIFY `id_acara` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `s1g_admin`
--
ALTER TABLE `s1g_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `s1g_album_acara`
--
ALTER TABLE `s1g_album_acara`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `s1g_album_peta`
--
ALTER TABLE `s1g_album_peta`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `s1g_booking_acara`
--
ALTER TABLE `s1g_booking_acara`
  MODIFY `id_booking` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `s1g_feedback`
--
ALTER TABLE `s1g_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `s1g_kategori`
--
ALTER TABLE `s1g_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `s1g_kategori_acara`
--
ALTER TABLE `s1g_kategori_acara`
  MODIFY `id_kategori_acara` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `s1g_komentar_pariwisata`
--
ALTER TABLE `s1g_komentar_pariwisata`
  MODIFY `id_komentar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `s1g_kuliner`
--
ALTER TABLE `s1g_kuliner`
  MODIFY `id_kuliner` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `s1g_pariwisata`
--
ALTER TABLE `s1g_pariwisata`
  MODIFY `id_pariwisata` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `s1g_penginapan`
--
ALTER TABLE `s1g_penginapan`
  MODIFY `id_penginapan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `s1g_toko`
--
ALTER TABLE `s1g_toko`
  MODIFY `id_toko` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `s1g_user`
--
ALTER TABLE `s1g_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
