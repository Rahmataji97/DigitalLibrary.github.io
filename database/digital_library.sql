-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Agu 2020 pada 12.35
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digital_library`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookmark`
--

CREATE TABLE `bookmark` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ebook_id` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bookmark`
--

INSERT INTO `bookmark` (`id`, `user_id`, `ebook_id`, `tanggal`) VALUES
(2, 1, 1, '2020-04-22'),
(3, 2, 3, '2020-04-21'),
(4, 2, 1, '2020-04-22'),
(5, 2, 4, '2020-04-22'),
(6, 2, 5, '2020-04-22'),
(7, 6, 2, '2020-04-22'),
(8, 6, 1, '2020-04-22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `download`
--

CREATE TABLE `download` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ebook_id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `download`
--

INSERT INTO `download` (`id`, `user_id`, `ebook_id`, `tanggal`) VALUES
(1, 2, 1, '0000-00-00 00:00:00'),
(2, 2, 1, '2020-04-21 00:00:00'),
(3, 2, 1, '2020-04-21 00:00:00'),
(4, 2, 1, '2020-04-21 00:00:00'),
(5, 6, 2, '2020-04-22 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ebook`
--

CREATE TABLE `ebook` (
  `id` int(11) NOT NULL,
  `kode_ebook` varchar(30) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `sub_id` int(11) NOT NULL,
  `deskripsi` varchar(150) NOT NULL,
  `isbn` varchar(30) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `penerbit_id` int(11) NOT NULL,
  `tahun_terbit` int(4) NOT NULL,
  `rekomended` varchar(1) DEFAULT '0',
  `gambar` varchar(150) NOT NULL,
  `file_upload` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ebook`
--

INSERT INTO `ebook` (`id`, `kode_ebook`, `judul`, `kategori_id`, `sub_id`, `deskripsi`, `isbn`, `penulis`, `penerbit_id`, `tahun_terbit`, `rekomended`, `gambar`, `file_upload`) VALUES
(1, 'A-0003', 'Penerapan Algoritma Genetika Pada Pemrograman', 1, 2, 'Tentang  penerapan Algoritma Genetika dalam pemrogramman komputer', '3456', 'sfsdf', 12, 2019, '1', '20042020085408genetika2.jpg', '19042020065749Algoritma Genetika.pdf'),
(2, 'A-0004', 'Agribisnis : Ternak Unggas Petelur', 2, 1, 'Pengetahuan mengenai bagaimana cara beternak unggas petelur yang benar untuk hasil yang maksimal', '2342', 'BSE Mahoni', 1, 2019, '0', '2504202013260820042020085408genetika2.jpg', '21042020063901Agribisnis_Ternak_Unggas_Petelur_3.pdf'),
(3, 'A-0005', 'Belajar Musik : Bass Gitar', 1, 1, 'Cara memainkan musik dengan bass gitar dengan benar', '1111', 'Drs. F. Dhanang Guritno, M.Sn.', 1, 2020, '0', '25042020131437empty-file.jpg', '21042020064222Bass_Gitar_1.pdf'),
(4, 'A-0006', 'Akses Internet Gratis Dengan Antena Kaleng', 2, 2, 'Apakah kita bisa melakukan koneksi internet dengan kaleng? e-book ini akan mengulasnya', '4444', 'Noesapati', 12, 2020, '0', '25042020131423empty-file.jpg', '21042020064515Akses Internet Gratis dengan Antena Kaleng.pdf'),
(5, 'A-0007', 'PEDOMAN PELAKSANAAN KANTOR PEDULI LINGKUNGAN (ECO-', 2, 1, 'Membuat Kantor yang ramah lingkungan', '11111', 'Ni Nyoman Santi, S.T., M.Sc.', 1, 2020, '0', '25042020131459empty-file.jpg', '21042020064804Pedoman-Eco-Office-Bali_buku-saku_02-1.pdf'),
(6, 'A-0008', 'Desain Grafis', 1, 1, 'Tentang dasar - dasar desain grafis', '34234', 'BSE Mahoni', 1, 2020, '0', '25042020131447empty-file.jpg', '21042020064937Desain_Grafis.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` varchar(150) NOT NULL,
  `gambar` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `deskripsi`, `gambar`) VALUES
(1, 'Fakultas Teknologi Komunikasi dan Informatika', 'Fakultas Teknologi Komunikasi dan Informatika', '17042020192835penemuan-teknologi-ilustrasi-_170125232749-341.jpg'),
(2, 'Fakultas Ekonomi', 'Fakultas Ekonomi', '17042020192945sosial.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news_event`
--

CREATE TABLE `news_event` (
  `id` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `tanggal1` date NOT NULL,
  `tanggal2` date NOT NULL,
  `jam1` time NOT NULL,
  `jam2` time NOT NULL,
  `deskripsi` varchar(250) NOT NULL,
  `gambar` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `news_event`
--

INSERT INTO `news_event` (`id`, `nama`, `tanggal1`, `tanggal2`, `jam1`, `jam2`, `deskripsi`, `gambar`) VALUES
(1, 'Event 1', '2020-04-22', '2020-04-23', '10:00:00', '14:00:00', 'Event 1, contoh event 1', '20042020021240event1.jpg'),
(2, 'Event 2', '2020-04-24', '2020-04-24', '20:00:00', '23:00:00', 'Ini Event 2, Contoh Event Kedua', '20042020021414event2.jpg'),
(3, 'Event 3', '2020-04-29', '2020-04-30', '08:00:00', '13:00:00', 'Event 3, Ini adalah event ke 3', '20042020021609event3.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit`
--

CREATE TABLE `penerbit` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `gambar` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penerbit`
--

INSERT INTO `penerbit` (`id`, `nama`, `gambar`) VALUES
(1, 'Balai Pustaka', '17042020054446balaipustaka.jpeg'),
(7, 'Ganesha', '17042020064955ganesha.jpg'),
(12, 'Erlangga', '17042020065804erlangga.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `nama_depan` varchar(35) NOT NULL,
  `nama_belakang` varchar(35) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telpon` varchar(35) NOT NULL,
  `pesan` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id`, `nama_depan`, `nama_belakang`, `email`, `telpon`, `pesan`) VALUES
(5, 'Rahmat', 'Aji', 'rahmataji@gmail.com', '908018241468', 'tolong acc ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kategori`
--

CREATE TABLE `sub_kategori` (
  `id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `deskripsi` varchar(150) NOT NULL,
  `gambar` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sub_kategori`
--

INSERT INTO `sub_kategori` (`id`, `kategori_id`, `nama`, `deskripsi`, `gambar`) VALUES
(1, 1, 'Sistem Informasi', 'Sistem Informasi', 'Ini Gambar Sub Kategori'),
(2, 2, 'Ekonomi dan Bisnis', 'Ekonomi dan Bisnis', 'Ini Gambar Sub Kategori');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `pass` varchar(300) NOT NULL,
  `posisi` varchar(10) NOT NULL,
  `aktif` varchar(1) NOT NULL DEFAULT '0',
  `gambar` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `kode`, `nama`, `user_name`, `pass`, `posisi`, `aktif`, `gambar`) VALUES
(1, 'A-0000', 'Admin 123', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '1', '28082020121159admin.jpg'),
(7, 'A-0001', 'Aji', 'Aji', '4297f44b13955235245b2497399d7a93', 'anggota', '1', '28082020121111cat_art_window_140051_3840x2400.jpg'),
(8, 'A-0002', 'rahmat', 'rahmat', '4297f44b13955235245b2497399d7a93', 'anggota', '1', '2808202012131108072020002111astronaut_spacesuit_reflection_144426_3840x2160.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bookmark`
--
ALTER TABLE `bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ebook`
--
ALTER TABLE `ebook`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `news_event`
--
ALTER TABLE `news_event`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bookmark`
--
ALTER TABLE `bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `download`
--
ALTER TABLE `download`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ebook`
--
ALTER TABLE `ebook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `news_event`
--
ALTER TABLE `news_event`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `sub_kategori`
--
ALTER TABLE `sub_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
