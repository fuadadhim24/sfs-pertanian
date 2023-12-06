<?php
include_once("../../../config/database.php");



include 'koneksi.php';

$namaPupuk = $_GET['nama_semprotan'];

$query = "SELECT nama_pupuk, harga, jumlah, kegunaan, detail_semprotan, gambar_path_main FROM `pupuk` WHERE nama_semprotan = '$namaSemprotan'";

$result = mysqli_query($conn, $query);

$response = array();

while ($row = mysqli_fetch_assoc($result)) {
    $response[] = $row;
}

// Add a key "data" to the response
echo json_encode(array("data" => $response));

mysqli_close($conn);

?>

