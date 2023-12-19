<?php

include 'koneksi.php'; // Pastikan file 'koneksi.php' berisi konfigurasi koneksi ke MySQL

// Dapatkan data dari POST request
$nama_sawah = $_POST['nama_sawah'];
$lokasi_sawah = $_POST['lokasi_sawah'];
$luas_sawah = $_POST['luas_sawah'];
$deskripsi = $_POST['deskripsi'];
$created_by = $_POST['created_by'];


// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data ke dalam tabel
$sql = "INSERT INTO sawah (nama_sawah, lokasi_sawah, luas_sawah, deskripsi, created_by) VALUES ('$nama_sawah', '$lokasi_sawah', $luas_sawah, '$deskripsi', '$created_by')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disimpan";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi ke database
$conn->close();
?>
