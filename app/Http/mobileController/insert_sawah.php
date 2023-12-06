<?php

include_once("../../../config/database.php");

// Ambil data dari aplikasi Android

$nama_sawah = $_POST['nama_sawah'];
$lokasi_sawah = $_POST['lokasi_sawah'];
$luas_sawah = $_POST['luas_sawah'];
$deskripsi = $_POST['deskripsi'];
$created_at = $_POST['created_at'];
$id_user = 14;

// Masukkan data ke dalam tabel
$sql = "INSERT INTO `sawah` 
    (`id_sawah`, `nama_sawah`, `lokasi_sawah`, `luas_sawah`, `deskripsi`, `id_user`, `created_at`) VALUES
    (NULL, '$nama_sawah', '$deskripsi', '$luas_sawah', '$deskripsi', '$id_user', '$created_at')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil ditambahkan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
