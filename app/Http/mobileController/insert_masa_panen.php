<?php

// Sertakan file koneksi
include_once("../../../config/database.php");

// Pastikan metode HTTP yang digunakan adalah POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari permintaan
    $jumlah_panen = $_POST['jumlah_panen'];
    $tanggal_panen = $_POST['tanggal_panen'];
    $id_sawah = $_POST['id_sawah'];
    $id_user = $_POST['id_user'];

    // Query INSERT
    $query = "INSERT INTO masa_panen (quest_1, quest_2, quest_3, quest_4, jumlah_panen, tanggal_panen, id_sawah, id_user) VALUES (NULL, NULL, NULL, NULL, ?, ?, ?, ?)";
    
    // Menggunakan prepared statement untuk mencegah SQL injection
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("iisi", $jumlah_panen, $tanggal_panen, $id_sawah, $id_user);

    if ($stmt->execute()) {
        // Jika query berhasil dijalankan
        echo json_encode(array('status' => 'success', 'message' => 'Data masa panen berhasil ditambahkan.'));
    } else {
        // Jika terjadi kesalahan pada query
        echo json_encode(array('status' => 'error', 'message' => 'Gagal menambahkan data masa panen: ' . $stmt->error));
    }

    // Tutup prepared statement
    $stmt->close();
} else {
    // Jika metode HTTP bukan POST
    echo json_encode(array('status' => 'error', 'message' => 'Metode HTTP yang digunakan harus POST.'));
}

// Tutup koneksi database
$koneksi->close();

?>
