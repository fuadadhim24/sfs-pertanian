<?php
include_once("../../../config/database.php");

$query = "SELECT nama_semprotan, deskripsi_singkat, gambar_path_main FROM semprotan";
$result = mysqli_query($conn, $query);

$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);

mysqli_close($conn);
?>
