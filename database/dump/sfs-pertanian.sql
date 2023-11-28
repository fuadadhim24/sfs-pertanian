-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Nov 2023 pada 05.12
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
  `kelebihan` text NOT NULL,
  `kekurangan` text NOT NULL,
  `ketahanan_hama_penyakit` text NOT NULL,
  `jenis_tanah` varchar(30) NOT NULL,
  `musim_tanam` varchar(30) NOT NULL,
  `estimasi_panen` varchar(30) NOT NULL,
  `durasi_penanaman` int(11) NOT NULL,
  `durasi_anakan` int(11) NOT NULL,
  `durasi_bunting` int(11) NOT NULL,
  `durasi_pemasakan` int(11) NOT NULL,
  `gambar_path_main` text NOT NULL,
  `gambar_path_1` text NOT NULL,
  `gambar_path_2` text NOT NULL,
  `gambar_path_3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `bibit`
--

INSERT INTO `bibit` (`id_bibit`, `nama_bibit`, `harga`, `jumlah`, `deskripsi_singkat`, `kelebihan`, `kekurangan`, `ketahanan_hama_penyakit`, `jenis_tanah`, `musim_tanam`, `estimasi_panen`, `durasi_penanaman`, `durasi_anakan`, `durasi_bunting`, `durasi_pemasakan`, `gambar_path_main`, `gambar_path_1`, `gambar_path_2`, `gambar_path_3`) VALUES
(1, 'IR 64', '85000', 5, 'Nasi bertekstur sedikit keras', 'Tahan terhadap penyakit blas dan hawar daun. Hasil tinggi', 'Rentan terhadap wereng coklat', 'Tahan terhadap hama tikus', 'Tanah Gambur', 'Musim Kemarau', '120-125 hari', 14, 35, 35, 60, 'padi pera.png', '', '', ''),
(2, 'Ciherang', '65000', 1, 'Tekstur nasi agak pulen', 'Padi gogo adalah jenis padi yang tidak ditanam di sawah seperti pada umumnya. Jenis padi ini ditanam di kebun atau di ladang. Kelebihan padi gogo adalah tidak memerlukan irigasi khusus. Daerah yang sering mengembangkan padi gogo adalah daerah tadah hujan, contohnya di Lombok. Cepat tumbuh dan memiliki hasil tinggi', 'Rentan terhadap tungro', 'Rentan terhadap serangan wereng coklat', 'Tanah Lempung', 'Musim Hujan', '115-120 hari', 0, 0, 0, 0, 'IMG_5949.JPG', 'WhatsApp Image 2023-09-05 at 14.38.26.jpg', 'IMG_5949.JPG', ''),
(8, 'Ciapus', '', 0, '', 'Hasil tinggi, Tahan terhadap serangan hama tikus', 'Rentan terhadap penyakit hawar daun', 'Tahan terhadap hama tikus', '', 'Musim Kemarau', 'Sekitar 120-125 hari', 0, 0, 0, 0, '', '', '', ''),
(9, 'Inpari 30', '', 0, '', 'Tahan terhadap hama tikus dan penyakit blas', 'Produktivitas sedang', 'Tahan terhadap penyakit hawar daun', '', 'Musim Hujan', 'Sekitar 120-125 hari', 0, 0, 0, 0, '', '', '', ''),
(11, 'edit cek nama bibit', '33000', 3, 'edit cek deskripsi singkat', 'edit cek kelebihan', 'edit cek kekurangan', 'edit cek ketahanan', 'edit cek jenis tanah', 'edit cek musim tanam', 'edit cek estimasi panen', 3, 4, 5, 6, 'qr_code.png', 'panduan pupuk.png', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatan_pemupukan`
--

