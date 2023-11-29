<?php
require_once 'koneksi.php';

$query = "SELECT nama_pupuk, deskripsi_singkat, gambar_path_main FROM pupuk";
$result = mysqli_query($conn, $query);

$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);

mysqli_close($conn);
?>
