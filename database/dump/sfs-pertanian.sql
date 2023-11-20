-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Nov 2023 pada 02.44
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
  `jumlah` int(11) NOT NULL,
  `deskripsi_singkat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `jenis_tanah` varchar(30) NOT NULL,
  `cuaca` varchar(30) NOT NULL,
  `estimasi_panen` varchar(30) NOT NULL,
  `gambar_path_main` text NOT NULL,
  `gambar_path_1` text NOT NULL,
  `gambar_path_2` text NOT NULL,
  `gambar_path_3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bibit`
--

INSERT INTO `bibit` (`id_bibit`, `nama_bibit`, `harga`, `jumlah`, `deskripsi_singkat`, `deskripsi`, `jenis_tanah`, `cuaca`, `estimasi_panen`, `gambar_path_main`, `gambar_path_1`, `gambar_path_2`, `gambar_path_3`) VALUES
(1, 'After Padi Pera', '85000', 5, 'Nasi bertekstur sedikit keras', 'Padi pera diproduksi dan populer di daerah Sumatera Barat dan Riau. Padi dengan kadar amilosa tinggi tak hanya dijadikan nasi, pun juga menjadi bahan utama pembuatan bihun dan tepung beras.', 'Tanah Gambur', 'Hujan Sedang', '3-5', 'IMG_5949.JPG', '', '', ''),
(2, 'After Padi Gogo', '65000', 1, 'Tekstur nasi agak pulen', 'Padi gogo adalah jenis padi yang tidak ditanam di sawah seperti pada umumnya. Jenis padi ini ditanam di kebun atau di ladang. Kelebihan padi gogo adalah tidak memerlukan irigasi khusus. Daerah yang sering mengembangkan padi gogo adalah daerah tadah hujan, contohnya di Lombok.', 'Tanah Lempung', 'Hujan Tinggi', '4-5', 'IMG_5949.JPG', 'WhatsApp Image 2023-09-05 at 14.38.26.jpg', 'IMG_5949.JPG', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatan_pemupukan`
--

