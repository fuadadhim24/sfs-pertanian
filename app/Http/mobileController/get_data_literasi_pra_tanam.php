<?php
require_once 'koneksi.php';

$query = "SELECT * FROM literasi WHERE jenis = 'panduan_semai' OR jenis = 'umum';";
$result = mysqli_query($conn, $query);

$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);

mysqli_close($conn);
?>
