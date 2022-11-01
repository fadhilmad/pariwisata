-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jul 2022 pada 13.19
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
  `gambar_acara` text NOT NULL,
  `deskripsi_acara` text NOT NULL,
  `tanggal_acara` varchar(50) NOT NULL,
  `slug_acara` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `s1g_acara`
--

INSERT INTO `s1g_acara` (`id_acara`, `nama_tempat`, `id_kategori_acara`, `gambar_acara`, `deskripsi_acara`, `tanggal_acara`, `slug_acara`) VALUES
(11, 'Pagelaran Wayang Kulit', 2, '1656678506_86bd8489532f39819c90.jpg', ' Dalam rangka peringatan Hari Jadi Lamongan (HJL) ke-453, Pemerintah Kabupaten Lamongan menyajikan sejumlah sarana hiburan masyarakat yang sarat akan budaya setelah meredanya pandemi Covid-19.\r\n<br> <br>\r\nSetelah beberapa hari lalu drama kolosal ‘Nggugah’ sukses digelar, kini pagelaran wayang kulit lakon ‘Kresno Nggugah’ pun turut ditampilkan, pada Jumat malam (3/6/2022), bertempat di Halaman Gedung Pemerintah Daerah Kabupaten Lamongan.        \r\n ', '2022-06-03', 'pagelaran-wayang-kulit'),
(12, 'Festival Soto Lamongan', 3, '1656678553_59d1351656d6df0bd2c8.jpeg', ' \r\n     Dalam rangka peringatan Hari Jadi Lamongan (HJL) ke-453, Pemerintah Kabupaten Lamongan menyajikan sejumlah sarana hiburan masyarakat yang sarat akan budaya setelah meredanya pandemi Covid-19.\r\n<br> <br>\r\nSetelah beberapa hari lalu drama kolosal ‘Nggugah’ sukses digelar, kini pagelaran wayang kulit lakon ‘Kresno Nggugah’ pun turut ditampilkan, pada Jumat malam (3/6/2022), bertempat di Halaman Gedung Pemerintah Daerah Kabupaten Lamongan.        \r\n ', '2022-06-10', 'festival-soto-lamongan'),
(13, 'Lomba Vidio Kreatif Objek Wisata Lamongan', 1, '1657533662_1fb02f86065e587dc90e.jpg', '   LOMBA VIDIO KREATIF OBJEK WISATA LAMONGAN\r\nFree Registration : <br>\r\nSyarat dan ketentuan dapat diakses di : <br>\r\n<a href=\"https://bit.ly/BUKUPANDUANLOMBAVIDIO\">Sini</a>\r\n <br>\r\nPendaftaran dapat dilakukan di:<br>\r\n<a href=\"https://bit.ly/REGISTRASILOMBAVIDIO\">Sini</a>\r\n<br><br>\r\nPendaftaran dan pengumpulan karya :<br>\r\n20 Mei - 20 Juni 2022 <br>\r\nTahap penjurian : <br>\r\n22 Juni - 24 Juni 2022 <br>  ', '2022-06-16', 'lomba-vidio-kreatif-objek-wisata-lamongan'),
(15, 'Persela Lamongan vs Persik Kediri', 5, '1657094075_6078115b8369cde1a4b8.jpg', ' Laga Uji Coba Persela Lamongan VS Persik Kediri ', '2022-07-14', 'persela-lamongan-vs-persik-kediri');

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
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `s1g_admin`
--

