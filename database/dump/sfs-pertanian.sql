-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Okt 2023 pada 10.02
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
-- Struktur dari tabel `bibit`
--

CREATE TABLE `bibit` (
  `id_bibit` int(11) NOT NULL,
  `nama_bibit` varchar(40) NOT NULL,
  `harga` varchar(30) NOT NULL,
  `jumlah_kg` int(11) NOT NULL,
  `deskripsi_singkat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `jenis_tanah` varchar(30) NOT NULL,
  `cuaca` varchar(30) NOT NULL,
  `estimasi_panen` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bibit`
--

INSERT INTO `bibit` (`id_bibit`, `nama_bibit`, `harga`, `jumlah_kg`, `deskripsi_singkat`, `deskripsi`, `jenis_tanah`, `cuaca`, `estimasi_panen`) VALUES
(1, 'Padi Pera', '85000', 5, 'Nasi bertekstur sedikit keras', 'Padi pera diproduksi dan populer di daerah Sumatera Barat dan Riau. Padi dengan kadar amilosa tinggi tak hanya dijadikan nasi, pun juga menjadi bahan utama pembuatan bihun dan tepung beras.', 'Tanah Lempung', 'Hujan Sedang', '3-5'),
(2, 'Padi Gogo', '65000', 1, 'Tekstur nasi agak pulen', 'Padi gogo adalah jenis padi yang tidak ditanam di sawah seperti pada umumnya. Jenis padi ini ditanam di kebun atau di ladang. Kelebihan padi gogo adalah tidak memerlukan irigasi khusus. Daerah yang sering mengembangkan padi gogo adalah daerah tadah hujan, contohnya di Lombok.', 'Tanah Lempung', 'Hujan Sedang', '4-5');

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
-- Struktur dari tabel `sawah`
--

CREATE TABLE `sawah` (
  `id_sawah` int(11) NOT NULL,
  `nama_sawah` varchar(40) NOT NULL,
  `lokasi_sawah` text NOT NULL,
  `luas_sawah` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_by` enum('Admin','Petani') NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sawah`
--

INSERT INTO `sawah` (`id_sawah`, `nama_sawah`, `lokasi_sawah`, `luas_sawah`, `deskripsi`, `created_by`, `created_at`) VALUES
(9, 'LOKASI SAWAH 1', 'LatLng(-8.182946, -246.11692)', 10, 'Lorem Qorte', 'Admin', '2023-09-15'),
(25, 'LOKASI SAWAH 5', 'LatLng(-8.206053, -246.569979)', 35, 'cek', 'Admin', '2023-10-15'),
(27, 'LOKASI SAWAH 8', 'LatLng(-8.151681, -246.331091)', 10, 'hallo', 'Admin', '2023-10-16');

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
-- Indeks untuk tabel `bibit`
--
ALTER TABLE `bibit`
  ADD PRIMARY KEY (`id_bibit`);

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
-- Indeks untuk tabel `sawah`
--
ALTER TABLE `sawah`
  ADD PRIMARY KEY (`id_sawah`);

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
-- AUTO_INCREMENT untuk tabel `bibit`
--
ALTER TABLE `bibit`
  MODIFY `id_bibit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT untuk tabel `sawah`
--
ALTER TABLE `sawah`
  MODIFY `id_sawah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
