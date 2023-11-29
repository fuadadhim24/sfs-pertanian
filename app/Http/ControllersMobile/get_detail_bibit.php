<?php
// get_detailed_data_bibit.php



include 'koneksi.php';

$namaBibit = $_GET['nama_bibit'];

$query = "SELECT nama_bibit, harga, jumlah, deskripsi, jenis_tanah, cuaca, estimasi_panen, gambar_path_main FROM `bibit` WHERE nama_bibit = '$namaBibit'";

$result = mysqli_query($conn, $query);

$response = array();

while ($row = mysqli_fetch_assoc($result)) {
    $response[] = $row;
}

// Add a key "data" to the response
echo json_encode(array("data" => $response));

mysqli_close($conn);

?>

