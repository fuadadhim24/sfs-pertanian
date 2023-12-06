<?php
include_once("../../../config/database.php");

$query = "SELECT * FROM literasi WHERE jenis = 'panduan_pemupukan' OR jenis = 'panduan_penyemprotan' OR jenis = 'penanggulangan_hama_penyakit';";
$result = mysqli_query($conn, $query);

$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);

mysqli_close($conn);
?>
