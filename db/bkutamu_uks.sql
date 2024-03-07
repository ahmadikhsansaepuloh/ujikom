-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Feb 2024 pada 04.11
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ais (1)`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `listtamu`
--

CREATE TABLE `listtamu` (
  `no` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `sakit` text NOT NULL,
  `jk` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `listtamu`
--

INSERT INTO `listtamu` (`no`, `nama`, `sakit`, `jk`, `jurusan`, `kelas`, `waktu`) VALUES
(6, 'Ahmad Ikhsan', 'salatri', 'Laki-laki', 'Rpl', '11', '2024-02-27 01:29:12'),
(7, 'Ahmad Ikhsan', 'sassss', 'Perempuan', 'Atph', '12222', '2024-02-27 01:29:56'),
(8, 'isaa', 'magh kambuh babalongkengan di lapng', 'Laki-laki', 'Rpl', '122', '2024-02-27 01:30:25'),
(9, 'Ahmad Ikhsan', 'axasxas', 'Laki-laki', 'Tbsm', '12222', '2024-02-27 01:32:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `no` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`no`, `user`, `pass`) VALUES
(1, 'isan', '111');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `listtamu`
--
ALTER TABLE `listtamu`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`no`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `listtamu`
--
ALTER TABLE `listtamu`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
