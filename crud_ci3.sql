-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Agu 2020 pada 10.19
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_ci3`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_crew`
--

CREATE TABLE `tabel_crew` (
  `id_crew` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `gender` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_crew`
--

INSERT INTO `tabel_crew` (`id_crew`, `nama`, `gender`, `alamat`) VALUES
(1, 'Monkey D. Luffy', 'Laki-Laki', 'East Blue'),
(2, 'Roronoa Zoro', 'Laki-Laki', 'East Blue'),
(3, 'Nami', 'Perempuan', 'East Blue');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_file`
--

CREATE TABLE `tabel_file` (
  `id_file` int(11) NOT NULL,
  `keterangan` varchar(80) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_file`
--

INSERT INTO `tabel_file` (`id_file`, `keterangan`, `file`) VALUES
(1, 'Gambar 1', '35c91446e91772b70706c1c6ec293752.jpg'),
(3, 'Gambar 2', '158e0433311ae1e245ab5273db3361b2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_genre`
--

CREATE TABLE `tabel_genre` (
  `id_genre` int(11) NOT NULL,
  `genre` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_genre`
--

INSERT INTO `tabel_genre` (`id_genre`, `genre`) VALUES
(1, 'Action'),
(2, 'Comedy'),
(4, 'Isekai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_komik`
--

CREATE TABLE `tabel_komik` (
  `id_komik` int(11) NOT NULL,
  `id_genre` int(11) NOT NULL,
  `judul` varchar(128) NOT NULL,
  `penulis` varchar(80) NOT NULL,
  `sampul` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_komik`
--

INSERT INTO `tabel_komik` (`id_komik`, `id_genre`, `judul`, `penulis`, `sampul`) VALUES
(1, 4, 'Sword Art Online', 'Kayaba Akihiko', ''),
(2, 1, 'One Piece', 'Eichro Oda', ''),
(4, 1, 'Attack on Titan', 'Eren Yeager', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_user`
--

CREATE TABLE `tabel_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(128) NOT NULL,
  `level` varchar(30) NOT NULL,
  `foto` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_user`
--

INSERT INTO `tabel_user` (`id_user`, `nama`, `username`, `password`, `level`, `foto`) VALUES
(1, 'Raksasa Kecil', 'admin', '$2y$10$jY79zlvT0Byy4nNrlnFTtu0ktYOJvgz4xXbXbiPkDz3GZcuzs7Ys.', 'Admin', '8277fe0aa51d5879126e957f019718a2.jpg'),
(3, 'Operator', 'operator', '$2y$10$j371zd2BVKlButdr/l80hu52MU3.aXdqSB.ZbDhfERqH9XilD50pu', 'Operator', 'noprofile.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tabel_crew`
--
ALTER TABLE `tabel_crew`
  ADD PRIMARY KEY (`id_crew`);

--
-- Indeks untuk tabel `tabel_file`
--
ALTER TABLE `tabel_file`
  ADD PRIMARY KEY (`id_file`);

--
-- Indeks untuk tabel `tabel_genre`
--
ALTER TABLE `tabel_genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indeks untuk tabel `tabel_komik`
--
ALTER TABLE `tabel_komik`
  ADD PRIMARY KEY (`id_komik`);

--
-- Indeks untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tabel_crew`
--
ALTER TABLE `tabel_crew`
  MODIFY `id_crew` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tabel_file`
--
ALTER TABLE `tabel_file`
  MODIFY `id_file` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tabel_genre`
--
ALTER TABLE `tabel_genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tabel_komik`
--
ALTER TABLE `tabel_komik`
  MODIFY `id_komik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tabel_user`
--
ALTER TABLE `tabel_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