INSERT INTO `s1g_admin` (`id`, `nama`, `username`, `password`, `email`, `profile_img`, `level`, `status`, `no_hp`, `alamat`) VALUES
(1, 'Indra Ayudya Dwi Prasetya', 'indra', '$2y$10$U4bYuW.44rUL877IrA3UbO.m0i3ICUpOzxjynTqdT3D0LmgVL6DWG', 'agungsapta6@gmail.com', 'https://lh3.googleusercontent.com/a-/AOh14GhzENUdAaS5RzJP6FbGq1iS5YXl1zUJJnSMzbv8ud4=s96-c', 'admin', '0', NULL, NULL);

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
(14, 'gug', 6, '1656662316_de630909ecd43492e7aa.jpg'),
(15, 'fggyj', 6, '1656662333_a8014bb6e47ca5566cb8.jpg'),
(16, 'p', 8, '1656676741_0a950a38fb91dd120cd2.jpeg'),
(17, 'gh', 7, '1656676815_c05c2b57000348f280eb.jpeg'),
(18, 'vb', 7, '1656676823_7610c857efb04fa5655c.jpeg'),
(21, 'ax', 11, '1656678627_05eab7970b90982f4150.jpeg'),
(22, 'bscbs', 11, '1656678635_e58497997bc25e42a1f2.jpeg'),
(23, 'vv', 12, '1656678654_554e31368aca0cc51481.jpg'),
(24, 'vfgv', 12, '1656678661_df4d67a8a967ecbaa01a.jpg'),
(25, 'cv', 13, '1656678675_ea371e4edd93afa23146.jpeg'),
(26, 'Persela', 10, '1656708069_f35b4b0f1a3abe2d6794.png');

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
(4, 1, 'asd', '1656349716_864437e4adf4da01cebc.jpg'),
(13, 45, 'Pantai Joko Mursodo', '1656573526_3a03b49aa192d7fa8501.jpg'),
(14, 45, 'Pantai joko mursodo', '1656573547_824593a1ad1dc5634ffe.jpg'),
(15, 45, 'Pantai joko mursodo', '1656573561_742ec1e6c472640e3c78.jpg'),
(16, 46, 'klayar', '1656574068_bfd35a248995333d1066.jpg'),
(17, 46, '1', '1656574473_4a2205e249fadc961bc0.jpg'),
(18, 46, '1', '1656574482_0e782a4a19a089fa9b5a.jpg'),
(19, 46, '4', '1656574492_9ce617d1a47a2cced280.jpg'),
(20, 47, '1', '1656574753_61fc1e0157ff923ee6a4.jpg'),
(21, 47, '1', '1656574766_02ffe30e7d1aabdd6acf.jpg'),
(22, 47, '1', '1656574775_286901713409c317f998.jpg'),
(23, 48, 'y', '1656575154_83a30b3f19d849e5d185.jpg'),
(25, 49, 'h', '1656575383_d6f1999d84d18050c8ac.jpg'),
(26, 49, 'b', '1656575391_e1065dc2acb0a5625f2b.jpg'),
(27, 49, 'h', '1656575401_273b4e9453c8164ba80c.jpg'),
(28, 49, 'bhhb', '1656575411_65196e5863a697a839af.jpeg'),
(29, 50, 'h', '1656614713_f26a4ab33d4fa555e0bf.jpg'),
(30, 50, 'n', '1656614728_974052c4cb185a363c4b.jpg'),
(31, 50, 'n', '1656614752_abd906bdaa03715da56d.jpg'),
(32, 50, 'j', '1656614776_fa099c67ea1f6d56e887.jpg'),
(33, 51, 'g', '1656614868_7203a185cfcf78960217.jpg'),
(34, 51, 'n', '1656614876_ecbc096fcfd5c8959464.jpg'),
(35, 51, '7', '1656614885_df32d0f5fc4a0081bb98.jpg'),
(36, 52, 'g', '1656614918_c8e5c39a4eb2dc8cf7df.jpg'),
(37, 52, 'h', '1656614983_85b11f1dff38e9cf0d95.jpg'),
(38, 52, 'h', '1656615050_c3c33435c3f610a58ca2.jpg'),
(39, 52, 'u', '1656615061_525db3414e94e3468113.jpg'),
(40, 53, '4', '1656615134_8f0cf5de0840d65cf909.jpg'),
(41, 53, 'h', '1656615143_0a1d203a0dea1321224e.jpg'),
(42, 53, 'j', '1656615160_e449b2bff1ff47baa181.jpg'),
(43, 53, 'u', '1656615173_36cc8d710779c0a86309.jpg'),
(44, 53, 'h', '1656615185_ce9d091f264fa026aff9.jpg'),
(45, 54, 'h', '1656615249_9c3542129c3f3fd3dd6f.jpg'),
(46, 54, 'j', '1656615258_68a42d30b090426db796.jpg'),
(47, 54, 'njk', '1656615267_e03a3ad8aa010527a21f.jpg'),
(48, 55, 'hu', '1656615411_bad08754dd4eb3a68529.jpg'),
(49, 55, 'ghg', '1656615431_6002eeda569a033c1a50.jpg'),
(50, 56, 'vv', '1656615659_e6ed10594aa497fa6fb7.jpg'),
(51, 56, 'hjh', '1656615707_e3770343e4df5f9c4a49.jpg'),
(52, 57, 'ghgh', '1656615807_6ae924a2848a57534444.jpg'),
(53, 57, 'ghgh', '1656615868_7e9e52060313749c71b4.jpg'),
(54, 57, 'hh', '1656615896_b59752f9f0c0619860f2.jpg'),
(55, 57, 'hbj', '1656615945_1472e9da666b01c28404.jpg'),
(56, 58, 'hgjh', '1656616091_3c26f7bfa4cfe82093a9.jpg'),
(57, 58, 'vvh', '1656616110_b618b957265e66c1b9e9.jpg'),
(58, 58, 'fgfgf', '1656616143_6cb8e7dc2cd3ed0f5943.jpg'),
(59, 59, 'jhj', '1656616443_f82d48f96a793e167806.jpg'),
(60, 59, 'ghg', '1656616461_02a855d4959649f77d8a.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `s1g_feedback`
--

CREATE TABLE `s1g_feedback` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `s1g_feedback`
--

INSERT INTO `s1g_feedback` (`id`, `nama`, `email`, `pesan`) VALUES
(3, 'Indra', 'Indra1967@gmail.com', 'Bagus Tampilannya\r\n'),
(4, 'Ayudya', 'Ayduya1967@gmail.com', 'Halo kak'),
(5, 'Dwi', 'dwi1967@gmail.com', 'Halooooo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `s1g_kategori`
--

CREATE TABLE `s1g_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `s1g_kategori`
--

INSERT INTO `s1g_kategori` (`id_kategori`, `nama_kategori`, `slug`) VALUES
(7, 'Wisata Alam', 'wisata-alam'),
(11, 'Wisata Buatan', 'wisata-buatan'),
(12, 'Wisata Religi', 'wisata-religi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `s1g_kategori_acara`
--

CREATE TABLE `s1g_kategori_acara` (
  `id_kategori_acara` int(10) NOT NULL,
  `kategori_acara` varchar(100) NOT NULL,
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `s1g_kategori_acara`
--

INSERT INTO `s1g_kategori_acara` (`id_kategori_acara`, `kategori_acara`, `slug`) VALUES
(1, 'Lomba', 'lomba'),
(2, 'Kebudayaan', 'kebudayaan'),
(3, 'Kuliner', 'kuliner'),
(5, 'Olahraga', 'olahraga');

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
  `rating` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `s1g_komentar_pariwisata`
--

INSERT INTO `s1g_komentar_pariwisata` (`id_komentar`, `id_pariwisata`, `id_user`, `isi`, `tanggal`, `rating`) VALUES
(1, 46, 1, 'halooo', '2022-07-11', '3'),
(2, 46, 2, 'agung', '2022-07-11', '1'),
(4, 46, 2, 'asdasdas', '2022-07-11', '5'),
(7, 46, 2, 'asdasd', '2022-07-11', '2'),
(8, 46, 2, 'ASDASD', '2022-07-11', '4'),
(9, 45, 2, 'Huhuhuuu', '2022-07-12', ''),
(10, 45, 2, 'asdas', '2022-07-12', '2'),
(11, 45, 2, 'asdasdasd', '2022-07-12', '5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `s1g_kuliner`
--

CREATE TABLE `s1g_kuliner` (
  `id_kuliner` int(10) NOT NULL,
  `nama_kuliner` varchar(50) NOT NULL,
  `gambar_kuliner` text NOT NULL,
  `deskripsi_kuliner` text NOT NULL,
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `s1g_kuliner`
--

INSERT INTO `s1g_kuliner` (`id_kuliner`, `nama_kuliner`, `gambar_kuliner`, `deskripsi_kuliner`, `slug`) VALUES
(4, 'Wingko Babat', '1657533500_04ad272e1f445abe357a.jpg', ' Wingko sangat populer. Mendapatkannya pun sangat mudah. Tak harus datang ke Semarang atau Babat, Lamongan. Tapi, kalau ingin mencoba rasa wingko yang benar-benar asli sejak pertama dibuat, cobalah Wingko Babat Loe Lan Ing (LLI). Itu adalah brand yang meneruskan pembuat wingko pertama.\r\n<br>\r\nWingko adalah salah satu makanan yang dibikin warga asli Tionghoa dan berkembang luas sampai sekarang. Wingko mulai dibuat pada 1898 di Babat. Kini, tempat produksinya masih ada. Di sana juga berdiri toko yang menjual khusus produknya. Lokasinya berada di Jalan Raya Babat–Bojonegoro Nomor 189. Tepat berada di pinggir jalan raya. Jika belum juga ketemu, tinggal bertanya kepada warga setempat. Tempat tersebut mudah ditemukan karena sangat populer dan legendaris. <br><br>\r\n<b> Jika Anda Berminat, anda bisa mengunjungi tempat ini :</b>\r\n       ', 'wingko-babat'),
(5, 'Soto Lamongan', '1657535615_f3feb7dc1d361d443e55.jpg', ' Lamongan adalah tempat di Jawa Timur yang paling banyak menghasilkan penjaja makanan yang merantau ke kota-kota besar, salah satunya adalah Soto Lamongan. Di kota Lamongan sendiri terdapat beberapa warung soto yang enak, salah satunya adalah Depot Asih Jaya. Depot Asih Jaya terletak di Jalan Panglima Sudirman Blok A No. 4, Sidokumpul, Lamongan.\r\n<br> <br>\r\nSebelum berdiri depot soto pertama di Komplek Pertokoan Lamongan Indah A-4 Lamongan, Jawa Timur, bisnis Soto Ayam ini dijalankan secara keliling dari kampung ke kampung oleh H. Ali Mahfudz, pria asal Babat Agung, Deket, Lamongan. Berkat keuletan dan cita rasa khas masakan Soto Ayam yang ditawarkan, jumlah pelanggan tetap di kampung-kampung terus bertambah. Hal ini mendorong keberanian H. Ali Mahfudz untuk membuka sebuah depot soto yang berada di komplek pertokoan jalur pantura yang waktu itu pertama kali ada di kota Lamongan.\r\n<br> <br>\r\nTepatnya tahun 1986 impian itu bisa diwujudkan dengan membuka Depot Asih Jaya ‘Pusat Soto Lamongan’. Letaknya hanya beberapa meter saja di sebelah barat Gedung Bioskop LI (Lamongan Indah), yang waktu itu sangat ramai. Berbekal cita rasa masakan Soto Ayam yang lezat dan harga yang kompetitif, sejak awal buka di tahun 1986 depot inipun langsung ramai dikunjungi pembeli. Menu Soto Ayam memang menjadi makanan favorit orang-orang Lamongan, baik untuk disantap pagi hari, siang hari maupun malam hari.\r\n<br> <br>\r\nPeminat Soto Ayam yang datang ke Depot Asih Jaya bukan hanya warga asli Lamongan, tapi banyak juga pendatang maupun orang-orang yang kebetulan melintas di jalur pantura. Mereka awalnya datang ke Depot Asih Jaya secara kebetulan ataupun telah mendapatkan informasi dari mulut ke mulut tentang kelezatan masakan Soto Ayam di Asih Jaya.\r\n<br> <br>\r\nUsia pembeli beragam, dari anak-anak sampai kakek nenek, dari etnis Jawa sampai etnis Cina dan bule. Mereka datang ke Depot Asih Jaya karena ingin merasakan masakan yang originil alias asli Lamongan itu, langsung di daerah asalnya. Di Depot Asih Jaya, bukan hanya ada Soto Lamongan saja. Tetapi ada banyak menu seperti Bakso, Rawon Sapi, Gado-Gado, Tahu Campur, Mie Goreng, Nasi Goreng, dan masih banyak menu yang lainnya. Tetapi yang terkenal di Depot Asih Jaya adalah Soto Lamongannya.\r\n<br> <br>\r\nMeski sedikit keruh, Soto Lamongan tidak mengunakan santan. Di Depot Asih Jaya ini warna keruhnya didapat dari bandeng dan udang yang dicampurkan dalam rebusan ayam. Seperti halnya soto jawa timuran lainnya, Soto Lamongan merupakan soto  yang berminyak. Sudah tak terhitung berapa banyak artis ibukota dan orang penting yang mampir dan merasakan kelezatan masakan di Depot Asih Jaya.\r\n<br> <br>\r\nGrup band Nidji, The Titans,Trio Macan dan lainnya sudah pernah merasakan nikmatnya menyantap Soto Ayam di Depot Asih Jaya. Rata-rata mereka merasa puas dengan lezatnya cita rasa masakan dan kualitas layanan yang diberikan oleh pihak pengelola. Komentar senada juga banyak dilontarkan pejabat dan orang-orang penting terutama di Lamongan dan Jawa Timur. Soto Lamongan di Depot Asih Jaya dibandrol mulai harga Rp. 22.000.  \r\n<br><br>  \r\n<b> Jika Anda Berminat, anda bisa mengunjungi tempat ini :</b> ', 'soto-lamongan'),
(6, 'Nasi Boranan', '1656181314_f4bea495fb7bb940cad7.jpg', '     Rasanya belum lengkap kalau jalan-jalan ke kota Lamongan tapi belum berwisata Kuliner disana. Lamongan merupakan kabupaten kecil yang terletak di Jawa Timur yang memiliki berbagai makanan khas. Salah satunya adalah Nasi Boranan, atau sego boranan adalah makanan tradisional dan khas Lamongan, Jawa Timur.\r\n<br><br>\r\nKuliner khas Lamongan yang satu ini bisa kita jumpai di trotoar sepanjang Jalan Jendral Sudirman. Mulai dari Lamongan Plaza hingga Stadion Surajaya Lamongan. Cukup mudah di temui karena berada tepat di jalur Pantura. Para pedagang di jalan Jendral Sudirman ini menjajakan dagangannya mulai sore hingga malam hari.  Nasi ini juga biasa dijajakan secara lesehan di sekitar kawasan pasar-pasar kota di Kabupaten Lamongan.\r\n<br><br>\r\nIstilah Nasi Boranan sendiri, diambil dari wadah nasi yang disebut Boranan, yaitu semacam keranjang yang terbuat dari bambu berbentuk lingkaran di bagian atas dan persegi di bagian bawah dengan keempat penyangga di setiap sudutnya. Dengan bentuk yang hampir sama, masyarakat sekitar Kota Lamongan juga menggunakan keranjang jenis ini untuk berbagai keperluan, seperti untuk mengangkut dan menyimpan berbagai komoditas hasil pertanian serta di beberapa tempat ditemukan juga sebagai alat pemindah air dari satu petak sawah ke petak kolam lainnya.\r\n<br><br>\r\nPada umumnya, makanan di sajikan menggunakan alas piring ataupun mangkuk, berbeda dengan Nasi Boranan. Disajikan menggunakan kertas makanan yang dilapisi koran dan dibentuk kerucut atau dalam bahasa jawa di “pincuk” sebagai tempat makanan tersebut, cukup sederhana. Nasi Boranan terdiri dari nasi, bumbu, lauk, rempeyek (semacam gimbal), sayuran yang dicampur dengan parutan kelapa (saya menyebutnya gudangan) dan pletuk (nasi yang dikeringkan atau kacang). Bumbu dari nasi boranan terdiri dari rempah-rempah yang sudah di haluskan, serta lauk yang ditawarkan oleh penjual bervariasi, diantaranya daging ayam, jeroan, telur dadar, telur asin, tahu, tempe, aneka ikan panggang, ikan Bandeng, ikan Kutuk, dan ikan Sili. Dari ketiga jenis ikan ini, hanya ikan bandeng yang dibudidayakan oleh warga, sedangkan lainnya yaitu ikan kutuk dan ikan sili, biasanya hidup liar di rawa-rawa atau sungai sehingga harganya paling mahal diantara jenis lauk lainnya. <br><br>\r\n<b> Jika Anda Berminat, anda bisa mengunjungi tempat ini :</b>', 'nasi-boranan');

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
  `slug_pariwisata` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `s1g_pariwisata`
--

INSERT INTO `s1g_pariwisata` (`id_pariwisata`, `id_kategori`, `nama_pariwisata`, `latitude`, `longitude`, `gambar_pariwisata`, `lokasi_pariwisata`, `deskripsi_pariwisata`, `slug_pariwisata`) VALUES
(45, 7, 'Pantai Joko Mursodo', '-6.894808', '112.174046', 'pantai-joko-mursodo-lamongan_1.jpg', 'Lohgung, Kec. Brondong, Kabupaten Lamongan', 'Pantai Joko Mursodo menjadi tempat piknik murah dan terbaru di Kabupaten Lamongan yang rekomended untuk liburan keluarga. Nikmati perjalanan libur akhir pekan yang menyenangkan dengan explore spot terbaik yang ditawarkan Pantai Lamongan satu ini. Rasakan keseruan bermain di pantai pasir putih Pantai Brondong Lohgung Lamongan Jawa Timur bersama orang tersayang.\r\n<br>\r\nKabupaten Lamongan menyuguhkan pantai kece yang cukup menarik untuk anda explore keindahan serta spot terbaiknya bersama keluarga. Salah satu wisata kece yang tak kalah menarik untuk anda explore spot terbaiknya yaitu Pantai Joko Mursodo Lohgung Brondong. Pesona alam terbaik dari wisata murah Lamongan satu ini siap menghipnotis serta memanjakan siapa saja yang berkunjung.\r\n<br>\r\n<b> Harga Tiket : </b>\r\n<br>\r\n<p style=\"color:blue;\">Cukup dengan harga tiket masuk <b> Rp.5.000/orang, </b> anda bisa puas menikmati pesona alam Pantai Joko Mursodo Lamongan.</p>', 'pantai-joko-mursodo'),
(46, 7, 'Pantai Putri Klayar', '-6.874145', '112.439023', 'Pantai Putri Klayar.jpg', 'Klayar, Sidokelar, Kec. Paciran, Kabupaten Lamongan', 'Pantai Putri Klayar menjadi salah satu tempat piknik murah yang rekomended untuk anda explore saat akhir pekan tiba. Menikmati alam indah bersama keluarga dengan mengunjungi pantai di Lamongan satu ini menjadi aktivitas menyenangkan. Banyak tempat menarik di Kabupaten Lamongan yang siap mewujudkan perjalanan liburan impian anda yang menyenangkan.\r\n<br>\r\nSalah satu tempat menarik di Kabupaten Lamongan Jawa Timur yang rekomended untuk anda jelajah keindahannya yaitu pantai. Banyak pantai cantik di Kota Lamongan yang siap memanjakan perjalanan libur akhir pekan anda dan keluarga tercinta. Jangan lewatkan objek wisata alam murah Pantai Putri Klayar saat anda berlibur di Kabupaten Lamongan Jawa Timur.\r\n<br> \r\nKetika anda hendak menghabiskan hari libur di Pantai Putri Klayar, jangan tergesa-gesa. Simak review dan ulasan menarik destinasi wisata alam Lamongan terbaru satu ini untuk referensi mengunjungi Pantai Putri Klayar. Nikmati liburan lebih mudah di Lamongan dan dapatkan perjalanan liburan impian yang tak terlupakan bersama keluarga.\r\n<br>\r\n<h5>Harga Tiket : </h5>\r\n<p> Ketika anda berencana liburan Pantai Putri Klayar, harga tiket masuknya <b>Rp.5.000/orang </b>  Jika anda berkunjung ke obyek wisata pantai Klayar Lamongan menggunakan kendaraan, ada biaya tambahan tiket parkir. </p>', 'pantai-putri-klayar'),
(47, 7, 'Pantai Pengkolan Kandang Semangkon', '-6.868461', '112.320374', 'Pantai Pengkolan Kandang Semangkon.JPG', 'Kandangsemangkon, Kec. Paciran, Kabupaten Lamongan', 'iburan saat weekend merupakan hal yang sangat dinanti oleh kita (para pekerja) yang biasanya setiap harinya dipenuhi oleh aktivitas bekerja di kantor misalnya. Nah, tidak bisa dipungkiri jika salah satu andalan tempat wisata adalah pantai. Pantai menjadi destinasi wisata yang bisa digunakan untuk menghilangkan penat atau stress. Untuk itu, kali ini kami ingin mengajak Teman Brisik untuk bermain-main ke Pantai yang ada di Lamongan, yakni Pantai Pengkolan.\r\n<br> \r\nPantai Pengkolan ini terletak di pesisir utara Pulau Jawa, tepatnya berada di Desa Kandangsemangkon, Kecamatan Paciran, Kabupaten Lamongan. Dari Jalan Raya Deandels di Desa Kandangsemangkon masuk ke gang sekitar 20 meter menuju pelabuhan. Pantai ini bertetangga dengan pantai-pantai di sekitar Paciran lainnya. Seperti Pantai Watu Payung, Pantai Kutang, Pantai Lorena, dan Pantai Tanjung Kodok.\r\n<br> \r\nDi Pantai Pengkolan, terdapat beberapa spot foto dengan latar belakang monumen kapal kayu, hutan bakau yang masih alami, batu-batuan karang yang sudah mati, jembatan kayu putih dari batang kelapa, hingga permainan ayunan.\r\n<br> \r\nPengunjung pun bisa bersantai ria dengan berpiknik bersama keluarga di gazebo, mencari kerang, bahkan bermain-main air di sekitar pantai. Jika beruntung, biasanya akan datang gerombongan burung-burung kuntul putih (egretta garzetta) di dekat pepohonan bakau yang akan menambah cantiknya pemandangan di depan mata pengunjung.\r\n<br> \r\nDengan adanya kekayaan alam berupa hutan bakau dan burung-burung, Pantai Pengkolan biasanya juga digunakan sebagai laboratorium terbuka, yakni tempat penelitian bagi para mahasiswa sekaligus tempat untuk berlibur.\r\n<br> \r\nPengunjung bisa mengisi kotak infaq untuk retribusi kebersihan sebelum melewati jembatan putih menuju pulau mini buatan yang cantik ini.', 'pantai-pengkolan-kandang-semangkon'),
(48, 7, 'Taman Wisata dan Perkemahan (TWP) Bumi Moronyamplung', '-7.25489258766', '112.354103923', 'twp.jpeg', 'Moronyamplung, Kec. Kembangbahu, Kabupaten Lamongan', 'Taman Wisata dan Perkemahan Bumi Moronyamplung merupakan kawasan wisata hutan yang didalamnya terdapat vegetasi pohon-pohon langka yang sudah berusia ratusan tahun. Ada sumber air dan sendang yang airnya sangat bagus dengan debit yang cukup besar, serta terdapat situs peninggalan Kerajaan Majapahit yakni Petilasan Putri Sekarwangi Gambirwati putri dari Raja Majapahit Prabu Brawijaya ke V.\r\n<br>\r\nKonsep yang diusung adalah konsep eco-tourism atau wisata ramah lingkungan, yang merupakan konsep dalam sektor pariwisata yang diarahkan dan difokuskan pada lingkungan alam, dengan maksud mendukung upaya konservasi.', 'taman-wisata-dan-perkemahan-twp-bumi-moronyamplung'),
(49, 7, 'Pantai Kutang', '-6.887761', '112.1851817', 'kutang.JPG', 'Ds. Labuhan, Kec. Labuhan, Kab. Lamongan', 'Pantai Kutang menjadi salah satu tempat wisata populer di Kabupaten Lamongan yang rekomended untuk anda jelajah keindahannya. Pesona alam terbaik yang ditawarkan pantai kece di Lamongan satu ini akan menghipnotis siapa saja yang menikmati keindahnnya. Alam damai yang disuguhkan, cocok untuk merelaksasi jiwa pikiran dan melepaskan rasa penat akan kesibukan sehari-hari.\r\n<br> <br>\r\nKeindahan pantai memang selalu dirindukan sebagian besar orang, pesona terbaiknya siap memanjakan siapa saja yang mengunjunginya. Pesona alam dengan wahana menarik dari Pantai Kutang cocok untuk ngadem dengan suasana terbaik dan panorama keindahannya. Rasakan libur akhir pekan bersama keluarga semakin menyenangkan dengan jelajah destinasi wisata terbaik di Kabupaten Lamongan Jawa Timur.\r\n<br> <br>\r\nSaat anda berencana menghabiskan hari libur di Pantai Kutang Lamongan dan sedang mencari info menarik didalamnya. Simak ulasan dan review menarik obyek wisata Pantai Kutang Lamongan Jawa Timur dibawah ini. Dapatkan pengalaman liburan tak terlupakan bersama keluarga di Lamongan dengan explore wisata alam terbaiknya. <br>\r\n<h5> Harga Tiket Masuk Pantai Kutang </h5>\r\n<p>Anda cukup mengeluarkan biaya tiket masuk Pantai Kutang Lamongan <b> Rp.3.000/orang. </b> Catat dan kunjungi wisata Lamongan murah dan terbaru satu ini untuk menemani perjalanan liburan anda. <br>\r\nUntuk biaya tambahan yang harus anda keluarkan yaitu retribusi parkir ketika mengunjungi Pantai Kutang menggunakan kendaraan. </p>\r\n', 'pantai-kutang'),
(50, 7, 'G-Park (Gondang Park)', '-7.1995465', '112.2606023', 'Gpark_1.JPG', 'Gondang Lor, Kec. Sugio, Kabupaten Lamongan', 'Teriknya matahari dan cuaca yang panas saat perjalanan menuju Gondang Park  (G-Park) seakan terbayar lunas. Saat mulai memasuki pelataran parkir tempat rekreasi yang baru saja di buka ini. Rindangnya pohon membuat iklim mikro disekitar lokasi memjadi sejuk belum lagi mata dimanjakan dengan pemandangan waduk Gondang yang dipagari bukit bukit.\r\n<br> <br>\r\nSiapa sangka tempat yang dulunya kotor dan sering digunakan untuk berbuat mesum di tangan H. Teguh Wahyudi CEO Tata Wisata yang mengelola wana wisata berkolaborasi dengan Perhutani tempat kotor tersebut disulap menjadi tempat rekreasi yang nyaman bagi keluarga dan kolega.\r\n<br> <br>\r\nDengan konsep yang ditawarkan adalah hutan dan suasana yang tenang sebagai tempat rekreasi,. Fasilitas seperti toilet yang bersih, musholla,. dan gazebo disediakan buat pengunjung bersantai.\r\n<br> <br>\r\nGondang Park (G-Park)menyediakan panggung live musik,. Mini trail buat anak anak,. Play ground atau tempat bermain. Bagi yang gemar berselfi ria di medsos terdapat spot spot foto yang instragamable. Bahkan area memancing bagi mancing mania. Dan segera menyusul wisata petik buah.\r\n<br> <br>\r\nYang tak kalah penting adalah cafetaria dengan berbagai menu pengunjung bisa memilih dan pastinya dengan harga yang terjangkau. Penikmat kopi bisa mencoba racikan kopi dari barista profesional didatangkan H. Yudi untuk memanjakan pengunjung. Seperti yang suryanews nikmati, ngopi dengan dengarkan alunan live musik acustik di alam terbuka dibawah pohon dengan semilir angin menjadi suasana ngopi berbeda seperti biasa di warkop atau kafe.\r\n<br> <br>\r\nGondang Park (G-Park) cocok buat rekreasi dan bersantai bersama keluarga dan kolega. Acara reuni sekolah, gathering perusahaan pun ok. Jarak yang tidak terlalu jauh dari pusat kota Lamongan kurang lebih 30 KM dan dari Babat kurang lebih 20 KM.\r\n<h5> Harga Tiket Masuk Waduk Gondang </h5>\r\n<p> Ketika mengunjungi obyek wisata Waduk Gondang, anda bisa mengunjunginya dengan harga tiket masuk <b> Rp.3.000/orang. </b>\r\n<br>\r\nSangat terjangkau bukan? Banyak destinasi wisata murah di Lamongan yang rekomended untuk anda kunjungi ketika berlibur.\r\nJika berkunjung ke Waduk Gondang menggunakan kendaraan pribadi, terdapat biaya tambahan retribusi parkir wisata. </P>', 'g-park-gondang-park'),
(51, 7, 'Sendang Bawono', '-7.2003043', '112.2746301', 'Sendangbawono_2.JPG', 'Deketagung, Kec. Sugio, Kabupaten Lamongan', 'Kini di Lamongan ada salah satu wisata bernuansa alam yang bisa dijadikan tujuan bersama teman maupun keluarga. Wisata tersebut bernama \"wisata sendang bawono\" yang terletak di Ds. Deket Agung Kec. Sugio Kab. Lamongan', 'sendang-bawono'),
(52, 7, 'Istana Gunung Mas', '-7.2644071', '112.3564812', 'gunung mas_1.JPG', 'Jl. Raya Mantup, Bulu, Tugu, Kec. Mantup, Kabupaten Lamongan', 'Wisata yang terletak di Jl. Raya Mantup, Tugu, Mantup, Kabupaten Lamongan memiliki sejarah yang cukup menarik dilihat dari penamaanya. Nama Gunung Mas konon karena dulu pernah ditemukan bongkahan emas dibukit ini, tetapi cerita ini kurang dapat dipercaya mengingat bukit ini adalah bukit kapur. Adapun cerita versi lainya mengatakan penamaan Gunung Mas karena bebatuan kapur bekas tambang yang ada berwarna kekuningan seperti emas.', 'istana-gunung-mas'),
(53, 7, 'Maharani Zoo and Goa', '-6.8684582', '112.3575071', 'Goamaharaniii_1.jpg', 'JL. Raya, Paciran, Kec. Paciran, Kabupaten Lamongan', 'Goa Maharani menjadi tempat wisata keluarga di Lamongan Jawa Timur yang rekomended untuk anda kunjungi saat libur panjang tiba. Nikmati berbagai macam spot instagenic yang ada di Goa Maharani dengan stalagtit dan stalagmitnya untuk sensasi liburan anti mainstream. Banyak tempat menarik di Lamongan yang rekomended untuk anda explore ketika berwisata bersama orang tercinta.\r\n<br>\r\nKabupaten Lamongan menawarkan tempat wisata menarik yang rekomended untuk anda explore pesona terbaiknya. Destinasi Maharani Zoo & Goa menyuguhkan spot serta koleksi hewan menarik yang cocok untuk menemani libur akhir pekan keluarga. Dapatkan perjalanan liburan menyenangkan di Lamongan Jawa Timur dengan jelajah wisata menarik satu ini.\r\n<br>\r\nKetika anda berencana menghabiskan hari libur akhir pekan di Goa Maharani Lamongan dan sedang menggali informasi menarik didalamnya. Anda bisa simak ulasan menarik Goa Maharani di artikel ini untuk mempermudah perjalanan liburan di Kabuopaten Lamongan Jawa Timur. Nikmati sensasi wisata lebih mudah di Lamongan untuk perjalanan liburan tak terlupakan bersama keluarga tercinta.\r\n<br>\r\n<b> Harga Tiket Masuk Goa Maharani & Zoo :</b>\r\n<br>\r\nHarga tiket masuk Goa Maharani dan Goa <b>Rp.25.000</b> saat weekday dan <b>Rp.35.000</b> ketika weekend.\r\n<br>\r\nTiket terusan di MZG dan WBL Lamongan <b>Rp.97.000</b> ketika weekday dan <b>Rp.130.000</b> saat weekend.', 'maharani-zoo-and-goa'),
(54, 7, 'Pantai Lorena', '-6.8695224', '112.3487686', 'Pantai-Lorena-Lamongan2_1.jpg', 'Jalan Raya Paciran, Paciran, Kabupaten Lamongan', 'Nama dari pantai ini berasal dari nama desa dan posisi pantainya, yaitu singkatan dari bahasa Jawa “LORE NAnjan” yang artinya itu adalah sebelah utara dari desa Penanjan. Pantai ini cukup mudah untuk ditemui karena letaknya yang strategis, tak heran jika pantai ini selalu ramai pengunjung apalagi saat di akhir pekan. Biasanya wisatawan berkunjung ke tempat ini untuk menikmati sunset atau hanya sekedar istirahat seperti makan siang di tepi pantai atau hanya sekedar duduk-duduk saja sambil menikmati pemandangan dan angin di pantai.', 'pantai-lorena'),
(55, 7, 'Pantai Maldives', '-6.8725031', '112.3996834', 'Pantai-Maldives_1.jpg', 'Kemantren, Kec. Paciran, Kabupaten Lamongan', 'Pantai Maldives terletak di pesisir pulau Jawa, tepatnya di Desa Kemantren Kecamatan Paciran Kabupaten Lamongan. Pantai ini berdekatan sekali dengan pantai Tanjung Kodok yang sekarang dikenal dengan WISATA BAHARI Lamongan, pantai Kutang, dan Pantai Pasir Putih Delegan. Jaraknya hanya berkisar antara 1 sd 8 km saja dari pantai lainnya.\r\nSecara umum pantai utara Pulau Jawa berbeda jauh dengan pantai di Pesisir selatan Jawa. Bukan hanya suasananya, namun juga ombak dan juga pasir serta karangnya. Seperti pantai lain pada umumnya, Pantai Maldives Kemantren ini memiliki daya tarik keindahan alam yang dapat memanjakan mata pengunjungnya. Pantai ini memiliki ombak yang tidak terlalu besar, bahkan cenderung tenang. Saat air laut sedang pasang, batuan karang yang terletak di pinggiran pantai tidak terlihat sama sekali, tetapi jika air sedang surut maka akan nampak keindahan batuan karang yang masih alami dengan air laut berwarna biru.', 'pantai-maldives'),
(56, 7, 'Bukit Suru', '-6.928001', '112.2346274', 'suru_1.jpg', 'Lembor, Kec. Brondong, Kabupaten Lamongan', 'Wisata pegunungan yang tak kalah memukau dari Gunung Pegat adalah Gunung Suru Lembor. Wisata ini menyajikan pengunungan kapur yang berhiaskan tanaman Suru (semacam tanaman kaktus yang berbentuk seperti centong nasi) berbagai spot foto yang menarik juga disediakan bagi wisatawan yang berkunjung.', 'bukit-suru'),
(57, 7, 'Gunung Pegat', '-7.1314742', '112.1594687', 'gn pegat_1.JPG', 'Karang Asem, Karangkembang, Kec. Babat, Kabupaten Lamongan', 'Wisata gunung pegat pasti sudah tidak asing lagi bagi beberapa khalayak masyarakat terutama di Lamongan. Karena sejarah dan mitosnya yang unik menjadikan tempat wisata ini dikenal. Jika kalian melakukan perjalanan dari arah Babat menuju Jombang dan sebaliknya pasti akan melewati gunung pegat ini. Cerita yang beredar turun-temurun pemberian nama gunung pegat sudah ada sejak kolonial Belanda berkuasa di wilayah ini. Untuk melancarkan arus ekonomi pemerintah kolonial, mereka melaksanakan tahap pembangunan jalan yang menjadi titik perdagangan yaitu Babat-Jombang. Selain itu, konon pemerintah kolonial juga membangun lintasan kereta api di area tersebut. Namun karena adanya gunung kapur yang menghalangi jalan, sehingga kolonial terpaksa harus membelah gunung tersebut. Sehingga masyarakat disekitar wilayah ini di paksa untuk kerja rodi/kerja paksa untuk membelah gunung kapur tanpa digaji bahkan tanpa diberi makan minum. Dari adanya kerja rodi tersebut menjadikan banyak korban yang meninggal karena kelelahan dan kelaparan.', 'gunung-pegat'),
(58, 7, 'Wisata Air Hangat Mbrumbung', '-6.9018994', '112.3826034', 'air panas_1.JPG', 'Dusun Tepasan, Desa Kranji, Kecamatan Paciran, Kabupaten Lamongan.', 'Bagi kamu yang ingin berlibur namun masih bingung mau pergi ke tempat wisata seperti apa, coba deh pergi berlibur ke Pemandian Air Panas Brumbung ini. Pemandian air panas yang terletak di Kranji, Paciran, Lamongan, Jawa Timur ini memang sangat cocok digunakan untuk kamu yang ingin berlibur bersama keluarga. Bagi kamu yang ingin berlibur bersama keluarga dan ingin mencoba bersantai di pemandian air panas, coba deh berkunjung ke tempat wisata yang satu ini. Dan kamu juga bisa hunting selfie kekinian lho disini.\r\n\r\nPemandian Air Panas Brumbung sendiri memang sangat cocok untuk liburan bersama keluarga, dan tempat wisata yang satu ini memang sudah terkenal karena keindahan dan banyak yang bersantai disini saat liburan. Disini kamu bisa melihat keindahan di kawasan tempat wisata tersebut karena masih memiliki kesan alami dan juga kamu bisa mencari berbagai spot foto yang cocok dengan seleramu, bagi kamu yang penasaran, langsung aja deh pergi ke tempat wisata yang satu ini. Dijamin liburanmu akan semakin berkesan dan akan menambah koleksi fotomu selfie kekinianmu.', 'wisata-air-hangat-mbrumbung'),
(59, 7, 'Telaga Sadang', '-7.0444499', '112.2037112', 'telaga sadang_1.JPG', 'Tlogosadang, Kec. Paciran, Kabupaten Lamongan', 'Telaga Sadang dibuka pada tahun 2017 dan menjadi sebuah kawasan wisata baru yang mencuri perhatian bagi banyak orang, baik dari Lamongan maupun luar kota. Banyak pengunjung mengupload foto di jejaring media sosial dengan latar Telaga Sadang menjadikan banyak orang tertarik dengan Telaga Sadang. Tak sedikit wisatawan dari jauh yang sengaja ingin datang dan melihat langsung keindahan Telaga Sadang. Banyak yang bilang telaga ini mirip dengan Bukit Jaddih yang berada di Pulau Madura mengingat sama-sama terbentuk dari bekas galian kapur. Namun tentu keduanya memiliki keunikan dan keindahan masing-masing. \r\n\r\nKeindahan dari Telaga Sadang bisa dilihat dari tebing yang menjulang tinggi di sekitarnya. Gradasi warna dari tebing ini kontras dengan pemandangan pepohonan hijau di sekitar. Pada bagian tengah tebing terdapat sebuah kubangan besar bekas galian kapur yang kemudian terisi oleh air hujan. Kubangan besar inilah yang membentuk sebuah telaga. Akhirnya area bekas galian tersebut dinamakan Telaga Sadang. ', 'telaga-sadang'),
(60, 7, 'Akar Langit Trinil', '-6.9269311', '112.2366778', 'trinil_1.jpg', 'Lembor, Sendangharjo, Kec. Brondong, Kabupaten Lamongan', 'Terletak di desa Sendangharjo, Kecamatan Brondong, Kabupaten Lamongan, Wana Wisata Trinil Akar Langit menjadi destinasi wisata baru bagi warga Lamongan dan sekitarnya. Tidak hanya dari Lamongan, pengunjung wisata ini juga banyak berasal dari beberapa daerah di Jawa Timur.\r\nYang menarik dan berhasil menyedot pengunjung untuk mengunjungi tempat ini adalah terdapat pohon besar yang bentuknya menyerupai Whomping Willow dalam film Harry Potter. Warga sekitar menyebutnya pohon trinil atau akar langit.\r\nDengan banyaknya pilihan spot foto menjadikan tempat wisata ini tidak monoton dan juga dapat memanjakan pengunjung untuk bisa jeprat-jepret sana-sini, serta menjadi magnet tersendiri untuk mengundang semakin pengunjung mendatangi tempat ini. ntuk tiket masuk ke Wana Wisata Trinil Akar Langit ini kamu hanya cukup merogoh kocek sebesar Rp5.000, parkir motor Rp3.000, sedangkan mobil Rp5.000 saja.', 'akar-langit-trinil'),
(61, 11, 'Desa Wisata Wanar Lestari', '-7.1175412', '112.2727294', 'wanar_1.JPG', 'Desa Wanar, Kec. Pucuk, Kabupaten Lamongan', 'Lamongan memiliki Desa Wisata Tanaman Hias yang sangat direkomendasikan bagi para pecinta tanaman hias. Desa ini memiliki puluhan jenis tanaman hias yang menarik mata. Desa itu adalah Desa Wanar Kecamatan Pucuk, Kabupaten Lamongan. Walaupun Desa ini baru mempromosikan diri sebagai desa wisata tanaman hias tetapi tanaman hias hasil budidaya desa itu sudah diekspor ke luar negeri.\r\n\r\nTanaman hias dari Desa Wanar sudah merambah ke pasar luar negeri seperti Brunei Darussalam. Tanaman hias yang ada di desa tersebut juga beragam, seperti tanaman dolar, jasmine, putri salju, aneka palem, anting putri, serut, sikas, aneka bonsai dan masih banyak lagi. Desa Wisata Tanaman Hias ini juga sudah lama ikut andil dalam penghijauan berbagai kota di Indonesia.', 'desa-wisata-wanar-lestari'),
(62, 11, 'Taman Banjar Sekar', '-6.9026962', '112.264774', 'taman banjar_1.JPG', 'Mencurek, Sendangharjo, Kec. Brondong, Kabupaten Lamongan', 'Lamongan juga memiliki beraneka taman yang bisa travelers kunjungi saat weekend bersama keluarga salah satunya yaitu Taman Bunga yang ada di Taman Banjar Sekar.\r\n\r\nTaman ini berada di Dusun Mencorek, Desa Sendangharjo, Kecamatan Brondong, Kabupaten Lamongan. Taman Banjar Sekar ini menyuguhkan pesona indahnya hamparan bunga warna-warni. Taman ini sangat cocok untuk travelers yang suka berswafoto ala Instagramable.', 'taman-banjar-sekar'),
(63, 11, 'Alun - Alun Lamongan', '-7.1181056', '112.4127871', 'alun_1.JPG', 'Jl. Lamongrejo, Tumenggungan, Kec. Lamongan, Kabupaten Lamongan', 'Wisata Alun-alun Kota Lamongan , sangat cocok untuk mengisi kegiatan liburan anda, apalagi saat liburan panjang seperti libur nasional, Hari libur Lebaran, Hari libur Kemerdekaan, Hari libur nyepi, Hari libur idul adha, Hari libur idul fitri, Hari libur tahun baru, Keindahan Wisata Alun-alun Kota Lamongan , ini sangatlah cocok bagi anda semua yang berada di didekat atau di kejauhan untuk merapat menggunjungi tempat Wisata Alun-alun Kota Lamongan di kota Lamongan .', 'alun-alun-lamongan'),
(64, 11, 'Kampung Inspirasi Lamongan', '-7.1315446', '112.4212677', 'kampung ispirasi_1.JPG', 'Tlogoanyar, Kec. Lamongan, Kabupaten Lamongan', 'Sejak diresmikan oleh beberapa pemangku kepentingan di Lamongan dan mulai dibuka 1 April 2018, Kampung Inspirasi Lamongan semakin berkembang dan menjadi pusat wisata edukasi unggulan.\r\nFasilitas yang ditawarkan antara lain; bidang wisata edukasi, outbound alam, entrepreneurship camp in holiday,  event sosial budaya, dan social impact movement. Kampung Inspirasi memiliki lokasi yang cukup strategis yaitu di pusat Kota Lamongan tepatnya Jl. Sumargo Gang Flamboyan no. 29, Lamongan.\r\nKampung Inspirasi Lamongan ini dirintis oleh pasangan muda yang baru menikah pada bulan Agustus 2018. Mereka adalah Sulthan Alfathir dan Anik Haryanti. Keduanya adalah alumni Fakultas Teknologi Pertanian Universitas Brawijaya Malang angkatan 2013.', 'kampung-inspirasi-lamongan'),
(65, 11, 'Taman Ekspresi Kendalifornia', '-7.0477469', '112.2169703', 'kendal_1.JPG', 'Jl. Kh Hasyim Asyari, Kendal, Kec. Sekaran, Kabupaten Lamongan', 'Taman Ekspresi Kendalifornia terletak di Desa Kendal, Kecamatan Sekaran, Kabupaten Lamongan. Taman ini dibuat dan dibangun ketika Roes Purwonugroho menjabat sebagai Kepala Desa.\r\nDi wisata ini menyuguhkan beberapa spot foto yang aestetic. Para pengunjung biasanya mengunjungi taman ini untuk sekedar melepas penat hingga berekreasi bersama teman atau keluarga. Dinding taman ini juga dilukis mural oleh pemuda-pemuda desa Kendal sehingga dinding tidak terlihat polos atau membosankan.\r\nSelain itu, terdapat gerobak pustaka yang menyediakan berbagai buku untuk dibaca oleh para pengunjung. Untuk mengunjungi taman ini, pengunjung tidak perlu merogoh kocek banyak, karena gratis.', 'taman-ekspresi-kendalifornia'),
(66, 11, 'Wadiuk Gondang', '-7.2091449', '112.2503944', 'gondang_1.JPG', 'Waduk Gondang, Gondang Lor, Kec. Sugio, Kabupaten Lamongan', 'Waduk yang diresmikan oleh presiden RI Bapak Soeharto pada 04 April 1987 ini digunakan sebagai tempat penampungan air hujan yang fungsi utamanya adalah sebagai tempat irigasi bagi persawahan masyarakat Lamongan.\r\nSeiring perkembangannya, spot yang satu ini dipandang cukup berpotensi jika dijadikan sebagai tempat wisata maka dari itu tempat ini mulai di tunjang dengan berbagai sarana salah satunya adalah wahana permainan air dan tempat pemancingan.\r\nSaat ini juga ada pengembangan fasilitas diatas tanah -/+ 5Ha sebagai tempat perkemahan, outbond, beberapa permainan anak dan juga tempat kuliner sebagai pendukung daya tarik obyek wisata tersebut.', 'wadiuk-gondang'),
(67, 11, 'Kolam Renang Oro-Oro Ombo', '-7.2852225', '112.3450685', 'oro_1.JPG', 'Jl. Raya Sambeng, Orooroombo, Mantup, Kec. Mantup, Kabupaten Lamongan', 'Tempat Kolam Renang ini merupakan tempat wisata baru yang ada di daerah Mantup, Lamongan. Bagi setiap pengunjung yang berencana atau ingin datang ke Kolam Renang Oro Oro Ombo sebaiknya ketahui terlebih dahulu harga tiket masuk yang berlaku.\r\nHarga tiket masuknya sangat bersahabat, yaitu 10.000/orang saja.\r\nUntuk pengantar tidak dikenakan biasa masuk lokasi. Bagaimana sangat terjangkau bukan? Jadi untuk yang berada disekitar Mantup Lamongan seperti daerah Gresik dan Mojokerto bisa datang ke Kolam Renang Oro Oro Ombo.', 'kolam-renang-oro-oro-ombo'),
(68, 11, 'Telaga SODA', '-7.0895047', '112.5080905', 'soda_1.JPG', 'Jl. Dukurjo, Area Persawahan, Tanggungprigel, Kec. Glagah, Kabupaten Lamongan', 'Salah destinasi baru di dikecamatan glagah yang dipelopori benerapa karang taruna dan pejabat desa setempat dengan memanfaatkan telaga atau waduk pengairan,beberapa fasilitas yang sudah dilengkapi antara lain tempat peristirahatan gazebo,water ball,perahu bebek dan aneka macam tanaman bunga di area jogging track.', 'telaga-soda'),
(69, 11, 'Kolam Renang Keraton Babat', '-7.1150949', '112.1612289', 'kolam renang keraton_1.JPG', 'Jl. Raya Babat Jombang, Karangkembang, Kec. Babat, Kabupaten Lamongan', 'Waterpark Keraton Babat atau Juga biasa dikenal dengan Kolam Renang Kerataon Babat salah satu destinasi wisata keluarga di perbatasan Kabupaten Lamongan dan Bojonegoro Jawa Timur.\r\nUntuk Harga tiket masuk Kolam Renang Kraton Babat ini hanya yakni Rp15000 siang hari dan Rp5000 malam hari , cukup murah untuk membahagiakan sanak keluarga maupun teman kantor..so tunggu apa lagi..', 'kolam-renang-keraton-babat'),
(70, 11, 'WEGO Lamongan', '-7.2044727', '112.2764802', 'wegoo_1.JPG', 'Jl. Raya Waduk Gondang, Juwet, Deketagung, Kec. Sugio, Kabupaten Lamongan', 'Spot wisata ini berada sekitar 15 KM arah selatan Lamongan Kota, yang bisa anda dan keluarga kunjungi. Terdapat juga beberapa spot menarik yang bisa dijadikan jujugan ketika berkunjung ke sini.\r\nTerdapat spot seperti Kebun Binatang Mini, Pulau Cinta, 2 pesawat tempur dan boeing, waterpark dan flyingfox yang ada di lahan seluas 36 Ha yang bisa anda explore dari ujung ke ujung. Banyak spot – spot untuk berfoto yang bisa anda gunakan dengan background-background yang sangat menarik.\r\nBahkan anda bisa masuk dan melihat keindahan dalam pesawat boeing yang ada di spot ini yang sudah dilengkapi lighting sehingga terlihat begitu menarik.', 'wego-lamongan'),
(71, 11, 'Stadion Surajaya', '-7.113342', '112.4267124', 'surajaya_1.JPG', 'Jl. Raya Gresik - Babat, Deket Kulon, Kec. Deket, Kabupaten Lamongan,', 'Bagi anda pecinta olahraga khususnya sepak bola, di Lamongan terdapat sebuah stadion yang dikenal dengan nama Stadion Surajaya Lamongan.\r\nStadion ini tidak hanya digunakan sebagai tempat berlatih dan bermain tim sepak bola Lamongan (Persela), tetapi juga dapat digunakan sebagai tempat berkunjung dan berfoto.', 'stadion-surajaya'),
(72, 11, 'Indonesia Islamic ART Museum', '-6.8668756', '112.357104', 'art_1.JPG', 'Jl. Raya Paciran, Paciran, Kec. Paciran, Kabupaten Lamongan', 'Berlokasi di Jl. Raya Paciran, Paciran, Kec. Paciran, Kabupaten Lamongan, Museum Seni Islam Indonesia yang dibuka pada tanggal 28 Desember 2016 yang lalu berisi sejarah perkembangan Islam di seluruh dunia.\r\nMuseum ini merupakan museum yang cukup vital lantaran memang selama ini belum ada lokasi yang menyajikan perkembangan Islam secara runtut dari awal dan ini menjadi yang pertama di Indonesia. Ini juga menjadi salah satu museum Islam terlengkap yang dimiliki dunia. Indonesian Islamic Art Museum merupakan museum di Indonesia yang sudah berbasis teknologi informasi modern Augmented Realty (AR).', 'indonesia-islamic-art-museum'),
(73, 11, 'Wisata Bahari Lamongan (WBL)', '-6.8664183', '112.3574412', 'wbl_1.JPG', 'Paciran, Kec. Paciran, Kabupaten Lamongan', '<p> Wisata Bahari Lamongan merupakan wisata yang terpopuler di Lamongan. Letaknya adalah di Jl. Raya Paciran, Paciran, Kec. Paciran, Kabupaten Lamongan, Jawa Timur. Wisata Bahari Lamongan ini diresmikan pada tanggal 14 November 2004 oleh H. Masyfuk yang ketika itu menjabat sebagai Bupati Lamongan.</p>\r\n<p>Wisatawan sangat direkomendasikan mengunjungi WBL. Sarana hiburan yang cocok bagi pasangan maupun keluarga dengan berbagai fasilitas, wahana, dan pemandangan pantai yang ditawarkan menambah nilai plus wisata ini. WBL selalu mengupdate wahana, fasilitas, dan system yang ada guna memanjakan dan mempermudah wisatawan. </p>\r\n<br>\r\n<h5> Harga Tiket Masuk WBL Lamongan </h5>\r\n<br>\r\nTiket Masuk Paket WBL : <br>\r\nSenin - Kamis Rp 75.000 <br> Jum\'at - Minggu Rp 100.000\r\n<br>\r\nTiket Masuk Maharani Zoo & Goa :<br>\r\nSenin - Kamis Rp 30.000 <br> Jum\'at - Minggu Rp 40.000\r\n<br>\r\nTiket Masuk Terusan Paket WBL & Maharani Zoo Goa : <br>\r\nSenin - Kamis Rp 97.500 <br> Jum\'at - Minggu Rp 130.000\r\n<br><br>\r\n<h5> Harga Tiket WBL Lamongan Wahana & Permainan </h5>\r\n<br>\r\nFlying Fox                                       : Rp 25.000 <br>\r\nATV 2 Lap                                       : Rp 15.000 <br>\r\nSepeda Air 5 Menit                        : Rp 10.000 <br>\r\nBanana Boat Max 5 Orang           : Rp 225.000 <br>\r\nKing Donat Boat Max 5 Orang     : Rp 200.000 <br>\r\nLong Boat                                        : Rp 25.000 <br>\r\nAqua Shuttle Boat Max 6 Orang  : Rp 225.000 <br>\r\nWater Ball 3 Menit                          : Rp 20.000 <br>\r\nGokar 1 Lap                                     : Rp 25.000 <br>\r\nGokar 2 Lap                                     : Rp 40.000 <br>\r\nArena Panahan                                : Rp 5000 \r\n', 'wisata-bahari-lamongan-wbl'),
(74, 12, 'Masjid Agung Lamongan', '-7.1201746', '112.4122193', 'masjid agung_1.JPG', 'Jl. Kyai H. Hasyim Ashari, Tumenggungan, Kec. Lamongan, Kabupaten Lamongan,', 'Masjid ini sudah dibangun sejak 1908 dan memiliki arsitektur gaya Jawa dipadukan dengan corak Islam. Bangunan masjid yang sekarang sedikit berbeda dengan bangunan asli masjid yang dulu namun secara keseluruhan tidak mengubah bentuk dan bagian-bagian di dalamnya.\r\nKeunikan masjid ini terletak pada model arsitekturnya. Masjid Jati dengan halaman bergapura China, dua genuk (tempat air) dan dua batu pasujudan. Ciri khas ini dikaitkan dengan sejarah Kedaton Giri tahun 1569, yang diduga ada keterkaitan di antara keduanya.', 'masjid-agung-lamongan'),
(75, 12, 'Makam Dewi Sekardadu Lamongan', '-7.1999716', '112.2639304', 'makam_1.JPG', 'Jl. Ronggo Hadi No.8, Jaledriasri, Gondang Lor, Kec. Sugio, Kabupaten Lamongan', 'Kota Lamongan juga terkenal akan wisata religinya , salah satunya adalah Wisata Ziarah Makam Dewi Sekardadu Lamongan ini. Beliau adalah ibu kandung dari Sunan Giri yang menyiarkan Islam di Jawa.\r\nDi makam Dewi Sekardadu di Lamongan, pada hari-hari biasa terlihat cukup sepi. Jika sedang tidak ada pengunjung, yang menonjol hanya bangunan bercat putih dengan lantai keramik putih. Luas bangunannya sekitar 64 meter persegi, berada di tengah-tengah tanah yang dikelilingi pagar bata.', 'makam-dewi-sekardadu-lamongan'),
(76, 12, 'Makam Sunan Sendang', '-6.8952879', '112.3423216', 'sunan sendang_1.JPG', 'Sendangduwur, Kranji, Kec. Paciran, Kabupaten Lamongan', 'Makam salah satu tokoh penyebar agama Islam di tanah Jawa yang satu ini berada diatas bukit Amitunon di Kecamatan Paciran. Sunan Sendang Duwur sendiri memiliki nama asli Raden Noer Rochmat. Beliau dulunya juga dikenal pernah memindahkan masjid hanya dalam waktu semalam dari Mantingan ke Bukit Amitunon yang sampai sekarang dikenal dengan nama Masjid Sendang Duwur.\r\nMakam beliau sendiri juga cukup unik karena adannya perpaduan antar dua kebudayaan yaitu Islam dan Hindu. Banyak terdapat ukiran ukiran istimewa dari kayu jati yang punya nilai seni tinggi di area dinding penyangga cungkup pada makam tersebut.', 'makam-sunan-sendang'),
(77, 12, 'Makam Nyai Dewi Andong Sari', '-7.2642217', '112.2349029', 'nyai andong_1.JPG', 'Sekidang, Kec. Sambeng, Kabupaten Lamongan', 'Nyi Andong Sari adalah ibunda dari Maha Patih Gadjah Mada, yang sangat mempunyai peran penting saat Kerajaan Majapahit berdiri. Makam Nyi Andong Sari terdapat di atas bukit setinggi 100 meter. Makam dari Nyi Andong Sari terdapat di puncak bukit Gunung Ratu. Untuk menuju ke sana kita harus menaiki sudut yang curam.\r\nNamun tak perlu khawatir, karena terdapat beberapa anak tangga untuk mencapai puncak. Sepanjang perjalanan, Anda akan ditemani monyet-monyet yang berkeliaran di area perbukitan tersebut.', 'makam-nyai-dewi-andong-sari'),
(78, 12, 'Makam Sunan Drajad', '-6.884393', '112.3847558', 'drajad_1.JPG', 'Drajat, Kec. Paciran, Kabupaten Lamongan', 'Sebagai seorang Muslim , kita harus mengetahui sejarah penyebaran agama Islam di Pulau Jawa adalah melalui Para Wali atau yang populer disebut Walisongo, salah satu Wali yang berjumlah 9 ini adalah Sunan Drajat,beliau menyebarkan Islam disekitar wilayah Lamongan yang dulunya masih belum tersentuh.\r\n\r\nSunan Drajat sendiri mempunyai nama kecil Raden Qasim, kemudian ketika dewasa beliau lebih dikenal dengan panggilan Raden Syarifuddin, beliau ini merupakan salah satu putra Sunan Ampel yang makamnya ada di Surabaya, saudaranya juga sesama Wali , namanya Sunan Bonang. keduanya membangun sebuah Pesantren Dalem Duwur di desa Drajat, Kecamatan Paciran, Lamongan. yang tanahnya merupakan hibah dari Sultan Demak.\r\n\r\nUntuk sampai ke Makam Sunan Drajat, anda cukup menempuh 30 menit saja dari Lamongan, jika anda berangkat dari arah Surabaya , maka anda bisa melewati Tuban lewat Jalan Daendels (Anyar-Panarukan). Pemerintahan setempat ingin menyelamatkan bangunan di tempat sekitar Makam,dengan merenovasi bagian yang sudah mulai rapuh.\r\n\r\nHingga diwujudkannya sebuah pembangunan Masjid Sunan Drajat lebih bagus lagi,  dan Museum Sunan Drajat pun dibangun atas dukungan masyarakat dan juga Gubernur Jawa Timur kala itu, Basofi Sudirman. selanjutnya diresmikan oleh Gubernur Jawa Timur Basofi Sudirman dan Menteri Penerangan RI antara tahun 1992 hingga 1994.', 'makam-sunan-drajad'),
(79, 12, 'Masjid Namira', '-7.1528047', '112.4065251', 'namira_1.JPG', 'Jl. Raya Lamongan- Mantup, Jotosanur, Kec. Tikung, Kabupaten Lamongan,', 'Salah satu masjid termegah yang berada di Kabupaten Lamongan ini sudah dikenal luas masyarakat, baik dari warga lokal sekitar maupun dari luar Lamongan. Masjid ini mampu menampung sekitar 2500 jamaah.\r\n\r\nMasjid yang beroperasi sejak awal juni 2013 silam ini awalnya mampu menampung kurang lebih 500 jamaah. Kemudian pada awal Oktober 2016 lalu, masjid telah diperbarui dengan menambah bangunan yang berada di seluas 2,7 Hektar sehingga total luas bangunannya menjadi 2.750 Meter Persegi. Kapasitas jamaah pun bisa menampung hingga 5 kali lipat dari awalnya.', 'masjid-namira'),
(80, 12, 'Masjid Ki Bagus Hadikusumo', '-7.1064633', '112.3874278', 'stikes_1.JPG', 'Universitas Muhammadiyah, Wahyu, Plosowahyu, Lamongan', 'Setelah Masjid Namira, kini Kota Lamongan memiliki ikon baru: Masjid Ki Bagus Hadikusumo.Masjid bergaya arsitektur Asia Tengah ini mengingatkan pada kemasyhuran Imam Al Bukhari, ulama hadits terkemuka kelahiran Asia Tengah, tepatnya Bukhara—sekarang masuk wilayah negara Uzbekistan eks Uni Sovyet.\r\n\r\nMasjid yang akan menjadi kebanggaan masyarakat Lamongan ini dipersembahan oleh Pimpinan Daerah Muhammadiyah Lamongan dan berada di kampus Sekolah Tinggi Ilmu Kesehatan (Stikesa) Muhammadiyah Lamongan.', 'masjid-ki-bagus-hadikusumo'),
(81, 12, 'Makam Syech Maulana Ishaq', '-6.8725657', '112.3973961', 'makam syekh_1.JPG', 'Jl. Raya Gresik, Kemantren, Kec. Paciran, Kabupaten Lamongan', 'Paciran dulunya merupakan wilayah mandala, yakni pusat pengembangan agama Hindu. Itu bisa diselidiki dari bentuk bangunan di Sendang Duwur yang berarsitektur tinggi bernuansa Hindu. Di makam Sunan Sendang Duwur, terdapat gapura berbentuk paduraksa serta sebuah gapura mirip Tugu Bentar di Bali. Karena alasan mandala itulah, kemungkinan besar mengapa Paciran menjadi lokasi dakwah para wali masa itu.\r\n\r\nMakam ini lokasinya berdekatan dengan laut dengan pemandangan yang luar biasa indahnya. Tidak hanya itu saja, di samping makam tersebut juga terdapat sebuah masjid 2 lantai peninggalan beliau. Masjid tersebut adalah Masjid Al – Abror yang dibangun di atas lahan 5 Hektar. Lokasi: Ds. Kemantren, Kec. paciran, Kab. Lamongan.', 'makam-syech-maulana-ishaq');

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
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `s1g_penginapan`
--

INSERT INTO `s1g_penginapan` (`id_penginapan`, `nama_tempat`, `lokasi_tempat`, `deskripsi_tempat`, `gambar`, `latitude`, `longitude`, `slug`) VALUES
(4, 'Tanjung Kodok Beach Resort', 'Jl. Raya Paciran, Paciran, Kec. Paciran, Kabupaten Lamongan, Jawa Timur', '    Tanjung Kodok Beach Resort (TKBR) adalah resort berbintang tiga-plus yang letaknya tepat disamping barat Wisata Bahari Lamongan (WBL). Berada di tepi pantai utara pulau Jawa, tepatnya di Kecamatan Paciran, Kabupaten Lamongan, Jawa Timur. Mudah dijangkau dari kota Surabaya dengan butuh waktu satu setengah jam perjalanan berkendara mobil dan melewati jalan raya yang beraspal dengan pemandangan yang menyenangkan.\r\n<br> <br>\r\nDari kamar hotel, para tamu dapat menikmati pemandangan pantai serta laut yang sangat indah, ditambah bebatuan karang dan goa alam yang mempesona. Tanjung Kodok Beach Resort merupakan satu-satunya di Jawa yang menghadap laut secara langsung. Nikmati juga matahari terbenam dengan pesona yang luar biasa.\r\n<br><hr>\r\n\r\nJika anda berminat, bisa cek harga permalamnya di\r\n<a href=\"https://www.google.com/travel/hotels/tanjung%20kodok%20pesan/entity/CgoIjPbSgYeOqZgNEAE/prices?q=tanjung%20kodok%20pesan&g2lb=2502548%2C2503771%2C2503781%2C4258168%2C4270442%2C4284970%2C4291517%2C4306835%2C4515404%2C4597339%2C4649665%2C4703207%2C4718358%2C4722900%2C4723331%2C4741664%2C4757164%2C4758493%2C4762561%2C4779784%2C4786958%2C4787395%2C4790255%2C4790928%2C4794648%2C4807450&hl=id-ID&gl=id&ssta=1&rp=EIz20oGHjqmYDRCM9tKBh46pmA04AkAASAHAAQI&ictx=1&ved=0CAAQ5JsGahcKEwjYvtb41sX4AhUAAAAAHQAAAAAQCQ&utm_campaign=sharing&utm_medium=link&utm_source=htls&ts=CAESABpICioSJjIkMHgyZTc3YzI0MDBlNjk1YzhmOjB4ZDMwYTQ3MDcwMzRiYjBjGgASGhIUCgcI5g8QBhgYEgcI5g8QBhgZGAEyAhAAKgkKBToDSURSGgA\">Sini</a>', '1656181330_d40c5f91f50046d77270.jpg', '-6.8664849', '112.356652', 'tanjung-kodok-beach-resort'),
(5, 'Hotel Elresas', 'Jl. KH. Ahmad Dahlan 33, Kauman, Sidoharjo, Kec. Lamongan, Kabupaten Lamongan', '   Hotel Elresas menyediakan akomodasi nyaman di pusat kota Lamongan, hanya 350 meter dari Alun-Alun Kota Lamongan. Hotel ini menyediakan restoran dan fasilitas parkir gratis. Akses WiFi gratis tersedia di seluruh area hotel.\r\n<br> <br>\r\nSelain tampil dengan desain simpel dan berlantai keramik,  kamar-kamarnya yang ber-AC memiliki dinding berwarna lembut. Di kamar tersedia TV dan air mineral gratis. Kamar mandi dalam memiliki shower air panas dan air dingin dan toilet.\r\n<br> <br>\r\nTamu bisa menikmati makanan lokal dan Western di Kedai Nikmah di Hotel Elresas, sedangkan tamu yang ingin bersantap di kamar dapat memesan makanan lewat layanan kamar 24 jam. Kedai jajanan kaki lima khas juga mudah ditemukan di sekitar hotel, seperti \r\n<br> <br>\r\nSego Boranan dan Nasi Boranan Kota Lamongan. Dengan 5 menit berjalan kaki, tamu juga bisa bersantap di Dapur Roti dan Dapur Kopi yang menyajikan menu lokal dan internasional.\r\n<br> <br>Staf resepsionis 24 jam dapat membantu berbagai kebutuhan tamu, seperti penitipan bagasi dan memberikan rekomendasi tur dan tempat wisata terdekat yang bisa dikunjungi. Hotel juga menyediakan layanan laundry dengan biaya tambahan. Ruang serbaguna tersedia untuk kebutuhan acara bisnis atau acara pribadi. ATM tersedia di lantai dasar.\r\n<br><br>\r\n Hotel Elresas menyediakan layanan antar-jemput bandara dari dan ke Bandara Internasional Juanda di Surabaya yang berjarak 64 km dari hotel. Masjid Namira yang populer terletak 4 km dari hotel. Tamu yang ingin rekreasi dapat mengunjungi Bukit Jamur, letaknya 33 km dari hotel, sedangkan Wisata Bahari Lamongan yang populer berjarak 44 km dari hotel.\r\n<br><br>\r\nCek Harga :\r\n<a href=\"https://www.google.com/travel/hotels/Hotel%20Elresas/entity/CgoI7tvuoNrk6OdBEAE/prices?q=Hotel%20Elresas&g2lb=2502548%2C2503771%2C2503781%2C4258168%2C4270442%2C4284970%2C4291517%2C4306835%2C4515404%2C4597339%2C4649665%2C4703207%2C4718358%2C4722900%2C4723331%2C4741664%2C4757164%2C4758493%2C4762561%2C4779784%2C4786958%2C4787395%2C4790255%2C4790928%2C4794648%2C4807450&hl=id-ID&gl=id&ssta=1&rp=EO7b7qDa5OjnQRDu2-6g2uTo50E4AkAASAHAAQI&ictx=1&utm_campaign=sharing&utm_medium=link&utm_source=htls&ts=CAESABpJCisSJzIlMHgyZTc3ZjBiMmRhOTNhZDIxOjB4NDFjZmEzMjVhNDFiYWRlZRoAEhoSFAoHCOYPEAYYGBIHCOYPEAYYGRgBMgIQACoJCgU6A0lEUhoA&ved=0CAAQ5JsGahcKEwiYyL_I2MX4AhUAAAAAHQAAAAAQCA\">Buka</a>', '1656181343_1e5e8915346ca8856085.jpg', '-7.1220778', '112.4124332', 'hotel-elresas'),
(6, 'Hennoyustian Homestay Lamongan', 'Jl. Pramuka, RT.02/RW.01, Paciran, Penanjan, Kec. Paciran, Kabupaten Lamongan', '  Tentang Hennoyustian Homestay Lamongan\r\n<br> \r\nHennoyustian Homestay Lamongan merupakan akomodasi terbaik untuk traveller yang ingin berlibur di pinggir pantai. Hotel di Lamongan ini memiliki lanskap pemandangan pantai yang sangat instagramable. Cocok bagi kamu yang ingin menikmati sunset, memotretnya dan upload di media sosial.\r\n<br>\r\nLokasi Hennoyustian Homestay Lamongan\r\n<br>\r\nHennoyustian Homestay Lamongan berada di Jl. Pramuka, RT.02/RW.01, Paciran, Penanjan, Paciran, Kabupaten Lamongan, Jawa Timur. Hotel ini dikelilingi oleh berbagai macam wisata pantai yang indah.\r\n<br>\r\nCheck-in\r\n <br>\r\nSesuaikan kedatangan dan kepulangan dengan jadwal check-in dan check-out hotel agar liburan kamu semakin nyaman. Waktu check-in pukul 12:00-14:00 WIB dan waktu check-out pukul 12:00-13:00 WIB.\r\n<br>\r\nFasilitas dan Layanan di Hennoyustian Homestay Lamongan\r\n<br>\r\nSetelah booking Hennoyustian Homestay Lamongan kamu akan mendapatkan fasilitas mewah dan nyaman seperti di rumah sendiri, yakni: \r\n<br> \r\nFree wifi <br>\r\nSarapan 2 pax <br>\r\nTV <br>\r\nAC <br>\r\nRuang keluarga <br>\r\nKopi/teh 2 pax <br>\r\nPerlengkapan mandi <br>\r\nArea parkir <br>\r\nBalkon <br>\r\nSunset view <br>\r\nShower <br>\r\nMeja <br>\r\nAntar-jempur bandara (biaya tambahan) <br>\r\nLayanan resepsionis 24 jam <br> <br>\r\n\r\nKamar di Hennoyustian Homestay Lamongan\r\n <br>\r\nPastikan untuk pesan Hennoyustian Homestay Lamongan sesuai dengan kebutuhan, karena Hotel di Lamongan ini memiliki beberapa jenis kemar yaitu Kamar Deluxe Double (25m2), Kamar Deluxe Twin (20m2).\r\n<br> \r\nMasing-masing kamar memiliki fasilitas seperti AC, peralatan mandi, , TV kabel, Meja, Fasilitas pembuat teh/kopi, Double bed/Twin Bed, kamar mandi dalam.\r\n<br>\r\nTempat Wisata dan Kuliner di Dekat Hennoyustian Homestay Lamongan\r\n<br>\r\nLokasi hotel ini terletak dipinggir pantai membuat Hennoyustian Homestay Lamongan sangat dekat dengan berbagai tempat wisata menarik lainnya, seperti:\r\n<br>\r\nPantai Lorena (180m, 2 menit berjalan kaki) <br>\r\nWisata Bahari Lamongan (805m, 3 menit berkendara) <br>\r\nKebun Binatang Maharani (971m, 4 menit berkendara) <br>\r\nTanjung Kodok (1km, 4 menit berkendara) <br>\r\nMuseum Sunan Drajat (4.3km, 20 menit berkendara) <br>\r\nMonumen Van Der Wick (9.3km, 45 menit berkendara) <br>\r\nTaman Prestasi Surabaya (3.8km, 11 menit berkendara) <br>\r\n<br>\r\nSelain objek wisata juga ada tempat kuliner yang nikmat dan harus kamu coba, seperti:\r\n <br>\r\nWisata Kuliner Brondong (7.1km, 13 menit berkendara) <br>\r\nWisata Kuliner Sam Ngalam (19km, 31 menit berkendara) <br>\r\nWisata Kuliner Asem-Asem Balungan (25km, 40 menit berkendara) <br>\r\nKuliner Tuban Rajungan Ndoro Bei (37km, 58 menit berkendara) <br>\r\n <br>\r\nCatatan Penting\r\n <br>\r\nAda beberapa hal yang harus kamu perhatikan saat menginap disini seperti:\r\n <br>\r\nTidak adanya fasilitas untuk ranjang bayi  <br>\r\nTidak ada fasilitas untuk ranjang tambahan  <br>\r\nTidak diperbolehkan membawa hewan peliharaan <br>\r\n <br> <br>\r\nYuk rencanakan liburan kamu ke berbagai tempat wisata Lamongan dengan menikmati sunset di Hennoyustian Homestay Lamongan. Booking kamarnya sekarang di tiket.com. Nikmati semua penawaran menarik yang tersedia dan dapatkan juga kamar dengan harga murah dan promo terbaiknya.\r\n<br>\r\nCek Harga Kamar :\r\n<a href=\"https://www.google.com/travel/hotels/Hennoyustian%20Homestay%20Lamongan/entity/CgoIy7S3ofvCxdFTEAE/prices?q=Hennoyustian%20Homestay%20Lamongan&g2lb=2502548%2C2503771%2C2503781%2C4258168%2C4270442%2C4284970%2C4291517%2C4306835%2C4515404%2C4597339%2C4649665%2C4703207%2C4718358%2C4722900%2C4723331%2C4741664%2C4757164%2C4758493%2C4762561%2C4779784%2C4786958%2C4787395%2C4790255%2C4790928%2C4794648%2C4807450&hl=id-ID&gl=id&ssta=1&rp=EMu0t6H7wsXRUzgCQABIAcABAg&ictx=1&ved=0CAAQ5JsGahcKEwi4o6bH2cX4AhUAAAAAHQAAAAAQBA&utm_campaign=sharing&utm_medium=link&utm_source=htls&ts=CAESABpJCisSJzIlMHgyZTc3YzIxNDcxNDQ4OTZiOjB4NTNhMzE2MTdiNDJkZGE0YhoAEhoSFAoHCOYPEAcYFRIHCOYPEAcYFhgBMgIQACoJCgU6A0lEUhoA\">Buka</a>', '1656181353_20d30699bb2e1269b2e6.jpg', '-7.1022589', '112.1664596', 'hennoyustian-homestay-lamongan'),
(7, 'OYO 3434 Penginapan Keluarga Syariah', 'Jl. Merpati No.61, Krajan, Banjarmendalan, Kec. Lamongan, Kabupaten Lamongan,', '  OYO 3434 Penginapan Keluarga Syariah menawarkan kamar dengan tempat tidur yang nyaman untuk waktu menginap yang menyenangkan. Kamar dilengkapi dengan tempat tidur yang nyaman, wifi, AC, Televisi, kamar mandi yang higienis, dan perelengkapan.\r\n <br>\r\nTamu umur berapa pun bisa menginap di sini.\r\n <br>\r\nAnak-anak 7 tahun ke atas dianggap sebagai tamu dewasa.\r\n <br>\r\nPastikan umur anak yang menginap sesuai dengan detail pemesanan. Jika berbeda, tamu mungkin akan dikenakan biaya tambahan saat check-in.\r\n <br>\r\nTamu yang datang berpasangan harus menunjukkan buku nikah saat check-in.\r\n <br>\r\nTamu tidak perlu membayar deposit saat check-in.\r\n <br>\r\nTamu umur berapa pun bisa menginap di sini.\r\n <br>\r\nSarapan tersedia pukul 07:00 - 10:00 waktu lokal.\r\n <br>\r\nTidak diperbolehkan membawa hewan peliharaan.\r\n <br>\r\nKamar bebas asap rokok.\r\n <br>\r\nMinuman beralkohol tidak diperbolehkan.\r\n<br><br>\r\nCek Harga Kamar :\r\n<a href=\"https://www.google.com/travel/hotels/OYO%203434%20Penginapan%20Keluarga%20Syariah/entity/CgsI-ZOInauI2vSLARAB/prices?q=OYO%203434%20Penginapan%20Keluarga%20Syariah&g2lb=2502548%2C2503771%2C2503781%2C4258168%2C4270442%2C4284970%2C4291517%2C4306835%2C4515404%2C4597339%2C4649665%2C4703207%2C4718358%2C4722900%2C4723331%2C4741664%2C4757164%2C4758493%2C4762561%2C4779784%2C4786958%2C4787395%2C4790255%2C4790928%2C4794648%2C4807450&hl=id-ID&gl=id&ssta=1&rp=EPmTiJ2riNr0iwEQ-ZOInauI2vSLATgCQABIAcABAg&ictx=1&ved=0CAAQ5JsGahcKEwiwz8a-2sX4AhUAAAAAHQAAAAAQBA&utm_campaign=sharing&utm_medium=link&utm_source=htls&ts=CAESABpJCisSJzIlMHgyZTc3ZjFmMmZjYzQ3M2Q1OjB4OGJlOTY4NDJiM2EyMDlmORoAEhoSFAoHCOYPEAYYGBIHCOYPEAYYGRgBMgIQACoJCgU6A0lEUhoA\">Buka</a>', '1656181363_22e094260b0c897120a2.jpg', '-7.1022567', '112.1664785', 'oyo-3434-penginapan-keluarga-syariah'),
(8, 'OYO 3706 Griya Tentrem Syariah', 'Jl. Veteran No.150, Tlogoanyar, Kec. Lamongan, Kabupaten Lamongan,', '  OYO 3706 Griya Tentrem Syariah menawarkan kamar dengan tempat tidur yang besar dan nyaman untuk waktu menginap yang menyenangkan. Semua kamar dilengkapi dengan tempat tidur yang nyaman, wifi, AC, Televisi, lamar mandi yang higienis, dan perelengkapan dengan kualitas tinggi dan masa kini.\r\n<hr>\r\n<br><br>\r\nCek Harga Kamar :\r\n<a href=\"https://www.google.com/travel/hotels/OYO%203706%20Griya%20Tentrem%20Syariah/entity/CgoIxd7bmvLA_LUfEAE/prices?q=OYO%203706%20Griya%20Tentrem%20Syariah&g2lb=2502548%2C2503771%2C2503781%2C4258168%2C4270442%2C4284970%2C4291517%2C4306835%2C4515404%2C4597339%2C4649665%2C4703207%2C4718358%2C4722900%2C4723331%2C4741664%2C4757164%2C4758493%2C4762561%2C4779784%2C4786958%2C4787395%2C4790255%2C4790928%2C4794648%2C4807450&hl=id-ID&gl=id&ssta=1&rp=EMXe25rywPy1HxDF3tua8sD8tR84AkAASAHAAQI&ictx=1&ved=0CAAQ5JsGahcKEwjgwqTG28X4AhUAAAAAHQAAAAAQBA&utm_campaign=sharing&utm_medium=link&utm_source=htls&ts=CAESABpJCisSJzIlMHgyZTc3ZjdmNGY5NjQxMWE3OjB4MWY2YmYyMDcyMzU2ZWY0NRoAEhoSFAoHCOYPEAYYGBIHCOYPEAYYGRgBMgIQACoJCgU6A0lEUhoA\">Buka</a>', '1656181371_34713f3be1c9bc250450.jpg', '-7.110626', '112.1549303', 'oyo-3706-griya-tentrem-syariah'),
(9, 'Homestay Bougenville', 'Jalan Sumargo, Gg. Bougenville No.26, Tlogoanyar, Kec. Lamongan, Kabupaten Lamongan', '  Homestay Bougenville adalah salah satu penginapan ramah budget yang berlokasi di kawasan wisata dataran tinggi Dieng. Penginapan ini sangat populer di kalangan backpackers yang memang sering menjadikan Banjarnegara sebagai destinasi wisata. Harga murah serta fasilitas memuaskan yang ditawarkan oleh hotel ini juga jadi daya tarik tersendiri bagi para keluarga. \r\n<br>\r\nLokasi Homestay Bougenville\r\n<br>\r\nHomestay Bougenville terletak di dataran tinggi Dieng. Tempat ini cocok untuk kamu yang ingin lebih mudah mendatangi setiap tempat menarik selama berada di Banjarnegara.\r\n<br>\r\nCheck-in\r\n<br>\r\nKamu dapat melakukan check-in di penginapan Bougenville yang dibuka dari jam 12:00 WIB. Sedangkan waktu untuk check-out dibuka hingga jam 10:00 pagi. Informasi ini tentunya berguna untuk merencanakan kepergianmu ke Kabupaten Banjarnegara.\r\n<br>\r\nFasilitas dan Layanan di Homestay Bougenville\r\n<br>\r\nUntuk mendukung kenyamananmu selama menginap, Homestay Bougenville di Banjarnegara menyediakan beragam fasilitas serta pelayanan. Terdapat fasilitas parkir gratis di area properti yang dapat digunakan tanpa reservasi terlebih dahulu. Para staf yang akan melayanimu tidak hanya ramah, tapi mereka juga dapat berbicara dalam dua bahasa yaitu Bahasa Inggris dan Bahasa Indonesia.\r\n<br><br>\r\nCek Harga Kamar :\r\n<a href=\"https://www.google.com/travel/hotels/Homestay%20Bougenville/entity/CgsIt5ig3Ljn5sj3ARAB/prices?q=Homestay%20Bougenville&g2lb=2502548%2C2503771%2C2503781%2C4258168%2C4270442%2C4284970%2C4291517%2C4306835%2C4515404%2C4597339%2C4649665%2C4703207%2C4718358%2C4722900%2C4723331%2C4741664%2C4757164%2C4758493%2C4762561%2C4779784%2C4786958%2C4787395%2C4790255%2C4790928%2C4794648%2C4807450&hl=id-ID&gl=id&ssta=1&rp=ELeYoNy45-bI9wEQt5ig3Ljn5sj3ATgCQABIAcABAg&ictx=1&ved=0CAAQ5JsGahcKEwiIx6f228X4AhUAAAAAHQAAAAAQAw&utm_campaign=sharing&utm_medium=link&utm_source=htls&ts=CAESABpJCisSJzIlMHgyZTc3ZjdlZDQzYzc1NWFiOjB4Zjc5MTliM2I4Yjg4MGMzNxoAEhoSFAoHCOYPEAYYGBIHCOYPEAYYGRgBMgIQACoJCgU6A0lEUhoA\">Buka</a>', '1656181381_89ccc3d4fa4369272760.jpg', '-7.1108765', '112.1549303', 'homestay-bougenville'),
(11, 'OYO 3500 D\'chandra Family Syariah', 'Ngimbang, Kec. Ngimbang, Kabupaten Lamongan', '  OYO 3500 D\'chandra Family menawarkan kamar dengan tempat tidur yang nyaman untuk waktu menginap yang menyenangkan. Kamar dilengkapi dengan tempat tidur yang nyaman, wifi, AC, Televisi, kamar mandi yang higienis, dan perelengkapan.\r\n<br><br>\r\n\r\nCek Harga Kamar :\r\n<a href=\"https://www.google.com/travel/hotels/OYO%203500%20D\'chandra%20Family%20Syariah/entity/CgsIh5mxm_y9x7jmARAB/prices?q=OYO%203500%20D%27chandra%20Family%20Syariah&g2lb=2502548%2C2503771%2C2503781%2C4258168%2C4270442%2C4284970%2C4291517%2C4306835%2C4515404%2C4597339%2C4649665%2C4703207%2C4718358%2C4722900%2C4723331%2C4741664%2C4757164%2C4758493%2C4762561%2C4779784%2C4786958%2C4787395%2C4790255%2C4790928%2C4794648%2C4807450&hl=id-ID&gl=id&ssta=1&rp=EIeZsZv8vce45gE4AkAASAHAAQI&ictx=1&ved=0CAAQ5JsGahcKEwj4-_WC3cX4AhUAAAAAHQAAAAAQBA&utm_campaign=sharing&utm_medium=link&utm_source=htls&ts=CAESABpJCisSJzIlMHgyZTc4MjMzMjcxNmEzYzFkOjB4ZTY3MTFkZWZjMzZjNGM4NxoAEhoSFAoHCOYPEAYYGBIHCOYPEAYYGRgBMgIQACoJCgU6A0lEUhoA\">Buka</a>', '1656181389_9ad58f0a4eb04ed7978b.jpg', '-7.194737', '112.1194673', 'oyo-3500-dchandra-family-syariah'),
(12, 'Hotel Arut Lamongan', 'Jl. Raya Lamongan - Babat Kruwul, Karanglangit, Lamongan', '  Hotel Arut Lamongan\r\n<br>\r\nLocated in Lamongan,  offers accommodation with a private balcony. The hotel provides free Wi-Fi and free private parking.\r\nEach room at the Boegenviel Hotel has a desk, TV and a seating area.\r\nHalal breakfast is available daily at the property.\r\nThe receptionist can give advice regarding the area.\r\n<br><br>\r\nCek Harga Kamar :\r\n<a href=\"https://www.traveloka.com/id-id/accommodation/booking/lcx-5ce79bec-b65d-4ddc-9a38-8682eb41ab54\">Standar</a>\r\n|\r\n<a href=\"https://www.traveloka.com/id-id/accommodation/booking/lcx-45bc5071-dd08-4fbd-9622-68313dbf8ec0\">Deluxe</a>', '1656181397_7f3f15e8c80d16d61310.jpg', '-7.0981789', '112.1298106', 'hotel-arut-lamongan'),
(13, 'Hotel Grand Mahkota', 'Jalan Sunan Drajad no 4 - 8, Sidoharjo', '  Hotel Grand Mahkota Lamongan menyediakan tempat yang tepat bagi wisatawan untuk bersantai setelah hari yang sibuk. Hotel Grand Mahkota Lamongan menawarkan masa inap yang menyenangkan di Lamongan bagi mereka yang melakukan perjalanan bisnis atau liburan.\r\nStasiun Kereta Api Pasar Turi Surabaya berjarak sekitar 43 km, sedangkan Bandara Yahukimo berjarak 70 km.\r\nDi penghujung hari yang sibuk, wisatawan dapat melepas lelah dan bersantai di hotel atau keluar dan menikmati kota. Hotel Lamongan ini menyediakan tempat parkir di lokasi.\r\n<br><br>\r\nJika anda berminat, bisa cek harga permalamnya di\r\n<a href=\"https://id.trip.com/hotels/book?hasaidinurl=false\">Sini</a>', '1656181464_757b407364a70348fccc.jpg', '-7.1082873', '112.1532636', 'hotel-grand-mahkota');

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
  `slug_toko` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `s1g_toko`
--

INSERT INTO `s1g_toko` (`id_toko`, `id_kuliner`, `nama_toko`, `alamat`, `foto`, `slug_toko`) VALUES
(1, 4, 'toko wingko 1', 'jalanin aja dlu', '1657622715_fc451e1b6d36f5a6d81b.jpeg', 'toko-wingko-1'),
(2, 4, 'toko wingko 2', 'jalan maju munduer', '1657622750_0581b2bb7fe1cff21505.jpeg', 'toko-wingko-2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `s1g_user`
--

CREATE TABLE `s1g_user` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `s1g_user`
--

INSERT INTO `s1g_user` (`id_user`, `nama`, `email`, `password`, `foto`) VALUES
(1, 'Indra Ayudya', 'indra1967@gmail.com', '$2y$10$2KCdc3Knb82q356oQL1vj.zbd9p8N8WqJMYlXmeDxXJSdai5Jg6D.', ''),
(2, 'agung sapta', 'agungsapta6@gmail.com', '$2y$10$OloAqbExwTfmFyy.sWJRaey6ukyDgkhFoahd4SEAlgrj6ixUBd9lu', '');

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
  MODIFY `id_acara` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `s1g_admin`
--
ALTER TABLE `s1g_admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `s1g_album_acara`
--
ALTER TABLE `s1g_album_acara`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `s1g_album_peta`
--
ALTER TABLE `s1g_album_peta`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT untuk tabel `s1g_feedback`
--
ALTER TABLE `s1g_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `s1g_kategori`
--
ALTER TABLE `s1g_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `s1g_kategori_acara`
--
ALTER TABLE `s1g_kategori_acara`
  MODIFY `id_kategori_acara` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `s1g_komentar_pariwisata`
--
ALTER TABLE `s1g_komentar_pariwisata`
  MODIFY `id_komentar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `s1g_kuliner`
--
ALTER TABLE `s1g_kuliner`
  MODIFY `id_kuliner` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `s1g_pariwisata`
--
ALTER TABLE `s1g_pariwisata`
  MODIFY `id_pariwisata` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT untuk tabel `s1g_penginapan`
--
ALTER TABLE `s1g_penginapan`
  MODIFY `id_penginapan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `s1g_toko`
--
ALTER TABLE `s1g_toko`
  MODIFY `id_toko` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `s1g_user`
--
ALTER TABLE `s1g_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
