<?php

require_once 'koneksi.php';

// Assuming you have a variable $idSawah with the desired id_sawah value
// Make sure to sanitize user input to prevent SQL injection
$idSawah = mysqli_real_escape_string($conn, $_GET['id_sawah']);

$query = "SELECT id_sawah, jenis_semai, deskripsi, DATE_FORMAT(tanggal, '%H:%i') AS waktu, DATE_FORMAT(tanggal, '%Y-%m-%d') AS tanggal FROM `catatan_semai` WHERE id_sawah = $idSawah;";
$result = mysqli_query($conn, $query);

$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);

mysqli_close($conn);
?>
