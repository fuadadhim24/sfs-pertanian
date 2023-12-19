<?php
// Sertakan file koneksi
require_once 'koneksi.php';

// Pastikan metode HTTP yang digunakan adalah POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari permintaan
    $jumlah_panen = $_POST['jumlah_panen'];
    $tanggal_panen = $_POST['tanggal_panen'];
    $id_sawah = $_POST['id_sawah'];
    $id_user = $_POST['id_user'];

    // Query INSERT
    $query = "INSERT INTO masa_panen (id_masa_panen, quest_1, quest_2, quest_3, quest_4, jumlah_panen, tanggal_panen, id_sawah, id_user) VALUES (NULL, NULL, NULL, NULL, NULL, ?, ?, ?, ?)";
    
    // Menggunakan prepared statement untuk mencegah SQL injection
    $stmt = $conn->prepare($query);
    
    // Bind parameter ke prepared statement
    $stmt->bind_param("issi", $jumlah_panen, $tanggal_panen, $id_sawah, $id_user);

    if ($stmt->execute()) {
        echo json_encode(array('status' => 'success', 'message' => 'Data masa panen berhasil ditambahkan.'));
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Gagal menambahkan data masa panen: ' . $stmt->error));
    }

    // Tutup prepared statement
    $stmt->close();
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Metode HTTP yang digunakan harus POST.'));
}

// Tutup koneksi database
$conn->close();
?>
