<?php

include_once("../../../config/database.php");

// Ambil data dari aplikasi Android
$id_detail_sawah = $_POST['id_detail_sawah'];
$id_sawah = $_POST['id_sawah'];
$id_bibit = $_POST['id_bibit'];
$tanggal_tanam = $_POST['tanggal_tanam'];
$jumlah_benih = $_POST['jumlah_benih'];

// Masukkan data ke dalam tabel
$sql = "INSERT INTO `detail_sawah` (`id_detail_sawah`, `id_sawah`, `id_bibit`, `tanggal_tanam`, `jumlah_benih`) VALUES ('$id_detail_sawah', '$id_sawah', '$id_bibit', '$tanggal_tanam', '$jumlah_benih')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil ditambahkan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
