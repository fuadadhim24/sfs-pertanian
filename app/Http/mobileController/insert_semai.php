<?php

include 'koneksi.php';

// Ambil data dari aplikasi Android

$jenis_semai = $_POST['jenis_semai'];
$deskripsi = $_POST['deskripsi'];
$tanggal = $_POST['tanggal'];
$id_user = $_POST['id_user'];
$id_sawah = $_POST['id_sawah'];

// Masukkan data ke dalam tabel
$sql = "INSERT INTO `catatan_semai` 
    (`id_catatan_semai`, `jenis_semai`, `deskripsi`, `tanggal`, `id_user`, `id_sawah`) VALUES
    (NULL, '$jenis_semai', '$deskripsi', '$tanggal', '$id_user', '$id_sawah')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil ditambahkan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
