<?php

include_once("../../../config/database.php");

// Ambil data dari aplikasi Android

$deskripsi = $_POST['deskripsi'];
$tanggal = $_POST['tanggal'];
$jumlah_penggunaan = $_POST['jumlah_penggunaan'];
$id_user = $_POST['id_user'];
$id_semprotan = $_POST['id_semprotan'];
$id_sawah = $_POST['id_sawah'];

// Masukkan data ke dalam tabel
$sql = "INSERT INTO `catatan_penyemprotan` 
    (`id_catatan_penyemprotan`, `jenis_penyemprotan`,`deskripsi`, `tanggal`, `jumlah_penggunaan`, `id_user`, `id_semprotan`, `id_sawah`) VALUES
    (NULL, '$jenis_penyemprotan', '$deskripsi' '$tanggal', '$jumlah_penggunaan', '$id_user', '$id_semprotan', '$id_sawah')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil ditambahkan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
