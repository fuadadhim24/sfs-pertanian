-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Sep 2023 pada 10.54
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sfs-pertanian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_uji_tanah`
--

CREATE TABLE `hasil_uji_tanah` (
  `id_uji_tanah` int(11) NOT NULL,
  `hasil_uji` text NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi_cuaca`
--

CREATE TABLE `informasi_cuaca` (
  `id_cuaca` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `cuaca_saat_ini` varchar(50) NOT NULL,
  `prakiraan_cuaca` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_pertanian`
--

CREATE TABLE `jadwal_pertanian` (
  `id_jadwal` int(11) NOT NULL,
  `tanggal_tanam` date NOT NULL,
  `jenis_tanaman` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `peralatan_pertanian`
--

CREATE TABLE `peralatan_pertanian` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_konsumen`
--

CREATE TABLE `pesanan_konsumen` (
  `id_pesanan` int(11) NOT NULL,
  `tanggal_penesanan` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `ulasan_produk`
--

CREATE TABLE `ulasan_produk` (
  `id_ulasan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `isi_ulasan` text NOT NULL,
  `peringkat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `hak_akses` enum('Petani','Konsumen','Admin','') NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tanggal_daftar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `alamat`, `email`, `hak_akses`, `username`, `password`, `tanggal_daftar`) VALUES
(3, '', '', 'fuadadhim24@gmail.com', 'Admin', 'fuadadhim24', '$2y$10$ySZ1sbJmG.BsfWaZ5Eii5eOF5KCjxbiTVxQwpq7b7iu/gYOri4DnK', 0),
(4, '', '', 'caesar@gmail.com', 'Petani', 'caesar', '$2y$10$ijWJTjoRO.5H6sy3rrTKoeXeC6.P7NfQcx6/Kscw41aTeIuHCWV0.', 0),
(6, '', '', 'cek@gmail.com', 'Petani', 'cek', '$2y$10$q6Sb5EvTHxCSt4yPtLkzj.xjPNNKtNw3YXrsdMIhOFdnJRHqz/are', 0),
(7, '', '', 'boboy@gmail.com', 'Petani', 'boboy', '$2y$10$NgKifv4sCEibx1k1XC2ASu3z1nGdRJ0szDDq2WVkMCAPgUtT3PCEy', 0),
(8, '', '', 'guntur@gmail.com', 'Petani', 'guntur', '$2y$10$85uML4kE64nBFSNFlt8/Pet.wHBQRnVyBsgkiYFCkZR4RdT1HIBdq', 0),
(9, '', '', 'rizky@gmail.com', 'Petani', 'rizky', '$2y$10$fpNXDvUoqJY3l92Y8Zf9.OKQore5J6iD47Ck5aY0BVKghT3nFtmWi', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hasil_uji_tanah`
--
ALTER TABLE `hasil_uji_tanah`
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `informasi_cuaca`
--
ALTER TABLE `informasi_cuaca`
  ADD PRIMARY KEY (`id_cuaca`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `jadwal_pertanian`
--
ALTER TABLE `jadwal_pertanian`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `peralatan_pertanian`
--
ALTER TABLE `peralatan_pertanian`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pesanan_konsumen`
--
ALTER TABLE `pesanan_konsumen`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_user` (`id_user`,`id_produk`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `ulasan_produk`
--
ALTER TABLE `ulasan_produk`
  ADD PRIMARY KEY (`id_ulasan`),
  ADD KEY `id_user` (`id_user`,`id_produk`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `informasi_cuaca`
--
ALTER TABLE `informasi_cuaca`
  MODIFY `id_cuaca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jadwal_pertanian`
--
ALTER TABLE `jadwal_pertanian`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `peralatan_pertanian`
--
ALTER TABLE `peralatan_pertanian`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanan_konsumen`
--
ALTER TABLE `pesanan_konsumen`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ulasan_produk`
--
ALTER TABLE `ulasan_produk`
  MODIFY `id_ulasan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `hasil_uji_tanah`
--
ALTER TABLE `hasil_uji_tanah`
  ADD CONSTRAINT `hasil_uji_tanah_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `informasi_cuaca`
--
ALTER TABLE `informasi_cuaca`
  ADD CONSTRAINT `informasi_cuaca_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `jadwal_pertanian`
--
ALTER TABLE `jadwal_pertanian`
  ADD CONSTRAINT `jadwal_pertanian_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `peralatan_pertanian`
--
ALTER TABLE `peralatan_pertanian`
  ADD CONSTRAINT `peralatan_pertanian_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pesanan_konsumen`
--
ALTER TABLE `pesanan_konsumen`
  ADD CONSTRAINT `pesanan_konsumen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `pesanan_konsumen_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `peralatan_pertanian` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `ulasan_produk`
--
ALTER TABLE `ulasan_produk`
  ADD CONSTRAINT `ulasan_produk_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `ulasan_produk_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `peralatan_pertanian` (`id_produk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
