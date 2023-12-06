<?php
include_once("../../../config/database.php");



include 'koneksi.php';

$namaPupuk = $_GET['nama_pupuk'];

$query = "SELECT nama_pupuk, harga, jumlah, kegunaan, detail_pupuk, gambar_path_main FROM `pupuk` WHERE nama_pupuk = '$namaPupuk'";

$result = mysqli_query($conn, $query);

$response = array();

while ($row = mysqli_fetch_assoc($result)) {
    $response[] = $row;
}

// Add a key "data" to the response
echo json_encode(array("data" => $response));

mysqli_close($conn);

?>