CREATE TABLE `catatan_pemupukan` (
  `id_catatan_pemupukan` int(11) NOT NULL,
  `jenis_pemupukan` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL,
  `jumlah_penggunaan` int(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pupuk` int(11) NOT NULL,
  `id_sawah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `catatan_pemupukan`
--

INSERT INTO `catatan_pemupukan` (`id_catatan_pemupukan`, `jenis_pemupukan`, `tanggal`, `jumlah_penggunaan`, `id_user`, `id_pupuk`, `id_sawah`) VALUES
(3, 'Pupuk Pertama', '2023-04-28 09:19:00', 20, 14, 2, 39);

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatan_penyemprotan`
--

CREATE TABLE `catatan_penyemprotan` (
  `id_catatan_penyemprotan` int(11) NOT NULL,
  `jenis_penyemprotan` varchar(50) NOT NULL,
  `tanggal` datetime NOT NULL,
  `jumlah_penggunaan` int(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_semprotan` int(11) NOT NULL,
  `id_sawah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `catatan_penyemprotan`
--

INSERT INTO `catatan_penyemprotan` (`id_catatan_penyemprotan`, `jenis_penyemprotan`, `tanggal`, `jumlah_penggunaan`, `id_user`, `id_semprotan`, `id_sawah`) VALUES
(2, 'Penyemprotan Pertama', '2023-05-02 09:19:48', 10, 14, 2, 39);

-- --------------------------------------------------------

--
-- Struktur dari tabel `catatan_semai`
--

CREATE TABLE `catatan_semai` (
  `id_catatan_semai` int(11) NOT NULL,
  `jenis_semai` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_sawah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `catatan_semai`
--

INSERT INTO `catatan_semai` (`id_catatan_semai`, `jenis_semai`, `deskripsi`, `tanggal`, `id_user`, `id_sawah`) VALUES
(3, 'Persiapan Tempat', 'Ditentukan berdasarkan jadwal yaitu di rumah pak aben', '2023-03-14 09:14:38', 14, 39),
(4, 'Pemilihan Media Semai', 'Memakai tray semai', '2023-03-17 09:15:33', 14, 39),
(5, 'Proses Penyemaian', 'dilakukan penyemaian hari ini hingga 25 hari ke depan', '2023-11-23 03:16:34', 14, 39);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_sawah`
--

CREATE TABLE `detail_sawah` (
  `id_detail_sawah` int(11) NOT NULL,
  `id_sawah` int(11) NOT NULL,
  `id_bibit` int(11) NOT NULL,
  `tanggal_tanam` date NOT NULL,
  `jumlah_benih` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detail_sawah`
--

INSERT INTO `detail_sawah` (`id_detail_sawah`, `id_sawah`, `id_bibit`, `tanggal_tanam`, `jumlah_benih`) VALUES
(2, 39, 1, '2023-04-05', 500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kualitas`
--

CREATE TABLE `kualitas` (
  `id_kualitas` int(11) NOT NULL,
  `rate_kualitas` int(11) NOT NULL,
  `catatan_kualitas` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_detail_sawah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kualitas`
--

INSERT INTO `kualitas` (`id_kualitas`, `rate_kualitas`, `catatan_kualitas`, `id_user`, `id_detail_sawah`) VALUES
(3, 4, 'Memiliki kualitas bagus namun beberapa bulir beras tidak utuh', 14, 2);

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
(6, 'konten_text', '', 'cek judul', '2023-11-23', 'cek deskripsi', 'WIN_20230908_23_42_55_Pro.jpg', 'Fuad Adhim Al Hasan_Teknik Informatika.jpg', '', '');

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
  `tanggal_panen` date NOT NULL,
  `id_sawah` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `masa_panen`
--

INSERT INTO `masa_panen` (`id_masa_panen`, `quest_1`, `quest_2`, `quest_3`, `quest_4`, `jumlah_panen`, `tanggal_panen`, `id_sawah`, `id_user`) VALUES
(2, 'true', 'true', 'true', 'true', 42, '2023-11-22', 39, 14);

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
(1, 'Pupuk NPK', '55000', 3, 'Membantu menyuburkan tanaman, Meningkatkan PH tanah', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. ', 'Menyuburkan tanaman', 'cek', 'cek', 'cek', ''),
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
  `id_user` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `sawah`
--

INSERT INTO `sawah` (`id_sawah`, `nama_sawah`, `lokasi_sawah`, `luas_sawah`, `deskripsi`, `id_user`, `created_at`) VALUES
(39, 'Sawah Manggarai', 'LatLng(-8.271064, 113.664534)', 2, 'Lokasi depan rumah pak Afif', 14, '2023-02-23'),
(41, 'Sawah Garaga', 'LatLng(-8.275222, 113.673099)', 4, 'Dekat masjid Al Ikhlas', 14, '2023-11-27');

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

--
-- Dumping data untuk tabel `semprotan`
--

INSERT INTO `semprotan` (`id_semprotan`, `nama_semprotan`, `harga`, `jumlah`, `kegunaan`, `detail_semprotan`, `deskripsi_singkat`, `gambar_path_main`, `gambar_path_1`, `gambar_path_2`, `gambar_path_3`) VALUES
(2, 'Grass Booster', '78000', 3, 'Pembasmi Ilalang', 'Cara pakai :\nGunakan sarung tangan\nkocok sebelum digunakan\nSemprotkan secara merata\nSimpan di tempat aman\nCuci tangan setelah pemakaian', 'Pembasmi Ilalang', 'grass booster.png', 'grass booster 2.png', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `reset_token` varchar(50) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_handphone` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `hak_akses` enum('Petani','Konsumen','Admin','') NOT NULL,
  `password` varchar(100) NOT NULL,
  `last_login` datetime NOT NULL,
  `tanggal_daftar` date NOT NULL DEFAULT current_timestamp(),
  `gambar_path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `reset_token`, `nama_depan`, `nama_belakang`, `alamat`, `email`, `no_handphone`, `tanggal_lahir`, `hak_akses`, `password`, `last_login`, `tanggal_daftar`, `gambar_path`) VALUES
(10, '794967', 'Alif', 'Firmansyah', 'Jl Kebonsari', 'fuadadhim24@gmail.com', '082311723123', '1993-11-02', 'Admin', '$2y$10$BVjO270fWSXi/CzsS8uiOOSqc4WBh4TFxPdjXhMCsEm5psvCeG/Q.', '0000-00-00 00:00:00', '2023-10-26', 'Fuad Adhim Al Hasan_Teknik Informatika.png'),
(14, '1ff221894f4c277c8edafc21737bef9ca4a3bc050633998bb4', 'Fuad', 'Adhim', 'Jalan Kenanga', 'fuadadhim@gmail.com', '087840199095', '2004-09-05', 'Petani', '$2y$10$zybleksOtnzNawMeo8IVZOZAythWOX7jNmflQQ.GLhonouib0aAjy', '2023-11-22 07:03:15', '2023-11-22', 'Fuad Adhim Al Hasan_Teknik Informatika.pnf');

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
  ADD PRIMARY KEY (`id_catatan_penyemprotan`),
  ADD KEY `id_akun` (`id_user`,`id_semprotan`,`id_sawah`),
  ADD KEY `id_sawah` (`id_sawah`),
  ADD KEY `id_semprotan` (`id_semprotan`);

--
-- Indeks untuk tabel `catatan_semai`
--
ALTER TABLE `catatan_semai`
  ADD PRIMARY KEY (`id_catatan_semai`),
  ADD KEY `id_akun` (`id_user`,`id_sawah`),
  ADD KEY `id_sawah` (`id_sawah`);

--
-- Indeks untuk tabel `detail_sawah`
--
ALTER TABLE `detail_sawah`
  ADD PRIMARY KEY (`id_detail_sawah`),
  ADD KEY `id_sawah` (`id_sawah`,`id_bibit`),
  ADD KEY `id_bibit` (`id_bibit`);

--
-- Indeks untuk tabel `kualitas`
--
ALTER TABLE `kualitas`
  ADD PRIMARY KEY (`id_kualitas`),
  ADD KEY `id_akun` (`id_user`,`id_detail_sawah`),
  ADD KEY `id_beras` (`id_detail_sawah`),
  ADD KEY `id_sawah` (`id_detail_sawah`);

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
  ADD PRIMARY KEY (`id_sawah`),
  ADD KEY `id_user` (`id_user`);

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
  MODIFY `id_bibit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `catatan_pemupukan`
--
ALTER TABLE `catatan_pemupukan`
  MODIFY `id_catatan_pemupukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `catatan_penyemprotan`
--
ALTER TABLE `catatan_penyemprotan`
  MODIFY `id_catatan_penyemprotan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `catatan_semai`
--
ALTER TABLE `catatan_semai`
  MODIFY `id_catatan_semai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `detail_sawah`
--
ALTER TABLE `detail_sawah`
  MODIFY `id_detail_sawah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kualitas`
--
ALTER TABLE `kualitas`
  MODIFY `id_kualitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `literasi`
--
ALTER TABLE `literasi`
  MODIFY `id_literasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `masa_panen`
--
ALTER TABLE `masa_panen`
  MODIFY `id_masa_panen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id_sawah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `semprotan`
--
ALTER TABLE `semprotan`
  MODIFY `id_semprotan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  ADD CONSTRAINT `kualitas_ibfk_2` FOREIGN KEY (`id_detail_sawah`) REFERENCES `detail_sawah` (`id_detail_sawah`);

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

--
-- Ketidakleluasaan untuk tabel `sawah`
--
ALTER TABLE `sawah`
  ADD CONSTRAINT `sawah_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
