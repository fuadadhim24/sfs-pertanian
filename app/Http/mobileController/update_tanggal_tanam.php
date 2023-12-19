<?php

// Menyertakan file koneksi.php
include 'koneksi.php';

// Menangkap data yang diterima dari Android Studio
$idSawah = $_POST['id_sawah']; // Update to match the key from your Android code
$tanggalTanam = $_POST['tanggal_tanam']; // Update to match the key from your Android code

// Validasi dan sanitasi input (contoh)
$idSawah = mysqli_real_escape_string($conn, $idSawah);
$tanggalTanam = mysqli_real_escape_string($conn, $tanggalTanam);

// Membuat query UPDATE
$query = "UPDATE `detail_sawah` SET `tanggal_tanam` = '$tanggalTanam' WHERE `id_sawah` = $idSawah";

// Menjalankan query
if ($conn->query($query) === TRUE) {
    // Jika query berhasil dijalankan
    $response['success'] = true;
    $response['message'] = "Data berhasil diupdate";
} else {
    // Jika terjadi kesalahan dalam menjalankan query
    $response['success'] = false;
    $response['message'] = "Error: " . $conn->error;
}

// Menutup koneksi
$conn->close();

// Mengirimkan response ke Android Studio dalam format JSON
header('Content-Type: application/json');
echo json_encode($response);

?>
