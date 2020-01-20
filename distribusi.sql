-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jan 2020 pada 11.08
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.1.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `distribusi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jarak`
--

CREATE TABLE `jarak` (
  `id` int(3) NOT NULL,
  `lokasi1` int(5) DEFAULT NULL,
  `lokasi2` int(5) DEFAULT NULL,
  `lokasi3` int(5) DEFAULT NULL,
  `lokasi4` int(5) DEFAULT NULL,
  `lokasi5` int(5) DEFAULT NULL,
  `lokasi6` int(5) DEFAULT NULL,
  `lokasi7` int(5) DEFAULT NULL,
  `lokasi8` int(5) DEFAULT NULL,
  `lokasi9` int(5) DEFAULT NULL,
  `lokasi10` int(5) DEFAULT NULL,
  `lokasi11` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jarak`
--

INSERT INTO `jarak` (`id`, `lokasi1`, `lokasi2`, `lokasi3`, `lokasi4`, `lokasi5`, `lokasi6`, `lokasi7`, `lokasi8`, `lokasi9`, `lokasi10`, `lokasi11`) VALUES
(1, NULL, 15, 11, 8, 12, 14, 17, 15, 17, 17, 13),
(2, 15, NULL, 7, 9, 6, 2, 3, 6, 6, 6, 3),
(3, 11, 7, NULL, 6, 1, 6, 4, 5, 5, 7, 5),
(4, 8, 9, 6, NULL, 6, 7, 10, 10, 10, 10, 6),
(5, 12, 6, 1, 7, NULL, 6, 7, 4, 4, 6, 5),
(6, 14, 2, 6, 7, 6, NULL, 3, 5, 5, 5, 2),
(7, 17, 3, 4, 10, 7, 3, NULL, 4, 3, 2, 5),
(8, 15, 6, 5, 10, 4, 5, 3, NULL, 2, 4, 7),
(9, 17, 6, 5, 10, 4, 5, 3, 2, NULL, 3, 6),
(10, 17, 6, 7, 10, 6, 5, 2, 4, 3, NULL, 7),
(11, 13, 3, 5, 6, 5, 0, 5, 7, 6, 7, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id`, `nama`, `alamat`) VALUES
(1, 'Gudang Distribusi', 'Jl. Soekarno Hatta No.789, Babakan Penghulu'),
(2, 'Dago', 'Jl. Ir. H. Juanda No.301, Dago'),
(3, 'Gatot Subroto', 'Jl. Gatot Subroto, Malabar'),
(4, 'Antapani', 'Jl. Antapani No.49, Antapani Kulon'),
(5, 'Naripan', 'Jl. Naripan No.65, Kebon Pisang'),
(6, 'Tubagus Ismail', 'Jl. Tubagus Ismail Raya No.27, Sekeloa'),
(7, 'Cihampelas', 'Jl. Cihampelas No. 220, Cipaganti'),
(8, 'Stasiun Bandung Utara', 'Jl. Kebon Kawung, Pasir Kaliki'),
(9, 'Pajajaran', 'Jl. Pajajaran No. 47, Pasir Kaliki'),
(10, 'Sukagalih', 'Jl. Sukagalih No.38, Sukabungah'),
(11, 'Sadang Serang', 'Jl. Sadang Serang, Coblog');

-- --------------------------------------------------------

--
-- Struktur dari tabel `temp`
--

CREATE TABLE `temp` (
  `id` int(3) NOT NULL,
  `lokasi1` int(5) DEFAULT NULL,
  `lokasi2` int(5) DEFAULT NULL,
  `lokasi3` int(5) DEFAULT NULL,
  `lokasi4` int(5) DEFAULT NULL,
  `lokasi5` int(5) DEFAULT NULL,
  `lokasi6` int(5) DEFAULT NULL,
  `lokasi7` int(5) DEFAULT NULL,
  `lokasi8` int(5) DEFAULT NULL,
  `lokasi9` int(5) DEFAULT NULL,
  `lokasi10` int(5) DEFAULT NULL,
  `lokasi11` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jarak`
--
ALTER TABLE `jarak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jarak`
--
ALTER TABLE `jarak`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `temp`
--
ALTER TABLE `temp`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