CREATE TABLE `catatan_pemupukan` (
  `id_catatan_pemupukan` int(11) NOT NULL,
  `jenis_pemupukan` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pupuk` int(11) NOT NULL,
  `id_sawah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatan_penyemprotan`
--

CREATE TABLE `catatan_penyemprotan` (
  `id_catatan_penyemprotan` int(11) NOT NULL,
  `jenis_penyemprotan` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_semprotan` int(11) NOT NULL,
  `id_sawah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatan_semai`
--

CREATE TABLE `catatan_semai` (
  `id_catatan_semai` int(11) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sawah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_sawah`
--

CREATE TABLE `detail_sawah` (
  `id_detail_sawah` int(11) DEFAULT NULL,
  `id_sawah` int(11) NOT NULL,
  `id_bibit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kualitas`
--

CREATE TABLE `kualitas` (
  `id_kualitas` int(11) NOT NULL,
  `rate_kualitas` int(11) NOT NULL,
  `catatan_kualitas` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_beras` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `literasi`
--

CREATE TABLE `literasi` (
  `id_literasi` int(11) NOT NULL,
  `bentuk_kategori` enum('konten_text','link_artikel_web/video/pdf') NOT NULL,
  `jenis` enum('umum','panduan_semai','panduan_pemupukan','panduan_penyemprotan','penanggulangan_hama_penyakit','panduan_panen') NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar_path_main` text NOT NULL,
  `gambar_path_1` text NOT NULL,
  `gambar_path_2` text NOT NULL,
  `gambar_path_3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `literasi`
--

INSERT INTO `literasi` (`id_literasi`, `bentuk_kategori`, `jenis`, `judul`, `tanggal`, `deskripsi`, `gambar_path_main`, `gambar_path_1`, `gambar_path_2`, `gambar_path_3`) VALUES
(1, 'link_artikel_web/video/pdf', 'panduan_pemupukan', 'TUTORIAL PEMUPUKAN PADI Dari Awal-Akhir Untuk PETA', '2023-11-19', 'https://www.youtube.com/watch?v=8L0kKEHjWiQ', 'panduan pupuk.png', '', '', ''),
(3, 'link_artikel_web/video/pdf', 'umum', 'judul cek', '2023-11-20', 'deskripsi cek', 'WhatsApp Image 2023-07-28 at 05.26.43.jpg', 'IMG_5946.JPG', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `masa_panen`
--

CREATE TABLE `masa_panen` (
  `id_masa_panen` int(11) NOT NULL,
  `quest_1` varchar(50) NOT NULL,
  `quest_2` varchar(50) NOT NULL,
  `quest_3` varchar(50) NOT NULL,
  `quest_4` varchar(50) NOT NULL,
  `jumlah_panen` int(11) NOT NULL,
  `id_sawah` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk_beras`
--

CREATE TABLE `produk_beras` (
  `id_beras` int(11) NOT NULL,
  `nama_beras` varchar(30) NOT NULL,
  `berat` int(11) NOT NULL,
  `tanggal_panen` date NOT NULL,
  `qr_code` varchar(100) NOT NULL,
  `tanggal_kadaluwarsa` date NOT NULL,
  `gambar_path_main` text NOT NULL,
  `gambar_path_1` text NOT NULL,
  `gambar_path_2` text NOT NULL,
  `gambar_path_3` text NOT NULL,
  `id_sawah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pupuk`
--

CREATE TABLE `pupuk` (
  `id_pupuk` int(11) NOT NULL,
  `nama_pupuk` varchar(100) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kegunaan` text NOT NULL,
  `detail_pupuk` text NOT NULL,
  `deskripsi_singkat` text NOT NULL,
  `gambar_path_main` text NOT NULL,
  `gambar_path_1` text NOT NULL,
  `gambar_path_2` text NOT NULL,
  `gambar_path_3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pupuk`
--

INSERT INTO `pupuk` (`id_pupuk`, `nama_pupuk`, `harga`, `jumlah`, `kegunaan`, `detail_pupuk`, `deskripsi_singkat`, `gambar_path_main`, `gambar_path_1`, `gambar_path_2`, `gambar_path_3`) VALUES
(1, 'Pupuk NPK', '50000', 3, 'Membantu menyuburkan tanaman, Meningkatkan PH tanah', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. ', 'Membantu menyuburkan tanaman', 'cek', 'cek', 'cek', 'cek'),
(2, 'Pupuk Kompos', '22000', 2, 'Meningkatkan PH', 'deskripsi lengkap 2', 'deskripsi singkat ', 'IMG_5950.JPG', 'IMG_5950.JPG', '', '');

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
(36, 'Sawah Manggarai', 'LatLng(-8.265698, 113.660924)', 10, 'Sawah depan rumah pak Adi', 'Admin', '2023-11-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `semprotan`
--

CREATE TABLE `semprotan` (
  `id_semprotan` int(11) NOT NULL,
  `nama_semprotan` varchar(100) NOT NULL,
  `harga` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `kegunaan` text NOT NULL,
  `detail_semprotan` text NOT NULL,
  `deskripsi_singkat` text NOT NULL,
  `gambar_path_main` text NOT NULL,
  `gambar_path_1` text NOT NULL,
  `gambar_path_2` text NOT NULL,
  `gambar_path_3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_handphone` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `hak_akses` enum('Petani','Konsumen','Admin','') NOT NULL,
  `password` varchar(100) NOT NULL,
  `tanggal_daftar` date NOT NULL DEFAULT current_timestamp(),
  `gambar_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama_depan`, `nama_belakang`, `alamat`, `email`, `no_handphone`, `tanggal_lahir`, `hak_akses`, `password`, `tanggal_daftar`, `gambar_path`) VALUES
(10, 'Alif', 'Firmansyah', 'Jl Kebonsari', 'admin@gmail.com', '082311723123', '1993-11-02', 'Admin', '$2y$10$zybleksOtnzNawMeo8IVZOZAythWOX7jNmflQQ.GLhonouib0aAjy', '2023-10-26', 'Fuad Adhim Al Hasan_Teknik Informatika.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bibit`
--
ALTER TABLE `bibit`
  ADD PRIMARY KEY (`id_bibit`);

--
-- Indeks untuk tabel `catatan_pemupukan`
--
ALTER TABLE `catatan_pemupukan`
  ADD PRIMARY KEY (`id_catatan_pemupukan`),
  ADD KEY `id_user` (`id_user`,`id_pupuk`,`id_sawah`),
  ADD KEY `id_sawah` (`id_sawah`),
  ADD KEY `id_pupuk` (`id_pupuk`);

--
-- Indeks untuk tabel `catatan_penyemprotan`
--
ALTER TABLE `catatan_penyemprotan`
  ADD KEY `id_akun` (`id_user`,`id_semprotan`,`id_sawah`),
  ADD KEY `id_sawah` (`id_sawah`),
  ADD KEY `id_semprotan` (`id_semprotan`);

--
-- Indeks untuk tabel `catatan_semai`
--
ALTER TABLE `catatan_semai`
  ADD KEY `id_akun` (`id_user`,`id_sawah`),
  ADD KEY `id_sawah` (`id_sawah`);

--
-- Indeks untuk tabel `detail_sawah`
--
ALTER TABLE `detail_sawah`
  ADD KEY `id_sawah` (`id_sawah`,`id_bibit`),
  ADD KEY `id_bibit` (`id_bibit`);

--
-- Indeks untuk tabel `kualitas`
--
ALTER TABLE `kualitas`
  ADD PRIMARY KEY (`id_kualitas`),
  ADD KEY `id_akun` (`id_user`,`id_beras`),
  ADD KEY `id_beras` (`id_beras`);

--
-- Indeks untuk tabel `literasi`
--
ALTER TABLE `literasi`
  ADD PRIMARY KEY (`id_literasi`);

--
-- Indeks untuk tabel `masa_panen`
--
ALTER TABLE `masa_panen`
  ADD PRIMARY KEY (`id_masa_panen`),
  ADD KEY `id_akun` (`id_user`),
  ADD KEY `id_sawah` (`id_sawah`);

--
-- Indeks untuk tabel `produk_beras`
--
ALTER TABLE `produk_beras`
  ADD PRIMARY KEY (`id_beras`),
  ADD KEY `id_akun` (`id_sawah`),
  ADD KEY `id_sawah` (`id_sawah`);

--
-- Indeks untuk tabel `pupuk`
--
ALTER TABLE `pupuk`
  ADD PRIMARY KEY (`id_pupuk`);

--
-- Indeks untuk tabel `sawah`
--
ALTER TABLE `sawah`
  ADD PRIMARY KEY (`id_sawah`);

--
-- Indeks untuk tabel `semprotan`
--
ALTER TABLE `semprotan`
  ADD PRIMARY KEY (`id_semprotan`);

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
  MODIFY `id_bibit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `catatan_pemupukan`
--
ALTER TABLE `catatan_pemupukan`
  MODIFY `id_catatan_pemupukan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kualitas`
--
ALTER TABLE `kualitas`
  MODIFY `id_kualitas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `literasi`
--
ALTER TABLE `literasi`
  MODIFY `id_literasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `masa_panen`
--
ALTER TABLE `masa_panen`
  MODIFY `id_masa_panen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk_beras`
--
ALTER TABLE `produk_beras`
  MODIFY `id_beras` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pupuk`
--
ALTER TABLE `pupuk`
  MODIFY `id_pupuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sawah`
--
ALTER TABLE `sawah`
  MODIFY `id_sawah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `semprotan`
--
ALTER TABLE `semprotan`
  MODIFY `id_semprotan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `catatan_pemupukan`
--
ALTER TABLE `catatan_pemupukan`
  ADD CONSTRAINT `catatan_pemupukan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `catatan_pemupukan_ibfk_2` FOREIGN KEY (`id_sawah`) REFERENCES `sawah` (`id_sawah`),
  ADD CONSTRAINT `catatan_pemupukan_ibfk_3` FOREIGN KEY (`id_pupuk`) REFERENCES `pupuk` (`id_pupuk`);

--
-- Ketidakleluasaan untuk tabel `catatan_penyemprotan`
--
ALTER TABLE `catatan_penyemprotan`
  ADD CONSTRAINT `catatan_penyemprotan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `catatan_penyemprotan_ibfk_2` FOREIGN KEY (`id_sawah`) REFERENCES `sawah` (`id_sawah`),
  ADD CONSTRAINT `catatan_penyemprotan_ibfk_3` FOREIGN KEY (`id_semprotan`) REFERENCES `semprotan` (`id_semprotan`);

--
-- Ketidakleluasaan untuk tabel `catatan_semai`
--
ALTER TABLE `catatan_semai`
  ADD CONSTRAINT `catatan_semai_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `catatan_semai_ibfk_2` FOREIGN KEY (`id_sawah`) REFERENCES `sawah` (`id_sawah`);

--
-- Ketidakleluasaan untuk tabel `detail_sawah`
--
ALTER TABLE `detail_sawah`
  ADD CONSTRAINT `detail_sawah_ibfk_1` FOREIGN KEY (`id_sawah`) REFERENCES `sawah` (`id_sawah`),
  ADD CONSTRAINT `detail_sawah_ibfk_2` FOREIGN KEY (`id_bibit`) REFERENCES `bibit` (`id_bibit`);

--
-- Ketidakleluasaan untuk tabel `kualitas`
--
ALTER TABLE `kualitas`
  ADD CONSTRAINT `kualitas_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `kualitas_ibfk_2` FOREIGN KEY (`id_beras`) REFERENCES `produk_beras` (`id_beras`);

--
-- Ketidakleluasaan untuk tabel `masa_panen`
--
ALTER TABLE `masa_panen`
  ADD CONSTRAINT `masa_panen_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `masa_panen_ibfk_2` FOREIGN KEY (`id_sawah`) REFERENCES `sawah` (`id_sawah`);

--
-- Ketidakleluasaan untuk tabel `produk_beras`
--
ALTER TABLE `produk_beras`
  ADD CONSTRAINT `produk_beras_ibfk_2` FOREIGN KEY (`id_sawah`) REFERENCES `sawah` (`id_sawah`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
