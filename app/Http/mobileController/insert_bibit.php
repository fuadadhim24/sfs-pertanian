<?php

include_once("../../../config/database.php");

// Ambil data dari aplikasi Android
$id_detail_sawah = $_POST['id_detail_sawah'];
$id_sawah = $_POST['id_sawah'];
$id_bibit = $_POST['id_bibit'];
$tanggal_tanam = isset($_POST['tanggal_tanam']) ? $_POST['tanggal_tanam'] : null;
$jumlah_benih = $_POST['jumlah_benih'];

// Persiapkan query
if ($tanggal_tanam !== null) {
    $sql = "INSERT INTO `detail_sawah` (`id_detail_sawah`, `id_sawah`, `id_bibit`, `tanggal_tanam`, `jumlah_benih`) VALUES ('$id_detail_sawah', '$id_sawah', '$id_bibit', '$tanggal_tanam', '$jumlah_benih')";
} else {
    $sql = "INSERT INTO `detail_sawah` (`id_detail_sawah`, `id_sawah`, `id_bibit`, `jumlah_benih`) VALUES ('$id_detail_sawah', '$id_sawah', '$id_bibit', '$jumlah_benih')";
}

// Jalankan query
if ($conn->query($sql) === TRUE) {
    echo "Data berhasil ditambahkan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>