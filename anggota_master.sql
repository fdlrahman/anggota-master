-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Agu 2021 pada 14.46
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anggota_master`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nkta` varchar(250) NOT NULL,
  `cabang` varchar(250) NOT NULL,
  `daerah` varchar(250) NOT NULL,
  `wilayah` varchar(250) NOT NULL,
  `nama` varchar(250) NOT NULL,
  `tanggallahir` varchar(250) NOT NULL,
  `tempatlahir` varchar(250) NOT NULL,
  `j_kelamin` varchar(250) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `k_pos` varchar(250) NOT NULL,
  `kelurahan` varchar(250) NOT NULL,
  `kecamatan` varchar(250) NOT NULL,
  `kota` varchar(250) NOT NULL,
  `provinsi` varchar(250) NOT NULL,
  `no_hp` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `profesi` varchar(100) NOT NULL,
  `s_kawin` varchar(100) NOT NULL,
  `p_terakhir` varchar(100) NOT NULL,
  `ket` varchar(250) NOT NULL,
  `gambar` varchar(250) NOT NULL,
  `s_anggota` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `nkta`, `cabang`, `daerah`, `wilayah`, `nama`, `tanggallahir`, `tempatlahir`, `j_kelamin`, `alamat`, `k_pos`, `kelurahan`, `kecamatan`, `kota`, `provinsi`, `no_hp`, `email`, `profesi`, `s_kawin`, `p_terakhir`, `ket`, `gambar`, `s_anggota`) VALUES
(8, '00-25050', 'Sulawesi Selatan', 'Makassar', 'Tamalate', 'Amirullah Hartono, S. Sos.', '2021-08-22', 'Makassar', 'Pria', 'Jl. Andi Tonro 1 No. 18', '-', '-', '-', 'Makassar', 'Sulawesi Selatan', '081247026219', 'cetakgampang@gmail.com', 'Guru', 'Belum Menikah', 'SD', '-', 'paspoto-oke.jpg', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_email` varchar(255) NOT NULL,
  `u_password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `u_name`, `u_email`, `u_password`, `created_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$YnTWj3v1/hIrgHgZcZZ3dOtK8oBNkeBK6xcEDGn5yQI9qYUT0jrgS', '2021-08-20 03:51:56');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
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
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
