<?php

// Sertakan file koneksi
include_once("../../../config/database.php");

// Query SELECT
$query = "SELECT id_semprotan, nama_semprotan FROM semprotan";

$result = $koneksi->query($query);

if ($result) {
    // Jika query berhasil dijalankan
    $response = array();

    while ($row = $result->fetch_assoc()) {
        $response[] = $row;
    }

    echo json_encode(array('status' => 'success', 'data' => $response));
} else {
    // Jika terjadi kesalahan pada query
    echo json_encode(array('status' => 'error', 'message' => 'Gagal mengambil data semprotan: ' . $koneksi->error));
}

// Tutup koneksi database
$koneksi->close();

?>
