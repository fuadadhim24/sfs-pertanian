<?php
// Sertakan file koneksi.php
include 'koneksi.php';

// Mendapatkan nilai parameter nama_bibit dari permintaan GET
$nama_bibit = $_GET['nama_bibit'];

// Membuat query SQL
$sql = "SELECT id_bibit, nama_bibit, harga, jumlah, kelebihan, kekurangan, ketahanan_hama_penyakit, jenis_tanah, musim_tanam, durasi_penanaman, gambar_path_main FROM bibit WHERE nama_bibit = '$nama_bibit'";

// Menjalankan query
$result = $conn->query($sql);

// Mengecek apakah terdapat hasil
if ($result->num_rows > 0) {
    // Mengambil hasil dan mengonversinya ke dalam array asosiatif
    $row = $result->fetch_assoc();

    // Mengirim data sebagai response dalam format JSON
    echo json_encode(array("data" => $row));
} else {
    // Jika tidak ada hasil, mengirim response kosong
    echo "Data tidak ditemukan";
}

// Menutup koneksi database
$conn->close();
?>