<?php

include_once("../../../config/database.php");

// Ambil data dari aplikasi Android

$jenis_pemupukan = $_POST['jenis_pemupukan'];
$deskripsi = $_POST['deskripsi'];
$tanggal = $_POST['tanggal'];
$jumlah_penggunaan = $_POST['jumlah_penggunaan'];
$id_user = $_POST['id_user'];
$id_pupuk = $_POST['id_pupuk'];
$id_sawah = $_POST['id_sawah'];

// Masukkan data ke dalam tabel
$sql = "INSERT INTO `catatan_pemupukan` 
    (`id_catatan_pemupukan`, `jenis_pemupukan`,`deskripsi`, `tanggal`, `jumlah_penggunaan`, `id_user`, `id_pupuk`, `id_sawah`) VALUES
    (NULL, '$jenis_pemupukan','$deskripsi' ,'$tanggal', '$jumlah_penggunaan', '$id_user', '$id_pupuk', '$id_sawah')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil ditambahkan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
